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
            return redirect('messages/done');
        } else {
            $conversations = User::find(Auth::user()->id)->conversations;
            $trueconversation = [];
            foreach ($conversations as $conversation) {
                foreach ($conversation->users as $member) {
                    if ($member->id == $id) {
                        $trueconversation = $conversation;
                    }
                }
            }

            if (empty($trueconversation)) {
                $conversations = new Conversation();
                $conversations->save();
                $conversations->users()->attach($id);
                $conversations->users()->attach(Auth::user()->id);
                $conversations = User::find(Auth::user()->id)->conversations;

                return back();
            }
           
           
           
            return view('messagerie.conversation', compact('conversations'), compact('trueconversation'));
        }
    }


    public function store(Request $request)
    {
        $this->validate(
            $request,
            ['content' => 'required']
        );
        $id = Auth::id();
        $annonce = new Message([
            'user_id' => $id,
            'content' => $request->input('content'),
            'conversation_id' => $request->input('conversation_id'),
        ]);
        $annonce->save();
        return back();
    }
}
