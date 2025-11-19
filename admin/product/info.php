<?php
$pageName = <<<HTML
<div class="container rounded" style="padding: 50px 0;">
  <div class="bg-white">
    <div class="row align-items-center account-form">
      <div class="col-md-6 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
          <img class="rounded-circle" width="300px" id="avatar"
            src="/public/assets/images/admin/default-product-image.png" />
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
                placeholder="CPU Intel Core i5 14400F" value="CPU Intel Core i5 14400F" name="name" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Mô tả</label>
              <textarea class="form-control" cols="30" rows="4" name="description">Intel Core i5-14400F đưa hiệu năng đa nhiệm lên một tầm cao mới với cấu hình ấn tượng</textarea>
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Giá</label><input readonly type="number" class="form-control"
                value="4590000" name="price" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Danh mục</label><input readonly type="text" class="form-control"
                value="CPU" name="categories" />
              <p class="field-message mb-0"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
HTML;

require_once __DIR__ . '/../index.php';
