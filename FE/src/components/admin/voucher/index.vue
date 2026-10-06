<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-gift me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Quản Lý Voucher & Mã Giảm Giá Admin</span>
                        </div>
                        <button class="btn btn-danger btn-sm px-3"><i class="bx bx-plus"></i> Tạo Voucher Mới</button>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="15%">Mã Voucher</th>
                                    <th width="20%">Tên Chương Trình</th>
                                    <th class="text-center" width="12%">Giảm Giá</th>
                                    <th class="text-center" width="10%">Số Lượng</th>
                                    <th class="text-center" width="10%">Đã Dùng</th>
                                    <th class="text-center" width="13%">Hiệu Lực Đến</th>
                                    <th class="text-center" width="10%">Trạng Thái</th>
                                    <th class="text-center" width="10%">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(v, index) in vouchers" :key="v.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td><code class="text-danger fw-bold fs-6">{{ v.ma }}</code></td>
                                    <td class="fw-bold">{{ v.ten }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-warning text-dark fw-bold fs-6">{{ v.giam_gia }}{{ v.kieu === 'percent' ? '%' : ' đ' }}</span>
                                    </td>
                                    <td class="text-center">{{ v.so_luong }}</td>
                                    <td class="text-center">
                                        <div class="progress" style="height:6px">
                                            <div class="progress-bar bg-danger" :style="'width:' + (v.da_dung/v.so_luong*100) + '%'"></div>
                                        </div>
                                        <small>{{ v.da_dung }}/{{ v.so_luong }}</small>
                                    </td>
                                    <td class="text-center">{{ v.han_dung }}</td>
                                    <td class="text-center">
                                        <span v-if="v.trang_thai" class="badge bg-success">Đang chạy</span>
                                        <span v-else class="badge bg-secondary">Hết hạn</span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-warning btn-sm me-1"><i class="bx bx-edit"></i></button>
                                        <button class="btn btn-outline-danger btn-sm"><i class="bx bx-trash"></i></button>
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
    name: 'AdminVoucher',
    data() {
        return {
            vouchers: [
                { id: 1, ma: 'HELLO2026', ten: 'Chào mừng khách hàng mới', giam_gia: 20, kieu: 'percent', so_luong: 500, da_dung: 312, han_dung: '31/12/2026', trang_thai: true },
                { id: 2, ma: 'SUMMER50K', ten: 'Ưu đãi hè rực rỡ', giam_gia: 50000, kieu: 'fixed', so_luong: 200, da_dung: 178, han_dung: '31/10/2026', trang_thai: true },
                { id: 3, ma: 'TRIP30OFF', ten: 'Giảm 30% tất cả tour biển', giam_gia: 30, kieu: 'percent', so_luong: 100, da_dung: 100, han_dung: '30/09/2026', trang_thai: false },
                { id: 4, ma: 'VIPCLUB', ten: 'Dành cho thành viên VIP', giam_gia: 15, kieu: 'percent', so_luong: 300, da_dung: 45, han_dung: '31/12/2026', trang_thai: true }
            ]
        }
    }
}
</script>
