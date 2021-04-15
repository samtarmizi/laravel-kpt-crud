<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = auth()->user();
        // $trainings = $user->trainings()->paginate(5);
        $trainings = Training::paginate(5);

        return view('trainings.index', compact('trainings'));
    }

    public function create()
    {
        return view('trainings.create');
    }

    public function store(Request $request)
    {
        // store to DB
        $training = new Training();
        $training->title = $request->title;
        $training->description = $request->description;
        $training->user_id = auth()->user()->id;
        $training->save();

        // return training index
        return redirect()->route('training:index')->with([
            'alert-type' => 'alert-primary',
            'alert-message' => 'Your training has been successfuly created'
        ]);
    }

    public function show(Training $training)
    {
        $this->authorize('view', $training);

        return view('trainings.show', compact('training'));
    }

    public function edit(Training $training)
    {
        $this->authorize('update', $training);

        return view('trainings.edit', compact('training'));
    }

    public function update(Training $training, Request $request)
    {
        $this->authorize('update', $training);

        // update to db using new input
        $training->title = $request->title;
        $training->description = $request->description;
        $training->save();

        // redirect to /trainings
        return redirect()->route('training:index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Your training has been successfuly updated'
        ]);
    }

    public function destroy(Training $training)
    {
        $this->authorize('delete', $training);

        // delete from table
        $training->delete();

        // return to trainings
        return redirect()->route('training:index')->with([
            'alert-type' => 'alert-danger',
            'alert-message' => 'Your training has been successfuly deleted'
        ]);
    }
}
