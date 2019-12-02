<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class ConfigsTextAdvancedController extends Controller
{
    private $key_config = 'advanced';
   	public function __construct() {
        $this->middleware('admin');
    }
    public function index(){
    	$data = \App\ConfigsText::where('key',$this->key_config)->first();
    	$data_array = json_decode($data['value'], true);
    	$get_value = $this->get_value($data_array);
    	return view('admin.page.configs-text.index-advanced', ['get_value'=>$get_value]);
    }
    public function update(Request $request){
    	$data = \App\ConfigsText::where('key',$this->key_config)->first();
    	$data_array = json_decode($data['value'], true);
    	$get_value = $this->get_value($data_array);
        $array_input_img = [
            
        ];
        $array_input_text = [
            'text_head',
    		'text_body',
    		'text_footer'
    	];
    	$array_input_checkbox = [
    		
    	];
    	$data = $request->all();
    	$dir = 'style/uploads/configs/';
    	$data_save = [];
    	if(!empty($array_input_img)){
	    	foreach ($array_input_img as $item) {
	    		if ($request->hasFile($item)) {
		            $file = $request->file($item);
		            $name_random = time() . Str::random(5);
		            $filename = $name_random . '.' . $file->getClientOriginalExtension();
		            $path = $dir . $filename;
		            if (!File::exists($dir)) {
		                File::makeDirectory($dir, $mode = 0777, true, true);
		            }
		            Image::make($file)->save(($path));
		            $data_save[$item] = remove_tag_script($path);
		            //if(File::exists($request->get($item.'_hidden'))) {
					//   File::delete($request->get($item.'_hidden'));
					//}
		        } else {
		            $data_save[$item] = isset($get_value[$item]) ? $get_value[$item] : null;
		        }
	    	}
    	}
    	if(!empty($array_input_text)){
	    	foreach ($array_input_text as $item) {
	    		$data_save[$item] = ($request->get($item));
	    	}
    	}
    	if(!empty($array_input_checkbox)){
	    	foreach ($array_input_checkbox as $item) {
	    		$data_save[$item] = ($request->get($item) != null && $request->get($item) == 'on') ? 1 : 0;
	    	}
    	}
    	$data_save_json = json_encode($data_save);
    	$count_data = \App\ConfigsText::where('key',$this->key_config)->count();
    	if($count_data == 0){
    		$row = new \App\ConfigsText();
	    	$row->key = $this->key_config;
	    	$row->value = $data_save_json;
	    	$row->save();
    	}else{
    		$row = \App\ConfigsText::where('key',$this->key_config)->first();
	    	$row->value = $data_save_json;
	    	$row->save();
    	}
    	return redirect()->back()->with('success','Update Successfully');
    }
    public static function get_value($data_array){
    	$array_input_img = [

        ];
        $array_input_text = [
    		'text_head',
            'text_body',
            'text_footer'
    	];
    	$array_input_checkbox = [

    	];
	    if(!empty($array_input_img)){
		    foreach ($array_input_img as $item) {
		        $get_value[$item] = isset($data_array[$item]) ? $data_array[$item] : '';
		    }
		}
		if(!empty($array_input_text)){
		    foreach ($array_input_text as $item) {
		        $get_value[$item] = isset($data_array[$item]) ? $data_array[$item] : '';
		    }
	    }
	    if(!empty($array_input_checkbox)){
		    foreach ($array_input_checkbox as $item) {
		        $get_value[$item] = isset($data_array[$item]) ? $data_array[$item] : '';
		    }
	    }
    	return $get_value;
    }
}
