<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Devis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    public function send(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required[email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ], [
            'required' => "Ce champs est obligatoire.",
            'email' => 'Ce champs doit conténir un email valide.',
            'string' => "Ce champs doit conténir une chaîne de caractères."
        ]);

        if($validator->failed()) {
            return redirect()->back()->withErrors($validator);
        }

        Contact::create($request->all(['name', 'email', 'phone', 'subject', 'message']));

        return redirect()->back()->with('success', 'Votre message a été envoyé! Merci de nous avoir contacter.');
    }

    public function askDevis(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required[email',
            'phone' => 'required',
            'type' => 'required',
            'message' => 'required'
        ], [
            'required' => "Ce champs est obligatoire.",
            'email' => 'Ce champs doit conténir un email valide.',
            'string' => "Ce champs doit conténir une chaîne de caractères."
        ]);

        if($validator->failed()) {
            return redirect()->back()->withErrors($validator);
        }

        Devis::create($request->all(['name', 'email', 'phone', 'type', 'message']));

        return redirect()->back()->with('success', 'Votre demande a été envoyée!');
    }

    public function show($id) {
        $contact = Contact::find($id);
        return view('admin.pages.contact', ['contact' => $contact]);
    }

    public function destroy($id) {
        $contact = Contact::find($id);

        if(!$contact) return redirect()->back()->with('error', "La suppression du message n'a pas aboutie.");

        Contact::destroy($id);

        return redirect()->back()->with('success', 'Message supprimé avec succès.');
    }
}
