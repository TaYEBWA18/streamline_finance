<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Client\App\Http\Requests\CreateClientRequest;
use Modules\Client\App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients=Client::paginate(10);

        return view('client::clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client::clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateClientRequest $request): RedirectResponse
    
    {
        $validatedData = $request->validated();

        Client::create($validatedData);


        return redirect()->route('client.index')->with('success', 'Client created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('client::clients.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // return view('client::edit');
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
