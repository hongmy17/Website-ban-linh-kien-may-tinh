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
                <h2 class="fw-bold text-dark" style="font-size: 2rem;">Đăng ký</h2>
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
