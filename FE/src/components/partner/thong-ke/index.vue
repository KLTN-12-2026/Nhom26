<template>
    <div class="partner-thong-ke-container">
        <!-- Banner Title -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 page-banner-card">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-pink text-white px-3 py-1 rounded-pill font-11 fw-bold">
                                BÁO CÁO DOANH THU & HIỆU SUẤT
                            </span>
                            <span class="text-muted small">/ Năm 2026</span>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Thống Kê Kinh Doanh & Phân Tích Tour</h3>
                        <p class="text-muted small mb-0">
                            Theo dõi tăng trưởng doanh số, tỷ lệ lấp chỗ các chuyến đi và phân tích hiệu quả từng tuyến dịch vụ.
                        </p>
                    </div>
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <select class="form-select form-select-sm rounded-3" style="width: 160px;" v-model="selectedPeriod">
                            <option value="10-2026">Tháng 10 / 2026</option>
                            <option value="09-2026">Tháng 09 / 2026</option>
                            <option value="q3-2026">Quý 3 / 2026</option>
                            <option value="y-2026">Cả Năm 2026</option>
                        </select>
                        <button class="btn btn-outline-pink rounded-3 btn-sm px-3 py-2 fw-semibold" @click="xuatBaoCao">
                            <i class="bx bx-download me-1"></i> Xuất Báo Cáo
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4 KPI Metrics -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3 mb-4">
            <div class="col" v-for="kpi in kpis" :key="kpi.title">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 border-start-pink">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="small text-muted fw-bold">{{ kpi.title }}</span>
                        <div class="kpi-icon-circle bg-pink-light text-pink">
                            <i :class="kpi.icon"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold text-dark mb-1">{{ kpi.value }}</h3>
                    <div class="d-flex align-items-center gap-1 small text-success fw-semibold">
                        <i class="bx bx-trending-up"></i> {{ kpi.trend }} so với kỳ trước
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue Visual Analytics & Tour Breakdown -->
        <div class="row g-4 mb-4">
            <!-- Monthly Revenue Chart Representation -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h5 class="fw-bold text-dark mb-1">Doanh Thu 6 Tháng Gần Nhất (Triệu VNĐ)</h5>
                            <small class="text-muted">Tổng tích lũy 6 tháng đạt: <strong class="text-pink">2.450.000.000 đ</strong></small>
                        </div>
                        <span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill fw-bold">+24.5% TB</span>
                    </div>

                    <!-- Custom Visual Bar Chart with Pink Accents -->
                    <div class="revenue-chart-bars d-flex align-items-end justify-content-between pt-4 pb-2 px-2" style="height: 240px;">
                        <div class="bar-col text-center" v-for="item in chartData" :key="item.month">
                            <div class="bar-amount text-muted font-11 mb-2">{{ item.amount }}M</div>
                            <div class="bar-pill-outer mx-auto">
                                <div class="bar-pill-inner" :style="{ height: item.percent + '%' }"></div>
                            </div>
                            <div class="bar-label font-12 fw-bold text-dark mt-2">{{ item.month }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue Structure by Category -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <h5 class="fw-bold text-dark mb-3">Cơ Cấu Doanh Thu Dịch Vụ</h5>
                    <div class="category-breakdown d-flex flex-column gap-3">
                        <div v-for="cat in categories" :key="cat.name">
                            <div class="d-flex justify-content-between small mb-1">
                                <span class="fw-semibold text-dark">{{ cat.name }}</span>
                                <span class="text-pink fw-bold">{{ cat.percentage }}% ({{ cat.amount }}M)</span>
                            </div>
                            <div class="progress" style="height: 7px;">
                                <div class="progress-bar bg-pink" :style="{ width: cat.percentage + '%' }"></div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 bg-pink-light rounded-3 mt-4 text-pink small">
                        <i class="bx bx-bulb fs-5 align-middle me-1"></i>
                        <strong>Gợi ý kinh doanh:</strong> Tour du thuyền Hạ Long và Bà Nà Hills đang đóng góp 70% doanh thu. Nên mở thêm các gói combo VIP vào cuối tuần.
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Tours Table -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
                <div>
                    <h5 class="fw-bold text-dark mb-1"><i class="bx bx-trophy text-warning me-2"></i>Top Tuyến Tour Doanh Thu Cao Nhất</h5>
                    <small class="text-muted">Dữ liệu được cập nhật tự động theo thời gian thực</small>
                </div>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control form-control-sm" style="width: 200px;" placeholder="Lọc theo tên tour..." v-model="searchTour">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small">
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th width="30%">Tên Tour Tuyến</th>
                            <th class="text-center" width="12%">Số Đơn Đặt</th>
                            <th class="text-center" width="12%">Khách Đi</th>
                            <th class="text-end" width="15%">Tổng Doanh Thu</th>
                            <th class="text-center" width="13%">Tỷ Lệ Lấp Chỗ</th>
                            <th class="text-center" width="13%">Đánh Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(t, index) in topTours" :key="t.name">
                            <td class="text-center fw-bold">{{ index + 1 }}</td>
                            <td>
                                <strong class="text-dark">{{ t.name }}</strong>
                                <small class="text-muted d-block">Mã: <code>{{ t.code }}</code></small>
                            </td>
                            <td class="text-center"><span class="badge bg-light text-dark">{{ t.orders }} đơn</span></td>
                            <td class="text-center">{{ t.guests }} khách</td>
                            <td class="text-end fw-bold text-pink">{{ t.revenue }} đ</td>
                            <td class="text-center">
                                <span class="badge bg-success-subtle text-success">{{ t.occupancy }}%</span>
                            </td>
                            <td class="text-center text-warning fw-bold">{{ t.rating }} ★</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DoiTacThongKe',
    data() {
        return {
            selectedPeriod: '10-2026',
            searchTour: '',
            kpis: [
                { title: 'DOANH THU THÁNG', value: '485.6M đ', trend: '+18.5%', icon: 'bx bx-dollar-circle' },
                { title: 'TỔNG LƯỢT KHÁCH', value: '624 khách', trend: '+14.2%', icon: 'bx bx-group' },
                { title: 'TỶ LỆ LẤP CHỖ', value: '92.4%', trend: '+5.1%', icon: 'bx bx-check-double' },
                { title: 'ĐÁNH GIÁ TRUNG BÌNH', value: '4.85 / 5 ★', trend: '+0.2', icon: 'bx bx-star' }
            ],
            chartData: [
                { month: 'T5', amount: 320, percent: 55 },
                { month: 'T6', amount: 410, percent: 70 },
                { month: 'T7', amount: 490, percent: 85 },
                { month: 'T8', amount: 530, percent: 92 },
                { month: 'T9', amount: 440, percent: 76 },
                { month: 'T10', amount: 485, percent: 82 }
            ],
            categories: [
                { name: 'Du Thuyền & Nghỉ Dưỡng 5*', percentage: 45, amount: 218 },
                { name: 'Tour Khám Phá & Trải Nghiệm', percentage: 32, amount: 155 },
                { name: 'Vé Cáp Treo & Dịch Vụ Buffet', percentage: 15, amount: 72 },
                { name: 'Thuê Xe VIP & Hướng Dẫn Viên', percentage: 8, amount: 38 }
            ],
            topTours: [
                { name: 'Du Thuyền Hạ Long 5 Sao 2N1Đ', code: 'HL-01', orders: 48, guests: 124, revenue: '218.500.000', occupancy: 95, rating: 4.9 },
                { name: 'Tour Tràng An Bái Đính 1N VIP', code: 'TA-02', orders: 36, guests: 142, revenue: '124.200.000', occupancy: 92, rating: 4.8 },
                { name: 'Tour Phú Quốc Sunset 4N3Đ Trọn Gói', code: 'PQ-03', orders: 22, guests: 88, revenue: '98.400.000', occupancy: 88, rating: 4.9 },
                { name: 'Thuê xe máy phượt & Trekking Fansipan', code: 'SP-04', orders: 36, guests: 72, revenue: '44.500.000', occupancy: 85, rating: 4.7 }
            ]
        }
    },
    methods: {
        xuatBaoCao() {
            alert('Đang trích xuất file báo cáo kinh doanh PDF...');
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
.btn-outline-pink {
    border: 1px solid #fecdd3;
    color: #e11d48;
    background-color: #ffffff;
}
.btn-outline-pink:hover {
    background-color: #fff1f2;
    border-color: #e11d48;
    color: #be123c;
}
.border-start-pink {
    border-left: 3px solid #e11d48;
}
.kpi-icon-circle {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.15rem;
}
.bar-col {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100%;
    justify-content: flex-end;
}
.bar-pill-outer {
    width: 28px;
    height: 160px;
    background-color: #f1f5f9;
    border-radius: 999px;
    display: flex;
    align-items: flex-end;
    overflow: hidden;
}
.bar-pill-inner {
    width: 100%;
    background: linear-gradient(180deg, #f43f5e 0%, #e11d48 100%);
    border-radius: 999px;
    transition: height 0.6s ease;
}
</style>
