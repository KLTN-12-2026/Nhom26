import axios from "axios";
import { useToast } from "vue-toastification";

const API_BASE_URL = import.meta.env.VITE_API_BASE_URL || "http://127.0.0.1:8000";

export default function checkLogin(to, from, next) {
    const toast = useToast();
    const token = localStorage.getItem("xs") || localStorage.getItem("nguoi_dung_token");

    if (!token) {
        toast.error("Bạn chưa đăng nhập hệ thống!");
        next("/dang-nhap");
    } else {
        axios.get(`${API_BASE_URL}/api/kiem-tra-dang-nhap`, {
            headers: {
                "Authorization": `Bearer ${token}`
            }
        }).then((res) => {
            if (res.data.status == 1) {
                next();
            } else {
                toast.error(res.data.message || "Bạn chưa đăng nhập hệ thống!");
                localStorage.removeItem("xs");
                localStorage.removeItem("nguoi_dung_token");
                localStorage.removeItem("nguoi_dung");
                next("/dang-nhap");
            }
        }).catch(() => {
            localStorage.removeItem("xs");
            localStorage.removeItem("nguoi_dung_token");
            localStorage.removeItem("nguoi_dung");
            next("/dang-nhap");
        });
    }
}
