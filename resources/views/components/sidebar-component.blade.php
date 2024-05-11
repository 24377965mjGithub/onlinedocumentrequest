@if (Auth::user()->role === 'admin')
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('documents') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Documents</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('export-report') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Export Report</span>
        </a>
      </li>
    </ul>
  </nav>
@endif

@if (Auth::user()->role === 'student')
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('request-a-document') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Request a Document</span>
        </a>
      </li>
    </ul>
  </nav>
@endif
