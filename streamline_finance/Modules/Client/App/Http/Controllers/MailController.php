<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mail;
use App\Mail\ClientReminder;

  

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from Streamline Health Tech',
            'body' => 'This is for testing email using smtp and asking for our money bro...!'
        ];
         
        Mail::to('lemi.manoah@gmail.com')->send(new ClientReminder($mailData));
        
        return redirect()->route('home')//return them to reactivate inactive users
        ->with('success','Email sent successfully');
    }
    public function create()
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
