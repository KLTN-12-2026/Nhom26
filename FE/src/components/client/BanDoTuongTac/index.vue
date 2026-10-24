<template>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold text-dark mb-1">
                    <i class="bx bx-map-alt text-primary me-2"></i>Bản Đồ Tương Tác OSM
                </h4>
                <p class="text-muted small mb-0">Hiển thị mạng lưới POI Đà Nẵng, tính toán ma trận khoảng cách OSRM và bán kính tham quan.</p>
            </div>
            <div class="d-flex gap-2">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold">
                    <i class="bx bx-broadcast me-1"></i>OpenStreetMap Engine Active
                </span>
            </div>
        </div>

        <!-- Bản đồ mô phỏng và bộ lọc nhanh -->
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <div class="card border bg-light rounded-3 p-3">
                    <h6 class="fw-bold mb-2">Bộ lọc lớp bản đồ</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="checkBaiBien" checked>
                        <label class="form-check-label small" for="checkBaiBien">Bãi biển & Vịnh Đà Nẵng</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="checkAmThuc" checked>
                        <label class="form-check-label small" for="checkAmThuc">Ẩm thực miền Trung & Nhà hàng</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="checkKhuDuLich" checked>
                        <label class="form-check-label small" for="checkKhuDuLich">Khu du lịch & Danh lam</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkKhachSan" checked>
                        <label class="form-check-label small" for="checkKhachSan">Khách sạn & Nơi lưu trú</label>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="rounded-3 overflow-hidden border position-relative" style="height: 380px; background: #e2e8f0;">
                    <!-- Giả lập giao diện bản đồ OSM tương tác -->
                    <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-center p-4 bg-light">
                        <i class="bx bx-map-pin text-danger" style="font-size: 3.5rem;"></i>
                        <h5 class="fw-bold text-dark mt-2 mb-1">Bản đồ Đà Nẵng OSM GIS</h5>
                        <p class="text-muted small mb-3">Hỗ trợ trỏ điểm, đo bán kính, tính khoảng cách thời gian thực giữa các POI du lịch.</p>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill px-3">
                                <i class="bx bx-navigation me-1"></i>Định vị vị trí hiện tại
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                <i class="bx bx-layer me-1"></i>Đổi kiểu bản đồ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bảng danh sách tọa độ các điểm mốc -->
        <h6 class="fw-bold text-dark mt-3 mb-2">Danh sách các Node mốc trong ma trận khoảng cách</h6>
        <div class="table-responsive">
            <table class="table table-sm table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Node</th>
                        <th>Địa danh</th>
                        <th>Vĩ độ (Lat)</th>
                        <th>Kinh độ (Lng)</th>
                        <th>Bán kính phục vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="node in list_nodes" :key="node.id">
                        <td class="fw-bold text-primary">Node {{ node.id }}</td>
                        <td>{{ node.name }}</td>
                        <td><code>{{ node.lat }}</code></td>
                        <td><code>{{ node.lng }}</code></td>
                        <td><span class="badge bg-info-subtle text-info">{{ node.radius }} km</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: 'BanDoTuongTacComponent',
    data() {
        return {
            list_nodes: [
                { id: 0, name: 'Sân bay Quốc tế Đà Nẵng (DAD)', lat: '16.0544', lng: '108.2022', radius: '5' },
                { id: 1, name: 'Bãi biển Mỹ Khê (Võ Nguyên Giáp)', lat: '16.0592', lng: '108.2435', radius: '3' },
                { id: 2, name: 'Bán đảo Sơn Trà & Chùa Linh Ứng', lat: '16.1001', lng: '108.2764', radius: '8' },
                { id: 3, name: 'Bà Nà Hills & Cầu Vàng', lat: '15.9964', lng: '107.9868', radius: '15' }
            ]
        };
    },
    mounted() {},
    methods: {}
};
</script>

<style></style>
