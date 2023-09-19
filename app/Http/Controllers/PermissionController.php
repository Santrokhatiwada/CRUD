<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()

{
    $this->middleware('permission:read_permission')->only('index','show');
    $this->middleware('permission:create_permission')->only('create','store');
    $this->middleware('permission:update_permission')->only('edit','update');
    $this->middleware('permission:delete_permission')->only('destroy');
    
}
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          
            
            'name' => 'required|unique:permissions',
            
     
        ]);

         $input = $request->all();
   
         Permission::create($input);

      
      
        return redirect()->route('admin.permissions.index')
                        ->with('success','Permission created successfully.');
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
    public function edit(Permission $permission)
    {
        return view('admin.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
          
            
            'name' => 'required',
         

        ]);


        $input = $request->all();
        $permission->update($input);


    
        return redirect()->route('admin.permissions.index')->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();    //ya pural garda database bata delete hudaina
      
        return redirect()->route('admin.permissions.index')
                        ->with('success','Role deleted successfully');
    }
}
