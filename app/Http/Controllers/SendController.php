<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;

class SendController extends Controller
{
    public function message(Request $request){
        // Get data from middleware
        $data = $request->data;

       // Validation
       $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
       ]);

       // Make data
       $message = new Messages;
       $message->name = $request->name;
       $message->email = $request->email;
       $message->phone = $request->phone;
       $message->subject = $request->subject;
       $message->message = $request->message;
       $message->readed = 0;

       // Save
       $message->save();
      
        // Success response
        echo 1;
    } 

}
