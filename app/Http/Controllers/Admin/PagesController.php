<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pages;
use Validate;

class PagesController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(Request $request){
        $data = Pages::orderBy('order');
        $key_search = $request->get('search');
        $key_status = $request->get('status');
        if($key_search != null){
            $data = $data->where('title','like','%'.$key_search.'%');
        }
        if($key_status != null){
            $data = $data->where('status',$key_status);
        }
        $data_count = $data->count();
        $data = $data->paginate(20);
        return view('admin.page.pages.index',['data'=>$data,'data_count'=>$data_count]);
    }
    public function create(){
        $max_order = Pages::max('order');
        return view('admin.page.pages.create',['max_order'=>$max_order]);
    }
    public function store(Request $request){
        $rule = array(
                'title' => 'bail|required|unique:posts,title|unique:categories_post,title|unique:pages,title',
                'slug' => 'bail|required|unique:posts,slug|unique:categories_post,slug|unique:pages,slug',
                'order' => 'bail|required',
            );
        $messages = array( 
                'title.required' => 'Bạn chưa nhập Tiêu đề',
                'title.unique' => 'Tiêu đề bị trùng',
                'slug.required' => 'Bạn chưa nhập Slug',
                'slug.unique' => 'Slug bị trùng',
                'order.required' => 'Bạn chưa nhập Sắp xếp',
                );
        $this->validate($request, $rule, $messages);
        if($request->get('status') == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        $input_params = [
            'seo_keyword' => $request->get('seo_keyword'),
            'seo_description' => $request->get('seo_description')
        ];
        $json_params = json_encode($input_params);
        $input = [
            'title'                 => $request->get('title'),
            'slug'                  => $request->get('slug'),
            'description'           => $request->get('description'),
            'content'               => $request->get('content'),
            'order'                 => $request->get('order'),
            'status'                => $status,
            'json_params'           => $json_params,
        ];
        Pages::create_data($input);
        return redirect()->route('admin.pages-management.index')->with('success','Đã thêm dữ liệu thành công');
    }
    public function edit($id){
        $row = Pages::findOrFail($id);
        return view('admin.page.pages.edit',['row'=>$row]);
    }
    public function update(Request $request, $id){
        $rule = array(
                'title' => 'bail|required|unique:posts,title,'.$id.'|unique:categories_post,title,'.$id.'|unique:pages,title,'.$id,
                'slug' => 'bail|required|unique:posts,slug,'.$id.'|unique:categories_post,slug,'.$id.'|unique:pages,slug,'.$id,
                'order' => 'bail|required',
            );
        $messages = array( 
                'title.required' => 'Bạn chưa nhập Tiêu đề',
                'title.unique' => 'Tiêu đề bị trùng',
                'slug.required' => 'Bạn chưa nhập Slug',
                'slug.unique' => 'Slug bị trùng',
                'order.required' => 'Bạn chưa nhập Sắp xếp'
                );
        $this->validate($request, $rule, $messages);
        if($request->get('status') == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        $input_params = [
            'seo_keyword' => $request->get('seo_keyword'),
            'seo_description' => $request->get('seo_description')
        ];
        $json_params = json_encode($input_params);
        $input = [
            'title'                 => $request->get('title'),
            'slug'                  => $request->get('slug'),
            'description'           => $request->get('description'),
            'content'               => $request->get('content'),
            'order'                 => $request->get('order'),
            'status'                => $status,
            'json_params'           => $json_params,
        ];
        Pages::update_data($input, $id);
        return redirect()->route('admin.pages-management.update',['id'=>$id])->with('success','Cập nhật dữ liệu thành công');
    }
    public function destroy($id){
        $row = Pages::findOrFail($id);
        if($row->delete()){
            return redirect()->route('admin.pages-management.index')->with('success','Xóa dữ liệu thành công');
        }else{
            return redirect()->route('admin.pages-management.index')->with('fail','Lỗi xóa dữ liệu');
        }
    }
    public function ajax_view($id){
        $row = Pages::findOrFail($id);
        return view('admin.page.pages.view',['row' => $row]);
    }
    public function update_select_box_delete($params){
        $params_array = explode(",",$params);
        foreach ($params_array as $value) {
            Pages::destroy($value);
        }
        return redirect()->route('admin.pages-management.index')->with('success','Xóa thành công');
    }
    public function update_select_box_active($params){
        $params_array = explode(",",$params);
        foreach ($params_array as $value) {
            $row = Pages::find($value);
            if(!empty($row)){
                $item = Pages::find($value);
                $item->status = 1;
                $item->save();
            }
        }
        return redirect()->route('admin.pages-management.index')->with('success','Cập nhật thành công');
    }
    public function update_select_box_inactive($params){
        $params_array = explode(",",$params);
        foreach ($params_array as $value) {
            $row = Pages::find($value);
            if(!empty($row)){
                $item = Pages::find($value);
                $item->status = 0;
                $item->save();
            }
        }
        return redirect()->route('admin.pages-management.index')->with('success','Cập nhật thành công');
    }
}
