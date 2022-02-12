<?php

namespace App\Http\Controllers;

use App\Models\JobFinder;
use Illuminate\Http\Request;

class JobFinderController extends Controller
{
    public function index()
    {
        return view('job-finders.index', [
            'job_finders' => JobFinder::withCount('works')->orderBy('hired_at', 'desc')->paginate(9),
        ]);
    }

    public function show(JobFinder $jobFinder)
    {
        return view('job-finders.show', [
            'job_finder' => $jobFinder,
        ]);
    }
}
