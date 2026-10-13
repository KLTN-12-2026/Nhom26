<template>
  <div class="admin-page-container">
    <!-- 1. Breadcrumb & Database Sync Pill -->
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
      <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
        <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
        <i class="bx bx-chevron-right mx-1"></i>
        <span class="text-secondary">Phân hệ Quản trị</span>
        <i class="bx bx-chevron-right mx-1"></i>
        <span class="text-primary fw-bold">Kiểm duyệt địa điểm</span>
      </nav>
      <div class="sync-pill d-flex align-items-center gap-1">
        <span class="dot-green"></span>
        <span class="font-11 text-success fw-semibold">Cơ sở dữ liệu: Hoạt động đồng bộ</span>
      </div>
    </div>

    <!-- 2. Page Header Title -->
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-3">
      <div>
        <div class="d-flex align-items-center gap-2">
          <h3 class="fw-bold text-dark mb-0">Kiểm Duyệt Địa Điểm Du Lịch (POI)</h3>
          <span class="badge bg-light text-secondary border font-11">Table: dia_diems</span>
        </div>
        <p class="text-muted small mb-0 mt-1">
          Kiểm tra tính chính xác thông tin tọa độ, hình ảnh và pháp lý các điểm đến do đối tác khai báo trước khi công khai.
        </p>
      </div>
      <button class="btn btn-outline-primary d-flex align-items-center gap-2" @click="loadData">
        <i class="bx bx-refresh font-18" :class="{ 'bx-spin': loading }"></i>
        <span>Làm mới dữ liệu</span>
      </button>
    </div>

    <!-- 3. 4 KPI Metrics Cards -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
      <div class="col">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <span class="font-11 fw-bold text-muted text-uppercase">TỔNG ĐỊA ĐIỂM</span>
              <h2 class="fw-bold text-dark my-1">{{ stats.tong_so }}</h2>
              <small class="text-primary font-11">POI toàn hệ thống</small>
            </div>
            <div class="kpi-icon-box bg-light-primary text-primary"><i class="bx bx-map-pin"></i></div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <span class="font-11 fw-bold text-muted text-uppercase">ĐÃ PHÊ DUYỆT</span>
              <h2 class="fw-bold text-success my-1">{{ stats.da_duyet }}</h2>
              <small class="text-muted font-11">Đã hiển thị trên App & Web</small>
            </div>
            <div class="kpi-icon-box bg-light-success text-success"><i class="bx bx-check-double"></i></div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <span class="font-11 fw-bold text-muted text-uppercase">CHỜ KIỂM DUYỆT</span>
              <h2 class="fw-bold text-warning my-1">{{ stats.cho_duyet }}</h2>
              <small class="text-warning font-11">Cần đối soát thông tin</small>
            </div>
            <div class="kpi-icon-box bg-light-warning text-warning"><i class="bx bx-time"></i></div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <span class="font-11 fw-bold text-muted text-uppercase">TỪ CHỐI DUYỆT</span>
              <h2 class="fw-bold text-danger my-1">{{ stats.tu_choi }}</h2>
              <small class="text-muted font-11">Hồ sơ chưa đạt chuẩn</small>
            </div>
            <div class="kpi-icon-box bg-light-danger text-danger"><i class="bx bx-x-circle"></i></div>
          </div>
        </div>
      </div>
    </div>

    <!-- 4. Filter Bar -->
    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
      <div class="row g-2 align-items-center">
        <div class="col-12 col-md-4">
          <div class="input-group input-group-sm">
            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bx bx-search"></i></span>
            <input 
              type="text" 
              class="form-control border-start-0" 
              v-model="key_search" 
              placeholder="Tìm theo tên địa điểm, mã, địa chỉ, đối tác..."
            >
          </div>
        </div>
        <div class="col-6 col-md-3">
          <select class="form-select form-select-sm" v-model="filterStatus">
            <option value="">Tất cả trạng thái duyệt</option>
            <option value="ChoDuyet">Chờ kiểm duyệt</option>
            <option value="DaDuyet">Đã phê duyệt</option>
            <option value="TuChoi">Từ chối duyệt</option>
          </select>
        </div>
        <div class="col-6 col-md-3">
          <select class="form-select form-select-sm" v-model="filterCategory">
            <option value="">Tất cả loại hình</option>
            <option value="Khám phá">Khám phá</option>
            <option value="Văn hóa">Văn hóa</option>
            <option value="Biển">Biển & Đảo</option>
            <option value="Nghỉ dưỡng">Nghỉ dưỡng</option>
            <option value="Núi">Núi rừng</option>
          </select>
        </div>
        <div class="col-12 col-md-2 text-md-end text-muted small">
          Hiển thị <strong class="text-primary">{{ filteredLocations.length }}</strong> địa điểm
        </div>
      </div>
    </div>

    <!-- 5. Locations Table -->
    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light small text-uppercase">
            <tr>
              <th width="10%">HÌNH ẢNH</th>
              <th width="24%">TÊN ĐỊA ĐIỂM & ĐỊA CHỈ</th>
              <th width="18%">ĐỐI TÁC KHAI BÁO</th>
              <th width="12%">LOẠI HÌNH</th>
              <th width="12%" class="text-center">DUYỆT POI</th>
              <th width="10%" class="text-center">HIỂN THỊ</th>
              <th width="14%" class="text-end pe-3">THAO TÁC</th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="loading">
              <td colspan="7" class="text-center py-5 text-muted">
                <i class="bx bx-loader-alt bx-spin font-24 me-2 text-primary"></i> Đang tải danh sách địa điểm...
              </td>
            </tr>
            <tr v-else-if="paginatedLocations.length === 0">
              <td colspan="7" class="text-center py-5 text-muted">
                <i class="bx bx-folder-open font-28 d-block mb-1"></i>
                Không tìm thấy địa điểm nào phù hợp với bộ lọc!
              </td>
            </tr>
            <tr v-for="loc in paginatedLocations" :key="loc.ma_dia_diem">
              <td>
                <div class="loc-thumb-wrap">
                  <img 
                    :src="getImageUrl(loc.hinh_anh_dai_dien)" 
                    class="rounded-3 shadow-sm border" 
                    width="76" 
                    height="54" 
                    style="object-fit: cover;" 
                    :alt="loc.ten_dia_diem"
                    @error="onImgError"
                  >
                  <span v-if="loc.gallery && loc.gallery.length" class="badge-gallery-count" title="Số ảnh chi tiết">
                    <i class="bx bx-images font-10 me-1"></i>+{{ loc.gallery.length }}
                  </span>
                </div>
              </td>
              <td>
                <div class="d-flex align-items-center gap-1">
                  <strong class="text-dark">{{ loc.ten_dia_diem }}</strong>
                  <span class="badge bg-light text-secondary border font-10">{{ loc.ma_dia_diem }}</span>
                </div>
                <small class="text-muted d-block font-11 mt-1 text-truncate" style="max-width: 280px;" :title="loc.dia_chi">
                  <i class="bx bx-map pin-icon text-danger me-1"></i>{{ loc.dia_chi || 'Chưa cập nhật địa chỉ' }}
                </small>
                <div v-if="loc.trang_thai_duyet === 'TuChoi' && loc.ly_do_tu_choi" class="text-danger small mt-1 font-11">
                  <i class="bx bx-info-circle me-1"></i>Lý do từ chối: {{ loc.ly_do_tu_choi }}
                </div>
              </td>
              <td>
                <span class="badge bg-light text-dark border px-2 py-1">{{ loc.ten_doi_tac || loc.ma_doi_tac_tao }}</span>
                <small class="text-muted d-block font-11 mt-1" v-if="loc.sdt_doi_tac">
                  <i class="bx bx-phone me-1"></i>{{ loc.sdt_doi_tac }}
                </small>
              </td>
              <td>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 rounded-pill">
                  {{ loc.loai || 'Địa điểm tham quan' }}
                </span>
                <div class="small text-muted font-11 mt-1" v-if="loc.gia_giao_dong">
                  <i class="bx bx-dollar-circle me-1"></i>{{ formatCurrency(loc.gia_giao_dong) }}
                </div>
              </td>
              <td class="text-center">
                <span v-if="loc.trang_thai_duyet === 'DaDuyet'" class="badge bg-success-subtle text-success px-2 py-1 rounded-pill font-11 border border-success-subtle">
                  ● Đã duyệt
                </span>
                <span v-else-if="loc.trang_thai_duyet === 'TuChoi'" class="badge bg-danger-subtle text-danger px-2 py-1 rounded-pill font-11 border border-danger-subtle">
                  ● Từ chối
                </span>
                <span v-else class="badge bg-warning-subtle text-warning px-2 py-1 rounded-pill font-11 border border-warning-subtle">
                  ● Chờ duyệt
                </span>
              </td>
              <td class="text-center">
                <div class="form-check form-switch d-inline-block">
                  <input 
                    class="form-check-input cursor-pointer" 
                    type="checkbox" 
                    :checked="loc.trang_thai_hien_thi == 1"
                    @change="toggleStatus(loc)"
                    :title="loc.trang_thai_hien_thi == 1 ? 'Đang hiển thị trên hệ thống' : 'Đang tạm ẩn'"
                  >
                </div>
              </td>
              <td class="text-end pe-3">
                <div class="d-inline-flex gap-1 align-items-center">
                  <!-- Xem chi tiết -->
                  <button 
                    class="btn btn-sm btn-outline-secondary btn-action" 
                    title="Xem chi tiết POI" 
                    @click="openModalDetail(loc)"
                  >
                    <i class="bx bx-show"></i>
                  </button>

                  <!-- Phê duyệt ngay (nếu chưa duyệt) -->
                  <button 
                    class="btn btn-sm btn-success btn-action text-white" 
                    v-if="loc.trang_thai_duyet !== 'DaDuyet'" 
                    title="Phê duyệt địa điểm" 
                    @click="duyetDiaDiem(loc, 'DaDuyet')"
                  >
                    <i class="bx bx-check"></i>
                  </button>

                  <!-- Từ chối duyệt (nếu chưa từ chối) -->
                  <button 
                    class="btn btn-sm btn-outline-warning btn-action text-warning" 
                    v-if="loc.trang_thai_duyet !== 'TuChoi'" 
                    title="Từ chối phê duyệt" 
                    @click="openModalReject(loc)"
                  >
                    <i class="bx bx-x"></i>
                  </button>

                  <!-- Xóa địa điểm -->
                  <button 
                    class="btn btn-sm btn-outline-danger btn-action text-danger" 
                    title="Xóa địa điểm" 
                    @click="xoaDiaDiem(loc)"
                  >
                    <i class="bx bx-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="d-flex flex-wrap justify-content-between align-items-center p-3 border-top gap-2" v-if="filteredLocations.length > 0">
        <span class="text-muted small">
          Hiển thị {{ (currentPage - 1) * pageSize + 1 }} - {{ Math.min(currentPage * pageSize, filteredLocations.length) }} trong tổng {{ filteredLocations.length }} địa điểm
        </span>
        <div class="d-flex align-items-center gap-1">
          <button 
            class="btn btn-sm btn-outline-secondary px-3" 
            :disabled="currentPage <= 1"
            @click="currentPage--"
          >
            Trước
          </button>
          <button 
            v-for="p in totalPages" 
            :key="p" 
            class="btn btn-sm px-3"
            :class="p === currentPage ? 'btn-primary' : 'btn-outline-secondary'"
            @click="currentPage = p"
          >
            {{ p }}
          </button>
          <button 
            class="btn btn-sm btn-outline-secondary px-3" 
            :disabled="currentPage >= totalPages"
            @click="currentPage++"
          >
            Sau
          </button>
        </div>
      </div>
    </div>

    <!-- Modal Chi Tiết Địa Điểm (POI Detail) -->
    <div class="modal fade show d-block" tabindex="-1" v-if="showModalDetail" style="background: rgba(0,0,0,0.5);">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4">
          <div class="modal-header border-0 pb-0">
            <div>
              <div class="d-flex align-items-center gap-2">
                <h5 class="modal-title fw-bold text-dark">{{ selectedLoc.ten_dia_diem }}</h5>
                <span class="badge bg-light text-secondary border font-11">{{ selectedLoc.ma_dia_diem }}</span>
              </div>
              <small class="text-muted"><i class="bx bx-map text-danger me-1"></i>{{ selectedLoc.dia_chi }}</small>
            </div>
            <button type="button" class="btn-close" @click="showModalDetail = false"></button>
          </div>
          <div class="modal-body pt-3">
            <div class="row g-3">
              <!-- Ảnh đại diện & Gallery -->
              <div class="col-12 col-md-5">
                <div class="card border rounded-3 overflow-hidden mb-2">
                  <img 
                    :src="getImageUrl(selectedLoc.hinh_anh_dai_dien)" 
                    class="w-100" 
                    style="height: 180px; object-fit: cover;" 
                    :alt="selectedLoc.ten_dia_diem"
                    @error="onImgError"
                  >
                </div>
                <div v-if="selectedLoc.gallery && selectedLoc.gallery.length" class="mt-2">
                  <span class="small fw-semibold text-muted d-block mb-1">Ảnh thư viện ({{ selectedLoc.gallery.length }} ảnh):</span>
                  <div class="d-flex flex-wrap gap-1">
                    <img 
                      v-for="(img, idx) in selectedLoc.gallery" 
                      :key="idx" 
                      :src="getImageUrl(img.duong_dan_anh)" 
                      class="rounded border" 
                      width="46" 
                      height="38" 
                      style="object-fit: cover;" 
                      @error="onImgError"
                    >
                  </div>
                </div>
              </div>

              <!-- Chi tiết thông tin -->
              <div class="col-12 col-md-7">
                <div class="bg-light p-3 rounded-3 mb-3">
                  <div class="row g-2 small">
                    <div class="col-6">
                      <span class="text-muted d-block font-11">Đối tác khai báo:</span>
                      <strong>{{ selectedLoc.ten_doi_tac || selectedLoc.ma_doi_tac_tao }}</strong>
                    </div>
                    <div class="col-6">
                      <span class="text-muted d-block font-11">Số điện thoại:</span>
                      <strong>{{ selectedLoc.so_dien_thoai || selectedLoc.sdt_doi_tac || 'Chưa có' }}</strong>
                    </div>
                    <div class="col-6">
                      <span class="text-muted d-block font-11">Loại hình POI:</span>
                      <span class="badge bg-primary text-white">{{ selectedLoc.loai || 'Địa điểm' }}</span>
                    </div>
                    <div class="col-6">
                      <span class="text-muted d-block font-11">Giá vé tham khảo:</span>
                      <strong>{{ formatCurrency(selectedLoc.gia_giao_dong) }}</strong>
                    </div>
                    <div class="col-6">
                      <span class="text-muted d-block font-11">Giờ mở cửa:</span>
                      <span>{{ selectedLoc.gio_mo_cua || '07:00' }} - {{ selectedLoc.gio_dong_cua || '22:00' }}</span>
                    </div>
                    <div class="col-6">
                      <span class="text-muted d-block font-11">Tọa độ GPS:</span>
                      <span>{{ selectedLoc.vi_do || '---' }}, {{ selectedLoc.kinh_do || '---' }}</span>
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label small fw-bold text-dark mb-1">Mô tả điểm đến:</label>
                  <p class="small text-muted mb-0 bg-white p-2 border rounded-2" style="white-space: pre-line; max-height: 120px; overflow-y: auto;">
                    {{ selectedLoc.mo_ta || 'Không có mô tả chi tiết cho địa điểm này.' }}
                  </p>
                </div>

                <div v-if="selectedLoc.ly_do_tu_choi" class="alert alert-danger small p-2 mb-0">
                  <strong><i class="bx bx-error-circle me-1"></i>Lý do từ chối trước đó:</strong> {{ selectedLoc.ly_do_tu_choi }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-secondary btn-sm px-3" @click="showModalDetail = false">Đóng</button>
            <button 
              type="button" 
              class="btn btn-warning btn-sm px-3" 
              v-if="selectedLoc.trang_thai_duyet !== 'TuChoi'"
              @click="showModalDetail = false; openModalReject(selectedLoc)"
            >
              <i class="bx bx-x me-1"></i>Từ chối duyệt
            </button>
            <button 
              type="button" 
              class="btn btn-success btn-sm px-3 text-white" 
              v-if="selectedLoc.trang_thai_duyet !== 'DaDuyet'"
              @click="duyetDiaDiem(selectedLoc, 'DaDuyet'); showModalDetail = false"
            >
              <i class="bx bx-check me-1"></i>Phê duyệt địa điểm
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Nhập Lý Do Từ Chối (Reject Reason Modal) -->
    <div class="modal fade show d-block" tabindex="-1" v-if="showModalReject" style="background: rgba(0,0,0,0.5);">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title fw-bold text-danger d-flex align-items-center gap-2">
              <i class="bx bx-error font-22"></i> Từ Chối Phê Duyệt POI
            </h5>
            <button type="button" class="btn-close" @click="showModalReject = false"></button>
          </div>
          <div class="modal-body pt-3">
            <p class="small text-muted">
              Bạn đang từ chối địa điểm: <strong class="text-dark">{{ rejectingLoc.ten_dia_diem }}</strong>.
              Vui lòng nêu rõ lý do để đối tác đối chiếu và chỉnh sửa thông tin.
            </p>
            <div class="mb-3">
              <label class="form-label small fw-semibold">Lý do từ chối kiểm duyệt <span class="text-danger">*</span></label>
              <textarea 
                class="form-control" 
                rows="4" 
                v-model="rejectReason" 
                placeholder="VD: Hình ảnh mờ không rõ ràng; Tọa độ định vị chưa khớp với địa chỉ thực tế; Thiếu giấy phép kinh doanh..."
              ></textarea>
            </div>
            <div class="d-flex flex-wrap gap-1">
              <span class="badge bg-light text-secondary border cursor-pointer font-11" @click="rejectReason = 'Hình ảnh mờ, không đúng địa điểm thực tế.'">
                Ảnh không đạt chuẩn
              </span>
              <span class="badge bg-light text-secondary border cursor-pointer font-11" @click="rejectReason = 'Tọa độ GPS định vị sai lệch với địa chỉ thực tế.'">
                Sai lệch tọa độ
              </span>
              <span class="badge bg-light text-secondary border cursor-pointer font-11" @click="rejectReason = 'Thông tin mô tả chưa đầy đủ, trùng lặp với địa điểm đã có.'">
                Trùng lặp dữ liệu
              </span>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-secondary btn-sm px-3" @click="showModalReject = false">Hủy bỏ</button>
            <button type="button" class="btn btn-danger btn-sm px-3" @click="confirmReject">
              <i class="bx bx-send me-1"></i>Xác nhận từ chối
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import api from '@/axios';

export default {
  name: 'AdminKiemDuyetDiaDiem',
  data() {
    return {
      loading: false,
      key_search: '',
      searchQuery: '',
      filterStatus: '',
      filterCategory: '',
      currentPage: 1,
      pageSize: 10,
      list_dia_diem: [],
      add_dia_diem: {},
      edit_dia_diem: {},
      delete_dia_diem: {},
      locations: [],
      stats: {
        tong_so: 0,
        da_duyet: 0,
        cho_duyet: 0,
        tu_choi: 0
      },
      showModalDetail: false,
      selectedLoc: {},
      showModalReject: false,
      rejectingLoc: {},
      rejectReason: ''
    };
  },
  computed: {
    filteredLocations() {
      return this.locations.filter(l => {
        const query = (this.key_search || this.searchQuery || '').toLowerCase().trim();
        const matchSearch =
          !query ||
          (l.ten_dia_diem || '').toLowerCase().includes(query) ||
          (l.ma_dia_diem || '').toLowerCase().includes(query) ||
          (l.dia_chi || '').toLowerCase().includes(query) ||
          (l.ten_doi_tac || '').toLowerCase().includes(query);

        const matchStatus = !this.filterStatus || l.trang_thai_duyet === this.filterStatus;
        const matchCategory = !this.filterCategory || (l.loai || '').toLowerCase().includes(this.filterCategory.toLowerCase());

        return matchSearch && matchStatus && matchCategory;
      });
    },
    totalPages() {
      return Math.ceil(this.filteredLocations.length / this.pageSize) || 1;
    },
    paginatedLocations() {
      const start = (this.currentPage - 1) * this.pageSize;
      return this.filteredLocations.slice(start, start + this.pageSize);
    }
  },
  watch: {
    key_search() {
      this.currentPage = 1;
    },
    searchQuery() {
      this.currentPage = 1;
    },
    filterStatus() {
      this.currentPage = 1;
    },
    filterCategory() {
      this.currentPage = 1;
    }
  },
  mounted() {
    this.loadData();
  },
  methods: {
    loadData() {
      this.loading = true;
      api.get('/api/admin/kiem-duyet-dia-diem/get-data')
        .then(res => {
          if (res.data.status) {
            this.list_dia_diem = res.data.data || [];
            this.locations = this.list_dia_diem;
            if (res.data.stats) {
              this.stats = res.data.stats;
            } else {
              this.calculateLocalStats();
            }
          } else {
            this.$toast.error(res.data.message || 'Không thể tải danh sách địa điểm!');
          }
        })
        .catch(err => {
          console.error('Lỗi khi tải danh sách POI:', err);
          this.$toast.error('Có lỗi xảy ra khi kết nối máy chủ!');
        })
        .finally(() => {
          this.loading = false;
        });
    },
    calculateLocalStats() {
      this.stats = {
        tong_so: this.locations.length,
        da_duyet: this.locations.filter(l => l.trang_thai_duyet === 'DaDuyet').length,
        cho_duyet: this.locations.filter(l => l.trang_thai_duyet === 'ChoDuyet').length,
        tu_choi: this.locations.filter(l => l.trang_thai_duyet === 'TuChoi').length
      };
    },
    duyetDiaDiem(loc, status, reason = null) {
      api.post('/api/admin/kiem-duyet-dia-diem/duyet', {
        ma_dia_diem: loc.ma_dia_diem,
        trang_thai_duyet: status,
        ly_do_tu_choi: reason
      })
      .then(res => {
        if (res.data.status) {
          this.$toast.success(res.data.message || 'Cập nhật trạng thái duyệt thành công!');
          this.loadData();
        } else {
          this.$toast.error(res.data.message || 'Thao tác duyệt thất bại!');
        }
      })
      .catch(err => {
        const msg = (err.response && err.response.data && err.response.data.message) || 'Có lỗi xảy ra!';
        this.$toast.error(msg);
      });
    },
    toggleStatus(loc) {
      api.post('/api/admin/kiem-duyet-dia-diem/change-status', {
        ma_dia_diem: loc.ma_dia_diem
      })
      .then(res => {
        if (res.data.status) {
          loc.trang_thai_hien_thi = loc.trang_thai_hien_thi == 1 ? 0 : 1;
          this.$toast.success(res.data.message || 'Đổi trạng thái hiển thị thành công!');
        } else {
          this.$toast.error(res.data.message || 'Thao tác thất bại!');
        }
      })
      .catch(err => {
        const msg = (err.response && err.response.data && err.response.data.message) || 'Có lỗi xảy ra!';
        this.$toast.error(msg);
      });
    },
    xoaDiaDiem(loc) {
      if (confirm(`Bạn có chắc muốn xóa địa điểm "${loc.ten_dia_diem}"?`)) {
        api.post('/api/admin/kiem-duyet-dia-diem/delete', {
          ma_dia_diem: loc.ma_dia_diem
        })
        .then(res => {
          if (res.data.status) {
            this.$toast.success(res.data.message || 'Xóa địa điểm thành công!');
            this.loadData();
          } else {
            this.$toast.error(res.data.message || 'Xóa địa điểm thất bại!');
          }
        })
        .catch(err => {
          const msg = (err.response && err.response.data && err.response.data.message) || 'Có lỗi xảy ra!';
          this.$toast.error(msg);
        });
      }
    },
    openModalDetail(loc) {
      this.selectedLoc = { ...loc };
      this.showModalDetail = true;
    },
    openModalReject(loc) {
      this.rejectingLoc = { ...loc };
      this.rejectReason = '';
      this.showModalReject = true;
    },
    confirmReject() {
      if (!this.rejectReason.trim()) {
        this.$toast.warning('Vui lòng nhập lý do từ chối kiểm duyệt!');
        return;
      }
      this.duyetDiaDiem(this.rejectingLoc, 'TuChoi', this.rejectReason);
      this.showModalReject = false;
    },
    getImageUrl(img) {
      if (!img) return 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=300';
      if (img.startsWith('http://') || img.startsWith('https://')) return img;
      return `/images/${img}`;
    },
    onImgError(e) {
      e.target.src = 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=300';
    },
    formatCurrency(val) {
      if (!val || Number(val) === 0) return 'Miễn phí';
      return Number(val).toLocaleString('vi-VN') + ' đ';
    }
  }
};
</script>

<style scoped>
.admin-page-container {
  padding: 0.5rem;
}
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
  width: 38px;
  height: 38px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
}
.bg-light-primary { background-color: #e0f2fe; }
.bg-light-success { background-color: #dcfce7; }
.bg-light-warning { background-color: #fef3c7; }
.bg-light-danger { background-color: #fee2e2; }
.btn-action {
  width: 30px;
  height: 30px;
  padding: 0;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  border-radius: 6px;
  transition: all 0.15s;
}
.loc-thumb-wrap {
  position: relative;
  display: inline-block;
}
.badge-gallery-count {
  position: absolute;
  bottom: 2px;
  right: 2px;
  background: rgba(0, 0, 0, 0.65);
  color: #fff;
  font-size: 10px;
  padding: 1px 4px;
  border-radius: 4px;
}
.pin-icon {
  font-size: 0.85rem;
}
.cursor-pointer {
  cursor: pointer;
}
</style>
