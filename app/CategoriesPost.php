<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class CategoriesPost extends Model
{
    protected $table = 'categories_post';
    public static function update_data($input, $id){
    	$row = self::find($id);
        // if(file_exists('cache-html/'.$row->slug.'.html')){
        //     File::delete('cache-html/'.$row->slug.'.html');
        // }
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
