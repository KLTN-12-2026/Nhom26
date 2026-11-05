# 🦊 HƯỚNG DẪN GIT TOÀN TẬP
### Dành cho team 5 người — Dự án Laravel API Backend trên GitLab

---

> 🚨 **NGUYÊN TẮC BẤT DI BẤT DỊCH TRƯỚC KHI BẮT ĐẦU CODE (BẮT BUỘC):**
> 1. **TUYỆT ĐỐI KHÔNG CODE TRỰC TIẾP TRÊN NHÁNH `main`!**
> 2. **MỖI KHI BẮT ĐẦU CODE MỘT TÍNH NĂNG/CHỨC NĂNG MỚI:**
>    - Luôn chuyển về `main`: `git checkout main`
>    - Kéo code mới nhất của cả nhóm về: `git pull origin main`
>    - Tạo nhánh mới theo chức năng được giao: `git checkout -b feature/<ten-chuc-nang>`
>    - Chỉ viết code trên nhánh `feature/...` vừa tạo!
> 👉 Xem hướng dẫn chi tiết từng bước tại: [Mục 5 — Quy trình bắt buộc trước khi code](#5-quy-trình-làm-việc-hàng-ngày)

---

## 📌 MỤC LỤC

1. [Git là gì? Tại sao cần dùng?](#1-git-là-gì)
2. [Cài đặt & Cấu hình ban đầu](#2-cài-đặt--cấu-hình)
3. [Mô hình nhánh của dự án](#3-mô-hình-nhánh)
4. [Thiết lập repo GitLab (làm 1 lần)](#4-thiết-lập-repo-gitlab)
5. [Quy trình làm việc hàng ngày](#5-quy-trình-làm-việc-hàng-ngày)
6. [Quy tắc đặt tên branch & commit](#6-quy-tắc-đặt-tên)
7. [Merge Request (MR) trên GitLab](#7-merge-request)
8. [Xử lý Conflict](#8-xử-lý-conflict)
9. [Bảng lệnh Git hay dùng](#9-bảng-lệnh-hay-dùng)
10. [Lỗi phổ biến & cách fix](#10-lỗi-phổ-biến--cách-fix)
11. [Mẹo thực tế](#11-mẹo-thực-tế)
12. [Checklist hàng ngày](#12-checklist)
13. [Cheat Sheet — 1 trang in ra dán lên màn hình](#13-cheat-sheet)

---

## 1. GIT LÀ GÌ?

**Git** là công cụ quản lý phiên bản code. Nó giúp:

- Lưu lịch sử **ai sửa gì, khi nào, ở đâu**
- Nhiều người **làm việc song song** mà không ghi đè lên nhau
- **Quay lại** phiên bản cũ khi code bị lỗi
- **Phân nhánh** để thử tính năng mới mà không ảnh hưởng code đang chạy

**GitLab** là website lưu trữ code Git trên cloud, có giao diện web để review code và quản lý dự án.

### Luồng dữ liệu Git

```
[Máy của bạn]                          [GitLab - Cloud]
─────────────────────────────────────────────────────────
 Working Dir  →(git add)→  Staging  →(git push)→  Remote
    ↑                                      |
    └──────────────(git pull)──────────────┘
```

| Khái niệm | Giải thích |
|---|---|
| **Working Directory** | Thư mục code đang làm việc |
| **Staging Area** | Vùng chuẩn bị commit (sau `git add`) |
| **Local Repository** | Lịch sử commit trên máy bạn |
| **Remote Repository** | Repo trên GitLab |
| **Branch** | Nhánh làm việc độc lập |
| **Commit** | Một bản lưu checkpoint của code |
| **Merge** | Gộp code từ 2 nhánh lại |
| **Pull Request / MR** | Yêu cầu gộp code, được review trước |

---

## 2. CÀI ĐẶT & CẤU HÌNH

### 2.1 — Cài Git

**Windows:** Tải tại https://git-scm.com/download/win → cài theo mặc định

Kiểm tra cài thành công:
```bash
git --version
# Kết quả: git version 2.xx.x
```

### 2.2 — Cấu hình thông tin cá nhân (BẮT BUỘC làm đầu tiên)

```bash
# Đặt tên và email (xuất hiện trong mỗi commit)
git config --global user.name "Nguyễn Văn A"
git config --global user.email "nguyenvana@gmail.com"

# Đặt editor mặc định (dùng VS Code)
git config --global core.editor "code --wait"

# Kiểm tra cấu hình
git config --list
```

> ⚠️ **Quan trọng:** `user.email` phải trùng với email đăng ký GitLab để hiển thị avatar đúng.

### 2.3 — Cấu hình SSH Key (để không nhập password mỗi lần push)

```bash
# Bước 1: Tạo SSH key
ssh-keygen -t ed25519 -C "email@gmail.com"
# Nhấn Enter 3 lần (chấp nhận mặc định)

# Bước 2: Copy public key
# Windows:
type %USERPROFILE%\.ssh\id_ed25519.pub

# Bước 3: Thêm vào GitLab
# GitLab → Avatar → Preferences → SSH Keys → Paste key → Add
```

---

## 3. MÔ HÌNH NHÁNH

Dự án dùng mô hình **Git Flow đơn giản hóa** với 3 loại nhánh:

```
●── main ──────────────────────────────────────● (Production)
     │
     └──● dev ─────────────────────────────────● (Tích hợp)
           │
           ├──● feature/quan-ly-nguyen-lieu ────● (Dev A)
           ├──● feature/phan-quyen-nhan-vien ───● (Dev B)
           ├──● feature/thong-ke-doanh-thu ─────● (Dev C)
           └──● hotfix/loi-dang-nhap ───────────● (Khẩn cấp)
```

### Quy tắc từng nhánh

| Nhánh | Ai push? | Mục đích | Tạo từ đâu? |
|---|---|---|---|
| `main` | **Git Master** (chỉ merge MR) | Code đang chạy thật | — |
| `dev` | **Git Master** (chỉ merge MR) | Tích hợp code cả team | `main` |
| `feature/*` | Mỗi Dev tự push | Làm tính năng mới | `dev` |
| `bugfix/*` | Mỗi Dev tự push | Sửa lỗi trong dev | `dev` |
| `hotfix/*` | Git Master | Vá lỗi khẩn trên production | `main` |

### Vòng đời của một feature

```
dev  →  feature/xxx  →  (MR)  →  dev  →  (MR)  →  main
 ↑         làm việc      review     tích hợp  release
```

---

## 4. THIẾT LẬP REPO GITLAB

> **Chỉ làm 1 lần khi bắt đầu dự án. Một người làm, 4 người còn lại chỉ cần clone.**

### 4.1 — Tạo Project trên GitLab

```
1. Đăng nhập gitlab.com
2. New Project → Create blank project
3. Project name: kltnt12-BE
4. Visibility Level: Private
5. Bỏ tick "Initialize repository with a README"
6. Create project
```

### 4.2 — Đẩy code lên lần đầu (trên máy người tạo repo)

```bash
cd C:\laragon\www\kltnt12\BE

git init
git add .
git commit -m "chore: khởi tạo dự án Laravel"
git branch -M main
git remote add origin git@gitlab.com:ten-nhom/kltnt12-BE.git
git push -u origin main

# Tạo nhánh dev
git checkout -b dev
git push -u origin dev
```

### 4.3 — Tạo file .gitignore (TRƯỚC KHI commit lần đầu)

Tạo file `.gitignore` ở thư mục gốc BE:

```gitignore
# Laravel
/vendor
/node_modules
/public/hot
/public/storage
/storage/*.key
.env
.env.backup
.env.production
.env.testing

# Testing
.phpunit.result.cache
/coverage

# IDE
/.idea
/.vscode
*.sublime-project
*.sublime-workspace

# OS
.DS_Store
Thumbs.db

# Database
*.sqlite
*.sqlite3

# Logs
*.log
/storage/logs/*.log

# Cache
/storage/framework/cache/data/*
/storage/framework/sessions/*
/storage/framework/views/*
/bootstrap/cache/*.php
```

### 4.4 — Protected Branches (Quan trọng!)

```
GitLab → Settings → Repository → Protected Branches

Nhánh: main
  ✅ Allowed to merge: Maintainers only
  ❌ Allowed to push: No one

Nhánh: dev
  ✅ Allowed to merge: Maintainers only
  ❌ Allowed to push: No one
```

> Cài này giúp **không ai push thẳng vào main/dev** được, buộc phải tạo MR.

### 4.5 — Mời thành viên

```
GitLab → Project → Members → Invite Members

Người tạo repo       → Maintainer  (Git Master)
4 thành viên còn lại → Developer
```

### 4.6 — Clone về máy (Mỗi thành viên làm)

```bash
# Chuyển đến thư mục muốn đặt project
cd C:\laragon\www

# Clone repo
git clone git@gitlab.com:ten-nhom/kltnt12-BE.git kltnt12/BE

# Vào thư mục
cd kltnt12/BE

# Kiểm tra remote
git remote -v
# origin  git@gitlab.com:ten-nhom/kltnt12-BE.git (fetch)
# origin  git@gitlab.com:ten-nhom/kltnt12-BE.git (push)

# Xem nhánh có sẵn
git branch -a
# * main
#   remotes/origin/main
#   remotes/origin/dev

# Track nhánh dev về local
git checkout -b dev origin/dev
```

### 4.7 — Cài dependencies sau khi clone

```bash
composer install
cp .env.example .env
php artisan key:generate
# Cấu hình DB trong .env rồi:
php artisan migrate
php artisan db:seed
```

---

## 5. QUY TRÌNH LÀM VIỆC HÀNG NGÀY

> ⚠️ **ĐÂY LÀ PHẦN QUAN TRỌNG NHẤT.** Bắt buộc tuân thủ đúng 100% các bước dưới đây mỗi khi bắt tay vào code!

---

### 🚨 BẮT BUỘC: QUY TRÌNH "PULL MAIN TRƯỚC KHI CODE & TẠO NHÁNH THEO CHỨC NĂNG"

#### ❓ Tại sao BẮT BUỘC phải làm đúng quy trình này?
1. **Tránh xung đột (Merge Conflict) thảm họa:** Trong khi bạn nghỉ hoặc làm việc khác, đồng đội đã merge code mới (tạo bảng mới, cập nhật route, sửa controller...) vào `main`. Nếu không `git pull origin main` trước, nhánh mới của bạn sẽ sinh ra từ code cũ ➔ khi xong merge vào sẽ bị xung đột nặng nề!
2. **Bảo vệ nhánh `main`:** Nhánh `main` là code chuẩn dùng chung của cả nhóm. Tuyệt đối **KHÔNG ĐƯỢC PHÉP CODE TRỰC TIẾP TRÊN `main`**.
3. **Mỗi chức năng một nhánh riêng:** Giúp bạn tự do test, commit, sửa lỗi mà không làm ảnh hưởng đến code của người khác; Git Master cũng dễ dàng review và duyệt code qua Merge Request (MR).

---

#### 📋 CHI TIẾT 6 BƯỚC THỰC HIỆN (LÀM TRƯỚC KHI VIẾT CODE)

```
[B1: git status] ➔ [B2: git checkout main] ➔ [B3: git pull origin main]
                                                        │
[B6: Bắt đầu code] 🠔 [B5: git branch (check)] 🠔 [B4: git checkout -b feature/<chuc-nang>]
```

##### 🔹 Bước 1: Kiểm tra trạng thái hiện tại (Đảm bảo không còn code dở dang)
```bash
git status
```
- Nếu thấy: `nothing to commit, working tree clean` ➔ An toàn, chuyển sang **Bước 2**.
- Nếu có file đang sửa dở mà chưa muốn commit, hãy cất tạm:
  ```bash
  git stash save "luu-tam-truoc-khi-pull-main"
  ```

##### 🔹 Bước 2: Chuyển về nhánh chính `main`
```bash
git checkout main
```
> *(Lưu ý: Nếu nhóm của bạn thống nhất dùng nhánh `dev` để tích hợp hàng ngày thì thay bằng `git checkout dev`)*

##### 🔹 Bước 3: Kéo (Pull) toàn bộ code mới nhất của cả nhóm về máy
```bash
git pull origin main
```
> 💡 Lệnh này sẽ tải toàn bộ commit, file migration, route mới nhất mà các thành viên khác đã merge lên `main`.
> Sau khi pull thành công, nếu thấy có file migration hoặc package mới, hãy chạy nhanh:
> ```bash
> composer install          # Nếu có package mới
> php artisan migrate       # Nếu có migration mới
> ```

##### 🔹 Bước 4: Tạo và chuyển sang nhánh mới theo đúng chức năng được giao
Cú pháp đặt tên nhánh: `feature/<ten-chuc-nang-viet-khong-dau-ngan-cach-bang-dau-gach>`
```bash
git checkout -b feature/<ten-chuc-nang-duoc-giao>
```

**Ví dụ thực tế tương ứng với chức năng được phân công:**
- Bạn được giao làm **Đăng nhập & Quản lý phân quyền**:
  ```bash
  git checkout -b feature/dang-nhap-phan-quyen
  ```
- Bạn được giao làm **Quản lý Nhân viên**:
  ```bash
  git checkout -b feature/quan-ly-nhan-vien
  ```
- Bạn được giao làm **Quản lý Món ăn / Sản phẩm**:
  ```bash
  git checkout -b feature/quan-ly-san-pham
  ```
- Bạn được giao làm **Quản lý Khu vực & Bàn ăn**:
  ```bash
  git checkout -b feature/quan-ly-khu-vuc-ban
  ```
- Bạn được giao làm **Hóa đơn & Thanh toán**:
  ```bash
  git checkout -b feature/thanh-toan-hoa-don
  ```
- Bạn được giao làm **Quản lý Kho & Nguyên liệu**:
  ```bash
  git checkout -b feature/quan-ly-nguyen-lieu
  ```

##### 🔹 Bước 5: Kiểm tra xác nhận đã đứng đúng nhánh chức năng
```bash
git branch
```
Kết quả hiển thị phải có dấu sao `*` màu xanh ở nhánh chức năng của bạn:
```text
* feature/quan-ly-san-pham
  main
```
> ⛔ **CẢNH BÁO QUAN TRỌNG:** Nếu dấu `*` vẫn ở `main` (tức `* main`), **DỪNG LẠI NGAY! KHÔNG ĐƯỢC CODE!** Hãy thực hiện lại lệnh `git checkout -b feature/...` ở Bước 4!

##### 🔹 Bước 6: Bắt đầu viết code cho chức năng được giao
Lúc này bạn đã có một nhánh độc lập chứa toàn bộ code mới nhất của dự án. Hãy bắt tay vào viết code, test API và commit thường xuyên.

---

### 💻 TRONG KHI CODE — Commit thường xuyên

**Xem trạng thái trước khi commit:**
```bash
git status
# On branch feature/quan-ly-nguyen-lieu
# Changes not staged for commit:
#   modified:   routes/api.php
# Untracked files:
#   app/Http/Controllers/NguyenLieuController.php
#   app/Models/NguyenLieu.php
```

**Stage và commit:**
```bash
# Stage file cụ thể (khuyến khích để kiểm soát rõ)
git add app/Models/NguyenLieu.php
git add app/Http/Controllers/NguyenLieuController.php

# Hoặc stage theo thư mục
git add app/

# Hoặc stage tất cả (nhanh nhưng phải chú ý)
git add .

# Xem lại những gì sẽ commit
git status
git diff --staged

# Commit
git commit -m "feat: tạo model NguyenLieu với SoftDeletes và fillable"
```

**Tiếp tục làm và commit nhiều lần:**
```bash
# Commit 1: Tạo migration
git add database/migrations/
git commit -m "migration: tạo bảng nguyen_lieus"

# Commit 2: Tạo model
git add app/Models/NguyenLieu.php
git commit -m "feat: tạo model NguyenLieu"

# Commit 3: Tạo controller
git add app/Http/Controllers/NguyenLieuController.php
git commit -m "feat: tạo NguyenLieuController với đầy đủ CRUD"

# Commit 4: Tạo requests
git add app/Http/Requests/ThemMoiNguyenLieuRequest.php
git add app/Http/Requests/UpdateNguyenLieuRequest.php
git commit -m "feat: tạo Form Request validation cho NguyenLieu"

# Commit 5: Thêm routes
git add routes/api.php
git commit -m "feat: thêm routes nguyên liệu vào api.php"

# Commit 6: Thêm seeder
git add database/seeders/
git commit -m "seed: thêm NguyenLieuSeeder với 10 nguyên liệu mẫu"
```

> 💡 **Nguyên tắc commit:** Mỗi commit làm **1 việc cụ thể**. Commit nhỏ và thường xuyên tốt hơn commit to và hiếm.

---

### ☁️ CUỐI BUỔI — Push lên GitLab

```bash
# Lần đầu push nhánh mới (-u để set upstream)
git push -u origin feature/quan-ly-nguyen-lieu

# Các lần push sau (đã có upstream)
git push

# Kết quả mong đợi:
# Enumerating objects: 15, done.
# Counting objects: 100% (15/15), done.
# To gitlab.com:ten-nhom/kltnt12-BE.git
#  * [new branch]      feature/quan-ly-nguyen-lieu -> feature/quan-ly-nguyen-lieu
```

---

### 🔁 GIỮA CHỪNG — Cập nhật code mới từ dev (khi người khác đã merge)

```bash
# Khi đang ở feature branch và muốn lấy code mới từ dev
git checkout dev
git pull origin dev
git checkout feature/quan-ly-nguyen-lieu
git merge dev

# Nếu có conflict: xem phần 8 để xử lý
# Nếu không có conflict:
git push
```

---

### ✅ HOÀN THÀNH TASK — Tạo Merge Request

```bash
# 1. Cập nhật code mới từ dev lần cuối
git checkout dev
git pull origin dev
git checkout feature/quan-ly-nguyen-lieu
git merge dev

# 2. Resolve conflict nếu có (xem phần 8)

# 3. Push lên GitLab
git push

# 4. Vào GitLab tạo MR (xem phần 7)
```

---

## 6. QUY TẮC ĐẶT TÊN

### 6.1 — Tên Branch

**Format:** `{loại}/{mô-tả-ngắn-kebab-case}`

```bash
# Tính năng mới
feature/quan-ly-nguyen-lieu
feature/them-bao-cao-thong-ke
feature/phan-quyen-theo-chuc-vu
feature/api-hoa-don-thanh-toan
feature/gui-mail-xac-nhan

# Sửa lỗi
bugfix/validate-so-dien-thoai
bugfix/loi-tinh-tong-tien-hoa-don
bugfix/session-het-han-som

# Hotfix khẩn
hotfix/loi-dang-nhap-production
hotfix/sql-injection-nguyen-lieu
```

**Quy tắc:**
- Tất cả **chữ thường**
- Dùng `-` thay khoảng trắng (kebab-case)
- Tên **ngắn gọn** nhưng đủ hiểu (tối đa 5-6 từ)
- **Không dùng** dấu tiếng Việt, ký tự đặc biệt

### 6.2 — Commit Message

**Format:** `<type>: <mô tả ngắn bằng tiếng Việt>`

| Type | Khi nào dùng | Ví dụ |
|---|---|---|
| `feat` | Thêm tính năng mới | `feat: thêm API lấy danh sách nguyên liệu` |
| `fix` | Sửa bug | `fix: sửa lỗi validate số điện thoại` |
| `migration` | Tạo/sửa migration | `migration: tạo bảng nguyen_lieus` |
| `seed` | Tạo/sửa seeder | `seed: thêm 10 nguyên liệu mẫu` |
| `refactor` | Cải thiện code (không thêm tính năng) | `refactor: tối ưu query thống kê` |
| `docs` | Cập nhật tài liệu | `docs: cập nhật CODING_STYLE.md` |
| `chore` | Cài đặt, cấu hình | `chore: cập nhật .gitignore` |
| `test` | Viết test | `test: thêm test cho NguyenLieuController` |
| `merge` | Merge nhánh | `merge: resolve conflict routes/api.php` |

**Ví dụ commit message tốt vs xấu:**

```bash
# ✅ TỐT — rõ ràng, cụ thể
git commit -m "feat: thêm controller NguyenLieuController với đầy đủ getData/store/update/destroy/changeStatus"
git commit -m "fix: sửa lỗi changeStatus không lưu tinh_trang vào DB"
git commit -m "migration: tạo bảng nguyen_lieus với SoftDeletes"

# ❌ XẤU — không rõ ràng
git commit -m "update"
git commit -m "fix bug"
git commit -m "done"
git commit -m "abc"
git commit -m "."
```

---

## 7. MERGE REQUEST

### 7.1 — Tạo MR trên GitLab

```
Vào GitLab repo → Merge Requests → New Merge Request

Source branch: feature/quan-ly-nguyen-lieu
Target branch: dev
→ Click "Compare branches and continue"
```

**Điền thông tin MR:**

```markdown
Title: [feat] Thêm module quản lý nguyên liệu

Description:
## 📋 Đã làm trong MR này
- Tạo migration bảng `nguyen_lieus`
- Tạo Model `NguyenLieu` với SoftDeletes, constants TRANG_THAI
- Tạo `NguyenLieuController` với: getData, store, update, destroy, changeStatus
- Tạo `ThemMoiNguyenLieuRequest` và `UpdateNguyenLieuRequest`
- Thêm routes prefix `/nguyen-lieu` vào api.php (id chức năng 35–39)
- Thêm `NguyenLieuSeeder` và đăng ký trong DatabaseSeeder

## 🧪 Cách test
| Method | URL | Body |
|--------|-----|------|
| GET | /api/nguyen-lieu/get-data | — |
| POST | /api/nguyen-lieu/store | ten_nguyen_lieu, don_vi_tinh, so_luong_ton |
| POST | /api/nguyen-lieu/update | id, ten_nguyen_lieu, ... |
| POST | /api/nguyen-lieu/delete | id |
| POST | /api/nguyen-lieu/change-status | id |

## 📌 Ghi chú
- Middleware checkLogin đã gắn đúng id chức năng
- Validate đầy đủ theo chuẩn CODING_STYLE.md
```

**Cài thêm:**
```
Assignee: @git_master (người review)
Labels: In Progress → Ready (khi gửi)
```

### 7.2 — Review MR (Git Master làm)

```
Vào MR → Tab "Changes"

Review những điều sau:
□ Tên file, class đúng convention?
□ Có SoftDeletes trong Model?
□ Route dùng POST cho delete/update?
□ Response có status 0/1?
□ Validate đầy đủ trong FormRequest?
□ Không có file thừa (.env, vendor/)?

Nếu cần sửa:
→ Click vào dòng code → Comment → Submit review

Nếu OK:
→ Approve → Merge → Delete source branch ✅
```

### 7.3 — Vòng đời MR

```
Tạo MR → In Review → (cần sửa?) → Approved → Merged → Branch xóa
              ↓ yes
         Sửa code → Push → MR tự cập nhật → Review lại
```

---

## 8. XỬ LÝ CONFLICT

Conflict xảy ra khi 2 người **cùng sửa cùng 1 đoạn code** trong cùng 1 file.

### 8.1 — Nhận biết conflict

```bash
git merge dev
# Auto-merging routes/api.php
# CONFLICT (content): Merge conflict in routes/api.php
# Automatic merge failed; fix conflicts and then commit the result.
```

```bash
git status
# Both modified: routes/api.php   ← file bị conflict
```

### 8.2 — Mở file bị conflict

File sẽ có các marker:

```php
// routes/api.php
Route::prefix('san-pham')->group(function () {
    Route::get('/get-data', [SanPhamController::class, 'getData']);
});

<<<<<<< HEAD                          ← Code của bạn
Route::prefix('nguyen-lieu')->group(function () {
    Route::get('/get-data', [NguyenLieuController::class, 'getData']);
});
=======                               ← Ranh giới
Route::prefix('nha-cung-cap')->group(function () {
    Route::get('/get-data', [NhaCungCapController::class, 'getData']);
});
>>>>>>> dev                           ← Code từ dev (người khác làm)
```

### 8.3 — Cách resolve

**Trường hợp 1: Giữ CẢ HAI** (thường gặp nhất với routes/api.php)
```php
// Xóa tất cả marker, giữ cả 2 đoạn code
Route::prefix('nguyen-lieu')->group(function () {
    Route::get('/get-data', [NguyenLieuController::class, 'getData']);
});
Route::prefix('nha-cung-cap')->group(function () {
    Route::get('/get-data', [NhaCungCapController::class, 'getData']);
});
```

**Trường hợp 2: Giữ code của bạn** (code người khác không liên quan)
```php
// Xóa marker và phần "dev", chỉ giữ "HEAD"
Route::prefix('nguyen-lieu')->group(function () {
    Route::get('/get-data', [NguyenLieuController::class, 'getData']);
});
```

**Trường hợp 3: Giữ code từ dev** (code bạn sai, code dev đúng)
```php
// Xóa marker và phần "HEAD", chỉ giữ "dev"
Route::prefix('nha-cung-cap')->group(function () {
    Route::get('/get-data', [NhaCungCapController::class, 'getData']);
});
```

### 8.4 — Sau khi resolve

```bash
# Kiểm tra không còn marker nào
grep -r "<<<<<<" .
grep -r ">>>>>>>" .
# Không có output = OK

# Stage các file đã resolve
git add routes/api.php

# Commit merge
git commit -m "merge: resolve conflict routes/api.php"

# Push
git push
```

### 8.5 — Hủy merge nếu không biết sửa

```bash
# Nếu chưa commit, muốn hủy merge và quay lại
git merge --abort
# Rồi nhờ Git Master hoặc người khác hỗ trợ
```

### 8.6 — Tips tránh conflict

| Mẹo | Giải thích |
|---|---|
| **Mỗi người 1 module** | Dev A làm NguyenLieu, Dev B làm NhaCungCap, ít chạm file nhau |
| **Pull dev mỗi sáng** | Cập nhật liên tục, conflict nhỏ hơn |
| **Commit nhỏ, push thường** | Dễ trace và resolve hơn |
| **Thông báo trên chat** | "Tôi đang sửa routes/api.php" → người khác biết tránh |

---

## 9. BẢNG LỆNH HAY DÙNG

### 9.1 — Xem trạng thái

```bash
git status                      # Xem file đã thay đổi
git status -s                   # Dạng ngắn gọn
git log --oneline -10           # Xem 10 commit gần nhất
git log --oneline --graph --all # Xem lịch sử dạng cây tất cả nhánh
git log --author="Tên Bạn" --oneline  # Xem commit của bạn
git diff                        # Xem thay đổi chưa stage
git diff --staged               # Xem thay đổi đã stage (sắp commit)
git diff dev feature/xxx        # So sánh 2 nhánh
```

### 9.2 — Nhánh

```bash
git branch                      # Xem nhánh local
git branch -a                   # Xem cả nhánh remote
git branch -v                   # Xem nhánh + commit mới nhất
git checkout dev                # Chuyển sang nhánh dev
git checkout -b feature/xxx     # Tạo + chuyển sang nhánh mới
git checkout -b dev origin/dev  # Track nhánh từ remote về local
git branch -d feature/xxx       # Xóa nhánh local (đã merge)
git branch -D feature/xxx       # Xóa nhánh local (chưa merge, cưỡng ép)
git push origin --delete feature/xxx  # Xóa nhánh trên remote
```

### 9.3 — Commit

```bash
git add file.php                # Stage 1 file
git add app/                    # Stage cả thư mục
git add .                       # Stage tất cả thay đổi
git add -p                      # Stage từng phần (interactive)
git reset HEAD file.php         # Unstage file
git commit -m "feat: mô tả"    # Commit
git commit --amend              # Sửa commit message cuối (CHƯA push)
git commit --amend --no-edit    # Sửa nội dung commit cuối (giữ message)
```

### 9.4 — Đồng bộ remote

```bash
git fetch origin                 # Tải metadata từ remote (chưa merge)
git pull origin dev              # Fetch + merge dev về nhánh hiện tại
git pull --rebase origin dev     # Fetch + rebase (lịch sử sạch hơn)
git push                         # Push nhánh hiện tại
git push -u origin feature/xxx   # Push + set upstream (lần đầu)
git push --force-with-lease      # Force push an toàn (chỉ nhánh cá nhân)
```

### 9.5 — Hủy thay đổi

```bash
# Chưa stage
git checkout -- file.php         # Hủy thay đổi 1 file (cũ)
git restore file.php             # Hủy thay đổi 1 file (mới)

# Đã stage nhưng chưa commit
git reset HEAD file.php          # Unstage 1 file
git restore --staged file.php    # Unstage 1 file (mới)

# Đã commit (chưa push)
git reset HEAD~1                 # Hủy commit cuối, giữ code ở staged
git reset HEAD~1 --soft          # Hủy commit cuối, giữ code ở working dir
git reset HEAD~1 --hard          # Hủy commit cuối, XÓA code (nguy hiểm!)

# Đã push (không nên làm, hỏi Git Master)
git revert HEAD                  # Tạo commit đảo ngược (an toàn hơn)
```

### 9.6 — Stash (cất code tạm)

```bash
git stash                        # Cất code đang làm vào kho tạm
git stash save "mô tả"           # Cất với mô tả
git stash list                   # Xem danh sách đã cất
git stash pop                    # Lấy ra và xóa stash mới nhất
git stash apply stash@{0}        # Lấy ra stash cụ thể (giữ stash)
git stash drop stash@{0}         # Xóa stash cụ thể
git stash clear                  # Xóa tất cả stash
```

**Dùng khi nào?**
```bash
# Đang code dở feature A, leader gọi "fix gấp feature B"
git stash save "đang làm feature A dở"
git checkout feature/fix-gap-feature-B
# ... sửa xong ...
git checkout feature/quan-ly-nguyen-lieu
git stash pop
# Tiếp tục làm feature A
```

### 9.7 — Lấy file từ nhánh khác

```bash
# Lấy 1 file từ nhánh dev về nhánh hiện tại
git checkout dev -- app/Models/SanPham.php

# Lấy 1 file từ commit cụ thể
git checkout abc1234 -- routes/api.php
```

---

## 10. LỖI PHỔ BIẾN & CÁCH FIX

---

### ❌ Lỗi 1: Không push được vì remote có code mới hơn

```
error: failed to push some refs
hint: Updates were rejected because the remote contains work that you do not have locally.
```

**Fix:**
```bash
git pull origin feature/ten-nhanh
# Resolve conflict nếu có
git push
```

---

### ❌ Lỗi 2: Push bị cấm vào main/dev (Protected Branch)

```
remote: GitLab: You are not allowed to push code to protected branches on this project.
```

**Fix:** Đây là đúng! Bạn phải tạo feature branch và tạo MR, không push thẳng vào main/dev.

```bash
# Sai: đang ở nhánh dev cố push
# Đúng:
git checkout -b feature/ten-tinh-nang
git push -u origin feature/ten-tinh-nang
# Rồi tạo MR
```

---

### ❌ Lỗi 3: Commit nhầm vào nhánh dev (chưa push)

```bash
# Lấy code vừa commit về staging area
git reset HEAD~1

# Cất code lại
git stash

# Tạo đúng nhánh
git checkout -b feature/ten-dung

# Lấy code ra
git stash pop

# Commit lại đúng nhánh
git add .
git commit -m "feat: ..."
git push -u origin feature/ten-dung
```

---

### ❌ Lỗi 4: Commit nhầm file .env

```bash
# Xóa .env khỏi tracking
git rm --cached .env
git commit -m "chore: xóa .env khỏi git tracking"

# Đảm bảo .env có trong .gitignore
echo ".env" >> .gitignore
git add .gitignore
git commit -m "chore: thêm .env vào .gitignore"
git push
```

> ⚠️ Nếu đã push .env lên remote → **đổi ngay tất cả credentials** (DB pass, API key...) vì đã bị lộ!

---

### ❌ Lỗi 5: Push vendor/ hoặc node_modules/ lên

```bash
# Xóa khỏi tracking
git rm -r --cached vendor/
git rm -r --cached node_modules/

git commit -m "chore: xóa vendor/ và node_modules/ khỏi git"
git push
```

---

### ❌ Lỗi 6: Quên pull dev trước khi tạo feature branch

```bash
# Phát hiện nhánh của mình đang thiếu commit từ dev
git log --oneline dev..feature/ten-nhanh  # Xem commit mình có mà dev không
git log --oneline feature/ten-nhanh..dev  # Xem commit dev có mà mình không

# Merge dev vào nhánh của mình
git merge dev
# Resolve conflict nếu có
```

---

### ❌ Lỗi 7: Muốn xem ai viết dòng code gây lỗi

```bash
git blame app/Http/Controllers/NguyenLieuController.php
# Hiển thị: commit hash | tên người | ngày | dòng code
```

---

### ❌ Lỗi 8: Lỡ xóa file quan trọng

```bash
# Lấy lại file từ commit trước
git checkout HEAD~1 -- app/Models/NguyenLieu.php
# hoặc
git checkout abc1234 -- app/Models/NguyenLieu.php
```

---

### ❌ Lỗi 9: Nhánh dev bị lỗi, muốn reset về trạng thái remote

```bash
# CHỈ LÀM NẾU LÀ GIT MASTER
git checkout dev
git fetch origin
git reset --hard origin/dev
```

---

## 11. MẸO THỰC TẾ

### Alias — Viết lệnh ngắn hơn

```bash
# Thêm vào git config
git config --global alias.st "status"
git config --global alias.co "checkout"
git config --global alias.br "branch"
git config --global alias.cm "commit -m"
git config --global alias.lg "log --oneline --graph --all -20"
git config --global alias.undo "reset HEAD~1"

# Dùng:
git st          # thay git status
git co dev      # thay git checkout dev
git lg          # xem lịch sử đẹp
```

### Xem lịch sử đẹp hơn

```bash
git log --oneline --graph --decorate --all
# Hoặc dùng alias lg đã cài ở trên
```

### Tìm commit theo nội dung

```bash
# Tìm commit chứa từ "nguyen lieu"
git log --all --grep="nguyen lieu"

# Tìm commit đã thêm/xóa dòng code cụ thể
git log -S "NguyenLieuController" --oneline
```

### So sánh branch với dev

```bash
# Xem commit nào trong feature chưa có ở dev
git log dev..feature/quan-ly-nguyen-lieu --oneline

# Xem file nào đã thay đổi
git diff dev...feature/quan-ly-nguyen-lieu --name-only
```

### Tags — Đánh dấu phiên bản release

```bash
# Tạo tag có chú thích
git tag -a v1.0.0 -m "Release v1.0.0 - CRUD cơ bản hoàn thiện"
git push origin v1.0.0

# Xem danh sách tags
git tag

# Checkout về 1 version cũ
git checkout v1.0.0
```

---

## 12. CHECKLIST

### ✅ Đầu buổi làm việc (BẮT BUỘC TRƯỚC KHI CODE)

```
□ git status (kiểm tra không còn code dở dang)
□ git checkout main (hoặc dev theo quy ước nhóm)
□ git pull origin main (kéo code mới nhất cả nhóm về)
□ git checkout -b feature/ten-chuc-nang (TẠO NHÁNH MỚI theo chức năng được giao)
□ git branch (xác nhận dấu * đang ở nhánh feature/...)
```

### ✅ Khi commit

```
□ git status (xem đúng file chưa)
□ git diff --staged (xem code thay đổi)
□ Không có file .env, vendor/, *.log trong staged
□ Commit message đúng format: "feat: mô tả tiếng Việt"
```

### ✅ Cuối buổi làm việc

```
□ git push (đẩy code lên remote)
□ Báo team trên chat những gì đã làm hôm nay
```

### ✅ Trước khi tạo MR

```
□ git pull origin main && git merge main (lấy code mới nhất vào nhánh mình)
□ Resolve conflict nếu có
□ Test lại toàn bộ API mình vừa viết
□ git push
□ Tạo MR với description đầy đủ
□ Assign cho Git Master
```

---

## 13. CHEAT SHEET

> In ra và dán lên màn hình 🖨️

```
┌─────────────────────────────────────────────────────────────┐
│                    GIT CHEAT SHEET                          │
├─────────────────┬───────────────────────────────────────────┤
│ BẮT ĐẦU TASK    │ git checkout main                        │
│ (QUAN TRỌNG     │ git pull origin main                      │
│  NHẤT)          │ git checkout -b feature/ten-chuc-nang     │
├─────────────────┼───────────────────────────────────────────┤
│ CODE XONG 1 PHẦN│ git add .                                 │
│                 │ git commit -m "feat: mô tả"               │
├─────────────────┼───────────────────────────────────────────┤
│ CUỐI BUỔI       │ git push                                  │
│ (lần đầu)       │ git push -u origin feature/ten-chuc-nang  │
├─────────────────┼───────────────────────────────────────────┤
│ LẤY CODE MỚI    │ git checkout main                         │
│ VÀO NHÁNH MÌNH  │ git pull origin main                      │
│                 │ git checkout feature/ten-chuc-nang        │
│                 │ git merge main                            │
├─────────────────┼───────────────────────────────────────────┤
│ XEM NHANH       │ git status    → file thay đổi            │
│                 │ git log -5    → 5 commit gần nhất         │
│                 │ git branch    → nhánh hiện tại            │
├─────────────────┼───────────────────────────────────────────┤
│ HỦY THAY ĐỔI    │ git restore file.php  → chưa stage       │
│                 │ git reset HEAD file   → đã stage          │
│                 │ git reset HEAD~1      → đã commit         │
├─────────────────┼───────────────────────────────────────────┤
│ CẤT CODE TẠM    │ git stash             → cất đi           │
│                 │ git stash pop         → lấy ra            │
├─────────────────┼───────────────────────────────────────────┤
│ CONFLICT        │ Mở file → xóa marker → giữ code đúng     │
│                 │ git add file.php                          │
│                 │ git commit -m "merge: resolve conflict"   │
├─────────────────┼───────────────────────────────────────────┤
│ COMMIT FORMAT   │ feat / fix / migration / seed /           │
│                 │ refactor / docs / chore / merge           │
└─────────────────┴───────────────────────────────────────────┘
```

---

*Tài liệu: GIT_WORKFLOW.md | Dự án kltnt12 | Cập nhật: 2026-10-03*
