<?php

namespace App\Http\Controllers;

use App\contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $contacts = contact::orderBy('number')->paginate(5);
       //$contacts = (new \App\contact)->scopeSearch('name')->paginate(5);

        return view('contacts/index',compact('contacts'));

    }

    public function create(){
        $contact = new contact();

        return view('contacts/create', compact('contact'));
    }
    public function search(){
        //contact::create($this->validateRequest());
        $search = request('search');
        $contacts = contact::where('name','like', '%'.$search.'%')->paginate(5);

       // $orders = App\Order::search('')->where('name','like', '%'.$search.'%')->get();

        return view('contacts/index',compact('contacts'));
    }

    public function store(){

        contact::create($this->validateRequest());
        /*
        $contact = new contact();
        $contact ->name = request('name');
        $contact ->number = request('number');
        $contact -> save();
        */
        return redirect('contacts');
    }

    public function show(contact $contact){

        return view('contacts/show', compact('contact'));

    }
    public function edit(contact $contact){
        return view('contacts/edit', compact('contact'));
    }
    public function update(contact $contact){

        $contact->update($this->validateRequest());
        return redirect('contacts/' .$contact->id);

    }
    public function destroy(contact $contact){

        $contact->delete();
        return redirect('contacts');

    }

    private function validateRequest(){

        return request()->validate([
            'name'=>['required', 'min:3'],
            'number'=>['required', 'min:10', 'numeric', 'unique:contacts']
        ]);
    }
    public function sortByName(){
        $contacts = contact::orderBy('name')->paginate(5);
        //$contacts = (new \App\contact)->scopeSearch('name')->paginate(5);

        return view('contacts/index',compact('contacts'));

    }
    public function sortByNumber(){
        $contacts = contact::orderBy('number')->paginate(5);
        //$contacts = (new \App\contact)->scopeSearch('name')->paginate(5);

        return view('contacts/index',compact('contacts'));

    }
}
