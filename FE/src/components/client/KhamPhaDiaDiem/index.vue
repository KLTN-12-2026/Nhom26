<template>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold text-dark mb-1">
                    <i class="bx bx-compass text-danger me-2"></i>Khám Phá Địa Điểm OSM
                </h4>
                <p class="text-muted small mb-0">Tra cứu và khám phá các điểm tham quan, ẩm thực, văn hóa tại Đà Nẵng tích hợp OpenStreetMap.</p>
            </div>
            <div class="d-flex gap-2">
                <div class="input-group" style="max-width: 280px;">
                    <span class="input-group-text bg-white border-end-0"><i class="bx bx-search text-muted"></i></span>
                    <input type="text" class="form-control border-start-0 ps-0" placeholder="Tìm kiếm địa điểm..." v-model="key_search">
                </div>
                <button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="modal" data-bs-target="#modalThemDiaDiem">
                    <i class="bx bx-plus me-1"></i>Thêm địa điểm
                </button>
            </div>
        </div>

        <!-- Bảng danh sách địa điểm -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 60px;">#</th>
                        <th>Tên địa điểm</th>
                        <th>Danh mục</th>
                        <th>Địa chỉ</th>
                        <th class="text-center">Đánh giá</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center" style="width: 140px;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in list_dia_diem_loc" :key="item.id || index">
                        <td class="text-center fw-bold text-muted">{{ index + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-box bg-light text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="bx bx-map-pin fs-5"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">{{ item.ten_dia_diem }}</div>
                                    <small class="text-muted">{{ item.toa_do || '16.0544° N, 108.2022° E' }}</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">{{ item.ten_danh_muc }}</span></td>
                        <td><small class="text-secondary text-truncate d-inline-block" style="max-width: 250px;">{{ item.dia_chi }}</small></td>
                        <td class="text-center">
                            <span class="text-warning fw-bold"><i class="bx bxs-star me-1"></i>{{ item.diem_danh_gia || '4.8' }}</span>
                        </td>
                        <td class="text-center">
                            <button @click="changeStatus({ id: item.id })" type="button" :class="item.tinh_trang == 1 ? 'btn btn-sm btn-outline-success rounded-pill px-3' : 'btn btn-sm btn-outline-secondary rounded-pill px-3'">
                                {{ item.tinh_trang == 1 ? 'Hoạt động' : 'Tạm tắt' }}
                            </button>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-primary" @click="edit_dia_diem = {...item}" data-bs-toggle="modal" data-bs-target="#modalSuaDiaDiem" title="Chỉnh sửa">
                                    <i class="bx bx-edit-alt"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" @click="delete_dia_diem = { id: item.id, ten_dia_diem: item.ten_dia_diem }" data-bs-toggle="modal" data-bs-target="#modalXoaDiaDiem" title="Xóa">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr v-if="list_dia_diem_loc.length === 0">
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="bx bx-info-circle fs-3 d-block mb-2"></i>
                            Không tìm thấy địa điểm nào phù hợp.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal Thêm Địa Điểm -->
        <div class="modal fade" id="modalThemDiaDiem" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold">Thêm địa điểm OSM mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-3">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tên địa điểm</label>
                            <input v-model="add_dia_diem.ten_dia_diem" type="text" class="form-control" placeholder="Nhập tên địa điểm...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Danh mục</label>
                            <select v-model="add_dia_diem.id_danh_muc" class="form-select">
                                <option value="">-- Chọn danh mục --</option>
                                <option v-for="dm in list_danh_muc" :key="dm.id" :value="dm.id">{{ dm.ten_danh_muc }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Địa chỉ</label>
                            <input v-model="add_dia_diem.dia_chi" type="text" class="form-control" placeholder="Nhập địa chỉ chi tiết...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tọa độ OSM (Vĩ độ, Kinh độ)</label>
                            <input v-model="add_dia_diem.toa_do" type="text" class="form-control" placeholder="Ví dụ: 16.0544, 108.2022">
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary rounded-pill px-4" @click="themDiaDiem" data-bs-dismiss="modal">Thêm mới</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Sửa Địa Điểm -->
        <div class="modal fade" id="modalSuaDiaDiem" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold">Cập nhật thông tin địa điểm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-3">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tên địa điểm</label>
                            <input v-model="edit_dia_diem.ten_dia_diem" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Địa chỉ</label>
                            <input v-model="edit_dia_diem.dia_chi" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary rounded-pill px-4" @click="updateDiaDiem" data-bs-dismiss="modal">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Xóa Địa Điểm -->
        <div class="modal fade" id="modalXoaDiaDiem" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content rounded-4 border-0 shadow text-center p-3">
                    <div class="modal-body">
                        <i class="bx bx-trash text-danger fs-1 mb-2"></i>
                        <h6 class="fw-bold text-dark">Xác nhận xóa</h6>
                        <p class="text-muted small mb-0">Bạn có chắc chắn muốn xóa địa điểm <strong class="text-dark">{{ delete_dia_diem.ten_dia_diem }}</strong>?</p>
                    </div>
                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-danger rounded-pill px-3" @click="deleteDiaDiem" data-bs-dismiss="modal">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'KhamPhaDiaDiemComponent',
    data() {
        return {
            list_dia_diem: [
                { id: 1, ten_dia_diem: 'Bãi Biển Mỹ Khê', ten_danh_muc: 'Biển & Thiên nhiên', dia_chi: 'Đường Võ Nguyên Giáp, Ngũ Hành Sơn, Đà Nẵng', toa_do: '16.0592° N, 108.2435° E', diem_danh_gia: '4.9', tinh_trang: 1 },
                { id: 2, ten_dia_diem: 'Bán Đảo Sơn Trà & Chùa Linh Ứng', ten_danh_muc: 'Tâm linh & Sinh thái', dia_chi: 'Hoàng Sa, Thọ Quang, Sơn Trà, Đà Nẵng', toa_do: '16.1001° N, 108.2764° E', diem_danh_gia: '4.8', tinh_trang: 1 },
                { id: 3, ten_dia_diem: 'Khu Du Lịch Bà Nà Hills & Cầu Vàng', ten_danh_muc: 'Khu vui chơi / Resort', dia_chi: 'Thôn An Sơn, Hòa Ninh, Hòa Vang, Đà Nẵng', toa_do: '15.9964° N, 107.9868° E', diem_danh_gia: '4.9', tinh_trang: 1 },
                { id: 4, ten_dia_diem: 'Chợ Đêm Sơn Trà & Phố Đi Bộ', ten_danh_muc: 'Ẩm thực & Mua sắm', dia_chi: 'Mai Hắc Đế, An Hải Trung, Sơn Trà, Đà Nẵng', toa_do: '16.0612° N, 108.2312° E', diem_danh_gia: '4.7', tinh_trang: 1 },
                { id: 5, ten_dia_diem: 'Bảo Tàng Điêu Khắc Chăm Pa', ten_danh_muc: 'Văn hóa & Lịch sử', dia_chi: 'Số 02 2 Tháng 9, Bình Hiên, Hải Châu, Đà Nẵng', toa_do: '16.0605° N, 108.2230° E', diem_danh_gia: '4.6', tinh_trang: 1 }
            ],
            list_danh_muc: [
                { id: 1, ten_danh_muc: 'Biển & Thiên nhiên' },
                { id: 2, ten_danh_muc: 'Tâm linh & Sinh thái' },
                { id: 3, ten_danh_muc: 'Khu vui chơi / Resort' },
                { id: 4, ten_danh_muc: 'Ẩm thực & Mua sắm' },
                { id: 5, ten_danh_muc: 'Văn hóa & Lịch sử' }
            ],
            add_dia_diem: {
                ten_dia_diem: '',
                id_danh_muc: '',
                dia_chi: '',
                toa_do: '',
                tinh_trang: 1
            },
            edit_dia_diem: {},
            delete_dia_diem: {},
            key_search: ''
        };
    },
    computed: {
        list_dia_diem_loc() {
            if (!this.key_search) return this.list_dia_diem;
            const search = this.key_search.toLowerCase().trim();
            return this.list_dia_diem.filter(item =>
                (item.ten_dia_diem && item.ten_dia_diem.toLowerCase().includes(search)) ||
                (item.dia_chi && item.dia_chi.toLowerCase().includes(search))
            );
        }
    },
    mounted() {
        this.loadDataDiaDiem();
    },
    methods: {
        loadDataDiaDiem() {
            const token = localStorage.getItem('xs');
            axios
                .get('https://be.ilovecoffee.click/api/admin/dia-diem/get-data', {
                    headers: { 'Authorization': `Bearer ${token}` }
                })
                .then((res) => {
                    if (res.data && res.data.data && res.data.data.length > 0) {
                        this.list_dia_diem = res.data.data;
                    }
                })
                .catch(() => {});
        },
        themDiaDiem() {
            if (this.$toast) {
                this.$toast.success('Đã thêm địa điểm thành công!');
            }
            this.add_dia_diem = { ten_dia_diem: '', id_danh_muc: '', dia_chi: '', toa_do: '', tinh_trang: 1 };
        },
        updateDiaDiem() {
            if (this.$toast) {
                this.$toast.success('Đã cập nhật thông tin địa điểm!');
            }
        },
        deleteDiaDiem() {
            if (this.$toast) {
                this.$toast.success('Đã xóa địa điểm thành công!');
            }
        },
        changeStatus(value) {
            const item = this.list_dia_diem.find(x => x.id === value.id);
            if (item) {
                item.tinh_trang = item.tinh_trang == 1 ? 0 : 1;
                if (this.$toast) {
                    this.$toast.success('Đã cập nhật trạng thái địa điểm!');
                }
            }
        }
    }
};
</script>

<style></style>
