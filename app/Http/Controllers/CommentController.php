<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCommentRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{
    protected $user;
    protected $comment;

    public function __construct(Comment $comment, User $user) {
        $this->user = $user;
        $this->comment = $comment;
    }

    public function index(Request $request, $userId) {
        $search = $request->search;
        $user = $this->user->find($userId);
        if(!$user) {
            return redirect()->route('users.index');
        }

        $comments = $user->comments()
            ->where('body', 'LIKE', "%{$search}%")
            ->get();

        return view('users.comments.index', [
            'user' => $user,
            'comments' => $comments,
            'search' => $search
        ]);
    }

    public function create($userId) {
        $user = $this->user->find($userId);
        if(!$user) {
            return redirect()->route('users.index');
        }

        return view('users.comments.create', [
            'user' => $user
        ]);
    }

    public function addComment(StoreUpdateCommentRequest $request, $userId) {
        $user = $this->user->find($userId);
        if(!$user) {
            return redirect()->route('users.index');
        }

        $user->comments()->create([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('users.index', $user);
    }

    public function editComment($userId, $id) {

        $comment = $this->comment->find($id);
        if(!$comment) {
            return redirect()->route('users.index');
        }

        $user = $comment->user;
        
        return view('users.comments.edit', [
            'user' => $user,
            'comment' => $comment
        ]);
    }

    public function updateComment(StoreUpdateCommentRequest $request, $id) {
        $comment = $this->comment->find($id);
        if(!$comment) {
            return redirect()->route('users.index');
        }

        //ATUALIZANDO UM COMENTARIO DO USUARIO
        $comment->update([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $comment->user_id); //RETORNANDO O USUARIO PARA A PAGINA APÓS A EDIÇÃO
    }
}
