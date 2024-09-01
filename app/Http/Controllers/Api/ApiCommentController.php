<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comment as ResourcesComment;
use App\Http\Resources\CommentCollection;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isFalse;

class ApiCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all()->where('user_id',auth()->user()->id);
        if(blank($comments)) {
            return response([
                'message' => 'There is no comments'
            ], 404);
        }
        return new CommentCollection($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $order_id = $_GET['order_id'];
        $body = $request->input('body');

        // Check if order_id exist
        $order = Order::where('id',$order_id)->get();
        if(blank($order)) {
            return response([
                'message' => 'Page not found!',
            ], 404);
        }

        // Create comment
        Comment::create([
            'user_id' => $user_id,
            'order_id' => $order_id,
            'body' => $body,
        ]);
        return response([
            'message' => 'comment created!'
        ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::find($id);
        
        if($comment->user_id !== auth()->user()->id) {
            return response('Unauthtenticated!', 401);
        }
        return new ResourcesComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrfail($id);
        if($comment->user_id !== auth()->user()->id) {
            return response('Unauthtenticated!', 401);
        }

        $comment->delete();

        return response([
            'message' => 'comment deleted!'
        ],200);
    }
}
