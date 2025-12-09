<div class="container rounded" style="padding: 50px 0;">
  <div class="bg-white">
    <form action="/admin/product/store" method="post" class="row align-items-center edit-form"
      enctype="multipart/form-data">
      <div class="col-md-6 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
          <img width="300px" id="base_image"
            src="/upload/product/default-product-image.png" />
          <input type="file" style="width: 200px;" class="mt-4" name="base_image" />
        </div>
      </div>
      <div class="col-md-6 border-right">
        <div class="px-3 pe-lg-5 py-5">
          <div class="d-flex justerrory-content-between align-items-center mb-3">
            <h4 class="text-right">Thêm sản phẩm</h4>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Tên</label><input type="text" class="form-control" placeholder="CPU Intel Core i5 14400F"
                name="name" value="" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Mô tả</label>
              <textarea class="form-control" cols="30" rows="4" name="description" placeholder="Mô tả">Intel Core i5-14400F đưa hiệu năng đa nhiệm lên một tầm cao mới với cấu hình ấn tượng</textarea>
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Giá</label><input type="number" class="form-control" name="base_price"
                placeholder="VD: 100000" value="" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Giảm giá</label><input type="number" class="form-control"
                value="<?= $product["base_discount_price"]; ?>" name="base_discount_price" placeholder="VD: 90000" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Danh mục</label>
              <select type="text" class="form-control" name="category_id">
                <option value="">Chọn danh mục</option>
                <?php foreach ($categories as $category): ?>
                  <option value="<?= $category["id"]; ?>"><?= $category["name"]; ?></option>
                <?php endforeach; ?>
              </select>
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Thuộc tính sản phẩm</label>
              <small class="text-muted d-block mb-2">Chọn các thuộc tính áp dụng cho sản phẩm này</small>

              <div class="row">
                <?php foreach ($fullOptions as $option): ?>
                  <div class="col-md-4 col-lg-3 mb-3">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        name="options[]"
                        value="<?= $option['id'] ?>"
                        id="option_<?= $option['id'] ?>">
                      <label class="form-check-label" for="option_<?= $option['id'] ?>">
                        <?= htmlspecialchars($option['name']) ?>
                      </label>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>

              <p class="field-message text-danger mt-2"></p>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary profile-button" style="background-color: #333">Thêm</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="/public/features/loadImageFromInput.js"></script>
<script>
  loadImageFromInput("input[name='base_image']", "#base_image");
</script>