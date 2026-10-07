<template>
    <div class="partner-tai-khoan-container">
        <!-- Banner Title -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 page-banner-card">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-pink text-white px-3 py-1 rounded-pill font-11 fw-bold">
                                BẢO MẬT & TÀI KHOẢN
                            </span>
                            <span class="text-muted small">/ Quản trị viên đối tác</span>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Tài Khoản Đối Tác & Cài Đặt Bảo Mật</h3>
                        <p class="text-muted small mb-0">
                            Quản lý thông tin đăng nhập, thiết lập xác thực 2 lớp (2FA) và cấu hình kênh nhận thông báo đơn đặt mới.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Left: Profile Info -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white text-center mb-4">
                    <div class="avatar-circle-lg bg-pink text-white mx-auto mb-3 fw-bold fs-3 shadow-sm">
                        NV
                    </div>
                    <h5 class="fw-bold text-dark mb-1">{{ profile.ho_ten }}</h5>
                    <p class="text-muted small mb-2">{{ profile.email }}</p>
                    <div>
                        <span class="badge bg-pink-light text-pink px-3 py-1 rounded-pill fw-bold">
                            Chủ Sở Hữu (Owner)
                        </span>
                    </div>
                    <hr>
                    <div class="text-start small text-muted">
                        <div class="mb-2"><i class="bx bx-buildings me-2 text-pink"></i>Đơn vị: <strong>Lotus Heritage Ltd</strong></div>
                        <div class="mb-2"><i class="bx bx-shield-quarter me-2 text-pink"></i>Quyền hạn: <strong>Toàn quyền quản trị B2B</strong></div>
                        <div><i class="bx bx-time me-2 text-pink"></i>Lần đăng nhập cuối: <strong>Hôm nay, 16:30</strong></div>
                    </div>
                </div>
            </div>

            <!-- Right: Settings & Security -->
            <div class="col-lg-8">
                <!-- Profile Edit Form -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                    <h5 class="fw-bold text-dark mb-3"><i class="bx bx-user text-pink me-2"></i>Thông Tin Cá Nhân</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Họ Và Tên</label>
                            <input type="text" class="form-control" v-model="profile.ho_ten">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Số Điện Thoại</label>
                            <input type="text" class="form-control" v-model="profile.sdt">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Đăng Nhập</label>
                            <input type="email" class="form-control" v-model="profile.email" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Chức Vụ</label>
                            <input type="text" class="form-control" v-model="profile.chuc_danh">
                        </div>
                    </div>
                </div>

                <!-- Password & 2FA Security -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                    <h5 class="fw-bold text-dark mb-3"><i class="bx bx-lock-alt text-pink me-2"></i>Đổi Mật Khẩu & Xác Thực 2 Lớp (2FA)</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Mật Khẩu Mới</label>
                            <input type="password" class="form-control" placeholder="Để trống nếu không đổi">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nhập Lại Mật Khẩu</label>
                            <input type="password" class="form-control" placeholder="Xác nhận lại mật khẩu mới">
                        </div>
                        <div class="col-12">
                            <div class="p-3 bg-light rounded-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <strong class="text-dark d-block">Xác thực 2 yếu tố (2FA qua Google Authenticator)</strong>
                                    <small class="text-muted">Bảo vệ tài khoản an toàn tối đa khi đăng nhập hoặc thực hiện lệnh rút tiền</small>
                                </div>
                                <div class="form-check form-switch fs-4">
                                    <input class="form-check-input" type="checkbox" v-model="twoFactor" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notification Settings -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                    <h5 class="fw-bold text-dark mb-3"><i class="bx bx-bell text-pink me-2"></i>Thông Báo Đơn Đặt Tour Mới</h5>
                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="notifEmail" checked>
                            <label class="form-check-label" for="notifEmail">Nhận email ngay khi có đơn đặt chỗ mới</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="notifSMS" checked>
                            <label class="form-check-label" for="notifSMS">Nhận tin nhắn Zalo ZNS khi đơn hàng được thanh toán</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-pink text-white rounded-3 px-4 py-2 fw-semibold shadow-sm" @click="luuThietLap">
                        <i class="bx bx-save me-1"></i> Lưu Cập Nhật
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DoiTacTaiKhoan',
    data() {
        return {
            twoFactor: true,
            profile: {
                ho_ten: 'Nguyễn Văn Hùng',
                email: 'hung.lotus@wanderlust.vn',
                sdt: '0918.423.889',
                chuc_danh: 'Giám Đốc Điều Hành (Owner)'
            }
        }
    },
    methods: {
        luuThietLap() {
            alert('Đã cập nhật hồ sơ và thiết lập bảo mật thành công!');
        }
    }
}
</script>

<style scoped>
.bg-pink {
    background-color: #e11d48 !important;
}
.text-pink {
    color: #e11d48 !important;
}
.bg-pink-light {
    background-color: #ffe4e6 !important;
}
.btn-pink {
    background-color: #e11d48;
    border-color: #e11d48;
}
.btn-pink:hover {
    background-color: #be123c;
    border-color: #be123c;
}
.avatar-circle-lg {
    width: 72px;
    height: 72px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
