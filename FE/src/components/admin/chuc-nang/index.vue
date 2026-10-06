<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-menu-alt-left me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Quản Lý Chức Năng Hệ Thống</span>
                        </div>
                        <button class="btn btn-danger btn-sm px-3">
                            <i class="bx bx-plus"></i> Thêm Chức Năng
                        </button>
                    </div>
                    <hr>

                    <!-- Tìm kiếm -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-5">
                            <input type="text" class="form-control" v-model="searchQuery" placeholder="Tìm theo tên chức năng, mã chức năng...">
                        </div>
                    </div>

                    <!-- Bảng danh sách chức năng -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="20%">Mã Chức Năng</th>
                                    <th width="25%">Tên Chức Năng</th>
                                    <th width="20%">Đường Dẫn (Route API/Page)</th>
                                    <th class="text-center" width="15%">Nhóm Phân Hệ</th>
                                    <th class="text-center" width="15%">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in filteredList" :key="item.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td><span class="badge bg-light-danger text-danger font-13">{{ item.ma_chuc_nang }}</span></td>
                                    <td class="fw-bold">{{ item.ten_chuc_nang }}</td>
                                    <td><code>{{ item.duong_dan }}</code></td>
                                    <td class="text-center"><span class="badge bg-primary">{{ item.nhom }}</span></td>
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
    name: 'AdminChucNang',
    data() {
        return {
            searchQuery: '',
            danhSachChucNang: [
                { id: 1, ma_chuc_nang: 'AUTH_MANAGE', ten_chuc_nang: 'Quản lý tài khoản & phân quyền', duong_dan: '/admin/phan-quyen', nhom: 'Hệ Thống' },
                { id: 2, ma_chuc_nang: 'PARTNER_APPROVAL', ten_chuc_nang: 'Xét duyệt đối tác cung cấp dịch vụ', duong_dan: '/admin/doi-tac', nhom: 'Đối Tác' },
                { id: 3, ma_chuc_nang: 'LOCATION_AUDIT', ten_chuc_nang: 'Kiểm duyệt địa điểm và di tích', duong_dan: '/admin/kiem-duyet-dia-diem', nhom: 'Nội Dung' },
                { id: 4, ma_chuc_nang: 'TOUR_MANAGE', ten_chuc_nang: 'Quản lý tour và lịch trình toàn sàn', duong_dan: '/admin/tour', nhom: 'Dịch Vụ' },
                { id: 5, ma_chuc_nang: 'FINANCE_COMMISSION', ten_chuc_nang: 'Đối soát hoa hồng và thanh toán', duong_dan: '/admin/tai-chinh', nhom: 'Tài Chính' },
                { id: 6, ma_chuc_nang: 'REPORT_FEEDBACK', ten_chuc_nang: 'Tiếp nhận báo cáo sự cố & lỗi', duong_dan: '/admin/bao-cao-loi', nhom: 'Hỗ Trợ' }
            ]
        }
    },
    computed: {
        filteredList() {
            return this.danhSachChucNang.filter(item => 
                item.ten_chuc_nang.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                item.ma_chuc_nang.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        }
    }
}
</script>
