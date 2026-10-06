<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-purchase-tag me-1 font-22 text-warning"></i>
                            <span class="h5 mb-0 text-warning fw-bold">Quản Lý Voucher Đối Tác</span>
                        </div>
                        <button class="btn btn-warning btn-sm px-3"><i class="bx bx-plus"></i> Tạo Voucher Mới</button>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="15%">Mã Voucher</th>
                                    <th width="25%">Tên Chương Trình</th>
                                    <th class="text-center" width="12%">Giảm Giá</th>
                                    <th class="text-center" width="12%">Đã Dùng</th>
                                    <th class="text-center" width="13%">Hiệu Lực</th>
                                    <th class="text-center" width="10%">Trạng Thái</th>
                                    <th class="text-center" width="10%">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(v, i) in vouchers" :key="v.id">
                                    <td class="text-center fw-bold">{{ i + 1 }}</td>
                                    <td><code class="text-warning fw-bold">{{ v.ma }}</code></td>
                                    <td class="fw-bold">{{ v.ten }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-light-warning text-warning fw-bold">{{ v.giam }}{{ v.kieu === 'percent' ? '%' : 'đ' }}</span>
                                    </td>
                                    <td class="text-center">{{ v.da_dung }}/{{ v.so_luong }}</td>
                                    <td class="text-center">{{ v.han }}</td>
                                    <td class="text-center">
                                        <span v-if="v.active" class="badge bg-success">Đang chạy</span>
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
    name: 'DoiTacVoucher',
    data() {
        return {
            vouchers: [
                { id: 1, ma: 'BANA10', ten: 'Giảm 10% tour Bà Nà Hills', giam: 10, kieu: 'percent', so_luong: 100, da_dung: 42, han: '31/12/2026', active: true },
                { id: 2, ma: 'HOIAN50K', ten: 'Giảm 50.000đ tour Hội An', giam: 50000, kieu: 'fixed', so_luong: 50, da_dung: 50, han: '30/09/2026', active: false },
                { id: 3, ma: 'BIEN15', ten: 'Khuyến mãi tour biển đảo', giam: 15, kieu: 'percent', so_luong: 80, da_dung: 23, han: '30/11/2026', active: true }
            ]
        }
    }
}
</script>
