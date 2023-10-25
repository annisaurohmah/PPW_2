<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

    class SendEmail extends Mailable
        {
        use Queueable, SerializesModels;
        public $data;

        ///inisiasi object yang akan digunakan
        public function __construct(array $data)
        {
            $this->data = $data;
        }

        ///mengatur struktur email yang lebih spesifik seperti melakukan konfigurasi pengirim email, menampilkan template email dan menambahkan attachment.
        public function build()
        {
            return $this->subject($this->data['subject'])->view('sendemail');
        }
    }
