<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(20);
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
        ]);

        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted.');
    }

    public function trashed()
    {
        $contacts = Contact::onlyTrashed()->paginate(20);
        return view('contacts.trashed', compact('contacts'));
    }

    public function restore($id)
    {
        Contact::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('contacts.trashed')->with('success', 'Contact restored.');
    }

    public function forceDelete($id)
    {
        Contact::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('contacts.trashed')->with('success', 'Contact permanently deleted.');
    }
}
