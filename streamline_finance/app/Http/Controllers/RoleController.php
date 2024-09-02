<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\permission_categories;
use Spatie\Permission\Models\Permission;




class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
       // To View Permissions attached to this role
        $permissions=Permission::all();
        //to return the index view
        $roles = Role::paginate(10);
       
        return view('roles.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=permission_categories::all();

        $permissions=Permission::all();
        //to return the create function
        return view('roles.create', compact('permissions', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function assignPermissions(Request $request, string $id){
        //to get the role
        $role = Role::findById($id);

        //to detach all permissions from the role

        //to attach the selected permissions to the role
        $role->syncPermissions($request->permissions);

        //to redirect to the roles index page
        return redirect()->route('roles.index')->with('success', 'Permissions assigned successfully.');
    }
     public function store(Request $request)
    {
        //to validate the request data
        $request->validate([
            'name' => ['required','string','max:255'],
        ]);

        //to create a new role
        $role = Role::create(['name' => $request->name]);
        // Sync permissions with the role
        $role->syncPermissions($request->permissions);


        //to redirect to the roles index page
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);

        $permissions=Permission::all();

        $categories=permission_categories::all();

        return view('roles.edit', compact('categories', 'permissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //to validate the request data
        $request->validate([
            'name' => ['required','string','max:255'],
        ]);

        //to get the role
        $role = Role::findById($id);

        //to update the role
        $role->update(['name' => $request->name]);

        //to sync permissions with the role
        $role->syncPermissions($request->permissions);

        //to redirect to the roles index page
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role=Role::findOrFail($id);

        $role->delete();
         
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
    
}
