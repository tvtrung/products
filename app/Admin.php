<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable {

    use Notifiable;

    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function create_row($input){
        $row = new Admin();
        $row->name = $input['name'];
        $row->email = $input['email'];
        $row->password = $input['password'];
        $row->status = $input['isActive'];
        $row->role = $input['admin_role'];
        $row->save();
    }
    public static function update_row_info($id,$input){
        $row = Admin::find($id);
        $row->name = $input['name'];
        $row->status = isset($input['isActive']) ? 1 : 0;
        $row->role = $input['admin_role'];
        $row->save();
    }
    public static function update_row_password($id,$input){
        $row = Admin::find($id);
        $row->password = bcrypt($input['password']);
        $row->save();
    }
}
