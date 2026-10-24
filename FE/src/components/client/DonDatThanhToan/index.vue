<template>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold text-dark mb-1">
                    <i class="bx bx-receipt text-primary me-2"></i>Đơn Đặt & Thanh Toán
                </h4>
                <p class="text-muted small mb-0">Theo dõi trạng thái các đơn đặt tour, vé tham quan, hóa đơn và lịch sử thanh toán trực tuyến.</p>
            </div>
            <div class="input-group" style="max-width: 280px;">
                <span class="input-group-text bg-white border-end-0"><i class="bx bx-search text-muted"></i></span>
                <input type="text" class="form-control border-start-0 ps-0" placeholder="Mã đơn, dịch vụ..." v-model="key_search">
            </div>
        </div>

        <!-- Bộ lọc tab trạng thái -->
        <ul class="nav nav-pills mb-3 gap-2">
            <li class="nav-item">
                <button class="nav-link rounded-pill px-3 py-1 font-12" :class="{ 'active': filter_status === 'all' }" @click="filter_status = 'all'">Tất cả</button>
            </li>
            <li class="nav-item">
                <button class="nav-link rounded-pill px-3 py-1 font-12" :class="{ 'active': filter_status === 'da_thanh_toan' }" @click="filter_status = 'da_thanh_toan'">Đã thanh toán</button>
            </li>
            <li class="nav-item">
                <button class="nav-link rounded-pill px-3 py-1 font-12" :class="{ 'active': filter_status === 'cho_thanh_toan' }" @click="filter_status = 'cho_thanh_toan'">Chờ thanh toán</button>
            </li>
        </ul>

        <!-- Bảng danh sách đơn hàng -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 60px;">#</th>
                        <th>Mã đơn hàng</th>
                        <th>Dịch vụ / Tour</th>
                        <th>Ngày đặt</th>
                        <th>Số lượng vé</th>
                        <th>Tổng tiền</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center" style="width: 140px;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in list_don_loc" :key="item.id || index">
                        <td class="text-center fw-bold text-muted">{{ index + 1 }}</td>
                        <td><span class="badge bg-light text-primary border font-monospace">{{ item.ma_don }}</span></td>
                        <td>
                            <div class="fw-bold text-dark">{{ item.ten_dich_vu }}</div>
                            <small class="text-muted">{{ item.loai_dich_vu }}</small>
                        </td>
                        <td><small class="text-secondary">{{ item.ngay_dat }}</small></td>
                        <td>{{ item.so_luong }} khách</td>
                        <td class="fw-bold text-danger">{{ formatVND(item.tong_tien) }}</td>
                        <td class="text-center">
                            <span :class="item.tinh_trang == 1 ? 'badge bg-success' : 'badge bg-warning text-dark'">
                                {{ item.tinh_trang == 1 ? 'Đã thanh toán' : 'Chờ thanh toán' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" @click="xemChiTiet(item)">
                                Chi tiết
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DonDatThanhToanComponent',
    data() {
        return {
            list_don: [
                {
                    id: 1,
                    ma_don: 'ORD-2026-8812',
                    ten_dich_vu: 'Tour Bà Nà Hills - Cầu Vàng (Vé cáp treo + Buffet)',
                    loai_dich_vu: 'Tour trọn gói 1 ngày',
                    ngay_dat: '15/06/2026',
                    so_luong: 2,
                    tong_tien: 2450000,
                    tinh_trang: 1
                },
                {
                    id: 2,
                    ma_don: 'ORD-2026-9041',
                    ten_dich_vu: 'Vé du thuyền ngắm Cầu Rồng phun lửa trên sông Hàn',
                    loai_dich_vu: 'Vé dịch vụ tham quan',
                    ngay_dat: '16/06/2026',
                    so_luong: 2,
                    tong_tien: 400000,
                    tinh_trang: 0
                }
            ],
            filter_status: 'all',
            key_search: ''
        };
    },
    computed: {
        list_don_loc() {
            let res = this.list_don;
            if (this.filter_status === 'da_thanh_toan') res = res.filter(x => x.tinh_trang == 1);
            if (this.filter_status === 'cho_thanh_toan') res = res.filter(x => x.tinh_trang == 0);
            if (this.key_search) {
                const s = this.key_search.toLowerCase().trim();
                res = res.filter(x => x.ma_don.toLowerCase().includes(s) || x.ten_dich_vu.toLowerCase().includes(s));
            }
            return res;
        }
    },
    methods: {
        formatVND(value) {
            if (!value) return '0 đ';
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
        },
        xemChiTiet(item) {
            if (this.$toast) {
                this.$toast.success('Đang mở chi tiết hóa đơn ' + item.ma_don);
            }
        }
    }
};
</script>

<style scoped>
.font-12 {
    font-size: 12px;
}
</style>
