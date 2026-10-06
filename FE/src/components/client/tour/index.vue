<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-map-alt me-1 font-22 text-primary"></i>
                            <span class="h5 mb-0 text-primary fw-bold">Xem Tour & Lịch Khởi Hành</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-4">
                        <div class="col-md-4" v-for="tour in tours" :key="tour.id">
                            <div class="card h-100 border-0 shadow-sm">
                                <img :src="tour.hinh" class="card-img-top" style="height:200px;object-fit:cover" :alt="tour.ten">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-1">{{ tour.ten }}</h5>
                                    <p class="text-muted small mb-2"><i class="bx bx-time me-1"></i>{{ tour.thoi_gian }} &nbsp; <i class="bx bx-map me-1"></i>{{ tour.xuat_phat }}</p>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-danger fw-bold fs-5">{{ tour.gia.toLocaleString() }} đ</span>
                                        <span class="text-warning small">★ {{ tour.rating }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <small class="fw-bold text-muted">LỊCH KHỞI HÀNH GẦN NHẤT:</small>
                                        <div class="d-flex flex-wrap gap-1 mt-1">
                                            <span v-for="ngay in tour.lich" :key="ngay" class="badge bg-light-primary text-primary">{{ ngay }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <button class="btn btn-primary w-100"><i class="bx bx-cart-add me-2"></i>Đặt Tour Ngay</button>
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
    name: 'ClientTourLichKhoiHanh',
    data() {
        return {
            tours: [
                { id: 1, ten: 'Bà Nà Hills - Cầu Vàng', thoi_gian: '1 Ngày', xuat_phat: 'Đà Nẵng', gia: 1250000, rating: 4.9, lich: ['08/10', '12/10', '15/10', '19/10'], hinh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=400' },
                { id: 2, ten: 'Phố Cổ Hội An - Ngũ Hành Sơn', thoi_gian: '1 Ngày', xuat_phat: 'Đà Nẵng', gia: 850000, rating: 4.7, lich: ['07/10', '10/10', '14/10'], hinh: 'https://images.unsplash.com/photo-1565967511849-76a60a516170?w=400' },
                { id: 3, ten: 'Lặn Ngắm San Hô Cù Lao Chàm', thoi_gian: '1 Ngày', xuat_phat: 'Hội An', gia: 650000, rating: 4.8, lich: ['09/10', '13/10', '16/10'], hinh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=400' },
                { id: 4, ten: 'Cố Đô Huế & Lăng Tẩm 2N1Đ', thoi_gian: '2 Ngày 1 Đêm', xuat_phat: 'Đà Nẵng', gia: 1850000, rating: 4.6, lich: ['11/10', '18/10', '25/10'], hinh: 'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=400' },
                { id: 5, ten: 'Du Thuyền Ngắm Bình Minh Sông Hàn', thoi_gian: 'Nửa ngày', xuat_phat: 'Đà Nẵng', gia: 450000, rating: 4.5, lich: ['07/10', '08/10', '09/10', '10/10'], hinh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=400' },
                { id: 6, ten: 'Núi Thần Tài - Suối Nước Nóng', thoi_gian: '1 Ngày', xuat_phat: 'Đà Nẵng', gia: 750000, rating: 4.4, lich: ['10/10', '17/10', '24/10'], hinh: 'https://images.unsplash.com/photo-1559329007-40df8a9345d8?w=400' }
            ]
        }
    }
}
</script>
