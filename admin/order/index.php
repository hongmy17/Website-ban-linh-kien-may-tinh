<?php
$pageName = <<<HTML
<h4>Danh sách đơn hàng</h4>

<div>
  <table class="table table-borderless table-responsive card-1">
    <thead>
      <tr class="border-bottom">
        <th>
          <span class="ml-1">
            <input class="form-check-input" type="checkbox" id="checkbox-all" />
          </span>
        </th>
        <th>
          <span class="ml-1">STT</span>
        </th>
        <th>
          <span class="ml-2">Người mua</span>
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
      <tr class="border-bottom">
        <td>
          <div class="p-2 ps-0">
            <input class="form-check-input" type="checkbox" name="id[]" value="" />
          </div>
        </td>
        <td>
          <div class="p-2">1</div>
        </td>
        <td>
          <a href="#"
            class="p-2 d-flex flex-row align-items-center mb-2 text-decoration-none text-reset">
            <img src="/public/assets/images/admin/default-user-image.webp" width="40"
              class="me-3 rounded-circle" />
            <div class="d-flex flex-column ml-2">
              <span class="d-block font-weight-bold">Nguyễn Đặng Hồng Mỹ</span>
              <small class="text-muted">example@gmail.com</small>
            </div>
          </a>
        </td>
        <td>
          <div class="p-2">
            <span class="status text-success">&bull;</span> Đã thanh toán
          </div>
        </td>
        <td>
          <div class="p-2 icons">
            <a href="#" class="edit text-decoration-none mx-3">
              <i class="fas fa-info"></i>
            </a>
          </div>
        </td>
      </tr>
      <tr class="border-bottom">
        <td>
          <div class="p-2 ps-0">
            <input class="form-check-input" type="checkbox" name="id[]" value="" />
          </div>
        </td>
        <td>
          <div class="p-2">1</div>
        </td>
        <td>
          <a href="#"
            class="p-2 d-flex flex-row align-items-center mb-2 text-decoration-none text-reset">
            <img src="/public/assets/images/admin/default-user-image.webp" width="40"
              class="me-3 rounded-circle" />
            <div class="d-flex flex-column ml-2">
              <span class="d-block font-weight-bold">Nguyễn Đặng Hồng Mỹ</span>
              <small class="text-muted">example@gmail.com</small>
            </div>
          </a>
        </td>
        <td>
          <div class="p-2">
            <span class="status text-success">&bull;</span> Đã thanh toán
          </div>
        </td>
        <td>
          <div class="p-2 icons">
            <a href="#" class="edit text-decoration-none mx-3">
              <i class="fas fa-info"></i>
            </a>
          </div>
        </td>
      </tr>
      <tr class="border-bottom">
        <td>
          <div class="p-2 ps-0">
            <input class="form-check-input" type="checkbox" name="id[]" value="" />
          </div>
        </td>
        <td>
          <div class="p-2">1</div>
        </td>
        <td>
          <a href="#"
            class="p-2 d-flex flex-row align-items-center mb-2 text-decoration-none text-reset">
            <img src="/public/assets/images/admin/default-user-image.webp" width="40"
              class="me-3 rounded-circle" />
            <div class="d-flex flex-column ml-2">
              <span class="d-block font-weight-bold">Nguyễn Đặng Hồng Mỹ</span>
              <small class="text-muted">example@gmail.com</small>
            </div>
          </a>
        </td>
        <td>
          <div class="p-2">
            <span class="status text-success">&bull;</span> Đã thanh toán
          </div>
        </td>
        <td>
          <div class="p-2 icons">
            <a href="#" class="edit text-decoration-none mx-3">
              <i class="fas fa-info"></i>
            </a>
          </div>
        </td>
      </tr>

    </tbody>
  </table>

</div>
</div>
HTML;

require_once __DIR__ . '/../index.php';
