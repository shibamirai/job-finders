<?php

namespace App\Http\Controllers;

use App\Models\JobFinder;
use Illuminate\Http\Request;

class JobFinderController extends Controller
{
    public function index()
    {
        return view('job-finders.index', [
            'job_finders' => JobFinder::latest()->paginate(9),
        ]);
    }
}
