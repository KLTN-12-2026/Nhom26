<template>
    <div class="admin-page-container">
        <!-- 1. Breadcrumb & Database Sync Pill -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
            <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
                <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-secondary">Phân hệ Quản trị</span>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-primary fw-bold">Quản lý chức vụ</span>
            </nav>
            <div class="sync-pill d-flex align-items-center gap-1">
                <span class="dot-green"></span>
                <span class="font-11 text-success fw-semibold">Cơ sở dữ liệu: Hoạt động đồng bộ</span>
            </div>
        </div>

        <!-- 2. Page Header Title & Action Button -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-3">
            <div>
                <div class="d-flex align-items-center gap-2">
                    <h3 class="fw-bold text-dark mb-0">Quản lý Chức Vụ</h3>
                    <span class="badge bg-light text-secondary border font-11">Table: chuc_vus</span>
                </div>
                <p class="text-muted small mb-0 mt-1">
                    Định nghĩa các vị trí chức danh và vai trò trách nhiệm trong bộ máy quản trị hệ thống.
                </p>
            </div>
            <div>
                <!-- Nút mở Modal Thêm mới chức vụ -->
                <button class="btn btn-primary rounded-3 px-3 py-2 fw-semibold shadow-sm d-flex align-items-center gap-1"
                    data-bs-toggle="modal" data-bs-target="#themMoiModal">
                    <i class="bx bx-plus font-18"></i>Thêm Chức Vụ
                </button>
            </div>
        </div>

        <!-- 3. 4 KPI Metrics Cards -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
            <!-- Card 1: Tổng số chức vụ -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG SỐ CHỨC VỤ</span>
                            <h2 class="fw-bold text-dark my-1">{{ list_chuc_vu.length < 10 ? '0' + list_chuc_vu.length : list_chuc_vu.length }}</h2>
                            <small class="text-primary font-11">Đồng bộ từ bảng chuc_vus</small>
                        </div>
                        <div class="kpi-icon-box bg-light-primary text-primary"><i class="bx bx-badge-check"></i></div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Đang áp dụng -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ĐANG ÁP DỤNG</span>
                            <h2 class="fw-bold text-success my-1">{{ countActive < 10 ? '0' + countActive : countActive }}</h2>
                            <small class="text-muted font-11">Trạng thái Is_active: true</small>
                        </div>
                        <div class="kpi-icon-box bg-light-success text-success"><i class="bx bx-check-circle"></i></div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Nhân sự thực tế -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">NHÂN SỰ THỰC TẾ</span>
                            <h2 class="fw-bold text-dark my-1">{{ totalPersonnel < 10 ? '0' + totalPersonnel : totalPersonnel }}</h2>
                            <small class="text-primary font-11">Liên kết bảng admins</small>
                        </div>
                        <div class="kpi-icon-box bg-light-info text-info"><i class="bx bx-group"></i></div>
                    </div>
                </div>
            </div>

            <!-- Card 4: Quyền hạn hệ thống -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">QUYỀN HẠN HỆ THỐNG</span>
                            <h2 class="fw-bold text-warning my-1">100%</h2>
                            <small class="text-muted font-11">Phân quyền RBAC chuẩn</small>
                        </div>
                        <div class="kpi-icon-box bg-light-warning text-warning"><i class="bx bx-shield-quarter"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Filter Bar: Thanh tìm kiếm và bộ lọc trạng thái -->
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
            <div class="row g-2 align-items-center">
                <!-- Ô tìm kiếm kèm nút kính lúp ở sau -->
                <div class="col-md-6">
                    <div class="input-group input-group-sm">
                        <input 
                            type="search" 
                            name="search_chuc_vu_keyword" 
                            autocomplete="off" 
                            class="form-control shadow-none" 
                            v-model="key_search" 
                            placeholder="Tìm kiếm theo mã, tên chức vụ, mô tả...">
                        <!-- Nút kính lúp ở sau ô tìm kiếm -->
                        <button class="btn btn-primary px-3" type="button" title="Tìm kiếm">
                            <i class="bx bx-search"></i>
                        </button>
                    </div>
                </div>
                <!-- Bộ lọc theo trạng thái hoạt động -->
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterStatus">
                        <option value="">Tất cả trạng thái</option>
                        <option value="1">Đang hoạt động</option>
                        <option value="0">Tạm ngưng</option>
                    </select>
                </div>
                <!-- Thống kê số lượng kết quả hiển thị -->
                <div class="col-md-3 text-end">
                    <span class="small text-muted">Hiển thị <strong class="text-primary">{{ list_chuc_vu_loc.length }}</strong> chức vụ</span>
                </div>
            </div>
        </div>

        <!-- 5. Data Table: Bảng danh sách chức vụ -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase text-center align-middle">
                        <tr>
                            <th width="6%">#</th>
                            <th width="14%">MÃ CHỨC VỤ</th>
                            <th width="24%" class="text-start">TÊN CHỨC VỤ</th>
                            <th width="30%" class="text-start">MÔ TẢ NHIỆM VỤ</th>
                            <th width="12%">SỐ NHÂN SỰ</th>
                            <th width="12%">TRẠNG THÁI</th>
                            <th width="14%">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(cv, index) in list_chuc_vu_loc" :key="index">
                            <td class="text-center align-middle fw-bold">{{ index + 1 }}</td>
                            <td class="text-center align-middle">
                                <strong class="text-primary font-13 font-monospace">{{ cv.ma_chuc_vu }}</strong>
                            </td>
                            <td class="align-middle fw-bold text-dark">
                                {{ cv.ten_chuc_vu }}
                            </td>
                            <td class="align-middle text-muted small">
                                {{ cv.mo_ta || 'Chưa có mô tả' }}
                            </td>
                            <td class="text-center align-middle">
                                <span class="badge bg-light-primary text-primary px-3 py-1 font-12">
                                    {{ cv.so_nhan_su || 0 }} nhân sự
                                </span>
                            </td>
                            <td class="text-center align-middle">
                                <button v-on:click="changeStatus(cv)" v-if="cv.trang_thai == 1" class="btn btn-sm btn-success">
                                    Hoạt động
                                </button>
                                <button v-on:click="changeStatus(cv)" v-else class="btn btn-sm btn-secondary">
                                    Tạm ngưng
                                </button>
                            </td>
                            <td class="text-center align-middle">
                                <div class="d-inline-flex gap-1">
                                    <!-- Nút liên kết phân quyền -->
                                    <router-link to="/admin/phan-quyen" class="btn btn-sm btn-action text-secondary" title="Phân quyền">
                                        <i class="bx bx-shield-quarter"></i>
                                    </router-link>
                                    <!-- Nút Cập nhật mở modal -->
                                    <button v-on:click="Object.assign(update_ChucVu, cv)" class="btn btn-sm btn-action text-primary" 
                                        data-bs-toggle="modal" data-bs-target="#capNhatModal" title="Cập nhật">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <!-- Nút Xóa mở modal -->
                                    <button v-on:click="Object.assign(delete_ChucVu, cv)" class="btn btn-sm btn-action text-danger" 
                                        data-bs-toggle="modal" data-bs-target="#xoaModal" title="Xóa">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
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

        <!-- 1. Modal Thêm Mới Chức Vụ -->
        <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="themMoiModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5 text-white" id="themMoiModalLabel">
                            <i class="bx bx-plus me-1"></i>Thêm Mới Chức Vụ
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mã Chức Vụ</label>
                            <input v-model="create_ChucVu.ma_chuc_vu" type="text" class="form-control form-control-sm" placeholder="VD: CV05 (Để trống để tự sinh)">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Tên Chức Vụ <span class="text-danger">*</span></label>
                            <input v-model="create_ChucVu.ten_chuc_vu" type="text" class="form-control form-control-sm" placeholder="Nhập tên chức vụ...">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mô Tả Nhiệm Vụ</label>
                            <textarea v-model="create_ChucVu.mo_ta" class="form-control form-control-sm" rows="3" placeholder="Nhập mô tả phạm vi quyền hạn..."></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Trạng Thái</label>
                            <select v-model="create_ChucVu.trang_thai" class="form-select form-select-sm">
                                <option :value="1">Hoạt động</option>
                                <option :value="0">Tạm ngưng</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="themMoiChucVu()" type="button" class="btn btn-primary btn-sm px-3" data-bs-dismiss="modal">Thêm Chức Vụ</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Modal Cập Nhật Chức Vụ -->
        <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="capNhatModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5 text-white" id="capNhatModalLabel">
                            <i class="bx bx-edit me-1"></i>Cập Nhật Chức Vụ
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mã Chức Vụ</label>
                            <input v-model="update_ChucVu.ma_chuc_vu" type="text" class="form-control form-control-sm bg-light" disabled>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Tên Chức Vụ <span class="text-danger">*</span></label>
                            <input v-model="update_ChucVu.ten_chuc_vu" type="text" class="form-control form-control-sm" placeholder="Nhập tên chức vụ...">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mô Tả Nhiệm Vụ</label>
                            <textarea v-model="update_ChucVu.mo_ta" class="form-control form-control-sm" rows="3" placeholder="Nhập mô tả phạm vi quyền hạn..."></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Trạng Thái</label>
                            <select v-model="update_ChucVu.trang_thai" class="form-select form-select-sm">
                                <option :value="1">Hoạt động</option>
                                <option :value="0">Tạm ngưng</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="capNhatChucVu()" type="button" class="btn btn-primary btn-sm px-3" data-bs-dismiss="modal">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Modal Xác Nhận Xóa Chức Vụ -->
        <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5 text-white" id="xoaModalLabel">
                            <i class="bx bx-trash me-1"></i>Xác Nhận Xóa Chức Vụ
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning border-0 mb-0" role="alert">
                            <i class='bx bx-error-circle me-1 fs-5 align-middle'></i>
                            Bạn có chắc chắn muốn xóa chức vụ <strong>{{ delete_ChucVu.ten_chuc_vu }}</strong> 
                            (Mã: <code>{{ delete_ChucVu.ma_chuc_vu }}</code>) không?
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="xoaChucVu()" type="button" class="btn btn-danger btn-sm px-3" data-bs-dismiss="modal">Xác nhận xóa</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'AdminChucVu',
    // 1. Khai báo các biến trạng thái (state) của component
    data() {
        return {
            // Từ khóa tìm kiếm nhanh
            key_search: '',

            // Bộ lọc chọn trạng thái
            filterStatus: '',

            // Danh sách chức vụ lấy từ database
            list_chuc_vu: [],

            // Object form thêm mới chức vụ
            create_ChucVu: {
                ma_chuc_vu: '',
                ten_chuc_vu: '',
                mo_ta: '',
                trang_thai: 1
            },

            // Object chức vụ đang được chọn để cập nhật
            update_ChucVu: {
                ma_chuc_vu: '',
                ten_chuc_vu: '',
                mo_ta: '',
                trang_thai: 1
            },

            // Object chức vụ đang được chọn để xóa
            delete_ChucVu: {
                ma_chuc_vu: '',
                ten_chuc_vu: '',
            },
        }
    },

    // 2. Các thuộc tính tính toán (Computed Properties)
    computed: {
        // Đếm tổng số chức vụ đang ở trạng thái Hoạt động
        countActive() {
            return this.list_chuc_vu.filter(c => c.trang_thai !== 0).length;
        },

        // Tính tổng số nhân sự đang được phân công vào các chức vụ
        totalPersonnel() {
            return this.list_chuc_vu.reduce((total, c) => total + (parseInt(c.so_nhan_su) || 0), 0);
        },

        // Danh sách Chức Vụ được lọc đa điều kiện: từ khóa tìm kiếm (không dấu, không phân biệt hoa thường), trạng thái
        list_chuc_vu_loc() {
            let list = this.list_chuc_vu;

            // Bước 1: Lọc theo trạng thái hoạt động (1: hoạt động, 0: tạm ngưng)
            if (this.filterStatus !== '') {
                list = list.filter(item => item.trang_thai === parseInt(this.filterStatus));
            }

            // Bước 2: Nếu ô tìm kiếm rỗng, trả về danh sách sau khi đã lọc theo trạng thái
            if (!this.key_search) {
                return list;
            }

            // Bước 3: Chuẩn hóa từ khóa tìm kiếm (xóa dấu tiếng Việt, chuyển chữ thường)
            let kw = this.removeVietnameseTones(this.key_search);

            // Bước 4: Tìm kiếm đối chiếu không phân biệt hoa thường và không phân biệt có dấu / không dấu
            return list.filter((item) => {
                let maChucVu  = this.removeVietnameseTones(item.ma_chuc_vu);
                let tenChucVu = this.removeVietnameseTones(item.ten_chuc_vu);
                let moTa      = this.removeVietnameseTones(item.mo_ta);

                return maChucVu.includes(kw) || tenChucVu.includes(kw) || moTa.includes(kw);
            });
        },

        // Alias tương thích cho danh sách đã lọc
        filteredList() {
            return this.list_chuc_vu_loc;
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

        // Gọi API lấy danh sách toàn bộ chức vụ từ máy chủ
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/chuc-vu/get-data')
                .then(response => {
                    this.list_chuc_vu = response.data.data;
                })
                .catch(error => {
                    console.error('Lỗi khi tải danh sách chức vụ:', error);
                });
        },

        // Gọi API thêm mới chức vụ
        themMoiChucVu() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/create', this.create_ChucVu)
                .then(response => {
                    if (response.data.status) {
                        if (this.$toast) {
                            this.$toast.success(response.data.message);
                        } else {
                            alert(response.data.message);
                        }
                        this.loadData(); // Tải lại bảng dữ liệu sau khi thêm mới
                        // Reset lại form thêm mới về trạng thái ban đầu
                        this.create_ChucVu = {
                            ma_chuc_vu: '',
                            ten_chuc_vu: '',
                            mo_ta: '',
                            trang_thai: 1
                        };
                    } else {
                        const msg = response.data.message || "Thêm chức vụ thất bại!";
                        if (this.$toast) this.$toast.error(msg); else alert(msg);
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Có lỗi xảy ra!";
                    if (this.$toast) this.$toast.error(msg); else alert(msg);
                });
        },

        // Gọi API cập nhật thông tin chức vụ
        capNhatChucVu() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/update', this.update_ChucVu)
                .then(res => {
                    if (res.data.status) {
                        if (this.$toast) {
                            this.$toast.success(res.data.message);
                        } else {
                            alert(res.data.message);
                        }
                        this.loadData(); // Tải lại bảng dữ liệu sau khi cập nhật
                        this.update_ChucVu = {
                            ma_chuc_vu: '',
                            ten_chuc_vu: '',
                            mo_ta: '',
                            trang_thai: 1
                        };
                    } else {
                        const msg = res.data.message || "Cập nhật chức vụ thất bại";
                        if (this.$toast) this.$toast.error(msg); else alert(msg);
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Có lỗi xảy ra!";
                    if (this.$toast) this.$toast.error(msg); else alert(msg);
                });
        },

        // Gọi API xóa mềm chức vụ
        xoaChucVu() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/destroy', this.delete_ChucVu)
                .then(res => {
                    if (res.data.status) {
                        if (this.$toast) {
                            this.$toast.success(res.data.message);
                        } else {
                            alert(res.data.message);
                        }
                        this.loadData(); // Tải lại bảng dữ liệu sau khi xóa
                        this.delete_ChucVu = {
                            ma_chuc_vu: '',
                            ten_chuc_vu: '',
                        };
                    } else {
                        const msg = res.data.message || "Xóa chức vụ thất bại";
                        if (this.$toast) this.$toast.error(msg); else alert(msg);
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Có lỗi xảy ra!";
                    if (this.$toast) this.$toast.error(msg); else alert(msg);
                });
        },

        // Gọi API thay đổi trạng thái hoạt động của chức vụ
        changeStatus(chucVu) {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/change-status', chucVu)
                .then(res => {
                    if (res.data.status) {
                        if (this.$toast) {
                            this.$toast.success(res.data.message);
                        } else {
                            alert(res.data.message);
                        }
                        // Cập nhật ngay trên view và đồng bộ lại danh sách
                        chucVu.trang_thai = chucVu.trang_thai == 1 ? 0 : 1;
                        this.loadData();
                    } else {
                        const msg = res.data.message || "Đổi trạng thái thất bại";
                        if (this.$toast) this.$toast.error(msg); else alert(msg);
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Có lỗi xảy ra!";
                    if (this.$toast) this.$toast.error(msg); else alert(msg);
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
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}
.bg-light-primary { background-color: #e0f2fe; }
.bg-light-success { background-color: #dcfce7; }
.bg-light-info { background-color: #e0f2fe; }
.bg-light-warning { background-color: #fef3c7; }
.btn-action {
    width: 28px;
    height: 28px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    transition: all 0.15s;
}
.btn-action:hover {
    background-color: #f1f5f9;
    color: #0284c7 !important;
}
</style>
