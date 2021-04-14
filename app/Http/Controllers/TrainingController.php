<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::all();

        return view('trainings.index', compact('trainings'));
    }

    public function create()
    {
        return view('trainings.create');
    }
}
