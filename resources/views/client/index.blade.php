@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('fail'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <a href="{{ route('client.create') }}" class="btn btn-primary">create</a>
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Ci</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->ci }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td> <a href="{{ route('client.edit', ['client' => $client->id]) }}"
                                            class=" btn btn-primary"> Edit</a><a href="{{ route('client.show', ['client' => $client->id]) }}" class=" btn btn-success">
                                            Review</a>
                                        <form action="{{ route('client.destroy', ['client' => $client->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" btn btn-danger" onclick="return confirm('Are you sure to delete the client??')">
                                                Delete</button>
                                        </form>
                                    </td>
                                @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    @if ($clients->hasPages())
                                        {{ $clients->links() }}
                                    @endif
                                    @if ($clients->total() == 0)
                                        <H3 class="text-center">No clients found</H3>
                                    @endif
                                </td>
                            </tr>
                        </tfoot>


                    </table>
                </div>

            </div>
        </div>
    @endsection