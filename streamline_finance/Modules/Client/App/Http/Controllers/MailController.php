<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDF;
use Mail;
use App\Mail\ClientReminder;
use App\Models\Client;

  

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index($id)
    {
        $client = Client:: findOrFail($id);
        
        $data["email"] = "2020bse063@std.must.ac.ug";
        $data["title"] = "Streamline Health";
        $data["body"] = "This is a Demo Mail";
    
        $pdf = PDF::loadView('client::emails.custommail', $data);
        $data["pdf"] = $pdf;

  
        Mail::to($data["email"])->send(new ClientReminder($data));
        
        return redirect()->route('home')//return them to reactivate inactive users
        ->with('success','Email sent successfully');
    }
    public function create()
    {
        return view('client::emails.custommail');
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
