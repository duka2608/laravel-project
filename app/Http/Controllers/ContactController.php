<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactMailRequest;


class ContactController extends BaseController
{
    public function index() {
        return view('pages.client.contact', $this->data);
    }

    public function submit(ContactMailRequest $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        try {
            Mail::to('dusko.stupar.128.16@ict.edu.rs')
                ->send(new ContactMail($email, $subject, $message, $name));
            $this->log->logActivity([
                'user_id' => $request->session()->get('user')->id,
                'activity' => 'Mail sent to admin'
            ]);
            return redirect()->back()->with('message', 'Mail has been sent successfully.');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back();
        }
    }
}
