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
            <div class="kpi-value text-dark">1.45<span style="font-size: 1.1rem; font-weight: 600;"> Tỷ</span></div>
            <span class="kpi-subtext text-success"><i class="bx bx-trending-up me-1"></i>+18.4% so kỳ trước</span>
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
            <div class="kpi-value text-success">1,842</div>
            <span class="kpi-subtext">Tỷ lệ hoàn thành 98.2%</span>
          </div>
          <div class="kpi-icon icon-green">
            <i class="bx bx-cart-alt"></i>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">
          <div class="kpi-content">
            <span class="kpi-label">NGƯỜI DÙNG MỚI</span>
            <div class="kpi-value text-primary">+620</div>
            <span class="kpi-subtext">Đăng ký & kích hoạt email</span>
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
            <div class="kpi-value text-warning">145.2<span style="font-size: 1.1rem; font-weight: 600;"> Tr</span></div>
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
export default {
  name: "AdminThongKe",
  data() {
    return {
      selectedPeriod: "month",
      monthlyRevenue: [
        { month: "T10", val: 840 },
        { month: "T11", val: 960 },
        { month: "T12", val: 1120 },
        { month: "T01", val: 1250 },
        { month: "T02", val: 1380 },
        { month: "T03", val: 1450 }
      ],
      topTours: [
        {
          id: 1,
          name: "Bà Nà Hills - Cầu Vàng & Fantasy Park Trọn Gói",
          category: "Nghỉ dưỡng & Sinh thái",
          partner: "Sun World Travel Partner",
          bookings: 624,
          revenue: 780000000,
          commission: 78000000
        },
        {
          id: 2,
          name: "Khám Phá Bán Đảo Sơn Trà & Lặn Ngắm San Hô Cù Lao Chàm",
          category: "Biển đảo",
          partner: "Da Nang Sea Travel Ltd.",
          bookings: 480,
          revenue: 360000000,
          commission: 36000000
        },
        {
          id: 3,
          name: "Hành Trình Phố Cổ Hội An & Rừng Dừa Bảy Mẫu",
          category: "Di sản & Văn hóa",
          partner: "Heritage Express",
          bookings: 310,
          revenue: 217000000,
          commission: 21700000
        },
        {
          id: 4,
          name: "Tour Chèo SUP Ngắm Hoàng Hôn Sông Hàn & Cầu Rồng",
          category: "Biển đảo",
          partner: "Han River Adventure",
          bookings: 280,
          revenue: 126000000,
          commission: 12600000
        },
        {
          id: 5,
          name: "Ngũ Hành Sơn - Làng Đá Mỹ Nghệ Non Nước",
          category: "Di sản & Văn hóa",
          partner: "Da Nang Sea Travel Ltd.",
          bookings: 148,
          revenue: 66600000,
          commission: 6660000
        }
      ]
    };
  },
  methods: {
    formatMoney(val) {
      return Number(val).toLocaleString("vi-VN");
    },
    exportBI() {
      alert("Đang trích xuất báo cáo Business Intelligence định dạng PDF và Excel...");
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
