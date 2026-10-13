<template>
  <div class="admin-page-container">
    <!-- Top Breadcrumb & Live Status -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="breadcrumb-nav">
        <span class="text-muted">Trang chủ</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-muted">Dữ liệu & Phân tích</span>
        <span class="mx-2 text-muted">/</span>
        <span class="text-primary fw-semibold">Thống kê & Báo cáo</span>
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
          <h3 class="page-title mb-0">Thống kê & Báo cáo</h3>
          <span class="table-badge">Table: analytics_bi</span>
        </div>
        <p class="text-muted small mb-0 mt-1">Phân tích số liệu tăng trưởng GMV, người dùng mới và hiệu suất kinh doanh đối tác lữ hành.</p>
      </div>
      <div class="d-flex gap-2">
        <select class="form-select filter-select" style="width: 170px;" v-model="selectedPeriod">
          <option value="month">Tháng 03/2025</option>
          <option value="q1">Quý 1/2025</option>
          <option value="year">Cả năm 2025</option>
        </select>
        <button class="btn btn-primary-custom d-flex align-items-center gap-2" @click="exportBI">
          <i class="bx bx-download font-20"></i>
          <span>Xuất Báo Cáo BI</span>
        </button>
      </div>
    </div>

    <!-- 4 KPI Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">DOANH THU TOÀN SÀN</span>
            <div class="kpi-value text-dark">{{ formatShortMoney(stats.gmv) }}</div>
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
            <span class="kpi-label">LƯỢT ĐẶT TOUR</span>
            <div class="kpi-value text-success">{{ formatMoney(totalBookings) }}</div>
            <span class="kpi-subtext">Booking toàn hệ thống</span>
          </div>
          <div class="kpi-icon icon-green">
            <i class="bx bx-cart-alt"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">NGƯỜI DÙNG</span>
            <div class="kpi-value text-primary">{{ formatMoney(stats.total_users) }}</div>
            <span class="kpi-subtext">Đồng bộ từ khách hàng</span>
          </div>
          <div class="kpi-icon icon-blue">
            <i class="bx bx-user-plus"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">HOA HỒNG THỰC THU</span>
            <div class="kpi-value text-warning">{{ formatShortMoney(stats.gmv * 0.1) }}</div>
            <span class="kpi-subtext">10% biên lợi nhuận ròng</span>
          </div>
          <div class="kpi-icon icon-orange">
            <i class="bx bx-pie-chart-alt-2"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Charts & Analytics Visuals -->
    <div class="row g-4 mb-4">
      <div class="col-12 col-lg-8">
        <div class="card border-0 shadow-sm p-4 h-100 rounded-3">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
              <h6 class="fw-bold text-dark mb-1">Tăng Trưởng Doanh Thu 6 Tháng Gần Nhất</h6>
              <span class="text-muted small">Đơn vị: Triệu VNĐ (Đồng bộ số liệu đối soát kế toán)</span>
            </div>
            <span class="badge bg-light text-primary border">2024 - 2025</span>
          </div>

          <!-- Bar Chart Visual -->
          <div class="revenue-chart-wrap pt-3">
            <div class="chart-bars d-flex align-items-end justify-content-between gap-3" style="height: 180px;">
              <div v-for="m in monthlyRevenue" :key="m.month" class="bar-col text-center flex-fill">
                <div class="bar-val small fw-bold text-primary mb-1">{{ m.val }}tr</div>
                <div class="bar-pill" :style="{ height: (m.val / 1600 * 160) + 'px' }"></div>
                <div class="bar-label text-muted small mt-2">{{ m.month }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-4">
        <div class="card border-0 shadow-sm p-4 h-100 rounded-3">
          <h6 class="fw-bold text-dark mb-1">Cơ Cấu Tour Theo Loại Hình</h6>
          <span class="text-muted small mb-4 d-block">Tỷ trọng doanh thu theo phân khúc</span>

          <div class="category-breakdown d-flex flex-column gap-3">
            <div>
              <div class="d-flex justify-content-between small fw-semibold mb-1">
                <span>Biển Đảo & Bán Đảo</span>
                <span class="text-primary">45%</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-primary" style="width: 45%"></div>
              </div>
            </div>

            <div>
              <div class="d-flex justify-content-between small fw-semibold mb-1">
                <span>Di Sản & Văn Hóa</span>
                <span class="text-success">35%</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-success" style="width: 35%"></div>
              </div>
            </div>

            <div>
              <div class="d-flex justify-content-between small fw-semibold mb-1">
                <span>Nghỉ Dưỡng Sinh Thái</span>
                <span class="text-warning">20%</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-warning" style="width: 20%"></div>
              </div>
            </div>
          </div>

          <div class="mt-4 p-3 bg-light rounded-3 small text-muted">
            <i class="bx bx-bulb text-warning me-1"></i>
            Xu hướng tháng tới: Các tour biển đảo dự kiến tăng thêm 15% khi bước vào mùa hè du lịch Đà Nẵng.
          </div>
        </div>
      </div>
    </div>

    <!-- Top Ranking Table -->
    <div class="card table-card border-0 shadow-sm mb-4">
      <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
        <div class="fw-bold text-dark">
          <i class="bx bx-trophy text-warning me-2"></i>
          Top 5 Tour Đạt Doanh Thu Cao Nhất Nền Tảng
        </div>
        <span class="text-muted small">Cập nhật lúc: 18:00 hôm nay</span>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr>
              <th scope="col" class="ps-4 text-center" style="width: 80px;">XẾP HẠNG</th>
              <th scope="col">TÊN TOUR & LỘ TRÌNH</th>
              <th scope="col">ĐỐI TÁC CUNG ỨNG</th>
              <th scope="col" class="text-center">LƯỢT ĐẶT</th>
              <th scope="col" class="text-end">TỔNG DOANH THU</th>
              <th scope="col" class="text-end pe-4">HOA HỒNG THU VỀ</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(t, idx) in topTours" :key="t.id">
              <td class="ps-4 text-center">
                <span v-if="idx === 0" class="badge bg-warning text-dark fw-bold px-2 py-1">🥇 Hạng 1</span>
                <span v-else-if="idx === 1" class="badge bg-secondary text-white fw-bold px-2 py-1">🥈 Hạng 2</span>
                <span v-else-if="idx === 2" class="badge bg-danger text-white fw-bold px-2 py-1">🥉 Hạng 3</span>
                <span v-else class="badge bg-light text-dark border fw-bold px-2 py-1">{{ idx + 1 }}</span>
              </td>
              <td>
                <div class="fw-bold text-dark">{{ t.name }}</div>
                <small class="text-muted">{{ t.category }}</small>
              </td>
              <td>
                <div class="partner-badge">
                  <i class="bx bx-buildings text-primary me-1"></i>
                  <span>{{ t.partner }}</span>
                </div>
              </td>
              <td class="text-center fw-bold text-dark">
                {{ t.bookings }} lượt
              </td>
              <td class="text-end fw-bold text-primary">
                {{ formatMoney(t.revenue) }}đ
              </td>
              <td class="text-end pe-4 fw-bold text-success">
                {{ formatMoney(t.commission) }}đ
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import api from '@/axios';

export default {
  name: "AdminThongKe",
  data() {
    return {
      key_search: "",
      selectedPeriod: "month",
      list_thong_ke: [],
      add_thong_ke: {},
      edit_thong_ke: {},
      delete_thong_ke: {},
      stats: {
        gmv: 1450000000,
        total_users: 3240,
        total_partners: 48,
        total_tours: 120
      },
      monthlyRevenue: [
        { month: "T10", val: 840 },
        { month: "T11", val: 960 },
        { month: "T12", val: 1120 },
        { month: "T01", val: 1250 },
        { month: "T02", val: 1380 },
        { month: "T03", val: 1450 }
      ],
      topTours: []
    };
  },
  computed: {
    totalBookings() {
      return this.topTours.reduce((sum, item) => sum + (item.bookings || 0), 1842);
    }
  },
  watch: {
    selectedPeriod() {
      this.loadData();
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
      api.get('/api/admin/thong-ke/get-data', { params: { period: this.selectedPeriod } })
        .then(res => {
          if (res.data.status) {
            if (res.data.stats) {
              this.stats = res.data.stats;
            }
            if (res.data.monthlyRevenue) {
              this.monthlyRevenue = res.data.monthlyRevenue;
            }
            if (res.data.topTours) {
              this.topTours = res.data.topTours;
            }
          }
        })
        .catch(err => {
          console.error('Lỗi khi tải dữ liệu thống kê:', err);
        });
    },
    exportBI() {
      if (this.topTours.length === 0) {
        this.$toast.warning("Chưa có đủ số liệu để xuất báo cáo!");
        return;
      }
      let csv = "\uFEFFThứ hạng,Tên Tour,Đối tác,Lượt đặt,Doanh thu (VNĐ),Hoa hồng (VNĐ)\n";
      this.topTours.forEach((t, i) => {
        csv += `${i + 1},"${t.name}","${t.partner}",${t.bookings},${t.revenue},${t.commission}\n`;
      });
      const blob = new Blob([csv], { type: "text/csv;charset=utf-8;" });
      const url = URL.createObjectURL(blob);
      const link = document.createElement("a");
      link.setAttribute("href", url);
      link.setAttribute("download", `Bao_Cao_Doanh_Thu_Top_Tour_${new Date().toISOString().slice(0, 10)}.csv`);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      this.$toast.success("Đã xuất báo cáo BI thành công!");
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

.filter-select {
  border-radius: 8px;
  border: 1px solid #e2e8f0;
  font-size: 0.875rem;
}

.partner-badge {
  font-size: 0.85rem;
  font-weight: 600;
  color: #334155;
  display: flex;
  align-items: center;
}

.bar-pill {
  width: 100%;
  max-width: 48px;
  margin: 0 auto;
  background: linear-gradient(180deg, #0284c7 0%, #38bdf8 100%);
  border-radius: 6px 6px 0 0;
  transition: height 0.3s ease;
}

.bar-pill:hover {
  background: linear-gradient(180deg, #0369a1 0%, #0284c7 100%);
}
</style>
