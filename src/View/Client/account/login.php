<div class="container px-4 py-5 min-vh-100 d-flex align-items-center justify-content-center">
  <div class="login-wrapper bg-white rounded-4 shadow-xl overflow-hidden w-100" style="max-width: 1100px;">
    <div class="row g-0">

      <!-- Bên trái: Hình ảnh (chỉ hiện desktop) -->
      <div class="col-lg-6 d-none my-auto d-lg-block position-relative">
        <img src="/public/assets/images/client/loginimage.jpg" alt="DXM Store" class="w-100 object-fit-cover">
        <div class="position-absolute inset-0"
          style="background: linear-gradient(135deg, rgba(253,126,20,0.2) 0%, transparent 70%);"></div>
      </div>

      <!-- Bên phải: Form đăng nhập - căn dọc hoàn hảo -->
      <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center px-4 py-5 px-xl-5">
        <div class="w-100" style="max-width: 420px;">

          <!-- Logo trên mobile -->
          <div class="text-center mb-5 d-lg-none">
            <h3 class="fw-bold" style="color: #FD7E14; font-size: 2rem;">DXM Store</h3>
            <p class="text-muted small">Chào mừng bạn trở lại</p>
          </div>

          <!-- Tiêu đề -->
          <div class="text-center mb-5">
            <h2 class="fw-bold text-dark mb-2" style="font-size: 2.1rem; letter-spacing: -0.5px;">
              Đăng Nhập
            </h2>
            <p class="text-muted">Nhập thông tin để tiếp tục mua sắm</p>
          </div>

          <form action="xuly_login.php" method="POST" class="needs-validation" novalidate>

            <!-- Email -->
            <div class="mb-4">
              <label class="form-label fw-semibold text-dark mb-2">Email</label>
              <div class="position-relative">
                <input type="email" class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light"
                  name="username" placeholder="example@gmail.com" style="height: 58px; padding-left: 3.2rem;" required
                  autofocus>
                <span class="position-absolute start-0 top-50 translate-middle-y ps-3 text-muted">
                  <i class="bi bi-envelope fs-5"></i>
                </span>
              </div>
              <div class="invalid-feedback">Vui lòng nhập email hợp lệ!</div>
            </div>

            <!-- Mật khẩu -->
            <div class="mb-4">
              <label class="form-label fw-semibold text-dark mb-2">Mật khẩu</label>
              <div class="position-relative">
                <input type="password" class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light"
                  name="password" placeholder="••••••••" style="height: 58px; padding-left: 3.2rem;" required>
                <span class="position-absolute start-0 top-50 translate-middle-y ps-3 text-muted">
                  <i class="bi bi-lock fs-5"></i>
                </span>
              </div>
              <div class="invalid-feedback">Vui lòng nhập mật khẩu!</div>
            </div>

            <!-- Remember + Quên mật khẩu (căn đều 2 bên) -->
            <div class="d-flex justify-content-between align-items-center mb-4">
              <div class="form-check mb-0">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label text-muted small" for="remember">
                  Ghi nhớ đăng nhập
                </label>
              </div>
              <a href="#" class="small fw-semibold text-decoration-none" style="color: #FD7E14;">
                Quên mật khẩu?
              </a>
            </div>

            <!-- Nút đăng nhập -->
            <div class="d-grid mb-4">
              <button type="submit" class="btn btn-lg fw-bold rounded-3 text-white shadow-lg" style="height: 58px; 
                                           background: linear-gradient(90deg, #FD7E14 0%, #ff8f26 100%);
                                           border: none;
                                           font-size: 1.1rem;">
                Đăng Nhập Ngay
              </button>
            </div>

            <!-- Đăng ký -->
            <div class="text-center mb-5">
              <span class="text-muted me-2">Chưa có tài khoản?</span>
              <a href="/account/register" class="fw-bold text-decoration-none" style="color: #FD7E14;">
                Đăng ký miễn phí
              </a>
            </div>

            <!-- Divider + Đăng nhập nhanh -->
            <div class="text-center position-relative mb-4">
              <hr class="text-muted">
              <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted small">
                Hoặc
              </span>
            </div>

            <div class="d-flex justify-content-center gap-3">
              <a href="#" class="btn btn-outline-secondary rounded-circle shadow-sm">
                <i class="bi bi-google fs-4"></i>
              </a>
              <a href="#" class="btn btn-outline-secondary rounded-circle shadow-sm">
                <i class="bi bi-facebook fs-4"></i>
              </a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>