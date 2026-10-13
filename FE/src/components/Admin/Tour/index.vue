<template>
  <div class="admin-page-container">
    <!-- ========================================================= -->
    <!-- 1. THANH ĐIỀU HƯỚNG BREADCRUMB & TRẠNG THÁI ĐỒNG BỘ DATABASE -->
    <!-- ========================================================= -->
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
      <!-- Breadcrumb điều hướng các cấp trang quản trị -->
      <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
        <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
        <i class="bx bx-chevron-right mx-1"></i>
        <span class="text-secondary">Phân hệ Quản trị</span>
        <i class="bx bx-chevron-right mx-1"></i>
        <span class="text-primary fw-bold">Quản lý Tour</span>
      </nav>

      <!-- Badge báo hiệu trạng thái kết nối và đồng bộ dữ liệu thời gian thực -->
      <div class="sync-pill d-flex align-items-center gap-1">
        <span class="dot-green"></span>
        <span class="font-11 text-success fw-semibold">Cơ sở dữ liệu: Hoạt động đồng bộ</span>
      </div>
    </div>

    <!-- ========================================================= -->
    <!-- 2. TIÊU ĐỀ TRANG & NÚT HÀNH ĐỘNG MỞ MODAL THÊM MỚI -->
    <!-- ========================================================= -->
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-3">
      <div>
        <div class="d-flex align-items-center gap-2">
          <h3 class="fw-bold text-dark mb-0">Quản lý Tour Du Lịch</h3>
          <span class="badge bg-light text-secondary border font-11">Table: tours & tour_khoi_hanhs</span>
        </div>
        <p class="text-muted small mb-0 mt-1">
          Giám sát, kiểm duyệt, phân loại và quản lý toàn bộ tour cùng giá khởi hành niêm yết trên nền tảng.
        </p>
      </div>
      <div>
        <!-- Nút mở Modal Thêm mới Tour -->
        <button class="btn btn-primary rounded-3 px-3 py-2 fw-semibold shadow-sm d-flex align-items-center gap-1"
          data-bs-toggle="modal" data-bs-target="#themMoiTourModal">
          <i class="bx bx-plus font-18"></i>Thêm Tour Mới
        </button>
      </div>
    </div>

    <!-- ========================================================= -->
    <!-- 3. 4 THẺ KPI THỐNG KÊ TỔNG QUAN TỪ DATABASE -->
    <!-- ========================================================= -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
      <!-- Thẻ 1: Tổng số lượng tour trong hệ thống -->
      <div class="col">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <span class="font-11 fw-bold text-muted text-uppercase">TỔNG SỐ TOUR</span>
              <h2 class="fw-bold text-dark my-1">{{ list_tour.length < 10 ? '0' + list_tour.length : list_tour.length }}</h2>
              <small class="text-primary font-11">Đồng bộ từ bảng tours</small>
            </div>
            <div class="kpi-icon-box bg-light-primary text-primary"><i class="bx bx-map-alt"></i></div>
          </div>
        </div>
      </div>

      <!-- Thẻ 2: Số lượng tour đang mở bán (trang_thai_hien_thi = 1) -->
      <div class="col">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <span class="font-11 fw-bold text-muted text-uppercase">ĐANG MỞ BÁN</span>
              <h2 class="fw-bold text-success my-1">{{ countActive < 10 ? '0' + countActive : countActive }}</h2>
              <small class="text-muted font-11">Hiển thị trực tuyến</small>
            </div>
            <div class="kpi-icon-box bg-light-success text-success"><i class="bx bx-check-circle"></i></div>
          </div>
        </div>
      </div>

      <!-- Thẻ 3: Số lượng tour đang chờ admin kiểm duyệt hồ sơ -->
      <div class="col">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <span class="font-11 fw-bold text-muted text-uppercase">CHỜ KIỂM DUYỆT</span>
              <h2 class="fw-bold text-warning my-1">{{ countPending < 10 ? '0' + countPending : countPending }}</h2>
              <small class="text-warning font-11">Cần admin duyệt hồ sơ</small>
            </div>
            <div class="kpi-icon-box bg-light-warning text-warning"><i class="bx bx-time-five"></i></div>
          </div>
        </div>
      </div>

      <!-- Thẻ 4: Số lượng tour đã được phê duyệt hợp lệ -->
      <div class="col">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <span class="font-11 fw-bold text-muted text-uppercase">ĐÃ PHÊ DUYỆT</span>
              <h2 class="fw-bold text-info my-1">{{ countApproved < 10 ? '0' + countApproved : countApproved }}</h2>
              <small class="text-info font-11">Hồ sơ đạt tiêu chuẩn</small>
            </div>
            <div class="kpi-icon-box bg-light-info text-info"><i class="bx bx-shield-check"></i></div>
          </div>
        </div>
      </div>
    </div>

    <!-- ========================================================= -->
    <!-- 4. FILTER BAR: THANH TÌM KIẾM VÀ BỘ LỌC ĐA TIÊU CHÍ -->
    <!-- ========================================================= -->
    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
      <div class="row g-2 align-items-center">
        <!-- Ô tìm kiếm kèm nút kính lúp -->
        <div class="col-md-5">
          <div class="input-group input-group-sm">
            <input 
              type="search" 
              name="search_tour_keyword" 
              autocomplete="off" 
              class="form-control shadow-none" 
              v-model="key_search" 
              placeholder="Tìm theo mã tour, tên hành trình, đối tác...">
            <button class="btn btn-primary px-3" type="button" title="Tìm kiếm">
              <i class="bx bx-search"></i>
            </button>
          </div>
        </div>

        <!-- Bộ lọc dropdown theo đối tác cung cấp -->
        <div class="col-md-2">
          <select class="form-select form-select-sm" v-model="filterDoiTac">
            <option value="">Tất cả đối tác</option>
            <option v-for="(dt, idx) in list_doi_tac" :key="idx" :value="dt.ma_doi_tac">
              {{ dt.ten_doi_tac }}
            </option>
          </select>
        </div>

        <!-- Bộ lọc dropdown theo trạng thái kiểm duyệt -->
        <div class="col-md-2">
          <select class="form-select form-select-sm" v-model="filterDuyet">
            <option value="">Tất cả kiểm duyệt</option>
            <option value="DaDuyet">Đã duyệt</option>
            <option value="ChoDuyet">Chờ duyệt</option>
            <option value="TuChoi">Từ chối</option>
          </select>
        </div>

        <!-- Bộ lọc dropdown theo trạng thái hiển thị mở bán -->
        <div class="col-md-1">
          <select class="form-select form-select-sm" v-model="filterHienThi">
            <option value="">Hiển thị</option>
            <option value="1">Mở bán</option>
            <option value="0">Tạm ẩn</option>
          </select>
        </div>

        <!-- Thống kê số lượng tour khớp tiêu chí lọc -->
        <div class="col-md-2 text-end">
          <span class="small text-muted">Hiển thị <strong class="text-primary">{{ list_tour_loc.length }}</strong> tour</span>
        </div>
      </div>
    </div>

    <!-- ========================================================= -->
    <!-- 5. DATA TABLE: BẢNG DANH SÁCH TOUR DU LỊCH & GIÁ KHỞI HÀNH -->
    <!-- ========================================================= -->
    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light small text-uppercase text-center align-middle">
            <tr>
              <th width="4%">#</th>
              <th width="10%">MÃ TOUR</th>
              <th width="26%" class="text-start">TÊN TOUR & THỜI LƯỢNG</th>
              <th width="17%" class="text-start">ĐỐI TÁC CUNG CẤP</th>
              <th width="12%">GIÁ KHỞI HÀNH</th>
              <th width="11%">DUYỆT TOUR</th>
              <th width="10%">HIỂN THỊ</th>
              <th width="10%">ACTION</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(tour, index) in list_tour_loc" :key="tour.ma_tour || index">
              <!-- Cột 1: Số thứ tự (#) -->
              <td class="text-center align-middle fw-bold">{{ index + 1 }}</td>

              <!-- Cột 2: Mã Tour -->
              <td class="text-center align-middle">
                <strong class="text-primary font-13 font-monospace">{{ tour.ma_tour }}</strong>
              </td>

              <!-- Cột 3: Hình ảnh, tên tour và thời lượng -->
              <td class="align-middle text-start">
                <div class="d-flex align-items-center gap-3">
                  <img 
                    :src="getImageUrl(tour.hinh_anh_dai_dien)" 
                    class="rounded-3 object-fit-cover border shadow-xs" 
                    width="56" 
                    height="44" 
                    alt="Ảnh tour"
                    @error="onImageError"
                  >
                  <div>
                    <div class="fw-bold text-dark font-14">{{ tour.ten_tour }}</div>
                    <div class="d-flex align-items-center gap-2 mt-1">
                      <span class="badge bg-light text-dark border font-11">
                        <i class="bx bx-calendar-event me-1 text-primary"></i>{{ tour.so_ngay ? tour.so_ngay + ' ngày' : '1 ngày' }}
                      </span>
                      <span class="badge bg-light text-muted border font-11">
                        <i class="bx bx-user me-1 text-info"></i>Tối đa {{ tour.so_nguoi_toi_da || 20 }} khách
                      </span>
                    </div>
                  </div>
                </div>
              </td>

              <!-- Cột 4: Tên đối tác cung ứng tour & thông tin liên hệ -->
              <td class="align-middle text-start">
                <div class="fw-semibold text-dark font-13">
                  <i class="bx bx-buildings text-primary me-1"></i>{{ tour.ten_doi_tac || tour.ma_doi_tac }}
                </div>
                <small class="text-muted d-block font-11 mt-1" v-if="tour.so_dien_thoai_doi_tac || tour.email_doi_tac">
                  {{ tour.so_dien_thoai_doi_tac || tour.email_doi_tac }}
                </small>
              </td>

              <!-- Cột 5: Giá khởi hành (lấy từ bảng tour_khoi_hanhs) -->
              <td class="text-center align-middle">
                <div class="fw-bold text-primary font-13" v-if="tour.gia_tour && parseFloat(tour.gia_tour) > 0">
                  {{ formatPrice(tour.gia_tour) }}đ
                </div>
                <div class="text-muted small fst-italic" v-else>
                  Chưa có giá
                </div>
                <small class="text-muted font-11 d-block mt-1">
                  {{ tour.so_lich_khoi_hanh || 0 }} lịch khởi hành
                </small>
              </td>

              <!-- Cột 6: Trạng thái kiểm duyệt hồ sơ tour -->
              <td class="text-center align-middle">
                <span v-if="tour.trang_thai_duyet === 'DaDuyet'" class="badge bg-success-subtle text-success px-2 py-1 rounded-pill font-11">
                  ● Đã duyệt
                </span>
                <span v-else-if="tour.trang_thai_duyet === 'ChoDuyet'" class="badge bg-warning-subtle text-warning px-2 py-1 rounded-pill font-11">
                  ● Chờ duyệt
                </span>
                <span v-else-if="tour.trang_thai_duyet === 'TuChoi'" class="badge bg-danger-subtle text-danger px-2 py-1 rounded-pill font-11" :title="tour.ly_do_tu_choi">
                  ● Từ chối
                </span>
                <span v-else class="badge bg-light text-secondary px-2 py-1 rounded-pill font-11">
                  Chưa duyệt
                </span>
              </td>

              <!-- Cột 7: Nút đổi trạng thái hiển thị mở bán (Bật / Tắt) -->
              <td class="text-center align-middle">
                <button v-on:click="changeStatus(tour)" v-if="tour.trang_thai_hien_thi == 1" class="btn btn-sm btn-success">
                  Hiển thị
                </button>
                <button v-on:click="changeStatus(tour)" v-else class="btn btn-sm btn-danger">
                  Tạm ẩn
                </button>
              </td>

              <!-- Cột 8: Action thao tác (Duyệt hồ sơ / Sửa / Xóa) -->
              <td class="text-center align-middle">
                <div class="d-inline-flex gap-1">
                  <!-- Nút mở Modal Xét duyệt tour -->
                  <button v-on:click="moModalDuyet(tour)" class="btn btn-sm btn-action text-warning" 
                    data-bs-toggle="modal" data-bs-target="#duyetTourModal" title="Xét duyệt tour">
                    <i class="bx bx-shield-quarter"></i>
                  </button>
                  <!-- Nút mở Modal Cập nhật tour -->
                  <button v-on:click="moModalCapNhat(tour)" class="btn btn-sm btn-action text-primary" 
                    data-bs-toggle="modal" data-bs-target="#capNhatTourModal" title="Chỉnh sửa tour">
                    <i class="bx bx-edit"></i>
                  </button>
                  <!-- Nút mở Modal Xác nhận xóa tour -->
                  <button v-on:click="Object.assign(delete_tour, tour)" class="btn btn-sm btn-action text-danger" 
                    data-bs-toggle="modal" data-bs-target="#xoaTourModal" title="Xóa tour">
                    <i class="bx bx-trash"></i>
                  </button>
                </div>
              </td>
            </tr>

            <!-- Dòng thông báo khi không có bản ghi nào khớp bộ lọc -->
            <tr v-if="list_tour_loc.length === 0">
              <td colspan="8" class="text-center py-4 text-muted">
                <i class="bx bx-map-pin fs-3 d-block mb-1"></i>
                Không tìm thấy tour du lịch phù hợp.
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Phân trang danh sách tour -->
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

    <!-- ========================================================= -->
    <!-- 6. MODAL 1: THÊM MỚI TOUR DU LỊCH (CÓ GIÁ KHỞI HÀNH) -->
    <!-- ========================================================= -->
    <div class="modal fade" id="themMoiTourModal" tabindex="-1" aria-labelledby="themMoiTourModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h1 class="modal-title fs-5 text-white" id="themMoiTourModalLabel">
              <i class="bx bx-map-pin me-1"></i>Thêm Mới Tour Du Lịch
            </h1>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <!-- Mã Tour (Tùy chọn, để trống tự động sinh) -->
              <div class="col-md-6">
                <label class="form-label fw-semibold">Mã Tour</label>
                <input v-model="add_tour.ma_tour" type="text" class="form-control form-control-sm" placeholder="VD: TR06 (Để trống tự sinh)">
              </div>

              <!-- Đơn vị đối tác cung ứng tour -->
              <div class="col-md-6">
                <label class="form-label fw-semibold">Đối Tác Cung Cấp <span class="text-danger">*</span></label>
                <select v-model="add_tour.ma_doi_tac" class="form-select form-select-sm">
                  <option value="">-- Chọn đơn vị đối tác --</option>
                  <option v-for="(dt, idx) in list_doi_tac" :key="idx" :value="dt.ma_doi_tac">
                    {{ dt.ten_doi_tac }} ({{ dt.ma_doi_tac }})
                  </option>
                </select>
              </div>

              <!-- Tên Tour Du Lịch -->
              <div class="col-md-8">
                <label class="form-label fw-semibold">Tên Tour Du Lịch <span class="text-danger">*</span></label>
                <input v-model="add_tour.ten_tour" type="text" class="form-control form-control-sm" placeholder="VD: Khám phá Vịnh Hạ Long 2N1Đ - Du thuyền 5 sao">
              </div>

              <!-- Ô nhập GIÁ KHỞI HÀNH (lưu vào bảng tour_khoi_hanhs) -->
              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary">Giá Khởi Hành (VNĐ) <span class="text-danger">*</span></label>
                <input v-model.number="add_tour.gia_tour" type="number" min="0" class="form-control form-control-sm border-primary" placeholder="VD: 2500000">
              </div>

              <!-- Đường dẫn ảnh đại diện -->
              <div class="col-md-12">
                <label class="form-label fw-semibold">Link Hình Ảnh Đại Diện</label>
                <input v-model="add_tour.hinh_anh_dai_dien" type="text" class="form-control form-control-sm" placeholder="https://domain.com/image.jpg hoặc tên file ảnh">
              </div>

              <!-- Thời lượng (Số ngày) -->
              <div class="col-md-4">
                <label class="form-label fw-semibold">Thời Lượng (Số ngày)</label>
                <input v-model.number="add_tour.so_ngay" type="number" min="1" class="form-control form-control-sm" placeholder="1">
              </div>

              <!-- Số khách tối đa -->
              <div class="col-md-4">
                <label class="form-label fw-semibold">Số Khách Tối Đa</label>
                <input v-model.number="add_tour.so_nguoi_toi_da" type="number" min="1" class="form-control form-control-sm" placeholder="20">
              </div>

              <!-- Trạng thái hiển thị mở bán -->
              <div class="col-md-4">
                <label class="form-label fw-semibold">Trạng Thái Hiển Thị</label>
                <select v-model="add_tour.trang_thai_hien_thi" class="form-select form-select-sm">
                  <option :value="1">Hiển thị mở bán</option>
                  <option :value="0">Tạm ẩn</option>
                </select>
              </div>

              <!-- Trạng thái kiểm duyệt hồ sơ tour -->
              <div class="col-md-6">
                <label class="form-label fw-semibold">Trạng Thái Phê Duyệt</label>
                <select v-model="add_tour.trang_thai_duyet" class="form-select form-select-sm">
                  <option value="DaDuyet">Đã duyệt (DaDuyet)</option>
                  <option value="ChoDuyet">Chờ duyệt (ChoDuyet)</option>
                  <option value="TuChoi">Từ chối (TuChoi)</option>
                </select>
              </div>

              <!-- Lý do từ chối (hiển thị khi trạng thái là Từ chối) -->
              <div class="col-md-6" v-if="add_tour.trang_thai_duyet === 'TuChoi'">
                <label class="form-label fw-semibold text-danger">Lý Do Từ Chối</label>
                <input v-model="add_tour.ly_do_tu_choi" type="text" class="form-control form-control-sm" placeholder="Nhập lý do từ chối tour...">
              </div>

              <!-- Mô tả chi tiết lộ trình tour -->
              <div class="col-12">
                <label class="form-label fw-semibold">Mô Tả Chi Tiết Hành Trình</label>
                <textarea v-model="add_tour.mo_ta" class="form-control form-control-sm" rows="3" placeholder="Giới thiệu điểm đến, dịch vụ bao gồm, trải nghiệm đặc sắc..."></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer bg-light">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
            <button v-on:click="themMoiTour()" type="button" class="btn btn-primary btn-sm px-3" data-bs-dismiss="modal">Thêm Mới Tour</button>
          </div>
        </div>
      </div>
    </div>

    <!-- ========================================================= -->
    <!-- 7. MODAL 2: CẬP NHẬT TOUR DU LỊCH (CÓ GIÁ KHỞI HÀNH) -->
    <!-- ========================================================= -->
    <div class="modal fade" id="capNhatTourModal" tabindex="-1" aria-labelledby="capNhatTourModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h1 class="modal-title fs-5 text-white" id="capNhatTourModalLabel">
              <i class="bx bx-edit me-1"></i>Cập Nhật Tour Du Lịch
            </h1>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <!-- Mã Tour (Hiển thị không cho sửa) -->
              <div class="col-md-6">
                <label class="form-label fw-semibold">Mã Tour</label>
                <input v-model="edit_tour.ma_tour" type="text" class="form-control form-control-sm bg-light" disabled>
              </div>

              <!-- Đơn vị đối tác cung ứng -->
              <div class="col-md-6">
                <label class="form-label fw-semibold">Đối Tác Cung Cấp <span class="text-danger">*</span></label>
                <select v-model="edit_tour.ma_doi_tac" class="form-select form-select-sm">
                  <option value="">-- Chọn đơn vị đối tác --</option>
                  <option v-for="(dt, idx) in list_doi_tac" :key="idx" :value="dt.ma_doi_tac">
                    {{ dt.ten_doi_tac }} ({{ dt.ma_doi_tac }})
                  </option>
                </select>
              </div>

              <!-- Tên Tour Du Lịch -->
              <div class="col-md-8">
                <label class="form-label fw-semibold">Tên Tour Du Lịch <span class="text-danger">*</span></label>
                <input v-model="edit_tour.ten_tour" type="text" class="form-control form-control-sm" placeholder="Nhập tên tour du lịch...">
              </div>

              <!-- Ô cập nhật GIÁ KHỞI HÀNH (đồng bộ bảng tour_khoi_hanhs) -->
              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary">Giá Khởi Hành (VNĐ) <span class="text-danger">*</span></label>
                <input v-model.number="edit_tour.gia_tour" type="number" min="0" class="form-control form-control-sm border-primary" placeholder="VD: 2500000">
              </div>

              <!-- Đường dẫn ảnh đại diện tour -->
              <div class="col-md-12">
                <label class="form-label fw-semibold">Link Hình Ảnh Đại Diện</label>
                <input v-model="edit_tour.hinh_anh_dai_dien" type="text" class="form-control form-control-sm" placeholder="https://domain.com/image.jpg hoặc tên file">
              </div>

              <!-- Thời lượng tour -->
              <div class="col-md-4">
                <label class="form-label fw-semibold">Thời Lượng (Số ngày)</label>
                <input v-model.number="edit_tour.so_ngay" type="number" min="1" class="form-control form-control-sm" placeholder="1">
              </div>

              <!-- Số lượng khách tối đa -->
              <div class="col-md-4">
                <label class="form-label fw-semibold">Số Khách Tối Đa</label>
                <input v-model.number="edit_tour.so_nguoi_toi_da" type="number" min="1" class="form-control form-control-sm" placeholder="20">
              </div>

              <!-- Trạng thái hiển thị mở bán -->
              <div class="col-md-4">
                <label class="form-label fw-semibold">Trạng Thái Hiển Thị</label>
                <select v-model="edit_tour.trang_thai_hien_thi" class="form-select form-select-sm">
                  <option :value="1">Hiển thị mở bán</option>
                  <option :value="0">Tạm ẩn</option>
                </select>
              </div>

              <!-- Trạng thái kiểm duyệt tour -->
              <div class="col-md-6">
                <label class="form-label fw-semibold">Trạng Thái Phê Duyệt</label>
                <select v-model="edit_tour.trang_thai_duyet" class="form-select form-select-sm">
                  <option value="DaDuyet">Đã duyệt (DaDuyet)</option>
                  <option value="ChoDuyet">Chờ duyệt (ChoDuyet)</option>
                  <option value="TuChoi">Từ chối (TuChoi)</option>
                </select>
              </div>

              <!-- Lý do từ chối nếu có -->
              <div class="col-md-6" v-if="edit_tour.trang_thai_duyet === 'TuChoi'">
                <label class="form-label fw-semibold text-danger">Lý Do Từ Chối</label>
                <input v-model="edit_tour.ly_do_tu_choi" type="text" class="form-control form-control-sm" placeholder="Nhập lý do từ chối tour...">
              </div>

              <!-- Mô tả chi tiết hành trình -->
              <div class="col-12">
                <label class="form-label fw-semibold">Mô Tả Chi Tiết Hành Trình</label>
                <textarea v-model="edit_tour.mo_ta" class="form-control form-control-sm" rows="3" placeholder="Nhập mô tả hành trình tour..."></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer bg-light">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
            <button v-on:click="capNhatTour()" type="button" class="btn btn-primary btn-sm px-3" data-bs-dismiss="modal">Lưu Thay Đổi</button>
          </div>
        </div>
      </div>
    </div>

    <!-- ========================================================= -->
    <!-- 8. MODAL 3: XÉT DUYỆT TOUR (XEM CHI TIẾT & GIÁ KHỞI HÀNH) -->
    <!-- ========================================================= -->
    <div class="modal fade" id="duyetTourModal" tabindex="-1" aria-labelledby="duyetTourModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
          <div class="modal-header bg-warning text-dark">
            <h1 class="modal-title fs-5 fw-bold" id="duyetTourModalLabel">
              <i class="bx bx-shield-quarter me-1"></i>Xét Duyệt Tour Du Lịch
            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-3">
            <!-- Box tóm tắt thông tin hồ sơ tour & đối tác -->
            <div class="p-3 bg-light rounded-3 mb-3 border">
              <div class="d-flex flex-wrap align-items-center justify-content-between mb-2 gap-2">
                <div>
                  <span class="badge bg-primary font-11 mb-1 me-2">Mã Tour: {{ duyet_Tour.ma_tour }}</span>
                  <span class="badge bg-secondary font-11 mb-1">Mã Đối Tác: {{ duyet_Tour.ma_doi_tac }}</span>
                  <h6 class="fw-bold text-dark mb-0 fs-6 mt-1">{{ duyet_Tour.ten_tour }}</h6>
                </div>
                <span class="badge px-2 py-1" :class="duyet_Tour.trang_thai_duyet === 'DaDuyet' ? 'bg-success' : (duyet_Tour.trang_thai_duyet === 'ChoDuyet' ? 'bg-warning text-dark' : 'bg-danger')">
                  {{ duyet_Tour.trang_thai_duyet === 'DaDuyet' ? '● Đã duyệt' : (duyet_Tour.trang_thai_duyet === 'ChoDuyet' ? '● Chờ duyệt' : '● Từ chối') }}
                </span>
              </div>

              <div class="row g-2 small text-muted pt-2 border-top mt-1">
                <!-- Tên đơn vị đối tác -->
                <div class="col-sm-6">
                  <span class="text-secondary"><i class="bx bx-buildings me-1 text-primary"></i>Đơn vị cung cấp:</span>
                  <div class="text-dark fw-bold mt-1">
                    {{ duyet_Tour.ten_doi_tac || duyet_Tour.ma_doi_tac }}
                  </div>
                </div>

                <!-- Giá khởi hành hiển thị trong modal duyệt -->
                <div class="col-sm-6">
                  <span class="text-secondary"><i class="bx bx-dollar-circle me-1 text-success"></i>Giá khởi hành:</span>
                  <div class="text-primary fw-bold font-monospace mt-1 fs-6">
                    {{ duyet_Tour.gia_tour && parseFloat(duyet_Tour.gia_tour) > 0 ? formatPrice(duyet_Tour.gia_tour) + ' VNĐ' : 'Chưa thiết lập giá' }}
                  </div>
                </div>

                <!-- Mã số thuế đối tác -->
                <div class="col-sm-6">
                  <span class="text-secondary"><i class="bx bx-receipt me-1 text-primary"></i>Mã số thuế:</span>
                  <div class="text-dark fw-bold font-monospace mt-1">
                    {{ duyet_Tour.ma_so_thue_doi_tac || 'Chưa cập nhật' }}
                  </div>
                </div>

                <!-- Liên hệ đối tác -->
                <div class="col-sm-6">
                  <span class="text-secondary"><i class="bx bx-phone me-1 text-primary"></i>Liên hệ đối tác:</span>
                  <div class="text-dark mt-1 font-monospace">
                    {{ duyet_Tour.so_dien_thoai_doi_tac || duyet_Tour.email_doi_tac || 'Chưa cập nhật' }}
                  </div>
                </div>

                <!-- Quy mô tour -->
                <div class="col-sm-6">
                  <span class="text-secondary"><i class="bx bx-time me-1 text-primary"></i>Quy mô tour:</span>
                  <div class="text-dark mt-1">
                    {{ duyet_Tour.so_ngay || 1 }} ngày • Tối đa {{ duyet_Tour.so_nguoi_toi_da || 20 }} khách
                  </div>
                </div>

                <!-- Mô tả chi tiết tóm tắt -->
                <div class="col-12" v-if="duyet_Tour.mo_ta">
                  <span class="text-secondary"><i class="bx bx-file me-1 text-primary"></i>Mô tả tóm tắt:</span>
                  <div class="text-dark mt-1 small bg-white p-2 rounded border">
                    {{ duyet_Tour.mo_ta }}
                  </div>
                </div>
              </div>
            </div>

            <!-- Lựa chọn quyết định phê duyệt -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Quyết Định Phê Duyệt Tour <span class="text-danger">*</span></label>
              <select v-model="duyet_Tour.trang_thai_duyet" class="form-select form-select-sm">
                <option value="DaDuyet">✅ Phê duyệt tour (DaDuyet)</option>
                <option value="ChoDuyet">⏳ Chờ kiểm duyệt hồ sơ (ChoDuyet)</option>
                <option value="TuChoi">❌ Từ chối phê duyệt (TuChoi)</option>
              </select>
            </div>

            <!-- Lý do từ chối nếu có -->
            <div class="mb-2" v-if="duyet_Tour.trang_thai_duyet === 'TuChoi'">
              <label class="form-label fw-semibold text-danger">Lý Do Từ Chối</label>
              <textarea v-model="duyet_Tour.ly_do_tu_choi" class="form-control form-control-sm" rows="3" placeholder="Nhập lý do từ chối phê duyệt tour này (thông tin lộ trình chưa rõ ràng, giá chưa hợp lệ...)..."></textarea>
            </div>
          </div>
          <div class="modal-footer bg-light p-2">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
            <button v-on:click="xacNhanDuyet()" type="button" class="btn btn-primary btn-sm px-3" data-bs-dismiss="modal">Lưu Quyết Định</button>
          </div>
        </div>
      </div>
    </div>

    <!-- ========================================================= -->
    <!-- 9. MODAL 4: XÁC NHẬN XÓA TOUR DU LỊCH -->
    <!-- ========================================================= -->
    <div class="modal fade" id="xoaTourModal" tabindex="-1" aria-labelledby="xoaTourModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h1 class="modal-title fs-5 text-white" id="xoaTourModalLabel">
              <i class="bx bx-trash me-1"></i>Xác Nhận Xóa Tour
            </h1>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="alert alert-warning border-0 mb-0" role="alert">
              <i class='bx bx-error-circle me-1 fs-5 align-middle'></i>
              Bạn có chắc chắn muốn xóa tour <strong>{{ delete_tour.ten_tour }}</strong> 
              (Mã: <code>{{ delete_tour.ma_tour }}</code>) không?
            </div>
          </div>
          <div class="modal-footer bg-light">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
            <button v-on:click="xoaTour()" type="button" class="btn btn-danger btn-sm px-3" data-bs-dismiss="modal">Xác nhận xóa</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import api from '@/axios';

export default {
  name: "AdminTour",

  // =========================================================
  // DATA: KHAI BÁO CÁC BIẾN TRẠNG THÁI (STATE) CỦA COMPONENT
  // =========================================================
  data() {
    return {
      list_tour: [],      // Danh sách tour lấy từ Backend API
      list_doi_tac: [],   // Danh sách đối tác lấy từ Backend phục vụ dropdown
      key_search: "",     // Từ khóa tìm kiếm nhập trên ô tìm kiếm
      filterDoiTac: "",   // Bộ lọc theo mã đối tác
      filterDuyet: "",    // Bộ lọc theo trạng thái kiểm duyệt (DaDuyet, ChoDuyet, TuChoi)
      filterHienThi: "",  // Bộ lọc theo trạng thái hiển thị mở bán (1: Mở bán, 0: Tạm ẩn)

      // Object binding cho form THÊM MỚI Tour (kèm giá khởi hành gia_tour)
      add_tour: {
        ma_tour: "",
        ma_doi_tac: "",
        ten_tour: "",
        gia_tour: 0,
        mo_ta: "",
        hinh_anh_dai_dien: "",
        so_ngay: 1,
        so_nguoi_toi_da: 20,
        trang_thai_duyet: "DaDuyet",
        trang_thai_hien_thi: 1,
        ly_do_tu_choi: ""
      },

      // Object binding cho form CẬP NHẬT Tour (kèm giá khởi hành gia_tour)
      edit_tour: {
        ma_tour: "",
        ma_doi_tac: "",
        ten_tour: "",
        gia_tour: 0,
        mo_ta: "",
        hinh_anh_dai_dien: "",
        so_ngay: 1,
        so_nguoi_toi_da: 20,
        trang_thai_duyet: "DaDuyet",
        trang_thai_hien_thi: 1,
        ly_do_tu_choi: ""
      },

      // Object binding cho modal XÉT DUYỆT Tour (hiển thị đối tác, MST, giá khởi hành...)
      duyet_Tour: {
        ma_tour: "",
        ma_doi_tac: "",
        ten_tour: "",
        ten_doi_tac: "",
        ma_so_thue_doi_tac: "",
        so_dien_thoai_doi_tac: "",
        email_doi_tac: "",
        gia_tour: 0,
        so_ngay: 1,
        so_nguoi_toi_da: 20,
        mo_ta: "",
        trang_thai_duyet: "DaDuyet",
        ly_do_tu_choi: ""
      },

      // Object lưu thông tin tour cần XÓA
      delete_tour: {
        ma_tour: "",
        ten_tour: ""
      }
    };
  },

  // =========================================================
  // COMPUTED: CÁC THUỘC TÍNH TÍNH TOÁN TỰ ĐỘNG CẬP NHẬT
  // =========================================================
  computed: {
    // 1. Tính tổng số tour đang mở bán hiển thị (trang_thai_hien_thi == 1)
    countActive() {
      return this.list_tour.filter(t => t.trang_thai_hien_thi == 1).length;
    },

    // 2. Tính số lượng tour đang chờ admin kiểm duyệt hồ sơ
    countPending() {
      return this.list_tour.filter(t => t.trang_thai_duyet === 'ChoDuyet').length;
    },

    // 3. Tính số lượng tour đã được phê duyệt hợp lệ
    countApproved() {
      return this.list_tour.filter(t => t.trang_thai_duyet === 'DaDuyet').length;
    },

    // 4. Lọc danh sách tour đa điều kiện (từ khóa không dấu, đối tác, trạng thái duyệt, trạng thái hiển thị)
    list_tour_loc() {
      let list = this.list_tour;

      // Bước 1: Lọc theo mã đối tác cung ứng
      if (this.filterDoiTac !== "") {
        list = list.filter(t => t.ma_doi_tac === this.filterDoiTac);
      }

      // Bước 2: Lọc theo trạng thái kiểm duyệt (DaDuyet, ChoDuyet, TuChoi)
      if (this.filterDuyet !== "") {
        list = list.filter(t => t.trang_thai_duyet === this.filterDuyet);
      }

      // Bước 3: Lọc theo trạng thái hiển thị (1: Mở bán, 0: Ẩn)
      if (this.filterHienThi !== "") {
        list = list.filter(t => t.trang_thai_hien_thi == parseInt(this.filterHienThi));
      }

      // Bước 4: Nếu không nhập từ khóa tìm kiếm, trả về danh sách sau lọc
      if (!this.key_search) {
        return list;
      }

      // Bước 5: Chuẩn hóa từ khóa tìm kiếm (bỏ dấu tiếng Việt, chuyển chữ thường)
      let kw = this.removeVietnameseTones(this.key_search);

      // Bước 6: Khớp tìm kiếm theo mã tour, tên tour, tên đối tác hoặc mô tả
      return list.filter(t => {
        let maTour    = this.removeVietnameseTones(t.ma_tour);
        let tenTour   = this.removeVietnameseTones(t.ten_tour);
        let tenDoiTac = this.removeVietnameseTones(t.ten_doi_tac);
        let moTa      = this.removeVietnameseTones(t.mo_ta);

        return maTour.includes(kw) || tenTour.includes(kw) || tenDoiTac.includes(kw) || moTa.includes(kw);
      });
    }
  },

  // =========================================================
  // MOUNTED: VÒNG ĐỜI GỌI API KHI COMPONENT ĐƯỢC TẢI
  // =========================================================
  mounted() {
    this.loadData();
  },

  // =========================================================
  // METHODS: CÁC HÀM XỬ LÝ SỰ KIỆN VÀ GỌI API BACKEND
  // =========================================================
  methods: {
    // 1. Hàm tiện ích loại bỏ toàn bộ dấu tiếng Việt hỗ trợ tìm kiếm linh hoạt
    removeVietnameseTones(str) {
      if (!str) return '';
      return String(str)
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .replace(/[đĐ]/g, 'd')
        .toLowerCase()
        .trim();
    },

    // 2. Hàm định dạng giá tiền VNĐ chuẩn quốc gia (VD: 2.500.000)
    formatPrice(val) {
      if (!val) return '0';
      return Number(val).toLocaleString("vi-VN");
    },

    // 3. Hàm xử lý link ảnh đại diện với fallback an toàn
    getImageUrl(img) {
      if (!img) {
        return "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=150&q=80";
      }
      if (img.startsWith('http://') || img.startsWith('https://')) {
        return img;
      }
      return "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=150&q=80";
    },

    // 4. Xử lý khi ảnh lỗi không tải được thì gán ảnh mặc định
    onImageError(e) {
      e.target.src = "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=150&q=80";
    },

    // 5. Gọi API GET lấy toàn bộ danh sách tour và đối tác từ Backend
    loadData() {
      api.get('/api/admin/tour/get-data')
        .then(response => {
          if (response.data.status) {
            this.list_tour = response.data.data || [];
            if (response.data.doi_tac) {
              this.list_doi_tac = response.data.doi_tac;
            }
          }
        })
        .catch(error => {
          console.error('Lỗi khi tải danh sách tour:', error);
        });
    },

    // 6. Gọi API POST thêm mới tour kèm giá khởi hành
    themMoiTour() {
      api.post('/api/admin/tour/store', this.add_tour)
        .then(response => {
          if (response.data.status) {
            this.$toast.success(response.data.message);
            this.loadData(); // Tải lại danh sách sau khi thêm mới thành công
            // Reset dữ liệu form thêm mới
            this.add_tour = {
              ma_tour: "",
              ma_doi_tac: "",
              ten_tour: "",
              gia_tour: 0,
              mo_ta: "",
              hinh_anh_dai_dien: "",
              so_ngay: 1,
              so_nguoi_toi_da: 20,
              trang_thai_duyet: "DaDuyet",
              trang_thai_hien_thi: 1,
              ly_do_tu_choi: ""
            };
          } else {
            this.$toast.error(response.data.message || "Thêm tour thất bại!");
          }
        })
        .catch(error => {
          console.error(error);
          const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Có lỗi xảy ra!";
          this.$toast.error(msg);
        });
    },

    // 7. Mở modal cập nhật và gán dữ liệu tour hiện tại (bao gồm giá khởi hành gia_tour)
    moModalCapNhat(t) {
      this.edit_tour = {
        ma_tour: t.ma_tour,
        ma_doi_tac: t.ma_doi_tac,
        ten_tour: t.ten_tour,
        gia_tour: t.gia_tour ? parseFloat(t.gia_tour) : 0,
        mo_ta: t.mo_ta || '',
        hinh_anh_dai_dien: t.hinh_anh_dai_dien || '',
        so_ngay: t.so_ngay || 1,
        so_nguoi_toi_da: t.so_nguoi_toi_da || 20,
        trang_thai_duyet: t.trang_thai_duyet || 'DaDuyet',
        trang_thai_hien_thi: t.trang_thai_hien_thi !== undefined ? t.trang_thai_hien_thi : 1,
        ly_do_tu_choi: t.ly_do_tu_choi || ''
      };
    },

    // 8. Gọi API POST cập nhật thông tin tour và giá khởi hành
    capNhatTour() {
      api.post('/api/admin/tour/update', this.edit_tour)
        .then(res => {
          if (res.data.status) {
            this.$toast.success(res.data.message);
            this.loadData(); // Tải lại bảng sau khi cập nhật
          } else {
            this.$toast.error(res.data.message || "Cập nhật tour thất bại");
          }
        })
        .catch(error => {
          console.error(error);
          const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Có lỗi xảy ra!";
          this.$toast.error(msg);
        });
    },

    // 9. Mở modal xét duyệt tour và tải đầy đủ thông tin chi tiết (đối tác, MST, giá khởi hành...)
    moModalDuyet(t) {
      this.duyet_Tour = {
        ma_tour: t.ma_tour,
        ma_doi_tac: t.ma_doi_tac,
        ten_tour: t.ten_tour,
        ten_doi_tac: t.ten_doi_tac || '',
        ma_so_thue_doi_tac: t.ma_so_thue_doi_tac || '',
        so_dien_thoai_doi_tac: t.so_dien_thoai_doi_tac || '',
        email_doi_tac: t.email_doi_tac || '',
        gia_tour: t.gia_tour ? parseFloat(t.gia_tour) : 0,
        so_ngay: t.so_ngay || 1,
        so_nguoi_toi_da: t.so_nguoi_toi_da || 20,
        mo_ta: t.mo_ta || '',
        trang_thai_duyet: t.trang_thai_duyet || 'DaDuyet',
        ly_do_tu_choi: t.ly_do_tu_choi || ''
      };
    },

    // 10. Gọi API POST lưu quyết định xét duyệt tour (DaDuyet, ChoDuyet, TuChoi)
    xacNhanDuyet() {
      api.post('/api/admin/tour/duyet', this.duyet_Tour)
        .then(res => {
          if (res.data.status) {
            this.$toast.success(res.data.message);
            this.loadData(); // Tải lại dữ liệu sau khi duyệt
          } else {
            this.$toast.error(res.data.message || "Cập nhật duyệt thất bại");
          }
        })
        .catch(error => {
          console.error(error);
          const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Có lỗi xảy ra!";
          this.$toast.error(msg);
        });
    },

    // 11. Gọi API POST đổi trạng thái hiển thị mở bán (Bật / Tắt)
    changeStatus(tour) {
      api.post('/api/admin/tour/change-status', { ma_tour: tour.ma_tour })
        .then(res => {
          if (res.data.status) {
            this.$toast.success(res.data.message);
            tour.trang_thai_hien_thi = tour.trang_thai_hien_thi == 1 ? 0 : 1;
            this.loadData();
          } else {
            this.$toast.error(res.data.message || "Đổi trạng thái thất bại");
          }
        })
        .catch(error => {
          console.error(error);
          const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Có lỗi xảy ra!";
          this.$toast.error(msg);
        });
    },

    // 12. Gọi API POST xóa mềm tour du lịch
    xoaTour() {
      api.post('/api/admin/tour/delete', { ma_tour: this.delete_tour.ma_tour })
        .then(res => {
          if (res.data.status) {
            this.$toast.success(res.data.message);
            this.loadData(); // Tải lại danh sách sau khi xóa
            this.delete_tour = {
              ma_tour: "",
              ten_tour: ""
            };
          } else {
            this.$toast.error(res.data.message || "Xóa tour thất bại");
          }
        })
        .catch(error => {
          console.error(error);
          const msg = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Có lỗi xảy ra!";
          this.$toast.error(msg);
        });
    }
  }
};
</script>

<style scoped>
/* Badge bo tròn trạng thái đồng bộ cơ sở dữ liệu */
.sync-pill {
  background-color: #f0fdf4;
  border: 1px solid #bbf7d0;
  padding: 4px 12px;
  border-radius: 999px;
}

/* Chấm xanh nhấp nháy báo hiệu kết nối trực tuyến */
.dot-green {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background-color: #22c55e;
}

/* Khung icon của các thẻ thống kê KPI */
.kpi-icon-box {
  width: 44px;
  height: 44px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.4rem;
}

/* Bảng màu nền mềm mại cho các icon KPI */
.bg-light-primary { background-color: #e0f2fe; }
.bg-light-success { background-color: #dcfce7; }
.bg-light-info { background-color: #e0f2fe; }
.bg-light-warning { background-color: #fef3c7; }
.bg-light-danger { background-color: #fee2e2; }

/* Nút thao tác tròn nhỏ trong bảng dữ liệu (Xem, Sửa, Xóa) */
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
