@extends('layouts.app')

@section('content')
    <div class="container center">
        <div class="row">
            <div class="col-12 text-center ">
                @if (isset($client))
                    <form action="{{ route('client.update', ['client' => $client->id]) }}" method="post">
                        @Method('PUT')
                    @else
                        <form action="{{ route('client.store') }}" method="post">
                @endif
                @csrf
                <div class="card action">
                    <div class="card-body">
                        @if (isset($client))
                            <h4 class="card-title">Edit client</h4>
                        @else
                            <h4 class="card-title">Create Client</h4>
                        @endif
                        <p class="card-text">Body</p>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name') ?? @$client->name }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</label>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="ci">CI</label>
                            <input type="text" name="ci" id="ci" class="form-control"
                                value="{{ old('ci') ?? @$client->name }}">
                            @error('ci')
                                <p class="text-danger">{{ $message }}</label>
                                @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                value="{{ old('email') ?? @$client->email }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</label>
                                @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="password">password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                value="{{ old('password') ?? @$client->password }}">
                            @error('password')
                                <p class="text-danger">{{ $message }}</label>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="age">age</label>
                            <input type="number" name="age" id="quality" class="form-control",
                                value="{{ old('age') ?? @$client->age }}">
                            @error('age')
                                <p class="text-danger">{{ $message }}</label>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Gener</label>
                            <select class="form-select form-select-lg" name="" id="">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if (isset($client))
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        @else
                            <button type="submit" class="btn btn-primary">Create</button>
                        @endif
                    </div>
                    </form>


                </div>
            </div>
        @endsection
