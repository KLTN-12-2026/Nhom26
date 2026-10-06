<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-user-circle me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Quản Lý Người Dùng (Khách Hàng)</span>
                        </div>
                        <button class="btn btn-outline-secondary btn-sm px-3">
                            <i class="bx bx-export"></i> Xuất Danh Sách Excel
                        </button>
                    </div>
                    <hr>

                    <!-- Bộ lọc -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent"><i class="bx bx-search"></i></span>
                                <input type="text" class="form-control" v-model="searchQuery" placeholder="Tìm theo họ tên, email, SĐT...">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" v-model="filterStatus">
                                <option value="">-- Tất cả trạng thái --</option>
                                <option value="1">Đang kích hoạt</option>
                                <option value="0">Bị khóa tài khoản</option>
                            </select>
                        </div>
                    </div>

                    <!-- Bảng người dùng -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th width="22%">Khách Hàng</th>
                                    <th width="15%">Số Điện Thoại</th>
                                    <th width="15%">Địa Chỉ</th>
                                    <th class="text-center" width="13%">Tổng Tour Đã Đặt</th>
                                    <th class="text-center" width="12%">Trạng Thái</th>
                                    <th class="text-center" width="18%">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(user, index) in filteredUsers" :key="user.id">
                                    <td class="text-center fw-bold">{{ index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img :src="user.avatar" class="rounded-circle p-1 border" width="45" height="45" alt="user avatar">
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14 fw-bold">{{ user.ho_ten }}</h6>
                                                <p class="mb-0 text-muted small">{{ user.email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ user.so_dien_thoai }}</td>
                                    <td>{{ user.dia_chi }}</td>
                                    <td class="text-center"><span class="badge bg-light-primary text-primary px-3 py-1 font-13">{{ user.so_tour }} tour</span></td>
                                    <td class="text-center">
                                        <span v-if="user.trang_thai === 1" class="badge bg-success">Đang hoạt động</span>
                                        <span v-else class="badge bg-danger">Bị khóa</span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-info btn-sm me-1" title="Lịch sử giao dịch"><i class="bx bx-history"></i></button>
                                        <button v-if="user.trang_thai === 1" class="btn btn-outline-danger btn-sm" title="Khóa tài khoản"><i class="bx bx-lock-alt"></i> Khóa</button>
                                        <button v-else class="btn btn-outline-success btn-sm" title="Mở khóa tài khoản"><i class="bx bx-lock-open-alt"></i> Mở</button>
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
    name: 'AdminNguoiDung',
    data() {
        return {
            searchQuery: '',
            filterStatus: '',
            users: [
                { id: 1, ho_ten: 'Nguyễn Văn An', email: 'an.nguyen@gmail.com', so_dien_thoai: '0905123456', dia_chi: 'Hải Châu, Đà Nẵng', so_tour: 4, trang_thai: 1, avatar: 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' },
                { id: 2, ho_ten: 'Trần Thị Mai', email: 'mai.tran@gmail.com', so_dien_thoai: '0988776655', dia_chi: 'Quận 1, TP. Hồ Chí Minh', so_tour: 2, trang_thai: 1, avatar: 'https://cdn-icons-png.flaticon.com/512/3135/3135789.png' },
                { id: 3, ho_ten: 'Lê Hoàng Nam', email: 'nam.le@yahoo.com', so_dien_thoai: '0912348899', dia_chi: 'Cầu Giấy, Hà Nội', so_tour: 1, trang_thai: 0, avatar: 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' },
                { id: 4, ho_ten: 'Phạm Thuỳ Dương', email: 'duong.pham@outlook.com', so_dien_thoai: '0977223344', dia_chi: 'Ninh Kiều, Cần Thơ', so_tour: 7, trang_thai: 1, avatar: 'https://cdn-icons-png.flaticon.com/512/3135/3135789.png' }
            ]
        }
    },
    computed: {
        filteredUsers() {
            return this.users.filter(u => {
                const matchQuery = u.ho_ten.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                   u.email.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                   u.so_dien_thoai.includes(this.searchQuery);
                const matchStatus = this.filterStatus === '' || u.trang_thai.toString() === this.filterStatus;
                return matchQuery && matchStatus;
            });
        }
    }
}
</script>
