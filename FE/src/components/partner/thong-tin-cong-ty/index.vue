<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-building-house me-1 font-22 text-warning"></i>
                            <span class="h5 mb-0 text-warning fw-bold">Thông Tin Công Ty / Doanh Nghiệp</span>
                        </div>
                        <button class="btn btn-warning btn-sm px-3"><i class="bx bx-edit"></i> Cập Nhật Thông Tin</button>
                    </div>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tên Công Ty / Doanh Nghiệp</label>
                            <input type="text" class="form-control" v-model="company.ten_cong_ty">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Mã Số Thuế (MST)</label>
                            <input type="text" class="form-control" v-model="company.ma_so_thue">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Loại Hình Kinh Doanh</label>
                            <select class="form-select" v-model="company.loai_hinh">
                                <option>Công ty TNHH</option>
                                <option>Công ty Cổ phần</option>
                                <option>Hộ kinh doanh</option>
                                <option>Doanh nghiệp tư nhân</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Người Đại Diện Pháp Luật</label>
                            <input type="text" class="form-control" v-model="company.nguoi_dai_dien">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Số Điện Thoại Công Ty</label>
                            <input type="text" class="form-control" v-model="company.sdt">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Email Công Ty</label>
                            <input type="email" class="form-control" v-model="company.email">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Địa Chỉ Trụ Sở</label>
                            <input type="text" class="form-control" v-model="company.dia_chi">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Giới Thiệu Công Ty</label>
                            <textarea class="form-control" rows="4" v-model="company.gioi_thieu"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="alert alert-warning border-0 bg-light-warning">
                                <i class="bx bx-info-circle me-2"></i>
                                Trạng thái tài khoản: <strong class="text-success">Đã Được Duyệt</strong> — Ngày hợp tác: <strong>01/09/2026</strong>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-warning px-4 fw-bold">Lưu Thông Tin Công Ty</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'DoiTacThongTinCongTy',
    data() {
        return {
            company: {
                ten_cong_ty: 'Saigontourist Chi Nhánh Đà Nẵng',
                ma_so_thue: '0400123987',
                loai_hinh: 'Công ty TNHH',
                nguoi_dai_dien: 'Trần Minh Quân',
                sdt: '02363822222',
                email: 'danang@saigontourist.com.vn',
                dia_chi: '357 Phan Châu Trinh, Hải Châu, Đà Nẵng',
                gioi_thieu: 'Đơn vị cung cấp dịch vụ lữ hành uy tín hàng đầu khu vực miền Trung với hơn 15 năm kinh nghiệm tổ chức tour trong và ngoài nước.'
            }
        }
    }
}
</script>
