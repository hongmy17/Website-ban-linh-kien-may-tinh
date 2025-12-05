<h4>Danh sách sản phẩm</h4>

<div class="mt-3">
  <div class="table-title border-bottom pb-3">
    <div class="row">
      <div class="col-sm-4">
        <form class="search-box" method="post" action="">
          <input type="text" class="form-control" name="search-box" placeholder="Tìm kiếm&hellip;"
            value="" />
        </form>
      </div>
      <div class="col-sm-8 text-sm-end text-center mt-sm-0 mt-3">
        <a href="/admin/product/add" class="btn btn-success me-lg-2">
          <i class="fas fa-plus-circle"></i> <span>Thêm sản phẩm</span>
        </a>
      </div>
    </div>
  </div>

  <form action="" method="post">
    <table class="table table-borderless table-responsive card-1">
      <thead>
        <tr class="border-bottom">
          <th>
            <span class="ml-1">STT</span>
          </th>
          <th>
            <span class="ml-2">Tên</span>
          </th>
          <th>
            <span class="ml-2">Giá</span>
          </th>
          <th>
            <span class="ml-2">Đã bán</span>
          </th>
          <th>
            <span class="ml-4">Hàng động</span>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $index => $product): ?>
        <tr class="border-bottom">
          <td>
            <div class="p-2"><?= $index + 1; ?></div>
          </td>
          <td>
            <div class="p-2 d-flex flex-row align-items-center mb-2">
              <img src="/upload/product/<?= $product["base_image"]; ?>" width="40"
                class="me-3" />
              <span class="font-weight-bold product-name"><?= $product['name']; ?></span>
            </div>
          </td>
          <td>
            <div class="p-2">
              <?php if ($product["base_discount_price"] > 0): ?>
                <span>
                  <?= number_format($product["base_discount_price"], 0, ','); ?>₫
                </span>
                <span class="text-muted text-decoration-line-through me-2" style="font-size: 14px;">
                  <?= number_format($product["base_price"], 0, ','); ?>₫
                </span>
              <?php else: ?>
                <span><?= number_format($product["base_price"], 0, ','); ?>₫</span>
              <?php endif; ?>
            </div>
          </td>
          <td>
            <div class="p-2">
              <?= $product["sold"]; ?>
            </div>
          </td>
          <td>
            <div class="p-2 icons">
              <a href="/admin/product/info?id=<?= $product["id"]; ?>"
                class="edit text-decoration-none">
                <i class="fas fa-info"></i>
              </a>
              <a href="/admin/product/edit?id=<?= $product["id"]; ?>"
                class="edit text-decoration-none">
                <i class="fas fa-pen text-warning mx-2"></i>
              </a>
              <a href="#"
                class="edit text-decoration-none">
                <i class="fa fa-trash text-danger"></i>
              </a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </form>
</div>