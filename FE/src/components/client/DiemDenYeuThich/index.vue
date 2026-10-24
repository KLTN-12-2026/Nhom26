<template>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold text-dark mb-1">
                    <i class="bx bx-heart text-danger me-2"></i>Điểm Đến Yêu Thích
                </h4>
                <p class="text-muted small mb-0">Bộ sưu tập các POI, danh lam thắng cảnh và địa chỉ ẩm thực du khách đã lưu lại để ghé thăm.</p>
            </div>
            <div class="input-group" style="max-width: 280px;">
                <span class="input-group-text bg-white border-end-0"><i class="bx bx-search text-muted"></i></span>
                <input type="text" class="form-control border-start-0 ps-0" placeholder="Tìm kiếm điểm đã lưu..." v-model="key_search">
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6" v-for="item in list_yeu_thich_loc" :key="item.id">
                <div class="card h-100 border rounded-4 shadow-none overflow-hidden">
                    <div class="position-relative bg-light" style="height: 160px;">
                        <img :src="item.hinh_anh" class="w-100 h-100 object-fit-cover" :alt="item.ten_dia_diem">
                        <button type="button" class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm" @click="boLuu(item.id)" title="Bỏ lưu">
                            <i class="bx bxs-heart text-danger fs-5"></i>
                        </button>
                    </div>
                    <div class="card-body p-3">
                        <span class="badge bg-light text-secondary border font-11 mb-2">{{ item.danh_muc }}</span>
                        <h6 class="fw-bold text-dark mb-1">{{ item.ten_dia_diem }}</h6>
                        <small class="text-muted d-block mb-3"><i class="bx bx-map me-1 text-danger"></i>{{ item.dia_chi }}</small>
                        <div class="d-flex justify-content-between align-items-center border-top pt-2">
                            <span class="text-warning small fw-bold"><i class="bx bxs-star me-1"></i>{{ item.diem_danh_gia }}</span>
                            <router-link to="/client/ai-travel-planner" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                Thêm vào lịch trình
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center py-5 text-muted" v-if="list_yeu_thich_loc.length === 0">
                <i class="bx bx-heart fs-1 text-secondary d-block mb-2"></i>
                Chưa có điểm đến yêu thích nào được lưu.
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DiemDenYeuThichComponent',
    data() {
        return {
            list_yeu_thich: [
                {
                    id: 1,
                    ten_dia_diem: 'Bãi Biển Mỹ Khê',
                    danh_muc: 'Biển & Thiên nhiên',
                    dia_chi: 'Đường Võ Nguyên Giáp, Ngũ Hành Sơn',
                    diem_danh_gia: '4.9',
                    hinh_anh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&auto=format&fit=crop&q=80'
                },
                {
                    id: 2,
                    ten_dia_diem: 'Chợ Đêm Sơn Trà & Cầu Rồng',
                    danh_muc: 'Ẩm thực & Mua sắm',
                    dia_chi: 'Chân Cầu Rồng, An Hải Tây',
                    diem_danh_gia: '4.8',
                    hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=600&auto=format&fit=crop&q=80'
                },
                {
                    id: 3,
                    ten_dia_diem: 'Khu Du Lịch Bà Nà Hills',
                    danh_muc: 'Khu vui chơi & Nghỉ dưỡng',
                    dia_chi: 'Hòa Vang, Đà Nẵng',
                    diem_danh_gia: '4.9',
                    hinh_anh: 'https://images.unsplash.com/photo-1544644181-1484b3fdfc62?w=600&auto=format&fit=crop&q=80'
                }
            ],
            key_search: ''
        };
    },
    computed: {
        list_yeu_thich_loc() {
            if (!this.key_search) return this.list_yeu_thich;
            const s = this.key_search.toLowerCase().trim();
            return this.list_yeu_thich.filter(x =>
                x.ten_dia_diem.toLowerCase().includes(s) || x.dia_chi.toLowerCase().includes(s)
            );
        }
    },
    methods: {
        boLuu(id) {
            this.list_yeu_thich = this.list_yeu_thich.filter(x => x.id !== id);
            if (this.$toast) {
                this.$toast.success('Đã bỏ lưu điểm đến!');
            }
        }
    }
};
</script>

<style scoped>
.font-11 {
    font-size: 11px;
}
</style>
