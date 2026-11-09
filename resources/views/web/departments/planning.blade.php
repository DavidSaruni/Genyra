@extends('web.app')

@section('title', 'Strategic Planning & QMS - genyra Group')
@section('meta_description', 'Strategic planning and quality management systems from genyra Group, including the planning workflow and the NQCL Strategic Plan.')

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'What We Do', 'url' => url('/#business-lines')],
        ['name' => 'Strategic Planning & QMS', 'url' => route('department.strategic-planning')],
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
      <span>Strategic Planning &amp; QMS</span>
    </nav>
    <p class="mix-kicker mix-kicker--light">Department 3</p>
    <h1>Strategic planning and quality management systems.</h1>
    <span class="biz-hero__rule" aria-hidden="true"></span>
  </div>
</section>

<section class="index">
  <div class="mix-wrap">
    <ol class="index__list">
      <li>
        <span>01</span>
        <div>
          <h3>Strategic planning</h3>
          <p>Discover, diagnose, design, deliver, and embed.</p>
        </div>
        <img src="https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&cs=tinysrgb&w=600" alt="A planning discussion">
      </li>
      <li>
        <span>02</span>
        <div>
          <h3>NQCL Strategic Plan</h3>
          <p>Written on that same workflow.</p>
        </div>
        <img src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=600" alt="A team reviewing a plan">
      </li>
      <li>
        <span>03</span>
        <div>
          <h3>Quality management systems</h3>
          <p>Processes, responsibilities, and records.</p>
        </div>
        <img src="https://images.pexels.com/photos/3184431/pexels-photo-3184431.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Notes from a quality review">
      </li>
    </ol>
  </div>
</section>

<section class="feature">
  <div class="feature__photo">
    <img src="https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&cs=tinysrgb&w=1400" alt="A planning discussion">
  </div>
  <div class="feature__copy">
    <h2>How a plan is written</h2>
    <ol class="rail">
      <li><strong>Discover.</strong> Mandate, people, and limits.</li>
      <li><strong>Diagnose.</strong> Where the current plan no longer fits.</li>
      <li><strong>Design.</strong> Priorities and the path that fits.</li>
      <li><strong>Deliver.</strong> The plan, with owners and time.</li>
      <li><strong>Embed.</strong> Handed to the teams who will run it.</li>
    </ol>
  </div>
</section>

@include('web.partials.dept-help')

@endsection
