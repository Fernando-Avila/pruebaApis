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
                <a href="{{ route('student.create') }}" class="btn btn-primary">Login</a>
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Quality</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->lastname }}</td>
                                    <td>{{ $student->quality }}</td>
                                    <td> <a href="{{ route('student.edit', ['student' => $student->id]) }}"
                                            class=" btn btn-primary"> Edit</a><a class=" btn btn-success">
                                            Review</a>
                                        <form action="{{ route('student.destroy', ['student' => $student->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" btn btn-danger" onclick="return confirm('Are you sure to delete the student??')">
                                                Delete</button>
                                        </form>
                                    </td>
                                @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    @if ($students->hasPages())
                                        {{ $students->links() }}
                                    @endif
                                    @if ($students->total() == 0)
                                        <H3 class="text-center">No students found</H3>
                                    @endif
                                </td>
                            </tr>
                        </tfoot>


                    </table>
                </div>

            </div>
        </div>
    @endsection