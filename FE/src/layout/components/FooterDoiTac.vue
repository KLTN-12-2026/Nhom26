<template>
    <footer class="doitac-footer">
        <div class="footer-inner">
            <div class="footer-left">
                <span class="copyright-text">
                    © 2026 Smart Travel Planner Ecosystem. Đối tác <strong>Lotus Heritage Ltd</strong>.
                </span>
            </div>
            <div class="footer-right">
                <a href="javascript:;" class="footer-link">Tài liệu API</a>
                <span class="link-divider">·</span>
                <a href="javascript:;" class="footer-link">Chính sách hợp tác</a>
                <span class="link-divider">·</span>
                <a href="javascript:;" class="footer-link">Hỗ trợ kỹ thuật</a>
                <span class="version-tag">v2.8.4-prod</span>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'FooterDoiTac'
}
</script>

<style scoped>
.doitac-footer {
    background-color: #ffffff;
    border-top: 1px solid #f1f5f9;
    padding: 14px 24px;
    font-size: 0.76rem;
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
}

.copyright-text strong {
    color: #0f172a;
}

.footer-right {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.footer-link {
    color: #64748b;
    text-decoration: none;
    transition: color 0.15s;
}

.footer-link:hover {
    color: #e11d48;
    text-decoration: underline;
}

.link-divider {
    color: #cbd5e1;
}

.version-tag {
    font-size: 0.68rem;
    font-family: monospace;
    background-color: #f1f5f9;
    color: #475569;
    padding: 2px 6px;
    border-radius: 4px;
    font-weight: 600;
}

@media (max-width: 767.98px) {
    .doitac-footer {
        padding: 12px 16px;
        text-align: center;
    }
    .footer-inner {
        flex-direction: column;
        justify-content: center;
    }
}
</style>
