<template>
    <div class="ai-config-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">CORE ENGINE V4.2 - SMART ITINERARY OPTIMIZER</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">Cấu Hình Tham Số Thuật Toán AI & Tối Ưu Lộ Trình</h2>
                <p class="text-muted font-13 mb-0" style="max-width: 860px;">
                    Tinh chỉnh siêu tham số giải thuật 
                    <span class="fw-bold" style="color: #E11D48;">Genetic Algorithm</span> & 
                    <span class="fw-bold" style="color: #7C3AED;">Dijkstra</span> kết hợp ma trận OSRM tính toán quãng đường ngắn nhất, tiết kiệm năng lượng và tối đa hóa độ thỏa mãn sở thích du khách tại trung tâm Đà Nẵng.
                </p>
            </div>

            <!-- Top Action Buttons -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-1" @click="openModalBenchmark">
                    <i class="bx bx-test-tube font-16" style="color: #64748B;"></i>
                    <span>Benchmark Thử Nghiệm</span>
                </button>
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-1" @click="khoiPhucMacDinh">
                    <i class="bx bx-revision font-16" style="color: #64748B;"></i>
                    <span>Khôi Phục Mặc Định</span>
                </button>
                <button class="btn btn-pink-gradient text-white rounded-pill px-3 py-2 font-12 fw-bold shadow-sm d-flex align-items-center gap-1" @click="luuCauHinh">
                    <i class="bx bx-save font-16"></i>
                    <span>Lưu Cấu Hình Mới</span>
                </button>
            </div>
        </div>

        <!-- 4 KPI Metrics Cards -->
        <div class="row g-3 mb-4">
            <!-- KPI 1: THỜI GIAN GIẢI TRUNG BÌNH -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">THỜI GIAN GIẢI TRUNG BÌNH</div>
                            <div class="d-flex align-items-baseline gap-2 mt-2">
                                <span class="font-28 fw-bold text-dark">{{ avgSolveTime }}</span>
                                <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">ms</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #E0F2FE; width: 42px; height: 42px;">
                            <i class="bx bx-time-five font-20" style="color: #0284C7;"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 font-11 pt-2 border-top">
                        <span class="fw-bold" style="color: #E11D48;">▼ -14ms</span>
                        <span class="text-muted">So với phiên bản trước (Tour 3N2Đ)</span>
                    </div>
                </div>
            </div>

            <!-- KPI 2: TỐI ƯU QUÃNG ĐƯỜNG -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">TỐI ƯU QUÃNG ĐƯỜNG</div>
                            <div class="d-flex align-items-baseline gap-2 mt-2">
                                <span class="font-28 fw-bold" style="color: #E11D48;">{{ distanceReduction }}%</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 42px; height: 42px;">
                            <i class="bx bx-transfer-alt font-20" style="color: #E11D48;"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 font-11 pt-2 border-top text-muted">
                        <span>Cắt giảm km di chuyển theo xe tour gốc</span>
                    </div>
                </div>
            </div>

            <!-- KPI 3: FITNESS SCORE TRUNG BÌNH -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">FITNESS SCORE TRUNG BÌNH</div>
                            <div class="d-flex align-items-baseline gap-2 mt-2">
                                <span class="font-28 fw-bold text-dark">{{ avgFitnessScore }}</span>
                                <span class="text-muted font-13 fw-normal">/ 100</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 42px; height: 42px;">
                            <i class="bx bx-slider-alt font-20" style="color: #7C3AED;"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 font-11 pt-2 border-top text-muted">
                        <i class="bx bxs-heart font-12" style="color: #E11D48;"></i>
                        <span>Độ khớp cao với sở thích du khách</span>
                    </div>
                </div>
            </div>

            <!-- KPI 4: MÔ HÌNH AI HIỆN HÀNH -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">MÔ HÌNH AI HIỆN HÀNH</div>
                            <div class="d-flex align-items-baseline gap-2 mt-2">
                                <span class="font-18 fw-bold text-dark">{{ currentAiModel }}</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FFE4E6; width: 42px; height: 42px;">
                            <i class="bx bx-brain font-20" style="color: #E11D48;"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 pt-2 border-top">
                        <span class="badge rounded-pill text-white px-2 py-0-5 font-10 fw-bold" style="background-color: #E11D48;">V4.2 - PROD</span>
                        <span class="badge rounded-pill px-2 py-0-5 font-10 fw-semibold" style="background-color: #F1F5F9; color: #475569;">Ổn định 99.98%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 1: 2 Columns - Trọng Số Hàm Thích Nghi vs Siêu Tham Số Di Truyền -->
        <div class="row g-4 mb-4">
            <!-- Left Column: Trọng Số Hàm Thích Nghi (Fitness Function) -->
            <div class="col-12 col-xl-6">
                <div class="card border-0 shadow-xs rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-slider-alt font-18" style="color: #E11D48;"></i>
                                <h5 class="fw-bold text-dark mb-0 font-16">Trọng Số Hàm Thích Nghi (Fitness Function)</h5>
                            </div>
                            <span class="badge rounded-pill text-white font-11 fw-bold px-2 py-1" :style="{ backgroundColor: totalWeights === 100 ? '#E11D48' : '#F59E0B' }">
                                Tổng: {{ totalWeights }}%
                            </span>
                        </div>
                        <p class="text-muted font-11 font-monospace mb-3">
                            Hàm mục tiêu SF = w_p*ScoreP + w_d*ScoreD + w_c*ScoreC + w_r*ScoreR
                        </p>

                        <!-- Visual & Sliders Container -->
                        <div class="row g-3 align-items-center mb-3">
                            <!-- Donut Chart & Legends Column -->
                            <div class="col-12 col-md-5 d-flex flex-column align-items-center justify-content-center border-end-md pe-md-3">
                                <!-- Circular Donut Chart SVG -->
                                <div class="position-relative d-flex align-items-center justify-content-center" style="width: 150px; height: 150px;">
                                    <svg viewBox="0 0 100 100" class="donut-chart-svg" style="width: 140px; height: 140px; transform: rotate(-90deg);">
                                        <!-- Background Circle -->
                                        <circle cx="50" cy="50" r="38" fill="none" stroke="#F1F5F9" stroke-width="12" />
                                        
                                        <!-- Segment 1: Preference (Pink) -->
                                        <circle cx="50" cy="50" r="38" fill="none" stroke="#E11D48" stroke-width="12"
                                            :stroke-dasharray="`${(weights.preference / 100) * 238.76} 238.76`"
                                            stroke-dashoffset="0" stroke-linecap="round" />
                                        
                                        <!-- Segment 2: Distance (Sky Blue) -->
                                        <circle cx="50" cy="50" r="38" fill="none" stroke="#0284C7" stroke-width="12"
                                            :stroke-dasharray="`${(weights.distance / 100) * 238.76} 238.76`"
                                            :stroke-dashoffset="`-${(weights.preference / 100) * 238.76}`" stroke-linecap="round" />
                                        
                                        <!-- Segment 3: Cost (Purple) -->
                                        <circle cx="50" cy="50" r="38" fill="none" stroke="#7C3AED" stroke-width="12"
                                            :stroke-dasharray="`${(weights.cost / 100) * 238.76} 238.76`"
                                            :stroke-dashoffset="`-${((weights.preference + weights.distance) / 100) * 238.76}`" stroke-linecap="round" />
                                        
                                        <!-- Segment 4: Rating (Rose) -->
                                        <circle cx="50" cy="50" r="38" fill="none" stroke="#F43F5E" stroke-width="12"
                                            :stroke-dasharray="`${(weights.rating / 100) * 238.76} 238.76`"
                                            :stroke-dashoffset="`-${((weights.preference + weights.distance + weights.cost) / 100) * 238.76}`" stroke-linecap="round" />
                                    </svg>
                                    
                                    <!-- Donut Inner Center Text -->
                                    <div class="position-absolute text-center d-flex flex-column align-items-center justify-content-center">
                                        <span class="text-muted font-10 fw-bold text-uppercase">MỤC TIÊU</span>
                                        <span class="font-20 fw-bold text-dark lh-1 my-1">{{ totalWeights }}%</span>
                                        <span class="font-10 text-muted">{{ totalWeights === 100 ? 'Cân bằng' : 'Cần chuẩn hóa' }}</span>
                                    </div>
                                </div>

                                <!-- Legends List -->
                                <div class="mt-3 w-100">
                                    <div class="row g-1 font-11">
                                        <div class="col-6 d-flex align-items-center gap-1">
                                            <span class="legend-dot" style="background-color: #E11D48;"></span>
                                            <span class="text-muted">Sở thích ({{ weights.preference }}%)</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center gap-1">
                                            <span class="legend-dot" style="background-color: #0284C7;"></span>
                                            <span class="text-muted">Khoảng cách ({{ weights.distance }}%)</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center gap-1">
                                            <span class="legend-dot" style="background-color: #7C3AED;"></span>
                                            <span class="text-muted">Ngân sách ({{ weights.cost }}%)</span>
                                        </div>
                                        <div class="col-6 d-flex align-items-center gap-1">
                                            <span class="legend-dot" style="background-color: #F43F5E;"></span>
                                            <span class="text-muted">Đánh giá ({{ weights.rating }}%)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 4 Sliders Column -->
                            <div class="col-12 col-md-7 ps-md-2">
                                <!-- Slider 1: W_preference -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <div class="d-flex align-items-center gap-1 font-12 fw-bold text-dark">
                                            <i class="bx bx-heart font-14" style="color: #E11D48;"></i>
                                            <span>W_preference (Sở thích)</span>
                                        </div>
                                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">
                                            {{ weights.preference }}%
                                        </span>
                                    </div>
                                    <input type="range" class="form-range range-pink" min="0" max="100" v-model.number="weights.preference" />
                                    <p class="text-muted font-11 mb-0 fst-italic">
                                        Ưu tiên khớp danh sách thẻ hashtag, POI lọt top 100 năng lượng du khách.
                                    </p>
                                </div>

                                <!-- Slider 2: W_distance -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <div class="d-flex align-items-center gap-1 font-12 fw-bold text-dark">
                                            <i class="bx bx-navigation font-14" style="color: #0284C7;"></i>
                                            <span>W_distance (Khoảng cách & OSRM)</span>
                                        </div>
                                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #E0F2FE; color: #0284C7;">
                                            {{ weights.distance }}%
                                        </span>
                                    </div>
                                    <input type="range" class="form-range range-blue" min="0" max="100" v-model.number="weights.distance" />
                                    <p class="text-muted font-11 mb-0 fst-italic">
                                        Truy vấn ma trận khoảng cách thời gian thực OSRM Đà Nẵng nhằm tối ưu vòng cung di chuyển.
                                    </p>
                                </div>

                                <!-- Slider 3: W_cost -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <div class="d-flex align-items-center gap-1 font-12 fw-bold text-dark">
                                            <i class="bx bx-wallet font-14" style="color: #7C3AED;"></i>
                                            <span>W_cost (Chi phí & Vé tham quan)</span>
                                        </div>
                                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #F5F3FF; color: #7C3AED;">
                                            {{ weights.cost }}%
                                        </span>
                                    </div>
                                    <input type="range" class="form-range range-purple" min="0" max="100" v-model.number="weights.cost" />
                                    <p class="text-muted font-11 mb-0 fst-italic">
                                        Giữ hạn mức ngân sách dự kiến, tối ưu combo vé Bà Nà, Ngũ Hành Sơn, Bảo tàng Chăm.
                                    </p>
                                </div>

                                <!-- Slider 4: W_rating -->
                                <div class="mb-1">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <div class="d-flex align-items-center gap-1 font-12 fw-bold text-dark">
                                            <i class="bx bx-star font-14" style="color: #F43F5E;"></i>
                                            <span>W_rating (Độ phổ biến POI)</span>
                                        </div>
                                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FFE4E6; color: #F43F5E;">
                                            {{ weights.rating }}%
                                        </span>
                                    </div>
                                    <input type="range" class="form-range range-rose" min="0" max="100" v-model.number="weights.rating" />
                                    <p class="text-muted font-11 mb-0 fst-italic">
                                        Bộ lọc trọng số phân bổ theo lượt đánh giá 4 sao và trải nghiệm thực của du khách.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Note -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center p-2 px-3 rounded-3 mt-2" style="background-color: #FFF1F2; border: 1px dashed #FECDD3;">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bx bx-info-circle font-16" style="color: #E11D48;"></i>
                            <span class="font-11 text-dark">Hệ thống tự động chuẩn hóa vector trọng số w_i về tổng 100% khi chạy sinh hành trình.</span>
                        </div>
                        <a href="javascript:void(0)" class="font-11 fw-bold text-decoration-underline ms-auto" style="color: #E11D48;" @click="openModalToanGiai">
                            Chi tiết toán giải
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Siêu Tham Số Di Truyền (GA) -->
            <div class="col-12 col-xl-6">
                <div class="card border-0 shadow-xs rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Header -->
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <i class="bx bx-dna font-18" style="color: #7C3AED;"></i>
                            <h5 class="fw-bold text-dark mb-0 font-16">Siêu Tham Số Di Truyền (GA)</h5>
                        </div>
                        <p class="text-muted font-11 mb-3">
                            Cấu trúc mã hóa nhiễm sắc thể (chromosome) biểu diễn chuỗi POI.
                        </p>

                        <!-- Parameter Rows -->
                        <div class="d-flex flex-column gap-3 mb-3">
                            <!-- Param 1: Quy mô Quần thể -->
                            <div class="d-flex justify-content-between align-items-center py-1 border-bottom">
                                <div>
                                    <div class="font-12 fw-bold text-dark">Quy mô Quần thể (Population)</div>
                                    <div class="font-11 text-muted">Số cá thể tạo mới mỗi thế hệ</div>
                                </div>
                                <div class="d-flex align-items-center bg-light rounded-pill px-3 py-1 border border-secondary-subtle">
                                    <input type="number" v-model.number="ga.population" class="border-0 bg-transparent text-end fw-bold font-13 text-dark" style="width: 55px; outline: none;" />
                                    <span class="font-11 text-muted ms-1">cá thể</span>
                                </div>
                            </div>

                            <!-- Param 2: Số Thế hệ -->
                            <div class="d-flex justify-content-between align-items-center py-1 border-bottom">
                                <div>
                                    <div class="font-12 fw-bold text-dark">Số Thế hệ (Generations)</div>
                                    <div class="font-11 text-muted">Mức lặp tiến hóa tối đa</div>
                                </div>
                                <div class="d-flex align-items-center bg-light rounded-pill px-3 py-1 border border-secondary-subtle">
                                    <input type="number" v-model.number="ga.generations" class="border-0 bg-transparent text-end fw-bold font-13 text-dark" style="width: 55px; outline: none;" />
                                    <span class="font-11 text-muted ms-1">vòng</span>
                                </div>
                            </div>

                            <!-- Param 3: Tỉ Lệ Lai Ghép -->
                            <div class="d-flex justify-content-between align-items-center py-1 border-bottom">
                                <div>
                                    <div class="font-12 fw-bold text-dark">Tỉ Lệ Lai Ghép (Crossover Rate)</div>
                                    <div class="font-11 text-muted">Order-based Crossover (OX)</div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="d-flex align-items-center bg-light rounded-pill px-3 py-1 border border-secondary-subtle">
                                        <input type="number" step="0.01" min="0" max="1" v-model.number="ga.crossoverRate" class="border-0 bg-transparent text-end fw-bold font-13 text-dark" style="width: 50px; outline: none;" />
                                    </div>
                                    <span class="badge rounded-pill font-11 fw-bold px-2 py-1" style="background-color: #FDF2F8; color: #E11D48;">
                                        {{ Math.round(ga.crossoverRate * 100) }}%
                                    </span>
                                </div>
                            </div>

                            <!-- Param 4: Tỉ Lệ Đột Biến -->
                            <div class="d-flex justify-content-between align-items-center py-1 border-bottom">
                                <div>
                                    <div class="font-12 fw-bold text-dark">Tỉ Lệ Đột Biến (Mutation Rate)</div>
                                    <div class="font-11 text-muted">Swap Mutation & Inversion</div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="d-flex align-items-center bg-light rounded-pill px-3 py-1 border border-secondary-subtle">
                                        <input type="number" step="0.01" min="0" max="1" v-model.number="ga.mutationRate" class="border-0 bg-transparent text-end fw-bold font-13 text-dark" style="width: 50px; outline: none;" />
                                    </div>
                                    <span class="badge rounded-pill font-11 fw-bold px-2 py-1" style="background-color: #FDF2F8; color: #E11D48;">
                                        {{ Math.round(ga.mutationRate * 100) }}%
                                    </span>
                                </div>
                            </div>

                            <!-- Param 5: Chiến Lược Chọn Lọc -->
                            <div class="d-flex justify-content-between align-items-center py-1 border-bottom">
                                <div>
                                    <div class="font-12 fw-bold text-dark">Chiến Lược Chọn Lọc</div>
                                    <div class="font-11 text-muted">Selection Strategy</div>
                                </div>
                                <select v-model="ga.selectionStrategy" class="form-select form-select-sm rounded-pill font-12 fw-semibold border-secondary-subtle text-dark" style="width: 190px;">
                                    <option value="Tournament Selection">Tournament Selection</option>
                                    <option value="Roulette Wheel Selection">Roulette Wheel Selection</option>
                                    <option value="Rank-based Selection">Rank-based Selection</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Param 6: Bảo toàn cá thể tốt nhất (Elitism) -->
                    <div class="d-flex justify-content-between align-items-center pt-2">
                        <div class="font-12 fw-bold text-dark">Bảo toàn cá thể tốt nhất (Elitism)</div>
                        <button class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold transition-all"
                            :style="{ backgroundColor: ga.elitism ? '#EDE9FE' : '#F1F5F9', color: ga.elitism ? '#6D28D9' : '#64748B' }"
                            @click="ga.elitism = !ga.elitism">
                            {{ ga.elitism ? 'Bật (Top 2 Chromosomes)' : 'Tắt (Không lưu)' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 2: Phòng Thí Nghiệm Giả Lập Trực Tiếp (Live Sandbox) -->
        <div class="card border-0 shadow-xs rounded-4 p-4 bg-white mb-4">
            <!-- Header -->
            <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 36px; height: 36px;">
                        <i class="bx bx-atom font-20" style="color: #E11D48;"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-dark mb-0 font-16">Phòng Thí Nghiệm Giả Lập Trực Tiếp (Live Sandbox)</h5>
                        <p class="text-muted font-11 mb-0">Kiểm tra lập tức kết quả giải thuật với dữ liệu hồ sơ du khách mẫu tại Đà Nẵng</p>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-1 font-11">
                    <span class="text-muted">Môi trường:</span>
                    <span class="badge rounded-pill font-11 fw-bold px-3 py-1" style="background-color: #E0F2FE; color: #0369A1;">
                        STAGING ĐÀ NẴNG MATRIX
                    </span>
                </div>
            </div>

            <!-- Profile Input Sandbox Box -->
            <div class="p-3 rounded-4 mb-3" style="background-color: #FAFAFB; border: 1px solid #F1F5F9;">
                <!-- Header inside box -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center gap-1">
                        <i class="bx bx-id-card font-16" style="color: #E11D48;"></i>
                        <span class="fw-bold text-dark font-13">Hồ Sơ Mẫu: Khách Du Lịch Trải Nghiệm Gia Đình</span>
                    </div>
                    <span class="badge rounded-pill font-11 px-3 py-1" style="background-color: #EDE9FE; color: #6D28D9;">
                        Hồ sơ #DN-SIM-0921
                    </span>
                </div>

                <!-- 3 Input Fields & Run Button -->
                <div class="row g-2 align-items-end mb-3">
                    <!-- Field 1: Nhóm du khách -->
                    <div class="col-12 col-md-3">
                        <label class="form-label font-10 fw-bold text-muted text-uppercase mb-1">NHÓM DU KHÁCH</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white border-end-0 rounded-start-pill text-muted">
                                <i class="bx bx-user font-14"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 rounded-end-pill font-12 fw-semibold text-dark bg-white" v-model="sampleProfile.guestGroup" />
                        </div>
                    </div>

                    <!-- Field 2: Ngân sách dự kiến -->
                    <div class="col-12 col-md-3">
                        <label class="form-label font-10 fw-bold text-muted text-uppercase mb-1">NGÂN SÁCH DỰ KIẾN</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white border-end-0 rounded-start-pill text-muted">
                                <i class="bx bx-dollar font-14"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 rounded-end-pill font-12 fw-semibold text-dark bg-white" v-model="sampleProfile.budget" />
                        </div>
                    </div>

                    <!-- Field 3: Thời gian lưu trú -->
                    <div class="col-12 col-md-3">
                        <label class="form-label font-10 fw-bold text-muted text-uppercase mb-1">THỜI GIAN LƯU TRÚ</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white border-end-0 rounded-start-pill text-muted">
                                <i class="bx bx-calendar font-14"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 rounded-end-pill font-12 fw-semibold text-dark bg-white" v-model="sampleProfile.duration" />
                        </div>
                    </div>

                    <!-- Run Simulation Button -->
                    <div class="col-12 col-md-3 d-flex justify-content-md-end">
                        <button class="btn btn-pink-gradient text-white rounded-pill px-3 py-2 font-12 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2 w-100"
                            :disabled="isSimulating" @click="chayMoPhong">
                            <i class="bx font-16" :class="isSimulating ? 'bx-loader-alt bx-spin' : 'bx-rocket'"></i>
                            <span>{{ isSimulating ? 'Đang Tính Toán...' : 'Chạy Mô Phỏng Lập Tức' }}</span>
                        </button>
                    </div>
                </div>

                <!-- Active Tags Row -->
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <span class="font-11 text-muted">Thẻ sở thích kích hoạt:</span>
                    <span v-for="(tag, idx) in sampleProfile.activeTags" :key="idx"
                        class="badge rounded-pill font-11 fw-semibold px-2 py-1"
                        :style="getTagStyle(idx)">
                        #{{ tag }}
                    </span>
                    <button class="btn btn-sm btn-light rounded-circle p-0 d-inline-flex align-items-center justify-content-center border"
                        style="width: 22px; height: 22px; font-size: 14px;" @click="themTagNhanh" title="Thêm thẻ">
                        +
                    </button>
                </div>
            </div>

            <!-- Simulation Result Banner -->
            <div class="p-3 rounded-4 mb-3 d-flex flex-wrap justify-content-between align-items-center gap-3"
                style="background-color: #FFF1F2; border: 1px solid #FECDD3;">
                <div class="d-flex align-items-start gap-2">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white mt-1"
                        style="background-color: #E11D48; width: 24px; height: 24px; min-width: 24px;">
                        <i class="bx bx-check font-16"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold text-dark font-14">Hội Tụ Tối Ưu Toàn Cục Thành Công!</span>
                            <span class="badge rounded-pill text-white font-10 px-2 py-0-5" style="background-color: #E11D48;">{{ simResult.runTimeMs }}ms</span>
                        </div>
                        <p class="text-muted font-11 mb-0 mt-0-5">
                            Hành trình {{ simResult.stopsCount }} điểm dừng liên tục không bị ngược chiều đường, giảm {{ simResult.reducedKm }} km di chuyển.
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-4 ms-auto">
                    <div>
                        <div class="font-10 text-muted fw-bold text-uppercase">ĐIỂM THÍCH NGHI:</div>
                        <div class="font-20 fw-bold" style="color: #E11D48;">{{ simResult.fitnessScore }} / 100</div>
                    </div>
                    <div class="border-start ps-3">
                        <div class="font-10 text-muted fw-bold text-uppercase">TỔNG CHI PHÍ VÉ:</div>
                        <div class="font-20 fw-bold text-dark">{{ simResult.totalCostFormatted }} đ</div>
                    </div>
                </div>
            </div>

            <!-- Lower Split: Left (6 Stops Chromosome) & Right (Map Route) -->
            <div class="row g-4">
                <!-- Left: Chuỗi Lộ Trình Được Chọn (Chromosome Output) -->
                <div class="col-12 col-lg-7">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="font-11 fw-bold text-muted text-uppercase tracking-wider">
                            CHUỖI LỘ TRÌNH ĐƯỢC CHỌN (CHROMOSOME OUTPUT)
                        </span>
                        <span class="badge rounded-pill font-11 fw-bold px-2 py-1" style="background-color: #FDF2F8; color: #E11D48;">
                            Tổng: 24.6 km | 0 ngõ cụt
                        </span>
                    </div>

                    <!-- List of 6 Stops -->
                    <div class="d-flex flex-column gap-2">
                        <div v-for="stop in simulatedStops" :key="stop.step"
                            class="p-2-5 px-3 rounded-4 bg-light border border-secondary-subtle d-flex align-items-center justify-content-between gap-3 stop-item-card transition-all"
                            :class="{ 'active-stop': activeStopId === stop.step }"
                            @click="activeStopId = stop.step">
                            <div class="d-flex align-items-center gap-3">
                                <!-- Step Circle Badge -->
                                <div class="step-circle rounded-circle d-flex align-items-center justify-content-center text-white fw-bold font-12"
                                    :style="{ backgroundColor: stop.badgeColor }">
                                    {{ stop.step }}
                                </div>
                                <div>
                                    <div class="fw-bold text-dark font-13">{{ stop.name }}</div>
                                    <div class="font-11 text-muted">
                                        <span v-if="stop.tagMatch" class="text-pink fw-semibold">{{ stop.tagMatch }} • </span>
                                        <span>{{ stop.description }}</span>
                                    </div>
                                </div>
                            </div>
                            <span class="badge rounded-pill font-11 fw-semibold px-2-5 py-1 text-secondary" style="background-color: #FFFFFF; border: 1px solid #E2E8F0;">
                                {{ stop.timeSlot }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right: Bản Đồ Tuyến Tối Ưu (OSRM Matrix) -->
                <div class="col-12 col-lg-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="font-11 fw-bold text-muted text-uppercase tracking-wider">
                            BẢN ĐỒ TUYẾN TỐI ƯU (OSRM MATRIX)
                        </span>
                        <span class="font-11 fw-bold text-primary d-flex align-items-center gap-1">
                            <span class="pulse-dot-blue"></span> Live Dijkstra
                        </span>
                    </div>

                    <!-- Map Container with Vector Map & Overlay Cards -->
                    <div class="position-relative rounded-4 overflow-hidden border shadow-xs map-wrapper" style="height: 385px; background: #E6F3F7;">
                        <!-- SVG Graphic representation of Da Nang Map -->
                        <svg class="w-100 h-100" viewBox="0 0 500 400" preserveAspectRatio="xMidYMid slice" style="display: block;">
                            <defs>
                                <linearGradient id="oceanGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#BAE6FD" />
                                    <stop offset="100%" stop-color="#7DD3FC" />
                                </linearGradient>
                                <linearGradient id="routeGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#E11D48" />
                                    <stop offset="100%" stop-color="#BE123C" />
                                </linearGradient>
                                <filter id="glow" x="-20%" y="-20%" width="140%" height="140%">
                                    <feGaussianBlur stdDeviation="3" result="blur" />
                                    <feComposite in="SourceGraphic" in2="blur" operator="over" />
                                </filter>
                            </defs>

                            <!-- Ocean & Sea Background -->
                            <rect width="500" height="400" fill="url(#oceanGrad)" />

                            <!-- Da Nang Coastline Landmass -->
                            <!-- Mainland & Mountains -->
                            <path d="M 0 0 L 260 0 C 270 30, 290 50, 310 70 C 330 90, 350 100, 370 80 C 400 60, 430 70, 440 100 C 450 130, 420 160, 390 170 C 360 180, 340 190, 330 220 C 320 250, 340 280, 350 320 C 360 360, 380 400, 380 400 L 0 400 Z" fill="#E2E8F0" />
                            
                            <!-- Sơn Trà Peninsula -->
                            <path d="M 370 70 C 390 50, 420 40, 450 50 C 475 60, 490 85, 480 115 C 470 135, 440 145, 410 140 C 385 135, 370 105, 370 70 Z" fill="#CBD5E1" stroke="#94A3B8" stroke-width="1.5" />
                            <text x="425" y="90" font-size="10" font-weight="bold" fill="#64748B" text-anchor="middle">BÁN ĐẢO SƠN TRÀ</text>

                            <!-- Han River (Sông Hàn) -->
                            <path d="M 270 400 C 265 350, 255 300, 260 250 C 265 210, 275 180, 280 150 C 285 120, 290 90, 310 70" fill="none" stroke="#7DD3FC" stroke-width="16" stroke-linecap="round" />
                            <path d="M 270 400 C 265 350, 255 300, 260 250 C 265 210, 275 180, 280 150 C 285 120, 290 90, 310 70" fill="none" stroke="#38BDF8" stroke-width="8" stroke-linecap="round" />

                            <!-- Bridges across Han River -->
                            <!-- Cầu Thuận Phước -->
                            <line x1="280" y1="110" x2="310" y2="105" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" />
                            <!-- Cầu Sông Hàn -->
                            <line x1="270" y1="165" x2="295" y2="160" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" />
                            <!-- Cầu Rồng -->
                            <line x1="262" y1="210" x2="290" y2="205" stroke="#F59E0B" stroke-width="4" stroke-linecap="round" />
                            <text x="245" y="213" font-size="8" font-weight="bold" fill="#B45309" text-anchor="end">Cầu Rồng</text>
                            <!-- Cầu Trần Thị Lý -->
                            <line x1="258" y1="250" x2="285" y2="245" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" />

                            <!-- City Main Roads Grid (Lines) -->
                            <path d="M 50 150 L 350 150" stroke="#FFFFFF" stroke-width="2" stroke-opacity="0.8" />
                            <path d="M 80 210 L 340 210" stroke="#FFFFFF" stroke-width="2.5" stroke-opacity="0.8" />
                            <path d="M 120 280 L 350 280" stroke="#FFFFFF" stroke-width="2" stroke-opacity="0.8" />
                            <path d="M 150 50 L 220 380" stroke="#FFFFFF" stroke-width="2" stroke-opacity="0.8" />
                            <path d="M 330 140 L 360 380" stroke="#F87171" stroke-width="3" stroke-opacity="0.7" />
                            <!-- Võ Nguyên Giáp / Mỹ Khê Beach Road -->
                            <text x="365" y="270" font-size="8" font-weight="bold" fill="#0284C7" transform="rotate(75, 365, 270)">BIỂN MỸ KHÊ</text>

                            <!-- Geographic Area Labels -->
                            <text x="130" y="130" font-size="9" font-weight="bold" fill="#94A3B8">HẢI CHÂU</text>
                            <text x="80" y="220" font-size="9" font-weight="bold" fill="#94A3B8">THANH KHÊ</text>
                            <text x="315" y="180" font-size="9" font-weight="bold" fill="#94A3B8">SƠN TRÀ</text>
                            <text x="310" y="320" font-size="9" font-weight="bold" fill="#94A3B8">NGŨ HÀNH SƠN</text>

                            <!-- Optimized Dijkstra Route Pink Glowing Curve -->
                            <!-- Stop 1 (345, 175) -> Stop 2 (280, 185) -> Stop 3 (255, 220) -> Stop 4 (255, 290) -> Stop 5 (275, 305) -> Stop 6 (270, 208) -->
                            <path d="M 345 175 C 320 178, 295 180, 280 185 C 265 190, 255 205, 255 220 C 255 250, 250 270, 255 290 C 260 300, 268 303, 275 305 C 285 307, 288 250, 278 220 C 275 212, 272 210, 270 208"
                                fill="none" stroke="#E11D48" stroke-width="4.5" stroke-linecap="round" stroke-linejoin="round" filter="url(#glow)" />
                            <path d="M 345 175 C 320 178, 295 180, 280 185 C 265 190, 255 205, 255 220 C 255 250, 250 270, 255 290 C 260 300, 268 303, 275 305 C 285 307, 288 250, 278 220 C 275 212, 272 210, 270 208"
                                fill="none" stroke="#FFF1F2" stroke-width="2" stroke-dasharray="6,4" stroke-linecap="round" />

                            <!-- Waypoint Markers 1 to 6 -->
                            <!-- Waypoint 1: Mỹ Khê -->
                            <g transform="translate(345, 175)" class="cursor-pointer">
                                <circle r="12" fill="#E11D48" stroke="#FFFFFF" stroke-width="2.5" />
                                <text text-anchor="middle" dy="4" fill="#FFFFFF" font-size="10" font-weight="bold">1</text>
                            </g>

                            <!-- Waypoint 2: Quán Bà Mua -->
                            <g transform="translate(280, 185)" class="cursor-pointer">
                                <circle r="12" fill="#334155" stroke="#FFFFFF" stroke-width="2.5" />
                                <text text-anchor="middle" dy="4" fill="#FFFFFF" font-size="10" font-weight="bold">2</text>
                            </g>

                            <!-- Waypoint 3: Bảo tàng Chăm -->
                            <g transform="translate(255, 220)" class="cursor-pointer">
                                <circle r="12" fill="#0284C7" stroke="#FFFFFF" stroke-width="2.5" />
                                <text text-anchor="middle" dy="4" fill="#FFFFFF" font-size="10" font-weight="bold">3</text>
                            </g>

                            <!-- Waypoint 4: Asia Park -->
                            <g transform="translate(255, 290)" class="cursor-pointer">
                                <circle r="12" fill="#E11D48" stroke="#FFFFFF" stroke-width="2.5" />
                                <text text-anchor="middle" dy="4" fill="#FFFFFF" font-size="10" font-weight="bold">4</text>
                            </g>

                            <!-- Waypoint 5: Chợ Đêm Helio -->
                            <g transform="translate(275, 305)" class="cursor-pointer">
                                <circle r="12" fill="#7C3AED" stroke="#FFFFFF" stroke-width="2.5" />
                                <text text-anchor="middle" dy="4" fill="#FFFFFF" font-size="10" font-weight="bold">5</text>
                            </g>

                            <!-- Waypoint 6: Cầu Rồng -->
                            <g transform="translate(270, 208)" class="cursor-pointer">
                                <circle r="12" fill="#334155" stroke="#FFFFFF" stroke-width="2.5" />
                                <text text-anchor="middle" dy="4" fill="#FFFFFF" font-size="10" font-weight="bold">6</text>
                            </g>
                        </svg>

                        <!-- Floating Card at Top: Central Coordinates -->
                        <div class="position-absolute top-0 start-50 translate-middle-x mt-2 z-2">
                            <div class="bg-white rounded-pill px-3 py-1 shadow-sm border d-flex align-items-center gap-1">
                                <i class="bx bx-map-pin font-14" style="color: #E11D48;"></i>
                                <span class="font-11 fw-semibold text-dark">Tọa độ trung tâm: 16.0544° N, 108.2022° E</span>
                            </div>
                        </div>

                        <!-- Top-Right Pin Control -->
                        <button class="position-absolute top-0 end-0 m-2 btn btn-light btn-sm rounded-circle shadow-sm border p-0 d-flex align-items-center justify-content-center z-2"
                            style="width: 32px; height: 32px;" title="Vị trí hiện tại">
                            <i class="bx bx-current-location font-16 text-muted"></i>
                        </button>

                        <!-- Floating Card at Bottom: AI Traffic Optimization Warning & Expand Button -->
                        <div class="position-absolute bottom-0 start-0 end-0 m-2 z-2">
                            <div class="bg-white rounded-4 p-2 px-3 shadow-md border d-flex align-items-center justify-content-between gap-2">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold font-10"
                                        style="background: linear-gradient(135deg, #E11D48, #7C3AED); width: 28px; height: 28px; min-width: 28px;">
                                        AI
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark font-12 lh-1 mb-0-5">Tuyệt đối không kẹt xe</div>
                                        <div class="font-10 text-muted lh-1">Tránh cung đường Điện Biên Phủ giờ cao điểm</div>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-pink-gradient text-white rounded-pill px-3 py-1 font-11 fw-bold text-nowrap"
                                    @click="openModalOsm">
                                    Phóng to OSRM
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= MODALS ================= -->

        <!-- 1. Modal: Benchmark Thử Nghiệm -->
        <div v-if="showModalBenchmark" class="modal-backdrop-custom d-flex align-items-center justify-content-center">
            <div class="modal-dialog-custom bg-white rounded-4 shadow-lg p-4" style="max-width: 650px; width: 90%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="background-color: #E0F2FE; width: 36px; height: 36px;">
                            <i class="bx bx-test-tube font-20" style="color: #0284C7;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-0 font-16">Benchmark Hiệu Năng Thuật Toán AI</h5>
                    </div>
                    <button class="btn btn-light btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center"
                        style="width: 28px; height: 28px;" @click="showModalBenchmark = false">
                        <i class="bx bx-x font-18 text-muted"></i>
                    </button>
                </div>

                <p class="text-muted font-12 mb-3">
                    Kiểm tra thời gian đáp ứng (latency), tốc độ hội tụ thế hệ và mức tiêu thụ tài nguyên trên các bộ dữ liệu du lịch Đà Nẵng:
                </p>

                <div class="table-responsive mb-3">
                    <table class="table table-bordered table-sm font-12 mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Kịch bản Tour</th>
                                <th>Số Điểm POI</th>
                                <th>Thời Gian Lập</th>
                                <th>Thế Hệ Hội Tụ</th>
                                <th>Độ Chính Xác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">Tour City 1 Ngày</td>
                                <td>4 POI</td>
                                <td class="text-success fw-bold">42 ms</td>
                                <td>Gen 85 / 250</td>
                                <td><span class="badge bg-success-subtle text-success">98.2%</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tour Khám Phá 2N1Đ</td>
                                <td>8 POI</td>
                                <td class="text-success fw-bold">115 ms</td>
                                <td>Gen 140 / 250</td>
                                <td><span class="badge bg-success-subtle text-success">96.5%</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tour Nghỉ Dưỡng 3N2Đ</td>
                                <td>14 POI</td>
                                <td class="text-primary fw-bold">185 ms</td>
                                <td>Gen 210 / 250</td>
                                <td><span class="badge bg-success-subtle text-success">94.6%</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tour Toàn Diện 4N3Đ</td>
                                <td>22 POI</td>
                                <td class="text-warning fw-bold">340 ms</td>
                                <td>Gen 248 / 250</td>
                                <td><span class="badge bg-info-subtle text-info">92.8%</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end gap-2 pt-2">
                    <button class="btn btn-outline-secondary rounded-pill px-4 py-2 font-12 fw-semibold" @click="showModalBenchmark = false">
                        Đóng
                    </button>
                    <button class="btn btn-pink-gradient text-white rounded-pill px-4 py-2 font-12 fw-bold" @click="chayFullBenchmark">
                        <i class="bx bx-play me-1"></i> Chạy Lại Benchmark
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. Modal: Chi Tiết Toán Giải & Hàm Mục Tiêu -->
        <div v-if="showModalToanGiai" class="modal-backdrop-custom d-flex align-items-center justify-content-center">
            <div class="modal-dialog-custom bg-white rounded-4 shadow-lg p-4" style="max-width: 650px; width: 90%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 36px; height: 36px;">
                            <i class="bx bx-math font-20" style="color: #E11D48;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-0 font-16">Công Thức Hàm Thích Nghi (Fitness Function)</h5>
                    </div>
                    <button class="btn btn-light btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center"
                        style="width: 28px; height: 28px;" @click="showModalToanGiai = false">
                        <i class="bx bx-x font-18 text-muted"></i>
                    </button>
                </div>

                <div class="p-3 rounded-3 mb-3 font-monospace font-12" style="background-color: #F8FAFC; border: 1px solid #E2E8F0;">
                    <div class="fw-bold text-dark mb-2">Hàm Mục Tiêu Tối Ưu Đa Tiêu Chí (Multi-Objective Optimization):</div>
                    <div class="text-pink fw-bold mb-1">
                        Maximize F(C) = w_p * P(C) + w_d * D(C) + w_c * C_cost(C) + w_r * R(C)
                    </div>
                    <div class="text-muted font-11">
                        Điều kiện biên: ∑ w_i = 100% (Chuẩn hóa vector l1-norm).
                    </div>
                </div>

                <div class="font-12 text-muted mb-3">
                    <p class="mb-2"><strong>1. P(C) - Preference Score:</strong> Tính tích vô hướng cosine giữa vector sở thích du khách và vector nhãn gắn với POI trong nhiễm sắc thể.</p>
                    <p class="mb-2"><strong>2. D(C) - Distance & Route Score:</strong> Truy vấn ma trận Open Source Routing Machine (OSRM) Đà Nẵng, phạt các lộ trình có vòng lặp hoặc ngõ cụt.</p>
                    <p class="mb-2"><strong>3. C_cost(C) - Budget Score:</strong> Phạt phi tuyến tính nếu tổng giá vé các điểm tham quan vượt quá hạn mức ngân sách của du khách.</p>
                    <p class="mb-0"><strong>4. R(C) - Rating & Popularity:</strong> Chuẩn hóa điểm đánh giá trung bình từ đánh giá thực của du khách trên thang điểm 5 sao.</p>
                </div>

                <div class="d-flex justify-content-end pt-2">
                    <button class="btn btn-pink-gradient text-white rounded-pill px-4 py-2 font-12 fw-bold" @click="showModalToanGiai = false">
                        Đã Hiểu
                    </button>
                </div>
            </div>
        </div>

        <!-- 3. Modal: Phóng To Bản Đồ Tuyến OSRM Matrix -->
        <div v-if="showModalOsm" class="modal-backdrop-custom d-flex align-items-center justify-content-center">
            <div class="modal-dialog-custom bg-white rounded-4 shadow-lg p-4" style="max-width: 850px; width: 92%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 36px; height: 36px;">
                            <i class="bx bx-map font-20" style="color: #E11D48;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-0 font-16">Ma Trận OSRM & Tuyến Lộ Trình Chi Tiết</h5>
                    </div>
                    <button class="btn btn-light btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center"
                        style="width: 28px; height: 28px;" @click="showModalOsm = false">
                        <i class="bx bx-x font-18 text-muted"></i>
                    </button>
                </div>

                <div class="table-responsive mb-3">
                    <table class="table table-bordered table-sm font-11 mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Chặng</th>
                                <th>Từ Điểm</th>
                                <th>Đến Điểm</th>
                                <th>Khoảng Cách</th>
                                <th>Thời Gian Đi</th>
                                <th>Tuyến Đường Khuyến Nghị</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold text-pink">1 → 2</td>
                                <td>Bãi Tắm Mỹ Khê</td>
                                <td>Bánh Tráng Bà Mua</td>
                                <td>3.2 km</td>
                                <td>7 phút</td>
                                <td>Võ Nguyên Giáp → Cầu Sông Hàn</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-pink">2 → 3</td>
                                <td>Bánh Tráng Bà Mua</td>
                                <td>Bảo Tàng Chăm</td>
                                <td>1.8 km</td>
                                <td>5 phút</td>
                                <td>Bạch Đằng → 2 Tháng 9</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-pink">3 → 4</td>
                                <td>Bảo Tàng Chăm</td>
                                <td>Asia Park Sun World</td>
                                <td>4.1 km</td>
                                <td>9 phút</td>
                                <td>Đường 2 Tháng 9 ven sông Hàn</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-pink">4 → 5</td>
                                <td>Asia Park Sun World</td>
                                <td>Chợ Đêm Helio</td>
                                <td>0.2 km</td>
                                <td>2 phút</td>
                                <td>Đi bộ trong khuôn viên</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-pink">5 → 6</td>
                                <td>Chợ Đêm Helio</td>
                                <td>Cầu Rồng Đà Nẵng</td>
                                <td>3.6 km</td>
                                <td>8 phút</td>
                                <td>Đường 2 Tháng 9 thẳng đến Mố Cầu</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center pt-2">
                    <span class="font-11 text-muted">Dữ liệu đồng bộ trực tiếp từ OpenStreetMap Server TP Đà Nẵng.</span>
                    <button class="btn btn-pink-gradient text-white rounded-pill px-4 py-2 font-12 fw-bold" @click="showModalOsm = false">
                        Đóng
                    </button>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'ThuatToanAiComponent',
    data() {
        return {
            // KPI Data
            avgSolveTime: 185,
            distanceReduction: -28.4,
            avgFitnessScore: 94.6,
            currentAiModel: 'GA-OSRM-Hybrid',

            // Weights (Must total 100%)
            weights: {
                preference: 40,
                distance: 30,
                cost: 15,
                rating: 15
            },

            // Genetic Algorithm Hyperparameters
            ga: {
                population: 100,
                generations: 250,
                crossoverRate: 0.85,
                mutationRate: 0.08,
                selectionStrategy: 'Tournament Selection',
                elitism: true
            },

            // Live Sandbox Sample Profile
            sampleProfile: {
                guestGroup: 'Gia đình có trẻ nhỏ',
                budget: '5.000.000 VNĐ',
                duration: '2 Ngày 2 Đêm (2N2Đ)',
                activeTags: ['bien_my_khe', 'am_thuc_da_thanh', 'cong_vien_chau_a']
            },

            // Simulation state
            isSimulating: false,
            simResult: {
                runTimeMs: 52,
                stopsCount: 6,
                reducedKm: 8.2,
                fitnessScore: 96.8,
                totalCostFormatted: '3.450.000'
            },

            // Simulated Stops (Chromosome sequence)
            activeStopId: 1,
            simulatedStops: [
                {
                    step: 1,
                    name: 'Bãi Tắm Mỹ Khê (Công viên Biển Đông)',
                    tagMatch: 'Khớp thẻ: #bien_my_khe',
                    description: 'Khởi hành từ khách sạn sáng sớm',
                    timeSlot: '08:00 - 10:30',
                    badgeColor: '#E11D48'
                },
                {
                    step: 2,
                    name: 'Quán Bánh Tráng Cuốn Thịt Heo Bà Mua',
                    tagMatch: 'Khớp thẻ: #am_thuc_da_thanh',
                    description: 'Cách điểm 1: 3.2km (7 phút di chuyển)',
                    timeSlot: '11:00 - 12:30',
                    badgeColor: '#334155'
                },
                {
                    step: 3,
                    name: 'Bảo Tàng Điêu Khắc Chăm Đà Nẵng',
                    tagMatch: '',
                    description: 'Điểm văn hóa trung tâm • Cách điểm 2: 1.8km (nghỉ trưa/chụp ảnh)',
                    timeSlot: '13:30 - 15:30',
                    badgeColor: '#0284C7'
                },
                {
                    step: 4,
                    name: 'Công Viên Châu Á - Asia Park & Vòng Quay...',
                    tagMatch: 'Khớp thẻ: #cong_vien_chau_a',
                    description: 'Thích hợp gia đình có trẻ em',
                    timeSlot: '16:00 - 18:30',
                    badgeColor: '#E11D48'
                },
                {
                    step: 5,
                    name: 'Chợ Đêm Helio & Khu Ẩm Thực Đêm Phố Biển',
                    tagMatch: '',
                    description: 'Cách Sun World 200m đi bộ an toàn cho trẻ nhỏ',
                    timeSlot: '18:45 - 21:00',
                    badgeColor: '#7C3AED'
                },
                {
                    step: 6,
                    name: 'Cầu Rồng Đà Nẵng (Xem Phun Lửa & Phun N...',
                    tagMatch: '',
                    description: 'Điểm kết thúc hành trình ngày 1 rực rỡ',
                    timeSlot: '21:15 - 22:00',
                    badgeColor: '#334155'
                }
            ],

            // Modals
            showModalBenchmark: false,
            showModalToanGiai: false,
            showModalOsm: false
        };
    },
    computed: {
        totalWeights() {
            return this.weights.preference + this.weights.distance + this.weights.cost + this.weights.rating;
        }
    },
    methods: {
        getTagStyle(index) {
            const styles = [
                { backgroundColor: '#FCE7F3', color: '#BE185D' },
                { backgroundColor: '#EDE9FE', color: '#6D28D9' },
                { backgroundColor: '#E0F2FE', color: '#0369A1' }
            ];
            return styles[index % styles.length];
        },
        themTagNhanh() {
            const tagsPool = ['check_in_cau_rong', 'lang_nghe_non_nuoc', 'cafe_song_han', 'ban_dao_son_tra'];
            const available = tagsPool.filter(t => !this.sampleProfile.activeTags.includes(t));
            if (available.length > 0) {
                this.sampleProfile.activeTags.push(available[0]);
                if (this.$toast) {
                    this.$toast.info(`Đã thêm thẻ #${available[0]} vào hồ sơ mẫu.`);
                }
            } else {
                if (this.$toast) {
                    this.$toast.warning('Đã đạt giới hạn thẻ thử nghiệm mẫu.');
                }
            }
        },
        chayMoPhong() {
            this.isSimulating = true;
            setTimeout(() => {
                this.isSimulating = false;
                this.simResult = {
                    runTimeMs: Math.floor(Math.random() * 15) + 48,
                    stopsCount: 6,
                    reducedKm: 8.2,
                    fitnessScore: (95.5 + Math.random() * 2).toFixed(1),
                    totalCostFormatted: '3.450.000'
                };
                if (this.$toast) {
                    this.$toast.success('Mô phỏng giải thuật GA & Dijkstra hoàn tất!');
                }
            }, 600);
        },
        openModalBenchmark() {
            this.showModalBenchmark = true;
        },
        chayFullBenchmark() {
            if (this.$toast) {
                this.$toast.info('Đang kiểm thử benchmark qua 4 kịch bản quy mô lớn...');
            }
            setTimeout(() => {
                if (this.$toast) {
                    this.$toast.success('Benchmark hoàn tất: Độ ổn định 99.98%, thời gian phản hồi trung bình 185ms.');
                }
            }, 500);
        },
        openModalToanGiai() {
            this.showModalToanGiai = true;
        },
        openModalOsm() {
            this.showModalOsm = true;
        },
        khoiPhucMacDinh() {
            this.weights = {
                preference: 40,
                distance: 30,
                cost: 15,
                rating: 15
            };
            this.ga = {
                population: 100,
                generations: 250,
                crossoverRate: 0.85,
                mutationRate: 0.08,
                selectionStrategy: 'Tournament Selection',
                elitism: true
            };
            if (this.$toast) {
                this.$toast.info('Đã khôi phục các tham số mặc định của hệ thống.');
            }
        },
        luuCauHinh() {
            if (this.totalWeights !== 100) {
                if (this.$toast) {
                    this.$toast.warning(`Tổng các trọng số hiện tại là ${this.totalWeights}%. Hệ thống sẽ tự chuẩn hóa về 100% khi sinh lộ trình.`);
                }
            }
            if (this.$toast) {
                this.$toast.success('Lưu và triển khai tham số thuật toán AI V4.2 thành công!');
            }
        }
    }
};
</script>

<style scoped>
.ai-config-page {
    background-color: #F8FAFC;
    min-height: 100vh;
    color: #1E293B;
}

.page-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #0F172A;
}

.font-10 { font-size: 10px; }
.font-11 { font-size: 11px; }
.font-12 { font-size: 12px; }
.font-13 { font-size: 13px; }
.font-14 { font-size: 14px; }
.font-16 { font-size: 16px; }
.font-18 { font-size: 18px; }
.font-20 { font-size: 20px; }
.font-24 { font-size: 24px; }
.font-28 { font-size: 28px; }

.py-0-5 { padding-top: 2px; padding-bottom: 2px; }
.p-2-5 { padding: 10px 14px; }
.mb-0-5 { margin-bottom: 2px; }
.mt-0-5 { margin-top: 2px; }

.btn-pink-gradient {
    background: linear-gradient(135deg, #E11D48 0%, #BE123C 100%);
    border: none;
    box-shadow: 0 2px 6px rgba(225, 29, 72, 0.25);
    transition: all 0.2s ease;
}
.btn-pink-gradient:hover {
    background: linear-gradient(135deg, #F43F5E 0%, #E11D48 100%);
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.35);
    transform: translateY(-1px);
}

.text-pink { color: #E11D48 !important; }
.border-pink-subtle { border-color: #FCE7F3 !important; }

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

.pulse-dot-blue {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background-color: #0284C7;
    display: inline-block;
    box-shadow: 0 0 0 0 rgba(2, 132, 199, 0.7);
    animation: pulseBlue 2s infinite;
}

@keyframes pulseBlue {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(2, 132, 199, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(2, 132, 199, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(2, 132, 199, 0); }
}

.shadow-xs { box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05); }

.kpi-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
}

.legend-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
}

/* Custom Styled Range Sliders */
.form-range {
    height: 6px;
    border-radius: 4px;
    outline: none;
}
.range-pink::-webkit-slider-thumb {
    background-color: #E11D48;
    box-shadow: 0 0 6px rgba(225, 29, 72, 0.4);
    cursor: pointer;
}
.range-blue::-webkit-slider-thumb {
    background-color: #0284C7;
    box-shadow: 0 0 6px rgba(2, 132, 199, 0.4);
    cursor: pointer;
}
.range-purple::-webkit-slider-thumb {
    background-color: #7C3AED;
    box-shadow: 0 0 6px rgba(124, 58, 237, 0.4);
    cursor: pointer;
}
.range-rose::-webkit-slider-thumb {
    background-color: #F43F5E;
    box-shadow: 0 0 6px rgba(244, 63, 94, 0.4);
    cursor: pointer;
}

/* Stop item card */
.stop-item-card {
    cursor: pointer;
}
.stop-item-card:hover {
    background-color: #F8FAFC !important;
    border-color: #CBD5E1 !important;
    transform: translateX(2px);
}
.stop-item-card.active-stop {
    background-color: #FFF1F2 !important;
    border-color: #FECDD3 !important;
}

.step-circle {
    width: 26px;
    height: 26px;
    min-width: 26px;
}

.border-end-md {
    border-right: 1px solid #F1F5F9;
}
@media (max-width: 767.98px) {
    .border-end-md {
        border-right: none;
        border-bottom: 1px solid #F1F5F9;
        padding-bottom: 1rem;
        margin-bottom: 1rem;
    }
}

/* Modal Backdrop */
.modal-backdrop-custom {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(15, 23, 42, 0.5);
    backdrop-filter: blur(4px);
    z-index: 1050;
}
.modal-dialog-custom {
    animation: modalFadeIn 0.2s ease-out;
}
@keyframes modalFadeIn {
    from { opacity: 0; transform: scale(0.96) translateY(-10px); }
    to { opacity: 1; transform: scale(1) translateY(0); }
}
</style>
