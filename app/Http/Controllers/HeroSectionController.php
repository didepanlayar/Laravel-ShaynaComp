<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHeroSectionRequest;
use App\Http\Requests\UpdateHeroSectionRequest;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroSections = HeroSection::orderByDesc('id')->paginate(10);

        return view('admin.hero-sections.index', compact('heroSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hero-sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHeroSectionRequest $request)
    {
        // closure-based transaction

        DB::transaction(function () use($request) {
            $validated = $request->validated();

            if($request->hasFile('banner')) {
                $bannerPath = $request->file('banner')->store('banners', 'public');
                $validated['banner'] = $bannerPath;
            }

            $newHeroSection =  HeroSection::create($validated);
        });

        return redirect()->route('admin.hero-sections.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroSection $heroSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSection $heroSection)
    {
        return view('admin.hero-sections.edit', compact('heroSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHeroSectionRequest $request, HeroSection $heroSection)
    {
        DB::transaction(function () use($request, $heroSection) {
            $validated = $request->validated();

            if($request->hasFile('banner')) {
                if ($heroSection->banner && Storage::disk('public')->exists($heroSection->banner)) {
                    Storage::disk('public')->delete($heroSection->banner);
                }
                $bannerPath = $request->file('banner')->store('banners', 'public');
                $validated['banner'] = $bannerPath;
            }

            $heroSection->update($validated);
        });

        return redirect()->route('admin.hero-sections.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSection $heroSection)
    {
        DB::transaction(function () use($heroSection) {
            $heroSection->delete();
        });

        return redirect()->route('admin.hero-sections.index');
    }
}
