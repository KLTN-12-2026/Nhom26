<template>
  <div class="admin-page-container">
    <!-- Breadcrumb & Database Sync Pill -->
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
      <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
        <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
        <i class="bx bx-chevron-right mx-1"></i>
        <span class="text-secondary">Phân hệ Tài chính</span>
        <i class="bx bx-chevron-right mx-1"></i>
        <span class="text-primary fw-bold">Đối soát & Quyết toán</span>
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
          <h3 class="page-title mb-0">Đối Soát & Quyết Toán Hoa Hồng</h3>
          <span class="table-badge">Table: doi_soat_hoa_hongs</span>
        </div>
        <p class="text-muted small mb-0 mt-1">Quản lý dòng tiền booking, khấu trừ phí hoa hồng sàn và theo dõi quyết toán chi trả cho các đối tác du lịch.</p>
      </div>
      <div class="d-flex gap-2">
        <button class="btn btn-primary-custom d-flex align-items-center gap-2" @click="openSettleModal">
          <i class="bx bx-calculator font-20"></i>
          <span>Khởi Tạo Kỳ Quyết Toán</span>
        </button>
      </div>
    </div>

    <!-- 4 KPI Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">TỔNG GMV GIAO DỊCH</span>
            <div class="kpi-value">{{ formatShortMoney(stats.total_gmv) }}</div>
            <span class="kpi-subtext">Doanh số tour toàn sàn</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-chart"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">DOANH THU HOA HỒNG SÀN</span>
            <div class="kpi-value text-success">{{ formatShortMoney(stats.total_commission) }}</div>
            <span class="kpi-subtext">Phí dịch vụ trung gian sàn thu</span>
          </div>
          <div class="kpi-icon icon-green">
            <i class="bx bx-trending-up"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">THỰC CHI ĐỐI TÁC</span>
            <div class="kpi-value text-primary">{{ formatShortMoney(stats.total_payout) }}</div>
            <span class="kpi-subtext">Tổng tiền chuyển giao đối tác</span>
          </div>
          <div class="kpi-icon icon-orange">
            <i class="bx bx-money-withdraw"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">PHIẾU CHỜ ĐỐI SOÁT</span>
            <div class="kpi-value text-danger">{{ stats.pending_count }}</div>
            <span class="kpi-subtext">Cần kế toán duyệt chuyển khoản</span>
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
          <div class="col-12 col-md-6">
            <div class="search-input-wrap">
              <i class="bx bx-search search-icon"></i>
              <input 
                type="text" 
                class="form-control search-input" 
                placeholder="Tìm kiếm theo mã đối soát, hóa đơn, tên đối tác..."
                v-model="key_search"
              >
            </div>
          </div>
          <div class="col-6 col-md-3">
            <select class="form-select filter-select" v-model="filterStatus">
              <option value="">Tất cả trạng thái</option>
              <option value="completed">Đã thanh toán (Giải ngân)</option>
              <option value="pending">Chờ đối soát</option>
              <option value="cancelled">Tạm treo / Hủy</option>
            </select>
          </div>
          <div class="col-6 col-md-3 text-end text-muted small">
            Hiển thị <strong class="text-dark">{{ filteredTransactions.length }}</strong> phiếu đối soát
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
              <th scope="col" class="text-end">TỔNG GIÁ TRỊ</th>
              <th scope="col" class="text-end">HOA HỒNG SÀN</th>
              <th scope="col" class="text-end">THỰC CHI ĐỐI TÁC</th>
              <th scope="col" class="text-center">TRẠNG THÁI</th>
              <th scope="col" class="text-center">NGÀY ĐỐI SOÁT</th>
              <th scope="col" class="text-end pe-4">THAO TÁC</th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="filteredTransactions.length === 0">
              <td colspan="8" class="text-center py-5 text-muted">
                <i class="bx bx-receipt font-28 d-block mb-1"></i>
                Không tìm thấy phiếu đối soát nào!
              </td>
            </tr>
            <tr v-for="t in filteredTransactions" :key="t.id">
              <td class="ps-4">
                <span class="admin-code">{{ t.code }}</span>
              </td>
              <td>
                <div class="fw-bold text-dark">{{ t.partner }}</div>
                <small class="text-muted"><i class="bx bx-receipt me-1"></i>Hóa đơn: <strong>{{ t.invoiceCode }}</strong></small>
              </td>
              <td class="text-end fw-semibold text-dark">
                {{ formatMoney(t.total) }}đ
              </td>
              <td class="text-end text-success fw-semibold">
                {{ formatMoney(t.commission) }}đ
                <small class="d-block text-muted font-11">({{ t.rate }}%)</small>
              </td>
              <td class="text-end text-primary fw-bold">
                {{ formatMoney(t.payout) }}đ
              </td>
              <td class="text-center">
                <span v-if="t.status === 'completed'" class="status-pill status-active">
                  <span class="dot"></span> Đã thanh toán
                </span>
                <span v-else-if="t.status === 'cancelled'" class="status-pill status-locked">
                  <span class="dot"></span> Tạm treo / Hủy
                </span>
                <span v-else class="status-pill status-pending">
                  <span class="dot"></span> Chờ đối soát
                </span>
              </td>
              <td class="text-center text-muted small">
                <i class="bx bx-calendar me-1 text-primary"></i>{{ t.settlementDate }}
              </td>
              <td class="text-end pe-4">
                <div class="action-btn-group">
                  <button class="action-btn" title="Xem phiếu đối soát chi tiết" @click="viewDetail(t)">
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
                  <button class="action-btn text-danger" title="Treo lệnh / Hủy" @click="cancelPayout(t)">
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
        <span class="text-muted small">Trang 1 trên 1 (Dữ liệu chuẩn hệ thống)</span>
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
                <option>Kỳ hiện tại (Tháng {{ new Date().getMonth() + 1 }}/{{ new Date().getFullYear() }})</option>
                <option>Kỳ trước đó</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold">Tự Động Tính Hoa Hồng Sàn</label>
              <input type="text" class="form-control" value="10.0% (Cố định sàn)" disabled>
            </div>
            <div class="p-3 bg-light rounded-3 small text-muted">
              <i class="bx bx-info-circle me-1 text-primary"></i>
              Hệ thống sẽ quét toàn bộ booking đã hoàn tất tour trong kỳ và tạo phiếu đối soát công nợ tự động đến từng đối tác theo tỷ lệ hoa hồng quy định.
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-light px-4" @click="showModalSettle = false">Hủy</button>
            <button type="button" class="btn btn-primary-custom px-4" @click="runSettlement">Bắt đầu quét & Quyết toán</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade show d-block" tabindex="-1" v-if="showDetailModal" style="background: rgba(0,0,0,0.45);">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title fw-bold text-dark">Chi Tiết Phiếu Đối Soát #{{ selectedDetail ? selectedDetail.code : '' }}</h5>
            <button type="button" class="btn-close" @click="showDetailModal = false"></button>
          </div>
          <div class="modal-body pt-3" v-if="selectedDetail">
            <div class="p-3 bg-light rounded-3 mb-3">
              <div class="fw-bold text-dark font-16">{{ selectedDetail.partner }}</div>
              <div class="text-muted small mt-1">
                <span>Mã đối tác: <strong>{{ selectedDetail.partnerCode }}</strong></span>
                <span class="mx-2">•</span>
                <span>Hóa đơn: <strong>{{ selectedDetail.invoiceCode }}</strong></span>
              </div>
            </div>
            <div class="d-flex justify-content-between py-2 border-bottom">
              <span class="text-muted">Ngày đối soát:</span>
              <span class="fw-semibold text-dark">{{ selectedDetail.settlementDate }}</span>
            </div>
            <div class="d-flex justify-content-between py-2 border-bottom">
              <span class="text-muted">Tổng doanh thu giao dịch:</span>
              <span class="fw-bold text-dark">{{ formatMoney(selectedDetail.total) }}đ</span>
            </div>
            <div class="d-flex justify-content-between py-2 border-bottom">
              <span class="text-muted">Hoa hồng sàn giữ lại ({{ selectedDetail.rate }}%):</span>
              <span class="fw-bold text-success">{{ formatMoney(selectedDetail.commission) }}đ</span>
            </div>
            <div class="d-flex justify-content-between py-2 border-bottom">
              <span class="text-muted">Số tiền thực chi đối tác:</span>
              <span class="fw-bold text-primary font-16">{{ formatMoney(selectedDetail.payout) }}đ</span>
            </div>
            <div class="d-flex justify-content-between py-2">
              <span class="text-muted">Trạng thái:</span>
              <span class="badge" :class="selectedDetail.status === 'completed' ? 'bg-success' : (selectedDetail.status === 'pending' ? 'bg-warning text-dark' : 'bg-danger')">
                {{ selectedDetail.status === 'completed' ? 'Đã thanh toán' : (selectedDetail.status === 'pending' ? 'Chờ duyệt đối soát' : 'Tạm hoãn / Treo') }}
              </span>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-light px-4" @click="showDetailModal = false">Đóng</button>
            <button 
              type="button" 
              class="btn btn-success px-4" 
              v-if="selectedDetail && selectedDetail.status === 'pending'"
              @click="approvePayout(selectedDetail); showDetailModal = false"
            >
              Duyệt Chuyển Tiền
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
  name: "AdminTaiChinh",
  data() {
    return {
      key_search: "",
      searchQuery: "",
      filterStatus: "",
      showModalSettle: false,
      showDetailModal: false,
      selectedDetail: null,
      list_tai_chinh: [],
      add_tai_chinh: {},
      edit_tai_chinh: {},
      delete_tai_chinh: {},
      stats: {
        total_gmv: 0,
        total_commission: 0,
        total_payout: 0,
        pending_count: 0
      },
      transactions: []
    };
  },
  computed: {
    filteredTransactions() {
      const q = (this.key_search || this.searchQuery || '').toLowerCase().trim();
      return this.transactions.filter(t => {
        const matchSearch =
          !q ||
          (t.code || '').toLowerCase().includes(q) ||
          (t.partner || '').toLowerCase().includes(q) ||
          (t.invoiceCode || '').toLowerCase().includes(q);

        const matchStatus = !this.filterStatus || t.status === this.filterStatus;
        return matchSearch && matchStatus;
      });
    }
  },
  mounted() {
    this.loadData();
  },
  methods: {
    formatMoney(val) {
      return Number(val || 0).toLocaleString("vi-VN");
    },
    formatShortMoney(val) {
      const num = Number(val || 0);
      if (num >= 1000000000) {
        return (num / 1000000000).toFixed(2) + " Tỷ";
      }
      if (num >= 1000000) {
        return (num / 1000000).toFixed(1) + " Tr";
      }
      return num.toLocaleString("vi-VN") + " đ";
    },
    loadData() {
      api.get('/api/admin/tai-chinh/get-data')
        .then(res => {
          if (res.data.status) {
            const list = res.data.data || [];
            this.list_tai_chinh = list;
            this.transactions = list.map(item => {
              // Xử lý ngày đối soát từ ngay_doi_soat hoặc created_at
              let dateStr = '---';
              const rawDate = item.ngay_doi_soat || item.created_at;
              if (rawDate) {
                const d = new Date(rawDate);
                if (!isNaN(d.getTime())) {
                  const day = String(d.getDate()).padStart(2, '0');
                  const month = String(d.getMonth() + 1).padStart(2, '0');
                  const year = d.getFullYear();
                  dateStr = `${day}/${month}/${year}`;
                } else {
                  dateStr = String(rawDate).slice(0, 10);
                }
              }

              return {
                id: item.ma_doi_soat,
                code: 'DS' + String(item.ma_doi_soat).padStart(3, '0'),
                invoiceCode: item.ma_hoa_don || 'HD---',
                partner: item.ten_doi_tac || item.ma_doi_tac || 'Đối tác lữ hành',
                partnerCode: item.ma_doi_tac,
                rate: item.phan_tram_hoa_hong || 10,
                total: parseFloat(item.tong_tien_giao_dich) || 0,
                commission: parseFloat(item.tien_hoa_hong_admin) || 0,
                payout: parseFloat(item.tien_doi_tac_thuc_nhan) || 0,
                status: item.trang_thai_thanh_toan == 1 ? 'completed' : (item.trang_thai_thanh_toan == 2 ? 'cancelled' : 'pending'),
                settlementDate: dateStr
              };
            });

            if (res.data.stats) {
              this.stats = res.data.stats;
            }
          }
        })
        .catch(err => {
          console.error('Lỗi khi tải dữ liệu tài chính:', err);
        });
    },
    openSettleModal() {
      this.showModalSettle = true;
    },
    runSettlement() {
      api.post('/api/admin/tai-chinh/run-settlement')
        .then(res => {
          if (res.data.status) {
            this.$toast.success(res.data.message || 'Khởi tạo kỳ đối soát thành công!');
            this.showModalSettle = false;
            this.loadData();
          } else {
            this.$toast.error(res.data.message || 'Khởi tạo thất bại!');
          }
        })
        .catch(err => {
          const msg = (err.response && err.response.data && err.response.data.message) ? err.response.data.message : 'Có lỗi xảy ra!';
          this.$toast.error(msg);
        });
    },
    viewDetail(t) {
      this.selectedDetail = t;
      this.showDetailModal = true;
    },
    approvePayout(t) {
      if (t.status === 'completed') {
        this.$toast.info('Phiếu đối soát này đã được thanh toán giải ngân trước đó!');
        return;
      }
      api.post('/api/admin/tai-chinh/approve-payout', { ma_doi_soat: t.id })
        .then(res => {
          if (res.data.status) {
            this.$toast.success(res.data.message || 'Duyệt thanh toán thành công!');
            this.loadData();
          } else {
            this.$toast.error(res.data.message || 'Thao tác thất bại!');
          }
        })
        .catch(err => {
          const msg = (err.response && err.response.data && err.response.data.message) ? err.response.data.message : 'Có lỗi xảy ra!';
          this.$toast.error(msg);
        });
    },
    cancelPayout(t) {
      if (confirm(`Bạn có chắc muốn tạm treo hoặc hủy phiếu đối soát ${t.code}?`)) {
        api.post('/api/admin/tai-chinh/cancel-payout', { ma_doi_soat: t.id })
          .then(res => {
            if (res.data.status) {
              this.$toast.warning(res.data.message || 'Đã tạm treo phiếu đối soát!');
              this.loadData();
            } else {
              this.$toast.error(res.data.message || 'Thao tác thất bại!');
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
.icon-red { background-color: #fee2e2; color: #dc2626; }

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

.admin-code {
  font-family: monospace;
  font-weight: 700;
  color: #0f172a;
  background-color: #f8fafc;
  padding: 0.25rem 0.5rem;
  border-radius: 4px;
  border: 1px solid #e2e8f0;
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
.status-pending { background-color: #fef3c7; color: #b45309; }
.status-locked { background-color: #fee2e2; color: #b91c1c; }

.status-pill .dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
}

.status-active .dot { background-color: #22c55e; }
.status-pending .dot { background-color: #f59e0b; }
.status-locked .dot { background-color: #ef4444; }

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
</style>
