<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductsRequest;
use App\Products;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = Products::get_list();
        return view('admin.page.product.index',['data'=>$data]);
    }
    public function create(){
        $data = DB::table('products')->max('order');
        $max_order = $data;
        $max_new = $max_order + 1;
        return view('admin.page.product.create',['max_new' => $max_new]);
    }
    public function store(ProductsRequest $request){
        if($request->get('isActive') == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        $input = [
            'order' => $request->get('order'),
            'title' => $request->get('title'),
            'price' => $request->get('price'),
            'content' => $request->get('content'),
            'link' => $request->get('link'),
            'status' => $status,
        ];
        Products::create($input);
        return redirect()->route('admin.product.index')->with('success','Đã thêm dữ liệu thành công');
    }
    public function delete($id){
        $data = Products::findOrFail($id);
        if($data->delete()){
            return redirect()->route('admin.product.index')->with('success','Xóa dữ liệu thành công');
        }else{
            return redirect()->route('admin.product.index')->with('success','Lỗi xóa dữ liệu');
        }
    }
    public function edit($id){
        $data = Products::findOrFail($id);
        return view('admin.page.product.edit', ['row' => $data]);
    }
    public function update(ProductsRequest $request, $id){
        $data = Products::findOrFail($id);
        if($request->get('isActive') == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        $input = [
            'order' => $request->get('order'),
            'title' => $request->get('title'),
            'price' => $request->get('price'),
            'content' => $request->get('content'),
            'link' => $request->get('link'),
            'status' => $status,
        ];
        $data = Products::update_price($id, $input);
        return redirect()->route('admin.product.edit', ['row' => $data])->with('success', 'Cập nhật thành công');
    }
    public function switch_ajax($id){
        Products::update_status($id);
    }
    public function view_detail($id){
        $data = Products::detail($id);
        return view('admin.page.product.view',['row' => $data]);
    }
    public function ajax_order(Request $request, $id){
        $order = $request->get('order');
        Products::update_order($id, $order);
    }
}
