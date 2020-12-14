<?php

namespace App\Http\Controllers;

use App\Models\CandidateCompany;
use App\Models\Company;
use App\Models\Job;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->orderByDesc('created_at')->paginate(15);
        return view('admin.users.index',['users' => $users,'route_name' => 'users']);
    }
    public function create()
    {
        return view('frontend.pages.user.signup');
    }
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100',
                'email' => 'required|min:6|max:50|unique:users,email',
                'password' => 'required|min:6|max:20',
                're_password' =>'required|same:password',
                'user_name' => 'required|min:6|max:20|unique:users,user_name',
            ],
            [
                'name.required'=>'Bạn phải nhập tên',
                'name.min'=>'Tên quá ngắn',
                'name.max'=>'Tên quá dài',
                'email.required'=>'Bạn phải nhập email',
                'email.min'=>'email quá ngắn',
                'email.max'=>'email quá dài',
                'email.unique'=>'Đã email này',
                'password.required'=>'Bạn phải nhập email',
                'password.min'=>'password quá ngắn',
                'password.max'=>'password quá dài',
                're_password.required'=> 'Bạn phải xác nhận mật khẩu',
                're_password.same'=>'Password nhập lại chưa đúng',
                'user_name.required' => 'Bạn phải nhập tên tài khoản',
                'user_name.min'=>'Tên tài khoản quá ngắn',
                'user_name.max'=>'Tên tài khoản quá dài',
                'user_name.unique'=>'Tài khoản này đã tồn tại',



            ]);
        $data = $request->only(['name','user_name','email']);
        $data['password'] = bcrypt($request->password);
        $data['role'] = true;
        $user = User::query()->create($data);

        if (!$user->exists) {
            toastr()->error('Tạo tài khoản không thành công');
            return redirect(route('get.signup'));
        }
        toastr()->info('Tạo tài khoản thành công');
        return redirect(route('get.home'));
    }
    public function getLogin(){
        return view('frontend.pages.user.signin');
    }

    public function postLogin(Request $request){
        $this->validate($request,
            [
                'user_name' => 'required',
                'password' =>'required',
            ],
            [
                'user_name.required'=>'Bạn phải nhập email',
                'password'=>'Bạn phải nhập mật khẩu',
            ]);
        $data = $request->only(['user_name']);
        $data['password'] = $request->password;
        $fieldType = filter_var($request->user_name, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

        if (Auth::attempt(array($fieldType => $data['user_name'], 'password' => $data['password']))) {
            $user = Auth::user();
            if ($user->role == 0)
            {
                return redirect()->route('home');
            }
            return redirect()->route('get.home');


        }
        return redirect()->back()->with('error','Tên đăng nhập hoặc mật khẩu chưa chính xác');
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('get.home'));
    }
    public function getResume($id)
    {
        $user = User::query()->find($id);
        return view('frontend.pages.user.profile',['user' => $user]);
    }

    public function getProfile()
    {
        $user = User::query()->find(\auth()->user()->id);
        return view('frontend.pages.user.profile',['user' => $user]);
    }

    public function getEdit($id){
        $user = User::query()->find($id);
        return view('frontend.pages.user.edit_profile',['user' => $user]);
    }

    public function updateUser($id, Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'about_user' => 'required',
                'skill' => 'required',
                'work_exp' => 'required',
                'education' => 'required',
                'address' => 'required'
            ],
            [
                'name.required'=>'Bạn phải nhập name ',
                'phone.required'=>'Bạn phải nhập phone',
                'about_user.required'=>'Bạn phải nhập about user',
                'skill.required'=>'Bạn phải nhập skill',
                'work_exp.required'=>'Bạn phải nhập work exp',
                'education.required'=>'Bạn phải nhập work education',
                'address' => 'Bạn phải nhập address'


            ]
        );
        $dataUpdate = $request->only('name','phone','email','about_user','skill','work_exp','address','education');
        if ($request->image)
        {
            $image = upload_image('image');
            if ($image['code'] == 1) {
                $dataUpdate['image'] = $image['name'];
            }
        }
        $resultUpdate = User::query()->where('id','=',$id)->update($dataUpdate);
        if (!$resultUpdate)
        {
            toastr()->error('update không thành công');
            return back();
        }
        else{
            toastr()->info('update thành công');

        }
        return redirect()->route('get.profile');

    }
    public function apply($id)
    {
        $job = Job::query()->where('id','=',$id)->first();
        $userId = \auth()->user()->id;
        $data['user_id'] = $userId;
        $data['company_id'] = $job->company_id ;
        $data['job_id'] = $id;
        $resultApply = CandidateCompany::query()->create($data);
        if (!$resultApply)
        {
            toastr()->error('Apply failed');
            return back();
        }
        toastr()->info('Apply successfully');
        return back();

    }

    public function removeCandidate($id,$job_id)
    {
        $removeCandidate = CandidateCompany::query()->where('user_id','=',$id)->where('job_id','=',$job_id)->first();
        $resultRemove = $removeCandidate->delete();
        if (!$resultRemove)
        {
            toastr()->error('Remove failed');
            return back();
        }
        toastr()->info('Remove success');
        return back();


    }



}
