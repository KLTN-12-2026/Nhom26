<template>
    <div class="ho-so-so-thich-page pb-5">
        <!-- 1. USER PROFILE HEADER CARD -->
        <div class="card profile-header-card border-0 rounded-4 shadow-sm p-4 bg-white mb-4 position-relative overflow-hidden">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-4">
                <!-- Left: Avatar + Details -->
                <div class="d-flex align-items-center gap-4 flex-wrap flex-md-nowrap">
                    <!-- Avatar with gradient ring and verified badge -->
                    <div class="profile-avatar-wrapper position-relative flex-shrink-0">
                        <img 
                            :src="profile.avatar" 
                            alt="Avatar" 
                            class="profile-avatar-img rounded-circle object-fit-cover"
                        />
                        <div class="verified-badge-icon" title="Tài khoản đã xác thực">
                            <i class="bx bx-check"></i>
                        </div>
                    </div>

                    <!-- User Info Details -->
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                            <h1 class="h3 fw-bold text-dark mb-0">{{ profile.ho_va_ten }}</h1>
                            <span class="badge-explorer-pill">
                                <i class="bx bx-shield-quarter me-1"></i>{{ profile.hang_thanh_vien }}
                            </span>
                        </div>

                        <!-- Email, Phone, Location row with bullets -->
                        <div class="profile-meta-row d-flex align-items-center flex-wrap gap-2 text-muted small mb-2">
                            <span><i class="bx bx-envelope me-1 text-primary"></i>{{ profile.email }}</span>
                            <span class="meta-dot">•</span>
                            <span><i class="bx bx-mobile-alt me-1 text-primary"></i>{{ profile.so_dien_thoai }}</span>
                            <span class="meta-dot">•</span>
                            <span><i class="bx bx-map me-1 text-danger"></i>{{ profile.dia_chi }}</span>
                        </div>

                        <!-- Bio / Objective -->
                        <p class="profile-bio-text text-secondary small mb-0">
                            <strong>Mục tiêu:</strong> {{ profile.muc_tieu }}
                        </p>
                    </div>
                </div>

                <!-- Right Action Buttons -->
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button type="button" class="btn btn-edit-profile rounded-pill px-3 py-2 fw-semibold d-flex align-items-center gap-2" @click="openEditProfileModal">
                        <i class="bx bx-edit font-18"></i>
                        <span>Sửa Thông Tin</span>
                    </button>
                    <router-link to="/client/ai-travel-planner" class="btn btn-create-trip rounded-pill px-3 py-2 fw-bold text-white d-flex align-items-center gap-2 text-decoration-none">
                        <i class="bx bx-calendar-plus font-18"></i>
                        <span>Tạo Lịch Trình Mới</span>
                    </router-link>
                </div>
            </div>

            <!-- STATS PILLS ROW -->
            <div class="profile-stats-grid mt-4 pt-4 border-top">
                <!-- Stat 1 -->
                <div class="stat-mini-card d-flex align-items-center gap-3 p-3 rounded-4">
                    <div class="stat-mini-icon icon-pink">
                        <i class="bx bx-bot"></i>
                    </div>
                    <div>
                        <div class="stat-mini-val">06</div>
                        <div class="stat-mini-label">Lịch Trình AI Đã Lập</div>
                        <div class="stat-mini-sub text-pink">Tiết kiệm ~24h</div>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="stat-mini-card d-flex align-items-center gap-3 p-3 rounded-4">
                    <div class="stat-mini-icon icon-purple">
                        <i class="bx bx-heart"></i>
                    </div>
                    <div>
                        <div class="stat-mini-val">14</div>
                        <div class="stat-mini-label">Điểm Đến Đã Ghim</div>
                        <div class="stat-mini-sub text-purple">Đà Nẵng &amp; Hội An</div>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="stat-mini-card d-flex align-items-center gap-3 p-3 rounded-4">
                    <div class="stat-mini-icon icon-cyan">
                        <i class="bx bx-briefcase-alt-2"></i>
                    </div>
                    <div>
                        <div class="stat-mini-val">03</div>
                        <div class="stat-mini-label">Tour Trải Nghiệm</div>
                        <div class="stat-mini-sub text-cyan">Hoàn thành 100%</div>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="stat-mini-card d-flex align-items-center gap-3 p-3 rounded-4">
                    <div class="stat-mini-icon icon-rose">
                        <i class="bx bx-award"></i>
                    </div>
                    <div>
                        <div class="stat-mini-val">12</div>
                        <div class="stat-mini-label">Đánh Giá &amp; Nhận Xét</div>
                        <div class="stat-mini-sub text-rose">Huy hiệu Đóng Góp</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. NAVIGATION TAB PILLS -->
        <div class="nav-tab-pills-bar d-flex align-items-center gap-2 mb-4 flex-wrap">
            <button 
                type="button" 
                class="btn btn-tab-pill rounded-pill px-4 py-2 small fw-bold d-flex align-items-center gap-2 active"
            >
                <i class="bx bx-sparkles"></i>
                <span>AI Personalization (Sở Thích)</span>
            </button>
            <router-link 
                to="/client/diem-den-yeu-thich"
                class="btn btn-tab-pill rounded-pill px-4 py-2 small fw-semibold text-secondary d-flex align-items-center gap-2 text-decoration-none"
            >
                <i class="bx bx-heart"></i>
                <span>Điểm Yêu Thích (14)</span>
            </router-link>
            <router-link 
                to="/client/bao-mat-tai-khoan"
                class="btn btn-tab-pill rounded-pill px-4 py-2 small fw-semibold text-secondary d-flex align-items-center gap-2 text-decoration-none"
            >
                <i class="bx bx-shield-quarter"></i>
                <span>Bảo Mật &amp; Phiên Đăng Nhập</span>
            </router-link>
        </div>

        <!-- 3. AI ALGORITHM BANNER (THUẬT TOÁN HỌC SÂU & TỐI ƯU HÓA) -->
        <div class="card algo-banner-card border-0 rounded-4 p-4 mb-4">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-start gap-3 flex-grow-1" style="max-width: 900px;">
                    <div class="algo-icon-circle flex-shrink-0">
                        <i class="bx bx-slider-alt"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                            <h2 class="h6 fw-bold text-dark mb-0">THUẬT TOÁN HỌC SÂU &amp; TỐI ƯU HÓA TUYẾN ĐƯỜNG ĐÀ NẴNG</h2>
                            <span class="badge-algo-ver">SMARTTRIP AI V2.4</span>
                        </div>
                        <p class="algo-desc-text small text-secondary mb-0">
                            Hệ thống biểu diễn sở thích dưới dạng ma trận trọng số (<code>the_so_thich × muc_do_uu_tien</code>). Khi bấm tạo lịch trình tự động, thuật toán Simulated Annealing &amp; Genetic Algorithm sẽ cân bằng giữa sở thích sao cao, khoảng cách di chuyển thực tế từ OpenStreetMap (OSM) và thời gian hoạt động lý tưởng của từng điểm đến.
                        </p>
                    </div>
                </div>

                <button type="button" class="btn btn-reset-algo rounded-pill px-3 py-2 small fw-semibold" @click="resetToDefault">
                    Khôi Phục Mặc Định
                </button>
            </div>
        </div>

        <!-- 4. PREFERENCES 2x2 GRID (4 CATEGORIES) -->
        <div class="row g-4 mb-4">
            <!-- CATEGORY 1: THIÊN NHIÊN & BIỂN ĐẢO -->
            <div class="col-12 col-lg-6">
                <div class="card pref-group-card border-0 rounded-4 shadow-sm p-4 h-100 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="cat-icon-circle icon-pink">
                                <i class="bx bx-landscape"></i>
                            </div>
                            <h3 class="h6 fw-bold text-dark mb-0">Thiên Nhiên &amp; Biển Đảo</h3>
                        </div>
                        <span class="badge-pref-tag tag-pink">ƯU TIÊN CAO</span>
                    </div>
                    <p class="cat-desc-text small text-muted mb-3">
                        Độ hấp dẫn đối với các kỳ quan sinh thái, bãi tắm và không gian xanh mở tại bán đảo Sơn Trà.
                    </p>

                    <!-- Items List -->
                    <div class="pref-items-list d-flex flex-column gap-2">
                        <div 
                            v-for="item in categories.nature.items" 
                            :key="item.id" 
                            class="pref-item-row p-3 rounded-3 d-flex align-items-center justify-content-between flex-wrap gap-2"
                        >
                            <div>
                                <div class="item-name fw-bold text-dark">{{ item.name }}</div>
                                <div class="item-sub text-muted smaller">{{ item.sub }}</div>
                            </div>
                            <!-- Star Rating -->
                            <div class="star-rating-box d-flex align-items-center gap-1">
                                <i 
                                    v-for="star in 5" 
                                    :key="star"
                                    class="bx font-18 cursor-pointer"
                                    :class="star <= item.rating ? 'bxs-star star-pink' : 'bx-star star-empty'"
                                    @click="setRating(item, star)"
                                    title="Chỉnh mức độ yêu thích"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CATEGORY 2: VĂN HÓA & DI SẢN CỔ KÍNH -->
            <div class="col-12 col-lg-6">
                <div class="card pref-group-card border-0 rounded-4 shadow-sm p-4 h-100 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="cat-icon-circle icon-purple">
                                <i class="bx bxs-landmark"></i>
                            </div>
                            <h3 class="h6 fw-bold text-dark mb-0">Văn Hóa &amp; Di Sản Cổ Kính</h3>
                        </div>
                        <span class="badge-pref-tag tag-purple">KHÁM PHÁ SÂU</span>
                    </div>
                    <p class="cat-desc-text small text-muted mb-3">
                        Độ ưu tiên các điểm văn hóa Chăm Pa, bảo tàng nghệ thuật và phố cổ lân cận.
                    </p>

                    <!-- Items List -->
                    <div class="pref-items-list d-flex flex-column gap-2">
                        <div 
                            v-for="item in categories.culture.items" 
                            :key="item.id" 
                            class="pref-item-row p-3 rounded-3 d-flex align-items-center justify-content-between flex-wrap gap-2"
                        >
                            <div>
                                <div class="item-name fw-bold text-dark">{{ item.name }}</div>
                                <div class="item-sub text-muted smaller">{{ item.sub }}</div>
                            </div>
                            <!-- Star Rating -->
                            <div class="star-rating-box d-flex align-items-center gap-1">
                                <i 
                                    v-for="star in 5" 
                                    :key="star"
                                    class="bx font-18 cursor-pointer"
                                    :class="star <= item.rating ? 'bxs-star star-purple' : 'bx-star star-empty'"
                                    @click="setRating(item, star)"
                                    title="Chỉnh mức độ yêu thích"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CATEGORY 3: ẨM THỰC ĐẶC SẢN & CHỢ ĐÊM -->
            <div class="col-12 col-lg-6">
                <div class="card pref-group-card border-0 rounded-4 shadow-sm p-4 h-100 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="cat-icon-circle icon-rose">
                                <i class="bx bx-restaurant"></i>
                            </div>
                            <h3 class="h6 fw-bold text-dark mb-0">Ẩm Thực Đặc Sản &amp; Chợ Đêm</h3>
                        </div>
                        <span class="badge-pref-tag tag-rose">YÊU THÍCH NHẤT</span>
                    </div>
                    <p class="cat-desc-text small text-muted mb-3">
                        Được xếp vào lịch trình trong các khung giờ vàng từ 11:30 – 13:00 và 18:00 – 21:00.
                    </p>

                    <!-- Items List -->
                    <div class="pref-items-list d-flex flex-column gap-2">
                        <div 
                            v-for="item in categories.food.items" 
                            :key="item.id" 
                            class="pref-item-row p-3 rounded-3 d-flex align-items-center justify-content-between flex-wrap gap-2"
                        >
                            <div>
                                <div class="item-name fw-bold text-dark">{{ item.name }}</div>
                                <div class="item-sub text-muted smaller">{{ item.sub }}</div>
                            </div>
                            <!-- Star Rating -->
                            <div class="star-rating-box d-flex align-items-center gap-1">
                                <i 
                                    v-for="star in 5" 
                                    :key="star"
                                    class="bx font-18 cursor-pointer"
                                    :class="star <= item.rating ? 'bxs-star star-rose' : 'bx-star star-empty'"
                                    @click="setRating(item, star)"
                                    title="Chỉnh mức độ yêu thích"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CATEGORY 4: HOẠT ĐỘNG NGOÀI TRỜI & PHIÊU LƯU -->
            <div class="col-12 col-lg-6">
                <div class="card pref-group-card border-0 rounded-4 shadow-sm p-4 h-100 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="cat-icon-circle icon-cyan">
                                <i class="bx bx-run"></i>
                            </div>
                            <h3 class="h6 fw-bold text-dark mb-0">Hoạt Động Ngoài Trời &amp; Phiêu Lưu</h3>
                        </div>
                        <span class="badge-pref-tag tag-cyan">NĂNG ĐỘNG</span>
                    </div>
                    <p class="cat-desc-text small text-muted mb-3">
                        Thích hợp cho các buổi sáng sớm (05:00 – 07:30) hoặc chiều muộn tránh nắng gắt miền Trung.
                    </p>

                    <!-- Items List -->
                    <div class="pref-items-list d-flex flex-column gap-2">
                        <div 
                            v-for="item in categories.outdoor.items" 
                            :key="item.id" 
                            class="pref-item-row p-3 rounded-3 d-flex align-items-center justify-content-between flex-wrap gap-2"
                        >
                            <div>
                                <div class="item-name fw-bold text-dark">{{ item.name }}</div>
                                <div class="item-sub text-muted smaller">{{ item.sub }}</div>
                            </div>
                            <!-- Star Rating -->
                            <div class="star-rating-box d-flex align-items-center gap-1">
                                <i 
                                    v-for="star in 5" 
                                    :key="star"
                                    class="bx font-18 cursor-pointer"
                                    :class="star <= item.rating ? 'bxs-star star-cyan' : 'bx-star star-empty'"
                                    @click="setRating(item, star)"
                                    title="Chỉnh mức độ yêu thích"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. BOTTOM ACTION BAR -->
        <div class="card bottom-action-bar border-0 rounded-4 shadow-sm p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bot-icon-circle">
                        <i class="bx bx-edit-alt"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">
                            Độ Tương Thích AI Hiện Tại: <span class="text-pink">{{ compatibilityScore }}%</span>
                        </div>
                        <div class="text-muted smaller">
                            Lần cập nhật gần nhất: {{ lastUpdatedText }} (Bởi {{ profile.ho_va_ten }})
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button type="button" class="btn btn-retrain-ai rounded-pill px-4 py-2 small fw-bold" @click="retrainAI">
                        Cho AI Học Lại Từ Đầu
                    </button>
                    <button type="button" class="btn btn-save-pref rounded-pill px-4 py-2 small fw-bold text-white d-flex align-items-center gap-2" @click="savePreferences" :disabled="isSaving">
                        <i class="bx" :class="isSaving ? 'bx-loader-alt bx-spin' : 'bxs-save'"></i>
                        <span>{{ isSaving ? 'Đang lưu...' : 'Lưu Cập Nhật Sở Thích' }}</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- MODAL: SỬA THÔNG TIN CÁ NHÂN -->
        <div class="modal fade" id="modalEditProfile" tabindex="-1" aria-hidden="true" ref="editProfileModalRef">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-dark">
                            <i class="bx bx-user-circle text-pink me-2"></i>Chỉnh Sửa Hồ Sơ Cá Nhân
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">HỌ VÀ TÊN</label>
                            <input v-model="editForm.ho_va_ten" type="text" class="form-control rounded-3" placeholder="Nhập họ và tên...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">SỐ ĐIỆN THOẠI</label>
                            <input v-model="editForm.so_dien_thoai" type="text" class="form-control rounded-3" placeholder="Nhập số điện thoại...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">KHU VỰC / ĐỊA CHỈ</label>
                            <input v-model="editForm.dia_chi" type="text" class="form-control rounded-3" placeholder="VD: Hải Châu, Đà Nẵng">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">MỤC TIÊU DU LỊCH &amp; PHONG CÁCH</label>
                            <textarea v-model="editForm.muc_tieu" rows="3" class="form-control rounded-3" placeholder="Ghi chú gu trải nghiệm..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-save-pref text-white rounded-pill px-4" @click="saveProfileModal">Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'HoSoSoThichComponent',
    data() {
        return {
            isSaving: false,
            modalInstance: null,
            lastUpdatedText: 'Hôm nay, 14:20',

            // Profile info matching screenshot
            profile: {
                ho_va_ten: 'Trần Minh Anh',
                email: 'minhanh.danang@gmail.com',
                so_dien_thoai: '(+84) 934 888 234',
                dia_chi: 'Hải Châu, Đà Nẵng',
                hang_thanh_vien: 'Du Khách Năng Động (Level 3 Explorer)',
                muc_tieu: 'Chinh phục toàn bộ các cung đường biển & ẩm thực đường phố miền Trung với sự hỗ trợ của thuật toán tối ưu đa tiêu chí.',
                avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&auto=format&fit=crop&q=80'
            },

            editForm: {
                ho_va_ten: '',
                so_dien_thoai: '',
                dia_chi: '',
                muc_tieu: ''
            },

            // 4 Categories with items & ratings
            categories: {
                nature: {
                    items: [
                        { id: 101, name: 'Núi & Rừng Nguyên Sinh Sơn Trà', sub: 'Voọc chà vá chân nâu, Đỉnh Bàn Cờ', rating: 5 },
                        { id: 102, name: 'Biển Mỹ Khê & Lặn Biển Cù Lao Chàm', sub: 'Bãi tắm top thế giới, lặn san hô', rating: 5 },
                        { id: 103, name: 'Thác Suối Mơ & Hòa Phú Thành', sub: 'Trượt thác, picnic sông suối dã ngoại', rating: 3 }
                    ]
                },
                culture: {
                    items: [
                        { id: 201, name: 'Phố Cổ Hội An & Làng Gốm Thanh Hà', sub: 'Đèn lồng, thuyền hoa đăng sông Hoài', rating: 4 },
                        { id: 202, name: 'Bảo Tàng Điêu Khắc Chăm & Cổ Viện', sub: 'Lịch sử Chăm Pa thế kỷ VII-XV', rating: 3 },
                        { id: 203, name: 'Chùa Linh Ứng & Quần Thể Ngũ Hành Sơn', sub: 'Tượng Phật Bà 67m, Động Huyền Không', rating: 4 }
                    ]
                },
                food: {
                    items: [
                        { id: 301, name: 'Món Ngon (Bánh Tráng Thịt Heo, Mì Quảng)', sub: 'Quán Mậu, Bà Vị, Bún Chả Cá 109', rating: 5 },
                        { id: 302, name: 'Chợ Đêm Sơn Trà & Phố Đi Bộ Bạch Đằng', sub: 'Hải sản xiên que, cầu Rồng phun lửa', rating: 5 },
                        { id: 303, name: 'Cafe View Biển & Sky Lounge Ngắm Sông Hàn', sub: 'Check-in hoàng hôn, ngắm thành phố đêm', rating: 4 }
                    ]
                },
                outdoor: {
                    items: [
                        { id: 401, name: 'Chèo SUP Ngắm Bình Minh Bán Đảo', sub: 'Bãi Bụt, Hòn Sụp, biển Mỹ Khê', rating: 5 },
                        { id: 402, name: 'Trekking Đỉnh Bàn Cờ & Hải Đăng Tiên Sa', sub: 'Độ khó vừa phải, tầm nhìn 360 độ', rating: 3 },
                        { id: 403, name: 'Beach Bar & Nhạc Acoustic Dọc Biển', sub: 'Dana Beach Club, Esco Beach Chill', rating: 2 }
                    ]
                }
            }
        };
    },
    computed: {
        compatibilityScore() {
            let totalStars = 0;
            let count = 0;
            Object.values(this.categories).forEach(cat => {
                cat.items.forEach(item => {
                    totalStars += item.rating;
                    count++;
                });
            });
            const avg = totalStars / (count * 5);
            return (avg * 100).toFixed(1);
        }
    },
    mounted() {
        if (window.bootstrap && this.$refs.editProfileModalRef) {
            this.modalInstance = new window.bootstrap.Modal(this.$refs.editProfileModalRef);
        }
    },
    methods: {
        setRating(item, star) {
            item.rating = star;
        },
        openEditProfileModal() {
            this.editForm = {
                ho_va_ten: this.profile.ho_va_ten,
                so_dien_thoai: this.profile.so_dien_thoai,
                dia_chi: this.profile.dia_chi,
                muc_tieu: this.profile.muc_tieu
            };
            if (this.modalInstance) {
                this.modalInstance.show();
            } else {
                const el = document.getElementById('modalEditProfile');
                if (el && window.bootstrap) {
                    new window.bootstrap.Modal(el).show();
                }
            }
        },
        saveProfileModal() {
            this.profile.ho_va_ten = this.editForm.ho_va_ten;
            this.profile.so_dien_thoai = this.editForm.so_dien_thoai;
            this.profile.dia_chi = this.editForm.dia_chi;
            this.profile.muc_tieu = this.editForm.muc_tieu;

            if (this.modalInstance) {
                this.modalInstance.hide();
            }

            if (this.$toast) {
                this.$toast.success('Đã cập nhật thông tin cá nhân thành công!');
            }
        },
        resetToDefault() {
            this.categories.nature.items[0].rating = 5;
            this.categories.nature.items[1].rating = 5;
            this.categories.nature.items[2].rating = 3;

            this.categories.culture.items[0].rating = 4;
            this.categories.culture.items[1].rating = 3;
            this.categories.culture.items[2].rating = 4;

            this.categories.food.items[0].rating = 5;
            this.categories.food.items[1].rating = 5;
            this.categories.food.items[2].rating = 4;

            this.categories.outdoor.items[0].rating = 5;
            this.categories.outdoor.items[1].rating = 3;
            this.categories.outdoor.items[2].rating = 2;

            if (this.$toast) {
                this.$toast.info('Đã khôi phục các trọng số sở thích về mặc định.');
            }
        },
        retrainAI() {
            if (this.$toast) {
                this.$toast.info('AI đang nạp lại ma trận sở thích và tối ưu lại các tuyến đường...');
            }
            setTimeout(() => {
                const now = new Date();
                this.lastUpdatedText = `Hôm nay, ${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
                if (this.$toast) {
                    this.$toast.success('AI đã hoàn tất quá trình huấn luyện lại mô hình đề xuất cá nhân!');
                }
            }, 800);
        },
        savePreferences() {
            this.isSaving = true;
            setTimeout(() => {
                this.isSaving = false;
                const now = new Date();
                this.lastUpdatedText = `Hôm nay, ${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
                if (this.$toast) {
                    this.$toast.success('Đã lưu cập nhật ma trận sở thích thành công! Thuật toán AI đã sẵn sàng.');
                }
            }, 600);
        }
    }
};
</script>

<style scoped>
/* ==========================================================================
   1. USER PROFILE HEADER
   ========================================================================== */
.profile-header-card {
    border: 1px solid #f1f5f9;
}

.profile-avatar-wrapper {
    width: 96px;
    height: 96px;
}

.profile-avatar-img {
    width: 96px;
    height: 96px;
    border: 3px solid #f472b6;
    box-shadow: 0 4px 14px rgba(236, 72, 153, 0.25);
}

.verified-badge-icon {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: #ec4899;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    border: 2px solid #ffffff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
}

.badge-explorer-pill {
    background: #f3e8ff;
    color: #9333ea;
    font-size: 11.5px;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
}

.meta-dot {
    color: #cbd5e1;
}

.profile-bio-text {
    line-height: 1.5;
    max-width: 680px;
}

.btn-edit-profile {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #334155;
    font-size: 13px;
    transition: all 0.2s ease;
}

.btn-edit-profile:hover {
    background: #f1f5f9;
    color: #0f172a;
}

.btn-create-trip {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    font-size: 13px;
    box-shadow: 0 6px 18px rgba(219, 39, 119, 0.35);
    transition: all 0.25s ease;
}

.btn-create-trip:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(219, 39, 119, 0.5);
    background: linear-gradient(135deg, #f472b6 0%, #be185d 100%);
}

/* Stats mini grid */
.profile-stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}

.stat-mini-card {
    background: #f8fafc;
    border: 1px solid #f1f5f9;
    transition: all 0.25s ease;
}

.stat-mini-card:hover {
    background: #ffffff;
    border-color: #e2e8f0;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.04);
    transform: translateY(-2px);
}

.stat-mini-icon {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
}

.icon-pink { background: #fdf2f8; color: #db2777; }
.icon-purple { background: #f3e8ff; color: #9333ea; }
.icon-cyan { background: #e0f2fe; color: #0284c7; }
.icon-rose { background: #ffe4e6; color: #e11d48; }

.text-pink { color: #db2777 !important; }
.text-purple { color: #9333ea !important; }
.text-cyan { color: #0284c7 !important; }
.text-rose { color: #e11d48 !important; }

.stat-mini-val {
    font-size: 22px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.1;
}

.stat-mini-label {
    font-size: 12px;
    font-weight: 700;
    color: #475569;
    margin-bottom: 2px;
}

.stat-mini-sub {
    font-size: 11px;
    font-weight: 600;
}

/* ==========================================================================
   2. NAV TAB PILLS BAR
   ========================================================================== */
.btn-tab-pill {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    color: #64748b;
    transition: all 0.2s ease;
}

.btn-tab-pill:hover {
    background: #f8fafc;
    color: #0f172a;
}

.btn-tab-pill.active {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    border-color: #db2777;
    color: #ffffff;
    box-shadow: 0 4px 14px rgba(219, 39, 119, 0.3);
}

/* ==========================================================================
   3. ALGO BANNER
   ========================================================================== */
.algo-banner-card {
    background: #fbf8ff;
    border: 1px solid #ede4ff !important;
}

.algo-icon-circle {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #7c3aed;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

.badge-algo-ver {
    background: #fdf2f8;
    color: #db2777;
    font-size: 10.5px;
    font-weight: 800;
    padding: 3px 8px;
    border-radius: 6px;
    letter-spacing: 0.5px;
}

.algo-desc-text {
    line-height: 1.6;
}

.algo-desc-text code {
    background: rgba(124, 58, 237, 0.08);
    color: #7c3aed;
    padding: 2px 6px;
    border-radius: 4px;
}

.btn-reset-algo {
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #475569;
    transition: all 0.2s ease;
}

.btn-reset-algo:hover {
    background: #f8fafc;
    border-color: #94a3b8;
    color: #0f172a;
}

/* ==========================================================================
   4. PREFERENCE GROUP CARDS
   ========================================================================== */
.pref-group-card {
    border: 1px solid #f1f5f9;
}

.cat-icon-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.badge-pref-tag {
    font-size: 10.5px;
    font-weight: 800;
    padding: 4px 10px;
    border-radius: 20px;
    letter-spacing: 0.6px;
}

.tag-pink { background: #fdf2f8; color: #db2777; }
.tag-purple { background: #f3e8ff; color: #9333ea; }
.tag-rose { background: #ffe4e6; color: #e11d48; }
.tag-cyan { background: #e0f2fe; color: #0284c7; }

.cat-desc-text {
    line-height: 1.5;
}

/* Row items */
.pref-item-row {
    background: #f8fafc;
    border: 1px solid #f1f5f9;
    transition: all 0.2s ease;
}

.pref-item-row:hover {
    background: #ffffff;
    border-color: #e2e8f0;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
}

.item-name {
    font-size: 13px;
    line-height: 1.25;
}

.item-sub {
    font-size: 11px;
}

/* Stars */
.star-rating-box i {
    transition: transform 0.15s ease;
}

.star-rating-box i:hover {
    transform: scale(1.2);
}

.cursor-pointer {
    cursor: pointer;
}

.star-pink { color: #ec4899; }
.star-purple { color: #a855f7; }
.star-rose { color: #f43f5e; }
.star-cyan { color: #0ea5e9; }
.star-empty { color: #cbd5e1; }

/* ==========================================================================
   5. BOTTOM ACTION BAR
   ========================================================================== */
.bottom-action-bar {
    border: 1px solid #f1f5f9;
}

.bot-icon-circle {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #fdf2f8;
    color: #db2777;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.btn-retrain-ai {
    background: #ede9fe;
    color: #7c3aed;
    border: none;
    transition: all 0.2s ease;
}

.btn-retrain-ai:hover {
    background: #ddd6fe;
    color: #6d28d9;
}

.btn-save-pref {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    border: none;
    box-shadow: 0 6px 18px rgba(219, 39, 119, 0.35);
    transition: all 0.25s ease;
}

.btn-save-pref:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(219, 39, 119, 0.5);
    background: linear-gradient(135deg, #f472b6 0%, #be185d 100%);
}

.smaller {
    font-size: 0.8rem;
}

/* ==========================================================================
   RESPONSIVE
   ========================================================================== */
@media (max-width: 991.98px) {
    .profile-stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 575.98px) {
    .profile-stats-grid {
        grid-template-columns: 1fr;
    }
    .profile-avatar-wrapper {
        margin: 0 auto;
    }
}
</style>
