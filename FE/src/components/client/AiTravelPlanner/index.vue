<template>
    <div class="ai-planner-container">
        <!-- Top Banner Gradient -->
        <div class="banner-ai-header mb-4 p-4 rounded-4 text-white position-relative overflow-hidden">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="sub-badge-ai mb-2 d-inline-block">
                        <i class="bx bx-atom me-1"></i>HỆ THỐNG TỐI ƯU HÓA TUYẾN ĐIỂM ĐA MỤC TIÊU (OSRM + GA)
                    </span>
                    <h3 class="fw-bold mb-2">KHỞI TẠO LỊCH TRÌNH ĐÀ NẴNG CÁ NHÂN HÓA BẰNG THUẬT TOÁN AI</h3>
                    <p class="mb-0 text-white-50 small pe-lg-4">
                        Ứng dụng mô hình tối ưu hóa không gian & thời gian thực: Giảm thiểu quãng đường di chuyển (qua bảng <code>ma_tran_khoang_cach</code>), cực đại hóa chỉ số thỏa mãn sở thích và cân đối chặt chẽ ngân sách dự kiến của du khách.
                    </p>
                </div>
                <div class="col-lg-4 mt-3 mt-lg-0 text-lg-end">
                    <div class="d-inline-flex flex-column gap-2 text-start">
                        <div class="stat-pill-ai">
                            <i class="bx bx-network-chart text-danger fs-5"></i>
                            <div>
                                <small class="text-uppercase text-secondary d-block font-10">Ma trận điểm đến</small>
                                <strong class="text-dark">150+ POI Đà Nẵng</strong>
                            </div>
                        </div>
                        <div class="stat-pill-ai">
                            <i class="bx bx-line-chart text-info fs-5"></i>
                            <div>
                                <small class="text-uppercase text-secondary d-block font-10">Độ chính xác thuật toán</small>
                                <strong class="text-info">> 96.8% Fit Score</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Left Form Configuration (Sections 1, 2, 3, 4) -->
            <div class="col-xl-8 col-lg-7">
                <!-- Section 1: Thời Gian & Đối Tượng Chuyến Đi -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="step-badge">1</span>
                                <h6 class="fw-bold text-dark mb-0">Thời Gian & Đối Tượng Chuyến Đi</h6>
                            </div>
                            <span class="badge bg-light text-secondary border font-11">Bảng `lich_trinh`</span>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold text-muted">NGÀY KHỞI HÀNH</label>
                                <input type="date" class="form-control" v-model="form_ke_hoach.ngay_bat_dau">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold text-muted">NGÀY KẾT THÚC</label>
                                <input type="date" class="form-control" v-model="form_ke_hoach.ngay_ket_thuc">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold text-muted">TỔNG THỜI GIAN</label>
                                <div class="form-control bg-light text-primary fw-bold text-center">
                                    <i class="bx bx-time-five me-1"></i>3 Ngày 2 Đêm
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">SỐ LƯỢNG & THÀNH VIÊN ĐI CÙNG</label>
                            <div class="row g-2">
                                <div class="col-6 col-md-3" v-for="type in list_doi_tuong" :key="type.id">
                                    <button 
                                        type="button" 
                                        class="btn w-100 p-2 text-center rounded-3 option-btn"
                                        :class="form_ke_hoach.id_doi_tuong === type.id ? 'active' : ''"
                                        @click="form_ke_hoach.id_doi_tuong = type.id"
                                    >
                                        <i :class="type.icon" class="fs-4 d-block mb-1"></i>
                                        <small class="d-block fw-semibold">{{ type.name }}</small>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="form-label small fw-semibold text-muted">PHƯƠNG TIỆN DI CHUYỂN CHÍNH (ẢNH HƯỞNG VẬN TỐC MA TRẬN OSRM)</label>
                            <div class="row g-2">
                                <div class="col-md-4" v-for="v in list_phuong_tien" :key="v.id">
                                    <div 
                                        class="p-2 border rounded-3 d-flex align-items-center gap-2 cursor-pointer vehicle-card"
                                        :class="form_ke_hoach.phuong_tien === v.id ? 'active-border' : ''"
                                        @click="form_ke_hoach.phuong_tien = v.id"
                                    >
                                        <i :class="v.icon" class="fs-4 text-primary"></i>
                                        <div>
                                            <div class="fw-bold small">{{ v.name }}</div>
                                            <small class="text-muted font-11">{{ v.desc }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Ngân Sách & Nhịp Độ Lịch Trình -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="step-badge">2</span>
                                <h6 class="fw-bold text-dark mb-0">Ngân Sách & Nhịp Độ Lịch Trình</h6>
                            </div>
                            <span class="badge bg-light text-secondary border font-11">Tham số ràng buộc hàm mục tiêu</span>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="small text-muted fw-semibold">NGÂN SÁCH DỰ KIẾN / NGƯỜI</span>
                                <span class="text-danger fw-bold fs-5">{{ formatVND(form_ke_hoach.ngan_sach) }}</span>
                            </div>
                            <input type="range" class="form-range" min="1000000" max="15000000" step="500000" v-model="form_ke_hoach.ngan_sach">
                            <div class="d-flex justify-content-between small text-muted font-11">
                                <span>Tiết kiệm (1.000.000 đ)</span>
                                <span>Tiêu chuẩn (5.000.000 đ)</span>
                                <span>Sang trọng (15.000.000 đ)</span>
                            </div>
                        </div>

                        <div>
                            <label class="form-label small fw-semibold text-muted">NHỊP ĐỘ THAM QUAN (MẬT ĐỘ POI PHÂN BỔ TRONG NGÀY)</label>
                            <div class="row g-2">
                                <div class="col-md-4" v-for="r in list_nhip_do" :key="r.id">
                                    <div 
                                        class="p-3 border rounded-3 cursor-pointer pace-card"
                                        :class="form_ke_hoach.nhip_do === r.id ? 'active-pink' : ''"
                                        @click="form_ke_hoach.nhip_do = r.id"
                                    >
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="fw-bold">{{ r.title }}</span>
                                            <span class="badge bg-white text-dark border">{{ r.density }}</span>
                                        </div>
                                        <small class="text-muted d-block">{{ r.desc }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Trọng Số Sở Thích Du Khách -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="step-badge">3</span>
                                <h6 class="fw-bold text-dark mb-0">Trọng Số Sở Thích Du Khách (<code>the_so_thich</code>)</h6>
                            </div>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle font-11">Mẫu Giới Trẻ Đề Xuất</span>
                        </div>
                        <p class="small text-muted mb-3">Chọn các danh mục ưu tiên để thuật toán tăng hệ số điểm thỏa mãn (Utility Function) cho các địa điểm tương ứng:</p>
                        
                        <div class="d-flex flex-wrap gap-2">
                            <button 
                                v-for="tag in list_tags" 
                                :key="tag.id"
                                type="button"
                                class="btn btn-sm rounded-pill tag-btn"
                                :class="isTagSelected(tag.id) ? 'btn-danger text-white' : 'btn-outline-secondary'"
                                @click="toggleTag(tag.id)"
                            >
                                <i :class="isTagSelected(tag.id) ? 'bx bx-check me-1' : 'bx bx-plus me-1'"></i>
                                {{ tag.name }}
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Section 4: Điểm Khởi Hành & Nơi Lưu Trú -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="step-badge">4</span>
                                <h6 class="fw-bold text-dark mb-0">Điểm Khởi Hành & Nơi Lưu Trú</h6>
                            </div>
                            <span class="badge bg-light text-secondary border font-11">Tọa độ gốc (Node 0)</span>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-muted">ĐIỂM ĐÓN / KHỞI HÀNH NGÀY ĐẦU</label>
                                <select class="form-select" v-model="form_ke_hoach.diem_don">
                                    <option value="dad">Sân bay Quốc tế Đà Nẵng (DAD - Quận Hải Châu)</option>
                                    <option value="ga">Ga Đường Sắt Đà Nẵng</option>
                                    <option value="ks">Tại khách sạn lưu trú</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-muted">ĐỊA CHỈ KHÁCH SẠN / HOMESTAY DỰ KIẾN</label>
                                <input type="text" class="form-control" v-model="form_ke_hoach.dia_chi_ks" placeholder="Nhập địa chỉ hoặc khu vực lưu trú...">
                            </div>
                        </div>

                        <!-- Mini map preview box -->
                        <div class="rounded-3 p-3 text-center bg-light border text-muted">
                            <i class="bx bx-map-pin text-danger fs-4 me-1"></i>
                            <small class="fw-semibold text-dark">Tọa độ neo thuật toán: 16.0592° N, 108.2435° E (Khu vực Bãi biển Mỹ Khê)</small>
                        </div>
                    </div>
                </div>

                <!-- Action Button Trigger Algorithm -->
                <div class="d-flex gap-3 mb-4">
                    <button type="button" class="btn btn-danger btn-lg rounded-pill px-4 fw-bold shadow-sm d-flex align-items-center gap-2 flex-grow-1 justify-content-center" @click="runOptimizer">
                        <i class="bx bx-rocket fs-4"></i>
                        <span>CHẠY THUẬT TOÁN TỐI ƯU LỊCH TRÌNH</span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" @click="savePreset">
                        <i class="bx bx-bookmark me-1"></i>Áp Dụng Cấu Hình Đã Lưu
                    </button>
                </div>
            </div>

            <!-- Right Simulation & Results Column -->
            <div class="col-xl-4 col-lg-5">
                <!-- Simulation Card -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4 text-center">
                        <div class="d-flex align-items-center justify-content-between mb-3 text-start">
                            <div>
                                <small class="text-success fw-bold d-block font-11">● ĐÀ NẴNG AI ENGINE READY</small>
                                <h6 class="fw-bold mb-0">Mô Phỏng Tối Ưu Hóa Tuyến Tuyến</h6>
                            </div>
                            <span class="badge bg-light text-secondary border">v3.5 Optimizer</span>
                        </div>

                        <!-- Progress Circle Fit Score -->
                        <div class="doughnut-box my-3 mx-auto">
                            <div class="score-circle">
                                <h2 class="fw-bold text-danger mb-0">96.4%</h2>
                                <small class="text-muted font-11">ĐỘ PHÙ HỢP</small>
                            </div>
                        </div>

                        <div class="row g-2 text-center small mb-3">
                            <div class="col-6">
                                <div class="p-2 bg-light rounded-3">
                                    <span class="text-muted d-block font-10">Tiết kiệm đường</span>
                                    <strong class="text-success">~36%</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-2 bg-light rounded-3">
                                    <span class="text-muted d-block font-10">Thỏa mãn gu</span>
                                    <strong class="text-primary">98%</strong>
                                </div>
                            </div>
                        </div>

                        <div class="text-start border-top pt-3">
                            <small class="fw-bold text-dark d-block mb-2">TIẾN TRÌNH XỬ LÝ DỮ LIỆU:</small>
                            <ul class="list-unstyled small text-muted mb-0">
                                <li class="mb-1"><i class="bx bx-check-circle text-success me-1"></i> Lọc 150+ POI qua thẻ <code>the_so_thich</code></li>
                                <li class="mb-1"><i class="bx bx-check-circle text-success me-1"></i> Truy vấn ma trận khoảng cách OSRM Table API</li>
                                <li class="mb-1"><i class="bx bx-check-circle text-success me-1"></i> Phân bổ khung giờ mở cửa & nhịp sinh học</li>
                                <li><i class="bx bx-radio-circle text-secondary me-1"></i> Xuất bản ghi <code>lich_trinh</code> & <code>chi_tiet_lich_trinh</code></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Template Preview Card -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-bold mb-0">LỊCH TRÌNH MẪU THAM KHẢO</h6>
                            <span class="badge bg-danger rounded-pill">Phổ biến</span>
                        </div>
                        <h6 class="fw-bold text-dark">Đà Nẵng Rực Rỡ: Biển Xanh - Bà Nà - Phố Sông Hàn (3N2Đ)</h6>
                        <p class="text-muted small mb-3">Mô hình đã được 1.240+ du khách sử dụng thành công với chi phí bình quân 4.800.000đ.</p>

                        <div class="timeline-sample small mb-3">
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <span>Ngày 1: Bán Đảo Sơn Trà - Biển Mỹ Khê - Chợ Đêm</span>
                                <span class="badge bg-light text-dark">4 POI</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <span>Ngày 2: Trọn ngày Sun World Bà Nà Hills & Cầu Vàng</span>
                                <span class="badge bg-light text-dark">1 Siêu POI</span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <span>Ngày 3: Ngũ Hành Sơn - Mua sắm Chợ Cồn - Cà phê Phố</span>
                                <span class="badge bg-light text-dark">3 POI</span>
                            </div>
                        </div>

                        <router-link to="/client/lich-trinh-toi-uu" class="btn btn-outline-danger w-100 rounded-pill btn-sm fw-semibold">
                            Nạp Mẫu Lịch Trình Này Vào Wizard
                        </router-link>
                    </div>
                </div>

                <!-- Weather Card -->
                <div class="card border-0 shadow-sm rounded-4 bg-info-subtle text-info-emphasis p-3">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bx bx-sun fs-1 text-warning"></i>
                        <div>
                            <div class="fw-bold">Thời Tiết Đà Nẵng Tuần Này: 29°C - Nắng Nhẹ</div>
                            <small class="text-muted">Rất lý tưởng cho các hoạt động tắm biển và cáp treo Bà Nà.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AiTravelPlannerComponent',
    data() {
        return {
            form_ke_hoach: {
                ngay_bat_dau: '2026-06-16',
                ngay_ket_thuc: '2026-06-17',
                id_doi_tuong: 2, // Cặp đôi
                phuong_tien: 'xe_may',
                ngan_sach: 5000000,
                nhip_do: 'vua_phai',
                diem_don: 'dad',
                dia_chi_ks: 'Khách sạn ven biển đường Võ Nguyên Giáp'
            },
            list_doi_tuong: [
                { id: 1, name: 'Đi 1 mình', icon: 'bx bx-user' },
                { id: 2, name: 'Cặp đôi (2 người)', icon: 'bx bx-heart' },
                { id: 3, name: 'Nhóm bạn (3-5)', icon: 'bx bx-group' },
                { id: 4, name: 'Gia đình có trẻ nhỏ', icon: 'bx bx-home-heart' }
            ],
            list_phuong_tien: [
                { id: 'xe_may', name: 'Xe máy tự lái', desc: 'Linh hoạt, tối ưu hẻm phố', icon: 'bx bx-cycling' },
                { id: 'oto', name: 'Ô tô / Taxi Grab', desc: 'Thoải mái, tránh nắng mưa', icon: 'bx bx-car' },
                { id: 'bo', name: 'Đi bộ & Xe đạp', desc: 'Chậm rãi khu phố cổ / biển', icon: 'bx bx-walk' }
            ],
            list_nhip_do: [
                { id: 'thong_tha', title: 'Thong Thả', density: '3-4 điểm/ngày', desc: 'Nghỉ ngơi nhiều, thích hợp nghỉ dưỡng, ngắm biển.' },
                { id: 'vua_phai', title: 'Vừa Phải (Đề Xuất)', density: '4-5 điểm/ngày', desc: 'Cân bằng hoàn hảo giữa check-in, ẩm thực và thư giãn.' },
                { id: 'day_dac', title: 'Dày Đặc', density: '6-7 điểm/ngày', desc: 'Khám phá tối đa, dành cho du khách thích trải nghiệm nhanh.' }
            ],
            selected_tags: [1, 2, 3, 4],
            list_tags: [
                { id: 1, name: 'Bãi Biển Mỹ Khê & Bán Đảo' },
                { id: 2, name: 'Ẩm Thực Miền Trung (Mì Quảng, Bánh Xèo)' },
                { id: 3, name: 'Khu Du Lịch Bà Nà Hills & Cầu Vàng' },
                { id: 4, name: 'Chợ Đêm Sơn Trà & Phố Đi Bộ' },
                { id: 5, name: 'Bán Đảo Sơn Trà & Chùa Linh Ứng' },
                { id: 6, name: 'Bảo Tàng Điêu Khắc Chăm Pa' },
                { id: 7, name: 'Cafe Check-in View Sông Hàn / Hoàng Hôn' },
                { id: 8, name: 'Danh Thắng Ngũ Hành Sơn' },
                { id: 9, name: 'Du Thuyền Ngắm Cầu Rồng Phun Lửa' }
            ]
        };
    },
    mounted() {},
    methods: {
        formatVND(value) {
            if (!value) return '0 đ';
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
        },
        toggleTag(tagId) {
            const index = this.selected_tags.indexOf(tagId);
            if (index > -1) {
                this.selected_tags.splice(index, 1);
            } else {
                this.selected_tags.push(tagId);
            }
        },
        isTagSelected(tagId) {
            return this.selected_tags.includes(tagId);
        },
        runOptimizer() {
            if (this.$toast) {
                this.$toast.success('Đang thực thi thuật toán Genetic Algorithm (GA) & OSRM...');
            }
            setTimeout(() => {
                this.$router.push('/client/lich-trinh-toi-uu');
            }, 800);
        },
        savePreset() {
            if (this.$toast) {
                this.$toast.success('Đã nạp cấu hình tối ưu thành công!');
            }
        }
    }
};
</script>

<style scoped>
.banner-ai-header {
    background: linear-gradient(135deg, #be185d 0%, #db2777 50%, #0284c7 100%);
}

.sub-badge-ai {
    background: rgba(255, 255, 255, 0.2);
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.stat-pill-ai {
    background: #ffffff;
    border-radius: 12px;
    padding: 8px 14px;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.step-badge {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background-color: #db2777;
    color: #ffffff;
    font-size: 0.85rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.option-btn {
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    transition: all 0.2s;
}

.option-btn.active {
    background: #db2777;
    border-color: #db2777;
    color: #ffffff;
}

.vehicle-card {
    transition: all 0.2s;
}

.vehicle-card.active-border {
    border-color: #db2777 !important;
    background-color: #fdf2f8;
}

.pace-card {
    transition: all 0.2s;
}

.pace-card.active-pink {
    border-color: #db2777 !important;
    background: #fdf2f8;
}

.doughnut-box {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    background: conic-gradient(#db2777 0% 96.4%, #f1f5f9 96.4% 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 12px;
}

.score-circle {
    width: 100%;
    height: 100%;
    background: #ffffff;
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.font-10 {
    font-size: 10px;
}

.font-11 {
    font-size: 11px;
}
</style>
