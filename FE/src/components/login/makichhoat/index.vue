<template>
  <div class="activation-page-wrapper">
    <!-- Nút quay lại Đăng nhập -->
    <router-link to="/login" class="back-link" title="Quay lại Đăng nhập">
      <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="19" y1="12" x2="5" y2="12"></line>
        <polyline points="12 19 5 12 12 5"></polyline>
      </svg>
      <span>Đăng nhập</span>
    </router-link>

    <!-- Hộp Card Kích Hoạt -->
    <div class="activation-card">
      <!-- Icon biểu tượng phong bì / bảo mật -->
      <div class="badge-icon-wrap">
        <div class="badge-icon">
          <svg viewBox="0 0 24 24" width="34" height="34" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
          </svg>
        </div>
      </div>

      <!-- Tiêu đề & Hướng dẫn -->
      <h1 class="card-title">Kích Hoạt Tài Khoản</h1>
      <p class="card-subtitle">
        Mã xác thực gồm 6 chữ số đã được gửi đến địa chỉ email:
      </p>

      <!-- Địa chỉ email -->
      <div class="email-badge">
        <span class="email-text">{{ email || 'user@example.com' }}</span>
        <button class="btn-change-email" @click="promptChangeEmail" title="Đổi email nhận mã">
          Thay đổi
        </button>
      </div>

      <!-- Form nhập mã 6 số OTP -->
      <form @submit.prevent="handleVerifyOtp" class="otp-form">
        <div class="otp-inputs-row" @paste="handlePaste">
          <input
            v-for="(digit, index) in 6"
            :key="index"
            :ref="el => otpInputs[index] = el"
            type="text"
            maxlength="1"
            inputmode="numeric"
            pattern="[0-9]*"
            v-model="otpDigits[index]"
            @input="onDigitInput(index, $event)"
            @keydown="onDigitKeydown(index, $event)"
            class="otp-digit-box"
            :class="{ 'filled': otpDigits[index] !== '' }"
            autocomplete="off"
          />
        </div>

        <p class="tip-text">
          <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="16" x2="12" y2="12"></line>
            <line x1="12" y1="8" x2="12.01" y2="8"></line>
          </svg>
          Kiểm tra kỹ cả thư mục Thư rác (Spam) hoặc Quảng cáo nếu chưa thấy mã.
        </p>

        <!-- Nút Xác Nhận -->
        <button type="submit" class="btn-submit" :disabled="loading || !isOtpComplete">
          <span v-if="loading" class="spinner-border-sm me-2"></span>
          {{ loading ? 'ĐANG XÁC THỰC...' : 'XÁC NHẬN KÍCH HOẠT' }}
        </button>

        <!-- Đếm ngược gửi lại mã -->
        <div class="resend-block">
          <span class="resend-text">Chưa nhận được mã kích hoạt?</span>
          <button
            type="button"
            class="btn-resend"
            :disabled="countdown > 0 || resending"
            @click="handleResendCode"
          >
            {{ countdown > 0 ? `Gửi lại sau (${countdown}s)` : (resending ? 'Đang gửi...' : 'Gửi lại mã ngay') }}
          </button>
        </div>
      </form>
    </div>

    <!-- Footer bản quyền -->
    <div class="activation-footer text-center mt-3">
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
import api from '@/axios';

export default {
  name: 'MaKichHoat',
  data() {
    return {
      email: '',
      otpDigits: ['', '', '', '', '', ''],
      otpInputs: [],
      loading: false,
      resending: false,
      countdown: 60,
      timer: null,
      toast: {
        show: false,
        message: '',
        type: 'info'
      },
      toastTimer: null
    };
  },
  computed: {
    isOtpComplete() {
      return this.otpDigits.every(d => d !== '');
    },
    fullOtpCode() {
      return this.otpDigits.join('');
    }
  },
  mounted() {
    // Nhận email từ Query String nếu có (vd: /kich-hoat?email=test@gmail.com)
    if (this.$route && this.$route.query && this.$route.query.email) {
      this.email = this.$route.query.email;
    } else {
      this.email = '';
    }

    this.startCountdown();

    // Focus vào ô đầu tiên
    this.$nextTick(() => {
      if (this.otpInputs[0]) {
        this.otpInputs[0].focus();
      }
    });
  },
  beforeUnmount() {
    if (this.timer) clearInterval(this.timer);
    if (this.toastTimer) clearTimeout(this.toastTimer);
  },
  methods: {
    startCountdown() {
      this.countdown = 60;
      if (this.timer) clearInterval(this.timer);
      this.timer = setInterval(() => {
        if (this.countdown > 0) {
          this.countdown--;
        } else {
          clearInterval(this.timer);
        }
      }, 1000);
    },
    onDigitInput(index, event) {
      const val = event.data || event.target.value;
      if (!val) {
        this.otpDigits[index] = '';
        return;
      }

      // Chỉ lấy ký tự số cuối cùng
      const lastChar = val.replace(/[^0-9]/g, '').slice(-1);
      this.otpDigits[index] = lastChar;

      if (lastChar && index < 5) {
        this.$nextTick(() => {
          if (this.otpInputs[index + 1]) {
            this.otpInputs[index + 1].focus();
          }
        });
      }
    },
    onDigitKeydown(index, event) {
      // Khi nhấn Backspace và ô hiện tại đang trống -> quay lại ô trước
      if (event.key === 'Backspace' && !this.otpDigits[index] && index > 0) {
        this.otpDigits[index - 1] = '';
        if (this.otpInputs[index - 1]) {
          this.otpInputs[index - 1].focus();
        }
      } else if (event.key === 'ArrowLeft' && index > 0) {
        if (this.otpInputs[index - 1]) {
          this.otpInputs[index - 1].focus();
        }
      } else if (event.key === 'ArrowRight' && index < 5) {
        if (this.otpInputs[index + 1]) {
          this.otpInputs[index + 1].focus();
        }
      }
    },
    handlePaste(event) {
      event.preventDefault();
      const pasteText = (event.clipboardData || window.clipboardData).getData('text');
      const numbers = pasteText.replace(/[^0-9]/g, '').slice(0, 6);
      if (!numbers) return;

      for (let i = 0; i < 6; i++) {
        this.otpDigits[i] = numbers[i] || '';
      }

      const focusIdx = Math.min(numbers.length, 5);
      this.$nextTick(() => {
        if (this.otpInputs[focusIdx]) {
          this.otpInputs[focusIdx].focus();
        }
      });
    },
    promptChangeEmail() {
      const newEmail = prompt('Nhập địa chỉ email mới để nhận mã:', this.email);
      if (newEmail && newEmail.trim() !== '') {
        this.email = newEmail.trim();
        this.showToast(`Đã đổi sang email: ${this.email}. Vui lòng nhấn gửi lại mã!`, 'info');
        this.countdown = 0;
      }
    },
    showToast(message, type = 'info') {
      if (this.$toast) {
        if (type === 'success') this.$toast.success(message);
        else if (type === 'error') this.$toast.error(message);
        else if (type === 'warning') this.$toast.warning(message);
        else this.$toast.info(message);
      }
      if (this.toastTimer) clearTimeout(this.toastTimer);
      this.toast = { show: true, message, type };
      this.toastTimer = setTimeout(() => {
        this.toast.show = false;
      }, 3500);
    },
    handleVerifyOtp() {
      if (!this.isOtpComplete) {
        this.showToast('Vui lòng nhập đủ 6 chữ số mã kích hoạt!', 'warning');
        return;
      }

      this.loading = true;
      api.post('/api/xac-thuc', {
        ma_xac_thuc: this.fullOtpCode,
        email: this.email ? this.email.trim() : null
      })
      .then(res => {
        if (res.data.status == 1) {
          this.showToast(res.data.message || 'Kích hoạt tài khoản thành công!', 'success');
          setTimeout(() => {
            this.$router.push('/login');
          }, 1500);
        } else {
          this.showToast(res.data.message || 'Mã xác thực không đúng!', 'error');
        }
      })
      .catch(err => {
        const msg = (err.response && err.response.data && err.response.data.message) || 'Có lỗi xảy ra khi xác thực!';
        this.showToast(msg, 'error');
      })
      .finally(() => {
        this.loading = false;
      });
    },
    handleResendCode() {
      if (this.countdown > 0) return;
      if (!this.email) {
        this.showToast('Vui lòng nhập email trước khi gửi lại mã!', 'warning');
        return;
      }

      this.resending = true;
      api.post('/api/gui-lai-ma', {
        email: this.email.trim()
      })
      .then(res => {
        if (res.data.status == 1) {
          this.showToast(res.data.message || `Mã kích hoạt mới đã được gửi tới ${this.email}`, 'success');
          this.startCountdown();
        } else {
          this.showToast(res.data.message || 'Không thể gửi lại mã!', 'error');
        }
      })
      .catch(err => {
        const msg = (err.response && err.response.data && err.response.data.message) || 'Có lỗi xảy ra!';
        this.showToast(msg, 'error');
      })
      .finally(() => {
        this.resending = false;
      });
    }
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');

* {
  box-sizing: border-box;
}

/* Nền trang: Màu xanh da trời đồng bộ với trang Đăng nhập / Đăng ký */
.activation-page-wrapper {
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

/* Card Kích Hoạt */
.activation-card {
  background: #ffffff;
  border-radius: 28px;
  box-shadow: 0 20px 45px rgba(2, 132, 199, 0.2), 0 8px 20px rgba(0, 0, 0, 0.08);
  width: 520px;
  max-width: 100%;
  padding: 45px 40px;
  text-align: center;
  position: relative;
  transition: all 0.3s ease;
}

/* Biểu tượng phong bì */
.badge-icon-wrap {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.badge-icon {
  width: 72px;
  height: 72px;
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
  margin: 0 0 8px 0;
  letter-spacing: -0.5px;
}

.card-subtitle {
  font-size: 13.5px;
  color: #64748b;
  margin: 0 0 14px 0;
  line-height: 20px;
}

/* Khối hiển thị email */
.email-badge {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: #f1f5f9;
  padding: 7px 16px;
  border-radius: 999px;
  margin-bottom: 26px;
  border: 1px solid #e2e8f0;
}

.email-text {
  font-size: 13.5px;
  font-weight: 700;
  color: #0369a1;
}

.btn-change-email {
  background: transparent;
  border: none;
  color: #64748b;
  font-size: 11.5px;
  font-weight: 600;
  cursor: pointer;
  text-decoration: underline;
  padding: 0;
  transition: color 0.2s;
}

.btn-change-email:hover {
  color: #0284c7;
}

/* Các ô nhập mã OTP */
.otp-inputs-row {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-bottom: 18px;
}

.otp-digit-box {
  width: 52px;
  height: 58px;
  border-radius: 12px;
  border: 2px solid #e2e8f0;
  background-color: #f8fafc;
  text-align: center;
  font-size: 24px;
  font-weight: 800;
  color: #0f172a;
  outline: none;
  font-family: inherit;
  transition: all 0.2s ease;
}

.otp-digit-box:focus {
  border-color: #0284c7;
  background-color: #ffffff;
  box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.18);
  transform: translateY(-2px);
}

.otp-digit-box.filled {
  border-color: #38bdf8;
  background-color: #f0f9ff;
}

/* Dòng lưu ý */
.tip-text {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  font-size: 12px;
  color: #94a3b8;
  margin-bottom: 24px;
  line-height: 18px;
}

/* Nút Submit chính */
.btn-submit {
  width: 100%;
  border-radius: 10px;
  border: none;
  background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
  color: #ffffff;
  font-size: 13.5px;
  font-weight: 700;
  padding: 13px 20px;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  transition: all 0.25s ease;
  cursor: pointer;
  box-shadow: 0 6px 18px rgba(2, 132, 199, 0.35);
  margin-bottom: 22px;
}

.btn-submit:hover:not(:disabled) {
  background: linear-gradient(135deg, #0369a1 0%, #075985 100%);
  transform: translateY(-1px);
  box-shadow: 0 8px 22px rgba(2, 132, 199, 0.45);
}

.btn-submit:disabled {
  opacity: 0.65;
  cursor: not-allowed;
  box-shadow: none;
}

/* Khối gửi lại mã */
.resend-block {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  font-size: 13px;
}

.resend-text {
  color: #64748b;
}

.btn-resend {
  background: transparent;
  border: none;
  color: #0284c7;
  font-weight: 700;
  cursor: pointer;
  font-size: 13px;
  padding: 0;
  transition: all 0.2s;
}

.btn-resend:hover:not(:disabled) {
  color: #0369a1;
  text-decoration: underline;
}

.btn-resend:disabled {
  color: #94a3b8;
  cursor: not-allowed;
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
  .activation-card {
    padding: 35px 22px;
    border-radius: 22px;
  }

  .otp-digit-box {
    width: 44px;
    height: 50px;
    font-size: 20px;
    border-radius: 10px;
  }

  .otp-inputs-row {
    gap: 6px;
  }

  .card-title {
    font-size: 23px;
  }
}
</style>
