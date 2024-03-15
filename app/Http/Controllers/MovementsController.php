<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MovementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $movements = DB::select('
            SELECT movements.*, movement_types.name AS movement_type_name, movement_direction_types.name AS movement_direction_type_name
            FROM movements
            INNER JOIN movement_types
            ON movements.movement_type_id = movement_types.id AND movements.movement_direction_type_id = movement_types.movement_direction_type_id
            INNER JOIN movement_direction_types
            ON movements.movement_direction_type_id = movement_direction_types.id
            ORDER BY movements.created_at;
        ');

        return view('movements.index', ['movements' =>  $movements]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movement_types = DB::select('
            SELECT movement_types.*, movement_direction_types.name AS movement_direction_type_name, movement_direction_types.id AS movement_direction_type_id
            FROM movement_types
            INNER JOIN movement_direction_types
            ON movement_types.movement_direction_type_id = movement_direction_types.id;
        ');

        return view('movements.create', ['movement_types' => $movement_types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movement_types = DB::select('SELECT * FROM movement_types WHERE id = ?;', [$request->input('type_id')]);

        DB::insert('INSERT INTO movements (movement_type_id, movement_direction_type_id, created_at, updated_at) VALUES (?, ?, now(), now())',
        [$request->input('type_id'), $movement_types[0]->movement_direction_type_id]);

        return redirect()->route('movements.index');
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

        $movements = DB::select('
            SELECT movements.*, movement_types.name AS movement_type_name, movement_direction_types.name AS movement_direction_type_name
            FROM movements
            INNER JOIN movement_types
            ON movements.movement_type_id = movement_types.id AND movements.movement_direction_type_id = movement_types.movement_direction_type_id
            INNER JOIN movement_direction_types
            ON movements.movement_direction_type_id = movement_direction_types.id
            WHERE movements.id = ?;
        ', [$id]);

        $movement_types = DB::select('
            SELECT movement_types.*, movement_direction_types.name AS movement_direction_type_name, movement_direction_types.id AS movement_direction_type_id
            FROM movement_types
            INNER JOIN movement_direction_types
            ON movement_types.movement_direction_type_id = movement_direction_types.id;
        ');

        $movement_lines = DB::select('SELECT * FROM movement_lines WHERE movement_id = ?', [$id]);

        return view('movements.edit', [
            'movement' => $movements[0],
            'movement_types' => $movement_types,
            'movement_lines' => $movement_lines
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movement_types = DB::select('SELECT * FROM movement_types WHERE id = ?;', [$request->input('type_id')]);

        DB::update('
            UPDATE movements SET
            movement_type_id = ?,
            movement_direction_type_id = ?,
            updated_at = now()
            WHERE movements.id = ?;
        ', [$request->input('type_id'), $movement_types[0]->movement_direction_type_id, $id]);

        return redirect()->route('movements.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
