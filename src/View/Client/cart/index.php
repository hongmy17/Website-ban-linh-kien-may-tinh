<div class="container-fluid py-5 py-5">
  <div class="container py-5">
    <h2 class="mb-4 text-center text-primary">Giỏ hàng của bạn</h2>

    <?php if (empty($cartItems)): ?>
      <div class="text-center py-5">
        <img src="/public/assets/images/client/empty-cart.png" alt="Giỏ hàng trống" class="img-fluid mb-4"
          style="max-width: 200px;">
        <h4>Giỏ hàng trống!</h4>
        <a href="/product" class="btn btn-primary rounded-pill px-5 py-3">Tiếp tục mua sắm</a>
      </div>
    <?php else: ?>
      <div class="table-responsive">
        <table class="table align-middle">
          <thead class="table-light">
            <tr>
              <th scope="col">Sản phẩm</th>
              <th scope="col">Giá</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Tổng</th>
              <th scope="col">Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cartItems as $item):
              $price = $item['discount_price'] ?? $item['price'];
              $subtotal = $price * $item['quantity'];
              ?>
              <form action="/cart/update?order_id=<?= $orderID; ?>&order_detail_id=<?= $item['order_detail_id'] ?>"
                method="post">
                <tr data-id="<?= $item['order_detail_id'] ?>">
                  <th scope="row">
                    <div class="d-flex align-items-center">
                      <img src="/upload/product/<?= htmlspecialchars($item['base_image']) ?>" class="img-fluid rounded"
                        style="width: 80px; height: 80px; object-fit: cover;"
                        alt="<?= htmlspecialchars($item['product_name']); ?>">
                      <div class="ms-3">
                        <a href="/product/detail?id=<?= $item["product_id"]; ?>"
                          class="h5 mb-1 product-name-sm"><?= htmlspecialchars($item['product_name']) ?></a>
                        <?php if (!empty($item['config_display'])): ?>
                          <small class="text-muted">
                            <?= nl2br(htmlspecialchars(str_replace(' - ', "\n", $item['config_display']))) ?>
                          </small>
                        <?php endif; ?>
                        <?php if ($item['sku_id']): ?>
                          <br><small class="text-muted">Mã:
                            <?= htmlspecialchars($item['sku_id']) ?></small>
                        <?php endif; ?>
                      </div>
                    </div>
                  </th>
                  <td>
                    <p class="mb-0 py-4 fw-bold">
                      <?= number_format($price) ?> ₫
                    </p>
                  </td>
                  <td>
                    <div class="quantity-wrapper text-center py-4">
                      <!-- Nút tăng/giảm và ô số lượng -->
                      <div class="input-group quantity mb-2" style="width: 120px; margin: 0 auto;">
                        <div class="input-group-btn">
                          <button class="btn btn-sm btn-minus rounded-circle bg-light border" type="button">
                            <i class="fa fa-minus"></i>
                          </button>
                        </div>
                        <input type="text" class="form-control form-control-sm text-center border-0 qty-input"
                          value="<?= $item['quantity'] ?>" name="quantity" readonly>
                        <div class="input-group-btn">
                          <button class="btn btn-sm btn-plus rounded-circle bg-light border" type="button">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>

                      <!-- Tồn kho hiển thị bên dưới -->
                      <small class="text-muted d-block">
                        Tồn kho: <span class="stock-value"><?= $item['stock'] ?></span>
                      </small>

                      <!-- Input hidden để gửi dữ liệu tồn kho (nếu cần) -->
                      <input type="hidden" name="stock" value="<?= $item['stock'] ?>">
                    </div>
                  </td>
                  <td>
                    <p class="mb-0 py-4 fw-bold text-primary">
                      <?= number_format($subtotal) ?> ₫
                    </p>
                  </td>
                  <td class="py-4">
                    <button type="submit" class="btn border btn-md px-3 me-2">
                      <i class="fas fa-save"></i>
                    </button>
                    <a href="/cart/delete?order_id=<?= $orderID; ?>&order_detail_id=<?= $item['order_detail_id'] ?>&product_id=<?= $item["product_id"] ?>&variant_id=<?= $item["variant_id"]; ?>"
                      class="btn border btn-md px-3" onclick="return confirm('Xóa sản phẩm này khỏi giỏ hàng?')">
                      <i class="fa fa-times"></i>
                    </a>
                  </td>
                </tr>
              </form>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Phần tổng tiền + hình minh họa (siêu đẹp, chuẩn shop lớn) -->
      <div class="row g-4 justify-content-between mt-5 align-items-start">
        <!-- Cột hình ảnh bên trái (chỉ hiện trên màn hình lớn) -->
        <div class="col-lg-6 col-xl-6 d-none d-lg-block">
          <div class="position-relative rounded-3 overflow-hidden shadow-lg">
            <img src="/public/assets/images/client/cart-image.png" alt="Giỏ hàng của bạn" class="img-fluid w-100"
              style="height: 540px; object-fit: cover; border-radius: 1rem;">
            <div class="position-absolute bottom-0 start-0 end-0 bg-gradient-dark p-4 text-white"
              style="background: linear-gradient(transparent, rgba(0,0,0,0.7)); border-radius: 0 0 1rem 1rem;">
              <h4 class="mb-0">
                <i class="fas fa-check-circle text-success me-2"></i>
                <?= $itemCount ?> sản phẩm đang chờ bạn!
              </h4>
              <p class="mb-0 small opacity-90 mt-1">Hoàn tất thanh toán để nhận ngay ưu đãi</p>
            </div>
          </div>
        </div>

        <!-- Cột tổng tiền bên phải -->
        <div class="col-lg-6 col-xl-6">
          <div class="bg-light rounded-3 shadow-sm p-4 p-md-5 border-start border-4 border-primary">
            <h3 class="mb-4 text-center text-primary fw-bold">
              <i class="fas fa-shopping-cart me-2"></i> Thông tin đơn hàng
            </h3>

            <div class="d-flex justify-content-between py-2 border-bottom">
              <span class="text-muted">Tổng tiền sản phẩm (<?= $itemCount ?> sp):</span>
              <strong class="fs-5"><?= number_format($cartTotal) ?> ₫</strong>
            </div>

            <div class="d-flex justify-content-between py-3 border-bottom">
              <span class="text-muted">
                <i class="fas fa-truck me-1"></i> Phí vận chuyển:
              </span>
              <strong class="text-success">30.000 ₫</strong>
            </div>

            <div class="d-flex justify-content-between align-items-center py-4 mb-4 bg-soft-primary rounded px-3">
              <h4 class="mb-0 fw-bold">Thành tiền:</h4>
              <h3 class="mb-0 text-primary fw-bold">
                <?= number_format($cartTotal + 30000) ?> ₫
              </h3>
            </div>

            <a href="/cart/check-out"
              class="btn btn-primary btn-lg rounded-pill w-100 py-3 text-uppercase shadow hover-lift position-relative overflow-hidden">
              <i class="fas fa-credit-card me-2"></i>
              Tiến hành thanh toán
              <span class="position-absolute top-50 end-3 translate-middle-y opacity-50">
                <i class="fas fa-arrow-right"></i>
              </span>
            </a>

            <div class="text-center mt-3">
              <small class="text-muted">
                <i class="fas fa-shield-alt text-success me-1"></i>
                Thanh toán an toàn • Hoàn tiền 111% nếu có lỗi • Giao hàng nhanh 2h nội thành
              </small>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Tăng số lượng
    document.querySelectorAll('.btn-plus').forEach(btn => {
      btn.onclick = function () {
        const wrapper = this.closest('.quantity-wrapper');
        const input = wrapper.querySelector('input[name="quantity"]');
        const stockSpan = wrapper.querySelector('.stock-value');
        const stock = parseInt(stockSpan.textContent);   // tồn kho hiện tại
        let current = parseInt(input.value);

        if (current < stock) {
          input.value = current + 1;
        } else {
          // Không cho tăng nữa → hiện tooltip nhỏ
          showStockAlert(wrapper);
        }
      };
    });

    // Giảm số lượng (không nhỏ hơn 1)
    document.querySelectorAll('.btn-minus').forEach(btn => {
      btn.onclick = function () {
        const input = this.closest('.quantity-wrapper').querySelector('input[name="quantity"]');
        let current = parseInt(input.value);

        if (current > 1) {
          input.value = current - 1;
        }
      };
    });

    // Hàm hiển thị thông báo “hết hàng” ngắn gọn (tự mất sau 2 giây)
    function showStockAlert(wrapper) {
      // Nếu đã có thông báo rồi thì không tạo thêm
      if (wrapper.querySelector('.stock-alert')) return;

      const alert = document.createElement('div');
      alert.className = 'stock-alert text-danger small mt-1';
      alert.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Số lượng vượt quá tồn kho!';
      alert.style.opacity = '0';
      alert.style.transition = 'opacity 0.3s';

      wrapper.appendChild(alert);

      // Hiển thị
      setTimeout(() => alert.style.opacity = '1', 10);

      // Tự mất sau 2 giây
      setTimeout(() => {
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 300);
      }, 2000);
    }
  });
</script>