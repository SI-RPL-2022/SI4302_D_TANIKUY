<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDataBlog()
    {
        $mod = DB::table('blog')
            ->select('blog.id_blog', 'blog.judul_blog', 'blog.kategori', 'users.name', 'blog.created_at')
            ->join('users', 'users.id', '=', 'blog.id_user') 
            ->orderBy('blog.created_at', 'DESC')
            ->get();

        return view('showDataBlog', compact('mod'));
    }

    public function tambahDataBlog()
    {
        return view('tambahDataBlog');
    }

    public function postDataBlog(Request $request)
    {          
        $cover = time().'.'.$request->cover->extension();
        $request->cover->move(public_path('image/cover'), $cover);        
        
        $blog = Blog::create([
            'id_user' => $request->id_user,
            'judul_blog' => $request->judul_blog,                           
            'cover' => $cover,            
            'kategori' => $request->kategori,
            'slug' => \Str::slug($request->judul_blog),
            'isi_blog' => $request->isi_blog           
        ]);           
        
        return redirect(url('admin/blog'));
    }

    public function editDataBlog($id)
    {
        $mod = Blog::find($id);      

        return view('editBlog', compact('mod'));
    }

    public function updateDataBlog(Request $request, $id)
    {
        $data = Blog::find($id);                            

        $data->id_user = $request->id_user;
        $data->judul_blog = $request->judul_blog;        
        $data->kategori = $request->kategori;
        $data->slug = \Str::slug($request->judul_blog);
        $data->isi_blog = $request->isi_blog;
    
        if($request->cover_new == NULL){
            $data->cover = $request->cover;
        }else{
            $cover = time().'.'.$request->cover_new->extension();
            $request->cover_new->move(public_path('image/cover'), $cover);
            $data->cover = $cover;
        }           
        $data->save();
        
        return redirect(url('admin/blog'));
    }

    public function deleteDataBlog($id)
    {
        DB::table('blog')->where('id_blog', $id)->delete();        

        return redirect(url('admin/blog'));
    }

}
