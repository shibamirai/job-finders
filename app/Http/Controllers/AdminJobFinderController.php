<?php

namespace App\Http\Controllers;

use App\Models\JobFinder;
use Illuminate\Http\Request;

class AdminJobFinderController extends Controller
{
    public function index()
    {
        return view('/admin/job-finders/index', [
            'job_finders' => JobFinder::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('/admin/job-finders/create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'unique:job_finders,name'],
            'handicaps' => 'required',
            'skills' => 'required',
            'occupation' => 'required',
            'description' => 'required',
        ]);
        JobFinder::create($attributes);

        return redirect('/job-finders');
    }

    public function show(JobFinder $jobFinder = null)
    {
        # code...
    }
}
