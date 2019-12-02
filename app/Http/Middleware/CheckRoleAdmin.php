<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id_admin = Auth::guard('admin')->id();
        $admin_info = \App\Admin::where('id',$id_admin)->first();
        if($admin_info->role == 1){
            return $next($request);
        }
        else{
            return redirect()->route('admin.dashboard');
        }
    }
}
