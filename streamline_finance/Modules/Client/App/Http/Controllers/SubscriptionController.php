<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Client\App\Models\Subscription;
use Modules\Client\App\Models\Client;


class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client::subscriptions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients=Client::all();
        return view('client::subscriptions.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'status' =>'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        
        dd($validatedData);

        Subscription::create($validatedData);

        return redirect()->route('subscription.index')
            ->with('success', 'Subscription created successfully.');


    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('client::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('client::edit');
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
