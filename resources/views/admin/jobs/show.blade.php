@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.job.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.id') }}
                        </th>
                        <td>
                            {{ $job->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.title') }}
                        </th>
                        <td>
                            {{ $job->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.company') }}
                        </th>
                        <td>
                            {{ $job->company->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.short_description') }}
                        </th>
                        <td>
                            {{ $job->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.full_description') }}
                        </th>
                        <td>
                            {!! $job->full_description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.requirements') }}
                        </th>
                        <td>
                            {!! $job->requirements !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.job_nature') }}
                        </th>
                        <td>
                            {{ $job->job_nature }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.location') }}
                        </th>
                        <td>
                            {{ $job->location->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.address') }}
                        </th>
                        <td>
                            {{ $job->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Categories
                        </th>
                        <td>
                            @foreach($job->categories as $id => $categories)
                                <span class="label label-info label-many">{{ $categories->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.salary') }}
                        </th>
                        <td>
                            {{ $job->salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.top_rated') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $job->top_rated ? "checked" : "" }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection