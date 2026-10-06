<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-shopping-bag me-1 font-22 text-primary"></i>
                            <span class="h5 mb-0 text-primary fw-bold">Đặt Tour & Thanh Toán</span>
                        </div>
                    </div>
                    <hr>
                    <!-- Bước đặt tour -->
                    <div class="row g-4">
                        <div class="col-md-8">
                            <!-- Step indicator -->
                            <ul class="nav nav-pills nav-justified mb-4 border rounded p-2 bg-light">
                                <li class="nav-item" v-for="(step, i) in steps" :key="i">
                                    <button class="nav-link" :class="{ active: currentStep === i }" @click="currentStep = i">
                                        {{ step }}
                                    </button>
                                </li>
                            </ul>

                            <!-- Step 1: Chọn lịch & số khách -->
                            <div v-if="currentStep === 0" class="card border-0 bg-light p-4">
                                <h6 class="fw-bold mb-3">Tour: <span class="text-primary">Bà Nà Hills - Cầu Vàng Tiên Cảnh</span></h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Ngày Khởi Hành</label>
                                        <select class="form-select" v-model="booking.ngay">
                                            <option>08/10/2026 (Còn 18 chỗ)</option>
                                            <option>12/10/2026 (Còn 5 chỗ)</option>
                                            <option>15/10/2026 (Còn 22 chỗ)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">Người Lớn</label>
                                        <input type="number" class="form-control" v-model="booking.nguoi_lon" min="1" max="10">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">Trẻ Em</label>
                                        <input type="number" class="form-control" v-model="booking.tre_em" min="0" max="10">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Mã Voucher (nếu có)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" v-model="booking.voucher" placeholder="Nhập mã giảm giá">
                                            <button class="btn btn-outline-primary">Áp Dụng</button>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-3" @click="currentStep = 1">Tiếp Theo <i class="bx bx-right-arrow-alt"></i></button>
                            </div>

                            <!-- Step 2: Thông tin khách -->
                            <div v-if="currentStep === 1" class="card border-0 bg-light p-4">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Họ Và Tên Liên Hệ</label>
                                        <input type="text" class="form-control" v-model="booking.ho_ten" placeholder="Nguyễn Văn A">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Số Điện Thoại</label>
                                        <input type="tel" class="form-control" v-model="booking.sdt">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Email Nhận Vé</label>
                                        <input type="email" class="form-control" v-model="booking.email">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Ghi Chú Đặc Biệt</label>
                                        <textarea class="form-control" rows="2" placeholder="Ăn chay, dị ứng thực phẩm, yêu cầu đặc biệt..."></textarea>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-outline-secondary" @click="currentStep = 0"><i class="bx bx-left-arrow-alt"></i> Quay Lại</button>
                                    <button class="btn btn-primary" @click="currentStep = 2">Tiếp Theo <i class="bx bx-right-arrow-alt"></i></button>
                                </div>
                            </div>

                            <!-- Step 3: Thanh toán -->
                            <div v-if="currentStep === 2" class="card border-0 bg-light p-4">
                                <h6 class="fw-bold mb-3">Chọn Phương Thức Thanh Toán</h6>
                                <div class="d-flex flex-column gap-3">
                                    <label class="d-flex align-items-center gap-3 p-3 border rounded cursor-pointer" v-for="pm in paymentMethods" :key="pm.id" :class="booking.payment === pm.id ? 'border-primary bg-white' : 'bg-white'">
                                        <input type="radio" :value="pm.id" v-model="booking.payment" class="form-check-input mt-0">
                                        <i :class="pm.icon + ' font-22 text-primary'"></i>
                                        <span class="fw-bold">{{ pm.name }}</span>
                                    </label>
                                </div>
                                <div class="d-flex gap-2 mt-4">
                                    <button class="btn btn-outline-secondary" @click="currentStep = 1"><i class="bx bx-left-arrow-alt"></i> Quay Lại</button>
                                    <button class="btn btn-success flex-grow-1"><i class="bx bx-check-circle me-2"></i>Xác Nhận & Thanh Toán {{ tongTien.toLocaleString() }}đ</button>
                                </div>
                            </div>
                        </div>

                        <!-- Tóm tắt đơn -->
                        <div class="col-md-4">
                            <div class="card border-primary border-2 sticky-top" style="top:90px">
                                <div class="card-header bg-primary text-white fw-bold"><i class="bx bx-receipt me-2"></i>Tóm Tắt Đơn Hàng</div>
                                <div class="card-body">
                                    <p class="fw-bold mb-1">Bà Nà Hills - Cầu Vàng</p>
                                    <small class="text-muted d-block mb-3">{{ booking.ngay }}</small>
                                    <div class="d-flex justify-content-between"><span>Người lớn (x{{ booking.nguoi_lon }}):</span><span>{{ (1250000 * booking.nguoi_lon).toLocaleString() }}đ</span></div>
                                    <div class="d-flex justify-content-between"><span>Trẻ em (x{{ booking.tre_em }}):</span><span>{{ (625000 * booking.tre_em).toLocaleString() }}đ</span></div>
                                    <hr>
                                    <div class="d-flex justify-content-between fw-bold text-primary fs-5"><span>Tổng Cộng:</span><span>{{ tongTien.toLocaleString() }}đ</span></div>
                                </div>
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
    name: 'ClientDatTour',
    data() {
        return {
            currentStep: 0,
            steps: ['1. Chọn Lịch', '2. Thông Tin', '3. Thanh Toán'],
            booking: { ngay: '08/10/2026 (Còn 18 chỗ)', nguoi_lon: 2, tre_em: 0, voucher: '', ho_ten: '', sdt: '', email: '', payment: 'vnpay' },
            paymentMethods: [
                { id: 'vnpay', name: 'VNPay (QR / ATM / Thẻ)', icon: 'bx bx-credit-card' },
                { id: 'momo', name: 'Ví MoMo', icon: 'bx bx-wallet' },
                { id: 'banking', name: 'Chuyển Khoản Ngân Hàng', icon: 'bx bx-building' }
            ]
        }
    },
    computed: {
        tongTien() {
            return (1250000 * this.booking.nguoi_lon) + (625000 * this.booking.tre_em);
        }
    }
}
</script>
