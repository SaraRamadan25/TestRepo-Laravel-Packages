<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    public function store(BlogRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $image = $request->file('image');
        $imageExtension = $image->getClientOriginalExtension();
        $imageName = uniqid() . '.' . $imageExtension;

        $imagePath = $image->storeAs('public/BlogImages', $imageName);
        Blog::create(array_merge($attributes, ['image' => $imageName]));

        return redirect()->route('blogs.index');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    public function update(Blog $blog, BlogRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = uniqid() . '.' . $imageExtension;

            $imagePath = $image->storeAs('public/BlogImages', $imageName);
            $attributes['image'] = $imageName;
        }

        $blog->update($attributes);

        return redirect()->route('blogs.index');
    }


    public function destroy(Blog $blog){
        $blog->delete();
        return redirect()->route('blogs.index');
    }
}
