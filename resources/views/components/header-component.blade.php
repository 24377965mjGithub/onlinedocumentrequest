
<style>
.navbar .navbar-brand-wrapper .navbar-brand img {
    max-width: 100% !important;
    height: 92px !important;
}
</style>

<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="{{ url('logo/sfc logo.jpg') }}" alt="logo" width="100%" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="{{ url('logo/sfc logo.jpg') }}" alt="logo" />
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text">Hello, <span class="text-black fw-bold">{{ Auth::user()->name }}</span></h1>
          <h3 class="welcome-sub-text">Here is your dashboard.</h3>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            {{-- <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> --}}
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img class="img-xs rounded-circle" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
            @else
                <span class="inline-flex rounded-md" style="border-radius: 50%">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                        {{ Auth::user()->name }}

                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </span>
            @endif
        </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img class="img-xs rounded-circle" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
            @endif
              <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
              <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>

            </div>
            <a class="dropdown-item" href="{{ url('user/profile') }}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile</a>

            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
