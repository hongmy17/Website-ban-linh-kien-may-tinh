<!-- Thông tin đơn hàng -->
<div class="card shadow-sm border-0 mb-4">
  <div class="card-body p-4 p-lg-5">
    <div class="row g-5">
      <!-- Thông tin chung -->
      <div class="col-lg-6">
        <h5 class="fw-bold text-primary mb-4">
          <i class="bi bi-info-circle"></i>Thông tin chung
        </h5>

        <div class="row g-3">
          <div class="col-sm-4"><label class="form-label fw-medium text-muted">Trạng thái</label></div>
          <div class="col-sm-8">
            <span class="badge fs-6 px-3 py-2 <?= $order['is_paid'] ? 'bg-success' : 'bg-warning text-dark' ?>">
              <?= $order['is_paid'] ? 'Đã thanh toán' : 'Chưa thanh toán' ?>
            </span>
          </div>

          <div class="col-sm-4"><label class="form-label fw-medium text-muted">Khách hàng</label></div>
          <div class="col-sm-8"><span class="fw-semibold"><?= $buyer["name"]; ?></span></div>

          <div class="col-sm-4"><label class="form-label fw-medium text-muted">Ngày đặt hàng</label></div>
          <div class="col-sm-8"><span class="text-dark"><?= htmlspecialchars($order['updated_at']) ?></span></div>
        </div>
      </div>

      <!-- Thông tin người nhận -->
      <div class="col-lg-6">
        <h5 class="fw-bold text-primary mb-4">
          <i class="bi bi-truck"></i>Thông tin người nhận
        </h5>

        <div class="row g-3">
          <div class="col-sm-4"><label class="form-label fw-medium text-muted">Họ tên</label></div>
          <div class="col-sm-8"><span class="fw-semibold"><?= $order["receiver_name"]; ?></span></div>

          <div class="col-sm-4"><label class="form-label fw-medium text-muted">Số điện thoại</label></div>
          <div class="col-sm-8"><span class="fw-semibold"><?= $order["receiver_phone"]; ?></span></div>

          <div class="col-sm-4"><label class="form-label fw-medium text-muted">Địa chỉ</label></div>
          <div class="col-sm-8"><span class="text-dark"><?= htmlspecialchars($order['address']) ?></span></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Chi tiết đơn hàng - Bảng trái + Tổng tiền phải (trong 1 card duy nhất) -->
<div class="card shadow-sm border-0 overflow-hidden">
  <div class="card-header bg-white border-0 py-4">
    <h4 class="mb-0 fw-bold text-dark">
      Danh sách sản phẩm
    </h4>
  </div>

  <div class="card-body p-0">
    <div class="row g-0">
      <!-- CỘT TRÁI: Danh sách sản phẩm -->
      <div class="col-lg-8">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th class="ps-4" width="50">STT</th>
                <th class="ps-3">Sản phẩm</th>
                <th width="130" class="text-end pe-4">Đơn giá</th>
                <th width="90" class="text-center">SL</th>
                <th width="140" class="text-end pe-4">Thành tiền</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($orderItems as $index => $item): 
                $price = $item['discount_price'] ?? $item['price'];
                $subtotal = $price * $item['quantity'];
              ?>
                <tr>
                  <td class="ps-4 text-muted"><?= $index + 1 ?></td>
                  <td class="py-3">
                    <div class="d-flex align-items-center">
                      <img src="/upload/product/<?= htmlspecialchars($item['base_image']) ?>" 
                           width="64" height="64" 
                           class="rounded-3 me-3 object-fit-cover border" 
                           alt="<?= htmlspecialchars($item['product_name']) ?>">
                      <div>
                        <a href="/admin/product/info?id=<?= $item['product_id'] ?>" 
                           class="text-decoration-none text-dark fw-semibold mb-1 hover-text-primary product-name-2">
                          <?= htmlspecialchars($item['product_name']) ?>
                        </a>
                        <?php if (!empty($item['config_display'])): ?>
                          <small class="text-muted d-block">
                            <?= nl2br(htmlspecialchars(str_replace(' - ', "\n", $item['config_display']))) ?>
                          </small>
                        <?php endif; ?>
                        <?php if ($item['sku_id']): ?>
                          <small class="text-muted">Mã: <?= htmlspecialchars($item['sku_id']) ?></small>
                        <?php endif; ?>
                      </div>
                    </div>
                  </td>
                  <td class="text-end pe-4 text-secondary"><?= number_format($price) ?> ₫</td>
                  <td class="text-center fw-bold text-dark">x<?= $item['quantity'] ?></td>
                  <td class="text-end pe-4 fw-bold"><?= number_format($subtotal) ?> ₫</td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- CỘT PHẢI: Tổng tiền (cố định bên phải, đẹp lung linh) -->
      <div class="col-lg-4 bg-light border-start">
        <div class="p-4">
          <div class="bg-white rounded-4 shadow-sm p-4 h-100 d-flex flex-column justify-content-between">
            <?php 
              $subtotal = $order['subtotal'] ?? $order['total'];
              $discount = $order['discount'] ?? 0;
              $shipping = $order['shipping_fee'] ?? 0;
            ?>

            <div>
              <div class="d-flex justify-content-between mb-3 text-muted fw-medium">
                <span>Tạm tính</span>
                <span><?= number_format($subtotal) ?> ₫</span>
              </div>

              <?php if ($discount > 0): ?>
              <div class="d-flex justify-content-between mb-3">
                <span class="text-success">Giảm giá</span>
                <span class="text-success fw-bold">-<?= number_format($discount) ?> ₫</span>
              </div>
              <?php endif; ?>

              <div class="d-flex justify-content-between mb-3 text-muted fw-medium">
                <span>Phí vận chuyển</span>
                <span>30,000 ₫</span>
              </div>
            </div>

            <div>
              <hr class="my-4">

              <div class="d-flex justify-content-between align-items-end mb-4">
                <span class="fs-5 fw-bold text-dark">Tổng thanh toán</span>
                <span class="fs-4 fw-bold text-danger">
                  <?= number_format($order['total'] + 30000) ?> ₫
                </span>
              </div>

              <div class="text-center">
                <?php if ($order['is_paid']): ?>
                  <span class="badge bg-success fs-6 px-4 py-2 w-100">Đã thanh toán</span>
                <?php else: ?>
                  <span class="badge bg-danger text-white fs-6 px-4 py-2 w-100">Chưa thanh toán</span>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>