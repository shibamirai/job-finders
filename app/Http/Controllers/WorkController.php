<?php

namespace App\Http\Controllers;

use App\Models\JobFinder;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function create(JobFinder $jobFinder)
    {
        return view('admin.works.create', [
            'job_finder' => $jobFinder,
        ]);
    }

    public function store(JobFinder $jobFinder)
    {
        $attributes = request()->validate([
            'content' => 'required',
            'url' => 'required',
            'languages' => 'required',
            'creation_time' => 'required|integer',
            'description' => 'required',
        ]);

        $attributes = array_merge($attributes, [
            'job_finder_id' => $jobFinder->id,
            'title' => request('title'),
        ]);

        Work::create($attributes);

        if (request('continue')) {
            return redirect(route('works.create', $jobFinder))->with('success', '追加しました！');
        } else {
            return redirect('/admin/job-finders')->with('success', '追加しました！');
        }
    }
}
