<div class="col-lg-4 sidebar">
    <div class="single-slidebar">
        <h4>Jobs by Location</h4>
        <ul class="cat-list">
            @foreach($sidebarLocations as $location)
                <li><a class="justify-content-between d-flex" href="{{ route('locations.show', $location->id) }}"><p>{{ $location->name }}</p><span>{{ $location->jobs_count }}</span></a></li>
            @endforeach
        </ul>
    </div>

    <div class="single-slidebar">
        <h4>Top rated job posts</h4>
        <div class="active-relatedjob-carusel">
            @foreach($sidebarJobs as $job)
                <div class="single-rated">
                    @if($job->company && $job->company->logo)
                        <img class="img-fluid" src="{{ $job->company->logo->getUrl() }}" alt="">
                    @endif
                    <a href="{{ route('jobs.show', $job->id) }}"><h4>{{ $job->title }}</h4></a>
                    @if($job->company)
                        <h6>{{ $job->company->name }}</h6>
                    @endif
                    <p>
                        {{ $job->short_description }}
                    </p>
                    @if($job->job_nature)
                        <h5>Job Nature: {{ $job->job_nature }}</h5>
                    @endif
                    @if($job->address)
                        <p class="address"><span class="lnr lnr-map"></span> {{ $job->address }}</p>
                    @endif
                    <p class="address"><span class="lnr lnr-database"></span> {{ $job->salary }}</p>
                </div>
            @endforeach															
        </div>
    </div>							

    <div class="single-slidebar">
        <h4>Jobs by Category</h4>
        <ul class="cat-list">
            @foreach($sidebarCategories as $category)
                <li><a class="justify-content-between d-flex" href="{{ route('categories.show', $category->id) }}"><p>{{ $category->name }}</p><span>{{ $category->jobs_count }}</span></a></li>
            @endforeach
        </ul>
    </div>
</div>