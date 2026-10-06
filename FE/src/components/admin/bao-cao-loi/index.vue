<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-bug me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Quản Lý Báo Cáo Lỗi & Phản Hồi</span>
                        </div>
                        <span class="badge bg-danger px-3 py-2">3 báo cáo chưa xử lý</span>
                    </div>
                    <hr>
                    <ul class="nav nav-tabs nav-danger mb-3">
                        <li class="nav-item"><button class="nav-link" :class="{ active: tab === 'chua' }" @click="tab = 'chua'">Chưa Xử Lý <span class="badge bg-danger ms-1">3</span></button></li>
                        <li class="nav-item"><button class="nav-link" :class="{ active: tab === 'dang' }" @click="tab = 'dang'">Đang Xử Lý</button></li>
                        <li class="nav-item"><button class="nav-link" :class="{ active: tab === 'xong' }" @click="tab = 'xong'">Đã Giải Quyết</button></li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="18%">Người Gửi</th>
                                    <th width="20%">Loại Lỗi</th>
                                    <th width="30%">Nội Dung Mô Tả</th>
                                    <th class="text-center" width="12%">Ngày Gửi</th>
                                    <th class="text-center" width="15%">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(report, index) in filteredReports" :key="report.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td>
                                        <div class="fw-bold">{{ report.nguoi_gui }}</div>
                                        <small class="text-muted">{{ report.email }}</small>
                                    </td>
                                    <td><span class="badge" :class="report.badge">{{ report.loai_loi }}</span></td>
                                    <td class="text-muted">{{ report.mo_ta }}</td>
                                    <td class="text-center">{{ report.ngay }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-primary btn-sm me-1" title="Xem chi tiết"><i class="bx bx-show"></i></button>
                                        <button class="btn btn-success btn-sm me-1" title="Đánh dấu đã xử lý"><i class="bx bx-check"></i></button>
                                        <button class="btn btn-outline-secondary btn-sm" title="Đóng báo cáo"><i class="bx bx-x"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'AdminBaoCaoLoi',
    data() {
        return {
            tab: 'chua',
            reports: [
                { id: 1, nguoi_gui: 'Nguyễn Văn An', email: 'an.nguyen@gmail.com', loai_loi: 'Lỗi thanh toán', badge: 'bg-danger', mo_ta: 'Không thể hoàn thành bước thanh toán VNPay, bị treo trang sau khi nhập OTP.', ngay: '05/10/2026', trang_thai: 'chua' },
                { id: 2, nguoi_gui: 'Trần Thị Mai', email: 'mai.tran@gmail.com', loai_loi: 'Lỗi hiển thị', badge: 'bg-warning text-dark', mo_ta: 'Hình ảnh tour Bà Nà không tải được trên Safari iOS.', ngay: '04/10/2026', trang_thai: 'chua' },
                { id: 3, nguoi_gui: 'Lê Hồng Phúc', email: 'phuc.le@outlook.com', loai_loi: 'Thông tin sai', badge: 'bg-info', mo_ta: 'Giá tour Cù Lao Chàm hiển thị sai, không khớp khi đặt chỗ.', ngay: '03/10/2026', trang_thai: 'chua' },
                { id: 4, nguoi_Gui: 'Phan Thu Hà', email: 'ha.phan@gmail.com', loai_loi: 'Góp ý UX', badge: 'bg-secondary', mo_ta: 'Trang tìm kiếm tour nên thêm bộ lọc theo số ngày.', ngay: '01/10/2026', trang_thai: 'xong' }
            ]
        }
    },
    computed: {
        filteredReports() {
            return this.reports.filter(r => r.trang_thai === this.tab);
        }
    }
}
</script>
