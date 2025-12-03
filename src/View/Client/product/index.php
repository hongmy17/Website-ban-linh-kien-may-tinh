<!-- Searvices Start -->
<div class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-6 col-md-4 col-lg-2 border-start border-end wow fadeInUp" data-wow-delay="0.1s">
            <div class="p-4">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-sync-alt fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Hoàn trả miễn phí</h6>
                        <p class="mb-0">Đảm bảo hoàn tiền trong 30 ngày!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.2s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fab fa-telegram-plane fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Miễn phí giao hàng</h6>
                        <p class="mb-0">Miễn phí vận chuyển cho tất cả các đơn hàng</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.3s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-life-ring fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Hỗ trợ 24/7</h6>
                        <p class="mb-0">Chúng tôi hỗ trợ trực tuyến 24 giờ một ngày</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.4s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-credit-card fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Nhận thẻ quà tặng</h6>
                        <p class="mb-0">Nhận quà tặng trên đơn hàng 50.000 VNĐ</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.5s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-lock fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Thanh toán an toàn</h6>
                        <p class="mb-0">Chúng tôi coi trọng sự an toàn của bạn</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.6s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-blog fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Dịch vụ trực tuyến</h6>
                        <p class="mb-0">Sản phẩm được trả lại miễn phí trong 30 ngày</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Searvices End -->

<!-- Shop Page Start -->
<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-categories mb-4">
                    <h4>Danh mục sản phẩm</h4>
                    <ul class="list-unstyled">
                        <?php 
                            foreach ($categoriesWithCount as $category): 
                                if ($category["product_count"] > 0):
                        ?>
                            <li>
                                <div class="categories-item">
                                    <a href="#" class="text-dark">
                                        <i class="fas fa-apple-alt text-secondary me-2"></i>
                                        <?= $category["name"]; ?>
                                    </a>
                                    <span>(<?= $category["product_count"]; ?>)</span>
                                </div>
                            </li>
                        <?php 
                                endif;
                            endforeach; 
                        ?>
                    </ul>
                </div>
                <div class="featured-product mb-4">
                    <h4 class="mb-3">Sản phẩm nổi bật</h4>
                    <?php foreach ($popularProducts as $popularProduct): ?>
                        <a href="/product/detail?id=<?= $popularProduct["id"]; ?>" class="featured-product-item">
                            <div class="rounded me-4 product-card-sm" style="width: 100px; height: 100px;">
                                <img src="/upload/product/<?= $popularProduct["base_image"]; ?>" class="img-fluid rounded" alt="Image">
                            </div>
                            <div>
                                <h6 class="mb-2 product-name-sm"><?= $popularProduct["name"]; ?></h6>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">
                                        <?php 
                                            $price = !empty($popularProduct["base_discount_price"]) && $popularProduct["base_discount_price"] > 0
                                                ? $popularProduct["base_discount_price"]
                                                : $popularProduct["base_price"];
                                            echo number_format($price, 0, ','); 
                                        ?> VNĐ
                                    </h5>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 pb-4">
                    <div class="col-xl-8">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="Từ khóa"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i
                                    class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-4 text-end">
                        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between">
                            <label for="electronics">Sắp xếp:</label>
                            <select id="electronics" name="electronicslist"
                                class="border-0 form-select-sm bg-light me-3" form="electronicsform">
                                <option value="volvo">Mặc định</option>
                                <option value="volv">Không có</option>
                                <option value="sab">Mới mẻ</option>
                                <option value="saab">Đánh giá trung bình</option>
                                <option value="opel">Thấp đến cao</option>
                                <option value="audio">Cao đến thấp</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-5" class="tab-pane fade show p-0 active">
                        <div class="row g-4 product">

                            <?php foreach ($products as $product): ?>
                                <div class="col-lg-4">
                                    <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="product-item-inner border rounded">
                                            <div class="product-item-inner-item product-card">
                                                <img src="/upload/product/<?= $product["base_image"]; ?>" class="img-fluid w-100 rounded-top" alt="">
                                                <div class="product-new">Mới</div>
                                                <div class="product-details">
                                                    <a href="/product/detail?id=<?= $product["id"]; ?>"><i class="fa fa-eye fa-1x"></i></a>
                                                </div>
                                            </div>
                                            <div class="text-center rounded-bottom p-4">
                                                <p class="text-muted mb-2">
                                                    <i class="fa fa-eye me-1"></i>
                                                    <?= $product["view"] ?>
                                                </p>
                                                <a href="#" class="d-block mb-2"><?= $product["category_name"]; ?></a>
                                                <a href="/product/detail?id=<?= $product["id"]; ?>" class="h5 product-name"><?= $product["name"]; ?></a>
                                                
                                                <?php if (!empty($product['base_discount_price']) && $product['base_discount_price'] > 0): ?>
                                                    <del class="me-2 fs-5">
                                                        <?= number_format($product['base_price']) ?> VNĐ
                                                    </del>
                                                    <br>
                                                    <span class="text-primary fs-5">
                                                        <?= number_format($product['base_discount_price']) ?> VNĐ
                                                    </span>
                                                <?php else: ?>
                                                    <span class="text-primary fs-5">
                                                        <?= number_format($product['base_price']) ?> VNĐ
                                                    </span>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    <a href="#" class="rounded">&laquo;</a>
                                    <a href="#" class="active rounded">1</a>
                                    <a href="#" class="rounded">2</a>
                                    <a href="#" class="rounded">3</a>
                                    <a href="#" class="rounded">4</a>
                                    <a href="#" class="rounded">5</a>
                                    <a href="#" class="rounded">6</a>
                                    <a href="#" class="rounded">&raquo;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Page End -->
 