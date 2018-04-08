<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('home') }}">
          <span data-feather="home"></span>
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Conversations</span>
        
        <a class="d-flex align-items-center text-muted" href="#">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
        </a>
    </h6>

    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user-index') }}">
          <span data-feather="home"></span>
          Users
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
          <span data-feather="file"></span>
          Sample details
        </a>
      </li>
    </ul>
  </div>
</nav>