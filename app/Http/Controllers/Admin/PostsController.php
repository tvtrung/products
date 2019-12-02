<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoriesPost;
use App\Posts;
use Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use File;
use Image;

class PostsController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(Request $request){
        $data = Posts::orderBy('order','desc');
        $key_search = $request->get('search');
        $key_cat = $request->get('cat');
        $key_status = $request->get('status');
        if($key_search != null){
            $data = $data->where('title','like','%'.$key_search.'%');
        }
        if($key_cat != null){
            $data = $data->where('cat_id',$key_cat);
        }
        if($key_status != null){
            $data = $data->where('status',$key_status);
        }
        $data_count = $data->count();
        $data = $data->paginate(20);
        return view('admin.page.posts.index',['data'=>$data,'data_count'=>$data_count]);
    }
    public function create(){
        $max_order = Posts::max('order');
        $list_categories_post = CategoriesPost::select('id','title')->get();
        return view('admin.page.posts.create',['max_order'=>$max_order,'list_categories_post'=>$list_categories_post]);
    }
    public function store(Request $request){
        $rule = array(
                'title' => 'bail|required|unique:posts,title|unique:categories_post,title|unique:pages,title',
                'slug' => 'bail|required|unique:posts,slug|unique:categories_post,slug|unique:pages,slug',
                'select-cat' => 'bail|required',
                'order' => 'bail|required',
            );
        $messages = array( 
                'title.required' => 'Bạn chưa nhập Tiêu đề',
                'title.unique' => 'Tiêu đề bị trùng',
                'slug.required' => 'Bạn chưa nhập Slug',
                'slug.unique' => 'Slug bị trùng',
                'order.required' => 'Bạn chưa nhập Sắp xếp',
                'select-cat.required' => 'Bạn chưa chọn danh mục bài viết'
                );
        $this->validate($request, $rule, $messages);
        $size_image = [
            ["x"=>251,"y"=>140],
            ["x"=>90,"y"=>50],
            ["x"=>333,"y"=>187],
            ["x"=>212,"y"=>118],
            ["x"=>207,"y"=>116],
            ["x"=>223,"y"=>125]
        ];
        $current_photo_name = '';
        $dir = 'style/uploads/posts/';
        $input_filename_size = [];
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name_random = time() .'-'. Str::random(5);
            $filename = $name_random . '.' . $file->getClientOriginalExtension();
            $path = $dir . $filename;
            if (!File::exists($dir)) {
                File::makeDirectory($dir, $mode = 0777, true, true);
            }
            Image::make($file)->save(($path));
            $filename_size = [];
            foreach ($size_image as $item) {
                $file_size = $request->file('photo');
                $filename_size['size_' . $item['x'] . 'x' . $item['y']] = $name_random . "-" . $item['x'] . "x" . $item['y'] . "." . $file->getClientOriginalExtension();
                $path_size = $dir . $filename_size['size_' . $item['x'] . 'x' . $item['y']];
                // Image::make($file_size)->fit($item['x'], $item['y'])->save(public_path($path_size));
            }
            $json_filename_size = json_encode($filename_size);
            $arr_photo = [
                'photo'=> $dir.$filename,
                'photo_resize' => $json_filename_size
            ];
            $json_arr_photo = json_encode($arr_photo);
        }
        else{
            $arr_photo = [
                'photo'=> null,
                'photo_resize' => null
            ];
            $json_arr_photo = json_encode($arr_photo);
        }
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
            'select-cat'            => $request->get('select-cat'),
            'order'                 => $request->get('order'),
            'status'                => $status,
            'photo'                 => $json_arr_photo,
            'json_params'           => $json_params,
        ];
        Posts::create_data($input);
        return redirect()->route('admin.posts-management.index')->with('success','Đã thêm dữ liệu thành công');
    }
    public function edit($id){
        $row = Posts::findOrFail($id);
        $list_categories_post = CategoriesPost::select('id','title')->get();
        return view('admin.page.posts.edit',['row'=>$row,'list_categories_post'=>$list_categories_post]);
    }
    public function update(Request $request, $id){
        $rule = array(
                'title' => 'bail|required|unique:posts,title,'.$id.'|unique:categories_post,title,'.$id.'|unique:pages,title,'.$id,
                'slug' => 'bail|required|unique:posts,slug,'.$id.'|unique:categories_post,slug,'.$id.'|unique:pages,slug,'.$id,
                'select-cat' => 'bail|required',
                'order' => 'bail|required',
            );
        $messages = array( 
                'title.required' => 'Bạn chưa nhập Tiêu đề',
                'title.unique' => 'Tiêu đề bị trùng',
                'slug.required' => 'Bạn chưa nhập Slug',
                'slug.unique' => 'Slug bị trùng',
                'order.required' => 'Bạn chưa nhập Sắp xếp',
                'select-cat.required' => 'Bạn chưa chọn danh mục bài viết'
                );
        $this->validate($request, $rule, $messages);
        $size_image = [
            ["x"=>251,"y"=>140],
            ["x"=>90,"y"=>50],
            ["x"=>333,"y"=>187],
            ["x"=>212,"y"=>118],
            ["x"=>207,"y"=>116],
            ["x"=>223,"y"=>125]
        ];
        $current_photo_name = '';
        $dir = 'style/uploads/posts/';
        $input_filename_size = [];
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name_random = time() .'-'. Str::random(5);
            $filename = $name_random . '.' . $file->getClientOriginalExtension();
            $path = $dir . $filename;
            if (!File::exists($dir)) {
                File::makeDirectory($dir, $mode = 0777, true, true);
            }
            Image::make($file)->save(($path));
            $filename_size = [];
            $path_size_save = [];
            foreach ($size_image as $item) {
                $file_size = $request->file('photo');
                $filename_size['size_' . $item['x'] . 'x' . $item['y']] = $name_random . "-" . $item['x'] . "x" . $item['y'] . "." . $file->getClientOriginalExtension();
                $path_size = $dir . $filename_size['size_' . $item['x'] . 'x' . $item['y']];
                $path_size_save[] = $path_size;
                // Image::make($file_size)->fit($item['x'], $item['y'])->save(public_path($path_size));
            }
            $json_filename_size = json_encode($path_size_save);
            $arr_photo = [
                'photo'=> $dir.$filename,
                'photo_resize' => $json_filename_size
            ];
            $json_arr_photo = json_encode($arr_photo);
        }
        else{
            $json_arr_photo = Posts::select('photo')->where('id',$id)->first()->photo;
        }
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
            'select-cat'            => $request->get('select-cat'),
            'order'                 => $request->get('order'),
            'status'                => $status,
            'photo'                 => $json_arr_photo,
            'json_params'           => $json_params,
        ];
        Posts::update_data($input, $id);
        return redirect()->route('admin.posts-management.update',['id'=>$id])->with('success','Cập nhật dữ liệu thành công');
    }
    public function destroy($id){
        $row = Posts::findOrFail($id);
        if($row->delete()){
            return redirect()->route('admin.posts-management.index')->with('success','Xóa dữ liệu thành công');
        }else{
            return redirect()->route('admin.posts-management.index')->with('fail','Lỗi xóa dữ liệu');
        }
    }
    public function ajax_view($id){
        $row = Posts::findOrFail($id);
        $get_title_cat = CategoriesPost::select('title')->where('id',$row->cat_id)->first();
        return view('admin.page.posts.view',['row' => $row,'get_title_cat'=>$get_title_cat]);
    }
    public function update_select_box_delete($params){
        $params_array = explode(",",$params);
        foreach ($params_array as $value) {
            Posts::destroy($value);
        }
        return redirect()->route('admin.posts-management.index')->with('success','Xóa thành công');
    }
    public function update_select_box_active($params){
        $params_array = explode(",",$params);
        foreach ($params_array as $value) {
            $row = Posts::find($value);
            if(!empty($row)){
                $item = Posts::find($value);
                $item->status = 1;
                $item->save();
            }
        }
        return redirect()->route('admin.posts-management.index')->with('success','Cập nhật thành công');
    }
    public function update_select_box_inactive($params){
        $params_array = explode(",",$params);
        foreach ($params_array as $value) {
            $row = Posts::find($value);
            if(!empty($row)){
                $item = Posts::find($value);
                $item->status = 0;
                $item->save();
            }
        }
        return redirect()->route('admin.posts-management.index')->with('success','Cập nhật thành công');
    }
}