<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body p-4">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div>
                            <i class="bx bx-briefcase me-1 font-22 text-info"></i>
                            <span class="h5 mb-0 text-info fw-bold">Kênh Quản Trị Đối Tác (Partner Portal)</span>
                        </div>
                        <span class="badge bg-info text-dark px-3 py-2 fw-bold">Đối Tác</span>
                    </div>
                    <hr>
                    <p class="text-muted">Chào mừng đối tác đến với bảng điều khiển quản lý tour và kinh doanh.</p>
                    
                    <!-- Các thẻ thống kê demo -->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3 mt-1">
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-info mb-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Tổng số Tour</p>
                                            <h4 class="my-1 text-info">24</h4>
                                            <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i> 3 tour mới tuần này</p>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-light-info text-info ms-auto">
                                            <i class='bx bxs-plane-alt'></i>
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
                                            <p class="mb-0 text-secondary">Đơn Đặt Chỗ</p>
                                            <h4 class="my-1 text-success">158</h4>
                                            <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i> +12% so với tháng trước</p>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-light-success text-success ms-auto">
                                            <i class='bx bxs-cart'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-warning mb-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Doanh Thu Tạm Tính</p>
                                            <h4 class="my-1 text-warning">86.500.000 đ</h4>
                                            <p class="mb-0 font-13 text-muted">Đang chờ đối soát</p>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-light-warning text-warning ms-auto">
                                            <i class='bx bxs-wallet'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-danger mb-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Đánh Giá Trung Bình</p>
                                            <h4 class="my-1 text-danger">4.8 / 5 ⭐</h4>
                                            <p class="mb-0 font-13 text-muted">Từ 92 lượt đánh giá</p>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-light-danger text-danger ms-auto">
                                            <i class='bx bxs-star'></i>
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
    name: 'PartnerDashboardComponent'
}
</script>
<style></style>
