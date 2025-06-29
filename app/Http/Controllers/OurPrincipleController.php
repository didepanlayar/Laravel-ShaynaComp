<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrincipleRequest;
use App\Models\OurPrinciple;
use Illuminate\Http\Request;

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
        //
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
    public function edit(OurPrinciple $OurPrinciple)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurPrinciple $OurPrinciple)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurPrinciple $OurPrinciple)
    {
        //
    }
}
