<?php

namespace App\Http\Controllers;

use App\Models\JobFinder;
use Illuminate\Http\Request;

class AdminJobFinderController extends Controller
{
    public function index()
    {
        return view('admin.job-finders.index', [
            'job_finders' => JobFinder::orderBy('hired_at', 'desc')->filter(
                request(['search'])
            )->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.job-finders.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'avatar' => 'required',
            'name' => ['required', 'unique:job_finders,name'],
            'gender' => 'required',
            'age' => 'required|integer|between:18,60',
            'handicaps' => 'required',
            'use_from' => 'required',
            'skills' => 'required',
            'occupation' => 'required',
            'description' => 'required',
            'hired_at' => 'required',
            'employment_pattern' => 'required',
        ]);

        $attributes = array_merge($attributes, [
            'has_certificate' => request('certificate') ? true : false,
            'is_handicaps_opened' => request('opened') ? true : false,
        ]);

        $jobFinder = JobFinder::create($attributes);

        return redirect(route('job-finders.edit', $jobFinder))->with('success', $jobFinder->name .'さんを追加しました！');
    }

    public function edit(JobFinder $jobFinder)
    {
        return view('admin.job-finders.edit', [
            'job_finder' => $jobFinder
        ]);
    }

    public function destroy(JobFinder $jobFinder)
    {
        $jobFinder->delete();

        return back()->with('success', '削除しました！');
    }

    public function update(JobFinder $jobFinder)
    {
        $attributes = request()->validate([
            'avatar' => 'required',
            'gender' => 'required',
            'age' => 'required|integer|between:18,60',
            'handicaps' => 'required',
            'use_from' => 'required',
            'skills' => 'required',
            'occupation' => 'required',
            'description' => 'required',
            'hired_at' => 'required',
            'employment_pattern' => 'required',
        ]);

        $attributes = array_merge($attributes, [
            'has_certificate' => request('certificate') ? true : false,
            'is_handicaps_opened' => request('opened') ? true : false,
        ]);

        $jobFinder->update($attributes);

        return redirect(route('job-finders.edit', $jobFinder))->with('success', $jobFinder->name .'さんを更新しました！');
    }
}
