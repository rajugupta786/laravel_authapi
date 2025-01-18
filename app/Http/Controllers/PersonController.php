<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
class PersonController extends Controller
{
    public function index()
    {
        $people = Person::whereNull('parent_id')->get(); // Get top-level people (no parent)
        return view('people.index', compact('people'));
    }
}
