<template>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold text-dark mb-1">
                    <i class="bx bx-shield-quarter text-success me-2"></i>Bảo Mật Tài Khoản
                </h4>
                <p class="text-muted small mb-0">Thay đổi mật khẩu, quản lý phiên đăng nhập và bảo mật thông tin tài khoản du khách.</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Đổi mật khẩu -->
            <div class="col-lg-6">
                <div class="card border rounded-4 p-4 shadow-none">
                    <h6 class="fw-bold text-dark mb-3">Đổi Mật Khẩu Đăng Nhập</h6>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-muted">MẬT KHẨU HIỆN TẠI</label>
                        <input v-model="form_pass.mat_khau_cu" type="password" class="form-control" placeholder="••••••••">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-muted">MẬT KHẨU MỚI</label>
                        <input v-model="form_pass.mat_khau_moi" type="password" class="form-control" placeholder="Tối thiểu 6 ký tự">
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-muted">XÁC NHẬN MẬT KHẨU MỚI</label>
                        <input v-model="form_pass.xac_nhan" type="password" class="form-control" placeholder="Nhập lại mật khẩu mới">
                    </div>
                    <button type="button" class="btn btn-primary rounded-pill px-4" @click="doiMatKhau">
                        Cập nhật mật khẩu
                    </button>
                </div>
            </div>

            <!-- Phiên đăng nhập & Bảo mật 2 lớp -->
            <div class="col-lg-6">
                <div class="card border rounded-4 p-4 shadow-none">
                    <h6 class="fw-bold text-dark mb-3">Quản Lý Phiên Đăng Nhập</h6>
                    <div class="d-flex align-items-center justify-content-between p-3 border rounded-3 mb-3 bg-light">
                        <div>
                            <div class="fw-bold text-dark small"><i class="bx bx-laptop me-1 text-primary"></i>Trình duyệt Web hiện tại</div>
                            <small class="text-muted">Đà Nẵng, Việt Nam · Đang hoạt động</small>
                        </div>
                        <span class="badge bg-success-subtle text-success">Thiết bị này</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'BaoMatTaiKhoanComponent',
    data() {
        return {
            form_pass: {
                mat_khau_cu: '',
                mat_khau_moi: '',
                xac_nhan: ''
            }
        };
    },
    methods: {
        doiMatKhau() {
            if (!this.form_pass.mat_khau_cu || !this.form_pass.mat_khau_moi) {
                if (this.$toast) this.$toast.error('Vui lòng nhập đầy đủ thông tin mật khẩu!');
                return;
            }
            if (this.form_pass.mat_khau_moi !== this.form_pass.xac_nhan) {
                if (this.$toast) this.$toast.error('Xác nhận mật khẩu mới không khớp!');
                return;
            }
            if (this.$toast) {
                this.$toast.success('Đã cập nhật mật khẩu mới thành công!');
            }
            this.form_pass = { mat_khau_cu: '', mat_khau_moi: '', xac_nhan: '' };
        }
    }
};
</script>

<style></style>
