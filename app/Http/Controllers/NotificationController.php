<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Chatify\Facades\ChatifyMessenger as Chatify;
class NotificationController extends Controller
{
    public function sendNotification($user_id, $message)
    {
        $sender = auth()->user(); // get the current user

        $conversation = Chatify::getConversation($user_id); // get the conversation with the user

        // send the message
        Chatify::newMessage([
            'sender_id' => $sender->id,
            'receiver_id' => $user_id,
            'body' => $message,
            'type' => 'text',
            'conversation_id' => $conversation['id'],
        ]);

        // send the notification
        Chatify::sendNotification([
            'sender_id' => $sender->id,
            'receiver_id' => $user_id,
            'message' => $message,
            'conversation_id' => $conversation['id'],
        ]);

        return response()->json(['status' => 'success']);
    }
}

