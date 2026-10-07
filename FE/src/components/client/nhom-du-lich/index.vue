<template>
    <div class="container-fluid p-0">
        <div class="card border-0 shadow-sm rounded-4 mb-4 p-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <h3 class="fw-bold mb-1 text-dark">Quản Lý Nhóm Du Lịch</h3>
                    <p class="text-muted mb-0">Mời bạn bè, phân quyền và cùng nhau bình chọn lịch trình, hoạt động chuyến đi.</p>
                </div>
                <div>
                    <button class="btn btn-primary rounded-3" @click="showInviteModal = true">
                        <i class="bx bx-user-plus me-1"></i> Mời Thành Viên Mới
                    </button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Active Group Members -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h5 class="fw-bold text-dark mb-3">
                        <i class="bx bx-group text-primary me-2"></i>Thành Viên Nhóm (Chuyến đi Đà Nẵng Hè 2025)
                    </h5>
                    <div class="table-responsive">
                        <table class="table align-middle table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Thành viên</th>
                                    <th>Email / SĐT</th>
                                    <th>Vai trò</th>
                                    <th>Trạng thái</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="member in members" :key="member.id">
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-circle-sm bg-primary text-white">{{ member.avatar }}</div>
                                            <div>
                                                <div class="fw-bold text-dark">{{ member.name }}</div>
                                                <small class="text-muted" v-if="member.isLeader">Trưởng nhóm</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ member.contact }}</td>
                                    <td>
                                        <span class="badge" :class="member.roleBadge">{{ member.role }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success">Đã tham gia</span>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-danger" v-if="!member.isLeader" title="Xóa">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Group Voting & Activity Poll -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h5 class="fw-bold text-dark mb-3">
                        <i class="bx bx-poll text-warning me-2"></i>Bình Chọn Điểm Ăn Uống
                    </h5>
                    <div class="poll-box mb-3 p-3 bg-light rounded-3">
                        <div class="fw-bold text-dark mb-1">Tối Ngày 1 Ăn Gì?</div>
                        <small class="text-muted d-block mb-3">Còn 12 giờ để bình chọn</small>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span>Hải sản Bé Mặn</span>
                            <span class="fw-bold text-primary">75% (3/4)</span>
                        </div>
                        <div class="progress mb-3" style="height: 6px;">
                            <div class="progress-bar bg-primary" style="width: 75%"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span>Cơm niêu Nhà Đỏ</span>
                            <span class="fw-bold text-secondary">25% (1/4)</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-secondary" style="width: 25%"></div>
                        </div>
                    </div>
                    <router-link to="/client/hoat-dong" class="btn btn-outline-primary w-100 rounded-3">
                        <i class="bx bx-calendar-event me-1"></i> Xem Hoạt Động Của Nhóm
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'QuanLyNhomDuLich',
    data() {
        return {
            showInviteModal: false,
            members: [
                { id: 1, name: 'Nguyễn Văn An', avatar: 'NA', contact: '0912345678', role: 'Trưởng nhóm', isLeader: true, roleBadge: 'bg-primary-subtle text-primary' },
                { id: 2, name: 'Trần Thị Mai', avatar: 'TM', contact: 'mai.tran@gmail.com', role: 'Biên tập viên', isLeader: false, roleBadge: 'bg-info-subtle text-info' },
                { id: 3, name: 'Lê Hoàng Nam', avatar: 'LN', contact: '0987654321', role: 'Thành viên', isLeader: false, roleBadge: 'bg-light text-secondary' },
                { id: 4, name: 'Phạm Thu Hương', avatar: 'PH', contact: 'huong.pt@gmail.com', role: 'Thành viên', isLeader: false, roleBadge: 'bg-light text-secondary' }
            ]
        }
    }
}
</script>

<style scoped>
.avatar-circle-sm {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: 700;
}
</style>
