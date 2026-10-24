<template>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold text-dark mb-1">
                    <i class="bx bx-star text-warning me-2"></i>Đánh Giá & Góp Ý
                </h4>
                <p class="text-muted small mb-0">Chia sẻ trải nghiệm du lịch, xếp hạng sao và đóng góp ý kiến về các điểm đến, đối tác cung cấp dịch vụ.</p>
            </div>
            <button type="button" class="btn btn-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalGuiDanhGia">
                <i class="bx bx-edit me-1"></i>Viết đánh giá mới
            </button>
        </div>

        <div class="row g-4">
            <div class="col-md-6" v-for="item in list_danh_gia" :key="item.id">
                <div class="card border rounded-4 p-3 h-100 shadow-none">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="fw-bold text-dark">{{ item.ten_dia_diem }}</div>
                            <small class="text-muted">{{ item.ngay_danh_gia }}</small>
                        </div>
                        <div class="text-warning">
                            <i v-for="star in 5" :key="star" :class="star <= item.so_sao ? 'bx bxs-star' : 'bx bx-star'"></i>
                        </div>
                    </div>
                    <p class="small text-secondary mb-2 flex-grow-1">"{{ item.noi_dung }}"</p>
                    <div class="d-flex align-items-center gap-2 pt-2 border-top">
                        <span class="badge bg-success-subtle text-success">Đã duyệt</span>
                        <small class="text-muted ms-auto"><i class="bx bx-like me-1"></i>{{ item.luot_thich }} hữu ích</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Gửi Đánh Giá -->
        <div class="modal fade" id="modalGuiDanhGia" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Gửi Đánh Giá & Góp Ý</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body py-3">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Địa điểm / Dịch vụ</label>
                            <input v-model="form_danh_gia.ten_dia_diem" type="text" class="form-control" placeholder="Tên điểm đến hoặc tour đã trải nghiệm...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Đánh giá số sao (1-5 sao)</label>
                            <select v-model="form_danh_gia.so_sao" class="form-select">
                                <option value="5">⭐⭐⭐⭐⭐ (Tuyệt vời)</option>
                                <option value="4">⭐⭐⭐⭐ (Rất tốt)</option>
                                <option value="3">⭐⭐⭐ (Bình thường)</option>
                                <option value="2">⭐⭐ (Cần cải thiện)</option>
                                <option value="1">⭐ (Kém)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nội dung nhận xét</label>
                            <textarea v-model="form_danh_gia.noi_dung" rows="3" class="form-control" placeholder="Chia sẻ cảm nhận chi tiết của bạn..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary rounded-pill px-4" @click="guiDanhGia" data-bs-dismiss="modal">Gửi đánh giá</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DanhGiaGopYComponent',
    data() {
        return {
            list_danh_gia: [
                {
                    id: 1,
                    ten_dia_diem: 'Khu Du Lịch Bà Nà Hills & Cầu Vàng',
                    so_sao: 5,
                    noi_dung: 'Khung cảnh Cầu Vàng trong sương mù cực kỳ huyền ảo, buffet rất phong phú và cáp treo nhanh chóng an toàn.',
                    ngay_danh_gia: '17/06/2026',
                    luot_thich: 28
                },
                {
                    id: 2,
                    ten_dia_diem: 'Chợ Đêm Sơn Trà & Phố Đi Bộ',
                    so_sao: 4,
                    noi_dung: 'Ẩm thực phong phú, hải sản tươi ngon với giá cả hợp lý, không khí nhộn nhịp vui vẻ.',
                    ngay_danh_gia: '16/06/2026',
                    luot_thich: 14
                }
            ],
            form_danh_gia: {
                ten_dia_diem: '',
                so_sao: 5,
                noi_dung: ''
            }
        };
    },
    methods: {
        guiDanhGia() {
            if (this.$toast) {
                this.$toast.success('Cảm ơn bạn! Đánh giá đã được gửi và đang chờ kiểm duyệt.');
            }
            this.form_danh_gia = { ten_dia_diem: '', so_sao: 5, noi_dung: '' };
        }
    }
};
</script>

<style></style>
