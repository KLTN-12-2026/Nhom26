<template>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold text-dark mb-1">
                    <i class="bx bx-error-alt text-danger me-2"></i>Báo Cáo Sự Cố
                </h4>
                <p class="text-muted small mb-0">Tiếp nhận khiếu nại, phản ánh thông tin sai lệch về điểm đến, vi phạm dịch vụ hoặc sự cố trong chuyến đi.</p>
            </div>
            <button type="button" class="btn btn-danger rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTaoBaoCao">
                <i class="bx bx-plus me-1"></i>Tạo báo cáo mới
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 60px;">#</th>
                        <th>Mã sự cố</th>
                        <th>Tiêu đề / Loại sự cố</th>
                        <th>Thời gian gửi</th>
                        <th class="text-center">Mức độ</th>
                        <th class="text-center">Trạng thái xử lý</th>
                        <th class="text-center" style="width: 120px;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in list_su_co" :key="item.id || index">
                        <td class="text-center fw-bold text-muted">{{ index + 1 }}</td>
                        <td><span class="badge bg-light text-danger border font-monospace">{{ item.ma_su_co }}</span></td>
                        <td>
                            <div class="fw-bold text-dark">{{ item.tieu_de }}</div>
                            <small class="text-muted">{{ item.mo_ta }}</small>
                        </td>
                        <td><small class="text-secondary">{{ item.ngay_gui }}</small></td>
                        <td class="text-center">
                            <span :class="item.muc_do === 'Khẩn cấp' ? 'badge bg-danger' : 'badge bg-warning text-dark'">
                                {{ item.muc_do }}
                            </span>
                        </td>
                        <td class="text-center">
                            <span :class="item.tinh_trang == 1 ? 'badge bg-success' : 'badge bg-secondary'">
                                {{ item.tinh_trang == 1 ? 'Đã giải quyết' : 'Đang xử lý' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" @click="xemTienDo(item)">
                                Theo dõi
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal Tạo Báo Cáo -->
        <div class="modal fade" id="modalTaoBaoCao" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Gửi Báo Cáo Sự Cố & Khiếu Nại</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body py-3">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tiêu đề sự cố</label>
                            <input v-model="form_su_co.tieu_de" type="text" class="form-control" placeholder="Tóm tắt sự cố gặp phải...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Loại sự cố</label>
                            <select v-model="form_su_co.loai" class="form-select">
                                <option value="dia_diem">Thông tin địa điểm / giá vé sai lệch</option>
                                <option value="tour">Sự cố với đối tác cung cấp tour</option>
                                <option value="thanh_toan">Lỗi thanh toán / hoàn tiền</option>
                                <option value="khac">Vấn đề kỹ thuật khác</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Chi tiết sự cố</label>
                            <textarea v-model="form_su_co.mo_ta" rows="3" class="form-control" placeholder="Mô tả cụ thể thời gian, địa điểm, sự việc..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-danger rounded-pill px-4" @click="guiBaoCao" data-bs-dismiss="modal">Gửi báo cáo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'BaoCaoSuCoComponent',
    data() {
        return {
            list_su_co: [
                {
                    id: 1,
                    ma_su_co: 'SC-2026-0041',
                    tieu_de: 'Sai lệch giờ mở cửa Chợ Đêm Sơn Trà',
                    mo_ta: 'Hệ thống báo mở từ 17:00 nhưng thực tế quầy ăn mở từ 18:00.',
                    ngay_gui: '18/06/2026',
                    muc_do: 'Bình thường',
                    tinh_trang: 1
                }
            ],
            form_su_co: {
                tieu_de: '',
                loai: 'dia_diem',
                mo_ta: ''
            }
        };
    },
    methods: {
        guiBaoCao() {
            if (this.$toast) {
                this.$toast.success('Báo cáo đã được tiếp nhận. Đội ngũ hỗ trợ sẽ phản hồi trong 24h.');
            }
            this.form_su_co = { tieu_de: '', loai: 'dia_diem', mo_ta: '' };
        },
        xemTienDo(item) {
            if (this.$toast) {
                this.$toast.info('Sự cố ' + item.ma_su_co + ' đang ở trạng thái: ' + (item.tinh_trang === 1 ? 'Đã giải quyết' : 'Đang xử lý'));
            }
        }
    }
};
</script>

<style></style>
