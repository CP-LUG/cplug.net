<?php

namespace App\Http\Controllers;

use App\Mail\MailingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate inputs
        $request->validate(
            [
                'email' => 'required|email',
                'type' => 'required',
            ],
            [
                'email.required' => 'Please enter your email address',
                'email.email' => 'Please enter your email address',
                'type.required' => 'Please select subscription type',
            ]
        );

        $message = 'subscribe';
        // check which list the user is trying to get on
        switch ($request->type) {
            case 'regular':
                $to = 'subscribe';
                break;
            case 'digest':
                $to = 'subscribe-digest';
                break;
            case 'nomail':
                $to = 'subscribe-nomail';
                break;
            case 'unsub':
                $to = 'unsubscribe';
                $message = 'unsubscribe';
                break;
            default:
                return redirect()->route('contact')->withInput()->withErrors(['bad_subscription_type' => 'Unrecognized subscription type']);
                break;
        }

        Mail::to("cplug+$to@mail.cplug.net")->send(new MailingList($request->email, $message));

        return redirect()->route('contact')->with('status', 'Congrats! You are successfully subscribed.');
    }
}
