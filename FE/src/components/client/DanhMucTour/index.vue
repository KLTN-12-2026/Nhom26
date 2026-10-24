<template>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold text-dark mb-1">
                    <i class="bx bx-layer text-warning me-2"></i>Danh Mục Tour & So Sánh
                </h4>
                <p class="text-muted small mb-0">Xem danh sách các gói tour Đà Nẵng trọn gói, so sánh giá cả, thời lượng và lịch trình.</p>
            </div>
            <div class="d-flex gap-2">
                <input type="text" class="form-control" style="max-width: 260px;" placeholder="Tìm kiếm gói tour..." v-model="key_search">
                <button type="button" class="btn btn-outline-primary" @click="resetSoSanh" v-if="so_sanh_items.length > 0">
                    Bỏ so sánh ({{ so_sanh_items.length }})
                </button>
            </div>
        </div>

        <!-- So sánh nhanh nếu có item chọn -->
        <div class="alert alert-info border-0 rounded-3 mb-4 d-flex align-items-center justify-content-between" v-if="so_sanh_items.length > 0">
            <div>
                <i class="bx bx-git-compare fs-5 me-2 align-middle"></i>
                Đang chọn <strong>{{ so_sanh_items.length }}</strong> gói tour để so sánh song song.
            </div>
            <button class="btn btn-sm btn-info text-white rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalBangSoSanh">
                Xem bảng so sánh chi tiết
            </button>
        </div>

        <!-- Danh sách card tour -->
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" v-for="item in list_tour_loc" :key="item.id">
                <div class="card h-100 border rounded-4 shadow-none overflow-hidden">
                    <div class="position-relative bg-light" style="height: 180px;">
                        <img :src="item.hinh_anh" class="w-100 h-100 object-fit-cover" :alt="item.ten_tour">
                        <span class="badge bg-danger position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill fw-bold">
                            {{ formatVND(item.gia_ban) }}
                        </span>
                    </div>
                    <div class="card-body p-3 d-flex flex-column">
                        <div class="d-flex align-items-center gap-1 text-warning small mb-1">
                            <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star-half"></i>
                            <span class="text-dark fw-bold ms-1">{{ item.diem_danh_gia }}</span>
                            <span class="text-muted">({{ item.luot_dat }} lượt đặt)</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-2">{{ item.ten_tour }}</h6>
                        <p class="text-muted small mb-3 flex-grow-1">{{ item.mo_ta }}</p>
                        <div class="border-top pt-2 d-flex align-items-center justify-content-between">
                            <span class="small text-secondary"><i class="bx bx-time me-1"></i>{{ item.thoi_luong }}</span>
                            <div class="d-flex gap-1">
                                <button type="button" class="btn btn-sm" :class="isSoSanh(item.id) ? 'btn-warning text-white' : 'btn-outline-secondary'" @click="toggleSoSanh(item)">
                                    <i class="bx bx-git-compare"></i>
                                </button>
                                <router-link to="/client/don-dat-thanh-toan" class="btn btn-sm btn-primary rounded-pill px-3">
                                    Đặt tour
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Bảng So Sánh -->
        <div class="modal fade" id="modalBangSoSanh" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Bảng So Sánh Gói Tour</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Tiêu chí</th>
                                        <th v-for="t in so_sanh_items" :key="t.id">{{ t.ten_tour }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-start">Giá tour</td>
                                        <td v-for="t in so_sanh_items" :key="t.id" class="text-danger fw-bold">{{ formatVND(t.gia_ban) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-start">Thời lượng</td>
                                        <td v-for="t in so_sanh_items" :key="t.id">{{ t.thoi_luong }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-start">Đánh giá</td>
                                        <td v-for="t in so_sanh_items" :key="t.id">⭐ {{ t.diem_danh_gia }} / 5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DanhMucTourComponent',
    data() {
        return {
            list_tour: [
                {
                    id: 1,
                    ten_tour: 'Đà Nẵng Rực Rỡ: Biển Xanh - Bà Nà Hills - Cầu Vàng',
                    gia_ban: 2450000,
                    thoi_luong: '3 Ngày 2 Đêm',
                    diem_danh_gia: '4.9',
                    luot_dat: 320,
                    mo_ta: 'Trải nghiệm cáp treo Bà Nà, check-in Cầu Vàng và thưởng thức ẩm thực chợ đêm.',
                    hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=600&auto=format&fit=crop&q=80'
                },
                {
                    id: 2,
                    ten_tour: 'Khám Phá Bán Đảo Sơn Trà & Lặn Ngắm San Hô Cù Lao Chàm',
                    gia_ban: 1850000,
                    thoi_luong: '2 Ngày 1 Đêm',
                    diem_danh_gia: '4.8',
                    luot_dat: 195,
                    mo_ta: 'Tham quan Chùa Linh Ứng, đỉnh Bàn Cờ và trải nghiệm lặn biển san hô tuyệt đẹp.',
                    hinh_anh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&auto=format&fit=crop&q=80'
                },
                {
                    id: 3,
                    ten_tour: 'City Tour Đà Nẵng: Ngũ Hành Sơn & Du Thuyền Sông Hàn',
                    gia_ban: 950000,
                    thoi_luong: '1 Ngày (Trong ngày)',
                    diem_danh_gia: '4.7',
                    luot_dat: 450,
                    mo_ta: 'Khám phá danh thắng Ngũ Hành Sơn, làng đá mỹ nghệ và ngắm Cầu Rồng phun lửa.',
                    hinh_anh: 'https://images.unsplash.com/photo-1544644181-1484b3fdfc62?w=600&auto=format&fit=crop&q=80'
                }
            ],
            so_sanh_items: [],
            key_search: ''
        };
    },
    computed: {
        list_tour_loc() {
            if (!this.key_search) return this.list_tour;
            const search = this.key_search.toLowerCase().trim();
            return this.list_tour.filter(item =>
                item.ten_tour.toLowerCase().includes(search) || item.mo_ta.toLowerCase().includes(search)
            );
        }
    },
    methods: {
        formatVND(value) {
            if (!value) return '0 đ';
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
        },
        toggleSoSanh(tour) {
            const index = this.so_sanh_items.findIndex(x => x.id === tour.id);
            if (index >= 0) {
                this.so_sanh_items.splice(index, 1);
            } else {
                if (this.so_sanh_items.length >= 3) {
                    if (this.$toast) this.$toast.error('Chỉ được so sánh tối đa 3 tour cùng lúc!');
                    return;
                }
                this.so_sanh_items.push(tour);
            }
        },
        isSoSanh(id) {
            return this.so_sanh_items.some(x => x.id === id);
        },
        resetSoSanh() {
            this.so_sanh_items = [];
        }
    }
};
</script>

<style></style>
