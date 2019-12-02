<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\CategoriesPost;
use App\ConfigsText;
use Auth;

class IndexComposer {
    
    /**
     * The system repository implementation.
     *
     * @var NewletterRepository
     */
    //protected $newletter;
    
    /**
     * Create a new profile composer.
     *
     * @param  SystemRepository  $newletter
     * @return void
     */
    public function __construct(Request $request) {
    }
    
    public function compose(View $view) {
        if(Auth::guard('admin')->check()){
            $id_admin = Auth::guard('admin')->id();
            $admin_info = \App\Admin::where('id',$id_admin)->first();
            $view->with('admin_info', $admin_info);
        }
        $get_menu_cat = CategoriesPost::select('title','slug')->where('status',1)->orderBy('order')->get()->toArray();
        $view->with('get_menu_cat', $get_menu_cat);

        $ConfigsText = ConfigsText::where('key','home')->first();
        if(!empty($ConfigsText)){
            $ConfigsText_arr = json_decode($ConfigsText->value, true);
            $view->with('ConfigsText', $ConfigsText_arr);
        }
        $ConfigsText = ConfigsText::where('key','seo')->first();
        if(!empty($ConfigsText)){
            $ConfigsText_arr = json_decode($ConfigsText->value, true);
            $view->with('ConfigsTextSEO', $ConfigsText_arr);
        }
    }
}
