<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplayResource;
use App\Models\Question;
use App\Models\Replay;
use App\Notifications\NewReplyNotification;
use Illuminate\Http\Request;
use Auth;

class ReplayController extends Controller
{
    public function __construct(){
        $this->middleware('JWT', ['except' => ['index','show']]);
    }
    public function index(Question $question)
    {
        return ReplayResource::collection($question->replies);
    }


    public function store(Request $request,Question $question)
    {
        $replay = $question->replies()->create($request->all() + ['user_id' => auth()->id()]);

        $user = $question->user;

        $user->notify(new NewReplyNotification($replay));
    }

    public function destroy(Question $question,Replay $replay)
    {
        $replay->delete();
        
    }
}
