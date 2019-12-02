<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\FaqRequest;
use Illuminate\Support\Facades\DB;
use App\Faq;

class FaqController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$data = Faq::get_faq();
    	return view('admin.page.faq.index',['data'=>$data]);
    }
    public function create(){
    	$data = DB::table('page_faq')->max('order');
    	$max_order = $data;
    	$max_new = $max_order + 1;
    	return view('admin.page.faq.create',['max_new' => $max_new]);
    }
    public function store(FaqRequest $request){
    	if($request->get('status') == 'on'){
    		$status = 1;
    	}else{
    		$status = 0;
    	}
    	$input = [
    		'order' => $request->get('order'),
    		'fullname' => $request->get('fullname'),
    		'email' => $request->get('email'),
    		'website' => $request->get('website'),
    		'question' => $request->get('question'),
    		'answer' => $request->get('answer'),
    		'status' => $status,
    	];
    	Faq::create($input);
    	return redirect()->route('admin.faq.index');
    }
    public function delete($id){
    	$data = Faq::findOrFail($id);
    	if($data->delete()){
    		return redirect()->route('admin.faq.index')->with('success','Xóa dữ liệu thành công');
    	}else{
    		return redirect()->route('admin.faq.index')->with('success','Lỗi xóa dữ liệu');
    	}
    }
    public function edit($id){
        $data = Faq::findOrFail($id);
        return view('admin.page.faq.edit', ['data' => $data]);
    }
    public function update(FaqRequest $request, $id){
        $data = Faq::findOrFail($id);
        if($request->get('status') == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        $input = [
            'order' => $request->get('order'),
            'fullname' => $request->get('fullname'),
            'email' => $request->get('email'),
            'website' => $request->get('website'),
            'question' => $request->get('question'),
            'answer' => $request->get('answer'),
            'status' => $status,
        ];
        $data = Faq::update_faq($id, $input);
        return redirect()->route('admin.faq.edit', ['data' => $data])->with('success', 'Cập nhật thành công');
    }
    public function switch_ajax(){
        if(!isset($_GET['id'])){
            return redirect()->route('admin.faq.index');
        }
        $id = $_GET['id'];
        Faq::update_status($id);
    }
    public function view_detail(){
    	if(!isset($_GET['id'])){
            return redirect()->route('admin.faq.index');
        }
        $id = $_GET['id'];
        $data = Faq::detail($id);
    	return view('admin.page.faq.view-detail',['data' => $data]);
    }
    public function ajax_order(Request $request){
        if(($request->get('id')) == null){
            return redirect()->route('admin.faq.index');
        }
        else{
            $id = $request->get('id');
            $order = $request->get('value');
            Faq::update_order($id, $order);
            return redirect()->route('admin.faq.index');
        }
    }
}
