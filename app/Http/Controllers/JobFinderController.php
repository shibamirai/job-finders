<?php

namespace App\Http\Controllers;

use App\Models\JobFinder;
use Illuminate\Http\Request;

class JobFinderController extends Controller
{
    public function index()
    {
        return view('job-finders.index', [
            'jobFinders' => JobFinder::withCount('works')->orderBy('hired_at', 'desc')->paginate(9),
        ]);
    }

    public function show(JobFinder $jobFinder)
    {
        return view('job-finders.show', [
            'jobFinder' => $jobFinder,
        ]);
    }

    public function statistics()
    {
        return view('statistics', [
            'jobFinders' => JobFinder::all(),
        ]);
    }
}
