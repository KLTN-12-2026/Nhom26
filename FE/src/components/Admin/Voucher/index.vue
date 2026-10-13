<template>
  <div class="admin-page-container">
    <!-- Top Breadcrumb & Live Status -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="breadcrumb-nav">
        <span class="text-muted">Trang chủ</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-muted">Khuyến Mãi Toàn Sàn</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-primary fw-semibold">Quản lý Voucher Admin</span>
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
          <h3 class="page-title mb-0">Quản lý Voucher Admin</h3>
          <span class="table-badge">Table: vouchers</span>
        </div>
        <p class="text-muted small mb-0 mt-1">Phát hành và phân phối mã ưu đãi kích cầu du lịch tài trợ bởi nền tảng Đà Nẵng Smart Travel.</p>
      </div>
      <button class="btn btn-primary-custom d-flex align-items-center gap-2" @click="openModalAdd">
        <i class="bx bx-plus-circle font-20"></i>
        <span>+ Tạo Voucher Toàn Sàn</span>
      </button>
    </div>

    <!-- 4 KPI Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">TỔNG VOUCHER SÀN</span>
            <div class="kpi-value">24</div>
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
            <div class="kpi-value text-success">16</div>
            <span class="kpi-subtext">Còn hạn & còn số lượng</span>
          </div>
          <div class="kpi-icon icon-green">
            <i class="bx bx-check-circle"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">LƯỢT ĐÃ ĐỔI</span>
            <div class="kpi-value text-primary">1,280</div>
            <span class="kpi-subtext">Áp dụng thành công vào tour</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-purchase-tag"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">QUỸ TÀI TRỢ KHUYẾN MÃI</span>
            <div class="kpi-value text-danger">150<span style="font-size: 1.1rem; font-weight: 600;"> Tr</span></div>
            <span class="kpi-subtext">Ngân sách hỗ trợ kích cầu</span>
          </div>
          <div class="kpi-icon icon-red">
            <i class="bx bx-wallet-alt"></i>
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
                v-model="searchQuery"
              >
            </div>
          </div>
          <div class="col-6 col-md-3">
            <select class="form-select filter-select" v-model="filterType">
              <option value="">Tất cả hình thức giảm</option>
              <option value="percent">Giảm theo %</option>
              <option value="fixed">Giảm tiền mặt trực tiếp</option>
            </select>
          </div>
          <div class="col-6 col-md-2">
            <select class="form-select filter-select" v-model="filterStatus">
              <option value="">Tất cả trạng thái</option>
              <option value="active">Đang áp dụng</option>
              <option value="expired">Đã kết thúc</option>
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
              <th scope="col">MỨC ƯU ĐÃI</th>
              <th scope="col">ĐIỀU KIỆN ĐƠN TỐI THIỂU</th>
              <th scope="col" style="width: 180px;">TIẾN ĐỘ SỬ DỤNG</th>
              <th scope="col">HẠN SỬ DỤNG</th>
              <th scope="col">TRẠNG THÁI</th>
              <th scope="col" class="text-end pe-4">THAO TÁC</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="v in filteredVouchers" :key="v.id">
              <td class="ps-4">
                <span class="voucher-code-badge">{{ v.code }}</span>
              </td>
              <td>
                <div class="fw-bold text-dark">{{ v.title }}</div>
                <small class="text-muted"><i class="bx bx-calendar me-1"></i>Từ: {{ v.startDate }}</small>
              </td>
              <td>
                <span class="badge bg-warning text-dark fw-bold px-2 py-1">
                  {{ v.discountType === 'percent' ? `Giảm ${v.discountValue}%` : `Giảm ${formatMoney(v.discountValue)}đ` }}
                </span>
              </td>
              <td class="small fw-semibold text-secondary">
                Đơn từ {{ formatMoney(v.minOrder) }}đ
              </td>
              <td>
                <div class="d-flex justify-content-between small text-muted mb-1">
                  <span>{{ v.used }} / {{ v.quantity }}</span>
                  <span>{{ Math.round((v.used / v.quantity) * 100) }}%</span>
                </div>
                <div class="progress" style="height: 6px;">
                  <div 
                    class="progress-bar bg-primary" 
                    :style="{ width: ((v.used / v.quantity) * 100) + '%' }"
                  ></div>
                </div>
              </td>
              <td class="text-muted small">
                {{ v.endDate }}
              </td>
              <td>
                <span v-if="v.status === 'active'" class="status-pill status-active">
                  <span class="dot"></span> Đang chạy
                </span>
                <span v-else class="status-pill status-locked">
                  <span class="dot"></span> Hết hạn
                </span>
              </td>
              <td class="text-end pe-4">
                <div class="action-btn-group">
                  <button class="action-btn" title="Chỉnh sửa" @click="editVoucher(v)">
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
            <h5 class="modal-title fw-bold text-dark">{{ isEdit ? 'Cập Nhật Voucher' : 'Tạo Voucher Khuyến Mãi Sàn Mới' }}</h5>
            <button type="button" class="btn-close" @click="showModal = false"></button>
          </div>
          <div class="modal-body pt-3">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Mã Code Ưu Đãi</label>
                <input type="text" class="form-control font-monospace fw-bold text-uppercase" v-model="formVoucher.code" placeholder="VD: DANANG2025">
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Tên Chương Trình</label>
                <input type="text" class="form-control" v-model="formVoucher.title" placeholder="VD: Khám Phá Mùa Hè Rực Rỡ">
              </div>
              <div class="col-md-4">
                <label class="form-label small fw-semibold">Loại Giảm Giá</label>
                <select class="form-select" v-model="formVoucher.discountType">
                  <option value="percent">Phần trăm (%)</option>
                  <option value="fixed">Tiền mặt cố định (VNĐ)</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label small fw-semibold">Giá Trị Giảm</label>
                <input type="number" class="form-control" v-model="formVoucher.discountValue" placeholder="VD: 15 hoặc 100000">
              </div>
              <div class="col-md-4">
                <label class="form-label small fw-semibold">Số Lượng Phát Hành</label>
                <input type="number" class="form-control" v-model="formVoucher.quantity" placeholder="500">
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Đơn Tối Thiểu (VNĐ)</label>
                <input type="number" class="form-control" v-model="formVoucher.minOrder" placeholder="500000">
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Hạn Sử Dụng Đến</label>
                <input type="date" class="form-control" v-model="formVoucher.endDate">
              </div>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-light px-4" @click="showModal = false">Hủy</button>
            <button type="button" class="btn btn-primary-custom px-4" @click="saveVoucher">Phát Hành Voucher</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AdminVoucher",
  data() {
    return {
      searchQuery: "",
      filterType: "",
      filterStatus: "",
      showModal: false,
      isEdit: false,
      formVoucher: {
        code: "",
        title: "",
        discountType: "percent",
        discountValue: 10,
        minOrder: 500000,
        quantity: 500,
        endDate: "2025-06-30",
        status: "active"
      },
      vouchers: [
        {
          id: 1,
          code: "DANANGHELLO",
          title: "Chào Mừng Du Khách Mới Đến Đà Nẵng",
          discountType: "percent",
          discountValue: 15,
          minOrder: 500000,
          quantity: 1000,
          used: 640,
          startDate: "2025-01-01",
          endDate: "2025-12-31",
          status: "active"
        },
        {
          id: 2,
          code: "SUMMERTOUR50",
          title: "Đón Hè Rực Rỡ - Giảm Ngay 50k Tour Biển Đảo",
          discountType: "fixed",
          discountValue: 50000,
          minOrder: 700000,
          quantity: 500,
          used: 480,
          startDate: "2025-02-01",
          endDate: "2025-05-30",
          status: "active"
        },
        {
          id: 3,
          code: "BANAHILLS100K",
          title: "Tri Ân Khách Hàng - Trải Nghiệm Cáp Treo Bà Nà",
          discountType: "fixed",
          discountValue: 100000,
          minOrder: 1500000,
          quantity: 300,
          used: 160,
          startDate: "2025-02-15",
          endDate: "2025-06-15",
          status: "active"
        },
        {
          id: 4,
          code: "TET2025VIP",
          title: "Ưu Đãi Du Xuân Ất Tỵ 2025",
          discountType: "percent",
          discountValue: 20,
          minOrder: 1000000,
          quantity: 200,
          used: 200,
          startDate: "2025-01-15",
          endDate: "2025-02-10",
          status: "expired"
        }
      ]
    };
  },
  computed: {
    filteredVouchers() {
      return this.vouchers.filter(v => {
        const matchSearch =
          v.code.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          v.title.toLowerCase().includes(this.searchQuery.toLowerCase());
        const matchType = this.filterType ? v.discountType === this.filterType : true;
        const matchStatus = this.filterStatus ? v.status === this.filterStatus : true;
        return matchSearch && matchType && matchStatus;
      });
    }
  },
  methods: {
    formatMoney(val) {
      return Number(val).toLocaleString("vi-VN");
    },
    openModalAdd() {
      this.isEdit = false;
      this.formVoucher = {
        code: "SMART" + Math.floor(1000 + Math.random() * 9000),
        title: "",
        discountType: "percent",
        discountValue: 10,
        minOrder: 500000,
        quantity: 500,
        endDate: "2025-08-30",
        status: "active"
      };
      this.showModal = true;
    },
    editVoucher(v) {
      this.isEdit = true;
      this.formVoucher = { ...v };
      this.showModal = true;
    },
    saveVoucher() {
      if (!this.formVoucher.code || !this.formVoucher.title) {
        alert("Vui lòng nhập mã code và tên chương trình!");
        return;
      }
      if (this.isEdit) {
        const idx = this.vouchers.findIndex(i => i.id === this.formVoucher.id);
        if (idx !== -1) this.vouchers[idx] = { ...this.formVoucher };
      } else {
        this.vouchers.push({
          ...this.formVoucher,
          id: Date.now(),
          used: 0,
          startDate: new Date().toISOString().slice(0, 10)
        });
      }
      this.showModal = false;
    },
    toggleStatus(v) {
      v.status = v.status === "active" ? "expired" : "active";
    },
    deleteVoucher(v) {
      if (confirm(`Bạn có chắc muốn xóa voucher ${v.code}?`)) {
        this.vouchers = this.vouchers.filter(i => i.id !== v.id);
      }
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

.voucher-code-badge {
  background-color: #f1f5f9;
  border: 1px dashed #0284c7;
  color: #0284c7;
  font-family: monospace;
  font-weight: 700;
  padding: 0.25rem 0.6rem;
  border-radius: 6px;
  letter-spacing: 0.5px;
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
