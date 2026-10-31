<template>
    <div class="user-management-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">DANANG SMART-TRIP SECURE DIRECTORY</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">Quản Lý Tài Khoản Người Dùng Toàn Sàn</h2>
                <p class="text-muted font-13 mb-0" style="max-width: 820px;">
                    Hệ thống định danh KYC, giám sát trạng thái kích hoạt, phân quyền vai trò, lịch sử đơn hàng và an ninh tài khoản của 148.920 thành viên hệ sinh thái Smart Travel Đà Nẵng.
                </p>
            </div>

            <!-- Top Action Buttons -->
            <div class="d-flex flex-column align-items-end gap-2">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-1" @click="xuatCsv">
                        <i class="bx bx-download text-primary font-16"></i>
                        <span>Xuất Dữ Liệu (CSV)</span>
                    </button>
                    <button class="btn btn-outline-danger rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-1" style="background-color: #FFF1F2; border-color: #FECDD3; color: #DC2626;" @click="khoaHangLoatSpam">
                        <i class="bx bx-shield-x font-16"></i>
                        <span>Khóa Hàng Loạt Spam</span>
                    </button>
                </div>
                <button class="btn btn-pink-gradient text-white rounded-pill px-4 py-2 font-12 fw-bold shadow-sm d-flex align-items-center gap-1" @click="openModalThem">
                    <i class="bx bx-user-plus font-16"></i>
                    <span>+ Thêm Người Dùng Thủ Công</span>
                </button>
            </div>
        </div>

        <!-- 4 KPI Metrics Cards -->
        <div class="row g-3 mb-4">
            <!-- KPI 1: Tổng người dùng sàn -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 42px; height: 42px;">
                            <i class="bx bx-group font-20" style="color: #E11D48;"></i>
                        </div>
                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">
                            ↗ +14.2% / tháng
                        </span>
                    </div>
                    <div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">TỔNG NGƯỜI DÙNG SÀN</div>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <span class="font-26 fw-bold text-dark">148.920</span>
                            <span class="text-muted font-11">tài khoản</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KPI 2: Du khách cá nhân đã KYC -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 42px; height: 42px;">
                            <i class="bx bx-id-card font-20" style="color: #7C3AED;"></i>
                        </div>
                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #F5F3FF; color: #7C3AED;">
                            99.3% đạt chuẩn
                        </span>
                    </div>
                    <div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">DU KHÁCH CÁ NHÂN ĐÃ KYC</div>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <span class="font-26 fw-bold text-dark">147.980</span>
                            <span class="text-muted font-11">du khách</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KPI 3: Đại diện doanh nghiệp đối tác -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #E0F2FE; width: 42px; height: 42px;">
                            <i class="bx bx-buildings font-20" style="color: #0284C7;"></i>
                        </div>
                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #E0F2FE; color: #0284C7;">
                            B2B Partner
                        </span>
                    </div>
                    <div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">ĐẠI DIỆN DOANH NGHIỆP ĐỐI TÁC</div>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <span class="font-26 fw-bold" style="color: #0284C7;">856</span>
                            <span class="text-muted font-11">doanh nghiệp</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KPI 4: Cảnh báo vi phạm / Tạm khóa -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FEE2E2; width: 42px; height: 42px;">
                            <i class="bx bx-error-alt font-20" style="color: #DC2626;"></i>
                        </div>
                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FEE2E2; color: #DC2626;">
                            Bot AI Guard
                        </span>
                    </div>
                    <div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">CẢNH BÁO VI PHẠM / TẠM KHÓA</div>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <span class="font-26 fw-bold text-danger">14</span>
                            <span class="text-muted font-11">tài khoản spam</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter & Search Bar Card -->
        <div class="card border-0 rounded-4 shadow-xs bg-white p-3 mb-4">
            <!-- Row 1: 4 Inputs -->
            <div class="row g-2 align-items-center mb-3">
                <div class="col-12 col-md-4">
                    <div class="position-relative">
                        <i class="bx bx-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted font-16"></i>
                        <input 
                            type="text" 
                            v-model="searchKeyword" 
                            class="form-control form-control-sm rounded-pill ps-5 bg-light border-0 font-12"
                            placeholder="Tìm theo Tên, Email, SĐT, User ID, C..."
                        />
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <select class="form-select form-select-sm rounded-pill bg-light border-0 font-12" v-model="filterRole">
                        <option value="">Tất cả vai trò</option>
                        <option value="vip">VIP Gold Member</option>
                        <option value="partner">Đại diện Đối tác</option>
                        <option value="customer">Du khách cá nhân</option>
                        <option value="spam">Cảnh báo Spam AI</option>
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <select class="form-select form-select-sm rounded-pill bg-light border-0 font-12" v-model="filterStatus">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active">Đang hoạt động</option>
                        <option value="online">Đang Online</option>
                        <option value="blocked">Đã bị khóa</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <select class="form-select form-select-sm rounded-pill bg-light border-0 font-12" v-model="filterSpending">
                        <option value="">Mức chi tiêu (Tất cả)</option>
                        <option value="high">Trên 10 triệu</option>
                        <option value="medium">1 - 10 triệu</option>
                        <option value="zero">Chưa phát sinh</option>
                    </select>
                </div>
            </div>

            <!-- Row 2: Quick Filter Pills -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 font-11">
                <div class="d-flex align-items-center gap-1-5 flex-wrap">
                    <span class="text-muted fw-bold">Lọc nhanh:</span>
                    <button 
                        class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold transition-all"
                        :class="quickFilter === 'all' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                        @click="quickFilter = 'all'"
                    >
                        Toàn bộ thành viên ⌄
                    </button>
                    <button 
                        class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-semibold transition-all d-flex align-items-center gap-1"
                        :class="quickFilter === 'online' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                        @click="quickFilter = 'online'"
                    >
                        <span class="dot-green"></span> Trực tuyến ngay bây giờ (4.180)
                    </button>
                    <button 
                        class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-semibold transition-all d-flex align-items-center gap-1"
                        :class="quickFilter === 'vip' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                        @click="quickFilter = 'vip'"
                    >
                        <i class="bx bxs-star text-warning"></i> Khách hàng VIP Gold (3.240)
                    </button>
                    <button 
                        class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-semibold transition-all d-flex align-items-center gap-1"
                        :class="quickFilter === 'spam' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                        @click="quickFilter = 'spam'"
                    >
                        <i class="bx bx-zap text-danger"></i> Cảnh báo Spam AI (14)
                    </button>
                </div>
                <a href="javascript:void(0)" class="text-muted text-decoration-none d-flex align-items-center gap-1" @click="resetFilters">
                    <i class="bx bx-reset"></i> Đặt lại bộ lọc
                </a>
            </div>
        </div>

        <!-- Master Users Table Container -->
        <div class="card border-0 rounded-4 shadow-xs bg-white overflow-hidden mb-4">
            <!-- Table Header Control Bar -->
            <div class="d-flex justify-content-between align-items-center p-3 px-4 border-bottom flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <input type="checkbox" class="form-check-input mt-0" :checked="isAllSelected" @change="toggleSelectAll" />
                    <span class="font-12 fw-bold text-dark text-uppercase tracking-wider">
                        CHỌN TẤT CẢ TRANG NÀY
                    </span>
                    <span class="font-12 text-muted">(Đã chọn: <b :class="selectedIds.length ? 'text-pink' : ''">{{ selectedIds.length }} tài khoản</b>)</span>
                </div>
                <div class="d-flex align-items-center gap-2 font-12">
                    <span class="text-muted">Sắp xếp:</span>
                    <select class="form-select form-select-sm rounded-pill font-12 bg-light border-0 w-auto" v-model="sortBy">
                        <option value="newest">Mới đăng ký gần nhất</option>
                        <option value="spending">Chi tiêu cao nhất</option>
                        <option value="activity">Hoạt động gần nhất</option>
                    </select>
                </div>
            </div>

            <!-- Table Responsive -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 font-12">
                    <thead style="background-color: #F8FAFC; border-bottom: 1px solid #E2E8F0;">
                        <tr class="font-11 text-muted text-uppercase tracking-wider">
                            <th class="ps-4 py-3" style="width: 48px;">
                                <input type="checkbox" class="form-check-input mt-0" :checked="isAllSelected" @change="toggleSelectAll" />
                            </th>
                            <th class="py-3" style="min-width: 250px;">HỌ TÊN & EMAIL ĐỊNH DANH</th>
                            <th class="py-3" style="min-width: 170px;">MÃ UID & ĐIỆN THOẠI</th>
                            <th class="py-3" style="min-width: 180px;">PHÂN NHÓM VAI TRÒ</th>
                            <th class="py-3" style="min-width: 240px;">ĐƠN ĐẶT & CHI TIÊU LŨY KẾ</th>
                            <th class="py-3 pe-4" style="min-width: 200px;">PHIÊN ĐĂNG NHẬP GẦN NHẤT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1: Lê Hoàng Nam (VIP Gold) -->
                        <tr :class="{ 'bg-pink-subtle-selected': selectedIds.includes(1) }">
                            <td class="ps-4 py-3">
                                <input type="checkbox" class="form-check-input mt-0" :value="1" v-model="selectedIds" />
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2-5">
                                    <div class="position-relative flex-shrink-0" style="width: 42px; height: 42px;">
                                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=60" alt="avatar" class="w-100 h-100 rounded-circle object-fit-cover border" />
                                        <span class="active-dot-green position-absolute"></span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-1 font-13 fw-bold text-dark">
                                            <span>Lê Hoàng Nam</span>
                                            <i class="bx bxs-check-circle text-primary font-14"></i>
                                        </div>
                                        <div class="text-muted font-11">nam.le@gmail.com</div>
                                        <div class="font-10 text-primary fw-medium font-mono cursor-pointer" @click="xemCccd('04808400****')">
                                            CCCD: 04808400****
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <div class="fw-bold font-mono text-dark font-12">USR-451299</div>
                                <div class="text-muted font-11">+84 912 458 921</div>
                            </td>
                            <td class="py-3">
                                <span class="badge rounded-pill font-11 fw-bold px-3 py-1" style="background-color: #FEF3C7; color: #B45309;">
                                    <i class="bx bxs-star me-1 font-12"></i> VIP Gold Member
                                </span>
                            </td>
                            <td class="py-3">
                                <div class="fw-bold font-12" style="color: #E11D48;">
                                    8 tour hoàn thành • 28.500.000 đ
                                </div>
                                <div class="font-11 text-muted d-flex align-items-center gap-1 mt-0-5" style="color: #7C3AED !important;">
                                    <i class="bx bx-sparkles font-12"></i> 12 lịch trình AI đã tạo
                                </div>
                            </td>
                            <td class="py-3 pe-4">
                                <div class="text-dark font-11 fw-semibold">3 giờ trước</div>
                                <div class="text-muted font-10">iOS App v2.4.1 • 118.69...</div>
                            </td>
                        </tr>

                        <!-- Row 2: Trần Văn Bảo (B2B Partner) -->
                        <tr :class="{ 'bg-pink-subtle-selected': selectedIds.includes(2) }">
                            <td class="ps-4 py-3">
                                <input type="checkbox" class="form-check-input mt-0" :value="2" v-model="selectedIds" />
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2-5">
                                    <div class="position-relative flex-shrink-0" style="width: 42px; height: 42px;">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60" alt="avatar" class="w-100 h-100 rounded-circle object-fit-cover border" />
                                        <span class="active-dot-green position-absolute"></span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-1 font-13 fw-bold text-dark">
                                            <span>Trần Văn Bảo</span>
                                            <i class="bx bxs-check-circle text-primary font-14"></i>
                                        </div>
                                        <div class="text-muted font-11">bao.tran@danangexplorer.com</div>
                                        <div class="font-10 text-primary fw-medium text-truncate" style="max-width: 200px;">
                                            DN: Cty TNHH Du Lịch Khám Phá ĐN
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <div class="fw-bold font-mono text-dark font-12">PTR-882019</div>
                                <div class="text-muted font-11">+84 905 888 123</div>
                            </td>
                            <td class="py-3">
                                <span class="badge rounded-pill font-11 fw-bold px-3 py-1" style="background-color: #E0F2FE; color: #0284C7;">
                                    <i class="bx bx-buildings me-1 font-12"></i> Đại diện Đối tác
                                </span>
                            </td>
                            <td class="py-3">
                                <div class="fw-bold font-12 text-primary" style="color: #0284C7 !important;">
                                    342 đơn tour cung cấp
                                </div>
                                <div class="font-11 text-muted mt-0-5">
                                    Doanh thu: <b>2.180.500.000 đ</b>
                                </div>
                            </td>
                            <td class="py-3 pe-4">
                                <div class="text-dark font-11 fw-semibold d-flex align-items-center gap-1">
                                    <span class="dot-green"></span> 15 phút trước
                                </div>
                                <div class="text-muted font-10">Partner Portal macOS • ...</div>
                            </td>
                        </tr>

                        <!-- Row 3: Nguyễn Thu Hà (Customer) -->
                        <tr :class="{ 'bg-pink-subtle-selected': selectedIds.includes(3) }">
                            <td class="ps-4 py-3">
                                <input type="checkbox" class="form-check-input mt-0" :value="3" v-model="selectedIds" />
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2-5">
                                    <div class="position-relative flex-shrink-0" style="width: 42px; height: 42px;">
                                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&auto=format&fit=crop&q=60" alt="avatar" class="w-100 h-100 rounded-circle object-fit-cover border" />
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-1 font-13 fw-bold text-dark">
                                            <span>Nguyễn Thu Hà</span>
                                        </div>
                                        <div class="text-muted font-11">ha.nguyen@outlook.com</div>
                                        <div class="font-10 text-muted fst-italic">
                                            KYC Cấp 1 (SĐT xác thực)
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <div class="fw-bold font-mono text-dark font-12">USR-998231</div>
                                <div class="text-muted font-11">+84 988 341 009</div>
                            </td>
                            <td class="py-3">
                                <span class="badge rounded-pill font-11 fw-bold px-3 py-1" style="background-color: #F5F3FF; color: #7C3AED;">
                                    <i class="bx bx-user me-1 font-12"></i> Du khách cá nhân
                                </span>
                            </td>
                            <td class="py-3">
                                <div class="fw-bold font-12 text-dark">
                                    1 tour đã đặt • 1.250.000 đ
                                </div>
                                <div class="font-11 text-muted d-flex align-items-center gap-1 mt-0-5">
                                    <i class="bx bx-map font-12 text-primary"></i> 2 lịch trình AI Đà Nẵng 3N2Đ
                                </div>
                            </td>
                            <td class="py-3 pe-4">
                                <span class="badge rounded-pill font-10 fw-bold px-2-5 py-1 d-inline-flex align-items-center gap-1" style="background-color: #DCFCE7; color: #16A34A;">
                                    <span class="dot-green"></span> Đang Online
                                </span>
                                <div class="text-muted font-10 mt-1">Web Chrome 124 • 42.1...</div>
                            </td>
                        </tr>

                        <!-- Row 4: Nguyễn Văn Hùng (Spam Blocked) -->
                        <tr :class="{ 'bg-pink-subtle-selected': selectedIds.includes(4) }">
                            <td class="ps-4 py-3">
                                <input type="checkbox" class="form-check-input mt-0" :value="4" v-model="selectedIds" />
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2-5">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center text-danger font-14 fw-bold flex-shrink-0" style="background-color: #FEE2E2; width: 42px; height: 42px;">
                                        NH
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-1 font-13 fw-bold text-danger">
                                            <span>Nguyễn Văn Hùng</span>
                                            <i class="bx bx-error font-14 text-danger"></i>
                                        </div>
                                        <div class="text-muted font-11">hung.spam@tempmail.com</div>
                                        <div class="font-10 text-danger fw-semibold">
                                            Email rác / Chưa định danh
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <div class="fw-bold font-mono text-danger font-12">BLK-001928</div>
                                <div class="text-muted font-11">+84 339 *** 812</div>
                            </td>
                            <td class="py-3">
                                <span class="badge rounded-pill font-11 fw-bold px-3 py-1" style="background-color: #FEE2E2; color: #DC2626;">
                                    <i class="bx bx-shield-x me-1 font-12"></i> Cảnh báo Spam AI
                                </span>
                            </td>
                            <td class="py-3">
                                <div class="fw-bold font-12 text-danger">
                                    Hủy 15 đơn ảo liên tiếp
                                </div>
                                <div class="font-11 text-danger mt-0-5">
                                    Spam 28 đánh giá 1 sao ảo
                                </div>
                            </td>
                            <td class="py-3 pe-4">
                                <div class="text-danger font-11 fw-bold">Khóa tự động: 24h</div>
                                <div class="text-muted font-10">Bot AI Guardian • Proxy IP...</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Footer: Quick Actions + Pagination -->
            <div class="d-flex justify-content-between align-items-center p-3 px-4 border-top flex-wrap gap-3 font-12">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <span class="text-muted fw-bold">Tác vụ nhanh:</span>
                    <button class="btn btn-sm btn-outline-secondary bg-white rounded-pill px-3 py-1 font-11 fw-semibold shadow-2xs" @click="ganNhanVip">
                        <i class="bx bxs-star text-warning me-1"></i> Gán nhãn Khách VIP
                    </button>
                    <button class="btn btn-sm btn-outline-secondary bg-white rounded-pill px-3 py-1 font-11 fw-semibold shadow-2xs" @click="guiEmailThongBao">
                        <i class="bx bx-envelope text-primary me-1"></i> Gửi Email thông báo hệ thống
                    </button>
                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3 py-1 font-11 fw-semibold shadow-2xs" style="border-color: #FECDD3;" @click="khoaTamThoi">
                        <i class="bx bx-lock-alt me-1"></i> Khóa tạm thời
                    </button>
                </div>

                <!-- Pagination Widget -->
                <div class="d-flex align-items-center gap-3">
                    <span class="text-muted font-11">
                        Hiển thị <b>1 - 4</b> trong tổng số <b>148.920</b> tài khoản
                    </span>
                    <div class="d-flex align-items-center gap-1">
                        <button class="btn btn-sm pagination-circle-btn" @click="page = 1">
                            |&lt;
                        </button>
                        <button class="btn btn-sm pagination-circle-btn" @click="page > 1 ? page-- : null">
                            &lt;
                        </button>
                        <button class="btn btn-sm pagination-circle-btn active">
                            1
                        </button>
                        <button class="btn btn-sm pagination-circle-btn" @click="page = 2">
                            2
                        </button>
                        <button class="btn btn-sm pagination-circle-btn" @click="page = 3">
                            3
                        </button>
                        <span class="text-muted px-1">...</span>
                        <button class="btn btn-sm pagination-circle-btn" @click="page = 14892">
                            14.892
                        </button>
                        <button class="btn btn-sm pagination-circle-btn" @click="page++">
                            &gt;
                        </button>
                        <button class="btn btn-sm pagination-circle-btn" @click="page = 14892">
                            &gt;|
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Security Card: Cơ Chế Bảo Vệ Tự Động AI Guardian Active -->
        <div class="card border-0 shadow-xs rounded-4 p-3 p-lg-4" style="background-color: #FDF2F8; border: 1px solid #FCE7F3 !important;">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 text-white" style="background-color: #E11D48; width: 44px; height: 44px;">
                        <i class="bx bx-bot font-24"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="font-14 fw-bold text-dark">Cơ Chế Bảo Vệ Tự Động AI Guardian Active</span>
                            <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5" style="background-color: #DCFCE7; color: #16A34A;">
                                Trực Tuyến 24/7
                            </span>
                        </div>
                        <div class="font-11 text-muted" style="max-width: 780px;">
                            Hệ thống tự động phát hiện mẫu hành vi bất thường (tạo đơn ảo không thanh toán, spam đánh giá ảo POI, tạo tài khoản từ IP proxy) và tự động cô lập tài khoản theo ngưỡng an toàn được cấu hình.
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-sm btn-outline-secondary bg-white rounded-pill px-3 py-2 font-11 fw-semibold shadow-2xs" @click="xemNhatKyAiBlock">
                        Xem Nhật Ký AI Block
                    </button>
                    <button class="btn btn-sm text-white rounded-pill px-3 py-2 font-11 fw-bold shadow-2xs" style="background-color: #7C3AED;" @click="cauHinhNguongChan">
                        Cấu Hình Ngưỡng Chặn
                    </button>
                </div>
            </div>
        </div>

        <!-- MODAL: THÊM NGƯỜI DÙNG THỦ CÔNG -->
        <div v-if="showModalThem" class="custom-modal-backdrop">
            <div class="custom-modal-content rounded-4 p-4 bg-white shadow-lg" style="max-width: 540px; width: 92%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark mb-0 font-16 d-flex align-items-center gap-2">
                        <i class="bx bx-user-plus text-pink"></i> Thêm Người Dùng Thủ Công
                    </h5>
                    <button class="btn btn-sm btn-light rounded-circle p-1" @click="showModalThem = false">
                        <i class="bx bx-x font-18"></i>
                    </button>
                </div>
                <div class="mb-3 font-12">
                    <label class="form-label font-11 fw-bold text-uppercase">Họ và tên *</label>
                    <input type="text" v-model="newUser.name" class="form-control font-12 rounded-3" placeholder="VD: Lê Hoàng Nam" />
                </div>
                <div class="row g-2 mb-3 font-12">
                    <div class="col-6">
                        <label class="form-label font-11 fw-bold text-uppercase">Email *</label>
                        <input type="email" v-model="newUser.email" class="form-control font-12 rounded-3" placeholder="name@example.com" />
                    </div>
                    <div class="col-6">
                        <label class="form-label font-11 fw-bold text-uppercase">Số điện thoại *</label>
                        <input type="text" v-model="newUser.phone" class="form-control font-12 rounded-3" placeholder="+84 912..." />
                    </div>
                </div>
                <div class="mb-3 font-12">
                    <label class="form-label font-11 fw-bold text-uppercase">Phân nhóm vai trò</label>
                    <select v-model="newUser.role" class="form-select font-12 rounded-3">
                        <option value="customer">Du khách cá nhân</option>
                        <option value="vip">Khách hàng VIP Gold</option>
                        <option value="partner">Đại diện Doanh nghiệp Đối tác</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                    <button class="btn btn-sm btn-light rounded-pill px-3" @click="showModalThem = false">Hủy</button>
                    <button class="btn btn-sm btn-pink-gradient text-white rounded-pill px-4 fw-bold" @click="submitThemUser">
                        Tạo Tài Khoản
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'QuanLyNguoiDungAdminComponent',
    data() {
        return {
            searchKeyword: '',
            filterRole: '',
            filterStatus: '',
            filterSpending: '',
            quickFilter: 'all',
            sortBy: 'newest',
            page: 1,
            selectedIds: [],
            showModalThem: false,

            newUser: {
                name: '',
                email: '',
                phone: '',
                role: 'customer'
            }
        };
    },
    computed: {
        isAllSelected() {
            return this.selectedIds.length === 4;
        }
    },
    methods: {
        toggleSelectAll(e) {
            if (e.target.checked) {
                this.selectedIds = [1, 2, 3, 4];
            } else {
                this.selectedIds = [];
            }
        },
        resetFilters() {
            this.searchKeyword = '';
            this.filterRole = '';
            this.filterStatus = '';
            this.filterSpending = '';
            this.quickFilter = 'all';
            alert('Đã đặt lại tất cả bộ lọc tìm kiếm.');
        },
        xuatCsv() {
            alert('Đang trích xuất toàn bộ dữ liệu 148.920 người dùng hệ sinh thái Smart Travel Đà Nẵng định dạng CSV...');
        },
        khoaHangLoatSpam() {
            if (confirm('Bạn có chắc muốn tự động khóa vĩnh viễn 14 tài khoản bị Bot AI Guardian gắn cờ Spam đơn ảo?')) {
                alert('Đã khóa hàng loạt 14 tài khoản spam thành công!');
            }
        },
        openModalThem() {
            this.newUser = {
                name: '',
                email: '',
                phone: '',
                role: 'customer'
            };
            this.showModalThem = true;
        },
        submitThemUser() {
            if (!this.newUser.name.trim() || !this.newUser.email.trim()) {
                alert('Vui lòng nhập họ tên và email hợp lệ!');
                return;
            }
            this.showModalThem = false;
            alert(`Đã thêm tài khoản "${this.newUser.name}" thành công!`);
        },
        xemCccd(num) {
            alert(`Đang mở chi tiết định danh CCCD ${num} đã được xác thực mã hóa WGS84.`);
        },
        ganNhanVip() {
            if (!this.selectedIds.length) {
                alert('Vui lòng chọn ít nhất một người dùng từ danh sách!');
                return;
            }
            alert(`Đã gán nhãn VIP Gold Member cho ${this.selectedIds.length} tài khoản được chọn!`);
        },
        guiEmailThongBao() {
            if (!this.selectedIds.length) {
                alert('Vui lòng chọn ít nhất một người dùng từ danh sách!');
                return;
            }
            alert(`Đã mở trình gửi email thông báo hệ thống tới ${this.selectedIds.length} tài khoản.`);
        },
        khoaTamThoi() {
            if (!this.selectedIds.length) {
                alert('Vui lòng chọn ít nhất một người dùng từ danh sách!');
                return;
            }
            if (confirm(`Bạn có chắc muốn tạm khóa ${this.selectedIds.length} tài khoản này?`)) {
                alert(`Đã tạm khóa ${this.selectedIds.length} tài khoản thành công!`);
            }
        },
        xemNhatKyAiBlock() {
            alert('Đang hiển thị nhật ký phát hiện và tự động chặn hành vi bất thường từ AI Guardian.');
        },
        cauHinhNguongChan() {
            alert('Đang mở bảng cấu hình ngưỡng bảo vệ: hủy > 5 đơn liên tiếp, spam review, proxy IP.');
        }
    }
};
</script>

<style scoped>
.user-management-page {
    background-color: #F8FAFC;
    min-height: 100vh;
}

.font-28 { font-size: 28px; }
.font-26 { font-size: 26px; }
.font-24 { font-size: 24px; }
.font-20 { font-size: 20px; }
.font-18 { font-size: 18px; }
.font-16 { font-size: 16px; }
.font-15 { font-size: 15px; }
.font-14 { font-size: 14px; }
.font-13 { font-size: 13px; }
.font-12 { font-size: 12px; }
.font-11 { font-size: 11px; }
.font-10 { font-size: 10px; }
.font-9 { font-size: 9px; }
.font-8 { font-size: 8px; }

.font-mono {
    font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, Courier, monospace;
}

.text-pink { color: #E11D48 !important; }
.text-purple { color: #7C3AED !important; }
.text-cyan { color: #0284C7 !important; }

.pulse-dot-pink {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #E11D48;
    display: inline-block;
    box-shadow: 0 0 0 0 rgba(225, 29, 72, 0.7);
    animation: pulsePink 2s infinite;
}

@keyframes pulsePink {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(225, 29, 72, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(225, 29, 72, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(225, 29, 72, 0); }
}

.dot-green {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #16A34A;
    display: inline-block;
}

.active-dot-green {
    width: 9px;
    height: 9px;
    border-radius: 50%;
    background-color: #10B981;
    border: 1.5px solid #FFFFFF;
    bottom: 0;
    right: 0;
}

.btn-pink-gradient {
    background: linear-gradient(135deg, #E11D48 0%, #BE123C 100%);
    border: none;
    transition: all 0.2s ease;
}

.btn-pink-gradient:hover {
    background: linear-gradient(135deg, #BE123C 0%, #9F1239 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.25);
}

.shadow-xs { box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05); }
.shadow-2xs { box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04); }

.cursor-pointer { cursor: pointer; }

.bg-pink-subtle-selected {
    background-color: #FFF5F7 !important;
}

.pagination-circle-btn {
    min-width: 28px;
    height: 28px;
    padding: 0 6px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    border: 1px solid #E2E8F0;
    color: #475569;
    font-weight: 600;
    font-size: 11px;
    background-color: #FFFFFF;
}

.pagination-circle-btn.active {
    background-color: #E11D48 !important;
    border-color: #E11D48 !important;
    color: #FFFFFF !important;
}

.p-2-5 { padding: 10px; }
.gap-1-5 { gap: 6px; }
.gap-2-5 { gap: 10px; }
.tracking-wider { letter-spacing: 0.05em; }

/* Modals */
.custom-modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(15, 23, 42, 0.55);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1050;
    backdrop-filter: blur(2px);
}

.custom-modal-content {
    animation: modalScaleIn 0.2s ease-out;
}

@keyframes modalScaleIn {
    from { transform: scale(0.95); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.transition-all {
    transition: all 0.2s ease;
}
</style>
