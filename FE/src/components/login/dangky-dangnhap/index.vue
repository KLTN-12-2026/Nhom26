<template>
  <div class="auth-page-wrapper">
    <!-- Nút quay lại Trang chủ -->
    <router-link to="/" class="back-home-link" title="Quay lại Trang chủ">
      <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"
        stroke-linecap="round" stroke-linejoin="round">
        <line x1="19" y1="12" x2="5" y2="12"></line>
        <polyline points="12 19 5 12 12 5"></polyline>
      </svg>
      <span>Trang chủ</span>
    </router-link>

    <!-- Hộp Card Đăng nhập / Đăng ký 2 trong 1 -->
    <div class="auth-container" :class="{ 'active': isSignUp }">
      <!-- FORM ĐĂNG KÝ (BÊN PHẢI KHI KÍCH HOẠT) -->
      <div class="form-container sign-up-container">
        <form @submit.prevent="handleSignUp">
          <h1 class="auth-title">Đăng Ký Tài Khoản</h1>
          <p class="auth-subtitle">Điền đầy đủ thông tin để tạo tài khoản mới</p>

          <div class="input-group-custom">
            <input type="text" v-model="signUpData.name" placeholder="Họ và tên" required />
          </div>

          <div class="input-group-custom">
            <input type="tel" v-model="signUpData.phone" placeholder="Số điện thoại" required />
          </div>

          <div class="input-group-custom">
            <input type="email" v-model="signUpData.email" placeholder="Địa chỉ Email" required />
          </div>

          <div class="input-group-custom">
            <input type="password" v-model="signUpData.password" placeholder="Mật khẩu" required />
          </div>

          <div class="input-group-custom">
            <input type="password" v-model="signUpData.confirmPassword" placeholder="Xác nhận mật khẩu" required />
          </div>

          <button type="submit" class="btn-solid" :disabled="loading">
            {{ loading ? 'ĐANG XỬ LÝ...' : 'ĐĂNG KÝ' }}
          </button>
        </form>
      </div>

      <!-- FORM ĐĂNG NHẬP (BÊN TRÁI MẶC ĐỊNH) -->
      <div class="form-container sign-in-container">
        <form @submit.prevent="handleSignIn">
          <h1 class="auth-title">Đăng Nhập</h1>
          <p class="auth-subtitle">Nhập thông tin tài khoản của bạn để tiếp tục</p>

          <div class="input-group-custom">
            <input type="email" v-model="signInData.email" placeholder="Địa chỉ Email" required />
          </div>

          <div class="input-group-custom">
            <input type="password" v-model="signInData.password" placeholder="Mật khẩu" required />
          </div>

          <router-link to="/quen-mat-khau" class="forgot-password">
            Quên mật khẩu?
          </router-link>

          <button type="submit" class="btn-solid" :disabled="loading">
            {{ loading ? 'ĐANG XỬ LÝ...' : 'ĐĂNG NHẬP' }}
          </button>
        </form>
      </div>

      <!-- PANEL TRƯỢT MÀU XANH DA TRỜI (SLIDING OVERLAY) -->
      <div class="overlay-container">
        <div class="overlay">
          <!-- PANEL TRÁI (HIỂN THỊ KHI FORM ĐĂNG KÝ KÍCH HOẠT) -->
          <div class="overlay-panel overlay-left">
            <h1 class="overlay-title">Chào mừng trở lại!</h1>
            <p class="overlay-desc">
              Nếu bạn đã có tài khoản, hãy đăng nhập ngay để kết nối với hệ thống
            </p>
            <button class="btn-ghost" @click="togglePanel(false)">
              ĐĂNG NHẬP
            </button>
          </div>

          <!-- PANEL PHẢI (HIỂN THỊ KHI FORM ĐĂNG NHẬP KÍCH HOẠT) -->
          <div class="overlay-panel overlay-right">
            <h1 class="overlay-title">Xin chào bạn!</h1>
            <p class="overlay-desc">
              Bạn chưa có tài khoản? Đăng ký ngay để trải nghiệm tất cả dịch vụ và tiện ích
            </p>
            <button class="btn-ghost" @click="togglePanel(true)">
              ĐĂNG KÝ
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Thông báo Toast -->
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
  name: 'AuthLoginRegister',
  data() {
    return {
      // isSignUp = true: Hiển thị Đăng ký bên phải, Panel xanh bên trái
      // isSignUp = false: Hiển thị Đăng nhập bên trái, Panel xanh bên phải
      isSignUp: false,
      loading: false,
      signInData: {
        email: '',
        password: ''
      },
      signUpData: {
        name: '',
        phone: '',
        email: '',
        password: '',
        confirmPassword: ''
      },
      toast: {
        show: false,
        message: '',
        type: 'info'
      },
      toastTimer: null
    };
  },
  mounted() {
    if (this.$route && (this.$route.query.mode === 'signup' || this.$route.query.mode === 'register')) {
      this.isSignUp = true;
    }
  },
  methods: {
    togglePanel(signUp) {
      this.isSignUp = signUp;
    },
    showToast(message, type = 'info') {
      if (this.toastTimer) clearTimeout(this.toastTimer);
      this.toast = { show: true, message, type };
      this.toastTimer = setTimeout(() => {
        this.toast.show = false;
      }, 3500);
    },
    handleSignIn() {
      if (!this.signInData.email || !this.signInData.password) {
        this.showToast('Vui lòng nhập đầy đủ email và mật khẩu!', 'warning');
        return;
      }
      this.loading = true;
      setTimeout(() => {
        this.loading = false;
        this.showToast(`Đăng nhập thành công với tài khoản: ${this.signInData.email}`, 'success');
      }, 600);
    },
    handleSignUp() {
      if (!this.signUpData.name || !this.signUpData.phone || !this.signUpData.email || !this.signUpData.password || !this.signUpData.confirmPassword) {
        this.showToast('Vui lòng điền đầy đủ tất cả thông tin đăng ký!', 'warning');
        return;
      }
      if (this.signUpData.password !== this.signUpData.confirmPassword) {
        this.showToast('Mật khẩu xác nhận không khớp! Vui lòng kiểm tra lại.', 'warning');
        return;
      }
      this.loading = true;
      setTimeout(() => {
        this.loading = false;
        this.showToast(`Đăng ký thành công! Đang chuyển đến trang nhập mã kích hoạt...`, 'success');
        setTimeout(() => {
          this.$router.push({ path: '/kich-hoat', query: { email: this.signUpData.email } });
        }, 1000);
      }, 600);
    },
    handleForgotPassword() {
      this.showToast('Đang gửi hướng dẫn khôi phục mật khẩu về email của bạn...', 'info');
    }
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');

* {
  box-sizing: border-box;
}

/* Nền trang: Màu xanh da trời / ambient sky blue dịu nhẹ */
.auth-page-wrapper {
  background: radial-gradient(circle at center, #e0f2fe 0%, #bae6fd 45%, #7dd3fc 100%);
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  font-family: 'Montserrat', sans-serif;
  min-height: 100vh;
  padding: 24px;
  position: relative;
  overflow: hidden;
}

/* Nút quay về trang chủ */
.back-home-link {
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
  z-index: 200;
}

.back-home-link:hover {
  background: #ffffff;
  color: #0369a1;
  transform: translateX(-3px);
  box-shadow: 0 6px 18px rgba(2, 132, 199, 0.25);
}

/* Khung Card chính */
.auth-container {
  background-color: #ffffff;
  border-radius: 28px;
  box-shadow: 0 20px 45px rgba(2, 132, 199, 0.18), 0 8px 18px rgba(0, 0, 0, 0.08);
  position: relative;
  overflow: hidden;
  width: 820px;
  max-width: 100%;
  min-height: 540px;
  transition: all 0.4s ease;
}

/* Form Container */
.form-container {
  position: absolute;
  top: 0;
  height: 100%;
  transition: all 0.6s cubic-bezier(0.68, -0.15, 0.265, 1.15);
}

.form-container form {
  background-color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 44px;
  height: 100%;
  text-align: center;
}

/* Tiêu đề */
.auth-title {
  font-size: 27px;
  font-weight: 800;
  color: #0f172a;
  margin: 0 0 6px 0;
  letter-spacing: -0.5px;
}

.auth-subtitle {
  font-size: 12.5px;
  color: #64748b;
  margin: 0 0 16px 0;
  font-weight: 400;
}

/* Ô nhập liệu */
.input-group-custom {
  width: 100%;
  margin: 4.5px 0;
}

.input-group-custom input {
  background-color: #f1f5f9;
  border: 1.5px solid transparent;
  padding: 11px 16px;
  font-size: 13px;
  border-radius: 8px;
  width: 100%;
  outline: none;
  color: #0f172a;
  font-family: inherit;
  transition: all 0.25s ease;
}

.input-group-custom input::placeholder {
  color: #94a3b8;
  font-size: 12.5px;
  font-weight: 400;
}

.input-group-custom input:focus {
  background-color: #ffffff;
  border-color: #0284c7;
  box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.15);
}

/* Quên mật khẩu */
.forgot-password {
  color: #64748b;
  font-size: 12.5px;
  text-decoration: none;
  margin: 10px 0 14px;
  transition: color 0.2s;
  font-weight: 500;
}

.forgot-password:hover {
  color: #0284c7;
  text-decoration: underline;
}

/* Nút chính màu Xanh Da Trời */
.btn-solid {
  border-radius: 8px;
  border: none;
  background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
  color: #ffffff;
  font-size: 12.5px;
  font-weight: 700;
  padding: 12px 46px;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  transition: all 0.25s ease;
  cursor: pointer;
  box-shadow: 0 6px 16px rgba(2, 132, 199, 0.35);
  margin-top: 8px;
}

.btn-solid:hover {
  background: linear-gradient(135deg, #0369a1 0%, #075985 100%);
  transform: translateY(-1px);
  box-shadow: 0 8px 20px rgba(2, 132, 199, 0.45);
}

.btn-solid:active {
  transform: scale(0.97);
}

.btn-solid:disabled {
  opacity: 0.7;
  cursor: not-allowed;
}

/* Nút viền trắng ở Panel trượt */
.btn-ghost {
  border-radius: 8px;
  border: 1.5px solid #ffffff;
  background-color: transparent;
  color: #ffffff;
  font-size: 12.5px;
  font-weight: 700;
  padding: 11px 44px;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  transition: all 0.25s ease;
  cursor: pointer;
}

.btn-ghost:hover {
  background-color: #ffffff;
  color: #0284c7;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}

.btn-ghost:active {
  transform: scale(0.97);
}

/* Định vị 2 Form */
.sign-in-container {
  left: 0;
  width: 50%;
  z-index: 2;
}

.sign-up-container {
  left: 0;
  width: 50%;
  opacity: 0;
  z-index: 1;
}

/* Trạng thái kích hoạt Đăng ký */
.auth-container.active .sign-in-container {
  transform: translateX(100%);
  opacity: 0;
}

.auth-container.active .sign-up-container {
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
  animation: showSmooth 0.6s;
}

@keyframes showSmooth {

  0%,
  49.99% {
    opacity: 0;
    z-index: 1;
  }

  50%,
  100% {
    opacity: 1;
    z-index: 5;
  }
}

/* PANEL TRƯỢT MÀU XANH DA TRỜI VỚI ĐƯỜNG CONG ĐẶC TRƯNG */
.overlay-container {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: transform 0.6s cubic-bezier(0.68, -0.15, 0.265, 1.15), border-radius 0.6s ease;
  z-index: 100;
  /* Bo cong bầu sang trái khi ở bên phải (Form Đăng nhập) */
  border-radius: 140px 0 0 90px;
}

/* Khi active: trượt sang trái và bo cong bầu sang phải */
.auth-container.active .overlay-container {
  transform: translateX(-100%);
  border-radius: 0 140px 90px 0;
}

/* Gradient Xanh da trời tươi sáng & hiện đại */
.overlay {
  background: linear-gradient(135deg, #0284c7 0%, #0369a1 50%, #075985 100%);
  color: #ffffff;
  position: relative;
  left: -100%;
  height: 100%;
  width: 200%;
  transform: translateX(0);
  transition: transform 0.6s cubic-bezier(0.68, -0.15, 0.265, 1.15);
}

.auth-container.active .overlay {
  transform: translateX(50%);
}

.overlay-panel {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 38px;
  text-align: center;
  top: 0;
  height: 100%;
  width: 50%;
  transform: translateX(0);
  transition: transform 0.6s cubic-bezier(0.68, -0.15, 0.265, 1.15);
}

.overlay-title {
  font-size: 28px;
  font-weight: 800;
  color: #ffffff;
  margin: 0 0 12px 0;
  letter-spacing: -0.3px;
}

.overlay-desc {
  font-size: 13.5px;
  font-weight: 400;
  line-height: 22px;
  letter-spacing: 0.2px;
  margin: 8px 0 28px 0;
  color: rgba(255, 255, 255, 0.92);
  max-width: 270px;
}

.overlay-left {
  transform: translateX(-20%);
}

.auth-container.active .overlay-left {
  transform: translateX(0);
}

.overlay-right {
  right: 0;
  transform: translateX(0);
}

.auth-container.active .overlay-right {
  transform: translateX(20%);
}

/* Toast Thông báo */
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

/* Responsive cho Mobile & Tablet */
@media (max-width: 768px) {
  .auth-container {
    width: 100%;
    min-height: 640px;
    border-radius: 20px;
  }

  .form-container {
    width: 100%;
    height: 65%;
    top: 35%;
  }

  .form-container form {
    padding: 0 24px;
  }

  .sign-in-container {
    width: 100%;
    transform: translateY(0);
  }

  .sign-up-container {
    width: 100%;
    left: 0;
    transform: translateY(0);
  }

  .overlay-container {
    left: 0;
    top: 0;
    width: 100%;
    height: 35%;
    border-radius: 20px 20px 45px 45px !important;
  }

  .auth-container.active .overlay-container {
    transform: translateY(0);
  }

  .overlay {
    width: 100%;
    height: 200%;
    left: 0;
    top: -100%;
    transform: translateY(0);
  }

  .auth-container.active .overlay {
    transform: translateY(50%);
  }

  .overlay-panel {
    width: 100%;
    height: 50%;
  }

  .auth-container.active .sign-in-container {
    transform: translateY(100%);
  }

  .auth-container.active .sign-up-container {
    transform: translateY(0);
  }
}
</style>
