<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Discussion;

class CategoryController extends Controller
{
        public function show($categorySlug, Request $request) {
        $category = Category::where('slug', $categorySlug)->first();

        if (!$category) {
            return abort(404);
        }

        $discussions = Discussion::with(['user', 'category'])
            ->where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        // Ambil 10 kategori teratas berdasarkan jumlah diskusi
        $topCategories = Category::select('categories.id', 'categories.name', 'categories.slug')
            ->join('discussions', 'categories.id', '=', 'discussions.category_id')
            ->groupBy('categories.id', 'categories.name', 'categories.slug')
            ->orderByRaw('COUNT(discussions.id) DESC')
            ->limit(10)
            ->get();

        return response()->view('pages.discussions.index', [
            'discussions' => $discussions,
            'categories' => Category::all(),
            'topCategories' => $topCategories,
            'withCategory' => $category,
            'search' => $request->search,
            'sort' => $request->sort,
        ]);
    }
}
