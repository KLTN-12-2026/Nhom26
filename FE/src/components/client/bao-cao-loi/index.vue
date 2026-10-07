<template>
    <div class="container-fluid p-0">
        <div class="card border-0 shadow-sm rounded-4 mb-4 p-4">
            <h3 class="fw-bold mb-1 text-dark">Gửi Báo Cáo Lỗi & Hỗ Trợ Kỹ Thuật</h3>
            <p class="text-muted mb-0">Chúng tôi luôn lắng nghe ý kiến phản hồi để nâng cao chất lượng trải nghiệm ứng dụng du lịch thông minh.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <form @submit.prevent="submitReport">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Loại sự cố gặp phải <span class="text-danger">*</span></label>
                            <select class="form-select" v-model="form.type" required>
                                <option value="dat_tour">Lỗi trong quá trình đặt tour / thanh toán</option>
                                <option value="ai_plan">Lỗi tạo kế hoạch bằng AI</option>
                                <option value="tai_khoan">Sự cố tài khoản & đăng nhập</option>
                                <option value="giao_dien">Lỗi hiển thị giao diện / thiết bị di động</option>
                                <option value="khac">Khác / Đóng góp ý kiến cải tiến</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tiêu đề phản hồi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" v-model="form.title" placeholder="Mô tả tóm tắt sự cố..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Chi tiết mô tả lỗi <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="5" v-model="form.description" placeholder="Vui lòng cung cấp chi tiết các bước xảy ra lỗi hoặc thông tin chuyến đi..." required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Ảnh chụp màn hình (Nếu có)</label>
                            <input type="file" class="form-control">
                            <small class="text-muted">Hỗ trợ JPG, PNG dưới 5MB</small>
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-3 border-top">
                            <small class="text-muted"><i class="bx bx-shield-quarter text-success me-1"></i>Báo cáo được bảo mật & xử lý trong 24h</small>
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 fw-bold" :disabled="submitting">
                                <span v-if="!submitting"><i class="bx bx-paper-plane me-1"></i> Gửi Báo Cáo Ngay</span>
                                <span v-else><i class="bx bx-loader-alt bx-spin me-1"></i> Đang gửi...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ClientBaoCaoLoi',
    data() {
        return {
            submitting: false,
            form: {
                type: 'dat_tour',
                title: '',
                description: ''
            }
        }
    },
    methods: {
        submitReport() {
            this.submitting = true;
            setTimeout(() => {
                this.submitting = false;
                alert('Cảm ơn bạn! Báo cáo sự cố đã được gửi tới đội ngũ kỹ thuật Smart Travel.');
                this.form.title = '';
                this.form.description = '';
            }, 1000);
        }
    }
}
</script>
