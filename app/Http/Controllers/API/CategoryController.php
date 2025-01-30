<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(100);
        //convert code to json format
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "categoryName" => "required|unique:categories|max:255",
            "description" => "required|nullable|string|max:1000",
        ]);

        try {
            $category = Category::create($validated);
            return response()->json([
                "message" => "Create category successfully",
                "data" => $category
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Create category failed",
                "message" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $category = Category::find('categoryID', $id);
        try {
            $category = Category::where('categoryID', $id)->firstOrFail();
            return response()->json([
                "message" => "Get category by id successfully",
                "data" => $category
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(["error" => "Category not found"], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "categoryName" => "required|unique:categories|max:255",
            "description" => "required|nullable|string|max:1000",
        ]);

        try {
            $category = Category::where('categoryID', $id)->firstOrFail();
            $category->update($validated);
            return response()->json([
                "message" => "Update category successfully",
                "data" => $category
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Category not found",
                "message" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
