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
            <div class="kpi-value">{{ stats.total }}</div>
            <span class="kpi-subtext">Đồng bộ từ phan_hois</span>
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
            <div class="kpi-value text-danger">{{ stats.pending < 10 ? '0' + stats.pending : stats.pending }}</div>
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
            <div class="kpi-value text-warning">{{ stats.processing < 10 ? '0' + stats.processing : stats.processing }}</div>
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
            <div class="kpi-value text-success">{{ stats.resolved < 10 ? '0' + stats.resolved : stats.resolved }}</div>
            <span class="kpi-subtext">Tỷ lệ hoàn thành {{ stats.total > 0 ? ((stats.resolved / stats.total) * 100).toFixed(1) : 0 }}%</span>
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
                v-model="key_search"
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
                <textarea class="form-control" rows="2" placeholder="Nhập nội dung gửi phản hồi lại cho khách qua email..." v-model="selectedTicket.adminReply"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-light px-4" @click="selectedTicket = null">Đóng</button>
            <button 
              type="button" 
              class="btn btn-success px-4"
              @click="markResolved(selectedTicket)"
            >
              Cập Nhật & Hoàn Tất Sửa Lỗi
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Tạo Ticket Nội Bộ -->
    <div class="modal fade show d-block" tabindex="-1" v-if="showAddModal" style="background: rgba(0,0,0,0.45);">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title fw-bold text-dark">Tạo Ticket Báo Lỗi / Hỗ Trợ Mới</h5>
            <button type="button" class="btn-close" @click="showAddModal = false"></button>
          </div>
          <div class="modal-body pt-3">
            <div class="mb-3">
              <label class="form-label small fw-semibold">Mã khách hàng / Người gửi</label>
              <input type="text" class="form-control" v-model="newTicket.ma_khach_hang" placeholder="VD: KH001 hoặc NV_SUPPORT">
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold">Tiêu đề sự cố</label>
              <input type="text" class="form-control" v-model="newTicket.tieu_de" placeholder="VD: Lỗi hiển thị lịch tour...">
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold">Phân loại</label>
              <select class="form-select" v-model="newTicket.loai">
                <option value="Thanh toán">Thanh toán & Đơn hàng</option>
                <option value="AI Planner">AI Planner & Lộ trình</option>
                <option value="Đặt Tour">Đặt Tour & Dịch vụ</option>
                <option value="Giao diện">Giao diện & Trải nghiệm</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold">Mô tả chi tiết</label>
              <textarea class="form-control" rows="3" v-model="newTicket.mo_ta" placeholder="Mô tả hành vi lỗi hoặc khiếu nại..."></textarea>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-light px-4" @click="showAddModal = false">Hủy</button>
            <button type="button" class="btn btn-primary-custom px-4" @click="saveNewTicket">Gửi Ticket</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import api from '@/axios';

export default {
  name: "AdminBaoCaoLoi",
  data() {
    return {
      key_search: "",
      searchQuery: "",
      filterCategory: "",
      filterStatus: "",
      selectedTicket: null,
      showAddModal: false,
      list_bao_cao_loi: [],
      add_bao_cao_loi: {
        ma_khach_hang: "KH001",
        tieu_de: "",
        loai: "Thanh toán",
        mo_ta: "",
        trang_thai: "pending"
      },
      edit_bao_cao_loi: {},
      delete_bao_cao_loi: {},
      newTicket: {
        ma_khach_hang: "KH001",
        tieu_de: "",
        loai: "Thanh toán",
        mo_ta: "",
        trang_thai: "pending"
      },
      stats: {
        total: 0,
        pending: 0,
        processing: 0,
        resolved: 0
      },
      reports: []
    };
  },
  computed: {
    filteredReports() {
      const q = (this.key_search || this.searchQuery || '').toLowerCase();
      return this.reports.filter(r => {
        const matchSearch =
          (r.code || '').toLowerCase().includes(q) ||
          (r.sender || '').toLowerCase().includes(q) ||
          (r.title || '').toLowerCase().includes(q) ||
          (r.description || '').toLowerCase().includes(q);
        const matchCat = this.filterCategory ? r.category === this.filterCategory : true;
        const matchStatus = this.filterStatus ? r.status === this.filterStatus : true;
        return matchSearch && matchCat && matchStatus;
      });
    }
  },
  mounted() {
    this.loadData();
  },
  methods: {
    loadData() {
      api.get('/api/admin/bao-cao-loi/get-data')
        .then(res => {
          if (res.data.status) {
            const list = res.data.data || [];
            this.list_bao_cao_loi = list;
            this.reports = list.map(item => ({
              id: item.id,
              code: 'TCK' + String(item.id).padStart(3, '0'),
              sender: item.ten_khach_hang || item.ma_khach_hang || 'Khách hàng',
              email: item.email_khach_hang || 'support@danangtravel.vn',
              category: item.loai || 'Hệ thống',
              title: item.tieu_de || 'Báo cáo sự cố',
              description: item.mo_ta || '',
              priority: item.loai === 'Thanh toán' ? 'Khẩn cấp' : (item.loai === 'AI Planner' ? 'Cao' : 'Bình thường'),
              status: item.trang_thai || 'pending',
              adminReply: item.phan_hoi_admin || '',
              createdAt: item.created_at ? item.created_at.slice(0, 10) : ''
            }));

            if (res.data.stats) {
              this.stats = res.data.stats;
            }
          }
        })
        .catch(err => {
          console.error('Lỗi khi tải danh sách báo cáo lỗi:', err);
        });
    },
    viewDetail(r) {
      this.edit_bao_cao_loi = { ...r };
      this.selectedTicket = { ...r };
    },
    markResolved(r) {
      if (!r) return;
      this.edit_bao_cao_loi = { ...r };
      api.post('/api/admin/bao-cao-loi/update', {
        id: r.id,
        trang_thai: 'resolved',
        phan_hoi_admin: r.adminReply
      })
      .then(res => {
        if (res.data.status) {
          this.$toast.success(res.data.message || 'Cập nhật và giải quyết ticket thành công!');
          this.selectedTicket = null;
          this.loadData();
        } else {
          this.$toast.error(res.data.message || 'Cập nhật thất bại!');
        }
      })
      .catch(err => {
        const msg = (err.response && err.response.data && err.response.data.message) ? err.response.data.message : 'Có lỗi xảy ra!';
        this.$toast.error(msg);
      });
    },
    deleteReport(r) {
      this.delete_bao_cao_loi = { ...r };
      if (confirm(`Bạn có chắc muốn xóa ticket ${r.code}?`)) {
        api.post('/api/admin/bao-cao-loi/delete', { id: r.id })
          .then(res => {
            if (res.data.status) {
              this.$toast.success(res.data.message || 'Xóa ticket thành công!');
              this.loadData();
            } else {
              this.$toast.error(res.data.message || 'Xóa ticket thất bại!');
            }
          })
          .catch(err => {
            const msg = (err.response && err.response.data && err.response.data.message) ? err.response.data.message : 'Có lỗi xảy ra!';
            this.$toast.error(msg);
          });
      }
    },
    openModalAdd() {
      this.add_bao_cao_loi = {
        ma_khach_hang: "KH001",
        tieu_de: "",
        loai: "Thanh toán",
        mo_ta: "",
        trang_thai: "pending"
      };
      this.newTicket = this.add_bao_cao_loi;
      this.showAddModal = true;
    },
    saveNewTicket() {
      if (!this.newTicket.tieu_de || !this.newTicket.mo_ta) {
        this.$toast.warning("Vui lòng điền tiêu đề và mô tả sự cố!");
        return;
      }
      api.post('/api/admin/bao-cao-loi/store', this.newTicket)
        .then(res => {
          if (res.data.status) {
            this.$toast.success(res.data.message || 'Tạo ticket thành công!');
            this.showAddModal = false;
            this.loadData();
          } else {
            this.$toast.error(res.data.message || 'Tạo ticket thất bại!');
          }
        })
        .catch(err => {
          const msg = (err.response && err.response.data && err.response.data.message) ? err.response.data.message : 'Có lỗi xảy ra!';
          this.$toast.error(msg);
        });
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
