<?php

namespace App\Http\Controllers;

use App\Models\JobFinder;
use Illuminate\Http\Request;

class AdminJobFinderController extends Controller
{
    public function index()
    {
        return view('/admin/job-finders/index', [
            'job_finders' => JobFinder::orderBy('hired_at', 'desc')->filter(
                request(['search'])
            )->paginate(10),
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
            'gender' => 'required',
            'age' => 'required',
            'handicaps' => 'required',
            'use_from' => 'required',
            'skills' => 'required',
            'occupation' => 'required',
            'description' => 'required',
            'hired_at' => 'required',
            'employment_pattern' => 'required',
        ]);

        $attributes = array_merge($attributes, [
            'avatar' => 'https:/i.pravatar.cc/',
            'has_certificate' => request('certificate') ? true : false,
            'is_handicaps_opened' => request('opened') ? true : false,
        ]);

        JobFinder::create($attributes);

        return redirect('/admin/job-finders')->with('success', '追加しました！');
    }

    public function show(JobFinder $jobFinder = null)
    {
        # code...
    }

    public function destroy(JobFinder $jobFinder)
    {
        $jobFinder->delete();

        return back()->with('success', '削除しました！');
    }
}
