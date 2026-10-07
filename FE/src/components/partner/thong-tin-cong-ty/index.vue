<template>
    <div class="partner-company-container">
        <!-- Banner Title -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 page-banner-card">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-pink text-white px-3 py-1 rounded-pill font-11 fw-bold">
                                HỒ SƠ DOANH NGHIỆP
                            </span>
                            <span class="text-muted small">/ Thông tin pháp lý B2B</span>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Hồ Sơ Doanh Nghiệp & Giấy Phép Lữ Hành</h3>
                        <p class="text-muted small mb-0">
                            Quản lý thông tin pháp nhân công ty du lịch, giấy phép kinh doanh lữ hành và tài khoản thụ hưởng thanh toán.
                        </p>
                    </div>
                    <div>
                        <span class="badge bg-success px-3 py-2 rounded-pill fw-bold">
                            <i class="bx bx-check-shield me-1"></i> Đối Tác Đã Xác Thực (Tier 1 Elite)
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Info -->
        <div class="row g-4">
            <!-- Left Info Form -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                    <h5 class="fw-bold text-dark mb-3"><i class="bx bx-buildings text-pink me-2"></i>Thông Tin Pháp Nhân</h5>
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Tên Doanh Nghiệp / Công Ty</label>
                            <input type="text" class="form-control" v-model="company.ten_cong_ty">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Mã Số Thuế (MST)</label>
                            <input type="text" class="form-control" v-model="company.ma_so_thue" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Người Đại Diện Pháp Luật</label>
                            <input type="text" class="form-control" v-model="company.nguoi_dai_dien">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Số Giấy Phép Kinh Doanh Lữ Hành</label>
                            <input type="text" class="form-control" v-model="company.giay_phep">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Số Điện Thoại Tổng Đài</label>
                            <input type="text" class="form-control" v-model="company.sdt">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Liên Hệ Doanh Nghiệp</label>
                            <input type="email" class="form-control" v-model="company.email">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Địa Chỉ Trụ Sở Chính</label>
                            <input type="text" class="form-control" v-model="company.dia_chi">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Giới Thiệu Doanh Nghiệp (Hiển thị cho khách hàng)</label>
                            <textarea class="form-control" rows="4" v-model="company.gioi_thieu"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Bank Account Info -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                    <h5 class="fw-bold text-dark mb-3"><i class="bx bx-credit-card text-pink me-2"></i>Tài Khoản Ngân Hàng Thụ Hưởng</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Ngân Hàng</label>
                            <input type="text" class="form-control" v-model="company.ngan_hang">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Số Tài Khoản</label>
                            <input type="text" class="form-control font-monospace fw-bold" v-model="company.so_tk">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Chủ Tài Khoản (Đúng theo MST)</label>
                            <input type="text" class="form-control text-uppercase" v-model="company.chu_tk">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-pink text-white rounded-3 px-4 py-2 fw-semibold shadow-sm" @click="luuThongTin">
                        <i class="bx bx-save me-1"></i> Lưu Cập Nhật Thông Tin
                    </button>
                </div>
            </div>

            <!-- Right Verification Summary -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                    <h6 class="fw-bold text-dark mb-3">Hồ Sơ Xác Thực Đối Tác</h6>
                    <div class="p-3 bg-pink-light rounded-3 mb-3 text-pink small">
                        <i class="bx bx-badge-check fs-5 align-middle me-1"></i>
                        Doanh nghiệp của bạn đã hoàn thành kiểm định hồ sơ pháp lý vào ngày <strong>01/01/2026</strong>.
                    </div>
                    <ul class="list-unstyled small text-muted mb-0">
                        <li class="mb-2"><i class="bx bx-check text-success me-1"></i>Giấy phép ĐKKD: <strong class="text-dark">Đã duyệt</strong></li>
                        <li class="mb-2"><i class="bx bx-check text-success me-1"></i>Ký quỹ lữ hành ngân hàng: <strong class="text-dark">Đã nộp</strong></li>
                        <li class="mb-2"><i class="bx bx-check text-success me-1"></i>Hợp đồng hợp tác B2B: <strong class="text-dark">Còn hiệu lực</strong></li>
                        <li><i class="bx bx-check text-success me-1"></i>Hạn mức đối soát tự động: <strong class="text-dark">500.000.000 đ/ngày</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DoiTacThongTinCongTy',
    data() {
        return {
            company: {
                ten_cong_ty: 'Công Ty Cổ Phần Lữ Hành Quốc Tế Lotus Heritage Ltd',
                ma_so_thue: '0109823456',
                nguoi_dai_dien: 'Nguyễn Văn Hùng',
                giay_phep: 'GP-LHQ-2024/TCDL-GPLHQT',
                sdt: '1900 6889 - (024) 3987 6543',
                email: 'contact@lotusheritage.com.vn',
                dia_chi: 'Tầng 12, Tòa nhà Lotus Tower, Hoàn Kiếm, Hà Nội & Chi nhánh Tuần Châu',
                gioi_thieu: 'Lotus Heritage là đơn vị khai thác tour du thuyền 5 sao vịnh Hạ Long, du lịch trải nghiệm di sản văn hóa miền Bắc với hơn 10 năm kinh nghiệm dẫn đầu thị trường.',
                ngan_hang: 'Techcombank - Chi nhánh Hoàn Kiếm',
                so_tk: '19034567890018',
                chu_tk: 'CONG TY CP LU HANH QUOC TE LOTUS HERITAGE'
            }
        }
    },
    methods: {
        luuThongTin() {
            alert('Thông tin hồ sơ công ty đã được lưu thành công!');
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
</style>
