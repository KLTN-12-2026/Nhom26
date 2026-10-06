<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-search me-1 font-22 text-primary"></i>
                            <span class="h5 mb-0 text-primary fw-bold">Tìm Kiếm & Lọc Địa Điểm Du Lịch</span>
                        </div>
                    </div>
                    <hr>
                    <!-- Search & Filter bar -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-5">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-primary text-white"><i class="bx bx-search"></i></span>
                                <input type="text" class="form-control" v-model="searchQuery" placeholder="Tìm kiếm địa điểm, thành phố...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select form-select-lg" v-model="filterType">
                                <option value="">Tất cả loại</option>
                                <option value="bien">🏖️ Biển & Đảo</option>
                                <option value="nui">🏔️ Núi & Rừng</option>
                                <option value="di_tich">🏛️ Di Tích</option>
                                <option value="am_thuc">🍜 Ẩm Thực</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select form-select-lg" v-model="filterCity">
                                <option value="">Tất cả tỉnh/thành</option>
                                <option>Đà Nẵng</option>
                                <option>Hội An</option>
                                <option>Huế</option>
                                <option>Hà Nội</option>
                                <option>TP. Hồ Chí Minh</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary btn-lg w-100" @click="timKiem">
                                <i class="bx bx-search me-2"></i>Tìm Kiếm
                            </button>
                        </div>
                    </div>
                    <!-- Tags lọc nhanh -->
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <button v-for="tag in tags" :key="tag" class="btn btn-outline-primary btn-sm rounded-pill" @click="searchQuery = tag">
                            # {{ tag }}
                        </button>
                    </div>
                    <!-- Kết quả -->
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col" v-for="loc in filteredLocations" :key="loc.id">
                            <div class="card h-100 shadow-sm border-0 hover-shadow">
                                <img :src="loc.hinh_anh" class="card-img-top" style="height:200px;object-fit:cover" :alt="loc.ten">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title mb-0 fw-bold">{{ loc.ten }}</h5>
                                        <span class="badge bg-light-primary text-primary">{{ loc.loai }}</span>
                                    </div>
                                    <p class="text-muted small mb-2"><i class="bx bx-map"></i> {{ loc.dia_chi }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-warning fw-bold">{{ '★'.repeat(Math.round(loc.rating)) }} <small class="text-muted">({{ loc.luot_danh_gia }})</small></span>
                                        <span class="badge bg-light-success text-success">{{ loc.so_tour }} tour</span>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0 d-flex gap-2">
                                    <button class="btn btn-primary btn-sm flex-grow-1"><i class="bx bx-show me-1"></i>Xem Chi Tiết</button>
                                    <button class="btn btn-outline-danger btn-sm"><i class="bx bx-heart"></i></button>
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
    name: 'ClientTimKiemDiaDiem',
    data() {
        return {
            searchQuery: '',
            filterType: '',
            filterCity: '',
            tags: ['Biển & Đảo', 'Bà Nà Hills', 'Sơn Trà', 'Hội An', 'Cù Lao Chàm', 'Núi Thần Tài', 'Lặn biển'],
            locations: [
                { id: 1, ten: 'Bán Đảo Sơn Trà - Chùa Linh Ứng', loai: 'Di tích', dia_chi: 'Sơn Trà, Đà Nẵng', rating: 5, luot_danh_gia: 1240, so_tour: 8, hinh_anh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=400' },
                { id: 2, ten: 'Khu Du Lịch Bà Nà Hills', loai: 'Biển & núi', dia_chi: 'Hòa Ninh, Đà Nẵng', rating: 5, luot_danh_gia: 3580, so_tour: 12, hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=400' },
                { id: 3, ten: 'Đảo Cù Lao Chàm', loai: 'Biển & Đảo', dia_chi: 'Hội An, Quảng Nam', rating: 4, luot_danh_gia: 892, so_tour: 6, hinh_anh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=400' },
                { id: 4, ten: 'Phố Cổ Hội An', loai: 'Di tích', dia_chi: 'Hội An, Quảng Nam', rating: 5, luot_danh_gia: 4210, so_tour: 15, hinh_anh: 'https://images.unsplash.com/photo-1565967511849-76a60a516170?w=400' },
                { id: 5, ten: 'Ngũ Hành Sơn', loai: 'Di tích', dia_chi: 'Ngũ Hành Sơn, Đà Nẵng', rating: 4, luot_danh_gia: 765, so_tour: 5, hinh_anh: 'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=400' },
                { id: 6, ten: 'Làng Chài Mỹ Khê Seafood', loai: 'Ẩm Thực', dia_chi: 'Mỹ Khê, Đà Nẵng', rating: 4, luot_danh_gia: 320, so_tour: 3, hinh_anh: 'https://images.unsplash.com/photo-1559329007-40df8a9345d8?w=400' }
            ]
        }
    },
    computed: {
        filteredLocations() {
            return this.locations.filter(l => l.ten.toLowerCase().includes(this.searchQuery.toLowerCase()));
        }
    },
    methods: {
        timKiem() {}
    }
}
</script>
<style scoped>
.hover-shadow:hover { transform: translateY(-4px); transition: all 0.2s ease; box-shadow: 0 8px 20px rgba(0,0,0,0.12) !important; }
</style>
