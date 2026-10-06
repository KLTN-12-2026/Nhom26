<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-briefcase me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Quản Lý & Xét Duyệt Đối Tác Du Lịch</span>
                        </div>
                        <span class="badge bg-danger px-3 py-2">Tổng 48 Đối Tác</span>
                    </div>
                    <hr>

                    <!-- Tabs trạng thái đối tác -->
                    <ul class="nav nav-tabs nav-danger mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" :class="{ active: tabActive === 'all' }" @click="tabActive = 'all'">Tất Cả Đối Tác</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" :class="{ active: tabActive === 'pending' }" @click="tabActive = 'pending'">
                                Chờ Xét Duyệt <span class="badge bg-warning text-dark ms-1">3</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" :class="{ active: tabActive === 'active' }" @click="tabActive = 'active'">Đang Hợp Tác</button>
                        </li>
                    </ul>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="25%">Tên Doanh Nghiệp / Công Ty</th>
                                    <th width="15%">Người Đại Diện</th>
                                    <th width="15%">Số Điện Thoại / Email</th>
                                    <th width="15%">Mã Số Thuế</th>
                                    <th class="text-center" width="12%">Trạng Thái</th>
                                    <th class="text-center" width="13%">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(dt, index) in filteredPartners" :key="dt.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td>
                                        <div class="fw-bold text-dark">{{ dt.ten_cong_ty }}</div>
                                        <small class="text-muted"><i class="bx bx-map"></i> {{ dt.dia_chi }}</small>
                                    </td>
                                    <td>{{ dt.nguoi_dai_dien }}</td>
                                    <td>
                                        <div>{{ dt.so_dien_thoai }}</div>
                                        <small class="text-muted">{{ dt.email }}</small>
                                    </td>
                                    <td><code>{{ dt.ma_so_thue }}</code></td>
                                    <td class="text-center">
                                        <span v-if="dt.trang_thai === 'active'" class="badge bg-success">Đang hợp tác</span>
                                        <span v-else-if="dt.trang_thai === 'pending'" class="badge bg-warning text-dark">Chờ duyệt</span>
                                        <span v-else class="badge bg-danger">Tạm dừng</span>
                                    </td>
                                    <td class="text-center">
                                        <button v-if="dt.trang_thai === 'pending'" class="btn btn-success btn-sm me-1" title="Phê duyệt"><i class="bx bx-check"></i> Duyệt</button>
                                        <button class="btn btn-outline-primary btn-sm me-1" title="Xem hồ sơ"><i class="bx bx-show"></i></button>
                                        <button class="btn btn-outline-danger btn-sm" title="Khóa"><i class="bx bx-block"></i></button>
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
    name: 'AdminDoiTac',
    data() {
        return {
            tabActive: 'all',
            partners: [
                { id: 1, ten_cong_ty: 'Saigontourist Group Đà Nẵng', nguoi_dai_dien: 'Trần Minh Quân', so_dien_thoai: '02363822222', email: 'danang@saigontourist.com.vn', dia_chi: '357 Phan Châu Trinh, Đà Nẵng', ma_so_thue: '0400123987', trang_thai: 'active' },
                { id: 2, ten_cong_ty: 'Vietravel Chi Nhánh Miền Trung', nguoi_dai_dien: 'Nguyễn Bích Thuận', so_dien_thoai: '02363863544', email: 'vietravel.dng@vietravel.com', dia_chi: '58 Pasteur, Hải Châu, Đà Nẵng', ma_so_thue: '0300456123', trang_thai: 'active' },
                { id: 3, ten_cong_ty: 'Công Ty Du Lịch Sinh Thái Bà Nà Eco', nguoi_dai_dien: 'Lê Văn Thắng', so_dien_thoai: '0905112233', email: 'banaeco@gmail.com', dia_chi: 'Hòa Ninh, Hòa Vang, Đà Nẵng', ma_so_thue: '0402998877', trang_thai: 'pending' },
                { id: 4, ten_cong_ty: 'Du Thuyền Sông Hàn Heritage', nguoi_dai_dien: 'Phan Quốc Bảo', so_dien_thoai: '0935889900', email: 'contact@heritagedanang.vn', dia_chi: 'Bến Du Thuyền Đà Nẵng', ma_so_thue: '0403556677', trang_thai: 'pending' }
            ]
        }
    },
    computed: {
        filteredPartners() {
            if (this.tabActive === 'all') return this.partners;
            return this.partners.filter(p => p.trang_thai === this.tabActive);
        }
    }
}
</script>
