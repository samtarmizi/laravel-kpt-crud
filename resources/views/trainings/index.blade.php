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
                        </tr>
                        @foreach($trainings as $training)
                            <tr>
                                <td>{{ $training->id }}</td>
                                <td>{{ $training->title }}</td>
                                <td>{{ $training->created_at }}</td>
                            </tr>  
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection