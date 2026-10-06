<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-purchase-tag me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Quản Lý Tag Du Lịch</span>
                        </div>
                        <button class="btn btn-danger btn-sm px-3"><i class="bx bx-plus"></i> Thêm Tag Mới</button>
                    </div>
                    <hr>
                    <div class="row g-3 mb-4">
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent"><i class="bx bx-search"></i></span>
                                <input type="text" class="form-control" v-model="searchQuery" placeholder="Tìm theo tên tag...">
                            </div>
                        </div>
                    </div>
                    <!-- Tag cloud -->
                    <div class="mb-4">
                        <h6 class="fw-bold text-muted mb-3">Tag Đang Kích Hoạt:</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <span v-for="tag in filteredTags" :key="tag.id" class="badge fs-6 d-flex align-items-center gap-2" :class="tag.mau">
                                # {{ tag.ten_tag }}
                                <span class="badge bg-white text-dark rounded-pill px-2">{{ tag.luot_dung }}</span>
                                <button class="btn-close btn-close-white" style="font-size:0.6rem" @click="xoaTag(tag.id)"></button>
                            </span>
                        </div>
                    </div>
                    <!-- Bảng quản lý tag -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="25%">Tên Tag</th>
                                    <th width="30%">Mô Tả / Phân Loại</th>
                                    <th class="text-center" width="15%">Lượt Sử Dụng</th>
                                    <th class="text-center" width="10%">Màu Sắc</th>
                                    <th class="text-center" width="15%">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tag, index) in filteredTags" :key="tag.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td><span :class="'badge fs-6 ' + tag.mau"># {{ tag.ten_tag }}</span></td>
                                    <td class="text-muted">{{ tag.mo_ta }}</td>
                                    <td class="text-center"><span class="badge bg-light-primary text-primary">{{ tag.luot_dung }} tour</span></td>
                                    <td class="text-center"><span :class="'badge px-3 py-1 ' + tag.mau">{{ tag.ten_mau }}</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-warning btn-sm me-1"><i class="bx bx-edit"></i></button>
                                        <button class="btn btn-outline-danger btn-sm"><i class="bx bx-trash"></i></button>
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
    name: 'AdminTag',
    data() {
        return {
            searchQuery: '',
            tags: [
                { id: 1, ten_tag: 'Biển & Đảo', mo_ta: 'Các tour liên quan đến biển, đảo, lặn biển', luot_dung: 34, mau: 'bg-info', ten_mau: 'Xanh dương' },
                { id: 2, ten_tag: 'Núi & Cao Nguyên', mo_ta: 'Trekking, leo núi, du lịch vùng cao', luot_dung: 22, mau: 'bg-success', ten_mau: 'Xanh lá' },
                { id: 3, ten_tag: 'Ẩm Thực', mo_ta: 'Tour trải nghiệm ẩm thực địa phương', luot_dung: 18, mau: 'bg-warning text-dark', ten_mau: 'Vàng' },
                { id: 4, ten_tag: 'Tâm Linh', mo_ta: 'Tham quan chùa chiền, di tích lịch sử, tâm linh', luot_dung: 15, mau: 'bg-secondary', ten_mau: 'Xám' },
                { id: 5, ten_tag: 'Phiêu Lưu', mo_ta: 'Mạo hiểm, thể thao nước, dã ngoại', luot_dung: 12, mau: 'bg-danger', ten_mau: 'Đỏ' },
                { id: 6, ten_tag: 'Gia Đình', mo_ta: 'Tour phù hợp cho gia đình có trẻ em', luot_dung: 28, mau: 'bg-primary', ten_mau: 'Xanh đậm' }
            ]
        }
    },
    computed: {
        filteredTags() {
            return this.tags.filter(t => t.ten_tag.toLowerCase().includes(this.searchQuery.toLowerCase()));
        }
    },
    methods: {
        xoaTag(id) {
            this.tags = this.tags.filter(t => t.id !== id);
        }
    }
}
</script>
