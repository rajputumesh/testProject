<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('name','asc')->get();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $res = [];
        $res['status'] = 400;

        $rules = [
            'name' => ['required'],
        ];
        $messages = [
            'name.required' => 'Name is not empty.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            $res['message'] = $validator->errors()->first();
            return response($res, $res['status']);
        }
        try{
            $category = new Category();
            $category->name = $request->name;
            $category->save();
            $res['status'] = 200;
            $res['message'] = 'Category saved successfully';
        } catch(Exception $e){
            $res['message'] = $e->getMessage().' '.$e->getLine().' '.$e->getFile();
        }
        return response($res, $res['status']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $res = [];
        $res['status'] = 400;

        $rules = [
            'name' => ['required'],
        ];
        $messages = [
            'name.required' => 'Name is not empty.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            $res['message'] = $validator->errors()->first();
            return response($res, $res['status']);
        }
        try{
            $category->name = $request->name;
            $category->save();
            $res['status'] = 200;
            $res['message'] = 'Category updated successfully';
        } catch(Exception $e){
            $res['message'] = $e->getMessage().' '.$e->getLine().' '.$e->getFile();
        }
        return response($res, $res['status']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $res = [];
        $res['status'] = 400;
        try{
            $category->delete();
            $res['status'] = 200;
            $res['message'] = 'Category deleted successfully';
        } catch(Exception $e){
            $res['message'] = $e->getMessage().' '.$e->getLine().' '.$e->getFile();
        }
        return response($res, $res['status']);
    }
}
