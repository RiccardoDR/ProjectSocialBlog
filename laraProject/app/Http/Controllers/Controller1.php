<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Blog_model;

class Controller1 extends BaseController
{
    
     protected $blog_model;
     
     public function __construct()
    {
        $this->blog_model = new Blog_model;
    }
    
    public function showHome() {
        //$id = \Auth::id();
        $blogs = $this->blog_model->getAllBlogs()->take(3);
        return view('home')
                ->with('blogs', $blogs);
    }

    public function showChiSiamo() {
        return view('chi_siamo');
    }

}
