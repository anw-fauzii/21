<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Desa Mekarwangi
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      @can('isAdmin')
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['home']) }}">
        <a href="{{ url('/home') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Pengajuan</li>
      <li class="nav-item {{ active_class(['pengaduan']) }}">
        <a href="{{ url('/pengajuan') }}" class="nav-link">
          <i class="link-icon" data-feather="file-text"></i>
          <span class="link-title">Pengajuan</span>
        </a>
      </li>
      @elsecan('isUser')
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['home']) }}">
        <a href="{{ url('/home') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      @elsecan ('isOperator')
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['user']) }}">
        <a href="{{ url('/user') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Data Pengguna</span>
        </a>
      </li>
      @endcan
      
    </ul>
  </div>
</nav>