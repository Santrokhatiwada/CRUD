<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function __construct()

{
    $this->middleware('permission:read_role')->only('index','show');
    $this->middleware('permission:create_role')->only('create','store');
    $this->middleware('permission:update_role')->only('edit','update');
    $this->middleware('permission:destroy_role')->only('destroy');
    
}
    public function index()
    {
        $roles = Role::latest()->get();
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
          
            
            'name' => 'required|unique:roles',
            'permission_ids' => 'required',
     

        ]);

         $input = $request->all();
   
         $role=Role::create($input);

        $role->givePermissionTo($request->permission_ids);
      
        return redirect()->route('admin.roles.index')
                        ->with('success','Role created successfully.');
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
    public function edit(Role $role)
    {
     $selectedPermissions=$role->getAllPermissions();
        $permissions=Permission::get();
        return view('admin.role.edit',compact('selectedPermissions','role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
          
            
            'name' => 'required',
            'permission_ids' => 'required',
     

        ]);


        $input = $request->all();
        $role->update($input);

        $role->syncPermissions($request->permission_ids);

    
        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        
        $role->delete();
      
        return redirect()->route('admin.roles.index')
                        ->with('success','Role deleted successfully');
    }
}
