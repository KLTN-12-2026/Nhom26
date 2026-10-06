<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-4">
                    <div class="card-title"><i class="bx bx-heart me-1 font-22 text-primary"></i><span class="h5 mb-0 text-primary fw-bold">Địa Điểm Yêu Thích</span></div>
                    <hr>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col" v-for="loc in favorites" :key="loc.id">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="position-relative">
                                    <img :src="loc.hinh" class="card-img-top" style="height:190px;object-fit:cover">
                                    <button class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 rounded-circle" title="Bỏ yêu thích" @click="remove(loc.id)"><i class="bx bx-heart-circle"></i></button>
                                </div>
                                <div class="card-body">
                                    <h6 class="fw-bold mb-1">{{ loc.ten }}</h6>
                                    <p class="text-muted small mb-2"><i class="bx bx-map me-1"></i>{{ loc.dia_chi }}</p>
                                    <span class="text-warning">★ {{ loc.rating }}</span>
                                    <span class="badge bg-light-primary text-primary ms-2">{{ loc.so_tour }} tour</span>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <button class="btn btn-primary btn-sm w-100">Xem Tour Tại Đây</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="favorites.length === 0" class="text-center py-5 text-muted">
                        <i class="bx bx-heart font-48 d-block mb-2"></i>
                        Chưa có địa điểm yêu thích. Hãy khám phá và lưu lại nhé!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'ClientYeuThich',
    data() {
        return {
            favorites: [
                { id: 1, ten: 'Khu Du Lịch Bà Nà Hills', dia_chi: 'Hòa Ninh, Đà Nẵng', rating: 4.9, so_tour: 12, hinh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=400' },
                { id: 2, ten: 'Phố Cổ Hội An', dia_chi: 'Hội An, Quảng Nam', rating: 4.8, so_tour: 15, hinh: 'https://images.unsplash.com/photo-1565967511849-76a60a516170?w=400' },
                { id: 3, ten: 'Đảo Cù Lao Chàm', dia_chi: 'Hội An, Quảng Nam', rating: 4.7, so_tour: 6, hinh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=400' }
            ]
        }
    },
    methods: {
        remove(id) { this.favorites = this.favorites.filter(f => f.id !== id); }
    }
}
</script>
