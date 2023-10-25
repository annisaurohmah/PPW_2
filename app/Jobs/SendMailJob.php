<?php
namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable,
    SerializesModels;

    
 /**
 * Create a new job instance.
 */     public $content;

        public function __construct(array $content)
        {
            $this->content = $content;
        }
 /**
 * Execute the job.
 */
        public function handle(): void
        {
            $email = new SendEmail($this->content);
            Mail::to($this->content['email'])->send($email);
        }
        }