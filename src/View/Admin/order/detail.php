<!-- Thông tin đơn hàng -->
<div class="card p-4 mb-4">
  <div class="row">
    <!-- Thông tin chung -->
    <div class="col-md-6">
      <h5 class="mb-3">Thông tin chung</h5>

      <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <input type="text" class="form-control" value="Đang vận chuyển" readonly>
      </div>

      <div class="mb-3">
        <label class="form-label">Khách hàng</label>
        <input type="text" class="form-control" value="Công Xum" readonly>
      </div>

      <div class="mb-3">
        <label class="form-label">Ngày đặt hàng</label>
        <input type="text" class="form-control" value="10/15/2024, 12:30 PM" readonly>
      </div>
    </div>

    <!-- Thông tin người nhận -->
    <div class="col-md-6">
      <h5 class="mb-3">Thông tin người nhận</h5>

      <p><strong>Họ tên:</strong> Quang Đồng</p>
      <p><strong>Số điện thoại:</strong> 0123456789</p>
      <p><strong>Địa chỉ:</strong> 123 Đường ABC, Khu dân cư..., Quận 1, TP.HCM</p>
    </div>
  </div>
</div>


<!-- Chi tiết đơn hàng -->
<h4>Danh sách sản phẩm</h4>

<div class="mt-3">
  <form action="" method="post">
    <table class="table table-borderless table-responsive card-1">
      <thead>
        <tr class="border-bottom">
          <th><span class="ml-1">STT</span></th>
          <th><span class="ml-2">Sản phẩm</span></th>
          <th><span class="ml-2">Giá</span></th>
          <th><span class="ml-2">Số lượng</span></th>
        </tr>
      </thead>

      <tbody>
        <tr class="border-bottom">
          <td>
            <div class="p-2">1</div>
          </td>
          <td>
            <a href="#"
              class="p-2 d-flex flex-row align-items-center mb-2 text-decoration-none text-reset">
              <img src="/public/assets/images/admin/default-product-image.png" width="40"
                class="me-3 rounded-circle" />
              <div class="d-flex flex-column ml-2">
                <span class="d-block font-weight-bold">CPU Intel Core i5 14400F</span>
              </div>
            </a>
          </td>
          <td>
            <div class="p-2">2,295,000₫</div>
          </td>
          <td>
            <div class="p-2 d-flex flex-column">1</div>
          </td>
        </tr>
        <tr class="border-bottom">
          <td>
            <div class="p-2">1</div>
          </td>
          <td>
            <a href="#"
              class="p-2 d-flex flex-row align-items-center mb-2 text-decoration-none text-reset">
              <img src="/public/assets/images/admin/default-product-image.png" width="40"
                class="me-3 rounded-circle" />
              <div class="d-flex flex-column ml-2">
                <span class="d-block font-weight-bold">CPU Intel Core i5 14400F</span>
              </div>
            </a>
          </td>
          <td>
            <div class="p-2">2,295,000₫</div>
          </td>
          <td>
            <div class="p-2 d-flex flex-column">1</div>
          </td>
        </tr>
      </tbody>

      <tfoot>
        <tr class="border-top">
          <td colspan="2"></td>
          <td class="fw-bold">Tổng tiền:</td>
          <td class="fw-bold">4,590,000₫</td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>