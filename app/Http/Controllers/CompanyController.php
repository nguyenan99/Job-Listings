<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        $companies = Company::all();
        return view('admin.companies.index',[
            "route_name" => "companies",
            "page_name" => "Companies",
            "page_title" => "",
            "companies" => $companies
        ]);
    }
    public function edit($id){
        $company = Company::query()->where('id','=',$id)->first();
        return view('admin.companies.edit',[
            "route_name" => "companies",
            "page_name" => "Companies",
            "page_title" => "",
            "company" => $company
        ]);
    }
    public function update($id, Request $request)
    {
        $request->validate(['name' => "required|unique:company,name,".$id.",id"]);

        $company = Company::query()->findOrFail($id);
        $data = $request->only(['name','description']);
        if ($request->logo_company)
        {
            $image = upload_image('logo_company');
            if ($image['code'] == 1) {
                $data['logo'] = $image['name'];
            }
        }
        $company->update($data);
        return redirect(route('companies.edit', ['id' => $id]))->with('success','Update successfully!');
    }

    public function create()
    {
        return view('admin.companies.create', [
            "page_name" => "Create New Company",
            "page_title" => "",
            "route_name" => "companies",
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
        $data['user_id'] = auth()->user()->id;
        $company = Company::query()->create($data);

        if (!$company->exists) {
            return redirect(route('companies.create'))->with('error','Tạo công ty không thành công!');;
        }

        return redirect(route('get.home'))->with('success','Tạo công ty thành thành công!');;
    }
}
