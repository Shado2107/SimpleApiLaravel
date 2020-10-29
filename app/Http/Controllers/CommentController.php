<?php

namespace App\Http\Controllers;

use App\Http\Resources\Comment as ResourcesComment;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Comment::orderByDesc('created_at')->get();

        //return $comments->toJson(JSON_PRETTY_PRINT);

        // return ResourcesComment::collection(Comment::orderByDesc('created_at')->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Comment::create($request->all())){
            return response()->json([
                'success'=>'crée avec success'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return new ResourcesComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        
        if ($comment->update($request->all())){
            return response()->json([
                'success'=>'mis a jour avec success'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if ($comment->delete()){
            return response()->json([
                'success'=>'delete avec success'
            ], 200);
        }
    }
}
