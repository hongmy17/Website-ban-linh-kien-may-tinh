<div class="container px-4 py-5">
    <div class="login-wrapper bg-white rounded-4 shadow-lg overflow-hidden" style="max-width: 1100px; margin: 0 auto;">
        <div class="row g-0">

            <!-- Bên trái: Hình ảnh full + overlay cam nhẹ (rất sang) -->
            <div class="col-lg-6 position-relative p-0">
                <!-- Ẩn trên mobile nếu muốn gọn -->
                <img src="/public/assets/images/client/loginimage.jpg" 
                     alt="DXM Store - Chào mừng bạn" 
                     class="w-100 h-100 object-fit-cover">

                <!-- Overlay + chữ chào (tùy chọn bật lại nếu muốn) -->
                
            </div>

            <!-- Bên phải: Form đăng nhập (gọn, đẹp, hiện đại) -->
            <div class="col-lg-6 col-12 login-form px-4 py-5 px-xl-5">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark" style="font-size: 2rem;">Đăng Nhập</h2>
                    <p class="text-muted">Nhập thông tin để tiếp tục mua sắm</p>
                </div>

                <form action="xuly_login.php" method="POST" class="needs-validation" novalidate>
                    <div class="mb-4">
                        <label class="form-label fw-500">Email hoặc Tên đăng nhập</label>
                        <input type="text" 
                               class="form-control form-control-lg rounded-3 border-2" 
                               name="username" 
                               placeholder="Nhập email hoặc tên đăng nhập" 
                               required autofocus>
                        <div class="invalid-feedback">Vui lòng nhập tên đăng nhập hoặc email!</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-500">Mật khẩu</label>
                        <input type="password" 
                               class="form-control form-control-lg rounded-3 border-2" 
                               name="password" 
                               placeholder="Nhập mật khẩu" 
                               required>
                        <div class="invalid-feedback">Vui lòng nhập mật khẩu!</div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label small text-muted" for="remember">
                                Ghi nhớ đăng nhập
                            </label>
                        </div>
                        <a href="#" class="small fw-600" style="color: #FD7E14;">Quên mật khẩu?</a>
                    </div>

                    <button type="submit" 
                            class="btn btn-lg w-100 fw-600 rounded-3 text-white shadow-sm   "
                            style="background: #FD7E14; padding: 0.9rem; font-size: 1.1rem;">
                        Đăng Nhập Ngay
                    </button>

                    <div class="text-center mt-4">
                        <span class="text-muted">Chưa có tài khoản?</span>
                        <a href="register.php" class="fw-600 ms-1" style="color: #FD7E14; text-decoration: none;">
                            Đăng ký miễn phí
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

Form dand ky
<div class="container px-4 py-5">
    <div class="row g-0 shadow-lg rounded-4 overflow-hidden" style="max-width: 1000px; margin: 0 auto; background: #fff;">
        
        <!-- Bên trái: Ảnh lớn (chỉ hiện trên desktop) - giống login -->
        <div class="col-lg-6 p-0 d-none d-lg-block">
            <img src="/public/assets/images/client/loginimage.jpg"
                 alt="DXM Store"
                 class="w-100 h-100 object-fit-cover">
        </div>

        <!-- Bên phải: Form Thêm người dùng - giống login 100% -->
        <div class="col-lg-6 col-12 bg-white px-4 py-5 px-lg-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark" style="font-size: 2rem;">Thêm người dùng</h2>
                <p class="text-muted">Tạo tài khoản mới cho nhân viên / khách hàng</p>
            </div>

            <form action="xuly_them_nguoidung.php" method="POST">
                <!-- Họ tên -->
                <div class="mb-4">
                    <input type="text"
                           class="form-control form-control-lg rounded-pill border-0 shadow-sm"
                           name="fullname"
                           placeholder="Họ và tên"
                           style="height: 56px; background: #f8f9fa;"
                           required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <input type="email"
                           class="form-control form-control-lg rounded-pill border-0 shadow-sm"
                           name="email"
                           placeholder="Email"
                           style="height: 56px; background: #f8f9fa;"
                           required>
                </div>

                <!-- Mật khẩu -->
                <div class="mb-4">
                    <input type="password"
                           class="form-control form-control-lg rounded-pill border-0 shadow-sm"
                           name="password"
                           placeholder="Mật khẩu"
                           style="height: 56px; background: #f8f9fa;"
                           required>
                </div>

                <!-- Xác nhận mật khẩu -->
                <div class="mb-5">
                    <input type="password"
                           class="form-control form-control-lg rounded-pill border-0 shadow-sm"
                           name="password_confirm"
                           placeholder="Xác nhận mật khẩu"
                           style="height: 56px; background: #f8f9fa;"
                           required>
                </div>

                <!-- Nút Thêm người dùng -->
                <button type="submit"
                        class="btn btn-lg w-100 fw-bold rounded-pill text-white shadow"
                        style="background: #FD7E14; height: 56px; font-size: 1.1rem;">
                    Thêm người dùng
                </button>

                <!-- Link quay lại (tuỳ chọn) -->
                <div class="text-center mt-4">
                    <a href="login.php" class="small text-muted text-decoration-none">
                        Quay lại đăng nhập
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
