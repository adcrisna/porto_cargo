<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verifiationNotice()
    {
        return view('auth.verify-email');
    }
    
    public function verify(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            abort(403);
        }

        if ($user->hasVerifiedEmail()) {
            return redirect('/')->with('info', 'Email already verified.');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
            return redirect('/')->with('success', 'Email successfully verified.');
        } else {
            return redirect('/')->with('error', 'Failed to verify email.');
        }
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
