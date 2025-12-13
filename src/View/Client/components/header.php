<!-- Spinner Start -->
<div id="spinner"
  class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
  <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<!-- Spinner End -->


<!-- Topbar Start -->
<div class="container-fluid px-5 py-4 d-none d-lg-block">
  <div class="row gx-0 align-items-center text-center">
    <div class="col-md-4 col-lg-3 text-center text-lg-start">
      <div class="d-inline-flex align-items-center">
        <a href="/" class="navbar-brand p-0">
          <h1 class="display-5 text-primary m-0"><i class="fas fa-shopping-bag text-secondary me-2"></i>DXM
          </h1>
          <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
      </div>
    </div>
    <div class="col-md-4 col-lg-6 text-center">
      <div class="position-relative ps-4">
        <div class="d-flex border rounded-pill">
          <input class="form-control border-0 rounded-pill w-100 py-3" type="text" data-bs-target="#dropdownToggle123"
            placeholder="Bạn muốn tìm gì?">
          <button type="button" class="btn btn-primary rounded-pill py-3 px-5" style="border: 0;"><i
              class="fas fa-search"></i></button>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-lg-3 text-center text-lg-end">
      <div class="d-inline-flex align-items-center">
        <div class="dropdown">
          <div class="text-muted d-flex align-items-center justify-content-center me-3" id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-expanded="false"><span class="rounded-circle btn-md-square border"><i
                class="bi bi-person-circle"></i></i></div>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <?php if (!empty($_SESSION["user_id"])): ?>
              <li><a class="dropdown-item" href="/account">Hồ sơ</a></li>
              <li><a class="dropdown-item" href="/account/logout">Đăng xuất</a></li>
            <?php else: ?>
              <li><a class="dropdown-item" href="/account/login">Đăng nhập</a></li>
              <li><a class="dropdown-item" href="/account/register">Đăng ký</a></li>
            <?php endif; ?>
          </ul>
        </div>

        <div class="dropdown">
          <div class="text-muted d-flex align-items-center justify-content-center me-3" id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-expanded="false"><span class="rounded-circle btn-md-square border"><i
                class="fas fa-shopping-cart"></i></div>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/cart">Giỏ hàng</a></li>
            <li><a class="dropdown-item" href="/cart/history">Lịch sử mua hàng</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar p-0 text-center">
  <div class="bg-primary px-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
      <a href="/" class="navbar-brand d-block d-lg-none">
        <h1 class="display-5 text-secondary m-0"><i class="fas fa-shopping-bag text-white me-2"></i>DXM</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars fa-1x"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto py-0">
          <a href="/" class="nav-item nav-link active">Trang chủ</a>
          <a href="/product" class="nav-item nav-link">Cửa hàng</a>
          <a href="/contact" class="nav-item nav-link me-2">Liên hệ</a>
          <?php if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]): ?>
            <a href="/admin" class="nav-item nav-link me-2">Admin</a>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </div>
</div>
<!-- Navbar & Hero End -->