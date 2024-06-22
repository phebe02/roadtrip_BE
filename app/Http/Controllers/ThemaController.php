<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thema;

class ThemaController extends Controller
{
    public function index()
    {
        $themas = Thema::all();
        return view('themas', compact('themas'));
    }

    public function create()
    {
        return view('createT');
    }
    public function show($id)
    {
        $thema = Thema::findOrFail($id);
        return view('showT', compact('thema'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'thema' => 'required|string|max:255',
        ]);

        Thema::create(['thema' => $request->thema]);

        return redirect()->route('themas');
    }

    public function edit($id)
    {
        $thema = Thema::findOrFail($id);
        return view('editT', compact('thema'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'thema' => 'required|string|max:255',
        ]);

        $thema = Thema::findOrFail($id);
        $thema->update(['thema' => $request->thema]);

        return redirect()->route('themas');
    }

    public function destroy($id)
    {
        $thema = Thema::findOrFail($id);
        $thema->delete();

        return redirect()->route('themas');
    }
}
