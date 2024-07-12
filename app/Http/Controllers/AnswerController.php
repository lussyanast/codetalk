<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Discussion;
use App\Http\Requests\Answer\StoreRequest;
use App\Http\Requests\Answer\UpdateRequest;

class AnswerController extends Controller
{
    public function store(StoreRequest $request, $slug)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        $validated['discussion_id'] = Discussion::where('slug', $slug)->first()->id;

        $create = Answer::create($validated);

        if ($create) {
            session()->flash('notif.success', 'Your answer posted successfully!');
            return redirect()->route('discussions.show', $slug);
        }

        return abort(500);
    }

    public function edit(string $id)
    {
        $answer = Answer::find($id);

        if (!$answer) {
            return abort(404);
        }

        $isOwnedByUser = $answer->user_id == auth()->id();

        if (!$isOwnedByUser) {
            return abort(404);
        }

        return response()->view('pages.answers.form', [
            'answer' => $answer,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $answer = Answer::find($id);

        if (!$answer) {
            return abort(404);
        }

        $isOwnedByUser = $answer->user_id == auth()->id();

        if (!$isOwnedByUser) {
            return abort(404);
        }

        $validated = $request->validated();

        $update = $answer->update($validated);

        if ($update) {
            session()->flash('notif.success', 'Answer updated successfully!');
            return redirect()->route('discussions.show', $answer->discussion->slug);
        }

        return abort(500);
    }

    public function destroy(string $id)
    {
        $answer = Answer::find($id);

        if (!$answer) {
            return abort(404);
        }

        $isOwnedByUser = $answer->user_id == auth()->id();

        $delete = $answer->delete();

        if ($delete) {
            session()->flash('notif.success', 'Answer deleted successfully!');
            return redirect()->route('discussions.show', $answer->discussion->slug);
        }

        return abort(500);
    }
}
