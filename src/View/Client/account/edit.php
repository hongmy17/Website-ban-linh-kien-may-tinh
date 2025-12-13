<div class="container my-5">
    <div class="card border-0 shadow-lg rounded-4 p-4">
        <form action="/account/update?id=<?= $user['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    <!-- Label bọc avatar -->
                    <label for="avatarInput"
                        class="position-relative d-inline-block cursor-pointer">

                        <div class="rounded-circle p-2 bg-light">
                            <img src="/upload/user/<?= $user['avatar'] ?>"
                                class="rounded-circle"
                                width="220"
                                height="220"
                                id="avatar"
                                style="object-fit: cover;">
                        </div>

                        <!-- Icon edit -->
                        <span class="position-absolute bottom-0 end-0
                                translate-middle
                                bg-warning text-white
                                rounded-circle
                                d-flex align-items-center justify-content-center"
                            style="width: 44px; height: 44px;">
                            <i class="bi bi-camera-fill fs-5"></i>
                        </span>
                    </label>

                    <!-- Input file ẩn -->
                    <input type="file"
                        id="avatarInput"
                        class="d-none"
                        name="avatar">

                    <p class="text-muted mt-3 mb-0">
                        Nhấn vào ảnh để đổi avatar
                    </p>
                </div>

                <!-- Form -->
                <div class="col-md-8">
                    <form>
                        <h3 class="fw-bold mb-2">Chỉnh sửa hồ sơ</h3>

                        <span class="badge rounded-pill bg-warning text-white px-3 py-2 mb-4">
                            <?= $user['is_admin'] ? 'Admin' : 'Khach hang' ?>
                        </span>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Họ và tên</label>
                            <input type="text" class="form-control form-control-lg"
                                value="<?= $user['name'] ?>" name="name">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control"
                                    value="<?= $user['email'] ?>" name="email">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Điện thoại</label>
                                <input type="text" class="form-control"
                                    value="<?= $user['phone'] ?>" name="phone">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Địa chỉ</label>
                            <input type="text" class="form-control"
                                value="<?= $user['address'] ?>" name="address">
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit"
                                class="btn btn-warning text-white px-4 py-2 rounded-pill">
                                <i class="bi bi-save me-1"></i> Lưu thay đổi
                            </button>

                            <a href="/account">
                                <button type="button"
                                    class="btn btn-light border px-4 py-2 rounded-pill">
                                    Hủy
                                </button>
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </form>
    </div>
</div>
<script src="/public/features/loadImageFromInput.js"></script>
<script>
  loadImageFromInput("input[name='avatar']", "#avatar");
</script>