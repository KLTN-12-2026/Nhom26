<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-star me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Quản Lý Đánh Giá & Phản Hồi</span>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <span class="badge bg-warning text-dark">2 đánh giá cần xem xét</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" v-model="searchQuery" placeholder="Tìm theo tên khách hàng, tour...">
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" v-model="filterStar">
                                <option value="">-- Tất cả số sao --</option>
                                <option value="5">⭐⭐⭐⭐⭐ 5 sao</option>
                                <option value="4">⭐⭐⭐⭐ 4 sao</option>
                                <option value="3">⭐⭐⭐ 3 sao</option>
                                <option value="1">⭐⭐ 1-2 sao</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="18%">Khách Hàng</th>
                                    <th width="25%">Tour Được Đánh Giá</th>
                                    <th width="22%">Nội Dung Nhận Xét</th>
                                    <th class="text-center" width="10%">Số Sao</th>
                                    <th class="text-center" width="10%">Ngày Đánh Giá</th>
                                    <th class="text-center" width="10%">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(rv, index) in filteredReviews" :key="rv.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td class="fw-bold">{{ rv.khach_hang }}</td>
                                    <td>{{ rv.ten_tour }}</td>
                                    <td class="text-muted">{{ rv.noi_dung }}</td>
                                    <td class="text-center">
                                        <span class="text-warning">{{ '★'.repeat(rv.so_sao) }}<span class="text-muted">{{ '★'.repeat(5 - rv.so_sao) }}</span></span>
                                    </td>
                                    <td class="text-center">{{ rv.ngay }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-danger btn-sm me-1" title="Ẩn đánh giá"><i class="bx bx-hide"></i></button>
                                        <button class="btn btn-outline-secondary btn-sm" title="Xóa"><i class="bx bx-trash"></i></button>
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
    name: 'AdminDanhGia',
    data() {
        return {
            searchQuery: '',
            filterStar: '',
            reviews: [
                { id: 1, khach_hang: 'Nguyễn Văn An', ten_tour: 'Khám phá Ngũ Hành Sơn - Hội An', noi_dung: 'Tour rất tuyệt vời! Hướng dẫn viên nhiệt tình, lịch trình hợp lý.', so_sao: 5, ngay: '04/10/2026' },
                { id: 2, khach_hang: 'Trần Thị Mai', ten_tour: 'Bà Nà Hills - Cầu Vàng', noi_dung: 'Cảnh đẹp nhưng khá đông khách, nên đặt sáng sớm.', so_sao: 4, ngay: '03/10/2026' },
                { id: 3, khach_hang: 'Lê Hoàng Nam', ten_tour: 'Lặn ngắm san hô Cù Lao Chàm', noi_dung: 'Dịch vụ chưa tốt, thuyền chậm, cần cải thiện.', so_sao: 2, ngay: '02/10/2026' }
            ]
        }
    },
    computed: {
        filteredReviews() {
            return this.reviews.filter(rv => {
                const q = this.searchQuery.toLowerCase();
                const matchQ = rv.khach_hang.toLowerCase().includes(q) || rv.ten_tour.toLowerCase().includes(q);
                const matchStar = this.filterStar === '' || rv.so_sao >= parseInt(this.filterStar);
                return matchQ && matchStar;
            });
        }
    }
}
</script>
