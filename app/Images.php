<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    public static function create_data($input){
        $row 				= new Images();
        $row->title 		= $input['title'];
        $row->description 	= $input['description'];
        $row->content 		= $input['content'];
        $row->type 			= $input['type'];
        $row->order 		= $input['order'];
        $row->status 		= $input['status'];
        $row->photo 		= $input['photo'];
        $row->link 			= $input['link'];
        $row->params 		= $input['json_params'];
        $row->save();
    }
    public static function update_data($input, $id){
    	$row = self::find($id);
        $row->title         = $input['title'];
        $row->description   = $input['description'];
        $row->content       = $input['content'];
        $row->type          = $input['type'];
        $row->order         = $input['order'];
        $row->status        = $input['status'];
        $row->photo         = $input['photo'];
        $row->link          = $input['link'];
        $row->params        = $input['json_params'];
        $row->save();
    }
}
