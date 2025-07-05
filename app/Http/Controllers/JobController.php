<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Inertia\Inertia;


class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::select('id', 'title', 'company', 'type', 'location', 'salary', 'posted', 'description', 'requirements', 'benefits')
            ->latest()
            ->get();
        return Inertia::render('jobs/Index', [
            'jobs' => $jobs
        ]);
    }
}
