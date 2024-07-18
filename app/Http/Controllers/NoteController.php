<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function show($id)
    {
        $note = Note::findOrFail($id);
        return view('components.note', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $note->note = $request->note;
        $note->save();

        if ($request->ajax()) {
            return response()->json(['success' => 'Note saved successfully']);
        }

        return redirect()->back()->with('success', 'Note updated successfully');
    }
}
