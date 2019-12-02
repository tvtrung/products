<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Pages extends Model
{
    protected $table = 'pages';
    public static function create_data($input){
        $row = new Pages();
        $row->title = $input['title'];
        $row->slug = $input['slug'];
        $row->description = $input['description'];
        $row->content = $input['content'];
        $row->order = $input['order'];
        $row->status = $input['status'];
        $row->params = $input['json_params'];
        $row->view = 0;
        $row->save();
    }
    public static function update_data($input, $id){
    	$row = self::find($id);
        // if(file_exists('cache-html/'.$row->slug.'.html')){
        //     File::delete('cache-html/'.$row->slug.'.html');
        // }
        $row->title = $input['title'];
        $row->slug = $input['slug'];
        $row->description = $input['description'];
        $row->content = $input['content'];
        $row->order = $input['order'];
        $row->status = $input['status'];
        $row->params = $input['json_params'];
    	$row->save();
    }
}
