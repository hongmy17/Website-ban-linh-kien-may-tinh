

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <!-- Card hồ sơ đẹp lung linh chỉ dùng Bootstrap -->
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-body p-4 p-md-5">

                    <div class="row align-items-center g-5">

                        <!-- Cột trái: Avatar siêu to khổng lồ + viền gradient đẹp -->
                        <div class="col-lg-4 text-center">
                            <div class="position-relative d-inline-block">
                                <img src="https://i.pinimg.com/736x/7b/b4/7b/7bb47bed6ee479dde60bad88b35c0cd4.jpg"
                                     class="rounded-circle border border-5 border-white shadow-lg"
                                     alt="Avatar"
                                     width="220"
                                     height="220"
                                     style="object-fit: cover;">
                                <!-- Vòng gradient trang trí phía sau avatar -->
                                <div class="position-absolute top-50 start-50 translate-middle rounded-circle"
                                     style="width: 240px; height: 240px; background: linear-gradient(45deg, #6d28d9, #3b82f6); opacity: 0.2; z-index: -1;">
                                </div>
                            </div>
                        </div>

                        <!-- Cột phải: Thông tin + nút -->
                        <div class="col-lg-8">
                            <h2 class="fw-bold text-dark mb-1">Nguyễn Văn A</h2>
                            <p class="text-primary fw-medium mb-4">
                                <span class="badge bg-primary text-white px-3 py-2 rounded-pill">Thành viên VIP</span>
                            </p>

                            <div class="row g-3 mb-4">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-envelope-fill text-primary me-3"></i>
                                        <div>
                                            <small class="text-muted d-block">Email</small>
                                            <strong>nguyenvana@example.com</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-telephone-fill text-primary me-3"></i>
                                        <div>
                                            <small class="text-muted d-block">Điện thoại</small>
                                            <strong>0123 456 789</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-geo-alt-fill text-primary me-3"></i>
                                        <div>
                                            <small class="text-muted d-block">Địa chỉ</small>
                                            <strong>Hà Nội, Việt Nam</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nút chỉnh sửa đẹp mắt -->
                            <div class="d-grid d-md-block">
                                <button class="btn btn-primary btn-lg px-100 px-5 py-3 rounded-pill shadow-sm fw-medium" 
                                        onclick="editProfile()">
                                    <i class="bi bi-pencil-square me-2"></i>
                                    Chỉnh sửa hồ sơ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
