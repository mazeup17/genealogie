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
            'middle_names' => 'nullable|string|max:255',
            'birth_name' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
        ]);

        try {
            $formattedData = [
                'first_name' => ucfirst(strtolower($validated['first_name'])),
                'last_name' => strtoupper($validated['last_name']),
                'date_of_birth' => $validated['date_of_birth'] ?: null,
            ];

            if (!empty($validated['middle_names'])) {
                $middleNames = explode(',', $validated['middle_names']);
                $formattedMiddleNames = [];
                foreach ($middleNames as $name) {
                    $formattedMiddleNames[] = ucfirst(strtolower(trim($name)));
                }
                $formattedData['middle_names'] = implode(', ', $formattedMiddleNames);
            } else {
                $formattedData['middle_names'] = null;
            }

            $formattedData['birth_name'] = !empty($validated['birth_name'])
                ? strtoupper($validated['birth_name'])
                : $formattedData['last_name'];

            $person = new Person($formattedData);
            $person->created_by = Auth::id();
            $person->save();

            return redirect()->route('people.index')
                ->with('success', 'Personne créée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erreur lors de la création : ' . $e->getMessage());
        }
    }
}

