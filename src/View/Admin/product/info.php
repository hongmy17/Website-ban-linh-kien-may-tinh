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
              <label class="labels">Tồn kho</label><input readonly type="number" class="form-control"
                value="<?= $product["base_quantity_in_stock"]; ?>" name="stock" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Danh mục</label>
              <select class="form-select" required disabled>
                <option value="">-- Chọn danh mục --</option>
                <?php foreach ($categories as $category): ?>
                  <option value="<?= $category['id'] ?>"
                    <?= $product["category_id"] == $category['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <p class="field-message mb-0"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="px-3 pe-lg-5 py-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="text-right">Biến thể sản phẩm</h4>
    <span class="badge bg-<?= empty($variants) ? 'secondary' : 'primary' ?> fs-6">
      <?= count($variants) ?> biến thể
    </span>
  </div>

  <?php if (empty($variants)): ?>
    <div class="alert alert-info">
      <i class="fa fa-info-circle"></i>
      Sản phẩm này <strong>chưa có biến thể</strong>.
    </div>
  <?php else: ?>
    <?php foreach ($variants as $i => $variant): ?>
      <div class="border rounded p-4 mb-4 position-relative variant-item"
        style="border: <?= $variant['is_default'] ? '2px solid #28a745 !important' : '1px solid #ddd' ?>;
                        background: <?= $variant['is_default'] ? '#f8fff9' : '#fff' ?>;">

        <!-- Badge mặc định -->
        <?php if ($variant['is_default']): ?>
          <span class="position-absolute top-0 end-0 badge bg-success"
            style="transform: translateY(-50%); font-size: 0.8rem;">
            Mặc định
          </span>
        <?php endif; ?>

        <!-- Các select cho từng option -->
        <div class="mb-3">
          <label class="form-label fw-bold text-primary">Cấu hình biến thể</label>

          <?php
          $currentValues = $variant['values'];
          $displayParts = [];

          foreach ($options as $opt) {
            $optionId = $opt['id'];
            $selectedValueId = $currentValues[$optionId] ?? null;
            $selectedName = '—';

            if ($selectedValueId && isset($optionValues[$optionId])) {
              foreach ($optionValues[$optionId] as $val) {
                if ($val['value_id'] == $selectedValueId) {
                  $selectedName = $val['value_name'];
                  break;
                }
              }
            }

            $displayParts[] = htmlspecialchars($opt['option_name']) . ': ' . htmlspecialchars($selectedName);
          }

          $variantText = $displayParts ? implode(' / ', $displayParts) : 'Chưa có cấu hình';
          ?>

          <input type="text"
            class="form-control"
            value="<?= $variantText ?>"
            disabled>

          <?php foreach ($options as $opt): ?>
            <input type="hidden"
              name="variants[<?= $i ?>][options][<?= $opt['id'] ?>]"
              value="<?= $currentValues[$opt['id']] ?? '' ?>">
          <?php endforeach; ?>
        </div>

        <!-- SKU -->
        <div class="row mt-3">
          <div class="col-md-6">
            <label class="labels">SKU</label>
            <input type="text" class="form-control"
              name="variants[<?= $i ?>][sku_id]"
              value="<?= htmlspecialchars($variant['sku_id'] ?? '') ?>" required disabled>
          </div>
          <div class="col-md-6">
            <label class="labels">Giá bán</label>
            <input type="number" class="form-control"
              name="variants[<?= $i ?>][price]"
              value="<?= $variant['price'] ?>" required disabled>
          </div>
        </div>

        <!-- Giá giảm + Tồn kho -->
        <div class="row mt-3">
          <div class="col-md-6">
            <label class="labels">Giá giảm (khuyến mãi)</label>
            <input type="number" class="form-control"
              name="variants[<?= $i ?>][discount_price]"
              value="<?= $variant['discount_price'] ?? '' ?>" disabled>
          </div>
          <div class="col-md-6">
            <label class="labels">Tồn kho</label>
            <input type="number" class="form-control" min="0"
              name="variants[<?= $i ?>][quantity]"
              value="<?= $variant['quantity_in_stock'] ?>" required disabled>
          </div>
        </div>

        <!-- Hidden fields -->
        <input type="hidden" name="variants[<?= $i ?>][id]" value="<?= $variant['id'] ?>">
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>