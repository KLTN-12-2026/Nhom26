<template>
    <div class="diem-den-yeu-thich-page pb-5">
        <!-- 1. Header Section -->
        <div class="card border-0 rounded-4 p-4 shadow-sm mb-4 bg-white position-relative overflow-hidden">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <span class="badge badge-collection-tag rounded-pill px-3 py-1 small fw-bold mb-2 d-inline-flex align-items-center gap-1">
                        <i class="bx bxs-heart text-pink"></i>BỘ SƯU TẬP CÁ NHÂN • ĐÀ NẴNG
                    </span>
                    <h1 class="h3 fw-bold text-dark mb-2">
                        Địa Điểm Yêu Thích &amp; Bộ Sưu Tập Khám Phá Đà Nẵng
                    </h1>
                    <p class="text-secondary small mb-0 line-clamp-2" style="max-width: 820px; font-size: 0.92rem;">
                        Lưu trữ và phân loại các thắng cảnh, quán ăn đặc sản, quán cafe check-in và bãi biển yêu thích để sẵn sàng nạp nhanh vào thuật toán AI tạo lịch trình.
                    </p>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button type="button" class="btn btn-new-collection rounded-pill px-3 py-2 fw-semibold text-white d-flex align-items-center gap-2" @click="showNewCollectionModal = true">
                        <i class="bx bx-folder-plus fs-5"></i>
                        <span>Tạo Bộ Sưu Tập Mới</span>
                    </button>
                    <router-link to="/client/lich-trinh-toi-uu" class="btn btn-create-ai rounded-pill px-3 py-2 fw-bold text-white d-flex align-items-center gap-2 text-decoration-none">
                        <i class="bx bx-bot fs-5"></i>
                        <span>Tạo Lịch Trình AI Ngay</span>
                    </router-link>
                </div>
            </div>
        </div>

        <!-- 2. Collection Category Pills -->
        <div class="collection-categories-bar d-flex align-items-center gap-2 mb-3 flex-wrap">
            <button 
                v-for="cat in collectionCategories" 
                :key="cat.id"
                type="button" 
                class="btn btn-cat-pill rounded-pill px-3 py-2 small fw-semibold d-flex align-items-center gap-2"
                :class="{ active: selectedCategory === cat.id }"
                @click="selectedCategory = cat.id"
            >
                <i :class="cat.icon"></i>
                <span>{{ cat.label }}</span>
                <span class="badge rounded-pill" :class="selectedCategory === cat.id ? 'bg-white text-pink' : 'bg-light text-secondary'">
                    {{ cat.count }}
                </span>
            </button>
        </div>

        <!-- 3. Search & District Filter Bar -->
        <div class="card border rounded-4 shadow-sm p-3 mb-4 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <!-- Search input -->
                <div class="search-input-wrap position-relative flex-grow-1" style="max-width: 320px;">
                    <i class="bx bx-search search-icon position-absolute"></i>
                    <input 
                        type="text" 
                        class="form-control form-control-sm search-input rounded-pill ps-4 pe-3 py-2" 
                        placeholder="Tìm nhanh trong 14 địa điểm đã lưu..."
                        v-model="key_search"
                    >
                </div>

                <!-- District Filter Pills -->
                <div class="d-flex align-items-center gap-1 flex-wrap">
                    <span class="text-muted small fw-bold text-uppercase me-1" style="font-size: 0.72rem;">Quận/Huyện:</span>
                    <button 
                        v-for="dist in districts" 
                        :key="dist.key"
                        type="button" 
                        class="btn btn-district-pill rounded-pill px-2 py-1 small fw-medium"
                        :class="{ active: selectedDistrict === dist.key }"
                        @click="selectedDistrict = dist.key"
                    >
                        {{ dist.label }}
                    </button>
                </div>

                <!-- Sort Dropdown -->
                <div class="d-flex align-items-center gap-1">
                    <span class="text-secondary small">Sắp xếp:</span>
                    <select class="form-select form-select-sm sort-select rounded-pill" v-model="sortCriteria">
                        <option value="recent">Mới lưu gần đây</option>
                        <option value="rating">Đánh giá cao nhất</option>
                        <option value="distance">Gần bạn nhất</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- 4. Main 2-Column Content Layout -->
        <div class="row g-4">
            <!-- Left Column: 6 POI Cards (8 Cols) -->
            <div class="col-lg-8">
                <div class="row g-3 g-md-4">
                    <div 
                        v-for="item in filteredPOIs" 
                        :key="item.id"
                        class="col-md-6"
                    >
                        <div class="card poi-card border rounded-4 shadow-sm h-100 overflow-hidden bg-white d-flex flex-column">
                            <!-- Card Media Wrap -->
                            <div class="position-relative poi-media-wrap">
                                <img :src="item.hinh_anh" class="w-100 h-100 object-fit-cover" :alt="item.ten">

                                <!-- Top overlay action icons -->
                                <div class="position-absolute top-0 start-0 w-100 p-2 d-flex justify-content-between align-items-center">
                                    <button 
                                        type="button" 
                                        class="btn btn-select-poi rounded-circle"
                                        :class="{ selected: isSelectedForAI(item.id) }"
                                        @click="toggleSelectPOI(item)"
                                    >
                                        <i class="bx" :class="isSelectedForAI(item.id) ? 'bx-check' : ''"></i>
                                    </button>
                                    <div class="d-flex align-items-center gap-1">
                                        <button 
                                            type="button" 
                                            class="btn btn-media-round rounded-circle"
                                            :class="{ active: item.isLiked }"
                                            @click="item.isLiked = !item.isLiked"
                                        >
                                            <i class="bx" :class="item.isLiked ? 'bxs-heart text-danger' : 'bx-heart'"></i>
                                        </button>
                                        <button 
                                            type="button" 
                                            class="btn btn-media-round rounded-circle"
                                            @click="handleSharePOI(item)"
                                        >
                                            <i class="bx bx-share-alt"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Bottom distance & hours pill over image -->
                                <div class="media-bottom-pill position-absolute bottom-0 start-0 m-2 px-2 py-1 rounded-pill small d-flex align-items-center gap-2">
                                    <span class="d-flex align-items-center gap-1">
                                        <i class="bx bx-map-pin"></i>{{ item.khoang_cach }}
                                    </span>
                                    <span>•</span>
                                    <span class="d-flex align-items-center gap-1">
                                        <i class="bx bx-time"></i>{{ item.gio_mo_cua }}
                                    </span>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body p-3 d-flex flex-column flex-grow-1">
                                <!-- Tags -->
                                <div class="d-flex flex-wrap gap-1 mb-2">
                                    <span v-for="tag in item.tags" :key="tag" class="badge badge-poi-tag rounded-pill px-2 py-0">
                                        {{ tag }}
                                    </span>
                                </div>

                                <!-- Title -->
                                <h2 class="h6 fw-bold text-dark poi-title mb-1 text-truncate" :title="item.ten">
                                    {{ item.ten }}
                                </h2>

                                <!-- Address -->
                                <p class="text-secondary small poi-address mb-2 text-truncate" :title="item.dia_chi">
                                    {{ item.dia_chi }}
                                </p>

                                <!-- Rating & Price line -->
                                <div class="d-flex justify-content-between align-items-center small text-secondary mt-auto mb-3 pt-2 border-top">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="bx bxs-star text-warning"></i>
                                        <strong class="text-dark">{{ item.diem_danh_gia }}</strong>
                                        <span class="text-muted">({{ item.luot_danh_gia }})</span>
                                    </div>
                                    <div class="poi-price-info fw-semibold" :class="item.gia_ve_class || 'text-teal'">
                                        {{ item.gia_ve }}
                                    </div>
                                </div>

                                <!-- Action Button: Added to AI vs Add to AI -->
                                <button 
                                    v-if="isSelectedForAI(item.id)"
                                    type="button" 
                                    class="btn btn-added-ai rounded-pill w-100 py-1 small fw-bold text-pink d-flex align-items-center justify-content-center gap-1 border border-pink-subtle"
                                    @click="toggleSelectPOI(item)"
                                >
                                    <i class="bx bx-check fs-6"></i>
                                    <span>Đã Trong Lịch Trình AI</span>
                                </button>

                                <button 
                                    v-else
                                    type="button" 
                                    class="btn btn-add-ai rounded-pill w-100 py-1 small fw-bold text-secondary d-flex align-items-center justify-content-center gap-1 border"
                                    @click="toggleSelectPOI(item)"
                                >
                                    <i class="bx bx-plus fs-6"></i>
                                    <span>Thêm vào Lịch Trình AI</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sticky AI Route Optimizer Sidebar (4 Cols) -->
            <div class="col-lg-4">
                <div class="ai-sticky-sidebar d-flex flex-column gap-3">
                    <!-- Widget 1: Bộ Lọc Điểm AI Sẵn Sàng -->
                    <div class="card border rounded-4 shadow-sm p-3 p-md-4 bg-white">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="ai-box-icon rounded-3 text-pink d-flex align-items-center justify-content-center">
                                    <i class="bx bx-cube fs-4"></i>
                                </div>
                                <div>
                                    <h2 class="h6 fw-bold text-dark mb-0">Bộ Lọc Điểm AI Sẵn Sàng</h2>
                                    <small class="text-muted" style="font-size: 0.72rem;">Thuật toán tối ưu tuyến đường</small>
                                </div>
                            </div>
                            <span class="badge bg-pink text-white rounded-pill px-2 py-1 small">
                                {{ selectedPOIs.length }} điểm đã chọn
                            </span>
                        </div>

                        <!-- 2 KPI Mini Cards -->
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <div class="kpi-mini-card p-2 rounded-3 border bg-light text-center">
                                    <div class="text-muted text-uppercase" style="font-size: 0.65rem;">Quãng Đường</div>
                                    <div class="fw-bold fs-6 text-dark mt-1">14.5 km</div>
                                    <div class="text-teal small" style="font-size: 0.7rem;">Tiết kiệm 4.6 km</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="kpi-mini-card p-2 rounded-3 border bg-light text-center">
                                    <div class="text-muted text-uppercase" style="font-size: 0.65rem;">Thời Gian</div>
                                    <div class="fw-bold fs-6 text-dark mt-1">6.5 giờ</div>
                                    <div class="text-muted small" style="font-size: 0.7rem;">Phù hợp 1 ngày</div>
                                </div>
                            </div>
                        </div>

                        <!-- TSP Sequence Timeline -->
                        <div class="tsp-sequence-box p-3 rounded-4 bg-light border mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-pink fw-bold text-uppercase" style="font-size: 0.7rem;">
                                    <i class="bx bx-trip me-1"></i>Thứ tự đề xuất (AI TSP):
                                </span>
                                <a href="javascript:void(0)" class="text-secondary text-decoration-none small" style="font-size: 0.7rem;" @click="handleReverseRoute">
                                    Đổi vị trí xuất phát
                                </a>
                            </div>

                            <div class="tsp-timeline-list d-flex flex-column gap-2 position-relative">
                                <div 
                                    v-for="(st, idx) in tspSteps" 
                                    :key="st.id"
                                    class="d-flex align-items-center justify-content-between small tsp-step-item"
                                >
                                    <div class="d-flex align-items-center gap-2 text-truncate me-2">
                                        <span class="tsp-step-circle text-white fw-bold">{{ idx + 1 }}</span>
                                        <span class="text-dark fw-semibold text-truncate">{{ st.title }}</span>
                                    </div>
                                    <span class="text-primary fw-bold font-monospace flex-shrink-0" style="font-size: 0.75rem;">
                                        {{ st.time }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <router-link 
                            to="/client/lich-trinh-toi-uu" 
                            class="btn btn-run-ai-tsp w-100 rounded-pill py-2 fw-bold text-white shadow-sm d-flex align-items-center justify-content-center gap-2 text-decoration-none"
                        >
                            <i class="bx bx-navigation fs-5"></i>
                            <span>Chạy Thuật Toán Tối Ưu Cho 4 Điểm Này</span>
                        </router-link>
                    </div>

                    <!-- Widget 2: Cấu Hình AI Cá Nhân -->
                    <div class="card border rounded-4 shadow-sm p-3 p-md-4 bg-white">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-slider-alt text-secondary fs-5"></i>
                                <h3 class="h6 fw-bold text-dark mb-0 text-uppercase" style="font-size: 0.82rem;">Cấu Hình AI Cá Nhân</h3>
                            </div>
                            <a href="javascript:void(0)" class="text-pink small text-decoration-none fw-semibold" @click="showConfigModal = true">
                                Tùy biến
                            </a>
                        </div>

                        <div class="d-flex flex-column gap-2 small">
                            <div class="d-flex justify-content-between align-items-center p-2 rounded-3 border bg-light">
                                <span class="d-flex align-items-center gap-2 text-secondary">
                                    <i class="bx bx-cycling text-teal fs-6"></i>Phương tiện ưu tiên
                                </span>
                                <span class="fw-bold text-dark">Xe máy / Grab</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center p-2 rounded-3 border bg-light">
                                <span class="d-flex align-items-center gap-2 text-secondary">
                                    <i class="bx bx-coffee text-purple fs-6"></i>Nhịp độ di chuyển
                                </span>
                                <span class="fw-bold text-dark">Thong thả, chill</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center p-2 rounded-3 border bg-light">
                                <span class="d-flex align-items-center gap-2 text-secondary">
                                    <i class="bx bx-sun text-warning fs-6"></i>Tránh nắng gắt 12h-14h
                                </span>
                                <span class="badge bg-pink text-white rounded-pill px-2 py-1">Đang kích hoạt</span>
                            </div>
                        </div>
                    </div>

                    <!-- Widget 3: Phân Bổ Bản Đồ OSM -->
                    <div class="card border rounded-4 shadow-sm p-3 bg-white">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-map-pin text-pink"></i>
                                <strong class="small text-dark text-uppercase" style="font-size: 0.8rem;">Phân Bổ Bản Đồ OSM</strong>
                            </div>
                            <span class="text-muted small" style="font-size: 0.7rem;">OpenStreetMap Sync</span>
                        </div>
                        <div class="map-mini-wrap rounded-4 overflow-hidden position-relative border" style="height: 120px;">
                            <img 
                                src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?w=600&auto=format&fit=crop&q=80" 
                                alt="OSM Map View" 
                                class="w-100 h-100 object-fit-cover"
                            >
                            <div class="position-absolute bottom-0 start-0 w-100 p-2 text-center text-white small" style="background: rgba(15,23,42,0.65); backdrop-filter: blur(4px); font-size: 0.72rem;">
                                <i class="bx bx-check-circle text-teal me-1"></i>4 điểm nằm trong bán kính 10km
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal: Tạo bộ sưu tập mới -->
        <div class="modal fade" :class="{ show: showNewCollectionModal }" :style="{ display: showNewCollectionModal ? 'block' : 'none' }" tabindex="-1" v-if="showNewCollectionModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-dark">Tạo Bộ Sưu Tập Mới</h5>
                        <button type="button" class="btn-close" @click="showNewCollectionModal = false"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Tên bộ sưu tập *</label>
                            <input type="text" class="form-control rounded-pill" placeholder="VD: Cafe view biển, Quán ăn đêm..." v-model="newCollectionName">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Mô tả ngắn</label>
                            <textarea class="form-control rounded-3" rows="2" placeholder="Ghi chú về bộ sưu tập này..." v-model="newCollectionDesc"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" @click="showNewCollectionModal = false">Hủy</button>
                        <button type="button" class="btn btn-pink text-white rounded-pill px-4" @click="handleCreateCollection">Tạo mới</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal: Tùy biến cấu hình AI -->
        <div class="modal fade" :class="{ show: showConfigModal }" :style="{ display: showConfigModal ? 'block' : 'none' }" tabindex="-1" v-if="showConfigModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-dark">Tùy Biến Cấu Hình AI Cá Nhân</h5>
                        <button type="button" class="btn-close" @click="showConfigModal = false"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Phương tiện ưu tiên</label>
                            <select class="form-select rounded-pill">
                                <option>Xe máy / Grab</option>
                                <option>Ô tô tự lái / Thuê có tài xế</option>
                                <option>Đi bộ / Xe buýt</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nhịp độ tham quan</label>
                            <select class="form-select rounded-pill">
                                <option>Thong thả, chill (2–3 điểm/ngày)</option>
                                <option>Năng động, khám phá nhiều (4–5 điểm/ngày)</option>
                                <option>Tối ưu chụp ảnh sống ảo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-pink text-white rounded-pill px-4" @click="showConfigModal = false">Lưu cấu hình</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show" v-if="showNewCollectionModal || showConfigModal" @click="closeAllModals"></div>
    </div>
</template>

<script>
export default {
    name: 'DiemDenYeuThichComponent',
    data() {
        return {
            key_search: '',
            selectedCategory: 'all',
            selectedDistrict: 'all',
            sortCriteria: 'recent',
            showNewCollectionModal: false,
            showConfigModal: false,
            newCollectionName: '',
            newCollectionDesc: '',
            selectedPOIs: [1, 2, 3, 4],
            collectionCategories: [
                { id: 'all', label: 'Tất cả đã lưu', count: 14, icon: 'bx bx-bookmark' },
                { id: 'nature', label: 'Biển & Thiên Nhiên', count: 5, icon: 'bx bx-water' },
                { id: 'food', label: 'Ẩm thực & Quán ruột', count: 4, icon: 'bx bx-restaurant' },
                { id: 'checkin', label: 'Check-in sống ảo', count: 3, icon: 'bx bx-camera' },
                { id: 'culture', label: 'Di tích & Tâm linh', count: 2, icon: 'bx bx-temple' }
            ],
            districts: [
                { key: 'all', label: 'Tất cả' },
                { key: 'sontra', label: 'Sơn Trà (6)' },
                { key: 'haichau', label: 'Hải Châu (4)' },
                { key: 'nguhanhson', label: 'Ngũ Hành Sơn (3)' },
                { key: 'hoavang', label: 'Hòa Vang (1)' }
            ],
            tspSteps: [
                { id: 3, title: 'Bánh Tráng Cuốn Thịt Heo Đạ...', time: '11:30' },
                { id: 1, title: 'Chùa Linh Ứng Bãi Bụt...', time: '14:00' },
                { id: 2, title: 'Bãi Biển Mỹ Khê (SUP)...', time: '16:30' },
                { id: 4, title: 'Cầu Rồng & Chợ Đêm...', time: '19:30' }
            ],
            allPOIs: [
                {
                    id: 1,
                    ten: 'Chùa Linh Ứng Bãi Bụt – Bán Đảo Sơn Trà',
                    dia_chi: 'Bãi Bụt, Phường Thọ Quang, Quận Sơn Trà',
                    khoang_cach: '8.4 km từ bạn',
                    gio_mo_cua: '06:00 – 18:30',
                    tags: ['#TâmLinh', '#ThiênNhiên', '#MiễnPhí'],
                    diem_danh_gia: '4.9',
                    luot_danh_gia: '1.420 đánh giá',
                    gia_ve: 'Vé: Miễn phí',
                    gia_ve_class: 'text-teal',
                    hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=600&auto=format&fit=crop&q=80',
                    category: 'nature',
                    district: 'sontra',
                    isLiked: true
                },
                {
                    id: 2,
                    ten: 'Bãi Biển Mỹ Khê (Khu Vực Bãi Tắm Số 1, 2)',
                    dia_chi: 'Võ Nguyên Giáp, Phước Mỹ, Sơn Trà',
                    khoang_cach: '2.8 km từ bạn',
                    gio_mo_cua: 'Mở cả ngày',
                    tags: ['#Biển', '#ChèoSUP', '#MiễnPhí'],
                    diem_danh_gia: '4.8',
                    luot_danh_gia: '3.890 đánh giá',
                    gia_ve: 'Hoạt động SUP: ~150k',
                    gia_ve_class: 'text-teal',
                    hinh_anh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&auto=format&fit=crop&q=80',
                    category: 'nature',
                    district: 'sontra',
                    isLiked: true
                },
                {
                    id: 3,
                    ten: 'Bánh Tráng Cuốn Thịt Heo Đại Lộc',
                    dia_chi: '97 Trưng Nữ Vương, Bình Hiên, Hải Châu',
                    khoang_cach: '1.2 km từ bạn',
                    gio_mo_cua: '09:00 – 21:30',
                    tags: ['#ẨmThực', '#ĐặcSảnĐàNẵng', '#QuánRuột'],
                    diem_danh_gia: '4.8',
                    luot_danh_gia: '980 đánh giá',
                    gia_ve: '85.000đ / người',
                    gia_ve_class: 'text-pink',
                    hinh_anh: 'https://images.unsplash.com/photo-1544644181-1484b3fdfc62?w=600&auto=format&fit=crop&q=80',
                    category: 'food',
                    district: 'haichau',
                    isLiked: true
                },
                {
                    id: 4,
                    ten: 'Cầu Rồng & Chợ Đêm Sơn Trà',
                    dia_chi: 'Đầu cầu Rồng, An Hải Tây, Sơn Trà',
                    khoang_cach: '2.1 km từ bạn',
                    gio_mo_cua: 'Phun lửa 21:00 T7 & CN',
                    tags: ['#Check-in', '#ChợĐêm', '#SôngHàn'],
                    diem_danh_gia: '4.9',
                    luot_danh_gia: '5.120 đánh giá',
                    gia_ve: 'Khám phá miễn phí',
                    gia_ve_class: 'text-teal',
                    hinh_anh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=600&auto=format&fit=crop&q=80',
                    category: 'checkin',
                    district: 'sontra',
                    isLiked: true
                },
                {
                    id: 5,
                    ten: 'Bảo Tàng Điêu Khắc Chăm Đà Nẵng',
                    dia_chi: 'Số 02 Đường 2 Tháng 9, Bình Hiên, Hải Châu',
                    khoang_cach: '1.5 km từ bạn',
                    gio_mo_cua: '07:30 – 17:00',
                    tags: ['#VănHóa', '#LịchSử', '#DiSản'],
                    diem_danh_gia: '4.7',
                    luot_danh_gia: '1.140 đánh giá',
                    gia_ve: 'Vé: 60.000đ / vé',
                    gia_ve_class: 'text-purple',
                    hinh_anh: 'https://images.unsplash.com/photo-1565008447742-97f6f38c985c?w=600&auto=format&fit=crop&q=80',
                    category: 'culture',
                    district: 'haichau',
                    isLiked: false
                },
                {
                    id: 6,
                    ten: 'Đỉnh Bàn Cờ & Hải Đăng Tiên Sa',
                    dia_chi: 'Đỉnh núi Sơn Trà, Thọ Quang, Sơn Trà',
                    khoang_cach: '12.6 km từ bạn',
                    gio_mo_cua: '06:30 – 18:00',
                    tags: ['#Trekking', '#NgắmCảnh', '#SốngẢo'],
                    diem_danh_gia: '4.8',
                    luot_danh_gia: '2.310 đánh giá',
                    gia_ve: 'Vé: Miễn phí',
                    gia_ve_class: 'text-teal',
                    hinh_anh: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=600&auto=format&fit=crop&q=80',
                    category: 'nature',
                    district: 'sontra',
                    isLiked: false
                }
            ]
        };
    },
    computed: {
        filteredPOIs() {
            let list = [...this.allPOIs];

            // Filter keyword
            if (this.key_search.trim()) {
                const q = this.key_search.toLowerCase().trim();
                list = list.filter(item => 
                    item.ten.toLowerCase().includes(q) ||
                    item.dia_chi.toLowerCase().includes(q) ||
                    item.tags.some(t => t.toLowerCase().includes(q))
                );
            }

            // Filter category
            if (this.selectedCategory !== 'all') {
                list = list.filter(item => item.category === this.selectedCategory);
            }

            // Filter district
            if (this.selectedDistrict !== 'all') {
                list = list.filter(item => item.district === this.selectedDistrict);
            }

            // Sort
            if (this.sortCriteria === 'rating') {
                list.sort((a, b) => parseFloat(b.diem_danh_gia) - parseFloat(a.diem_danh_gia));
            }

            return list.length > 0 ? list : this.allPOIs;
        }
    },
    methods: {
        isSelectedForAI(id) {
            return this.selectedPOIs.includes(id);
        },
        toggleSelectPOI(poi) {
            const idx = this.selectedPOIs.indexOf(poi.id);
            if (idx >= 0) {
                this.selectedPOIs.splice(idx, 1);
            } else {
                this.selectedPOIs.push(poi.id);
            }
        },
        handleSharePOI(poi) {
            alert(`Đã sao chép liên kết chia sẻ của địa điểm: ${poi.ten}`);
        },
        handleReverseRoute() {
            this.tspSteps.reverse();
            alert('Đã đảo ngược thứ tự các chặng di chuyển trong thuật toán tối ưu TSP!');
        },
        handleCreateCollection() {
            if (!this.newCollectionName) {
                alert('Vui lòng nhập tên bộ sưu tập!');
                return;
            }
            alert(`Đã tạo thành công bộ sưu tập mới: "${this.newCollectionName}"!`);
            this.showNewCollectionModal = false;
            this.newCollectionName = '';
            this.newCollectionDesc = '';
        },
        closeAllModals() {
            this.showNewCollectionModal = false;
            this.showConfigModal = false;
        }
    }
};
</script>

<style scoped>
.diem-den-yeu-thich-page {
    max-width: 100%;
    overflow-x: hidden;
}

/* Color tokens */
.text-pink { color: #db2777 !important; }
.text-teal { color: #0d9488 !important; }
.text-purple { color: #7c3aed !important; }
.bg-pink { background: linear-gradient(135deg, #ec4899 0%, #db2777 100%) !important; }

/* 1. Header */
.badge-collection-tag {
    background: #fdf2f8;
    color: #db2777;
    border: 1px solid #fbcfe8;
}
.btn-new-collection {
    background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
    box-shadow: 0 4px 10px rgba(109, 40, 217, 0.25);
    font-size: 0.88rem;
    transition: all 0.2s;
}
.btn-new-collection:hover {
    opacity: 0.95;
    transform: translateY(-1px);
}
.btn-create-ai {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    box-shadow: 0 4px 12px rgba(219, 39, 119, 0.25);
    font-size: 0.88rem;
    transition: all 0.2s;
}
.btn-create-ai:hover {
    opacity: 0.95;
    transform: translateY(-1px);
}

/* 2. Collection Category Pills */
.btn-cat-pill {
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #475569;
    transition: all 0.2s;
}
.btn-cat-pill:hover {
    background-color: #f1f5f9;
}
.btn-cat-pill.active {
    background: #db2777;
    border-color: #db2777;
    color: #fff;
    box-shadow: 0 2px 8px rgba(219, 39, 119, 0.25);
}

/* 3. Search & District Pills */
.search-icon {
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 0.95rem;
}
.search-input {
    background-color: #f8fafc;
    border-color: #e2e8f0;
    font-size: 0.82rem;
}
.btn-district-pill {
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #64748b;
    font-size: 0.78rem;
    transition: all 0.2s;
}
.btn-district-pill:hover {
    background-color: #f1f5f9;
}
.btn-district-pill.active {
    background-color: #1e293b;
    border-color: #1e293b;
    color: #fff;
}
.sort-select {
    width: auto;
    background-color: #f8fafc;
    border-color: #e2e8f0;
    font-size: 0.82rem;
}

/* 4. POI Cards */
.poi-card {
    border-color: #f1f5f9 !important;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.poi-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08) !important;
}
.poi-media-wrap {
    height: 160px;
    overflow: hidden;
}
.btn-select-poi {
    width: 28px;
    height: 28px;
    padding: 0;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.9);
    border: 2px solid #e2e8f0;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(4px);
    transition: all 0.2s;
}
.btn-select-poi.selected {
    background: #db2777;
    border-color: #db2777;
    color: #fff;
}
.btn-media-round {
    width: 28px;
    height: 28px;
    padding: 0;
    background-color: rgba(255, 255, 255, 0.9);
    border: 1px solid #e2e8f0;
    color: #475569;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(4px);
    transition: all 0.2s;
}
.btn-media-round:hover {
    background-color: #fff;
}
.media-bottom-pill {
    background: rgba(15, 23, 42, 0.82);
    color: #fff;
    backdrop-filter: blur(4px);
    font-size: 0.72rem;
}
.badge-poi-tag {
    background: #f1f5f9;
    color: #64748b;
    font-size: 0.7rem;
    font-weight: 500;
}
.poi-title {
    font-size: 0.95rem;
}
.poi-address {
    font-size: 0.78rem;
}
.btn-added-ai {
    background: #fdf2f8;
    transition: all 0.2s;
}
.btn-add-ai {
    background: #fff;
    transition: all 0.2s;
}
.btn-add-ai:hover {
    background: #f8fafc;
}

/* 5. Sticky AI Sidebar */
.ai-sticky-sidebar {
    position: sticky;
    top: 80px;
}
.ai-box-icon {
    width: 38px;
    height: 38px;
    background: #fdf2f8;
}
.kpi-mini-card {
    border-color: #f1f5f9 !important;
}
.tsp-sequence-box {
    border-color: #f1f5f9 !important;
}
.tsp-step-circle {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #db2777;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.7rem;
    flex-shrink: 0;
}
.btn-run-ai-tsp {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    border: none;
    font-size: 0.85rem;
    box-shadow: 0 4px 12px rgba(219, 39, 119, 0.25);
    transition: all 0.2s;
}
.btn-run-ai-tsp:hover {
    opacity: 0.95;
    transform: translateY(-1px);
}
</style>
