<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\uploadImageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentTaggable\Models\Tag;

class BlogController extends Controller
{
    use uploadImageTrait;
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $blogs = Blog::orderBy('created_at', 'DESC')
                ->where([
                ['title', '!=', Null],
                [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('title', 'LIKE', '%' . $s . '%')
                        ->orWhere('content', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->paginate(4);
        $tags=Tag::all();

        return view('blogs.blogs', compact('blogs','tags'));
    }
    public function indexUser(Request $request)
    {  
        $banner = Banner::all();
        $tags=Tag::all();
        $blogs = Blog::orderBy('created_at', 'DESC')->paginate(2); 
        if($request->filled('search')){
            $categories = Category::search($request->search)->orderBy('created_at', 'DESC')->get();
        }else{
            $categories = Category::get();
        }
        return view('blogs.Users.blogs', compact('blogs','categories','banner','tags'));

    }

    public function showBlogUser($id)
    {
        $blog = Blog::find($id);
        $tags=Tag::all();
        $categories = Category::all();
        $banner = Banner::all();
        return view('blogs.Users.showBlog', compact('blog','categories','banner','tags'));

    }

    public function attachBanner()
    {
        $banner = Banner::all();
        $tags = Tag::all();
        $blogs = Blog::all();
        return view ("layouts.user-master", compact('$banner','tags','blogs'));
    }

    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
    
            $request->file('upload')->move(public_path('media'), $fileName);
    
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogs = Blog::all();
        $categories = Category::all();
        $tags=Tag::all();
        return view('blogs.create', compact('blogs','categories','tags'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Blog $blog)
    {
        $this->validate($request, [

            'logo' => 'mimes:pdf,jpeg,png,jpg|required',
            'title' =>'required',
            'content' => 'required',
            'category_id' =>'required',
            'author' => 'required',
            

            ], [
                'logo.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
                'author.required' => 'يرجى إدخال اسم المؤلف ',
                'title.required' => 'يرجى إدخال عنوان المدونة',
                'description.required' => 'يرجى إدخال المحتوى ',

            ]);
            
            $blog =Blog::create
            ([
            'title' => $request->title,
            'content' => $request->content,
            'createdBy' => (Auth::user()->name),
            'logo' => $this->uploadImage($request,'images'),
            'author' => $request->author,
            'category_id' =>$request->category_id    
            ]);
            $tags = explode(',',$request->tag);
            Artisan::call('storage:link');
            $blog->tag($tags);
            session()->flash('Add', 'تم اضافة العنصر بنجاح');
            return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     */
    public function showBlog($id)
    {
            $blog = Blog::find($id);
            $categories = Category::all();
            $banner = Banner::all();
            
            return view('blogs.showBlog', compact('blog','categories','banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('blogs.edit', compact('blog', 'categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $blog = Blog::findOrFail($request->id);
        $validated = $request->validate([
            'title' => 'required|max:255' ,
            'content' => 'required',
            'logo' => 'nullable',
            'author' => 'required',

            ]
            , [
                'title.required' => 'يرجى إدخال عنوان المدونة',
                'description.required' => 'يرجى إدخال المحتوى ',
                'author.required' => 'يرجى إدخال اسم المؤلف ',
            ]);
            $distination = ''.$blog->logo;
            if (File::exists($distination))
            {
                File::delete($distination);
            }
            if ($request->hasFile('logo')) {
            $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'logo' => $this->uploadImage($request,'images'),
            'author' => $request->author,
            'category_id' => $request->category_id
        ]);
    }
        else{
            $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'category_id' => $request->category_id
        ]);
        }
        $tags = explode(',',$request->tag);
        $blog->retag($tags);
        Artisan::call('storage:link');
        session()->flash('edit', 'تم التعديل بنجاح');
        return redirect('/blogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        session()->flash('delete', 'تم حذف العنصر بنجاح');
        return redirect('/blogs');
    }

    public function tagBlogs(Blog $blog, $id)
    {
        $blog = Blog::find($id);
        $categories = Category::all();    
        return view('blogs.tags', compact('blog','categories'));
    }
}
