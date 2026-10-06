<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-user-circle me-1 font-22 text-warning"></i>
                            <span class="h5 mb-0 text-warning fw-bold">Tài Khoản Đối Tác</span>
                        </div>
                        <button class="btn btn-warning btn-sm px-3"><i class="bx bx-edit"></i> Chỉnh Sửa Hồ Sơ</button>
                    </div>
                    <hr>
                    <div class="row g-4">
                        <div class="col-md-4 text-center">
                            <div class="card bg-light-warning border-0 p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="rounded-circle mx-auto mb-3" width="100" height="100" alt="avatar">
                                <h5 class="fw-bold">Nguyễn Văn Đối Tác</h5>
                                <p class="text-muted mb-1">doitac@saigontourist.vn</p>
                                <span class="badge bg-warning text-dark px-3 py-2 mt-2">Đối Tác Cấp 2</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Họ Và Tên</label>
                                    <input type="text" class="form-control" v-model="profile.ho_ten">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control" v-model="profile.email" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Số Điện Thoại</label>
                                    <input type="text" class="form-control" v-model="profile.sdt">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Vai Trò Trong Công Ty</label>
                                    <input type="text" class="form-control" v-model="profile.chuc_danh">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold">Mật Khẩu Mới</label>
                                    <input type="password" class="form-control" placeholder="Để trống nếu không thay đổi mật khẩu">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-warning px-4">Lưu Thay Đổi</button>
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
    name: 'DoiTacTaiKhoan',
    data() {
        return {
            profile: {
                ho_ten: 'Nguyễn Văn Đối Tác',
                email: 'doitac@saigontourist.vn',
                sdt: '0905123456',
                chuc_danh: 'Giám Đốc Chi Nhánh'
            }
        }
    }
}
</script>
