@extends('web.app')

@section('title', 'Medical Technologies - genyra Group')
@section('meta_description', 'Medical technologies from genyra Group: devices, systems, laboratory information management (LIMS), and electronic medical records (EMR), including LIMS workflows.')

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'What We Do', 'url' => url('/#business-lines')],
        ['name' => 'Medical Technologies', 'url' => route('department.medical-technologies')],
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
      <span>Medical Technologies</span>
    </nav>
    <p class="mix-kicker mix-kicker--light">Department 2</p>
    <h1>Devices, systems, LIMS, and EMR.</h1>
    <span class="biz-hero__rule" aria-hidden="true"></span>
  </div>
</section>

<section class="index" id="work">
  <div class="mix-wrap">
    <ol class="index__list">
      <li>
        <span>01</span>
        <div>
          <h3>Devices</h3>
          <p>Medical devices matched to the service and set up for the people who use them.</p>
        </div>
        <img src="https://images.pexels.com/photos/4386467/pexels-photo-4386467.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Medical devices in a clinical setting">
      </li>
      <li>
        <span>02</span>
        <div>
          <h3>Systems</h3>
          <p>Devices, records, and the working day joined so information moves with the patient.</p>
        </div>
        <img src="https://images.pexels.com/photos/6129500/pexels-photo-6129500.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Clinical team working with health systems">
      </li>
      <li>
        <span>03</span>
        <div>
          <h3>LIMS</h3>
          <p>The path a sample takes, from request to reported result.</p>
        </div>
        <img src="https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Laboratory where samples are processed">
      </li>
      <li>
        <span>04</span>
        <div>
          <h3>EMR</h3>
          <p>Electronic medical records for outpatient, inpatient, and programme care.</p>
        </div>
        <img src="https://images.pexels.com/photos/1170979/pexels-photo-1170979.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Clinician reviewing a patient’s record">
      </li>
    </ol>
  </div>
</section>

<section class="feature" id="lims-workflows">
  <div class="feature__photo">
    <img src="https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&cs=tinysrgb&w=1400" alt="Laboratory bench where samples are processed">
  </div>
  <div class="feature__copy">
    <h2>LIMS workflow</h2>
    <ol class="rail">
      <li><strong>Request.</strong> The test and the sample are identified.</li>
      <li><strong>Receive.</strong> The sample is checked and accepted.</li>
      <li><strong>Process.</strong> The method is run and recorded.</li>
      <li><strong>Verify.</strong> The result is reviewed.</li>
      <li><strong>Report.</strong> The result is released and the record stays.</li>
    </ol>
  </div>
</section>

@include('web.partials.dept-help')

@endsection
