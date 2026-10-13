/**
 * axios.js — Cấu hình Axios tập trung cho toàn bộ dự án
 *
 * - baseURL: đọc từ biến môi trường VITE_API_BASE_URL (khai báo trong .env)
 *            Fallback mặc định: http://127.0.0.1:8000
 * - Interceptor request: tự động đính kèm Bearer token vào header Authorization
 */

import axios from 'axios';

const api = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    },
});

// Interceptor: tự động gắn token vào mỗi request (chuẩn 'xs' theo CODING_STYLE)
api.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem('xs')
            || localStorage.getItem('admin_token')
            || localStorage.getItem('nguoi_dung_token')
            || localStorage.getItem('token')
            || sessionStorage.getItem('xs')
            || sessionStorage.getItem('admin_token')
            || sessionStorage.getItem('token');

        if (token) {
            config.headers['Authorization'] = `Bearer ${token}`;
        }

        return config;
    },
    (error) => Promise.reject(error)
);

// Interceptor: xử lý response lỗi 401 (token hết hạn / chưa đăng nhập)
api.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response && error.response.status === 401) {
            // Xóa token hết hạn và chuyển về trang đăng nhập
            localStorage.removeItem('xs');
            localStorage.removeItem('admin_token');
            localStorage.removeItem('nguoi_dung_token');
            localStorage.removeItem('token');
            sessionStorage.removeItem('xs');
            sessionStorage.removeItem('admin_token');
            sessionStorage.removeItem('token');
            window.location.href = '/dang-nhap';
        }
        return Promise.reject(error);
    }
);

export default api;
