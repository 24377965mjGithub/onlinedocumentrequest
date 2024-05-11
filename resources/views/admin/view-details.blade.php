@extends('layouts.main')
@section('content')
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <x-header-component></x-header-component>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <x-sidebar-component></x-sidebar-component>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <section class="search mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Search Someone</h4>
                    @if (session()->has('errorsearch'))
                        <p class="alert alert-danger">{{ session()->get('errorsearch') }}</p>
                    @endif
                    <form action="{{ url('/search') }}" method="get">
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" name="search" id="" placeholder="Search Name...">
                                </div>
                            </div>
                            <div class="col-2">
                                @csrf
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </section>

          <section class="sample">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Requests on {{ Carbon\Carbon::createFromFormat('m', $month)->format('F') }} ({{ date('Y') }})</h4>
                  <h3 class="card-title">{{ App\Models\DepartmentLevels::where('id', $departmentlevelid)->value('departmentlevel') }}</h3>

                    {{-- notification --}}

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session()->has('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                    @endif

                    {{-- end notification --}}

                    <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Requested Documents</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            @forelse ($requests as $req)
                                <tr>
                                    <td>
                                        <p>
                                            <b>Name: </b>{{ App\Models\User::where('id', $req->userid)->value('name') }} <br>
                                            <b>Document: </b>{{ App\Models\Documents::where('id', $req->documentid)->value('document') }} <br>
                                            <b>Department and Level: </b>{{ App\Models\DepartmentLevels::where('id', $req->departmentlevelid)->value('departmentlevel') }} <br>
                                            <b>Phone Number: </b>{{ $req->phonenumber }} <br>
                                            <b>School Year Graduated: </b>{{ $req->schoolyeargraduated }} <br>
                                            <b>Remarks: </b>{{ $req->remarks }} <br>
                                            <b>Date: </b>{{ $req->created_at->format('l, F j, Y') }} <br>
                                        </p>
                                    </td>
                                    <td>
                                        <a href="{{ url('add-status/'.$req->id.'/'.$month.'/'.$departmentlevelid) }}">
                                            <button class="btn btn-info">View Details</button>
                                        </a>
                                        {{-- <a href="{{ url('delete-request/'.$req->id) }}">
                                            <button class="btn btn-danger">Delete Request</button>
                                        </a> --}}
                                        <a href="sms: {{ $req->phonenumber }}">
                                            <button class="btn btn-success">SMS</button>
                                        </a>
                                        <a href="tel: {{ $req->phonenumber }}">
                                            <button class="btn btn-warning">Call</button>
                                        </a>
                                        {{-- <a href="{{ url('delete-request/'.$req->id) }}">
                                            <button class="btn btn-danger">Delete</button>
                                        </a> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No requests</td>
                                </tr>
                            @endforelse


                          </tbody>
                        </table>
                      </div>
                </div>
              </div>
          </section>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <x-footer-component></x-footer-component>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
@endsection
