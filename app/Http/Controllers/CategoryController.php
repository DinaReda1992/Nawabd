<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blogs = Blog::all();
        $categories = Category::where([
            ['category_name', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('category_name', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->paginate(4);

        return view('categories.categories', compact('categories', 'blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'category_name' =>'required'

            ], [
                'category_name.required' => '   يجب إدخال عنوان التصنيف ',
            ]);
            Category::create([
                'category_name' => $request->category_name
            ]);
            session()->flash('Add', 'تم اضافة المرفق بنجاح');
            return redirect('/categories');
    }

    /**
     * Display the specified resource.
     */
    public function showCategory($id)
    {
        $category = Category::find($id);
        return view('categories.showCategory',compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view ('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::findOrFail($request->id);

        $this->validate($request, [

            'category_name' =>'required'

            ], [
                'category_name.required' => '   يجب إدخال عنوان التصنيف ',
            ]);
            $category->update([
                'category_name' => $request->category_name
            ]);
            session()->flash('edit', 'تم التعديل بنجاح');
            return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('delete', 'تم حذف العنصر بنجاح');
        return redirect('/categories');
    }

    public function showBlogs(Request $request, Category $category){
        $category = Category::findOrFail($request->id);
        $blogs = Category::find($category->id)->blogs()
                    ->where('id', $category->id)
                    ->first();
                    return view ('categories.categoriesBlogs', compact('blogs','category'));

    }
}
