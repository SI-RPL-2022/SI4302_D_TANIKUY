<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\ReplyForum;
use App\Models\LikeForum;
use App\Models\DislikeForum;
use DB;
use Auth;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mod = DB::table('forum')
                ->select('forum.judul_forum', 'forum.isi_forum', 'users.name', 'forum.created_at',
                'forum.id_forum', 'forum.id_user')
                ->join('users', 'users.id', '=', 'forum.id_user')
                ->orderBy('forum.created_at', 'DESC')
                ->get();

        return view('showForum', compact('mod'));
    }

    public function create()
    {
        return view('addForum');
    }

    public function store(Request $request)
    {
        $mod = new Forum;
        $mod->id_user=$request->id_user;
        $mod->judul_forum=$request->judul_forum;
        $mod->isi_forum= $request->isi_forum;

        $mod->save();
        return redirect(route('forum.show'));
    }

    public function showReply($id)
    {
        $forum = Forum::find($id);
        $count_reply = DB::table('reply_forum')
                        ->join('forum', 'reply_forum.id_forum', '=', 'forum.id_forum')
                        ->where('forum.id_forum', $id)
                        ->groupBy('forum.id_forum')
                        ->count();

        $reply_forum = DB::table('reply_forum')
                    ->select('reply_forum.id_user', 'reply_forum.isi_reply_forum', 'reply_forum.id_reply_forum', 'users.name', 'reply_forum.created_at')
                    ->join('users', 'users.id', '=', 'reply_forum.id_user')
                    ->join('forum', 'forum.id_forum', '=', 'reply_forum.id_forum')
                    ->orderBy('reply_forum.created_at', 'DESC')
                    ->where('reply_forum.id_forum', $id)
                    ->get();

        $count_like = DB::table('like_forum')
                    ->join('forum', 'like_forum.id_forum', '=', 'forum.id_forum')
                    ->where('forum.id_forum', $id)
                    ->groupBy('forum.id_forum')
                    ->count();

        $check_like = DB::table('like_forum')
                    ->select('like_forum.id_like_forum')
                    ->where('like_forum.id_forum', $id)
                    ->where('like_forum.id_user', Auth::user()->id)
                    ->first();

        return view('show_ReplyForum', compact('forum', 'reply_forum', 'count_reply', 'count_like', 'check_like'));
    }

    public function storeReply(Request $request)
    {
        $mod = new ReplyForum;
        $mod->id_user=$request->id_user;
        $mod->id_forum=$request->id_forum;
        $mod->isi_reply_forum= $request->isi_reply_forum;

        $mod->save();
        return redirect()->back();
    }

    public function searchForum(Request $request)
    {
        $keyword = $request->search;
        $mod = DB::table('forum')
                ->select('forum.judul_forum', 'forum.isi_forum', 'users.name', 'forum.created_at',
                        'forum.id_forum')
                ->join('users', 'users.id', '=', 'forum.id_user')
                ->orderBy('forum.created_at', 'DESC')
                ->where('forum.judul_forum', 'like', "%". $keyword . "%")
                ->get();

        return view('showForum', compact('mod'));
    }

    public function editForum(Request $request, $id)
    {
        $model = Forum::find($id);
        $model->isi_forum=$request->isi_forum;
        $model->save();

        return redirect()->back();
    }

    public function hapusForum($id)
    {
        $model = Forum::find($id);
        $model->delete();

        return redirect()->back();
    }

    public function editReply(Request $request, $id)
    {
        $model = ReplyForum::find($id);
        $model->isi_reply_forum=$request->isi_reply_forum;
        $model->save();

        return redirect()->back();
    }

    public function hapusReply($id)
    {
        $model = ReplyForum::find($id);
        $model->delete();

        return redirect()->back();
    }

    public function tambahLikeForum(Request $request)
    {
        $check = DB::table('like_forum')
                    ->where('id_forum', $request->id_forum)
                    ->where('id_user', $request->id_user)
                    ->first();

        if($check == NULL){
            $mod = new LikeForum;
            $mod->id_forum= $request->id_forum;
            $mod->id_user=$request->id_user;
            $mod->save();

            return redirect()->back();
        }else{
            return redirect()->back()->with('alert', 'Anda sudah like forum ini!');;
        }
    }

    public function tambahDislikeForum(Request $request, $id_user, $id_forum)
    {
        DB::table('like_forum')->where('id_user', $id_user)->where('id_forum', $id_forum)->delete();

        return redirect()->back();
    }
}
