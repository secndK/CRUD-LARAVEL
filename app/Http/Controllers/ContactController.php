<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //afficher la liste des contacts
        $contact = Contact::all();
        return view('contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //retourner le formulaire de création
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //enregistre un nouveau contact dans la base de donnée
        $validatedData = $request->validate([
            'nomComplet' => 'required|string|max:50',
            'email' => 'required|email|unique:contacts,email',
            'telephone' => 'required|string|max:15',
            'salaire' => 'required|numeric|min:0',
        ]);

        //methodes pour évited d'instancer à la main
        Contact::create($validatedData);

        return redirect('/')
        ->with('success', 'Contact ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //affichr les infos spécifiques d'un contact
        $contact = contact::findOrfail($id);
        return view ('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //retourner le fichier de modification
        $contact = contact::findOrfail($id);
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //enregister les modifications dans la base de données
        $validatedData = $request->validate([
            'nomComplet' => 'required|string|max:50',
            'email' => 'required|email|unique:contacts,email',
            'telephone' => 'required|string|max:15',
            'salaire' => 'required|numeric|min:0',
        ]);

        //recherche et MAJ dans la base
        $contact = contact::findOrfail($id);
        $contact->update($validatedData);


        //redirection avec message flash
        return redirect('/')
        ->with('success', 'le contact a été modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //pour supprimer un contact dans la base de données
        $contact = contact::findOrfail($id);
        $contact->delete();

        return redirect('/')->with('success', 'un contact a été supprimé avec succès');

    }
}
