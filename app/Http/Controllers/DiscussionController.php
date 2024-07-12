<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Discussion;
use App\Models\Answer;
use App\Http\Requests\Discussion\StoreRequest;
use App\Http\Requests\Discussion\UpdateRequest;
use Str;
use Illuminate\Support\Facades\DB;

class DiscussionController extends Controller
{
    public function index(Request $request) {
        $discussions = Discussion::with(['user', 'category']);
    
        // Filter berdasarkan pencarian
        if ($request->search) {
            $discussions->where('title', 'like', "%$request->search%")
                ->orWhere('content', 'like', "%$request->search%");
        }
    
        // Sorting berdasarkan pilihan pengguna
        if ($request->sort) {
            switch ($request->sort) {
                case 'most_liked':
                    $discussions->withCount('likes')->orderBy('likes_count', 'desc');
                    break;
                case 'most_answered':
                    $discussions->withCount('answers')->orderBy('answers_count', 'desc');
                    break;
                case 'latest':
                default:
                    $discussions->orderBy('created_at', 'desc');
                    break;
            }
        } else {
            $discussions->orderBy('created_at', 'desc');
        }
    
        // Ambil 10 kategori teratas berdasarkan jumlah diskusi
        $topCategories = Category::select('categories.id', 'categories.name', 'categories.slug')
            ->join('discussions', 'categories.id', '=', 'discussions.category_id')
            ->groupBy('categories.id', 'categories.name', 'categories.slug')
            ->orderByRaw('COUNT(discussions.id) DESC')
            ->limit(10)
            ->get();
    
        return response()->view('pages.discussions.index', [
            'discussions' => $discussions->paginate(10)->withQueryString(),
            'categories' => Category::all(),
            'topCategories' => $topCategories,
            'search' => $request->search,
            'sort' => $request->sort,
        ]);
    }

    public function create()
    {
        return response()->view('pages.discussions.form', [
            'categories' => Category::all(),
        ]);
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $categoryId = Category::where('slug', $validated['category_slug'])->first()->id;
    
        $validated['category_id'] = $categoryId;
        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['title']) . '-' . time();
    
        $stripContent = strip_tags($validated['content']);
        $isContentLong = strlen($stripContent) > 120;
        $validated['content_preview'] = $isContentLong
            ? (substr($stripContent, 0, 120) . '...') : $stripContent;

        $create = Discussion::create($validated);

        if($create) {
            session()->flash('notif.success', 'Discussion created successfully!');
            return redirect()->route('discussions.index');
        }

        return abort(500);
    }

    public function show(string $slug)
    {
        $discussion = Discussion::with(['user', 'category'])->where('slug', $slug)->first();

        if (!$discussion) {
            return abort(404);
        }

        $discussionAnswers = Answer::where('discussion_id', $discussion->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $notLikedImage = url('assets/images/like.png');
        $likedImage = url('assets/images/liked.png');

        // Ambil 10 kategori teratas berdasarkan jumlah diskusi
        $topCategories = Category::select('categories.id', 'categories.name', 'categories.slug')
            ->join('discussions', 'categories.id', '=', 'discussions.category_id')
            ->groupBy('categories.id', 'categories.name', 'categories.slug')
            ->orderByRaw('COUNT(discussions.id) DESC')
            ->limit(10)
            ->get();

        // Ambil diskusi terkait berdasarkan kategori yang sama
        $relatedDiscussions = Discussion::where('category_id', $discussion->category_id)
            ->where('id', '!=', $discussion->id)
            ->latest()
            ->take(2)
            ->get();

        return response()->view('pages.discussions.show', [
            'discussion' => $discussion,
            'categories' => Category::all(),
            'likedImage' => $likedImage,
            'notLikedImage' => $notLikedImage,
            'discussionAnswers' => $discussionAnswers,
            'topCategories' => $topCategories,
            'relatedDiscussions' => $relatedDiscussions,
        ]);
    }

    public function edit(string $slug)
    {
        $discussion = Discussion::with('category')->where('slug', $slug)->first();

        if (!$discussion) {
            return abort(404);
        }

        $isOwnedByUser = $discussion->user_id == auth()->id();

        if (!$isOwnedByUser) {
            return abort(404);
        }

        return response()->view('pages.discussions.form', [
            'discussion' => $discussion,
            'categories' => Category::all(),
        ]);
    }

    public function update(UpdateRequest $request, string $slug)
    {
        $discussion = Discussion::with('category')->where('slug', $slug)->first();

        if (!$discussion) {
            return abort(404);
        }

        $isOwnedByUser = $discussion->user_id == auth()->id();

        if (!$isOwnedByUser) {
            return abort(404);
        }

        $validated = $request->validated();
        $categoryId = Category::where('slug', $validated['category_slug'])->first()->id;
    
        $validated['category_id'] = $categoryId;
        $validated['user_id'] = auth()->id();
    
        $stripContent = strip_tags($validated['content']);
        $isContentLong = strlen($stripContent) > 120;
        $validated['content_preview'] = $isContentLong
            ? (substr($stripContent, 0, 120) . '...') : $stripContent;

        $update = $discussion->update($validated);

        if($update) {
            session()->flash('notif.success', 'Discussion updated successfully!');
            return redirect()->route('discussions.show', $slug);
        }

        return abort(500);
    }

    public function destroy(string $slug)
    {
        $discussion = Discussion::with('category')->where('slug', $slug)->first();

        if (!$discussion) {
            return abort(404);
        }

        $isOwnedByUser = $discussion->user_id == auth()->id();

        if (!$isOwnedByUser) {
            return abort(404);
        }
    
        $delete = $discussion->delete();

        if ($delete) {
            session()->flash('notif.success', 'Discussion deleted successfully!');
            return redirect()->route('discussions.index');
        }
        return abort(500);
    }
}
