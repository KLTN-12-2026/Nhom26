<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-map-pin me-1 font-22 text-warning"></i>
                            <span class="h5 mb-0 text-warning fw-bold">Quản Lý Địa Điểm Du Lịch</span>
                        </div>
                        <button class="btn btn-warning btn-sm px-3"><i class="bx bx-plus"></i> Đăng Địa Điểm Mới</button>
                    </div>
                    <hr>
                    <div class="row g-3 mb-3">
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent"><i class="bx bx-search"></i></span>
                                <input type="text" class="form-control" v-model="searchQuery" placeholder="Tìm theo tên địa điểm...">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="12%">Hình Ảnh</th>
                                    <th width="28%">Tên Địa Điểm</th>
                                    <th width="20%">Địa Chỉ</th>
                                    <th class="text-center" width="10%">Số Tour</th>
                                    <th class="text-center" width="12%">Trạng Thái</th>
                                    <th class="text-center" width="13%">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(loc, index) in filteredList" :key="loc.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td><img :src="loc.hinh_anh" class="rounded shadow-sm" width="80" height="55" style="object-fit:cover"></td>
                                    <td>
                                        <div class="fw-bold text-dark">{{ loc.ten }}</div>
                                        <span class="badge bg-light-warning text-warning">{{ loc.loai }}</span>
                                    </td>
                                    <td class="text-muted">{{ loc.dia_chi }}</td>
                                    <td class="text-center"><span class="badge bg-light-primary text-primary">{{ loc.so_tour }} tour</span></td>
                                    <td class="text-center">
                                        <span v-if="loc.trang_thai === 'approved'" class="badge bg-success">Đã duyệt</span>
                                        <span v-else-if="loc.trang_thai === 'pending'" class="badge bg-warning text-dark">Chờ duyệt</span>
                                        <span v-else class="badge bg-secondary">Bị từ chối</span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-warning btn-sm me-1" title="Chỉnh sửa"><i class="bx bx-edit"></i></button>
                                        <button class="btn btn-outline-danger btn-sm" title="Xóa"><i class="bx bx-trash"></i></button>
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
    name: 'DoiTacDiaDiem',
    data() {
        return {
            searchQuery: '',
            locations: [
                { id: 1, ten: 'Đỉnh Bàn Cờ - Bán Đảo Sơn Trà', loai: 'Danh lam', dia_chi: 'Sơn Trà, Đà Nẵng', so_tour: 3, trang_thai: 'approved', hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=300' },
                { id: 2, ten: 'Khu Du Lịch Suối Mơ', loai: 'Sinh thái', dia_chi: 'Hòa Vang, Đà Nẵng', so_tour: 2, trang_thai: 'pending', hinh_anh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=300' },
                { id: 3, ten: 'Bãi Biển Non Nước', loai: 'Biển', dia_chi: 'Ngũ Hành Sơn, Đà Nẵng', so_tour: 5, trang_thai: 'approved', hinh_anh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=300' }
            ]
        }
    },
    computed: {
        filteredList() {
            return this.locations.filter(l => l.ten.toLowerCase().includes(this.searchQuery.toLowerCase()));
        }
    }
}
</script>
