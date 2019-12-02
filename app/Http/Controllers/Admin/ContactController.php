<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(Request $request){
    	$data = Contact::orderBy('created_at','desc');
        $key_search = $request->get('search');
        $key_status = $request->get('status');
    	if($key_search != null){
            $data = $data->where('email','like','%'.$key_search.'%');
        }
        if($key_status != null){
            $data = $data->where('status',$key_status);
        }
    	$data_count = $data->count();
    	$data = $data->paginate(20);
    	return view('admin.page.contact.index',['data'=>$data,'data_count'=>$data_count]);
    }
    public function destroy($id){
        $row = Contact::findOrFail($id);
        if($row->delete()){
        	return redirect()->route('admin.contact-management.index')->with('success','Xóa dữ liệu thành công');
        }else{
            return redirect()->route('admin.contact-management.index')->with('fail','Lỗi xóa dữ liệu');
        }
    }
    public function ajax_view($id){
    	$row = Contact::findOrFail($id);
        return view('admin.page.contact.view',['row' => $row]);
    }
    public function update_select_box_delete($params){
		$params_array = explode(",",$params);
		foreach ($params_array as $value) {
			Contact::destroy($value);
		}
		return redirect()->route('admin.contact-management.index')->with('success','Xóa thành công');
	}
	public function update_select_box_active($params){
		$params_array = explode(",",$params);
		foreach ($params_array as $value) {
			$row = Contact::find($value);
			if(!empty($row)){
				$item = Contact::find($value);
		    	$item->status = 1;
		    	$item->save();
			}
		}
		return redirect()->route('admin.contact-management.index')->with('success','Cập nhật thành công');
	}
	public function update_select_box_inactive($params){
		$params_array = explode(",",$params);
		foreach ($params_array as $value) {
			$row = Contact::find($value);
			if(!empty($row)){
				$item = Contact::find($value);
		    	$item->status = 0;
		    	$item->save();
			}
		}
		return redirect()->route('admin.contact-management.index')->with('success','Cập nhật thành công');
	}
}
