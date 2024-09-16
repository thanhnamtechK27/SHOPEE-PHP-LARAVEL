<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\Http\Requests\MemberRegisterRequest;

class MailController extends Controller
{
    /**
     * Gửi email xác nhận đăng ký.
     *
     * @param  \App\Http\Requests\MemberRegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function sendRegistrationEmail(MemberRegisterRequest $request)
    {
        // Validate request data
        $validatedData = $request->validated();

        // Prepare data for the email
        $data = [
            'subject' => 'Xác nhận đăng ký',
            'body' => 'Cám ơn bạn đã đăng ký!',
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'message' => $validatedData['message'],
            'id_country' => $validatedData['id_country'],
            'address' => $validatedData['address'],
            'avatar' => '', // Initialize avatar variable
            'level' => $validatedData['level'],
        ];

        // Check if avatar file exists in request
        if ($request->hasFile('avatar')) {
            // Store the avatar file
            $avatarPath = $request->file('avatar')->store('avatars', 'public'); // Save avatar to 'storage/app/public/avatars'
            $data['avatar'] = $avatarPath;
        }

        try {
            // Send email using MailNotify Mailable class
            Mail::to($data['email'])->send(new MailNotify($data));
            return response()->json(['message' => 'Email đã được gửi thành công, vui lòng kiểm tra hộp thư của bạn']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Không thể gửi email.']);
        }
    }
}
