<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-wallet me-1 font-22 text-warning"></i>
                            <span class="h5 mb-0 text-warning fw-bold">Quản Lý Thanh Toán & Doanh Thu</span>
                        </div>
                        <button class="btn btn-outline-secondary btn-sm"><i class="bx bx-export"></i> Xuất Sao Kê</button>
                    </div>
                    <hr>
                    <div class="row row-cols-1 row-cols-md-3 g-3 mb-4">
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-success mb-0">
                                <div class="card-body">
                                    <p class="mb-0 text-secondary">Doanh Thu Tháng Này</p>
                                    <h4 class="my-1 text-success fw-bold">450.000.000 đ</h4>
                                    <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i> +18.2% tháng trước</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-warning mb-0">
                                <div class="card-body">
                                    <p class="mb-0 text-secondary">Hoa Hồng Nền Tảng</p>
                                    <h4 class="my-1 text-warning fw-bold">45.000.000 đ</h4>
                                    <p class="mb-0 font-13 text-muted">Tỷ lệ 10% trên doanh thu</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-info mb-0">
                                <div class="card-body">
                                    <p class="mb-0 text-secondary">Thực Nhận</p>
                                    <h4 class="my-1 text-info fw-bold">405.000.000 đ</h4>
                                    <p class="mb-0 font-13 text-muted">Sau khi trừ hoa hồng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="fw-bold mb-3"><i class="bx bx-list-ul me-2 text-warning"></i>Lịch Sử Thanh Toán</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="20%">Mã Giao Dịch</th>
                                    <th width="20%">Tour / Dịch Vụ</th>
                                    <th width="15%">Khách Hàng</th>
                                    <th class="text-end" width="15%">Số Tiền</th>
                                    <th class="text-center" width="12%">Ngày GD</th>
                                    <th class="text-center" width="13%">Phương Thức</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tx, i) in transactions" :key="tx.id">
                                    <td class="text-center fw-bold">{{ i + 1 }}</td>
                                    <td><code>{{ tx.ma_gd }}</code></td>
                                    <td>{{ tx.ten_tour }}</td>
                                    <td>{{ tx.khach_hang }}</td>
                                    <td class="text-end text-success fw-bold">{{ tx.so_tien.toLocaleString() }} đ</td>
                                    <td class="text-center">{{ tx.ngay }}</td>
                                    <td class="text-center"><span class="badge bg-light-info text-info">{{ tx.phuong_thuc }}</span></td>
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
    name: 'DoiTacThanhToan',
    data() {
        return {
            transactions: [
                { id: 1, ma_gd: 'GD-2026100601', ten_tour: 'Bà Nà Hills', khach_hang: 'Nguyễn Văn An', so_tien: 1250000, ngay: '06/10/2026', phuong_thuc: 'VNPay' },
                { id: 2, ma_gd: 'GD-2026100602', ten_tour: 'Ngũ Hành Sơn', khach_hang: 'Trần Thị Mai', so_tien: 850000, ngay: '05/10/2026', phuong_thuc: 'MoMo' },
                { id: 3, ma_gd: 'GD-2026100603', ten_tour: 'Cù Lao Chàm', khach_hang: 'Lê Hoàng Nam', so_tien: 1300000, ngay: '04/10/2026', phuong_thuc: 'Banking' }
            ]
        }
    }
}
</script>
