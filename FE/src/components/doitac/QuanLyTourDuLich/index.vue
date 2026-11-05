<template>
    <div class="partner-quan-ly-tour-page">
        <!-- 1. Header Banner & Action Buttons -->
        <div class="page-header mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-2">
                        <span class="badge-tag-pill tag-pink">
                            <i class="bx bx-purchase-tag-alt me-1"></i> Dịch Vụ Du Lịch & Vận Hành
                        </span>
                        <span class="text-muted font-11">| Tự động đồng bộ Portal Khách</span>
                    </div>
                    <h2 class="page-title mb-1">Quản Lý Tour Du Lịch & Hành Trình Lữ Hành</h2>
                    <p class="page-desc text-muted mb-0">
                        Đăng tải, hiệu chỉnh, quản lý hiển thị và cấu hình biểu giá cho các tour du lịch tại Đà Nẵng & miền Trung. Kết nối trực tiếp cơ sở dữ liệu đối tác lữ hành.
                    </p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold font-12" type="button" @click="xuatExcelBaoCao">
                        <i class="bx bx-download me-1 font-16 align-middle"></i> Xuất Excel Báo Cáo Tour
                    </button>
                    <button class="btn btn-pink-gradient text-white px-3 py-2 rounded-3 fw-bold font-12 shadow-sm" type="button" @click="moModalThemTour">
                        <i class="bx bx-plus me-1 font-16 align-middle"></i> Thêm Tour Du Lịch Mới (+)
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. 4 KPI Metric Cards -->
        <div class="row g-3 mb-4">
            <!-- Metric 1: TỔNG TOUR ĐANG QUẢN LÝ -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">TỔNG TOUR ĐANG QUẢN LÝ</span>
                            <div class="kpi-value text-dark">
                                18 <span class="font-13 fw-normal text-muted">Tours</span>
                            </div>
                        </div>
                        <div class="kpi-icon-wrap icon-pink">
                            <i class="bx bx-trip"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 font-11 flex-wrap">
                        <span class="text-success fw-semibold"><i class="bx bxs-circle font-8 me-1"></i>14 Mở bán</span>
                        <span class="text-muted">•</span>
                        <span class="text-warning fw-semibold"><i class="bx bxs-circle font-8 me-1"></i>3 Chờ duyệt</span>
                        <span class="text-muted">•</span>
                        <span class="text-secondary"><i class="bx bxs-circle font-8 me-1"></i>1 Tạm ẩn</span>
                    </div>
                </div>
            </div>

            <!-- Metric 2: LƯỢT KHÁCH ĐĂNG KÝ THÁNG -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">LƯỢT KHÁCH ĐĂNG KÝ THÁNG</span>
                            <div class="kpi-value text-dark">
                                1.420 <span class="font-13 fw-normal text-muted">Khách</span>
                            </div>
                        </div>
                        <div class="kpi-icon-wrap icon-purple">
                            <i class="bx bx-group"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 font-11 text-cyan fw-semibold">
                        <i class="bx bx-trending-up"></i> Tăng 22.4% so với tháng trước
                    </div>
                </div>
            </div>

            <!-- Metric 3: ĐÁNH GIÁ TRUNG BÌNH -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">ĐÁNH GIÁ TRUNG BÌNH</span>
                            <div class="d-flex align-items-center gap-2">
                                <span class="kpi-value text-dark">4.88</span>
                                <span class="text-warning font-14">
                                    <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star-half"></i>
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-wrap icon-cyan">
                            <i class="bx bx-star"></i>
                        </div>
                    </div>
                    <div class="font-11 text-muted">
                        Dựa trên 350+ lượt đánh giá xác thực
                    </div>
                </div>
            </div>

            <!-- Metric 4: DOANH THU TOUR ƯỚC TÍNH -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">DOANH THU TOUR ƯỚC TÍNH</span>
                            <div class="kpi-value text-pink">1.850.000.000 đ</div>
                        </div>
                        <div class="kpi-icon-wrap icon-pink">
                            <i class="bx bx-credit-card"></i>
                        </div>
                    </div>
                    <div class="font-11 text-muted">
                        <i class="bx bx-check-double text-success me-1"></i> Tỷ lệ hoàn thành thanh toán 98.2%
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Search & Filter Bar -->
        <div class="filter-box card border-0 shadow-sm rounded-4 p-3 mb-4 bg-white">
            <!-- Search row -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
                <div class="flex-grow-1" style="max-width: 620px;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light border-end-0 text-muted">
                            <i class="bx bx-search font-16"></i>
                        </span>
                        <input 
                            type="text" 
                            class="form-control border-start-0" 
                            v-model="tuKhoaTimKiem" 
                            placeholder="Tìm theo tên tour, mã tour (#TOUR-DN-...), điểm đến..."
                        />
                    </div>
                </div>
                <div>
                    <button class="btn btn-outline-purple btn-sm rounded-pill px-3 fw-semibold font-12" type="button" @click="moModalChinhSachHuy">
                        <i class="bx bx-shield-quarter me-1"></i> Chính Sách Hoàn Hủy Tour (chinh_sach_huy_tour)
                    </button>
                </div>
            </div>

            <!-- Filter tabs & selectors row -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 pt-2 border-top">
                <!-- Status Tabs -->
                <div class="d-flex flex-wrap align-items-center gap-1">
                    <span class="font-11 fw-bold text-secondary me-2">Trạng thái:</span>
                    <button 
                        class="btn btn-sm filter-tab-pill" 
                        :class="tabTrangThai === 'tat_ca' ? 'active-pill' : ''"
                        @click="tabTrangThai = 'tat_ca'"
                    >
                        Tất cả (18)
                    </button>
                    <button 
                        class="btn btn-sm filter-tab-pill" 
                        :class="tabTrangThai === 'mo_ban' ? 'active-pill' : ''"
                        @click="tabTrangThai = 'mo_ban'"
                    >
                        Đã duyệt – Mở bán (14)
                    </button>
                    <button 
                        class="btn btn-sm filter-tab-pill" 
                        :class="tabTrangThai === 'cho_duyet' ? 'active-pill' : ''"
                        @click="tabTrangThai = 'cho_duyet'"
                    >
                        Chờ duyệt admin (3)
                    </button>
                    <button 
                        class="btn btn-sm filter-tab-pill" 
                        :class="tabTrangThai === 'tam_an' ? 'active-pill' : ''"
                        @click="tabTrangThai = 'tam_an'"
                    >
                        Tạm ẩn (1)
                    </button>
                    <button 
                        class="btn btn-sm filter-tab-pill" 
                        :class="tabTrangThai === 'tu_choi' ? 'active-pill' : ''"
                        @click="tabTrangThai = 'tu_choi'"
                    >
                        Bị từ chối (0)
                    </button>
                </div>

                <!-- Duration & Sorting -->
                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center gap-1 font-11">
                        <span class="text-secondary fw-semibold">Thời lượng:</span>
                        <select class="form-select form-select-sm select-subtle" v-model="locThoiLuong">
                            <option value="">Tất cả thời lượng</option>
                            <option value="1_ngay">1 Ngày</option>
                            <option value="nua_ngay">Nửa ngày</option>
                            <option value="3n2d">3 Ngày 2 Đêm</option>
                        </select>
                    </div>

                    <div class="d-flex align-items-center gap-1 font-11">
                        <span class="text-secondary fw-semibold">Sắp xếp:</span>
                        <select class="form-select form-select-sm select-subtle" v-model="sapXep">
                            <option value="moi_nhat">Mới nhất trước</option>
                            <option value="gia_tang">Giá tăng dần</option>
                            <option value="gia_giam">Giá giảm dần</option>
                            <option value="danh_gia_cao">Đánh giá cao nhất</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Tour Cards List -->
        <div class="tour-cards-container d-flex flex-column gap-3 mb-4">
            <!-- Tour Card Item -->
            <div 
                v-for="tour in danhSachTourLoc" 
                :key="tour.ma_tour" 
                class="card border-0 shadow-sm rounded-4 overflow-hidden tour-item-card bg-white"
            >
                <div class="card-body p-3 p-md-4">
                    <div class="row g-3 align-items-center">
                        <!-- Left Visual & Identity -->
                        <div class="col-lg-5 col-xl-4 d-flex align-items-center gap-3">
                            <!-- Tour Image with floating code badge -->
                            <div class="tour-image-wrap position-relative flex-shrink-0">
                                <img :src="tour.hinh_anh" :alt="tour.ten_tour" class="tour-thumbnail rounded-4 shadow-sm" />
                                <span class="tour-code-overlay font-monospace">{{ tour.ma_tour }}</span>
                            </div>

                            <!-- Identity: Badges, Title, Destination -->
                            <div class="min-w-0">
                                <div class="d-flex align-items-center flex-wrap gap-1 mb-1">
                                    <span class="badge rounded-pill font-10 px-2 py-1" :class="tour.trang_thai_badge_class">
                                        {{ tour.trang_thai_badge_text }}
                                    </span>
                                    <span class="badge bg-light text-secondary border rounded-pill font-10 px-2 py-1">
                                        <i class="bx bx-time me-1"></i>{{ tour.thoi_luong_text }}
                                    </span>
                                </div>

                                <div v-if="tour.danh_gia" class="d-flex align-items-center gap-1 font-11 text-warning mb-1">
                                    <i class="bx bxs-star"></i>
                                    <strong class="text-dark">{{ tour.danh_gia }}</strong>
                                    <span class="text-muted">({{ tour.so_luot_danh_gia }} đánh giá)</span>
                                </div>

                                <h6 class="fw-bold text-dark mb-1 font-14 tour-title-clamp">{{ tour.ten_tour }}</h6>
                                <div class="font-11 text-muted text-truncate">
                                    <i class="bx bx-map-pin text-danger me-1"></i>{{ tour.diem_don }}
                                </div>

                                <!-- Review alert for pending tour -->
                                <div v-if="tour.thong_bao_kiem_duyet" class="pending-review-box p-2 rounded-3 border mt-2 font-10 text-primary">
                                    <i class="bx bx-time-five me-1"></i>{{ tour.thong_bao_kiem_duyet }}
                                </div>

                                <!-- Hide notice for hidden tour -->
                                <div v-if="tour.thong_bao_an" class="hidden-notice-box p-1 px-2 rounded-2 border mt-1 font-10 text-muted">
                                    {{ tour.thong_bao_an }}
                                </div>
                            </div>
                        </div>

                        <!-- Middle Column: Pricing Breakdown & Schedule Info -->
                        <div class="col-lg-4 col-xl-5">
                            <!-- If Standard Multi-tier pricing -->
                            <div v-if="tour.bieu_gia" class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                                <div class="price-tier-box p-2 rounded-3 bg-light border text-center flex-fill">
                                    <div class="font-9 fw-bold text-secondary text-uppercase">NGƯỜI LỚN</div>
                                    <div class="fw-bold font-13 text-pink">{{ formatVND(tour.bieu_gia.nguoi_lon) }}</div>
                                </div>
                                <div class="price-tier-box p-2 rounded-3 bg-light border text-center flex-fill">
                                    <div class="font-9 fw-bold text-secondary text-uppercase">TRẺ EM (5-11T)</div>
                                    <div class="fw-bold font-13 text-purple">{{ formatVND(tour.bieu_gia.tre_em) }}</div>
                                </div>
                                <div class="price-tier-box p-2 rounded-3 bg-light border text-center flex-fill">
                                    <div class="font-9 fw-bold text-secondary text-uppercase">EM BÉ (&lt;5T)</div>
                                    <div class="fw-bold font-13" :class="tour.bieu_gia.em_be === 0 ? 'text-cyan' : 'text-danger'">
                                        {{ tour.bieu_gia.em_be_text }}
                                    </div>
                                </div>
                            </div>

                            <!-- If Flat price for hidden/paused tour -->
                            <div v-else-if="tour.gia_co_dinh" class="d-flex align-items-center gap-2 mb-2">
                                <span class="font-11 text-secondary fw-semibold">GIÁ CỐ ĐỊNH:</span>
                                <span class="fw-bold font-16 text-dark">{{ formatVND(tour.gia_co_dinh) }}</span>
                            </div>

                            <!-- Schedule Line -->
                            <div v-if="tour.lich_khoi_hanh" class="font-11 text-secondary d-flex align-items-center gap-1">
                                <i class="bx bx-calendar text-pink font-14"></i>
                                <span>Lịch khởi hành: <strong>{{ tour.lich_khoi_hanh }}</strong></span>
                                <span v-if="tour.ghi_chu_cho" class="text-danger fw-bold ms-1">({{ tour.ghi_chu_cho }})</span>
                            </div>
                        </div>

                        <!-- Right Column: Action Buttons -->
                        <div class="col-lg-3 col-xl-3 text-lg-end">
                            <div class="d-flex align-items-center justify-content-lg-end flex-wrap gap-2">
                                <!-- Standard Active Tour Buttons -->
                                <template v-if="tour.trang_thai === 'mo_ban'">
                                    <button class="btn btn-sm btn-outline-cyan rounded-3 px-2 font-11 fw-semibold" @click="xemTuyenOSM(tour)">
                                        <i class="bx bx-map-alt me-1"></i> Tuyến OSM
                                    </button>
                                    <button class="btn btn-sm btn-outline-purple rounded-3 px-2 font-11 fw-semibold" @click="suaTour(tour)">
                                        <i class="bx bx-edit-alt me-1"></i> Chỉnh sửa
                                    </button>
                                    <button class="btn btn-sm btn-light border rounded-3 px-2 font-11 text-muted" @click="anTour(tour)">
                                        <i class="bx bx-hide me-1"></i> Ẩn tour
                                    </button>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-sm btn-light border rounded-3 px-2 text-muted" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end font-12 shadow-sm border-0">
                                            <li><a class="dropdown-item" href="javascript:void(0)" @click="saoChepTour(tour)"><i class="bx bx-copy me-2"></i>Nhân bản tour</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)" @click="xemLich(tour)"><i class="bx bx-calendar me-2"></i>Lịch khởi hành</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:void(0)" @click="xoaTour(tour)"><i class="bx bx-trash me-2"></i>Xóa tour</a></li>
                                        </ul>
                                    </div>
                                </template>

                                <!-- Pending Admin Review Tour Buttons -->
                                <template v-else-if="tour.trang_thai === 'cho_duyet'">
                                    <button class="btn btn-sm btn-light border rounded-3 px-3 font-11 fw-semibold text-secondary" @click="suaTour(tour)">
                                        <i class="bx bx-edit me-1"></i> Hiệu chỉnh
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger rounded-3 px-3 font-11 fw-semibold" @click="huyYeuCau(tour)">
                                        <i class="bx bx-x me-1"></i> Hủy yêu cầu
                                    </button>
                                </template>

                                <!-- Hidden Tour Buttons -->
                                <template v-else-if="tour.trang_thai === 'tam_an'">
                                    <button class="btn btn-sm btn-pink-gradient text-white rounded-3 px-3 font-11 fw-semibold shadow-sm" @click="kichHoatMoBanLai(tour)">
                                        <i class="bx bx-show me-1"></i> Kích hoạt mở bán lại
                                    </button>
                                    <button class="btn btn-sm btn-light border text-danger rounded-3 px-2 font-11" @click="xoaTour(tour)">
                                        <i class="bx bx-trash me-1"></i> Xóa tour
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. Pagination Footer -->
        <div class="d-flex flex-wrap align-items-center justify-content-between p-3 bg-white rounded-4 border shadow-sm">
            <span class="font-12 text-muted">
                Hiển thị 1 – {{ danhSachTourLoc.length }} trên tổng số 18 tour du lịch
            </span>
            <div class="d-flex align-items-center gap-1">
                <button class="btn-page-nav" @click="chuyenTrang(1)">&lt;</button>
                <button class="btn-page-nav active">1</button>
                <button class="btn-page-nav" @click="chuyenTrang(2)">2</button>
                <button class="btn-page-nav" @click="chuyenTrang(3)">3</button>
                <button class="btn-page-nav" @click="chuyenTrang(2)">&gt;</button>
            </div>
        </div>

        <!-- ================= MODALS ================= -->

        <!-- MODAL 1: Thêm / Chỉnh Sửa Tour Mới -->
        <div v-if="showModalTour" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-lg animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-pink text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-trip font-22"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">{{ isEdit ? 'Cập Nhật Thông Tin Tour' : 'Thêm Tour Du Lịch Mới' }}</h5>
                                <small class="text-muted">Đăng tải tour lên nền tảng du lịch thông minh SmartTrip AI</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalTour = false">&times;</button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label font-12 fw-bold text-dark">Tên Tour Tuyến <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" v-model="formTour.ten_tour" placeholder="Nhập tên tour du lịch..." />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label font-12 fw-bold text-dark">Mã Tour <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm font-monospace" v-model="formTour.ma_tour" placeholder="#TOUR-DN-..." />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-12 fw-bold text-dark">Thời Lượng Tour</label>
                                <select class="form-select form-select-sm" v-model="formTour.thoi_luong">
                                    <option value="1_ngay">1 Ngày</option>
                                    <option value="nua_ngay">Nửa ngày</option>
                                    <option value="2n1d">2 Ngày 1 Đêm</option>
                                    <option value="3n2d">3 Ngày 2 Đêm</option>
                                    <option value="4n3d">4 Ngày 3 Đêm</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label font-12 fw-bold text-dark">Điểm Đón / Điểm Tập Trung</label>
                                <input type="text" class="form-control form-control-sm" v-model="formTour.diem_don" placeholder="Sân bay / Khách sạn trung tâm..." />
                            </div>

                            <div class="col-md-4">
                                <label class="form-label font-12 fw-bold text-dark">Giá Người Lớn (VNĐ) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm" v-model.number="formTour.gia_nguoi_lon" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label font-12 fw-bold text-dark">Giá Trẻ Em (5-11t)</label>
                                <input type="number" class="form-control form-control-sm" v-model.number="formTour.gia_tre_em" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label font-12 fw-bold text-dark">Giá Em Bé (&lt;5t)</label>
                                <input type="text" class="form-control form-control-sm" v-model="formTour.gia_em_be_text" placeholder="Miễn phí (0đ) hoặc Không nhận" />
                            </div>

                            <div class="col-md-12">
                                <label class="form-label font-12 fw-bold text-dark">Link Hình Ảnh Đại Diện Tour</label>
                                <input type="text" class="form-control form-control-sm" v-model="formTour.hinh_anh" placeholder="https://images.unsplash..." />
                            </div>

                            <div class="col-md-12">
                                <label class="form-label font-12 fw-bold text-dark">Lịch Khởi Hành Định Kỳ</label>
                                <input type="text" class="form-control form-control-sm" v-model="formTour.lich_khoi_hanh" placeholder="VD: Hàng ngày hoặc Thứ 3, Thứ 6 & Chủ Nhật" />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-outline-secondary px-3" @click="showModalTour = false">Hủy Bỏ</button>
                        <button class="btn btn-sm btn-pink-gradient text-white px-4 fw-semibold" @click="luuTour">
                            <i class="bx bx-check me-1"></i> {{ isEdit ? 'Lưu Thay Đổi' : 'Gửi Phê Duyệt & Mở Bán' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 2: Tuyến OpenStreetMap (OSM) -->
        <div v-if="showModalOSM" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-lg animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-cyan text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-map-alt font-22"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Lộ Trình Tuyến Điểm OpenStreetMap</h5>
                                <small class="text-muted">{{ tourDangXem?.ten_tour }} ({{ tourDangXem?.ma_tour }})</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalOSM = false">&times;</button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="osm-map-simulation rounded-4 border p-4 mb-3 text-center bg-light position-relative">
                            <i class="bx bx-map-pin text-danger font-32 mb-2"></i>
                            <h6 class="fw-bold text-dark">Mạng Lưới Tọa Độ WGS84 OSRM Route</h6>
                            <p class="font-11 text-muted mb-0">
                                Tự động tính toán đường đi tối ưu: Sân bay Đà Nẵng ➔ Cầu Rồng ➔ Bán đảo Sơn Trà ➔ Ngũ Hành Sơn ➔ Phố cổ Hội An.
                            </p>
                        </div>
                        <div class="d-flex flex-wrap gap-2 font-11">
                            <span class="badge bg-light text-dark border p-2"><i class="bx bx-navigation text-primary me-1"></i> Quãng đường: 48.5 km</span>
                            <span class="badge bg-light text-dark border p-2"><i class="bx bx-time text-warning me-1"></i> Thời gian di chuyển: 1h 35m</span>
                            <span class="badge bg-light text-dark border p-2"><i class="bx bx-check-shield text-success me-1"></i> Đã kiểm duyệt an toàn luồng giao thông</span>
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end">
                        <button class="btn btn-sm btn-secondary px-4" @click="showModalOSM = false">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 3: Chính Sách Hoàn Hủy Tour -->
        <div v-if="showModalChinhSach" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-md animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-purple text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-shield-quarter font-22"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Chính Sách Hoàn Hủy Tour Quy Định</h5>
                                <small class="text-muted">Cơ sở dữ liệu: chinh_sach_huy_tour</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalChinhSach = false">&times;</button>
                    </div>

                    <div class="modal-body p-4 font-12">
                        <div class="d-flex flex-column gap-2 mb-3">
                            <div class="p-2 px-3 rounded-3 bg-light border d-flex justify-content-between align-items-center">
                                <span>Hủy trước &gt; 96 giờ (&gt; 4 ngày):</span>
                                <strong class="text-success">Hoàn tiền 100%</strong>
                            </div>
                            <div class="p-2 px-3 rounded-3 bg-light border d-flex justify-content-between align-items-center">
                                <span>Hủy từ 48h đến 96h:</span>
                                <strong class="text-warning">Hoàn tiền 50% cọc</strong>
                            </div>
                            <div class="p-2 px-3 rounded-3 bg-light border d-flex justify-content-between align-items-center">
                                <span>Hủy trong vòng &lt; 24h hoặc không đến:</span>
                                <strong class="text-danger">Không hoàn tiền (0%)</strong>
                            </div>
                            <div class="p-2 px-3 rounded-3 bg-light border d-flex justify-content-between align-items-center">
                                <span>Trường hợp thiên tai / cấm cảng biển:</span>
                                <strong class="text-primary">Hoàn 100% hoặc đổi ngày miễn phí</strong>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end">
                        <button class="btn btn-sm btn-secondary px-4" @click="showModalChinhSach = false">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'QuanLyTourDuLichComponent',
    data() {
        return {
            tuKhoaTimKiem: '',
            tabTrangThai: 'tat_ca',
            locThoiLuong: '',
            sapXep: 'moi_nhat',

            // Modals
            showModalTour: false,
            showModalOSM: false,
            showModalChinhSach: false,
            isEdit: false,
            tourDangXem: null,

            // Form state
            formTour: {
                ten_tour: '',
                ma_tour: '',
                thoi_luong: '1_ngay',
                diem_don: '',
                gia_nguoi_lon: 750000,
                gia_tre_em: 450000,
                gia_em_be_text: 'Miễn phí (0đ)',
                hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=400',
                lich_khoi_hanh: 'Hàng ngày'
            },

            // 4 Core Tours from image
            tours: [
                {
                    ma_tour: '#TOUR-DN-01',
                    ten_tour: 'Đà Nẵng – Bán Đảo Sơn Trà – Danh Thắng Ngũ Hành Sơn 1N',
                    hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=400&auto=format&fit=crop&q=80',
                    trang_thai: 'mo_ban',
                    trang_thai_badge_text: 'Đã duyệt | Đang mở bán',
                    trang_thai_badge_class: 'bg-cyan-light text-cyan',
                    thoi_luong: '1_ngay',
                    thoi_luong_text: '1 Ngày',
                    danh_gia: 4.9,
                    so_luot_danh_gia: 186,
                    diem_don: 'Điểm đón: Sân bay / Khách sạn Trung tâm Đà Nẵng',
                    bieu_gia: {
                        nguoi_lon: 750000,
                        tre_em: 450000,
                        em_be: 0,
                        em_be_text: 'Miễn phí (0đ)'
                    },
                    gia_co_dinh: null,
                    lich_khoi_hanh: 'Hàng ngày',
                    ghi_chu_cho: 'Chuyến hôm nay: Còn 03 chỗ trống',
                    thong_bao_kiem_duyet: null,
                    thong_bao_an: null
                },
                {
                    ma_tour: '#TOUR-DN-02',
                    ten_tour: 'Hành Trình Di Sản Miền Trung: Đà Nẵng – Hội An – Cố Đô Huế 3N2Đ',
                    hinh_anh: 'https://images.unsplash.com/photo-1570789210967-2cac24afeb00?w=400&auto=format&fit=crop&q=80',
                    trang_thai: 'mo_ban',
                    trang_thai_badge_text: 'Đã duyệt | Đang mở bán',
                    trang_thai_badge_class: 'bg-cyan-light text-cyan',
                    thoi_luong: '3n2d',
                    thoi_luong_text: '3N2Đ (Khách sạn 4*)',
                    danh_gia: 4.88,
                    so_luot_danh_gia: 142,
                    diem_don: 'Điểm đón: Ga Đà Nẵng & Sân bay Quốc tế Đà Nẵng',
                    bieu_gia: {
                        nguoi_lon: 3250000,
                        tre_em: 2450000,
                        em_be: 0,
                        em_be_text: 'Miễn phí (0đ)'
                    },
                    gia_co_dinh: null,
                    lich_khoi_hanh: 'Thứ 3, Thứ 6 & Chủ Nhật hàng tuần',
                    ghi_chu_cho: null,
                    thong_bao_kiem_duyet: null,
                    thong_bao_an: null
                },
                {
                    ma_tour: '#TOUR-DN-03',
                    ten_tour: 'Lặn Biển Ngắm San Hô & Chèo SUP Bán Đảo Sơn Trà',
                    hinh_anh: 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400&auto=format&fit=crop&q=80',
                    trang_thai: 'cho_duyet',
                    trang_thai_badge_text: 'Chờ Admin Kiểm Duyệt (Đã gửi 2 giờ trước)',
                    trang_thai_badge_class: 'bg-warning-light text-warning-emphasis',
                    thoi_luong: '1_ngay',
                    thoi_luong_text: '1 Ngày',
                    danh_gia: null,
                    so_luot_danh_gia: null,
                    diem_don: 'Điểm đón: Bãi Rạng, Sơn Trà, Đà Nẵng',
                    bieu_gia: {
                        nguoi_lon: 650000,
                        tre_em: 350000,
                        em_be: -1,
                        em_be_text: 'Không nhận <5t'
                    },
                    gia_co_dinh: null,
                    lich_khoi_hanh: null,
                    ghi_chu_cho: null,
                    thong_bao_kiem_duyet: 'Dự kiến kiểm duyệt trong vòng 4-8 giờ làm việc bởi BQL Du lịch',
                    thong_bao_an: null
                },
                {
                    ma_tour: '#TOUR-DN-04',
                    ten_tour: 'Khám Phá Rừng Dừa Bảy Mẫu & Làng Gốm Thanh Hà',
                    hinh_anh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=400&auto=format&fit=crop&q=80',
                    trang_thai: 'tam_an',
                    trang_thai_badge_text: '● Tạm ẩn (Hết mùa / Bảo trì dịch vụ)',
                    trang_thai_badge_class: 'bg-secondary-subtle text-secondary',
                    thoi_luong: 'nua_ngay',
                    thoi_luong_text: 'Nửa ngày',
                    danh_gia: null,
                    so_luot_danh_gia: null,
                    diem_don: 'Điểm đón: Trung tâm TP Hội An & Cầu Cẩm Thanh',
                    bieu_gia: null,
                    gia_co_dinh: 550000,
                    lich_khoi_hanh: null,
                    ghi_chu_cho: null,
                    thong_bao_kiem_duyet: null,
                    thong_bao_an: 'Đã ẩn khỏi cổng tìm kiếm SmartTrip AI từ ngày 15/10/2026'
                }
            ]
        };
    },
    computed: {
        danhSachTourLoc() {
            return this.tours.filter(tour => {
                const matchSearch = !this.tuKhoaTimKiem || 
                    tour.ten_tour.toLowerCase().includes(this.tuKhoaTimKiem.toLowerCase()) ||
                    tour.ma_tour.toLowerCase().includes(this.tuKhoaTimKiem.toLowerCase()) ||
                    tour.diem_don.toLowerCase().includes(this.tuKhoaTimKiem.toLowerCase());

                let matchTab = true;
                if (this.tabTrangThai === 'mo_ban') matchTab = tour.trang_thai === 'mo_ban';
                else if (this.tabTrangThai === 'cho_duyet') matchTab = tour.trang_thai === 'cho_duyet';
                else if (this.tabTrangThai === 'tam_an') matchTab = tour.trang_thai === 'tam_an';
                else if (this.tabTrangThai === 'tu_choi') matchTab = tour.trang_thai === 'tu_choi';

                const matchDuration = !this.locThoiLuong || tour.thoi_luong === this.locThoiLuong;

                return matchSearch && matchTab && matchDuration;
            });
        }
    },
    methods: {
        formatVND(val) {
            if (!val) return '0 đ';
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(val);
        },

        xuatExcelBaoCao() {
            alert('Đang trích xuất tệp Excel danh mục tour, cấu hình biểu giá và lịch sử doanh thu...');
        },

        moModalThemTour() {
            this.isEdit = false;
            this.formTour = {
                ten_tour: '',
                ma_tour: `#TOUR-DN-0${this.tours.length + 1}`,
                thoi_luong: '1_ngay',
                diem_don: '',
                gia_nguoi_lon: 800000,
                gia_tre_em: 500000,
                gia_em_be_text: 'Miễn phí (0đ)',
                hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=400',
                lich_khoi_hanh: 'Hàng ngày'
            };
            this.showModalTour = true;
        },

        suaTour(tour) {
            this.isEdit = true;
            this.formTour = {
                ten_tour: tour.ten_tour,
                ma_tour: tour.ma_tour,
                thoi_luong: tour.thoi_luong,
                diem_don: tour.diem_don,
                gia_nguoi_lon: tour.bieu_gia?.nguoi_lon || 750000,
                gia_tre_em: tour.bieu_gia?.tre_em || 450000,
                gia_em_be_text: tour.bieu_gia?.em_be_text || 'Miễn phí (0đ)',
                hinh_anh: tour.hinh_anh,
                lich_khoi_hanh: tour.lich_khoi_hanh || 'Hàng ngày'
            };
            this.showModalTour = true;
        },

        luuTour() {
            if (!this.formTour.ten_tour || !this.formTour.ma_tour) {
                alert('Vui lòng nhập tên tour và mã tour!');
                return;
            }
            if (this.isEdit) {
                const idx = this.tours.findIndex(t => t.ma_tour === this.formTour.ma_tour);
                if (idx !== -1) {
                    this.tours[idx].ten_tour = this.formTour.ten_tour;
                    this.tours[idx].diem_don = this.formTour.diem_don;
                    this.tours[idx].hinh_anh = this.formTour.hinh_anh;
                }
                alert(`Đã cập nhật tour ${this.formTour.ma_tour}!`);
            } else {
                this.tours.unshift({
                    ma_tour: this.formTour.ma_tour,
                    ten_tour: this.formTour.ten_tour,
                    hinh_anh: this.formTour.hinh_anh,
                    trang_thai: 'cho_duyet',
                    trang_thai_badge_text: 'Chờ Admin Kiểm Duyệt (Vừa gửi)',
                    trang_thai_badge_class: 'bg-warning-light text-warning-emphasis',
                    thoi_luong: this.formTour.thoi_luong,
                    thoi_luong_text: this.formTour.thoi_luong === '1_ngay' ? '1 Ngày' : '2N1Đ',
                    danh_gia: null,
                    so_luot_danh_gia: null,
                    diem_don: this.formTour.diem_don,
                    bieu_gia: {
                        nguoi_lon: this.formTour.gia_nguoi_lon,
                        tre_em: this.formTour.gia_tre_em,
                        em_be: 0,
                        em_be_text: this.formTour.gia_em_be_text
                    },
                    gia_co_dinh: null,
                    lich_khoi_hanh: this.formTour.lich_khoi_hanh,
                    ghi_chu_cho: null,
                    thong_bao_kiem_duyet: 'Dự kiến kiểm duyệt trong vòng 4-8 giờ làm việc bởi BQL Du lịch',
                    thong_bao_an: null
                });
                alert(`Đã gửi yêu cầu phê duyệt tour mới ${this.formTour.ma_tour}!`);
            }
            this.showModalTour = false;
        },

        xemTuyenOSM(tour) {
            this.tourDangXem = tour;
            this.showModalOSM = true;
        },

        moModalChinhSachHuy() {
            this.showModalChinhSach = true;
        },

        anTour(tour) {
            if (confirm(`Bạn có chắc muốn tạm ẩn tour "${tour.ten_tour}" khỏi kết quả tìm kiếm?`)) {
                tour.trang_thai = 'tam_an';
                tour.trang_thai_badge_text = '● Tạm ẩn';
                tour.trang_thai_badge_class = 'bg-secondary-subtle text-secondary';
                alert('Đã chuyển tour sang trạng thái tạm ẩn!');
            }
        },

        kichHoatMoBanLai(tour) {
            tour.trang_thai = 'mo_ban';
            tour.trang_thai_badge_text = 'Đã duyệt | Đang mở bán';
            tour.trang_thai_badge_class = 'bg-cyan-light text-cyan';
            alert(`Đã kích hoạt mở bán lại cho tour ${tour.ma_tour}!`);
        },

        saoChepTour(tour) {
            alert(`Đã tạo bản sao từ tour ${tour.ma_tour}. Bạn có thể chỉnh sửa cấu hình giá và xuất bản.`);
        },

        xemLich(tour) {
            alert(`Chuyển đến màn hình Quản lý Lịch khởi hành của tour ${tour.ma_tour}`);
        },

        huyYeuCau(tour) {
            if (confirm(`Hủy yêu cầu kiểm duyệt cho tour ${tour.ma_tour}?`)) {
                this.tours = this.tours.filter(t => t.ma_tour !== tour.ma_tour);
                alert('Đã hủy yêu cầu phê duyệt!');
            }
        },

        xoaTour(tour) {
            if (confirm(`Bạn có chắc muốn xóa vĩnh viễn tour "${tour.ten_tour}"?`)) {
                this.tours = this.tours.filter(t => t.ma_tour !== tour.ma_tour);
                alert('Đã xóa tour thành công!');
            }
        },

        chuyenTrang(page) {
            alert(`Chuyển sang trang ${page}`);
        }
    }
};
</script>

<style scoped>
.partner-quan-ly-tour-page {
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
    font-size: 1.25rem;
    flex-shrink: 0;
}

.icon-pink { background-color: #ffe4e6; color: #e11d48; }
.icon-purple { background-color: #f3e8ff; color: #9333ea; }
.icon-cyan { background-color: #e0f2fe; color: #0284c7; }

/* Filter Box */
.filter-box {
    border: 1px solid #f1f5f9 !important;
}

.filter-tab-pill {
    border: 1px solid #e2e8f0;
    background-color: #ffffff;
    color: #475569;
    font-size: 0.74rem;
    font-weight: 600;
    border-radius: 999px;
    padding: 0.25rem 0.75rem;
    transition: all 0.15s;
}

.filter-tab-pill:hover {
    background-color: #f8fafc;
    color: #0f172a;
}

.filter-tab-pill.active-pill {
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

/* Tour Items */
.tour-item-card {
    border: 1px solid #e2e8f0 !important;
    transition: all 0.2s ease-in-out;
}

.tour-item-card:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05) !important;
}

.tour-image-wrap {
    width: 90px;
    height: 90px;
}

.tour-thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.tour-code-overlay {
    position: absolute;
    bottom: 4px;
    left: 4px;
    background: rgba(15, 23, 42, 0.75);
    color: #ffffff;
    font-size: 0.65rem;
    padding: 0.1rem 0.4rem;
    border-radius: 4px;
}

.tour-title-clamp {
    line-height: 1.35;
}

.price-tier-box {
    min-width: 90px;
}

.pending-review-box {
    background-color: #eff6ff;
    border-color: #dbeafe !important;
}

.hidden-notice-box {
    background-color: #f8fafc;
    border-color: #f1f5f9 !important;
}

/* Pagination */
.btn-page-nav {
    width: 30px;
    height: 30px;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 0.75rem;
    font-weight: 600;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.15s;
}

.btn-page-nav:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
}

.btn-page-nav.active {
    background: #e11d48;
    border-color: #e11d48;
    color: #ffffff;
    font-weight: 700;
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

.btn-outline-purple {
    border: 1px solid #d8b4fe;
    color: #7e22ce;
    background-color: #faf5ff;
}

.btn-outline-purple:hover {
    background-color: #f3e8ff;
    color: #6b21a8;
}

.btn-outline-cyan {
    border: 1px solid #bae6fd;
    color: #0284c7;
    background-color: #f0f9ff;
}

.btn-outline-cyan:hover {
    background-color: #e0f2fe;
    color: #0369a1;
}

.text-pink { color: #e11d48 !important; }
.bg-pink { background-color: #e11d48 !important; }
.bg-pink-light { background-color: #ffe4e6 !important; }

.text-purple { color: #9333ea !important; }
.bg-purple { background-color: #9333ea !important; }
.bg-purple-light { background-color: #f3e8ff !important; }

.text-cyan { color: #0284c7 !important; }
.bg-cyan { background-color: #0284c7 !important; }
.bg-cyan-light { background-color: #e0f2fe !important; }

.bg-warning-light { background-color: #fffbeb !important; }

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
.modal-dialog-custom.modal-lg { max-width: 760px; }

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
.font-8 { font-size: 0.5rem !important; }
.font-9 { font-size: 0.6rem !important; }
.font-10 { font-size: 0.65rem !important; }
.font-11 { font-size: 0.72rem !important; }
.font-12 { font-size: 0.78rem !important; }
.font-13 { font-size: 0.83rem !important; }
.font-14 { font-size: 0.88rem !important; }
.font-16 { font-size: 1rem !important; }
.font-22 { font-size: 1.38rem !important; }
.font-32 { font-size: 2rem !important; }
</style>
