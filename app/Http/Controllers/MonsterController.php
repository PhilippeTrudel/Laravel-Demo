<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monster;

class MonsterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Monster::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $monster = Monster::create([
        //     'name' => $request->name,
        //     'story' => $request->story,
        //     'eyes' => $request->eyes,
        //     'arms' => $request->arms,
        //     'legs' => $request->legs
        // ]);

        $monster = Monster::create($request->all());
        return $monster;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Monster::findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monster $monster)
    {
        $input = $request->all();
        $monster->fill($input)->save();
        return $monster;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monster $monster)
    {
        $monster->delete();

        return $monster;
    }
}
