<template>
  <div class="admin-page-container">
    <!-- Breadcrumb & Database Sync Pill -->
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
      <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
        <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
        <i class="bx bx-chevron-right mx-1"></i>
        <span class="text-secondary">Khuyến mãi & Marketing</span>
        <i class="bx bx-chevron-right mx-1"></i>
        <span class="text-primary fw-bold">Quản lý Voucher</span>
      </nav>
      <div class="sync-badge">
        <span class="pulse-dot"></span>
        <span class="font-11">Database: Đồng bộ trực tiếp</span>
      </div>
    </div>

    <!-- Page Header Title -->
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-3">
      <div>
        <div class="d-flex align-items-center gap-2">
          <h3 class="page-title mb-0">Quản lý Voucher Admin</h3>
          <span class="table-badge">Table: vouchers</span>
        </div>
        <p class="text-muted small mb-0 mt-1">Phát hành và phân phối mã ưu đãi kích cầu du lịch (giảm phần trăm & giảm tiền mặt) trên toàn sàn.</p>
      </div>
      <button class="btn btn-primary-custom d-flex align-items-center gap-2" @click="openModalAdd">
        <i class="bx bx-plus-circle font-20"></i>
        <span>Tạo Voucher</span>
      </button>
    </div>

    <!-- 4 KPI Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">TỔNG VOUCHER SÀN</span>
            <div class="kpi-value">{{ totalVouchers }}</div>
            <span class="kpi-subtext">Đồng bộ từ bảng vouchers</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-gift"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">ĐANG PHÁT HÀNH</span>
            <div class="kpi-value text-success">{{ activeVouchers }}</div>
            <span class="kpi-subtext">Đang kích hoạt trên hệ thống</span>
          </div>
          <div class="kpi-icon icon-green">
            <i class="bx bx-check-circle"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">VOUCHER PHẦN TRĂM (%)</span>
            <div class="kpi-value text-warning">{{ countPercentVouchers }}</div>
            <span class="kpi-subtext">Giảm theo tỷ lệ đơn hàng</span>
          </div>
          <div class="kpi-icon icon-orange">
            <i class="bx bxs-discount"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">VOUCHER TIỀN MẶT (VNĐ)</span>
            <div class="kpi-value text-primary">{{ countMoneyVouchers }}</div>
            <span class="kpi-subtext">Giảm trừ trực tiếp hóa đơn</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-money"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Filter Bar -->
    <div class="card filter-card mb-4 border-0 shadow-sm">
      <div class="card-body p-3">
        <div class="row g-2 align-items-center">
          <div class="col-12 col-md-5">
            <div class="search-input-wrap">
              <i class="bx bx-search search-icon"></i>
              <input 
                type="text" 
                class="form-control search-input" 
                placeholder="Tìm kiếm theo mã voucher, tên chương trình..."
                v-model="key_search"
              >
            </div>
          </div>
          <div class="col-6 col-md-3">
            <select class="form-select filter-select" v-model="filterType">
              <option value="">Tất cả hình thức giảm</option>
              <option value="PhanTram">Giảm theo phần trăm (%)</option>
              <option value="TienMat">Giảm tiền mặt cố định (VNĐ)</option>
            </select>
          </div>
          <div class="col-6 col-md-2">
            <select class="form-select filter-select" v-model="filterStatus">
              <option value="">Tất cả trạng thái</option>
              <option value="active">Đang áp dụng</option>
              <option value="expired">Tạm dừng / Đã ẩn</option>
            </select>
          </div>
          <div class="col-12 col-md-2 text-md-end text-muted small">
            Hiển thị <strong class="text-dark">{{ filteredVouchers.length }}</strong> voucher
          </div>
        </div>
      </div>
    </div>

    <!-- Main Table -->
    <div class="card table-card border-0 shadow-sm mb-4">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr>
              <th scope="col" class="ps-4">MÃ VOUCHER</th>
              <th scope="col">CHƯƠNG TRÌNH KHUYẾN MÃI</th>
              <th scope="col">HÌNH THỨC & MỨC GIẢM</th>
              <th scope="col">ĐIỀU KIỆN ÁP DỤNG</th>
              <th scope="col" style="width: 170px;">SỐ LƯỢNG / ĐÃ DÙNG</th>
              <th scope="col">THỜI HẠN</th>
              <th scope="col">TRẠNG THÁI</th>
              <th scope="col" class="text-end pe-4">THAO TÁC</th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="filteredVouchers.length === 0">
              <td colspan="8" class="text-center py-5 text-muted">
                <i class="bx bx-purchase-tag-alt font-28 d-block mb-1"></i>
                Không tìm thấy voucher nào phù hợp!
              </td>
            </tr>
            <tr v-for="v in paginatedVouchers" :key="v.id">
              <td class="ps-4">
                <span class="voucher-code-badge">{{ v.code }}</span>
              </td>
              <td>
                <div class="fw-bold text-dark">{{ v.title }}</div>
                <small class="text-muted"><i class="bx bx-store me-1"></i>Đối tác: {{ v.partner || 'Toàn sàn' }}</small>
              </td>
              <td>
                <!-- Loại giảm phần trăm -->
                <div v-if="v.discountType === 'PhanTram'">
                  <span class="badge bg-warning text-dark fw-bold px-2 py-1">
                    <i class="bx bxs-discount me-1"></i>Giảm {{ v.discountValue }}%
                  </span>
                  <small class="d-block text-muted font-11 mt-1" v-if="v.maxDiscount && v.maxDiscount > 0">
                    Tối đa {{ formatMoney(v.maxDiscount) }}đ
                  </small>
                </div>
                <!-- Loại giảm tiền mặt -->
                <div v-else>
                  <span class="badge bg-success-subtle text-success fw-bold px-2 py-1 border border-success-subtle">
                    <i class="bx bx-money me-1"></i>Giảm {{ formatMoney(v.discountValue) }}đ
                  </span>
                  <small class="d-block text-muted font-11 mt-1">Giảm trực tiếp</small>
                </div>
              </td>
              <td class="small">
                <div class="fw-semibold text-secondary">
                  Đơn từ: {{ formatMoney(v.minOrder) }}đ
                </div>
                <small class="text-muted font-11" v-if="v.discountType === 'PhanTram' && v.maxDiscount">
                  Giới hạn: {{ formatMoney(v.maxDiscount) }}đ
                </small>
              </td>
              <td>
                <div class="d-flex justify-content-between small text-muted mb-1">
                  <span>{{ v.used }} / {{ v.quantity }}</span>
                  <span>{{ v.quantity > 0 ? Math.round((v.used / v.quantity) * 100) : 0 }}%</span>
                </div>
                <div class="progress" style="height: 6px;">
                  <div 
                    class="progress-bar bg-primary" 
                    :style="{ width: (v.quantity > 0 ? Math.min(100, Math.round((v.used / v.quantity) * 100)) : 0) + '%' }"
                  ></div>
                </div>
              </td>
              <td class="text-muted small">
                <div v-if="v.startDate">Từ: {{ v.startDate }}</div>
                <div v-if="v.endDate">Đến: {{ v.endDate }}</div>
                <span v-if="!v.startDate && !v.endDate" class="text-secondary">Vô thời hạn</span>
              </td>
              <td>
                <span v-if="v.status === 'active'" class="status-pill status-active">
                  <span class="dot"></span> Đang chạy
                </span>
                <span v-else class="status-pill status-locked">
                  <span class="dot"></span> Tạm dừng
                </span>
              </td>
              <td class="text-end pe-4">
                <div class="action-btn-group">
                  <button class="action-btn" title="Chỉnh sửa voucher" @click="editVoucher(v)">
                    <i class="bx bx-pencil"></i>
                  </button>
                  <button class="action-btn" :title="v.status === 'active' ? 'Tạm dừng mã' : 'Kích hoạt lại'" @click="toggleStatus(v)">
                    <i :class="v.status === 'active' ? 'bx bx-pause' : 'bx bx-play'"></i>
                  </button>
                  <button class="action-btn text-danger" title="Xóa voucher" @click="deleteVoucher(v)">
                    <i class="bx bx-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="d-flex flex-wrap justify-content-between align-items-center p-3 border-top gap-2" v-if="filteredVouchers.length > 0">
        <span class="text-muted small">
          Hiển thị {{ (currentPage - 1) * pageSize + 1 }} - {{ Math.min(currentPage * pageSize, filteredVouchers.length) }} trong tổng {{ filteredVouchers.length }} voucher
        </span>
        <div class="d-flex align-items-center gap-1">
          <button class="btn btn-sm btn-outline-secondary px-3" :disabled="currentPage <= 1" @click="currentPage--">Trước</button>
          <button 
            v-for="p in totalPages" 
            :key="p" 
            class="btn btn-sm px-3" 
            :class="p === currentPage ? 'btn-primary-custom' : 'btn-outline-secondary'"
            @click="currentPage = p"
          >
            {{ p }}
          </button>
          <button class="btn btn-sm btn-outline-secondary px-3" :disabled="currentPage >= totalPages" @click="currentPage++">Sau</button>
        </div>
      </div>
    </div>

    <!-- Modal Form Thêm / Cập Nhật Voucher -->
    <div class="modal fade show d-block" tabindex="-1" v-if="showModal" style="background: rgba(0,0,0,0.45);">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-4">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title fw-bold text-dark">{{ isEdit ? 'Cập Nhật Voucher' : 'Tạo Voucher Khuyến Mãi Sàn Mới' }}</h5>
            <button type="button" class="btn-close" @click="showModal = false"></button>
          </div>
          <div class="modal-body pt-3">
            <div class="row g-3">
              <!-- Mã Voucher -->
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Mã Code Ưu Đãi <span class="text-danger">*</span></label>
                <input 
                  type="text" 
                  class="form-control font-monospace fw-bold text-uppercase" 
                  v-model="formVoucher.code" 
                  placeholder="VD: DANANG2026"
                  :disabled="isEdit"
                >
                <small class="text-muted font-11">Chữ in hoa, không dấu, viết liền.</small>
              </div>

              <!-- Tên chương trình -->
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Tên Chương Trình Khuyến Mãi <span class="text-danger">*</span></label>
                <input type="text" class="form-control" v-model="formVoucher.title" placeholder="VD: Khám Phá Mùa Hè Rực Rỡ">
              </div>

              <!-- Chọn Loại Giảm Giá (Tabs/Radio trực quan) -->
              <div class="col-12">
                <label class="form-label small fw-semibold d-block">Hình Thức Giảm Giá <span class="text-danger">*</span></label>
                <div class="d-flex gap-3">
                  <div 
                    class="discount-type-card p-3 rounded-3 border flex-fill cursor-pointer"
                    :class="{ 'active-type border-warning bg-warning-subtle': formVoucher.discountType === 'PhanTram' }"
                    @click="formVoucher.discountType = 'PhanTram'"
                  >
                    <div class="d-flex align-items-center gap-2">
                      <input 
                        type="radio" 
                        class="form-check-input mt-0" 
                        id="typePercent" 
                        value="PhanTram" 
                        v-model="formVoucher.discountType"
                      >
                      <label for="typePercent" class="fw-bold text-dark mb-0 cursor-pointer">
                        <i class="bx bxs-discount text-warning me-1"></i>Giảm theo Phần Trăm (%)
                      </label>
                    </div>
                    <small class="text-muted d-block mt-1 font-11 ps-4">Giảm một tỷ lệ % giá trị đơn, có thể áp đặt mức trần tối đa.</small>
                  </div>

                  <div 
                    class="discount-type-card p-3 rounded-3 border flex-fill cursor-pointer"
                    :class="{ 'active-type border-success bg-success-subtle': formVoucher.discountType === 'TienMat' }"
                    @click="formVoucher.discountType = 'TienMat'"
                  >
                    <div class="d-flex align-items-center gap-2">
                      <input 
                        type="radio" 
                        class="form-check-input mt-0" 
                        id="typeFixed" 
                        value="TienMat" 
                        v-model="formVoucher.discountType"
                      >
                      <label for="typeFixed" class="fw-bold text-dark mb-0 cursor-pointer">
                        <i class="bx bx-money text-success me-1"></i>Giảm Tiền Mặt Trực Tiếp (VNĐ)
                      </label>
                    </div>
                    <small class="text-muted d-block mt-1 font-11 ps-4">Trừ thẳng một số tiền cố định trực tiếp vào đơn thanh toán tour.</small>
                  </div>
                </div>
              </div>

              <!-- Giá trị giảm theo Phần Trăm -->
              <div class="col-md-6" v-if="formVoucher.discountType === 'PhanTram'">
                <label class="form-label small fw-semibold">Tỷ Lệ Giảm (%) <span class="text-danger">*</span></label>
                <div class="input-group">
                  <input 
                    type="number" 
                    class="form-control" 
                    v-model.number="formVoucher.discountValue" 
                    placeholder="VD: 10, 15, 20"
                    min="1" 
                    max="100"
                  >
                  <span class="input-group-text bg-light fw-bold">%</span>
                </div>
              </div>

              <!-- Mức giảm tối đa (Áp dụng cho Phần Trăm) -->
              <div class="col-md-6" v-if="formVoucher.discountType === 'PhanTram'">
                <label class="form-label small fw-semibold">Giảm Tối Đa (VNĐ)</label>
                <div class="input-group">
                  <input 
                    type="number" 
                    class="form-control" 
                    v-model.number="formVoucher.maxDiscount" 
                    placeholder="VD: 500000"
                    min="0"
                  >
                  <span class="input-group-text bg-light">VNĐ</span>
                </div>
                <small class="text-muted font-11">Mức trần giảm giá tối đa cho mỗi đơn hàng (0 hoặc để trống nếu không giới hạn).</small>
              </div>

              <!-- Giá trị giảm theo Tiền Mặt Cố Định -->
              <div class="col-md-6" v-if="formVoucher.discountType === 'TienMat'">
                <label class="form-label small fw-semibold">Số Tiền Giảm Trực Tiếp (VNĐ) <span class="text-danger">*</span></label>
                <div class="input-group">
                  <input 
                    type="number" 
                    class="form-control" 
                    v-model.number="formVoucher.discountValue" 
                    placeholder="VD: 50000, 200000"
                    min="1000"
                  >
                  <span class="input-group-text bg-light">VNĐ</span>
                </div>
              </div>

              <!-- Đơn tối thiểu -->
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Giá Trị Đơn Tối Thiểu (VNĐ)</label>
                <div class="input-group">
                  <input 
                    type="number" 
                    class="form-control" 
                    v-model.number="formVoucher.minOrder" 
                    placeholder="VD: 500000"
                    min="0"
                  >
                  <span class="input-group-text bg-light">VNĐ</span>
                </div>
              </div>

              <!-- Số lượng phát hành -->
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Số Lượng Phát Hành</label>
                <input 
                  type="number" 
                  class="form-control" 
                  v-model.number="formVoucher.quantity" 
                  placeholder="VD: 100, 500"
                  min="1"
                >
              </div>

              <!-- Đối tác liên kết (Mặc định ADMIN sàn) -->
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Đối Tác Khai Thác</label>
                <input 
                  type="text" 
                  class="form-control" 
                  v-model="formVoucher.partner" 
                  placeholder="ADMIN (Toàn sàn)"
                >
              </div>

              <!-- Ngày bắt đầu -->
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Ngày Bắt Đầu Áp Dụng</label>
                <input type="date" class="form-control" v-model="formVoucher.startDate">
              </div>

              <!-- Ngày kết thúc -->
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Hạn Sử Dụng Đến Ngày</label>
                <input type="date" class="form-control" v-model="formVoucher.endDate">
              </div>

              <!-- Trạng thái -->
              <div class="col-12" v-if="isEdit">
                <label class="form-label small fw-semibold">Trạng Thái Voucher</label>
                <select class="form-select" v-model="formVoucher.status">
                  <option value="active">Đang áp dụng (Kích hoạt)</option>
                  <option value="expired">Tạm dừng (Vô hiệu hóa)</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-light px-4" @click="showModal = false">Hủy</button>
            <button type="button" class="btn btn-primary-custom px-4" @click="saveVoucher">
              {{ isEdit ? 'Cập Nhật Voucher' : 'Phát Hành Voucher' }}
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
  name: "AdminVoucher",
  data() {
    return {
      key_search: "",
      searchQuery: "",
      filterType: "",
      filterStatus: "",
      currentPage: 1,
      pageSize: 10,
      showModal: false,
      isEdit: false,
      list_voucher: [],
      add_voucher: {
        id: null,
        code: "",
        title: "",
        partner: "ADMIN",
        discountType: "PhanTram",
        discountValue: 10,
        maxDiscount: 500000,
        minOrder: 1000000,
        quantity: 100,
        startDate: "",
        endDate: "",
        status: "active"
      },
      edit_voucher: {},
      delete_voucher: {},
      formVoucher: {
        id: null,
        code: "",
        title: "",
        partner: "ADMIN",
        discountType: "PhanTram", // 'PhanTram' hoặc 'TienMat'
        discountValue: 10,
        maxDiscount: 500000,
        minOrder: 1000000,
        quantity: 100,
        startDate: "",
        endDate: "",
        status: "active"
      },
      vouchers: []
    };
  },
  computed: {
    totalVouchers() {
      return this.vouchers.length;
    },
    activeVouchers() {
      return this.vouchers.filter(v => v.status === 'active').length;
    },
    countPercentVouchers() {
      return this.vouchers.filter(v => v.discountType === 'PhanTram').length;
    },
    countMoneyVouchers() {
      return this.vouchers.filter(v => v.discountType === 'TienMat').length;
    },
    filteredVouchers() {
      return this.vouchers.filter(v => {
        const query = (this.key_search || this.searchQuery || '').toLowerCase().trim();
        const matchSearch =
          !query ||
          (v.code || '').toLowerCase().includes(query) ||
          (v.title || '').toLowerCase().includes(query);

        const matchType = !this.filterType || v.discountType === this.filterType;
        const matchStatus = !this.filterStatus || v.status === this.filterStatus;

        return matchSearch && matchType && matchStatus;
      });
    },
    totalPages() {
      return Math.ceil(this.filteredVouchers.length / this.pageSize) || 1;
    },
    paginatedVouchers() {
      const start = (this.currentPage - 1) * this.pageSize;
      return this.filteredVouchers.slice(start, start + this.pageSize);
    }
  },
  watch: {
    key_search() {
      this.currentPage = 1;
    },
    searchQuery() {
      this.currentPage = 1;
    },
    filterType() {
      this.currentPage = 1;
    },
    filterStatus() {
      this.currentPage = 1;
    }
  },
  mounted() {
    this.loadData();
  },
  methods: {
    formatMoney(val) {
      return Number(val || 0).toLocaleString("vi-VN");
    },
    loadData() {
      api.get('/api/admin/voucher/get-data')
        .then(res => {
          if (res.data.status) {
            const list = res.data.data || [];
            this.list_voucher = list;
            this.vouchers = list.map(item => {
              const isPercent = item.loai_giam_gia === 'PhanTram' || item.loai_giam_gia === 'percent';
              return {
                id: item.id,
                code: item.ma_voucher,
                partner: item.ma_doi_tac,
                title: item.ten_voucher,
                discountType: isPercent ? 'PhanTram' : 'TienMat',
                discountValue: parseFloat(item.gia_tri_giam) || 0,
                maxDiscount: parseFloat(item.giam_toi_da) || 0,
                minOrder: parseFloat(item.don_toi_thieu) || 0,
                quantity: item.so_luong || 0,
                used: item.da_su_dung || 0,
                startDate: item.ngay_bat_dau ? item.ngay_bat_dau.slice(0, 10) : '',
                endDate: item.ngay_ket_thuc ? item.ngay_ket_thuc.slice(0, 10) : '',
                status: item.trang_thai == 1 ? 'active' : 'expired'
              };
            });
          }
        })
        .catch(err => {
          console.error('Lỗi khi tải danh sách voucher:', err);
          this.$toast.error('Có lỗi khi tải danh sách voucher!');
        });
    },
    openModalAdd() {
      this.isEdit = false;
      const today = new Date().toISOString().slice(0, 10);
      const nextMonth = new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toISOString().slice(0, 10);

      this.add_voucher = {
        id: null,
        code: "TOUR" + Math.floor(1000 + Math.random() * 9000),
        title: "",
        partner: "ADMIN",
        discountType: "PhanTram",
        discountValue: 10,
        maxDiscount: 500000,
        minOrder: 1000000,
        quantity: 100,
        startDate: today,
        endDate: nextMonth,
        status: "active"
      };
      this.formVoucher = { ...this.add_voucher };
      this.showModal = true;
    },
    editVoucher(v) {
      this.isEdit = true;
      this.edit_voucher = { ...v };
      this.formVoucher = { ...v };
      this.showModal = true;
    },
    saveVoucher() {
      if (!this.formVoucher.code || !this.formVoucher.code.trim()) {
        this.$toast.warning("Vui lòng nhập mã code voucher!");
        return;
      }
      if (!this.formVoucher.title || !this.formVoucher.title.trim()) {
        this.$toast.warning("Vui lòng nhập tên chương trình khuyến mãi!");
        return;
      }
      if (!this.formVoucher.discountValue || this.formVoucher.discountValue <= 0) {
        this.$toast.warning("Giá trị giảm giá phải lớn hơn 0!");
        return;
      }
      if (this.formVoucher.discountType === 'PhanTram' && this.formVoucher.discountValue > 100) {
        this.$toast.warning("Giảm giá theo phần trăm không được vượt quá 100%!");
        return;
      }

      const payload = {
        id: this.formVoucher.id,
        ma_voucher: this.formVoucher.code.trim().toUpperCase(),
        ma_doi_tac: this.formVoucher.partner || 'ADMIN',
        ten_voucher: this.formVoucher.title.trim(),
        loai_giam_gia: this.formVoucher.discountType, // 'PhanTram' hoặc 'TienMat'
        gia_tri_giam: this.formVoucher.discountValue,
        giam_toi_da: this.formVoucher.discountType === 'PhanTram' ? (this.formVoucher.maxDiscount || null) : this.formVoucher.discountValue,
        don_toi_thieu: this.formVoucher.minOrder || 0,
        so_luong: this.formVoucher.quantity || 0,
        ngay_bat_dau: this.formVoucher.startDate || null,
        ngay_ket_thuc: this.formVoucher.endDate || null,
        trang_thai: this.formVoucher.status === 'active' ? 1 : 0
      };

      if (this.isEdit) {
        api.post('/api/admin/voucher/update', payload)
          .then(res => {
            if (res.data.status) {
              this.$toast.success(res.data.message || 'Cập nhật voucher thành công!');
              this.showModal = false;
              this.loadData();
            } else {
              this.$toast.error(res.data.message || 'Cập nhật voucher thất bại!');
            }
          })
          .catch(err => {
            const msg = (err.response && err.response.data && err.response.data.message) ? err.response.data.message : 'Có lỗi xảy ra!';
            this.$toast.error(msg);
          });
      } else {
        api.post('/api/admin/voucher/store', payload)
          .then(res => {
            if (res.data.status) {
              this.$toast.success(res.data.message || 'Phát hành voucher thành công!');
              this.showModal = false;
              this.loadData();
            } else {
              this.$toast.error(res.data.message || 'Tạo voucher thất bại!');
            }
          })
          .catch(err => {
            const msg = (err.response && err.response.data && err.response.data.message) ? err.response.data.message : 'Có lỗi xảy ra!';
            this.$toast.error(msg);
          });
      }
    },
    toggleStatus(v) {
      api.post('/api/admin/voucher/change-status', { id: v.id, ma_voucher: v.code })
        .then(res => {
          if (res.data.status) {
            this.$toast.success(res.data.message || 'Đổi trạng thái voucher thành công!');
            this.loadData();
          } else {
            this.$toast.error(res.data.message || 'Đổi trạng thái thất bại!');
          }
        })
        .catch(err => {
          const msg = (err.response && err.response.data && err.response.data.message) ? err.response.data.message : 'Có lỗi xảy ra!';
          this.$toast.error(msg);
        });
    },
    deleteVoucher(v) {
      this.delete_voucher = { ...v };
      if (confirm(`Bạn có chắc muốn xóa voucher ${v.code}?`)) {
        api.post('/api/admin/voucher/delete', { id: v.id, ma_voucher: v.code })
          .then(res => {
            if (res.data.status) {
              this.$toast.success(res.data.message || 'Xóa voucher thành công!');
              this.loadData();
            } else {
              this.$toast.error(res.data.message || 'Xóa voucher thất bại!');
            }
          })
          .catch(err => {
            const msg = (err.response && err.response.data && err.response.data.message) ? err.response.data.message : 'Có lỗi xảy ra!';
            this.$toast.error(msg);
          });
      }
    }
  }
};
</script>

<style scoped>
.admin-page-container {
  padding: 0.5rem;
}

.breadcrumb-admin {
  font-size: 0.85rem;
}

.sync-badge {
  display: flex;
  align-items: center;
  gap: 0.4rem;
  background-color: #ecfdf5;
  color: #059669;
  border-radius: 9999px;
  padding: 0.25rem 0.75rem;
  font-size: 0.75rem;
  font-weight: 500;
}

.pulse-dot {
  width: 7px;
  height: 7px;
  background-color: #10b981;
  border-radius: 50%;
  display: inline-block;
  box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
}

.page-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: #1e293b;
}

.table-badge {
  background-color: #f1f5f9;
  color: #64748b;
  font-size: 0.75rem;
  font-weight: 600;
  padding: 0.2rem 0.5rem;
  border-radius: 6px;
  font-family: monospace;
}

.btn-primary-custom {
  background-color: #0284c7;
  color: #ffffff;
  border: none;
  font-weight: 600;
  padding: 0.5rem 1.25rem;
  border-radius: 8px;
  transition: all 0.2s;
}

.btn-primary-custom:hover {
  background-color: #0369a1;
  color: #ffffff;
}

.kpi-card {
  background: #ffffff;
  border-radius: 12px;
  padding: 1.25rem;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  height: 100%;
}

.kpi-label {
  font-size: 0.75rem;
  font-weight: 700;
  color: #64748b;
  letter-spacing: 0.5px;
}

.kpi-value {
  font-size: 1.75rem;
  font-weight: 700;
  color: #0f172a;
  margin: 0.25rem 0;
}

.kpi-subtext {
  font-size: 0.75rem;
  color: #94a3b8;
}

.kpi-icon {
  width: 44px;
  height: 44px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.4rem;
}

.icon-blue { background-color: #e0f2fe; color: #0284c7; }
.icon-green { background-color: #dcfce7; color: #16a34a; }
.icon-orange { background-color: #ffedd5; color: #ea580c; }

.search-input-wrap {
  position: relative;
}

.search-icon {
  position: absolute;
  left: 0.75rem;
  top: 50%;
  transform: translateY(-50%);
  color: #94a3b8;
}

.search-input {
  padding-left: 2.25rem;
  border-radius: 8px;
  border: 1px solid #e2e8f0;
}

.filter-select {
  border-radius: 8px;
  border: 1px solid #e2e8f0;
}

.table-card {
  border-radius: 12px;
  overflow: hidden;
}

.voucher-code-badge {
  background-color: #f8fafc;
  border: 1px dashed #cbd5e1;
  color: #0f172a;
  font-family: monospace;
  font-weight: 700;
  padding: 0.35rem 0.65rem;
  border-radius: 6px;
  display: inline-block;
  letter-spacing: 1px;
}

.status-pill {
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  font-size: 0.75rem;
  font-weight: 600;
  padding: 0.25rem 0.65rem;
  border-radius: 9999px;
}

.status-active { background-color: #dcfce7; color: #15803d; }
.status-locked { background-color: #f1f5f9; color: #64748b; }

.status-pill .dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
}

.status-active .dot { background-color: #22c55e; }
.status-locked .dot { background-color: #94a3b8; }

.action-btn-group {
  display: flex;
  justify-content: flex-end;
  gap: 0.35rem;
}

.action-btn {
  background: transparent;
  border: 1px solid #e2e8f0;
  border-radius: 6px;
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #64748b;
  transition: all 0.15s;
}

.action-btn:hover {
  background-color: #f8fafc;
  color: #0f172a;
}

.cursor-pointer {
  cursor: pointer;
}

.discount-type-card {
  transition: all 0.2s ease-in-out;
}

.discount-type-card:hover {
  border-color: #94a3b8 !important;
}

.active-type {
  box-shadow: 0 0 0 1px currentColor;
}
</style>
