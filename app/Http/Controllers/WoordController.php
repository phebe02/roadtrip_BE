<?php

namespace App\Http\Controllers;

use App\Models\Woord;
use Illuminate\Http\Request;
use App\Models\Thema;

class WoordController extends Controller
{
    public function index()
    {
        $woorden = Woord::sortable()->with('thema')->paginate(10);
        return view('woorden', compact('woorden'));
    }

    public function create()
    {
        $themas = Thema::all();
        return view('createW', compact('themas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'woord' => 'required|string|max:255',
            'themas' => 'required|array',
        ]);

        $woord = Woord::create(['woord' => $request->woord]);
        $woord->thema()->sync($request->themas);

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $woord = Woord::findOrFail($id);
        $themas = Thema::all();
        return view('editW', compact('woord', 'themas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'woord' => 'required|string|max:255',
            'themas' => 'required|array',
        ]);

        $woord = Woord::findOrFail($id);
        $woord->update(['woord' => $request->woord]);
        $woord->thema()->sync($request->themas);

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $woord = Woord::findOrFail($id);
        $woord->delete();

        return redirect()->route('home');
    }
}