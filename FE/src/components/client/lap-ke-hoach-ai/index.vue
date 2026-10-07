<template>
    <div class="container-fluid p-0">
        <!-- Banner Title -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 bg-gradient-ai text-white p-4">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-bold mb-2">
                        <i class="bx bx-bot me-1"></i> Trí tuệ nhân tạo (AI Engine 3.5)
                    </span>
                    <h2 class="fw-bold mb-2">Lập Kế Hoạch Du Lịch Tự Động Bằng AI</h2>
                    <p class="mb-0 opacity-90">
                        Chỉ với vài thao tác, AI sẽ tự động phân bổ địa điểm, thời gian, dự báo thời tiết và tối ưu hóa ngân sách chuyến đi của bạn.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <div class="ai-orb d-inline-flex align-items-center justify-content-center">
                        <i class="bx bx-sparkles fs-1 text-warning"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- AI Plan Generator Form -->
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-dark mb-3">
                            <i class="bx bx-slider-alt text-primary me-2"></i>Tùy Chỉnh Nhu Cầu Chuyến Đi
                        </h5>

                        <form @submit.prevent="generatePlan">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Điểm đến chính</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bx bx-map text-primary"></i></span>
                                    <input type="text" class="form-control" v-model="form.destination" placeholder="Ví dụ: TP. Đà Nẵng, Hội An, Bà Nà...">
                                </div>
                            </div>

                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <label class="form-label fw-semibold">Số ngày</label>
                                    <select class="form-select" v-model="form.days">
                                        <option value="1">1 Ngày</option>
                                        <option value="2">2 Ngày 1 Đêm</option>
                                        <option value="3">3 Ngày 2 Đêm</option>
                                        <option value="4">4 Ngày 3 Đêm</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label fw-semibold">Số người</label>
                                    <select class="form-select" v-model="form.people">
                                        <option value="1">1 Người (Solo)</option>
                                        <option value="2">2 Người (Cặp đôi)</option>
                                        <option value="4">Gia đình (4 người)</option>
                                        <option value="6">Nhóm bạn (6+ người)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Phong cách du lịch</label>
                                <div class="d-flex flex-wrap gap-2">
                                    <button 
                                        type="button" 
                                        v-for="style in travelStyles" 
                                        :key="style"
                                        class="btn btn-sm rounded-pill"
                                        :class="form.selectedStyle === style ? 'btn-primary' : 'btn-outline-secondary'"
                                        @click="form.selectedStyle = style"
                                    >
                                        {{ style }}
                                    </button>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Dự trù ngân sách / người</label>
                                <select class="form-select" v-model="form.budget">
                                    <option value="tiet_kiem">Tiết kiệm (Dưới 2.000.000đ)</option>
                                    <option value="tieu_chuan">Tiêu chuẩn (2.000.000đ - 5.000.000đ)</option>
                                    <option value="sang_trong">Sang trọng & Nghỉ dưỡng (Trên 5.000.000đ)</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-bold shadow-sm" :disabled="isGenerating">
                                <span v-if="!isGenerating"><i class="bx bx-magic-wand me-1"></i> Bắt Đầu Tạo Lộ Trình AI</span>
                                <span v-else><i class="bx bx-loader-alt bx-spin me-1"></i> AI Đang Xử Lý & Tối Ưu Hóa...</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Preview AI Suggestion -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="fw-bold text-dark mb-0">
                                <i class="bx bx-check-shield text-success me-2"></i>Lộ Trình AI Gợi Ý
                            </h5>
                            <span class="badge bg-success-subtle text-success px-2 py-1 rounded-pill">Độ khớp 98%</span>
                        </div>

                        <!-- Days Timeline -->
                        <div class="timeline-box">
                            <div class="timeline-day p-3 rounded-3 bg-light mb-3" v-for="(day, index) in suggestedPlan" :key="index">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h6 class="fw-bold text-primary mb-0">{{ day.title }}</h6>
                                    <small class="text-muted"><i class="bx bx-sun text-warning me-1"></i>28°C Nắng đẹp</small>
                                </div>
                                <ul class="list-unstyled mb-0 small ps-2">
                                    <li class="mb-2" v-for="(act, aIdx) in day.activities" :key="aIdx">
                                        <strong class="text-dark">{{ act.time }}</strong>: {{ act.content }}
                                        <span class="badge bg-primary-subtle text-primary ms-1" v-if="act.tag">{{ act.tag }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-3">
                            <router-link to="/client/home" class="btn btn-primary flex-grow-1 rounded-3">
                                <i class="bx bx-save me-1"></i> Lưu Vào Kế Hoạch Của Tôi
                            </router-link>
                            <router-link to="/client/tour" class="btn btn-outline-primary rounded-3">
                                <i class="bx bx-cart me-1"></i> Đặt Dịch Vụ Theo Lộ Trình
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'LapKeHoachAI',
    data() {
        return {
            isGenerating: false,
            travelStyles: ['Nghỉ dưỡng & Biển', 'Ẩm thực & Check-in', 'Khám phá văn hóa', 'Hoạt động trải nghiệm'],
            form: {
                destination: 'Đà Nẵng - Hội An',
                days: '3',
                people: '2',
                selectedStyle: 'Nghỉ dưỡng & Biển',
                budget: 'tieu_chuan'
            },
            suggestedPlan: [
                {
                    title: 'Ngày 1: Check-in Đà Nẵng & Biển Mỹ Khê',
                    activities: [
                        { time: '08:30', content: 'Đón tại sân bay Đà Nẵng, gửi hành lý khách sạn.', tag: 'Di chuyển' },
                        { time: '11:30', content: 'Thưởng thức đặc sản Mì Quảng Ếch Bếp Trang.', tag: 'Ẩm thực' },
                        { time: '15:30', content: 'Tắm biển Mỹ Khê, dạo bãi cát trắng mịn.', tag: 'Trải nghiệm' },
                        { time: '19:00', content: 'Ngắm Cầu Rồng phun lửa & dạo chợ đêm Sơn Trà.', tag: 'Check-in' }
                    ]
                },
                {
                    title: 'Ngày 2: Trọn ngày Bà Nà Hills - Cầu Vàng',
                    activities: [
                        { time: '08:00', content: 'Xe Limousine đón đi cáp treo Bà Nà Hills.', tag: 'Tour' },
                        { time: '10:00', content: 'Check-in Cầu Vàng, Làng Pháp và Vườn Hoa Le Jardin.', tag: 'Điểm đến' },
                        { time: '12:30', content: 'Buffet trưa quốc tế tại Beer Plaza.', tag: 'Ẩm thực' },
                        { time: '16:00', content: 'Xuống cáp treo về lại trung tâm thành phố.' }
                    ]
                },
                {
                    title: 'Ngày 3: Bán đảo Sơn Trà & Mua sắm đặc sản',
                    activities: [
                        { time: '07:30', content: 'Viếng Chùa Linh Ứng - Tượng Phật Bà ngắm biển.', tag: 'Văn hóa' },
                        { time: '10:30', content: 'Mua quà đặc sản Đà Nẵng tại Chợ Cồn/Chợ Hàn.', tag: 'Mua sắm' },
                        { time: '13:00', content: 'Trả phòng khách sạn, kết thúc chuyến đi tuyệt vời.' }
                    ]
                }
            ]
        }
    },
    methods: {
        generatePlan() {
            this.isGenerating = true;
            setTimeout(() => {
                this.isGenerating = false;
                alert('AI đã tối ưu hóa lộ trình thành công theo nhu cầu của bạn!');
            }, 1200);
        }
    }
}
</script>

<style scoped>
.bg-gradient-ai {
    background: linear-gradient(135deg, #0369a1 0%, #0284c7 60%, #38bdf8 100%);
}
.ai-orb {
    width: 70px;
    height: 70px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(8px);
    border-radius: 50%;
}
</style>
