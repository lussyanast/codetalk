<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Discussion;
use App\Http\Requests\Discussion\StoreRequest;
use App\Http\Requests\Discussion\UpdateRequest;
use Str;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // load semua discussion
        // eager load relationshipnya/relasinya
        // apakah ada request data search
        // jika ada maka load discussion dengan kata kunci title dan content yang nilainya spt nilai search
        // return page index beserta datanya
        // data yang dipass ke view adl:
        // discussion yang sudah disort dengan created at menurun, pagination per 10/20
        // data semua category

        $discussions = Discussion::with(['user', 'category']);

        if ($request->search) {
            $discussions->where('title', 'like', "%$request->search%")
                ->orWhere('content', 'like', "%$request->search%");
        }

        return response()->view('pages.discussions.index', [
            'discussions' => $discussions->orderBy('created_at', 'desc')->paginate(10)->withQueryString(),
            'categories' => Category::all(),
            'search' => $request->search,
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
        // get semua category
        // return response

        $discussion = Discussion::with(['user', 'category'])->where('slug', $slug)->first();

        $notLikedImage = url('assets/images/like.png');
        $likedImage = url('assets/images/liked.png');

        return response()->view('pages.discussions.show', [
            'discussion' => $discussion,
            'categories' => Category::all(),
            'likedImage' => $likedImage,
            'notLikedImage' => $notLikedImage,
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
    public function destroy(string $id)
    {
        //
    }
}