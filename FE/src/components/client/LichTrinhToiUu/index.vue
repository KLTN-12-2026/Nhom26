<template>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold text-dark mb-1">
                    <i class="bx bx-directions text-danger me-2"></i>Lịch Trình Tối Ưu
                </h4>
                <p class="text-muted small mb-0">Lộ trình du lịch đã được thuật toán AI tối ưu theo thứ tự ghé thăm, giảm thiểu quãng đường và kẹt xe.</p>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-3" @click="xuatPDF">
                    <i class="bx bx-printer me-1"></i>Xuất Lịch Trình
                </button>
                <router-link to="/client/ai-travel-planner" class="btn btn-danger rounded-pill px-3">
                    <i class="bx bx-repost me-1"></i>Tối ưu lại
                </router-link>
            </div>
        </div>

        <!-- Timeline 3 ngày -->
        <div class="row g-4">
            <div class="col-lg-4" v-for="day in list_ngay" :key="day.ngay">
                <div class="card border rounded-4 h-100 shadow-none">
                    <div class="card-header bg-danger-subtle text-danger border-bottom-0 py-3 rounded-top-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">{{ day.tieu_de }}</span>
                            <span class="badge bg-white text-danger border">{{ day.khoang_cach }} km di chuyển</span>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="timeline-route">
                            <div class="timeline-step mb-3" v-for="(poi, idx) in day.pois" :key="idx">
                                <div class="step-time text-muted small fw-bold">{{ poi.gio }}</div>
                                <div class="step-card p-2 border rounded-3 bg-light mt-1">
                                    <div class="fw-bold text-dark small">{{ poi.ten }}</div>
                                    <small class="text-muted d-block">{{ poi.dia_chi }}</small>
                                    <span class="badge bg-white text-secondary border font-10 mt-1">{{ poi.thoi_gian_o }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'LichTrinhToiUuComponent',
    data() {
        return {
            list_ngay: [
                {
                    ngay: 1,
                    tieu_de: 'Ngày 1: Biển Mỹ Khê & Bán Đảo Sơn Trà',
                    khoang_cach: '24.5',
                    pois: [
                        { gio: '08:30', ten: 'Sân bay Đà Nẵng', dia_chi: 'Đón tại Ga đến', thoi_gian_o: '30 phút' },
                        { gio: '09:30', ten: 'Chùa Linh Ứng - Bán Đảo Sơn Trà', dia_chi: 'Hoàng Sa, Thọ Quang', thoi_gian_o: '1.5 giờ' },
                        { gio: '12:00', ten: 'Ẩm thực Bánh tráng thịt heo', dia_chi: 'Đường Châu Thị Vĩnh Tế', thoi_gian_o: '1 giờ' },
                        { gio: '15:30', ten: 'Bãi biển Mỹ Khê', dia_chi: 'Võ Nguyên Giáp', thoi_gian_o: '2.5 giờ' },
                        { gio: '19:00', ten: 'Chợ Đêm Sơn Trà & Cầu Rồng', dia_chi: 'Chân Cầu Rồng', thoi_gian_o: '2 giờ' }
                    ]
                },
                {
                    ngay: 2,
                    tieu_de: 'Ngày 2: Siêu Điểm Đến Bà Nà Hills',
                    khoang_cach: '42.0',
                    pois: [
                        { gio: '07:30', ten: 'Xuất phát từ Khách sạn', dia_chi: 'Võ Nguyên Giáp', thoi_gian_o: '45 phút di chuyển' },
                        { gio: '08:30', ten: 'Cáp treo Ga Hội An lên Cầu Vàng', dia_chi: 'Khu du lịch Sun World', thoi_gian_o: '1.5 giờ' },
                        { gio: '11:30', ten: 'Buffet trưa Làng Pháp', dia_chi: 'Nhà hàng Bốn Mùa', thoi_gian_o: '1.5 giờ' },
                        { gio: '13:30', ten: 'Fantasy Park & Hầm rượu Debay', dia_chi: 'Khu trò chơi đỉnh Bà Nà', thoi_gian_o: '3 giờ' },
                        { gio: '17:30', ten: 'Về lại trung tâm TP Đà Nẵng', dia_chi: 'Nghỉ ngơi tại khách sạn', thoi_gian_o: 'Qua đêm' }
                    ]
                },
                {
                    ngay: 3,
                    tieu_de: 'Ngày 3: Ngũ Hành Sơn & Mua Sắm',
                    khoang_cach: '18.2',
                    pois: [
                        { gio: '08:00', ten: 'Danh thắng Ngũ Hành Sơn', dia_chi: 'Huyền Trân Công Chúa', thoi_gian_o: '2 giờ' },
                        { gio: '10:30', ten: 'Bảo tàng Điêu khắc Chăm Pa', dia_chi: 'Số 02 Đường 2/9', thoi_gian_o: '1.5 giờ' },
                        { gio: '12:30', ten: 'Thưởng thức Mì Quảng Ếch', dia_chi: 'Trần Bình Trọng', thoi_gian_o: '1 giờ' },
                        { gio: '14:30', ten: 'Mua sắm đặc sản Chợ Cồn', dia_chi: 'Ông Ích Khiêm', thoi_gian_o: '1.5 giờ' },
                        { gio: '16:30', ten: 'Tiễn Sân bay Đà Nẵng', dia_chi: 'Kết thúc chuyến đi', thoi_gian_o: 'Tạm biệt' }
                    ]
                }
            ]
        };
    },
    mounted() {},
    methods: {
        xuatPDF() {
            if (this.$toast) {
                this.$toast.success('Đang chuẩn bị file lịch trình để in/tải về...');
            }
        }
    }
};
</script>

<style scoped>
.font-10 {
    font-size: 10px;
}
</style>
