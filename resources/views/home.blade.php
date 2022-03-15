@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                </div>
                <h5 class="card-header">
                    <a href="{{ route('todo.create') }}" class="btn btn-sm btn-outline-primary">Add Item</a>
                </h5>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <table class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($todos as $todo)
                                <tr>
                                    <td scope="row"><a href="{{ route('todo.edit', $todo->id) }}" style="color:black">{{ $todo->title }}</a></td>
                                    <td scope="row"> {{ $todo->detail }}</td>
                                    <td scope="row"> {{ $todo->status }}</td>
                                    <td>
                                        <a href="{{ route('todo.edit', $todo->id) }}" ><button class="btn btn-sm btn-outline-success">Edit</button></a>
                                        <a href="{{ route('todo.show', $todo->id) }}" ><button class="btn btn-sm btn-outline-danger">Delete</button></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    No Items Added!
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
