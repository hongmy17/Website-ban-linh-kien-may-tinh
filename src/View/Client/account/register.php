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
                    <h2 class="fw-bold text-dark" style="font-size: 2rem;">Đăng Ký</h2>
                    <p class="text-muted">Nhập thông tin để tiếp tục đăng ký</p>
                </div>

                <form action="xuly_login.php" method="POST" class="needs-validation" novalidate>
                    <div class="mb-4">
                        <label class="form-label fw-500">Họ và Tên</label>
                        <input type="text"
                            class="form-control form-control-lg rounded-3 border-2"
                            name="username"
                            placeholder="Vui lòng nhập Họ và Tên"
                            required autofocus>
                        <div class="invalid-feedback">Vui lòng nhập Họ và Tên !</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-500">Nhập Email </label>
                        <input type="password"
                            class="form-control form-control-lg rounded-3 border-2"
                            name="password"
                            placeholder="Nhập Email"
                            required>
                        <div class="invalid-feedback">Vui lòng nhập Email!</div>
                    </div>



                    <div class="mb-4">
                        <label class="form-label fw-500">Nhập Số Điện Thoại </label>
                        <input type="password"
                            class="form-control form-control-lg rounded-3 border-2"
                            name="password"
                            placeholder="Nhập Số Điện Thoại"
                            required>
                        <div class="invalid-feedback">Vui lòng nhập Số Điện Thoại!</div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-500">Nhập Mật Khẩu </label>
                        <input type="password"
                            class="form-control form-control-lg rounded-3 border-2"
                            name="password"
                            placeholder="Nhập Mật Khẩu"
                            required>
                        <div class="invalid-feedback">Vui lòng nhập Mật Khẩu!</div>
                    </div>


                    <div class="mb-4">
                        <label class="form-label fw-500">Nhập lại Mật Khẩu </label>
                        <input type="password"
                            class="form-control form-control-lg rounded-3 border-2"
                            name="password"
                            placeholder="Nhập Lại Mật Khẩu"
                            required>
                        <div class="invalid-feedback">Vui lòng nhập lại Mật Khẩu!</div>
                    </div>



                   

                    <button type="submit"
                        class="btn btn-lg w-100 fw-600 rounded-3 text-white shadow-sm   "
                        style="background: #FD7E14; padding: 0.9rem; font-size: 1.1rem;">
                         Đăng ký 
                    </button>

                    <div class="text-center mt-4">
                        <span class="text-muted">Đã có tài khoản?</span>
                        <a href="register.php" class="fw-600 ms-1" style="color: #FD7E14; text-decoration: none;">
                            Đăng Nhập Ngay
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>