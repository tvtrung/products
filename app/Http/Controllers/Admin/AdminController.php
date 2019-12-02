<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use Validator;
use Hash;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('checkRoleAdmin');
    }
    public function index(Request $request){
        $data = Admin::select('*');
        $key_search = $request->get('search');
        $key_status = $request->get('status');
        $key_role = $request->get('role');
        if($key_search != null){
            $data = $data->where('email','like','%'.$key_search.'%');
        }
        if($key_status != null){
            $data = $data->where('status',$key_status);
        }
        if($key_role != null){
            $data = $data->where('role',$key_role);
        }
        $data_count = $data->count();
        $data = $data->paginate(20);
        return view('admin.page.admins.index',['data'=>$data,'data_count'=>$data_count]);
    }
    public function create(){
    	$id_admin = Auth::guard('admin')->id();
        $admin_info = \App\Admin::where('id',$id_admin)->first();
        if($admin_info->role != 1)
            abort('404');
        return view('admin.page.admins.create');
    }
    public function store(Request $request){
        $rule = array(
                'name' => 'bail|required',
                'email' => 'bail|required|email|unique:admins,email',
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
                'admin_role' => $request->get('admin_role'),
                'isActive' => !is_null($request->get('isActive')) ? 1 : 0
            ];
        Admin::create_row($data);
        return redirect()->route('admin.admin-management.index')->with('success','Thêm Admin thành công');
    }
    public function edit($id){
    	$row = Admin::findOrFail($id);
    	return view('admin.page.admins.edit',['row'=>$row]);
    }
    public function update(Request $request,$id){
    	$data = $request->all();
    	$type_update = $data['update'];
    	switch ($type_update) {
    		case 'info':
    			$rule = array(
		                'name' => 'bail|required',
		            );
		        $messages = array( 
		                'name.required' => 'Bạn chưa nhập Tên',
		                );
		        $this->validate($request, $rule, $messages);
		        Admin::update_row_info($id,$data);
    			break;
    		case 'password':
    			$rule = array(
		                'password' => 'bail|required',
		                'repassword' => 'bail|same:password',
		            );
		        $messages = array( 
		                'password.required' => 'Bạn chưa nhập Password',
		                'repassword.same' => 'Password không khớp',
		                );
		        $this->validate($request, $rule, $messages);
		        if($request->get('password') != "" && $request->get('password') != null){
		        	$data['new_password'] = Hash::make($request->get('password'));
		        }
		        Admin::update_row_password($id,$data);
    			break;
    	}
        return redirect()->route('admin.admin-management.edit',['id'=>$id])->with('success','Cập nhật thành công!');
    }
    public function destroy($id){
        if(Auth::guard('admin')->id() == $id){
            return redirect()->route('admin.admin-management.index')->with('fail','Lỗi');
        }
        $row = Admin::find($id);
        Admin::destroy($id);
        return redirect()->route('admin.admin-management.index')->with('success','Xóa thành công');
    }
	public function ajax_view($id){
        $row = Admin::find($id);
        return view('admin.page.admins.view',['row'=>$row]);
	}
	public function update_select_box_delete($params){
		$params_array = explode(",",$params);
		foreach ($params_array as $value) {
			$row = Admin::find($value);
			if(!empty($row)){
				Admin::destroy($value);
			}
		}
		return redirect()->route('admin.admin-management.index')->with('success','Xóa thành công');
	}
	public function update_select_box_active($params){
		$params_array = explode(",",$params);
		foreach ($params_array as $value) {
			$row = Admin::find($value);
			if(!empty($row)){
				$item = Admin::find($value);
		    	$item->status = 1;
		    	$item->save();
			}
		}
		return redirect()->route('admin.admin-management.index')->with('success','Cập nhật thành công');
	}
	public function update_select_box_inactive($params){
		$params_array = explode(",",$params);
		foreach ($params_array as $value) {
			$row = Admin::find($value);
			if(!empty($row)){
				$item = Admin::find($value);
		    	$item->status = 0;
		    	$item->save();
			}
		}
		return redirect()->route('admin.admin-management.index')->with('success','Cập nhật thành công');
	}
}
