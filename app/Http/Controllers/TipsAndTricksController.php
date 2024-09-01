<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipRequest;
use Illuminate\Http\Request;
use App\Models\TipsAndTricks;
class TipsAndTricksController extends Controller
{


    public function superadmin()
    {
        $tips = TipsAndTricks::all();
        return view('superadmin.tips.index', compact('tips', ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $tips = TipsAndTricks::all();

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTipRequest $request)
    {
        TipsAndTricks::create($request->validated());
        return redirect()
            ->route("superadmin")
            ->with('confirmMess', "Zdroj sa úspešne zadal do systému.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
