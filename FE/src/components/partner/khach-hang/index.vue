<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-group me-1 font-22 text-warning"></i>
                            <span class="h5 mb-0 text-warning fw-bold">Quản Lý Khách Hàng Đã Đặt Tour</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" v-model="searchQuery" placeholder="Tìm theo tên, email...">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="25%">Khách Hàng</th>
                                    <th width="20%">Tour Đã Đặt</th>
                                    <th class="text-center" width="10%">Số Lần Đặt</th>
                                    <th class="text-end" width="18%">Tổng Chi Tiêu</th>
                                    <th class="text-center" width="12%">Đánh Giá TB</th>
                                    <th class="text-center" width="10%">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(kh, i) in filteredCustomers" :key="kh.id">
                                    <td class="text-center fw-bold">{{ i + 1 }}</td>
                                    <td>
                                        <div class="fw-bold">{{ kh.ho_ten }}</div>
                                        <small class="text-muted">{{ kh.email }}</small>
                                    </td>
                                    <td class="text-muted">{{ kh.tour_cuoi }}</td>
                                    <td class="text-center"><span class="badge bg-light-primary text-primary">{{ kh.so_lan }} lần</span></td>
                                    <td class="text-end text-success fw-bold">{{ kh.tong.toLocaleString() }} đ</td>
                                    <td class="text-center text-warning">{{ '★'.repeat(Math.round(kh.rating)) }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-info btn-sm" title="Xem chi tiết đơn"><i class="bx bx-show"></i></button>
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
    name: 'DoiTacKhachHang',
    data() {
        return {
            searchQuery: '',
            customers: [
                { id: 1, ho_ten: 'Nguyễn Văn An', email: 'an.nguyen@gmail.com', tour_cuoi: 'Bà Nà Hills', so_lan: 3, tong: 3750000, rating: 5 },
                { id: 2, ho_ten: 'Trần Thị Mai', email: 'mai.tran@gmail.com', tour_cuoi: 'Ngũ Hành Sơn', so_lan: 2, tong: 1700000, rating: 4 },
                { id: 3, ho_ten: 'Phạm Thu Hà', email: 'ha.pham@gmail.com', tour_cuoi: 'Cù Lao Chàm', so_lan: 4, tong: 5200000, rating: 5 }
            ]
        }
    },
    computed: {
        filteredCustomers() {
            return this.customers.filter(k =>
                k.ho_ten.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                k.email.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        }
    }
}
</script>
