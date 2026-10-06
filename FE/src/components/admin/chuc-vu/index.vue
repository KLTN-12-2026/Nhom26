<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-id-card me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Quản Lý Chức Vụ</span>
                        </div>
                        <button class="btn btn-danger btn-sm px-3" data-bs-toggle="modal" data-bs-target="#modalChucVu">
                            <i class="bx bx-plus"></i> Thêm Chức Vụ Mới
                        </button>
                    </div>
                    <hr>

                    <!-- Bộ lọc & Tìm kiếm -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent"><i class="bx bx-search"></i></span>
                                <input type="text" class="form-control" v-model="searchQuery" placeholder="Tìm theo tên chức vụ...">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" v-model="filterStatus">
                                <option value="">-- Tất cả trạng thái --</option>
                                <option value="1">Đang hoạt động</option>
                                <option value="0">Tạm khóa</option>
                            </select>
                        </div>
                    </div>

                    <!-- Bảng danh sách chức vụ -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="20%">Tên Chức Vụ</th>
                                    <th width="35%">Mô Tả Nhiệm Vụ</th>
                                    <th class="text-center" width="15%">Số Lượng Nhân Sự</th>
                                    <th class="text-center" width="10%">Trạng Thái</th>
                                    <th class="text-center" width="15%">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in filteredList" :key="item.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td class="fw-bold text-dark">{{ item.ten_chuc_vu }}</td>
                                    <td class="text-muted">{{ item.mo_ta }}</td>
                                    <td class="text-center"><span class="badge bg-light-primary text-primary px-3 py-1 font-13">{{ item.so_nhan_su }} nhân sự</span></td>
                                    <td class="text-center">
                                        <span v-if="item.trang_thai === 1" class="badge bg-success">Hoạt động</span>
                                        <span v-else class="badge bg-secondary">Tạm khóa</span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-primary btn-sm me-1" title="Phân quyền">
                                            <i class="bx bx-shield-quarter"></i>
                                        </button>
                                        <button class="btn btn-outline-warning btn-sm me-1" title="Chỉnh sửa">
                                            <i class="bx bx-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm" title="Xóa">
                                            <i class="bx bx-trash"></i>
                                        </button>
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
    name: 'AdminChucVu',
    data() {
        return {
            searchQuery: '',
            filterStatus: '',
            danhSachChucVu: [
                { id: 1, ten_chuc_vu: 'Super Admin', mo_ta: 'Toàn quyền quản trị hệ thống Wanderlust, kiểm duyệt và phân quyền tối cao', so_nhan_su: 2, trang_thai: 1 },
                { id: 2, ten_chuc_vu: 'Quản Lý Nội Dung & Tour', mo_ta: 'Duyệt các địa điểm du lịch, phê duyệt tour và xử lý khiếu nại đối tác', so_nhan_su: 5, trang_thai: 1 },
                { id: 3, ten_chuc_vu: 'Kế Toán & Đối Soát', mo_ta: 'Quản lý tài chính, đối soát hoa hồng từ đơn đặt tour và thanh toán đối tác', so_nhan_su: 3, trang_thai: 1 },
                { id: 4, ten_chuc_vu: 'Chăm Sóc Khách Hàng', mo_ta: 'Tiếp nhận phản hồi, xử lý báo cáo lỗi và đánh giá của khách hàng', so_nhan_su: 6, trang_thai: 1 },
                { id: 5, ten_chuc_vu: 'Cộng Tác Viên Kiểm Duyệt', mo_ta: 'Kiểm duyệt sơ bộ hình ảnh và bài viết địa điểm tham quan', so_nhan_su: 0, trang_thai: 0 }
            ]
        }
    },
    computed: {
        filteredList() {
            return this.danhSachChucVu.filter(item => {
                const matchName = item.ten_chuc_vu.toLowerCase().includes(this.searchQuery.toLowerCase());
                const matchStatus = this.filterStatus === '' || item.trang_thai.toString() === this.filterStatus;
                return matchName && matchStatus;
            });
        }
    }
}
</script>
