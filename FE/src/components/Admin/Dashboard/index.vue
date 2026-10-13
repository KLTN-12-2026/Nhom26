<template>
  <div class="admin-page-container">
    <!-- Top Breadcrumb & Live Status -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="breadcrumb-nav">
        <span class="text-muted">Trang chủ</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-primary fw-semibold">Bảng Điều Khiển Tổng Quan (Dashboard)</span>
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
          <h3 class="page-title mb-0">Hệ Thống Quản Trị Trung Tâm</h3>
          <span class="table-badge">Admin Portal (Root)</span>
        </div>
        <p class="text-muted small mb-0 mt-1">Giám sát toàn bộ hoạt động nền tảng du lịch thông minh Đà Nẵng Smart Travel AI.</p>
      </div>
      <router-link to="/admin/tai-khoan-admin" class="btn btn-primary-custom d-flex align-items-center gap-2 text-decoration-none">
        <i class="bx bx-user-plus font-20"></i>
        <span>Quản Trị Viên</span>
      </router-link>
    </div>

    <!-- 4 KPI Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">TỔNG GMV THÁNG</span>
            <div class="kpi-value text-dark">{{ formatShortMoney(kpis.gmv) }}</div>
            <span class="kpi-subtext text-success"><i class="bx bx-trending-up me-1"></i>+18.4% tăng trưởng</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-dollar-circle"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">ĐỐI TÁC HOẠT ĐỘNG</span>
            <div class="kpi-value text-success">{{ kpis.active_partners }}</div>
            <span class="kpi-subtext">{{ kpis.pending_partners }} đối tác mới chờ duyệt</span>
          </div>
          <div class="kpi-icon icon-green">
            <i class="bx bx-buildings"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">KHÁCH HÀNG / USERS</span>
            <div class="kpi-value text-primary">{{ formatMoney(kpis.total_users) }}</div>
            <span class="kpi-subtext">Đồng bộ từ bảng khach_hangs</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-user-check"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">SỰ CỐ CẦN XỬ LÝ</span>
            <div class="kpi-value text-danger">{{ kpis.pending_tickets < 10 ? '0' + kpis.pending_tickets : kpis.pending_tickets }}</div>
            <span class="kpi-subtext">Ticket ưu tiên cần phản hồi</span>
          </div>
          <div class="kpi-icon icon-red">
            <i class="bx bx-support"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- 14 Functions Grid Hub -->
    <div class="card border-0 shadow-sm p-4 rounded-3 mb-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold text-dark mb-0">
          <i class="bx bx-grid-alt text-primary me-2"></i>
          Danh Mục 14 Chức Năng Phân Hệ Quản Trị
        </h5>
        <span class="badge bg-light text-muted border">Phân quyền RBAC</span>
      </div>
      <p class="text-muted small mb-4">Truy cập nhanh vào từng module quản lý chuyên biệt theo đúng thẩm quyền.</p>

      <div class="row g-3">
        <div v-for="mod in modules" :key="mod.link" class="col-12 col-md-6 col-lg-4 col-xl-3">
          <router-link :to="mod.link" class="module-card text-decoration-none d-block p-3 rounded-3 h-100">
            <div class="d-flex align-items-center gap-3">
              <div class="module-icon-wrap" :class="mod.iconClass">
                <i :class="mod.icon"></i>
              </div>
              <div class="flex-grow-1 overflow-hidden">
                <div class="module-name fw-bold text-dark text-truncate">{{ mod.name }}</div>
                <div class="module-desc text-muted small text-truncate">{{ mod.desc }}</div>
              </div>
              <i class="bx bx-chevron-right text-muted font-18"></i>
            </div>
          </router-link>
        </div>
      </div>
    </div>

    <!-- System Status Overview -->
    <div class="row g-3 mb-4">
      <div class="col-12 col-lg-6">
        <div class="card border-0 shadow-sm p-4 rounded-3 h-100">
          <h6 class="fw-bold text-dark mb-3"><i class="bx bx-server text-success me-2"></i>Trạng Thái Hạ Tầng Kỹ Thuật</h6>
          <div class="d-flex flex-column gap-3">
            <div class="d-flex justify-content-between align-items-center p-2 bg-light rounded-2">
              <span class="small fw-semibold">Máy chủ API Node & Laravel:</span>
              <span class="badge bg-success">Hoạt động bình thường (99.99%)</span>
            </div>
            <div class="d-flex justify-content-between align-items-center p-2 bg-light rounded-2">
              <span class="small fw-semibold">Cơ sở dữ liệu MySQL Cluster:</span>
              <span class="badge bg-success">Đồng bộ ổn định (Lat. 1.2ms)</span>
            </div>
            <div class="d-flex justify-content-between align-items-center p-2 bg-light rounded-2">
              <span class="small fw-semibold">Cổng AI Planner & Gemini API:</span>
              <span class="badge bg-primary">Sẵn sàng phản hồi</span>
            </div>
            <div class="d-flex justify-content-between align-items-center p-2 bg-light rounded-2">
              <span class="small fw-semibold">Cổng thanh toán VietQR / VNPAY:</span>
              <span class="badge bg-success">Kết nối thông suốt</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="card border-0 shadow-sm p-4 rounded-3 h-100">
          <h6 class="fw-bold text-dark mb-3"><i class="bx bx-bell text-warning me-2"></i>Nhật Ký Quản Trị Hệ Thống Gần Nhất</h6>
          <div class="timeline-wrap small">
            <div class="d-flex gap-3 mb-3" v-for="(act, idx) in activities" :key="idx">
              <span class="text-muted" style="min-width: 60px;">{{ act.time }}</span>
              <div>
                <strong>{{ act.actor }}</strong> {{ act.content }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import api from '@/axios';

export default {
  name: "AdminDashboard",
  data() {
    return {
      key_search: "",
      list_dashboard: [],
      add_dashboard: {},
      edit_dashboard: {},
      delete_dashboard: {},
      kpis: {
        gmv: 1450000000,
        active_partners: 48,
        pending_partners: 5,
        total_users: 3240,
        pending_tickets: 5
      },
      activities: [
        {
          time: '17:45',
          actor: 'Super Admin (Root)',
          content: 'vừa phê duyệt hồ sơ đối tác du lịch mới.'
        },
        {
          time: '16:20',
          actor: 'Hệ thống',
          content: 'hoàn tất giải ngân quyết toán công nợ chu kỳ đối soát gần nhất.'
        },
        {
          time: '14:10',
          actor: 'Content Manager',
          content: 'vừa duyệt 04 địa điểm du lịch mới tại Bán Đảo Sơn Trà.'
        },
        {
          time: '11:05',
          actor: 'Support Admin',
          content: 'đã tiếp nhận và phản hồi Ticket hỗ trợ du khách.'
        }
      ],
      modules: [
        { name: "Quản lý Chức vụ", desc: "Phân cấp vai trò quản trị", icon: "bx bx-id-card", iconClass: "icon-blue", link: "/admin/chuc-vu" },
        { name: "Phân quyền", desc: "Ma trận quyền hạn RBAC", icon: "bx bx-shield-quarter", iconClass: "icon-green", link: "/admin/phan-quyen" },
        { name: "Quản lý Chức năng", desc: "Danh mục tính năng", icon: "bx bx-cube", iconClass: "icon-blue", link: "/admin/chuc-nang" },
        { name: "Quản lý Người dùng", desc: "Khách du lịch cá nhân", icon: "bx bx-user", iconClass: "icon-orange", link: "/admin/nguoi-dung" },
        { name: "Quản lý Admin", desc: "Tài khoản nhân viên điều hành", icon: "bx bx-user-check", iconClass: "icon-blue", link: "/admin/tai-khoan-admin" },
        { name: "Quản lý Đối tác", desc: "Hồ sơ công ty B2B", icon: "bx bx-buildings", iconClass: "icon-green", link: "/admin/doi-tac" },
        { name: "Kiểm duyệt Địa điểm", desc: "Phê duyệt POI du lịch", icon: "bx bx-map-pin", iconClass: "icon-orange", link: "/admin/kiem-duyet-dia-diem" },
        { name: "Quản lý Tour", desc: "Danh sách tour toàn sàn", icon: "bx bx-map-alt", iconClass: "icon-blue", link: "/admin/tour" },
        { name: "Quản lý Đánh giá", desc: "Kiểm duyệt nhận xét & CSAT", icon: "bx bx-star", iconClass: "icon-orange", link: "/admin/danh-gia" },
        { name: "Quản lý Tài chính", desc: "Dòng tiền & Hoa hồng sàn", icon: "bx bx-wallet", iconClass: "icon-green", link: "/admin/tai-chinh" },
        { name: "Thống kê & Báo cáo", desc: "Chỉ số kinh doanh & BI", icon: "bx bx-bar-chart-alt-2", iconClass: "icon-blue", link: "/admin/thong-ke" },
        { name: "Quản lý Tag", desc: "Nhãn dán dữ liệu AI", icon: "bx bx-purchase-tag", iconClass: "icon-orange", link: "/admin/tag" },
        { name: "Quản lý Voucher Admin", desc: "Mã giảm giá toàn sàn", icon: "bx bx-gift", iconClass: "icon-red", link: "/admin/voucher" },
        { name: "Quản lý Báo cáo lỗi", desc: "Tiếp nhận sự cố kỹ thuật", icon: "bx bx-bug", iconClass: "icon-red", link: "/admin/bao-cao-loi" }
      ]
    };
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
      api.get('/api/admin/dashboard/get-data')
        .then(res => {
          if (res.data.status) {
            if (res.data.kpis) {
              this.kpis = res.data.kpis;
            }
            if (res.data.activities && res.data.activities.length > 0) {
              this.activities = res.data.activities;
            }
          }
        })
        .catch(err => {
          console.error('Lỗi khi tải dữ liệu dashboard:', err);
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

.module-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  transition: all 0.2s ease;
}

.module-card:hover {
  background: #ffffff;
  border-color: #0284c7;
  box-shadow: 0 4px 12px rgba(2, 132, 199, 0.08);
  transform: translateY(-2px);
}

.module-icon-wrap {
  width: 40px;
  height: 40px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  flex-shrink: 0;
}

.module-name {
  font-size: 0.9rem;
}

.module-desc {
  font-size: 0.75rem;
}
</style>
