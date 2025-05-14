<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>403 - Không được phép truy cập</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .unauthorized-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }

        .unauthorized-container h1 {
            font-size: 72px;
            margin: 0;
            color: #e53935;
        }

        .unauthorized-container h2 {
            font-size: 24px;
            margin: 10px 0;
            color: #333333;
        }

        .unauthorized-container p {
            font-size: 16px;
            color: #555555;
            margin-bottom: 20px;
        }

        .unauthorized-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .unauthorized-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="unauthorized-container">
        <h1>403</h1>
        <h2>Truy cập bị từ chối</h2>
        <p>Bạn không có quyền truy cập vào trang này.<br>Vui lòng quay lại hoặc liên hệ quản trị viên.</p>
        <a href="{{ url('/') }}">Quay lại trang chủ</a>
    </div>
</body>
</html>
