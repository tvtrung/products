<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class PageController extends Controller
{
    public function __construct() {
    	$this->middleware('admin');
    }
    public function getIndex()
    {
        $count_admin = DB::table('admins')->where('role',1)->count();
        $count_editor = DB::table('admins')->where('role',2)->count();
        $var_array = [
        	'count_admin' => $count_admin,
        	'count_editor' => $count_editor,
        ];
        return view('admin.page.dashboard.index', $var_array);
    }
    public function getLogout() {
    	Auth::guard('admin')->logout();
    	return redirect()->route('admin.getLogin');
    }
    public function upload_editor(){
        return view('upload-editor.index');
    }
}
