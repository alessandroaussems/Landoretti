<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where("userid",Auth::id())->orderBy("created_at","DESC")->get();
        return view("messages")->with("messages",$messages);
    }
}
