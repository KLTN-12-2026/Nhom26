<template>
  <div class="admin-page-container">
    <!-- Top Breadcrumb & Live Status -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="breadcrumb-nav">
        <span class="text-muted">Trang chủ</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-muted">Hỗ Trợ Kỹ Thuật</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-primary fw-semibold">Quản lý Báo cáo lỗi</span>
      </div>
      <div class="sync-badge">
        <span class="pulse-dot"></span>
        <span class="sync-text">Cơ sở dữ liệu: Hoạt động đồng bộ</span>
      </div>
    </div>

    <!-- Title & Action Bar -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <div class="d-flex align-items-center gap-2">
          <h3 class="page-title mb-0">Quản lý Báo cáo lỗi</h3>
          <span class="table-badge">Table: bao_cao_lois</span>
        </div>
        <p class="text-muted small mb-0 mt-1">Tiếp nhận sự cố kỹ thuật từ du khách và đối tác, điều phối đội ngũ dev khắc phục và phản hồi kịp thời.</p>
      </div>
      <button class="btn btn-primary-custom d-flex align-items-center gap-2" @click="openModalAdd">
        <i class="bx bx-plus-circle font-20"></i>
        <span>+ Tạo Ticket Kỹ Thuật</span>
      </button>
    </div>

    <!-- 4 KPI Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">TỔNG SỐ TICKET</span>
            <div class="kpi-value">38</div>
            <span class="kpi-subtext">Đồng bộ từ bao_cao_lois</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-support"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">CHƯA XỬ LÝ</span>
            <div class="kpi-value text-danger">05</div>
            <span class="kpi-subtext">Cần phản hồi trong 24 giờ</span>
          </div>
          <div class="kpi-icon icon-red">
            <i class="bx bx-alarm-exclamation"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">ĐANG KHẮC PHỤC</span>
            <div class="kpi-value text-warning">08</div>
            <span class="kpi-subtext">Đang phân công kỹ thuật viên</span>
          </div>
          <div class="kpi-icon icon-orange">
            <i class="bx bx-wrench"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">ĐÃ GIẢI QUYẾT</span>
            <div class="kpi-value text-success">25</div>
            <span class="kpi-subtext">Tỷ lệ hài lòng 96.5%</span>
          </div>
          <div class="kpi-icon icon-green">
            <i class="bx bx-check-shield"></i>
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
                placeholder="Tìm theo mã ticket, tên người báo, tiêu đề lỗi..."
                v-model="searchQuery"
              >
            </div>
          </div>
          <div class="col-6 col-md-3">
            <select class="form-select filter-select" v-model="filterCategory">
              <option value="">Tất cả phân loại</option>
              <option value="Thanh toán">Lỗi thanh toán & Hoàn tiền</option>
              <option value="AI Planner">Lỗi AI gợi ý lịch trình</option>
              <option value="Đặt Tour">Lỗi đặt chỗ & Xác nhận</option>
              <option value="Giao diện">Lỗi hiển thị & Ứng dụng</option>
            </select>
          </div>
          <div class="col-6 col-md-2">
            <select class="form-select filter-select" v-model="filterStatus">
              <option value="">Tất cả trạng thái</option>
              <option value="pending">Chờ xử lý</option>
              <option value="processing">Đang sửa</option>
              <option value="resolved">Đã giải quyết</option>
            </select>
          </div>
          <div class="col-12 col-md-2 text-md-end text-muted small">
            Hiển thị <strong class="text-dark">{{ filteredReports.length }}</strong> báo cáo
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
              <th scope="col" class="ps-4">MÃ TICKET</th>
              <th scope="col">NGƯỜI BÁO CÁO</th>
              <th scope="col">PHÂN LOẠI LỖI</th>
              <th scope="col" style="width: 32%;">MÔ TẢ CHI TIẾT SỰ CỐ</th>
              <th scope="col">MỨC ĐỘ</th>
              <th scope="col">TRẠNG THÁI</th>
              <th scope="col">NGÀY GỬI</th>
              <th scope="col" class="text-end pe-4">THAO TÁC</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="r in filteredReports" :key="r.id">
              <td class="ps-4">
                <span class="admin-code">{{ r.code }}</span>
              </td>
              <td>
                <div class="fw-bold text-dark">{{ r.sender }}</div>
                <small class="text-muted">{{ r.email }}</small>
              </td>
              <td>
                <span class="badge bg-light text-dark border">{{ r.category }}</span>
              </td>
              <td>
                <div class="fw-semibold text-dark text-truncate" style="max-width: 340px;">{{ r.title }}</div>
                <small class="text-muted text-truncate d-block" style="max-width: 340px;">{{ r.description }}</small>
              </td>
              <td>
                <span v-if="r.priority === 'Khẩn cấp'" class="badge bg-danger text-white">Khẩn cấp</span>
                <span v-else-if="r.priority === 'Cao'" class="badge bg-warning text-dark">Ưu tiên cao</span>
                <span v-else class="badge bg-secondary text-white">Bình thường</span>
              </td>
              <td>
                <span v-if="r.status === 'pending'" class="status-pill status-locked">
                  <span class="dot"></span> Chờ xử lý
                </span>
                <span v-else-if="r.status === 'processing'" class="status-pill status-pending">
                  <span class="dot"></span> Đang sửa
                </span>
                <span v-else class="status-pill status-active">
                  <span class="dot"></span> Đã xong
                </span>
              </td>
              <td class="text-muted small">
                {{ r.createdAt }}
              </td>
              <td class="text-end pe-4">
                <div class="action-btn-group">
                  <button class="action-btn" title="Xem chi tiết ticket" @click="viewDetail(r)">
                    <i class="bx bx-show"></i>
                  </button>
                  <button 
                    class="action-btn" 
                    :class="r.status === 'resolved' ? 'text-muted' : 'text-success'"
                    :title="r.status === 'resolved' ? 'Đã đóng' : 'Đánh dấu đã giải quyết'" 
                    @click="markResolved(r)"
                  >
                    <i class="bx bx-check"></i>
                  </button>
                  <button class="action-btn text-danger" title="Xóa ticket" @click="deleteReport(r)">
                    <i class="bx bx-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="d-flex justify-content-between align-items-center p-3 border-top">
        <span class="text-muted small">Trang 1 trên 1 (Dữ liệu mẫu chuẩn)</span>
        <div class="d-flex gap-1">
          <button class="btn btn-sm btn-outline-secondary px-3" disabled>Trước</button>
          <button class="btn btn-sm btn-primary-custom px-3">1</button>
          <button class="btn btn-sm btn-outline-secondary px-3" disabled>Sau</button>
        </div>
      </div>
    </div>

    <!-- Ticket Detail Modal -->
    <div class="modal fade show d-block" tabindex="-1" v-if="selectedTicket" style="background: rgba(0,0,0,0.45);">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-4">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title fw-bold text-dark">Ticket Kỹ Thuật #{{ selectedTicket.code }}</h5>
            <button type="button" class="btn-close" @click="selectedTicket = null"></button>
          </div>
          <div class="modal-body pt-3">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="small text-muted fw-semibold">Người báo:</label>
                <div class="fw-bold">{{ selectedTicket.sender }} ({{ selectedTicket.email }})</div>
              </div>
              <div class="col-md-6">
                <label class="small text-muted fw-semibold">Phân loại & Mức độ:</label>
                <div>
                  <span class="badge bg-light text-dark border me-2">{{ selectedTicket.category }}</span>
                  <span class="badge bg-warning text-dark">{{ selectedTicket.priority }}</span>
                </div>
              </div>
              <div class="col-12">
                <label class="small text-muted fw-semibold">Tiêu đề lỗi:</label>
                <div class="fw-bold text-danger">{{ selectedTicket.title }}</div>
              </div>
              <div class="col-12">
                <label class="small text-muted fw-semibold">Mô tả hành vi lỗi:</label>
                <div class="p-3 bg-light rounded-3 text-secondary">{{ selectedTicket.description }}</div>
              </div>
              <div class="col-12">
                <label class="small text-muted fw-semibold">Ghi chú phản hồi khách hàng:</label>
                <textarea class="form-control" rows="2" placeholder="Nhập nội dung gửi phản hồi lại cho khách qua email..."></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-light px-4" @click="selectedTicket = null">Đóng</button>
            <button 
              type="button" 
              class="btn btn-success px-4"
              @click="markResolved(selectedTicket); selectedTicket = null"
            >
              Cập Nhật & Hoàn Tất Sửa Lỗi
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AdminBaoCaoLoi",
  data() {
    return {
      searchQuery: "",
      filterCategory: "",
      filterStatus: "",
      selectedTicket: null,
      reports: [
        {
          id: 1,
          code: "TCK001",
          sender: "Võ Thị Quỳnh Như",
          email: "quynhnhu.vo@gmail.com",
          category: "Thanh toán",
          title: "Báo lỗi trừ tiền ngân hàng nhưng chưa nhận được mã vé tour Bà Nà",
          description: "Tôi quét mã QR VietQR trừ 1.250.000đ từ Techcombank lúc 14:15 hôm nay nhưng hệ thống vẫn báo đơn hàng đang chờ thanh toán.",
          priority: "Khẩn cấp",
          status: "pending",
          createdAt: "2025-02-28"
        },
        {
          id: 2,
          code: "TCK002",
          sender: "Trần Thế Vinh",
          email: "vinh.thetran@yahoo.com",
          category: "AI Planner",
          title: "AI gợi ý lộ trình lặp lại điểm đến cùng một buổi sáng",
          description: "Lên kế hoạch 3 ngày 2 đêm, AI xếp Cầu Vàng vào cả sáng ngày 1 và sáng ngày 2.",
          priority: "Cao",
          status: "processing",
          createdAt: "2025-02-26"
        },
        {
          id: 3,
          code: "TCK003",
          sender: "Đối tác Da Nang Sea Travel",
          email: "support@danangseatravel.vn",
          category: "Đặt Tour",
          title: "Không cập nhật được số chỗ trống còn lại trên tour Cù Lao Chàm",
          description: "Khi đổi số lượng khách từ 20 thành 15 hệ thống báo lỗi 500 Network Error.",
          priority: "Cao",
          status: "processing",
          createdAt: "2025-02-25"
        },
        {
          id: 4,
          code: "TCK004",
          sender: "Nguyễn Thanh Bình",
          email: "binh.nguyen@gmail.com",
          category: "Giao diện",
          title: "Vỡ giao diện nút Đặt Tour trên điện thoại màn hình nhỏ iPhone SE",
          description: "Nút bấm bị che khuất bởi thanh menu dưới cùng.",
          priority: "Bình thường",
          status: "resolved",
          createdAt: "2025-02-20"
        }
      ]
    };
  },
  computed: {
    filteredReports() {
      return this.reports.filter(r => {
        const matchSearch =
          r.code.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          r.sender.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          r.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          r.description.toLowerCase().includes(this.searchQuery.toLowerCase());
        const matchCat = this.filterCategory ? r.category === this.filterCategory : true;
        const matchStatus = this.filterStatus ? r.status === this.filterStatus : true;
        return matchSearch && matchCat && matchStatus;
      });
    }
  },
  methods: {
    viewDetail(r) {
      this.selectedTicket = r;
    },
    markResolved(r) {
      r.status = "resolved";
    },
    deleteReport(r) {
      if (confirm(`Bạn có chắc muốn xóa ticket ${r.code}?`)) {
        this.reports = this.reports.filter(i => i.id !== r.id);
      }
    },
    openModalAdd() {
      alert("Mở biểu mẫu tạo ticket nội bộ...");
    }
  }
};
</script>

<style scoped>
.admin-page-container {
  padding: 0.5rem;
}

.breadcrumb-nav {
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
  color: #0f172a;
}

.table-badge {
  background-color: #f1f5f9;
  color: #64748b;
  font-size: 0.72rem;
  font-weight: 600;
  padding: 0.2rem 0.5rem;
  border-radius: 4px;
}

.btn-primary-custom {
  background-color: #0284c7;
  color: #ffffff;
  border: none;
  border-radius: 8px;
  padding: 0.55rem 1.25rem;
  font-size: 0.875rem;
  font-weight: 600;
  transition: all 0.2s;
}

.btn-primary-custom:hover {
  background-color: #0369a1;
  color: #ffffff;
}

.kpi-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1.25rem;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  transition: all 0.2s;
}

.kpi-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.kpi-label {
  font-size: 0.75rem;
  font-weight: 700;
  color: #64748b;
  letter-spacing: 0.5px;
}

.kpi-value {
  font-size: 1.75rem;
  font-weight: 800;
  color: #0f172a;
  margin: 0.35rem 0 0.2rem 0;
  line-height: 1.2;
}

.kpi-subtext {
  font-size: 0.75rem;
  color: #0284c7;
  font-weight: 500;
}

.kpi-icon {
  width: 44px;
  height: 44px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.35rem;
}

.icon-blue { background-color: #f0f9ff; color: #0284c7; }
.icon-green { background-color: #f0fdf4; color: #16a34a; }
.icon-orange { background-color: #fff7ed; color: #ea580c; }
.icon-red { background-color: #fef2f2; color: #dc2626; }

.search-input-wrap {
  position: relative;
}

.search-icon {
  position: absolute;
  left: 12px;
  top: 50%;
  transform: translateY(-50%);
  color: #94a3b8;
  font-size: 1.1rem;
}

.search-input {
  padding-left: 38px;
  border-radius: 8px;
  border: 1px solid #e2e8f0;
  font-size: 0.875rem;
}

.filter-select {
  border-radius: 8px;
  border: 1px solid #e2e8f0;
  font-size: 0.875rem;
}

.admin-code {
  font-family: monospace;
  font-weight: 700;
  color: #0284c7;
  font-size: 0.85rem;
}

.status-pill {
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  padding: 0.25rem 0.75rem;
  border-radius: 9999px;
  font-size: 0.75rem;
  font-weight: 600;
}

.status-active { background-color: #ecfdf5; color: #059669; }
.status-pending { background-color: #fffbeb; color: #d97706; }
.status-locked { background-color: #fef2f2; color: #dc2626; }

.status-pill .dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background-color: currentColor;
}

.action-btn-group {
  display: inline-flex;
  gap: 0.35rem;
}

.action-btn {
  width: 32px;
  height: 32px;
  border-radius: 6px;
  border: 1px solid #e2e8f0;
  background: #ffffff;
  color: #64748b;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.15s;
}

.action-btn:hover {
  background: #f8fafc;
  color: #0f172a;
  border-color: #cbd5e1;
}
</style>
