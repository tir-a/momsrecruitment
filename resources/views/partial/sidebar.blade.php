<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="{{ asset('admin/dist/img/moms.jpeg') }}" alt="MPC Logo" class="brand-image img-rounded elevation-3" style="opacity: 1">
      <span class="brand-text font-weight-light">Recruiter</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}<br>{{Auth::user()->email}}<br></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>      
          <li class="nav-item">
          <a href="{{route('branches.index')}}" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
              <p>
                Branch
              </p>
            </a>
          </li>    
          <li class="nav-item">
          <a href="{{route('recruiters.index')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Recruiter
              </p>
            </a>
          </li>             
          <li class="nav-item">
          <a href="{{route('vacancies.index')}}" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Job Vacancy
              </p>
            </a>
          </li>      
          <li class="nav-item">
            <a href="{{route('applications.index')}}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Application
              </p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="{{route('interviews.index')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Interview
              </p>
            </a>
          </li>  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
