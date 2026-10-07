<template>
  <div class="admin-page-container">
    <!-- Top Breadcrumb & Live Status -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="breadcrumb-nav">
        <span class="text-muted">Trang chủ</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-muted">Quản lý Dịch vụ</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-primary fw-semibold">Quản lý Tour</span>
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
          <h3 class="page-title mb-0">Quản lý Tour</h3>
          <span class="table-badge">Table: tours</span>
        </div>
        <p class="text-muted small mb-0 mt-1">Giám sát, phân loại và quản lý toàn bộ tour du lịch niêm yết trên nền tảng.</p>
      </div>
      <button class="btn btn-primary-custom d-flex align-items-center gap-2" @click="openModalAdd">
        <i class="bx bx-plus-circle font-20"></i>
        <span>+ Thêm Tour Mới</span>
      </button>
    </div>

    <!-- 4 KPI Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">TỔNG SỐ TOUR</span>
            <div class="kpi-value">86</div>
            <span class="kpi-subtext">Đồng bộ từ bảng tours</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-map-alt"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">ĐANG MỞ BÁN</span>
            <div class="kpi-value text-success">72</div>
            <span class="kpi-subtext">Trạng thái is_active: true</span>
          </div>
          <div class="kpi-icon icon-green">
            <i class="bx bx-check-circle"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">CHỜ KIỂM DUYỆT</span>
            <div class="kpi-value text-warning">09</div>
            <span class="kpi-subtext">Cần phê duyệt từ đối tác</span>
          </div>
          <div class="kpi-icon icon-orange">
            <i class="bx bx-time-five"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">ĐÃ TẠM KHÓA</span>
            <div class="kpi-value text-danger">05</div>
            <span class="kpi-subtext">Khóa do vi phạm / hết mùa</span>
          </div>
          <div class="kpi-icon icon-red">
            <i class="bx bx-lock-alt"></i>
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
                placeholder="Tìm kiếm theo mã tour, tên hành trình hoặc đối tác..."
                v-model="searchQuery"
              >
            </div>
          </div>
          <div class="col-6 col-md-3">
            <select class="form-select filter-select" v-model="filterCategory">
              <option value="">Tất cả loại hình</option>
              <option value="Biển đảo">Biển đảo</option>
              <option value="Di sản & Văn hóa">Di sản & Văn hóa</option>
              <option value="Nghỉ dưỡng & Sinh thái">Nghỉ dưỡng & Sinh thái</option>
            </select>
          </div>
          <div class="col-6 col-md-2">
            <select class="form-select filter-select" v-model="filterStatus">
              <option value="">Tất cả trạng thái</option>
              <option value="active">Đang mở bán</option>
              <option value="pending">Chờ kiểm duyệt</option>
              <option value="blocked">Đã tạm khóa</option>
            </select>
          </div>
          <div class="col-12 col-md-2 text-md-end text-muted small">
            Hiển thị <strong class="text-dark">{{ filteredTours.length }}</strong> tour
          </div>
        </div>
      </div>
    </div>

    <!-- Main Data Table -->
    <div class="card table-card border-0 shadow-sm mb-4">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr>
              <th scope="col" class="ps-4">MÃ TOUR</th>
              <th scope="col">TÊN TOUR & LỘ TRÌNH</th>
              <th scope="col">ĐỐI TÁC CUNG CẤP</th>
              <th scope="col">THỜI LƯỢNG</th>
              <th scope="col">GIÁ NIÊM YẾT</th>
              <th scope="col">TRẠNG THÁI</th>
              <th scope="col">NGÀY ĐĂNG</th>
              <th scope="col" class="text-end pe-4">THAO TÁC</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="t in filteredTours" :key="t.id">
              <td class="ps-4">
                <span class="admin-code">{{ t.code }}</span>
              </td>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <img :src="t.image" class="rounded object-fit-cover shadow-xs" width="54" height="42" alt="tour">
                  <div>
                    <div class="fw-bold text-dark">{{ t.title }}</div>
                    <small class="text-muted"><i class="bx bx-category me-1"></i>{{ t.category }}</small>
                  </div>
                </div>
              </td>
              <td>
                <div class="partner-badge">
                  <i class="bx bx-buildings text-primary me-1"></i>
                  <span>{{ t.partner }}</span>
                </div>
              </td>
              <td>
                <span class="badge bg-light text-dark border">{{ t.duration }}</span>
              </td>
              <td>
                <span class="fw-bold text-primary">{{ formatPrice(t.price) }}đ</span>
              </td>
              <td>
                <span v-if="t.status === 'active'" class="status-pill status-active">
                  <span class="dot"></span> Hoạt động
                </span>
                <span v-else-if="t.status === 'pending'" class="status-pill status-pending">
                  <span class="dot"></span> Chờ duyệt
                </span>
                <span v-else class="status-pill status-locked">
                  <span class="dot"></span> Đã khóa
                </span>
              </td>
              <td class="text-muted small">
                {{ t.createdAt }}
              </td>
              <td class="text-end pe-4">
                <div class="action-btn-group">
                  <button class="action-btn" title="Xem chi tiết" @click="viewDetail(t)">
                    <i class="bx bx-show"></i>
                  </button>
                  <button class="action-btn" title="Chỉnh sửa" @click="editTour(t)">
                    <i class="bx bx-pencil"></i>
                  </button>
                  <button class="action-btn" :title="t.status === 'blocked' ? 'Mở bán lại' : 'Tạm dừng tour'" @click="toggleLock(t)">
                    <i :class="t.status === 'blocked' ? 'bx bx-lock-open-alt' : 'bx bx-lock-alt'"></i>
                  </button>
                  <button class="action-btn text-danger" title="Xóa" @click="deleteTour(t)">
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

    <!-- Modal Form -->
    <div class="modal fade show d-block" tabindex="-1" v-if="showModal" style="background: rgba(0,0,0,0.45);">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-4">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title fw-bold text-dark">{{ isEdit ? 'Chỉnh Sửa Tour' : 'Thêm Mới Tour Hệ Thống' }}</h5>
            <button type="button" class="btn-close" @click="showModal = false"></button>
          </div>
          <div class="modal-body pt-3">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Mã Tour</label>
                <input type="text" class="form-control" v-model="formTour.code" placeholder="VD: TO004" :disabled="isEdit">
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Đối Tác Đăng Ký</label>
                <input type="text" class="form-control" v-model="formTour.partner" placeholder="Tên đơn vị lữ hành">
              </div>
              <div class="col-md-12">
                <label class="form-label small fw-semibold">Tên Tour Du Lịch</label>
                <input type="text" class="form-control" v-model="formTour.title" placeholder="Nhập tên tour chi tiết">
              </div>
              <div class="col-md-4">
                <label class="form-label small fw-semibold">Loại hình</label>
                <select class="form-select" v-model="formTour.category">
                  <option value="Biển đảo">Biển đảo</option>
                  <option value="Di sản & Văn hóa">Di sản & Văn hóa</option>
                  <option value="Nghỉ dưỡng & Sinh thái">Nghỉ dưỡng & Sinh thái</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label small fw-semibold">Thời lượng</label>
                <input type="text" class="form-control" v-model="formTour.duration" placeholder="VD: 1 ngày, 3N2Đ">
              </div>
              <div class="col-md-4">
                <label class="form-label small fw-semibold">Giá niêm yết (VNĐ)</label>
                <input type="number" class="form-control" v-model="formTour.price" placeholder="750000">
              </div>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-light px-4" @click="showModal = false">Hủy</button>
            <button type="button" class="btn btn-primary-custom px-4" @click="saveTour">Lưu thông tin</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AdminTour",
  data() {
    return {
      searchQuery: "",
      filterCategory: "",
      filterStatus: "",
      showModal: false,
      isEdit: false,
      formTour: {
        code: "",
        title: "",
        category: "Biển đảo",
        partner: "",
        duration: "1 ngày",
        price: 850000,
        status: "active"
      },
      tours: [
        {
          id: 1,
          code: "TO001",
          title: "Khám Phá Bán Đảo Sơn Trà & Lặn Ngắm San Hô",
          image: "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=150&q=80",
          category: "Biển đảo",
          partner: "Da Nang Sea Travel Ltd.",
          duration: "1 ngày",
          price: 750000,
          status: "active",
          createdAt: "2025-01-10"
        },
        {
          id: 2,
          code: "TO002",
          title: "Bà Nà Hills - Cầu Vàng & Fantasy Park Trọn Gói",
          image: "https://images.unsplash.com/photo-1596422846543-75c6fc197f07?auto=format&fit=crop&w=150&q=80",
          category: "Nghỉ dưỡng & Sinh thái",
          partner: "Sun World Travel Partner",
          duration: "1 ngày",
          price: 1250000,
          status: "active",
          createdAt: "2025-01-14"
        },
        {
          id: 3,
          code: "TO003",
          title: "Hành Trình Phố Cổ Hội An & Rừng Dừa Bảy Mẫu",
          image: "https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?auto=format&fit=crop&w=150&q=80",
          category: "Di sản & Văn hóa",
          partner: "Heritage Heritage Express",
          duration: "2 ngày 1 đêm",
          price: 1650000,
          status: "pending",
          createdAt: "2025-02-01"
        },
        {
          id: 4,
          code: "TO004",
          title: "Tour Chèo SUP Ngắm Hoàng Hôn Sông Hàn & Cầu Rồng",
          image: "https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=150&q=80",
          category: "Biển đảo",
          partner: "Han River Adventure",
          duration: "4 giờ",
          price: 450000,
          status: "blocked",
          createdAt: "2025-02-05"
        }
      ]
    };
  },
  computed: {
    filteredTours() {
      return this.tours.filter(t => {
        const matchSearch =
          t.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          t.code.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          t.partner.toLowerCase().includes(this.searchQuery.toLowerCase());
        const matchCat = this.filterCategory ? t.category === this.filterCategory : true;
        const matchStatus = this.filterStatus ? t.status === this.filterStatus : true;
        return matchSearch && matchCat && matchStatus;
      });
    }
  },
  methods: {
    formatPrice(val) {
      return Number(val).toLocaleString("vi-VN");
    },
    openModalAdd() {
      this.isEdit = false;
      this.formTour = {
        code: `TO00${this.tours.length + 1}`,
        title: "",
        category: "Biển đảo",
        partner: "",
        duration: "1 ngày",
        price: 800000,
        status: "active"
      };
      this.showModal = true;
    },
    editTour(t) {
      this.isEdit = true;
      this.formTour = { ...t };
      this.showModal = true;
    },
    saveTour() {
      if (!this.formTour.title || !this.formTour.partner) {
        alert("Vui lòng nhập tên tour và đơn vị đối tác!");
        return;
      }
      if (this.isEdit) {
        const idx = this.tours.findIndex(i => i.id === this.formTour.id);
        if (idx !== -1) this.tours[idx] = { ...this.formTour };
      } else {
        this.tours.push({
          ...this.formTour,
          id: Date.now(),
          image: "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=150&q=80",
          createdAt: new Date().toISOString().slice(0, 10)
        });
      }
      this.showModal = false;
    },
    toggleLock(t) {
      t.status = t.status === "blocked" ? "active" : "blocked";
    },
    deleteTour(t) {
      if (confirm(`Bạn có chắc muốn xóa tour: ${t.title}?`)) {
        this.tours = this.tours.filter(i => i.id !== t.id);
      }
    },
    viewDetail(t) {
      alert(`Xem chi tiết Tour:\n- Mã: ${t.code}\n- Tên: ${t.title}\n- Đơn vị: ${t.partner}\n- Giá: ${this.formatPrice(t.price)}đ`);
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

.partner-badge {
  font-size: 0.85rem;
  font-weight: 600;
  color: #334155;
  display: flex;
  align-items: center;
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
