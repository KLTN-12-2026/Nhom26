<template>
    <div class="rbac-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">ROLE-BASED ACCESS CONTROL (RBAC)</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">Phân Quyền & Quản Lý Chức Vụ Quản Trị</h2>
                <p class="text-muted font-13 mb-0" style="max-width: 860px;">
                    Thiết lập các vai trò quản trị viên, định cấu hình ma trận phân quyền chi tiết 
                    <span class="fw-bold" style="color: #E11D48;">(Xem, Thêm, Sửa, Xóa, Duyệt)</span> 
                    cho 38 chức năng nghiệp vụ của cổng thông tin SmartTrip AI Đà Nẵng.
                </p>
            </div>
            
            <!-- Top Action Buttons -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button class="btn btn-outline-secondary rounded-pill px-3 py-2 font-12 fw-semibold shadow-xs d-flex align-items-center gap-2" style="background-color: #F5F3FF; color: #7C3AED; border: 1px solid #DDD6FE;" @click="saoChepMaTran">
                    <i class="bx bx-copy font-16"></i>
                    <span>Sao Chép Ma Trận</span>
                </button>
                <button class="btn rounded-pill px-3 py-2 font-12 fw-semibold text-white shadow-xs d-flex align-items-center gap-2" style="background-color: #7C3AED;" @click="openModalThemChucVu">
                    <i class="bx bx-plus font-16"></i>
                    <span>+ Tạo Chức Vụ Mới</span>
                </button>
                <button class="btn btn-pink-gradient text-white rounded-pill px-3 py-2 font-12 fw-bold shadow-xs d-flex align-items-center gap-1" @click="luuCauHinh">
                    <i class="bx bx-save font-16"></i>
                    <span>Lưu Cấu Hình Quyền Hạn</span>
                </button>
            </div>
        </div>

        <!-- 5 Role Hierarchy Cards -->
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2 px-1">
                <span class="font-11 text-muted fw-bold text-uppercase tracking-wider">
                    <i class="bx bx-id-card me-1"></i> DANH SÁCH VAI TRÒ QUẢN TRỊ HỆ THỐNG (CHUC_VU)
                </span>
                <span class="font-11 fw-semibold" style="color: #E11D48;">
                    5 vai trò đang kích hoạt • 42 nhân sự
                </span>
            </div>

            <div class="row g-3">
                <div class="col-12 col-sm-6 col-lg" v-for="role in roles" :key="role.id">
                    <div class="role-card position-relative p-3 rounded-4 bg-white border h-100 cursor-pointer transition-all"
                        :class="{ 'role-card-active': selectedRole.id === role.id }"
                        @click="selectRole(role)">
                        
                        <!-- Top Active Badge -->
                        <div v-if="selectedRole.id === role.id" class="active-badge-top font-10 fw-bold text-uppercase text-white px-2 py-0.5 rounded-pill shadow-xs">
                            ĐANG CHỈNH SỬA
                        </div>

                        <!-- Card Header -->
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="role-icon-box rounded-circle d-flex align-items-center justify-content-center shadow-xs" :style="{ backgroundColor: role.iconBg, color: role.iconColor }">
                                <i :class="role.icon" class="font-18"></i>
                            </div>
                            <span class="badge rounded-pill font-10 fw-bold px-2 py-0.5" :style="{ backgroundColor: role.levelBg || '#F1F5F9', color: role.levelColor || '#475569' }">
                                {{ role.level }}
                            </span>
                        </div>

                        <!-- Card Body -->
                        <h6 class="fw-bold font-14 mb-1" :style="{ color: selectedRole.id === role.id ? '#E11D48' : '#1E293B' }">
                            {{ role.name }}
                        </h6>
                        <p class="font-11 text-muted mb-3 text-truncate-2" style="min-height: 32px;">
                            {{ role.desc }}
                        </p>

                        <!-- Card Footer -->
                        <div class="pt-2 border-top font-11 d-flex justify-content-between align-items-center">
                            <span class="text-muted">{{ role.userCount }} nhân sự</span>
                            <span class="fw-bold" style="color: #E11D48;">{{ role.permsCount }} Quyền</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Permission Matrix Card -->
        <div class="card border-0 rounded-4 shadow-xs bg-white mb-4 overflow-hidden">
            <!-- Matrix Header Bar -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 p-3 px-4 border-bottom bg-white">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="matrix-header-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; color: #E11D48; width: 36px; height: 36px;">
                        <i class="bx bx-shield-quarter font-20"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark font-14">
                            Ma Trận Cấp Phép: <span style="color: #E11D48;">{{ selectedRole.name }}</span>
                        </div>
                        <small class="text-muted font-11">
                            Bảng mapping thực thể <code>chuc_vu_chuc_nang</code> – Click trực tiếp để chuyển đổi trạng thái quyền
                        </small>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-sm btn-light border rounded-pill px-3 py-1 font-11 fw-semibold text-muted" @click="checkAllPerms(true)">
                        Chọn Tất Cả
                    </button>
                    <button class="btn btn-sm btn-light border rounded-pill px-3 py-1 font-11 fw-semibold text-muted" @click="checkAllPerms(false)">
                        Bỏ Toàn Bộ
                    </button>
                    <span class="badge rounded-pill font-11 fw-semibold px-2-5 py-1 text-cyan d-flex align-items-center gap-1" style="background-color: #E0F2FE; color: #0284C7;">
                        <span class="dot-sm" style="background-color: #0284C7;"></span> Auto-Sync IOC Đà Nẵng
                    </span>
                </div>
            </div>

            <!-- Table Matrix -->
            <div class="table-responsive">
                <table class="table align-middle mb-0 matrix-table">
                    <thead style="background-color: #F8FAFC; border-bottom: 1px solid #E2E8F0;">
                        <tr class="font-11 text-muted text-uppercase tracking-wider">
                            <th class="ps-4 py-3" style="width: 40%;">CHỨC NĂNG NGHIỆP VỤ (CHUC_NANG)</th>
                            <th class="py-3 text-center" style="width: 12%;">XEM<br><small class="text-lowercase font-10 text-muted">(can_view)</small></th>
                            <th class="py-3 text-center" style="width: 12%;">THÊM<br><small class="text-lowercase font-10 text-muted">(can_create)</small></th>
                            <th class="py-3 text-center" style="width: 12%;">SỬA<br><small class="text-lowercase font-10 text-muted">(can_edit)</small></th>
                            <th class="py-3 text-center" style="width: 12%;">XÓA<br><small class="text-lowercase font-10 text-muted">(can_delete)</small></th>
                            <th class="py-3 pe-4 text-center" style="width: 12%;">DUYỆT<br><small class="text-lowercase font-10 text-muted">(can_approve)</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(group, gIdx) in permissionGroups" :key="gIdx">
                            <!-- Group Header Row -->
                            <tr class="group-header-row" :style="{ backgroundColor: group.headerBg || '#FFF1F2' }">
                                <td colspan="6" class="ps-4 py-2 font-11 fw-bold text-uppercase tracking-wider" :style="{ color: group.headerColor || '#E11D48' }">
                                    <span class="dot-sm me-1" :style="{ backgroundColor: group.headerColor || '#E11D48' }"></span>
                                    {{ group.groupName }} 
                                    <span class="text-muted text-capitalize font-10 fw-normal ms-1">({{ group.note }})</span>
                                </td>
                            </tr>

                            <!-- Function Rows in Group -->
                            <tr v-for="item in group.items" :key="item.code" class="matrix-data-row">
                                <td class="ps-4 py-2.5">
                                    <div class="fw-bold text-dark font-12 mb-0.5">{{ item.name }}</div>
                                    <code class="font-10 text-muted font-monospace">{{ item.code }}</code>
                                </td>

                                <!-- Can View Toggle -->
                                <td class="py-2 text-center">
                                    <div class="form-check form-switch d-inline-block m-0">
                                        <input class="form-check-input custom-pink-switch" type="checkbox" v-model="item.can_view" />
                                    </div>
                                </td>

                                <!-- Can Create Toggle -->
                                <td class="py-2 text-center">
                                    <div class="form-check form-switch d-inline-block m-0">
                                        <input class="form-check-input custom-pink-switch" type="checkbox" v-model="item.can_create" />
                                    </div>
                                </td>

                                <!-- Can Edit Toggle -->
                                <td class="py-2 text-center">
                                    <div class="form-check form-switch d-inline-block m-0">
                                        <input class="form-check-input custom-pink-switch" type="checkbox" v-model="item.can_edit" />
                                    </div>
                                </td>

                                <!-- Can Delete Toggle -->
                                <td class="py-2 text-center">
                                    <div class="form-check form-switch d-inline-block m-0">
                                        <input class="form-check-input custom-pink-switch" type="checkbox" v-model="item.can_delete" />
                                    </div>
                                </td>

                                <!-- Can Approve Toggle -->
                                <td class="py-2 pe-4 text-center">
                                    <div class="form-check form-switch d-inline-block m-0">
                                        <input class="form-check-input custom-pink-switch" type="checkbox" v-model="item.can_approve" />
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Matrix Footer Notes -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 p-3 px-4 border-top font-11 text-muted" style="background-color: #F8FAFC;">
                <div class="d-flex align-items-center gap-1.5">
                    <i class="bx bx-info-circle text-pink font-14"></i>
                    <span>Thay đổi quyền hạn sẽ có hiệu lực ngay lập tức khi nhân viên phiên đăng nhập lại tiếp theo của quản trị viên.</span>
                </div>
                <div>
                    Cập nhật lần cuối: <b>14:20 Hôm nay bởi Super Admin</b>
                </div>
            </div>
        </div>

        <!-- Bottom Section: Security Policy & IOC Info -->
        <div class="row g-4">
            <!-- Left Card: Cài Đặt Chính Sách Bảo Mật Tài Khoản Quản Trị -->
            <div class="col-12 col-lg-8">
                <div class="card border-0 rounded-4 shadow-xs bg-white h-100 p-3 p-lg-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <div class="icon-round bg-purple-subtle text-purple" style="background-color: #F5F3FF; color: #7C3AED; width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="bx bx-shield font-18"></i>
                            </div>
                            <h6 class="fw-bold text-dark font-14 mb-0">Cài Đặt Chính Sách Bảo Mật Tài Khoản Quản Trị</h6>
                        </div>
                        <p class="text-muted font-11 mb-3">Quy chế an toàn an ninh mạng cấp độ 3 Cổng Điều Hành Du Lịch Thành Phố</p>

                        <!-- Policy 1: TOTP 2FA -->
                        <div class="d-flex justify-content-between align-items-center py-2.5 border-bottom">
                            <div class="d-flex align-items-start gap-2.5">
                                <i class="bx bx-key text-pink font-20 mt-0.5"></i>
                                <div>
                                    <div class="fw-bold text-dark font-12">Bắt buộc xác thực 2 lớp (TOTP 2FA)</div>
                                    <small class="text-muted font-11">Áp dụng chuẩn Google Authenticator / Microsoft Authenticator cho 100% cán bộ kiểm duyệt</small>
                                </div>
                            </div>
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input custom-pink-switch" type="checkbox" v-model="securityPolicy.is2fa" checked />
                            </div>
                        </div>

                        <!-- Policy 2: Auto Logout -->
                        <div class="d-flex justify-content-between align-items-center py-2.5 border-bottom">
                            <div class="d-flex align-items-start gap-2.5">
                                <i class="bx bx-time-five text-purple font-20 mt-0.5"></i>
                                <div>
                                    <div class="fw-bold text-dark font-12">Thời gian tự động đăng xuất khi không thao tác</div>
                                    <small class="text-muted font-11">Khóa phiên làm việc tạm thời nhằm tránh rủi ro không có mặt tại bàn nghiệp vụ</small>
                                </div>
                            </div>
                            <select class="form-select form-select-sm w-auto font-12 rounded-3 border-light-subtle" v-model="securityPolicy.autoLogoutMinutes">
                                <option :value="15">15 Phút</option>
                                <option :value="30">30 Phút</option>
                                <option :value="60">60 Phút</option>
                            </select>
                        </div>

                        <!-- Policy 3: IP Whitelist -->
                        <div class="d-flex justify-content-between align-items-center py-2.5">
                            <div class="d-flex align-items-start gap-2.5">
                                <i class="bx bx-network-chart text-primary font-20 mt-0.5"></i>
                                <div>
                                    <div class="fw-bold text-dark font-12">Giới hạn IP Trụ sở Sở Du Lịch & IOC Đà Nẵng</div>
                                    <small class="text-muted font-11">Whitelisted IP: <code class="text-primary">118.69.182.0/24</code> và <code class="text-primary">14.238.12.0/24</code></small>
                                </div>
                            </div>
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input custom-pink-switch" type="checkbox" v-model="securityPolicy.ipWhitelist" checked />
                            </div>
                        </div>
                    </div>

                    <!-- Footer Note & Audit Link -->
                    <div class="pt-3 border-top d-flex flex-wrap justify-content-between align-items-center gap-2 font-11 text-muted">
                        <span>Chứng nhận an toàn an ninh thông tin theo Nghị định 85/2016/NĐ-CP • Cấp độ an toàn hệ thống: <b>3</b></span>
                        <a href="javascript:void(0)" class="fw-semibold text-pink text-decoration-none" @click="openAuditLogs">
                            Xem lịch sử truy cập (Audit Logs)
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column Cards: IOC Center & PKI Signature -->
            <div class="col-12 col-lg-4">
                <div class="d-flex flex-column gap-3">
                    <!-- IOC Center Card -->
                    <div class="card border-0 rounded-4 shadow-xs bg-white p-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <div class="d-flex align-items-center gap-1.5">
                                <i class="bx bxs-institution text-pink font-16"></i>
                                <h6 class="fw-bold text-dark font-13 mb-0">Trung Tâm Điều Hành IOC</h6>
                            </div>
                            <span class="badge rounded-pill font-10 fw-bold px-2 py-0.5" style="background-color: #E0F2FE; color: #0284C7;">
                                BẢO MẬT CAO
                            </span>
                        </div>
                        <p class="text-muted font-11 mb-2.5">
                            Tọa độ trụ sở văn phòng quản trị tập trung SmartTrip AI – Tòa nhà Trung tâm Hành chính TP Đà Nẵng.
                        </p>

                        <!-- Administrative Center Image -->
                        <div class="position-relative rounded-3 overflow-hidden shadow-xs">
                            <img src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=400&auto=format&fit=crop&q=70" alt="Đà Nẵng Administrative Center" class="w-100 object-fit-cover" style="height: 120px;" />
                            <div class="position-absolute bottom-0 start-0 end-0 p-2 text-white font-11 d-flex align-items-center gap-1" style="background: linear-gradient(transparent, rgba(15, 23, 42, 0.85));">
                                <i class="bx bx-map-pin text-pink"></i>
                                <span class="fw-semibold">24 Bạch Đằng, Thạch Thang, Hải Châu</span>
                            </div>
                        </div>
                    </div>

                    <!-- PKI Digital Certificate Card -->
                    <div class="card border-0 rounded-4 shadow-xs p-3 d-flex flex-row align-items-center gap-3" style="background-color: #FFF1F2; border: 1px dashed #FDA4AF !important;">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white flex-shrink-0" style="background-color: #E11D48; width: 38px; height: 38px;">
                            <i class="bx bx-badge-check font-20"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-dark font-12">Đã xác thực chữ ký số PKI</div>
                            <small class="text-muted font-11">Chứng thư số Ban Cơ yếu Chính phủ</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL: TẠO CHỨC VỤ MỚI -->
        <div class="modal fade" id="modalChucVu" tabindex="-1" aria-hidden="true" ref="modalChucVu">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-bottom p-3 px-4">
                        <div class="d-flex align-items-center gap-2">
                            <div class="icon-round bg-pink-subtle text-pink">
                                <i class="bx bx-plus font-20"></i>
                            </div>
                            <h5 class="modal-title fw-bold text-dark font-16 mb-0">Thêm Mới Chức Vụ Quản Trị</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4 font-13">
                        <div class="mb-3">
                            <label class="fw-bold mb-1">Tên Chức Vụ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-3 font-13" v-model="formChucVu.name" placeholder="VD: Content Auditor..." />
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold mb-1">Cấp Bậc (Hierarchy Level) <span class="text-danger">*</span></label>
                            <select class="form-select rounded-3 font-13" v-model="formChucVu.level">
                                <option value="LVL 01">LVL 01 (Executive)</option>
                                <option value="LVL 02">LVL 02 (Management)</option>
                                <option value="LVL 03">LVL 03 (Specialist)</option>
                                <option value="LVL 04">LVL 04 (Operations)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold mb-1">Mô Tả Nhiệm Vụ</label>
                            <textarea class="form-control rounded-3 font-13" rows="2" v-model="formChucVu.desc" placeholder="Tóm tắt trách nhiệm..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 px-4">
                        <button type="button" class="btn btn-light rounded-pill px-4 font-13" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-pink-gradient text-white rounded-pill px-4 font-13 fw-bold" @click="saveChucVu">
                            Tạo Chức Vụ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PhanQuyenRbacComponent',
    data() {
        return {
            // 5 vai trò quản trị viên
            roles: [
                {
                    id: 1,
                    name: 'Super Admin',
                    level: 'LVL 01',
                    levelBg: '#F1F5F9',
                    levelColor: '#475569',
                    icon: 'bx bx-shield-alt-2',
                    iconBg: '#FDF2F8',
                    iconColor: '#E11D48',
                    desc: 'Toàn quyền hệ thống, phân bổ hạ tầng số',
                    userCount: 12,
                    permsCount: '38/38'
                },
                {
                    id: 2,
                    name: 'Moderator Tour & Đối Tác',
                    level: 'LVL 02',
                    levelBg: '#FDF2F8',
                    levelColor: '#E11D48',
                    icon: 'bx bx-check-circle',
                    iconBg: '#E11D48',
                    iconColor: '#FFFFFF',
                    desc: 'Thẩm định pháp nhân đối tác, cấp phép d...',
                    userCount: 8,
                    permsCount: '18/38'
                },
                {
                    id: 3,
                    name: 'GIS & Data Moderator',
                    level: 'LVL 03',
                    levelBg: '#E0F2FE',
                    levelColor: '#0284C7',
                    icon: 'bx bx-map-pin',
                    iconBg: '#E0F2FE',
                    iconColor: '#0284C7',
                    desc: 'Biên tập POI tọa độ OpenStreetMap, danh...',
                    userCount: 6,
                    permsCount: '14/38'
                },
                {
                    id: 4,
                    name: 'Finance & Settlement',
                    level: 'LVL 02',
                    levelBg: '#EDE9FE',
                    levelColor: '#7C3AED',
                    icon: 'bx bx-credit-card',
                    iconBg: '#F5F3FF',
                    iconColor: '#7C3AED',
                    desc: 'Đối soát ngân sách sàn, voucher, quyết t...',
                    userCount: 4,
                    permsCount: '11/38'
                },
                {
                    id: 5,
                    name: 'Support & Dispute Officer',
                    level: 'LVL 04',
                    levelBg: '#F1F5F9',
                    levelColor: '#475569',
                    icon: 'bx bx-support',
                    iconBg: '#FDF2F8',
                    iconColor: '#E11D48',
                    desc: 'Xử lý sự cố vi phạm, tranh chấp lữ hành...',
                    userCount: 10,
                    permsCount: '9/38'
                }
            ],

            // Vai trò được chọn mặc định là Moderator Tour & Đối Tác (khớp 100% hình ảnh)
            selectedRole: null,

            // Ma trận quyền hạn cho 4 nhóm nghiệp vụ
            permissionGroups: [
                {
                    groupName: 'NHÓM 01: QUẢN LÝ ĐỐI TÁC LỮ HÀNH & TOUR DU LỊCH',
                    note: 'Trọng tâm vai trò hiện tại',
                    headerBg: '#FFF1F2',
                    headerColor: '#E11D48',
                    items: [
                        {
                            code: 'module_partner_kyc_verification',
                            name: 'Xét duyệt hồ sơ KYC Đối tác mới',
                            can_view: true,
                            can_create: true,
                            can_edit: true,
                            can_delete: false,
                            can_approve: true
                        },
                        {
                            code: 'module_licence_compliance_audit',
                            name: 'Thẩm định giấy phép lữ hành quốc tế/nội địa',
                            can_view: true,
                            can_create: false,
                            can_edit: true,
                            can_delete: false,
                            can_approve: true
                        },
                        {
                            code: 'module_tour_itinerary_approval',
                            name: 'Kiểm duyệt Tour du lịch & Lộ trình AI',
                            can_view: true,
                            can_create: true,
                            can_edit: true,
                            can_delete: false,
                            can_approve: true
                        },
                        {
                            code: 'module_tour_departure_pricing',
                            name: 'Kiểm duyệt Lịch khởi hành & Bảng giá mở bán',
                            can_view: true,
                            can_create: false,
                            can_edit: true,
                            can_delete: false,
                            can_approve: true
                        }
                    ]
                },
                {
                    groupName: 'NHÓM 02: DỮ LIỆU ĐỊA ĐIỂM POI & GIS BẢN ĐỒ ĐÀ NẴNG',
                    note: 'Hỗ trợ kiểm tra liên kết điểm đến trong tour',
                    headerBg: '#E0F2FE',
                    headerColor: '#0284C7',
                    items: [
                        {
                            code: 'module_poi_management',
                            name: 'Thêm mới địa điểm POI chính thống',
                            can_view: true,
                            can_create: false,
                            can_edit: false,
                            can_delete: false,
                            can_approve: false
                        },
                        {
                            code: 'module_crowdsourced_poi_approval',
                            name: 'Kiểm duyệt điểm du lịch đề xuất từ cộng đồng',
                            can_view: true,
                            can_create: false,
                            can_edit: true,
                            can_delete: false,
                            can_approve: true
                        },
                        {
                            code: 'module_osm_gis_coordinates',
                            name: 'Chỉnh sửa tọa độ định vị & Boundary OpenStreetMap',
                            can_view: true,
                            can_create: false,
                            can_edit: false,
                            can_delete: false,
                            can_approve: false
                        },
                        {
                            code: 'module_taxonomy_interest_tags',
                            name: 'Quản lý Thẻ sở thích & Phân loại hành vi AI Tags',
                            can_view: true,
                            can_create: false,
                            can_edit: true,
                            can_delete: false,
                            can_approve: false
                        }
                    ]
                },
                {
                    groupName: 'NHÓM 03: TÀI CHÍNH & KHUYẾN MÃI SÀN DU LỊCH',
                    note: 'Chỉ cho phép tra cứu xem để đối soát khi có sự cố',
                    headerBg: '#EDE9FE',
                    headerColor: '#7C3AED',
                    items: [
                        {
                            code: 'module_promo_planning_voucher',
                            name: 'Cấu hình Voucher sàn kích cầu Đà Nẵng',
                            can_view: true,
                            can_create: false,
                            can_edit: false,
                            can_delete: false,
                            can_approve: false
                        },
                        {
                            code: 'module_settlement_reconciliation',
                            name: 'Đối soát thanh toán & Quyết toán doanh thu Tour',
                            can_view: true,
                            can_create: false,
                            can_edit: false,
                            can_delete: false,
                            can_approve: false
                        },
                        {
                            code: 'module_escrow_compensation_fund',
                            name: 'Trích quỹ ký quỹ bồi thường rủi ro lữ hành',
                            can_view: false,
                            can_create: false,
                            can_edit: false,
                            can_delete: false,
                            can_approve: false
                        }
                    ]
                },
                {
                    groupName: 'NHÓM 04: GIÁM SÁT TRẬT TỰ DU LỊCH & BÁO CÁO VI PHẠM',
                    note: 'Tích hợp AI Guardian cảnh báo 24/7',
                    headerBg: '#FEF2F2',
                    headerColor: '#DC2626',
                    items: [
                        {
                            code: 'module_escalation_complaint_handling',
                            name: 'Xử lý báo cáo vi phạm kinh doanh du lịch',
                            can_view: true,
                            can_create: false,
                            can_edit: true,
                            can_delete: false,
                            can_approve: true
                        },
                        {
                            code: 'module_ugc_review_moderation',
                            name: 'Kiểm duyệt đánh giá, review & hình ảnh check-in',
                            can_view: true,
                            can_create: false,
                            can_edit: true,
                            can_delete: true,
                            can_approve: true
                        },
                        {
                            code: 'module_ai_guardian_realtime_alert',
                            name: 'Cảnh báo rủi ro an toàn du khách AI Guardian',
                            can_view: true,
                            can_create: false,
                            can_edit: false,
                            can_delete: false,
                            can_approve: true
                        }
                    ]
                }
            ],

            // Chính sách bảo mật
            securityPolicy: {
                is2fa: true,
                autoLogoutMinutes: 30,
                ipWhitelist: true
            },

            // Form Chức vụ
            formChucVu: {
                name: '',
                level: 'LVL 02',
                desc: ''
            },
            modalChucVuInstance: null
        };
    },
    created() {
        this.selectedRole = this.roles[1]; // Moderator Tour & Đối Tác
    },
    mounted() {
        if (window.bootstrap) {
            this.modalChucVuInstance = new window.bootstrap.Modal(this.$refs.modalChucVu);
        }
    },
    methods: {
        selectRole(role) {
            this.selectedRole = role;
            if (role.id === 1) {
                // Super Admin: Bật toàn bộ quyền
                this.checkAllPerms(true);
            }
        },
        checkAllPerms(status) {
            this.permissionGroups.forEach(g => {
                g.items.forEach(item => {
                    item.can_view = status;
                    item.can_create = status;
                    item.can_edit = status;
                    item.can_delete = status;
                    item.can_approve = status;
                });
            });
        },
        saoChepMaTran() {
            const roleName = prompt('Nhập tên vai trò muốn sao chép phân quyền sang:', 'Moderator Bản Đồ & GIS');
            if (roleName) {
                alert(`Đã sao chép cấu hình ma trận phân quyền từ "${this.selectedRole.name}" sang "${roleName}" thành công!`);
            }
        },
        openModalThemChucVu() {
            this.formChucVu = {
                name: '',
                level: 'LVL 02',
                desc: ''
            };
            if (this.modalChucVuInstance) this.modalChucVuInstance.show();
        },
        saveChucVu() {
            if (!this.formChucVu.name) {
                alert('Vui lòng nhập tên chức vụ!');
                return;
            }

            this.roles.push({
                id: Date.now(),
                name: this.formChucVu.name,
                level: this.formChucVu.level,
                levelBg: '#F1F5F9',
                levelColor: '#475569',
                icon: 'bx bx-user-pin',
                iconBg: '#FDF2F8',
                iconColor: '#E11D48',
                desc: this.formChucVu.desc || 'Chức vụ mới được thiết lập.',
                userCount: 0,
                permsCount: '0/38'
            });

            if (this.modalChucVuInstance) this.modalChucVuInstance.hide();
            alert('Đã tạo thành công chức vụ quản trị mới!');
        },
        luuCauHinh() {
            alert(`Đã lưu cấu hình ma trận phân quyền RBAC thành công cho chức vụ: ${this.selectedRole.name}! Dữ liệu đã đồng bộ vào cơ sở dữ liệu.`);
        },
        openAuditLogs() {
            alert('Đang mở màn hình tra cứu nhật ký phân quyền và truy cập quản trị viên (Audit Logs)...');
        }
    }
};
</script>

<style scoped>
.rbac-page {
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

/* Role Card Active */
.role-card {
    transition: all 0.2s ease;
    border-color: #E2E8F0 !important;
}
.role-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}
.role-card-active {
    border-color: #E11D48 !important;
    border-width: 2px !important;
    box-shadow: 0 4px 16px rgba(225, 29, 72, 0.15) !important;
}

.active-badge-top {
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #E11D48;
    letter-spacing: 0.5px;
}

.role-icon-box {
    width: 36px;
    height: 36px;
}

/* Matrix Table */
.matrix-table th {
    font-weight: 600;
}
.matrix-data-row:hover {
    background-color: #FFF9FA;
}

/* Custom Pink Switch */
.custom-pink-switch {
    width: 2.2em !important;
    height: 1.2em !important;
    cursor: pointer;
    background-color: #E2E8F0;
    border-color: #CBD5E1;
}
.custom-pink-switch:checked {
    background-color: #E11D48 !important;
    border-color: #E11D48 !important;
}

.shadow-xs {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.icon-round {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Utility Font Sizes */
.font-10 { font-size: 10px; }
.font-11 { font-size: 11px; }
.font-12 { font-size: 12px; }
.font-13 { font-size: 13px; }
.font-14 { font-size: 14px; }
.font-15 { font-size: 15px; }
.font-16 { font-size: 16px; }
.font-18 { font-size: 18px; }
.font-20 { font-size: 20px; }
.font-24 { font-size: 24px; }

.px-2-5 { padding-left: 10px; padding-right: 10px; }
.py-1-5 { padding-top: 6px; padding-bottom: 6px; }
.cursor-pointer { cursor: pointer; }
.tracking-wider { letter-spacing: 0.05em; }

.text-truncate-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
