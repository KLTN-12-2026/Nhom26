<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-star me-1 font-22 text-warning"></i>
                            <span class="h5 mb-0 text-warning fw-bold">Quản Lý Đánh Giá Tour Của Tôi</span>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="18%">Khách Hàng</th>
                                    <th width="25%">Tour</th>
                                    <th width="27%">Nội Dung</th>
                                    <th class="text-center" width="10%">Số Sao</th>
                                    <th class="text-center" width="15%">Ngày Đánh Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(rv, i) in reviews" :key="rv.id">
                                    <td class="text-center fw-bold">{{ i + 1 }}</td>
                                    <td class="fw-bold">{{ rv.khach }}</td>
                                    <td>{{ rv.tour }}</td>
                                    <td class="text-muted">{{ rv.noi_dung }}</td>
                                    <td class="text-center text-warning fw-bold">{{ '★'.repeat(rv.sao) }}<span class="text-muted">{{ '★'.repeat(5 - rv.sao) }}</span></td>
                                    <td class="text-center">{{ rv.ngay }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 d-flex align-items-center gap-3">
                        <div class="card radius-10 border-0 bg-light px-4 py-3 text-center">
                            <h2 class="text-warning fw-bold mb-0">4.7</h2>
                            <div class="text-warning">★★★★★</div>
                            <small class="text-muted">Điểm đánh giá trung bình</small>
                        </div>
                        <div class="text-muted">Dựa trên <strong>{{ reviews.length }}</strong> đánh giá từ khách hàng đã trải nghiệm tour của bạn.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'DoiTacDanhGia',
    data() {
        return {
            reviews: [
                { id: 1, khach: 'Nguyễn Văn An', tour: 'Bà Nà Hills - Cầu Vàng', noi_dung: 'Tour tuyệt vời! Hướng dẫn viên nhiệt tình, lịch trình hợp lý, sẽ quay lại lần nữa.', sao: 5, ngay: '04/10/2026' },
                { id: 2, khach: 'Trần Thị Mai', tour: 'Ngũ Hành Sơn - Hội An', noi_dung: 'Địa điểm đẹp nhưng thời gian tham quan hơi ngắn. Nên thêm ít nhất 1 giờ.', sao: 4, ngay: '03/10/2026' },
                { id: 3, khach: 'Phạm Thu Hà', tour: 'Lặn San Hô Cù Lao Chàm', noi_dung: 'Rất thích! San hô đẹp, hướng dẫn viên lặn chuyên nghiệp và an toàn.', sao: 5, ngay: '01/10/2026' }
            ]
        }
    }
}
</script>
