<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CandidateCompany;
use App\Models\Company;
use App\Models\Job;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Home2Controller extends Controller
{
    public function getCompany()
    {
        $userId = auth()->user()->id;
        $company = Company::query()->where('user_id','=',$userId)->first();
        return view('frontend.pages.company.company_detail',['company' => $company]);
    }

    public function editCompany($id)
    {
        $userId = auth()->user()->id;
        $company = Company::query()->where('user_id','=',$userId)->first();
        return view('frontend.pages.company.edit',['company' => $company]);
    }

    public function updateCompany($id, Request $request)
    {

        $validator = $request->validate(
            [
                'name' => 'required',
                'website' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'description' => 'required',
            ],
            [
                'name.required'=>'Bạn phải nhập name ',
                'website.required'=>'Bạn phải nhập website',
                'email.required'=>'Bạn phải nhập email',
                'phone.required'=>'Bạn phải nhập phone',
                'description.required'=>'Bạn phải nhập description',
            ]
        );
        $dataUpdate = $request->only(['name','website','email','phone','description']);
        if ($request->logo_company)
        {
            $image = upload_image('logo_company');
            if ($image['code'] == 1) {
                $dataUpdate['logo'] = $image['name'];
            }
        }
        $resultUpdate = Company::query()->where('id','=',$id)->update($dataUpdate);
        if (!$resultUpdate)
        {
            toastr()->error('Update Không thành công');
            return back();
        }
        toastr()->info('Update thanh công');
        return back();


    }

    public function getApplied()
    {
        $userId = auth()->user()->id;
        $jobIds = CandidateCompany::query()->where('user_id','=',$userId)->get()->pluck('job_id');
        $jobs = Job::query()
            ->leftJoin('company','company.id','=','job.company_id')
            ->select('job.*','company.logo as company_logo')
            ->whereIn('job.id',$jobIds)->get();
        return view('frontend.pages.job.applied',['jobs' => $jobs]);
    }


}
