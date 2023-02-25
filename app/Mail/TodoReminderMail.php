<?php

namespace App\Mail;

use App\Models\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TodoReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $todo;
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Todo Reminder Mail',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Content
    //  */
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array
    //  */
    // public function attachments()
    // {
    //     return [];
    // }
    public function build(){
        $subject = 'Reminder: Todo "'.$this->todo->title . '" iscompleted';
        return $this->subject($subject)->markdown('emails.todo-reminder');
    }
}
