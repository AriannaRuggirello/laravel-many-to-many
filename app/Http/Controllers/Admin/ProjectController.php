<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\type;

class ProjectController extends Controller
{


    public function index() {

        $projects = Project :: all();
        return view("index", compact('projects'));

	}


    public function show($id) {

        $projects = Project :: findOrFail($id);
        return view("show", compact('projects'));

	}

    public function create() {

        $types = type :: all();

        return view('create', compact('types'));
    }

    public function store(Request $request) {

        $data = $request -> all();

        $project = Project :: create($data);

        return redirect() -> route('project.show', $project -> id);
    }

}
