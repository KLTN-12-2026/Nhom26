<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-bar-chart-alt-2 me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Thống Kê & Báo Cáo Tổng Quan</span>
                        </div>
                        <div class="d-flex gap-2">
                            <select class="form-select form-select-sm" style="width:auto">
                                <option>Tháng 10/2026</option>
                                <option>Tháng 09/2026</option>
                                <option>Tháng 08/2026</option>
                            </select>
                            <button class="btn btn-danger btn-sm"><i class="bx bx-export"></i> Xuất PDF</button>
                        </div>
                    </div>
                    <hr>
                    <!-- KPI Cards -->
                    <div class="row row-cols-2 row-cols-md-4 g-3 mb-4">
                        <div class="col" v-for="kpi in kpis" :key="kpi.title">
                            <div class="card radius-10 mb-0" :class="'border-start border-0 border-3 ' + kpi.border">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary small">{{ kpi.title }}</p>
                                            <h5 class="my-1 fw-bold" :class="kpi.color">{{ kpi.value }}</h5>
                                            <p class="mb-0 font-13" :class="kpi.trend > 0 ? 'text-success' : 'text-danger'">
                                                <i :class="kpi.trend > 0 ? 'bx bxs-up-arrow' : 'bx bxs-down-arrow'" class="align-middle"></i>
                                                {{ Math.abs(kpi.trend) }}% so với tháng trước
                                            </p>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle ms-auto" :class="kpi.bgIcon + ' ' + kpi.color">
                                            <i :class="kpi.icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Top Tour -->
                    <h6 class="fw-bold mb-3"><i class="bx bx-trophy me-2 text-warning"></i>Top 5 Tour Bán Chạy Tháng Này</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">Hạng</th>
                                    <th width="40%">Tên Tour</th>
                                    <th width="20%">Đối Tác</th>
                                    <th class="text-center" width="15%">Lượt Đặt</th>
                                    <th class="text-end" width="20%">Doanh Thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tour, i) in topTours" :key="tour.id">
                                    <td class="text-center">
                                        <span v-if="i===0" class="badge bg-warning text-dark fw-bold px-3">🥇 1</span>
                                        <span v-else-if="i===1" class="badge bg-secondary fw-bold px-3">🥈 2</span>
                                        <span v-else-if="i===2" class="badge" style="background:#cd7f32" >🥉 3</span>
                                        <span v-else class="fw-bold text-muted">{{ i + 1 }}</span>
                                    </td>
                                    <td class="fw-bold">{{ tour.ten_tour }}</td>
                                    <td class="text-muted">{{ tour.doi_tac }}</td>
                                    <td class="text-center"><span class="badge bg-light-primary text-primary">{{ tour.luot_dat }} lượt</span></td>
                                    <td class="text-end text-success fw-bold">{{ tour.doanh_thu.toLocaleString() }} đ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'AdminThongKe',
    data() {
        return {
            kpis: [
                { title: 'Tổng Doanh Thu', value: '1.28 tỷ đ', trend: 15.8, border: 'border-success', color: 'text-success', bgIcon: 'bg-light-success', icon: 'bx bxs-dollar-circle' },
                { title: 'Tổng Đơn Đặt Tour', value: '1.842 đơn', trend: 12.3, border: 'border-primary', color: 'text-primary', bgIcon: 'bg-light-primary', icon: 'bx bxs-cart' },
                { title: 'Khách Hàng Mới', value: '180 người', trend: 8.5, border: 'border-info', color: 'text-info', bgIcon: 'bg-light-info', icon: 'bx bxs-user-plus' },
                { title: 'Đối Tác Hoạt Động', value: '43 đối tác', trend: -2.1, border: 'border-warning', color: 'text-warning', bgIcon: 'bg-light-warning', icon: 'bx bxs-briefcase' }
            ],
            topTours: [
                { id: 1, ten_tour: 'Bà Nà Hills - Cầu Vàng Tiên Cảnh', doi_tac: 'Vietravel MT', luot_dat: 284, doanh_thu: 355000000 },
                { id: 2, ten_tour: 'Ngũ Hành Sơn - Phố Cổ Hội An', doi_tac: 'Saigontourist ĐN', luot_dat: 215, doanh_thu: 182750000 },
                { id: 3, ten_tour: 'Lặn Ngắm San Hô Cù Lao Chàm', doi_tac: 'Bà Nà Eco', luot_dat: 178, doanh_thu: 115700000 },
                { id: 4, ten_tour: 'Du Thuyền Ngắm Bình Minh Sông Hàn', doi_tac: 'Heritage DN', luot_dat: 134, doanh_thu: 80400000 },
                { id: 5, ten_tour: 'Khám Phá Sơn Trà - Chùa Linh Ứng', doi_tac: 'Saigontourist ĐN', luot_dat: 112, doanh_thu: 67200000 }
            ]
        }
    }
}
</script>
