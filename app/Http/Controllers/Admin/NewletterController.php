<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Newletter;

class NewletterController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function get_list(){
    	$data = DB::table('contact_form')->orderBy('id','desc')->get();
    	return view('admin.page.newletter.index',['data' => $data]);
    }
    public function delete($id){
    	$data = Newletter::findOrFail($id);
    	if($data->delete()){
    		return redirect()->route('admin.newletter.index')->with('success','Bạn đã xóa thành công');
    	}
    	else{
    		return redirect()->route('admin.newletter.index')->with('success','Xóa thất bại');
    	}
    }
    public function view_detail($id){
    	$data = Newletter::findOrFail($id);
    	return view('admin.page.newletter.view-detail',['data' => $data]);
    }
}
