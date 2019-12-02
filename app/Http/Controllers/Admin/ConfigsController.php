<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Configs;
use Validator;
use File;
use Image;
use Hash;

class ConfigsController extends Controller
{
	public $_table = 'configs';
	public $_info_db = array();
	public $_data_db;
	public $_info = array(
		    		'header',
		    		'footer',
		    		'fanpage',
		    		'lienhe',
		    		'seo',
		    		'optimize',
		    		'fb_social'
		    	);
   	public function __construct()
    {
        $this->middleware('auth');
        $this->_data_db = DB::table($this->_table)->get();
        foreach ($this->_data_db as $value) {
			$this->_info_db[] = $value->key;
			if(!in_array($value->key, $this->_info)){
				//DB::table($this->_table)->where('key', $value->key)->delete();
			}
		}
		foreach ($this->_info as $value) {
			if(!in_array($value, $this->_info_db)){
				DB::table($this->_table)->insert(['key'=>$value,'value'=>'']);
			}
		}
		foreach ($this->_info as $value){
			$field = DB::table($this->_table)->where('key', $value)->get();
			$this->_row[$value] = $field[0]->value;
		}
    }
    public function index(){
    	return redirect()->route('admin.configs.show_type',['type'=>'header']);
    }
    public function show_type($type){
    	$data = DB::table($this->_table)->where('key',$type)->first();
    	if($data->value != '' && $data->value != null){
    	$array_data = json_decode($data->value,true);
	    	foreach ($array_data as $key => $value) {
	    		$row[$key] = $value;
	    	}
    	}else{
    		$row = '';
    	}
    	return view('admin.page.configs.' . $type,['row'=>$row]);
    }
    public function update(Request $request){
    	$type = $request->get('type');
    	switch($type){
    		case 'header':
	    		$data = $request->except(['_token','type']);
	    		$row = DB::table($this->_table)->where('key',$type)->first();
	    		$array_row = json_decode($row->value,true);
		    	foreach ($data as $key => $value) {
			        $array_data[$key] = $value;
	    		}
	    		$array_image = array('logo','banner-top');
	    		$dir = 'uploads/configs/';
	    		foreach ($array_image as $value) {
		    		if($request->hasFile($value)){
			            $file = $request->file($value);
			            $filename = time() . '.' . $file->getClientOriginalExtension();
			            if (!File::exists($dir)) {
			                File::makeDirectory($dir, $mode = 0777, true, true);
			            }
			            $path = $dir . $filename;
			            Image::make($file)->save(($path));
			    		//File::delete(public_path($dir . $array_row[$value]));
			    		$array_data[$value] = $filename;
			        }else{
	    				if(isset($array_row[$value]))
			        		$array_data[$value] = $array_row[$value];
			        	else
			        		$array_data[$value] = 'default.png';
			        }
		        }
	    		$json_data = json_encode($array_data);
	    		DB::table($this->_table)->where('key',$type)->update(['value'=>$json_data]);
	    		break;
    		case 'footer':
	    		$data = $request->except(['_token','type']);
		    	foreach ($data as $key => $value) {
			        $array_data[$key] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $value);
	    		}
	    		$json_data = json_encode($array_data);
	    		DB::table($this->_table)->where('key',$type)->update(['value'=>$json_data]);
	    		break;
	    	case 'home-tinhnang':
	    		$data = $request->except(['_token','type']);
	    		$row = DB::table($this->_table)->where('key',$type)->first();
	    		$array_row = json_decode($row->value,true);
		    	foreach ($data as $key => $value) {
			        $array_data[$key] = $value;
	    		}
	    		$array_image = array('image');
	    		$dir = 'uploads/configs/';
	    		foreach ($array_image as $value) {
		    		if($request->hasFile($value)){
			            $file = $request->file($value);
			            $filename = time() . '.' . $file->getClientOriginalExtension();
			            if (!File::exists($dir)) {
			                File::makeDirectory($dir, $mode = 0777, true, true);
			            }
			            $path = $dir . $filename;
			            Image::make($file)->save(($path));
			    		//File::delete(public_path($dir . $array_row[$value]));
			    		$array_data[$value] = $filename;
			        }else{
	    				if(isset($array_row[$value]))
			        		$array_data[$value] = $array_row[$value];
			        	else
			        		$array_data[$value] = 'default.png';
			        }
		        }
	    		$json_data = json_encode($array_data);
	    		DB::table($this->_table)->where('key',$type)->update(['value'=>$json_data]);
	    		break;
	    	case 'gioithieu':
	    		$data = $request->except(['_token','type']);
	    		$row = DB::table($this->_table)->where('key',$type)->first();
	    		$array_row = json_decode($row->value,true);
		    	foreach ($data as $key => $value) {
			        $array_data[$key] = $value;
	    		}
	    		$array_image = array('icon-1','icon-2','icon-3');
	    		$dir = 'uploads/configs/';
	    		foreach ($array_image as $value) {
		    		if($request->hasFile($value)){
			            $file = $request->file($value);
			            $filename = time() . str_random(5) . '.' . $file->getClientOriginalExtension();
			            if (!File::exists($dir)) {
			                File::makeDirectory($dir, $mode = 0777, true, true);
			            }
			            $path = $dir . $filename;
			            Image::make($file)->save(($path));
			    		//File::delete(public_path($dir . $array_row[$value]));
			    		$array_data[$value] = $filename;
			        }else{
	    				if(isset($array_row[$value]))
			        		$array_data[$value] = $array_row[$value];
			        	else
			        		$array_data[$value] = 'default.png';
			        }
		        }
	    		$json_data = json_encode($array_data);
	    		DB::table($this->_table)->where('key',$type)->update(['value'=>$json_data]);
	    		break;
	    	case 'lienhe':
	    		$data = $request->except(['_token','type']);
		    	foreach ($data as $key => $value) {
			        $array_data[$key] = $value;
	    		}
	    		$json_data = json_encode($array_data);
	    		DB::table($this->_table)->where('key',$type)->update(['value'=>$json_data]);
	    		break;
	    	case 'seo':
	    		$data = $request->except(['_token','type']);
		    	foreach ($data as $key => $value) {
			        $array_data[$key] = $value;
	    		}
	    		$json_data = json_encode($array_data);
	    		DB::table($this->_table)->where('key',$type)->update(['value'=>$json_data]);
	    		break;
	    	case 'optimize':
	    		$data = $request->except(['_token','type']);
	    		if(isset($data['css-js-inpage'])){
	    			$data['css-js-inpage'] = 1;
	    		}
	    		else{
	    			$data['css-js-inpage'] = 0;
	    		}
	    		$json_data = json_encode($data);
	    		DB::table($this->_table)->where('key',$type)->update(['value'=>$json_data]);
	    		break;
	    	case 'fanpage':
	    		$data = $request->except(['_token','type']);
		    	foreach ($data as $key => $value) {
			        $array_data[$key] = $value;
	    		}
	    		$json_data = json_encode($array_data);
	    		DB::table($this->_table)->where('key',$type)->update(['value'=>$json_data]);
	    		break;
	    	case 'fb_social':
	    		$data = $request->except(['_token','type']);
		    	foreach ($data as $key => $value) {
			        $array_data[$key] = $value;
	    		}
	    		$json_data = json_encode($array_data);
	    		DB::table($this->_table)->where('key',$type)->update(['value'=>$json_data]);
	    		break;
    	}
    	
    }
}
