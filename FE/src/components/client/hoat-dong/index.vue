<template>
    <div class="container-fluid p-0">
        <div class="card border-0 shadow-sm rounded-4 mb-4 p-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <h3 class="fw-bold mb-1 text-dark">Quản Lý Hoạt Động Chuyến Đi</h3>
                    <p class="text-muted mb-0">Lên danh sách check-list, thời gian biểu và phân công công việc cho từng hoạt động.</p>
                </div>
                <div>
                    <button class="btn btn-primary rounded-3" @click="addActivity">
                        <i class="bx bx-plus me-1"></i> Thêm Hoạt Động Mới
                    </button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4" v-for="(col, cIdx) in columns" :key="cIdx">
                <div class="card border-0 shadow-sm rounded-4 h-100 bg-light-subtle p-3">
                    <div class="d-flex align-items-center justify-content-between mb-3 px-1">
                        <h6 class="fw-bold text-dark mb-0">{{ col.title }}</h6>
                        <span class="badge bg-secondary-subtle text-secondary rounded-pill">{{ col.items.length }}</span>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        <div class="card border-0 shadow-sm rounded-3 p-3 activity-card" v-for="act in col.items" :key="act.id">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge" :class="act.tagClass">{{ act.tag }}</span>
                                <small class="text-muted"><i class="bx bx-time me-1"></i>{{ act.time }}</small>
                            </div>
                            <h6 class="fw-bold text-dark mb-1">{{ act.title }}</h6>
                            <p class="text-muted small mb-2">{{ act.desc }}</p>
                            <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                                <span><i class="bx bx-user me-1 text-primary"></i>{{ act.assignee }}</span>
                                <span class="text-success fw-bold" v-if="act.cost">{{ act.cost }}</span>
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
    name: 'QuanLyHoatDong',
    data() {
        return {
            columns: [
                {
                    title: 'Cần Chuẩn Bị (To-Do)',
                    items: [
                        { id: 1, title: 'Thuê xe máy tự lái đón ở ga', desc: 'Liên hệ đối tác giao xe lúc 09:00', time: 'Trước 14/05', tag: 'Phương tiện', tagClass: 'bg-warning-subtle text-warning', assignee: 'Nguyễn Văn An', cost: '150.000đ/ngày' },
                        { id: 2, title: 'Chuẩn bị kem chống nắng & mũ rộng vành', desc: 'Đi Bà Nà Hills và biển Mỹ Khê', time: '14/05', tag: 'Cá nhân', tagClass: 'bg-info-subtle text-info', assignee: 'Trần Thị Mai' }
                    ]
                },
                {
                    title: 'Đang Thực Hiện (In-Progress)',
                    items: [
                        { id: 3, title: 'Check-in Cầu Vàng & Làng Pháp', desc: 'Chụp hình kỷ niệm nhóm tại Cầu Vàng', time: '10:30 - Ngày 2', tag: 'Check-in', tagClass: 'bg-primary-subtle text-primary', assignee: 'Cả nhóm' },
                        { id: 4, title: 'Đặt bàn trước tại Beer Plaza', desc: 'Buffet trưa món Á - Âu', time: '12:00 - Ngày 2', tag: 'Ăn uống', tagClass: 'bg-success-subtle text-success', assignee: 'Lê Hoàng Nam', cost: '350.000đ/người' }
                    ]
                },
                {
                    title: 'Đã Hoàn Thành (Done)',
                    items: [
                        { id: 5, title: 'Đặt vé máy bay khứ hồi Hà Nội - Đà Nẵng', desc: 'Chuyến bay VJ512 hạ cánh 08:30', time: 'Hoàn tất', tag: 'Vé bay', tagClass: 'bg-secondary-subtle text-secondary', assignee: 'Nguyễn Văn An' }
                    ]
                }
            ]
        }
    },
    methods: {
        addActivity() {
            alert('Mở form thêm hoạt động mới');
        }
    }
}
</script>

<style scoped>
.activity-card {
    transition: transform 0.15s ease;
}
.activity-card:hover {
    transform: translateY(-2px);
}
</style>
