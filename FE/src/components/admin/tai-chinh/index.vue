<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-dollar-circle me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Quản Lý Tài Chính & Đối Soát Hoa Hồng</span>
                        </div>
                        <button class="btn btn-outline-secondary btn-sm"><i class="bx bx-export"></i> Xuất Báo Cáo</button>
                    </div>
                    <hr>
                    <!-- Tổng quan tài chính -->
                    <div class="row row-cols-1 row-cols-md-4 g-3 mb-4">
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-success mb-0">
                                <div class="card-body">
                                    <p class="mb-0 text-secondary">Tổng Doanh Thu Sàn</p>
                                    <h4 class="my-1 text-success fw-bold">1.280.000.000 đ</h4>
                                    <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i> +15.8% tháng này</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-info mb-0">
                                <div class="card-body">
                                    <p class="mb-0 text-secondary">Hoa Hồng Thu Về</p>
                                    <h4 class="my-1 text-info fw-bold">128.000.000 đ</h4>
                                    <p class="mb-0 font-13 text-muted">Tỉ lệ bình quân 10%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-warning mb-0">
                                <div class="card-body">
                                    <p class="mb-0 text-secondary">Đã Thanh Toán Đối Tác</p>
                                    <h4 class="my-1 text-warning fw-bold">1.152.000.000 đ</h4>
                                    <p class="mb-0 font-13 text-muted">Tháng 09/2026</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-danger mb-0">
                                <div class="card-body">
                                    <p class="mb-0 text-secondary">Chờ Đối Soát</p>
                                    <h4 class="my-1 text-danger fw-bold">48.000.000 đ</h4>
                                    <p class="mb-0 font-13 text-danger"><i class="bx bx-time-five align-middle"></i> 5 giao dịch pending</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bảng giao dịch đối soát -->
                    <h6 class="fw-bold mb-3"><i class="bx bx-transfer me-2 text-danger"></i>Lịch Sử Giao Dịch Đối Soát</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="20%">Đối Tác</th>
                                    <th width="20%">Kỳ Đối Soát</th>
                                    <th class="text-end" width="15%">Doanh Thu</th>
                                    <th class="text-end" width="15%">Hoa Hồng (10%)</th>
                                    <th class="text-end" width="15%">Thực Nhận</th>
                                    <th class="text-center" width="10%">Trạng Thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tx, index) in transactions" :key="tx.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td class="fw-bold">{{ tx.doi_tac }}</td>
                                    <td>{{ tx.ky }}</td>
                                    <td class="text-end fw-bold">{{ tx.doanh_thu.toLocaleString() }} đ</td>
                                    <td class="text-end text-danger">{{ Math.round(tx.doanh_thu * 0.1).toLocaleString() }} đ</td>
                                    <td class="text-end text-success fw-bold">{{ Math.round(tx.doanh_thu * 0.9).toLocaleString() }} đ</td>
                                    <td class="text-center">
                                        <span v-if="tx.trang_thai === 'done'" class="badge bg-success">Đã thanh toán</span>
                                        <span v-else class="badge bg-warning text-dark">Chờ đối soát</span>
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
    name: 'AdminTaiChinh',
    data() {
        return {
            transactions: [
                { id: 1, doi_tac: 'Saigontourist Đà Nẵng', ky: 'Tháng 09/2026', doanh_thu: 450000000, trang_thai: 'done' },
                { id: 2, doi_tac: 'Vietravel Miền Trung', ky: 'Tháng 09/2026', doanh_thu: 380000000, trang_thai: 'done' },
                { id: 3, doi_tac: 'Bà Nà Eco Travel', ky: 'Tháng 09/2026', doanh_thu: 120000000, trang_thai: 'pending' },
                { id: 4, doi_tac: 'Du Thuyền Sông Hàn Heritage', ky: 'Tháng 09/2026', doanh_thu: 80000000, trang_thai: 'pending' }
            ]
        }
    }
}
</script>
