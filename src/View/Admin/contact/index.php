<h4>Danh sách liên hệ</h4>

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
                        <span class="ml-2">Email</span>
                    </th>
                    <th>
                        <span class="ml-2">Ngay tạo</span>
                    </th>
                    <th>
                        <span class="ml-2">Xử lý bởi</span>
                    </th>
                    <th>
                        <span class="ml-4">Hàng động</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $index => $contact): ?>
                    <tr class="border-bottom">

                        <td>
                            <div class="p-2"><?= $index + 1 ?></div>
                        </td>
                        <td>
                            <div class="p-2 d-flex flex-column">
                                <span>
                                    <?= $contact['name']; ?>
                                </span>
                            </div>
                        </td>
                        <td>
                            <div class="p-2 d-flex flex-column">
                                <span>
                                    <?= $contact['email']; ?>
                                </span>
                            </div>
                        </td>
                        <td>
                            <div class="p-2 d-flex flex-column">
                                <span>
                                    <?= $contact['created_at']; ?>
                                </span>
                            </div>
                        </td>
                        <td>
                        <div class="p-2 d-flex flex-row align-items-center mb-2">
                            <img
                                src="/upload/user/<?= $contact['avatar'] ?>"
                                width="40"
                                class="me-3 rounded-circle" />
                            <div class="d-flex flex-column ml-2">
                                <span class="d-block font-weight-bold"><?= $contact['user_name'] ?></span>
                                <small class="text-muted"><?= $contact['user_email'] ?></small>
                            </div>
                        </div>
                    </td>
                        <td>
                            <div class="p-2 icons">
                                <a href="#" class="edit text-decoration-none">
                                    <i class="fas fa-info"></i>
                                </a>
                                <a href="#" class="edit text-decoration-none">
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