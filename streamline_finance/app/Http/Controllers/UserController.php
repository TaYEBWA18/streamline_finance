<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\CreateUserRequest;


class UserController extends Controller
{
    protected $user;

    public function __construct()
    {
//         $user = User::findOrFail($id);
//         $this->middleware('auth');
//         $this->user = Auth::user();
//         // Load the user with their roles and permissions
//         $this->user->load('roles', 'permissions');

        $this->middleware('permission:create_users', ['only' => ['create','store']]);
        $this->middleware('permission:delete_users', ['only' => ['destroy']]);
        $this->middleware('permission:edit_users', ['only' => ['edit','update']]);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        //return the users table
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::all();// Pick the roles available from the roles Table

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        
        $user=User::create(
            $request->all(),
        );
        // dd($user);
        $user->assignRole($request->roles);
        
        // $user->syncRoles();// Assign role to user 

        return redirect()->route('loginpage')->with('success', 'User registered successfully, please login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::findOrFail($id);//find the particular ID

        $user->load('roles');
        
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles=Role::all();// Pick the roles available from the roles Table

        $user=User::findOrFail($id);//find the particular ID
        
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $user=User::findOrFail($id);// get the current user ID
    //    dd($user); 
        $request->validate([
            'name' =>'required',
            'email' => 'required|email|max:255|unique:users,email,' . $id, // Ignore the current user's email
            'gender' =>'required',
            'phone' =>'required',  
        ]);
        // dd($request); 
       $user->update($request->all());
       //Assign the new role
       $user->assignRole($request->roles);

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::findOrFail($id);

        $user->delete();
         
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
    public function login(Request $request){
     // $credentials = $request->only('email', 'password');
     $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Attempt to log the user in
    if (Auth::attempt($credentials)) {
        // Authentication passed
        $request->session()->regenerate();

        return redirect()->route('users.index')
                         ->with('success', 'You are successfully logged in!');
    }

    // Authentication failed
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');

}
public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    
    return redirect()->route('loginpage')
                         ->with('success', 'You have been successfully logged out!');

}

//inactive users
public function inactiveUsers(){
    $users=User::onlyTrashed()->paginate(10);//view only trashed patients

    return view('users.inactive', compact('users'));
 }

 //restore function to reactivate inactive users
 public function restore($id){
    $user=User::withTrashed()->where('id', $id)->first();

    $user->restore();

    return redirect()->route('inactive.users')
                        ->with('success','User restored successfully');
 }

 //delete function to permanently delete inactive users
//  public function deleteUser($id){
//     $user=User::withTrashed()->where('id', $id)->first();
//     $user->forceDelete();

//     return redirect()->route('inactiveUsers')
//                         ->with('success','User deleted permanently');
//  }
}
