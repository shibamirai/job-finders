<?php

namespace App\Http\Controllers;

use App\Enums\EmploymentPattern;
use App\Enums\Gender;
use App\Enums\Handicap;
use App\Http\Requests\JobFinderRequest;
use App\Models\JobFinder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class AdminJobFinderController extends Controller
{
    public function index()
    {
        return view('admin.job-finders.index', [
            'jobFinders' => JobFinder::orderBy('hired_at', 'desc')->orderBy('id')->filter(
                request(['search'])
            )->paginate(9)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('admin.job-finders.create');
    }

    public function store(JobFinderRequest $request)
    {
        $attributes = array_merge(
            $request->safe()->only([
                'avatar', 'name', 'gender', 'age', 'handicap', 'use_from', 'skills', 'occupation', 'description', 'hired_at', 'employment_pattern'
            ]),
            [
                'has_certificate' => request('certificate') ? true : false,
                'is_handicaps_opened' => request('opened') ? true : false,
            ]
        );

        $jobFinder = JobFinder::create($attributes);

        return redirect(route('job-finders.edit', $jobFinder))->with('success', $jobFinder->name .'さんを追加しました！');
    }

    public function edit(JobFinder $jobFinder)
    {
        return view('admin.job-finders.edit', [
            'jobFinder' => $jobFinder
        ]);
    }

    public function destroy(JobFinder $jobFinder)
    {
        $jobFinder->delete();

        return back()->with('success', '削除しました！');
    }

    public function update(JobFinder $jobFinder, JobFinderRequest $request)
    {
        $attributes = array_merge(
            $request->safe()->only([
                'avatar', 'gender', 'age', 'handicap', 'use_from', 'skills', 'occupation', 'description', 'hired_at', 'employment_pattern'
            ]),
            [
                'has_certificate' => request('certificate') ? true : false,
                'is_handicaps_opened' => request('opened') ? true : false,
            ]
        );

        $jobFinder->update($attributes);

        return redirect(route('job-finders.edit', $jobFinder))->with('success', $jobFinder->name .'さんを更新しました！');
    }
}
