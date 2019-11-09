@extends('layouts.app')

@section('title', 'Input form')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Input form</h1>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <form action="/contacts" method="POST" class="pb-5">
               @include('contacts/form')

                <button type="submit" class="btn btn-primary">Add Contact</button>

            </form>

        </div>

    </div>

@endsection
