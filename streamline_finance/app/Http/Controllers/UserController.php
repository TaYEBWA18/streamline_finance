<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'password' =>'required',
            'gender' =>'required',
            'phone' =>'required',  
        ]);
        User::create(
            $request->all(),
        );

        return redirect()->route('loginpage')->with('success', 'User registered successfully, please login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::findOrFail($id);//find the particular ID
        
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findOrFail($id);//find the particular ID
        
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $user=User::findOrFail($id);// get the current user ID
       dd($user); 
        $request->validate([
            'name' =>'required',
            'email' => 'required|email|max:255|unique:user,email,' . $user_id, // Ignore the current user's email
            'gender' =>'required',
            'phone' =>'required',  
        ]);
        dd($request); 
       $user->update($request->validated());
        dd($request->validated());

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
