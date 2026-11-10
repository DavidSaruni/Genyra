@extends('web.app')

@section('title', 'Metrology, Calibration & Preventive Maintenance - genyra Group')
@section('meta_description', 'Metrology, calibration, and preventive maintenance from genyra Group for medical, laboratory, and industrial instruments.')

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'What We Do', 'url' => url('/#business-lines')],
        ['name' => 'Metrology, Calibration & Preventive Maintenance', 'url' => route('department.metrology')],
    ],
])
@endpush

@section('body')

<section class="biz-hero">
  <div class="biz-hero__inner">
    <nav class="dept-crumb dept-crumb--light" aria-label="Breadcrumb">
      <a href="{{ url('/') }}">Home</a>
      <span aria-hidden="true">/</span>
      <a href="{{ url('/#business-lines') }}">What We Do</a>
      <span aria-hidden="true">/</span>
      <span>Metrology, Calibration &amp; Preventive Maintenance</span>
    </nav>
    <p class="mix-kicker mix-kicker--light">Department 4</p>
    <h1>Calibration and preventive maintenance.</h1>
    <span class="biz-hero__rule" aria-hidden="true"></span>
  </div>
</section>

<section class="index">
  <div class="mix-wrap">
    <ol class="index__list">
      <li>
        <span>01</span>
        <div>
          <h3>Calibration</h3>
          <p>Checked against a known reference, adjusted if it has drifted, and recorded.</p>
        </div>
        <img src="{{ asset('images/calibration.jpeg') }}" alt="Calibration instruments">
      </li>
      <li>
        <span>02</span>
        <div>
          <h3>Preventive maintenance</h3>
          <p>Cleaning, worn parts, and a check that the instrument still performs.</p>
        </div>
        <img src="https://images.pexels.com/photos/3825527/pexels-photo-3825527.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Engineer servicing technical equipment">
      </li>
    </ol>
  </div>
</section>

@include('web.partials.dept-help')

@endsection
