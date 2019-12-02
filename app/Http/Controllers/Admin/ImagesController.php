<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Images;
use Validator;
use File;
use Image;
use Hash;
class ImagesController extends Controller
{
    private $list_cat = 
        [
            'slider' => 'Slider',
            'partner' => 'Đối tác'
        ];
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(Request $request,$type){
        $data = Images::where('type',$type)->orderBy('order');
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
        return view('admin.page.images.'.$type.'.index',['data'=>$data,'data_count'=>$data_count]);
    }
    public function create($type){
        $max_order = Images::where('type',$type)->max('order');
        return view('admin.page.images.'.$type.'.create',['max_order'=>$max_order]);
    }
    public function store(Request $request,$type){
        $rule = array(
                'title' => 'bail|required|unique:images,title',
                'order' => 'bail|required',
            );
        $messages = array( 
                'title.required' => 'Bạn chưa nhập Tiêu đề',
                'title.unique' => 'Tiêu đề bị trùng',
                'order.required' => 'Bạn chưa nhập Sắp xếp',
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
        $dir = 'style/uploads/images/';
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
                // 'photo_resize' => $json_filename_size
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
            //name=>value
        ];
        $json_params = json_encode($input_params);
        $input = [
            'title'                 => $request->get('title'),
            'description'           => $request->get('description'),
            'content'               => $request->get('content'),
            'type'                  => $type,
            'order'                 => $request->get('order'),
            'status'                => $status,
            'photo'                 => $json_arr_photo,
            'link'                  => $request->get('link'),
            'json_params'           => $json_params,
        ];
        Images::create_data($input);
        return redirect()->route('admin.images.index',['type'=>$type])->with('success','Đã thêm dữ liệu thành công');
    }
    public function edit(Request $request, $type, $id){
        $row = Images::findOrFail($id);
        return view('admin.page.images.'.$type.'.edit',['row'=>$row]);
    }
    public function update(Request $request,$type, $id){
        $rule = array(
                'title' => 'bail|required',
                'order' => 'bail|required',
            );
        $messages = array( 
                'title.required' => 'Bạn chưa nhập Tiêu đề',
                'order.required' => 'Bạn chưa nhập Sắp xếp',
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
        $dir = 'style/uploads/images/';
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
                // 'photo_resize' => $json_filename_size
            ];
            $json_arr_photo = json_encode($arr_photo);
        }
        else{
            $json_arr_photo = Images::select('photo')->where('id',$id)->first()->photo;
        }
        if($request->get('status') == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        $input_params = [
            //name=>value
        ];
        $json_params = json_encode($input_params);
        $input = [
            'title'                 => $request->get('title'),
            'description'           => $request->get('description'),
            'content'               => $request->get('content'),
            'type'                  => $type,
            'order'                 => $request->get('order'),
            'status'                => $status,
            'photo'                 => $json_arr_photo,
            'link'                  => $request->get('link'),
            'json_params'           => $json_params,
        ];
        Images::update_data($input, $id);
        return redirect()->route('admin.images.index',['type'=>$type])->with('success','Cập nhật dữ liệu thành công');
    }
    public function destroy($type,$id){
        $row = Images::findOrFail($id);
        if($row->delete()){
            return redirect()->route('admin.images.index',['type'=>$type])->with('success','Xóa dữ liệu thành công');
        }else{
            return redirect()->route('admin.images.index',['type'=>$type])->with('fail','Lỗi xóa dữ liệu');
        }
    }
    public function ajax_view($type,$id){
        $row = Images::findOrFail($id);
        return view('admin.page.images.'.$type.'.view',['row' => $row]);
    }
    public function update_select_box_delete($type, $params){
        $params_array = explode(",",$params);
        foreach ($params_array as $value) {
            Images::destroy($value);
        }
        return redirect()->route('admin.images.index',['type'=>$type])->with('success','Xóa thành công');
    }
    public function update_select_box_active($type, $params){
        $params_array = explode(",",$params);
        foreach ($params_array as $value) {
            $row = Images::find($value);
            if(!empty($row)){
                $item = Images::find($value);
                $item->status = 1;
                $item->save();
            }
        }
        return redirect()->route('admin.images.index',['type'=>$type])->with('success','Cập nhật thành công');
    }
    public function update_select_box_inactive($type, $params){
        $params_array = explode(",",$params);
        foreach ($params_array as $value) {
            $row = Images::find($value);
            if(!empty($row)){
                $item = Images::find($value);
                $item->status = 0;
                $item->save();
            }
        }
        return redirect()->route('admin.images.index',['type'=>$type])->with('success','Cập nhật thành công');
    }
}
