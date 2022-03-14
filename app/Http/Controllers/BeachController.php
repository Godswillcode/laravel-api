<?php

namespace App\Http\Controllers;

use App\Models\Beach;
use Illuminate\Http\Request;

class BeachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $beaches=Beach::all();

       return response($beaches,201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $beach = Beach::create([
                'name' => $validatedData['name'],
                'type' => $validatedData['type'],
                'description' => $validatedData['description'],
                'image' => $validatedData['image'],
        ]);

        return response(['message'=>'Beach Created'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function show(Beach $beach)
    {
        return response($beach,201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function edit(Beach $beach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beach $beach)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);


        $beach->update([
                'name' => $validatedData['name'],
                'type' => $validatedData['type'],
                'description' => $validatedData['description'],
                'image' => $validatedData['image'],
        ]);
        return response(['message'=>'Beach Updated'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beach $beach)
    {
        $beach->destroy();
        return response(['message'=>'Beach Deleted'],201);

    }
}
