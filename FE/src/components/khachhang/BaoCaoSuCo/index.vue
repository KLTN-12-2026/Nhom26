<template>
    <div class="bao-cao-su-co-page pb-5">
        <!-- 1. TOP HERO BANNER -->
        <div class="report-hero-card mb-4">
            <div class="row align-items-center g-3">
                <div class="col-12 col-lg-8">
                    <div class="hero-badge-pill mb-2">
                        <i class="bx bx-shield-quarter me-1 font-16"></i> BẢO VỆ QUYỀN LỢI DU KHÁCH 24/7
                    </div>
                    <h1 class="hero-main-title">
                        Trung Tâm Hỗ Trợ, Khiếu Nại &amp; Báo Cáo Vi Phạm
                    </h1>
                    <p class="hero-subtitle mb-0">
                        Đà Nẵng SmartTrip AI cam kết đồng hành cùng du khách 24/7. Phản hồi các sự cố về giá vé, lộ trình, chất lượng tour hoặc nội dung sai lệch được xử lý trong vòng <strong class="text-pink">15–30 phút</strong>.
                    </p>
                </div>
                <div class="col-12 col-lg-4 text-lg-end">
                    <div class="stat-response-card ms-lg-auto">
                        <div class="stat-clock-icon">
                            <i class="bx bx-time-five"></i>
                        </div>
                        <div class="stat-info text-start">
                            <div class="stat-label">THỜI GIAN PHẢN HỒI TB</div>
                            <div class="stat-number">18.4 Phút</div>
                            <div class="stat-status">
                                <span class="status-dot"></span> 98.2% Khiếu nại đã giải quyết
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. MAIN TWO-COLUMN LAYOUT -->
        <div class="row g-4">
            <!-- LEFT COLUMN: FORM GỬI YÊU CẦU BÁO CÁO MỚI -->
            <div class="col-12 col-xl-7">
                <div class="card form-report-card border-0 rounded-4 shadow-sm p-4 bg-white">
                    <!-- Form Header -->
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom flex-wrap gap-2">
                        <div class="d-flex align-items-center gap-3">
                            <div class="header-icon-circle">
                                <i class="bx bx-bell-ring"></i>
                            </div>
                            <h2 class="h5 fw-bold text-dark mb-0">Gửi Yêu Cầu Báo Cáo Mới</h2>
                        </div>
                        <div class="badge-code-identifier">
                            <span>Mã định danh:</span> <code>'bao_cao_vi_pham'</code>
                        </div>
                    </div>

                    <form @submit.prevent="handleSubmitReport">
                        <!-- 1. CHỌN ĐỐI TƯỢNG PHẢN ÁNH -->
                        <div class="mb-4">
                            <label class="section-field-label d-block mb-2">
                                1. CHỌN ĐỐI TƯỢNG PHẢN ÁNH <span class="text-danger">*</span>
                            </label>
                            <div class="target-selection-grid">
                                <button 
                                    v-for="target in targetOptions" 
                                    :key="target.id"
                                    type="button"
                                    class="target-btn-item"
                                    :class="{ active: form.doi_tuong === target.id }"
                                    @click="selectTarget(target.id)"
                                >
                                    <div class="target-icon-wrap">
                                        <i :class="target.icon"></i>
                                    </div>
                                    <div class="target-name">{{ target.name }}</div>
                                    <div class="target-code">{{ target.code }}</div>
                                </button>
                            </div>
                        </div>

                        <!-- 2. PHÂN LOẠI SỰ CỐ -->
                        <div class="mb-4">
                            <label class="section-field-label d-block mb-2">
                                2. PHÂN LOẠI SỰ CỐ ('LOAI_LY_DO') <span class="text-danger">*</span>
                            </label>
                            <div class="position-relative">
                                <select v-model="form.loai_ly_do" class="form-select custom-select-styled">
                                    <option value="khong_dung_lich_trinh">Không đúng lịch trình cam kết (Xe bỏ điểm đón, HDV đi sai lộ trình OSRM)</option>
                                    <option value="chat_chem_gia_ve">Chặt chém giá vé / Phụ thu bất hợp lý ngoài hợp đồng điện tử</option>
                                    <option value="thong_tin_sai_lech">Thông tin điểm đến sai lệch (Tọa độ GPS, giờ mở cửa, giá vé niêm yết sai)</option>
                                    <option value="thai_do_phuc_vu">Thái độ phục vụ khiếm nhã / Không hỗ trợ du khách khi xảy ra sự cố</option>
                                    <option value="xe_khong_dat_chuan">Xe đưa đón không đạt chuẩn / Không có máy lạnh / Chở quá số người</option>
                                    <option value="su_co_khan_cap_khac">Vấn đề an toàn, vệ sinh hoặc sự cố khẩn cấp khác</option>
                                </select>
                            </div>
                        </div>

                        <!-- 3. ĐƠN HÀNG HOẶC ĐIỂM ĐẾN LIÊN QUAN -->
                        <div class="mb-4">
                            <label class="section-field-label d-block mb-2">
                                3. ĐƠN HÀNG HOẶC ĐIỂM ĐẾN LIÊN QUAN <span class="text-danger">*</span>
                            </label>
                            <div class="linked-item-picker d-flex align-items-center justify-content-between p-2 rounded-3 border">
                                <div class="d-flex align-items-center gap-2 overflow-hidden me-2">
                                    <span class="badge-linked-pill text-truncate">
                                        <i class="bx bx-link-alt me-1 text-pink"></i>
                                        {{ form.don_hang_lien_quan }}
                                    </span>
                                </div>
                                <button type="button" class="btn btn-sm btn-pick-order rounded-pill px-3 py-1 flex-shrink-0" @click="openPickerModal">
                                    Chọn Đã Đi
                                </button>
                            </div>
                        </div>

                        <!-- 4. TIÊU ĐỀ PHẢN ÁNH NGẮN GỌN -->
                        <div class="mb-4">
                            <label class="section-field-label d-block mb-2">
                                4. TIÊU ĐỀ PHẢN ÁNH NGẮN GỌN <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                v-model="form.tieu_de" 
                                class="form-control custom-input-styled" 
                                placeholder="Nhập tóm tắt vấn đề bạn gặp phải..."
                                required
                            />
                        </div>

                        <!-- MÔ TẢ TƯỜNG THUẬT CHI TIẾT -->
                        <div class="mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <label class="section-field-label mb-0">
                                    MÔ TẢ TƯỜNG THUẬT CHI TIẾT <span class="text-danger">*</span>
                                </label>
                                <span class="char-counter-text" :class="{ 'text-danger': form.mo_ta.length > 750 }">
                                    {{ form.mo_ta.length }}/800 ký tự
                                </span>
                            </div>
                            <textarea 
                                v-model="form.mo_ta" 
                                rows="5" 
                                maxlength="800"
                                class="form-control custom-textarea-styled" 
                                placeholder="Mô tả cụ thể thời gian, biển số xe, tên hướng dẫn viên hoặc chi tiết sự việc..."
                                required
                            ></textarea>
                        </div>

                        <!-- 5. BẰNG CHỨNG ĐÍNH KÈM -->
                        <div class="mb-4">
                            <label class="section-field-label d-block mb-2">
                                5. BẰNG CHỨNG ĐÍNH KÈM (ẢNH CHỤP HÓA ĐƠN, VÉ, VIDEO TẠI CHỖ)
                            </label>

                            <!-- Drag & Drop Dropzone -->
                            <div 
                                class="evidence-dropzone text-center p-4 rounded-4 mb-3"
                                @click="triggerFileInput"
                                @dragover.prevent="isDragging = true"
                                @dragleave.prevent="isDragging = false"
                                @drop.prevent="handleFileDrop"
                                :class="{ 'drag-over': isDragging }"
                            >
                                <input 
                                    type="file" 
                                    ref="fileInputRef" 
                                    class="d-none" 
                                    multiple 
                                    accept="image/*,video/*,.pdf"
                                    @change="handleFileSelect"
                                />
                                <div class="dropzone-icon-circle mx-auto mb-2">
                                    <i class="bx bx-cloud-upload"></i>
                                </div>
                                <div class="dropzone-instruction mb-1">
                                    Kéo thả tệp hoặc <span class="browse-action-link">Duyệt tệp tin từ máy</span>
                                </div>
                                <div class="dropzone-hint text-muted small">
                                    Hỗ trợ JPG, PNG, MP4, PDF tối đa 25MB (Hệ thống mã hóa an toàn)
                                </div>
                            </div>

                            <!-- Attached Files List -->
                            <div class="attached-files-container d-flex flex-wrap gap-2" v-if="form.files.length > 0">
                                <div 
                                    v-for="(file, fIndex) in form.files" 
                                    :key="fIndex"
                                    class="attached-file-chip d-flex align-items-center gap-2 px-3 py-2 rounded-3"
                                >
                                    <i class="bx font-18 text-pink" :class="getFileIcon(file.name)"></i>
                                    <span class="file-chip-name text-truncate" :title="file.name">{{ file.name }}</span>
                                    <span class="file-chip-size text-muted">({{ file.size }})</span>
                                    <button type="button" class="btn-remove-file" @click.stop="removeFile(fIndex)" title="Xóa file">
                                        <i class="bx bx-x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- USER CONTACT INFO ROW -->
                        <div class="row g-3 mb-4">
                            <div class="col-12 col-md-6">
                                <div class="contact-info-pill-box p-3 rounded-4">
                                    <div class="info-label-small">SỐ ĐIỆN THOẠI LIÊN LẠC</div>
                                    <div class="info-value-text">
                                        <i class="bx bx-mobile-alt me-1 text-primary"></i> (+84) 0918 *** 892
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="contact-info-pill-box p-3 rounded-4">
                                    <div class="info-label-small">EMAIL NHẬN KẾT QUẢ GIẢI QUYẾT</div>
                                    <div class="info-value-text text-truncate">
                                        <i class="bx bx-envelope me-1 text-primary"></i> minhanh.tran.dn@gmail.com
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SUBMIT BUTTON -->
                        <div class="text-center">
                            <button 
                                type="submit" 
                                class="btn-submit-emergency w-100 py-3 rounded-pill fw-bold text-white shadow-sm d-flex align-items-center justify-content-center gap-2"
                                :disabled="isSubmitting"
                            >
                                <i class="bx" :class="isSubmitting ? 'bx-loader-alt bx-spin' : 'bxs-paper-plane'"></i>
                                <span>{{ isSubmitting ? 'Đang mã hóa & gửi báo cáo...' : 'Gửi Báo Cáo Khẩn Cấp Đến Ban Quản Lý' }}</span>
                            </button>
                            <p class="submit-footnote-text text-muted mt-2 mb-0">
                                Hệ thống tự động đồng bộ sang thực thể <code>nhat_ky_nghiep_vu</code> và gửi thông báo trực tiếp đến Chánh Thanh tra Sở Du lịch TP. Đà Nẵng.
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- RIGHT COLUMN: SIDEBAR (SOS, TICKETS LOG, POLICIES, HERO BANNER) -->
            <div class="col-12 col-xl-5">
                <div class="d-flex flex-column gap-4">
                    <!-- BLOCK 1: ĐƯỜNG DÂY NÓNG KHẨN CẤP (SOS) -->
                    <div class="card sos-card border-0 rounded-4 shadow-sm p-4 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="sos-icon-circle">
                                    <i class="bx bxs-hot"></i>
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold text-dark mb-0">Đường Dây Nóng Khẩn Cấp (SOS)</h3>
                                    <div class="sos-subtitle">HỖ TRỢ THỰC ĐỊA TỨC THÌ TẠI ĐÀ NẴNG</div>
                                </div>
                            </div>
                            <span class="badge-sos-pill">24/7 MIỄN PHÍ</span>
                        </div>

                        <div class="sos-contacts-list d-flex flex-column gap-3">
                            <!-- Contact 1 -->
                            <div class="sos-contact-item d-flex align-items-center justify-content-between p-3 rounded-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="contact-icon-circle circle-cyan">
                                        <i class="bx bx-support"></i>
                                    </div>
                                    <div>
                                        <div class="contact-name fw-bold text-dark">Trung Tâm Hỗ Trợ Du Khách ĐN</div>
                                        <div class="contact-desc small text-muted">Giải đáp khiếu nại, trợ giúp ngôn ngữ</div>
                                    </div>
                                </div>
                                <a href="tel:02363550111" class="phone-link text-decoration-none fw-bold text-cyan">
                                    0236 3550 111
                                </a>
                            </div>

                            <!-- Contact 2 -->
                            <div class="sos-contact-item d-flex align-items-center justify-content-between p-3 rounded-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="contact-icon-circle circle-purple">
                                        <i class="bx bx-life-buoy"></i>
                                    </div>
                                    <div>
                                        <div class="contact-name fw-bold text-dark">Cứu Hộ Bờ Biển Mỹ Khê &amp; Bán Đảo</div>
                                        <div class="contact-desc small text-muted">Ứng cứu tắm biển &amp; thời tiết xấu</div>
                                    </div>
                                </div>
                                <a href="tel:02363945952" class="phone-link text-decoration-none fw-bold text-purple">
                                    0236 3945 952
                                </a>
                            </div>

                            <!-- Contact 3 -->
                            <div class="sos-contact-item d-flex align-items-center justify-content-between p-3 rounded-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="contact-icon-circle circle-red">
                                        <i class="bx bx-shield-quarter"></i>
                                    </div>
                                    <div>
                                        <div class="contact-name fw-bold text-dark">Công An Du Lịch Thường Trực</div>
                                        <div class="contact-desc small text-muted">Xử lý chèn ép giá, lừa đảo, an ninh</div>
                                    </div>
                                </div>
                                <a href="tel:02363822300" class="phone-link text-decoration-none fw-bold text-red">
                                    0236 3822 300
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- BLOCK 2: LỊCH SỬ PHIẾU CỦA BẠN (TICKETS LOG) -->
                    <div class="card ticket-history-card border-0 rounded-4 shadow-sm p-4 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-time-five font-20 text-muted"></i>
                                <h3 class="h6 fw-bold text-dark mb-0">Lịch Sử Phiếu Của Bạn (Tickets Log)</h3>
                            </div>
                            <span class="badge-recent-pill">{{ tickets.length }} Phiếu Gần Đây</span>
                        </div>

                        <div class="tickets-stack d-flex flex-column gap-3">
                            <div 
                                v-for="ticket in tickets" 
                                :key="ticket.id" 
                                class="ticket-card-item p-3 rounded-4 border"
                            >
                                <!-- Ticket Top Header -->
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="ticket-code-tag fw-bold">{{ ticket.ma_ticket }}</span>
                                        <span class="badge-tour-tag">{{ ticket.tag }}</span>
                                    </div>
                                    <span 
                                        class="badge-ticket-status"
                                        :class="ticket.status_type === 'resolved' ? 'status-resolved' : 'status-processing'"
                                    >
                                        <span class="status-indicator-dot"></span>
                                        {{ ticket.status }}
                                    </span>
                                </div>

                                <!-- Ticket Title -->
                                <h4 class="ticket-title fw-bold text-dark mb-2">
                                    {{ ticket.tieu_de }}
                                </h4>

                                <!-- Staff Response Bubble -->
                                <div class="ticket-reply-bubble p-3 rounded-3 mb-2" v-if="ticket.cskh_reply">
                                    <div class="reply-header d-flex align-items-center gap-1 mb-1 text-primary small fw-semibold">
                                        <i class="bx" :class="ticket.status_type === 'resolved' ? 'bx-headphone' : 'bx-clipboard'"></i>
                                        <span>{{ ticket.cskh_sender }}</span>
                                        <span class="text-muted ms-1">• {{ ticket.cskh_time }}</span>
                                    </div>
                                    <p class="reply-content mb-0 small text-secondary">
                                        "{{ ticket.cskh_reply }}"
                                    </p>
                                </div>

                                <!-- Ticket Footer -->
                                <div class="ticket-footer-row d-flex align-items-center justify-content-between flex-wrap gap-2 small text-muted">
                                    <div>Gửi lúc: {{ ticket.ngay_gui }}</div>
                                    <div v-if="ticket.has_log_link">
                                        <a href="javascript:;" class="text-pink text-decoration-none fw-semibold" @click="openTicketDetail(ticket)">
                                            Chi tiết nhật ký nghiệp vụ ➔
                                        </a>
                                    </div>
                                    <div v-else-if="ticket.est_completion" class="text-warning fw-semibold">
                                        {{ ticket.est_completion }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BLOCK 3: CHÍNH SÁCH BẢO HIỂM & BỒI HOÀN HỢP ĐỒNG -->
                    <div class="card policy-guarantee-card border-0 rounded-4 shadow-sm p-4 bg-white">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <i class="bx bx-shield-alt-2 font-20 text-pink"></i>
                            <h3 class="h6 fw-bold text-dark mb-0">CHÍNH SÁCH BẢO HIỂM &amp; BỒI HOÀN HỢP ĐỒNG</h3>
                        </div>
                        <ul class="policy-list list-unstyled d-flex flex-column gap-2 mb-0">
                            <li class="policy-item d-flex align-items-start gap-2 small text-secondary">
                                <i class="bx bx-check-circle text-pink font-18 flex-shrink-0 mt-1"></i>
                                <span><strong>Cam kết giá minh bạch:</strong> Hoàn tiền 100% phần phụ thu bất hợp pháp phát sinh ngoài chương trình đã thanh toán qua cổng SmartTrip.</span>
                            </li>
                            <li class="policy-item d-flex align-items-start gap-2 small text-secondary">
                                <i class="bx bx-check-circle text-pink font-18 flex-shrink-0 mt-1"></i>
                                <span><strong>Đảm bảo lộ trình:</strong> Nhà xe hoặc đơn vị lữ hành tự ý cắt bỏ điểm đến sẽ được điều động xe thay thế hoặc bồi hoàn voucher tương đương.</span>
                            </li>
                            <li class="policy-item d-flex align-items-start gap-2 small text-secondary">
                                <i class="bx bx-check-circle text-pink font-18 flex-shrink-0 mt-1"></i>
                                <span>Mọi giao dịch trên nền tảng được chứng thực bởi Sở Văn hóa Thể thao và Du lịch TP. Đà Nẵng.</span>
                            </li>
                        </ul>
                    </div>

                    <!-- BLOCK 4: ĐÀ NẴNG ĐIỂM ĐẾN AN TOÀN & THÂN THIỆN (BANNER) -->
                    <div class="danang-safety-banner rounded-4 overflow-hidden position-relative shadow-sm">
                        <img 
                            src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=800&auto=format&fit=crop&q=80" 
                            alt="Cầu Rồng & Sông Hàn" 
                            class="safety-banner-img w-100 object-fit-cover"
                        />
                        <div class="safety-banner-overlay p-3 d-flex flex-column justify-content-between">
                            <div class="safety-pin-badge">
                                <i class="bx bxs-map-pin"></i>
                            </div>
                            <div class="safety-banner-text">
                                <div class="safety-tag-text">ĐÀ NẴNG ĐIỂM ĐẾN AN TOÀN &amp; THÂN THIỆN</div>
                                <h4 class="safety-title-text mb-0">Cầu Rồng &amp; Sông Hàn – Giám Sát Bởi Smart City AI</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL: CHỌN ĐƠN HÀNG / ĐIỂM ĐẾN ĐÃ ĐI -->
        <div class="modal fade" id="modalSelectOrder" tabindex="-1" aria-hidden="true" ref="orderPickerModalRef">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-dark">
                            <i class="bx bx-receipt text-pink me-2"></i>Chọn Đơn Hàng Hoặc Điểm Đến
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <p class="text-muted small mb-3">Chọn dịch vụ bạn đã trải nghiệm gần đây để liên kết trực tiếp vào hồ sơ khiếu nại:</p>
                        <div class="list-group gap-2">
                            <button 
                                v-for="(item, idx) in recentOrdersList" 
                                :key="idx"
                                type="button" 
                                class="list-group-item list-group-item-action rounded-3 border p-3 d-flex align-items-center justify-content-between"
                                :class="{ 'border-pink bg-light': form.don_hang_lien_quan === item.code }"
                                @click="chooseOrder(item.code)"
                            >
                                <div>
                                    <div class="fw-bold text-dark small">{{ item.name }}</div>
                                    <div class="text-muted smaller">{{ item.code }} • {{ item.date }}</div>
                                </div>
                                <i class="bx bx-check-circle text-pink font-20" v-if="form.don_hang_lien_quan === item.code"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL: CHI TIẾT NHẬT KÝ NGHIỆP VỤ (TICKET DETAIL) -->
        <div class="modal fade" id="modalTicketDetail" tabindex="-1" aria-hidden="true" ref="ticketDetailModalRef">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content rounded-4 border-0 shadow" v-if="selectedTicket">
                    <div class="modal-header border-bottom pb-3">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-dark rounded-pill">{{ selectedTicket.ma_ticket }}</span>
                                <span class="badge bg-light text-dark border">{{ selectedTicket.tag }}</span>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">
                                    {{ selectedTicket.status }}
                                </span>
                            </div>
                            <h5 class="modal-title fw-bold text-dark">{{ selectedTicket.tieu_de }}</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="timeline-log-box mb-4">
                            <h6 class="fw-bold text-dark mb-3">
                                <i class="bx bx-git-commit text-primary me-1"></i>Tiến Trình Xử Lý &amp; Khắc Phục Thực Địa
                            </h6>
                            <ul class="timeline-steps list-unstyled mb-0">
                                <li class="timeline-step-item pb-3">
                                    <div class="step-dot active"></div>
                                    <div class="step-time text-muted smaller">08:30 • Hôm nay</div>
                                    <div class="step-title fw-bold text-dark">Tiếp nhận khiếu nại từ du khách</div>
                                    <div class="step-desc text-muted small">Hệ thống AI tự động phân luồng sự cố đến điều hành nhà xe DanangTrans.</div>
                                </li>
                                <li class="timeline-step-item pb-3">
                                    <div class="step-dot active"></div>
                                    <div class="step-time text-muted smaller">09:15 • Hôm nay</div>
                                    <div class="step-title fw-bold text-dark">Xác minh GPS &amp; ghi âm hành trình</div>
                                    <div class="step-desc text-muted small">Kiểm tra lộ trình xe trung chuyển 43B-091.22 xác nhận trễ giờ do tắc đường tạm thời và thu phụ phí sai quy định.</div>
                                </li>
                                <li class="timeline-step-item">
                                    <div class="step-dot resolved"></div>
                                    <div class="step-time text-muted smaller">10:20 • Hôm nay</div>
                                    <div class="step-title fw-bold text-success">Đã xử lý &amp; Hoàn tiền thành công</div>
                                    <div class="step-desc text-dark small">
                                        {{ selectedTicket.cskh_reply }}
                                        <div class="mt-2 p-2 bg-light rounded border small">
                                            <strong>Mã hoàn tiền:</strong> <code>REF-2026-9921DN</code> • <strong>Số tiền:</strong> 100.000đ • Đã chuyển về ví SmartTrip.
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer border-top pt-3">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'BaoCaoSuCoComponent',
    data() {
        return {
            isSubmitting: false,
            isDragging: false,
            selectedTicket: null,
            modalOrderInstance: null,
            modalTicketInstance: null,

            // 4 đối tượng phản ánh
            targetOptions: [
                { id: 'dia_diem', name: 'Địa Điểm OSM', code: 'MA_DIA_DIEM', icon: 'bx bx-map-pin' },
                { id: 'tour', name: 'Tour Du Lịch', code: 'MA_TOUR', icon: 'bx bx-paper-plane' },
                { id: 'don_hang', name: 'Đơn Đặt Chỗ', code: 'MA_DAT_TOUR', icon: 'bx bx-receipt' },
                { id: 'danh_gia', name: 'Đánh Giá Ảo', code: 'MA_DANH_GIA', icon: 'bx bx-message-square-error' }
            ],

            // Form data khớp 100% với screenshot
            form: {
                doi_tuong: 'dia_diem',
                loai_ly_do: 'khong_dung_lich_trinh',
                don_hang_lien_quan: '#TOUR-BK-98214 - Di Sản Miền Trung 3N2D (Bà Nà Hills - Hội An)',
                tieu_de: 'Tài xế xe trung chuyển đến trễ 45 phút và yêu cầu phụ phí hành lý vô lý',
                mo_ta: 'Vào lúc 07:15 sáng ngày 18/10, xe đón đoàn tại Khách sạn Mường Thanh Luxury không xuất hiện theo khung giờ cam kết 07:30. Sau khi gọi điều hành xe 3 lần, tài xế đến lúc 08:15 với thái độ gắt gỏng và thu thêm 100.000đ tiền hành lý ngoài cỡ dù trong hợp đồng điện tử đã bao gồm.',
                files: [
                    { name: 'bien-lai-phu-phi-100k.jpg', size: '1.2 MB' },
                    { name: 'video-tranh-cai-tai-xe.mp4', size: '14.5 MB' }
                ]
            },

            // Danh sách đơn hàng/điểm đến để chọn khi bấm "Chọn Đã Đi"
            recentOrdersList: [
                {
                    name: 'Di Sản Miền Trung 3N2D (Bà Nà Hills - Hội An)',
                    code: '#TOUR-BK-98214 - Di Sản Miền Trung 3N2D (Bà Nà Hills - Hội An)',
                    date: 'Hoàn thành 18/10/2026'
                },
                {
                    name: 'Du Thuyền Sông Hàn Ngắm Cầu Rồng Phun Lửa',
                    code: '#TOUR-BK-87421 - Du Thuyền Sông Hàn Ngắm Cầu Rồng Phun Lửa',
                    date: 'Hoàn thành 16/10/2026'
                },
                {
                    name: 'Chùa Linh Ứng & Bán Đảo Sơn Trà',
                    code: '#POI-OSM-10294 - Chùa Linh Ứng & Bán Đảo Sơn Trà',
                    date: 'Check-in 15/10/2026'
                },
                {
                    name: 'Tour Bà Nà Hills Trọn Gói Buffet 5 Sao',
                    code: '#TOUR-BK-66230 - Tour Bà Nà Hills Trọn Gói Buffet 5 Sao',
                    date: 'Hoàn thành 10/10/2026'
                }
            ],

            // Lịch sử phiếu khiếu nại (khớp screenshot)
            tickets: [
                {
                    id: 1,
                    ma_ticket: 'Ticket #TK-9921',
                    tag: 'Tour #BK-98214',
                    status: 'ĐÃ GIẢI QUYẾT',
                    status_type: 'resolved',
                    tieu_de: 'Kiểm tra giờ đón xe trung chuyển tại Khách sạn Mường Thanh',
                    cskh_sender: 'CSKH SmartTrip (Lê Thảo Vy)',
                    cskh_time: '10:20 - Hôm nay',
                    cskh_reply: 'Đã xác minh và nhắc nhở nhà xe DanangTrans. Bác tài đến quý khách lúc 07:45 và hoàn trả miễn phí phụ thu hành lý qua ví điện tử.',
                    ngay_gui: '08:30 Hôm nay',
                    has_log_link: true
                },
                {
                    id: 2,
                    ma_ticket: 'Ticket #TK-9884',
                    tag: 'Chùa Linh Ứng',
                    status: 'ĐANG XỬ LÝ',
                    status_type: 'processing',
                    tieu_de: 'Sai lệch giờ mở cửa Chùa Linh Ứng Bán Đảo Sơn Trà ngày lễ',
                    cskh_sender: 'Ban Kiểm Duyệt Nội Dung',
                    cskh_time: '14:05 - Hôm qua',
                    cskh_reply: 'Đang phối hợp với Ban Quản lý Bán Đảo Sơn Trà để cập nhật lại dữ liệu OSM và giờ mở cửa chính xác dịp nghỉ lễ.',
                    ngay_gui: '13:50 Hôm qua',
                    est_completion: 'Dự kiến xong trong 2 giờ',
                    has_log_link: false
                }
            ]
        };
    },
    mounted() {
        if (window.bootstrap) {
            if (this.$refs.orderPickerModalRef) {
                this.modalOrderInstance = new window.bootstrap.Modal(this.$refs.orderPickerModalRef);
            }
            if (this.$refs.ticketDetailModalRef) {
                this.modalTicketInstance = new window.bootstrap.Modal(this.$refs.ticketDetailModalRef);
            }
        }
    },
    methods: {
        selectTarget(targetId) {
            this.form.doi_tuong = targetId;
        },
        openPickerModal() {
            if (this.modalOrderInstance) {
                this.modalOrderInstance.show();
            } else {
                const modalEl = document.getElementById('modalSelectOrder');
                if (modalEl && window.bootstrap) {
                    new window.bootstrap.Modal(modalEl).show();
                }
            }
        },
        chooseOrder(orderCode) {
            this.form.don_hang_lien_quan = orderCode;
            if (this.modalOrderInstance) {
                this.modalOrderInstance.hide();
            }
            if (this.$toast) {
                this.$toast.success(`Đã liên kết: ${orderCode}`);
            }
        },
        triggerFileInput() {
            if (this.$refs.fileInputRef) {
                this.$refs.fileInputRef.click();
            }
        },
        handleFileSelect(event) {
            const files = event.target.files;
            if (!files || files.length === 0) return;
            for (let i = 0; i < files.length; i++) {
                const f = files[i];
                const sizeMb = (f.size / (1024 * 1024)).toFixed(1);
                this.form.files.push({
                    name: f.name,
                    size: `${sizeMb} MB`
                });
            }
            if (this.$toast) {
                this.$toast.info(`Đã đính kèm thêm ${files.length} tệp tin.`);
            }
        },
        handleFileDrop(event) {
            this.isDragging = false;
            const files = event.dataTransfer.files;
            if (!files || files.length === 0) return;
            for (let i = 0; i < files.length; i++) {
                const f = files[i];
                const sizeMb = (f.size / (1024 * 1024)).toFixed(1);
                this.form.files.push({
                    name: f.name,
                    size: `${sizeMb} MB`
                });
            }
            if (this.$toast) {
                this.$toast.info(`Đã đính kèm thêm ${files.length} tệp tin.`);
            }
        },
        removeFile(index) {
            this.form.files.splice(index, 1);
        },
        getFileIcon(fileName) {
            const ext = fileName.split('.').pop().toLowerCase();
            if (['jpg', 'jpeg', 'png', 'webp'].includes(ext)) {
                return 'bx-image';
            } else if (['mp4', 'mov', 'avi', 'mkv'].includes(ext)) {
                return 'bx-video';
            } else if (ext === 'pdf') {
                return 'bx-file-blank';
            }
            return 'bx-file';
        },
        openTicketDetail(ticket) {
            this.selectedTicket = ticket;
            if (this.modalTicketInstance) {
                this.modalTicketInstance.show();
            } else {
                const modalEl = document.getElementById('modalTicketDetail');
                if (modalEl && window.bootstrap) {
                    new window.bootstrap.Modal(modalEl).show();
                }
            }
        },
        handleSubmitReport() {
            if (!this.form.tieu_de.trim()) {
                if (this.$toast) this.$toast.error('Vui lòng nhập tiêu đề phản ánh ngắn gọn.');
                return;
            }
            if (!this.form.mo_ta.trim()) {
                if (this.$toast) this.$toast.error('Vui lòng nhập mô tả chi tiết sự việc.');
                return;
            }

            this.isSubmitting = true;

            setTimeout(() => {
                this.isSubmitting = false;

                // Sinh mã ticket mới ngẫu nhiên
                const newTicketId = 'TK-' + Math.floor(1000 + Math.random() * 9000);
                const newTicket = {
                    id: Date.now(),
                    ma_ticket: `Ticket #${newTicketId}`,
                    tag: this.form.don_hang_lien_quan.includes('#TOUR') ? 'Tour Đã Đi' : 'Điểm Đến OSM',
                    status: 'ĐANG XỬ LÝ',
                    status_type: 'processing',
                    tieu_de: this.form.tieu_de,
                    cskh_sender: 'Tổng Đài Viên AI Tiếp Nhận',
                    cskh_time: 'Vừa xong',
                    cskh_reply: 'Yêu cầu của bạn đã được chuyển tới Thanh tra Sở Du lịch và đơn vị liên quan. Dự kiến chuyên viên sẽ gọi điện xác minh trong 15 phút.',
                    ngay_gui: 'Vừa xong',
                    est_completion: 'Dự kiến xong trong 30 phút',
                    has_log_link: true
                };

                this.tickets.unshift(newTicket);

                if (this.$toast) {
                    this.$toast.success(`Đã gửi báo cáo khẩn cấp thành công! Mã phiếu của bạn là #${newTicketId}.`);
                }

                // Reset form sau khi gửi
                this.form.tieu_de = '';
                this.form.mo_ta = '';
                this.form.files = [];
            }, 1200);
        }
    }
};
</script>

<style scoped>
/* ==========================================================================
   1. HERO BANNER STYLING
   ========================================================================== */
.report-hero-card {
    background: linear-gradient(135deg, #fff1f5 0%, #fdf4ff 100%);
    border: 1px solid #fce7f3;
    border-radius: 24px;
    padding: 32px 36px;
    box-shadow: 0 4px 20px rgba(219, 39, 119, 0.05);
}

.hero-badge-pill {
    display: inline-flex;
    align-items: center;
    background: #ffffff;
    border: 1px solid #fbcfe8;
    color: #db2777;
    font-size: 11.5px;
    font-weight: 800;
    padding: 5px 14px;
    border-radius: 20px;
    letter-spacing: 0.6px;
    box-shadow: 0 2px 8px rgba(219, 39, 119, 0.08);
}

.hero-main-title {
    font-size: 28px;
    font-weight: 800;
    color: #1e293b;
    line-height: 1.3;
    margin-bottom: 10px;
}

.hero-subtitle {
    font-size: 14.5px;
    line-height: 1.6;
    color: #64748b;
    max-width: 720px;
}

.text-pink {
    color: #db2777 !important;
}

/* Stat card floating */
.stat-response-card {
    background: #ffffff;
    border: 1px solid #f1f5f9;
    border-radius: 20px;
    padding: 18px 22px;
    display: inline-flex;
    align-items: center;
    gap: 16px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.04);
}

.stat-clock-icon {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: #e0f2fe;
    color: #0284c7;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.stat-label {
    font-size: 10.5px;
    font-weight: 800;
    letter-spacing: 0.8px;
    color: #64748b;
    margin-bottom: 2px;
}

.stat-number {
    font-size: 22px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.2;
}

.stat-status {
    font-size: 11px;
    font-weight: 600;
    color: #0284c7;
    display: flex;
    align-items: center;
    gap: 6px;
}

.status-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #0284c7;
    display: inline-block;
}

/* ==========================================================================
   2. FORM CARD & TARGET SELECTION
   ========================================================================== */
.form-report-card {
    border: 1px solid #f1f5f9;
}

.header-icon-circle {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #fdf2f8;
    color: #db2777;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.badge-code-identifier {
    font-size: 12px;
    color: #64748b;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    padding: 4px 12px;
    border-radius: 20px;
}

.badge-code-identifier code {
    color: #7c3aed;
    font-weight: 600;
}

.section-field-label {
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 0.5px;
    color: #334155;
    text-transform: uppercase;
}

/* Target 4 Buttons Grid */
.target-selection-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
}

.target-btn-item {
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    border-radius: 18px;
    padding: 16px 8px;
    text-align: center;
    cursor: pointer;
    transition: all 0.25s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.target-btn-item:hover {
    border-color: #f472b6;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.1);
}

.target-btn-item.active {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    border-color: #db2777;
    color: #ffffff;
    box-shadow: 0 8px 20px rgba(219, 39, 119, 0.3);
}

.target-icon-wrap {
    font-size: 22px;
    margin-bottom: 6px;
}

.target-name {
    font-size: 12.5px;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 4px;
}

.target-code {
    font-size: 9.5px;
    font-weight: 600;
    opacity: 0.75;
    letter-spacing: 0.5px;
}

.target-btn-item.active .target-code {
    opacity: 0.9;
}

/* Custom inputs styling */
.custom-select-styled,
.custom-input-styled,
.custom-textarea-styled {
    border: 1.5px solid #e2e8f0;
    border-radius: 14px;
    font-size: 13.5px;
    padding: 12px 16px;
    color: #1e293b;
    transition: all 0.2s ease;
}

.custom-select-styled:focus,
.custom-input-styled:focus,
.custom-textarea-styled:focus {
    border-color: #ec4899;
    box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.15);
    outline: none;
}

.custom-textarea-styled {
    line-height: 1.6;
}

.char-counter-text {
    font-size: 11.5px;
    color: #94a3b8;
    font-weight: 600;
}

/* Linked item picker */
.linked-item-picker {
    background: #fdf2f8;
    border-color: #fbcfe8 !important;
}

.badge-linked-pill {
    background: #ffffff;
    border: 1px solid #fbcfe8;
    color: #1e293b;
    font-size: 12.5px;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 20px;
}

.btn-pick-order {
    background: #ffffff;
    border: 1px solid #f472b6;
    color: #db2777;
    font-size: 11.5px;
    font-weight: 700;
    transition: all 0.2s ease;
}

.btn-pick-order:hover {
    background: #db2777;
    color: #ffffff;
}

/* Dropzone */
.evidence-dropzone {
    border: 2px dashed #f472b6;
    background: #fffbfa;
    cursor: pointer;
    transition: all 0.25s ease;
}

.evidence-dropzone:hover,
.evidence-dropzone.drag-over {
    background: #fdf2f8;
    border-color: #db2777;
}

.dropzone-icon-circle {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #fdf2f8;
    color: #db2777;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

.dropzone-instruction {
    font-size: 13.5px;
    font-weight: 600;
    color: #334155;
}

.browse-action-link {
    color: #db2777;
    text-decoration: underline;
    font-weight: 700;
}

/* Attached file chip */
.attached-file-chip {
    background: #f1f5f9;
    border: 1px solid #e2e8f0;
    font-size: 12.5px;
    max-width: 100%;
}

.file-chip-name {
    font-weight: 600;
    color: #1e293b;
    max-width: 220px;
}

.file-chip-size {
    font-size: 11px;
}

.btn-remove-file {
    background: transparent;
    border: none;
    color: #94a3b8;
    cursor: pointer;
    font-size: 16px;
    line-height: 1;
    padding: 0;
    transition: color 0.2s ease;
}

.btn-remove-file:hover {
    color: #ef4444;
}

/* Contact pills */
.contact-info-pill-box {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
}

.info-label-small {
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.6px;
    color: #64748b;
    text-transform: uppercase;
    margin-bottom: 4px;
}

.info-value-text {
    font-size: 13px;
    font-weight: 700;
    color: #1e293b;
}

/* Submit Button */
.btn-submit-emergency {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    font-size: 15px;
    border: none;
    box-shadow: 0 8px 24px rgba(219, 39, 119, 0.35);
    transition: all 0.25s ease;
}

.btn-submit-emergency:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(219, 39, 119, 0.5);
    background: linear-gradient(135deg, #f472b6 0%, #be185d 100%);
}

.submit-footnote-text {
    font-size: 11.5px;
    line-height: 1.5;
}

/* ==========================================================================
   3. RIGHT SIDEBAR STYLING
   ========================================================================== */
/* SOS Card */
.sos-icon-circle {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: #fee2e2;
    color: #ef4444;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.sos-subtitle {
    font-size: 9.5px;
    font-weight: 800;
    letter-spacing: 0.6px;
    color: #ef4444;
}

.badge-sos-pill {
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #ef4444;
    font-size: 10.5px;
    font-weight: 800;
    padding: 3px 10px;
    border-radius: 20px;
}

.sos-contact-item {
    background: #f8fafc;
    border: 1px solid #f1f5f9;
    transition: all 0.2s ease;
}

.sos-contact-item:hover {
    background: #ffffff;
    border-color: #e2e8f0;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
}

.contact-icon-circle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}

.circle-cyan { background: #e0f2fe; color: #0284c7; }
.circle-purple { background: #f3e8ff; color: #9333ea; }
.circle-red { background: #fee2e2; color: #ef4444; }

.text-cyan { color: #0284c7 !important; }
.text-purple { color: #9333ea !important; }
.text-red { color: #ef4444 !important; }

.contact-name {
    font-size: 12.5px;
    line-height: 1.2;
}

.phone-link {
    font-size: 13.5px;
    letter-spacing: 0.3px;
    flex-shrink: 0;
}

/* Ticket History */
.badge-recent-pill {
    background: #ffffff;
    border: 1px solid #fbcfe8;
    color: #db2777;
    font-size: 11px;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 20px;
}

.ticket-card-item {
    background: #ffffff;
    border-color: #f1f5f9 !important;
}

.ticket-code-tag {
    font-size: 12px;
    color: #0f172a;
}

.badge-tour-tag {
    background: #fdf2f8;
    color: #db2777;
    font-size: 10px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 6px;
}

.badge-ticket-status {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 10.5px;
    font-weight: 800;
    padding: 3px 10px;
    border-radius: 20px;
}

.status-resolved {
    background: #ede9fe;
    color: #7c3aed;
}

.status-processing {
    background: #fdf2f8;
    color: #db2777;
}

.status-indicator-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: currentColor;
}

.ticket-title {
    font-size: 13px;
    line-height: 1.35;
}

.ticket-reply-bubble {
    background: #f8fafc;
    border: 1px solid #f1f5f9;
}

.reply-content {
    line-height: 1.5;
}

/* Danang Safety Banner */
.danang-safety-banner {
    height: 160px;
}

.safety-banner-img {
    height: 100%;
}

.safety-banner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(180deg, rgba(0, 0, 0, 0.2) 0%, rgba(15, 23, 42, 0.85) 100%);
    color: #ffffff;
}

.safety-pin-badge {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(6px);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    color: #ffffff;
}

.safety-tag-text {
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.8px;
    color: #93c5fd;
    text-transform: uppercase;
    margin-bottom: 2px;
}

.safety-title-text {
    font-size: 13.5px;
    font-weight: 800;
    color: #ffffff;
}

/* Timeline in Ticket Detail Modal */
.timeline-steps {
    position: relative;
    padding-left: 20px;
}

.timeline-steps::before {
    content: '';
    position: absolute;
    top: 6px;
    bottom: 6px;
    left: 6px;
    width: 2px;
    background: #e2e8f0;
}

.timeline-step-item {
    position: relative;
}

.step-dot {
    position: absolute;
    left: -20px;
    top: 3px;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background: #ffffff;
    border: 3px solid #cbd5e1;
}

.step-dot.active {
    border-color: #3b82f6;
    background: #3b82f6;
}

.step-dot.resolved {
    border-color: #10b981;
    background: #10b981;
}

/* Responsive adjustments */
@media (max-width: 991.98px) {
    .report-hero-card {
        padding: 24px 20px;
    }
    .hero-main-title {
        font-size: 22px;
    }
    .target-selection-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 575.98px) {
    .target-selection-grid {
        grid-template-columns: 1fr;
    }
}
</style>
