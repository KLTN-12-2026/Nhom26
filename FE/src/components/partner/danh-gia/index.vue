<template>
    <div class="partner-danh-gia-container">
        <!-- Banner Title -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 page-banner-card">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-pink text-white px-3 py-1 rounded-pill font-11 fw-bold">
                                CHẤT LƯỢNG DỊCH VỤ & CSAT
                            </span>
                            <span class="text-muted small">/ Đánh giá từ du khách</span>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Quản Lý Đánh Giá & Phản Hồi Trải Nghiệm</h3>
                        <p class="text-muted small mb-0">
                            Theo dõi mức độ hài lòng của khách hàng, lắng nghe phản hồi và gửi thư cảm ơn hoặc giải đáp thắc mắc sau tour.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rating Overview Metrics -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 text-center d-flex flex-column justify-content-center">
                    <h1 class="display-4 fw-bold text-dark mb-1">4.85</h1>
                    <div class="text-warning fs-5 mb-2">★★★★★</div>
                    <p class="text-muted small mb-0">Dựa trên <strong>142 lượt đánh giá</strong> đã xác thực sau chuyến đi</p>
                    <div class="mt-3">
                        <span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill fw-bold">98% Khách Hài Lòng</span>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <h6 class="fw-bold text-dark mb-3">Phân Bổ Xếp Hạng Sao</h6>
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex align-items-center gap-3">
                            <span class="small text-muted" style="width: 50px;">5 sao</span>
                            <div class="progress flex-grow-1" style="height: 8px;">
                                <div class="progress-bar bg-pink" style="width: 85%;"></div>
                            </div>
                            <span class="small fw-bold text-dark" style="width: 40px;">85%</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="small text-muted" style="width: 50px;">4 sao</span>
                            <div class="progress flex-grow-1" style="height: 8px;">
                                <div class="progress-bar bg-pink" style="width: 12%;"></div>
                            </div>
                            <span class="small fw-bold text-dark" style="width: 40px;">12%</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="small text-muted" style="width: 50px;">3 sao</span>
                            <div class="progress flex-grow-1" style="height: 8px;">
                                <div class="progress-bar bg-secondary" style="width: 3%;"></div>
                            </div>
                            <span class="small fw-bold text-dark" style="width: 40px;">3%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter bar -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 p-3 bg-white">
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-sm rounded-pill" :class="filterStar === '' ? 'btn-pink text-white' : 'btn-light'" @click="filterStar = ''">Tất cả (142)</button>
                <button class="btn btn-sm rounded-pill" :class="filterStar === '5' ? 'btn-pink text-white' : 'btn-light'" @click="filterStar = '5'">5 Sao (121)</button>
                <button class="btn btn-sm rounded-pill" :class="filterStar === '4' ? 'btn-pink text-white' : 'btn-light'" @click="filterStar = '4'">4 Sao (17)</button>
                <button class="btn btn-sm rounded-pill" :class="filterStar === 'unreplied' ? 'btn-pink text-white' : 'btn-light'" @click="filterStar = 'unreplied'">Chưa phản hồi (3)</button>
            </div>
        </div>

        <!-- Reviews List -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <div class="d-flex flex-column gap-4">
                <div class="p-3 rounded-4 bg-light review-card" v-for="rv in filteredReviews" :key="rv.id">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar-circle-sm bg-pink text-white fw-bold">{{ rv.avatar }}</div>
                            <div>
                                <strong class="text-dark d-block font-13">{{ rv.khach }}</strong>
                                <small class="text-muted">Tour: <span class="text-pink fw-semibold">{{ rv.tour }}</span></small>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="text-warning">
                                <i class="bx bxs-star" v-for="s in rv.sao" :key="s"></i>
                            </div>
                            <small class="text-muted font-11">{{ rv.ngay }}</small>
                        </div>
                    </div>
                    <p class="text-dark small mb-3 fst-italic">"{{ rv.noi_dung }}"</p>
                    
                    <!-- Partner Reply Box if replied -->
                    <div class="p-2 bg-white rounded-3 small border mb-2" v-if="rv.reply">
                        <strong class="text-pink d-block"><i class="bx bx-reply me-1"></i>Phản hồi từ đối tác:</strong>
                        <span class="text-muted">{{ rv.reply }}</span>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-pink btn-sm rounded-pill px-3" @click="traLoi(rv)">
                            <i class="bx bx-comment-detail me-1"></i> {{ rv.reply ? 'Sửa phản hồi' : 'Gửi lời cảm ơn / Phản hồi' }}
                        </button>
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
            filterStar: '',
            reviews: [
                { id: 1, khach: 'Lê Tuấn Kiệt', avatar: 'LK', tour: 'Du Thuyền Hạ Long 5 Sao 2N1Đ', noi_dung: 'Kỳ nghỉ tuyệt vời, phòng suite trên du thuyền view vịnh cực đẹp, nhân viên phục vụ chu đáo 5 sao!', sao: 5, ngay: '17/05/2026', reply: 'Cảm ơn anh Tuấn Kiệt đã tin tưởng lựa chọn du thuyền Lotus Heritage ạ!' },
                { id: 2, khach: 'Nguyễn Thị Mai Anh', avatar: 'MA', tour: 'Tour Tràng An Bái Đính 1N VIP', noi_dung: 'Xe Limousine đón rất đúng giờ, bác tài lái xe êm. Bữa trưa dê núi Ninh Bình rất ngon.', sao: 5, ngay: '16/05/2026', reply: null },
                { id: 3, khach: 'Trần Minh Hoàng', avatar: 'MH', tour: 'Thuê xe máy phượt & Trekking Fansipan', noi_dung: 'Xe máy cào cào khỏe leo dốc tốt. Hướng dẫn viên trekking nhiệt tình chụp ảnh siêu đẹp.', sao: 4, ngay: '15/05/2026', reply: 'Dạ cảm ơn anh Hoàng, hẹn gặp lại anh trong cung trekking tiếp theo!' }
            ]
        }
    },
    computed: {
        filteredReviews() {
            if (this.filterStar === '5') return this.reviews.filter(r => r.sao === 5);
            if (this.filterStar === '4') return this.reviews.filter(r => r.sao === 4);
            if (this.filterStar === 'unreplied') return this.reviews.filter(r => !r.reply);
            return this.reviews;
        }
    },
    methods: {
        traLoi(rv) {
            const input = prompt('Nhập nội dung phản hồi của bạn tới khách hàng:', rv.reply || '');
            if (input !== null) {
                rv.reply = input;
                alert('Đã gửi phản hồi thành công!');
            }
        }
    }
}
</script>

<style scoped>
.bg-pink {
    background-color: #e11d48 !important;
}
.text-pink {
    color: #e11d48 !important;
}
.btn-pink {
    background-color: #e11d48;
    color: #ffffff;
    border: none;
}
.btn-outline-pink {
    border: 1px solid #fecdd3;
    color: #e11d48;
}
.btn-outline-pink:hover {
    background-color: #fff1f2;
    color: #be123c;
}
.avatar-circle-sm {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
}
</style>
