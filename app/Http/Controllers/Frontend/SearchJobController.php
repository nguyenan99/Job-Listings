<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CandidateCompany;
use App\Models\Category;
use App\Models\CategoryJob;
use App\Models\Company;
use App\Models\Job;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchJobController extends Controller
{
    public function index(Request $request)
    {
        $searchModel = Job::query()
            ->select(
                'job.*',
                'company.name as company_name',
                'location.name as location',
                'company.logo as logo',
                'company.email as email',
                'company.phone as phone',
                'company.website as website',
                'company.description as company_description',
            )
            ->leftJoin('category','category.id','=','job.category_id')
            ->leftJoin('company','company.id', '=', 'job.company_id')
            ->leftJoin('location','location.id', '=', 'job.location_id');


        if ($request->filled('job_search[]'))
        {

            $searchModel->whereIn('job.category_id',$request->input('job_search[]'));
        }
        if ($request->filled('city_search'))
        {
            $searchModel->whereIn('location_id',$request->input('city_search',[]));
        }
        if ($request->filled('like_search'))
        {
            $searchModel->where("job.title", "like", "%" . $request->input('like_search') . "%")
                        ->orWhere("company.name", "like", "%" . $request->input('like_search') . "%")
                        ->orWhere("job.requirements", "like", "%" . $request->input('like_search') . "%");
        }
        $searchResult = $searchModel->orderByDesc('job.created_at')->paginate(5);
        return view('frontend.pages.job.search_job',['searchResult'=>$searchResult]);
    }
    public function searchCandidate(Request $request)
    {
        $company = Company::query()->where('user_id','=',auth()->user()->id)->first();
        $searchModel = CandidateCompany::query()
            ->leftJoin('job','job.id','=','candidate_company.job_id')
            ->leftJoin('users','users.id','=','candidate_company.user_id')
            ->select('job.title as job_title','job.id as job_id','users.*')
            ->where('candidate_company.company_id','=',$company->id);
        if ($request->filled('candidate'))
        {
            $searchModel->where("users.name","like","%".$request->input('candidate') . "%");
        }
        if ($request->filled('job_id'))
        {
            $searchModel->where('job_id','=',$request->input('job_id'));
        }
        $searchResult = $searchModel->orderByDesc('job.id')->paginate(8);
        $jobs = Job::query()->where('company_id','=',$company->id)->get();
        return view('frontend.pages.candidate.index',['candidates' => $searchResult,'jobs' => $jobs]);
    }
}
