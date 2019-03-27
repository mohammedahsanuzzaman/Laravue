<?php

namespace App\Http\Controllers;

use App\Model\Like;
use Illuminate\Http\Request;
use App\Model\Reply;

class LikeController extends Controller
{
    public function Likeit(Reply $reply)
    {
        $reply->Like()->create([
            // 'user_id' => auth()->id()
            'user_id'=> 1
        ]);
    }

    public function unLikeit(Reply $reply)
    {
        // $reply->Like()->where(['user_id',auth()->id()])->first()->delete();
        $reply->Like()->where('user_id','1')->first()->delete();
    }
}
