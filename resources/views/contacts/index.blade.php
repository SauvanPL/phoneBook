@extends('layouts.app')

@section('title', 'Contact List')

@section('content')

    <div class="col-3">
    <label for="nameSearch">Search for Contact</label>
        <form action="/search" method="get">
    <div class="form-group">
        <input type="search" name="search" value="" class="form-control">
    </div>
    <div>{{$errors->first('name')}}</div>
    <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>



   <div>

           <h1>Contact List</h1>
       <div class="col">

           <tr>
               <form action="{{action('ContactsController@export')}}" >
                   <button type="submit">Continue</button>
               </form>

               <th class="col"><a href="contacts/create">Add New Contact</a></th>
               <th class="col"><a href="{{action('ContactsController@export')}}">Export to file</a></th>
           </tr>


       </div>
   </div>






   <table class="table table-striped table-dark">
       <thead>


       <tr>
           <th scope="col"><a href="{{action('ContactsController@sortByName')}}">Name</a></th>
           <th scope="col"><a href="{{action('ContactsController@sortByNumber')}}">Number</a></th>
       </tr>
       </thead>
       <tbody>
       @foreach($contacts as $contact)
       <tr>


           <td><a href="/contacts/{{$contact->id}}">{{$contact->name}}</a></td>
           <td>{{$contact->number}}</td>

       </tr>
       @endforeach
       </tbody>

   </table>
    {{ $contacts->links() }}



@endsection
