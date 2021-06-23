<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ asset('adminlte/assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('category.index') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text"> Danh Mục</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('product.index') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text text-info">Sản Phẩm</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('setting.index') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text text-danger">Settings</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('user.index') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text text-primary">Nhân viên</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('role.index') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text text-success">Chức vụ</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('permission.add') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text text-success">Thêm dữ liệu cho Permission</span>
              </a>
            </li>
            
          </ul>
          <!-- Divider -->
         
          </ul>
        </div>
      </div>
    </div>
  </nav>