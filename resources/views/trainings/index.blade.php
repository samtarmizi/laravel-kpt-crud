<h1>This is Training Index</h1>

@foreach($trainings as $training)
    {{ $training->id }} - {{ $training->title }} <br>
@endforeach