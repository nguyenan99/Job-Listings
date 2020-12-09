<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CandidateCompany;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Location;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

       $jobs = Job::query()
           ->leftJoin('company','company.id', '=', 'job.company_id')
           ->leftJoin('location','location.id', '=', 'job.location_id')
           ->orderBy('job.created_at','desc')
           ->select('job.*','company.name as company_name','location.name as location','company.logo as logo')->limit(8)->get();
       $categories = Category::all();
       $locations = Location::all();
        return view('frontend.pages.home.index',['jobs' => $jobs, 'categories' => $categories, 'locations' => $locations]);

    }
    public function getJobDetail($id){
        $job = Job::query()
            ->leftJoin('company','company.id', '=', 'job.company_id')
            ->leftJoin('location','location.id', '=', 'job.location_id')
            ->leftJoin('users','users.id','=','company.user_id')
            ->select('job.*','company.name as company_name','location.name as location','company.logo as logo',
                'company.email as email','company.phone as phone', 'company.website as website','company.description as company_description','users.id as user_id')
            ->where('job.id',$id)
            ->first();
        $applied = false;
        if (auth()->check())
        {
            $userId = auth()->user()->id;
            $apply = CandidateCompany::query()->where('user_id',$userId)->where('job_id',$id)->first();
            if (isset($apply))
            {
                $applied = true;
            }
        }
        return view('frontend.pages.job_detail.job_detail',['job'=>$job], ['applied' => $applied ]);
    }
    public function getCreateJob(){
        $locations = Location::all();
        $company = Company::query()->select('*')->where('user_id',auth()->user()->id)->first();
        $categories = Category::all();
        return view('frontend.pages.job.create',['locations' => $locations, 'company' => $company, 'categories' => $categories]);
    }
    public function getCreateCompany()
    {
        return view('frontend.pages.company.create');
    }
    public function getCandidates()
    {
        $userId = auth()->user()->id;
        $company = Company::query()->where('user_id','=',$userId)->first();
        $candidate_ids = CandidateCompany::query()->where('company_id','=',$company->id)->get()->pluck('user_id');
        $candidates = CandidateCompany::query()
            ->leftJoin('job','job.id','=','candidate_company.job_id')
            ->leftJoin('users','users.id','=','candidate_company.user_id')
            ->select('job.title as job_title','job.id as job_id','users.*')
            ->where('candidate_company.company_id','=',$company->id)
            ->get();
        $jobs = Job::query()->where('company_id','=',$company->id)->get();
        return view('frontend.pages.candidate.index',['candidates' => $candidates,'jobs' => $jobs]);
    }

    public function storeCompany(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|unique:company',
                'email' => 'required|unique:company',
                'phone' => 'required|',
                'description' => 'required'
            ],
            [
                'name.required' => 'Cần phải nhập name',
                'email.required' => 'Cần phải nhập email',
                'phone.required' => 'Cần phải nhập phone',
                'description.required' => 'Cần phải nhập description',
                'name.unique' => 'Tên công ty đã tồn tại',
                'email.unique' => 'email đã tồn tại',
            ]
        );
        $data = $request->only(['name','website','email','phone','description']);
        if ($request->logo_company)
        {
            $image = upload_image('logo_company');
            if ($image['code'] == 1) {
                $data['logo'] = $image['name'];
            }
        }
        $data['user_id'] = auth()->user()->id;
        $company = Company::query()->create($data);

        if (!$company->exists) {
            toastr()->error('Tạo công ty không thành công');
            return redirect(route('company.create'));
        }

            toastr()->info('Tạo hồ sơ công ty thành công ');
            return redirect(route('get.home'));


    }

    public function storeJob(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'full_description' => 'required',
            'requirements' => 'required',
            'address' => 'required',
            'salary' => 'required',
            'location_id' => 'required',
            'job_nature' => 'required',
            'benefit' => 'required',
            'category_id' => 'required'
        ],
        [
            'title.required'=>'Bạn phải nhập title',
            'full_description.required'=>'Bạn phải nhập description',
            'requirements.required'=>'Bạn phải nhập requirements',
            'address.required'=>'Bạn phải nhập address',
            'salary.required'=>'Bạn phải nhập salary',
            'location_id.required'=>'Bạn phải nhập location',
            'job_nature.required'=>'Bạn phải nhập job nature',
            'benefit.required'=>'Bạn phải nhập benefit',
            'category_id.required'=>'Bạn phải nhập category',

        ]
        );
        $data = $request->only(['title','full_description','requirements','address','salary','location_id','job_nature','benefit','company_id','category_id']);

        if(!$validator) {

            return \Redirect::back()->withErrors($validator);
        }
        $job = Job::query()->create($data);
        if (!$job->exists) {
            toastr()->error('Tạo job không thành công ');
            return redirect(route('get.home'));
        }

        toastr()->info('Tạo job thành công');
        return back();
    }
    public function getListJob(){
        $userId = auth()->user()->id;
        $jobs = Job::query()
            ->leftJoin('company','company.id','=','job.company_id')
            ->leftJoin('users','users.id','=','company.user_id')
            ->select('job.*','company.logo as company_logo')
            ->where('user_id','=',$userId)->get();
        return view('frontend.pages.job.manage',['jobs' => $jobs]);
    }

    public function deleteJob($id)
    {
        $job = Job::query()->find($id);
        $deleteResult = $job->delete();
        if (!$deleteResult)
        {
            toastr()->error(' xóa không thành công');
            return back();
        }
        toastr()->success('xóa thành công');
        return back();
    }

    public function editJob($id)
    {
        $locations = Location::all();
        $categories = Category::all();
        $job = Job::query()
            ->leftJoin('company','company.id', '=', 'job.company_id')
            ->leftJoin('location','location.id', '=', 'job.location_id')
            ->select('job.*','company.name as company_name','location.name as location','company.logo as logo',
                'company.email as email','company.phone as phone', 'company.website as website','company.description as company_description','company.id as company_id')
            ->where('job.id',$id)
            ->first();
        return view('frontend.pages.job.edit',['job'=>$job, 'locations' => $locations, 'categories' => $categories]);
    }

    public function updateJob($id, Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'full_description' => 'required',
            'requirements' => 'required',
            'address' => 'required',
            'salary' => 'required',
            'location_id' => 'required',
            'job_nature' => 'required',
            'benefit' => 'required',
            'category_id' => 'required'
        ],
            [
                'title.required'=>'Bạn phải nhập title',
                'full_description.required'=>'Bạn phải nhập description',
                'requirements.required'=>'Bạn phải nhập requirements',
                'address.required'=>'Bạn phải nhập address',
                'salary.required'=>'Bạn phải nhập salary',
                'location_id.required'=>'Bạn phải nhập location',
                'job_nature.required'=>'Bạn phải nhập job nature',
                'benefit.required'=>'Bạn phải nhập benefit',
                'category_id.required'=>'Bạn phải nhập category',

            ]
        );
        $data = $request->only(['title','full_description','requirements','address','salary','location_id','job_nature','benefit','company_id','category_id']);
//        if(!$validator) {
//            return \Redirect::back()->withErrors($validator);
//        }
        $resultUpdate = Job::query()->where('id','=',$id)->update($data);
        if (!$resultUpdate) {
            toastr()->error('Update job không thành công ');
            return back();
        }

        toastr()->info('Update job thành công');
        return back();
    }
}
