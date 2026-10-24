<template>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold text-dark mb-1">
                    <i class="bx bx-user-pin text-primary me-2"></i>Hồ Sơ & Sở Thích
                </h4>
                <p class="text-muted small mb-0">Cập nhật thông tin định danh du khách và bộ thẻ sở thích <code>so_thich_du_khach</code> để AI đề xuất chính xác.</p>
            </div>
            <button type="button" class="btn btn-primary rounded-pill px-4" @click="luuThongTin">
                <i class="bx bx-save me-1"></i>Lưu thay đổi
            </button>
        </div>

        <div class="row g-4">
            <!-- Thông tin cá nhân -->
            <div class="col-lg-6">
                <div class="card border rounded-4 p-4 h-100 shadow-none">
                    <h6 class="fw-bold text-dark mb-3">Thông Tin Cá Nhân</h6>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-muted">HỌ VÀ TÊN</label>
                        <input v-model="profile.ho_va_ten" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-muted">EMAIL</label>
                        <input v-model="profile.email" type="email" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-muted">SỐ ĐIỆN THOẠI</label>
                        <input v-model="profile.so_dien_thoai" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-muted">HẠNG THÀNH VIÊN</label>
                        <div class="p-2 bg-light rounded-3 d-flex align-items-center justify-content-between">
                            <span class="fw-bold text-dark"><i class="bx bxs-badge-check text-danger me-1"></i>{{ profile.hang_thanh_vien }}</span>
                            <span class="badge bg-danger">Ưu đãi 10%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thẻ sở thích du lịch -->
            <div class="col-lg-6">
                <div class="card border rounded-4 p-4 h-100 shadow-none">
                    <h6 class="fw-bold text-dark mb-2">Thẻ Sở Thích Du Khách (AI Preferences)</h6>
                    <p class="small text-muted mb-3">Tích chọn các thẻ gu du lịch để tối ưu thuật toán GA cho chuyến đi của bạn:</p>

                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <button 
                            v-for="tag in list_tags" 
                            :key="tag.id"
                            type="button" 
                            class="btn btn-sm rounded-pill"
                            :class="isTagSelected(tag.id) ? 'btn-danger text-white' : 'btn-outline-secondary'"
                            @click="toggleTag(tag.id)"
                        >
                            <i :class="isTagSelected(tag.id) ? 'bx bx-check me-1' : 'bx bx-plus me-1'"></i>
                            {{ tag.name }}
                        </button>
                    </div>

                    <div class="alert alert-light border rounded-3 p-3 small text-muted mb-0">
                        <i class="bx bx-info-circle text-primary me-1"></i>
                        Hệ thống sẽ dựa trên các thẻ sở thích trên để tự động chấm điểm Utility cho các điểm đến khi bạn bấm tạo lịch trình.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'HoSoSoThichComponent',
    data() {
        return {
            profile: {
                ho_va_ten: 'Trần Minh Anh',
                email: 'tranminhanh@gmail.com',
                so_dien_thoai: '0905123456',
                hang_thanh_vien: 'VIP Explorer ♦'
            },
            selected_tags: [1, 2, 3],
            list_tags: [
                { id: 1, name: 'Du lịch Biển & Nghỉ dưỡng' },
                { id: 2, name: 'Ẩm thực Đặc sản Đà Nẵng' },
                { id: 3, name: 'Check-in Địa điểm Nổi tiếng' },
                { id: 4, name: 'Khám phá Văn hóa & Lịch sử' },
                { id: 5, name: 'Trekking & Sinh thái Núi Rừng' },
                { id: 6, name: 'Trải nghiệm Phố Đêm & Bar / Pub' }
            ]
        };
    },
    methods: {
        isTagSelected(id) {
            return this.selected_tags.includes(id);
        },
        toggleTag(id) {
            const idx = this.selected_tags.indexOf(id);
            if (idx > -1) {
                this.selected_tags.splice(idx, 1);
            } else {
                this.selected_tags.push(id);
            }
        },
        luuThongTin() {
            if (this.$toast) {
                this.$toast.success('Đã lưu thông tin hồ sơ và sở thích thành công!');
            }
        }
    }
};
</script>

<style></style>
