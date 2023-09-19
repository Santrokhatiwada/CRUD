<?php
 
namespace App\Http\Controllers;
 
use App\Models\Category;
use Illuminate\Http\Request;
 
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function __construct()

{
    $this->middleware('permission:read_category')->only('index','show');
    $this->middleware('permission:create_category')->only('create','store');
    $this->middleware('permission:update_category')->only('edit','update');
    $this->middleware('permission:delete_category')->only('destroy');
    
}
    public function index()
    {
        $Categorys = Category::latest()->get();
     
        return view('admin.category.index',compact('Categorys'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=$request->image;
        $dbname=null;
          if ($image){
              $dbname= 'category-image-'.time().'.'.$image->clientExtension(); 
              $source=$image->getRealPath();
              $destination='uploads/categories/'.$dbname;
              
              copy($source,$destination);
  
          }
  
         
          
  
          $category = Category::create([
            'categories' => $request->categories,
            'description' => $request->description,
            'image' => $dbname,
            'is_active' => $request->is_active,
        ]);
    
      
        return redirect()->route('admin.categories.index')
                        ->with('success','Category created successfully.');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
  
        return view('admin.category.show',compact('category'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        
        return view('admin.category.edit',compact('Category'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category)
    {
        // Validate the request inputs
        $request->validate([
            'categories' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Add validation rules for the image
        ]);
    
        $input = $request->all();
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'category-image-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/categories'), $imageName);
            $input['image'] = $imageName;
        }
    
        $Category->update($input);
    
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }
    
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        $Category->delete();
      
        return redirect()->route('admin.categories.index')
                        ->with('success','Category deleted successfully');
    }

    public function destroyphoto(Category $Category)
    {
        $Category->image->delete();
      
        return redirect()->route('admin.categories.edit')
                        ->with('success','Category deleted successfully');
    }
}