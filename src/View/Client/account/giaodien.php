<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile - Bootstrap</title>

    <!-- Bootstrap CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet">

    <style>
        .profile-card {
            max-width: 450px;
            margin: 40px auto;
            padding: 25px;
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        .avatar img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #0d6efd;
        }
    </style>
</head>
<body class="bg-light">

    <div class="profile-card">
        
        <div class="avatar mb-3">
            <img src="https://i.pravatar.cc/180" alt="Avatar">
        </div>

        <h3 class="fw-bold">Nguyễn Văn A</h3>
        <p class="text-muted">Thành viên</p>

        <div class="text-start mt-3">
            <p><strong>Email:</strong> nguyenvana@example.com</p>
            <p><strong>Điện thoại:</strong> 0123 456 789</p>
            <p><strong>Địa chỉ:</strong> Hà Nội, Việt Nam</p>
        </div>

        <button class="btn btn-primary w-100 mt-3" onclick="editProfile()">
            Chỉnh sửa hồ sơ
        </button>
    </div>

    <!-- Bootstrap JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>

    <script>
        function editProfile() {
            alert("Tính năng chỉnh sửa đang được phát triển!");
        }
    </script>
</body>
</html>
