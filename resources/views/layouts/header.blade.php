<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <ul class="navbar-nav">
      <notification-pelaporan v-bind:notifications="notifications"></notification-pelaporan>
      <li class="nav-item dropdown nav-profile">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ url('https://img.favpng.com/23/0/3/computer-icons-user-profile-clip-art-portable-network-graphics-png-favpng-YEj6NsJygkt6nFTNgiXg9fg9w.jpg') }}" alt="profile">
        </a>
        <div class="dropdown-menu" aria-labelledby="profileDropdown">
          <div class="dropdown-header d-flex flex-column align-items-center">
            <div class="figure mb-3">
              <img src="{{ url('https://img.favpng.com/23/0/3/computer-icons-user-profile-clip-art-portable-network-graphics-png-favpng-YEj6NsJygkt6nFTNgiXg9fg9w.jpg') }}" alt="">
            </div>
            <div class="info text-center">
              <p class="name font-weight-bold mb-0">{{ auth()->user()->name ?? '' }}</p>
              <p class="email text-muted mb-3">{{ auth()->user()->email ?? '' }}</p>
            </div>
          </div>
          <div class="dropdown-body">
            <ul class="profile-nav p-0 pt-3">
              <li class="nav-item">
                <a href="{{ route('profile.edit') }}" class="nav-link">
                  <i data-feather="edit"></i>
                  <span>Edit Profile</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('profile.editpassword') }}" class="nav-link">
                  <i data-feather="settings"></i>
                  <span>Ubah Kata sandi</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                  <i data-feather="log-out"></i>
                  <span>Keluar</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>