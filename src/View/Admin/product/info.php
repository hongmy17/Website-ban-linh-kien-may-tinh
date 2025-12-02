<div class="container rounded" style="padding: 50px 0;">
  <div class="bg-white">
    <div class="row align-items-center account-form">
      <div class="col-md-6 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
          <img width="300px" id="avatar"
            src="/upload/product/<?= $product["base_image"]; ?>" />
        </div>
      </div>
      <div class="col-md-6 border-right">
        <div class="px-3 pe-lg-5 py-5">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Thông tin sản phẩm</h4>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Tên</label><input readonly type="text" class="form-control"
                placeholder="CPU Intel Core i5 14400F" value="<?= $product["name"]; ?>" name="name" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Mô tả</label>
              <textarea class="form-control" cols="30" rows="4" name="description">
                <?= $product["description"]; ?>
              </textarea>
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Giá</label><input readonly type="number" class="form-control"
                value="<?= $product["base_price"]; ?>" name="base_price" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Giảm giá</label><input readonly type="number" class="form-control"
                value="<?= $product["base_discount_price"]; ?>" name="base_discount_price" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Danh mục</label><input readonly type="text" class="form-control"
                value="<?= $category["name"]; ?>" name="categories" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="px-3 pe-lg-5 py-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="text-right">Biến thể sản phẩm</h4>
      <span class="badge bg-primary fs-6"><?= count($variants) ?> biến thể</span>
    </div>

    <!-- Danh sách biến thể -->
    <?php foreach ($variants as $i => $v): ?>
      <div class="border rounded p-4 mb-4 position-relative" 
          style="border: <?= $v['is_default'] ? '2px solid #28a745 !important' : '1px solid #ddd' ?>; 
                  background: <?= $v['is_default'] ? '#f8fff9' : '#fff' ?>;">

        <!-- Badge mặc định -->
        <?php if ($v['is_default']): ?>
          <span class="position-absolute top-0 end-0 badge bg-success" 
                style="transform: translateY(-50%); font-size: 0.8rem;">
            Mặc định
          </span>
        <?php endif; ?>

        <!-- Cấu hình -->
        <div class="row mt-3">
          <div class="col-md-12">
            <label class="labels fw-bold text-primary">Cấu hình</label>
            <div class="form-control" style="height: auto; background: #f9f9f9;">
              <strong class="text-danger">
                <?= htmlspecialchars($v['config_display'] ?? 'Chưa có cấu hình') ?>
              </strong>
            </div>
          </div>
        </div>

        <!-- SKU -->
        <div class="row mt-3">
          <div class="col-md-6">
            <label class="labels">SKU</label>
            <input type="text" class="form-control" 
                  name="variants[<?= $i ?>][sku_id]" 
                  value="<?= htmlspecialchars($v['sku_id']) ?>" required>
            <p class="field-message mb-0"></p>
          </div>

          <!-- Giá bán -->
          <div class="col-md-6">
            <label class="labels">Giá bán</label>
            <input type="number" class="form-control" 
                  name="variants[<?= $i ?>][price]" 
                  value="<?= $v['price'] ?>" required>
            <p class="field-message mb-0"></p>
          </div>
        </div>

        <!-- Giá giảm + Tồn kho -->
        <div class="row mt-3">
          <div class="col-md-6">
            <label class="labels">Giá giảm (khuyến mãi)</label>
            <input type="number" class="form-control" 
                  name="variants[<?= $i ?>][discount_price]" 
                  value="<?= $v['discount_price'] ?? '' ?>">
            <p class="field-message mb-0"></p>
          </div>

          <div class="col-md-6">
            <label class="labels">Tồn kho</label>
            <input type="number" class="form-control" min="0"
                  name="variants[<?= $i ?>][quantity]" 
                  value="<?= $v['quantity_in_stock'] ?>" required>
            <p class="field-message mb-0"></p>
          </div>
        </div>

        <!-- Nút hành động -->
        <div class="row mt-4">
          <div class="col-md-12 text-end">
            <?php if (!$v['is_default']): ?>
              <button type="button" class="btn btn-outline-success btn-sm me-2 set-default" 
                      data-id="<?= $v['id'] ?>">
                Đặt làm mặc định
              </button>
            <?php endif; ?>
            <button type="button" class="btn btn-outline-danger btn-sm remove-variant">
              Xóa biến thể
            </button>
          </div>
        </div>

        <!-- Hidden ID -->
        <input type="hidden" name="variants[<?= $i ?>][id]" value="<?= $v['id'] ?>">
      </div>
    <?php endforeach; ?>
  </div>

  </div>
</div>