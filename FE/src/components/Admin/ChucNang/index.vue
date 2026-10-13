<template>
    <div class="admin-page-container">
        <!-- 1. Thanh điều hướng Breadcrumb & Trạng thái đồng bộ Database -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
            <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
                <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-secondary">Phân hệ Quản trị</span>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-primary fw-bold">Quản lý chức năng</span>
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
                    <h3 class="fw-bold text-dark mb-0">Quản lý Chức Năng Hệ Thống</h3>
                    <span class="badge bg-light text-secondary border font-11">Table: chuc_nangs</span>
                </div>
                <p class="text-muted small mb-0 mt-1">
                    Khai báo danh mục các API endpoints, components và tính năng của nền tảng Smart Travel.
                </p>
            </div>
            <div>
                <!-- Nút mở Modal Thêm mới chức năng -->
                <button class="btn btn-primary rounded-3 px-3 py-2 fw-semibold shadow-sm d-flex align-items-center gap-1"
                    data-bs-toggle="modal" data-bs-target="#themMoiModal">
                    <i class="bx bx-plus font-18"></i>Thêm Chức Năng
                </button>
            </div>
        </div>

        <!-- 3. 4 Thẻ KPI thống kê số liệu tổng quan -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
            <!-- Thẻ 1: Tổng số chức năng -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG CHỨC NĂNG</span>
                            <h2 class="fw-bold text-dark my-1">{{ list_chuc_nang.length < 10 ? '0' + list_chuc_nang.length : list_chuc_nang.length }}</h2>
                            <small class="text-primary font-11">Bao phủ toàn bộ hệ thống</small>
                        </div>
                        <div class="kpi-icon-box bg-light-primary text-primary"><i class="bx bx-layer"></i></div>
                    </div>
                </div>
            </div>

            <!-- Thẻ 2: Đang kích hoạt -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ĐANG KÍCH HOẠT</span>
                            <h2 class="fw-bold text-success my-1">{{ countActive < 10 ? '0' + countActive : countActive }}</h2>
                            <small class="text-muted font-11">Sẵn sàng sử dụng</small>
                        </div>
                        <div class="kpi-icon-box bg-light-success text-success"><i class="bx bx-check-circle"></i></div>
                    </div>
                </div>
            </div>

            <!-- Thẻ 3: Routes Frontend -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ROUTER FRONTEND</span>
                            <h2 class="fw-bold text-dark my-1">{{ countRoutes < 10 ? '0' + countRoutes : countRoutes }}</h2>
                            <small class="text-primary font-11">Đường dẫn định tuyến</small>
                        </div>
                        <div class="kpi-icon-box bg-light-info text-info"><i class="bx bx-link-alt"></i></div>
                    </div>
                </div>
            </div>

            <!-- Thẻ 4: Quyền hạn hệ thống -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">QUYỀN HẠN HỆ THỐNG</span>
                            <h2 class="fw-bold text-warning my-1">100%</h2>
                            <small class="text-muted font-11">Chuẩn RBAC phân quyền</small>
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
                            name="search_chuc_nang_keyword" 
                            autocomplete="off" 
                            class="form-control shadow-none" 
                            v-model="key_search" 
                            placeholder="Tìm kiếm theo mã, tên chức năng, route path...">
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
                    <span class="small text-muted">Hiển thị <strong class="text-primary">{{ list_chuc_nang_loc.length }}</strong> chức năng</span>
                </div>
            </div>
        </div>

        <!-- 5. Data Table: Bảng danh sách chức năng (Chỉ gồm: Stt, mã chức năng, tên chức năng, đường dẫn route, trạng thái, action) -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase text-center align-middle">
                        <tr>
                            <th width="8%">STT</th>
                            <th width="18%">MÃ CHỨC NĂNG</th>
                            <th width="28%" class="text-start">TÊN CHỨC NĂNG</th>
                            <th width="24%" class="text-start">ĐƯỜNG DẪN ROUTE</th>
                            <th width="12%">TRẠNG THÁI</th>
                            <th width="10%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(cn, index) in list_chuc_nang_loc" :key="index">
                            <!-- 1. Stt -->
                            <td class="text-center align-middle fw-bold">{{ index + 1 }}</td>

                            <!-- 2. Mã chức năng -->
                            <td class="text-center align-middle">
                                <strong class="text-primary font-13 font-monospace">{{ cn.ma_chuc_nang }}</strong>
                            </td>

                            <!-- 3. Tên chức năng -->
                            <td class="align-middle fw-bold text-dark text-start">
                                {{ cn.ten_chuc_nang }}
                            </td>

                            <!-- 4. Đường dẫn route -->
                            <td class="align-middle text-start">
                                <code class="text-primary bg-light px-2 py-1 rounded font-monospace small" v-if="cn.duong_dan">
                                    {{ cn.duong_dan }}
                                </code>
                                <span class="text-muted small fst-italic" v-else>
                                    Chưa thiết lập
                                </span>
                            </td>

                            <!-- 5. Trạng thái -->
                            <td class="text-center align-middle">
                                <button v-on:click="changeStatus(cn)" v-if="cn.trang_thai == 1" class="btn btn-sm btn-success">
                                    Hoạt động
                                </button>
                                <button v-on:click="changeStatus(cn)" v-else class="btn btn-sm btn-secondary">
                                    Tạm ngưng
                                </button>
                            </td>

                            <!-- 6. Action -->
                            <td class="text-center align-middle">
                                <div class="d-inline-flex gap-1">
                                    <!-- Nút Cập nhật mở modal -->
                                    <button v-on:click="Object.assign(update_ChucNang, cn)" class="btn btn-sm btn-action text-primary" 
                                        data-bs-toggle="modal" data-bs-target="#capNhatModal" title="Cập nhật">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <!-- Nút Xóa mở modal -->
                                    <button v-on:click="Object.assign(delete_ChucNang, cn)" class="btn btn-sm btn-action text-danger" 
                                        data-bs-toggle="modal" data-bs-target="#xoaModal" title="Xóa">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Hiển thị khi không có dữ liệu -->
                        <tr v-if="list_chuc_nang_loc.length === 0">
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bx bx-info-circle fs-4 d-block mb-1"></i>
                                Không tìm thấy chức năng phù hợp.
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

        <!-- 1. Modal Thêm Mới Chức Năng -->
        <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="themMoiModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5 text-white" id="themMoiModalLabel">
                            <i class="bx bx-plus me-1"></i>Thêm Mới Chức Năng
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mã Chức Năng</label>
                            <input v-model="create_ChucNang.ma_chuc_nang" type="text" class="form-control form-control-sm" placeholder="VD: CN05 (Để trống để tự sinh)">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Tên Chức Năng <span class="text-danger">*</span></label>
                            <input v-model="create_ChucNang.ten_chuc_nang" type="text" class="form-control form-control-sm" placeholder="Nhập tên chức năng...">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Đường Dẫn Route</label>
                            <input v-model="create_ChucNang.duong_dan" type="text" class="form-control form-control-sm" placeholder="VD: /admin/chuc-nang">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mô Tả</label>
                            <textarea v-model="create_ChucNang.mo_ta" class="form-control form-control-sm" rows="3" placeholder="Nhập mô tả tính năng..."></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Trạng Thái</label>
                            <select v-model="create_ChucNang.trang_thai" class="form-select form-select-sm">
                                <option :value="1">Hoạt động</option>
                                <option :value="0">Tạm ngưng</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="themMoiChucNang()" type="button" class="btn btn-primary btn-sm px-3" data-bs-dismiss="modal">Thêm Chức Năng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Modal Cập Nhật Chức Năng -->
        <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="capNhatModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5 text-white" id="capNhatModalLabel">
                            <i class="bx bx-edit me-1"></i>Cập Nhật Chức Năng
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mã Chức Năng</label>
                            <input v-model="update_ChucNang.ma_chuc_nang" type="text" class="form-control form-control-sm bg-light" disabled>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Tên Chức Năng <span class="text-danger">*</span></label>
                            <input v-model="update_ChucNang.ten_chuc_nang" type="text" class="form-control form-control-sm" placeholder="Nhập tên chức năng...">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Đường Dẫn Route</label>
                            <input v-model="update_ChucNang.duong_dan" type="text" class="form-control form-control-sm" placeholder="VD: /admin/chuc-nang">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mô Tả</label>
                            <textarea v-model="update_ChucNang.mo_ta" class="form-control form-control-sm" rows="3" placeholder="Nhập mô tả tính năng..."></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Trạng Thái</label>
                            <select v-model="update_ChucNang.trang_thai" class="form-select form-select-sm">
                                <option :value="1">Hoạt động</option>
                                <option :value="0">Tạm ngưng</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="capNhatChucNang()" type="button" class="btn btn-primary btn-sm px-3" data-bs-dismiss="modal">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Modal Xác Nhận Xóa Chức Năng -->
        <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5 text-white" id="xoaModalLabel">
                            <i class="bx bx-trash me-1"></i>Xác Nhận Xóa Chức Năng
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning border-0 mb-0" role="alert">
                            <i class='bx bx-error-circle me-1 fs-5 align-middle'></i>
                            Bạn có chắc chắn muốn xóa chức năng <strong>{{ delete_ChucNang.ten_chuc_nang }}</strong> 
                            (Mã: <code>{{ delete_ChucNang.ma_chuc_nang }}</code>) không?
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="xoaChucNang()" type="button" class="btn btn-danger btn-sm px-3" data-bs-dismiss="modal">Xác nhận xóa</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'AdminChucNang',
    // 1. Khai báo các biến trạng thái (state) của component
    data() {
        return {
            list_chuc_nang: [], // Danh sách chức năng lấy từ server
            key_search: '',     // Từ khóa tìm kiếm chức năng
            filterStatus: '',   // Trạng thái lọc: '' (tất cả), '1' (hoạt động), '0' (tạm ngưng)

            // Dữ liệu form thêm mới chức năng
            create_ChucNang: {
                ma_chuc_nang: '',
                ten_chuc_nang: '',
                duong_dan: '',
                mo_ta: '',
                trang_thai: 1
            },

            // Dữ liệu form cập nhật chức năng
            update_ChucNang: {
                ma_chuc_nang: '',
                ten_chuc_nang: '',
                duong_dan: '',
                mo_ta: '',
                trang_thai: 1
            },

            // Dữ liệu phục vụ modal xóa chức năng
            delete_ChucNang: {
                ma_chuc_nang: '',
                ten_chuc_nang: ''
            },
        }
    },

    // 2. Các thuộc tính tính toán (Computed Properties)
    computed: {
        // Đếm tổng số chức năng đang ở trạng thái Hoạt động
        countActive() {
            return this.list_chuc_nang.filter(c => c.trang_thai == 1).length;
        },

        // Đếm số lượng route frontend đã được cấu hình
        countRoutes() {
            return this.list_chuc_nang.filter(c => c.duong_dan && c.duong_dan.trim() !== '').length;
        },

        // Danh sách Chức Năng được lọc đa điều kiện: từ khóa tìm kiếm (không dấu, không phân biệt hoa thường), trạng thái
        list_chuc_nang_loc() {
            let list = this.list_chuc_nang;

            // Bước 1: Lọc theo trạng thái hoạt động (1: hoạt động, 0: tạm ngưng)
            if (this.filterStatus !== '') {
                list = list.filter(item => item.trang_thai == parseInt(this.filterStatus));
            }

            // Bước 2: Nếu ô tìm kiếm rỗng, trả về danh sách sau khi đã lọc theo trạng thái
            if (!this.key_search) {
                return list;
            }

            // Bước 3: Chuẩn hóa từ khóa tìm kiếm (xóa dấu tiếng Việt, chuyển chữ thường)
            let kw = this.removeVietnameseTones(this.key_search);

            // Bước 4: Tìm kiếm đối chiếu không phân biệt hoa thường và không phân biệt có dấu / không dấu
            return list.filter((item) => {
                let maChucNang  = this.removeVietnameseTones(item.ma_chuc_nang);
                let tenChucNang = this.removeVietnameseTones(item.ten_chuc_nang);
                let duongDan    = this.removeVietnameseTones(item.duong_dan);
                let moTa        = this.removeVietnameseTones(item.mo_ta);

                return maChucNang.includes(kw) || tenChucNang.includes(kw) || duongDan.includes(kw) || moTa.includes(kw);
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

        // Gọi API lấy danh sách toàn bộ chức năng từ máy chủ
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/chuc-nang/get-data')
                .then(response => {
                    this.list_chuc_nang = response.data.data;
                })
                .catch(error => {
                    console.error('Lỗi khi tải danh sách chức năng:', error);
                });
        },

        // Gọi API thêm mới chức năng
        themMoiChucNang() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-nang/create', this.create_ChucNang)
                .then(response => {
                    if (response.data.status) {
                        if (this.$toast) {
                            this.$toast.success(response.data.message);
                        } else {
                            alert(response.data.message);
                        }
                        this.loadData(); // Tải lại bảng dữ liệu sau khi thêm mới
                        // Reset lại form thêm mới về trạng thái ban đầu
                        this.create_ChucNang = {
                            ma_chuc_nang: '',
                            ten_chuc_nang: '',
                            duong_dan: '',
                            mo_ta: '',
                            trang_thai: 1
                        };
                    } else {
                        const msg = response.data.message || "Thêm chức năng thất bại!";
                        if (this.$toast) this.$toast.error(msg); else alert(msg);
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Có lỗi xảy ra!";
                    if (this.$toast) this.$toast.error(msg); else alert(msg);
                });
        },

        // Gọi API cập nhật thông tin chức năng
        capNhatChucNang() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-nang/update', this.update_ChucNang)
                .then(res => {
                    if (res.data.status) {
                        if (this.$toast) {
                            this.$toast.success(res.data.message);
                        } else {
                            alert(res.data.message);
                        }
                        this.loadData(); // Tải lại bảng dữ liệu sau khi cập nhật
                        this.update_ChucNang = {
                            ma_chuc_nang: '',
                            ten_chuc_nang: '',
                            duong_dan: '',
                            mo_ta: '',
                            trang_thai: 1
                        };
                    } else {
                        const msg = res.data.message || "Cập nhật chức năng thất bại";
                        if (this.$toast) this.$toast.error(msg); else alert(msg);
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Có lỗi xảy ra!";
                    if (this.$toast) this.$toast.error(msg); else alert(msg);
                });
        },

        // Gọi API xóa mềm chức năng
        xoaChucNang() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-nang/destroy', this.delete_ChucNang)
                .then(res => {
                    if (res.data.status) {
                        if (this.$toast) {
                            this.$toast.success(res.data.message);
                        } else {
                            alert(res.data.message);
                        }
                        this.loadData(); // Tải lại bảng dữ liệu sau khi xóa
                        this.delete_ChucNang = {
                            ma_chuc_nang: '',
                            ten_chuc_nang: '',
                        };
                    } else {
                        const msg = res.data.message || "Xóa chức năng thất bại";
                        if (this.$toast) this.$toast.error(msg); else alert(msg);
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Có lỗi xảy ra!";
                    if (this.$toast) this.$toast.error(msg); else alert(msg);
                });
        },

        // Gọi API thay đổi trạng thái hoạt động của chức năng
        changeStatus(chucNang) {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-nang/change-status', chucNang)
                .then(res => {
                    if (res.data.status) {
                        if (this.$toast) {
                            this.$toast.success(res.data.message);
                        } else {
                            alert(res.data.message);
                        }
                        // Cập nhật trạng thái ngay lập tức trên view và đồng bộ từ database
                        chucNang.trang_thai = chucNang.trang_thai == 1 ? 0 : 1;
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
