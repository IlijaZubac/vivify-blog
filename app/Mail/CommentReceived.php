<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use App\Post;
 
 
use Illuminate\Queue\SerializesModels;
USE Illuminate\Bus\Queueable;

class CommentReceived extends Mailable

{
    use Queueable, SerializesModels;

    public $post;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
       $this->post =$post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.comment_received');
    }
}
