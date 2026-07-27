@extends('admin.layouts.app')

@section('title', 'Dashboard')

@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/swiper/swiper.css') }}" />
@endpush

@section('content')
<div class="row g-6">
  {{-- Website Analytics (Vuexy advance card) --}}
  <div class="col-xl-6 col">
    <div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg" id="swiper-with-pagination-cards">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="row">
            <div class="col-12">
              <h5 class="text-white mb-0">Content Analytics</h5>
              <small>Genyra site overview</small>
            </div>
            <div class="row">
              <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1 pt-md-9">
                <h6 class="text-white mt-0 mt-md-3 mb-4">Publishing</h6>
                <div class="row">
                  <div class="col-6">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex mb-4 align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">{{ $newsCount }}</p>
                        <p class="mb-0">Articles</p>
                      </li>
                      <li class="d-flex align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">{{ $publishedNews }}</p>
                        <p class="mb-0">Published</p>
                      </li>
                    </ul>
                  </div>
                  <div class="col-6">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex mb-4 align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">{{ $draftNews }}</p>
                        <p class="mb-0">Drafts</p>
                      </li>
                      <li class="d-flex align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">{{ $publishRate }}%</p>
                        <p class="mb-0">Live rate</p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                <img src="{{ asset('dashboard/assets/img/illustrations/card-website-analytics-1.png') }}" alt="Content Analytics" height="150" class="card-website-analytics-img" />
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="row">
            <div class="col-12">
              <h5 class="text-white mb-0">Inbox Analytics</h5>
              <small>Contact messages</small>
            </div>
            <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1 pt-md-9">
              <h6 class="text-white mt-0 mt-md-3 mb-4">Messages</h6>
              <div class="row">
                <div class="col-6">
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex mb-4 align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">{{ $contactCount }}</p>
                      <p class="mb-0">Total</p>
                    </li>
                    <li class="d-flex align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">{{ $unreadContacts }}</p>
                      <p class="mb-0">Unread</p>
                    </li>
                  </ul>
                </div>
                <div class="col-6">
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex mb-4 align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">{{ $readContacts }}</p>
                      <p class="mb-0">Read</p>
                    </li>
                    <li class="d-flex align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">{{ $readRate }}%</p>
                      <p class="mb-0">Handled</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
              <img src="{{ asset('dashboard/assets/img/illustrations/card-website-analytics-2.png') }}" alt="Inbox Analytics" height="150" class="card-website-analytics-img" />
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="row">
            <div class="col-12">
              <h5 class="text-white mb-0">Media & Outreach</h5>
              <small>Posters and emails</small>
            </div>
            <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1 pt-md-9">
              <h6 class="text-white mt-0 mt-md-3 mb-4">Distribution</h6>
              <div class="row">
                <div class="col-6">
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex mb-4 align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">{{ $posterCount }}</p>
                      <p class="mb-0">Posters</p>
                    </li>
                    <li class="d-flex align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">{{ $activePoster }}</p>
                      <p class="mb-0">Active</p>
                    </li>
                  </ul>
                </div>
                <div class="col-6">
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex mb-4 align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">{{ $emailCount }}</p>
                      <p class="mb-0">Emails</p>
                    </li>
                    <li class="d-flex align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">{{ $firstName }}</p>
                      <p class="mb-0">Admin</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
              <img src="{{ asset('dashboard/assets/img/illustrations/card-website-analytics-3.png') }}" alt="Media Analytics" height="150" class="card-website-analytics-img" />
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  {{-- Content pulse --}}
  <div class="col-xl-3 col-sm-6">
    <div class="card h-100">
      <div class="card-header pb-0">
        <h5 class="mb-3 card-title">Content Pulse</h5>
        <p class="mb-0 text-body">Published this site</p>
        <h4 class="mb-0">{{ $publishedNews }} live</h4>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <small class="text-body-secondary">Drafts remaining</small>
          <span class="fw-medium">{{ $draftNews }}</span>
        </div>
        <div class="progress mb-4" style="height: 8px;">
          <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $publishRate }}%" aria-valuenow="{{ $publishRate }}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-primary w-100" wire:navigate>Create Article</a>
      </div>
    </div>
  </div>

  {{-- Publishing overview (Sales Overview pattern) --}}
  <div class="col-xl-3 col-sm-6">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <p class="mb-0 text-body">Publishing Overview</p>
          <p class="card-text fw-medium text-success">{{ $publishRate }}%</p>
        </div>
        <h4 class="card-title mb-1">{{ $newsCount }} articles</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-4">
            <div class="d-flex gap-2 align-items-center mb-2">
              <span class="badge bg-label-success p-1 rounded"><i class="icon-base ti tabler-circle-check icon-sm"></i></span>
              <p class="mb-0">Live</p>
            </div>
            <h5 class="mb-0 pt-1">{{ $publishRate }}%</h5>
            <small class="text-body-secondary">{{ $publishedNews }}</small>
          </div>
          <div class="col-4">
            <div class="divider divider-vertical">
              <div class="divider-text">
                <span class="badge-divider-bg bg-label-secondary">VS</span>
              </div>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
              <p class="mb-0">Draft</p>
              <span class="badge bg-label-warning p-1 rounded"><i class="icon-base ti tabler-pencil icon-sm"></i></span>
            </div>
            <h5 class="mb-0 pt-1">{{ $draftRate }}%</h5>
            <small class="text-body-secondary">{{ $draftNews }}</small>
          </div>
        </div>
        <div class="d-flex align-items-center mt-6">
          <div class="progress w-100" style="height: 10px;">
            <div class="progress-bar bg-success" style="width: {{ max($publishRate, 0) }}%" role="progressbar" aria-valuenow="{{ $publishRate }}" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ max($draftRate, 0) }}%" aria-valuenow="{{ $draftRate }}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Border shadow metrics --}}
  <div class="col-lg-3 col-sm-6">
    <div class="card card-border-shadow-primary h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2">
          <div class="avatar me-4">
            <span class="avatar-initial rounded bg-label-primary"><i class="icon-base ti tabler-news icon-28px"></i></span>
          </div>
          <h4 class="mb-0">{{ $newsCount }}</h4>
        </div>
        <p class="mb-1">Total news</p>
        <p class="mb-0">
          <span class="text-heading fw-medium me-2">{{ $publishedNews }}</span>
          <small class="text-body-secondary">published</small>
        </p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card card-border-shadow-warning h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2">
          <div class="avatar me-4">
            <span class="avatar-initial rounded bg-label-warning"><i class="icon-base ti tabler-mail-opened icon-28px"></i></span>
          </div>
          <h4 class="mb-0">{{ $unreadContacts }}</h4>
        </div>
        <p class="mb-1">Unread messages</p>
        <p class="mb-0">
          <span class="text-heading fw-medium me-2">{{ $contactCount }}</span>
          <small class="text-body-secondary">total received</small>
        </p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card card-border-shadow-info h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2">
          <div class="avatar me-4">
            <span class="avatar-initial rounded bg-label-info"><i class="icon-base ti tabler-photo icon-28px"></i></span>
          </div>
          <h4 class="mb-0">{{ $activePoster }}</h4>
        </div>
        <p class="mb-1">Active posters</p>
        <p class="mb-0">
          <span class="text-heading fw-medium me-2">{{ $posterCount }}</span>
          <small class="text-body-secondary">in library</small>
        </p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card card-border-shadow-success h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2">
          <div class="avatar me-4">
            <span class="avatar-initial rounded bg-label-success"><i class="icon-base ti tabler-send icon-28px"></i></span>
          </div>
          <h4 class="mb-0">{{ $emailCount }}</h4>
        </div>
        <p class="mb-1">Emails sent</p>
        <p class="mb-0">
          <a href="{{ route('admin.emails.create') }}" class="fw-medium" wire:navigate>Compose new</a>
        </p>
      </div>
    </div>
  </div>

  {{-- Content report (Earning Reports pattern) --}}
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header pb-0 d-flex justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-1">Content Report</h5>
          <p class="card-subtitle">Site content breakdown</p>
        </div>
        <div class="dropdown genyra-dropdown">
          <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1 genyra-dropdown-toggle" type="button" aria-expanded="false">
            <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end genyra-dropdown-menu">
            <a class="dropdown-item" href="{{ route('admin.news.index') }}">All news</a>
            <a class="dropdown-item" href="{{ route('admin.posters.index') }}">All posters</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex gap-2 align-items-center mb-3 flex-wrap">
          <h2 class="mb-0">{{ $newsCount + $posterCount + $emailCount }}</h2>
          <div class="badge rounded bg-label-primary">assets</div>
        </div>
        <small class="text-body">Combined news, posters, and outbound emails managed in admin</small>
        <div class="border rounded p-5 mt-5">
          <div class="row gap-4 gap-sm-0">
            <div class="col-12 col-sm-4">
              <div class="d-flex gap-2 align-items-center">
                <div class="badge rounded bg-label-primary p-1"><i class="icon-base ti tabler-news icon-18px"></i></div>
                <h6 class="mb-0 fw-normal">News</h6>
              </div>
              <h4 class="my-2">{{ $newsCount }}</h4>
              <div class="progress w-75" style="height:4px">
                <div class="progress-bar" role="progressbar" style="width: {{ $publishRate }}%" aria-valuenow="{{ $publishRate }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="d-flex gap-2 align-items-center">
                <div class="badge rounded bg-label-info p-1"><i class="icon-base ti tabler-photo icon-18px"></i></div>
                <h6 class="mb-0 fw-normal">Posters</h6>
              </div>
              <h4 class="my-2">{{ $posterCount }}</h4>
              <div class="progress w-75" style="height:4px">
                <div class="progress-bar bg-info" role="progressbar" style="width: {{ $posterCount > 0 ? max((int) round(($activePoster / max($posterCount, 1)) * 100), 8) : 0 }}%" aria-valuenow="{{ $activePoster }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="d-flex gap-2 align-items-center">
                <div class="badge rounded bg-label-success p-1"><i class="icon-base ti tabler-send icon-18px"></i></div>
                <h6 class="mb-0 fw-normal">Emails</h6>
              </div>
              <h4 class="my-2">{{ $emailCount }}</h4>
              <div class="progress w-75" style="height:4px">
                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $emailCount > 0 ? min($emailCount * 10, 100) : 0 }}%" aria-valuenow="{{ $emailCount }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Inbox tracker (Support Tracker pattern) --}}
  <div class="col-12 col-md-6">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-1">Inbox Tracker</h5>
          <p class="card-subtitle">Contact form activity</p>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-primary" wire:navigate>Open inbox</a>
      </div>
      <div class="card-body row">
        <div class="col-12 col-sm-5">
          <div class="mt-lg-2 mb-4">
            <h2 class="mb-0">{{ $contactCount }}</h2>
            <p class="mb-0">Total messages</p>
          </div>
          <ul class="p-0 m-0">
            <li class="d-flex gap-4 align-items-center mb-3 pb-1">
              <div class="badge rounded bg-label-warning p-1_5"><i class="icon-base ti tabler-mail icon-md"></i></div>
              <div>
                <h6 class="mb-0 text-nowrap">Unread</h6>
                <small class="text-body-secondary">{{ $unreadContacts }}</small>
              </div>
            </li>
            <li class="d-flex gap-4 align-items-center mb-3 pb-1">
              <div class="badge rounded bg-label-success p-1_5"><i class="icon-base ti tabler-circle-check icon-md"></i></div>
              <div>
                <h6 class="mb-0 text-nowrap">Read</h6>
                <small class="text-body-secondary">{{ $readContacts }}</small>
              </div>
            </li>
            <li class="d-flex gap-4 align-items-center pb-1">
              <div class="badge rounded bg-label-primary p-1_5"><i class="icon-base ti tabler-percentage icon-md"></i></div>
              <div>
                <h6 class="mb-0 text-nowrap">Handled</h6>
                <small class="text-body-secondary">{{ $readRate }}%</small>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-12 col-sm-7 d-flex flex-column justify-content-center">
          <div class="d-flex justify-content-between mb-2">
            <small class="text-body-secondary">Read rate</small>
            <small class="fw-medium">{{ $readRate }}%</small>
          </div>
          <div class="progress mb-5" style="height: 10px;">
            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $readRate }}%" aria-valuenow="{{ $readRate }}" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $unreadRate }}%" aria-valuenow="{{ $unreadRate }}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="border rounded p-4">
            <div class="d-flex align-items-center justify-content-between">
              <div>
                <h6 class="mb-1">Needs attention</h6>
                <small class="text-body-secondary">{{ $unreadContacts }} unread waiting</small>
              </div>
              <span class="badge {{ $unreadContacts ? 'bg-label-warning' : 'bg-label-success' }} rounded-pill">{{ $unreadContacts ? 'Action' : 'Clear' }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Quick actions (Source Visits pattern) --}}
  <div class="col-xxl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-1">Quick Actions</h5>
          <p class="card-subtitle">Jump into common tasks</p>
        </div>
      </div>
      <div class="card-body">
        <ul class="list-unstyled mb-0">
          <li class="mb-6">
            <a href="{{ route('admin.news.create') }}" class="d-flex align-items-center text-body" wire:navigate>
              <div class="badge bg-label-primary text-body p-2 me-4 rounded"><i class="icon-base ti tabler-plus icon-md"></i></div>
              <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                <div class="me-2">
                  <h6 class="mb-0">New article</h6>
                  <small class="text-body">Publish site news</small>
                </div>
                <div class="d-flex align-items-center">
                  <i class="icon-base ti tabler-chevron-right"></i>
                </div>
              </div>
            </a>
          </li>
          <li class="mb-6">
            <a href="{{ route('admin.contacts.index') }}" class="d-flex align-items-center text-body" wire:navigate>
              <div class="badge bg-label-warning text-body p-2 me-4 rounded"><i class="icon-base ti tabler-mail icon-md"></i></div>
              <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                <div class="me-2">
                  <h6 class="mb-0">Review inbox</h6>
                  <small class="text-body">{{ $unreadContacts }} unread</small>
                </div>
                <div class="d-flex align-items-center">
                  @if($unreadContacts)
                    <div class="ms-4 badge bg-label-warning">{{ $unreadContacts }}</div>
                  @endif
                  <i class="icon-base ti tabler-chevron-right ms-2"></i>
                </div>
              </div>
            </a>
          </li>
          <li class="mb-6">
            <a href="{{ route('admin.posters.create') }}" class="d-flex align-items-center text-body" wire:navigate>
              <div class="badge bg-label-info text-body p-2 me-4 rounded"><i class="icon-base ti tabler-photo-plus icon-md"></i></div>
              <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                <div class="me-2">
                  <h6 class="mb-0">Add poster</h6>
                  <small class="text-body">Update media library</small>
                </div>
                <div class="d-flex align-items-center">
                  <i class="icon-base ti tabler-chevron-right"></i>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.emails.create') }}" class="d-flex align-items-center text-body" wire:navigate>
              <div class="badge bg-label-success text-body p-2 me-4 rounded"><i class="icon-base ti tabler-send icon-md"></i></div>
              <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                <div class="me-2">
                  <h6 class="mb-0">Compose email</h6>
                  <small class="text-body">{{ $emailCount }} sent so far</small>
                </div>
                <div class="d-flex align-items-center">
                  <i class="icon-base ti tabler-chevron-right"></i>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  {{-- Latest messages --}}
  <div class="col-xxl-8 col-md-6">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-1">Latest Messages</h5>
          <p class="card-subtitle mb-0">Newest contact submissions</p>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-primary" wire:navigate>View all</a>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          @forelse($recentContacts as $contact)
            <li class="d-flex mb-4 pb-1 align-items-center">
              <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded-circle {{ $contact->read_at ? 'bg-label-secondary' : 'bg-label-warning' }}">
                  {{ strtoupper(substr($contact->name, 0, 1)) }}
                </span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <h6 class="mb-0">{{ Str::limit($contact->name, 28) }}</h6>
                  <small class="text-body">{{ Str::limit($contact->subject ?? 'No subject', 40) }}</small>
                </div>
                <div class="user-progress d-flex align-items-center gap-2">
                  <small class="text-body-secondary">{{ $contact->created_at->diffForHumans() }}</small>
                  <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill" wire:navigate>
                    <i class="icon-base ti tabler-chevron-right"></i>
                  </a>
                </div>
              </div>
            </li>
          @empty
            <li class="text-center text-body-secondary py-4">No messages yet</li>
          @endforelse
        </ul>
      </div>
    </div>
  </div>

  {{-- Recent news table --}}
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-1">Recent News</h5>
          <p class="card-subtitle mb-0">Latest articles in the CMS</p>
        </div>
        <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-outline-primary" wire:navigate>View all</a>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Article</th>
              <th>Category</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @forelse($recentNews as $news)
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    @if($news->main_image)
                      <img src="{{ asset('storage/' . $news->main_image) }}" alt="" class="rounded me-3" width="38" height="38" style="object-fit:cover;">
                    @else
                      <div class="avatar avatar-sm me-3">
                        <span class="avatar-initial rounded bg-label-primary"><i class="icon-base ti tabler-news"></i></span>
                      </div>
                    @endif
                    <div>
                      <span class="fw-medium d-block">{{ Str::limit($news->title, 48) }}</span>
                      <small class="text-body-secondary">{{ $news->created_at->format('M d, Y') }}</small>
                    </div>
                  </div>
                </td>
                <td>{{ $news->categories->first()->name ?? '—' }}</td>
                <td>
                  <span class="badge {{ $news->status === 'published' ? 'bg-label-success' : 'bg-label-warning' }} me-1">
                    {{ ucfirst($news->status) }}
                  </span>
                </td>
                <td>
                  <div class="dropdown table-actions-dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow table-actions-toggle" aria-expanded="false">
                      <i class="icon-base ti tabler-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end table-actions-menu">
                      <li>
                        <a class="dropdown-item" href="{{ route('admin.news.show', $news) }}">
                          <i class="icon-base ti tabler-eye me-1"></i> View
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="{{ route('admin.news.edit', $news) }}">
                          <i class="icon-base ti tabler-pencil me-1"></i> Edit
                        </a>
                      </li>
                      <li>
                        <form action="{{ route('admin.news.destroy', $news) }}" method="POST" onsubmit="return confirm('Delete this article?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="dropdown-item">
                            <i class="icon-base ti tabler-trash me-1"></i> Delete
                          </button>
                        </form>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="text-center py-6 text-body-secondary">No news articles yet</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('dashboard/assets/vendor/libs/swiper/swiper.js') }}"></script>
<script>
  (function () {
    function initDashboardSwiper() {
      var el = document.querySelector('#swiper-with-pagination-cards');
      if (!el || typeof Swiper === 'undefined') return;
      if (el.swiper) {
        el.swiper.destroy(true, true);
      }
      new Swiper(el, {
        loop: true,
        autoplay: { delay: 3200, disableOnInteraction: false },
        pagination: { clickable: true, el: '.swiper-pagination' }
      });
    }
    document.addEventListener('DOMContentLoaded', initDashboardSwiper);
    document.addEventListener('livewire:navigated', initDashboardSwiper);
  })();
</script>
@endpush

