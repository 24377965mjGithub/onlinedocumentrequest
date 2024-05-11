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

          <section class="overview mb-3">
            <div class="row">
                <div class="col-4">
                    <div class="card bg-info">
                        <div class="card-body">
                            <h1 class="card-title">Overall Requests: {{ App\Models\Requests::count() }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-success">
                        <div class="card-body">
                            <h1 class="card-title">Requests Today: {{ App\Models\Requests::whereDate('created_at', Carbon\Carbon::today())->count() }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <h1 class="card-title">Total Documents: {{ App\Models\Documents::count() }}</h1>
                        </div>
                    </div>
                </div>
            </div>
          </section>

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
                  <h4 class="card-title">Select Month</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Month</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>January</td>
                          <td>
                            <a href="{{ url('view-request/1') }}">
                                <button class="btn btn-info">View Request</button>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Febuary</td>
                          <td>
                            <a href="{{ url('view-request/2') }}">
                                <button class="btn btn-info">View Request</button>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>March</td>
                          <td>
                            <a href="{{ url('view-request/3') }}">
                                <button class="btn btn-info">View Request</button>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>April</td>
                          <td>
                            <a href="{{ url('view-request/4') }}">
                                <button class="btn btn-info">View Request</button>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>May</td>
                          <td>
                            <a href="{{ url('view-request/5') }}">
                                <button class="btn btn-info">View Request</button>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>June</td>
                          <td>
                            <a href="{{ url('view-request/6') }}">
                                <button class="btn btn-info">View Request</button>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>July</td>
                          <td>
                            <a href="{{ url('view-request/7') }}">
                                <button class="btn btn-info">View Request</button>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>August</td>
                          <td>
                            <a href="{{ url('view-request/8') }}">
                                <button class="btn btn-info">View Request</button>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>September</td>
                          <td>
                            <a href="{{ url('view-request/9') }}">
                                <button class="btn btn-info">View Request</button>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>October</td>
                          <td>
                            <a href="{{ url('view-request/10') }}">
                                <button class="btn btn-info">View Request</button>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>November</td>
                          <td>
                            <a href="{{ url('view-request/11') }}">
                                <button class="btn btn-info">View Request</button>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>December</td>
                          <td>
                            <a href="{{ url('view-request/12') }}">
                                <button class="btn btn-info">View Request</button>
                            </a>
                          </td>
                        </tr>
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
