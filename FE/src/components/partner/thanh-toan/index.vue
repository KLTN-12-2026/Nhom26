<template>
    <div class="partner-thanh-toan-container">
        <!-- Banner Title -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 page-banner-card">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-pink text-white px-3 py-1 rounded-pill font-11 fw-bold">
                                TÀI CHÍNH & ĐỐI SOÁT
                            </span>
                            <span class="text-muted small">/ Cổng thanh toán B2B</span>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Quản Lý Thanh Toán & Đối Soát Doanh Thu</h3>
                        <p class="text-muted small mb-0">
                            Theo dõi dòng tiền cọc của du khách, đối soát hoa hồng nền tảng và quản lý lệnh rút tiền về tài khoản ngân hàng.
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-pink rounded-3 px-3 py-2 fw-semibold" @click="xuatSaoKe">
                            <i class="bx bx-download me-1"></i> Xuất Sao Kê
                        </button>
                        <button class="btn btn-pink text-white rounded-3 px-3 py-2 fw-semibold shadow-sm" @click="moModalRutTien">
                            <i class="bx bx-wallet me-1"></i> Yêu Cầu Rút Tiền
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 Financial Cards -->
        <div class="row row-cols-1 row-cols-md-3 g-3 mb-4">
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 border-start-pink">
                    <span class="small text-muted fw-bold text-uppercase">TỔNG THỰC THU THÁNG 10</span>
                    <h3 class="fw-bold text-dark my-1">485.600.000 đ</h3>
                    <div class="small text-success fw-semibold"><i class="bx bx-trending-up"></i> +18.2% so với tháng trước</div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <span class="small text-muted fw-bold text-uppercase">HOA HỒNG NỀN TẢNG (10%)</span>
                    <h3 class="fw-bold text-pink my-1">48.560.000 đ</h3>
                    <div class="small text-muted">Đã tự động khấu trừ theo hợp đồng</div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 border-start-pink">
                    <span class="small text-muted fw-bold text-uppercase">SỐ DƯ KHẢ DỤNG RÚT VỀ</span>
                    <h3 class="fw-bold text-success my-1">437.040.000 đ</h3>
                    <div class="small text-muted">Chuyển khoản trong vòng 2 giờ làm việc</div>
                </div>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
                <h5 class="fw-bold text-dark mb-0"><i class="bx bx-list-check text-pink me-2"></i>Lịch Sử Giao Dịch & Đối Soát</h5>
                <div class="d-flex gap-2">
                    <select class="form-select form-select-sm" style="width: 150px;" v-model="filterGateway">
                        <option value="">Tất cả cổng</option>
                        <option value="VNPAY">VNPAY QR</option>
                        <option value="MoMo">MoMo</option>
                        <option value="VietQR">VietQR Pro</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small">
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th width="18%">Mã Giao Dịch</th>
                            <th width="26%">Tuyến Tour & Dịch Vụ</th>
                            <th width="16%">Khách Hàng</th>
                            <th class="text-end" width="13%">Số Tiền</th>
                            <th class="text-center" width="10%">Phương Thức</th>
                            <th class="text-center" width="12%">Thời Gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(tx, i) in filteredTx" :key="tx.id">
                            <td class="text-center fw-bold">{{ i + 1 }}</td>
                            <td><code>{{ tx.ma_gd }}</code></td>
                            <td><strong class="text-dark">{{ tx.ten_tour }}</strong></td>
                            <td>{{ tx.khach_hang }}</td>
                            <td class="text-end fw-bold text-pink">{{ tx.so_tien.toLocaleString() }} đ</td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark fw-bold">{{ tx.phuong_thuc }}</span>
                            </td>
                            <td class="text-center text-muted small">{{ tx.ngay }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DoiTacThanhToan',
    data() {
        return {
            filterGateway: '',
            transactions: [
                { id: 1, ma_gd: 'GD-2026100601', ten_tour: 'Du Thuyền Hạ Long 5 Sao 2N1Đ', khach_hang: 'Lê Tuấn Kiệt', so_tien: 14850000, ngay: '17/05/2026 08:15', phuong_thuc: 'VNPAY' },
                { id: 2, ma_gd: 'GD-2026100602', ten_tour: 'Tour Tràng An Bái Đính 1N VIP', khach_hang: 'Nguyễn Thị Mai Anh', so_tien: 3800000, ngay: '17/05/2026 07:50', phuong_thuc: 'MoMo' },
                { id: 3, ma_gd: 'GD-2026100603', ten_tour: 'Thuê xe máy phượt & Trekking Fansipan', khach_hang: 'Trần Minh Hoàng', so_tien: 5400000, ngay: '16/05/2026 21:40', phuong_thuc: 'VietQR' },
                { id: 4, ma_gd: 'GD-2026100604', ten_tour: 'Tour Phú Quốc Sunset 4N3Đ Trọn Gói', khach_hang: 'Phạm Bảo Châu', so_tien: 22600000, ngay: '16/05/2026 18:22', phuong_thuc: 'VNPAY' }
            ]
        }
    },
    computed: {
        filteredTx() {
            if (!this.filterGateway) return this.transactions;
            return this.transactions.filter(t => t.phuong_thuc === this.filterGateway);
        }
    },
    methods: {
        xuatSaoKe() {
            alert('Đang trích xuất sao kê giao dịch ngân hàng...');
        },
        moModalRutTien() {
            alert('Yêu cầu rút 437.040.000 đ về tài khoản Techcombank số 1903456789 đã được ghi nhận.');
        }
    }
}
</script>

<style scoped>
.bg-pink {
    background-color: #e11d48 !important;
}
.text-pink {
    color: #e11d48 !important;
}
.btn-pink {
    background-color: #e11d48;
    border-color: #e11d48;
}
.btn-pink:hover {
    background-color: #be123c;
    border-color: #be123c;
}
.btn-outline-pink {
    border: 1px solid #fecdd3;
    color: #e11d48;
}
.btn-outline-pink:hover {
    background-color: #fff1f2;
    color: #be123c;
}
.border-start-pink {
    border-left: 3px solid #e11d48;
}
</style>
