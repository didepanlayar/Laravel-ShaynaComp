<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrincipleRequest;
use App\Http\Requests\UpdatePrincipleRequest;
use App\Models\OurPrinciple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OurPrincipleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $principles = OurPrinciple::orderByDesc('id')->paginate(10);

        return view('admin.principles.index', compact('principles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.principles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrincipleRequest $request)
    {
        // closure-based transaction

        DB::transaction(function () use($request) {
            $validated = $request->validated();

            if($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

            if($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $newPrinciple =  OurPrinciple::create($validated);
        });

        return redirect()->route('admin.principles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurPrinciple $OurPrinciple)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurPrinciple $principle)
    {
        return view('admin.principles.edit', compact('principle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrincipleRequest $request, OurPrinciple $principle)
    {
        DB::transaction(function () use($request, $principle) {
            $validated = $request->validated();

            if($request->hasFile('icon')) {
                if ($principle->icon && Storage::disk('public')->exists($principle->icon)) {
                    Storage::disk('public')->delete($principle->icon);
                }
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

            if($request->hasFile('thumbnail')) {
                if ($principle->thumbnail && Storage::disk('public')->exists($principle->thumbnail)) {
                    Storage::disk('public')->delete($principle->thumbnail);
                }
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $principle->update($validated);
        });

        return redirect()->route('admin.principles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurPrinciple $principle)
    {
        DB::transaction(function () use($principle) {
            $principle->delete();
        });

        return redirect()->route('admin.principles.index');
    }
}
