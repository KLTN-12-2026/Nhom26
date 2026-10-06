<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-trip me-1 font-22 text-warning"></i>
                            <span class="h5 mb-0 text-warning fw-bold">Quản Lý Tour & Dịch Vụ</span>
                        </div>
                        <button class="btn btn-warning btn-sm px-3"><i class="bx bx-plus"></i> Tạo Tour Mới</button>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="10%">Ảnh</th>
                                    <th width="28%">Tên Tour</th>
                                    <th class="text-center" width="12%">Thời Gian</th>
                                    <th class="text-end" width="13%">Giá / Khách</th>
                                    <th class="text-center" width="10%">Lịch KH</th>
                                    <th class="text-center" width="10%">Trạng Thái</th>
                                    <th class="text-center" width="12%">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tour, i) in tours" :key="tour.id">
                                    <td class="text-center fw-bold">{{ i + 1 }}</td>
                                    <td><img :src="tour.hinh" class="rounded" width="70" height="45" style="object-fit:cover"></td>
                                    <td>
                                        <div class="fw-bold">{{ tour.ten_tour }}</div>
                                        <small class="text-muted">Mã: <code>{{ tour.ma }}</code></small>
                                    </td>
                                    <td class="text-center"><span class="badge bg-light-info text-info">{{ tour.thoi_gian }}</span></td>
                                    <td class="text-end text-warning fw-bold">{{ tour.gia.toLocaleString() }} đ</td>
                                    <td class="text-center"><span class="badge bg-light-primary text-primary">{{ tour.so_lich }} lịch</span></td>
                                    <td class="text-center">
                                        <span v-if="tour.trang_thai === 'active'" class="badge bg-success">Đang bán</span>
                                        <span v-else class="badge bg-secondary">Tạm dừng</span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-info btn-sm me-1" title="Xem lịch khởi hành"><i class="bx bx-calendar"></i></button>
                                        <button class="btn btn-outline-warning btn-sm me-1" title="Sửa"><i class="bx bx-edit"></i></button>
                                        <button class="btn btn-outline-danger btn-sm" title="Xóa"><i class="bx bx-trash"></i></button>
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
    name: 'DoiTacTourDichVu',
    data() {
        return {
            tours: [
                { id: 1, ma: 'TOUR-DN-01', ten_tour: 'Ngũ Hành Sơn - Hội An Cổ Kính', thoi_gian: '1 Ngày', gia: 850000, so_lich: 8, trang_thai: 'active', hinh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=300' },
                { id: 2, ma: 'TOUR-BA-02', ten_tour: 'Bà Nà Hills - Cầu Vàng Tiên Cảnh', thoi_gian: '1 Ngày', gia: 1250000, so_lich: 12, trang_thai: 'active', hinh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=300' },
                { id: 3, ma: 'TOUR-CL-03', ten_tour: 'Lặn Ngắm San Hô Cù Lao Chàm', thoi_gian: '1 Ngày', gia: 650000, so_lich: 4, trang_thai: 'active', hinh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=300' },
                { id: 4, ma: 'TOUR-HU-04', ten_tour: 'Cố Đô Huế - Lăng Tẩm Triều Nguyễn', thoi_gian: '2 Ngày 1 Đêm', gia: 1850000, so_lich: 3, trang_thai: 'active', hinh: 'https://images.unsplash.com/photo-1565967511849-76a60a516170?w=300' }
            ]
        }
    }
}
</script>
