<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MovementLinesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movement_lines = DB::select('SELECT * FROM movement_lines WHERE movement_id = ?', [1]);

        return view('movement_lines.index', ['movement_lines' => $movement_lines]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // DB::select('');
        // DB::insert('INSERT INTO movement_lines (movement_id, created_at, updated_at) VALUES (?, now(), now());', [1]);

        // return redirect()->route('movements.index', 1);
        // return view('movement_lines.create', ['movement_id' => $movement_id]);
        // return view('movement_lines.create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::insert('INSERT INTO movement_lines (movement_id, created_at, updated_at) VALUES (?, now(), now());', [$request->input('movement_id')]);

        // return $request->input('movement_id');
        return redirect()->route('movements.edit', $request->input('movement_id'));
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
        $movement_lines = DB::select('SELECT * FROM movement_lines WHERE id = ?;', [$id]);

        DB::delete('DELETE FROM movement_lines WHERE id = ?;', [$id]);

        // return $movement_lines[0]->movement_id;
        return redirect()->route('movements.edit', $movement_lines[0]->movement_id);
    }
}
