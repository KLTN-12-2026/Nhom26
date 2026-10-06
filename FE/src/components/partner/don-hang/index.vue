<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-receipt me-1 font-22 text-warning"></i>
                            <span class="h5 mb-0 text-warning fw-bold">Quản Lý Đơn Hàng / Khách Đặt Tour</span>
                        </div>
                        <span class="badge bg-warning text-dark px-3 py-2">Tổng 158 đơn</span>
                    </div>
                    <hr>
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item"><button class="nav-link" :class="{ active: tab === 'all' }" @click="tab = 'all'">Tất Cả</button></li>
                        <li class="nav-item"><button class="nav-link" :class="{ active: tab === 'pending' }" @click="tab = 'pending'">Chờ Xác Nhận <span class="badge bg-warning text-dark ms-1">4</span></button></li>
                        <li class="nav-item"><button class="nav-link" :class="{ active: tab === 'confirmed' }" @click="tab = 'confirmed'">Đã Xác Nhận</button></li>
                        <li class="nav-item"><button class="nav-link" :class="{ active: tab === 'completed' }" @click="tab = 'completed'">Hoàn Thành</button></li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="12%">Mã Đơn</th>
                                    <th width="22%">Tên Tour</th>
                                    <th width="18%">Khách Hàng</th>
                                    <th class="text-center" width="8%">Số KH</th>
                                    <th class="text-end" width="13%">Tổng Tiền</th>
                                    <th class="text-center" width="10%">Ngày Đặt</th>
                                    <th class="text-center" width="12%">Trạng Thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(don, i) in filteredOrders" :key="don.id">
                                    <td class="text-center fw-bold">{{ i + 1 }}</td>
                                    <td><code class="text-warning fw-bold">{{ don.ma_don }}</code></td>
                                    <td class="fw-bold">{{ don.ten_tour }}</td>
                                    <td>{{ don.khach_hang }}</td>
                                    <td class="text-center"><span class="badge bg-light-primary text-primary">{{ don.so_kh }} người</span></td>
                                    <td class="text-end text-success fw-bold">{{ don.tong_tien.toLocaleString() }} đ</td>
                                    <td class="text-center">{{ don.ngay }}</td>
                                    <td class="text-center">
                                        <span v-if="don.trang_thai === 'pending'" class="badge bg-warning text-dark">Chờ xác nhận</span>
                                        <span v-else-if="don.trang_thai === 'confirmed'" class="badge bg-info">Đã xác nhận</span>
                                        <span v-else class="badge bg-success">Hoàn thành</span>
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
    name: 'DoiTacDonHang',
    data() {
        return {
            tab: 'all',
            orders: [
                { id: 1, ma_don: 'DH-0001', ten_tour: 'Bà Nà Hills - Cầu Vàng', khach_hang: 'Nguyễn Văn An', so_kh: 2, tong_tien: 2500000, ngay: '06/10/2026', trang_thai: 'pending' },
                { id: 2, ma_don: 'DH-0002', ten_tour: 'Ngũ Hành Sơn - Hội An', khach_hang: 'Trần Thị Mai', so_kh: 3, tong_tien: 2550000, ngay: '05/10/2026', trang_thai: 'confirmed' },
                { id: 3, ma_don: 'DH-0003', ten_tour: 'Lặn San Hô Cù Lao Chàm', khach_hang: 'Lê Hoàng Nam', so_kh: 4, tong_tien: 2600000, ngay: '04/10/2026', trang_thai: 'completed' },
                { id: 4, ma_don: 'DH-0004', ten_tour: 'Cố Đô Huế 2N1Đ', khach_hang: 'Phạm Thu Hà', so_kh: 2, tong_tien: 3700000, ngay: '03/10/2026', trang_thai: 'pending' }
            ]
        }
    },
    computed: {
        filteredOrders() {
            if (this.tab === 'all') return this.orders;
            return this.orders.filter(o => o.trang_thai === this.tab);
        }
    }
}
</script>
