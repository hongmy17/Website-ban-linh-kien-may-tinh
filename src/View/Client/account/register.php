<div class="container px-4 py-5 min-vh-100 d-flex align-items-center">
  <div class="login-wrapper bg-white rounded-4 shadow-xl overflow-hidden w-100"
    style="max-width: 1100px; margin: 0 auto;">
    <div class="row g-0">

      <!-- Bên trái: Hình ảnh -->
      <div class="col-lg-6 d-none my-auto d-lg-block">
        <img src="/public/assets/images/client/loginimage.jpg" alt="DXM Store - Chào mừng bạn"
          class="w-100 object-fit-cover">
      </div>

      <!-- Bên phải: Form Đăng Ký -->
      <div class="col-lg-6 col-12 d-flex align-items-center px-4 py-5 px-xl-5">
        <div class="w-100" style="max-width: 460px; margin: 0 auto;">

          <div class="text-center mb-5 d-lg-none">
            <h3 class="fw-bold" style="color: #FD7E14;">DXM Store</h3>
          </div>

          <div class="text-center mb-5">
            <h2 class="fw-bold text-dark" style="font-size: 2.1rem; letter-spacing: -0.5px;">Đăng Ký</h2>
            <p class="text-muted mt-2">Tạo tài khoản để bắt đầu mua sắm</p>
          </div>

          <form action="/account/postRegister" method="POST" class="needs-validation" novalidate>
            <!-- Họ và tên -->
            <div class="mb-4">
              <label class="form-label fw-semibold text-dark">Họ và tên</label>
              <div class="position-relative">
                <input type="text"
                  class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light <?= isset($_SESSION["register_errors"]['name']) ? 'is-invalid' : '' ?>"
                  name="name" placeholder="Nguyễn Đặng Hồng Mỹ" style="padding-left: 3rem; height: 56px;"
                  value="<?= htmlspecialchars($_SESSION['register_old']['name'] ?? '') ?>" required>
                <span class="position-absolute start-0 top-50 translate-middle-y ps-3 text-muted">
                  <i class="bi bi-person"></i>
                </span>
                <?php if (isset($_SESSION["register_errors"]['name'])): ?>
                  <div class="invalid-feedback"><?= htmlspecialchars($_SESSION["register_errors"]['name']) ?></div>
                <?php else: ?>
                  <div class="invalid-feedback">Vui lòng nhập họ và tên!</div>
                <?php endif; ?>
              </div>
            </div>

            <!-- Email -->
            <div class="mb-4">
              <label class="form-label fw-semibold text-dark">Email</label>
              <div class="position-relative">
                <input type="email"
                  class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light <?= isset($_SESSION["register_errors"]['email']) ? 'is-invalid' : '' ?>"
                  name="email" placeholder="you@example.com" style="padding-left: 3rem; height: 56px;"
                  value="<?= htmlspecialchars($_SESSION['register_old']['email'] ?? '') ?>" required>
                <span class="position-absolute start-0 top-50 translate-middle-y ps-3 text-muted">
                  <i class="bi bi-envelope"></i>
                </span>
                <?php if (isset($_SESSION["register_errors"]['email'])): ?>
                  <div class="invalid-feedback"><?= htmlspecialchars($_SESSION["register_errors"]['email']) ?></div>
                <?php else: ?>
                  <div class="invalid-feedback">Email không hợp lệ!</div>
                <?php endif; ?>
              </div>
            </div>

            <!-- Mật khẩu -->
            <div class="mb-4">
              <label class="form-label fw-semibold text-dark">Mật khẩu</label>
              <div class="position-relative">
                <input type="password"
                  class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light <?= isset($_SESSION["register_errors"]['password']) ? 'is-invalid' : '' ?>"
                  name="password" placeholder="••••••••" style="padding-left: 3rem; height: 56px;" required
                  minlength="6">
                <span class="position-absolute start-0 top-50 translate-middle-y ps-3 text-muted">
                  <i class="bi bi-lock"></i>
                </span>
                <?php if (isset($_SESSION["register_errors"]['password'])): ?>
                  <div class="invalid-feedback"><?= htmlspecialchars($_SESSION["register_errors"]['password']) ?></div>
                <?php else: ?>
                  <div class="invalid-feedback">Mật khẩu phải ít nhất 6 ký tự!</div>
                <?php endif; ?>
              </div>
            </div>

            <!-- Nhập lại mật khẩu -->
            <div class="mb-4">
              <label class="form-label fw-semibold text-dark">Nhập lại mật khẩu</label>
              <div class="position-relative">
                <input type="password"
                  class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light <?= isset($_SESSION["register_errors"]['password_confirm']) ? 'is-invalid' : '' ?>"
                  name="password_confirm" placeholder="••••••••" style="padding-left: 3rem; height: 56px;" required>
                <span class="position-absolute start-0 top-50 translate-middle-y ps-3 text-muted">
                  <i class="bi bi-lock"></i>
                </span>
                <?php if (isset($_SESSION["register_errors"]['password_confirm'])): ?>
                  <div class="invalid-feedback"><?= htmlspecialchars($_SESSION["register_errors"]['password_confirm']) ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <button type="submit" class="btn btn-lg w-100 fw-bold rounded-3 text-white shadow-lg" style="background: linear-gradient(90deg, #FD7E14 0%, #ff8f26 100%);
                                       padding: 0.95rem; font-size: 1.1rem; border: none;">
              Tạo Tài Khoản
            </button>

            <div class="text-center mt-4">
              <span class="text-muted">Đã có tài khoản?</span>
              <a href="/account/login" class="fw-bold ms-2 text-decoration-none" style="color: #FD7E14;">
                Đăng nhập ngay
              </a>
            </div>
          </form>

          <div class="text-center position-relative my-4">
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
        </div>
      </div>
    </div>
  </div>
</div>

<?php
unset($_SESSION['register_errors']);
unset($_SESSION['register_old']);
?>


<!-- Bootstrap 5 Validation Script -->
<script>
  // Tắt validate mặc định của HTML5 để dùng Bootstrap
  (function () {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>