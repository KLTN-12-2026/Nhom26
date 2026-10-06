<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-map-alt me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Quản Lý Tour Du Lịch Toàn Sàn</span>
                        </div>
                        <div class="d-flex gap-2">
                            <span class="badge bg-danger px-3 py-2">Tổng 86 Tour</span>
                        </div>
                    </div>
                    <hr>

                    <!-- Filter -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" v-model="searchQuery" placeholder="Tìm theo tên tour, mã tour...">
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" v-model="filterStatus">
                                <option value="">-- Tất cả trạng thái --</option>
                                <option value="active">Đang mở bán</option>
                                <option value="pending">Chờ duyệt</option>
                                <option value="closed">Đã đóng</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="10%">Ảnh</th>
                                    <th width="28%">Tên Tour Du Lịch</th>
                                    <th width="15%">Đối Tác Tổ Chức</th>
                                    <th class="text-end" width="12%">Giá Gốc / Khách</th>
                                    <th class="text-center" width="10%">Thời Gian</th>
                                    <th class="text-center" width="10%">Trạng Thái</th>
                                    <th class="text-center" width="10%">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tour, index) in tours" :key="tour.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td><img :src="tour.hinh_anh" class="rounded" width="70" height="45" style="object-fit: cover;"></td>
                                    <td>
                                        <div class="fw-bold text-dark">{{ tour.ten_tour }}</div>
                                        <small class="text-muted">Mã: <code>{{ tour.ma_tour }}</code></small>
                                    </td>
                                    <td>{{ tour.doi_tac }}</td>
                                    <td class="text-end text-danger fw-bold">{{ tour.gia.toLocaleString() }} đ</td>
                                    <td class="text-center"><span class="badge bg-light-primary text-primary">{{ tour.thoi_gian }}</span></td>
                                    <td class="text-center">
                                        <span v-if="tour.trang_thai === 'active'" class="badge bg-success">Đang bán</span>
                                        <span v-else-if="tour.trang_thai === 'pending'" class="badge bg-warning text-dark">Chờ duyệt</span>
                                        <span v-else class="badge bg-secondary">Tạm đóng</span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-info btn-sm me-1" title="Chi tiết"><i class="bx bx-show"></i></button>
                                        <button class="btn btn-outline-danger btn-sm" title="Khóa tour"><i class="bx bx-block"></i></button>
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
    name: 'AdminTour',
    data() {
        return {
            searchQuery: '',
            filterStatus: '',
            tours: [
                { id: 1, ma_tour: 'TOUR-DN-01', ten_tour: 'Khám phá Ngũ Hành Sơn - Phố cổ Hội An lung linh', doi_tac: 'Saigontourist Đà Nẵng', gia: 850000, thoi_gian: '1 Ngày', trang_thai: 'active', hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=300' },
                { id: 2, ma_tour: 'TOUR-BA-02', ten_tour: 'Khu Du Lịch Bà Nà Hills - Cầu Vàng Tiên Cảnh', doi_tac: 'Vietravel Miền Trung', gia: 1250000, thoi_gian: '1 Ngày', trang_thai: 'active', hinh_anh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=300' },
                { id: 3, ma_tour: 'TOUR-CL-03', ten_tour: 'Lặn ngắm san hô Cù Lao Chàm - Ăn hải sản', doi_tac: 'Bà Nà Eco Travel', gia: 650000, thoi_gian: '1 Ngày', trang_thai: 'pending', hinh_anh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=300' }
            ]
        }
    }
}
</script>
