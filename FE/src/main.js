import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

import ClientLayout from './layout/wrapper/client.vue'
import DoiTacLayout from './layout/wrapper/doitac.vue'
import AdminLayout from './layout/wrapper/admin.vue'
import BlankLayout from './layout/wrapper/blank.vue'

import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-bootstrap.css';

const app = createApp(App)

app.use(router)
app.use(ToastPlugin, {
    position: 'top-right',
    duration: 3000
})


// Đăng ký Layout cho 3 tác nhân: Client, DoiTac, Admin & Blank
app.component("client-layout", ClientLayout);
app.component("default-layout", ClientLayout);
app.component("doitac-layout", DoiTacLayout);
app.component("doi-tac-layout", DoiTacLayout);
app.component("admin-layout", AdminLayout);
app.component("blank-layout", BlankLayout);

app.mount("#app")