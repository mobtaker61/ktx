<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'status' => 'required|in:new,read,replied',
        ]);

        Contact::create($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Contact message created successfully.');
    }

    public function show(Contact $contact)
    {
        // Mark as read if status is new
        if ($contact->status === 'new') {
            $contact->update(['status' => 'read']);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'status' => 'required|in:new,read,replied',
        ]);

        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Contact message updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact message deleted successfully.');
    }

    public function markAsRead(Contact $contact)
    {
        $contact->update(['status' => 'read']);
        return redirect()->route('admin.contacts.index')->with('success', 'Message marked as read.');
    }

    public function markAsReplied(Contact $contact)
    {
        $contact->update(['status' => 'replied']);
        return redirect()->route('admin.contacts.index')->with('success', 'Message marked as replied.');
    }
}
