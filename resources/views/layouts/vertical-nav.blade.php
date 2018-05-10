<div class="col-md-2 col-sm-4 collapse d-md-block sidebar" id="sidebar">
  <div class="sidebar-sticky nav-side-menu">
    <ul>
      <li>
        <a href="#">
        <i class="fas fa-tachometer-alt fa-lg"></i> &nbsp; Dashboard
        </a>
      </li>
      <li>
        <a href="{{ route('home') }}">
        <i class="fas fa-home fa-lg"></i> &nbsp; Home
        </a>
      </li>
      <li  data-toggle="collapse" data-target="#products" class="collapsed active">
        <a href="#"><i class="fas fa-gift fa-lg"></i> &nbsp; UI Elements <span class="arrow"></span></a>
      </li>
      <ul class="sub-menu collapse" id="products">
          <li class="active"><a href="#">CSS3 Animation</a></li>
          <li><a href="#">General</a></li>
          <li><a href="#">Buttons</a></li>
          <li><a href="#">Tabs & Accordions</a></li>
          <li><a href="#">Typography</a></li>
          <li><a href="#">FontAwesome</a></li>
          <li><a href="#">Slider</a></li>
          <li><a href="#">Panels</a></li>
          <li><a href="#">Widgets</a></li>
          <li><a href="#">Bootstrap Model</a></li>
          <li class="active"><a href="#">CSS3 Animation</a></li>
          <li><a href="#">General</a></li>
          <li><a href="#">Buttons</a></li>
          <li><a href="#">Tabs & Accordions</a></li>
          <li><a href="#">Typography</a></li>
          <li><a href="#">FontAwesome</a></li>
          <li><a href="#">Slider</a></li>
          <li><a href="#">Panels</a></li>
          <li><a href="#">Widgets</a></li>
          <li><a href="#">Bootstrap Model</a></li>
      </ul>
      <li>
        <a href="{{ route('user-index') }}">
        <i class="fas fa-users fa-lg"></i> &nbsp; Users
        </a>
      </li>
      <li>
        <a href="{{ route('add-result') }}">
        <i class="fas fa-users fa-lg"></i> &nbsp; Add Result
        </a>
      </li>
    </ul>
  </div>
</div>