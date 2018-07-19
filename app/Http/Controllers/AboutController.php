<?php

namespace App\Http\Controllers;
use App\Models\Person;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $persons = Person::orderBy('position')->get();

        return view('site.about.index', [
            'persons' => $persons
        ]);
    }

    public function metodo_curacao()
    {
        return view('site.about.metodo_curacao');
    }

    public function carta_manifesto()
    {
        return view('site.about.carta_manifesto');
    }

    public function coletivo_detail($id)
    {
        $person = Person::where('id', $id)->first();
        return view('site.about.coletivo_detail', ['model' => $person]);
    }
}
