<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Khởi tạo một thông điệp mới.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Xây dựng nội dung email.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('thanhnamnguyen769@gmail.com', 'BOT CHAT')
                    ->subject($this->data['subject'])
                    ->view('emails.emails') // Sử dụng 'emails.emails' làm view cho email
                    ->with([
                        'data' => $this->data,
                    ]);
    }
}
