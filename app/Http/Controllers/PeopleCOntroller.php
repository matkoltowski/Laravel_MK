<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;


class PeopleController extends Controller
{
public function index()
{
    $people = People::all();
    return response()->json($people);
}

public function show($id)
{
    $person = People::find($id);
    if ($person) {
        return response()->json($person);
    } else {
        return response()->json(['message' => 'Not found'], 404);
    }
}

public function store(Request $request)
{
    $person = People::create($request->all());
    return response()->json($person, 201);
}

public function update(Request $request, $id)
{
    $person = People::find($id);
    if ($person) {
        $person->update($request->all());
        return response()->json($person);
    } else {
        return response()->json(['message' => 'Not found'], 404);
    }
}

public function destroy($id)
{
    $person = People::find($id);
    if ($person) {
        $person->delete();
        return response()->json(['message' => 'Deleted']);
    } else {
        return response()->json(['message' => 'Not found'], 404);
    }
}
}
