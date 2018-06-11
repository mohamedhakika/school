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
      <li  data-toggle="collapse" data-target="#products">
        <a href="#"><i class="fas fa-gift fa-lg"></i> &nbsp; UI Elements <span class="arrow"></span></a>
      </li>
      <ul class="sub-menu collapse" id="products">
          <li class="active"><a href="#">CSS3 Animation</a></li>
          <li><a href="#">General</a></li>
          <li><a href="#">Buttons</a></li>
          <li><a href="#">Typography</a></li>
          <li><a href="#">FontAwesome</a></li>
          <li><a href="#">Slider</a></li>
          <li><a href="#">Panels</a></li>
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
      <!-- admin anza -->
      <li data-toggle="collapse" href="#students" class="{{ Request::is('students/*') ? 'active' : '' }}">
        <a  href="#"> <i class="fas fa-graduation-cap"></i> &nbsp; Students <span class="arrow"></span></a>
      </li>
      <ul class="sub-menu collapse" id="students">
        <li class="{{ Request::is('students/o-level') ? 'active' : '' }}">
          <a href="{{ route('students.o-level') }}"> O-Level</a>
        </li>
        <li class="{{ Request::is('students/a-level') ? 'active' : '' }}">
          <a href="{{ route('students.a-level') }}"> A-Level</a>
        </li>
      </ul>
      <li data-toggle="collapse" href="#staff" class="{{ Request::is('staff/*') ? 'active' : '' }}">
        <a  href="#"> <i class="fas fa-user"></i> &nbsp; Staff <span class="arrow"></span></a>
      </li>
      <ul class="sub-menu collapse" id="staff">
        <li class="{{ Request::is('staff/teachers') ? 'active' : '' }}">
          <a href="{{ route('teachers.index') }}"> Teachers</a>
        </li>
        <li class="#">
          <a href="#"> Accountants</a>
        </li>
        <li class="#">
          <a href="#"> Administrators</a>
        </li>
      </ul>
      <li data-toggle="collapse" href="#settings" class="{{ Request::is('setting/*') ? 'active' : '' }}">
        <a  href="#"> <i class="fas fa-cogs"></i> &nbsp; Settings <span class="arrow"></span></a>
      </li>
      <ul class="sub-menu collapse" id="settings">
        <li class="{{ Request::is('setting/classes') ? 'active' : '' }}">
          <a href="{{ route('setting.classes') }}"> Classes & Forms</a>
        </li>
        <li class="{{ Request::is('setting/assessment') ? 'active' : '' }}">
          <a href="{{ route('setting.assessment') }}"> Assessments</a>
        </li>
        <li class="{{ Request::is('setting/subjects') ? 'active' : '' }}">
          <a href="{{ route('setting.subjects') }}"> Subjects</a>
        </li>
      </ul>
      <!-- end admin -->
      <!-- teacher start -->
      <li class="{{ Request::is('assessment/teacher/*') ? 'active' : '' }}">
        <a href="{{ route('teacher.assessment', Auth::user()->id) }}">
        <i class="fab fa-weixin"></i> &nbsp; Assesment
        </a>
      </li>
      <li class="{{ Request::is('subjects/teacher/*') ? 'active' : '' }}">
        <a href="{{ route('teacher.subjects', Auth::user()->id) }}">
        <i class="fas fa-book fa-lg"></i> &nbsp; Subjects
        </a>
      </li>
      <!-- teacher end -->
    </ul>
  </div>
</div>