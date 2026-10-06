<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-user-pin me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Quản Lý Danh Sách Admin</span>
                        </div>
                        <button class="btn btn-danger btn-sm px-3">
                            <i class="bx bx-user-plus"></i> Tạo Tài Khoản Admin
                        </button>
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="25%">Họ Tên Admin</th>
                                    <th width="20%">Email Đăng Nhập</th>
                                    <th width="15%">Số Điện Thoại</th>
                                    <th class="text-center" width="15%">Chức Vụ</th>
                                    <th class="text-center" width="10%">Trạng Thái</th>
                                    <th class="text-center" width="15%">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(admin, index) in admins" :key="admin.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td class="fw-bold">{{ admin.ho_ten }}</td>
                                    <td>{{ admin.email }}</td>
                                    <td>{{ admin.so_dien_thoai }}</td>
                                    <td class="text-center"><span class="badge bg-danger">{{ admin.chuc_vu }}</span></td>
                                    <td class="text-center"><span class="badge bg-success">Hoạt động</span></td>
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
    name: 'AdminTaiKhoanAdmin',
    data() {
        return {
            admins: [
                { id: 1, ho_ten: 'Nguyễn Quản Trị Viên', email: 'admin@wanderlust.vn', so_dien_thoai: '0901999888', chuc_vu: 'Super Admin' },
                { id: 2, ho_ten: 'Lê Văn Duyệt Tour', email: 'tour_lead@wanderlust.vn', so_dien_thoai: '0905666777', chuc_vu: 'Quản Lý Nội Dung' },
                { id: 3, ho_ten: 'Trần Thị Thu Ngân', email: 'ketoan@wanderlust.vn', so_dien_thoai: '0903111222', chuc_vu: 'Kế Toán & Đối Soát' }
            ]
        }
    }
}
</script>
