<form action="/admin/product/update?id=<?= $product["id"]; ?>" method="post" class="container rounded" style="padding: 50px 0;">
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
              <label class="labels">Tên</label><input type="text" class="form-control"
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
              <label class="labels">Giá</label><input type="number" class="form-control"
                value="<?= $product["base_price"]; ?>" name="base_price" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Giảm giá</label><input type="number" class="form-control"
                value="<?= $product["base_discount_price"]; ?>" name="base_discount_price" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Danh mục</label>
              <select class="form-select" name="category_id" required>
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
          <div class="row mt-3">
            <div class="col-md-12 text-end">
              <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="px-3 pe-lg-5 py-5" id="variants">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="text-right">Biến thể sản phẩm</h4>

    <div class="d-flex align-items-center gap-2">
      <span class="badge btn btn-sm btn-<?= empty($variants) ? 'secondary' : 'primary' ?> fs-6">
        <?= count($variants) ?> biến thể
      </span>

      <button type="button" class="btn btn-success btn-sm add-variant-btn badge fs-6">
        Thêm biến thể
      </button>
    </div>
  </div>

  <?php if (empty($variants)): ?>
    <div class="alert alert-info">
      <i class="fa fa-info-circle"></i>
      Sản phẩm này <strong>chưa có biến thể</strong>.
    </div>
  <?php else: ?>
    <?php foreach ($variants as $i => $variant): ?>
      <form action="/admin/product/updateVariant?product_id=<?= $product["id"]; ?>&variant_id=<?= $variant["id"]; ?>" method="post" class="border rounded p-4 mb-4 position-relative variant-item"
        style="border: <?= $variant['is_default'] ? '2px solid #28a745 !important' : '1px solid #ddd' ?>;
                        background: <?= $variant['is_default'] ? '#f8fff9' : '#fff' ?>;">

        <!-- Badge mặc định -->
        <?php if ($variant['is_default']): ?>
          <span class="position-absolute top-0 end-0 badge bg-success"
            style="transform: translateY(-50%); font-size: 0.8rem;">
            Mặc định
          </span>
        <?php endif; ?>

        <!-- Option -->
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
          <!-- <div class="col-md-6">
            <label class="labels">Giá bán</label>
            <input type="number" class="form-control"
              name="variants[<?= $i ?>][price]"
              value="<?= $variant['price'] ?>" required>
          </div> -->
          <div class="col-md-6">
            <label class="labels">Giá bán</label>
            <input type="number" class="form-control"
              name="price"
              value="<?= $variant['price'] ?>" required>
          </div>
        </div>

        <!-- Giá giảm + Tồn kho -->
        <div class="row mt-3">
          <!-- <div class="col-md-6">
            <label class="labels">Giá giảm (khuyến mãi)</label>
            <input type="number" class="form-control"
              name="variants[<?= $i ?>][discount_price]"
              value="<?= $variant['discount_price'] ?? '' ?>">
          </div> -->
          <div class="col-md-6">
            <label class="labels">Giá giảm (khuyến mãi)</label>
            <input type="number" class="form-control"
              name="discount_price"
              value="<?= $variant['discount_price'] ?? '' ?>">
          </div>
          <!-- <div class="col-md-6">
            <label class="labels">Tồn kho</label>
            <input type="number" class="form-control" min="0"
              name="variants[<?= $i ?>][quantity]"
              value="<?= $variant['quantity_in_stock'] ?>" required>
          </div> -->
          <div class="col-md-6">
            <label class="labels">Tồn kho</label>
            <input type="number" class="form-control" min="0"
              name="quantity"
              value="<?= $variant['quantity_in_stock'] ?>" required>
          </div>
        </div>

        <!-- Nút hành động -->
        <div class="row mt-4">
          <div class="col-12 text-end">

            <!-- Nút Đặt làm mặc định (chỉ hiển thị nếu chưa phải mặc định) -->
            <?php if (!$variant['is_default']): ?>
              <button type="button" class="btn btn-outline-success btn-sm me-2 set-default"
                data-id="<?= $variant['id'] ?>">
                <i class="bi bi-check-circle"></i> Đặt làm mặc định
              </button>
            <?php endif; ?>

            <!-- Nút Xóa -->
            <button type="button" class="btn btn-outline-danger btn-sm remove-variant"
              data-id="<?= $variant['id'] ?>">
              <i class="bi bi-trash"></i> Xóa biến thể
            </button>

            <!-- Nút Lưu -->
            <button type="submit" class="btn btn-outline-primary btn-sm ms-2 save-variant"
              data-id="<?= $variant['id'] ?>">
              <i class="bi bi-save"></i> Lưu
            </button>
          </div>
        </div>

        <!-- Hidden fields -->
        <input type="hidden" name="variants[<?= $i ?>][id]" value="<?= $variant['id'] ?>">
      </form>
    <?php endforeach; ?>
  <?php endif; ?>
</div>

<script>
  // Chuyển dữ liệu PHP sang JS một cách an toàn (PHP thuần)
  const options = <?= json_encode($options, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
  const optionFullValues = <?= json_encode($optionFullValues, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;

  // Số biến thể hiện tại → dùng để đánh index cho các biến thể mới
  let variantIndex = <?= count($variants) ?>;

  document.addEventListener('DOMContentLoaded', function() {
    // Nút thêm biến thể
    const addBtn = document.querySelector('.add-variant-btn');
    if (addBtn) {
      addBtn.addEventListener('click', function(e) {
        e.preventDefault();
        addNewVariant();
        scrollToEnd();
      });
    }
  });

  function addNewVariant() {
    const container = document.querySelector('#variants');
    if (!container) return;

    const template = document.createElement('form');
    template.className = 'border rounded p-4 mb-4 position-relative variant-item';
    template.style.cssText = 'border: 1px solid #ddd; background: #fff;';
    template.setAttribute('method', 'POST');
    template.setAttribute('action', '/admin/product/storeVariant?product_id=<?= $product["id"]; ?>');

    let optionsHtml = '';
    options.forEach(opt => {
      const values = optionFullValues[opt.id] || [];
      let selectHtml = `<option value="">-- Chọn ${escapeHtml(opt.option_name)} --</option>`;
      values.forEach(val => {
        selectHtml += `<option value="${val.value_id}">${escapeHtml(val.value_name)}</option>`;
      });

      optionsHtml += `
            <div class="mb-3">
                <label class="form-label fw-semibold">${escapeHtml(opt.option_name)}</label>
                <select class="form-select variant-option-select"
                        name="variants[options][${opt.id}]"
                        data-option-id="${opt.id}" required>
                    ${selectHtml}
                </select>
                <div class="invalid-feedback">Vui lòng chọn ${escapeHtml(opt.option_name)}.</div>
            </div>`;
    });

    template.innerHTML = `
        <div class="row mt-3">
            <div class="col-12">
                <label class="labels fw-bold text-primary">Cấu hình biến thể</label>
                <div class="variant-options-row">${optionsHtml}</div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label class="labels">SKU</label>
                <input type="text" class="form-control" name="sku_id" required>
            </div>
            <div class="col-md-6">
            <label class="labels">Giá bán</label>
            <input type="number" class="form-control"
              name="price" required>
          </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
              <label class="labels">Giá giảm (khuyến mãi)</label>
              <input type="number" class="form-control"
                name="discount_price">
            </div>
            <div class="col-md-6">
              <label class="labels">Tồn kho</label>
              <input type="number" class="form-control" min="0"
                name="quantity" required>
            </div>
        </div>

        <div class="row mt-4">
          <div class="col-12 text-end">
            <button type="button" class="btn btn-outline-success btn-sm me-2 set-default">
              <i class="bi bi-check-circle"></i> Đặt làm mặc định
            </button>

            <button type="button" class="btn btn-outline-danger btn-sm remove-variant">
              <i class="bi bi-trash"></i> Xóa biến thể
            </button>

            <button type="submit" class="btn btn-outline-primary btn-sm ms-2 save-variant">
              <i class="bi bi-save"></i> Lưu
            </button>
          </div>
        </div>

        <input type="hidden" name="variants[${variantIndex}][id]" value="">
    `;

    // Chèn vào đúng chỗ
    const lastVariant = container.querySelector('.variant-item:last-of-type');
    if (lastVariant) {
      lastVariant.insertAdjacentElement('afterend', template);
    } else {
      const alert = container.querySelector('.alert.alert-info');
      if (alert) {
        alert.insertAdjacentElement('afterend', template);
        alert.remove();
      } else {
        container.appendChild(template);
      }
    }

    variantIndex++;
  }

  function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
  }

  function scrollToEnd() {
    window.scrollTo({
      top: document.body.scrollHeight,
      behavior: 'smooth'
    });
  }
</script>