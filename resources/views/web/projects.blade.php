@extends('web.app')


@section('title','Projects')
@section('meta_description', 'View genyra Group projects delivering MedTech, laboratory, calibration, and health systems solutions for healthcare institutions across East Africa.')

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'Projects', 'url' => route('projects')],
    ],
])
@endpush


@section('body')




@endsection