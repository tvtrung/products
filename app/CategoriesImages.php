<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesImages extends Model
{
    protected $table = 'categories_image';
    public static function update_data($input, $id){
    	$row = self::find($id);
    	$row->title = $input['title'];
    	$row->slug = $input['slug'];
    	$row->order = $input['order'];
    	$row->status = $input['status'];
        $row->url = $input['link'];
        $row->params = $input['json_params'];
    	$row->save();
    }
    public static function create_data($input){
        $row = new CategoriesPost();
        $row->title = $input['title'];
        $row->slug = $input['slug'];
        $row->order = $input['order'];
        $row->status = $input['status'];
        $row->url = $input['link'];
        $row->params = $input['json_params'];
        $row->save();
    }
}
