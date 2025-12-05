<h4>Danh sách đơn hàng</h4>

<div>
  <table class="table table-borderless table-responsive card-1">
    <thead>
      <tr class="border-bottom">
        <th>
          <span class="ml-1">STT</span>
        </th>
        <th>
          <span class="ml-2">Người mua</span>
        </th>
        <th>
          <span class="ml-2">Tổng tiền</span>
        </th>
        <th>
          <span class="ml-2">Trạng thái</span>
        </th>
        <th>
          <span class="ml-4">Hàng động</span>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $index => $order): ?>
        <tr class="border-bottom">
          <td>
            <div class="p-2"><?= $index + 1; ?></div>
          </td>
          <td>
            <a href="/admin/user/info?id=<?= $order["user_id"]; ?>"
              class="p-2 d-flex flex-row align-items-center mb-2 text-decoration-none text-reset">
              <img src="/upload/user/<?= $order["avatar"]; ?>" width="40"
                class="me-3 rounded-circle" />
              <div class="d-flex flex-column ml-2">
                <span class="d-block font-weight-bold"><?= $order["user_name"]; ?></span>
                <small class="text-muted"><?= $order["email"]; ?></small>
              </div>
            </a>
          </td>
          <td>
            <div class="p-2">
              <?= number_format($order["total"], 0, ',') ?>₫
            </div>
          </td>
          <td>
            <div class="p-2">
              <?= $order["is_paid"] ? "Đã thanh toán" : "Chưa thanh toán"; ?>
            </div>
          </td>
          <td>
            <div class="p-2 icons">
              <a href="/admin/order/detail?id=<?= $order["id"]; ?>" class="edit text-decoration-none mx-3">
                <i class="fas fa-info"></i>
              </a>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>
</div>