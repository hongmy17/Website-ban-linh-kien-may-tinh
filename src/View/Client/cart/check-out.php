<!-- Checkout Page Start -->
<div class="container-fluid bg-light overflow-hidden py-5">
  <div class="container py-5">
    <h1 class="mb-4 wow fadeInUp" data-wow-delay="0.1s">Chi tiết thanh toán</h1>
    <form action="/cart/pay?order_id=<?= $orderID; ?>" method="post" class="needs-validation" novalidate>
      <div class="row g-5">
        <div class="col-md-12 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
          <!-- Họ và tên -->
          <div class="mb-4">
            <label class="form-label fw-semibold text-dark mb-2">Họ và tên người nhận <sup>*</sup></label>
            <div class="position-relative">
              <input type="text" name="name" class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light
                    <?= isset($_SESSION['checkout_errors']['name']) ? 'is-invalid' : '' ?>"
                placeholder="Họ và tên người nhận"
                value="<?= htmlspecialchars($_SESSION['checkout_old']['name'] ?? '') ?>"
                style="height: 58px; padding-left: 3.2rem;" required>
              <span class="position-absolute start-0 top-50 translate-middle-y ps-3 text-muted">
                <i class="bi bi-person fs-5"></i>
              </span>
              <?php if (isset($_SESSION['checkout_errors']['name'])): ?>
                <div class="invalid-feedback"><?= htmlspecialchars($_SESSION['checkout_errors']['name']) ?></div>
              <?php else: ?>
                <div class="invalid-feedback">Vui lòng nhập họ và tên người nhận!</div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Địa chỉ -->
          <div class="mb-4">
            <label class="form-label fw-semibold text-dark mb-2">Địa chỉ <sup>*</sup></label>
            <div class="position-relative">
              <input type="text" name="address" class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light
                    <?= isset($_SESSION['checkout_errors']['address']) ? 'is-invalid' : '' ?>"
                placeholder="Địa chỉ nhận hàng"
                value="<?= htmlspecialchars($_SESSION['checkout_old']['address'] ?? '') ?>"
                style="height: 58px; padding-left: 3.2rem;" required>
              <span class="position-absolute start-0 top-50 translate-middle-y ps-3 text-muted">
                <i class="bi bi-geo-alt fs-5"></i>
              </span>
              <?php if (isset($_SESSION['checkout_errors']['address'])): ?>
                <div class="invalid-feedback"><?= htmlspecialchars($_SESSION['checkout_errors']['address']) ?></div>
              <?php else: ?>
                <div class="invalid-feedback">Vui lòng nhập địa chỉ nhận hàng!</div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Số điện thoại -->
          <div class="mb-4">
            <label class="form-label fw-semibold text-dark mb-2">Số điện thoại <sup>*</sup></label>
            <div class="position-relative">
              <input type="tel" name="phone" class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light
                    <?= isset($_SESSION['checkout_errors']['phone']) ? 'is-invalid' : '' ?>" placeholder="0824123123"
                value="<?= htmlspecialchars($_SESSION['checkout_old']['phone'] ?? '') ?>"
                style="height: 58px; padding-left: 3.2rem;" required>
              <span class="position-absolute start-0 top-50 translate-middle-y ps-3 text-muted">
                <i class="bi bi-telephone fs-5"></i>
              </span>
              <?php if (isset($_SESSION['checkout_errors']['phone'])): ?>
                <div class="invalid-feedback"><?= htmlspecialchars($_SESSION['checkout_errors']['phone']) ?></div>
              <?php else: ?>
                <div class="invalid-feedback">Vui lòng nhập số điện thoại hợp lệ!</div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Email -->
          <div class="mb-4">
            <label class="form-label fw-semibold text-dark mb-2">Địa chỉ Email <sup>*</sup></label>
            <div class="position-relative">
              <input type="email" name="email" class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light
                    <?= isset($_SESSION['checkout_errors']['email']) ? 'is-invalid' : '' ?>"
                placeholder="example@gmail.com"
                value="<?= htmlspecialchars($_SESSION['checkout_old']['email'] ?? '') ?>"
                style="height: 58px; padding-left: 3.2rem;" required>
              <span class="position-absolute start-0 top-50 translate-middle-y ps-3 text-muted">
                <i class="bi bi-envelope fs-5"></i>
              </span>
              <?php if (isset($_SESSION['checkout_errors']['email'])): ?>
                <div class="invalid-feedback"><?= htmlspecialchars($_SESSION['checkout_errors']['email']) ?></div>
              <?php else: ?>
                <div class="invalid-feedback">Vui lòng nhập email hợp lệ!</div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="table-responsive">
            <table class="table align-middle">
              <thead class="table-light">
                <tr>
                  <th scope="col" class="text-start">Sản phẩm</th>
                  <th scope="col" class="text-center text-nowrap">Giá</th>
                  <th scope="col" class="text-center">SL</th>
                  <th scope="col" class="text-center text-nowrap">Tổng</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cartItems as $item):
                  $price = $item['discount_price'] ?? $item['price'];
                  $subtotal = $price * $item['quantity'];
                  ?>
                  <tr class="border-bottom">
                    <td class="text-start py-4">
                      <a href="/product/detail?id=<?= $item["product_id"]; ?>"
                        class="fw-bold product-name text-dark"><?= htmlspecialchars($item['product_name']) ?>
                      </a>

                      <?php if (!empty($item['config_display'])): ?>
                        <small class="text-muted d-block mt-1">
                          <?= htmlspecialchars(str_replace(' - ', ' • ', $item['config_display'])) ?>
                        </small>
                      <?php endif; ?>

                      <?php if (!empty($item['sku_id'])): ?>
                        <small class="text-muted">(Mã: <?= htmlspecialchars($item['sku_id']) ?>)</small>
                      <?php endif; ?>
                    </td>

                    <td class="text-center py-4 text-nowrap"><?= number_format($price) ?> ₫</td>
                    <td class="text-center py-4 fw-bold position-relative">
                      <?= $item['quantity'] ?>

                      <!-- Hiển thị tồn kho -->
                      <small class="text-muted d-block mt-1 text-nowrap">
                        Kho: <span class="stock-value"><?= $item['stock'] ?></span>
                      </small>

                      <!-- Input hidden gửi dữ liệu -->
                      <input type="hidden" value="<?= $item['quantity'] ?>"
                        name="quantities[<?= $item['product_id'] ?>][<?= $item['variant_id'] ?? 0 ?>]">

                      <input type="hidden" class="item-stock" value="<?= $item['stock'] ?>">

                      <!-- Div hiển thị lỗi nếu vượt tồn kho -->
                      <?php if (isset($_SESSION['checkout_errors']['stock'])): ?>
                        <div class="text-danger small mt-1 stock-error">
                          <i class="fas fa-exclamation-triangle"></i> <?= $_SESSION['checkout_errors']['stock']; ?>
                        </div>
                      <?php endif; ?>
                    </td>
                    <td class="text-center py-4 fw-bold text-primary text-nowrap">
                      <?= number_format($subtotal) ?> ₫
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr class="bg-light fw-bold">
                  <td colspan="3" class="text-end py-4 fs-5">Tổng cộng:</td>
                  <td class="text-center py-4 fs-5 text-primary text-nowrap">
                    <?= number_format($cartTotal) ?> ₫
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>

          <!-- Phần phương thức thanh toán -->
          <div class="mt-4 mb-5">
            <h5 class="fw-bold text-dark mb-4">Phương thức thanh toán</h5>

            <div class="border rounded-4 p-4 bg-white shadow-sm position-relative
              <?= isset($_SESSION['checkout_errors']['delivery']) ? 'is-invalid' : '' ?>">
              <div class="form-check">
                <input type="checkbox" class="form-check-input rounded" id="Delivery-1" name="delivery" value="Delivery"
                  style="width: 1.5rem; height: 1.5rem; border: 2px solid #FD7E14;" required>
                <label class="form-check-label fw-semibold text-dark ms-3" for="Delivery-1" style="font-size: 1.1rem;">
                  <i class="bi bi-truck text-primary me-2"></i>
                  Thanh toán khi nhận hàng (COD)
                </label>
              </div>

              <small class="text-muted ms-5 d-block mt-2">
                Quý khách kiểm tra hàng trước khi thanh toán cho shipper.
              </small>

              <!-- Chỉ hiển thị lỗi nếu thực sự có lỗi từ session -->
              <?php if (isset($_SESSION['checkout_errors']['delivery'])): ?>
                <div class="invalid-feedback d-block ms-5 mt-3">
                  <?= htmlspecialchars($_SESSION['checkout_errors']['delivery']) ?>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <div class="row g-4 text-center align-items-center justify-content-center pt-4">
            <button type="submit" class="btn btn-lg fw-bold rounded-3 text-white shadow-lg w-100"
              style="height: 58px; background: linear-gradient(90deg, #FD7E14 0%, #ff8f26 100%); border: none; font-size: 1.1rem;">
              Đặt hàng ngay
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Checkout Page End -->

<?php
unset($_SESSION['checkout_errors']);
unset($_SESSION['checkout_old']);
?>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('form.needs-validation');

    form.addEventListener('submit', function (event) {
      let hasError = false;
      const errorMessages = document.querySelectorAll('.stock-error');
      errorMessages.forEach(el => el.style.display = 'none'); // Reset lỗi cũ

      // Duyệt qua từng sản phẩm trong giỏ
      document.querySelectorAll('tbody tr').forEach(row => {
        const quantity = parseInt(row.querySelector('td:nth-child(3)').textContent.trim()); // SL hiện tại
        const stock = parseInt(row.querySelector('.item-stock').value);

        const errorEl = row.querySelector('.stock-error');

        if (quantity > stock) {
          hasError = true;
          if (errorEl) {
            errorEl.style.display = 'block';
          }
        }
      });

      if (hasError) {
        event.preventDefault();
        event.stopPropagation();

        // Cuộn lên sản phẩm đầu tiên bị lỗi
        const firstError = document.querySelector('.stock-error[style*="block"]');
        if (firstError) {
          firstError.closest('tr').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        // Hiển thị thông báo tổng quát
        alert('Một số sản phẩm đã vượt quá số lượng tồn kho. Vui lòng quay lại giỏ hàng để điều chỉnh!');

        return false;
      }

      // Nếu không có lỗi → cho submit bình thường
      form.classList.add('was-validated');
    });
  });
</script>