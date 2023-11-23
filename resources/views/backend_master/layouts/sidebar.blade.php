<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed " href="{{url('/panel/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="{{url('/panel/dashboard/users')}}" class="nav-link collapsed {{'/panel/dashboard/users' == request()->path() ? 'active' : ' '}} ">
            <i class="bi bi-person-workspace "></i><span>Users</span>
          </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/panel/dashboard/role')}}" class=" nav-link collapsed {{'panel/dashboard/role'  == request()->path() ? 'active' : ''}} ">
            <i class="bi bi-person-badge-fill"></i> <span>Role</span>
          </a>
      </li>

      <li class="nav-item">
        <a href="{{url('/panel/dashboard/Enrollment')}}" class=" nav-link collapsed {{'panel/dashboard/role'  == request()->path() ? 'active' : ''}} ">
            <i class="bi bi-person-badge-fill"></i> <span>Enollment</span>
          </a>
      </li>
      <li class="nav-item">
        <a href="" class="nav-link     {{ (request()->segment(1) == '/panel/dashboard/courses') ? 'collapsed' : 'collapsed' }}"{{-- {{'panel/dashboard/courses' == request()->path() ? '' : 'collapsed'}} --}} ">

          <span>Couress</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/panel/dashboard/course_category')}}" class="nav-link collapsed  {{'panel/dashboard/course_category' == request()->path() ? 'active' : ''}} ">
          <i class="bi bi-tag "></i>
          <span>Category </span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/panel/dashboard/courses')}}" class="nav-link collapsed   {{'panel/dashboard/course_category' == request()->path() ? 'active' : ''}} ">
          <i class="bi bi-view-list   "></i>
          <span>Courses</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/panel/dashboard/videos')}}" class="nav-link     {{ (request()->segment(1) == '/panel/dashboard/courses') ? 'collapsed' : 'collapsed' }}"{{-- {{'panel/dashboard/courses' == request()->path() ? '' : 'collapsed'}} --}} ">
          <i class="bi bi-camera-video-fill   "></i>
          <span>Video</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{url('/panel/dashboard/trash')}}" class="nav-link     {{ (request()->segment(1) == '/panel/dashboard/courses') ? 'collapsed' : 'collapsed' }}"{{-- {{'panel/dashboard/courses' == request()->path() ? '' : 'collapsed'}} --}} ">
          <i class="bi bi-trash-fill   "></i>
          <span>Trash</span>
        </a>
      </li>

    </ul>

  </aside>
