<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Auth;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

  public function index(){
    $message = \App\Message::all();
    return view('message', ['message' => $message]);
  }

  public function show(message $id)
  {
    return view('message.show', ['message' => $id]);
  }

  public function create()
  {
    return view('novaMensagem');
  }

  public function validator(Request $request){
    return Validator::make($request, [
      'sender_id' => 'required|integer',
      'sent_to_id' => 'required|integer',
      'body' => 'required|string|max:255',
      'subject' => 'required|string|max:255',
    ]);
  }

  public function store(Request $request)
  {
    $message = new Message;
    $message->sender_id = Auth::user()->id;
    $message->sent_to_id = request('sent_to_id');
    $message->body = request('body');
    $message->subject = request('subject');
    $message->save();
    return redirect('/message');
      /*Auth::user()->sent()->create([
          'body'       => $request->body,
          'subject'    => $request->subject,
           // Send the message from the current user to the user with ID of 1,
          'sent_to_id' => 1,
      ]);*/

      // Set flash message, render view, etc...
  }

  public function composeMessage()
    {
        // ...

        // Get a collection of `[id => name]` probable recipients,
        // so that the logged-in user can choose from. Note that
        // you probably want to exclude the current user herself
        // from the list.
        $users = User::where('id', '!=', Auth::id())->pluck('name', 'id');

        return view('novaMensagem', compact('users'));
    }
}
