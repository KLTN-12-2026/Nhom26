<template>
  <div class="admin-page-container">
    <!-- Top Breadcrumb & Live Status -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="breadcrumb-nav">
        <span class="text-muted">Trang chủ</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-muted">Cấu hình Dữ liệu</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-primary fw-semibold">Quản lý Tag</span>
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
          <h3 class="page-title mb-0">Quản lý Tag</h3>
          <span class="table-badge">Table: tags</span>
        </div>
        <p class="text-muted small mb-0 mt-1">Quản lý nhãn dán phân loại địa điểm du lịch, tour và ẩm thực phục vụ hệ thống AI Planner gợi ý lịch trình.</p>
      </div>
      <button class="btn btn-primary-custom d-flex align-items-center gap-2" @click="openModalAdd">
        <i class="bx bx-plus-circle font-20"></i>
        <span>Thêm Tag Mới</span>
      </button>
    </div>

    <!-- 4 KPI Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">TỔNG SỐ TAG</span>
            <div class="kpi-value">{{ totalTags }}</div>
            <span class="kpi-subtext">Đồng bộ từ bảng tags</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-purchase-tag-alt"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">TAG ĐỊA ĐIỂM</span>
            <div class="kpi-value text-success">{{ countDiaDiem }}</div>
            <span class="kpi-subtext">Gắn cho danh lam & cảnh đẹp</span>
          </div>
          <div class="kpi-icon icon-green">
            <i class="bx bx-map-pin"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">TAG TOUR & TRẢI NGHIỆM</span>
            <div class="kpi-value text-primary">{{ countTour }}</div>
            <span class="kpi-subtext">Thuật toán AI Planner tối ưu</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-compass"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">LƯỢT GẮN TRÊN SÀN</span>
            <div class="kpi-value text-warning">{{ totalUsage.toLocaleString('vi-VN') }}</div>
            <span class="kpi-subtext">Tần suất liên kết dữ liệu</span>
          </div>
          <div class="kpi-icon icon-orange">
            <i class="bx bx-link-alt"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Active Tag Cloud Preview -->
    <div class="card border-0 shadow-sm mb-4 p-3 rounded-3">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="small fw-bold text-dark"><i class="bx bx-bolt-circle text-primary me-1"></i>Tag Thịnh Hành Gần Đây:</span>
        <span class="small text-muted">Nhấn vào tag để lọc nhanh danh sách</span>
      </div>
      <div class="d-flex flex-wrap gap-2">
        <span 
          v-for="t in tags" 
          :key="t.id" 
          class="badge py-2 px-3 rounded-pill cursor-pointer d-flex align-items-center gap-1"
          :class="t.badgeClass"
          @click="searchQuery = t.name"
        >
          #{{ t.name }}
          <span class="badge bg-white text-dark rounded-pill ms-1 font-11">{{ t.usageCount }}</span>
        </span>
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
                placeholder="Tìm kiếm theo mã tag, tên nhãn..."
                v-model="key_search"
              >
            </div>
          </div>
          <div class="col-6 col-md-3">
            <select class="form-select filter-select" v-model="filterCategory">
              <option value="">Tất cả phân nhóm</option>
              <option value="Địa điểm">Địa điểm</option>
              <option value="Tour">Tour & Trải nghiệm</option>
              <option value="Ẩm thực">Ẩm thực & Đặc sản</option>
            </select>
          </div>
          <div class="col-6 col-md-2">
            <select class="form-select filter-select" v-model="filterStatus">
              <option value="">Tất cả trạng thái</option>
              <option value="active">Đang áp dụng</option>
              <option value="inactive">Tạm ẩn</option>
            </select>
          </div>
          <div class="col-12 col-md-2 text-md-end text-muted small">
            Hiển thị <strong class="text-dark">{{ filteredTags.length }}</strong> tag
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
              <th scope="col" class="ps-4">MÃ TAG</th>
              <th scope="col">TÊN NHÃN DÁN (SLUG)</th>
              <th scope="col">PHÂN NHÓM</th>
              <th scope="col">MÔ TẢ NGỮ NGHĨA AI</th>
              <th scope="col" class="text-center">LƯỢT SỬ DỤNG</th>
              <th scope="col">TRẠNG THÁI</th>
              <th scope="col" class="text-end pe-4">THAO TÁC</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="t in filteredTags" :key="t.id">
              <td class="ps-4">
                <span class="admin-code">{{ t.code }}</span>
              </td>
              <td>
                <span class="badge py-2 px-3 rounded-pill" :class="t.badgeClass">
                  #{{ t.name }}
                </span>
              </td>
              <td>
                <span class="badge bg-light text-dark border">{{ t.category }}</span>
              </td>
              <td class="text-muted small">
                {{ t.description }}
              </td>
              <td class="text-center fw-bold text-primary">
                {{ t.usageCount }} mục
              </td>
              <td>
                <span v-if="t.status === 'active'" class="status-pill status-active">
                  <span class="dot"></span> Hoạt động
                </span>
                <span v-else class="status-pill status-locked">
                  <span class="dot"></span> Tạm dừng
                </span>
              </td>
              <td class="text-end pe-4">
                <div class="action-btn-group">
                  <button class="action-btn" title="Chỉnh sửa" @click="editTag(t)">
                    <i class="bx bx-pencil"></i>
                  </button>
                  <button class="action-btn" :title="t.status === 'active' ? 'Tạm ẩn tag' : 'Bật tag'" @click="toggleTag(t)">
                    <i :class="t.status === 'active' ? 'bx bx-lock-alt' : 'bx bx-lock-open-alt'"></i>
                  </button>
                  <button class="action-btn text-danger" title="Xóa tag" @click="deleteTag(t)">
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
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title fw-bold text-dark">{{ isEdit ? 'Chỉnh Sửa Tag' : 'Thêm Tag Mới Cho Hệ Thống' }}</h5>
            <button type="button" class="btn-close" @click="showModal = false"></button>
          </div>
          <div class="modal-body pt-3">
            <div class="mb-3">
              <label class="form-label small fw-semibold">Mã Tag</label>
              <input type="text" class="form-control" v-model="formTag.code" placeholder="VD: TAG006" :disabled="isEdit">
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold">Tên Tag (Không dấu hoặc có dấu)</label>
              <input type="text" class="form-control" v-model="formTag.name" placeholder="VD: bien-dao, song-han">
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold">Phân Nhóm</label>
              <select class="form-select" v-model="formTag.category">
                <option value="Địa điểm">Địa điểm</option>
                <option value="Tour">Tour & Trải nghiệm</option>
                <option value="Ẩm thực">Ẩm thực & Đặc sản</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold">Màu Hiển Thị</label>
              <select class="form-select" v-model="formTag.badgeClass">
                <option value="bg-primary text-white">Xanh Dương (Primary)</option>
                <option value="bg-success text-white">Xanh Lá (Success)</option>
                <option value="bg-warning text-dark">Cam / Vàng (Warning)</option>
                <option value="bg-info text-white">Xanh Lam (Info)</option>
                <option value="bg-danger text-white">Đỏ (Danger)</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-semibold">Mô Tả Định Hướng AI</label>
              <textarea class="form-control" rows="2" v-model="formTag.description" placeholder="Ý nghĩa phân loại để AI ưu tiên khi khách chọn sở thích"></textarea>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-light px-4" @click="showModal = false">Hủy</button>
            <button type="button" class="btn btn-primary-custom px-4" @click="saveTag">Lưu Tag</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import api from '@/axios';

export default {
  name: "AdminTag",
  data() {
    return {
      key_search: "",
      searchQuery: "",
      filterCategory: "",
      filterStatus: "",
      showModal: false,
      isEdit: false,
      list_tag: [],
      tags: [],
      add_tag: {
        code: "",
        name: "",
        category: "Địa điểm",
        badgeClass: "bg-primary text-white",
        description: "",
        status: "active"
      },
      edit_tag: {},
      delete_tag: {},
      formTag: {
        code: "",
        name: "",
        category: "Địa điểm",
        badgeClass: "bg-primary text-white",
        description: "",
        status: "active"
      }
    };
  },
  computed: {
    totalTags() {
      return this.tags.length;
    },
    countDiaDiem() {
      return this.tags.filter(t => t.category === 'Địa điểm').length;
    },
    countTour() {
      return this.tags.filter(t => t.category === 'Tour').length;
    },
    totalUsage() {
      return this.tags.reduce((sum, t) => sum + (Number(t.usageCount) || 0), 0);
    },
    filteredTags() {
      const q = (this.key_search || this.searchQuery || '').toLowerCase();
      return this.tags.filter(t => {
        const matchSearch =
          (t.name || '').toLowerCase().includes(q) ||
          (t.code || '').toLowerCase().includes(q) ||
          (t.description || '').toLowerCase().includes(q);
        const matchCat = this.filterCategory ? t.category === this.filterCategory : true;
        const matchStatus = this.filterStatus ? t.status === this.filterStatus : true;
        return matchSearch && matchCat && matchStatus;
      });
    }
  },
  mounted() {
    this.loadData();
  },
  methods: {
    determineCategory(name, desc) {
      const full = (name + ' ' + (desc || '')).toLowerCase();
      if (full.includes('ẩm thực') || full.includes('ăn')) return 'Ẩm thực';
      if (full.includes('tour') || full.includes('nghỉ dưỡng') || full.includes('văn hóa')) return 'Tour';
      return 'Địa điểm';
    },
    loadData() {
      api.get('/api/admin/tag/get-data')
        .then(res => {
          if (res.data.status) {
            const list = res.data.data || [];
            this.list_tag = list;
            this.tags = list.map((item, idx) => {
              const badgeColors = [
                'bg-primary text-white',
                'bg-success text-white',
                'bg-warning text-dark',
                'bg-danger text-white',
                'bg-info text-white'
              ];
              const category = this.determineCategory(item.ten_tag, item.mo_ta);
              return {
                id: item.ma_tag,
                code: item.ma_tag,
                name: item.ten_tag,
                category: category,
                badgeClass: badgeColors[idx % badgeColors.length],
                description: item.mo_ta || 'Nhãn phân loại phục vụ gợi ý AI',
                usageCount: item.usage_count !== undefined ? Number(item.usage_count) : 0,
                status: 'active'
              };
            });
          }
        })
        .catch(err => {
          console.error('Lỗi khi tải danh sách tag:', err);
        });
    },
    openModalAdd() {
      this.isEdit = false;
      this.formTag = {
        code: '',
        name: "",
        category: "Địa điểm",
        badgeClass: "bg-primary text-white",
        description: "",
        status: "active"
      };
      this.showModal = true;
    },
    editTag(t) {
      this.isEdit = true;
      this.formTag = { ...t };
      this.showModal = true;
    },
    saveTag() {
      if (!this.formTag.name) {
        this.$toast.warning("Vui lòng nhập tên tag!");
        return;
      }
      if (this.isEdit) {
        api.post('/api/admin/tag/update', {
          ma_tag: this.formTag.code,
          ten_tag: this.formTag.name,
          mo_ta: this.formTag.description
        })
        .then(res => {
          if (res.data.status) {
            this.$toast.success(res.data.message || 'Cập nhật tag thành công!');
            this.showModal = false;
            this.loadData();
          } else {
            this.$toast.error(res.data.message || 'Cập nhật tag thất bại!');
          }
        })
        .catch(err => {
          const msg = (err.response && err.response.data && err.response.data.message) ? err.response.data.message : 'Có lỗi xảy ra!';
          this.$toast.error(msg);
        });
      } else {
        api.post('/api/admin/tag/store', {
          ma_tag: this.formTag.code || null,
          ten_tag: this.formTag.name,
          mo_ta: this.formTag.description
        })
        .then(res => {
          if (res.data.status) {
            this.$toast.success(res.data.message || 'Thêm mới tag thành công!');
            this.showModal = false;
            this.loadData();
          } else {
            this.$toast.error(res.data.message || 'Thêm tag thất bại!');
          }
        })
        .catch(err => {
          const msg = (err.response && err.response.data && err.response.data.message) ? err.response.data.message : 'Có lỗi xảy ra!';
          this.$toast.error(msg);
        });
      }
    },
    toggleTag(t) {
      t.status = t.status === "active" ? "inactive" : "active";
      this.$toast.info(`Đã ${t.status === 'active' ? 'bật' : 'tạm ẩn'} nhãn #${t.name}`);
    },
    deleteTag(t) {
      if (confirm(`Bạn có chắc muốn xóa tag: #${t.name}?`)) {
        api.post('/api/admin/tag/delete', { ma_tag: t.code })
          .then(res => {
            if (res.data.status) {
              this.$toast.success(res.data.message || 'Xóa tag thành công!');
              this.loadData();
            } else {
              this.$toast.error(res.data.message || 'Xóa tag thất bại!');
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

.cursor-pointer {
  cursor: pointer;
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
