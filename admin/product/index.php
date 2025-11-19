<?php
$pageName = <<<HTML
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
        <a href="#" class="btn btn-success me-lg-2">
          <i class="fas fa-plus-circle"></i> <span>Thêm sản phẩm</span>
        </a>
        <a href="#deleteEmployeeModal" class="btn btn-danger disabled" data-bs-toggle="modal" id="delete-btn">
          <i class="fas fa-minus-circle"></i> <span>Xóa sản phẩm</span>
        </a>
      </div>
    </div>
  </div>

  <form action="" method="post">
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
            <span class="ml-2">Tên</span>
          </th>
          <th>
            <span class="ml-2">Giá</span>
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
            <div class="p-2 d-flex flex-row align-items-center mb-2">
              <img src="/public/assets/images/admin/default-product-image.png" width="40"
                class="me-3 rounded-circle" />
              <div class="d-flex flex-column ml-2">
                <span class="d-block font-weight-bold">CPU Intel Core i5 14400F</span>
                <small class="text-muted text-truncate" style="width: 250px;">
                  Intel Core i5-14400F đưa hiệu năng đa nhiệm lên một tầm cao mới với cấu hình ấn tượng
                </small>
              </div>
            </div>
          </td>
          <td>
            <div class="p-2">4,590,000₫</div>
          </td>
          <td>
            <div class="p-2 icons">
              <a href="#"
                class="edit text-decoration-none">
                <i class="fas fa-info"></i>
              </a>
              <a href="#"
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
            <div class="p-2 d-flex flex-row align-items-center mb-2">
              <img src="/public/assets/images/admin/default-product-image.png" width="40"
                class="me-3 rounded-circle" />
              <div class="d-flex flex-column ml-2">
                <span class="d-block font-weight-bold">CPU Intel Core i5 14400F</span>
                <small class="text-muted text-truncate" style="width: 250px;">
                  Intel Core i5-14400F đưa hiệu năng đa nhiệm lên một tầm cao mới với cấu hình ấn tượng
                </small>
              </div>
            </div>
          </td>
          <td>
            <div class="p-2">4,590,000₫</div>
          </td>
          <td>
            <div class="p-2 icons">
              <a href="#"
                class="edit text-decoration-none">
                <i class="fas fa-info"></i>
              </a>
              <a href="#"
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
            <div class="p-2 d-flex flex-row align-items-center mb-2">
              <img src="/public/assets/images/admin/default-product-image.png" width="40"
                class="me-3 rounded-circle" />
              <div class="d-flex flex-column ml-2">
                <span class="d-block font-weight-bold">CPU Intel Core i5 14400F</span>
                <small class="text-muted text-truncate" style="width: 250px;">
                  Intel Core i5-14400F đưa hiệu năng đa nhiệm lên một tầm cao mới với cấu hình ấn tượng
                </small>
              </div>
            </div>
          </td>
          <td>
            <div class="p-2">4,590,000₫</div>
          </td>
          <td>
            <div class="p-2 icons">
              <a href="#"
                class="edit text-decoration-none">
                <i class="fas fa-info"></i>
              </a>
              <a href="#"
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
      </tbody>
    </table>

  </form>
</div>
HTML;

require_once __DIR__ . '/../index.php';
