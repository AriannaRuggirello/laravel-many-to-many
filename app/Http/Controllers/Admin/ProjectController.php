<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\type;
use App\Models\technology;


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

        $types = type::all();
        $technologies = technology::all();
        return view('create', compact('types', 'technologies'));
    }

    public function store(Request $request) {
        $data = $request->all();
        $project = Project::create($data);
        $project->technologies()->attach($request->input('technologies'));
        // Assegnare il tipo al progetto, supponendo che 'type_id' sia presente nei dati del form
        $project->type()->associate($request->input('type_id'));
        $project->save();        return redirect()->route('project.show', $project->id);
    }

}
