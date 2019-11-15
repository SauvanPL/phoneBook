<?php

namespace App\Http\Controllers;

use App\contact;
use App\Exports\ContactExport;
use App\Imports\ContactsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class ContactsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $contacts =  auth()->user()->contacts()->orderBy('number')->paginate(5);
       //$contacts = (new \App\contact)->scopeSearch('name')->paginate(5);

        return view('contacts/index',compact('contacts'));

    }

    public function create(){
        $contact = new contact();

        return view('contacts/create', compact('contact'));
    }
    public function search(){

        $search = request('search');
        $contacts =  auth()->user()->contacts()->where('name','like', '%'.$search.'%')->paginate(5);

       // $orders = App\Order::search('')->where('name','like', '%'.$search.'%')->get();

        return view('contacts/index',compact('contacts'));
    }

    public function store(){

        auth()->user()->contacts()->create($this->validateRequest());
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

        $request =new Request();
        return request()->validate([
            //'user_id'=>['unique:contacts', 'user_id'],
            'name'=>['required', 'min:3'],
            'number'=> ['required', 'min:10', 'numeric'],

        ]);
    }
    public function sortByName(){
        $contacts =  auth()->user()->contacts()->orderBy('name')->paginate(5);

        //$contacts = (new \App\contact)->scopeSearch('name')->paginate(5);

        return view('contacts/index',compact('contacts'));

    }
    public function sortByNumber(){
        $contacts =  auth()->user()->contacts()->orderBy('number')->paginate(5);
        //$contacts = (new \App\contact)->scopeSearch('name')->paginate(5);

        return view('contacts/index',compact('contacts'));

    }

    public function export()

    {
        $fileName =  auth()->user()->name.'.xlsx';

        return Excel::download(new ContactExport,  $fileName);
    }

    public function import()
    {
        Excel::import(new ContactsImport,request()->file('file'));

        return back();
    }
}
