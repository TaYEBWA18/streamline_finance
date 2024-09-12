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
        $subscriptions =Subscription::paginate(10);

        return view('client::subscriptions.index', compact('subscriptions'));
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
    public function store(Request $request)
    {
        Subscription::create(
            $request->all()
        );   
        return redirect()->route('subscription.index')
            ->with('success', 'Subscription created successfully.');


    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $subscription=Subscription::findOrFail($id);

        return view('client::show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subscription=Subscription::findOrFail($id);

        $clients=Client::all();

        return view('client::subscriptions.edit', compact('subscription', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $subscription=Subscription::findOrFail($id);
        $subscription->update($request->all());

        return redirect()->route('subscription.index')
            ->with('success', 'Subscription updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
