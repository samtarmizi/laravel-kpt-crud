@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Training Index') }}</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($trainings as $training)
                            <tr>
                                <td>{{ $training->id }}</td>
                                <td>{{ $training->title }}</td>
                                <td>{{ $training->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('training:show', $training) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('training:edit', $training) }}" class="btn btn-success">Edit</a>
                                     <a onclick="return confirm('Are you sure?')" href="{{ route('training:destroy', $training) }}" class="btn btn-danger">Delete</a>
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
