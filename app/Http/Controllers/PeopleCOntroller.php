<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    public function index()
    {
        try {
            $people = People::all();
            return response()->json($people);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $person = People::find($id);
            if ($person) {
                return response()->json($person);
            } else {
                return response()->json(['message' => 'Not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $person = People::create($request->all());
            return response()->json($person, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $person = People::find($id);

            if ($person) {
                $validatedData = $request->validate([
                    'first_name' => 'string|max:255',
                    'last_name' => 'string|max:255',
                    'phone_number' => 'nullable|string|max:20',
                    'street' => 'nullable|string|max:255',
                    'city' => 'nullable|string|max:255',
                ]);

                $person->update($validatedData);

                return response()->json($person);
            } else {
                return response()->json(['message' => 'Not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $person = People::find($id);
            if ($person) {
                $person->delete();
                return response()->json(['message' => 'Deleted']);
            } else {
                return response()->json(['message' => 'Not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
