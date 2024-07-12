<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use App\Models\Answer;

class LikeController extends Controller
{
    public function discussionLike(string $discussionSlug) {      
        $discussion = Discussion::where('slug', $discussionSlug)->first();
        $discussion->like();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $discussion->likeCount,
            ],
        ]);
    }
    public function discussionUnlike(string $discussionSlug) {
        $discussion = Discussion::where('slug', $discussionSlug)->first();
        $discussion->unlike();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $discussion->likeCount,
            ],
        ]);
    }

    public function answerLike(string $answerId) {
        $answer = Answer::find($answerId);
        
        $answer->like();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $answer->likeCount,
            ]
        ]);
    }

    public function answerUnlike(string $answerId) {
        $answer = Answer::find($answerId);
        
        $answer->unlike();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $answer->likeCount,
            ]
        ]);
    }
}
