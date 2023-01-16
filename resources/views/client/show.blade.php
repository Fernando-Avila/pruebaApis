@extends('layouts.app')
@section('content')
    <div class="mx-auto" style="width: 30%;">
        <div class="card text-center card border-light">
            <h2 class="card-title">{{ $client->phone }}</h2>
            <div class="card-body">
                <p class="card-text">{{ $client->email }}</p>
            </div>

            <div class="card-body">
                <p class="card-text" colo>{{ $client->code }}</p>

            </div>
        </div>
    @endsection
