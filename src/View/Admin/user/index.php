<h4>Danh sách người dùng</h4>

<div class="mt-3">
  <div class="table-title border-bottom pb-3">
    <div class="row">
      <div class="col-sm-4">
        <form class="search-box" method="post" action="">
          <input
            type="text"
            class="form-control"
            name="search-box"
            placeholder="Tìm kiếm&hellip;" />
        </form>
      </div>
      <div class="col-sm-8 text-sm-end text-center mt-sm-0 mt-3">
        <a href="#" class="btn btn-success me-lg-2">
          <i class="fas fa-plus-circle"></i> <span>Thêm người dùng</span>
        </a>
      </div>
    </div>
  </div>

  <div>
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
            <span class="ml-2">Địa chỉ</span>
          </th>
          <th>
            <span class="ml-2">SĐT</span>
          </th>
          <th>
            <span class="ml-2">Vai trò</span>
          </th>
          <th>
            <span class="ml-4">Hàng động</span>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $index => $user): ?>
        <tr class="border-bottom">
          <td>
            <div class="p-2"><?= $index + 1; ?></div>
          </td>
          <td>
            <div class="p-2 d-flex flex-row align-items-center mb-2">
              <img
                src="/upload/user/<?= $user['avatar'] ?>"
                width="40"
                class="me-3 rounded-circle" />
              <div class="d-flex flex-column ml-2">
                <span class="d-block font-weight-bold"><?= $user['name']; ?></span>
                <small class="text-muted"><?= $user['email']; ?></small>
              </div>
            </div>
          </td>

          <td>
            <div class="p-2 d-flex flex-column">
              <span>
                <?= $user['address']; ?>
              </span>
            </div>
          </td>
          
          <td>
            <div class="p-2 d-flex flex-column">
              <span>
                <?= $user['phone']; ?>
              </span>
            </div>
          </td>

          <td>
            <div class="p-2 d-flex flex-column">
              <span>
                <?= $user['is_admin'] ? 'Admin' : 'Khach hang' ?>
              </span>
            </div>
          </td>
          
          <td>
            <div class="p-2 icons">
              <a href="/admin/user/info?id=<?= $user['id']; ?>" class="edit text-decoration-none">
                <i class="fas fa-info"></i>
              </a>
              <a href="/admin/user/edit?id=<?= $user['id']; ?>" class="edit text-decoration-none">
                <i class="fas fa-pen text-warning mx-2"></i>
              </a>
              <a href="/admin/user/delete?id=<?= $user['id']; ?>" class="edit text-decoration-none">
                <i class="fa fa-trash text-danger"></i>
              </a>
            </div>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>

    </form>
  </div>