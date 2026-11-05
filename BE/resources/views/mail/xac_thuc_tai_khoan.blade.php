<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Xác thực tài khoản</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; margin: 0; padding: 20px; color: #333; }
        .email-container { max-width: 560px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06); }
        .header { background: linear-gradient(135deg, #0284c7, #0369a1); color: #ffffff; padding: 30px 20px; text-align: center; }
        .header h2 { margin: 0; font-size: 22px; }
        .body { padding: 30px 25px; line-height: 1.6; }
        .otp-code { background: #f0f9ff; border: 2px dashed #0284c7; color: #0284c7; font-size: 28px; font-weight: bold; letter-spacing: 6px; padding: 15px; text-align: center; border-radius: 8px; margin: 25px 0; }
        .footer { background: #f8fafc; padding: 15px; text-align: center; font-size: 12px; color: #64748b; border-top: 1px solid #e2e8f0; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>ĐÀ NẴNG SMART TRAVEL</h2>
            <div style="font-size: 13px; opacity: 0.92; margin-top: 5px;">Hệ Thống Hỗ Trợ Lập Kế Hoạch Du Lịch Cá Nhân Hóa Tại Đà Nẵng</div>
        </div>
        <div class="body">
            <p>Xin chào <strong>{{ $data['ho_va_ten'] ?? 'Quý khách' }}</strong>,</p>
            <p>Cảm ơn bạn đã đăng ký tài khoản trên nền tảng <strong>Đà Nẵng Smart Travel</strong>. Để hoàn tất thủ tục và bảo vệ an toàn cho tài khoản, vui lòng sử dụng mã xác thực dưới đây:</p>
            <div class="otp-code">{{ $data['ma_xac_thuc'] ?? '' }}</div>
            <p style="font-size: 13px; color: #64748b;">Mã này có hiệu lực kích hoạt tài khoản của bạn. Vui lòng không chia sẻ mã này cho bất kỳ ai để đảm bảo an toàn.</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Đà Nẵng Smart Travel. Mọi quyền được bảo lưu.</p>
        </div>
    </div>
</body>
</html>
