<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::with('creator')->get();
        return view('people.index', compact('people'));
    }

    public function show(Person $person)
    {
        $person->load(['parents', 'children', 'creator']);

        return view('people.show', compact('person'));
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
        ]);

        $person = new Person($validated);
        $person->created_by = Auth::id();
        $person->save();

        return redirect()->route('people.show', $person)
            ->with('success', 'Personne créée avec succès.');
    }
}

