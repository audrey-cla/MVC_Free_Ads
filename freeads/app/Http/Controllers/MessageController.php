<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Conversation;

class MessageController extends Controller
{
    public function index()
    {
        $conversations = User::find(Auth::user()->id)->conversations;
        return view('messagerie.index', compact('conversations'));
    }

    public function showconv($id)
    {
        if (Auth::user()->id == $id) {
            return redirect('messages/');
        } else {
            $conversations = User::find(Auth::user()->id)->conversations;
            foreach ($conversations as $conversation) {
                foreach ($conversation->users as $member) {
                    if ($member->id == $id) {
                        $trueconversation = $conversation;
                    }
                }
            }
            return view('messagerie.conversation', compact('conversations'), compact('trueconversation'));
        }
    }
}
