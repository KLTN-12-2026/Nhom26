<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-shield-quarter me-1 font-22 text-danger"></i>
                            <span class="h5 mb-0 text-danger fw-bold">Hệ Thống Quản Trị Toàn Cục (Admin Portal)</span>
                        </div>
                        <span class="badge bg-danger px-3 py-2 fw-bold">Quản Trị Viên</span>
                    </div>
                    <hr>
                    <p class="text-muted">Tổng quan chỉ số hoạt động toàn bộ sàn thương mại điện tử du lịch Wanderlust.</p>
                    
                    <!-- Các thẻ thống kê demo Admin -->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3 mt-1">
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-danger mb-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Tổng Đối Tác</p>
                                            <h4 class="my-1 text-danger">48</h4>
                                            <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i> 5 đối tác chờ duyệt</p>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-light-danger text-danger ms-auto">
                                            <i class='bx bxs-group'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-primary mb-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Tổng Khách Hàng</p>
                                            <h4 class="my-1 text-primary">3.240</h4>
                                            <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i> +180 người dùng mới</p>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-light-primary text-primary ms-auto">
                                            <i class='bx bxs-user-check'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-success mb-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Tổng Doanh Thu Sàn</p>
                                            <h4 class="my-1 text-success">1.280.000.000 đ</h4>
                                            <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i> +15.8% tháng này</p>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-light-success text-success ms-auto">
                                            <i class='bx bxs-dollar-circle'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-info mb-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Hoa Hồng Thu Về</p>
                                            <h4 class="my-1 text-info">128.000.000 đ</h4>
                                            <p class="mb-0 font-13 text-muted">Tỉ lệ bình quân 10%</p>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-light-info text-info ms-auto">
                                            <i class='bx bxs-pie-chart-alt'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'AdminDashboardComponent'
}
</script>
<style></style>
