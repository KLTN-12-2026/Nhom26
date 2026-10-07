<template>
    <div class="container-fluid p-0">
        <div class="card border-0 shadow-sm rounded-4 mb-4 p-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <h3 class="fw-bold mb-1 text-dark">Đánh Giá & Phản Hồi Dịch Vụ</h3>
                    <p class="text-muted mb-0">Chia sẻ trải nghiệm thực tế của bạn sau các chuyến đi để nhận điểm thưởng thành viên.</p>
                </div>
                <div>
                    <button class="btn btn-primary rounded-3" @click="showReviewModal = true">
                        <i class="bx bx-pencil me-1"></i> Viết Đánh Giá Mới
                    </button>
                </div>
            </div>
        </div>

        <!-- Filter tabs -->
        <ul class="nav nav-pills mb-4 gap-2">
            <li class="nav-item">
                <button class="btn btn-sm rounded-pill" :class="activeTab === 'all' ? 'btn-primary' : 'btn-light'" @click="activeTab = 'all'">
                    Tất cả (4)
                </button>
            </li>
            <li class="nav-item">
                <button class="btn btn-sm rounded-pill" :class="activeTab === 'done' ? 'btn-primary' : 'btn-light'" @click="activeTab = 'done'">
                    Đã đánh giá (3)
                </button>
            </li>
            <li class="nav-item">
                <button class="btn btn-sm rounded-pill" :class="activeTab === 'pending' ? 'btn-primary' : 'btn-light'" @click="activeTab = 'pending'">
                    Chờ bạn đánh giá (1)
                </button>
            </li>
        </ul>

        <!-- Reviews List -->
        <div class="row g-4">
            <div class="col-lg-6" v-for="rev in reviews" :key="rev.id">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <img :src="rev.tourImg" class="rounded-3" style="width: 50px; height: 50px; object-fit: cover;" :alt="rev.tourName">
                            <div>
                                <h6 class="fw-bold text-dark mb-0">{{ rev.tourName }}</h6>
                                <small class="text-muted">{{ rev.date }}</small>
                            </div>
                        </div>
                        <div class="text-warning">
                            <i class="bx bxs-star" v-for="s in rev.stars" :key="s"></i>
                        </div>
                    </div>

                    <p class="text-dark small mb-3 fst-italic">"{{ rev.comment }}"</p>

                    <div class="d-flex align-items-center justify-content-between pt-3 border-top small text-muted">
                        <span><i class="bx bx-like text-primary me-1"></i>{{ rev.likes }} người thấy hữu ích</span>
                        <span class="badge bg-success-subtle text-success">Đã xác thực đặt tour</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ClientDanhGia',
    data() {
        return {
            activeTab: 'all',
            showReviewModal: false,
            reviews: [
                {
                    id: 1,
                    tourName: 'Khám phá Bà Nà Hills - Cầu Vàng 1 Ngày',
                    tourImg: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=200&auto=format&fit=crop',
                    date: '16/05/2025',
                    stars: 5,
                    comment: 'Chuyến đi tuyệt vời! Hướng dẫn viên nhiệt tình, xe đưa đón Limousine đúng giờ và buffet trưa rất phong phú món ăn.',
                    likes: 12
                },
                {
                    id: 2,
                    tourName: 'Du thuyền sông Hàn & Ngắm Cầu Rồng Phun Lửa',
                    tourImg: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=200&auto=format&fit=crop',
                    date: '14/05/2025',
                    stars: 5,
                    comment: 'Cảnh đêm sông Hàn lung linh, không gian boong tàu thoáng mát và có phục vụ múa Chăm rất đặc sắc.',
                    likes: 8
                },
                {
                    id: 3,
                    tourName: 'Tour Rừng Dừa Bảy Mẫu & Phố Cổ Hội An',
                    tourImg: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=200&auto=format&fit=crop',
                    date: '10/04/2025',
                    stars: 4,
                    comment: 'Đi thuyền thúng rất vui và sôi động. Chỉ tiếc là hôm đi trời hơi nắng gắt vào buổi trưa.',
                    likes: 5
                }
            ]
        }
    }
}
</script>
