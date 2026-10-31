<template>
    <div class="partner-security-page">
        <!-- 1. Header Banner & Action Buttons -->
        <div class="page-header mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-2">
                        <span class="badge-tag-pill tag-pink">
                            <i class="bx bx-shield-quarter me-1"></i> TRUNG TÂM BẢO MẬT & TÀI KHOẢN
                        </span>
                    </div>
                    <h2 class="page-title mb-1">Tài Khoản Quản Trị & Cài Đặt Bảo Mật Đối Tác</h2>
                    <p class="page-desc text-muted mb-0">
                        Quản lý thông tin đăng nhập, xác thực hai yếu tố (2FA), phân quyền nhân viên điều hành và lịch sử phiên truy cập cho tổ hợp dịch vụ du lịch Đà Nẵng.
                    </p>
                </div>

                <!-- Top Right Action Buttons -->
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button class="btn btn-outline-pink btn-sm px-3 py-2 rounded-3 fw-bold font-12" type="button" @click="kiemTraAnToan">
                        <i class="bx bx-pulse me-1 font-16 align-middle"></i> Kiểm Tra An Toàn
                    </button>
                    <button class="btn btn-pink-gradient text-white px-3 py-2 rounded-3 fw-bold font-12 shadow-sm" type="button" @click="moModalThemNhanVien">
                        <i class="bx bx-user-plus me-1 font-16 align-middle"></i> + Thêm Nhân Viên
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. 4 Metric Status KPI Cards -->
        <div class="row g-3 mb-4">
            <!-- Metric 1: Điểm An Ninh -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="kpi-icon-wrap icon-pink">
                            <i class="bx bx-shield font-22"></i>
                        </div>
                        <div class="flex-grow-1">
                            <span class="kpi-label">Điểm An Ninh</span>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="kpi-value text-dark mb-0">98/100</span>
                                <span class="badge bg-pink text-white font-10 px-2 py-1 rounded-pill">Rất cao</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metric 2: Xác Thực 2FA -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="kpi-icon-wrap icon-purple">
                            <i class="bx bx-lock-alt font-22"></i>
                        </div>
                        <div class="flex-grow-1">
                            <span class="kpi-label">Xác Thực 2FA</span>
                            <div class="kpi-value text-purple mt-1 mb-0 font-15">Đang Kích Hoạt</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metric 3: Tài Khoản Phụ -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="kpi-icon-wrap icon-blue">
                            <i class="bx bx-user-pin font-22"></i>
                        </div>
                        <div class="flex-grow-1">
                            <span class="kpi-label">Tài Khoản Phụ</span>
                            <div class="kpi-value text-primary mt-1 mb-0 font-15">03 Nhân Viên</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metric 4: Lượt Chặn WAF -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="kpi-icon-wrap icon-orange">
                            <i class="bx bx-shield-x font-22"></i>
                        </div>
                        <div class="flex-grow-1">
                            <span class="kpi-label">Lượt Chặn WAF</span>
                            <div class="kpi-value text-danger mt-1 mb-0 font-15">01 Lần Thử Lạ</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Row 2: Master Admin Info & Advanced Security -->
        <div class="row g-4 mb-4">
            <!-- Left Card: Thông Tin Tài Khoản Chính (Master Admin) -->
            <div class="col-lg-7 col-xl-7">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                            <div class="d-flex align-items-center gap-2">
                                <div class="section-icon-badge bg-pink-subtle text-pink">
                                    <i class="bx bx-user-check font-18"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 font-15 text-dark">Thông Tin Tài Khoản Chính (Master Admin)</h5>
                                    <p class="font-11 text-muted mb-0 font-monospace">Entity: nguoi_dung & chuc_vu</p>
                                </div>
                            </div>
                            <span class="badge bg-pink-subtle text-pink font-10 fw-bold px-3 py-1 rounded-pill">
                                ĐỐI TÁC CẤP CAO
                            </span>
                        </div>

                        <!-- User Profile Overview -->
                        <div class="d-flex align-items-center gap-3 p-3 bg-light-soft rounded-3 mb-4">
                            <div class="position-relative">
                                <img 
                                    src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=160&q=80" 
                                    alt="Trần Văn Bảo" 
                                    class="master-avatar rounded-circle shadow-sm"
                                />
                                <span class="master-avatar-badge bg-pink text-white">
                                    <i class="bx bx-award font-12"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                    <h5 class="fw-bold text-dark mb-0 font-16">{{ masterUser.ho_ten }}</h5>
                                    <span class="badge bg-purple-subtle text-purple font-10 px-2 py-1 rounded-pill fw-semibold">
                                        <i class="bx bx-check-shield me-1"></i> Admin Partner
                                    </span>
                                </div>
                                <div class="font-12 text-muted mb-2">
                                    {{ masterUser.chuc_danh }} • <strong class="text-dark">{{ masterUser.cong_ty }}</strong>
                                </div>
                                <div class="d-flex align-items-center gap-3 flex-wrap font-11 text-muted">
                                    <span class="d-flex align-items-center gap-1">
                                        <i class="bx bx-envelope text-pink font-14"></i> {{ masterUser.email }}
                                    </span>
                                    <span class="d-flex align-items-center gap-1">
                                        <i class="bx bx-phone text-pink font-14"></i> {{ masterUser.dien_thoai }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Subsection: Cập Nhật Mật Khẩu Đăng Nhập -->
                        <div class="password-update-box p-3 border rounded-3 bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center gap-1 fw-bold text-dark font-13">
                                    <i class="bx bx-key text-pink font-16"></i> Cập Nhật Mật Khẩu Đăng Nhập
                                </div>
                                <span class="font-11 text-muted">Lần đổi gần nhất: 18 ngày trước</span>
                            </div>

                            <form @submit.prevent="capNhatMatKhau">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                            Mật khẩu hiện tại
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <input 
                                                :type="showPassCurrent ? 'text' : 'password'" 
                                                class="form-control form-control-sm" 
                                                v-model="passwordForm.current_password"
                                                placeholder="••••••••••"
                                                required
                                            />
                                            <button 
                                                class="btn btn-outline-secondary btn-sm" 
                                                type="button" 
                                                @click="showPassCurrent = !showPassCurrent"
                                            >
                                                <i :class="showPassCurrent ? 'bx bx-show' : 'bx bx-hide'"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                            Mật khẩu mới
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <input 
                                                :type="showPassNew ? 'text' : 'password'" 
                                                class="form-control form-control-sm" 
                                                v-model="passwordForm.new_password"
                                                placeholder="•••••••••••••••••"
                                                required
                                            />
                                            <button 
                                                class="btn btn-outline-secondary btn-sm" 
                                                type="button" 
                                                @click="showPassNew = !showPassNew"
                                            >
                                                <i :class="showPassNew ? 'bx bx-show' : 'bx bx-hide'"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                            Xác nhận mật khẩu
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <input 
                                                :type="showPassConfirm ? 'text' : 'password'" 
                                                class="form-control form-control-sm" 
                                                v-model="passwordForm.confirm_password"
                                                placeholder="•••••••••••••••••"
                                                required
                                            />
                                            <button 
                                                class="btn btn-outline-secondary btn-sm" 
                                                type="button" 
                                                @click="showPassConfirm = !showPassConfirm"
                                            >
                                                <i :class="showPassConfirm ? 'bx bx-show' : 'bx bx-hide'"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Password strength meter -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-1 font-11">
                                        <span class="text-muted">
                                            Độ mạnh mật khẩu: <strong class="text-primary">Rất Tốt (92%)</strong>
                                        </span>
                                        <span class="text-muted">Yêu cầu chữ hoa, số & ký tự đặc biệt</span>
                                    </div>
                                    <div class="strength-meter-bar d-flex gap-1">
                                        <div class="meter-segment segment-pink"></div>
                                        <div class="meter-segment segment-purple"></div>
                                        <div class="meter-segment segment-cyan"></div>
                                        <div class="meter-segment segment-gray"></div>
                                    </div>
                                </div>

                                <div class="text-center pt-2">
                                    <button type="submit" class="btn btn-pink-gradient text-white px-4 py-2 rounded-3 fw-bold font-12 shadow-sm">
                                        <i class="bx bx-lock-alt me-1 font-15 align-middle"></i> Lưu Thay Đổi Mật Khẩu
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Card: Bảo Mật Nâng Cao -->
            <div class="col-lg-5 col-xl-5">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                            <div class="d-flex align-items-center gap-2">
                                <div class="section-icon-badge bg-purple-subtle text-purple">
                                    <i class="bx bx-shield-quarter font-18"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 font-15 text-dark">Bảo Mật Nâng Cao</h5>
                                    <p class="font-11 text-muted mb-0 font-monospace">Entity: xac_thuc_nguoi_dung</p>
                                </div>
                            </div>
                            <span class="badge bg-cyan-subtle text-cyan font-10 fw-bold px-3 py-1 rounded-pill">
                                Chính sách bảo mật AI
                            </span>
                        </div>

                        <!-- Item 1: Xác thực 2 bước (2FA) -->
                        <div class="security-toggle-card p-3 rounded-3 mb-3 border">
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="feature-icon-badge bg-pink-subtle text-pink">
                                        <i class="bx bx-mobile-alt font-18"></i>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fw-bold text-dark font-13">Xác thực 2 bước (2FA)</span>
                                            <span class="badge bg-pink text-white font-9 px-2 py-0.5 rounded-pill fw-bold">
                                                ĐANG BẬT
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input 
                                        class="form-check-input custom-switch-pink" 
                                        type="checkbox" 
                                        role="switch" 
                                        v-model="securitySettings.two_factor_auth"
                                        @change="toggle2FA"
                                    />
                                </div>
                            </div>
                            <p class="font-11 text-muted mb-0 ps-4 ms-2">
                                Bảo vệ qua Google Authenticator & mã OTP dự phòng qua SĐT *234.
                            </p>
                        </div>

                        <!-- Item 2: Cảnh báo đăng nhập lạ -->
                        <div class="security-toggle-card p-3 rounded-3 mb-3 border">
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="feature-icon-badge bg-purple-subtle text-purple">
                                        <i class="bx bx-bell font-18"></i>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fw-bold text-dark font-13">Cảnh báo đăng nhập lạ</span>
                                            <span class="badge bg-purple text-white font-9 px-2 py-0.5 rounded-pill fw-bold">
                                                ĐANG BẬT
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input 
                                        class="form-check-input custom-switch-purple" 
                                        type="checkbox" 
                                        role="switch" 
                                        v-model="securitySettings.login_alerts"
                                        @change="toggleLoginAlerts"
                                    />
                                </div>
                            </div>
                            <p class="font-11 text-muted mb-0 ps-4 ms-2">
                                Tự động gửi cảnh báo khẩn cấp tới email ngay khi phát hiện địa chỉ IP lạ hoặc thiết bị chưa từng cấp phép.
                            </p>
                        </div>

                        <!-- Item 3: Thu hồi tất cả phiên khác -->
                        <div class="security-action-card p-3 rounded-3 border bg-light-pink-subtle">
                            <div class="d-flex align-items-center justify-content-between gap-3">
                                <div class="d-flex align-items-start gap-2">
                                    <div class="feature-icon-badge bg-danger-subtle text-danger mt-1">
                                        <i class="bx bx-devices font-18"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-dark font-13">Thu hồi tất cả phiên khác</span>
                                        <p class="font-11 text-muted mb-0">
                                            Đăng xuất trên tất cả thiết bị khác (máy tính bảng, điện thoại & trình duyệt phụ).
                                        </p>
                                    </div>
                                </div>
                                <button class="btn btn-danger btn-sm rounded-pill font-11 fw-bold px-3 py-1 flex-shrink-0 text-nowrap" @click="thuHoiTatCaPhien">
                                    Đăng Xuất Từ Xa
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Row 3: Phân Quyền Nhân Viên Điều Hành (Sub-Accounts) -->
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 pb-2 border-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <div class="section-icon-badge bg-cyan-subtle text-cyan">
                            <i class="bx bx-group font-18"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0 font-15 text-dark">Phân Quyền Nhân Viên Điều Hành (Sub-Accounts)</h5>
                            <p class="font-11 text-muted mb-0">
                                Quản lý tài khoản vận hành theo vai trò nghiệp vụ: Điều phối tour, Hướng dẫn viên trưởng, Kế toán hóa đơn.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-outline-secondary btn-sm rounded-pill px-3 py-1 font-11 fw-semibold" @click="moModalMaTran">
                            <i class="bx bx-grid-alt me-1"></i> Ma Trận Phân Quyền
                        </button>
                        <button class="btn btn-purple-gradient text-white btn-sm rounded-pill px-3 py-1 font-11 fw-bold shadow-sm" @click="moModalThemNhanVien">
                            <i class="bx bx-plus me-1"></i> + Thêm Tài Khoản Nhân Viên Mới
                        </button>
                    </div>
                </div>

                <!-- 3 Sub-Account Cards Grid -->
                <div class="row g-3">
                    <!-- Sub-account 1: Lê Thu Thảo -->
                    <div class="col-lg-4 col-md-6" v-for="user in listNhanVien" :key="user.id">
                        <div class="sub-account-card p-3 rounded-3 border h-100 position-relative">
                            <!-- Card Top Badges -->
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge font-9 px-2 py-1 rounded-pill fw-bold text-uppercase" :class="user.role_badge_class">
                                    {{ user.role_code }}
                                </span>
                                <span class="status-indicator-dot" :class="user.is_active ? 'bg-cyan' : 'bg-secondary'"></span>
                            </div>

                            <!-- Avatar & Info -->
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img :src="user.avatar" :alt="user.ho_ten" class="sub-avatar rounded-circle border" />
                                <div>
                                    <h6 class="fw-bold text-dark mb-0 font-14">{{ user.ho_ten }}</h6>
                                    <div class="font-11 fw-semibold" :class="user.role_text_color">{{ user.chuc_vu }}</div>
                                    <div class="font-10 text-muted">{{ user.email }}</div>
                                </div>
                            </div>

                            <!-- Permissions Pill List -->
                            <div class="permissions-box p-2 bg-light-soft rounded-2 mb-3">
                                <span class="font-10 fw-bold text-muted text-uppercase d-block mb-1">Quyền Hạn Cấp Phép:</span>
                                <div class="d-flex flex-wrap gap-1">
                                    <span class="badge bg-white text-dark border font-10 px-2 py-1 rounded-pill" v-for="(p, idx) in user.permissions" :key="idx">
                                        <i :class="p.icon" class="me-1" :style="{ color: p.color }"></i> {{ p.name }}
                                    </span>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                                <span class="font-10 text-muted">
                                    Đăng nhập: <strong class="text-dark">{{ user.last_login }}</strong>
                                </span>
                                <div class="d-flex align-items-center gap-1">
                                    <button class="btn btn-sm btn-icon-round" @click="suaNhanVien(user)" title="Chỉnh sửa quyền">
                                        <i class="bx bx-slider font-15 text-muted"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon-round" @click="toggleKhoaNhanVien(user)" :title="user.is_active ? 'Khóa tài khoản' : 'Mở khóa'">
                                        <i :class="user.is_active ? 'bx bx-lock-open text-muted' : 'bx bx-lock text-danger'" class="font-15"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. Row 4: Lịch Sử Phiên Đăng Nhập & Địa Chỉ IP -->
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 pb-2 border-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <div class="section-icon-badge bg-pink-subtle text-pink">
                            <i class="bx bx-history font-18"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0 font-15 text-dark">Lịch Sử Phiên Đăng Nhập & Địa Chỉ IP</h5>
                            <p class="font-11 text-muted mb-0 font-monospace">
                                Entity: phien_dang_nhap • Theo dõi các phiên xét duyệt và kiểm soát bảo mật thông quan tại nhánh Đà Nẵng.
                            </p>
                        </div>
                    </div>

                    <span class="badge bg-pink-light text-pink rounded-pill font-11 fw-bold px-3 py-1">
                        <i class="bx bx-shield me-1"></i> WAF Firewall Active • B2 Shield SmartTrip Shield
                    </span>
                </div>

                <!-- Session Item List -->
                <div class="session-list d-flex flex-column gap-3">
                    <!-- Session 1: Current Session -->
                    <div class="session-card p-3 rounded-3 border bg-light-pink-subtle d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="session-device-icon bg-pink text-white rounded-3">
                                <i class="bx bx-laptop font-22"></i>
                            </div>
                            <div>
                                <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                    <span class="fw-bold text-dark font-13">Google Chrome trên MacOS Ventura</span>
                                    <span class="badge bg-pink text-white font-9 px-2 py-0.5 rounded-pill fw-bold">
                                        PHIÊN NÀY (ĐANG HOẠT ĐỘNG)
                                    </span>
                                </div>
                                <div class="font-11 text-muted">
                                    <i class="bx bxs-map-pin text-pink me-1"></i> Đà Nẵng, Việt Nam • 
                                    IP: <span class="font-monospace text-dark fw-bold">118.69.182.45</span> • 
                                    Bắt đầu lúc: 08:30 hôm nay
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-outline-secondary btn-sm rounded-pill font-11 fw-semibold px-3 py-1 bg-white" type="button" @click="thietBiTinCay">
                            <i class="bx bx-check-shield text-success me-1"></i> Thiết bị tin cậy
                        </button>
                    </div>

                    <!-- Session 2: Mobile Session -->
                    <div class="session-card p-3 rounded-3 border bg-white d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="session-device-icon bg-purple-subtle text-purple rounded-3">
                                <i class="bx bx-mobile-alt font-22"></i>
                            </div>
                            <div>
                                <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                    <span class="fw-bold text-dark font-13">Safari trên Apple iPhone 15 Pro</span>
                                    <span class="badge bg-light text-muted border font-9 px-2 py-0.5 rounded-pill fw-semibold">
                                        ĐÃ XÁC THỰC OTP
                                    </span>
                                </div>
                                <div class="font-11 text-muted">
                                    <i class="bx bxs-map-pin text-purple me-1"></i> Đà Nẵng (4G Viettel) • 
                                    IP: <span class="font-monospace text-dark fw-bold">171.244.33.69</span> • 
                                    Hoạt động 2 giờ trước
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-outline-secondary btn-sm rounded-pill font-11 fw-semibold px-3 py-1" type="button" @click="thuHoiPhien('iPhone 15 Pro')">
                            Thu Hồi Phiên
                        </button>
                    </div>

                    <!-- Session 3: Blocked Malicious Session -->
                    <div class="session-card p-3 rounded-3 border border-danger-subtle bg-danger-light-soft d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="session-device-icon bg-danger text-white rounded-3">
                                <i class="bx bx-shield-x font-22"></i>
                            </div>
                            <div>
                                <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                    <span class="fw-bold text-danger font-13">Mozilla Firefox • Nghi Vấn Tấn Công Thử Mật Khẩu</span>
                                    <span class="badge bg-danger text-white font-9 px-2 py-0.5 rounded-pill fw-bold">
                                        ĐÃ CHẶN TỰ ĐỘNG BỞI WAF
                                    </span>
                                </div>
                                <div class="font-11 text-muted">
                                    <i class="bx bxs-map-pin text-danger me-1"></i> Krasnoyarsk, Liên Bang Nga • 
                                    IP: <span class="font-monospace text-danger fw-bold">95.188.41.102</span> • 
                                    Phát hiện: Hôm qua lúc 03:14:22 UTC+7
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-danger btn-sm rounded-pill font-11 fw-bold px-3 py-1 shadow-sm" type="button" @click="khoaVinhVienIP('95.188.41.102')">
                            Khóa Vĩnh Viễn Dải IP
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= MODALS ================= -->
        <!-- 1. Modal Thêm / Chỉnh Sửa Nhân Viên Điều Hành -->
        <div class="modal fade" id="modalNhanVien" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title fw-bold text-dark font-15">
                            <i class="bx bx-user-plus text-pink me-2"></i> {{ isEditingUser ? 'Chỉnh Sửa Quyền Nhân Viên' : 'Thêm Mới Tài Khoản Điều Hành' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form @submit.prevent="luuNhanVien">
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label font-12 fw-bold text-dark">Họ Và Tên</label>
                                    <input type="text" class="form-control" v-model="userForm.ho_ten" required placeholder="VD: Lê Thu Thảo" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-12 fw-bold text-dark">Email Đăng Nhập</label>
                                    <input type="email" class="form-control" v-model="userForm.email" required placeholder="VD: thao.le@danangexplorer.vn" />
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label font-12 fw-bold text-dark">Số Điện Thoại</label>
                                    <input type="text" class="form-control" v-model="userForm.so_dien_thoai" required placeholder="0905 xxx xxx" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-12 fw-bold text-dark">Vai Trò Nghiệp Vụ</label>
                                    <select class="form-select" v-model="userForm.role_code" required>
                                        <option value="TOUR DISPATCHER">Điều Phối Viên Tour (TOUR DISPATCHER)</option>
                                        <option value="LEAD TOUR GUIDE">Hướng Dẫn Viên Trưởng (LEAD TOUR GUIDE)</option>
                                        <option value="FINANCE & BILLING">Kế Toán & Đối Soát (FINANCE & BILLING)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-12 fw-bold text-dark mb-2">Quyền Hạn Cấp Phép Trực Tiếp:</label>
                                <div class="d-flex flex-wrap gap-2">
                                    <div class="form-check border rounded-2 px-3 py-2 bg-light">
                                        <input class="form-check-input" type="checkbox" id="perm1" checked />
                                        <label class="form-check-label font-12 ms-1" for="perm1">Lịch Khởi Hành & Chỗ Trống</label>
                                    </div>
                                    <div class="form-check border rounded-2 px-3 py-2 bg-light">
                                        <input class="form-check-input" type="checkbox" id="perm2" checked />
                                        <label class="form-check-label font-12 ms-1" for="perm2">Xử Lý & Duyệt Đặt Tour</label>
                                    </div>
                                    <div class="form-check border rounded-2 px-3 py-2 bg-light">
                                        <input class="form-check-input" type="checkbox" id="perm3" />
                                        <label class="form-check-label font-12 ms-1" for="perm3">Quét QR Check-in Đoàn</label>
                                    </div>
                                    <div class="form-check border rounded-2 px-3 py-2 bg-light">
                                        <input class="form-check-input" type="checkbox" id="perm4" />
                                        <label class="form-check-label font-12 ms-1" for="perm4">Đối Soát Doanh Thu & Hóa Đơn</label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end pt-3 border-top">
                                <button type="button" class="btn btn-light px-4 me-2 rounded-3" data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-pink-gradient text-white px-4 rounded-3 fw-bold">Lưu Thông Tin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Modal Ma Trận Phân Quyền -->
        <div class="modal fade" id="modalMaTran" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title fw-bold text-dark font-15">
                            <i class="bx bx-grid-alt text-purple me-2"></i> Ma Trận Phân Quyền Nhân Viên Lữ Hành
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle font-12">
                                <thead class="table-light">
                                    <tr>
                                        <th>Chức Năng Nghiệp Vụ</th>
                                        <th class="text-center">Master Admin</th>
                                        <th class="text-center">Điều Phối Tour</th>
                                        <th class="text-center">HDV Trưởng</th>
                                        <th class="text-center">Kế Toán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quản lý Tour & Lộ trình OSM</td>
                                        <td class="text-center text-success"><i class="bx bx-check-circle font-18"></i></td>
                                        <td class="text-center text-success"><i class="bx bx-check-circle font-18"></i></td>
                                        <td class="text-center text-muted"><i class="bx bx-minus font-18"></i></td>
                                        <td class="text-center text-muted"><i class="bx bx-minus font-18"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Điều phối chỗ trống & Flash Sale</td>
                                        <td class="text-center text-success"><i class="bx bx-check-circle font-18"></i></td>
                                        <td class="text-center text-success"><i class="bx bx-check-circle font-18"></i></td>
                                        <td class="text-center text-muted"><i class="bx bx-minus font-18"></i></td>
                                        <td class="text-center text-muted"><i class="bx bx-minus font-18"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Check-in QR vé điện tử E-ticket</td>
                                        <td class="text-center text-success"><i class="bx bx-check-circle font-18"></i></td>
                                        <td class="text-center text-success"><i class="bx bx-check-circle font-18"></i></td>
                                        <td class="text-center text-success"><i class="bx bx-check-circle font-18"></i></td>
                                        <td class="text-center text-muted"><i class="bx bx-minus font-18"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Đối soát doanh thu & Xuất e-Invoice</td>
                                        <td class="text-center text-success"><i class="bx bx-check-circle font-18"></i></td>
                                        <td class="text-center text-muted"><i class="bx bx-minus font-18"></i></td>
                                        <td class="text-center text-muted"><i class="bx bx-minus font-18"></i></td>
                                        <td class="text-center text-success"><i class="bx bx-check-circle font-18"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TaiKhoanBaoMat',
    data() {
        return {
            masterUser: {
                ho_ten: 'Trần Văn Bảo',
                chuc_danh: 'Quản Trị Viên Trưởng Đối Tác',
                cong_ty: 'Danang Explorer Travel Corp',
                email: 'baotran@danangexplorer.vn',
                dien_thoai: '0905 888 234'
            },
            passwordForm: {
                current_password: '',
                new_password: '',
                confirm_password: ''
            },
            showPassCurrent: false,
            showPassNew: false,
            showPassConfirm: false,
            securitySettings: {
                two_factor_auth: true,
                login_alerts: true
            },
            listNhanVien: [
                {
                    id: 1,
                    ho_ten: 'Lê Thu Thảo',
                    chuc_vu: 'Điều phối viên tour du lịch',
                    email: 'thao.le@danangexplorer.vn',
                    role_code: 'TOUR DISPATCHER',
                    role_badge_class: 'bg-pink-subtle text-pink',
                    role_text_color: 'text-pink',
                    avatar: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=120&q=80',
                    is_active: true,
                    last_login: '5 phút trước',
                    permissions: [
                        { name: 'Lịch khởi hành', icon: 'bx bx-calendar', color: '#e11d48' },
                        { name: 'Xử lý chỗ trống', icon: 'bx bx-check-square', color: '#e11d48' },
                        { name: 'Duyệt đặt tour', icon: 'bx bx-receipt', color: '#e11d48' }
                    ]
                },
                {
                    id: 2,
                    ho_ten: 'Nguyễn Văn Hùng',
                    chuc_vu: 'Hướng dẫn viên trưởng',
                    email: 'hung.nguyen@danangexplorer.vn',
                    role_code: 'LEAD TOUR GUIDE',
                    role_badge_class: 'bg-cyan-subtle text-cyan',
                    role_text_color: 'text-cyan',
                    avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=120&q=80',
                    is_active: true,
                    last_login: '1 giờ trước',
                    permissions: [
                        { name: 'Check-in E-ticket', icon: 'bx bx-qr-scan', color: '#0891b2' },
                        { name: 'Danh sách đoàn', icon: 'bx bx-group', color: '#0891b2' },
                        { name: 'Liên hệ trưởng đoàn', icon: 'bx bx-phone-call', color: '#0891b2' }
                    ]
                },
                {
                    id: 3,
                    ho_ten: 'Phạm Mai Lan',
                    chuc_vu: 'Kế toán lữ hành',
                    email: 'lan.pham@danangexplorer.vn',
                    role_code: 'FINANCE & BILLING',
                    role_badge_class: 'bg-purple-subtle text-purple',
                    role_text_color: 'text-purple',
                    avatar: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=120&q=80',
                    is_active: false,
                    last_login: 'Hôm qua, 17:42',
                    permissions: [
                        { name: 'Đối soát doanh thu', icon: 'bx bx-money', color: '#8b5cf6' },
                        { name: 'Xuất e-Invoice', icon: 'bx bx-file', color: '#8b5cf6' },
                        { name: 'Vé/tiền hoàn hủy', icon: 'bx bx-undo', color: '#8b5cf6' }
                    ]
                }
            ],
            isEditingUser: false,
            userForm: {
                id: null,
                ho_ten: '',
                email: '',
                so_dien_thoai: '',
                role_code: 'TOUR DISPATCHER'
            }
        };
    },
    methods: {
        kiemTraAnToan() {
            if (this.$toast) {
                this.$toast.success('Hệ thống kiểm tra hoàn tất: Toàn bộ dịch vụ đạt chuẩn an toàn 98/100.');
            } else {
                alert('Kiểm tra an toàn: Đạt chuẩn 98/100!');
            }
        },
        capNhatMatKhau() {
            if (this.passwordForm.new_password !== this.passwordForm.confirm_password) {
                if (this.$toast) {
                    this.$toast.error('Mật khẩu xác nhận không trùng khớp!');
                } else {
                    alert('Mật khẩu xác nhận không trùng khớp!');
                }
                return;
            }
            if (this.$toast) {
                this.$toast.success('Đã cập nhật mật khẩu đăng nhập thành công!');
            }
            this.passwordForm = {
                current_password: '',
                new_password: '',
                confirm_password: ''
            };
        },
        toggle2FA() {
            const status = this.securitySettings.two_factor_auth ? 'bật' : 'tắt';
            if (this.$toast) {
                this.$toast.info(`Đã ${status} tính năng Xác thực 2 bước (2FA).`);
            }
        },
        toggleLoginAlerts() {
            const status = this.securitySettings.login_alerts ? 'bật' : 'tắt';
            if (this.$toast) {
                this.$toast.info(`Đã ${status} cảnh báo đăng nhập lạ qua Email.`);
            }
        },
        thuHoiTatCaPhien() {
            if (confirm('Bạn có chắc chắn muốn thu hồi và đăng xuất toàn bộ phiên trên các thiết bị khác?')) {
                if (this.$toast) {
                    this.$toast.success('Đã thu hồi thành công 02 phiên đăng nhập từ xa.');
                }
            }
        },
        moModalThemNhanVien() {
            this.isEditingUser = false;
            this.userForm = {
                id: null,
                ho_ten: '',
                email: '',
                so_dien_thoai: '',
                role_code: 'TOUR DISPATCHER'
            };
            const modalEl = document.getElementById('modalNhanVien');
            if (modalEl && window.bootstrap) {
                const modal = new window.bootstrap.Modal(modalEl);
                modal.show();
            }
        },
        suaNhanVien(user) {
            this.isEditingUser = true;
            this.userForm = {
                id: user.id,
                ho_ten: user.ho_ten,
                email: user.email,
                so_dien_thoai: '0905 123 456',
                role_code: user.role_code
            };
            const modalEl = document.getElementById('modalNhanVien');
            if (modalEl && window.bootstrap) {
                const modal = new window.bootstrap.Modal(modalEl);
                modal.show();
            }
        },
        toggleKhoaNhanVien(user) {
            user.is_active = !user.is_active;
            const msg = user.is_active 
                ? `Đã kích hoạt lại tài khoản của ${user.ho_ten}` 
                : `Đã tạm khóa tài khoản của ${user.ho_ten}`;
            if (this.$toast) {
                this.$toast.info(msg);
            }
        },
        luuNhanVien() {
            const modalEl = document.getElementById('modalNhanVien');
            if (modalEl && window.bootstrap) {
                const modal = window.bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            }
            if (this.$toast) {
                this.$toast.success('Đã lưu thông tin nhân viên điều hành thành công!');
            }
        },
        moModalMaTran() {
            const modalEl = document.getElementById('modalMaTran');
            if (modalEl && window.bootstrap) {
                const modal = new window.bootstrap.Modal(modalEl);
                modal.show();
            }
        },
        thietBiTinCay() {
            if (this.$toast) {
                this.$toast.success('Thiết bị hiện tại đã được đánh dấu an toàn & tin cậy.');
            }
        },
        thuHoiPhien(deviceName) {
            if (this.$toast) {
                this.$toast.info(`Đã thu hồi phiên làm việc trên thiết bị: ${deviceName}`);
            }
        },
        khoaVinhVienIP(ip) {
            if (confirm(`Bạn có chắc chắn muốn đưa IP ${ip} vào danh sách đen WAF và chặn vĩnh viễn?`)) {
                if (this.$toast) {
                    this.$toast.success(`Đã thêm IP ${ip} vào danh sách đen chặn tường lửa.`);
                }
            }
        }
    }
};
</script>

<style scoped>
.partner-security-page {
    font-family: inherit;
    color: #1e293b;
}

/* Page titles */
.page-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.02em;
}

.page-desc {
    font-size: 0.84rem;
    line-height: 1.5;
}

/* Badges & Tags */
.badge-tag-pill {
    display: inline-flex;
    align-items: center;
    padding: 3px 10px;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.3px;
    text-transform: uppercase;
}

.tag-pink {
    background-color: #ffe4e6;
    color: #e11d48;
}

.bg-pink {
    background-color: #e11d48 !important;
}

.bg-purple {
    background-color: #8b5cf6 !important;
}

.bg-cyan {
    background-color: #0891b2 !important;
}

.bg-pink-subtle {
    background-color: #ffe4e6 !important;
}

.bg-purple-subtle {
    background-color: #f3e8ff !important;
}

.bg-cyan-subtle {
    background-color: #cffafe !important;
}

.bg-light-pink-subtle {
    background-color: #fff1f2 !important;
}

.bg-danger-light-soft {
    background-color: #fef2f2 !important;
}

.bg-light-soft {
    background-color: #f8fafc !important;
}

.text-pink {
    color: #e11d48 !important;
}

.text-purple {
    color: #8b5cf6 !important;
}

.text-cyan {
    color: #0891b2 !important;
}

/* Buttons */
.btn-pink-gradient {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    border: none;
    transition: all 0.2s;
}

.btn-pink-gradient:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.35);
}

.btn-purple-gradient {
    background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
    border: none;
    transition: all 0.2s;
}

.btn-purple-gradient:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(124, 58, 237, 0.35);
}

.btn-outline-pink {
    color: #e11d48;
    border-color: #f43f5e;
    background: #ffffff;
}

.btn-outline-pink:hover {
    background-color: #ffe4e6;
    color: #be123c;
}

.btn-icon-round {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #f1f5f9;
    border: none;
    transition: background 0.15s;
}

.btn-icon-round:hover {
    background: #e2e8f0;
}

/* KPI Cards */
.kpi-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 16px 18px;
    border: 1px solid #f1f5f9;
    transition: transform 0.2s, box-shadow 0.2s;
}

.kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05) !important;
}

.kpi-label {
    font-size: 0.68rem;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.kpi-value {
    font-size: 1.18rem;
    font-weight: 800;
    line-height: 1.2;
}

.kpi-icon-wrap {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.icon-pink {
    background: #ffe4e6;
    color: #e11d48;
}

.icon-purple {
    background: #f3e8ff;
    color: #8b5cf6;
}

.icon-blue {
    background: #e0f2fe;
    color: #0284c7;
}

.icon-orange {
    background: #ffedd5;
    color: #ea580c;
}

/* Section Icons */
.section-icon-badge {
    width: 34px;
    height: 34px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.feature-icon-badge {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

/* Master Avatar */
.master-avatar {
    width: 64px;
    height: 64px;
    object-fit: cover;
    border: 3px solid #ffffff;
}

.master-avatar-badge {
    position: absolute;
    bottom: -2px;
    right: -2px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #ffffff;
}

/* Password Box & Strength Bar */
.password-update-box {
    border-color: #f1f5f9 !important;
}

.strength-meter-bar {
    height: 6px;
    border-radius: 3px;
    overflow: hidden;
}

.meter-segment {
    flex: 1;
    height: 100%;
    border-radius: 2px;
}

.segment-pink {
    background-color: #e11d48;
}

.segment-purple {
    background-color: #8b5cf6;
}

.segment-cyan {
    background-color: #06b6d4;
}

.segment-gray {
    background-color: #e2e8f0;
}

/* Switches */
.custom-switch-pink:checked {
    background-color: #e11d48;
    border-color: #e11d48;
}

.custom-switch-purple:checked {
    background-color: #8b5cf6;
    border-color: #8b5cf6;
}

/* Sub-Account Cards */
.sub-account-card {
    background: #ffffff;
    transition: transform 0.2s, box-shadow 0.2s;
}

.sub-account-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
}

.sub-avatar {
    width: 44px;
    height: 44px;
    object-fit: cover;
}

.status-indicator-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
}

/* Session Items */
.session-device-icon {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.font-9 {
    font-size: 0.58rem;
}

.font-10 {
    font-size: 0.64rem;
}

.font-11 {
    font-size: 0.70rem;
}

.font-12 {
    font-size: 0.76rem;
}

.font-13 {
    font-size: 0.82rem;
}

.font-14 {
    font-size: 0.88rem;
}

.font-15 {
    font-size: 0.94rem;
}

.font-16 {
    font-size: 1rem;
}

.font-22 {
    font-size: 1.375rem;
}
</style>
