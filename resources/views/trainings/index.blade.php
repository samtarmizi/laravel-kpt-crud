@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if( session()->has('alert-message'))
                <div class="alert {{ session()->get('alert-type') }}">
                    {{ session()->get('alert-message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    {{ __('Training Index') }}

                    <div class="float-right">
                        <form action="{{ route('training:index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" value="{{ request()->get('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Query</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Creator</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($trainings as $training)
                            <tr>
                                <td>{{ $training->id }}</td>
                                <td>{{ $training->title }}</td>
                                <td>{{ $training->user->name }}</td>
                                <td>{{ $training->created_at->diffForHumans() }}</td>
                                <td>
                                    @can('view', $training)
                                        <a href="{{ route('training:show', $training) }}" class="btn btn-primary">Show</a>
                                    @endcan
                                    @can('update', $training)
                                        <a href="{{ route('training:edit', $training) }}" class="btn btn-success">Edit</a>
                                    @endcan
                                    @can('delete', $training)
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('training:destroy', $training) }}" class="btn btn-danger">Delete</a>
                                    @endcan
                                </td>
                            </tr>  
                        @endforeach
                    </table>
                    {{ $trainings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
