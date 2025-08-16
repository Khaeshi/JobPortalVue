<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Inertia\Inertia;
use Illuminate\Http\Request;


class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->get();
        return Inertia::render('Jobs/Index', [
            'jobs' => $jobs,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location'=> 'required|string|max:50',
            'company'=> 'required|string|max:20',
            'type'=> 'required|string',
            'salary'=> 'required|string|max:40',
            'status'=> 'required|string',
        ]);
        //create the job
        $job = $request->user()->jobs()->create($validated);

        return redirect()->route('jobs.index')->with('success','Job posted successfully!');
    }

    public function destroy(Job $job)
    {
        if($job->user_id !== auth()->id()) {
            abort(403,'Unauthorized');
    }
    $job->delete();
    return redirect()->route('jobs.index')->with('success','Job deleted successfully');
    }
}

