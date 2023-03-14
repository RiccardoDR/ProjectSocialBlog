<?php

namespace App\Http\Controllers;

use App\Models\Post_model;
use App\Models\User_model;
use App\Models\Blog_model;
use App\Models\Amici_model;
use App\Models\Messaggi_model;
use App\Http\Requests\PostCreateRequest;
use Auth;

class PostController extends Controller
{
    protected $post_model;
    protected $user_model;
    protected $blog_model;
    protected $amici_model;
    protected $messaggi_model;
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->post_model = new Post_model;
        $this->user_model = new User_model;
        $this->blog_model = new Blog_model;
        $this->amici_model = new Amici_model;
        $this->messaggi_model = new Messaggi_model;
    }

    public function getPosts(int $IDBlog) {
        $blogcreator=$this->user_model->BlogCreator($IDBlog);
        $friends = $this->amici_model->getAllFriends();
        $users = $this->user_model->getAllUsers();
        $Blog = $this->blog_model->findBlog($IDBlog);
        $posts = $this->post_model->getPost($IDBlog);    
        return view('blog')
               ->with('blogcreator',$blogcreator[0])
               ->with('amici', $friends)
               ->with('utenti', $users)
               ->with('blog',$Blog)
               ->with('posts', $posts);     
    }

    public function createPost(PostCreateRequest $request,int $IDBlog) {
        $id = Auth::user()->id;
        //Crea il post
        $posts = new Post_model();
        $posts->Descrizione = $request->Descrizione;
        $posts->IDUtente = $id;
        $posts->IDBlog = $IDBlog;
        date_default_timezone_set('Europe/Rome');
        $data = substr(date("d-m-Y G:i:s",time()), 0, 10);
        $ora = substr(date("d-m-Y G:i:s",time()), 11, 19);
        $posts->Data = "Pubblicato il ".$data." alle ".$ora;
        $posts->save();
        return back();
    }

    public function deletePost() {
        $id = $_GET['idPost'];
        $this->post_model->deletePost($id);
        return back();
    }

    public function removePost() {
        $idPost = $_GET['idPost'];
        $idUtente = $_GET['idUtente'];
        $this->post_model->deletePost($idPost);
        $this->messaggi_model->removePost($idUtente, $idUtente);
        return back();
    }
    
}
