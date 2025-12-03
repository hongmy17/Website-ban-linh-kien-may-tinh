<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Chi tiết sản phẩm</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="#">Trang</a></li>
        <li class="breadcrumb-item active text-white">Chi tiết sản phẩm</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Single Products Start -->
<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-5 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="input-group w-100 mx-auto d-flex mb-4">
                    <input type="search" class="form-control p-3" placeholder="Từ khóa"
                        aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
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
                    <div class="featured-product-item">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <img src="/public/assets/images/client/product-3.png" class="img-fluid rounded" alt="Image">
                        </div>
                        <div>
                            <h6 class="mb-2">điện thoại di động</h6>
                            <div class="d-flex mb-2">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="d-flex mb-2">
                                <h5 class="fw-bold me-2">200.000 VNĐ</h5>
                                <h5 class="text-danger text-decoration-line-through">400.000 VNĐ</h5>
                            </div>
                        </div>
                    </div>
                    <div class="featured-product-item">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <img src="/public/assets/images/client/product-4.png" class="img-fluid rounded" alt="Image">
                        </div>
                        <div>
                            <h6 class="mb-2">Camera thông minh</h6>
                            <div class="d-flex mb-2">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="d-flex mb-2">
                                <h5 class="fw-bold me-2">200.000 VNĐ</h5>
                                <h5 class="text-danger text-decoration-line-through">400.000 VNĐ</h5>
                            </div>
                        </div>
                    </div>
                    <div class="featured-product-item">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <img src="/public/assets/images/client/product-5.png" class="img-fluid rounded" alt="Image">
                        </div>
                        <div>
                            <h6 class="mb-2">Camera thông minh</h6>
                            <div class="d-flex mb-2">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="d-flex mb-2">
                                <h5 class="fw-bold me-2">200.000 VNĐ</h5>
                                <h5 class="text-danger text-decoration-line-through">400.000 VNĐ</h5>
                            </div>
                        </div>
                    </div>
                    <div class="featured-product-item">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <img src="/public/assets/images/client/product-6.png" class="img-fluid rounded" alt="Image">
                        </div>
                        <div>
                            <h6 class="mb-2">Camera thông minh</h6>
                            <div class="d-flex mb-2">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="d-flex mb-2">
                                <h5 class="fw-bold me-2">200.000 VNĐ</h5>
                                <h5 class="text-danger text-decoration-line-through">400.000 VNĐ</h5>
                            </div>
                        </div>
                    </div>
                    <div class="featured-product-item">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <img src="/public/assets/images/client/product-7.png" class="img-fluid rounded" alt="Image">
                        </div>
                        <div>
                            <h6 class="mb-2">Ống kính máy ảnh</h6>
                            <div class="d-flex mb-2">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="d-flex mb-2">
                                <h5 class="fw-bold me-2">200.000 VNĐ</h5>
                                <h5 class="text-danger text-decoration-line-through">400.000 VNĐ</h5>
                            </div>
                        </div>
                    </div>
                    <div class="featured-product-item">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <img src="/public/assets/images/client/product-8.png" class="img-fluid rounded" alt="Image">
                        </div>
                        <div>
                            <h6 class="mb-2">Camera thông minh</h6>
                            <div class="d-flex mb-2">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="d-flex mb-2">
                                <h5 class="fw-bold me-2">200.000 VNĐ</h5>
                                <h5 class="text-danger text-decoration-line-through">400.000 VNĐ</h5>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-4">
                        <a href="#" class="btn btn-primary px-4 py-3 rounded-pill w-100">Xem thêm</a>
                    </div>
                </div>
                <a href="#">
                    <div class="position-relative">
                        <img src="/public/assets/images/client/product-banner-2.jpg" class="img-fluid w-100 rounded" alt="Image">
                        <div class="text-center position-absolute d-flex flex-column align-items-center justify-content-center rounded p-4"
                            style="width: 100%; height: 100%; top: 0; right: 0; background: rgba(242, 139, 0, 0.3);">
                            <h5 class="display-6 text-primary">SALE</h5>
                            <h4 class="text-secondary">Giảm tới 50%</h4>
                            <a href="#" class="btn btn-primary rounded-pill px-4">Mua ngay</a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-7 col-xl-9 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 single-product">
                    <div class="col-xl-6">
                        <div class="single-carousel owl-carousel">
                            <div class="single-item"
                                data-dot="<img class='img-fluid' src='/upload/product/<?= $product["base_image"]; ?>' alt=''>">
                                <div class="single-inner bg-light rounded">
                                    <img src="/upload/product/<?= $product["base_image"]; ?>" class="img-fluid rounded" alt="Image">
                                </div>
                            </div>
                            <!-- <div class="single-item"
                                data-dot="<img class='img-fluid' src='/upload/product/<?= $product["base_image"]; ?>' alt=''>">
                                <div class="single-inner bg-light rounded">
                                    <img src="/upload/product/<?= $product["base_image"]; ?>" class="img-fluid rounded" alt="Image">
                                </div>
                            </div> -->
                            <!-- <div class="single-item"
                                data-dot="<img class='img-fluid' src='/public/assets/images/client/product-5.png' alt=''>">
                                <div class="single-inner bg-light rounded">
                                    <img src="/public/assets/images/client/product-5.png" class="img-fluid rounded" alt="Image">
                                </div>
                            </div>
                            <div class="single-item"
                                data-dot="<img class='img-fluid' src='/public/assets/images/client/product-6.png' alt=''>">
                                <div class="single-inner bg-light rounded">
                                    <img src="/public/assets/images/client/product-6.png" class="img-fluid rounded" alt="Image">
                                </div>
                            </div>
                            <div class="single-item"
                                data-dot="<img class='img-fluid' src='/public/assets/images/client/product-7.png' alt=''>">
                                <div class="single-inner bg-light rounded">
                                    <img src="/public/assets/images/client/product-7.png" class="img-fluid rounded" alt="Image">
                                </div>
                            </div>
                            <div class="single-item"
                                data-dot="<img class='img-fluid' src='/public/assets/images/client/product-3.png' alt=''>">
                                <div class="single-inner bg-light rounded">
                                    <img src="/public/assets/images/client/product-3.png" class="img-fluid rounded" alt="Image">
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <h4 class="fw-bold mb-3"><?= htmlspecialchars($product['name']) ?></h4>
                        <p class="mb-3">Thể loại: <?= htmlspecialchars($product['category_name']) ?></p>

                        <!-- ==================== PHẦN CHỌN BIẾN THỂ (THÊM MỚI) ==================== -->
                        <?php if (!empty($options)): ?>
                            <div class="variant-selector mb-4 p-3 border rounded bg-light">
                                <?php foreach ($options as $opt): ?>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold text-dark"><?= htmlspecialchars($opt['option_name']) ?></label>
                                        <select class="form-select variant-select" data-option-id="<?= $opt['id'] ?>">
                                            <option value="">-- Chọn <?= strtolower($opt['option_name']) ?> --</option>
                                            <?php foreach ($optionValues[$opt['id']] as $val): ?>
                                                <option value="<?= $val['value_id'] ?>">
                                                    <?= htmlspecialchars($val['value_name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <!-- ===================================================================== -->

                        <!-- GIÁ - SẼ TỰ ĐỘNG CẬP NHẬT -->
                        <div class="mb-3">
                            <span id="variant-price-new" class="fw-bold text-dark" style="font-size:22px;"></span>
                            <span id="variant-price-old" class="text-muted text-decoration-line-through me-2" style="font-size:18px;"></span>
                        </div>


                        <div class="d-flex flex-column mb-3">
                            <small>Mã sản phẩm: N/A</small>
                            <small>Có sẵn: <strong class="text-primary" id="variant-stock">0 tồn kho</strong></small>
                        </div>

                        <!-- SỐ LƯỢNG - GIỮ NGUYÊN CỦA BẠN -->
                        <div class="input-group quantity mb-5" style="width: 100px;">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm text-center border-0" value="1" id="quantity" readonly>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <!-- NÚT THÊM GIỎ HÀNG - GIỮ NGUYÊN GIAO DIỆN CỦA BẠN -->
                        <a href="#" id="add-to-cart"
                        class="btn btn-primary border border-secondary rounded-pill px-4 py-2 mb-4 text-white"
                        style="background:#0d6efd;" disabled>
                            <i class="fa fa-shopping-bag me-2"></i> Thêm vào giỏ hàng
                        </a>
                    </div>
                    
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button"
                                    role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Mô tả</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                    aria-controls="nav-mission" aria-selected="false">Đánh giá</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel"
                                aria-labelledby="nav-about-tab">
                                <?= $product["description"]; ?>
                            </div>

                            <div class="tab-pane" id="nav-mission" role="tabpanel"
                                aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="/public/assets/images/client/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Jason Smith</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition
                                            injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="/public/assets/images/client/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Sam Peters</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                            repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et
                                    tempor sit. Aliqu diam
                                    amet diam et eos labore. 3</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                                    labore.
                                    Clita erat ipsum et lorem et sit</p>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <h4 class="mb-5 fw-bold">Để lại phản hồi</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="text" class="form-control border-0 me-4" placeholder="Tên của bạn *">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="email" class="form-control border-0" placeholder="Email của bạn *">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                    <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                                        placeholder="Phản hồi của bạn *" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Xĩn hãy để lại đánh giá:</p>
                                        <div class="d-flex align-items-center" style="font-size: 12px;">
                                            <i class="fa fa-star text-muted"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <a href="#"
                                        class="btn btn-primary border border-secondary text-primary rounded-pill px-4 py-3">
                                        Gửi phản hồi</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Products End -->

<!-- Related Product Start -->
<div class="container-fluid related-product">
    <div class="container">
        <div class="mx-auto text-center pb-5" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp"
                data-wow-delay="0.1s">Sản phẩm liên quan</h4>
        </div>
        <div class="related-carousel owl-carousel pt-4">
            <?php foreach ($relatedProducts as $relatedProduct): ?>
                <div class="related-item rounded">
                    <div class="related-item-inner border rounded">
                        <div class="related-item-inner-item product-card">
                            <img src="/upload/product/<?= $relatedProduct["base_image"]; ?>" class="img-fluid w-100 rounded-top" alt="">
                            <div class="related-new">Mới</div>
                            <div class="related-details">
                                <a href="/product/detail?id=<?= $relatedProduct["id"]; ?>"><i class="fa fa-eye fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="text-center rounded-bottom p-4">
                            <a href="#" class="d-block mb-2"><?= $relatedProduct["category_name"]; ?></a>
                            <a href="/product/detail?id=<?= $relatedProduct["id"]; ?>" class="h4 product-name"><?= $relatedProduct["name"]; ?></a>
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
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Related Product End -->

<script>
// Dữ liệu variant từ PHP (đã có $variants từ Controller)
const variants = <?= json_encode($variants, JSON_UNESCAPED_UNICODE) ?>;

const priceEl  = document.getElementById('variant-price');
const stockEl  = document.getElementById('variant-stock');
const btnCart  = document.getElementById('add-to-cart');

function updateVariantInfo() {
    const selected = {};
    let allSelected = true;

    // Nếu không có select nào → coi như đã chọn đủ (dành cho sản phẩm không có biến thể)
    const selects = document.querySelectorAll('.variant-select');
    if (selects.length === 0) {
        allSelected = true;
    } else {
        selects.forEach(sel => {
            if (!sel.value) allSelected = false;
            selected[sel.dataset.optionId] = sel.value;
        });
    }

    const oldPriceEl = document.getElementById('variant-price-old');
    const newPriceEl = document.getElementById('variant-price-new');

    // TRƯỜNG HỢP 1: Sản phẩm KHÔNG có biến thể → dùng giá của sản phẩm chính
    if (variants.length === 0 || selects.length === 0) {
        const basePrice = <?= (float)$product['base_price'] ?>;
        const baseDiscount = <?= $product['base_discount_price'] && $product['base_discount_price'] > 0 ? (float)$product['base_discount_price'] : 'null' ?>;

        if (baseDiscount && baseDiscount < basePrice) {
            oldPriceEl.textContent = new Intl.NumberFormat('vi-VN').format(basePrice) + ' ₫';
            newPriceEl.textContent = new Intl.NumberFormat('vi-VN').format(baseDiscount) + ' ₫';
            newPriceEl.style.color = '#d70018';
        } else {
            oldPriceEl.textContent = '';
            newPriceEl.textContent = new Intl.NumberFormat('vi-VN').format(basePrice) + ' ₫';
            newPriceEl.style.color = '#d70018';
        }

        stockEl.innerHTML = '<strong class="text-primary">Có hàng</strong>';
        btnCart.disabled = false;
        btnCart.dataset.variantId = <?= $product['id'] ?>; // dùng product_id làm variant_id
        return;
    }

    // TRƯỜNG HỢP 2: Có biến thể → xử lý như cũ
    if (!allSelected) {
        oldPriceEl.textContent = '';
        newPriceEl.textContent = 'Vui lòng chọn cấu hình';
        newPriceEl.style.color = '#666';
        stockEl.innerHTML = '<strong class="text-warning">Chưa chọn</strong>';
        btnCart.disabled = true;
        return;
    }

    const found = variants.find(v => 
        Object.keys(selected).every(key => v.values[key] == selected[key])
    );

    if (found) {
        if (found.discount_price && found.discount_price < found.price) {
            oldPriceEl.textContent = new Intl.NumberFormat('vi-VN').format(found.price) + ' ₫';
            newPriceEl.textContent = new Intl.NumberFormat('vi-VN').format(found.discount_price) + ' ₫';
            newPriceEl.style.color = '#d70018';
        } else {
            oldPriceEl.textContent = '';
            newPriceEl.textContent = new Intl.NumberFormat('vi-VN').format(found.price) + ' ₫';
            newPriceEl.style.color = '#d70018';
        }

        if (found.stock > 0) {
            stockEl.innerHTML = `<strong class="text-primary">${found.stock} tồn kho</strong>`;
            btnCart.disabled = false;
            btnCart.dataset.variantId = found.id;
        } else {
            stockEl.innerHTML = '<strong class="text-danger">Hết hàng</strong>';
            btnCart.disabled = true;
        }
    } else {
        oldPriceEl.textContent = '';
        newPriceEl.textContent = 'Không có cấu hình này';
        newPriceEl.style.color = '#666';
        stockEl.innerHTML = '<strong class="text-danger">Hết hàng</strong>';
        btnCart.disabled = true;
    }
}

// Sự kiện khi thay đổi select
document.querySelectorAll('.variant-select').forEach(el => {
    el.addEventListener('change', updateVariantInfo);
});

// Load lần đầu: chọn biến thể mặc định (nếu có)
document.addEventListener('DOMContentLoaded', () => {
    const defaultVariant = variants.find(v => v.default === true);
    if (defaultVariant) {
        Object.entries(defaultVariant.values).forEach(([optId, valId]) => {
            const select = document.querySelector(`.variant-select[data-option-id="${optId}"]`);
            if (select) select.value = valId;
        });
    }
    updateVariantInfo();
});

// Tăng giảm số lượng
document.querySelector('.btn-minus').addEventListener('click', () => {
    let qty = parseInt(document.getElementById('quantity').value);
    if (qty > 1) document.getElementById('quantity').value = qty - 1;
});
document.querySelector('.btn-plus').addEventListener('click', () => {
    document.getElementById('quantity').value = parseInt(document.getElementById('quantity').value) + 1;
});
</script>