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
    //permission middleware
    public function __construct()
    {

        $this->middleware('permission:create_clients', ['only' => ['create','store']]);
        $this->middleware('permission:delete_clients', ['only' => ['destroy']]);
        $this->middleware('permission:edit_clients', ['only' => ['edit','update']]);

    }
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
        $client=Client::find($id);

        return view('client::clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateClientRequest $request, $id): RedirectResponse
    {

        $validatedData = $request->validated();

        Client::find($id)->update($validatedData);

        return redirect()->route('client.index')->with('success', 'Client updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client=Client::findOrFail($id);

        $client->delete();
         
        return redirect()->route('client.index')
                        ->with('success','Client deleted successfully');
    }
    //inactive users
public function inactiveClient(){
    $clients=Client::onlyTrashed()->paginate(10);
    //view only trashed patients
    return view('client::clients.inactive', compact('clients'));
 }

 //restore function to reactivate inactive users
 public function restore($id){
    $client=Client::withTrashed()->where('id', $id)->first();

    $client->restore();

    return redirect()->route('inactive.clients')//return them to reactivate inactive users
                        ->with('success','Client restored successfully');
 }

}
