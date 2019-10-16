<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use App\Location;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')
            ->when(request()->has('location'), function($query) {
                $query->whereHas('location', function($query) {
                    $query->whereId(request('location'));
                });
            })
            ->when(request()->has('category'), function($query) {
                $query->whereHas('categories', function($query) {
                    $query->whereId(request('category'));
                });
            })
            ->paginate(7);

        if(request()->has('location'))
            $banner = 'Location: '.Location::findOrFail(request('location'))->name ?? 'Jobs';
        elseif(request()->has('category'))
            $banner = 'Category: '.Category::findOrFail(request('category'))->name ?? 'Jobs';
        else
            $banner = 'Jobs';

        return view('index', compact(['jobs', 'banner']));
    }

    public function show(Job $job)
    {
        $job->load('company');

        return view('show', compact('job'));
    }
}
