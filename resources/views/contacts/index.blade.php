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



   <div class="row">
       <div class="col-12">
           <h1>Contact List</h1>
           <p><a href="contacts/create">Add New Contact</a></p>
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
