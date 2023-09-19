<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\AssignRole;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function __construct()

{
    $this->middleware('permission:read_user')->only('index','show');
    $this->middleware('permission:create_user')->only('create','store');
    $this->middleware('permission:update_user')->only('edit','update');
    $this->middleware('permission:delete_user')->only('destroy');

    $this->middleware('permission:read_role')->only('index','show');
    $this->middleware('permission:create_role')->only('create','store');
    $this->middleware('permission:update_role')->only('edit','update');
    $this->middleware('permission:delete_role')->only('destroy');

    $this->middleware('permission:read_permission')->only('index','show');
    $this->middleware('permission:create_permission')->only('create','store');
    $this->middleware('permission:update_permission')->only('edit','update');
    $this->middleware('permission:delete_permission')->only('destroy');
    
}

    public function index()
    {
        $users = User::latest()->get();

        return view('admin.user.index',compact('users'));
     
        // return view('admin.user.index',compact('Users'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     

        $request->validate([
          
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role_id'=>['required',new AssignRole],
     

        ]);

        //  $input = $request->all();
   
     
        // $user=User::create($input);
        $user = User::create([
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
            'email' => $request['email']
        ]);
       

        $user->assignRole($request->role_id);
      
        return redirect()->route('admin.users.index')
                        ->with('success','User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        
         return view('admin.user.show',compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles=Role::get();
        return view('admin.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validate the request inputs
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'role_id'=>['required',new AssignRole],
            
        ]);
    
        
        // $input = $request->except('password');
        
        // $user->update($input);
        $user -> update([
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
            'email' => $request['email']
        ]);

        $user->syncRoles($request->role_id);

    
        return redirect()->route('admin.users.index')->with('success', 'Users updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
      
        return redirect()->route('admin.users.index')
                        ->with('success','User deleted successfully');
    }
}
