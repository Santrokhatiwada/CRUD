<?php
 
namespace App\Http\Controllers;
 
use App\Models\Blog;
use App\Models\Category;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
 
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function __construct()

{
    $this->middleware('permission:read_blog')->only('index','show');
    $this->middleware('permission:create_blog')->only('create','store');
    $this->middleware('permission:update_blog')->only('edit','update');
    $this->middleware('permission:delete_blog')->only('destroy');
    
}
    public function index()
    {
        $Blogs = Blog::latest()->get();
     
        return view('admin.blog.index',compact('Blogs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::get();
        return view('admin.blog.create', compact('categorys'));
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
            $dbname= 'blog-image-'.time().'.'.$image->clientExtension(); 
            $source=$image->getRealPath();
            $destination='uploads/blogs/'.$dbname;
            
            copy($source,$destination);

        }

        $category=Category::find($request->category_id);

        $category->blogs()->create([
            'header' => $request->header,
            'slug' => $request->slug,
            'body' => $request->body,
            'image' => $dbname,
            'is_active' => $request->is_active,

        ]);
  
        // $category->blogs()->$request->validate([
        //     'category_id' => ['required', new Category],
        //     'header' => 'required',
        //     'body' => 'required',
        //     'slug' => 'required',

        // ]);
       


        // $request->validate([
        //     'header' => 'required',
        //     'body' => 'required',
        //     'slug' => 'required',
           
        // ]);

   
        // $input = $request->all();
   
     
        // Blog::create($input);
      
        return redirect()->route('admin.blogs.index')
                        ->with('success','Blog created successfully.');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $Blog)
    {
     
  
        return view('admin.blog.show',compact('Blog'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $Blog)
    {
        $categorys=Category::get();
        return view('admin.blog.edit',compact('Blog','categorys'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
{
    // Validate the request inputs
    $request->validate([
        'header' => 'required',
        'body' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Add validation rules for the image
    ]);

    $input = $request->all();

    // if ($request->hasFile('image')) {
    //     $image = $request->file('image');
    //     $imageName = 'blog-image-' . time() . '.' . $image->getClientOriginalExtension();
    //     $image->move(public_path('uploads/blogs'), $imageName);
    //     $input['image'] = $imageName;
    // }

    // $category = Category::find($request->category_id);

    // $category->blogs()->update([
    //     'header' => $input['header'],
    //     'slug' => $input['slug'],
    //     'body' => $input['body'],
    //     'is_active' => $input['is_active'],
    //     'image' => $input['image'] ?? $blog->image // Use the updated image if provided, otherwise use the existing image
    // ]);

    $image=$request->image;
    $dbname=null;
   if($image){
      if ($blog->image){
        unlink('uploads/blogs/'.$blog->image);
      }
          $dbname= 'blog-image-'.time().'.'.$image->clientExtension(); 
          $source=$image->getRealPath();
          $destination='uploads/blogs/'.$dbname;
          
          copy($source,$destination);

      }

      
        
      
   $blog->update([
       
          'header' => $request->header,
          'slug' => $request->slug,
          'body' => $request->body,
          'image' => $dbname,
          'is_active' => $request->is_active,

      ]);
    //   $category=Category::find($request->category_id);

    //   $category->blogs()->create([
    //       'header' => $request->header,
    //       'slug' => $request->slug,
    //       'body' => $request->body,
    //       'image' => $dbname,
    //       'is_active' => $request->is_active,

    //   ]);
    // $blog->update($input);

    return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
}

 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $Blog)
    {
        $Blog->delete();
      
        return redirect()->route('admin.blogs.index')
                        ->with('success','Blog deleted successfully');
    }

    public function deleteImage($id)
    {
       $blog=Blog::find($id);
      unlink('uploads/blogs/'.$blog->image);
      $blog-> update(['image'=>null]);
      
        return back()
                        ->with('success','Blog image deleted successfully');
    }
 
}