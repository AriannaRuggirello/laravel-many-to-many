<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\type;
use App\Models\technology;

class ProjectController extends Controller
{
    // Visualizza l'elenco di tutti i progetti
    public function index()
    {
        // Recupera tutti i progetti dal database
        $projects = Project::all();
        // Carica la vista 'welcome' e passa l'elenco dei progetti alla vista
        return view('index', compact('projects'));
    }    // Mostra i dettagli di un progetto specifico
    public function show($id)
    {
        // Cerca il progetto nel database con l'ID specificato
        $project = Project::findOrFail($id);
        // Carica la vista 'show' e passa i dettagli del progetto alla vista
        return view('show', compact('project'));
    }    // Mostra il form per creare un nuovo progetto
    public function create()
    {
        // Recupera tutti i tipi e tutte le tecnologie dal database
        $types = type::all();
        $technologies = technology::all();
        // Carica la vista 'create' e passa i tipi e le tecnologie alla vista
        return view('create', compact('types', 'technologies'));
    }    // Salva un nuovo progetto nel database
    public function store(Request $request)
    {
        // Recupera i dati dal form inviato
        $data = $request->all();
        // Crea un nuovo progetto nel database con i dati forniti
        $project = Project::create($data);
         // Collega le tecnologie selezionate al progetto tramite la tabella di collegamento
        $project->technologies()->attach($request->input('technologies'));
        // Assegna il tipo selezionato al progetto
        $project->type()->associate($request->input('type_id'));
        // Salva le modifiche
        $project->save();
         // Reindirizza all'URL della vista 'show' per visualizzare il progetto appena creato
        return redirect()->route('project.show', $project->id);
    }    // Mostra il form per modificare un progetto esistente
    public function edit($id)
    {
        // Cerca il progetto nel database con l'ID specificato
        $project = Project::findOrFail($id);
        // Recupera tutti i tipi e tutte le tecnologie dal database
        $types = type::all();
        $technologies = technology::all();
         // Carica la vista 'edit' e passa il progetto, i tipi e le tecnologie alla vista
        return view('edit', compact('project', 'types', 'technologies'));
    }    // Aggiorna un progetto esistente nel database
    public function update(Request $request, $id)
    {
        // Cerca il progetto nel database con l'ID specificato
        $project = Project::findOrFail($id);
        // Recupera i dati dal form inviato
        $data = $request->all();
        // Aggiorna i dati del progetto con i nuovi dati forniti
        $project->update($data);
        // Collega le nuove tecnologie selezionate al progetto tramite la tabella di collegamento
        $project->technologies()->sync($request->input('technologies'));
        // Assegna il nuovo tipo selezionato al progetto
        $project->type()->associate($request->input('type_id'));
        // Salva le modifiche
        $project->save();
        // Reindirizza all'URL della vista 'show' per visualizzare il progetto modificato
        return redirect()->route('project.show', $project->id);
    }

}


