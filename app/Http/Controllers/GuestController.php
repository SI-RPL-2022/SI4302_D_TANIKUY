<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Auth;

class GuestController extends Controller
{
    public function index()
    {
        $mod = DB::table('blog')
                ->select('blog.id_blog', 'blog.judul_blog', 'blog.kategori', 'blog.created_at', 'blog.slug',
                        'blog.cover', \DB::raw('SUBSTRING(blog.isi_blog, 1, 200) as isi_singkat'))            
                ->orderBy('blog.judul_blog', 'ASC')
                ->paginate(3);   
        
        $informasi_terkini = DB::table('blog')
            ->select('blog.id_blog', 'blog.judul_blog', 'blog.kategori', 'blog.created_at', 
                    'blog.cover', \DB::raw('SUBSTRING(blog.isi_blog, 1, 70) as isi_singkat'))            
            ->orderBy('blog.created_at', 'DESC')
            ->limit(2)
            ->get();

        return view('showAllBlog', compact('mod', 'informasi_terkini'));
    }

    public function cariBlog(Request $request)
    {
        $keyword = $request->search;
        $mod = DB::table('blog')            
                ->select('blog.id_blog', 'blog.judul_blog', 'blog.kategori', 'blog.created_at', 'blog.slug',
                        'blog.cover', \DB::raw('SUBSTRING(blog.isi_blog, 1, 200) as isi_singkat'))            
                ->orderBy('blog.judul_blog', 'ASC')
                ->where('blog.judul_blog', 'like', "%". $keyword . "%")
                ->paginate(3);     

        $informasi_terkini = DB::table('blog')
            ->select('blog.id_blog', 'blog.judul_blog', 'blog.kategori', 'blog.created_at', 
                    'blog.cover', \DB::raw('SUBSTRING(blog.isi_blog, 1, 70) as isi_singkat'))            
            ->orderBy('blog.created_at', 'DESC')
            ->limit(2)
            ->get();        

        return view('showAllBlog', compact('mod', 'informasi_terkini'));
    }

    public function cariKategoriBlog(Request $request)
    {
        $keyword = $request->search_kategori;
        $mod = DB::table('blog')            
                ->select('blog.id_blog', 'blog.judul_blog', 'blog.kategori', 'blog.created_at', 'blog.slug',
                        'blog.cover', \DB::raw('SUBSTRING(blog.isi_blog, 1, 200) as isi_singkat'))            
                ->orderBy('blog.judul_blog', 'ASC')
                ->where('blog.kategori', 'like', "%". $keyword . "%")
                ->paginate(3);

        $informasi_terkini = DB::table('blog')
                ->select('blog.id_blog', 'blog.judul_blog', 'blog.kategori', 'blog.created_at', 
                        'blog.cover', \DB::raw('SUBSTRING(blog.isi_blog, 1, 70) as isi_singkat'))            
                ->orderBy('blog.created_at', 'DESC')
                ->limit(2)
                ->get();                 

        return view('showAllBlog', compact('mod', 'informasi_terkini'));
    }

    public function detailBlog($slug)
    {
        $mod = Blog::where('slug', $slug)->first();

        return view('showDetailBlog', compact('mod'));
    }
}
