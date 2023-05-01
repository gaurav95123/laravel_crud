<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; 

class ContactController extends Controller
{
   
    public function index()
    {
        $contacts = Contact::all();
      return view ('contacts_folder.index')->with('contacts', $contacts);
    }
 
    
    public function create()
    {
        return view('contacts_folder.Create');
    }
 
  
    public function store(Request $request)
    {
        $input = $request->all();
        Contact::create($input);
        // return redirect('contact')->with('flash_message', 'Contact Addedd!');  
        return redirect()->back();
    }
 
    
    public function show($id)
    {
        $contacts = Contact::find($id);
        return view('contacts_folder.show', compact('contacts'));
    }
 
    
    public function edit($id)
    {
        $contacts = Contact::find($id);
        return view('contacts_folder.edit', compact('contacts'));
    }
 
  
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $input = $request->all();
        $contact->update($input);
        // return redirect('contact')->with('flash_message', 'Contact Updated!');  
        return redirect()->back();
    }
 
  
    public function destroy($id)
    {
        Contact::destroy($id);
        // return redirect('contact')->with('flash_message', 'Contact deleted!'); 
        return redirect() ->back();
    }
}
