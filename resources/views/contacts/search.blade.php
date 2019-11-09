@extends('layouts.app')

@section('title', 'Contact List')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Contact List</h1>
            <p><a href="contacts/create">Add New Contact</a></p>
        </div>
    </div>

    @foreach($contacts as $contact)
        <div class="row">
            <div class="col-12">

            </div>

        </div>

        <div class="row">
            <div class="col-2"><a href="/contacts/{{$contact->id}}">{{$contact->name}}</a></div>
            <div class="col-2">{{$contact->number}}</div>

        </div>
    @endforeach
    {{ $contacts->links() }}
@endsection
