<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::all();
        return view('admin.jobs.index',[
            "route_name" => "jobs",
            "page_name" => "Jobs",
            "page_title" => "",
            "jobs" => $jobs
        ]);
    }
    public function edit($id){
        $job = Job::query()->findOrFail($id);
        return view('admin.jobs.edit',['job'=>$job, "route_name" => "jobs",]);
    }
    public function update($id, Request $request)
    {
        $request->validate(
            [
            'title' => "required",
            'full_description' => 'required',
            'benefit' => 'required'
            ],
            [
                'required' => ':attribute Không được để trống',
            ]
        );

        $job = Job::query()->findOrFail($id);
        $data = $request->only(['name','job_nature','exp_require','full_description','requirements','benefit']);

        $job->update($data);
        return redirect(route('jobs.edit', ['id' => $id]))->with('success','Update successfully!');
    }

    public function create()
    {
        return view('admin.companies.create', [
            "page_name" => "Create New Company",
            "page_title" => "",
            "route_name" => "jobs",
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:company',
        ]);
        $data = $request->only(['name']);
        if ($request->logo_company)
        {
            $image = upload_image('logo_company');
            if ($image['code'] == 1) {
                $data['logo'] = $image['name'];
            }
        }
        $company = Company::query()->create($data);

        if (!$company->exists) {
            return redirect(route('companies.create'))->withErrors(['Create category failed']);
        }

        return redirect(route('companies.index'));
    }
}
