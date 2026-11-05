<template>
    <div class="auth-page-wrapper">
        <!-- Nút quay lại Đăng nhập -->
        <router-link to="/login" class="back-link" title="Quay lại Đăng nhập">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            <span>Đăng nhập</span>
        </router-link>

        <!-- Hộp Card Quên Mật Khẩu -->
        <div class="auth-card">
            <!-- Icon biểu tượng chìa khóa / bảo mật -->
            <div class="badge-icon-wrap">
                <div class="badge-icon">
                    <svg viewBox="0 0 24 24" width="34" height="34" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </div>
            </div>

            <!-- Tiêu đề & phụ đề -->
            <h1 class="card-title">Quên Mật Khẩu</h1>
            <p class="card-subtitle">
                Xác thực thông tin tài khoản của bạn để thiết lập lại mật khẩu mới
            </p>

            <!-- Form Quên Mật Khẩu (5 trường như Đăng ký, đổi mật khẩu mới) -->
            <form @submit.prevent="handleResetPassword" class="auth-form">
                <div class="input-group-custom">
                    <input type="text" v-model="formData.name" placeholder="Họ và tên" required />
                </div>

                <div class="input-group-custom">
                    <input type="tel" v-model="formData.phone" placeholder="Số điện thoại" required />
                </div>

                <div class="input-group-custom">
                    <input type="email" v-model="formData.email" placeholder="Địa chỉ Email" required />
                </div>

                <div class="input-group-custom">
                    <input type="password" v-model="formData.newPassword" placeholder="Mật khẩu mới" required />
                </div>

                <div class="input-group-custom">
                    <input type="password" v-model="formData.confirmNewPassword" placeholder="Xác nhận mật khẩu mới"
                        required />
                </div>

                <!-- Nút gửi -->
                <button type="submit" class="btn-solid" :disabled="loading">
                    <span v-if="loading" class="spinner-border-sm me-2"></span>
                    {{ loading ? 'ĐANG CẬP NHẬT...' : 'ĐẶT LẠI MẬT KHẨU' }}
                </button>

                <!-- Liên kết quay về đăng nhập -->
                <div class="bottom-link-row">
                    <span>Đã nhớ lại mật khẩu?</span>
                    <router-link to="/login" class="link-action">Đăng nhập ngay</router-link>
                </div>
            </form>
        </div>

        <!-- Footer bản quyền -->
        <div class="auth-footer text-center mt-3">
            <small style="color: #64748b; font-size: 12px;">
                © 2026 <strong>Đà Nẵng Smart Travel</strong>
            </small>
        </div>

        <!-- Toast thông báo -->
        <transition name="toast-fade">
            <div v-if="toast.show" :class="['custom-toast', toast.type]">
                <span class="toast-icon">{{ toast.type === 'success' ? '✓' : 'ℹ' }}</span>
                <span>{{ toast.message }}</span>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: 'QuenMatKhau',
    data() {
        return {
            formData: {
                name: '',
                phone: '',
                email: '',
                newPassword: '',
                confirmNewPassword: ''
            },
            loading: false,
            toast: {
                show: false,
                message: '',
                type: 'info'
            },
            toastTimer: null
        };
    },
    beforeUnmount() {
        if (this.toastTimer) clearTimeout(this.toastTimer);
    },
    methods: {
        showToast(message, type = 'info') {
            if (this.toastTimer) clearTimeout(this.toastTimer);
            this.toast = { show: true, message, type };
            this.toastTimer = setTimeout(() => {
                this.toast.show = false;
            }, 3500);
        },
        handleResetPassword() {
            // 1. Kiểm tra điền đầy đủ
            if (
                !this.formData.name ||
                !this.formData.phone ||
                !this.formData.email ||
                !this.formData.newPassword ||
                !this.formData.confirmNewPassword
            ) {
                this.showToast('Vui lòng điền đầy đủ tất cả các trường thông tin!', 'warning');
                return;
            }

            // 2. Kiểm tra độ dài mật khẩu mới
            if (this.formData.newPassword.length < 6) {
                this.showToast('Mật khẩu mới phải có ít nhất 6 ký tự!', 'warning');
                return;
            }

            // 3. Kiểm tra khớp mật khẩu mới
            if (this.formData.newPassword !== this.formData.confirmNewPassword) {
                this.showToast('Mật khẩu mới và xác nhận mật khẩu không khớp!', 'warning');
                return;
            }

            this.loading = true;
            setTimeout(() => {
                this.loading = false;
                this.showToast('Đặt lại mật khẩu thành công! Đang chuyển hướng về Đăng nhập...', 'success');
                setTimeout(() => {
                    this.$router.push('/login');
                }, 1500);
            }, 700);
        }
    }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');

* {
    box-sizing: border-box;
}

/* Nền trang: Màu xanh da trời đồng bộ 100% với Đăng nhập & Kích hoạt */
.auth-page-wrapper {
    background: radial-gradient(circle at center, #e0f2fe 0%, #bae6fd 45%, #7dd3fc 100%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 24px;
    font-family: 'Montserrat', sans-serif;
    position: relative;
    overflow: hidden;
}

/* Nút quay lại */
.back-link {
    position: absolute;
    top: 24px;
    left: 28px;
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(8px);
    color: #0284c7;
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 600;
    padding: 8px 18px;
    border-radius: 999px;
    box-shadow: 0 4px 14px rgba(2, 132, 199, 0.15);
    transition: all 0.25s ease;
    z-index: 10;
}

.back-link:hover {
    background: #ffffff;
    color: #0369a1;
    transform: translateX(-3px);
    box-shadow: 0 6px 18px rgba(2, 132, 199, 0.25);
}

/* Hộp Card */
.auth-card {
    background: #ffffff;
    border-radius: 28px;
    box-shadow: 0 20px 45px rgba(2, 132, 199, 0.2), 0 8px 20px rgba(0, 0, 0, 0.08);
    width: 500px;
    max-width: 100%;
    padding: 42px 40px;
    text-align: center;
    position: relative;
    transition: all 0.3s ease;
}

/* Huy hiệu icon khóa bảo mật */
.badge-icon-wrap {
    display: flex;
    justify-content: center;
    margin-bottom: 18px;
}

.badge-icon {
    width: 70px;
    height: 70px;
    border-radius: 22px;
    background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
    color: #0284c7;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 20px rgba(2, 132, 199, 0.18);
    border: 1.5px solid rgba(255, 255, 255, 0.8);
}

/* Tiêu đề & phụ đề */
.card-title {
    font-size: 27px;
    font-weight: 800;
    color: #0f172a;
    margin: 0 0 6px 0;
    letter-spacing: -0.5px;
}

.card-subtitle {
    font-size: 13px;
    color: #64748b;
    margin: 0 0 22px 0;
    line-height: 19px;
    padding: 0 10px;
}

/* Form */
.auth-form {
    display: flex;
    flex-direction: column;
    width: 100%;
}

/* Ô nhập liệu */
.input-group-custom {
    width: 100%;
    margin: 5px 0;
}

.input-group-custom input {
    background-color: #f1f5f9;
    border: 1.5px solid transparent;
    padding: 12px 16px;
    font-size: 13.5px;
    border-radius: 9px;
    width: 100%;
    outline: none;
    color: #0f172a;
    font-family: inherit;
    transition: all 0.25s ease;
}

.input-group-custom input::placeholder {
    color: #94a3b8;
    font-size: 13px;
    font-weight: 400;
}

.input-group-custom input:focus {
    background-color: #ffffff;
    border-color: #0284c7;
    box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.15);
}

/* Nút Submit chính */
.btn-solid {
    border-radius: 9px;
    border: none;
    background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    padding: 13px 20px;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    transition: all 0.25s ease;
    cursor: pointer;
    box-shadow: 0 6px 18px rgba(2, 132, 199, 0.35);
    margin-top: 14px;
}

.btn-solid:hover:not(:disabled) {
    background: linear-gradient(135deg, #0369a1 0%, #075985 100%);
    transform: translateY(-1px);
    box-shadow: 0 8px 22px rgba(2, 132, 199, 0.45);
}

.btn-solid:active {
    transform: scale(0.97);
}

.btn-solid:disabled {
    opacity: 0.65;
    cursor: not-allowed;
    box-shadow: none;
}

/* Liên kết dưới cùng */
.bottom-link-row {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 13px;
    color: #64748b;
    margin-top: 20px;
}

.link-action {
    color: #0284c7;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.2s;
}

.link-action:hover {
    color: #0369a1;
    text-decoration: underline;
}

/* Toast */
.custom-toast {
    position: fixed;
    bottom: 24px;
    left: 50%;
    transform: translateX(-50%);
    padding: 11px 24px;
    border-radius: 50px;
    background: #0f172a;
    color: #ffffff;
    font-size: 13px;
    font-weight: 600;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
    display: flex;
    align-items: center;
    gap: 10px;
    z-index: 999;
}

.custom-toast.success {
    background: #0284c7;
}

.custom-toast.warning {
    background: #d97706;
}

.custom-toast.info {
    background: #0369a1;
}

.toast-icon {
    font-weight: bold;
}

.toast-fade-enter-active,
.toast-fade-leave-active {
    transition: all 0.3s ease;
}

.toast-fade-enter-from,
.toast-fade-leave-to {
    opacity: 0;
    transform: translate(-50%, 15px);
}

/* Responsive */
@media (max-width: 576px) {
    .auth-card {
        padding: 32px 20px;
        border-radius: 22px;
    }

    .card-title {
        font-size: 24px;
    }
}
</style>
