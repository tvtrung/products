<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;
use Validator;
use Hash;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$data = Users::all();
        return view('admin.page.users.index',['data'=>$data,'i'=>1]);
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('admin.home');
    }
    public function register()
    {
        if(Auth::user()->level != 1)
            abort('404');
        return view('admin.page.users.create');
    }
    public function store_user(Request $request){
        $rule = array(
                'name' => 'bail|required',
                'email' => 'bail|required|email|unique:users,email',
                'password' => 'bail|required',
                'repassword' => 'bail|same:password',
            );
        $messages = array( 
                'name.required' => 'Bạn chưa nhập Tên',
                'email.required' => 'Bạn chưa nhập Email',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Bạn chưa nhập Password',
                'repassword.same' => 'Password không khớp',
                );
        $this->validate($request, $rule, $messages);
        $data = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'user_level' => $request->get('user_level')
            ];
        Users::create_row($data);
        return redirect()->route('admin.register');
    }
    public function edit($id){
    	$row = Users::findOrFail($id);
    	return view('admin.page.users.edit',['row'=>$row]);
    }
    public function update_user(Request $request,$id){
        $rule = array(
                'name' => 'bail|required',
                'password' => 'bail',
                'repassword' => 'bail|same:password',
            );
        $messages = array( 
                'name.required' => 'Bạn chưa nhập Tên',
                'repassword.same' => 'Password không khớp',
                );
        $this->validate($request, $rule, $messages);
        $data = [
                'name' => $request->get('name'),
                'user_level' => $request->get('user_level')
            ];
        if($request->get('password') != "" && $request->get('password') != null){
        	$data['password'] = Hash::make($request->get('password'));
        }
        Users::update_row($id,$data);
        return redirect()->route('admin.user.edit',['id'=>$id])->with('success','Cập nhật thành công!');
    }
    public function destroy($id)
    {
        $row = Users::find($id);
        Users::destroy($id);
        return redirect()->route('admin.user.index')->with('success','Xóa thành công');
    }
	public function view_detail($id){
        $row = Users::find($id);
        return view('admin.page.users.view',['row'=>$row]);
	}
}
