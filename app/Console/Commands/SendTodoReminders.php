<?php

namespace App\Console\Commands;

use App\Mail\TodoReminderMail;
use App\Models\Todo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTodoReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todos:send-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email reminders for completed todos';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $completed = Todo::where('end_date','<',now())->get();
        foreach($completed as $todo){
            $user = $todo->user;
            Mail::to($user->email)->send(new TodoReminderMail($todo));
        }
    }
}
