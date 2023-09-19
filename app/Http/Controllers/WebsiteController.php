<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function showHomePage(){
        $category= Category::where('is_active',1)->get();
        return view('website.home',compact('category'));
    }


    public function  showCategoryPage($id){

$category= Category::where('id',$id)->first();

  return view('website.category',compact('category'));

    }

    public function showBlogPage($slug){
        $blog= Blog::where('slug',$slug)->firstorfail();
        return view('website.blog',compact('blog'));
    }

}
