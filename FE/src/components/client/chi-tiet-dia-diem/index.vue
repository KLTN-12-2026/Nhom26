<template>
    <div class="container-fluid p-0">
        <!-- Breadcrumb & Back -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <router-link to="/client/tim-kiem-dia-diem" class="btn btn-outline-secondary btn-sm rounded-pill">
                <i class="bx bx-arrow-back me-1"></i> Quay lại danh sách địa điểm
            </router-link>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-danger btn-sm rounded-pill" @click="isLiked = !isLiked">
                    <i class="bx" :class="isLiked ? 'bxs-heart text-danger' : 'bx-heart'"></i>
                    {{ isLiked ? 'Đã yêu thích' : 'Lưu yêu thích' }}
                </button>
                <button class="btn btn-primary btn-sm rounded-pill" @click="addToPlan">
                    <i class="bx bx-plus me-1"></i> Thêm vào kế hoạch
                </button>
            </div>
        </div>

        <!-- Destination Hero -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
            <div class="position-relative" style="height: 380px;">
                <img src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=1200&auto=format&fit=crop" class="w-100 h-100 object-fit-cover" alt="Bà Nà Hills">
                <div class="position-absolute bottom-0 start-0 end-0 p-4 text-white" style="background: linear-gradient(180deg, transparent 0%, rgba(15, 23, 42, 0.85) 100%);">
                    <span class="badge bg-primary px-3 py-1 rounded-pill mb-2">Điểm đến hàng đầu Đà Nẵng</span>
                    <h2 class="fw-bold mb-1">Khu Du Lịch Sun World Bà Nà Hills - Cầu Vàng</h2>
                    <p class="mb-0 small opacity-90"><i class="bx bx-map me-1"></i>Hòa Ninh, Hòa Vang, TP. Đà Nẵng · Giờ mở cửa: 07:30 - 21:00 hàng ngày</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Left Info -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h5 class="fw-bold text-dark mb-3"><i class="bx bx-info-circle text-primary me-2"></i>Giới Thiệu Điểm Đến</h5>
                    <p class="text-secondary leading-relaxed">
                        Nằm ở độ cao 1.487m so với mực nước biển, Bà Nà Hills được mệnh danh là "chốn bồng lai tiên cảnh" với khí hậu 4 mùa trong 1 ngày. Nổi tiếng toàn cầu với công trình Cầu Vàng được nâng đỡ bởi đôi bàn tay khổng lồ phủ rêu phong, Làng Pháp cổ kính, Hầm rượu Debay và công viên giải trí Fantasy Park lớn nhất Đông Nam Á.
                    </p>
                    <div class="row g-3 mt-2">
                        <div class="col-sm-4">
                            <div class="p-3 bg-light rounded-3 text-center">
                                <div class="text-primary fs-4 fw-bold">4.9 ★</div>
                                <small class="text-muted">14.280+ lượt đánh giá</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="p-3 bg-light rounded-3 text-center">
                                <div class="text-success fs-4 fw-bold">950.000đ</div>
                                <small class="text-muted">Giá vé cáp treo khứ hồi</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="p-3 bg-light rounded-3 text-center">
                                <div class="text-warning fs-4 fw-bold">18°C - 24°C</div>
                                <small class="text-muted">Nhiệt độ trung bình mát mẻ</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Suggested Tour for this location -->
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h5 class="fw-bold text-dark mb-3"><i class="bx bx-trip text-primary me-2"></i>Tour Ghép Có Sẵn Đến Điểm Này</h5>
                    <div class="d-flex align-items-center justify-content-between p-3 bg-light rounded-3">
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Khám phá Đỉnh Bà Nà Hills - Cầu Vàng & Làng Pháp 1 Ngày</h6>
                            <small class="text-muted"><i class="bx bx-time me-1"></i>Khởi hành hàng ngày · Đưa đón tận nơi tại Đà Nẵng</small>
                        </div>
                        <router-link to="/client/dat-tour" class="btn btn-primary btn-sm rounded-pill px-3">
                            Đặt Tour 1.250.000đ
                        </router-link>
                    </div>
                </div>
            </div>

            <!-- Right: Weather and Quick Tips -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h6 class="fw-bold text-dark mb-3"><i class="bx bx-sun text-warning me-2"></i>Dự Báo & Khuyên Dùng AI</h6>
                    <div class="p-3 bg-primary-subtle text-primary rounded-3 mb-3 small">
                        <i class="bx bx-bulb fs-5 align-middle me-1"></i> <strong>Mẹo thông minh:</strong> Nên check-in Cầu Vàng trước 08:30 sáng hoặc sau 16:00 chiều để tránh đám đông và có ảnh check-in tuyệt đẹp.
                    </div>
                    <ul class="list-unstyled small text-secondary mb-0">
                        <li class="mb-2"><i class="bx bx-check-circle text-success me-2"></i>Nên mang áo khoác mỏng vì trên đỉnh se lạnh vào chiều tối.</li>
                        <li class="mb-2"><i class="bx bx-check-circle text-success me-2"></i>Đi giày thể thao êm chân để dễ dạo bộ Làng Pháp.</li>
                        <li><i class="bx bx-check-circle text-success me-2"></i>Có dịch vụ buffet tại Beer Plaza và Arapang.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ChiTietDiaDiem',
    data() {
        return {
            isLiked: false
        }
    },
    methods: {
        addToPlan() {
            alert('Đã thêm Bà Nà Hills vào Lộ trình du lịch của bạn!');
        }
    }
}
</script>
