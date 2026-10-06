<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-check-shield me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Kiểm Duyệt Địa Điểm Du Lịch</span>
                        </div>
                        <span class="badge bg-warning text-dark px-3 py-2">Có 2 địa điểm chờ duyệt</span>
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="12%">Hình Ảnh</th>
                                    <th width="23%">Tên Địa Điểm</th>
                                    <th width="20%">Địa Chỉ / Tọa Độ</th>
                                    <th width="15%">Người Gửi / Đối Tác</th>
                                    <th class="text-center" width="12%">Trạng Thái</th>
                                    <th class="text-center" width="13%">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(loc, index) in locations" :key="loc.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td>
                                        <img :src="loc.hinh_anh" class="rounded shadow-sm" width="80" height="55" style="object-fit: cover;">
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark">{{ loc.ten_dia_diem }}</div>
                                        <span class="badge bg-light-info text-info">{{ loc.loai_hinh }}</span>
                                    </td>
                                    <td>{{ loc.dia_chi }}</td>
                                    <td>
                                        <div class="fw-bold">{{ loc.nguoi_gui }}</div>
                                        <small class="text-muted">{{ loc.ngay_gui }}</small>
                                    </td>
                                    <td class="text-center">
                                        <span v-if="loc.trang_thai === 'pending'" class="badge bg-warning text-dark">Chờ duyệt</span>
                                        <span v-else class="badge bg-success">Đã duyệt</span>
                                    </td>
                                    <td class="text-center">
                                        <button v-if="loc.trang_thai === 'pending'" class="btn btn-success btn-sm me-1" title="Duyệt đăng bài"><i class="bx bx-check"></i></button>
                                        <button class="btn btn-outline-primary btn-sm me-1" title="Xem chi tiết"><i class="bx bx-show"></i></button>
                                        <button class="btn btn-outline-danger btn-sm" title="Từ chối"><i class="bx bx-x"></i></button>
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
    name: 'AdminKiemDuyetDiaDiem',
    data() {
        return {
            locations: [
                { id: 1, ten_dia_diem: 'Đỉnh Bàn Cờ - Bán Đảo Sơn Trà', loai_hinh: 'Danh lam thắng cảnh', dia_chi: 'Thọ Quang, Sơn Trà, Đà Nẵng', nguoi_gui: 'Vietravel Đà Nẵng', ngay_gui: '05/10/2026', trang_thai: 'pending', hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=300' },
                { id: 2, ten_dia_diem: 'Khu Du Lịch Suối Mơ Hòa Vang', loai_hinh: 'Du lịch sinh thái', dia_chi: 'Hòa Vang, Đà Nẵng', nguoi_gui: 'Bà Nà Eco Travel', ngay_gui: '04/10/2026', trang_thai: 'pending', hinh_anh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=300' },
                { id: 3, ten_dia_diem: 'Bán Đảo Sơn Trà - Chùa Linh Ứng', loai_hinh: 'Tâm linh & Cảnh quan', dia_chi: 'Sơn Trà, Đà Nẵng', nguoi_gui: 'Saigontourist', ngay_gui: '01/10/2026', trang_thai: 'approved', hinh_anh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=300' }
            ]
        }
    }
}
</script>
