@extends('layouts.app')

@section('title', 'edit form for' . $contact->name)

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Edit form for {{$contact->name}}</h1>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <form action="/contacts/{{$contact->id}}" method="POST" class="pb-5">
               @method('PATCH')
               @include('contacts/form')

                <button type="submit" class="btn btn-primary">Save Contact</button>

            </form>

        </div>

    </div>

@endsection
