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
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('pages.discussions.form', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // dapatkan dulu data dari form request yang sudah tervalidasi
        // get data category berdasarkan slugnya
        // dapatkan id dari categorynya
        // masukkan user id ke array validated
        // tambahkan slug + timestamp berdasarkan title ke array validated
        // buat content_preview berdasarkan content
        // caranya bersihkan content dari tag
        // cek apakah content ini karakternya lebih 120
        // jika iya maka masukkan content tersebut ke content preview + '...'
        // jika tidak makan masukkan content tersebut ke content preview tanpa '...'
        // baru masukkan data detail question itu ke tabel discussions
        // jika berhasil maka buat notif berhasil lalu redirect ke list discussion
        // jika tidak maka kembalikan error 500

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

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // dapatkan discussion berdasarkan slug, dan eager load user dan categorynya
        // cek apakah data discussion dengan slug tsb tidak ada
        // jika tidak ada maka return page not found
        // get answer berdasarkan discussion id
        // sort berdasarkan created at menurun
        // paginate 5
        // get semua category
        // return response

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

        return response()->view('pages.discussions.show', [
            'discussion' => $discussion,
            'categories' => Category::all(),
            'likedImage' => $likedImage,
            'notLikedImage' => $notLikedImage,
            'discussionAnswers' => $discussionAnswers,
            'topCategories' => $topCategories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        // get data discussion berdasarkan slug
        // cek apakah data discussion dengan slug tsb tidak ada
        // jika tidak ada maka return page not found
        // jika ada maka lanjut ke kodingan bawah
        // cek apakah discussion tsb milik user yang sedang login
        // jika bukan maka return page not found
        // return view dengan discussion dan category

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

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $slug)
    {
        // get data discussion berdasarkan slug
        // cek apakah data discussion dengan slug tsb tidak ada
        // jika tidak ada maka return page not found
        // jika ada maka lanjut ke kodingan bawah
        // cek apakah discussion tsb milik user yang sedang login
        // jika bukan maka return page not found
        // dapatkan dulu data dari form request yang sudah tervalidasi
        // get data category berdasarkan slugnya
        // dapatkan id dari categorynya
        // masukkan user id ke array validated
        // buat content_preview berdasarkan content
        // caranya bersihkan content dari tag
        // cek apakah content ini karakternya lebih 120
        // jika iya maka masukkan content tersebut ke content preview + '...'
        // jika tidak makan masukkan content tersebut ke content preview tanpa '...'
        // baru update data detail question itu ke tabel discussions
        // jika berhasil maka buat notif berhasil lalu redirect ke list discussion
        // jika tidak maka kembalikan error 500

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        // get data discussion berdasarkan slug
        // cek apakah data discussion dengan slug tsb tidak ada
        // jika tidak ada maka return page not found
        // jika ada maka lanjut ke kodingan bawah
        // cek apakah discussion tsb milik user yang sedang login
        // jika bukan maka return page not found
        // delete record
        // jika berhasil maka return notif success dan redirect ke list discussion
        // jika tidak berhasil maka lanjut ke kodingan di bawahnya yakni return error 500
        
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
