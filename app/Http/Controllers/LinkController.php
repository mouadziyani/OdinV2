<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        // Show links user owns or shared with
        $links = Link::where('user_id', $user->id)
                     ->orWhereHas('sharedWith', fn($q) => $q->where('user_id', $user->id))
                     ->get();

        return view('links.index', compact('links'));
    }

    public function create()
    {
        $this->authorize('create', Link::class);
        return view('links.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Link::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url'   => 'required|url|max:255',
        ]);

        auth()->user()->links()->create($validated);

        return redirect()->route('links.index')
                         ->with('success', 'Link created successfully!');
    }

    public function show(Link $link)
    {
        $this->authorize('view', $link);
        return view('links.show', compact('link'));
    }

    public function edit(Link $link)
    {
        $this->authorize('update', $link);
        return view('links.edit', compact('link'));
    }

    public function update(Request $request, Link $link)
    {
        $this->authorize('update', $link);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url'   => 'required|url|max:255',
        ]);

        $link->update($validated);

        return redirect()->route('links.index')
                         ->with('success', 'Link updated successfully!');
    }

    public function destroy(Link $link)
    {
        $this->authorize('delete', $link);
        $link->delete();

        return redirect()->route('links.index')
                         ->with('success', 'Link deleted successfully!');
    }

    public function remove_all()
    {
        Link::truncate();
        return redirect()->route('links.index')
                         ->with('success', 'ALL links deleted successfully!');
    }
}
