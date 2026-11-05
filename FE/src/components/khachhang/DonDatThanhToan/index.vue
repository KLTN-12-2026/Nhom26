<template>
    <div class="don-dat-thanh-toan-page pb-5">
        <!-- Top Stepper Process Bar -->
        <div class="checkout-stepper-wrap mb-4 d-flex justify-content-center">
            <div class="d-flex align-items-center flex-wrap gap-2 gap-sm-3 px-3 py-2 bg-white rounded-pill border shadow-sm">
                <!-- Step 1 -->
                <div class="step-item d-flex align-items-center gap-2 text-pink fw-bold small">
                    <span class="step-num rounded-circle d-flex align-items-center justify-content-center bg-pink text-white">1</span>
                    <span>Chọn Tour</span>
                </div>
                <div class="step-line step-line-active"></div>

                <!-- Step 2 -->
                <div class="step-item d-flex align-items-center gap-2 text-pink fw-bold small">
                    <span class="step-num rounded-circle d-flex align-items-center justify-content-center bg-pink text-white">2</span>
                    <span>Hành khách</span>
                </div>
                <div class="step-line step-line-active"></div>

                <!-- Step 3 -->
                <div class="step-item d-flex align-items-center gap-2 text-purple fw-bold small">
                    <span class="step-num rounded-circle d-flex align-items-center justify-content-center bg-purple text-white">3</span>
                    <span>Thanh toán</span>
                </div>
                <div class="step-line"></div>

                <!-- Step 4 -->
                <div class="step-item d-flex align-items-center gap-2 text-muted fw-semibold small">
                    <span class="step-num rounded-circle d-flex align-items-center justify-content-center bg-light text-muted border">4</span>
                    <span>Xác nhận</span>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Left Main Content Column (8 Cols) -->
            <div class="col-lg-8">
                <!-- ================= BƯỚC 1: TOUR & LỊCH KHỞI HÀNH ================= -->
                <div class="card border rounded-4 shadow-sm p-4 mb-4 bg-white">
                    <div class="d-flex justify-content-between align-items-start gap-3 flex-wrap mb-3">
                        <div class="flex-grow-1">
                            <span class="badge badge-step-pink rounded-pill px-3 py-1 small fw-bold mb-2 d-inline-flex align-items-center gap-1">
                                <i class="bx bx-compass"></i>BƯỚC 1: TOUR &amp; LỊCH KHỞI HÀNH
                            </span>
                            <h1 class="h4 fw-bold text-dark mb-2">
                                Đà Nẵng – Bán Đảo Sơn Trà – Hội An Phố Cổ 3N2Đ
                            </h1>
                            <div class="d-flex flex-wrap align-items-center gap-2 small text-secondary">
                                <span class="d-flex align-items-center gap-1">
                                    <i class="bx bx-time text-pink"></i>3 Ngày 2 Đêm
                                </span>
                                <span>•</span>
                                <span class="d-flex align-items-center gap-1">
                                    <i class="bx bx-map-pin text-pink"></i>Điểm đến: Sơn Trà, Ngũ Hành Sơn, Hội An
                                </span>
                                <span class="badge badge-star-pill rounded-pill px-2 py-1">
                                    <i class="bx bxs-star me-1 text-warning"></i>Tiêu chuẩn 4 Sao
                                </span>
                            </div>
                        </div>
                        <div class="tour-thumb-wrap rounded-4 overflow-hidden border">
                            <img src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=600&auto=format&fit=crop&q=80" alt="Tour Thumbnail" class="w-100 h-100 object-fit-cover">
                        </div>
                    </div>

                    <!-- 2 Sub Cards: Lịch Khởi Hành & Điểm Đón -->
                    <div class="row g-3 pt-2">
                        <!-- Box Lịch khởi hành -->
                        <div class="col-md-6">
                            <div class="sub-schedule-card p-3 rounded-4 border h-100 position-relative">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-1 text-pink fw-bold small">
                                        <i class="bx bx-calendar"></i>
                                        <span>LỊCH KHỞI HÀNH</span>
                                    </div>
                                    <span class="badge badge-seat-pink rounded-pill px-2 py-1 small">
                                        Còn 12 chỗ
                                    </span>
                                </div>
                                <div class="schedule-date-title fw-bold text-dark fs-5 mb-1">
                                    Thứ Ba, 25/11/2025
                                </div>
                                <div class="d-flex justify-content-between align-items-center text-secondary small">
                                    <span>Xuất phát: <strong>07:30 Sáng</strong></span>
                                    <a href="javascript:void(0)" class="text-pink text-decoration-none fw-semibold" @click="handleChangeDate">
                                        Đổi ngày ↷
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Box Điểm đón du khách -->
                        <div class="col-md-6">
                            <div class="sub-pickup-card p-3 rounded-4 border h-100">
                                <div class="d-flex align-items-center gap-1 text-teal fw-bold small mb-2">
                                    <i class="bx bx-navigation"></i>
                                    <span>ĐIỂM ĐÓN DU KHÁCH</span>
                                </div>
                                <div class="d-flex flex-column gap-2 small">
                                    <label class="d-flex align-items-start gap-2 pickup-option p-2 rounded-3 border" :class="{ active: pickupLocation === 'airport' }">
                                        <input type="radio" class="form-check-input mt-1" value="airport" v-model="pickupLocation">
                                        <span><strong>Sân bay Quốc tế Đà Nẵng</strong> (Ga Đến T1)</span>
                                    </label>
                                    <label class="d-flex align-items-start gap-2 pickup-option p-2 rounded-3 border" :class="{ active: pickupLocation === 'hotel' }">
                                        <input type="radio" class="form-check-input mt-1" value="hotel" v-model="pickupLocation">
                                        <span><strong>Đón tại khách sạn</strong> trung tâm Quận Hải Châu</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= BƯỚC 2: DANH SÁCH KHÁCH THAM GIA TOUR ================= -->
                <div class="card border rounded-4 shadow-sm p-4 mb-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <span class="badge badge-step-purple rounded-pill px-3 py-1 small fw-bold d-inline-flex align-items-center gap-1">
                            <i class="bx bx-group"></i>BƯỚC 2: DANH SÁCH KHÁCH THAM GIA TOUR
                        </span>
                        <span class="text-secondary small fw-medium">
                            Tổng: <strong class="text-dark">{{ totalGuests }} Hành khách</strong> ({{ adultsCount }} Lớn + {{ childrenCount }} Trẻ em)
                        </span>
                    </div>

                    <!-- 3 Passenger Counter Cards -->
                    <div class="row g-3 mb-4">
                        <!-- Người lớn -->
                        <div class="col-md-4">
                            <div class="counter-card p-3 rounded-4 border text-center">
                                <div class="fw-bold text-dark small mb-1">Người lớn (≥12 tuổi)</div>
                                <div class="price-pill-sub text-pink fw-bold mb-2">3.250.000 đ</div>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <button type="button" class="btn btn-counter rounded-circle" :disabled="adultsCount <= 1" @click="adultsCount--">
                                        <i class="bx bx-minus"></i>
                                    </button>
                                    <span class="counter-num fw-bold fs-6">{{ adultsCount }}</span>
                                    <button type="button" class="btn btn-counter rounded-circle btn-counter-pink text-white" @click="adultsCount++">
                                        <i class="bx bx-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Trẻ em -->
                        <div class="col-md-4">
                            <div class="counter-card p-3 rounded-4 border text-center">
                                <div class="fw-bold text-dark small mb-1">Trẻ em (5–11 tuổi)</div>
                                <div class="price-pill-sub text-purple fw-bold mb-2">2.450.000 đ</div>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <button type="button" class="btn btn-counter rounded-circle" :disabled="childrenCount <= 0" @click="childrenCount--">
                                        <i class="bx bx-minus"></i>
                                    </button>
                                    <span class="counter-num fw-bold fs-6">{{ childrenCount }}</span>
                                    <button type="button" class="btn btn-counter rounded-circle btn-counter-purple text-white" @click="childrenCount++">
                                        <i class="bx bx-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Em bé -->
                        <div class="col-md-4">
                            <div class="counter-card p-3 rounded-4 border text-center">
                                <div class="fw-bold text-dark small mb-1">Em bé (&lt;5 tuổi)</div>
                                <div class="price-pill-sub text-teal fw-bold mb-2">Miễn phí (0 đ)</div>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <button type="button" class="btn btn-counter rounded-circle" :disabled="infantCount <= 0" @click="infantCount--">
                                        <i class="bx bx-minus"></i>
                                    </button>
                                    <span class="counter-num fw-bold fs-6">{{ infantCount }}</span>
                                    <button type="button" class="btn btn-counter rounded-circle" @click="infantCount++">
                                        <i class="bx bx-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Passenger Detail Input Forms -->
                    <div class="passenger-forms-container d-flex flex-column gap-3 mb-4">
                        <!-- Passenger 1: Trưởng đoàn -->
                        <div class="passenger-card p-3 rounded-4 border bg-light">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="passenger-num-circle bg-pink text-white small fw-bold">1</span>
                                    <strong class="text-dark small">Hành khách 1 (Người lớn – Trưởng đoàn đặt tour)</strong>
                                </div>
                                <span class="badge bg-pink text-white rounded-pill px-2 py-1 small">Chính chủ</span>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <label class="form-label text-muted small mb-1">Họ &amp; Tên *</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" v-model="passengers[0].fullName" placeholder="Nhập họ và tên...">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-muted small mb-1">Số Điện Thoại (Zalo) *</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" v-model="passengers[0].phone" placeholder="Nhập số điện thoại...">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-muted small mb-1">Số CCCD / Hộ Chiếu *</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" v-model="passengers[0].idCard" placeholder="Nhập số CCCD...">
                                </div>
                            </div>
                        </div>

                        <!-- Passenger 2: Đi cùng -->
                        <div class="passenger-card p-3 rounded-4 border bg-light" v-if="adultsCount >= 2">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="passenger-num-circle bg-purple text-white small fw-bold">2</span>
                                    <strong class="text-dark small">Hành khách 2 (Người lớn)</strong>
                                </div>
                                <span class="badge bg-purple-subtle text-purple rounded-pill px-2 py-1 small">Đi cùng</span>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <label class="form-label text-muted small mb-1">Họ &amp; Tên *</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" v-model="passengers[1].fullName" placeholder="Nhập họ và tên...">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-muted small mb-1">Số Điện Thoại</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" v-model="passengers[1].phone" placeholder="Nhập số điện thoại...">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-muted small mb-1">Số CCCD / Hộ Chiếu *</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" v-model="passengers[1].idCard" placeholder="Nhập số CCCD...">
                                </div>
                            </div>
                        </div>

                        <!-- Passenger 3: Trẻ em -->
                        <div class="passenger-card p-3 rounded-4 border bg-light" v-if="childrenCount >= 1">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="passenger-num-circle bg-teal text-white small fw-bold">3</span>
                                    <strong class="text-dark small">Hành khách 3 (Trẻ em 5–11 tuổi)</strong>
                                </div>
                                <span class="badge bg-teal-subtle text-teal rounded-pill px-2 py-1 small">Giá vé 75%</span>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small mb-1">Họ &amp; Tên trẻ nhỏ *</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" v-model="passengers[2].fullName" placeholder="Nhập tên bé...">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small mb-1">Năm sinh / Ngày sinh *</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" v-model="passengers[2].birthday" placeholder="VD: 14/06/2018 (7 tuổi)">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Special Requests -->
                    <div>
                        <label class="form-label fw-bold text-dark small d-flex align-items-center gap-1">
                            <i class="bx bx-message-alt-dots text-pink"></i>
                            <span>Yêu cầu đặc biệt &amp; Lưu ý ăn uống</span>
                        </label>
                        <textarea 
                            class="form-control rounded-4 p-3 small" 
                            rows="2" 
                            placeholder="Ghi chú yêu cầu món ăn chay, dị ứng thực phẩm, chỗ ngồi trên xe du lịch..."
                            v-model="specialNotes"
                        ></textarea>
                    </div>
                </div>

                <!-- ================= BƯỚC 3: PHƯƠNG THỨC THANH TOÁN ================= -->
                <div class="card border rounded-4 shadow-sm p-4 mb-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <span class="badge badge-step-cyan rounded-pill px-3 py-1 small fw-bold d-inline-flex align-items-center gap-1">
                            <i class="bx bx-credit-card"></i>BƯỚC 3: PHƯƠNG THỨC THANH TOÁN
                        </span>
                        <span class="text-secondary small d-flex align-items-center gap-1">
                            <i class="bx bx-lock-alt text-teal"></i>Mã hóa an toàn 256-bit
                        </span>
                    </div>

                    <!-- 4 Payment Methods (2x2 Grid) -->
                    <div class="row g-3">
                        <!-- VNPAY QR -->
                        <div class="col-md-6">
                            <label class="payment-method-card p-3 rounded-4 border d-flex align-items-center justify-content-between cursor-pointer w-100 mb-0" :class="{ active: paymentMethod === 'vnpay' }">
                                <div class="d-flex align-items-center gap-3">
                                    <input type="radio" class="form-check-input mt-0" value="vnpay" v-model="paymentMethod">
                                    <div class="pay-icon-box pay-icon-vnpay rounded-3 d-flex align-items-center justify-content-center">
                                        <i class="bx bx-qr-scan fs-4"></i>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2">
                                            <strong class="text-dark small">VNPAY QR</strong>
                                            <span class="badge bg-pink text-white rounded-pill px-2 py-0" style="font-size: 0.65rem;">Khuyên dùng</span>
                                        </div>
                                        <div class="text-muted" style="font-size: 0.72rem;">Quét mã nhanh qua ứng dụng ngân hàng</div>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- MoMo -->
                        <div class="col-md-6">
                            <label class="payment-method-card p-3 rounded-4 border d-flex align-items-center justify-content-between cursor-pointer w-100 mb-0" :class="{ active: paymentMethod === 'momo' }">
                                <div class="d-flex align-items-center gap-3">
                                    <input type="radio" class="form-check-input mt-0" value="momo" v-model="paymentMethod">
                                    <div class="pay-icon-box pay-icon-momo rounded-3 d-flex align-items-center justify-content-center text-white">
                                        <i class="bx bx-wallet fs-4"></i>
                                    </div>
                                    <div>
                                        <strong class="text-dark small">Ví Điện Tử MoMo</strong>
                                        <div class="text-muted" style="font-size: 0.72rem;">Thanh toán tức thời qua app MoMo</div>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- Visa / Master -->
                        <div class="col-md-6">
                            <label class="payment-method-card p-3 rounded-4 border d-flex align-items-center justify-content-between cursor-pointer w-100 mb-0" :class="{ active: paymentMethod === 'visa' }">
                                <div class="d-flex align-items-center gap-3">
                                    <input type="radio" class="form-check-input mt-0" value="visa" v-model="paymentMethod">
                                    <div class="pay-icon-box pay-icon-visa rounded-3 d-flex align-items-center justify-content-center text-white">
                                        <i class="bx bx-credit-card-front fs-4"></i>
                                    </div>
                                    <div>
                                        <strong class="text-dark small">Thẻ Quốc Tế Visa / Master</strong>
                                        <div class="text-muted" style="font-size: 0.72rem;">Hỗ trợ thẻ tín dụng, ghi nợ bảo mật</div>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- VietQR 24/7 -->
                        <div class="col-md-6">
                            <label class="payment-method-card p-3 rounded-4 border d-flex align-items-center justify-content-between cursor-pointer w-100 mb-0" :class="{ active: paymentMethod === 'vietqr' }">
                                <div class="d-flex align-items-center gap-3">
                                    <input type="radio" class="form-check-input mt-0" value="vietqr" v-model="paymentMethod">
                                    <div class="pay-icon-box pay-icon-bank rounded-3 d-flex align-items-center justify-content-center text-white">
                                        <i class="bx bxs-bank fs-4"></i>
                                    </div>
                                    <div>
                                        <strong class="text-dark small">Chuyển Khoản VietQR 24/7</strong>
                                        <div class="text-muted" style="font-size: 0.72rem;">Hệ thống SmartPay tự động duyệt trong 10s</div>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- ================= CHÍNH SÁCH HOÀN HỦY TOUR ================= -->
                <div class="card border rounded-4 shadow-sm p-4 bg-white">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <i class="bx bx-shield-quarter text-pink fs-4"></i>
                        <h3 class="h6 fw-bold text-dark mb-0 text-uppercase">Chính Sách Hoàn Hủy Tour Minh Bạch</h3>
                    </div>

                    <div class="row g-2 mb-3">
                        <!-- Policy 1 -->
                        <div class="col-md-4">
                            <div class="policy-box p-3 rounded-3 border bg-light h-100">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <strong class="small text-dark">Trước &gt;72 Giờ</strong>
                                    <span class="badge bg-success rounded-pill px-2 py-1 small">Hoàn 100%</span>
                                </div>
                                <p class="text-secondary mb-0" style="font-size: 0.75rem;">
                                    Miễn phí hủy hoàn toàn, hoàn trả tự động vào tài khoản.
                                </p>
                            </div>
                        </div>

                        <!-- Policy 2 -->
                        <div class="col-md-4">
                            <div class="policy-box p-3 rounded-3 border bg-light h-100">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <strong class="small text-dark">Trước 48 – 72 Giờ</strong>
                                    <span class="badge bg-warning text-dark rounded-pill px-2 py-1 small">Hoàn 70%</span>
                                </div>
                                <p class="text-secondary mb-0" style="font-size: 0.75rem;">
                                    Khấu trừ phí giữ chỗ &amp; dịch vụ nhà hàng đối tác.
                                </p>
                            </div>
                        </div>

                        <!-- Policy 3 -->
                        <div class="col-md-4">
                            <div class="policy-box p-3 rounded-3 border bg-light h-100">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <strong class="small text-dark">Trước 24 – 48 Giờ</strong>
                                    <span class="badge bg-danger rounded-pill px-2 py-1 small">Hoàn 50%</span>
                                </div>
                                <p class="text-secondary mb-0" style="font-size: 0.75rem;">
                                    Dưới 24h hoặc không có mặt khởi hành: Không hoàn tiền.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Terms agreement checkbox -->
                    <div class="form-check pt-2">
                        <input class="form-check-input" type="checkbox" id="checkTerms" v-model="agreeTerms">
                        <label class="form-check-label small text-secondary" for="checkTerms">
                            Tôi xác nhận thông tin hành khách đã chính xác, đã đọc và hoàn toàn đồng ý với 
                            <a href="javascript:void(0)" class="text-pink text-decoration-none fw-semibold">Điều Khoản Dịch Vụ Đặt Tour</a>, 
                            <a href="javascript:void(0)" class="text-pink text-decoration-none fw-semibold">Chính Sách Bảo Mật</a> và quy định an toàn du lịch Đà Nẵng.
                        </label>
                    </div>
                </div>
            </div>

            <!-- Right Summary Column (4 Cols Sticky) -->
            <div class="col-lg-4">
                <div class="summary-sticky-wrap">
                    <!-- Main Summary Card -->
                    <div class="card border rounded-4 shadow-sm p-4 bg-white mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="summary-icon-box rounded-3 text-pink d-flex align-items-center justify-content-center">
                                    <i class="bx bx-receipt fs-4"></i>
                                </div>
                                <div>
                                    <h2 class="h6 fw-bold text-dark mb-0">Tóm Tắt Đơn Đặt Tour</h2>
                                    <span class="small text-pink font-monospace">#HD-DANANG-98214</span>
                                </div>
                            </div>
                            <span class="badge badge-waiting-pill rounded-pill px-2 py-1 small">
                                <span class="dot-warning me-1"></span>Chờ Thanh Toán
                            </span>
                        </div>

                        <!-- Price Lines -->
                        <div class="summary-lines d-flex flex-column gap-2 py-2 border-top border-bottom small text-secondary">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Vé Người lớn (x{{ adultsCount }} khách)</span>
                                <strong class="text-dark">{{ formatVND(adultsPriceTotal) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center" v-if="childrenCount > 0">
                                <span>Vé Trẻ em 5–11 tuổi (x{{ childrenCount }} trẻ)</span>
                                <strong class="text-dark">{{ formatVND(childrenPriceTotal) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center" v-if="infantCount > 0">
                                <span>Em bé dưới 5 tuổi (x{{ infantCount }})</span>
                                <span class="text-success fw-bold">0 đ</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Bảo hiểm Bảo Việt (100tr/người)</span>
                                <span class="badge bg-teal-subtle text-teal rounded-pill px-2 py-1">Miễn phí</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Phí dịch vụ &amp; VAT (8%)</span>
                                <span class="badge bg-teal-subtle text-teal rounded-pill px-2 py-1">Đã bao gồm</span>
                            </div>
                        </div>

                        <!-- Voucher Box -->
                        <div class="voucher-section py-3 border-bottom">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="small fw-bold text-dark d-flex align-items-center gap-1">
                                    <i class="bx bx-purchase-tag-alt text-pink"></i>Mã Voucher Giảm Giá
                                </span>
                                <a href="javascript:void(0)" class="small text-pink text-decoration-none fw-semibold" @click="handleViewVouchers">
                                    Xem kho mã (3)
                                </a>
                            </div>
                            <div class="input-group input-group-sm mb-2">
                                <input type="text" class="form-control rounded-start-pill ps-3 font-monospace" placeholder="Nhập mã..." v-model="voucherCode">
                                <button class="btn btn-apply-voucher rounded-end-pill px-3 fw-bold text-white" type="button" @click="applyVoucher">
                                    Áp Dụng
                                </button>
                            </div>

                            <!-- Applied Voucher alert -->
                            <div class="applied-voucher-pill p-2 rounded-3 d-flex align-items-center justify-content-between small" v-if="voucherDiscount > 0">
                                <div class="d-flex align-items-center gap-1 text-pink">
                                    <i class="bx bxs-hot"></i>
                                    <span>Giảm ngay ưu đãi Flash Sale SmartTrip</span>
                                </div>
                                <strong class="text-pink">-250.000 đ</strong>
                            </div>
                        </div>

                        <!-- Total Payment Section -->
                        <div class="total-section py-3">
                            <div class="d-flex justify-content-between align-items-baseline mb-1">
                                <span class="text-uppercase fw-bold text-dark small" style="letter-spacing: 0.5px;">Tổng Thanh Toán</span>
                                <div class="text-end">
                                    <div class="total-price-large fw-bold text-pink">
                                        {{ formatVND(finalTotal) }}
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center small text-muted">
                                <span class="text-teal fw-semibold d-flex align-items-center gap-1">
                                    <i class="bx bx-check-circle"></i>Tiết kiệm 250.000 đ
                                </span>
                                <span>Đã bao gồm tất cả thuế phí</span>
                            </div>
                        </div>

                        <!-- Main Submit CTA Button -->
                        <button 
                            type="button" 
                            class="btn btn-confirm-booking w-100 rounded-pill py-3 fw-bold text-white shadow-sm mb-2 d-flex align-items-center justify-content-center gap-2"
                            :disabled="!agreeTerms"
                            @click="handleConfirmPayment"
                        >
                            <i class="bx bx-shield-alt-2 fs-5"></i>
                            <span>XÁC NHẬN ĐẶT TOUR &amp; THANH TOÁN ({{ formatVND(finalTotal) }})</span>
                        </button>
                        <div class="text-center text-muted" style="font-size: 0.72rem;">
                            <i class="bx bx-check-shield text-teal me-1"></i>Xử lý vé tức thời &amp; gửi vé điện tử qua Email/Zalo
                        </div>

                        <!-- Trust Security Badges -->
                        <div class="trust-badges-list pt-3 border-top mt-3 d-flex flex-column gap-2 small text-secondary">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-lock-alt text-teal fs-6"></i>
                                <span>Bảo mật giao dịch tiêu chuẩn PCI-DSS Level 1</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-check-circle text-teal fs-6"></i>
                                <span>Giữ chỗ ngay – Cam kết hoàn tiền nếu hủy hợp lệ</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-phone-call text-pink fs-6"></i>
                                <span>Hotline khẩn cấp 24/7: <strong class="text-danger">1900 6868</strong></span>
                            </div>
                        </div>
                    </div>

                    <!-- Bonus Gift Card -->
                    <div class="card border-0 rounded-4 shadow-sm p-3 bg-gift-gradient text-white position-relative overflow-hidden">
                        <div class="d-flex align-items-center gap-3">
                            <div class="gift-icon-box rounded-circle bg-white text-pink d-flex align-items-center justify-content-center fs-4">
                                <i class="bx bxs-gift"></i>
                            </div>
                            <div>
                                <h3 class="h6 fw-bold mb-1">Quà Tặng Du Khách Đà Nẵng</h3>
                                <p class="mb-0 small text-white text-opacity-90">
                                    Tặng 01 vé Du Thuyền Sông Hàn ngắm Cầu Rồng phun lửa cho nhóm từ 3 người!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Success Modal -->
        <div class="modal fade" :class="{ show: showSuccessModal }" :style="{ display: showSuccessModal ? 'block' : 'none' }" tabindex="-1" v-if="showSuccessModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header border-0 pb-0">
                        <button type="button" class="btn-close" @click="showSuccessModal = false"></button>
                    </div>
                    <div class="modal-body p-4 text-center">
                        <div class="success-icon-wrap rounded-circle bg-success text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; font-size: 32px;">
                            <i class="bx bx-check"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-1">Xác Nhận Đặt Tour Thành Công!</h4>
                        <p class="text-secondary small mb-3">Mã đơn hàng: <strong class="text-pink font-monospace">#HD-DANANG-98214</strong></p>
                        
                        <div class="qr-box p-3 bg-light rounded-4 border mb-3 d-inline-block">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=HD-DANANG-98214-PAYMENT" alt="QR Payment" class="rounded-3" style="width: 140px; height: 140px;">
                            <div class="small text-muted mt-2">Quét mã QR để hoàn tất thanh toán</div>
                        </div>

                        <div class="alert alert-info border-0 rounded-3 text-start small mb-0">
                            <i class="bx bx-envelope me-1"></i>Vé điện tử và hướng dẫn đón khách đã được gửi về Email và Zalo của trưởng đoàn: <strong>{{ passengers[0].phone }}</strong>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 justify-content-center">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" @click="showSuccessModal = false">Đóng</button>
                        <router-link to="/client/lich-su-ke-hoach" class="btn btn-pink rounded-pill px-4 text-white">Xem Lịch Sử Đơn</router-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show" v-if="showSuccessModal" @click="showSuccessModal = false"></div>
    </div>
</template>

<script>
export default {
    name: 'DonDatThanhToanComponent',
    data() {
        return {
            pickupLocation: 'airport',
            adultsCount: 2,
            childrenCount: 1,
            infantCount: 0,
            adultPrice: 3250000,
            childPrice: 2450000,
            voucherCode: 'DANANGSMAI',
            voucherDiscount: 250000,
            paymentMethod: 'vnpay',
            agreeTerms: true,
            specialNotes: 'Khách ăn chay 1 người (bữa trưa Hội An), yêu cầu xếp ghế gần cửa sổ xe du lịch.',
            showSuccessModal: false,
            passengers: [
                {
                    fullName: 'Trần Minh Anh',
                    phone: '0918 234 567',
                    idCard: '048092019482',
                    birthday: ''
                },
                {
                    fullName: 'Lê Thị Hoàng Yến',
                    phone: '0987 654 321',
                    idCard: '048194002341',
                    birthday: ''
                },
                {
                    fullName: 'Trần Bảo Nam',
                    phone: '',
                    idCard: '',
                    birthday: '14/06/2018 (7 tuổi)'
                }
            ]
        };
    },
    computed: {
        totalGuests() {
            return this.adultsCount + this.childrenCount + this.infantCount;
        },
        adultsPriceTotal() {
            return this.adultsCount * this.adultPrice;
        },
        childrenPriceTotal() {
            return this.childrenCount * this.childPrice;
        },
        subTotal() {
            return this.adultsPriceTotal + this.childrenPriceTotal;
        },
        finalTotal() {
            return Math.max(0, this.subTotal - this.voucherDiscount);
        }
    },
    methods: {
        formatVND(val) {
            if (!val) return '0 đ';
            return new Intl.NumberFormat('vi-VN').format(val) + ' đ';
        },
        handleChangeDate() {
            const newDate = prompt('Nhập ngày khởi hành mong muốn mới (VD: 28/11/2025):', '28/11/2025');
            if (newDate) {
                alert(`Đã cập nhật ngày khởi hành sang: ${newDate}`);
            }
        },
        applyVoucher() {
            if (this.voucherCode.trim().toUpperCase() === 'DANANGSMAI') {
                this.voucherDiscount = 250000;
                alert('Áp dụng mã voucher DANANGSMAI thành công! Đã giảm 250.000 đ.');
            } else {
                alert('Mã voucher không hợp lệ hoặc đã hết hạn.');
            }
        },
        handleViewVouchers() {
            alert('Kho Voucher Đà Nẵng SmartTrip:\n1. DANANGSMAI - Giảm 250.000 đ (Flash Sale)\n2. SUMMER2025 - Giảm 100.000 đ\n3. VIPCLIENT - Giảm 5% cho thành viên VIP');
        },
        handleConfirmPayment() {
            if (!this.agreeTerms) {
                alert('Vui lòng đồng ý với Điều Khoản Dịch Vụ và Chính Sách Bảo Mật trước khi tiếp tục!');
                return;
            }
            this.showSuccessModal = true;
        }
    }
};
</script>

<style scoped>
.don-dat-thanh-toan-page {
    max-width: 100%;
    overflow-x: hidden;
}

/* Color tokens */
.text-pink { color: #db2777 !important; }
.text-teal { color: #0d9488 !important; }
.text-purple { color: #7c3aed !important; }
.bg-pink { background: linear-gradient(135deg, #ec4899 0%, #db2777 100%) !important; }
.bg-purple { background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%) !important; }
.bg-teal { background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%) !important; }
.bg-teal-subtle { background-color: #ccfbf1 !important; }
.bg-purple-subtle { background-color: #ede9fe !important; }

/* Stepper */
.step-num {
    width: 26px;
    height: 26px;
    font-size: 0.8rem;
}
.step-line {
    width: 40px;
    height: 2px;
    background-color: #e2e8f0;
}
.step-line-active {
    background-color: #db2777;
}

/* Step badges */
.badge-step-pink {
    background: #fdf2f8;
    color: #db2777;
    border: 1px solid #fbcfe8;
}
.badge-step-purple {
    background: #faf5ff;
    color: #7c3aed;
    border: 1px solid #ede9fe;
}
.badge-step-cyan {
    background: #f0fdfa;
    color: #0d9488;
    border: 1px solid #ccfbf1;
}
.badge-star-pill {
    background: #fef3c7;
    color: #b45309;
    font-size: 0.72rem;
}

/* Tour Thumbnail */
.tour-thumb-wrap {
    width: 88px;
    height: 64px;
    flex-shrink: 0;
}

/* Sub cards */
.sub-schedule-card {
    background: #fff1f2;
    border-color: #fecdd3 !important;
}
.badge-seat-pink {
    background: #f43f5e;
    color: #fff;
    font-size: 0.7rem;
}
.sub-pickup-card {
    background: #f0fdfa;
    border-color: #ccfbf1 !important;
}
.pickup-option {
    background: #fff;
    transition: all 0.2s;
    cursor: pointer;
}
.pickup-option.active {
    border-color: #0d9488 !important;
    background-color: #f0fdfa;
}

/* Passenger Counters */
.counter-card {
    background: #faf5ff;
    border-color: #f3e8ff !important;
}
.btn-counter {
    width: 30px;
    height: 30px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e2e8f0;
    background-color: #fff;
    color: #475569;
}
.btn-counter-pink {
    background: #db2777 !important;
    border-color: #db2777 !important;
}
.btn-counter-purple {
    background: #7c3aed !important;
    border-color: #7c3aed !important;
}
.counter-num {
    min-width: 24px;
}

/* Passenger Input Forms */
.passenger-card {
    border-color: #f1f5f9 !important;
}
.passenger-num-circle {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.72rem;
}

/* Payment Methods */
.payment-method-card {
    background: #fff;
    transition: all 0.2s;
}
.payment-method-card:hover {
    background-color: #f8fafc;
}
.payment-method-card.active {
    border-color: #db2777 !important;
    background: #fdf2f8;
}
.pay-icon-box {
    width: 44px;
    height: 44px;
    flex-shrink: 0;
}
.pay-icon-vnpay {
    background: #fff1f2;
    color: #e11d48;
}
.pay-icon-momo {
    background: linear-gradient(135deg, #a21caf 0%, #701a75 100%);
}
.pay-icon-visa {
    background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
}
.pay-icon-bank {
    background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
}

/* Summary Right Column */
.summary-sticky-wrap {
    position: sticky;
    top: 80px;
}
.summary-icon-box {
    width: 40px;
    height: 40px;
    background: #fdf2f8;
}
.badge-waiting-pill {
    background: #fef3c7;
    color: #b45309;
    border: 1px solid #fde68a;
}
.dot-warning {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #f59e0b;
    display: inline-block;
}
.btn-apply-voucher {
    background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
    border: none;
    font-size: 0.78rem;
}
.applied-voucher-pill {
    background: #fff1f2;
    border: 1px dashed #fecdd3;
}
.total-price-large {
    font-size: 1.75rem;
    line-height: 1.1;
}
.btn-confirm-booking {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    border: none;
    font-size: 0.88rem;
    box-shadow: 0 4px 15px rgba(219, 39, 119, 0.3);
    transition: all 0.2s;
}
.btn-confirm-booking:hover:not(:disabled) {
    opacity: 0.95;
    transform: translateY(-2px);
}
.btn-confirm-booking:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

/* Bonus Gift Card */
.bg-gift-gradient {
    background: linear-gradient(135deg, #f43f5e 0%, #db2777 50%, #9333ea 100%);
}
.gift-icon-box {
    width: 46px;
    height: 46px;
    flex-shrink: 0;
}
</style>
