<div class="container py-5">
  <h2 class="mb-4 text-center text-primary fw-bold">Lịch sử đơn hàng</h2>
  <p class="text-center text-muted mb-5">
    Chào mừng quay lại, <strong><?= htmlspecialchars($_SESSION["user_name"] ?? '') ?></strong>!
  </p>

  <?php if (empty($orders)): ?>
    <div class="text-center py-5">
      <img src="/public/assets/images/client/empty-cart.png" alt="Chưa có đơn hàng" class="img-fluid mb-4"
        style="max-width: 280px;">
      <h4 class="text-muted">Chưa có đơn hàng nào!</h4>
      <a href="/product" class="btn btn-primary rounded-pill px-5 py-3 mt-3">Tiếp tục mua sắm</a>
    </div>
  <?php else: ?>
    <div class="row g-4">
      <?php foreach ($orders as $order): ?>
        <div class="col-12">
          <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
            <div class="card-header bg-light py-3">
              <div class="row align-items-center text-muted small">
                <div class="col-md-4">
                  <strong class="text-dark">Mã đơn hàng:</strong> #<?= $order['id'] ?>
                </div>
                <div class="col-md-4 text-md-center">
                  <strong class="text-dark">Ngày đặt:</strong>
                  <?= date('d/m/Y H:i', strtotime($order['created_at'])) ?>
                </div>
                <div class="col-md-4 text-md-end">
                  <span class="badge rounded-pill bg-success text-white px-3 py-2">
                    Đã thanh toán
                  </span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-lg-8">
                  <?php
                  $items = $orderItems[$order['id']] ?? [];
                  foreach ($items as $item):
                    ?>
                    <div class="d-flex align-items-center mb-3">
                      <img src="/upload/product/<?= htmlspecialchars($item['base_image']) ?>" class="rounded me-3"
                        style="width: 70px; height: 70px; object-fit: cover;">
                      <div>
                        <a href="/product/detail?id=<?= $item["product_id"]; ?>"
                          class="text-dark fw-semibold"><?= htmlspecialchars($item['product_name']) ?></a>
                        <?php if (!empty($item['config_display'])): ?>
                          <br>
                          <small class="text-muted"><?= htmlspecialchars($item['config_display']) ?></small>
                        <?php endif; ?>
                        <small class="text-muted d-block">Số lượng: <?= $item['quantity'] ?></small>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                  <h5 class="text-primary fw-bold mb-3">
                    <?= number_format($order['total'], 0, ',', '.') ?> ₫
                  </h5>
                  <a href="/cart/detail?id=<?= $order['id'] ?>" class="btn btn-outline-primary rounded-pill px-4">
                    Xem chi tiết
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>