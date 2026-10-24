<template>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold text-dark mb-1">
                    <i class="bx bx-history text-secondary me-2"></i>Lịch Sử Kế Hoạch
                </h4>
                <p class="text-muted small mb-0">Quản lý các bản ghi kế hoạch du lịch Đà Nẵng đã tạo từ bảng <code>lich_trinh</code>.</p>
            </div>
            <div class="input-group" style="max-width: 280px;">
                <span class="input-group-text bg-white border-end-0"><i class="bx bx-search text-muted"></i></span>
                <input type="text" class="form-control border-start-0 ps-0" placeholder="Tìm kiếm kế hoạch..." v-model="key_search">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 60px;">#</th>
                        <th>Mã kế hoạch</th>
                        <th>Tên kế hoạch</th>
                        <th>Thời gian</th>
                        <th>Ngân sách</th>
                        <th class="text-center">Số POI</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center" style="width: 140px;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in list_ke_hoach_loc" :key="item.id || index">
                        <td class="text-center fw-bold text-muted">{{ index + 1 }}</td>
                        <td><span class="badge bg-light text-primary border font-monospace">{{ item.ma_ke_hoach }}</span></td>
                        <td>
                            <div class="fw-bold text-dark">{{ item.ten_ke_hoach }}</div>
                            <small class="text-muted">{{ item.ghi_chu }}</small>
                        </td>
                        <td><small class="text-secondary">{{ item.tu_ngay }} đến {{ item.den_ngay }}</small></td>
                        <td class="fw-bold text-danger">{{ formatVND(item.ngan_sach) }}</td>
                        <td class="text-center"><span class="badge bg-info-subtle text-info">{{ item.so_poi }} điểm</span></td>
                        <td class="text-center">
                            <span :class="item.tinh_trang == 1 ? 'badge bg-success' : 'badge bg-secondary'">
                                {{ item.tinh_trang == 1 ? 'Đã hoàn thành' : 'Đang lập' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <router-link to="/client/lich-trinh-toi-uu" class="btn btn-outline-primary" title="Xem chi tiết">
                                    <i class="bx bx-show"></i>
                                </router-link>
                                <button type="button" class="btn btn-outline-danger" @click="xoaKeHoach(item.id)" title="Xóa">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: 'LichSuKeHoachComponent',
    data() {
        return {
            list_ke_hoach: [
                {
                    id: 1,
                    ma_ke_hoach: 'KH-DN-2026-001',
                    ten_ke_hoach: 'Chuyến đi 3N2Đ cùng gia đình hè 2026',
                    tu_ngay: '16/06/2026',
                    den_ngay: '18/06/2026',
                    ngan_sach: 5000000,
                    so_poi: 8,
                    ghi_chu: 'Tham quan Bà Nà Hills, Sơn Trà, Biển Mỹ Khê',
                    tinh_trang: 1
                },
                {
                    id: 2,
                    ma_ke_hoach: 'KH-DN-2026-002',
                    ten_ke_hoach: 'Check-in biển và ẩm thực Đà Nẵng',
                    tu_ngay: '01/05/2026',
                    den_ngay: '03/05/2026',
                    ngan_sach: 3500000,
                    so_poi: 6,
                    ghi_chu: 'Ưu tiên ẩm thực hải sản và chợ đêm',
                    tinh_trang: 1
                }
            ],
            key_search: ''
        };
    },
    computed: {
        list_ke_hoach_loc() {
            if (!this.key_search) return this.list_ke_hoach;
            const s = this.key_search.toLowerCase().trim();
            return this.list_ke_hoach.filter(x =>
                x.ten_ke_hoach.toLowerCase().includes(s) || x.ma_ke_hoach.toLowerCase().includes(s)
            );
        }
    },
    methods: {
        formatVND(value) {
            if (!value) return '0 đ';
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
        },
        xoaKeHoach(id) {
            this.list_ke_hoach = this.list_ke_hoach.filter(x => x.id !== id);
            if (this.$toast) {
                this.$toast.success('Đã xóa kế hoạch khỏi lịch sử!');
            }
        }
    }
};
</script>

<style></style>
