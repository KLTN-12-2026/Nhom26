<template>
    <footer class="doitac-footer">
        <div class="footer-inner">
            <div class="footer-left">
                <span class="status-dot-pink"></span>
                <span class="sync-info-text">
                    Đồng bộ thực thi dữ liệu đối tác: <strong>32 tour</strong> • <strong>1.280 vé xuất</strong> • Hóa đơn điện tử e-Invoice tự động kích hoạt
                </span>
            </div>
            <div class="footer-right">
                <span class="security-badge">
                    <i class="bx bx-shield-quarter text-pink me-1"></i> Đối soát PCI-DSS Bảo mật
                </span>
                <span class="link-divider">|</span>
                <span class="time-stamp">
                    <i class="bx bx-time-five me-1"></i> Cập nhật lúc: <strong>{{ currentTime }}</strong>
                </span>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'FooterDoiTac',
    data() {
        return {
            currentTime: '14:32:05',
            timer: null
        }
    },
    mounted() {
        this.updateTime();
        this.timer = setInterval(this.updateTime, 1000);
    },
    beforeUnmount() {
        if (this.timer) {
            clearInterval(this.timer);
        }
    },
    methods: {
        updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            this.currentTime = `${hours}:${minutes}:${seconds}`;
        }
    }
}
</script>

<style scoped>
.doitac-footer {
    background-color: #ffffff;
    border-top: 1px solid #f1f5f9;
    padding: 12px 24px;
    font-size: 0.75rem;
    color: #64748b;
    margin-top: auto;
}

.footer-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
}

.footer-left {
    display: flex;
    align-items: center;
    gap: 8px;
}

.status-dot-pink {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background-color: #e11d48;
    box-shadow: 0 0 0 3px rgba(225, 29, 72, 0.18);
    display: inline-block;
    flex-shrink: 0;
}

.sync-info-text strong {
    color: #0f172a;
}

.footer-right {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.security-badge {
    display: flex;
    align-items: center;
    color: #475569;
    font-weight: 500;
}

.text-pink {
    color: #e11d48 !important;
}

.link-divider {
    color: #cbd5e1;
}

.time-stamp {
    color: #64748b;
    display: flex;
    align-items: center;
}

.time-stamp strong {
    color: #0f172a;
    font-family: monospace;
    font-size: 0.8rem;
    margin-left: 2px;
}

@media (max-width: 767.98px) {
    .doitac-footer {
        padding: 12px 14px;
    }
    .footer-inner {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
}
</style>
