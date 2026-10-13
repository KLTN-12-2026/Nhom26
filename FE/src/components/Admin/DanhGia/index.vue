<template>
  <div class="admin-page-container">
    <!-- Top Breadcrumb & Live Status -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="breadcrumb-nav">
        <span class="text-muted">Trang chủ</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-muted">Chăm sóc Khách hàng</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-primary fw-semibold">Quản lý Đánh giá</span>
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
          <h3 class="page-title mb-0">Quản lý Đánh giá</h3>
          <span class="table-badge">Table: danh_gias</span>
        </div>
        <p class="text-muted small mb-0 mt-1">Theo dõi trải nghiệm du khách, kiểm duyệt chất lượng dịch vụ và quản lý phản hồi toàn sàn.</p>
      </div>
      <button class="btn btn-primary-custom d-flex align-items-center gap-2" @click="exportReport">
        <i class="bx bx-download font-20"></i>
        <span>+ Xuất Báo Cáo CSAT</span>
      </button>
    </div>

    <!-- 4 KPI Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">TỔNG ĐÁNH GIÁ</span>
            <div class="kpi-value">{{ stats.total }}</div>
            <span class="kpi-subtext">Đồng bộ từ bảng danh_gia_tours</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-message-square-dots"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">ĐIỂM TRUNG BÌNH</span>
            <div class="kpi-value text-success">{{ stats.avg_score }}<span style="font-size: 1rem; color: #64748b;">/5</span></div>
            <span class="kpi-subtext">Độ hài lòng người dùng (CSAT)</span>
          </div>
          <div class="kpi-icon icon-green">
            <i class="bx bx-star"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">ĐÁNH GIÁ 5 SAO</span>
            <div class="kpi-value text-warning">{{ stats.five_star_count }}</div>
            <span class="kpi-subtext">Chiếm {{ stats.total > 0 ? ((stats.five_star_count / stats.total) * 100).toFixed(1) : 0 }}% tổng nhận xét</span>
          </div>
          <div class="kpi-icon icon-orange">
            <i class="bx bx-like"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">CẦN XEM XÉT / ẨN</span>
            <div class="kpi-value text-danger">{{ stats.need_review }}</div>
            <span class="kpi-subtext">1-2 sao hoặc đã ẩn</span>
          </div>
          <div class="kpi-icon icon-red">
            <i class="bx bx-shield-x"></i>
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
                placeholder="Tìm kiếm theo mã, khách hàng, tour hoặc nội dung..."
                v-model="key_search"
              >
            </div>
          </div>
          <div class="col-6 col-md-3">
            <select class="form-select filter-select" v-model="filterStar">
              <option value="">Tất cả số sao</option>
              <option value="5">⭐⭐⭐⭐⭐ 5 Sao</option>
              <option value="4">⭐⭐⭐⭐ 4 Sao</option>
              <option value="3">⭐⭐⭐ 3 Sao</option>
              <option value="2">⭐⭐ 2 Sao</option>
              <option value="1">⭐ 1 Sao</option>
            </select>
          </div>
          <div class="col-6 col-md-2">
            <select class="form-select filter-select" v-model="filterStatus">
              <option value="">Tất cả trạng thái</option>
              <option value="approved">Đang hiển thị</option>
              <option value="hidden">Đã ẩn / Vi phạm</option>
            </select>
          </div>
          <div class="col-12 col-md-2 text-md-end text-muted small">
            Hiển thị <strong class="text-dark">{{ filteredReviews.length }}</strong> đánh giá
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
              <th scope="col" class="ps-4">MÃ ĐÁNH GIÁ</th>
              <th scope="col">KHÁCH HÀNG</th>
              <th scope="col">TOUR / ĐỊA ĐIỂM</th>
              <th scope="col">ĐÁNH GIÁ</th>
              <th scope="col" style="width: 30%;">NỘI DUNG NHẬN XÉT</th>
              <th scope="col">TRẠNG THÁI</th>
              <th scope="col">NGÀY ĐĂNG</th>
              <th scope="col" class="text-end pe-4">THAO TÁC</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="rv in filteredReviews" :key="rv.id">
              <td class="ps-4">
                <span class="admin-code">{{ rv.code }}</span>
              </td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="user-avatar-circle">
                    {{ (rv.customer || 'U').charAt(0) }}
                  </div>
                  <div>
                    <div class="fw-bold text-dark">{{ rv.customer }}</div>
                    <small class="text-muted">{{ rv.email }}</small>
                  </div>
                </div>
              </td>
              <td>
                <div class="fw-semibold text-dark">{{ rv.tourName }}</div>
                <small class="text-muted"><i class="bx bx-buildings me-1"></i>{{ rv.partner }}</small>
              </td>
              <td>
                <div class="star-rating">
                  <i 
                    v-for="s in 5" 
                    :key="s" 
                    :class="s <= rv.stars ? 'bx bxs-star text-warning' : 'bx bx-star text-muted'"
                  ></i>
                </div>
                <small class="text-muted">{{ rv.stars }}.0 / 5.0</small>
              </td>
              <td>
                <div class="review-text text-truncate" style="max-width: 320px;" :title="rv.comment">
                  "{{ rv.comment }}"
                </div>
              </td>
              <td>
                <span v-if="rv.status === 'approved'" class="status-pill status-active">
                  <span class="dot"></span> Hiển thị
                </span>
                <span v-else class="status-pill status-locked">
                  <span class="dot"></span> Đã ẩn
                </span>
              </td>
              <td class="text-muted small">
                {{ rv.createdAt }}
              </td>
              <td class="text-end pe-4">
                <div class="action-btn-group">
                  <button class="action-btn" title="Xem chi tiết" @click="viewDetail(rv)">
                    <i class="bx bx-show"></i>
                  </button>
                  <button class="action-btn" :title="rv.status === 'approved' ? 'Ẩn đánh giá' : 'Cho phép hiển thị'" @click="toggleStatus(rv)">
                    <i :class="rv.status === 'approved' ? 'bx bx-hide' : 'bx bx-show'"></i>
                  </button>
                  <button class="action-btn text-danger" title="Xóa đánh giá" @click="deleteReview(rv)">
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
        <span class="text-muted small">Hiển thị <strong>{{ filteredReviews.length }}</strong> đánh giá từ cơ sở dữ liệu</span>
        <div class="d-flex gap-1">
          <button class="btn btn-sm btn-outline-secondary px-3" disabled>Trước</button>
          <button class="btn btn-sm btn-primary-custom px-3">1</button>
          <button class="btn btn-sm btn-outline-secondary px-3" disabled>Sau</button>
        </div>
      </div>
    </div>

    <!-- Review Detail Modal -->
    <div class="modal fade show d-block" tabindex="-1" v-if="selectedReview" style="background: rgba(0,0,0,0.45);">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title fw-bold text-dark">Chi Tiết Nhận Xét #{{ selectedReview.code }}</h5>
            <button type="button" class="btn-close" @click="selectedReview = null"></button>
          </div>
          <div class="modal-body pt-3">
            <div class="d-flex align-items-center gap-3 mb-3 p-3 bg-light rounded-3">
              <div class="user-avatar-circle" style="width: 44px; height: 44px; font-size: 1.1rem;">
                {{ (selectedReview.customer || 'U').charAt(0) }}
              </div>
              <div>
                <div class="fw-bold">{{ selectedReview.customer }}</div>
                <div class="text-muted small">{{ selectedReview.email }} - Ngày: {{ selectedReview.createdAt }}</div>
              </div>
            </div>
            <div class="mb-3">
              <label class="small text-muted fw-semibold">Tour / Dịch vụ:</label>
              <div class="fw-bold text-primary">{{ selectedReview.tourName }}</div>
            </div>
            <div class="mb-3">
              <label class="small text-muted fw-semibold">Đánh giá sao:</label>
              <div class="d-flex align-items-center gap-2">
                <span class="text-warning font-18">
                  <i v-for="s in 5" :key="s" :class="s <= selectedReview.stars ? 'bx bxs-star' : 'bx bx-star text-muted'"></i>
                </span>
                <span class="badge bg-light text-dark border">{{ selectedReview.stars }} sao</span>
              </div>
            </div>
            <div class="mb-3">
              <label class="small text-muted fw-semibold">Nội dung khách viết:</label>
              <p class="p-3 bg-light rounded-3 text-secondary mb-0 fst-italic">
                "{{ selectedReview.comment }}"
              </p>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-light px-4" @click="selectedReview = null">Đóng</button>
            <button 
              type="button" 
              class="btn px-4" 
              :class="selectedReview.status === 'approved' ? 'btn-outline-danger' : 'btn-success'"
              @click="toggleStatus(selectedReview); selectedReview = null"
            >
              {{ selectedReview.status === 'approved' ? 'Ẩn nhận xét này' : 'Duyệt hiển thị' }}
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
  name: "AdminDanhGia",
  data() {
    return {
      key_search: "",
      searchQuery: "",
      filterStar: "",
      filterStatus: "",
      selectedReview: null,
      list_danh_gia: [],
      add_danh_gia: {},
      edit_danh_gia: {},
      delete_danh_gia: {},
      stats: {
        total: 0,
        avg_score: 5.0,
        five_star_count: 0,
        need_review: 0
      },
      reviews: []
    };
  },
  computed: {
    filteredReviews() {
      const q = (this.key_search || this.searchQuery || '').toLowerCase();
      return this.reviews.filter(r => {
        const matchSearch =
          (r.customer || '').toLowerCase().includes(q) ||
          (r.code || '').toLowerCase().includes(q) ||
          (r.tourName || '').toLowerCase().includes(q) ||
          (r.comment || '').toLowerCase().includes(q);
        const matchStar = this.filterStar ? r.stars === Number(this.filterStar) : true;
        const matchStatus = this.filterStatus ? r.status === this.filterStatus : true;
        return matchSearch && matchStar && matchStatus;
      });
    }
  },
  mounted() {
    this.loadData();
  },
  methods: {
    loadData() {
      api.get('/api/admin/danh-gia/get-data')
        .then(res => {
          if (res.data.status) {
            const list = res.data.data || [];
            this.list_danh_gia = list;
            this.reviews = list.map(item => ({
              id: item.id,
              code: 'RV' + String(item.id).padStart(3, '0'),
              customer: item.ten_khach_hang || 'Du khách',
              email: item.email_khach_hang || 'khachhang@gmail.com',
              tourName: item.ten_tour || 'Tour du lịch Đà Nẵng',
              partner: item.ten_doi_tac || 'Đối tác lữ hành',
              stars: item.so_sao || 5,
              comment: item.binh_luan || 'Dịch vụ tour chu đáo.',
              status: item.trang_thai == 1 ? 'approved' : 'hidden',
              createdAt: item.ngay_danh_gia ? item.ngay_danh_gia.slice(0, 10) : (item.created_at ? item.created_at.slice(0, 10) : '')
            }));

            if (res.data.stats) {
              this.stats = res.data.stats;
            }
          }
        })
        .catch(err => {
          console.error('Lỗi khi tải danh sách đánh giá:', err);
        });
    },
    viewDetail(rv) {
      this.edit_danh_gia = { ...rv };
      this.selectedReview = rv;
    },
    toggleStatus(rv) {
      this.edit_danh_gia = { ...rv };
      api.post('/api/admin/danh-gia/change-status', { id: rv.id })
        .then(res => {
          if (res.data.status) {
            this.$toast.success(res.data.message || 'Cập nhật trạng thái thành công!');
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
    deleteReview(rv) {
      this.delete_danh_gia = { ...rv };
      if (confirm(`Bạn có chắc muốn xóa vĩnh viễn nhận xét ${rv.code}?`)) {
        api.post('/api/admin/danh-gia/delete', { id: rv.id })
          .then(res => {
            if (res.data.status) {
              this.$toast.success(res.data.message || 'Xóa đánh giá thành công!');
              this.loadData();
            } else {
              this.$toast.error(res.data.message || 'Xóa đánh giá thất bại!');
            }
          })
          .catch(err => {
            const msg = (err.response && err.response.data && err.response.data.message) ? err.response.data.message : 'Có lỗi xảy ra!';
            this.$toast.error(msg);
          });
      }
    },
    exportReport() {
      if (this.reviews.length === 0) {
        this.$toast.warning("Không có dữ liệu đánh giá để xuất!");
        return;
      }
      let csvContent = "\uFEFFMã đánh giá,Khách hàng,Email,Tour,Đối tác,Số sao,Nội dung,Trạng thái,Ngày đăng\n";
      this.reviews.forEach(r => {
        const cleanComment = `"${(r.comment || '').replace(/"/g, '""')}"`;
        csvContent += `${r.code},"${r.customer}","${r.email}","${r.tourName}","${r.partner}",${r.stars},${cleanComment},"${r.status === 'approved' ? 'Hiển thị' : 'Đã ẩn'}","${r.createdAt}"\n`;
      });
      const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
      const url = URL.createObjectURL(blob);
      const link = document.createElement("a");
      link.setAttribute("href", url);
      link.setAttribute("download", `Bao_Cao_CSAT_Danh_Gia_${new Date().toISOString().slice(0, 10)}.csv`);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      this.$toast.success("Xuất file báo cáo CSAT thành công!");
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

.user-avatar-circle {
  width: 36px;
  height: 36px;
  background: #e0f2fe;
  color: #0284c7;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 0.85rem;
}

.star-rating {
  font-size: 0.9rem;
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
