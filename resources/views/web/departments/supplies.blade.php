@extends('web.app')

@section('title', 'Medical Supplies - genyra Group')
@section('meta_description', 'Medical supplies from genyra Group: pharmaceuticals and non-pharmaceuticals, medical devices and equipment, consumables and disposables, and diagnostics and laboratory supplies.')

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'What We Do', 'url' => url('/#business-lines')],
        ['name' => 'Medical Supplies', 'url' => route('department.medical-supplies')],
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
      <span>Medical Supplies</span>
    </nav>
    <p class="mix-kicker mix-kicker--light">Department 1</p>
    <h1>Medical supplies for hospitals, clinics, and laboratories.</h1>
    <span class="biz-hero__rule" aria-hidden="true"></span>
  </div>
</section>

<section class="index">
  <div class="mix-wrap">
    <ol class="index__list">
      <li>
        <span>01</span>
        <div>
          <h3>Pharmaceuticals &amp; Non-Pharmaceuticals</h3>
          <p>Medicines, disinfectants, antiseptics, and orders ready for the pharmacy.</p>
        </div>
        <img src="https://images.pexels.com/photos/3683074/pexels-photo-3683074.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Medicines arranged for a hospital pharmacy">
      </li>
      <li>
        <span>02</span>
        <div>
          <h3>Medical Devices &amp; Equipment</h3>
          <p>Diagnostic, treatment, and the equipment a ward or clinic depends on.</p>
        </div>
        <img src="https://images.pexels.com/photos/4386467/pexels-photo-4386467.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Diagnostic equipment in clinical use">
      </li>
      <li>
        <span>03</span>
        <div>
          <h3>Medical Consumables and Disposables</h3>
          <p>Gloves, masks, gowns, procedure items, and everyday ward stock.</p>
        </div>
        <img src="https://images.pexels.com/photos/4386466/pexels-photo-4386466.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Protective equipment for clinical staff">
      </li>
      <li>
        <span>04</span>
        <div>
          <h3>Diagnostics and Laboratory Supplies</h3>
          <p>Kits, reagents, and what is used to collect a sample.</p>
        </div>
        <img src="https://images.pexels.com/photos/5863399/pexels-photo-5863399.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Diagnostic tests on a laboratory bench">
      </li>
    </ol>
  </div>
</section>

@include('web.partials.dept-help')

@endsection
