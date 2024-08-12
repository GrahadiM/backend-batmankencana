<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']  = 'List Category';
        $data['data']   = Category::latest('id')->get();
        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']  = 'Create Category';
        return view('admin.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $dt = new Category;
        $dt->name       = Str::upper($request->name);
        $dt->slug       = Str::slug($request->name);
        $dt->parent_id  = $request->parent_id == NULL ? NULL : (int)$request->parent_id;
        $dt->created_at = now();
        $dt->save();

        return redirect()->route('admin.categories.index')
                        ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title']      = 'Detail Category';
        $data['category']   = Category::find($id);
        return view('admin.categories.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']      = 'Update Category';
        $data['category']   = Category::find($id);
        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $dt = Category::find($id);
        $dt->name       = Str::upper($request->name);
        $dt->slug       = Str::slug($request->name);
        $dt->parent_id  = $request->parent_id == NULL ? NULL : (int)$request->parent_id;
        $dt->updated_at = now();
        $dt->update();

        return redirect()->route('admin.categories.index')
                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('admin.categories.index')
                        ->with('success','Category deleted successfully');
    }
}
