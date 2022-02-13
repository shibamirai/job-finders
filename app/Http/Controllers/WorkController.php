<?php

namespace App\Http\Controllers;

use App\Models\JobFinder;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    public function create(JobFinder $jobFinder)
    {
        return view('admin.job-finders.edit', [
            'job_finder' => $jobFinder,
            'open' => 0,
        ]);
    }

    public function store(JobFinder $jobFinder)
    {
        $attributes = request()->validate([
            'content' => 'required',
            'title' => 'nullable',
            'url' => 'nullable|url',
            'languages' => 'required',
            'creation_time' => 'nullable|integer',
            'description' => 'nullable',
        ]);

        $attributes = array_merge($attributes, [
            'job_finder_id' => $jobFinder->id,
        ]);

        Work::create($attributes);

        return redirect(route('job-finders.edit', $jobFinder))->with('success', 'ポートフォリオを追加しました！');
    }

    public function edit(JobFinder $jobFinder, Work $work)
    {
        return view('admin.job-finders.edit', [
            'job_finder' => $jobFinder,
            'open' => $work->id,
        ]);
    }

    public function update(JobFinder $jobFinder, Work $work)
    {
        $attributes = request()->validate([
            'content' => 'required',
            'title' => 'nullable',
            'url' => 'nullable|url',
            'languages' => 'required',
            'creation_time' => 'nullable|integer',
            'description' => 'nullable',
        ]);

        $work->update($attributes);

        return redirect(route('job-finders.edit', $jobFinder))->with('success', 'ポートフォリオを更新しました！');
    }

    public function destroy(JobFinder $jobFinder, Work $work)
    {
        $work->delete();

        return redirect(route('job-finders.edit', $jobFinder))->with('success', 'ポートフォリオを削除しました！');
    }
}
