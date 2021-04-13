<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category');
    }

    public function allCategory()
    {
        $category = Category::latest()->get();
        return view('admin.category-show', compact('category'));
    }

    public function storeCategory(Request $request)
    {
        Category::insert([
            'category_name' => $request->n,
            'status' => $request->s,
            'created_at' => Carbon::now()
        ]);
    }

    public function deleteCategory(Request $request)
    {
        $cat = Category::find($request->i);
        $cat->delete();
    }

    public function editCategory(Request $request)
    {
        $cat = Category::findOrFail($request->i);
        return response()->json($cat);
    }

    public function updateCategory(Request $request)
    {
        $cat = Category::findOrFail($request->i);
        $cat->update([
            'category_name' => $request->n,
            'status' => $request->s
        ]);
    }

    public function statusCategory($id, $status)
    {
        $cat = Category::findOrFail($id);
        if ($status == 0) {
            $cat->update([
                'status' => 1
            ]);
        } else {
            $cat->update([
                'status' => 0
            ]);
        }
    }
}
