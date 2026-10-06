<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-line-chart me-1 font-22 text-warning"></i>
                            <span class="h5 mb-0 text-warning fw-bold">Thống Kê Kinh Doanh</span>
                        </div>
                        <select class="form-select form-select-sm" style="width:auto">
                            <option>Tháng 10/2026</option>
                            <option>Tháng 09/2026</option>
                        </select>
                    </div>
                    <hr>
                    <div class="row row-cols-2 row-cols-md-4 g-3 mb-4">
                        <div class="col" v-for="kpi in kpis" :key="kpi.title">
                            <div class="card radius-10 mb-0" :class="'border-start border-0 border-3 ' + kpi.border">
                                <div class="card-body">
                                    <p class="mb-0 text-secondary small">{{ kpi.title }}</p>
                                    <h5 class="my-1 fw-bold" :class="kpi.color">{{ kpi.value }}</h5>
                                    <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i> {{ kpi.trend }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="fw-bold mb-3"><i class="bx bx-trophy me-2 text-warning"></i>Top Tour Theo Doanh Thu</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="40%">Tên Tour</th>
                                    <th class="text-center" width="15%">Lượt Đặt</th>
                                    <th class="text-end" width="20%">Doanh Thu</th>
                                    <th class="text-center" width="20%">Tỷ Lệ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tour, i) in topTours" :key="tour.id">
                                    <td class="text-center fw-bold">{{ i + 1 }}</td>
                                    <td class="fw-bold">{{ tour.ten }}</td>
                                    <td class="text-center">{{ tour.luot }}</td>
                                    <td class="text-end text-success fw-bold">{{ tour.dt.toLocaleString() }} đ</td>
                                    <td>
                                        <div class="progress" style="height:8px">
                                            <div class="progress-bar bg-warning" :style="'width:' + tour.pct + '%'"></div>
                                        </div>
                                        <small class="text-muted">{{ tour.pct }}%</small>
                                    </td>
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
    name: 'DoiTacThongKe',
    data() {
        return {
            kpis: [
                { title: 'Doanh Thu Tháng', value: '450 triệu đ', trend: '+18.2%', border: 'border-success', color: 'text-success' },
                { title: 'Tổng Đơn Đặt', value: '158 đơn', trend: '+12.3%', border: 'border-primary', color: 'text-primary' },
                { title: 'Đánh Giá TB', value: '4.7 / 5 ★', trend: '+0.2 điểm', border: 'border-warning', color: 'text-warning' },
                { title: 'Tour Đang Bán', value: '4 tour', trend: '2 lịch mới', border: 'border-info', color: 'text-info' }
            ],
            topTours: [
                { id: 1, ten: 'Bà Nà Hills - Cầu Vàng', luot: 284, dt: 355000000, pct: 100 },
                { id: 2, ten: 'Ngũ Hành Sơn - Hội An', luot: 215, dt: 182750000, pct: 51 },
                { id: 3, ten: 'Lặn San Hô Cù Lao Chàm', luot: 178, dt: 115700000, pct: 33 },
                { id: 4, ten: 'Cố Đô Huế 2N1Đ', luot: 86, dt: 59150000, pct: 17 }
            ]
        }
    }
}
</script>
