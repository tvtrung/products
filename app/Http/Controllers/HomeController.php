<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriesPost;
use App\Posts;
use App\Pages;
use App\Contact;
use File;

class HomeController extends Controller
{
    public function __construct(){

    }
    public function home(){
        $get_cat = CategoriesPost::where('status',1)->orderBy('order')->get();
        return view('user.page.main',['get_cat'=>$get_cat]);
    }
    public function process_url($slug){
        // CAT
        $get_cat = CategoriesPost::where('slug',$slug)->where('status',1)->first();
        if(!empty($get_cat)){
            $list_post = Posts::where('cat_id',$get_cat->id)->where('status',1)->orderBy('order','desc')->paginate(20);
            $breadcrumb = '';
            $breadcrumb .= '<div class="bread-crumb">';
            $breadcrumb .= '<a href="/">Trang chủ</a>';
            $breadcrumb .= ' <i class="fa fa-angle-right" aria-hidden="true"></i> ';
            $breadcrumb .= '<span>'.$get_cat->title.'</span>';
            $breadcrumb .= '</div>';
            return view('user.page.post-list',['list_post'=>$list_post,'get_cat'=>$get_cat,'breadcrumb'=>$breadcrumb]);
        }
        // POSTS
        $get_post = Posts::where('slug', $slug)->where('status',1)->first();
        if(!empty($get_post)){
            $get_cat = CategoriesPost::where('id',$get_post->cat_id)->where('status',1)->first();
            if(!empty($get_cat)){
                $list_post = Posts::where('cat_id',$get_cat->id)->where('slug','<>',$get_post->slug)->orderBy('id','desc')->limit(10)->get()->toArray();

                $breadcrumb = '';
                $breadcrumb .= '<div class="bread-crumb">';
                $breadcrumb .= '<a href="/">Trang chủ</a>';
                $breadcrumb .= ' <i class="fa fa-angle-right" aria-hidden="true"></i> ';
                $breadcrumb .= '<a href="'.asset($get_cat->slug).'.html">'.$get_cat->title.'</a>';
                $breadcrumb .= ' <i class="fa fa-angle-right" aria-hidden="true"></i> ';
                $breadcrumb .= '<span>'.$get_post->title.'</span>';
                $breadcrumb .= '</div>';
                return view('user.page.post-detail',['get_post'=>$get_post,'breadcrumb'=>$breadcrumb,'slug_cat'=>$get_cat->slug,'list_post'=>$list_post]);
            }
        }
        // PAGES
        $get_post = Pages::where('slug', $slug)->where('status',1)->first();
        if(!empty($get_post)){
            $breadcrumb = '';
            $breadcrumb .= '<div class="bread-crumb">';
            $breadcrumb .= '<a href="/">Trang chủ</a>';
            $breadcrumb .= ' <i class="fa fa-angle-right" aria-hidden="true"></i> ';
            $breadcrumb .= '<span>'.$get_post->title.'</span>';
            $breadcrumb .= '</div>';
            return view('user.page.post-detail',['get_post'=>$get_post,'breadcrumb'=>$breadcrumb]);
        }
        return redirect()->route('page.home');
    }
    public function no_script(){
        return view('user.page.noscript');
    }
    public function contact(){
        return view('user.page.contact');
    }
    public function post_contact(Request $request){
        $data = $request->all();
        $rule = array(
                'name' => 'bail|required',
                'phone' => 'bail|required',
                'email' => 'bail|required',
                'content' => 'bail|required',
            );
        $messages = array( 
                'name.required' => 'Bạn chưa nhập Họ tên',
                'phone.required' => 'Bạn chưa nhập Số điện thoại',
                'email.required' => 'Bạn chưa nhập Email',
                'content.required' => 'Bạn chưa nhập Nội dung',
                );
        $this->validate($request, $rule, $messages);
        $row = new Contact();
        $row->name = $data['name'];
        $row->phone = $data['phone'];
        $row->email = $data['email'];
        $row->content = $data['content'];
        $row->status = 0;
        $row->save();
        return redirect()->back()->with('success','Gửi liên hệ thành công');
    }
    public function search(Request $request){
        // CAT
        $list_post = Posts::where('title','like','%'.$request->get('q').'%')->where('status',1)->orderBy('order','desc')->paginate(2);
        return view('user.page.search',['list_post'=>$list_post]);
    }
    public function cache_html($slug){
        $cacheFile = 'cache-html/'.$slug.'.html';
        if(file_exists($cacheFile)){
            include $cacheFile;
            return true;
        }
        return false;
    }
}
