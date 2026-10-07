<template>
  <div class="admin-page-container">
    <!-- Top Breadcrumb & Live Status -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="breadcrumb-nav">
        <span class="text-muted">Trang chủ</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-muted">Kế toán & Vận hành</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-primary fw-semibold">Quản lý Tài chính</span>
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
          <h3 class="page-title mb-0">Quản lý Tài chính</h3>
          <span class="table-badge">Table: giao_dichs</span>
        </div>
        <p class="text-muted small mb-0 mt-1">Theo dõi dòng tiền toàn sàn, hoa hồng nền tảng và quyết toán công nợ đối tác du lịch.</p>
      </div>
      <button class="btn btn-primary-custom d-flex align-items-center gap-2" @click="openSettleModal">
        <i class="bx bx-check-double font-20"></i>
        <span>+ Quyết Toán Định Kỳ</span>
      </button>
    </div>

    <!-- 4 KPI Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">TỔNG GMV TOÀN SÀN</span>
            <div class="kpi-value text-dark">1.28<span style="font-size: 1.1rem; font-weight: 600;"> Tỷ</span></div>
            <span class="kpi-subtext text-success"><i class="bx bx-trending-up me-1"></i>+15.8% tháng này</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-wallet"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">HOA HỒNG SÀN (10%)</span>
            <div class="kpi-value text-success">128<span style="font-size: 1.1rem; font-weight: 600;"> Tr</span></div>
            <span class="kpi-subtext">Doanh thu ròng thực tế</span>
          </div>
          <div class="kpi-icon icon-green">
            <i class="bx bx-coin-stack"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">ĐÃ THANH TOÁN B2B</span>
            <div class="kpi-value text-primary">1.15<span style="font-size: 1.1rem; font-weight: 600;"> Tỷ</span></div>
            <span class="kpi-subtext">Đã giải ngân qua ngân hàng</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-credit-card"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">CHỜ ĐỐI SOÁT</span>
            <div class="kpi-value text-danger">48<span style="font-size: 1.1rem; font-weight: 600;"> Tr</span></div>
            <span class="kpi-subtext">04 lệnh chuyển tiền chờ duyệt</span>
          </div>
          <div class="kpi-icon icon-red">
            <i class="bx bx-time-five"></i>
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
                placeholder="Tìm kiếm theo mã giao dịch, đối tác hoặc ngân hàng..."
                v-model="searchQuery"
              >
            </div>
          </div>
          <div class="col-6 col-md-3">
            <select class="form-select filter-select" v-model="filterType">
              <option value="">Tất cả phương thức</option>
              <option value="VietinBank">VietinBank</option>
              <option value="Vietcombank">Vietcombank</option>
              <option value="MBBank">MBBank</option>
            </select>
          </div>
          <div class="col-6 col-md-2">
            <select class="form-select filter-select" v-model="filterStatus">
              <option value="">Tất cả trạng thái</option>
              <option value="completed">Đã giải ngân</option>
              <option value="pending">Chờ đối soát</option>
            </select>
          </div>
          <div class="col-12 col-md-2 text-md-end text-muted small">
            Hiển thị <strong class="text-dark">{{ filteredTransactions.length }}</strong> giao dịch
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
              <th scope="col" class="ps-4">MÃ ĐỐI SOÁT</th>
              <th scope="col">ĐỐI TÁC THỤ HƯỞNG</th>
              <th scope="col">TÀI KHOẢN NHẬN</th>
              <th scope="col" class="text-end">TỔNG GIÁ TRỊ</th>
              <th scope="col" class="text-end">HOA HỒNG SÀN</th>
              <th scope="col" class="text-end">THỰC CHI ĐỐI TÁC</th>
              <th scope="col" class="text-center">TRẠNG THÁI</th>
              <th scope="col">NGÀY ĐỐI SOÁT</th>
              <th scope="col" class="text-end pe-4">THAO TÁC</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="t in filteredTransactions" :key="t.id">
              <td class="ps-4">
                <span class="admin-code">{{ t.code }}</span>
              </td>
              <td>
                <div class="fw-bold text-dark">{{ t.partner }}</div>
                <small class="text-muted"><i class="bx bx-calendar me-1"></i>Chu kỳ: {{ t.period }}</small>
              </td>
              <td>
                <div class="small fw-semibold">{{ t.bank }}</div>
                <small class="text-muted font-monospace">{{ t.accountNumber }}</small>
              </td>
              <td class="text-end fw-semibold text-dark">
                {{ formatMoney(t.total) }}đ
              </td>
              <td class="text-end text-success fw-semibold">
                {{ formatMoney(t.commission) }}đ
              </td>
              <td class="text-end text-primary fw-bold">
                {{ formatMoney(t.payout) }}đ
              </td>
              <td class="text-center">
                <span v-if="t.status === 'completed'" class="status-pill status-active">
                  <span class="dot"></span> Đã thanh toán
                </span>
                <span v-else class="status-pill status-pending">
                  <span class="dot"></span> Chờ đối soát
                </span>
              </td>
              <td class="text-muted small">
                {{ t.createdAt }}
              </td>
              <td class="text-end pe-4">
                <div class="action-btn-group">
                  <button class="action-btn" title="Xem phiếu đối soát" @click="viewDetail(t)">
                    <i class="bx bx-receipt"></i>
                  </button>
                  <button 
                    class="action-btn" 
                    :class="t.status === 'pending' ? 'text-success' : 'text-muted'"
                    :title="t.status === 'pending' ? 'Duyệt chuyển tiền' : 'Đã hoàn tất'"
                    @click="approvePayout(t)"
                  >
                    <i class="bx bx-check"></i>
                  </button>
                  <button class="action-btn text-danger" title="Hủy / Treo lệnh" @click="cancelPayout(t)">
                    <i class="bx bx-x"></i>
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

    <!-- Settlement Modal -->
    <div class="modal fade show d-block" tabindex="-1" v-if="showModalSettle" style="background: rgba(0,0,0,0.45);">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title fw-bold text-dark">Khởi Tạo Kỳ Quyết Toán Mới</h5>
            <button type="button" class="btn-close" @click="showModalSettle = false"></button>
          </div>
          <div class="modal-body pt-3">
            <div class="mb-3">
              <label class="form-label small fw-semibold">Chọn Kỳ Quyết Toán</label>
              <select class="form-select">
                <option>Kỳ 1: 01/03/2025 - 15/03/2025</option>
                <option>Kỳ 2: 16/03/2025 - 31/03/2025</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold">Tự Động Tính Hoa Hồng</label>
              <input type="text" class="form-control" value="10.0% (Cố định sàn)" disabled>
            </div>
            <div class="p-3 bg-light rounded-3 small text-muted">
              <i class="bx bx-info-circle me-1 text-primary"></i>
              Hệ thống sẽ quét toàn bộ booking đã hoàn tất tour trong kỳ và tạo phiếu đối soát công nợ tự động đến từng đối tác.
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-light px-4" @click="showModalSettle = false">Hủy</button>
            <button type="button" class="btn btn-primary-custom px-4" @click="runSettlement">Bắt đầu quét & Quyết toán</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AdminTaiChinh",
  data() {
    return {
      searchQuery: "",
      filterType: "",
      filterStatus: "",
      showModalSettle: false,
      transactions: [
        {
          id: 1,
          code: "TXN001",
          partner: "Da Nang Sea Travel Ltd.",
          period: "Tháng 02/2025 (Kỳ 1)",
          bank: "Vietcombank",
          accountNumber: "0041000349281",
          total: 48500000,
          commission: 4850000,
          payout: 43650000,
          status: "completed",
          createdAt: "2025-02-16"
        },
        {
          id: 2,
          code: "TXN002",
          partner: "Sun World Travel Partner",
          period: "Tháng 02/2025 (Kỳ 1)",
          bank: "VietinBank",
          accountNumber: "108000492819",
          total: 92400000,
          commission: 9240000,
          payout: 83160000,
          status: "completed",
          createdAt: "2025-02-16"
        },
        {
          id: 3,
          code: "TXN003",
          partner: "Han River Adventure",
          period: "Tháng 02/2025 (Kỳ 2)",
          bank: "MBBank",
          accountNumber: "0905112233",
          total: 28000000,
          commission: 2800000,
          payout: 25200000,
          status: "pending",
          createdAt: "2025-03-01"
        },
        {
          id: 4,
          code: "TXN004",
          partner: "Heritage Express",
          period: "Tháng 02/2025 (Kỳ 2)",
          bank: "Vietcombank",
          accountNumber: "007100829103",
          total: 25300000,
          commission: 2530000,
          payout: 22770000,
          status: "pending",
          createdAt: "2025-03-01"
        }
      ]
    };
  },
  computed: {
    filteredTransactions() {
      return this.transactions.filter(t => {
        const matchSearch =
          t.code.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          t.partner.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          t.bank.toLowerCase().includes(this.searchQuery.toLowerCase());
        const matchType = this.filterType ? t.bank === this.filterType : true;
        const matchStatus = this.filterStatus ? t.status === this.filterStatus : true;
        return matchSearch && matchType && matchStatus;
      });
    }
  },
  methods: {
    formatMoney(val) {
      return Number(val).toLocaleString("vi-VN");
    },
    openSettleModal() {
      this.showModalSettle = true;
    },
    runSettlement() {
      alert("Đã khởi tạo quy trình tính toán tự động thành công!");
      this.showModalSettle = false;
    },
    approvePayout(t) {
      if (t.status === "completed") {
        alert("Lệnh chuyển tiền này đã hoàn tất trước đó.");
        return;
      }
      if (confirm(`Xác nhận duyệt chuyển khoản số tiền ${this.formatMoney(t.payout)}đ cho ${t.partner}?`)) {
        t.status = "completed";
      }
    },
    cancelPayout(t) {
      if (confirm(`Bạn có chắc muốn tạm hoãn phiếu đối soát ${t.code}?`)) {
        alert(`Đã tạm hoãn phiếu ${t.code}`);
      }
    },
    viewDetail(t) {
      alert(`Chi tiết phiếu ${t.code}:\nĐối tác: ${t.partner}\nNgân hàng: ${t.bank} - ${t.accountNumber}\nTổng đơn: ${this.formatMoney(t.total)}đ\nHoa hồng: ${this.formatMoney(t.commission)}đ\nThực nhận: ${this.formatMoney(t.payout)}đ`);
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
