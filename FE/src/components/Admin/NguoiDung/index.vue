<template>
    <div class="admin-page-container">
        <!-- 1. Thanh điều hướng Breadcrumb & Trạng thái đồng bộ Database -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
            <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
                <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-secondary">Phân hệ Quản trị</span>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-primary fw-bold">Quản lý người dùng</span>
            </nav>
            <div class="sync-pill d-flex align-items-center gap-1">
                <span class="dot-green"></span>
                <span class="font-11 text-success fw-semibold">Cơ sở dữ liệu: Hoạt động đồng bộ</span>
            </div>
        </div>

        <!-- 2. Tiêu đề trang & Nút hành động mở Modal Thêm mới -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-3">
            <div>
                <div class="d-flex align-items-center gap-2">
                    <h3 class="fw-bold text-dark mb-0">Quản lý Khách Hàng / Người Dùng</h3>
                    <span class="badge bg-light text-secondary border font-11">Table: khach_hangs</span>
                </div>
                <p class="text-muted small mb-0 mt-1">
                    Danh sách tài khoản du khách đăng ký trên cổng Đà Nẵng Smart Travel.
                </p>
            </div>
            <div>
                <!-- Nút mở Modal Thêm mới khách hàng -->
                <button class="btn btn-primary rounded-3 px-3 py-2 fw-semibold shadow-sm d-flex align-items-center gap-1"
                    data-bs-toggle="modal" data-bs-target="#themMoiModal">
                    <i class="bx bx-plus font-18"></i>Thêm Khách Hàng
                </button>
            </div>
        </div>

        <!-- 3. 4 Thẻ KPI thống kê số liệu tổng quan -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
            <!-- Thẻ 1: Tổng khách hàng -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG KHÁCH HÀNG</span>
                            <h2 class="fw-bold text-dark my-1">{{ list_khach_hang.length < 10 ? '0' + list_khach_hang.length : list_khach_hang.length }}</h2>
                            <small class="text-primary font-11">Đồng bộ từ bảng khach_hangs</small>
                        </div>
                        <div class="kpi-icon-box bg-light-primary text-primary"><i class="bx bx-user"></i></div>
                    </div>
                </div>
            </div>

            <!-- Thẻ 2: Đang hoạt động -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ĐANG HOẠT ĐỘNG</span>
                            <h2 class="fw-bold text-success my-1">{{ countActive < 10 ? '0' + countActive : countActive }}</h2>
                            <small class="text-muted font-11">Tài khoản khả dụng</small>
                        </div>
                        <div class="kpi-icon-box bg-light-success text-success"><i class="bx bx-check-circle"></i></div>
                    </div>
                </div>
            </div>

            <!-- Thẻ 3: Tài khoản khóa -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TÀI KHOẢN KHÓA</span>
                            <h2 class="fw-bold text-danger my-1">{{ countBlocked < 10 ? '0' + countBlocked : countBlocked }}</h2>
                            <small class="text-danger font-11">Trạng thái Is_block: 1</small>
                        </div>
                        <div class="kpi-icon-box bg-light-danger text-danger"><i class="bx bx-lock-alt"></i></div>
                    </div>
                </div>
            </div>

            <!-- Thẻ 4: Tổng chi tiêu du khách -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG CHI TIÊU</span>
                            <h2 class="fw-bold text-warning my-1">{{ formatShortCurrency(totalSpending) }}</h2>
                            <small class="text-muted font-11">Tổng tiền từ hóa đơn</small>
                        </div>
                        <div class="kpi-icon-box bg-light-warning text-warning"><i class="bx bx-wallet"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Filter Bar: Thanh tìm kiếm và bộ lọc trạng thái -->
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
            <div class="row g-2 align-items-center">
                <!-- Ô tìm kiếm kèm nút kính lúp ở sau -->
                <div class="col-md-5">
                    <div class="input-group input-group-sm">
                        <input 
                            type="search" 
                            name="search_khach_hang_keyword" 
                            autocomplete="off" 
                            class="form-control shadow-none" 
                            v-model="key_search" 
                            placeholder="Tìm kiếm theo mã, họ tên, email, SĐT...">
                        <!-- Nút kính lúp ở sau ô tìm kiếm -->
                        <button class="btn btn-primary px-3" type="button" title="Tìm kiếm">
                            <i class="bx bx-search"></i>
                        </button>
                    </div>
                </div>
                <!-- Bộ lọc theo trạng thái tài khoản -->
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterStatus">
                        <option value="">Tất cả trạng thái</option>
                        <option value="0">Đang hoạt động</option>
                        <option value="1">Đã khóa</option>
                    </select>
                </div>
                <!-- Thống kê số lượng kết quả hiển thị -->
                <div class="col-md-4 text-end">
                    <span class="small text-muted">Hiển thị <strong class="text-primary">{{ list_khach_hang_loc.length }}</strong> khách hàng</span>
                </div>
            </div>
        </div>

        <!-- 5. Data Table: Bảng danh sách khách hàng / người dùng -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase text-center align-middle">
                        <tr>
                            <th width="5%">#</th>
                            <th width="12%">MÃ KH</th>
                            <th width="20%" class="text-start">HỌ VÀ TÊN</th>
                            <th width="21%" class="text-start">EMAIL & SĐT</th>
                            <th width="15%" class="text-end">TỔNG CHI TIÊU</th>
                            <th width="11%">HẠNG VIP</th>
                            <th width="10%">TRẠNG THÁI</th>
                            <th width="6%">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(kh, index) in list_khach_hang_loc" :key="kh.ma_khach_hang || index">
                            <!-- 1. STT -->
                            <td class="text-center align-middle fw-bold">{{ index + 1 }}</td>

                            <!-- 2. Mã Khách Hàng -->
                            <td class="text-center align-middle">
                                <strong class="text-primary font-13 font-monospace">{{ kh.ma_khach_hang }}</strong>
                            </td>

                            <!-- 3. Họ và tên -->
                            <td class="align-middle text-start">
                                <div class="fw-bold text-dark">{{ kh.ho_va_ten }}</div>
                                <div class="small text-muted d-flex align-items-center gap-1 mt-1">
                                    <span v-if="kh.gioi_tinh === 1" class="badge bg-light text-primary border font-11">
                                        <i class="bx bx-male"></i> Nam
                                    </span>
                                    <span v-else-if="kh.gioi_tinh === 0" class="badge bg-light text-danger border font-11">
                                        <i class="bx bx-female"></i> Nữ
                                    </span>
                                    <span v-if="kh.ngay_sinh" class="font-11 text-muted">
                                        {{ kh.ngay_sinh }}
                                    </span>
                                </div>
                            </td>

                            <!-- 4. Email & Số điện thoại -->
                            <td class="align-middle text-start">
                                <div class="text-dark font-13">{{ kh.email }}</div>
                                <div class="small text-muted font-monospace mt-1">
                                    <i class="bx bx-phone me-1 font-12"></i>{{ kh.so_dien_thoai || 'Chưa cập nhật' }}
                                </div>
                            </td>

                            <!-- 5. Tổng chi tiêu & Số đơn hàng -->
                            <td class="align-middle text-end">
                                <div class="fw-bold text-dark">{{ formatCurrency(kh.tong_chi_tieu) }}</div>
                                <small class="text-muted font-11">{{ kh.tong_don_hang || 0 }} đơn hàng</small>
                            </td>

                            <!-- 6. Hạng VIP -->
                            <td class="text-center align-middle">
                                <span :class="getTierBadgeClass(kh.tong_chi_tieu)">
                                    {{ getTierName(kh.tong_chi_tieu) }}
                                </span>
                            </td>

                            <!-- 7. Trạng thái -->
                            <td class="text-center align-middle">
                                <button v-on:click="changeStatus(kh)" v-if="kh.is_block == 0" class="btn btn-sm btn-success">
                                    Hoạt động
                                </button>
                                <button v-on:click="changeStatus(kh)" v-else class="btn btn-sm btn-danger">
                                    Đã khóa
                                </button>
                            </td>

                            <!-- 8. Thao tác -->
                            <td class="text-center align-middle">
                                <div class="d-inline-flex gap-1">
                                    <!-- Nút Cập nhật mở modal -->
                                    <button v-on:click="Object.assign(edit_khach_hang, kh)" class="btn btn-sm btn-action text-primary" 
                                        data-bs-toggle="modal" data-bs-target="#capNhatModal" title="Cập nhật">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <!-- Nút Xóa mở modal -->
                                    <button v-on:click="Object.assign(delete_khach_hang, kh)" class="btn btn-sm btn-action text-danger" 
                                        data-bs-toggle="modal" data-bs-target="#xoaModal" title="Xóa">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Hiển thị khi không có dữ liệu -->
                        <tr v-if="list_khach_hang_loc.length === 0">
                            <td colspan="8" class="text-center py-4 text-muted">
                                <i class="bx bx-user-x fs-3 d-block mb-1"></i>
                                Không tìm thấy khách hàng phù hợp.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Phân trang footer -->
            <div class="d-flex flex-wrap align-items-center justify-content-between pt-4 border-top mt-3 gap-2">
                <span class="small text-muted">Trang 1 trên 1 (Dữ liệu đồng bộ Database)</span>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                        <li class="page-item active"><a class="page-link bg-primary border-primary" href="#">1</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">Sau</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- 1. Modal Thêm Mới Khách Hàng -->
        <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="themMoiModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5 text-white" id="themMoiModalLabel">
                            <i class="bx bx-user-plus me-1"></i>Thêm Mới Khách Hàng
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mã Khách Hàng</label>
                            <input v-model="add_khach_hang.ma_khach_hang" type="text" class="form-control form-control-sm" placeholder="VD: KH01 (Để trống để tự sinh)">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Họ và tên <span class="text-danger">*</span></label>
                            <input v-model="add_khach_hang.ho_va_ten" type="text" class="form-control form-control-sm" placeholder="Nhập họ và tên...">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                            <input v-model="add_khach_hang.email" type="email" autocomplete="off" class="form-control form-control-sm" placeholder="example@gmail.com">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mật khẩu</label>
                            <input v-model="add_khach_hang.mat_khau" type="password" autocomplete="new-password" class="form-control form-control-sm" placeholder="Mặc định: 123456">
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Số điện thoại</label>
                                <input v-model="add_khach_hang.so_dien_thoai" type="text" class="form-control form-control-sm" placeholder="09xxxxxxxx">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Giới tính</label>
                                <select v-model="add_khach_hang.gioi_tinh" class="form-select form-select-sm">
                                    <option :value="1">Nam</option>
                                    <option :value="0">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Ngày sinh</label>
                                <input v-model="add_khach_hang.ngay_sinh" type="date" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Trạng thái</label>
                                <select v-model="add_khach_hang.is_block" class="form-select form-select-sm">
                                    <option :value="0">Hoạt động</option>
                                    <option :value="1">Khóa tài khoản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="themMoiKhachHang()" type="button" class="btn btn-primary btn-sm px-3" data-bs-dismiss="modal">Thêm Khách Hàng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Modal Cập Nhật Khách Hàng -->
        <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="capNhatModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5 text-white" id="capNhatModalLabel">
                            <i class="bx bx-edit me-1"></i>Cập Nhật Khách Hàng
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mã Khách Hàng</label>
                            <input v-model="edit_khach_hang.ma_khach_hang" type="text" class="form-control form-control-sm bg-light" disabled>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Họ và tên <span class="text-danger">*</span></label>
                            <input v-model="edit_khach_hang.ho_va_ten" type="text" class="form-control form-control-sm" placeholder="Nhập họ và tên...">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                            <input v-model="edit_khach_hang.email" type="email" autocomplete="off" class="form-control form-control-sm" placeholder="example@gmail.com">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mật khẩu mới</label>
                            <input v-model="edit_khach_hang.mat_khau" type="password" autocomplete="new-password" class="form-control form-control-sm" placeholder="Để trống nếu không đổi">
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Số điện thoại</label>
                                <input v-model="edit_khach_hang.so_dien_thoai" type="text" class="form-control form-control-sm" placeholder="09xxxxxxxx">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Giới tính</label>
                                <select v-model="edit_khach_hang.gioi_tinh" class="form-select form-select-sm">
                                    <option :value="1">Nam</option>
                                    <option :value="0">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Ngày sinh</label>
                                <input v-model="edit_khach_hang.ngay_sinh" type="date" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Trạng thái</label>
                                <select v-model="edit_khach_hang.is_block" class="form-select form-select-sm">
                                    <option :value="0">Hoạt động</option>
                                    <option :value="1">Khóa tài khoản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="capNhatKhachHang()" type="button" class="btn btn-primary btn-sm px-3" data-bs-dismiss="modal">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Modal Xác Nhận Xóa Khách Hàng -->
        <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5 text-white" id="xoaModalLabel">
                            <i class="bx bx-trash me-1"></i>Xác Nhận Xóa Khách Hàng
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning border-0 mb-0" role="alert">
                            <i class='bx bx-error-circle me-1 fs-5 align-middle'></i>
                            Bạn có chắc chắn muốn xóa khách hàng <strong>{{ delete_khach_hang.ho_va_ten }}</strong> 
                            (Mã: <code>{{ delete_khach_hang.ma_khach_hang }}</code>) không?
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="xoaKhachHang()" type="button" class="btn btn-danger btn-sm px-3" data-bs-dismiss="modal">Xác nhận xóa</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import api from '@/axios';

export default {
    name: 'AdminNguoiDung',
    // 1. Khai báo các biến trạng thái (state) của component
    data() {
        return {
            list_khach_hang: [], // Danh sách khách hàng lấy từ server
            key_search: '',      // Từ khóa tìm kiếm
            filterStatus: '',    // Trạng thái lọc: '' (tất cả), '0' (hoạt động), '1' (đã khóa)

            // Dữ liệu form thêm mới khách hàng
            add_khach_hang: {
                ma_khach_hang: '',
                ho_va_ten: '',
                email: '',
                mat_khau: '',
                ngay_sinh: '',
                gioi_tinh: 1,
                so_dien_thoai: '',
                is_block: 0
            },

            // Dữ liệu form cập nhật khách hàng
            edit_khach_hang: {
                ma_khach_hang: '',
                ho_va_ten: '',
                email: '',
                mat_khau: '',
                ngay_sinh: '',
                gioi_tinh: 1,
                so_dien_thoai: '',
                is_block: 0
            },

            // Dữ liệu phục vụ modal xóa khách hàng
            delete_khach_hang: {
                ma_khach_hang: '',
                ho_va_ten: ''
            },
        }
    },

    // 2. Các thuộc tính tính toán (Computed Properties)
    computed: {
        // Đếm tổng số khách hàng đang hoạt động (is_block == 0)
        countActive() {
            return this.list_khach_hang.filter(c => c.is_block == 0).length;
        },

        // Đếm số tài khoản bị khóa (is_block == 1)
        countBlocked() {
            return this.list_khach_hang.filter(c => c.is_block == 1).length;
        },

        // Tính tổng chi tiêu của toàn bộ khách hàng
        totalSpending() {
            return this.list_khach_hang.reduce((total, c) => total + (parseFloat(c.tong_chi_tieu) || 0), 0);
        },

        // Danh sách khách hàng được lọc đa điều kiện: từ khóa tìm kiếm (không dấu, không phân biệt hoa thường), trạng thái
        list_khach_hang_loc() {
            let list = this.list_khach_hang;

            // Bước 1: Lọc theo trạng thái hoạt động (0: hoạt động, 1: đã khóa)
            if (this.filterStatus !== '') {
                list = list.filter(item => item.is_block == parseInt(this.filterStatus));
            }

            // Bước 2: Nếu ô tìm kiếm rỗng, trả về danh sách sau khi đã lọc theo trạng thái
            if (!this.key_search) {
                return list;
            }

            // Bước 3: Chuẩn hóa từ khóa tìm kiếm (xóa dấu tiếng Việt, chuyển chữ thường)
            let kw = this.removeVietnameseTones(this.key_search);

            // Bước 4: Tìm kiếm đối chiếu không phân biệt hoa thường và không phân biệt có dấu / không dấu
            return list.filter((item) => {
                let maKH   = this.removeVietnameseTones(item.ma_khach_hang);
                let hoTen  = this.removeVietnameseTones(item.ho_va_ten);
                let email  = this.removeVietnameseTones(item.email);
                let sdt    = this.removeVietnameseTones(item.so_dien_thoai);

                return maKH.includes(kw) || hoTen.includes(kw) || email.includes(kw) || sdt.includes(kw);
            });
        }
    },

    // 3. Vòng đời component: gọi API lấy dữ liệu ngay khi giao diện được tải (mounted)
    mounted() {
        this.loadData();
    },

    // 4. Các hàm xử lý hành động (Methods)
    methods: {
        // Hàm tiện ích: Loại bỏ toàn bộ dấu tiếng Việt và chuyển sang chữ thường (hỗ trợ tìm kiếm linh hoạt)
        removeVietnameseTones(str) {
            if (!str) return '';
            return String(str)
                .normalize('NFD')                  // Tách các ký tự có dấu thành ký tự gốc + dấu
                .replace(/[\u0300-\u036f]/g, '')   // Xóa bỏ tất cả các dấu thanh
                .replace(/[đĐ]/g, 'd')             // Chuyển ký tự đ, Đ thành d
                .toLowerCase()                     // Chuyển toàn bộ về chữ thường
                .trim();
        },

        // Định dạng tiền tệ VND
        formatCurrency(value) {
            let amount = parseFloat(value) || 0;
            return new Intl.NumberFormat('vi-VN').format(amount) + ' đ';
        },

        // Định dạng tiền tệ ngắn gọn cho KPI (triệu đồng)
        formatShortCurrency(value) {
            let amount = parseFloat(value) || 0;
            if (amount >= 1000000) {
                return (amount / 1000000).toFixed(1) + ' Tr';
            }
            return new Intl.NumberFormat('vi-VN').format(amount) + ' đ';
        },

        // Xác định tên hạng thành viên VIP dựa trên tổng chi tiêu
        getTierName(spending) {
            let amount = parseFloat(spending) || 0;
            if (amount >= 15000000) return 'VIP Diamond';
            if (amount >= 6000000) return 'VIP Gold';
            if (amount >= 2000000) return 'Silver';
            return 'Thành viên';
        },

        // Xác định class badge màu sắc cho hạng VIP
        getTierBadgeClass(spending) {
            let amount = parseFloat(spending) || 0;
            if (amount >= 15000000) return 'badge bg-info-subtle text-info border font-11 px-2 py-1';
            if (amount >= 6000000) return 'badge bg-warning-subtle text-warning border font-11 px-2 py-1';
            if (amount >= 2000000) return 'badge bg-secondary-subtle text-secondary border font-11 px-2 py-1';
            return 'badge bg-light text-muted border font-11 px-2 py-1';
        },

        // Gọi API lấy danh sách toàn bộ khách hàng từ máy chủ
        loadData() {
            api.get('/api/admin/khach-hang/get-data')
                .then(response => {
                    this.list_khach_hang = response.data.data;
                })
                .catch(error => {
                    console.error('Lỗi khi tải danh sách khách hàng:', error);
                });
        },

        // Gọi API thêm mới khách hàng
        themMoiKhachHang() {
            api.post('/api/admin/khach-hang/store', this.add_khach_hang)
                .then(response => {
                    if (response.data.status) {
                        this.$toast.success(response.data.message);
                        this.loadData();
                        this.add_khach_hang = { ma_khach_hang: '', ho_va_ten: '', email: '', mat_khau: '', ngay_sinh: '', gioi_tinh: 1, so_dien_thoai: '', is_block: 0 };
                    } else {
                        this.$toast.error(response.data.message || 'Thêm khách hàng thất bại!');
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : 'Có lỗi xảy ra!';
                    this.$toast.error(msg);
                });
        },

        // Gọi API cập nhật thông tin khách hàng
        capNhatKhachHang() {
            api.post('/api/admin/khach-hang/update', this.edit_khach_hang)
                .then(res => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.loadData();
                        this.edit_khach_hang = { ma_khach_hang: '', ho_va_ten: '', email: '', mat_khau: '', ngay_sinh: '', gioi_tinh: 1, so_dien_thoai: '', is_block: 0 };
                    } else {
                        this.$toast.error(res.data.message || 'Cập nhật khách hàng thất bại');
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : 'Có lỗi xảy ra!';
                    this.$toast.error(msg);
                });
        },

        // Gọi API xóa mềm khách hàng
        xoaKhachHang() {
            api.post('/api/admin/khach-hang/delete', this.delete_khach_hang)
                .then(res => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.loadData();
                        this.delete_khach_hang = { ma_khach_hang: '', ho_va_ten: '' };
                    } else {
                        this.$toast.error(res.data.message || 'Xóa khách hàng thất bại');
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : 'Có lỗi xảy ra!';
                    this.$toast.error(msg);
                });
        },

        // Gọi API thay đổi trạng thái khóa/mở khóa tài khoản khách hàng
        changeStatus(khachHang) {
            api.post('/api/admin/khach-hang/change-status', khachHang)
                .then(res => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        khachHang.is_block = khachHang.is_block == 1 ? 0 : 1;
                        this.loadData();
                    } else {
                        this.$toast.error(res.data.message || 'Đổi trạng thái thất bại');
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : 'Có lỗi xảy ra!';
                    this.$toast.error(msg);
                });
        },
    }
}
</script>

<style scoped>
.sync-pill {
    background-color: #f0fdf4;
    border: 1px solid #bbf7d0;
    padding: 4px 12px;
    border-radius: 999px;
}
.dot-green {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #22c55e;
}
.kpi-icon-box {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
}
.bg-light-primary { background-color: #e0f2fe; }
.bg-light-success { background-color: #dcfce7; }
.bg-light-info { background-color: #e0f2fe; }
.bg-light-warning { background-color: #fef3c7; }
.bg-light-danger { background-color: #fee2e2; }
.btn-action {
    width: 32px;
    height: 32px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    transition: all 0.2s;
}
.btn-action:hover {
    background-color: #f1f5f9;
    transform: translateY(-1px);
}
</style>
