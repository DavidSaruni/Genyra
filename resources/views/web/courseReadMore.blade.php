@extends('web.app')

@section('title', 'Data Analytics Course - Genyra Academy')

@section('body')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-[#0B2545] to-[#143566] relative overflow-hidden mt-20">
  {{-- Decorative background --}}
  <div class="absolute top-0 right-0 w-2/5 h-full bg-gradient-to-l from-[#0D6B5A]/20 to-transparent"></div>
  
  <div class="container mx-auto px-6 lg:px-20 py-16 lg:py-20 relative z-10">
    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-sm mb-6">
      <a href="{{ url('/') }}" class="text-[#C8952A] hover:text-[#E8B84B] transition">Home</a>
      <span class="text-white/50">/</span>
      <a href="{{ url('/courses') }}" class="text-[#C8952A] hover:text-[#E8B84B] transition">Courses</a>
      <span class="text-white/50">/</span>
      <span class="text-white/70">Data Analytics</span>
    </nav>

    {{-- Badge --}}
    <span class="inline-block bg-[#0D6B5A] text-white px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider mb-6">
      Professional Certificate
    </span>

    {{-- Title --}}
    <h1 class="text-3xl lg:text-5xl font-bold text-white mb-6 leading-tight">
      What Is Data Analytics? A Comprehensive Guide for Beginners
    </h1>

    {{-- Meta Information --}}
    <div class="flex flex-wrap gap-6 lg:gap-8 text-white/90">
      <div class="flex items-center gap-2">
        <svg class="w-5 h-5 text-[#C8952A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span class="text-sm lg:text-base">12 Weeks</span>
      </div>
      <div class="flex items-center gap-2">
        <svg class="w-5 h-5 text-[#C8952A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
        </svg>
        <span class="text-sm lg:text-base">Beginner to Intermediate</span>
      </div>
      <div class="flex items-center gap-2">
        <svg class="w-5 h-5 text-[#C8952A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
        <span class="text-sm lg:text-base">2,450+ Enrolled</span>
      </div>
      <div class="flex items-center gap-2">
        <svg class="w-5 h-5 text-[#C8952A]" fill="currentColor" viewBox="0 0 20 20">
          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
        </svg>
        <span class="text-sm lg:text-base">4.8/5.0 Rating</span>
      </div>
    </div>
  </div>
</section>

{{-- Main Content --}}
<div class="bg-[#F7F5F1]">
  <div class="container mx-auto px-6 lg:px-20 py-12 lg:py-16">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
      
      {{-- Main Article (2/3 width) --}}
      <div class="lg:col-span-2">
        <article class="bg-white rounded-lg shadow-sm p-8 lg:p-12">
          
          {{-- Written by --}}
          <div class="flex items-center gap-3 mb-8 pb-6 border-b border-gray-200">
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#0B2545] to-[#143566] flex items-center justify-center text-white font-bold">
              JM
            </div>
            <div>
              <p class="text-sm font-semibold text-[#0B2545]">Written by genyra Group experts</p>
              <p class="text-xs text-gray-500">Data Scientist & Healthcare Analytics Expert</p>
            </div>
            <div class="ml-auto text-xs text-gray-500">
              Updated: Jan 2025
            </div>
          </div>

          {{-- Intro Paragraph --}}
          <div class="mb-10 pl-4 border-l-4 border-[#C8952A]">
            <p class="text-lg leading-relaxed text-gray-700">
              Data analytics is the process of examining datasets to draw conclusions about the information they contain. 
              In today's data-driven world, organizations across industries especially healthcare rely on data analytics to 
              make informed decisions, optimize operations, and drive innovation.
            </p>
          </div>

          {{-- Table of Contents --}}
          <div class="bg-[#F7F4EF] rounded-lg p-6 mb-10">
            <h4 class="text-lg font-bold text-[#0B2545] mb-4">In This Article</h4>
            <ul class="space-y-2">
              <li>
                <a href="#what-is" class="flex items-center gap-2 text-[#0D6B5A] hover:text-[#15907A] transition group">
                  <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
                  <span class="font-medium">What is data analytics?</span>
                </a>
              </li>
              <li>
                <a href="#why-important" class="flex items-center gap-2 text-[#0D6B5A] hover:text-[#15907A] transition group">
                  <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
                  <span class="font-medium">Why is data analytics important?</span>
                </a>
              </li>
              <li>
                <a href="#types" class="flex items-center gap-2 text-[#0D6B5A] hover:text-[#15907A] transition group">
                  <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
                  <span class="font-medium">Types of data analytics</span>
                </a>
              </li>
              <li>
                <a href="#skills" class="flex items-center gap-2 text-[#0D6B5A] hover:text-[#15907A] transition group">
                  <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
                  <span class="font-medium">Key skills and tools</span>
                </a>
              </li>
              <li>
                <a href="#career" class="flex items-center gap-2 text-[#0D6B5A] hover:text-[#15907A] transition group">
                  <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
                  <span class="font-medium">Career paths in data analytics</span>
                </a>
              </li>
              <li>
                <a href="#get-started" class="flex items-center gap-2 text-[#0D6B5A] hover:text-[#15907A] transition group">
                  <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
                  <span class="font-medium">How to get started</span>
                </a>
              </li>
            </ul>
          </div>

          {{-- Section 1: What is Data Analytics --}}
          <section id="what-is" class="mb-12">
            <h2 class="text-3xl font-bold text-[#0B2545] mb-4 pb-3 border-b-2 border-[#0D6B5A]">
              What is data analytics?
            </h2>
            
            <p class="text-gray-700 leading-relaxed mb-4">
              Data analytics is a multidisciplinary field that combines statistics, computer science, and domain expertise 
              to extract meaningful insights from structured and unstructured data. At its core, data analytics involves 
              collecting, processing, and analyzing data to identify patterns, trends, and correlations that can inform 
              decision-making.
            </p>

            <p class="text-gray-700 leading-relaxed mb-6">
              In healthcare and life sciences the primary focus of Genyra Academy data analytics plays a transformative role. 
              From analyzing patient outcomes and optimizing hospital operations to accelerating drug discovery and managing 
              laboratory quality control, data analytics has become indispensable.
            </p>

            {{-- Highlight Box --}}
            <div class="bg-[#F7F4EF] border-l-4 border-[#0D6B5A] rounded-r-lg p-6 mb-6">
              <h4 class="text-[#0D6B5A] font-bold text-sm uppercase tracking-wide mb-3">Did You Know?</h4>
              <p class="text-gray-700 leading-relaxed">
                According to McKinsey, healthcare organizations that effectively leverage data analytics can reduce costs by 
                up to 25% while simultaneously improving patient outcomes by 15-20%. In Kenya specifically, major referral 
                hospitals have reported 30% faster diagnosis times after implementing data analytics systems.
              </p>
            </div>

            <h3 class="text-xl font-semibold text-[#143566] mt-8 mb-4">The data analytics process</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
              A typical data analytics workflow includes:
            </p>
            
            <ol class="list-decimal list-inside space-y-3 mb-6 text-gray-700">
              <li><strong class="text-[#0B2545]">Defining the question:</strong> What problem are you trying to solve?</li>
              <li><strong class="text-[#0B2545]">Collecting data:</strong> Gathering relevant information from various sources</li>
              <li><strong class="text-[#0B2545]">Cleaning data:</strong> Removing errors, duplicates, and inconsistencies</li>
              <li><strong class="text-[#0B2545]">Analyzing data:</strong> Applying statistical methods and algorithms</li>
              <li><strong class="text-[#0B2545]">Visualizing results:</strong> Creating charts, graphs, and dashboards</li>
              <li><strong class="text-[#0B2545]">Communicating insights:</strong> Presenting findings to stakeholders</li>
            </ol>
          </section>

          {{-- Section 2: Why Important --}}
          <section id="why-important" class="mb-12">
            <h2 class="text-3xl font-bold text-[#0B2545] mb-4 pb-3 border-b-2 border-[#0D6B5A]">
              Why is data analytics important?
            </h2>
            
            <p class="text-gray-700 leading-relaxed mb-6">
              The volume of data generated globally doubles every two years, and healthcare is among the fastest-growing 
              sources. A single hospital can generate terabytes of data daily from electronic health records, medical imaging, 
              laboratory results, and operational systems. Without analytics, this data remains untapped potential.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-8">
              <div class="bg-gradient-to-br from-[#0B2545] to-[#143566] rounded-lg p-6 text-center">
                <div class="text-4xl font-bold text-[#C8952A] mb-2">87%</div>
                <div class="text-sm text-white/80 uppercase tracking-wide">Healthcare Leaders Prioritize Analytics</div>
              </div>
              <div class="bg-gradient-to-br from-[#0B2545] to-[#143566] rounded-lg p-6 text-center">
                <div class="text-4xl font-bold text-[#C8952A] mb-2">$200B</div>
                <div class="text-sm text-white/80 uppercase tracking-wide">Global Healthcare Analytics Market by 2026</div>
              </div>
              <div class="bg-gradient-to-br from-[#0B2545] to-[#143566] rounded-lg p-6 text-center">
                <div class="text-4xl font-bold text-[#C8952A] mb-2">30%</div>
                <div class="text-sm text-white/80 uppercase tracking-wide">Average Improvement in Decision Speed</div>
              </div>
            </div>

            <h3 class="text-xl font-semibold text-[#143566] mt-8 mb-4">Real-world applications in healthcare</h3>
            
            <ul class="space-y-3 text-gray-700">
              <li class="flex gap-3">
                <svg class="w-6 h-6 text-[#0D6B5A] flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                  <strong>Clinical decision support:</strong> Analyzing patient data to recommend personalized treatment plans
                </div>
              </li>
              <li class="flex gap-3">
                <svg class="w-6 h-6 text-[#0D6B5A] flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                  <strong>Operational efficiency:</strong> Optimizing staff scheduling, bed allocation, and resource management
                </div>
              </li>
              <li class="flex gap-3">
                <svg class="w-6 h-6 text-[#0D6B5A] flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                  <strong>Disease surveillance:</strong> Detecting outbreak patterns and predicting epidemics
                </div>
              </li>
              <li class="flex gap-3">
                <svg class="w-6 h-6 text-[#0D6B5A] flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                  <strong>Quality assurance:</strong> Monitoring laboratory performance and ensuring regulatory compliance
                </div>
              </li>
              <li class="flex gap-3">
                <svg class="w-6 h-6 text-[#0D6B5A] flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                  <strong>Drug development:</strong> Accelerating clinical trials through predictive modeling
                </div>
              </li>
            </ul>
          </section>

          {{-- Section 3: Types --}}
          <section id="types" class="mb-12">
            <h2 class="text-3xl font-bold text-[#0B2545] mb-4 pb-3 border-b-2 border-[#0D6B5A]">
              Types of data analytics
            </h2>
            
            <p class="text-gray-700 leading-relaxed mb-6">
              Data analytics can be categorized into four main types, each serving different analytical purposes:
            </p>

            <div class="space-y-6">
              {{-- Descriptive --}}
              <div class="border-l-4 border-[#C8952A] pl-6">
                <h3 class="text-xl font-semibold text-[#0B2545] mb-2">1. Descriptive Analytics</h3>
                <p class="text-gray-700 leading-relaxed mb-2">
                  <strong>What happened?</strong> Descriptive analytics examines historical data to understand past events. 
                  It's the foundation of data analytics and typically involves aggregating data and creating reports.
                </p>
                <p class="text-sm text-gray-600 italic">
                  Example: A hospital dashboard showing monthly patient admissions, average length of stay, and readmission rates.
                </p>
              </div>

              {{-- Diagnostic --}}
              <div class="border-l-4 border-[#0D6B5A] pl-6">
                <h3 class="text-xl font-semibold text-[#0B2545] mb-2">2. Diagnostic Analytics</h3>
                <p class="text-gray-700 leading-relaxed mb-2">
                  <strong>Why did it happen?</strong> Diagnostic analytics digs deeper to understand the causes behind trends 
                  and anomalies. It involves techniques like drill-down, data mining, and correlations.
                </p>
                <p class="text-sm text-gray-600 italic">
                  Example: Analyzing why infection rates increased in a specific ward by examining cleaning schedules, 
                  staffing levels, and patient demographics.
                </p>
              </div>

              {{-- Predictive --}}
              <div class="border-l-4 border-[#143566] pl-6">
                <h3 class="text-xl font-semibold text-[#0B2545] mb-2">3. Predictive Analytics</h3>
                <p class="text-gray-700 leading-relaxed mb-2">
                  <strong>What will happen?</strong> Predictive analytics uses statistical models and machine learning to 
                  forecast future outcomes based on historical patterns.
                </p>
                <p class="text-sm text-gray-600 italic">
                  Example: Predicting which patients are at high risk of readmission within 30 days based on their clinical 
                  history and social determinants.
                </p>
              </div>

              {{-- Prescriptive --}}
              <div class="border-l-4 border-[#15907A] pl-6">
                <h3 class="text-xl font-semibold text-[#0B2545] mb-2">4. Prescriptive Analytics</h3>
                <p class="text-gray-700 leading-relaxed mb-2">
                  <strong>What should we do?</strong> Prescriptive analytics recommends actions to achieve desired outcomes. 
                  It combines data, business rules, and optimization algorithms.
                </p>
                <p class="text-sm text-gray-600 italic">
                  Example: Recommending optimal staff schedules and equipment allocation to minimize emergency department 
                  wait times during peak hours.
                </p>
              </div>
            </div>
          </section>

          {{-- Section 4: Skills --}}
          <section id="skills" class="mb-12">
            <h2 class="text-3xl font-bold text-[#0B2545] mb-4 pb-3 border-b-2 border-[#0D6B5A]">
              Key skills and tools for data analytics
            </h2>
            
            <p class="text-gray-700 leading-relaxed mb-6">
              Becoming proficient in data analytics requires a combination of technical skills, statistical knowledge, 
              and business acumen. Here are the essential competencies:
            </p>

            {{-- Skills Grid --}}
            <div class="bg-white border-2 border-gray-200 rounded-lg p-6 mb-6">
              <h4 class="text-lg font-bold text-[#0B2545] mb-4">Core Competencies</h4>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div class="flex items-center gap-2 bg-[#F7F4EF] rounded-md p-3">
                  <svg class="w-5 h-5 text-[#0D6B5A]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                  </svg>
                  <span class="font-medium text-gray-800">Statistical Analysis</span>
                </div>
                <div class="flex items-center gap-2 bg-[#F7F4EF] rounded-md p-3">
                  <svg class="w-5 h-5 text-[#0D6B5A]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                  </svg>
                  <span class="font-medium text-gray-800">Data Visualization</span>
                </div>
                <div class="flex items-center gap-2 bg-[#F7F4EF] rounded-md p-3">
                  <svg class="w-5 h-5 text-[#0D6B5A]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                  </svg>
                  <span class="font-medium text-gray-800">SQL & Databases</span>
                </div>
                <div class="flex items-center gap-2 bg-[#F7F4EF] rounded-md p-3">
                  <svg class="w-5 h-5 text-[#0D6B5A]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                  </svg>
                  <span class="font-medium text-gray-800">Python/R Programming</span>
                </div>
                <div class="flex items-center gap-2 bg-[#F7F4EF] rounded-md p-3">
                  <svg class="w-5 h-5 text-[#0D6B5A]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                  </svg>
                  <span class="font-medium text-gray-800">Excel (Advanced)</span>
                </div>
                <div class="flex items-center gap-2 bg-[#F7F4EF] rounded-md p-3">
                  <svg class="w-5 h-5 text-[#0D6B5A]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                  </svg>
                  <span class="font-medium text-gray-800">Tableau/Power BI</span>
                </div>
                <div class="flex items-center gap-2 bg-[#F7F4EF] rounded-md p-3">
                  <svg class="w-5 h-5 text-[#0D6B5A]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                  </svg>
                  <span class="font-medium text-gray-800">Machine Learning Basics</span>
                </div>
                <div class="flex items-center gap-2 bg-[#F7F4EF] rounded-md p-3">
                  <svg class="w-5 h-5 text-[#0D6B5A]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                  </svg>
                  <span class="font-medium text-gray-800">Data Storytelling</span>
                </div>
              </div>
            </div>

            <h3 class="text-xl font-semibold text-[#143566] mt-8 mb-4">Popular tools and technologies</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
              The data analytics toolkit continues to evolve, but these tools remain industry standards:
            </p>
            
            <ul class="space-y-2 text-gray-700 mb-6">
              <li><strong>Microsoft Excel:</strong> Still the most widely used tool for basic analysis and reporting</li>
              <li><strong>SQL:</strong> Essential for querying databases and managing large datasets</li>
              <li><strong>Python:</strong> The leading programming language for data science (pandas, NumPy, matplotlib)</li>
              <li><strong>R:</strong> Preferred for statistical computing and advanced analytics</li>
              <li><strong>Tableau/Power BI:</strong> Industry-leading visualization platforms</li>
              <li><strong>Google Analytics:</strong> For web and digital marketing analytics</li>
            </ul>
          </section>

          {{-- Section 5: Career --}}
          <section id="career" class="mb-12">
            <h2 class="text-3xl font-bold text-[#0B2545] mb-4 pb-3 border-b-2 border-[#0D6B5A]">
              Career paths in data analytics
            </h2>
            
            <p class="text-gray-700 leading-relaxed mb-6">
              The demand for data analytics professionals continues to surge across industries, with healthcare leading 
              the way. Here are common career paths and salary ranges in the East African market:
            </p>

            <div class="space-y-4 mb-8">
              <div class="bg-gradient-to-r from-[#F7F4EF] to-white p-5 rounded-lg border-l-4 border-[#0D6B5A]">
                <h4 class="font-bold text-[#0B2545] mb-1">Data Analyst</h4>
                <p class="text-sm text-gray-600 mb-2">
                  Collect, process, and perform statistical analyses on large datasets. Create reports and dashboards 
                  to support decision-making.
                </p>
                <div class="flex items-center justify-between">
                  <span class="text-xs font-semibold text-[#0D6B5A] uppercase tracking-wide">Entry to Mid-Level</span>
                  <span class="text-sm font-bold text-[#C8952A]">KES 800K - 1.5M annually</span>
                </div>
              </div>

              <div class="bg-gradient-to-r from-[#F7F4EF] to-white p-5 rounded-lg border-l-4 border-[#143566]">
                <h4 class="font-bold text-[#0B2545] mb-1">Business Intelligence Analyst</h4>
                <p class="text-sm text-gray-600 mb-2">
                  Design and maintain business intelligence solutions, develop dashboards, and translate data into 
                  actionable business insights.
                </p>
                <div class="flex items-center justify-between">
                  <span class="text-xs font-semibold text-[#143566] uppercase tracking-wide">Mid to Senior Level</span>
                  <span class="text-sm font-bold text-[#C8952A]">KES 1.2M - 2M annually</span>
                </div>
              </div>

              <div class="bg-gradient-to-r from-[#F7F4EF] to-white p-5 rounded-lg border-l-4 border-[#C8952A]">
                <h4 class="font-bold text-[#0B2545] mb-1">Healthcare Data Scientist</h4>
                <p class="text-sm text-gray-600 mb-2">
                  Build predictive models, develop machine learning algorithms, and solve complex healthcare challenges 
                  using advanced analytics.
                </p>
                <div class="flex items-center justify-between">
                  <span class="text-xs font-semibold text-[#C8952A] uppercase tracking-wide">Senior Level</span>
                  <span class="text-sm font-bold text-[#C8952A]">KES 1.5M - 3M annually</span>
                </div>
              </div>
            </div>

            <div class="bg-[#F7F4EF] border-l-4 border-[#0D6B5A] rounded-r-lg p-6">
              <h4 class="text-[#0D6B5A] font-bold text-sm uppercase tracking-wide mb-3">Success Story</h4>
              <p class="text-gray-700 leading-relaxed italic">
                "After completing the Data Analytics program at Genyra Academy, I landed a position as a BI Analyst at 
                Aga Khan University Hospital. The hands-on projects and industry-relevant curriculum gave me the confidence 
                to excel in interviews and hit the ground running on day one." 
                <span class="block mt-2 not-italic font-semibold">  Michael Ochieng, Class of 2024</span>
              </p>
            </div>
          </section>

          {{-- Section 6: Get Started --}}
          <section id="get-started" class="mb-12">
            <h2 class="text-3xl font-bold text-[#0B2545] mb-4 pb-3 border-b-2 border-[#0D6B5A]">
              How to get started with data analytics
            </h2>
            
            <p class="text-gray-700 leading-relaxed mb-6">
              Starting your data analytics journey doesn't require a mathematics or computer science degree. Here's a 
              practical roadmap for beginners:
            </p>

            <h3 class="text-xl font-semibold text-[#143566] mt-8 mb-4">Step 1: Build foundational knowledge</h3>
            <ul class="space-y-2 text-gray-700 mb-6 list-disc list-inside">
              <li>Learn basic statistics (mean, median, standard deviation, probability)</li>
              <li>Master Microsoft Excel formulas, pivot tables, and charts</li>
              <li>Understand database concepts and SQL basics</li>
              <li>Familiarize yourself with data visualization principles</li>
            </ul>

            <h3 class="text-xl font-semibold text-[#143566] mb-4">Step 2: Choose your tools</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
              Start with user-friendly tools before moving to programming languages:
            </p>
            <ul class="space-y-2 text-gray-700 mb-6 list-disc list-inside">
              <li>Begin with Excel and Google Sheets for basic analysis</li>
              <li>Learn Tableau Public or Power BI Desktop (both have free versions)</li>
              <li>Progress to SQL for database querying</li>
              <li>Finally, learn Python or R for advanced analytics</li>
            </ul>

            <h3 class="text-xl font-semibold text-[#143566] mb-4">Step 3: Practice with real data</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
              Theory is important, but hands-on practice is essential. Work with real datasets from:
            </p>
            <ul class="space-y-2 text-gray-700 mb-6 list-disc list-inside">
              <li>Kenya Open Data portal (healthcare datasets)</li>
              <li>WHO and CDC public health databases</li>
              <li>Kaggle competitions and datasets</li>
              <li>Your own organization's data (with permission)</li>
            </ul>

            <h3 class="text-xl font-semibold text-[#143566] mb-4">Step 4: Build a portfolio</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
              Create 3-5 projects that demonstrate your skills:
            </p>
            <ul class="space-y-2 text-gray-700 mb-6 list-disc list-inside">
              <li>Healthcare dashboard analyzing patient outcomes</li>
              <li>Predictive model for disease prevalence</li>
              <li>Hospital operational efficiency analysis</li>
              <li>Laboratory quality control monitoring system</li>
            </ul>

            <div class="bg-gradient-to-r from-[#0D6B5A] to-[#15907A] rounded-lg p-8 text-white mt-8">
              <h3 class="text-2xl font-bold mb-4">Ready to start your data analytics journey?</h3>
              <p class="mb-6 text-white/90">
                Genyra Academy's Data Analytics Professional Certificate is designed specifically for healthcare 
                professionals in East Africa. Our 12-week program combines theory with hands-on practice using real 
                healthcare datasets from Kenyan hospitals and laboratories.
              </p>
              <div class="flex flex-wrap gap-4">
                <a href="https://academy.genyragroup.com/" 
                   class="inline-block bg-white text-[#0D6B5A] px-6 py-3 rounded-lg font-bold hover:bg-[#F7F4EF] transition">
                  Enroll Now
                </a>
              </div>
            </div>
          </section>

        </article>
      </div>

      {{-- Sidebar (1/3 width) --}}
      <aside class="lg:col-span-1">
        <div class="sticky top-24 space-y-6">
          
          {{-- Enroll Card --}}
          <div class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-xl font-bold text-[#0B2545] mb-4 pb-3 border-b-2 border-[#F7F4EF]">
              Enroll in This Course
            </h3>
            
            <div class="space-y-3 mb-6">
              <div class="flex justify-between items-center py-2 border-b border-gray-100">
                <span class="text-sm text-gray-600">Next Cohort Starts</span>
                <span class="text-sm font-semibold text-[#0B2545]">April 15, 2025</span>
              </div>
              <div class="flex justify-between items-center py-2 border-b border-gray-100">
                <span class="text-sm text-gray-600">Duration</span>
                <span class="text-sm font-semibold text-[#0B2545]">12 Weeks</span>
              </div>
              <div class="flex justify-between items-center py-2 border-b border-gray-100">
                <span class="text-sm text-gray-600">Effort</span>
                <span class="text-sm font-semibold text-[#0B2545]">8-10 hrs/week</span>
              </div>
              <div class="flex justify-between items-center py-2 border-b border-gray-100">
                <span class="text-sm text-gray-600">Price</span>
                <span class="text-sm font-semibold text-[#0B2545]">KES 45,000</span>
              </div>
              <div class="flex justify-between items-center py-2">
                <span class="text-sm text-gray-600">Language</span>
                <span class="text-sm font-semibold text-[#0B2545]">English</span>
              </div>
            </div>

            <a href="https://academy.genyragroup.com/" 
               class="block w-full bg-gradient-to-r from-[#0D6B5A] to-[#15907A] text-white text-center py-3 rounded-lg font-bold hover:shadow-lg transition mb-3">
              Enroll Now
            </a>
           
          </div>

          {{-- Instructor Card --}}
          <div class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-xl font-bold text-[#0B2545] mb-4 pb-3 border-b-2 border-[#F7F4EF]">
              Your Instructor
            </h3>
            <div class="text-center mb-4">
              <div class="w-24 h-24 rounded-full bg-gradient-to-br from-[#0B2545] to-[#143566] mx-auto mb-3 flex items-center justify-center text-white text-2xl font-bold">
                JM
              </div>
              <h4 class="font-bold text-[#0B2545]">genyra Group experts</h4>
              <p class="text-xs text-gray-500 mt-1">Data Scientist & Healthcare Analytics Expert</p>
            </div>
            <p class="text-sm text-gray-600 leading-relaxed">
              10+ years experience in healthcare analytics.
              PhD in Biostatistics from University of Nairobi.
            </p>
          </div>

          {{-- Related Courses --}}
          <div class="bg-[#F7F4EF] rounded-lg p-6">
            <h4 class="font-bold text-[#0B2545] text-sm uppercase tracking-wide mb-4">Related Courses</h4>
            
            <a href="#" class="flex gap-3 bg-white rounded-lg p-3 mb-3 hover:shadow-md transition group">
              <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-[#0B2545] to-[#143566] flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-[#C8952A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
              </div>
              <div>
                <h5 class="font-semibold text-sm text-[#0B2545] group-hover:text-[#0D6B5A] transition">Business Intelligence</h5>
                <p class="text-xs text-gray-500">8 weeks • Intermediate</p>
              </div>
            </a>

            <a href="#" class="flex gap-3 bg-white rounded-lg p-3 mb-3 hover:shadow-md transition group">
              <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-[#0B2545] to-[#143566] flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-[#C8952A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                </svg>
              </div>
              <div>
                <h5 class="font-semibold text-sm text-[#0B2545] group-hover:text-[#0D6B5A] transition">Python for Data Science</h5>
                <p class="text-xs text-gray-500">10 weeks • Beginner</p>
              </div>
            </a>

            <a href="#" class="flex gap-3 bg-white rounded-lg p-3 hover:shadow-md transition group">
              <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-[#0B2545] to-[#143566] flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-[#C8952A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                </svg>
              </div>
              <div>
                <h5 class="font-semibold text-sm text-[#0B2545] group-hover:text-[#0D6B5A] transition">SQL for Analytics</h5>
                <p class="text-xs text-gray-500">6 weeks • Beginner</p>
              </div>
            </a>
          </div>

        </div>
      </aside>

    </div>
  </div>
</div>

@endsection