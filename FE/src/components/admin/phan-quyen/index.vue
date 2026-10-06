<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-shield-quarter me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Phân Quyền Chức Năng Admin</span>
                        </div>
                        <button class="btn btn-danger btn-sm px-3" @click="luuPhanQuyen">
                            <i class="bx bx-save"></i> Lưu Thay Đổi Phân Quyền
                        </button>
                    </div>
                    <hr>

                    <!-- Chọn chức vụ -->
                    <div class="row g-3 mb-4 align-items-center">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Chọn Chức Vụ Phân Quyền:</label>
                            <select class="form-select" v-model="selectedRole">
                                <option value="1">Super Admin</option>
                                <option value="2">Quản Lý Nội Dung & Tour</option>
                                <option value="3">Kế Toán & Đối Soát</option>
                                <option value="4">Chăm Sóc Khách Hàng</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info border-0 bg-light-info alert-dismissible fade show py-2 mb-0 mt-3 mt-md-0">
                                <div class="d-flex align-items-center">
                                    <div class="font-20 text-info"><i class='bx bx-info-circle'></i></div>
                                    <div class="ms-3">
                                        <div class="text-info">Tích chọn các quyền hạn tương ứng được phép thực thi trong hệ thống cho chức vụ đã chọn.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ma trận phân quyền -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="30%">Nhóm Chức Năng</th>
                                    <th class="text-center" width="15%">Xem (Read)</th>
                                    <th class="text-center" width="15%">Thêm (Create)</th>
                                    <th class="text-center" width="15%">Sửa (Update)</th>
                                    <th class="text-center" width="15%">Xóa (Delete)</th>
                                    <th class="text-center" width="10%">Tất cả</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="group in permissions" :key="group.id">
                                    <td class="fw-bold">
                                        <i :class="group.icon + ' me-2 text-danger'"></i> {{ group.name }}
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" v-model="group.read">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" v-model="group.create">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" v-model="group.update">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" v-model="group.delete">
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-secondary btn-sm py-0 px-2" @click="toggleAll(group)">Chọn hết</button>
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
    name: 'AdminPhanQuyen',
    data() {
        return {
            selectedRole: '2',
            permissions: [
                { id: 1, name: 'Quản lý Người Dùng & Admin', icon: 'bx bx-user', read: true, create: false, update: false, delete: false },
                { id: 2, name: 'Quản lý Đối Tác & Hợp Đồng', icon: 'bx bx-briefcase', read: true, create: true, update: true, delete: false },
                { id: 3, name: 'Kiểm Duyệt Địa Điểm Du Lịch', icon: 'bx bx-map-pin', read: true, create: true, update: true, delete: true },
                { id: 4, name: 'Quản Lý Tour & Lịch Khởi Hành', icon: 'bx bx-compass', read: true, create: true, update: true, delete: false },
                { id: 5, name: 'Quản Lý Đánh Giá Khách Hàng', icon: 'bx bx-star', read: true, create: false, update: true, delete: true },
                { id: 6, name: 'Quản Lý Tài Chính & Đối Soát', icon: 'bx bx-dollar-circle', read: false, create: false, update: false, delete: false },
                { id: 7, name: 'Voucher & Mã Giảm Giá Admin', icon: 'bx bx-purchase-tag', read: true, create: true, update: true, delete: false },
                { id: 8, name: 'Quản Lý Báo Cáo Lỗi & Phản Hồi', icon: 'bx bx-bug', read: true, create: false, update: true, delete: false }
            ]
        }
    },
    methods: {
        toggleAll(group) {
            const allChecked = group.read && group.create && group.update && group.delete;
            group.read = !allChecked;
            group.create = !allChecked;
            group.update = !allChecked;
            group.delete = !allChecked;
        },
        luuPhanQuyen() {
            alert('Đã cập nhật ma trận phân quyền thành công!');
        }
    }
}
</script>
