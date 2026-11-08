@extends('web.app')

@section('title', $department['title'] . ' - genyra Group')
@section('meta_description', $department['meta'])

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'What We Do', 'url' => route('what-we-do')],
        ['name' => $department['title'], 'url' => route($department['route'])],
    ],
])
@endpush

@section('body')

<div class="mt-28 bg-[#1e3a6e] border-b-4 border-[#00a0c6] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">{{ $department['title'] }}</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <a href="{{ route('what-we-do') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">What We Do</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">{{ $department['title'] }}</span>
    </div>
  </div>
</div>

<div class="bg-[#f5f8fc] min-h-screen py-12 px-4">
  <div class="max-w-7xl mx-auto space-y-6">

    <article class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-8 py-8 grid md:grid-cols-12 gap-8 items-center">
      <div class="md:col-span-7">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#1BA0D8] mb-2">{{ $department['tag'] }}</p>
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#1e3a6e] mb-2">{{ $department['eyebrow'] }}</p>
        <h2 class="text-2xl font-bold text-[#22235a] mb-4">{{ $department['title'] }}</h2>
        <p class="text-sm md:text-base text-gray-600 leading-relaxed mb-5">{{ $department['summary'] }}</p>
        <ul class="space-y-2.5">
          @foreach ($department['points'] as $point)
            <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> {{ $point }}</li>
          @endforeach
        </ul>
      </div>
      <img class="md:col-span-5 w-full h-64 md:h-80 object-cover rounded"
           src="{{ $department['image'] }}"
           alt="{{ $department['image_alt'] }}">
    </article>

    <div class="grid sm:grid-cols-3 gap-4">
      @foreach ($others as $other)
        <a href="{{ route($other['route']) }}" class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-5 py-4 no-underline hover:shadow-[0_8px_20px_rgba(0,0,0,0.1)] transition-shadow">
          <span class="block text-[0.65rem] font-bold uppercase tracking-[0.08em] text-[#1BA0D8] mb-1">{{ $other['tag'] }}</span>
          <span class="block font-bold text-[#22235a]">{{ $other['title'] }}</span>
        </a>
      @endforeach
    </div>

  </div>
</div>

@endsection
