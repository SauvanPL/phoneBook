@extends('layouts.app')

@section('title', 'Details for '. $contact->name)

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Details for {{$contact->name}} </h1>
            <p><a href="/contacts/{{$contact->id}}/edit">Edit</a> </p>

            <form action="/contacts/{{$contact->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn-danger" type="submit">Delete</button>
            </form>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Name </strong>{{$contact->name}}</p>
            <p><strong>Number </strong>{{$contact->number}}</p>


        </div>

    </div>

@endsection
