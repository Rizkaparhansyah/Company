<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function notice()
    {
        return 'Mohon Verifikasi Email';
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->intended('/dashboard');
    }
    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return "email berhasil di kirim";
    }
}
