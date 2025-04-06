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
        // Chargement de la personne avec ses relations parents et enfants
        $person->load(['parents', 'children', 'creator']);

        return view('people.show', compact('person'));
    }
}
