<!-- Checkout Page Start -->
<div class="container-fluid bg-light overflow-hidden py-5">
    <div class="container py-5">
        <h1 class="mb-4 wow fadeInUp" data-wow-delay="0.1s">Chi tiết thanh toán</h1>
        <form action="/cart/pay?order_id=<?= $orderID; ?>" method="post">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="form-item">
                        <label class="form-label my-3">Họ và tên người nhận <sup>*</sup></label>
                        <input type="text" class="form-control" placeholder="Họ và tên người nhận" name="name">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Địa chỉ <sup>*</sup></label>
                        <input type="text" class="form-control" placeholder="Địa chỉ nhận hàng" name="address">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Số điện thoại<sup>*</sup></label>
                        <input type="tel" class="form-control" placeholder="0824123123" name="phone">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Địa chỉ Email<sup>*</sup></label>
                        <input type="email" class="form-control" placeholder="example@gmail.com" name="email">
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
                                        <!-- Cột sản phẩm -->
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
                                        <td class="text-center py-4 fw-bold"><?= $item['quantity'] ?></td>
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
                    <!-- <div class="row g-0 text-center align-items-center justify-content-center border-bottom py-2">
                        <div class="col-12">
                            <div class="form-check text-start my-2">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Transfer-1"
                                    name="Transfer" value="Transfer">
                                <label class="form-check-label" for="Transfer-1">Thanh toán bằng ví điện tử</label>
                            </div>
                            <p class="text-start text-dark">Vui lòng thanh toán trực tiếp vào tài khoản ngân hàng của
                                chúng tôi.
                                Vui lòng sử dụng Mã đơn hàng của bạn làm tham chiếu thanh toán.
                                Đơn hàng của bạn sẽ không được giao cho đến khi tiền được chuyển vào tài khoản của chúng
                                tôi.</p>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-2">
                        <div class="col-12">
                            <div class="form-check text-start my-2">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Payments-1"
                                    name="Payments" value="Payments">
                                <label class="form-check-label" for="Payments-1">Chuyển khoản</label>
                            </div>
                        </div>
                    </div> -->
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-2">
                        <div class="col-12">
                            <div class="form-check text-start my-2">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                                    name="Delivery" value="Delivery" required>
                                <label class="form-check-label" for="Delivery-1">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-2">
                        <div class="col-12">
                            <div class="form-check text-start my-2">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1"
                                    name="Paypal" value="Paypal">
                                <label class="form-check-label" for="Paypal-1">Paypal</label>
                            </div>
                        </div>
                    </div> -->
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="submit"
                            class="btn btn-primary border-secondary py-3 px-4 text-uppercase w-100 text-primary">Đặt
                            hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->