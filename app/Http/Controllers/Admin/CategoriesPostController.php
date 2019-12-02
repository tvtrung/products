<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoriesPost;
use App\Posts;
use Validate;
use Illuminate\Support\Facades\DB;

class CategoriesPostController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(Request $request){
    	$data = CategoriesPost::orderBy('order');
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
    	return view('admin.page.categories_post.index',['data'=>$data,'data_count'=>$data_count]);
    }
    public function create(){
    	$max_order = CategoriesPost::max('order');
    	return view('admin.page.categories_post.create',['max_order'=>$max_order]);
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
            'title'         => $request->get('title'),
            'slug'          => $request->get('slug'),
            'order'         => $request->get('order'),
            'status'        => $status,
            'link'          => '/',
            'json_params'   => $json_params,
        ];
        CategoriesPost::create_data($input);
        return redirect()->route('admin.categories-post-management.index')->with('success','Đã thêm dữ liệu thành công');
    }
    public function edit($id){
    	$row = CategoriesPost::findOrFail($id);
    	return view('admin.page.categories_post.edit',['row'=>$row]);
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
            'title'         => $request->get('title'),
            'slug'          => $request->get('slug'),
            'order'         => $request->get('order'),
            'status'        => $status,
            'link'          => '/',
            'json_params'   => $json_params,
        ];
        CategoriesPost::update_data($input, $id);
        return redirect()->route('admin.categories-post-management.update',['id'=>$id])->with('success','Chỉnh sửa dữ liệu thành công');
    }
    public function destroy($id){
        $row = CategoriesPost::findOrFail($id);
        $count_posts = Posts::where('cat_id',$id)->count();
        if($count_posts == 0){
        	if($row->delete()){
	        	return redirect()->route('admin.categories-post-management.index')->with('success','Xóa dữ liệu thành công');
	        }else{
	            return redirect()->route('admin.categories-post-management.index')->with('fail','Lỗi xóa dữ liệu');
	        }
        }else{
            return redirect()->route('admin.categories-post-management.index')->with('fail','Không thể xóa vì có bài viết trong danh mục này. Có ' . $count_posts . ' bài viết');
        }
    }
    public function ajax_view($id){
    	$row = CategoriesPost::findOrFail($id);
        return view('admin.page.categories_post.view',['row' => $row]);
    }
    public function update_select_box_delete($params){
		$params_array = explode(",",$params);
		foreach ($params_array as $value) {
			$count_posts = 0;
			if($count_posts == 0){
	        	CategoriesPost::destroy($value);
	        }else{
	            return redirect()->route('admin.categories-post-management.index')->with('fail','Không thể xóa vì có bài viết trong danh mục này. Có ' . $count_posts . ' bài viết');
	        }
		}
		return redirect()->route('admin.categories-post-management.index')->with('success','Xóa thành công');
	}
	public function update_select_box_active($params){
		$params_array = explode(",",$params);
		foreach ($params_array as $value) {
			$row = CategoriesPost::find($value);
			if(!empty($row)){
				$item = CategoriesPost::find($value);
		    	$item->status = 1;
		    	$item->save();
			}
		}
		return redirect()->route('admin.categories-post-management.index')->with('success','Cập nhật thành công');
	}
	public function update_select_box_inactive($params){
		$params_array = explode(",",$params);
		foreach ($params_array as $value) {
			$row = CategoriesPost::find($value);
			if(!empty($row)){
				$item = CategoriesPost::find($value);
		    	$item->status = 0;
		    	$item->save();
			}
		}
		return redirect()->route('admin.categories-post-management.index')->with('success','Cập nhật thành công');
	}
}
