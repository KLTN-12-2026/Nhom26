<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-4">
                    <div class="card-title"><i class="bx bx-history me-1 font-22 text-primary"></i><span class="h5 mb-0 text-primary fw-bold">Lịch Sử Du Lịch Của Tôi</span></div>
                    <hr>
                    <div v-for="don in orders" :key="don.id" class="card mb-3 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2"><img :src="don.hinh" class="rounded w-100" style="height:80px;object-fit:cover"></div>
                                <div class="col-md-6">
                                    <h6 class="fw-bold mb-1">{{ don.ten_tour }}</h6>
                                    <p class="text-muted mb-1 small"><i class="bx bx-calendar me-1"></i>{{ don.ngay_di }} &nbsp; <i class="bx bx-user me-1"></i>{{ don.so_kh }} người</p>
                                    <span class="badge bg-success" v-if="don.trang_thai === 'completed'">✓ Đã Hoàn Thành</span>
                                </div>
                                <div class="col-md-2 text-center">
                                    <div class="fw-bold text-success">{{ don.tong.toLocaleString() }}đ</div>
                                    <small class="text-muted">Đã Thanh Toán</small>
                                </div>
                                <div class="col-md-2 text-center">
                                    <button v-if="!don.da_danh_gia" class="btn btn-outline-warning btn-sm"><i class="bx bx-star me-1"></i>Đánh Giá</button>
                                    <span v-else class="text-warning small">★ Đã đánh giá {{ don.sao }}/5</span>
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
    name: 'ClientLichSuDuLich',
    data() {
        return {
            orders: [
                { id: 1, ten_tour: 'Bà Nà Hills - Cầu Vàng Tiên Cảnh', ngay_di: '15/09/2026', so_kh: 2, tong: 2500000, trang_thai: 'completed', da_danh_gia: true, sao: 5, hinh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=300' },
                { id: 2, ten_tour: 'Phố Cổ Hội An - Ngũ Hành Sơn', ngay_di: '02/09/2026', so_kh: 3, tong: 2550000, trang_thai: 'completed', da_danh_gia: false, sao: 0, hinh: 'https://images.unsplash.com/photo-1565967511849-76a60a516170?w=300' },
                { id: 3, ten_tour: 'Du Thuyền Ngắm Bình Minh Sông Hàn', ngay_di: '20/08/2026', so_kh: 2, tong: 900000, trang_thai: 'completed', da_danh_gia: true, sao: 4, hinh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=300' }
            ]
        }
    }
}
</script>
