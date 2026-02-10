<?php

namespace App\Http\Controllers;
use App\Models\Link;    
use Illuminate\Http\Request;

class LinkController extends Controller
{   
    // Apply auth middleware for all routes
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        // Show links user owns or shared with
        $links = Link::where('user_id', $user->id)
                    ->orWhereHas('sharedWith', fn($q) => $q->where('user_id', $user->id))
                    ->get();

        return view('links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Link::class);

        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Link::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url'   => 'required|url|max:255',
        ]);

        $link = auth()->user()->links()->create($validated);

        return redirect()->route('links.index')
                         ->with('success', 'Link created successfully!');
    }

    /**
     * Display the specified resource.
     */
        public function show(Link $link)
        {
            $this->authorize('view', $link);
            return view('links.show', compact('link'));
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', $link);

        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
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
