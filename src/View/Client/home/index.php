<!-- Carousel Start -->
<div class="container-fluid carousel bg-light px-0">
  <div class="row g-0 justify-content-end">
    <div class="col-12 col-lg-7 col-xl-9">
      <div class="header-carousel owl-carousel bg-light py-5">
        <div class="row g-0 header-carousel-item align-items-center">
          <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
            <img src="/public/assets/images/client//carousel-1.png" class="img-fluid w-100" alt="Image">
          </div>
          <div class="col-xl-6 carousel-content p-4">
            <h4 class="text-uppercase fw-bold mb-4 wow fadeInRight" data-wow-delay="0.1s"
              style="letter-spacing: 3px;">Tiết kiệm tới 400.000 VNĐ</h4>
            <h1 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s">Laptops & Máy tính để bàn
              hoặc điện thoại thông minh
            </h1>
            <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.7s"
              href="/product">Shop Now</a>
          </div>
        </div>
        <div class="row g-0 header-carousel-item align-items-center">
          <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
            <img src="/public/assets/images/client/carousel-2.png" class="img-fluid w-100" alt="Image">
          </div>
          <div class="col-xl-6 carousel-content p-4">
            <h4 class="text-uppercase fw-bold mb-4 wow fadeInRight" data-wow-delay="0.1s"
              style="letter-spacing: 3px;">Tiết kiệm tới 200.000 VNĐ</h4>
            <h1 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s">Laptops & Máy tính để bàn
              hoặc điện thoại thông minh</h1>
            <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.7s"
              href="/product">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-5 col-xl-3 wow fadeInRight" data-wow-delay="0.1s">
      <div class="carousel-header-banner h-100">
        <img src="/public/assets/images/client/image.png" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Image">
      </div>
    </div>
  </div>
</div>
<!-- Carousel End -->

<!-- Products Offer Start -->
<section class="double-offer-section py-5">
  <div class="container px-0">
    <div class="row">

      <!-- Banner trái -->
      <div class="col-12 col-lg-6">
        <a href="#" class="offer-item left">
          <img src="/public/assets/images/client/product-1.jpg" alt="PC Gaming Hiệu Suất Cao" class="offer-img">
        </a>
      </div>

      <!-- Banner phải -->
      <div class="col-12 col-lg-6">
        <a href="#" class="offer-item right">
          <img src="/public/assets/images/client/product-2.jpg" alt="PC AMD Gaming" class="offer-img">
        </a>
      </div>

    </div>
  </div>
</section>
<!-- Products Offer End -->

<!-- Our Products Start -->
<div class="container-fluid product py-5">
  <div class="container py-5">
    <div class="tab-class">
      <div class="row g-4">
        <div class="col-lg-4 text-start wow fadeInLeft" data-wow-delay="0.1s">
          <h1>Sản phẩm</h1>
        </div>
        <div class="col-lg-8 text-end wow fadeInRight" data-wow-delay="0.1s">
          <ul class="nav nav-pills d-inline-flex text-center mb-5">
            <li class="nav-item mb-4">
              <a class="d-flex mx-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill"
                href="#tab-1">
                <span class="text-dark" style="width: 130px;">Tất cả sản phẩm</span>
              </a>
            </li>
            <li class="nav-item mb-4">
              <a class="d-flex py-2 mx-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                <span class="text-dark" style="width: 130px;">Hàng mới</span>
              </a>
            </li>
            <li class="nav-item mb-4">
              <a class="d-flex mx-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                <span class="text-dark" style="width: 130px;">Nổi bật</span>
              </a>
            </li>
            <li class="nav-item mb-4">
              <a class="d-flex mx-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                <span class="text-dark" style="width: 130px;">Bán chạy nhất</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="tab-content">
        <div id="tab-1" class="tab-pane fade show p-0 active">
          <div class="row g-4">
            <?php foreach ($products as $product): ?>
              <div class="col-md-6 col-lg-4 col-xl-3">
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
                            <div class="product-meta-new">
                                <span class="meta-view"><i class="fas fa-eye"></i> <?= number_format($product["view"]) ?></span>
                                <span class="meta-sold"><i class="fas fa-shopping-cart"></i> <?= number_format($product["sold"]) ?></span>
                            </div>

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
          </div>
        </div>
        <div id="tab-2" class="tab-pane fade show p-0">
          <div class="row g-4">
            <?php foreach ($latestProducts as $latestProduct): ?>
              <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item-inner border rounded">
                        <div class="product-item-inner-item product-card">
                            <img src="/upload/product/<?= $latestProduct["base_image"]; ?>" class="img-fluid w-100 rounded-top" alt="">
                            <div class="product-new">Mới</div>
                            <div class="product-details">
                                <a href="/product/detail?id=<?= $latestProduct["id"]; ?>"><i class="fa fa-eye fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="text-center rounded-bottom p-4">
                            <div class="product-meta-new">
                                <span class="meta-view"><i class="fas fa-eye"></i> <?= number_format($latestProduct["view"]) ?></span>
                                <span class="meta-sold"><i class="fas fa-shopping-cart"></i> <?= number_format($latestProduct["sold"]) ?></span>
                            </div>

                            <a href="#" class="d-block mb-2"><?= $latestProduct["category_name"]; ?></a>
                            <a href="/product/detail?id=<?= $latestProduct["id"]; ?>" class="h5 product-name"><?= $latestProduct["name"]; ?></a>
                            
                            <?php if (!empty($latestProduct['base_discount_price']) && $latestProduct['base_discount_price'] > 0): ?>
                                <del class="me-2 fs-5">
                                    <?= number_format($latestProduct['base_price']) ?> VNĐ
                                </del>
                                <br>
                                <span class="text-primary fs-5">
                                    <?= number_format($latestProduct['base_discount_price']) ?> VNĐ
                                </span>
                            <?php else: ?>
                                <span class="text-primary fs-5">
                                    <?= number_format($latestProduct['base_price']) ?> VNĐ
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div id="tab-3" class="tab-pane fade show p-0">
          <div class="row g-4">
            <?php foreach ($popularProducts as $popularProduct): ?>
              <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item-inner border rounded">
                        <div class="product-item-inner-item product-card">
                            <img src="/upload/product/<?= $popularProduct["base_image"]; ?>" class="img-fluid w-100 rounded-top" alt="">
                            <div class="product-new">Mới</div>
                            <div class="product-details">
                                <a href="/product/detail?id=<?= $popularProduct["id"]; ?>"><i class="fa fa-eye fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="text-center rounded-bottom p-4">
                            <div class="product-meta-new">
                                <span class="meta-view"><i class="fas fa-eye"></i> <?= number_format($popularProduct["view"]) ?></span>
                                <span class="meta-sold"><i class="fas fa-shopping-cart"></i> <?= number_format($popularProduct["sold"]) ?></span>
                            </div>

                            <a href="#" class="d-block mb-2"><?= $popularProduct["category_name"]; ?></a>
                            <a href="/product/detail?id=<?= $popularProduct["id"]; ?>" class="h5 product-name"><?= $popularProduct["name"]; ?></a>
                            
                            <?php if (!empty($popularProduct['base_discount_price']) && $popularProduct['base_discount_price'] > 0): ?>
                                <del class="me-2 fs-5">
                                    <?= number_format($popularProduct['base_price']) ?> VNĐ
                                </del>
                                <br>
                                <span class="text-primary fs-5">
                                    <?= number_format($popularProduct['base_discount_price']) ?> VNĐ
                                </span>
                            <?php else: ?>
                                <span class="text-primary fs-5">
                                    <?= number_format($popularProduct['base_price']) ?> VNĐ
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div id="tab-4" class="tab-pane fade show p-0">
          <div class="row g-4">
            <?php foreach ($bestSellerProducts as $bestSellerProduct): ?>
              <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item-inner border rounded">
                        <div class="product-item-inner-item product-card">
                            <img src="/upload/product/<?= $bestSellerProduct["base_image"]; ?>" class="img-fluid w-100 rounded-top" alt="">
                            <div class="product-new">Mới</div>
                            <div class="product-details">
                                <a href="/product/detail?id=<?= $bestSellerProduct["id"]; ?>"><i class="fa fa-eye fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="text-center rounded-bottom p-4">
                            <div class="product-meta-new">
                                <span class="meta-view"><i class="fas fa-eye"></i> <?= number_format($bestSellerProduct["view"]) ?></span>
                                <span class="meta-sold"><i class="fas fa-shopping-cart"></i> <?= number_format($bestSellerProduct["sold"]) ?></span>
                            </div>

                            <a href="#" class="d-block mb-2"><?= $bestSellerProduct["category_name"]; ?></a>
                            <a href="/product/detail?id=<?= $bestSellerProduct["id"]; ?>" class="h5 product-name"><?= $bestSellerProduct["name"]; ?></a>
                            
                            <?php if (!empty($bestSellerProduct['base_discount_price']) && $bestSellerProduct['base_discount_price'] > 0): ?>
                                <del class="me-2 fs-5">
                                    <?= number_format($bestSellerProduct['base_price']) ?> VNĐ
                                </del>
                                <br>
                                <span class="text-primary fs-5">
                                    <?= number_format($bestSellerProduct['base_discount_price']) ?> VNĐ
                                </span>
                            <?php else: ?>
                                <span class="text-primary fs-5">
                                    <?= number_format($bestSellerProduct['base_price']) ?> VNĐ
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Our Products End -->

<!-- Product Banner Start -->
<div class="container-fluid py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
        <a href="#">
          <div class="bg-primary rounded position-relative">
            <img src="/public/assets/images/client//product-banner.jpg" class="img-fluid w-100 rounded" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4"
              style="background: rgba(255, 255, 255, 0.5);">
              <h3 class="display-5 text-primary">Bộ EOS Rebel <br> <span>T7i</span></h3>
              <p class="fs-4 text-muted">899.000 VNĐ</p>
              <a href="#" class="btn btn-primary rounded-pill align-self-start py-2 px-4">Mua ngay</a>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
        <a href="#">
          <div class="text-center bg-primary rounded position-relative">
            <img src="/public/assets/images/client//product-banner-2.jpg" class="img-fluid w-100" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4"
              style="background: rgba(242, 139, 0, 0.5);">
              <h2 class="display-2 text-secondary">SALE</h2>
              <h4 class="display-5 text-white mb-4">Giảm giá tới 50%</h4>
              <a href="#" class="btn btn-secondary rounded-pill align-self-center py-2 px-4">Mua ngay</a>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Product Banner End -->