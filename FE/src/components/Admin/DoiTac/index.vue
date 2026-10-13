<template>
    <div class="admin-page-container">
        <!-- 1. Thanh điều hướng Breadcrumb & Trạng thái đồng bộ Database -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
            <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
                <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-secondary">Phân hệ Quản trị</span>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-primary fw-bold">Quản lý đối tác</span>
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
                    <h3 class="fw-bold text-dark mb-0">Quản lý Đối Tác Doanh Nghiệp (B2B)</h3>
                    <span class="badge bg-light text-secondary border font-11">Table: doi_tacs</span>
                </div>
                <p class="text-muted small mb-0 mt-1">
                    Kiểm duyệt hồ sơ nhà cung cấp tour, đơn vị vận chuyển và khách sạn đối tác.
                </p>
            </div>
            <div>
                <!-- Nút mở Modal Thêm mới đối tác -->
                <button class="btn btn-primary rounded-3 px-3 py-2 fw-semibold shadow-sm d-flex align-items-center gap-1"
                    data-bs-toggle="modal" data-bs-target="#themMoiModal">
                    <i class="bx bx-plus font-18"></i>Thêm Đối Tác
                </button>
            </div>
        </div>

        <!-- 3. 4 Thẻ KPI thống kê số liệu tổng quan -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
            <!-- Thẻ 1: Tổng đối tác -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG ĐỐI TÁC</span>
                            <h2 class="fw-bold text-dark my-1">{{ list_doi_tac.length < 10 ? '0' + list_doi_tac.length : list_doi_tac.length }}</h2>
                            <small class="text-primary font-11">Đồng bộ từ bảng doi_tacs</small>
                        </div>
                        <div class="kpi-icon-box bg-light-primary text-primary"><i class="bx bx-buildings"></i></div>
                    </div>
                </div>
            </div>

            <!-- Thẻ 2: Đã kiểm duyệt -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ĐÃ KIỂM DUYỆT</span>
                            <h2 class="fw-bold text-success my-1">{{ countApproved < 10 ? '0' + countApproved : countApproved }}</h2>
                            <small class="text-muted font-11">Hồ sơ DaDuyet</small>
                        </div>
                        <div class="kpi-icon-box bg-light-success text-success"><i class="bx bx-check-shield"></i></div>
                    </div>
                </div>
            </div>

            <!-- Thẻ 3: Chờ duyệt hồ sơ -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">CHỜ DUYỆT HỒ SƠ</span>
                            <h2 class="fw-bold text-warning my-1">{{ countPending < 10 ? '0' + countPending : countPending }}</h2>
                            <small class="text-warning font-11">Hồ sơ ChoDuyet</small>
                        </div>
                        <div class="kpi-icon-box bg-light-warning text-warning"><i class="bx bx-time-five"></i></div>
                    </div>
                </div>
            </div>

            <!-- Thẻ 4: Tổng tour cung ứng -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG TOUR CUNG ỨNG</span>
                            <h2 class="fw-bold text-dark my-1">{{ totalTours < 10 ? '0' + totalTours : totalTours }}</h2>
                            <small class="text-primary font-11">Liên kết bảng tours</small>
                        </div>
                        <div class="kpi-icon-box bg-light-info text-info"><i class="bx bx-map-alt"></i></div>
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
                            name="search_doi_tac_keyword" 
                            autocomplete="off" 
                            class="form-control shadow-none" 
                            v-model="key_search" 
                            placeholder="Tìm theo tên công ty, MST, đại diện, SĐT, địa chỉ...">
                        <!-- Nút kính lúp ở sau ô tìm kiếm -->
                        <button class="btn btn-primary px-3" type="button" title="Tìm kiếm">
                            <i class="bx bx-search"></i>
                        </button>
                    </div>
                </div>
                <!-- Bộ lọc theo trạng thái duyệt -->
                <div class="col-md-2">
                    <select class="form-select form-select-sm" v-model="filterDuyet">
                        <option value="">Tất cả kiểm duyệt</option>
                        <option value="DaDuyet">Đã duyệt</option>
                        <option value="ChoDuyet">Chờ duyệt</option>
                        <option value="TuChoi">Từ chối</option>
                    </select>
                </div>
                <!-- Bộ lọc theo trạng thái khóa -->
                <div class="col-md-2">
                    <select class="form-select form-select-sm" v-model="filterStatus">
                        <option value="">Tất cả tài khoản</option>
                        <option value="0">Đang hoạt động</option>
                        <option value="1">Đã khóa</option>
                    </select>
                </div>
                <!-- Thống kê số lượng kết quả hiển thị -->
                <div class="col-md-3 text-end">
                    <span class="small text-muted">Hiển thị <strong class="text-primary">{{ list_doi_tac_loc.length }}</strong> đối tác</span>
                </div>
            </div>
        </div>

        <!-- 5. Data Table: Bảng danh sách đối tác -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase text-center align-middle">
                        <tr>
                            <th width="4%">#</th>
                            <th width="10%">MÃ ĐỐI TÁC</th>
                            <th width="20%" class="text-start">DOANH NGHIỆP</th>
                            <th width="11%">MÃ SỐ THUẾ</th>
                            <th width="18%" class="text-start">ĐẠI DIỆN & SĐT</th>
                            <th width="9%">SỐ TOUR</th>
                            <th width="10%">DUYỆT HỒ SƠ</th>
                            <th width="9%">TRẠNG THÁI</th>
                            <th width="9%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(dt, index) in list_doi_tac_loc" :key="dt.ma_doi_tac || index">
                            <!-- 1. STT -->
                            <td class="text-center align-middle fw-bold">{{ index + 1 }}</td>

                            <!-- 2. Mã đối tác -->
                            <td class="text-center align-middle">
                                <strong class="text-primary font-13 font-monospace">{{ dt.ma_doi_tac }}</strong>
                            </td>

                            <!-- 3. Tên doanh nghiệp & Địa chỉ -->
                            <td class="align-middle text-start">
                                <div class="fw-bold text-dark">{{ dt.ten_doi_tac }}</div>
                                <small class="text-muted d-block font-11 mt-1" v-if="dt.dia_chi">
                                    <i class="bx bx-map-pin me-1 text-danger"></i>{{ dt.dia_chi }}
                                </small>
                            </td>

                            <!-- 4. Mã số thuế -->
                            <td class="text-center align-middle">
                                <code class="text-dark bg-light px-2 py-1 rounded font-monospace small" v-if="dt.ma_so_thue">
                                    {{ dt.ma_so_thue }}
                                </code>
                                <span class="text-muted small fst-italic" v-else>
                                    Chưa có
                                </span>
                            </td>

                            <!-- 5. Đại diện & Liên hệ -->
                            <td class="align-middle text-start">
                                <div class="text-dark font-13">{{ dt.ten_nguoi_dai_dien || 'Chưa cập nhật' }}</div>
                                <div class="small text-muted mt-1">
                                    <i class="bx bx-phone me-1 font-12"></i>{{ dt.so_dien_thoai || dt.email }}
                                </div>
                            </td>

                            <!-- 6. Số lượng tour -->
                            <td class="text-center align-middle">
                                <span class="badge bg-light-primary text-primary px-3 py-1 font-12">
                                    {{ dt.so_luong_tour || 0 }} tour
                                </span>
                            </td>

                            <!-- 7. Trạng thái kiểm duyệt hồ sơ -->
                            <td class="text-center align-middle">
                                <span v-if="dt.trang_thai_duyet === 'DaDuyet'" class="badge bg-success-subtle text-success px-2 py-1 rounded-pill font-11">
                                    ● Đã duyệt
                                </span>
                                <span v-else-if="dt.trang_thai_duyet === 'ChoDuyet'" class="badge bg-warning-subtle text-warning px-2 py-1 rounded-pill font-11">
                                    ● Chờ duyệt
                                </span>
                                <span v-else-if="dt.trang_thai_duyet === 'TuChoi'" class="badge bg-danger-subtle text-danger px-2 py-1 rounded-pill font-11" :title="dt.ly_do_tu_choi">
                                    ● Từ chối
                                </span>
                                <span v-else class="badge bg-light text-secondary px-2 py-1 rounded-pill font-11">
                                    Chưa xác định
                                </span>
                            </td>

                            <!-- 8. Trạng thái tài khoản (Khóa / Mở) -->
                            <td class="text-center align-middle">
                                <button v-on:click="changeStatus(dt)" v-if="dt.is_block == 0" class="btn btn-sm btn-success">
                                    Hoạt động
                                </button>
                                <button v-on:click="changeStatus(dt)" v-else class="btn btn-sm btn-danger">
                                    Đã khóa
                                </button>
                            </td>

                            <!-- 9. Thao tác -->
                            <td class="text-center align-middle">
                                <div class="d-inline-flex gap-1">
                                    <!-- Nút Mở modal Duyệt hồ sơ nhanh -->
                                    <button v-on:click="moModalDuyet(dt)" class="btn btn-sm btn-action text-warning" 
                                        data-bs-toggle="modal" data-bs-target="#duyetModal" title="Xét duyệt hồ sơ">
                                        <i class="bx bx-shield-quarter"></i>
                                    </button>
                                    <!-- Nút Cập nhật mở modal -->
                                    <button v-on:click="Object.assign(edit_doi_tac, dt)" class="btn btn-sm btn-action text-primary" 
                                        data-bs-toggle="modal" data-bs-target="#capNhatModal" title="Cập nhật">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <!-- Nút Xóa mở modal -->
                                    <button v-on:click="Object.assign(delete_doi_tac, dt)" class="btn btn-sm btn-action text-danger" 
                                        data-bs-toggle="modal" data-bs-target="#xoaModal" title="Xóa">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Hiển thị khi không có dữ liệu -->
                        <tr v-if="list_doi_tac_loc.length === 0">
                            <td colspan="9" class="text-center py-4 text-muted">
                                <i class="bx bx-buildings fs-3 d-block mb-1"></i>
                                Không tìm thấy đối tác phù hợp.
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

        <!-- 1. Modal Thêm Mới Đối Tác -->
        <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="themMoiModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5 text-white" id="themMoiModalLabel">
                            <i class="bx bx-buildings me-1"></i>Thêm Mới Đối Tác Doanh Nghiệp
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mã Đối Tác</label>
                            <input v-model="add_doi_tac.ma_doi_tac" type="text" class="form-control form-control-sm" placeholder="VD: DT06 (Để trống để tự sinh)">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Tên Doanh Nghiệp / Đối Tác <span class="text-danger">*</span></label>
                            <input v-model="add_doi_tac.ten_doi_tac" type="text" class="form-control form-control-sm" placeholder="Nhập tên doanh nghiệp...">
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Mã Số Thuế</label>
                                <input v-model="add_doi_tac.ma_so_thue" type="text" class="form-control form-control-sm" placeholder="VD: 0300456123">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Người Đại Diện</label>
                                <input v-model="add_doi_tac.ten_nguoi_dai_dien" type="text" class="form-control form-control-sm" placeholder="Họ và tên người đại diện...">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Email Đăng Nhập <span class="text-danger">*</span></label>
                            <input v-model="add_doi_tac.email" type="email" autocomplete="off" class="form-control form-control-sm" placeholder="contact@company.com">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mật Khẩu</label>
                            <input v-model="add_doi_tac.mat_khau" type="password" autocomplete="new-password" class="form-control form-control-sm" placeholder="Mặc định: 123456">
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Số Điện Thoại</label>
                                <input v-model="add_doi_tac.so_dien_thoai" type="text" class="form-control form-control-sm" placeholder="09xxxxxxxx">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Trạng Thái Duyệt</label>
                                <select v-model="add_doi_tac.trang_thai_duyet" class="form-select form-select-sm">
                                    <option value="DaDuyet">Đã duyệt</option>
                                    <option value="ChoDuyet">Chờ duyệt</option>
                                    <option value="TuChoi">Từ chối</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Địa Chỉ Trụ Sở</label>
                            <input v-model="add_doi_tac.dia_chi" type="text" class="form-control form-control-sm" placeholder="Số nhà, đường, quận/huyện, thành phố...">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Trạng Thái Tài Khoản</label>
                            <select v-model="add_doi_tac.is_block" class="form-select form-select-sm">
                                <option :value="0">Hoạt động</option>
                                <option :value="1">Khóa tài khoản</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="themMoiDoiTac()" type="button" class="btn btn-primary btn-sm px-3" data-bs-dismiss="modal">Thêm Đối Tác</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Modal Cập Nhật Đối Tác -->
        <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="capNhatModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5 text-white" id="capNhatModalLabel">
                            <i class="bx bx-edit me-1"></i>Cập Nhật Đối Tác
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mã Đối Tác</label>
                            <input v-model="edit_doi_tac.ma_doi_tac" type="text" class="form-control form-control-sm bg-light" disabled>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Tên Doanh Nghiệp / Đối Tác <span class="text-danger">*</span></label>
                            <input v-model="edit_doi_tac.ten_doi_tac" type="text" class="form-control form-control-sm" placeholder="Nhập tên doanh nghiệp...">
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Mã Số Thuế</label>
                                <input v-model="edit_doi_tac.ma_so_thue" type="text" class="form-control form-control-sm" placeholder="VD: 0300456123">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Người Đại Diện</label>
                                <input v-model="edit_doi_tac.ten_nguoi_dai_dien" type="text" class="form-control form-control-sm" placeholder="Họ và tên người đại diện...">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Email Đăng Nhập <span class="text-danger">*</span></label>
                            <input v-model="edit_doi_tac.email" type="email" autocomplete="off" class="form-control form-control-sm" placeholder="contact@company.com">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mật Khẩu Mới</label>
                            <input v-model="edit_doi_tac.mat_khau" type="password" autocomplete="new-password" class="form-control form-control-sm" placeholder="Để trống nếu không đổi">
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Số Điện Thoại</label>
                                <input v-model="edit_doi_tac.so_dien_thoai" type="text" class="form-control form-control-sm" placeholder="09xxxxxxxx">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Trạng Thái Duyệt</label>
                                <select v-model="edit_doi_tac.trang_thai_duyet" class="form-select form-select-sm">
                                    <option value="DaDuyet">Đã duyệt</option>
                                    <option value="ChoDuyet">Chờ duyệt</option>
                                    <option value="TuChoi">Từ chối</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2" v-if="edit_doi_tac.trang_thai_duyet === 'TuChoi'">
                            <label class="form-label fw-semibold text-danger">Lý Do Từ Chối</label>
                            <textarea v-model="edit_doi_tac.ly_do_tu_choi" class="form-control form-control-sm" rows="2" placeholder="Nhập lý do từ chối hồ sơ..."></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Địa Chỉ Trụ Sở</label>
                            <input v-model="edit_doi_tac.dia_chi" type="text" class="form-control form-control-sm" placeholder="Số nhà, đường, quận/huyện, thành phố...">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Trạng Thái Tài Khoản</label>
                            <select v-model="edit_doi_tac.is_block" class="form-select form-select-sm">
                                <option :value="0">Hoạt động</option>
                                <option :value="1">Khóa tài khoản</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="capNhatDoiTac()" type="button" class="btn btn-primary btn-sm px-3" data-bs-dismiss="modal">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Modal Xét Duyệt Hồ Sơ Nhanh (Kèm đầy đủ MST, Địa chỉ, Đại diện, Liên hệ) -->
        <div class="modal fade" id="duyetModal" tabindex="-1" aria-labelledby="duyetModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-warning text-dark">
                        <h1 class="modal-title fs-5 fw-bold" id="duyetModalLabel">
                            <i class="bx bx-shield-quarter me-1"></i>Xét Duyệt Hồ Sơ Doanh Nghiệp
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <!-- Khung hiển thị thông tin hồ sơ chi tiết của đối tác -->
                        <div class="p-3 bg-light rounded-3 mb-3 border">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <span class="badge bg-primary font-11 mb-1">Mã: {{ duyet_DoiTac.ma_doi_tac }}</span>
                                    <h6 class="fw-bold text-dark mb-0 fs-6">{{ duyet_DoiTac.ten_doi_tac }}</h6>
                                </div>
                                <span class="badge px-2 py-1" :class="duyet_DoiTac.trang_thai_duyet === 'DaDuyet' ? 'bg-success' : (duyet_DoiTac.trang_thai_duyet === 'ChoDuyet' ? 'bg-warning text-dark' : 'bg-danger')">
                                    {{ duyet_DoiTac.trang_thai_duyet === 'DaDuyet' ? '● Đã duyệt' : (duyet_DoiTac.trang_thai_duyet === 'ChoDuyet' ? '● Chờ duyệt' : '● Từ chối') }}
                                </span>
                            </div>

                            <div class="row g-2 small text-muted pt-2 border-top mt-1">
                                <!-- Mã số thuế -->
                                <div class="col-sm-6">
                                    <span class="text-secondary"><i class="bx bx-receipt me-1 text-primary"></i>Mã số thuế:</span>
                                    <div class="text-dark fw-bold font-monospace mt-1">
                                        {{ duyet_DoiTac.ma_so_thue || 'Chưa cập nhật MST' }}
                                    </div>
                                </div>

                                <!-- Người đại diện -->
                                <div class="col-sm-6">
                                    <span class="text-secondary"><i class="bx bx-user me-1 text-primary"></i>Người đại diện:</span>
                                    <div class="text-dark fw-bold mt-1">
                                        {{ duyet_DoiTac.ten_nguoi_dai_dien || 'Chưa cập nhật' }}
                                    </div>
                                </div>

                                <!-- Email liên hệ -->
                                <div class="col-sm-6">
                                    <span class="text-secondary"><i class="bx bx-envelope me-1 text-primary"></i>Email:</span>
                                    <div class="text-dark mt-1">
                                        {{ duyet_DoiTac.email || 'Chưa cập nhật' }}
                                    </div>
                                </div>

                                <!-- Số điện thoại -->
                                <div class="col-sm-6">
                                    <span class="text-secondary"><i class="bx bx-phone me-1 text-primary"></i>Số điện thoại:</span>
                                    <div class="text-dark mt-1 font-monospace">
                                        {{ duyet_DoiTac.so_dien_thoai || 'Chưa cập nhật' }}
                                    </div>
                                </div>

                                <!-- Địa chỉ trụ sở đối tác -->
                                <div class="col-12">
                                    <span class="text-secondary"><i class="bx bx-map-pin me-1 text-danger"></i>Địa chỉ trụ sở:</span>
                                    <div class="text-dark fw-semibold mt-1">
                                        {{ duyet_DoiTac.dia_chi || 'Chưa cập nhật địa chỉ trụ sở' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Lựa chọn quyết định xét duyệt -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Quyết Định Phê Duyệt Hồ Sơ <span class="text-danger">*</span></label>
                            <select v-model="duyet_DoiTac.trang_thai_duyet" class="form-select form-select-sm">
                                <option value="DaDuyet">✅ Phê duyệt hồ sơ (DaDuyet)</option>
                                <option value="ChoDuyet">⏳ Chờ kiểm duyệt hồ sơ (ChoDuyet)</option>
                                <option value="TuChoi">❌ Từ chối hồ sơ (TuChoi)</option>
                            </select>
                        </div>

                        <!-- Lý do từ chối (hiển thị khi chọn Từ chối) -->
                        <div class="mb-2" v-if="duyet_DoiTac.trang_thai_duyet === 'TuChoi'">
                            <label class="form-label fw-semibold text-danger">Lý Do Từ Chối</label>
                            <textarea v-model="duyet_DoiTac.ly_do_tu_choi" class="form-control form-control-sm" rows="3" placeholder="Nhập lý do từ chối (thiếu GPKD, MST không hợp lệ...)..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-light p-2">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="xacNhanDuyet()" type="button" class="btn btn-primary btn-sm px-3" data-bs-dismiss="modal">Lưu Quyết Định</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Modal Xác Nhận Xóa Đối Tác -->
        <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5 text-white" id="xoaModalLabel">
                            <i class="bx bx-trash me-1"></i>Xác Nhận Xóa Đối Tác
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning border-0 mb-0" role="alert">
                            <i class='bx bx-error-circle me-1 fs-5 align-middle'></i>
                            Bạn có chắc chắn muốn xóa đối tác <strong>{{ delete_doi_tac.ten_doi_tac }}</strong> 
                            (Mã: <code>{{ delete_doi_tac.ma_doi_tac }}</code>) không?
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="xoaDoiTac()" type="button" class="btn btn-danger btn-sm px-3" data-bs-dismiss="modal">Xác nhận xóa</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import api from '@/axios';

export default {
    name: 'AdminDoiTac',
    // 1. Khai báo các biến trạng thái (state) của component
    data() {
        return {
            list_doi_tac: [], // Danh sách đối tác lấy từ server
            key_search: '',   // Từ khóa tìm kiếm
            filterDuyet: '',  // Lọc duyệt: '' (tất cả), 'DaDuyet', 'ChoDuyet', 'TuChoi'
            filterStatus: '', // Lọc khóa: '' (tất cả), '0' (hoạt động), '1' (đã khóa)

            // Dữ liệu form thêm mới đối tác
            add_doi_tac: {
                ma_doi_tac: '',
                ten_doi_tac: '',
                ma_so_thue: '',
                ten_nguoi_dai_dien: '',
                email: '',
                mat_khau: '',
                so_dien_thoai: '',
                dia_chi: '',
                is_block: 0,
                trang_thai_duyet: 'DaDuyet',
                ly_do_tu_choi: ''
            },

            // Dữ liệu form cập nhật đối tác
            edit_doi_tac: {
                ma_doi_tac: '',
                ten_doi_tac: '',
                ma_so_thue: '',
                ten_nguoi_dai_dien: '',
                email: '',
                mat_khau: '',
                so_dien_thoai: '',
                dia_chi: '',
                is_block: 0,
                trang_thai_duyet: 'DaDuyet',
                ly_do_tu_choi: ''
            },

            // Dữ liệu xét duyệt hồ sơ nhanh (bao gồm đầy đủ mã, tên, MST, địa chỉ, người đại diện...)
            duyet_DoiTac: {
                ma_doi_tac: '',
                ten_doi_tac: '',
                ma_so_thue: '',
                dia_chi: '',
                ten_nguoi_dai_dien: '',
                so_dien_thoai: '',
                email: '',
                trang_thai_duyet: 'DaDuyet',
                ly_do_tu_choi: ''
            },

            // Dữ liệu phục vụ modal xóa đối tác
            delete_doi_tac: {
                ma_doi_tac: '',
                ten_doi_tac: ''
            },
        }
    },

    // 2. Các thuộc tính tính toán (Computed Properties)
    computed: {
        // Đếm tổng số đối tác đã được phê duyệt
        countApproved() {
            return this.list_doi_tac.filter(c => c.trang_thai_duyet === 'DaDuyet').length;
        },

        // Đếm số lượng đối tác đang chờ duyệt hồ sơ
        countPending() {
            return this.list_doi_tac.filter(c => c.trang_thai_duyet === 'ChoDuyet').length;
        },

        // Tính tổng số lượng tour mà tất cả đối tác đang cung ứng
        totalTours() {
            return this.list_doi_tac.reduce((total, c) => total + (parseInt(c.so_luong_tour) || 0), 0);
        },

        // Danh sách đối tác được lọc đa điều kiện: từ khóa tìm kiếm (không dấu, không phân biệt hoa thường), trạng thái duyệt, trạng thái khóa
        list_doi_tac_loc() {
            let list = this.list_doi_tac;

            // Bước 1: Lọc theo trạng thái kiểm duyệt hồ sơ
            if (this.filterDuyet !== '') {
                list = list.filter(item => item.trang_thai_duyet === this.filterDuyet);
            }

            // Bước 2: Lọc theo trạng thái hoạt động / khóa
            if (this.filterStatus !== '') {
                list = list.filter(item => item.is_block == parseInt(this.filterStatus));
            }

            // Bước 3: Nếu ô tìm kiếm rỗng, trả về danh sách sau lọc
            if (!this.key_search) {
                return list;
            }

            // Bước 4: Chuẩn hóa từ khóa tìm kiếm (xóa dấu tiếng Việt, chuyển chữ thường)
            let kw = this.removeVietnameseTones(this.key_search);

            // Bước 5: Tìm kiếm đối chiếu không phân biệt hoa thường và không phân biệt có dấu / không dấu
            return list.filter((item) => {
                let maDT    = this.removeVietnameseTones(item.ma_doi_tac);
                let tenDT   = this.removeVietnameseTones(item.ten_doi_tac);
                let mst     = this.removeVietnameseTones(item.ma_so_thue);
                let daiDien = this.removeVietnameseTones(item.ten_nguoi_dai_dien);
                let email   = this.removeVietnameseTones(item.email);
                let sdt     = this.removeVietnameseTones(item.so_dien_thoai);
                let diaChi  = this.removeVietnameseTones(item.dia_chi);

                return maDT.includes(kw) || tenDT.includes(kw) || mst.includes(kw) || daiDien.includes(kw) || email.includes(kw) || sdt.includes(kw) || diaChi.includes(kw);
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

        // Gọi API lấy danh sách toàn bộ đối tác từ máy chủ
        loadData() {
            api.get('/api/admin/doi-tac/get-data')
                .then(response => {
                    this.list_doi_tac = response.data.data;
                })
                .catch(error => {
                    console.error('Lỗi khi tải danh sách đối tác:', error);
                });
        },

        // Gọi API thêm mới đối tác
        themMoiDoiTac() {
            api.post('/api/admin/doi-tac/store', this.add_doi_tac)
                .then(response => {
                    if (response.data.status) {
                        this.$toast.success(response.data.message);
                        this.loadData();
                        this.add_doi_tac = { ma_doi_tac: '', ten_doi_tac: '', ma_so_thue: '', ten_nguoi_dai_dien: '', email: '', mat_khau: '', so_dien_thoai: '', dia_chi: '', is_block: 0, trang_thai_duyet: 'DaDuyet', ly_do_tu_choi: '' };
                    } else {
                        this.$toast.error(response.data.message || 'Thêm đối tác thất bại!');
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : 'Có lỗi xảy ra!';
                    this.$toast.error(msg);
                });
        },

        // Gọi API cập nhật thông tin đối tác
        capNhatDoiTac() {
            api.post('/api/admin/doi-tac/update', this.edit_doi_tac)
                .then(res => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.loadData();
                        this.edit_doi_tac = { ma_doi_tac: '', ten_doi_tac: '', ma_so_thue: '', ten_nguoi_dai_dien: '', email: '', mat_khau: '', so_dien_thoai: '', dia_chi: '', is_block: 0, trang_thai_duyet: 'DaDuyet', ly_do_tu_choi: '' };
                    } else {
                        this.$toast.error(res.data.message || 'Cập nhật đối tác thất bại');
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : 'Có lỗi xảy ra!';
                    this.$toast.error(msg);
                });
        },

        // Mở modal duyệt hồ sơ và tải toàn bộ thông tin chi tiết của đối tác
        moModalDuyet(dt) {
            this.duyet_DoiTac = {
                ma_doi_tac: dt.ma_doi_tac,
                ten_doi_tac: dt.ten_doi_tac,
                ma_so_thue: dt.ma_so_thue || '',
                dia_chi: dt.dia_chi || '',
                ten_nguoi_dai_dien: dt.ten_nguoi_dai_dien || '',
                so_dien_thoai: dt.so_dien_thoai || '',
                email: dt.email || '',
                trang_thai_duyet: dt.trang_thai_duyet || 'DaDuyet',
                ly_do_tu_choi: dt.ly_do_tu_choi || ''
            };
        },

        // Xác nhận lưu quyết định duyệt hồ sơ
        xacNhanDuyet() {
            api.post('/api/admin/doi-tac/duyet', this.duyet_DoiTac)
                .then(res => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.loadData();
                    } else {
                        this.$toast.error(res.data.message || 'Cập nhật duyệt thất bại');
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : 'Có lỗi xảy ra!';
                    this.$toast.error(msg);
                });
        },

        // Gọi API xóa mềm đối tác
        xoaDoiTac() {
            api.post('/api/admin/doi-tac/delete', this.delete_doi_tac)
                .then(res => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.loadData();
                        this.delete_doi_tac = { ma_doi_tac: '', ten_doi_tac: '' };
                    } else {
                        this.$toast.error(res.data.message || 'Xóa đối tác thất bại');
                    }
                })
                .catch(error => {
                    console.error(error);
                    const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : 'Có lỗi xảy ra!';
                    this.$toast.error(msg);
                });
        },

        // Gọi API thay đổi trạng thái hoạt động/khóa của đối tác
        changeStatus(doiTac) {
            api.post('/api/admin/doi-tac/change-status', doiTac)
                .then(res => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        doiTac.is_block = doiTac.is_block == 1 ? 0 : 1;
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
