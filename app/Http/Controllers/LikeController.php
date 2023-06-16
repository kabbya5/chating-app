<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Replay;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('JWT');
    }    
    public function store(Replay $replay){
        $replay->likes()->create([
            'user_id' => auth()->id(),
        ]);
    }
  
   
    public function destroy(Replay $replay)
    {
        $replay->likes()->where('user_id',auth()->id())->delete();
    }
}
