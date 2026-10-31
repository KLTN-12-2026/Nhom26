<template>
    <div class="admin-account-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">Super Admin Console</span>
                    <span class="text-muted font-11 ms-1">Cập nhật 2 phút trước</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">Quản Lý Tài Khoản Quản Trị Viên (Admin)</h2>
                <p class="text-muted font-13 mb-0" style="max-width: 860px;">
                    Kiểm soát cơ cấu nhân sự điều hành, phân bổ chức vụ RBAC, giám sát phiên làm việc bảo mật và tra cứu lịch sử thao tác hệ thống SmartTrip Đà Nẵng.
                </p>
            </div>
            
            <!-- Top Action Buttons -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button class="btn btn-outline-secondary rounded-pill px-3 py-2 font-12 fw-semibold shadow-xs d-flex align-items-center gap-2" style="background-color: #F5F3FF; color: #7C3AED; border: 1px solid #DDD6FE;" @click="openModalAuditLog">
                    <i class="bx bx-history font-16"></i>
                    <span>Kiểm Tra Nhật Ký Truy Cập</span>
                </button>
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-xs d-flex align-items-center gap-2" @click="xuatDanhSach">
                    <i class="bx bx-download text-primary font-16"></i>
                    <span>Xuất Danh Sách Nhân Sự</span>
                </button>
                <button class="btn btn-pink-gradient text-white rounded-pill px-3 py-2 font-12 fw-bold shadow-xs d-flex align-items-center gap-1" @click="openModalThemAdmin">
                    <i class="bx bx-user-plus font-16"></i>
                    <span>+ Thêm Mới Quản Trị Viên</span>
                </button>
            </div>
        </div>

        <!-- 4 KPI Metrics Cards -->
        <div class="row g-3 mb-4">
            <!-- KPI 1: Tổng Quản Trị Viên -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">TỔNG QUẢN TRỊ VIÊN</div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">12</span>
                                <span class="badge rounded-pill font-11 fw-semibold px-2 py-0.5" style="background-color: #FFF1F2; color: #E11D48;">
                                    Định mức: 15
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 44px; height: 44px;">
                            <i class="bx bx-id-card font-22" style="color: #E11D48;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-muted font-11 d-flex align-items-center gap-1">
                            <i class="bx bx-group font-13 text-secondary"></i>
                            Phù đủ 5 bộ phận vận hành cốt lõi
                        </small>
                    </div>
                </div>
            </div>

            <!-- KPI 2: Đang Trực Tuyến -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">ĐANG TRỰC TUYẾN</div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">05</span>
                                <span class="badge rounded-pill font-11 fw-semibold px-2 py-0.5 d-flex align-items-center gap-1" style="background-color: #E0F2FE; color: #0284C7;">
                                    <span class="dot-sm" style="background-color: #0284C7;"></span> Live Session
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 44px; height: 44px;">
                            <i class="bx bx-broadcast font-22" style="color: #7C3AED;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-muted font-11 d-flex align-items-center gap-1">
                            <i class="bx bx-desktop font-13 text-secondary"></i>
                            3 Desktop Đà Nẵng, 2 Remote IP
                        </small>
                    </div>
                </div>
            </div>

            <!-- KPI 3: Tài Khoản Tạm Khóa -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">TÀI KHOẢN TẠM KHÓA</div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="font-28 fw-bold text-danger">01</span>
                                <span class="badge rounded-pill font-11 fw-semibold px-2 py-0.5" style="background-color: #FEE2E2; color: #DC2626;">
                                    ADM-009
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FEF2F2; width: 44px; height: 44px;">
                            <i class="bx bx-lock-alt font-22 text-danger"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-danger font-11 d-flex align-items-center gap-1">
                            <i class="bx bx-error font-13"></i>
                            Sai mật khẩu 5 lần • Chờ xác minh
                        </small>
                    </div>
                </div>
            </div>

            <!-- KPI 4: 2FA Authentication -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">XÁC THỰC HAI YẾU TỐ (2FA)</div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="font-28 fw-bold" style="color: #0284C7;">100%</span>
                                <span class="badge rounded-pill font-11 fw-semibold px-2 py-0.5" style="background-color: #E0F2FE; color: #0284C7;">
                                    12/12 Đã Bật
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F0F9FF; width: 44px; height: 44px;">
                            <i class="bx bx-shield-quarter font-22" style="color: #0284C7;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-muted font-11 d-flex align-items-center gap-1">
                            <i class="bx bx-check-shield font-13 text-success"></i>
                            Chuẩn TOTP Google Auth / YubiKey
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search & Filter Controls -->
        <div class="card border-0 rounded-4 shadow-xs bg-white mb-4">
            <div class="card-body p-3">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div class="d-flex flex-wrap align-items-center gap-2 flex-grow-1" style="max-width: 800px;">
                        <div class="search-input-box position-relative flex-grow-1" style="min-width: 280px;">
                            <i class="bx bx-search position-absolute top-50 translate-middle-y text-muted font-16" style="left: 14px;"></i>
                            <input type="text" 
                                class="form-control form-control-sm rounded-pill ps-5 pe-3 font-12 bg-light border-light-subtle" 
                                placeholder="Tìm tên, email công vụ, mã nhân sự (ADM-001)..."
                                v-model="searchQuery" />
                        </div>
                        <div style="min-width: 170px;">
                            <select class="form-select form-select-sm rounded-3 font-12 bg-light border-light-subtle" v-model="filterRole">
                                <option value="">Tất cả chức vụ</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Moderator Tour">Moderator Tour</option>
                                <option value="GIS & Địa Điểm POI">GIS & Địa Điểm POI</option>
                                <option value="Finance & Voucher">Finance & Voucher</option>
                                <option value="Xử Lý Tranh Chấp">Xử Lý Tranh Chấp</option>
                            </select>
                        </div>
                        <div style="min-width: 150px;">
                            <select class="form-select form-select-sm rounded-3 font-12 bg-light border-light-subtle" v-model="filterStatus">
                                <option value="">Tất cả trạng thái</option>
                                <option value="online">Trực tuyến</option>
                                <option value="offline">Ngoại tuyến</option>
                                <option value="locked">Tạm khóa</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2 font-12 text-muted">
                        <span>Hiển thị: <b>{{ pagedStaffs.length }} / {{ filteredStaffs.length }} nhân sự</b></span>
                        <button class="btn btn-sm btn-icon-round text-muted" @click="resetFilters" title="Làm mới bộ lọc">
                            <i class="bx bx-refresh font-18"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 Columns Main Layout -->
        <div class="row g-4">
            <!-- Left Column: Master Staff Table -->
            <div class="col-12 col-xl-8">
                <div class="card border-0 rounded-4 shadow-xs bg-white h-100 overflow-hidden d-flex flex-column justify-content-between">
                    <div>
                        <!-- Table Header Bar -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 p-3 px-4 border-bottom bg-white">
                            <div>
                                <h6 class="fw-bold text-dark font-14 mb-0.5">Danh Sách Nhân Viên Quản Trị Hệ Thống</h6>
                                <small class="text-muted font-11">Nhấp vào dòng để xem chi tiết quyền hạn RBAC và nhật ký tác vụ</small>
                            </div>
                            <span class="badge rounded-pill font-11 fw-semibold px-2-5 py-1 text-purple" style="background-color: #F5F3FF; border: 1px solid #DDD6FE;">
                                <i class="bx bx-shield-alt font-12 me-1"></i> Database: RBAC Sync Active
                            </span>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead style="background-color: #F8FAFC; border-bottom: 1px solid #E2E8F0;">
                                    <tr class="font-11 text-muted text-uppercase tracking-wider">
                                        <th class="ps-4 py-3" style="min-width: 220px;">NHÂN SỰ / MÃ ID</th>
                                        <th class="py-3" style="min-width: 150px;">CHỨC VỤ ĐẢM NHIỆM</th>
                                        <th class="py-3 text-center" style="min-width: 120px;">CHỨC NĂNG (QUYỀN)</th>
                                        <th class="py-3" style="min-width: 180px;">PHIÊN ĐĂNG NHẬP CUỐI</th>
                                        <th class="py-3 pe-4 text-center" style="min-width: 100px;">TRẠNG THÁI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="staff in pagedStaffs" :key="staff.id" 
                                        :class="{ 'bg-active-row': selectedStaff && selectedStaff.id === staff.id }"
                                        class="cursor-pointer" 
                                        @click="selectStaff(staff)">
                                        <!-- Col 1: Nhân Sự / Mã ID -->
                                        <td class="ps-4 py-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="position-relative flex-shrink-0">
                                                    <img :src="staff.avatar" :alt="staff.name" class="rounded-circle object-fit-cover shadow-xs border" style="width: 44px; height: 44px;" />
                                                    <span v-if="staff.status === 'online'" class="status-dot-avatar bg-success"></span>
                                                    <span v-else-if="staff.status === 'locked'" class="status-dot-avatar bg-danger"></span>
                                                    <span v-else class="status-dot-avatar bg-secondary"></span>
                                                </div>
                                                <div>
                                                    <div class="d-flex align-items-center gap-1.5">
                                                        <span class="fw-bold text-dark font-13">{{ staff.name }}</span>
                                                        <span class="badge-adm-id font-10 fw-bold font-monospace">{{ staff.code }}</span>
                                                    </div>
                                                    <div class="text-muted font-11 text-truncate" style="max-width: 160px;">
                                                        {{ staff.email }}
                                                    </div>
                                                    <div v-if="staff.lockReason" class="font-10 text-danger fw-semibold mt-0.5">
                                                        {{ staff.lockReason }}
                                                    </div>
                                                    <div v-else class="text-muted font-11">
                                                        {{ staff.phone }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Col 2: Chức vụ đảm nhiệm -->
                                        <td class="py-3">
                                            <span class="badge rounded-pill font-11 fw-bold px-3 py-1-5 d-inline-flex align-items-center gap-1 shadow-xs" :style="{ backgroundColor: staff.roleBg, color: staff.roleColor, border: staff.roleBorder ? '1px solid ' + staff.roleBorder : 'none' }">
                                                <i :class="staff.roleIcon" class="font-13"></i>
                                                {{ staff.role }}
                                            </span>
                                        </td>

                                        <!-- Col 3: Chức năng (Quyền) -->
                                        <td class="py-3 text-center">
                                            <span class="badge rounded-pill font-11 fw-semibold px-2-5 py-1" :style="{ backgroundColor: staff.permBg, color: staff.permColor }">
                                                {{ staff.permsText }}
                                            </span>
                                        </td>

                                        <!-- Col 4: Phiên đăng nhập cuối -->
                                        <td class="py-3">
                                            <div class="d-flex flex-column font-11">
                                                <div :class="staff.sessionColor ? staff.sessionColor : 'fw-bold text-dark'">
                                                    {{ staff.lastActive }}
                                                </div>
                                                <div class="text-muted text-truncate" style="max-width: 170px;">
                                                    {{ staff.lastIpDevice }}
                                                </div>
                                                <div v-if="staff.location" class="font-11" style="color: #0284C7;">
                                                    {{ staff.location }}
                                                </div>
                                                <div v-if="staff.errorNote" class="text-danger font-10 fw-semibold">
                                                    {{ staff.errorNote }}
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Col 5: Trạng thái -->
                                        <td class="py-3 pe-4 text-center">
                                            <span v-if="staff.status === 'online'" class="badge-status-online font-11 fw-semibold">
                                                <span class="dot-sm bg-primary"></span> Trực tuyến
                                            </span>
                                            <span v-else-if="staff.status === 'locked'" class="badge-status-locked font-11 fw-semibold">
                                                <span class="dot-sm bg-danger"></span> Đã khóa
                                            </span>
                                            <span v-else class="badge-status-offline font-11 fw-semibold">
                                                <span class="dot-sm bg-secondary"></span> Ngoại tuyến
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Table Bottom Pagination -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 p-3 px-4 border-top font-12">
                        <div class="text-muted">
                            Hiển thị <b>1 - {{ pagedStaffs.length }}</b> trên tổng số <b>{{ filteredStaffs.length }}</b> nhân sự quản trị
                        </div>

                        <!-- Pagination Controls -->
                        <div class="d-flex align-items-center gap-1">
                            <button class="btn btn-sm btn-icon-round text-muted" :disabled="currentPage === 1" @click="currentPage--">
                                <i class="bx bx-chevron-left font-18"></i>
                            </button>
                            <button class="btn btn-sm pagination-circle-btn active" @click="currentPage = 1">1</button>
                            <button class="btn btn-sm pagination-circle-btn" @click="currentPage = 2">2</button>
                            <button class="btn btn-sm pagination-circle-btn" @click="currentPage = 3">3</button>
                            <button class="btn btn-sm btn-icon-round text-muted" :disabled="currentPage >= totalPages" @click="currentPage++">
                                <i class="bx bx-chevron-right font-18"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Detail Profile & Audit Logs -->
            <div class="col-12 col-xl-4">
                <div class="d-flex flex-column gap-3">
                    <!-- Profile Card -->
                    <div class="card border-0 rounded-4 shadow-xs bg-white p-3 p-lg-4" v-if="selectedStaff">
                        <!-- Top Avatar & Name -->
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <img :src="selectedStaff.avatar" :alt="selectedStaff.name" class="rounded-circle object-fit-cover shadow-xs border" style="width: 58px; height: 58px;" />
                                <div>
                                    <div class="d-flex align-items-center gap-1.5">
                                        <h5 class="fw-bold text-dark font-15 mb-0">{{ selectedStaff.name }}</h5>
                                        <span class="badge rounded-pill font-10 fw-bold px-2 py-0.5 text-white" style="background-color: #E11D48;">ROOT</span>
                                    </div>
                                    <small class="text-muted font-11 d-block mt-0.5">
                                        {{ selectedStaff.code }} • {{ selectedStaff.dept || 'Kỹ thuật & Vận hành' }}
                                    </small>
                                    <span class="font-11 fw-semibold d-inline-flex align-items-center gap-1 mt-1" style="color: #0284C7;">
                                        <span class="dot-sm" style="background-color: #0284C7;"></span> Đang hoạt động trên hệ thống
                                    </span>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-icon-round text-muted" @click="moCuaSoChiTiet(selectedStaff)" title="Mở toàn màn hình">
                                <i class="bx bx-export font-18"></i>
                            </button>
                        </div>

                        <!-- Phân Nhóm Quyền Hạn (RBAC) -->
                        <div class="mb-3 pt-3 border-top">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="font-11 text-muted fw-bold text-uppercase tracking-wider">Phân Nhóm Quyền Hạn (RBAC)</span>
                                <span class="font-11 fw-bold" style="color: #E11D48;">Toàn quyền (42/42)</span>
                            </div>
                            <div class="d-flex flex-wrap gap-1.5">
                                <span class="badge rounded-pill font-11 fw-medium px-2-5 py-1" style="background-color: #FDF2F8; color: #E11D48; border: 1px solid #FCE7F3;">
                                    <i class="bx bx-shield-quarter me-1"></i> Quản trị Q...
                                </span>
                                <span class="badge rounded-pill font-11 fw-medium px-2-5 py-1" style="background-color: #F5F3FF; color: #7C3AED; border: 1px solid #EDE9FE;">
                                    <i class="bx bx-user-check me-1"></i> Gán chức v...
                                </span>
                                <span class="badge rounded-pill font-11 fw-medium px-2-5 py-1" style="background-color: #E0F2FE; color: #0284C7; border: 1px solid #BAE6FD;">
                                    <i class="bx bx-check-double me-1"></i> Phê duyệt ...
                                </span>
                                <span class="badge rounded-pill font-11 fw-medium px-2-5 py-1" style="background-color: #FFF1F2; color: #E11D48; border: 1px solid #FDA4AF;">
                                    <i class="bx bx-cog me-1"></i> Cấu hình t...
                                </span>
                            </div>
                        </div>

                        <!-- Bảo mật xác thực Details -->
                        <div class="mb-3 pt-3 border-top font-12">
                            <div class="d-flex justify-content-between align-items-center py-1">
                                <span class="text-muted">Bảo mật xác thực:</span>
                                <span class="badge rounded-pill font-11 fw-bold px-2 py-0.5 text-success" style="background-color: #DCFCE7;">
                                    <i class="bx bx-check me-1"></i> 2FA TOTP Hoạt Động
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center py-1">
                                <span class="text-muted">Địa chỉ IP an toàn:</span>
                                <span class="fw-bold text-dark font-11">118.69.182.4 (Đà Nẵng)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center py-1">
                                <span class="text-muted">Hạn chứng thư Token:</span>
                                <span class="fw-semibold text-dark font-11">Còn 6 ngày 14 giờ</span>
                            </div>
                        </div>

                        <!-- Profile Action Buttons -->
                        <div class="d-flex gap-2 pt-2 border-top">
                            <button class="btn btn-sm rounded-pill px-3 py-1-5 font-12 fw-bold text-white flex-grow-1" style="background-color: #7C3AED;" @click="openModalDoiChucVu">
                                <i class="bx bx-transfer-alt me-1"></i> Đổi Chức Vụ
                            </button>
                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1-5 font-12 fw-semibold bg-white flex-grow-1" @click="openModalCapLaiMatKhau">
                                <i class="bx bx-key me-1"></i> Cấp Lại Mật Khẩu
                            </button>
                        </div>
                    </div>

                    <!-- Audit Log Card (Nhật Ký Nghiệp Vụ Gần Đây) -->
                    <div class="card border-0 rounded-4 shadow-xs bg-white p-3 p-lg-4">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <div class="d-flex align-items-center gap-1.5">
                                <i class="bx bx-revision font-16" style="color: #7C3AED;"></i>
                                <h6 class="fw-bold text-dark font-14 mb-0">Nhật Ký Nghiệp Vụ Gần Đây</h6>
                            </div>
                            <span class="font-11 fw-bold text-cyan" style="color: #0284C7;">Realtime Sync</span>
                        </div>
                        <p class="text-muted font-11 mb-3">Ghi nhận tự động từ thực thể <code>nhat_ky_nghiep_vu</code></p>

                        <!-- Timeline Log Items -->
                        <div class="audit-timeline d-flex flex-column gap-3">
                            <!-- Log 1 -->
                            <div class="d-flex gap-2.5">
                                <span class="timeline-dot bg-pink mt-1 flex-shrink-0"></span>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="fw-bold text-dark font-12">Duyệt Tour "Bà Nà Hills Hoàng Hôn"</div>
                                        <small class="text-muted font-10">10:38 Sáng</small>
                                    </div>
                                    <p class="text-secondary font-11 mb-1 mt-0.5">
                                        Đã kiểm định giấy phép lữ hành và mở bán cho đối tác <b>Danang Travel Pro</b>.
                                    </p>
                                    <div class="d-flex align-items-center gap-1.5">
                                        <span class="badge rounded font-9 px-1.5 py-0.5 text-uppercase fw-bold" style="background-color: #FDF2F8; color: #E11D48;">
                                            TOUR_APPROVAL
                                        </span>
                                        <span class="text-muted font-10 font-monospace">ID: #ACT-9821</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Log 2 -->
                            <div class="d-flex gap-2.5">
                                <span class="timeline-dot bg-cyan mt-1 flex-shrink-0"></span>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="fw-bold text-dark font-12">Cập nhật tọa độ POI Cầu Rồng</div>
                                        <small class="text-muted font-10">Hôm qua 16:15</small>
                                    </div>
                                    <p class="text-secondary font-11 mb-1 mt-0.5">
                                        Điều chỉnh vị trí phun lửa/nước và bổ sung thẻ ảnh 360 VR cho kho dữ liệu AI.
                                    </p>
                                    <div class="d-flex align-items-center gap-1.5">
                                        <span class="badge rounded font-9 px-1.5 py-0.5 text-uppercase fw-bold" style="background-color: #E0F2FE; color: #0284C7;">
                                            POI_UPDATE
                                        </span>
                                        <span class="text-muted font-10 font-monospace">ID: #ACT-9780</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Log 3 -->
                            <div class="d-flex gap-2.5">
                                <span class="timeline-dot bg-blue mt-1 flex-shrink-0"></span>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="fw-bold text-dark font-12">Cấu hình Flash Sale Voucher Sàn</div>
                                        <small class="text-muted font-10">18/05 09:20</small>
                                    </div>
                                    <p class="text-secondary font-11 mb-1 mt-0.5">
                                        Kích hoạt mã giảm 30% Lễ hội Pháo hoa Quốc tế Đà Nẵng (DIFF 2025).
                                    </p>
                                    <div class="d-flex align-items-center gap-1.5">
                                        <span class="badge rounded font-9 px-1.5 py-0.5 text-uppercase fw-bold" style="background-color: #EDE9FE; color: #7C3AED;">
                                            VOUCHER_CONFIG
                                        </span>
                                        <span class="text-muted font-10 font-monospace">ID: #ACT-9654</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Link -->
                        <div class="pt-3 border-top mt-3 text-center">
                            <button class="btn btn-sm btn-link text-decoration-none text-muted font-12 fw-semibold p-0" @click="openModalAuditLog">
                                Xem Tất Cả 184 Bản Ghi Log <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL: THÊM MỚI QUẢN TRỊ VIÊN -->
        <div class="modal fade" id="modalThemAdmin" tabindex="-1" aria-hidden="true" ref="modalThemAdmin">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-bottom p-3 px-4">
                        <div class="d-flex align-items-center gap-2">
                            <div class="icon-round bg-pink-subtle text-pink">
                                <i class="bx bx-user-plus font-20"></i>
                            </div>
                            <div>
                                <h5 class="modal-title fw-bold text-dark font-16 mb-0">Thêm Mới Quản Trị Viên Nội Bộ</h5>
                                <small class="text-muted font-11">Cấp tài khoản điều hành và thiết lập phân quyền RBAC</small>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4 font-13">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="fw-bold mb-1">Mã Nhân Sự <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-3 font-13 font-monospace" v-model="formStaff.code" placeholder="VD: ADM-013" />
                            </div>
                            <div class="col-md-8">
                                <label class="fw-bold mb-1">Họ Và Tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-3 font-13" v-model="formStaff.name" placeholder="VD: Trần Văn Bình..." />
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Email Công Vụ <span class="text-danger">*</span></label>
                                <input type="email" class="form-control rounded-3 font-13" v-model="formStaff.email" placeholder="binh.tv@smarttrip.danang.gov.vn" />
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Số Điện Thoại</label>
                                <input type="text" class="form-control rounded-3 font-13" v-model="formStaff.phone" placeholder="0905.xxx.xxx" />
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Chức Vụ Đảm Nhiệm <span class="text-danger">*</span></label>
                                <select class="form-select rounded-3 font-13" v-model="formStaff.role">
                                    <option value="Super Admin">Super Admin (Toàn quyền)</option>
                                    <option value="Moderator Tour">Moderator Tour (Kiểm duyệt tour)</option>
                                    <option value="GIS & Địa Điểm POI">GIS & Địa Điểm POI (Biên tập địa điểm)</option>
                                    <option value="Finance & Voucher">Finance & Voucher (Tài chính & Voucher)</option>
                                    <option value="Xử Lý Tranh Chấp">Xử Lý Tranh Chấp (CSKH & Khiếu nại)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Mật Khẩu Khởi Tạo <span class="text-danger">*</span></label>
                                <input type="password" class="form-control rounded-3 font-13" v-model="formStaff.password" placeholder="Tối thiểu 8 ký tự..." />
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch mt-1">
                                    <input class="form-check-input" type="checkbox" id="switch2fa" v-model="formStaff.is2fa" checked />
                                    <label class="form-check-label fw-bold font-12" for="switch2fa">Bắt buộc kích hoạt xác thực hai yếu tố (2FA) trong lần đăng nhập đầu tiên</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 px-4">
                        <button type="button" class="btn btn-light rounded-pill px-4 font-13" data-bs-dismiss="modal">Hủy bỏ</button>
                        <button type="button" class="btn btn-pink-gradient text-white rounded-pill px-4 font-13 fw-bold shadow-sm" @click="saveStaff">
                            Tạo Tài Khoản
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL: ĐỔI CHỨC VỤ RBAC -->
        <div class="modal fade" id="modalDoiChucVu" tabindex="-1" aria-hidden="true" ref="modalDoiChucVu">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-bottom p-3">
                        <h6 class="modal-title fw-bold text-dark font-14">Cập Nhật Chức Vụ Phân Quyền</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4 font-13">
                        <p class="text-muted mb-3" v-if="selectedStaff">
                            Thay đổi vai trò RBAC cho nhân sự: <b>{{ selectedStaff.name }}</b> ({{ selectedStaff.code }}).
                        </p>
                        <label class="fw-bold mb-1">Chọn vai trò mới:</label>
                        <select class="form-select rounded-3 font-13 mb-3" v-model="tempNewRole">
                            <option value="Super Admin">Super Admin (42/42 Quyền)</option>
                            <option value="Moderator Tour">Moderator Tour (18/42 Quyền)</option>
                            <option value="GIS & Địa Điểm POI">GIS & Địa Điểm POI (21/42 Quyền)</option>
                            <option value="Finance & Voucher">Finance & Voucher (14/42 Quyền)</option>
                            <option value="Xử Lý Tranh Chấp">Xử Lý Tranh Chấp (12/42 Quyền)</option>
                        </select>
                        <div class="alert alert-warning font-12 mb-0">
                            <i class="bx bx-info-circle me-1"></i> Quyền hạn API và Menu Admin của nhân sự sẽ tự động cập nhật ngay lập tức sau khi lưu.
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3">
                        <button type="button" class="btn btn-light rounded-pill px-3 font-12" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-pink-gradient text-white rounded-pill px-4 font-12 fw-bold" @click="confirmDoiChucVu">
                            Lưu Thay Đổi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TaiKhoanAdminComponent',
    data() {
        return {
            searchQuery: '',
            filterRole: '',
            filterStatus: '',
            pageSize: 5,
            currentPage: 1,

            // Dữ liệu 5 dòng nhân sự khớp 100% hình ảnh media_1793378833350_85cd0721.png
            staffs: [
                {
                    id: 1,
                    code: 'ADM-001',
                    name: 'Trần Hoàng Long',
                    email: 'long.th@smarttrip.danang.gov.vn',
                    phone: '0905.123.888',
                    avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80',
                    role: 'Super Admin',
                    roleBg: '#E11D48',
                    roleColor: '#FFFFFF',
                    roleIcon: 'bx bx-crown',
                    permsText: '42 / 42 Quyền',
                    permBg: '#F5F3FF',
                    permColor: '#7C3AED',
                    lastActive: 'Vừa xong (10:42)',
                    lastIpDevice: '118.69.182.4 • Chrome MacOS',
                    location: 'Văn phòng Hải Châu, ĐN',
                    status: 'online',
                    dept: 'Kỹ thuật & Vận hành'
                },
                {
                    id: 2,
                    code: 'ADM-003',
                    name: 'Lê Thị Kim Ngân',
                    email: 'ngan.ltk@smarttrip.danang.gov.vn',
                    phone: '0935.441.902',
                    avatar: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&auto=format&fit=crop&q=80',
                    role: 'Moderator Tour',
                    roleBg: '#7C3AED',
                    roleColor: '#FFFFFF',
                    roleIcon: 'bx bx-badge-check',
                    permsText: '18 / 42 Quyền',
                    permBg: '#F1F5F9',
                    permColor: '#475569',
                    lastActive: '15 phút trước',
                    lastIpDevice: '42.114.88.20 • Firefox Win11',
                    location: 'Sơn Trà, Đà Nẵng',
                    status: 'online',
                    dept: 'Kiểm duyệt nội dung Tour'
                },
                {
                    id: 3,
                    code: 'ADM-005',
                    name: 'Nguyễn Văn Huy',
                    email: 'huy.nvg@smarttrip.danang.gov.vn',
                    phone: '0914.778.231',
                    avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80',
                    role: 'GIS & Địa Điểm POI',
                    roleBg: '#0284C7',
                    roleColor: '#FFFFFF',
                    roleIcon: 'bx bx-map-pin',
                    permsText: '21 / 42 Quyền',
                    permBg: '#F1F5F9',
                    permColor: '#475569',
                    lastActive: 'Hôm qua 18:30',
                    lastIpDevice: '115.79.45.12 • Edge Win11',
                    location: 'Ngũ Hành Sơn, ĐN',
                    status: 'offline',
                    dept: 'Chuẩn hóa dữ liệu GIS'
                },
                {
                    id: 4,
                    code: 'ADM-007',
                    name: 'Đặng Thảo Vy',
                    email: 'vy.dt@smarttrip.danang.gov.vn',
                    phone: '0982.553.110',
                    avatar: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=150&auto=format&fit=crop&q=80',
                    role: 'Finance & Voucher',
                    roleBg: '#FDF2F8',
                    roleColor: '#E11D48',
                    roleBorder: '#FDA4AF',
                    roleIcon: 'bx bx-credit-card',
                    permsText: '14 / 42 Quyền',
                    permBg: '#F1F5F9',
                    permColor: '#475569',
                    lastActive: '32 phút trước',
                    lastIpDevice: '14.238.12.9 • Safari iPadOS',
                    location: 'Chi nhánh Cẩm Lệ',
                    status: 'online',
                    dept: 'Đối soát & Khuyến mãi sàn'
                },
                {
                    id: 5,
                    code: 'ADM-009',
                    name: 'Vũ Tuấn Đăng',
                    email: 'khoa.vtd@smarttrip.danang.gov.vn',
                    phone: '0977.112.334',
                    avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&auto=format&fit=crop&q=80',
                    lockReason: 'Khóa tự động do brute-force',
                    role: 'Xử Lý Tranh Chấp',
                    roleBg: '#F1F5F9',
                    roleColor: '#64748B',
                    roleBorder: '#CBD5E1',
                    roleIcon: 'bx bx-error-circle',
                    permsText: '12 / 42 (Tạm treo)',
                    permBg: '#FEF2F2',
                    permColor: '#DC2626',
                    lastActive: 'Hôm nay 08:14',
                    sessionColor: 'fw-bold text-danger',
                    lastIpDevice: '27.68.190.222 • Unknown IP',
                    errorNote: 'Thử 5 mã OTP thất bại',
                    status: 'locked',
                    dept: 'Xử lý khiếu nại du khách'
                }
            ],

            selectedStaff: null,
            tempNewRole: 'Super Admin',
            formStaff: {
                code: 'ADM-013',
                name: '',
                email: '',
                phone: '',
                role: 'Moderator Tour',
                password: '',
                is2fa: true
            },

            modalThemInstance: null,
            modalDoiChucVuInstance: null
        };
    },
    computed: {
        filteredStaffs() {
            return this.staffs.filter(s => {
                const matchQuery = !this.searchQuery ||
                    s.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                    s.code.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                    s.email.toLowerCase().includes(this.searchQuery.toLowerCase());

                const matchRole = !this.filterRole || s.role === this.filterRole;

                let matchStatus = true;
                if (this.filterStatus) matchStatus = s.status === this.filterStatus;

                return matchQuery && matchRole && matchStatus;
            });
        },
        pagedStaffs() {
            const start = (this.currentPage - 1) * this.pageSize;
            return this.filteredStaffs.slice(start, start + this.pageSize);
        },
        totalPages() {
            return Math.ceil(this.filteredStaffs.length / this.pageSize) || 1;
        }
    },
    mounted() {
        // Mặc định chọn dòng đầu tiên (Trần Hoàng Long) khớp 100% hình ảnh
        if (this.staffs.length > 0) {
            this.selectedStaff = this.staffs[0];
        }

        if (window.bootstrap) {
            this.modalThemInstance = new window.bootstrap.Modal(this.$refs.modalThemAdmin);
            this.modalDoiChucVuInstance = new window.bootstrap.Modal(this.$refs.modalDoiChucVu);
        }
    },
    methods: {
        selectStaff(staff) {
            this.selectedStaff = staff;
            this.tempNewRole = staff.role;
        },
        resetFilters() {
            this.searchQuery = '';
            this.filterRole = '';
            this.filterStatus = '';
            this.currentPage = 1;
        },
        xuatDanhSach() {
            alert('Đang trích xuất tệp danh sách nhân sự quản trị viên định dạng Excel mã hóa bảo mật...');
        },
        openModalAuditLog() {
            alert('Đang mở màn hình tra cứu toàn bộ 184 bản ghi nhật ký kiểm toán (Audit Trail Log)...');
        },
        openModalThemAdmin() {
            this.formStaff = {
                code: `ADM-0${this.staffs.length + 1 < 10 ? '0' + (this.staffs.length + 1) : this.staffs.length + 1}`,
                name: '',
                email: '',
                phone: '',
                role: 'Moderator Tour',
                password: '',
                is2fa: true
            };
            if (this.modalThemInstance) this.modalThemInstance.show();
        },
        saveStaff() {
            if (!this.formStaff.name || !this.formStaff.email) {
                alert('Vui lòng nhập họ tên và email công vụ!');
                return;
            }

            this.staffs.push({
                id: Date.now(),
                code: this.formStaff.code,
                name: this.formStaff.name,
                email: this.formStaff.email,
                phone: this.formStaff.phone || '0905.000.000',
                avatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=150&auto=format&fit=crop&q=80',
                role: this.formStaff.role,
                roleBg: '#7C3AED',
                roleColor: '#FFFFFF',
                roleIcon: 'bx bx-user-check',
                permsText: '18 / 42 Quyền',
                permBg: '#F1F5F9',
                permColor: '#475569',
                lastActive: 'Vừa tạo',
                lastIpDevice: 'Chưa đăng nhập',
                location: 'Văn phòng Đà Nẵng',
                status: 'offline',
                dept: 'Nhân viên mới'
            });

            if (this.modalThemInstance) this.modalThemInstance.hide();
            alert('Đã tạo thành công tài khoản quản trị viên mới!');
        },
        openModalDoiChucVu() {
            if (this.selectedStaff) {
                this.tempNewRole = this.selectedStaff.role;
                if (this.modalDoiChucVuInstance) this.modalDoiChucVuInstance.show();
            }
        },
        confirmDoiChucVu() {
            if (this.selectedStaff) {
                this.selectedStaff.role = this.tempNewRole;
                if (this.modalDoiChucVuInstance) this.modalDoiChucVuInstance.hide();
                alert(`Đã cập nhật chức vụ thành "${this.tempNewRole}" cho nhân sự ${this.selectedStaff.name}!`);
            }
        },
        openModalCapLaiMatKhau() {
            if (this.selectedStaff) {
                if (confirm(`Bạn có muốn gửi link cấp lại mật khẩu an toàn đến email ${this.selectedStaff.email}?`)) {
                    alert('Đã gửi mã khôi phục và yêu cầu đổi mật khẩu kèm xác thực 2FA!');
                }
            }
        },
        moCuaSoChiTiet(staff) {
            alert(`Hồ sơ chi tiết & Phân quyền đầy đủ của nhân sự ${staff.name} (${staff.code})`);
        }
    }
};
</script>

<style scoped>
.admin-account-page {
    background-color: #F8FAFC;
    min-height: 100vh;
}

/* Colors & Buttons */
.text-pink {
    color: #E11D48 !important;
}
.bg-pink {
    background-color: #E11D48 !important;
}
.bg-pink-subtle {
    background-color: #FFF1F2 !important;
}
.border-pink-subtle {
    border-color: #FCE7F3 !important;
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

/* Dots */
.pulse-dot-pink {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background-color: #E11D48;
    display: inline-block;
    box-shadow: 0 0 0 2px rgba(225, 29, 72, 0.2);
}
.dot-sm {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    display: inline-block;
}

.status-dot-avatar {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    position: absolute;
    bottom: 0px;
    right: 0px;
    border: 2px solid #FFFFFF;
}

/* Row Active State */
.bg-active-row {
    background-color: #FFF5F7 !important;
    border-left: 3px solid #E11D48;
}

/* Badges */
.badge-adm-id {
    color: #E11D48;
    background-color: #FFF1F2;
    padding: 1px 6px;
    border-radius: 4px;
    border: 1px dashed #FDA4AF;
}

.badge-status-online {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 3px 10px;
    border-radius: 9999px;
    background-color: #E0F2FE;
    color: #0284C7;
}
.badge-status-locked {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 3px 10px;
    border-radius: 9999px;
    background-color: #FEE2E2;
    color: #DC2626;
}
.badge-status-offline {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 3px 10px;
    border-radius: 9999px;
    background-color: #F1F5F9;
    color: #64748B;
}

/* Timeline */
.timeline-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
}
.bg-cyan { background-color: #06B6D4 !important; }
.bg-blue { background-color: #3B82F6 !important; }

/* Pagination */
.pagination-circle-btn {
    width: 32px;
    height: 32px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 1px solid #E2E8F0;
    color: #475569;
    font-weight: 600;
    font-size: 12px;
    background-color: #FFFFFF;
}
.pagination-circle-btn.active {
    background-color: #E11D48 !important;
    border-color: #E11D48 !important;
    color: #FFFFFF !important;
}

.btn-icon-round {
    width: 30px;
    height: 30px;
    padding: 0;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: transparent;
    border: 1px solid transparent;
}
.btn-icon-round:hover {
    background-color: #F1F5F9;
}

.icon-round {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.shadow-xs {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

/* Utility Font Sizes */
.font-9 { font-size: 9px; }
.font-10 { font-size: 10px; }
.font-11 { font-size: 11px; }
.font-12 { font-size: 12px; }
.font-13 { font-size: 13px; }
.font-14 { font-size: 14px; }
.font-15 { font-size: 15px; }
.font-16 { font-size: 16px; }
.font-18 { font-size: 18px; }
.font-20 { font-size: 20px; }
.font-22 { font-size: 22px; }
.font-24 { font-size: 24px; }
.font-28 { font-size: 28px; }

.px-2-5 { padding-left: 10px; padding-right: 10px; }
.py-1-5 { padding-top: 6px; padding-bottom: 6px; }
.cursor-pointer { cursor: pointer; }
.tracking-wider { letter-spacing: 0.05em; }
</style>
