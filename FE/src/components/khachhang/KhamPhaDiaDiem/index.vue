<template>
    <div class="explore-locations-page">
        <!-- 1. TOP HEADER BANNER -->
        <div class="explore-top-banner">
            <div class="banner-left-info">
                <div class="banner-icon-circle">
                    <i class="bx bx-compass"></i>
                </div>
                <div class="banner-text-group">
                    <div class="database-tag-row">
                        <span class="db-badge">DA NANG POI DATABASE (OSM)</span>
                        <span class="db-count">• 1.420+ Điểm đến</span>
                    </div>
                    <h1 class="banner-main-title">Khám Phá Địa Điểm & Bản Đồ Tối Ưu Đà Nẵng</h1>
                </div>
            </div>

            <div class="banner-right-actions">
                <div class="coords-pill">
                    <i class="bx bx-target-lock text-pink me-1"></i>
                    <span>Tọa độ trung tâm: <strong>16.0544° N, 108.2022° E</strong></span>
                </div>
                <button type="button" class="btn-ai-tour-suggest" @click="suggestAITour">
                    <i class="bx bx-sparkles me-1 font-16"></i>
                    <span>Gợi ý Tour AI từ bộ lọc</span>
                </button>
            </div>
        </div>

        <!-- 2. SEARCH & LOCATION SELECTORS BAR -->
        <div class="search-controls-card">
            <div class="search-controls-grid">
                <!-- Search Input with Keyboard Shortcut -->
                <div class="search-input-box">
                    <i class="bx bx-search search-icon"></i>
                    <input 
                        type="text" 
                        class="search-input-field" 
                        placeholder="Tìm địa điểm, bãi biển, danh lam thắng cảnh..." 
                        v-model="keySearch"
                    />
                    <button type="button" class="btn-voice-search" title="Tìm kiếm bằng giọng nói" @click="voiceSearch">
                        <i class="bx bx-microphone"></i>
                    </button>
                    <span class="key-shortcut">Ctrl+K</span>
                </div>

                <!-- District Dropdown -->
                <div class="filter-select-box">
                    <i class="bx bx-buildings select-prefix-icon text-purple"></i>
                    <select class="custom-filter-select" v-model="selectedDistrict">
                        <option value="all">Tất cả quận / huyện Đà Nẵng</option>
                        <option value="sontra">Quận Sơn Trà (Biển & Đặc sản)</option>
                        <option value="nguhanhson">Quận Ngũ Hành Sơn (Non Nước)</option>
                        <option value="haichau">Quận Hải Châu (Trung tâm sông Hàn)</option>
                        <option value="hoavang">Huyện Hòa Vang (Bà Nà Hills)</option>
                        <option value="thanhkhe">Quận Thanh Khê & Liên Chiểu</option>
                    </select>
                    <i class="bx bx-chevron-down select-chevron"></i>
                </div>

                <!-- Ward Dropdown -->
                <div class="filter-select-box">
                    <i class="bx bx-map-pin select-prefix-icon text-cyan"></i>
                    <select class="custom-filter-select" v-model="selectedWard">
                        <option value="all">Tất cả phường / xã</option>
                        <option value="thoquang">Phường Thọ Quang</option>
                        <option value="phuocmy">Phường Phước Mỹ</option>
                        <option value="anhaitay">Phường An Hải Tây</option>
                        <option value="hoahai">Phường Hòa Hải</option>
                        <option value="binhhien">Phường Bình Hiên</option>
                        <option value="hoacanh">Phường Hòa Cường</option>
                    </select>
                    <i class="bx bx-chevron-down select-chevron"></i>
                </div>
            </div>

            <!-- Categories Tabs Row -->
            <div class="category-tabs-row">
                <span class="row-label"><i class="bx bx-category me-1 text-pink"></i> DANH MỤC:</span>
                <div class="category-pills-list">
                    <button 
                        v-for="cat in categories" 
                        :key="cat.id" 
                        type="button" 
                        class="category-pill-btn"
                        :class="{ active: selectedCategory === cat.id }"
                        @click="selectedCategory = cat.id"
                    >
                        {{ cat.name }} ({{ cat.count }})
                    </button>
                </div>
            </div>

            <!-- AI Tags Row -->
            <div class="ai-tags-row">
                <span class="row-label"><i class="bx bx-bot me-1 text-purple"></i> SỞ THÍCH AI:</span>
                <div class="ai-tags-list">
                    <button 
                        v-for="tag in aiTags" 
                        :key="tag.name" 
                        type="button" 
                        class="ai-tag-btn"
                        :class="[tag.colorClass, { active: activeTags.includes(tag.name) }]"
                        @click="toggleTag(tag.name)"
                    >
                        {{ tag.name }}
                    </button>
                </div>
            </div>

            <!-- Price & Status Filter Row -->
            <div class="price-status-row">
                <div class="price-filters-group">
                    <button 
                        type="button" 
                        class="price-btn" 
                        :class="{ active: priceFilter === 'all' }"
                        @click="priceFilter = 'all'"
                    >
                        Giá: Tất cả
                    </button>
                    <button 
                        type="button" 
                        class="price-btn" 
                        :class="{ active: priceFilter === 'free' }"
                        @click="priceFilter = 'free'"
                    >
                        0đ (Free)
                    </button>
                    <button 
                        type="button" 
                        class="price-btn" 
                        :class="{ active: priceFilter === '<100k' }"
                        @click="priceFilter = '<100k'"
                    >
                        &lt;100k
                    </button>
                    <button 
                        type="button" 
                        class="price-btn" 
                        :class="{ active: priceFilter === '100k-300k' }"
                        @click="priceFilter = '100k-300k'"
                    >
                        100k - 300k
                    </button>
                </div>

                <div class="open-status-filter">
                    <label class="status-toggle-label">
                        <input type="checkbox" v-model="onlyOpenNow" class="toggle-checkbox" />
                        <span class="status-indicator-dot"></span>
                        <span class="toggle-text">Đang mở cửa</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- 3. MAIN CONTENT: 2-COLUMN LAYOUT -->
        <div class="row g-4 mt-1">
            <!-- LEFT COLUMN: DANH SÁCH ĐỊA ĐIỂM (RESULTS LIST) -->
            <div class="col-12 col-xl-7">
                <!-- Results Header Sub-bar -->
                <div class="results-header-subbar">
                    <div class="results-count-text">
                        Tìm thấy <strong>{{ filteredLocations.length }}</strong> địa danh phù hợp
                    </div>
                    <div class="results-sort-actions">
                        <button type="button" class="btn-sort-ai" @click="toggleSort">
                            <i class="bx bx-sort me-1 text-purple"></i>
                            <span>Sắp xếp: <strong>{{ sortMode === 'ai' ? 'Thuật toán AI' : 'Gần nhất' }}</strong></span>
                        </button>
                        <button type="button" class="btn-adv-filter" @click="openAdvancedFilter">
                            <i class="bx bx-slider-alt me-1 text-pink"></i>
                            <span>Bộ lọc nâng cao</span>
                        </button>
                    </div>
                </div>

                <!-- Location Cards List -->
                <div class="location-cards-stack">
                    <div 
                        v-for="item in paginatedLocations" 
                        :key="item.id"
                        class="location-card-item"
                        :class="{ 'is-selected': selectedMapPoi && selectedMapPoi.id === item.id }"
                        @click="selectMapPoi(item)"
                    >
                        <!-- Left Image Wrap -->
                        <div class="card-thumb-wrap">
                            <img :src="item.image" :alt="item.name" class="card-thumb-img" />
                            <span class="badge-price-floating" :class="item.priceBadgeClass">
                                {{ item.priceBadgeText }}
                            </span>
                            <button 
                                type="button" 
                                class="btn-favorite-heart" 
                                :class="{ active: favorites.includes(item.id) }"
                                title="Lưu điểm yêu thích"
                                @click.stop="toggleFavorite(item.id)"
                            >
                                <i class="bx" :class="favorites.includes(item.id) ? 'bxs-heart text-pink' : 'bx-heart'"></i>
                            </button>
                        </div>

                        <!-- Right Info Content -->
                        <div class="card-details-wrap">
                            <div class="card-top-meta">
                                <div class="location-address-meta">
                                    <i class="bx bx-map-pin text-pink me-1"></i>
                                    <span>{{ item.district }}</span>
                                </div>
                                <div class="location-rating-badge">
                                    <i class="bx bxs-star star-icon"></i>
                                    <strong>{{ item.rating }}</strong>
                                </div>
                            </div>

                            <h3 class="location-name-title">{{ item.name }}</h3>
                            <p class="location-desc-snippet">{{ item.description }}</p>

                            <!-- Hash Tags & Hours -->
                            <div class="card-tags-hours-row">
                                <div class="item-hashtags">
                                    <span v-for="tag in item.tags" :key="tag" class="hash-tag-pill">
                                        {{ tag }}
                                    </span>
                                </div>
                                <div class="item-hours" v-if="item.hours">
                                    <i class="bx bx-time text-muted me-1"></i>
                                    <span>{{ item.hours }}</span>
                                </div>
                            </div>

                            <!-- Bottom Action Row -->
                            <div class="card-bottom-actions">
                                <span class="distance-text">
                                    Cách bạn <strong>~{{ item.distance }} km</strong>
                                </span>
                                <div class="actions-group">
                                    <a href="javascript:;" class="link-detail-poi" @click.stop="viewPoiDetail(item)">
                                        Chi tiết
                                    </a>
                                    <button 
                                        type="button" 
                                        class="btn-add-ai-planner"
                                        :class="{ added: addedToPlanner.includes(item.id) }"
                                        @click.stop="addToPlanner(item)"
                                    >
                                        <i class="bx" :class="addedToPlanner.includes(item.id) ? 'bx-check' : 'bx-plus'"></i>
                                        <span>{{ addedToPlanner.includes(item.id) ? 'Đã thêm' : 'Lịch Trình AI' }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination Footer -->
                <div class="results-pagination-bar">
                    <div class="pagination-info">
                        Trang {{ currentPage }} / {{ totalPages }} ({{ filteredLocations.length }} địa danh)
                    </div>
                    <div class="pagination-controls">
                        <button type="button" class="btn-page-nav" :disabled="currentPage === 1" @click="currentPage--">
                            <i class="bx bx-chevron-left"></i>
                        </button>
                        <button 
                            v-for="p in totalPages" 
                            :key="p" 
                            type="button" 
                            class="btn-page-num" 
                            :class="{ active: currentPage === p }"
                            @click="currentPage = p"
                        >
                            {{ p }}
                        </button>
                        <button type="button" class="btn-page-nav" :disabled="currentPage === totalPages" @click="currentPage++">
                            <i class="bx bx-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: INTERACTIVE OPENSTREETMAP & WIDGETS -->
            <div class="col-12 col-xl-5">
                <div class="sticky-map-flow">
                    <!-- 1. MAP VIEWPORT CARD -->
                    <div class="osm-map-card">
                        <!-- Map Layer Toggle Header -->
                        <div class="map-controls-header">
                            <div class="map-layers-switch">
                                <button 
                                    type="button" 
                                    class="layer-tab-btn" 
                                    :class="{ active: mapLayer === 'streets' }"
                                    @click="mapLayer = 'streets'"
                                >
                                    <i class="bx bx-globe me-1"></i> OSM Đường phố
                                </button>
                                <button 
                                    type="button" 
                                    class="layer-tab-btn" 
                                    :class="{ active: mapLayer === 'satellite' }"
                                    @click="mapLayer = 'satellite'"
                                >
                                    <i class="bx bx-satellite me-1"></i> Vệ tinh
                                </button>
                                <button 
                                    type="button" 
                                    class="layer-tab-btn" 
                                    :class="{ active: mapLayer === 'terrain' }"
                                    @click="mapLayer = 'terrain'"
                                >
                                    <i class="bx bx-landscape me-1"></i> Địa hình
                                </button>
                            </div>
                        </div>

                        <!-- Map Viewport with Da Nang Vector Simulation -->
                        <div class="osm-viewport-container">
                            <!-- GPS Subtitle Bar -->
                            <div class="osm-engine-badge">
                                <span class="dot-green-live"></span>
                                <span>OSM Leaflet v1.9.4 | GPS: 16.0544° N, 108.2022° E</span>
                            </div>

                            <svg class="danang-osm-svg" viewBox="0 0 540 460" fill="none">
                                <!-- Water / Vịnh Đà Nẵng & Biển Đông -->
                                <rect width="540" height="460" fill="#e0f2fe" />

                                <!-- Coastline Land mass of Da Nang -->
                                <path 
                                    d="M0,0 L330,0 C345,40 380,50 440,70 C470,95 480,140 430,155 C380,165 370,180 380,240 C390,300 420,380 440,460 L0,460 Z" 
                                    fill="#f1f5f9" 
                                    stroke="#cbd5e1" 
                                    stroke-width="1.5"
                                />

                                <!-- Son Tra Peninsula Mountain Polygon -->
                                <path 
                                    d="M340,45 C380,30 460,40 480,80 C490,120 440,150 400,140 C370,135 330,90 340,45 Z" 
                                    fill="#dcfce7" 
                                    stroke="#86efac" 
                                    stroke-width="1.5"
                                />

                                <!-- Bà Nà Hills Mountain Zone -->
                                <path 
                                    d="M20,180 C60,160 120,190 130,240 C140,290 80,320 30,300 Z" 
                                    fill="#fef3c7" 
                                    stroke="#fde68a" 
                                    stroke-width="1"
                                />

                                <!-- Han River Line -->
                                <path 
                                    d="M270,460 C260,370 270,280 290,200 C305,150 330,120 350,90" 
                                    stroke="#38bdf8" 
                                    stroke-width="11" 
                                    stroke-linecap="round"
                                    fill="none" 
                                />

                                <!-- Main Roads (Võ Nguyên Giáp, Nguyễn Văn Linh, Lê Duẩn) -->
                                <path d="M290,200 L380,240" stroke="#f472b6" stroke-width="3" stroke-dasharray="4 2" fill="none" />
                                <path d="M150,300 L280,250" stroke="#94a3b8" stroke-width="2.5" fill="none" />
                                <path d="M380,140 L380,440" stroke="#38bdf8" stroke-width="2.5" fill="none" />

                                <!-- Pin 1: Bán đảo Sơn Trà -->
                                <g transform="translate(440, 85)" class="osm-map-marker" @click="selectMapPoiById(1)">
                                    <circle r="16" fill="#ec4899" opacity="0.3" class="marker-glow-ring" />
                                    <circle r="12" fill="#ec4899" />
                                    <path d="M-4,-2 L0,-7 L4,-2 L2,-2 L2,4 L-2,4 L-2,-2 Z" fill="#ffffff" />
                                    <rect x="-45" y="-32" width="90" height="20" rx="10" fill="#db2777" />
                                    <text x="0" y="-18" font-size="10.5" font-weight="700" fill="#ffffff" text-anchor="middle">Sơn Trà (Free)</text>
                                </g>

                                <!-- Pin 2: Cầu Rồng -->
                                <g transform="translate(320, 210)" class="osm-map-marker" @click="selectMapPoiById(4)">
                                    <circle r="11" fill="#8b5cf6" />
                                    <text x="0" y="4" font-size="10" font-weight="800" fill="#ffffff" text-anchor="middle">★</text>
                                    <rect x="-35" y="-28" width="70" height="18" rx="9" fill="#7c3aed" />
                                    <text x="0" y="-16" font-size="10" font-weight="700" fill="#ffffff" text-anchor="middle">Cầu Rồng ✦</text>
                                </g>

                                <!-- Pin 3: Bãi biển Mỹ Khê -->
                                <g transform="translate(390, 240)" class="osm-map-marker" @click="selectMapPoiById(3)">
                                    <circle r="11" fill="#06b6d4" />
                                    <text x="0" y="4" font-size="10" font-weight="800" fill="#ffffff" text-anchor="middle">3</text>
                                    <rect x="-45" y="-28" width="90" height="18" rx="9" fill="#0891b2" />
                                    <text x="0" y="-16" font-size="10" font-weight="700" fill="#ffffff" text-anchor="middle">Mỹ Khê - 4.9★</text>
                                </g>

                                <!-- Pin 4: Bảo tàng Chăm -->
                                <g transform="translate(295, 235)" class="osm-map-marker" @click="selectMapPoiById(5)">
                                    <circle r="10" fill="#64748b" />
                                    <rect x="-50" y="16" width="100" height="18" rx="9" fill="#334155" />
                                    <text x="0" y="28" font-size="9.5" font-weight="600" fill="#ffffff" text-anchor="middle">Bảo tàng Chăm 🏛️</text>
                                </g>

                                <!-- Pin 5: Sun World Bà Nà Hills -->
                                <g transform="translate(80, 250)" class="osm-map-marker" @click="selectMapPoiById(6)">
                                    <circle r="10" fill="#a855f7" />
                                    <text x="0" y="4" font-size="10" font-weight="700" fill="#ffffff" text-anchor="middle">6</text>
                                    <text x="14" y="4" font-size="10" font-weight="700" fill="#581c87">Sun World Bà Nà Hills 🏰</text>
                                </g>
                            </svg>

                            <!-- Map Zoom & Center Controls -->
                            <div class="map-floating-toolset">
                                <button type="button" class="btn-tool-osm" title="Phóng to" @click="zoomMap(1)"><i class="bx bx-plus"></i></button>
                                <button type="button" class="btn-tool-osm" title="Thu nhỏ" @click="zoomMap(-1)"><i class="bx bx-minus"></i></button>
                                <button type="button" class="btn-tool-osm btn-locate" title="Định vị tâm Đà Nẵng" @click="resetMap"><i class="bx bx-target-lock"></i></button>
                                <button type="button" class="btn-tool-osm" title="Tải lại lớp bản đồ" @click="refreshMap"><i class="bx bx-refresh"></i></button>
                            </div>

                            <!-- Floating Selected POI Popover on Map -->
                            <div class="map-poi-popover-card" v-if="selectedMapPoi">
                                <div class="popover-top-bar">
                                    <span class="badge-popover-live">ĐANG CHỌN TRÊN OSM</span>
                                    <span class="badge-popover-tag">#{{ selectedMapPoi.slug }}</span>
                                    <button type="button" class="btn-popover-close" @click="selectedMapPoi = null">
                                        <i class="bx bx-x"></i>
                                    </button>
                                </div>

                                <div class="popover-body-flex">
                                    <div class="popover-thumb-box">
                                        <img :src="selectedMapPoi.image" :alt="selectedMapPoi.name" class="popover-thumb-img" />
                                    </div>
                                    <div class="popover-info-box">
                                        <h5 class="popover-title">{{ selectedMapPoi.name }}</h5>
                                        <p class="popover-desc">{{ selectedMapPoi.description }}</p>
                                        <div class="popover-meta-row">
                                            <span class="popover-price">{{ selectedMapPoi.ticketPrice }}</span>
                                            <span class="popover-osrm"><i class="bx bx-time text-pink me-1"></i>OSRM: {{ selectedMapPoi.osrmDriveTime }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="popover-actions-row">
                                    <button type="button" class="btn-directions-osrm" @click="getDirections(selectedMapPoi)">
                                        <i class="bx bx-directions me-1 font-16"></i>
                                        <span>Chỉ đường OSRM</span>
                                    </button>
                                    <button type="button" class="btn-popover-add-planner" @click="addToPlanner(selectedMapPoi)">
                                        <i class="bx bx-plus me-1 font-16"></i>
                                        <span>Thêm Lịch Trình AI</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Map Footer Status Bar -->
                        <div class="map-card-footer-info">
                            <div class="footer-left-status">
                                <i class="bx bx-check-circle text-pink me-1"></i>
                                <span>Đã đồng bộ 450+ tọa độ trạm OSRM Đà Nẵng</span>
                            </div>
                            <router-link to="/client/ban-do-tuong-tac" class="link-full-map">
                                Mở toàn màn hình <i class="bx bx-fullscreen ms-1"></i>
                            </router-link>
                        </div>
                    </div>

                    <!-- 2. TSP / GA ALGORITHM TRIGGER BOX -->
                    <div class="ai-tsp-algo-card">
                        <div class="algo-card-inner">
                            <div class="algo-icon-box">
                                <i class="bx bx-trip"></i>
                            </div>
                            <div class="algo-text-content">
                                <h4 class="algo-title">Thuật toán Tối ưu Lịch trình thông minh</h4>
                                <p class="algo-desc">
                                    Chọn 3+ địa điểm để AI tự động sắp xếp cung đường tiết kiệm 35% thời gian di chuyển.
                                </p>
                            </div>
                            <router-link to="/client/lich-trinh-toi-uu" class="btn-run-tsp">
                                <i class="bx bx-run me-1 font-18"></i>
                                <span>Chạy Thuật Toán TSP / GA</span>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'KhamPhaDiaDiemOSM',
    data() {
        return {
            keySearch: '',
            selectedDistrict: 'sontra',
            selectedWard: 'thoquang',
            selectedCategory: 'all',
            priceFilter: 'all',
            onlyOpenNow: true,
            sortMode: 'ai',
            mapLayer: 'streets',
            currentPage: 1,
            itemsPerPage: 5,
            activeTags: ['#SốngẢo', '#MiễnPhí'],
            favorites: [1, 3],
            addedToPlanner: [1],
            selectedMapPoi: null,
            categories: [
                { id: 'all', name: 'Tất cả', count: 184 },
                { id: 'scenery', name: 'Danh lam thắng cảnh', count: 42 },
                { id: 'history', name: 'Di tích & Bảo tàng', count: 28 },
                { id: 'food', name: 'Ẩm thực & Đặc sản ĐN', count: 65 },
                { id: 'checkin', name: 'Check-in & Sống ảo', count: 49 },
                { id: 'beach', name: 'Bãi biển & Vui chơi', count: 35 }
            ],
            aiTags: [
                { name: '#Biển', colorClass: 'tag-pink' },
                { name: '#Núi', colorClass: 'tag-purple' },
                { name: '#SốngẢo', colorClass: 'tag-blue' },
                { name: '#ĂnUống', colorClass: 'tag-orange' },
                { name: '#VănHóa', colorClass: 'tag-gray' },
                { name: '#HoàngHôn', colorClass: 'tag-yellow' },
                { name: '#MiễnPhí', colorClass: 'tag-pink' }
            ],
            locations: [
                {
                    id: 1,
                    slug: 'BanDaoSonTra',
                    name: 'Bán Đảo Sơn Trà & Đỉnh Bàn Cờ',
                    district: 'Thọ Quang, Sơn Trà',
                    rating: '4.9',
                    description: '\'Lá phổi xanh\' của Đà Nẵng, nơi ngắm toàn cảnh vịnh biển tuyệt sắc từ độ cao gần 700m so với mực nước biển.',
                    image: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=700&auto=format&fit=crop&q=80',
                    priceBadgeText: 'MIỄN PHÍ',
                    priceBadgeClass: 'badge-pink',
                    ticketPrice: 'Vé: Miễn phí (0đ)',
                    osrmDriveTime: '14 phút lái xe',
                    distance: '8.4',
                    hours: '06:00 – 18:00',
                    category: 'scenery',
                    tags: ['#ThiênNhiên', '#CheckIn', '#Biển']
                },
                {
                    id: 2,
                    slug: 'NguHanhSon',
                    name: 'Danh Thắng Ngũ Hành Sơn (Non Nước)',
                    district: 'Hòa Hải, Ngũ Hành Sơn',
                    rating: '4.8',
                    description: 'Quần thể 6 ngọn núi đá vôi kỳ vĩ: Kim, Mộc, Thủy, Hỏa, Thổ cùng hệ thống hang động Huyền Không cổ kính.',
                    image: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=700&auto=format&fit=crop&q=80',
                    priceBadgeText: '40.000đ',
                    priceBadgeClass: 'badge-purple',
                    ticketPrice: 'Vé: 40.000đ / khách',
                    osrmDriveTime: '12 phút lái xe',
                    distance: '6.2',
                    hours: '07:00 – 17:30',
                    category: 'history',
                    tags: ['#TâmLinh', '#HangĐộng', '#VănHóa']
                },
                {
                    id: 3,
                    slug: 'BaiBienMyKhe',
                    name: 'Bãi Biển Mỹ Khê – Top Bãi Biển Đẹp Nhất',
                    district: 'Phước Mỹ, Sơn Trà',
                    rating: '4.9',
                    description: 'Bãi cát trắng mịn, sóng biển hiền hòa, đầy đủ dịch vụ chèo SUP, dù lượn và tắm biển nước ngọt.',
                    image: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=700&auto=format&fit=crop&q=80',
                    priceBadgeText: 'FREE TẮM BIỂN',
                    priceBadgeClass: 'badge-cyan',
                    ticketPrice: 'Vé: Miễn phí tắm biển',
                    osrmDriveTime: '6 phút lái xe',
                    distance: '2.1',
                    hours: 'Mở 24/7',
                    category: 'beach',
                    tags: ['#TắmBiển', '#ChèoSUP', '#Biển']
                },
                {
                    id: 4,
                    slug: 'CauRongSongHan',
                    name: 'Cầu Rồng & Bến Du Thuyền Sông Hàn',
                    district: 'An Hải Tây, Hải Châu',
                    rating: '4.9',
                    description: 'Biểu tượng kiến trúc vươn ra biển lớn. Trình diễn phun lửa và phun nước độc đáo lúc 21h thứ 7 & chủ nhật.',
                    image: 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=700&auto=format&fit=crop&q=80',
                    priceBadgeText: 'MIỄN PHÍ',
                    priceBadgeClass: 'badge-pink',
                    ticketPrice: 'Vé: Miễn phí xem show',
                    osrmDriveTime: '4 phút lái xe',
                    distance: '1.1',
                    hours: 'Thứ 7 & CN đông vui',
                    category: 'checkin',
                    tags: ['#PhunLửa21H', '#DạoĐêm', '#SốngẢo']
                },
                {
                    id: 5,
                    slug: 'BaoTangCham',
                    name: 'Bảo Tàng Điêu Khắc Chăm Đà Nẵng',
                    district: 'Bình Hiên, Hải Châu',
                    rating: '4.7',
                    description: 'Nơi lưu giữ bộ sưu tập hiện vật nghệ thuật điêu khắc Chăm Pa quy mô và giá trị nhất thế giới.',
                    image: 'https://images.unsplash.com/photo-1563492065599-3520f775eeed?w=700&auto=format&fit=crop&q=80',
                    priceBadgeText: '60.000đ',
                    priceBadgeClass: 'badge-purple',
                    ticketPrice: 'Vé: 60.000đ / khách',
                    osrmDriveTime: '5 phút lái xe',
                    distance: '1.5',
                    hours: '07:30 – 17:00',
                    category: 'history',
                    tags: ['#VănHóa', '#BảoTàng', '#DiSản']
                },
                {
                    id: 6,
                    slug: 'BaNaHills',
                    name: 'Sun World Bà Nà Hills & Cầu Vàng',
                    district: 'Hòa Ninh, Hòa Vang',
                    rating: '4.9',
                    description: 'Đường lên tiên cảnh với Cầu Vàng huyền thoại, Làng Pháp và Fantasy Park giải trí hàng đầu.',
                    image: 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=700&auto=format&fit=crop&q=80',
                    priceBadgeText: '900.000đ',
                    priceBadgeClass: 'badge-purple',
                    ticketPrice: 'Vé cáp treo: 900.000đ',
                    osrmDriveTime: '45 phút lái xe',
                    distance: '28.0',
                    hours: '08:00 – 17:30',
                    category: 'scenery',
                    tags: ['#KhuDuLịch', '#CầuVàng', '#SốngẢo']
                }
            ]
        };
    },
    computed: {
        filteredLocations() {
            return this.locations.filter(item => {
                // Search query
                if (this.keySearch.trim()) {
                    const q = this.keySearch.toLowerCase().trim();
                    const matchName = item.name.toLowerCase().includes(q);
                    const matchDistrict = item.district.toLowerCase().includes(q);
                    const matchTag = item.tags.some(t => t.toLowerCase().includes(q));
                    if (!matchName && !matchDistrict && !matchTag) return false;
                }
                // Category
                if (this.selectedCategory !== 'all' && item.category !== this.selectedCategory) {
                    return false;
                }
                // Price Filter
                if (this.priceFilter === 'free' && !item.priceBadgeText.includes('MIỄN PHÍ') && !item.priceBadgeText.includes('FREE')) {
                    return false;
                }
                if (this.priceFilter === '<100k' && item.priceBadgeText.includes('900.000')) {
                    return false;
                }
                return true;
            });
        },
        totalPages() {
            return Math.ceil(this.filteredLocations.length / this.itemsPerPage) || 1;
        },
        paginatedLocations() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            return this.filteredLocations.slice(start, start + this.itemsPerPage);
        }
    },
    mounted() {
        // Mặc định chọn điểm đầu tiên trên map
        if (this.locations.length > 0) {
            this.selectedMapPoi = this.locations[0];
        }
    },
    methods: {
        toggleTag(tag) {
            const idx = this.activeTags.indexOf(tag);
            if (idx > -1) {
                this.activeTags.splice(idx, 1);
            } else {
                this.activeTags.push(tag);
            }
        },
        toggleFavorite(id) {
            const idx = this.favorites.indexOf(id);
            if (idx > -1) {
                this.favorites.splice(idx, 1);
                this.showToast('Đã xóa khỏi danh sách yêu thích');
            } else {
                this.favorites.push(id);
                this.showToast('Đã lưu vào danh sách yêu thích!');
            }
        },
        addToPlanner(item) {
            if (!this.addedToPlanner.includes(item.id)) {
                this.addedToPlanner.push(item.id);
            }
            this.showToast(`Đã thêm "${item.name}" vào lịch trình AI!`);
        },
        selectMapPoi(item) {
            this.selectedMapPoi = item;
        },
        selectMapPoiById(id) {
            const found = this.locations.find(l => l.id === id);
            if (found) {
                this.selectedMapPoi = found;
            }
        },
        toggleSort() {
            this.sortMode = this.sortMode === 'ai' ? 'distance' : 'ai';
            this.showToast(`Đã chuyển chế độ sắp xếp sang: ${this.sortMode === 'ai' ? 'Thuật toán AI' : 'Theo khoảng cách gần nhất'}`);
        },
        openAdvancedFilter() {
            this.showToast('Đang mở bộ lọc nâng cao theo thời tiết và ngân sách...');
        },
        suggestAITour() {
            this.$router.push({
                path: '/client/ai-travel-planner',
                query: { filter: 'sontra_heritage' }
            });
        },
        voiceSearch() {
            this.showToast('Đang kích hoạt micro nhận diện giọng nói tiếng Việt...');
        },
        zoomMap(step) {
            this.showToast(`Phóng to bản đồ OSM cấp độ: ${step > 0 ? '+' : '-'}`);
        },
        resetMap() {
            this.showToast('Đã định vị lại tọa độ trung tâm Đà Nẵng');
        },
        refreshMap() {
            this.showToast('Đã làm mới dữ liệu trạm OSRM');
        },
        getDirections(poi) {
            this.showToast(`Đang tính lộ trình OSRM ngắn nhất đến "${poi.name}"...`);
        },
        viewPoiDetail(poi) {
            this.selectMapPoi(poi);
            this.showToast(`Đang tải thông tin chi tiết của "${poi.name}"...`);
        },
        showToast(msg) {
            if (this.$toast) {
                this.$toast.success(msg);
            } else {
                alert(msg);
            }
        }
    }
};
</script>

<style scoped>
/* ==========================================================================
   PAGE RESET & CONTAINER
   ========================================================================== */
.explore-locations-page {
    padding: 10px 0 60px 0;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: #1e293b;
}

.text-pink {
    color: #ec4899 !important;
}

.text-purple {
    color: #8b5cf6 !important;
}

.text-cyan {
    color: #06b6d4 !important;
}

/* ==========================================================================
   1. TOP BANNER
   ========================================================================== */
.explore-top-banner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 16px;
}

.banner-left-info {
    display: flex;
    align-items: center;
    gap: 14px;
}

.banner-icon-circle {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ec4899 0%, #db2777 50%, #9333ea 100%);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    box-shadow: 0 4px 14px rgba(236, 72, 153, 0.35);
    flex-shrink: 0;
}

.database-tag-row {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 2px;
}

.db-badge {
    font-size: 11.5px;
    font-weight: 800;
    color: #ec4899;
    letter-spacing: 0.6px;
}

.db-count {
    font-size: 12px;
    font-weight: 700;
    color: #64748b;
}

.banner-main-title {
    font-size: 24px;
    font-weight: 900;
    color: #0f172a;
    line-height: 1.25;
    margin: 0;
    letter-spacing: -0.4px;
}

.banner-right-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

.coords-pill {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    padding: 7px 14px;
    border-radius: 20px;
    font-size: 12.5px;
    color: #475569;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
}

.btn-ai-tour-suggest {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 50%, #d946ef 100%);
    color: #ffffff;
    border: none;
    font-size: 13.5px;
    font-weight: 700;
    padding: 9px 18px;
    border-radius: 24px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 4px 14px rgba(236, 72, 153, 0.35);
    transition: all 0.25s ease;
}

.btn-ai-tour-suggest:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(236, 72, 153, 0.5);
}

/* ==========================================================================
   2. SEARCH & CONTROLS CARD
   ========================================================================== */
.search-controls-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    padding: 22px 24px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    margin-bottom: 22px;
}

.search-controls-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 14px;
    margin-bottom: 16px;
}

.search-input-box {
    position: relative;
    display: flex;
    align-items: center;
    background: #f8fafc;
    border: 1.5px solid #e2e8f0;
    border-radius: 14px;
    padding: 0 14px;
    transition: all 0.2s ease;
}

.search-input-box:focus-within {
    border-color: #ec4899;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.12);
}

.search-icon {
    font-size: 20px;
    color: #94a3b8;
    margin-right: 10px;
}

.search-input-field {
    flex: 1;
    border: none;
    outline: none;
    background: transparent;
    font-size: 14px;
    color: #0f172a;
    padding: 12px 0;
}

.btn-voice-search {
    background: transparent;
    border: none;
    color: #64748b;
    font-size: 18px;
    cursor: pointer;
    padding: 4px;
    margin-right: 6px;
    transition: color 0.2s ease;
}

.btn-voice-search:hover {
    color: #ec4899;
}

.key-shortcut {
    font-size: 11px;
    color: #94a3b8;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    padding: 2px 6px;
    border-radius: 6px;
    font-weight: 700;
}

.filter-select-box {
    position: relative;
    display: flex;
    align-items: center;
    background: #f8fafc;
    border: 1.5px solid #e2e8f0;
    border-radius: 14px;
    padding: 0 14px;
    transition: all 0.2s ease;
}

.filter-select-box:focus-within {
    border-color: #ec4899;
    background: #ffffff;
}

.select-prefix-icon {
    font-size: 18px;
    margin-right: 8px;
}

.custom-filter-select {
    width: 100%;
    border: none;
    outline: none;
    background: transparent;
    font-size: 13.5px;
    font-weight: 600;
    color: #1e293b;
    cursor: pointer;
    appearance: none;
    padding: 12px 24px 12px 0;
}

.select-chevron {
    position: absolute;
    right: 14px;
    pointer-events: none;
    color: #94a3b8;
    font-size: 18px;
}

/* Category Tabs Row */
.category-tabs-row {
    display: flex;
    align-items: center;
    gap: 12px;
    padding-top: 14px;
    border-top: 1px solid #f1f5f9;
    margin-bottom: 12px;
    flex-wrap: wrap;
}

.row-label {
    font-size: 12px;
    font-weight: 800;
    color: #475569;
    letter-spacing: 0.6px;
    display: flex;
    align-items: center;
    white-space: nowrap;
}

.category-pills-list {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.category-pill-btn {
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 12.5px;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 20px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.category-pill-btn:hover {
    border-color: #fbcfe8;
    color: #ec4899;
}

.category-pill-btn.active {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    border-color: transparent;
    color: #ffffff;
    font-weight: 700;
    box-shadow: 0 2px 10px rgba(236, 72, 153, 0.35);
}

/* AI Tags Row */
.ai-tags-row {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 14px;
    flex-wrap: wrap;
}

.ai-tags-list {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.ai-tag-btn {
    border: 1px solid #e2e8f0;
    background: #f8fafc;
    color: #475569;
    font-size: 12px;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 16px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.tag-pink.active { background: #fdf2f8; border-color: #ec4899; color: #ec4899; }
.tag-purple.active { background: #faf5ff; border-color: #8b5cf6; color: #8b5cf6; }
.tag-blue.active { background: #eff6ff; border-color: #3b82f6; color: #2563eb; }
.tag-orange.active { background: #fff7ed; border-color: #f97316; color: #ea580c; }
.tag-yellow.active { background: #fefce8; border-color: #eab308; color: #ca8a04; }

/* Price and status row */
.price-status-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 12px;
    border-top: 1px solid #f1f5f9;
    flex-wrap: wrap;
    gap: 12px;
}

.price-filters-group {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.price-btn {
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #64748b;
    font-size: 12px;
    font-weight: 600;
    padding: 5px 12px;
    border-radius: 16px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.price-btn.active {
    background: #1e293b;
    border-color: #1e293b;
    color: #ffffff;
    font-weight: 700;
}

.status-toggle-label {
    display: flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    font-size: 12.5px;
    font-weight: 700;
    color: #166534;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    padding: 4px 12px;
    border-radius: 20px;
}

.status-indicator-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #22c55e;
}

.toggle-checkbox {
    display: none;
}

/* ==========================================================================
   3. LEFT COLUMN: RESULTS LIST
   ========================================================================== */
.results-header-subbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
    flex-wrap: wrap;
    gap: 10px;
}

.results-count-text {
    font-size: 14.5px;
    color: #334155;
}

.results-count-text strong {
    color: #ec4899;
}

.results-sort-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.btn-sort-ai,
.btn-adv-filter {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    color: #475569;
    font-size: 12.5px;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 20px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    transition: all 0.2s ease;
}

.btn-sort-ai:hover,
.btn-adv-filter:hover {
    border-color: #cbd5e1;
    background: #f8fafc;
}

/* Location Cards Stack */
.location-cards-stack {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.location-card-item {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 22px;
    padding: 16px;
    display: flex;
    gap: 18px;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
    transition: all 0.25s ease;
    cursor: pointer;
}

.location-card-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 26px rgba(0, 0, 0, 0.08);
    border-color: #fbcfe8;
}

.location-card-item.is-selected {
    border: 2px solid #ec4899;
    box-shadow: 0 8px 24px rgba(236, 72, 153, 0.15);
}

.card-thumb-wrap {
    position: relative;
    width: 140px;
    height: 140px;
    border-radius: 18px;
    overflow: hidden;
    flex-shrink: 0;
}

.card-thumb-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.location-card-item:hover .card-thumb-img {
    transform: scale(1.06);
}

.badge-price-floating {
    position: absolute;
    top: 8px;
    left: 8px;
    font-size: 10.5px;
    font-weight: 800;
    padding: 3px 8px;
    border-radius: 12px;
    color: #ffffff;
    backdrop-filter: blur(6px);
}

.badge-pink {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
}

.badge-purple {
    background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
}

.badge-cyan {
    background: linear-gradient(135deg, #06b6d4 0%, #0284c7 100%);
}

.btn-favorite-heart {
    position: absolute;
    bottom: 8px;
    right: 8px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    color: #94a3b8;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: all 0.2s ease;
}

.btn-favorite-heart:hover {
    color: #ec4899;
    transform: scale(1.1);
}

.card-details-wrap {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.card-top-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 4px;
}

.location-address-meta {
    font-size: 12px;
    font-weight: 700;
    color: #64748b;
    display: flex;
    align-items: center;
}

.location-rating-badge {
    background: #fffbeb;
    border: 1px solid #fef3c7;
    color: #b45309;
    font-size: 11.5px;
    font-weight: 800;
    padding: 2px 8px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 3px;
}

.star-icon {
    color: #f59e0b;
    font-size: 13px;
}

.location-name-title {
    font-size: 16.5px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.35;
    margin-bottom: 6px;
}

.location-desc-snippet {
    font-size: 12.5px;
    color: #64748b;
    line-height: 1.5;
    margin-bottom: 10px;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-tags-hours-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 12px;
    flex-wrap: wrap;
    gap: 8px;
}

.item-hashtags {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
}

.hash-tag-pill {
    background: #f1f5f9;
    color: #475569;
    font-size: 11px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 10px;
}

.item-hours {
    font-size: 11.5px;
    color: #64748b;
    display: flex;
    align-items: center;
}

.card-bottom-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 10px;
    border-top: 1px solid #f1f5f9;
    flex-wrap: wrap;
    gap: 8px;
}

.distance-text {
    font-size: 12px;
    color: #64748b;
}

.distance-text strong {
    color: #0f172a;
}

.actions-group {
    display: flex;
    align-items: center;
    gap: 12px;
}

.link-detail-poi {
    font-size: 12.5px;
    font-weight: 700;
    color: #475569;
    text-decoration: underline;
    text-underline-offset: 3px;
}

.link-detail-poi:hover {
    color: #ec4899;
}

.btn-add-ai-planner {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    padding: 6px 14px;
    border-radius: 20px;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    box-shadow: 0 2px 8px rgba(236, 72, 153, 0.3);
    transition: all 0.2s ease;
}

.btn-add-ai-planner:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.45);
}

.btn-add-ai-planner.added {
    background: #10b981;
    box-shadow: none;
}

/* Pagination */
.results-pagination-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 24px;
    padding-top: 16px;
    border-top: 1px solid #e2e8f0;
    flex-wrap: wrap;
    gap: 12px;
}

.pagination-info {
    font-size: 13px;
    color: #64748b;
}

.pagination-controls {
    display: flex;
    align-items: center;
    gap: 6px;
}

.btn-page-nav,
.btn-page-num {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 13px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-page-num.active {
    background: #ec4899;
    border-color: #ec4899;
    color: #ffffff;
    box-shadow: 0 2px 8px rgba(236, 72, 153, 0.35);
}

.btn-page-nav:disabled {
    opacity: 0.4;
    cursor: not-allowed;
}

/* ==========================================================================
   4. RIGHT COLUMN: OPENSTREETMAP & WIDGETS
   ========================================================================== */
.sticky-map-flow {
    position: sticky;
    top: 86px;
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.osm-map-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
}

.map-controls-header {
    padding: 12px 16px;
    border-bottom: 1px solid #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.map-layers-switch {
    display: flex;
    align-items: center;
    gap: 6px;
}

.layer-tab-btn {
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #64748b;
    font-size: 11.5px;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 16px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.layer-tab-btn.active {
    background: #ec4899;
    border-color: #ec4899;
    color: #ffffff;
    box-shadow: 0 2px 6px rgba(236, 72, 153, 0.3);
}

.osm-viewport-container {
    position: relative;
    height: 480px;
    background: #e0f2fe;
    overflow: hidden;
}

.osm-engine-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 10;
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(203, 213, 225, 0.8);
    font-size: 11px;
    font-weight: 700;
    color: #334155;
    padding: 4px 10px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
    backdrop-filter: blur(6px);
}

.dot-green-live {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #10b981;
}

.danang-osm-svg {
    width: 100%;
    height: 100%;
    display: block;
}

.osm-map-marker {
    cursor: pointer;
    transition: transform 0.2s ease;
}

.osm-map-marker:hover {
    transform: scale(1.15);
}

.marker-glow-ring {
    animation: markerRingPulse 2s infinite;
}

@keyframes markerRingPulse {
    0% { r: 12; opacity: 0.6; }
    50% { r: 18; opacity: 0.2; }
    100% { r: 12; opacity: 0.6; }
}

.map-floating-toolset {
    position: absolute;
    top: 14px;
    right: 14px;
    display: flex;
    flex-direction: column;
    gap: 6px;
    z-index: 10;
}

.btn-tool-osm {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #334155;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.12);
    transition: all 0.2s ease;
}

.btn-tool-osm:hover {
    color: #ec4899;
    border-color: #fbcfe8;
}

/* Floating Selected POI Popover on Map */
.map-poi-popover-card {
    position: absolute;
    bottom: 14px;
    left: 14px;
    right: 14px;
    background: rgba(255, 255, 255, 0.98);
    border: 1.5px solid #fbcfe8;
    border-radius: 18px;
    padding: 14px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.18);
    z-index: 20;
    backdrop-filter: blur(10px);
}

.popover-top-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
}

.badge-popover-live {
    background: #ec4899;
    color: #ffffff;
    font-size: 10px;
    font-weight: 800;
    padding: 2px 8px;
    border-radius: 10px;
}

.badge-popover-tag {
    font-size: 11px;
    font-weight: 700;
    color: #0284c7;
}

.btn-popover-close {
    background: transparent;
    border: none;
    color: #94a3b8;
    font-size: 18px;
    cursor: pointer;
    padding: 0;
}

.popover-body-flex {
    display: flex;
    gap: 12px;
    margin-bottom: 12px;
}

.popover-thumb-box {
    width: 72px;
    height: 72px;
    border-radius: 12px;
    overflow: hidden;
    flex-shrink: 0;
}

.popover-thumb-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.popover-info-box {
    flex: 1;
}

.popover-title {
    font-size: 14px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 4px;
}

.popover-desc {
    font-size: 11.5px;
    color: #64748b;
    line-height: 1.4;
    margin-bottom: 6px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.popover-meta-row {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 11px;
    font-weight: 700;
}

.popover-price {
    color: #166534;
}

.popover-osrm {
    color: #ec4899;
}

.popover-actions-row {
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-directions-osrm {
    flex: 1;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #334155;
    font-size: 11.5px;
    font-weight: 700;
    padding: 7px 10px;
    border-radius: 16px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.btn-directions-osrm:hover {
    background: #f1f5f9;
    color: #0f172a;
}

.btn-popover-add-planner {
    flex: 1;
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #ffffff;
    font-size: 11.5px;
    font-weight: 700;
    padding: 7px 10px;
    border-radius: 16px;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 6px rgba(236, 72, 153, 0.35);
    transition: all 0.2s ease;
}

.btn-popover-add-planner:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(236, 72, 153, 0.5);
}

.map-card-footer-info {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 16px;
    font-size: 11.5px;
    background: #ffffff;
    border-top: 1px solid #f1f5f9;
}

.footer-left-status {
    color: #475569;
    display: flex;
    align-items: center;
}

.link-full-map {
    color: #ec4899;
    font-weight: 700;
    text-decoration: none;
    display: flex;
    align-items: center;
}

/* TSP Algorithm Trigger Box */
.ai-tsp-algo-card {
    background: linear-gradient(135deg, #fdf2f8 0%, #faf5ff 100%);
    border: 1px solid #fbcfe8;
    border-radius: 20px;
    padding: 18px 20px;
    box-shadow: 0 4px 18px rgba(236, 72, 153, 0.08);
}

.algo-card-inner {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
}

.algo-icon-box {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #ec4899;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.35);
}

.algo-text-content {
    flex: 1;
    min-width: 180px;
}

.algo-title {
    font-size: 13.5px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 2px;
}

.algo-desc {
    font-size: 11.5px;
    color: #64748b;
    line-height: 1.45;
    margin: 0;
}

.btn-run-tsp {
    background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    padding: 10px 18px;
    border-radius: 24px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 4px 14px rgba(139, 92, 246, 0.35);
    transition: all 0.25s ease;
    white-space: nowrap;
}

.btn-run-tsp:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(139, 92, 246, 0.5);
    color: #ffffff;
}

/* ==========================================================================
   RESPONSIVE DESIGN
   ========================================================================== */
@media (max-width: 991.98px) {
    .search-controls-grid {
        grid-template-columns: 1fr;
    }

    .banner-main-title {
        font-size: 20px;
    }

    .explore-top-banner {
        flex-direction: column;
        align-items: flex-start;
    }

    .banner-right-actions {
        width: 100%;
        justify-content: space-between;
    }

    .osm-viewport-container {
        height: 360px;
    }
}

@media (max-width: 575.98px) {
    .location-card-item {
        flex-direction: column;
    }

    .card-thumb-wrap {
        width: 100%;
        height: 180px;
    }
}
</style>
