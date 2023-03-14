<?php

namespace App\Http\Controllers;

use App\Models\Amici_model;
use App\Models\User_model;
use App\Models\Blog_model;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\StaffRequest;
use Illuminate\Support\Facades\Hash;
use auth;

class UserController extends Controller
{
    protected $user_model;
    protected $amici_model;
    protected $blog_model;
    
    public function __construct() {
        $this->middleware('auth');
        $this->user_model = new User_model;
        $this->amici_model = new Amici_model;
        $this->blog_model = new Blog_model;
    }

    public function showProfile() {
        $id = Auth::user()->id;
        $numAmici = $this->amici_model->getNumFriends($id);
        $numBlog = $this->blog_model->getNumBlog($id);
        return view('profile')
                ->with('numAmici', $numAmici)
                ->with('numBlog', $numBlog);
    }

    public function getProfileUser(int $id) {
        $user = $this->user_model->getUser($id);
        $numAmici = $this->amici_model->getNumFriends($id);
        $blogs = $this->blog_model->getBlogsByUser($id);
        return view('profileUser')
                ->with('user', $user[0])
                ->with('numAmici', $numAmici)
                ->with('blogs', $blogs);
    }

    public function getAllUsers() {
        $users = $this->user_model->getAllUsers();
        $numBlogs = $this->blog_model->getNumBlogs();
        return view('utenti_iscritti')
                ->with('numBlogs', $numBlogs)
                ->with('utenti', $users);
    }

    public function getAllStaff() {
        $users = $this->user_model->getAllStaff();
        return view('membri_staff')
                ->with('utenti', $users);
    }
    
    public function showUserMod() {
        return view('modifica_profilo');
    }
    
    public function modificaProfilo(UpdateProfileRequest $request) {
        $utente = Auth::user();

        if($request->Nome != null){
            $utente->update([
                'Nome' => $request->Nome, 
                ]);
        }
        if($request->Cognome != null){
            $utente->update([
                'Cognome' => $request->Cognome, 
                ]);
        }
            if($request->Telefono != null){
            $utente->update([
                'Telefono' => $request->Telefono, 
                ]);
        }
            if($request->Città != null){
            $utente->update([
                'Città' => $request->Città, 
                ]);
        }
            if($request->Indirizzo != null){
            $utente->update([
                'Indirizzo' => $request->Indirizzo, 
                ]);
        }
            if($request->Anni != null){
            $utente->update([
                'Anni' => $request->Anni, 
                ]);
        }
            if($request->Codice_Fiscale != null){
            $utente->update([
                'Codice_Fiscale' => $request->Codice_Fiscale, 
                ]);
        }
        if($request->Username != null){
            $utente->update([
                'Username' => $request->Username,
                ]);
        }
            if($request->Visibilità != null){
            $utente->update([
                'Visibilità' => $request->Visibilità, 
                ]);
        }
            if($request->Descrizione != null){
            $utente->update([
                'Descrizione' => $request->Descrizione, 
                ]);
        }
        if ($request->password != null) {
            $utente->update([
                'password' => Hash::make($request->password),
            ]);
        }
                
          return redirect('profile');
    }

    public function search() {
        $search_text = $_GET['search'];
        $user = $this->user_model->getUserSearch($search_text);
        $amico = $this->amici_model->getAllFriends();
        return view('cerca')
               ->with('utenti', $user)
               ->with('amici', $amico);
    }
    
    public function getBlogs() {
        $blogs = $this->blog_model->getAllBlogs();
        return view('blogsPage')
               ->with('blogs', $blogs);
              
    }
    
    public function showMieiBlog() {
        $id = Auth::user()->id;
        $blogs = $this->blog_model->getBlogsByUser($id);

        return view('miei_blog')
                        ->with('blogs', $blogs);
    }
    
    public function creaBlog(BlogCreateRequest $request) {
        $id = Auth::user()->id;
        //Crea il blog
        $blogs = new Blog_model();
        $blogs->Titolo = $request->Titolo;
        $blogs->Descrizione = $request->Descrizione;
        $blogs->IDUtente = $id;
        $blogs->save();

        return redirect('miei_blog');
    }

    public function addStaff(StaffRequest $request) {

        $user_staff = new User_model();
        $user_staff->Nome = $request->Nome;
        $user_staff->Cognome = $request->Cognome;
        $user_staff->Telefono = $request->Telefono;
        $user_staff->Città = $request->Città;
        $user_staff->Indirizzo = $request->Indirizzo;
        $user_staff->Anni = $request->Anni;
        $user_staff->Codice_Fiscale = $request->Codice_Fiscale;
        $user_staff->Username = $request->Username;
        $user_staff->password = Hash::make($request->password);
        $user_staff->livello = $request->livello;
        $user_staff->Visibilità = $request->Visibilità;
        $user_staff->Descrizione = $request->Descrizione;
        $user_staff->save();

        return redirect('membri_staff');
    }

    public function elimina_mioblog(int $id) {
        $this->blog_model->deleteMioBlog($id);
        return redirect('miei_blog');
    }
    
    public function elimina_staff(int $id) {
        $user = $this->user_model->deleteStaff($id);
       
        return redirect('membri_staff')
                           ->with('utenti', $user);
    }
    
}
