<template>
    <div class="container-fluid p-0">
        <!-- Header action -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 p-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <h3 class="fw-bold mb-1 text-dark">Quản Lý Kế Hoạch Du Lịch</h3>
                    <p class="text-muted mb-0">Theo dõi, chỉnh sửa và chia sẻ các chuyến đi của bạn cùng gia đình & bạn bè.</p>
                </div>
                <div class="d-flex gap-2">
                    <router-link to="/client/lap-ke-hoach-ai" class="btn btn-outline-primary rounded-3">
                        <i class="bx bx-bot me-1"></i> Tạo Bằng AI
                    </router-link>
                    <button class="btn btn-primary rounded-3" @click="createNewPlan">
                        <i class="bx bx-plus me-1"></i> Tạo Kế Hoạch Mới
                    </button>
                </div>
            </div>
        </div>

        <!-- Plans Grid -->
        <div class="row g-4">
            <div class="col-md-6 col-lg-4" v-for="plan in plans" :key="plan.id">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden plan-card">
                    <img :src="plan.image" class="card-img-top plan-cover" :alt="plan.title">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="badge" :class="plan.statusBadge">{{ plan.statusText }}</span>
                            <small class="text-muted"><i class="bx bx-calendar me-1"></i>{{ plan.date }}</small>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">{{ plan.title }}</h5>
                        <p class="text-muted small mb-3">{{ plan.desc }}</p>

                        <div class="d-flex align-items-center justify-content-between pt-3 border-top small text-muted">
                            <div><i class="bx bx-group text-primary me-1"></i>{{ plan.members }} thành viên</div>
                            <div><i class="bx bx-map-pin text-danger me-1"></i>{{ plan.destinations }} điểm dừng</div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 px-4 pb-4 pt-0 d-flex gap-2">
                        <router-link to="/client/home" class="btn btn-primary flex-grow-1 rounded-3 btn-sm">
                            <i class="bx bx-show me-1"></i> Xem Chi Tiết
                        </router-link>
                        <router-link to="/client/nhom-du-lich" class="btn btn-outline-secondary rounded-3 btn-sm" title="Quản lý nhóm">
                            <i class="bx bx-user-plus"></i>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'QuanLyKeHoach',
    data() {
        return {
            plans: [
                {
                    id: 1,
                    title: 'Đà Nẵng Rực Rỡ Hè 2025',
                    desc: 'Kỳ nghỉ 3N2Đ kết hợp tắm biển Mỹ Khê, Bán đảo Sơn Trà và Bà Nà Hills.',
                    date: '15/05/2025 - 17/05/2025',
                    statusText: 'Đang diễn ra',
                    statusBadge: 'bg-success-subtle text-success',
                    members: 4,
                    destinations: 6,
                    image: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=600&auto=format&fit=crop'
                },
                {
                    id: 2,
                    title: 'Hành Trình Di Sản Huế - Hội An',
                    desc: 'Khám phá phố cổ Hội An về đêm, chèo sup sông Hoài và ẩm thực cung đình Huế.',
                    date: '02/06/2025 - 05/06/2025',
                    statusText: 'Sắp tới',
                    statusBadge: 'bg-primary-subtle text-primary',
                    members: 2,
                    destinations: 8,
                    image: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=600&auto=format&fit=crop'
                },
                {
                    id: 3,
                    title: 'Trekking & Khám Phá Rừng Dừa Bảy Mẫu',
                    desc: 'Trải nghiệm đi thuyền thúng, học quăng chài bắt cá và nướng hải sản đồng quê.',
                    date: '20/07/2025',
                    statusText: 'Đang lên kế hoạch',
                    statusBadge: 'bg-warning-subtle text-warning',
                    members: 6,
                    destinations: 3,
                    image: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&auto=format&fit=crop'
                }
            ]
        }
    },
    methods: {
        createNewPlan() {
            this.$router.push('/client/lap-ke-hoach-ai');
        }
    }
}
</script>

<style scoped>
.plan-cover {
    height: 180px;
    object-fit: cover;
}
.plan-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.plan-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08) !important;
}
</style>
