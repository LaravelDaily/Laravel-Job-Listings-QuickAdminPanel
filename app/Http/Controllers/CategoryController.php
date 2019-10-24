<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $jobs = Job::with('company')
            ->whereHas('categories', function($query) use($category) {
                $query->whereId($category->id);
            })
            ->paginate(7);

        $banner = 'Category: '.$category->name;
    
        return view('jobs.index', compact(['jobs', 'banner']));
    }
}
