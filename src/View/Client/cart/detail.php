<div class="container py-5">
  <div class="row g-5">

    <!-- CỘT TRÁI -->
    <div class="col-lg-8">

      <!-- THÔNG TIN ĐƠN HÀNG -->
      <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-4">
        <div class="card-header bg-primary text-white py-4">
          <h4 class="mb-0">
            <i class="fas fa-receipt me-2"></i>
            Chi tiết đơn hàng #<?= $order['id'] ?>
          </h4>
        </div>

        <div class="card-body p-4 p-md-5">
          <div class="row mb-4">
            <div class="col-sm-6 mb-3">
              <small class="text-muted">Ngày đặt hàng</small>
              <p class="fw-semibold mb-0">
                <?= date('d/m/Y - H:i', strtotime($order['created_at'])) ?>
              </p>
            </div>

            <div class="col-sm-6 mb-3 text-sm-end">
              <small class="text-muted">Trạng thái đơn hàng</small>
              <p class="mb-0">
                <span class="badge rounded-pill bg-success px-3 py-2 fs-6">
                  Đã thanh toán
                </span>
              </p>
            </div>
          </div>

          <hr class="my-4">

          <!-- TIMELINE (TẠM CỐ ĐỊNH) -->
          <div class="timeline mb-4">
            <div class="d-flex align-items-center mb-3">
              <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                style="width:40px;height:40px">
                <i class="fas fa-check"></i>
              </div>
              <div class="ms-3">
                <p class="fw-semibold mb-0">Đã xác nhận</p>
              </div>
            </div>

            <div class="d-flex align-items-center mb-3">
              <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center"
                style="width:40px;height:40px">
                <i class="fas fa-truck"></i>
              </div>
              <div class="ms-3">
                <p class="fw-semibold mb-0">Đang giao hàng</p>
              </div>
            </div>

            <div class="d-flex align-items-center">
              <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center"
                style="width:40px;height:40px">
                <i class="fas fa-home"></i>
              </div>
              <div class="ms-3">
                <p class="text-muted mb-0">Giao hàng thành công</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- DANH SÁCH SẢN PHẨM -->
      <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-light py-3">
          <h5 class="mb-0">
            <i class="fas fa-box-open me-2"></i>
            Sản phẩm đã đặt (<?= count($items) ?> sản phẩm)
          </h5>
        </div>

        <div class="card-body p-0">
          <?php foreach ($items as $item): ?>
            <div class="p-4 border-bottom">
              <div class="row align-items-center">

                <div class="col-md-2">
                  <img src="/upload/product/<?= $item['base_image'] ?>" class="img-fluid rounded"
                    style="height:100px;object-fit:cover">
                </div>

                <div class="col-md-7">
                  <h6 class="fw-semibold mb-1">
                    <?= $item['product_name'] ?>
                  </h6>

                  <?php if (!empty($item['config_display'])): ?>
                    <small class="text-muted">
                      <?= $item['config_display'] ?>
                    </small>
                  <?php endif; ?>
                </div>

                <div class="col-md-3 text-md-end">
                  <p class="fw-bold mb-1">
                    <?= number_format($item['price'], 0, ',', '.') ?> ₫
                  </p>
                  <small class="text-muted">x<?= $item['quantity'] ?></small>
                </div>

              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- CỘT PHẢI -->
    <div class="col-lg-4">

      <!-- GIAO HÀNG -->
      <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-header bg-light py-3">
          <h5 class="mb-0">
            <i class="fas fa-shipping-fast me-2"></i>
            Thông tin giao hàng
          </h5>
        </div>

        <div class="card-body">
          <p><strong>Người nhận:</strong> <?= $order['receiver_name'] ?></p>
          <p><strong>Số điện thoại:</strong> <?= $order['receiver_phone'] ?></p>
          <p><strong>Địa chỉ:</strong> <?= $order['address'] ?></p>
          <p class="mb-0"><strong>Phương thức:</strong> Giao hàng nhanh</p>
        </div>
      </div>

      <!-- THANH TOÁN -->
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-light py-3">
          <h5 class="mb-0">
            <i class="fas fa-credit-card me-2"></i>
            Tóm tắt thanh toán
          </h5>
        </div>

        <div class="card-body">
          <div class="d-flex justify-content-between mb-2">
            <span>Tạm tính:</span>
            <span><?= number_format($order['total'], 0, ',', '.') ?> ₫</span>
          </div>

          <div class="d-flex justify-content-between mb-2">
            <span>Phí vận chuyển:</span>
            <span class="text-success">30.000 ₫</span>
          </div>

          <hr>

          <div class="d-flex justify-content-between fw-bold fs-5">
            <span>Tổng cộng:</span>
            <span class="text-primary">
              <?= number_format($order['total'] + 30000, 0, ',', '.') ?> ₫
            </span>
          </div>

          <div class="mt-4">
            <p class="small text-muted mb-2">Phương thức thanh toán</p>
            <p class="fw-semibold">
              <i class="fas fa-money-bill-wave text-success me-2"></i>
              Thanh toán khi nhận hàng (COD)
            </p>
          </div>

          <div class="mt-4">
            <a href="#" class="btn btn-outline-primary w-100 rounded-pill mb-2">
              <i class="fas fa-map-marker-alt me-2"></i>
              Theo dõi đơn hàng
            </a>

            <a href="/contact" class="btn btn-link w-100 text-muted small">
              Liên hệ hỗ trợ
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- BACK -->
  <div class="text-center mt-5">
    <a href="/cart/history" class="btn btn-outline-secondary rounded-pill px-5">
      <i class="fas fa-arrow-left me-2"></i>
      Quay lại danh sách đơn hàng
    </a>
  </div>
</div>