<template>
    <div class="partner-voucher-page">
        <!-- 1. Header Banner & Action Buttons -->
        <div class="page-header mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-2">
                        <span class="badge-tag-pill tag-pink">
                            <i class="bx bx-purchase-tag-alt me-1"></i> MARKETING & CHIẾN DỊCH BÁN HÀNG
                        </span>
                    </div>
                    <h2 class="page-title mb-1">Quản Lý Mã Giảm Giá & Khuyến Mãi</h2>
                    <p class="page-desc text-muted mb-0">
                        Tối ưu hóa tỷ lệ chuyển đổi đơn tour, phân bổ ngân sách marketing linh hoạt và kích hoạt nhu cầu đặt vé mùa cao điểm cho đối tác du lịch.
                    </p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button class="btn btn-pink-gradient text-white px-3 py-2 rounded-3 fw-bold font-12 shadow-sm" type="button" @click="cuonToiFormTao">
                        <i class="bx bx-plus me-1 font-16 align-middle"></i> Tạo Voucher Mới (+)
                    </button>
                    <button class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold font-12" type="button" @click="moModalBaoCaoTacDong">
                        <i class="bx bx-bar-chart-alt-2 me-1 font-16 align-middle"></i> Báo Cáo Tác Động
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. 4 Metric KPI Cards -->
        <div class="row g-3 mb-4">
            <!-- Metric 1: ĐANG KÍCH HOẠT -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">ĐANG KÍCH HOẠT</span>
                            <div class="kpi-value text-dark">
                                06 <span class="font-13 fw-normal text-muted">mã</span>
                            </div>
                        </div>
                        <div class="kpi-icon-wrap icon-pink">
                            <i class="bx bx-purchase-tag font-20"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 font-11">
                        <span class="badge bg-pink-light text-pink rounded-pill font-10 px-2 py-0-5 fw-bold">2 sắp hết hạn</span>
                        <span class="text-muted">trong 48 giờ tới</span>
                    </div>
                </div>
            </div>

            <!-- Metric 2: LƯỢT ĐÃ ÁP DỤNG -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">LƯỢT ĐÃ ÁP DỤNG</span>
                            <div class="kpi-value text-dark">
                                428 <span class="font-13 fw-normal text-muted">lượt</span>
                            </div>
                        </div>
                        <div class="kpi-icon-wrap icon-purple">
                            <i class="bx bx-gift font-20"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 font-11 text-cyan fw-semibold">
                        <i class="bx bx-trending-up"></i> Tăng 22.4% so với tháng trước
                    </div>
                </div>
            </div>

            <!-- Metric 3: DOANH THU TỪ PROMO -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <div>
                            <span class="kpi-label text-cyan">DOANH THU TỪ PROMO</span>
                            <div class="kpi-value text-dark">450.000.000 <span class="font-13 fw-normal text-muted">đ</span></div>
                        </div>
                    </div>
                    <div class="font-11 text-cyan fw-semibold mt-1">
                        Chiếm 28.4% tổng GMV tour
                    </div>
                </div>
            </div>

            <!-- Metric 4: TĂNG TỶ LỆ ĐẶT CHỖ -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <div>
                            <span class="kpi-label">TĂNG TỶ LỆ ĐẶT CHỖ</span>
                            <div class="kpi-value text-pink">+34%</div>
                        </div>
                        <div class="kpi-icon-wrap icon-pink">
                            <i class="bx bx-rocket font-20"></i>
                        </div>
                    </div>
                    <div class="font-11 text-muted">
                        <span class="text-pink fw-bold">SmartTrip AI:</span> Phân bổ voucher giảm tình trạng hủy đơn
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. SmartTrip AI Recommendation Ribbon -->
        <div class="ai-recommendation-card card border-0 shadow-sm rounded-4 p-3 mb-4 text-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-start gap-3">
                    <div class="ai-sparkle-icon rounded-circle bg-white text-pink d-flex align-items-center justify-content-center flex-shrink-0">
                        <i class="bx bx-bulb font-22"></i>
                    </div>
                    <div>
                        <div class="d-inline-flex align-items-center gap-1 font-11 fw-bold text-pink bg-white rounded-pill px-2 py-0-5 mb-1">
                            <i class="bx bx-atom"></i> Gợi ý thông minh SmartTrip Engine
                        </div>
                        <h6 class="fw-bold mb-1 font-15 text-dark">Tăng lấp đầy các tour khởi hành cuối tuần tháng tới</h6>
                        <p class="font-12 text-muted mb-0">
                            Các tour "Bà Nà Hills Hoàng Hôn" và "Cù Lao Chàm Lặn Biển" đang có tỷ lệ trống 42%. Kích hoạt mã flash-sale 10% sẽ giúp bán hết 100% chỗ trong 3 ngày.
                        </p>
                    </div>
                </div>
                <div>
                    <button class="btn btn-purple btn-sm text-white px-3 py-2 rounded-3 fw-bold font-12 shadow-sm" type="button" @click="apDungGoiYAI">
                        Áp Dụng Chiến Dịch Này
                    </button>
                </div>
            </div>
        </div>

        <!-- 4. Main 2-Column Section: Left = Filter + Voucher Tickets, Right = Smart Form Quick Setup -->
        <div class="row g-4">
            <!-- Left Column: Filter Tabs & Voucher Cards List -->
            <div class="col-xl-8 col-lg-7 d-flex flex-column gap-3">
                <!-- Status Tabs & Sorter Filter -->
                <div class="filter-tabs-box d-flex flex-wrap align-items-center justify-content-between gap-3 p-2 px-3 bg-white rounded-4 border shadow-sm">
                    <div class="d-flex flex-wrap align-items-center gap-1">
                        <button 
                            class="btn btn-sm filter-pill-tab" 
                            :class="tabHienTai === 'tat_ca' ? 'active-pill' : ''"
                            @click="tabHienTai = 'tat_ca'"
                        >
                            Tất Cả ({{ vouchers.length }})
                        </button>
                        <button 
                            class="btn btn-sm filter-pill-tab" 
                            :class="tabHienTai === 'dang_chay' ? 'active-pill' : ''"
                            @click="tabHienTai = 'dang_chay'"
                        >
                            Đang Kích Hoạt ({{ demTrangThai('dang_chay') }})
                        </button>
                        <button 
                            class="btn btn-sm filter-pill-tab" 
                            :class="tabHienTai === 'het_luot' ? 'active-pill' : ''"
                            @click="tabHienTai = 'het_luot'"
                        >
                            Hết Lượt Dùng ({{ demTrangThai('het_luot') }})
                        </button>
                        <button 
                            class="btn btn-sm filter-pill-tab" 
                            :class="tabHienTai === 'het_han' ? 'active-pill' : ''"
                            @click="tabHienTai = 'het_han'"
                        >
                            Hết Hạn ({{ demTrangThai('het_han') }})
                        </button>
                        <button 
                            class="btn btn-sm filter-pill-tab" 
                            :class="tabHienTai === 'tam_dung' ? 'active-pill' : ''"
                            @click="tabHienTai = 'tam_dung'"
                        >
                            Tạm Dừng ({{ demTrangThai('tam_dung') }})
                        </button>
                    </div>

                    <div class="d-flex align-items-center gap-1 font-11">
                        <span class="text-secondary fw-semibold">Sắp xếp:</span>
                        <select class="form-select form-select-sm select-subtle" v-model="sapXep">
                            <option value="moi_nhat">Mới tạo nhất</option>
                            <option value="muc_giam_cao">Mức giảm cao nhất</option>
                            <option value="sap_het_han">Sắp hết hạn</option>
                        </select>
                    </div>
                </div>

                <!-- Voucher Cards List (Coupons format) -->
                <div class="d-flex flex-column gap-3">
                    <div 
                        v-for="v in danhSachVoucherLoc" 
                        :key="v.id" 
                        class="voucher-ticket-card card border-0 shadow-sm rounded-4 overflow-hidden bg-white"
                    >
                        <div class="d-flex flex-column flex-md-row">
                            <!-- Left Ticket Stub: Value, Discount Type, Tag -->
                            <div 
                                class="ticket-stub-left p-3 p-md-4 text-white d-flex flex-column justify-content-between text-center"
                                :class="v.theme_class"
                            >
                                <div class="d-flex justify-content-between align-items-center font-10 text-white-50 mb-2">
                                    <span class="badge rounded-pill bg-white text-dark font-9 px-2">{{ v.trang_thai_text }}</span>
                                    <span class="font-monospace">{{ v.ma_dinh_danh }}</span>
                                </div>

                                <div class="my-auto py-2">
                                    <div class="discount-value font-32 fw-bold lh-1">{{ v.gia_tri_hien_thi }}</div>
                                    <div class="font-10 fw-bold text-uppercase mt-1 tracking-wider text-white-90">{{ v.loai_giam_text }}</div>
                                    <div v-if="v.giam_toi_da_text" class="font-9 text-white-75 mt-0-5">{{ v.giam_toi_da_text }}</div>
                                </div>

                                <div class="stub-bottom-tag pt-2 border-top border-white-20 font-10">
                                    <i :class="v.icon_tag" class="me-1"></i> {{ v.tag_text }}
                                </div>
                            </div>

                            <!-- Right Ticket Body: Details, Progress, Toggle, Actions -->
                            <div class="ticket-body-right p-3 p-md-4 flex-grow-1 d-flex flex-column justify-content-between">
                                <!-- Top: Code, Copy Button, Switch -->
                                <div>
                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="voucher-code-chip font-monospace font-13 fw-bold px-2 py-1 rounded-2" :class="v.code_chip_class">
                                                {{ v.code }}
                                            </span>
                                            <button class="btn btn-sm btn-icon-copy" title="Sao chép mã" @click="saoChepCode(v.code)">
                                                <i class="bx bx-copy"></i>
                                            </button>
                                        </div>

                                        <!-- Toggle Activation Switch -->
                                        <div class="form-check form-switch m-0 d-flex align-items-center gap-2">
                                            <label class="form-check-label font-11 text-secondary fw-semibold">{{ v.kich_hoat ? 'Kích hoạt' : 'Đã đóng' }}</label>
                                            <input 
                                                class="form-check-input switch-custom" 
                                                type="checkbox" 
                                                v-model="v.kich_hoat" 
                                                @change="thayDoiTrangThai(v)"
                                            />
                                        </div>
                                    </div>

                                    <!-- Campaign Name & Description -->
                                    <h6 class="fw-bold text-dark mb-1 font-14">{{ v.ten_chuong_trinh }}</h6>
                                    <p class="font-11 text-muted mb-3">{{ v.dieu_kien_ap_dung }}</p>
                                </div>

                                <!-- Usage Progress Bar -->
                                <div class="usage-progress-box mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-1 font-11">
                                        <span class="text-secondary">
                                            Tiến độ sử dụng: <strong class="text-dark">{{ v.da_dung }} / {{ v.tong_luong }} mã</strong>
                                            <span v-if="v.da_dung >= v.tong_luong" class="badge bg-danger-subtle text-danger font-10 ms-1">Hết suất</span>
                                        </span>
                                        <span class="fw-bold" :class="v.ty_le_class">
                                            {{ Math.round((v.da_dung / v.tong_luong) * 100) }}% {{ v.ty_le_note ? '(' + v.ty_le_note + ')' : '' }}
                                        </span>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div 
                                            class="progress-bar" 
                                            :class="v.progress_bar_class"
                                            :style="{ width: Math.min(100, Math.round((v.da_dung / v.tong_luong) * 100)) + '%' }"
                                        ></div>
                                    </div>
                                </div>

                                <!-- Footer: Validity Date & Quick Action Icons -->
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pt-2 border-top">
                                    <span class="font-11 text-muted">
                                        <i class="bx bx-calendar-event me-1"></i> Hiệu lực: <strong class="text-dark">{{ v.ngay_bat_dau }}</strong> ➔ <strong class="text-dark">{{ v.ngay_ket_thuc }}</strong>
                                    </span>

                                    <div class="d-flex align-items-center gap-1">
                                        <button v-if="v.da_dung >= v.tong_luong" class="btn btn-sm btn-outline-pink rounded-pill font-11 px-2 py-1" @click="moModalNangQuota(v)">
                                            + Nâng hạn mức
                                        </button>
                                        <button class="btn btn-sm btn-icon-action" title="Sửa" @click="suaVoucher(v)">
                                            <i class="bx bx-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon-action text-danger" title="Xóa" @click="xoaVoucher(v)">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Quick Setup "Thiết Lập Voucher Nhanh" (Smart Form) -->
            <div class="col-xl-4 col-lg-5" ref="formTaoMoi">
                <div class="card border-0 shadow-sm rounded-4 smart-form-card p-3 p-md-4 bg-white sticky-top" style="top: 20px;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="smart-icon bg-pink-light text-pink rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-purchase-tag font-18"></i>
                            </div>
                            <h6 class="fw-bold text-dark mb-0 font-14">Thiết Lập Voucher Nhanh</h6>
                        </div>
                        <span class="badge bg-purple-light text-purple rounded-pill font-10 px-2 py-1">Smart Form</span>
                    </div>

                    <!-- Form Controls -->
                    <div class="d-flex flex-column gap-3">
                        <!-- Code -->
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label font-11 fw-bold text-secondary mb-0">MÃ KHUYẾN MÃI (CODE) <span class="text-danger">*</span></label>
                                <a href="javascript:void(0)" class="text-pink font-10 fw-semibold text-decoration-none" @click="sinhMaTuDong">
                                    + sinh mã tự động
                                </a>
                            </div>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light text-muted border-end-0"><i class="bx bx-purchase-tag"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control border-start-0 font-monospace text-uppercase" 
                                    v-model="formVoucher.code" 
                                    placeholder="VD: HELLO2025" 
                                />
                            </div>
                        </div>

                        <!-- Type & Value -->
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="form-label font-11 fw-bold text-secondary mb-1">LOẠI GIẢM</label>
                                <select class="form-select form-select-sm" v-model="formVoucher.loai_giam">
                                    <option value="phan_tram">Giảm theo %</option>
                                    <option value="tien_mat">Giảm tiền mặt (đ)</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label font-11 fw-bold text-secondary mb-1">MỨC GIẢM <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="number" class="form-control" v-model.number="formVoucher.muc_giam" min="1" />
                                    <span class="input-group-text bg-light">{{ formVoucher.loai_giam === 'phan_tram' ? '%' : 'đ' }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Minimum Order & Max Discount -->
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="form-label font-11 fw-bold text-secondary mb-1">ĐƠN TỐI THIỂU (đ)</label>
                                <input type="number" class="form-control form-control-sm" v-model.number="formVoucher.don_toi_thieu" />
                            </div>
                            <div class="col-6">
                                <label class="form-label font-11 fw-bold text-secondary mb-1">GIẢM TỐI ĐA (đ)</label>
                                <input type="number" class="form-control form-control-sm" v-model.number="formVoucher.giam_toi_da" />
                            </div>
                        </div>

                        <!-- Start Date & End Date -->
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="form-label font-11 fw-bold text-secondary mb-1">BẮT ĐẦU</label>
                                <input type="date" class="form-control form-control-sm" v-model="formVoucher.ngay_bat_dau" />
                            </div>
                            <div class="col-6">
                                <label class="form-label font-11 fw-bold text-secondary mb-1">KẾT THÚC</label>
                                <input type="date" class="form-control form-control-sm" v-model="formVoucher.ngay_ket_thuc" />
                            </div>
                        </div>

                        <!-- Quota -->
                        <div>
                            <label class="form-label font-11 fw-bold text-secondary mb-1">TỔNG LƯỢNG PHÁT HÀNH (QUOTA)</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light">#</span>
                                <input type="number" class="form-control" v-model.number="formVoucher.tong_luong" min="1" />
                            </div>
                        </div>

                        <!-- Scope -->
                        <div>
                            <label class="form-label font-11 fw-bold text-secondary mb-1">PHẠM VI ÁP DỤNG (VOUCHER_TOUR)</label>
                            <div class="d-flex flex-column gap-1 font-11 text-secondary">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="scopeAll" value="tat_ca" v-model="formVoucher.pham_vi" />
                                    <label class="form-check-label" for="scopeAll">Tất cả tour của doanh nghiệp</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="scopeSelected" value="tuy_chon" v-model="formVoucher.pham_vi" />
                                    <label class="form-check-label" for="scopeSelected">Chỉ áp dụng cho tour được chọn</label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button class="btn btn-pink-gradient text-white w-100 py-2 rounded-3 fw-bold font-12 shadow-sm mt-1" @click="luuVoucherMoi">
                            Lưu & Kích Hoạt Chiến Dịch
                        </button>

                        <div class="text-center">
                            <a href="javascript:void(0)" class="font-11 text-muted text-decoration-none" @click="resetForm">
                                Xóa làm lại form
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= MODALS ================= -->

        <!-- MODAL: Báo Cáo Tác Động -->
        <div v-if="showModalBaoCao" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-md animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-purple text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-bar-chart-alt-2 font-22"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Báo Cáo Tác Động Khuyến Mãi</h5>
                                <small class="text-muted">Đo lường hiệu quả chuyển đổi từ SmartTrip AI</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalBaoCao = false">&times;</button>
                    </div>

                    <div class="modal-body p-4 font-12">
                        <div class="row g-2 text-center mb-3">
                            <div class="col-4">
                                <div class="p-2 rounded-3 bg-light border">
                                    <div class="font-10 text-muted">TỔNG GMV</div>
                                    <div class="fw-bold font-14 text-pink">1.85 Tỷ đ</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="p-2 rounded-3 bg-light border">
                                    <div class="font-10 text-muted">CHI PHÍ PROMO</div>
                                    <div class="fw-bold font-14 text-purple">48.2 Triệu đ</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="p-2 rounded-3 bg-light border">
                                    <div class="font-10 text-muted">ROI CHIẾN DỊCH</div>
                                    <div class="fw-bold font-14 text-success">9.33x</div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-purple-light rounded-3 font-11 text-secondary">
                            <i class="bx bx-check-shield text-purple me-1"></i>
                            Voucher giúp giảm tỷ lệ rớt đơn tại bước thanh toán từ <strong>34% xuống còn 11%</strong> đối với các tour dài ngày.
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end">
                        <button class="btn btn-sm btn-secondary px-4" @click="showModalBaoCao = false">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'VoucherKhuyenMaiComponent',
    data() {
        return {
            tabHienTai: 'tat_ca',
            sapXep: 'moi_nhat',
            showModalBaoCao: false,

            // Quick Form
            formVoucher: {
                code: 'HELLO2025',
                loai_giam: 'phan_tram',
                muc_giam: 15,
                don_toi_thieu: 2000000,
                giam_toi_da: 500000,
                ngay_bat_dau: '2025-05-15',
                ngay_ket_thuc: '2025-08-30',
                tong_luong: 200,
                pham_vi: 'tat_ca'
            },

            // 4 Vouchers from image
            vouchers: [
                {
                    id: 1,
                    ma_dinh_danh: '#VOUCHER-01',
                    code: 'DANANGSMART',
                    theme_class: 'bg-gradient-pink',
                    trang_thai: 'dang_chay',
                    trang_thai_text: '● ĐANG CHẠY',
                    gia_tri_hien_thi: '15%',
                    loai_giam_text: 'GIẢM TỶ LỆ ĐƠN TOUR',
                    giam_toi_da_text: 'Tối đa giảm 500.000 đ',
                    icon_tag: 'bx bx-check-double',
                    tag_text: 'Đã kiểm duyệt AI',
                    code_chip_class: 'chip-pink',
                    ten_chuong_trinh: 'Mã Khuyến Mãi Mùa Hè Rực Rỡ Đà Nẵng',
                    dieu_kien_ap_dung: 'Áp dụng cho đơn từ 2.000.000 đ • Áp dụng cho 3 tour: Bà Nà, Ngũ Hành Sơn, Phố Cổ Hội An',
                    kich_hoat: true,
                    da_dung: 142,
                    tong_luong: 200,
                    ty_le_class: 'text-pink',
                    ty_le_note: '',
                    progress_bar_class: 'bg-pink',
                    ngay_bat_dau: '15/05/2025',
                    ngay_ket_thuc: '30/08/2025'
                },
                {
                    id: 2,
                    ma_dinh_danh: '#VOUCHER-02',
                    code: 'TET2025',
                    theme_class: 'bg-gradient-purple',
                    trang_thai: 'dang_chay',
                    trang_thai_text: '● ĐANG CHẠY',
                    gia_tri_hien_thi: '250.000đ',
                    loai_giam_text: 'GIẢM TIỀN TRỰC TIẾP',
                    giam_toi_da_text: 'Khấu trừ ngay thanh toán',
                    icon_tag: 'bx bx-star',
                    tag_text: 'Ưu đãi VIP Khách Cũ',
                    code_chip_class: 'chip-purple',
                    ten_chuong_trinh: 'Khai Xuân Du Ngoạn – Lộc Đầu Năm',
                    dieu_kien_ap_dung: 'Áp dụng cho đơn từ 3.500.000 đ • Áp dụng cho Tất cả tour trọn gói',
                    kich_hoat: true,
                    da_dung: 186,
                    tong_luong: 200,
                    ty_le_class: 'text-purple',
                    ty_le_note: 'Sắp hết',
                    progress_bar_class: 'bg-purple',
                    ngay_bat_dau: '01/01/2026',
                    ngay_ket_thuc: '28/02/2026'
                },
                {
                    id: 3,
                    ma_dinh_danh: '#VOUCHER-03',
                    code: 'BANAVIP',
                    theme_class: 'bg-gradient-cyan',
                    trang_thai: 'dang_chay',
                    trang_thai_text: '● ĐANG CHẠY',
                    gia_tri_hien_thi: '500.000đ',
                    loai_giam_text: 'GÓI COMBO VIP',
                    giam_toi_da_text: 'Vé cáp treo + Ăn trưa',
                    icon_tag: 'bx bx-crown',
                    tag_text: 'Độc quyền Bà Nà Hills',
                    code_chip_class: 'chip-cyan',
                    ten_chuong_trinh: 'Trải Nghiệm Cầu Vàng & Fantasy Park VIP',
                    dieu_kien_ap_dung: 'Áp dụng cho đơn từ 4.000.000 đ • Chỉ áp dụng cho tour #TOUR-DN-01',
                    kich_hoat: true,
                    da_dung: 59,
                    tong_luong: 150,
                    ty_le_class: 'text-cyan',
                    ty_le_note: '',
                    progress_bar_class: 'bg-cyan',
                    ngay_bat_dau: '10/04/2025',
                    ngay_ket_thuc: '31/05/2025'
                },
                {
                    id: 4,
                    ma_dinh_danh: '#VOUCHER-04',
                    code: 'EARLYBIRD',
                    theme_class: 'bg-gradient-secondary',
                    trang_thai: 'het_luot',
                    trang_thai_text: 'HẾT LƯỢT DÙNG',
                    gia_tri_hien_thi: '20%',
                    loai_giam_text: 'ĐẶT SỚM 30 NGÀY',
                    giam_toi_da_text: 'Tối đa giảm 800.000 đ',
                    icon_tag: 'bx bx-lock-alt',
                    tag_text: 'Đã đạt giới hạn 100 mã',
                    code_chip_class: 'chip-secondary',
                    ten_chuong_trinh: 'Chương Trình Đặt Chỗ Sớm Mùa Thu',
                    dieu_kien_ap_dung: 'Áp dụng cho đơn từ 2.500.000 đ • Đã phát hết 100/100 suất',
                    kich_hoat: false,
                    da_dung: 100,
                    tong_luong: 100,
                    ty_le_class: 'text-danger',
                    ty_le_note: 'Hết suất',
                    progress_bar_class: 'bg-secondary',
                    ngay_bat_dau: '01/08/2026',
                    ngay_ket_thuc: '15/09/2026'
                }
            ]
        };
    },
    computed: {
        danhSachVoucherLoc() {
            return this.vouchers.filter(v => {
                if (this.tabHienTai === 'dang_chay') return v.kich_hoat && v.trang_thai === 'dang_chay';
                if (this.tabHienTai === 'het_luot') return v.trang_thai === 'het_luot';
                if (this.tabHienTai === 'het_han') return v.trang_thai === 'het_han';
                if (this.tabHienTai === 'tam_dung') return !v.kich_hoat;
                return true;
            });
        }
    },
    methods: {
        demTrangThai(status) {
            if (status === 'dang_chay') return this.vouchers.filter(x => x.kich_hoat && x.trang_thai === 'dang_chay').length;
            if (status === 'het_luot') return this.vouchers.filter(x => x.trang_thai === 'het_luot').length;
            if (status === 'het_han') return this.vouchers.filter(x => x.trang_thai === 'het_han').length;
            if (status === 'tam_dung') return this.vouchers.filter(x => !x.kich_hoat).length;
            return 0;
        },

        saoChepCode(code) {
            navigator.clipboard.writeText(code).then(() => {
                alert(`Đã sao chép mã voucher: ${code}`);
            }).catch(() => {
                alert(`Mã voucher: ${code}`);
            });
        },

        thayDoiTrangThai(voucher) {
            alert(`Đã ${voucher.kich_hoat ? 'kích hoạt mở' : 'tạm dừng'} chiến dịch mã ${voucher.code}!`);
        },

        cuonToiFormTao() {
            if (this.$refs.formTaoMoi) {
                this.$refs.formTaoMoi.scrollIntoView({ behavior: 'smooth' });
            }
        },

        moModalBaoCaoTacDong() {
            this.showModalBaoCao = true;
        },

        apDungGoiYAI() {
            this.formVoucher.code = 'WEEKEND10';
            this.formVoucher.loai_giam = 'phan_tram';
            this.formVoucher.muc_giam = 10;
            this.formVoucher.don_toi_thieu = 1500000;
            this.formVoucher.giam_toi_da = 300000;
            this.formVoucher.tong_luong = 100;
            alert('SmartTrip AI đã tự động điền cấu hình chiến dịch Flash-sale 10% lấp đầy tour cuối tuần!');
            this.cuonToiFormTao();
        },

        sinhMaTuDong() {
            const prefixes = ['SMART', 'DANANG', 'PROMO', 'TRIP', 'SUMMER'];
            const randomNum = Math.floor(100 + Math.random() * 900);
            const prefix = prefixes[Math.floor(Math.random() * prefixes.length)];
            this.formVoucher.code = `${prefix}${randomNum}`;
        },

        resetForm() {
            this.formVoucher = {
                code: '',
                loai_giam: 'phan_tram',
                muc_giam: 10,
                don_toi_thieu: 1000000,
                giam_toi_da: 300000,
                ngay_bat_dau: '',
                ngay_ket_thuc: '',
                tong_luong: 100,
                pham_vi: 'tat_ca'
            };
        },

        luuVoucherMoi() {
            if (!this.formVoucher.code || !this.formVoucher.muc_giam) {
                alert('Vui lòng nhập mã khuyến mãi và mức giảm!');
                return;
            }

            const isPercent = this.formVoucher.loai_giam === 'phan_tram';
            this.vouchers.unshift({
                id: Date.now(),
                ma_dinh_danh: `#VOUCHER-0${this.vouchers.length + 1}`,
                code: this.formVoucher.code.toUpperCase(),
                theme_class: 'bg-gradient-pink',
                trang_thai: 'dang_chay',
                trang_thai_text: '● ĐANG CHẠY',
                gia_tri_hien_thi: isPercent ? `${this.formVoucher.muc_giam}%` : `${this.formVoucher.muc_giam.toLocaleString()}đ`,
                loai_giam_text: isPercent ? 'GIẢM TỶ LỆ ĐƠN TOUR' : 'GIẢM TIỀN TRỰC TIẾP',
                giam_toi_da_text: `Tối đa giảm ${this.formVoucher.giam_toi_da.toLocaleString()} đ`,
                icon_tag: 'bx bx-check-double',
                tag_text: 'Chiến dịch mới',
                code_chip_class: 'chip-pink',
                ten_chuong_trinh: `Chiến Dịch Khuyến Mãi ${this.formVoucher.code.toUpperCase()}`,
                dieu_kien_ap_dung: `Áp dụng cho đơn từ ${this.formVoucher.don_toi_thieu.toLocaleString()} đ • Áp dụng theo chính sách SmartTrip`,
                kich_hoat: true,
                da_dung: 0,
                tong_luong: this.formVoucher.tong_luong || 100,
                ty_le_class: 'text-pink',
                ty_le_note: 'Mới mở',
                progress_bar_class: 'bg-pink',
                ngay_bat_dau: this.formVoucher.ngay_bat_dau || 'Hôm nay',
                ngay_ket_thuc: this.formVoucher.ngay_ket_thuc || 'Vô thời hạn'
            });

            alert(`Đã lưu và kích hoạt thành công chiến dịch ${this.formVoucher.code.toUpperCase()}!`);
            this.sinhMaTuDong();
        },

        moModalNangQuota(voucher) {
            const add = prompt(`Nhập số lượng mã muốn cấp thêm cho ${voucher.code}:`, '50');
            if (add && !isNaN(add)) {
                voucher.tong_luong += parseInt(add);
                voucher.trang_thai = 'dang_chay';
                voucher.trang_thai_text = '● ĐANG CHẠY';
                voucher.kich_hoat = true;
                voucher.theme_class = 'bg-gradient-pink';
                voucher.ty_le_note = '';
                alert(`Đã nâng thêm ${add} mã cho ${voucher.code}!`);
            }
        },

        suaVoucher(voucher) {
            this.formVoucher.code = voucher.code;
            this.formVoucher.tong_luong = voucher.tong_luong;
            this.cuonToiFormTao();
        },

        xoaVoucher(voucher) {
            if (confirm(`Xác nhận xóa chiến dịch voucher "${voucher.code}"?`)) {
                this.vouchers = this.vouchers.filter(v => v.id !== voucher.id);
                alert('Đã xóa chiến dịch thành công!');
            }
        }
    }
};
</script>

<style scoped>
.partner-voucher-page {
    color: #1e293b;
    font-family: inherit;
}

/* Badge tag pills */
.badge-tag-pill {
    display: inline-flex;
    align-items: center;
    padding: 0.25rem 0.75rem;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.03em;
    border-radius: 9999px;
}

.tag-pink {
    background-color: #ffe4e6;
    color: #e11d48;
}

.page-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0f172a;
}

.page-desc {
    font-size: 0.85rem;
    line-height: 1.4;
}

/* KPI Cards */
.kpi-card {
    background: #ffffff;
    border: 1px solid #f1f5f9;
    border-radius: 16px;
    padding: 1.15rem 1.25rem;
    transition: transform 0.2s, box-shadow 0.2s;
}

.kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05) !important;
}

.kpi-label {
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    color: #64748b;
    display: block;
    margin-bottom: 0.35rem;
}

.kpi-value {
    font-size: 1.45rem;
    font-weight: 800;
    line-height: 1.2;
}

.kpi-icon-wrap {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.icon-pink { background-color: #ffe4e6; color: #e11d48; }
.icon-purple { background-color: #f3e8ff; color: #9333ea; }

/* AI Recommendation Card */
.ai-recommendation-card {
    background: linear-gradient(135deg, #fff1f2 0%, #faf5ff 100%);
    border: 1px solid #fce7f3 !important;
}

.ai-sparkle-icon {
    width: 42px;
    height: 42px;
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.15);
}

/* Filter Tabs */
.filter-tabs-box {
    border-color: #e2e8f0 !important;
}

.filter-pill-tab {
    border: 1px solid #e2e8f0;
    background-color: #ffffff;
    color: #475569;
    font-size: 0.74rem;
    font-weight: 600;
    border-radius: 999px;
    padding: 0.25rem 0.75rem;
    transition: all 0.15s;
}

.filter-pill-tab:hover {
    background-color: #f8fafc;
    color: #0f172a;
}

.filter-pill-tab.active-pill {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    border-color: #e11d48;
    color: #ffffff;
    box-shadow: 0 2px 6px rgba(225, 29, 72, 0.25);
}

.select-subtle {
    border-radius: 8px;
    border-color: #e2e8f0;
    padding: 0.25rem 1.6rem 0.25rem 0.5rem;
    color: #334155;
    font-weight: 600;
}

/* Voucher Ticket Cards */
.voucher-ticket-card {
    border: 1px solid #e2e8f0 !important;
    transition: all 0.2s ease-in-out;
}

.voucher-ticket-card:hover {
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06) !important;
}

.ticket-stub-left {
    min-width: 170px;
    max-width: 200px;
}

@media (max-width: 767px) {
    .ticket-stub-left {
        max-width: 100%;
    }
}

.bg-gradient-pink {
    background: linear-gradient(135deg, #e11d48 0%, #f43f5e 100%);
}

.bg-gradient-purple {
    background: linear-gradient(135deg, #7c3aed 0%, #9333ea 100%);
}

.bg-gradient-cyan {
    background: linear-gradient(135deg, #0284c7 0%, #06b6d4 100%);
}

.bg-gradient-secondary {
    background: linear-gradient(135deg, #64748b 0%, #94a3b8 100%);
}

/* Chips */
.voucher-code-chip {
    letter-spacing: 0.05em;
}

.chip-pink { background-color: #ffe4e6; color: #e11d48; }
.chip-purple { background-color: #f3e8ff; color: #7e22ce; }
.chip-cyan { background-color: #e0f2fe; color: #0284c7; }
.chip-secondary { background-color: #f1f5f9; color: #475569; }

.btn-icon-copy,
.btn-icon-action {
    width: 28px;
    height: 28px;
    border-radius: 6px;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #64748b;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    transition: all 0.15s;
}

.btn-icon-copy:hover,
.btn-icon-action:hover {
    background: #f8fafc;
    color: #0f172a;
    border-color: #cbd5e1;
}

.progress-thin {
    height: 6px;
    border-radius: 999px;
    background-color: #f1f5f9;
}

.switch-custom {
    cursor: pointer;
}

/* Smart Form Card */
.smart-form-card {
    border: 1px solid #e2e8f0 !important;
}

.smart-icon {
    width: 32px;
    height: 32px;
}

/* Buttons and Badges */
.btn-pink-gradient {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    border: none;
}

.btn-pink-gradient:hover {
    background: linear-gradient(135deg, #be123c 0%, #db2777 100%);
    color: #ffffff;
}

.btn-outline-pink {
    border: 1px solid #f43f5e;
    color: #e11d48;
    background-color: #ffffff;
}

.btn-outline-pink:hover {
    background-color: #fff1f2;
    color: #be123c;
}

.btn-purple {
    background-color: #7c3aed;
    border: none;
}

.btn-purple:hover {
    background-color: #6d28d9;
    color: #ffffff;
}

.text-pink { color: #e11d48 !important; }
.bg-pink { background-color: #e11d48 !important; }
.bg-pink-light { background-color: #ffe4e6 !important; }

.text-purple { color: #9333ea !important; }
.bg-purple { background-color: #9333ea !important; }
.bg-purple-light { background-color: #f3e8ff !important; }

.text-cyan { color: #0284c7 !important; }
.bg-cyan { background-color: #0284c7 !important; }

/* Modals */
.modal-backdrop-custom {
    position: fixed;
    inset: 0;
    background-color: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(4px);
    z-index: 1050;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    overflow-y: auto;
}

.modal-dialog-custom {
    width: 100%;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
}

.modal-dialog-custom.modal-md { max-width: 520px; }

.modal-header-icon {
    width: 40px;
    height: 40px;
}

.btn-close-modal {
    background: none;
    border: none;
    font-size: 1.5rem;
    line-height: 1;
    color: #94a3b8;
    cursor: pointer;
    transition: color 0.15s;
}

.btn-close-modal:hover {
    color: #0f172a;
}

/* Font scale helpers */
.font-9 { font-size: 0.6rem !important; }
.font-10 { font-size: 0.65rem !important; }
.font-11 { font-size: 0.72rem !important; }
.font-12 { font-size: 0.78rem !important; }
.font-13 { font-size: 0.83rem !important; }
.font-14 { font-size: 0.88rem !important; }
.font-15 { font-size: 0.94rem !important; }
.font-18 { font-size: 1.15rem !important; }
.font-20 { font-size: 1.25rem !important; }
.font-22 { font-size: 1.38rem !important; }
.font-32 { font-size: 1.95rem !important; }

.tracking-wider {
    letter-spacing: 0.05em;
}

.text-white-90 { color: rgba(255, 255, 255, 0.9); }
.text-white-75 { color: rgba(255, 255, 255, 0.75); }
.border-white-20 { border-color: rgba(255, 255, 255, 0.2) !important; }

.py-0-5 {
    padding-top: 0.15rem !important;
    padding-bottom: 0.15rem !important;
}
.mt-0-5 {
    margin-top: 0.2rem !important;
}
</style>
