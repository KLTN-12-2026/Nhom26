# 📘 HƯỚNG DẪN PHONG CÁCH VIẾT CODE — Laravel API Backend

> **Mục đích:** Tài liệu này mô tả **toàn bộ phong cách viết code** của dự án Laravel API backend.
> Bất kỳ agent hoặc lập trình viên nào làm việc trên dự án này **phải đọc và tuân thủ tuyệt đối** các quy tắc dưới đây.

---

> 🚨 **QUY TẮC GIT BẮT BUỘC TRƯỚC KHI BẮT ĐẦU CODE BẤT KỲ TÍNH NĂNG NÀO:**
> **TUYỆT ĐỐI KHÔNG CODE TRỰC TIẾP TRÊN NHÁNH `main`!**
> Mỗi khi bắt đầu làm một tính năng mới được giao, bắt buộc thực hiện 3 bước:
> 1. `git checkout main`
> 2. `git pull origin main` *(kéo code mới nhất cả nhóm về máy)*
> 3. `git checkout -b feature/<ten-chuc-nang-duoc-giao>` *(tạo nhánh riêng theo chức năng)*
> 👉 Xem chi tiết toàn bộ quy trình Git tại: [`GIT_WORKFLOW.md`](file:///c:/laragon/www/kltnt12/BE/GIT_WORKFLOW.md)

---

## 📁 1. CẤU TRÚC THƯ MỤC

```
app/
├── Http/
│   ├── Controllers/     # Toàn bộ controller xử lý logic API
│   ├── Middleware/      # Middleware xác thực & phân quyền
│   └── Requests/        # Form Request validation (ThemMoi... & Update...)
├── Jobs/                # Queue jobs (gửi mail, tác vụ nền)
├── Models/              # Eloquent Models
└── Providers/

database/
├── migrations/          # Migration tạo bảng
├── seeders/             # Seeder dữ liệu mẫu (mỗi bảng 1 file riêng)
└── factories/

routes/
└── api.php              # Toàn bộ route API
```

---

## 🏷️ 2. QUY TẮC ĐẶT TÊN (NAMING CONVENTION)

### 2.1 — Tên file & Class (PascalCase tiếng Việt)

| Loại file | Quy tắc đặt tên | Ví dụ |
|---|---|---|
| **Model** | PascalCase, tên thực thể tiếng Việt | `NhanVien`, `SanPham`, `HoaDon` |
| **Controller** | `{TênThựcThể}Controller` | `NhanVienController`, `SanPhamController` |
| **Request (thêm mới)** | `ThemMoi{TênThựcThể}Request` | `ThemMoiNhanVienRequest` |
| **Request (cập nhật)** | `Update{TênThựcThể}Request` | `UpdateNhanVienRequest` |
| **Migration** | `{timestamp}_create_{ten_bang}_table` | `2026_06_02_000004_create_nhan_viens_table` |
| **Seeder** | `{TênThựcThể}Seeder` | `NhanVienSeeder`, `SanPhamSeeder` |
| **Job** | `{tênHànhĐộng}Job` (camelCase) | `sendMailJob` |
| **Middleware** | `{tênMiddleware}MiddleWare` (camelCase) | `checkLoginMiddleWare` |

### 2.2 — Tên bảng database (snake_case tiếng Việt, số nhiều)

```
nhan_viens, san_phams, hoa_dons, chi_tiet_hoa_dons,
khu_vuc_bans, phan_cong_ca_lams, phieu_nhap_khos, ...
```

### 2.3 — Tên cột trong bảng (snake_case tiếng Việt)

```
ho_va_ten, so_dien_thoai, tinh_trang, id_chuc_vu,
ma_hoa_don, tong_tien, gia_ban, ten_san_pham, ...
```

### 2.4 — Tên biến trong PHP (camelCase tiếng Việt)

```php
$nhanVien, $sanPham, $hoaDon, $chiTiet, $tuNgay, $denNgay, $khachHang
```

### 2.5 — Route URL (kebab-case tiếng Việt)

```
/nhan-vien, /san-pham, /hoa-don, /khu-vuc-ban,
/chi-tiet-hoa-don, /phan-cong-ca-lam, /phieu-nhap-kho
```

---

## 🗺️ 3. ROUTES (api.php)

### 3.1 — Cấu trúc tổng thể

Toàn bộ API được bọc trong **1 prefix group chính** là `/api` (mặc định Laravel), sau đó **mỗi module dùng `Route::prefix()`**.

```php
// routes/api.php
Route::group([], function () {

    // Auth (không cần middleware)
    Route::prefix('nhan-vien')->group(function () {
        Route::post('/dang-nhap', [NhanVienController::class, 'login']);
        Route::post('/quen-mat-khau', [NhanVienController::class, 'quenMatKhau']);
        Route::post('/dat-mat-khau-moi', [NhanVienController::class, 'datMatKhauMoi']);
        Route::get('/check-login', [NhanVienController::class, 'checkLogin']);
    });

    // Các route cần đăng nhập + phân quyền
    Route::prefix('nhan-vien')->group(function () {
        Route::get('/get-data', [NhanVienController::class, 'getData'])->middleware('checkLogin:1');
        Route::post('/store', [NhanVienController::class, 'store'])->middleware('checkLogin:2');
        Route::post('/delete', [NhanVienController::class, 'destroy'])->middleware('checkLogin:3');
        Route::post('/update', [NhanVienController::class, 'update'])->middleware('checkLogin:4');
        Route::post('/change-status', [NhanVienController::class, 'changeStatus'])->middleware('checkLogin:5');
    });
});
```

### 3.2 — Quy tắc HTTP Method

| Action | Method | Endpoint |
|---|---|---|
| Lấy danh sách | `GET` | `/get-data` |
| Lấy danh sách active | `GET` | `/get-data-active` |
| Thêm mới | `POST` | `/store` |
| Xoá | `POST` | `/delete` |
| Cập nhật | `POST` | `/update` |
| Đổi trạng thái | `POST` | `/change-status` |
| Các action đặc biệt | `GET/POST` | `/ten-hanh-dong` (kebab-case tiếng Việt) |

> ⚠️ **Lưu ý quan trọng:** Action **xoá (`destroy`)** dùng `POST`, không dùng `DELETE`. Tương tự **cập nhật** dùng `POST`, không dùng `PUT/PATCH`.

### 3.3 — Middleware checkLogin với số ID chức năng

Mỗi route được bảo vệ bằng middleware `checkLogin:{id_chuc_nang}`.
Số `id_chuc_nang` là ID của chức năng trong bảng `chuc_nangs`, dùng để kiểm tra phân quyền theo chức vụ.

```php
Route::get('/get-data', [NhanVienController::class, 'getData'])->middleware('checkLogin:1');
//                                                                                        ^ ID chức năng
```

### 3.4 — Route với tham số URL

```php
// Tham số động dùng {ten_tham_so} (snake_case tiếng Việt)
Route::get('/mo-ban/{id_ban}', [HoaDonController::class, 'moBan'])->middleware('checkLogin:113');
Route::get('/get-hoa-don/{id_ban}', [HoaDonController::class, 'getHoaDonTheoBan'])->middleware('checkLogin:118');
Route::get('/in-hoa-don/{id}', [HoaDonController::class, 'inHoaDon'])->middleware('checkLogin:122');
```

---

## 🎮 4. CONTROLLER

### 4.1 — Khai báo namespace & import

```php
<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Http\Requests\ThemMoiNhanVienRequest;
use App\Http\Requests\UpdateNhanVienRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Thêm các use cần thiết khác
```

> **Quy tắc:** Import đúng những gì dùng, không import thừa.

### 4.2 — Class Controller

```php
class NhanVienController extends Controller
{
    // Không có constructor
    // Không dùng dependency injection vào constructor
    // Logic xử lý trực tiếp trong từng method
}
```

### 4.3 — Phương thức getData() — Lấy danh sách

```php
public function getData()
{
    $data = SanPham::select(
        'san_phams.id',
        'san_phams.ten_san_pham',
        'san_phams.slug_san_pham',
        'san_phams.gia_ban',
        'san_phams.tinh_trang',
        'san_phams.id_danh_muc'
    )->get();

    return response()->json([
        'data' => $data
    ]);
}
```

**Quy tắc:**
- Luôn dùng `->select()` để chỉ định rõ các cột cần lấy, **tên bảng.tên_cột** đầy đủ
- Trả về JSON với key `'data'` chứa kết quả
- Không có `'status'` trong response `getData()` thông thường
- Nếu có `join`, dùng `Model::join(...)->select(...)->get()`

### 4.4 — Phương thức store() — Thêm mới

```php
public function store(ThemMoiNhanVienRequest $request)
{
    NhanVien::create([
        'email'         => $request->email,
        'ho_va_ten'     => $request->ho_va_ten,
        'password'      => bcrypt($request->password),
        'so_dien_thoai' => $request->so_dien_thoai,
        'tinh_trang'    => $request->tinh_trang,
        'id_chuc_vu'    => $request->id_chuc_vu,
    ]);

    return response()->json([
        'message' => 'Đã tạo mới nhân viên thành công!',
        'status'  => 1,
    ]);
}
```

**Quy tắc:**
- Nhận `ThemMoi{TênThực thể}Request` làm tham số (tự động validate)
- Dùng `Model::create([...])` với array map rõ ràng từng field
- Response thành công: `{ 'message' => '...thành công!', 'status' => 1 }`
- Password phải dùng `bcrypt()`

### 4.5 — Phương thức destroy() — Xoá (Soft Delete)

```php
public function destroy(Request $request)
{
    $item = NhanVien::find($request->id);
    if ($item) {
        // Kiểm tra điều kiện đặc biệt trước khi xoá
        if ($item->is_master == 1) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không thể xoá tài khoản Quản trị viên tối cao (is_master)!',
            ]);
        }

        $item->delete();

        return response()->json([
            'status'  => 1,
            'message' => 'Xoá thành công!',
        ]);
    }

    return response()->json([
        'status'  => 0,
        'message' => 'Không tìm thấy dữ liệu!',
    ]);
}
```

**Quy tắc:**
- Nhận `Request $request` (không dùng Form Request riêng)
- Dùng `Model::find($request->id)` để tìm
- Kiểm tra `if ($item)` trước khi thao tác
- Nếu không tìm thấy: `{ 'status' => 0, 'message' => 'Không tìm thấy dữ liệu!' }`
- Nếu xoá thành công: `{ 'status' => 1, 'message' => 'Xoá thành công!' }`

### 4.6 — Phương thức update() — Cập nhật

**Cách 1:** Dùng `Model::where()->update([...])` — đơn giản, nhanh:
```php
public function update(UpdateSanPhamRequest $request)
{
    SanPham::where('id', $request->id)->update([
        'ten_san_pham' => $request->ten_san_pham,
        'gia_ban'      => $request->gia_ban,
        'tinh_trang'   => $request->tinh_trang,
    ]);

    return response()->json([
        'status'  => 1,
        'message' => 'Cập nhật sản phẩm thành công!',
    ]);
}
```

**Cách 2:** Dùng `find()` + kiểm tra + `->update([...])` — khi cần validate tồn tại:
```php
public function update(UpdateNhanVienRequest $request)
{
    $employee = NhanVien::find($request->id);
    if (!$employee) {
        return response()->json([
            'status'  => 0,
            'message' => 'Nhân viên không tồn tại!',
        ]);
    }

    if ($employee->is_master == 1) {
        return response()->json([
            'status'  => 0,
            'message' => 'Không thể cập nhật thông tin của tài khoản Quản trị viên tối cao (is_master)!',
        ]);
    }

    $employee->update([
        'email'         => $request->email,
        'ho_va_ten'     => $request->ho_va_ten,
        'so_dien_thoai' => $request->so_dien_thoai,
        'tinh_trang'    => $request->tinh_trang,
        'id_chuc_vu'    => $request->id_chuc_vu,
    ]);

    return response()->json([
        'status'  => 1,
        'message' => 'Đã cập nhật nhân viên thành công!',
    ]);
}
```

### 4.7 — Phương thức changeStatus() — Đổi trạng thái

```php
public function changeStatus(Request $request)
{
    $sanPham = SanPham::find($request->id);
    if ($sanPham) {
        $sanPham->tinh_trang = $sanPham->tinh_trang == 1 ? 0 : 1;
        $sanPham->save();
        return response()->json([
            'status'  => 1,
            'message' => 'Đã thay đổi trạng thái sản phẩm thành công!',
        ]);
    }
    return response()->json([
        'status'  => 0,
        'message' => 'Không tìm thấy dữ liệu!',
    ]);
}
```

**Quy tắc:**
- Dùng **toán tử 3 ngôi** để toggle: `$model->tinh_trang = $model->tinh_trang == 1 ? 0 : 1;`
- Dùng `->save()` (không phải `->update([...])`)

### 4.8 — Phương thức dùng Auth (Sanctum)

```php
// Lấy user đang đăng nhập
$user = Auth::guard('sanctum')->user();

// Kiểm tra đăng nhập
if ($user) {
    // ... xử lý
} else {
    return response()->json([
        'status'  => 0,
        'message' => 'Bạn chưa đăng nhập!'
    ]);
}
```

> **Guard luôn dùng:** `Auth::guard('sanctum')` hoặc `Auth::guard('nv')` cho login nhân viên.

### 4.9 — JOIN query

```php
// Dùng Model::join() chuỗi phương thức
$data = NhanVien::join('chuc_vus', 'nhan_viens.id_chuc_vu', '=', 'chuc_vus.id')
    ->where('nhan_viens.id', $user->id)
    ->select('nhan_viens.ho_va_ten', 'chuc_vus.ten_chuc_vu')
    ->first();

// leftJoin khi dữ liệu có thể null
$hoaDon = HoaDon::leftJoin('khach_hangs', 'hoa_dons.id_khach_hang', 'khach_hangs.id')
    ->select('hoa_dons.*', 'khach_hangs.ho_va_ten')
    ->where('hoa_dons.id_ban', $id_ban)
    ->first();
```

### 4.10 — Response format chuẩn

```php
// Thành công (có data)
return response()->json([
    'status' => 1,
    'data'   => $data,
]);

// Thành công (có message)
return response()->json([
    'status'  => 1,
    'message' => 'Thao tác thành công!',
]);

// Thất bại
return response()->json([
    'status'  => 0,
    'message' => 'Mô tả lỗi cụ thể!',
]);

// getData không cần status
return response()->json([
    'data' => $data,
]);
```

**Quy tắc quan trọng:**
- `status: 1` = thành công
- `status: 0` = thất bại / lỗi / không có quyền
- Không dùng HTTP status code khác ngoài `200` (mặc định)

---

## 🗄️ 5. MODEL

### 5.1 — Cấu trúc Model chuẩn

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanPham extends Model
{
    use SoftDeletes;

    // Constants cho trạng thái (luôn có 2 hằng này nếu có cột tinh_trang)
    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    // Khai báo tên bảng rõ ràng (bắt buộc)
    protected $table = 'san_phams';

    // Fillable liệt kê đầy đủ các cột (trừ id, timestamps, deleted_at)
    protected $fillable = [
        'ten_san_pham',
        'slug_san_pham',
        'ma_code',
        'mo_ta',
        'kich_thuoc',
        'gia_ban',
        'hinh_anh',
        'tinh_trang',
        'id_danh_muc',
    ];
}
```

### 5.2 — Model cho Auth (NhanVien)

```php
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhanVien extends Authenticatable
{
    use Notifiable, SoftDeletes, HasApiTokens, HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'nhan_viens';

    protected $fillable = [
        'email',
        'ho_va_ten',
        'password',
        'so_dien_thoai',
        'tinh_trang',
        'id_chuc_vu',
        'hash_reset',
    ];
}
```

### 5.3 — Quy tắc Model

- **Luôn khai báo** `protected $table` rõ ràng (không để Laravel tự đoán)
- **Luôn dùng** `SoftDeletes` cho các model nghiệp vụ chính
- **Không viết relationship** (`hasMany`, `belongsTo`) — join bằng query trong Controller
- **Không viết scope**, accessor, mutator — xử lý thẳng trong Controller
- **Luôn có** 2 hằng `TRANG_THAI_TAM_TAT = 0` và `TRANG_THAI_HOAT_DONG = 1` nếu có cột `tinh_trang`
- Model kế thừa `Model`, riêng model Auth kế thừa `Authenticatable`

---

## ✅ 6. FORM REQUEST (VALIDATION)

### 6.1 — Request thêm mới: `ThemMoi{TênThựcThể}Request`

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemMoiSanPhamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Luôn là true, phân quyền do middleware xử lý
    }

    public function rules(): array
    {
        return [
            'ten_san_pham' => 'required|string|max:255',
            'gia_ban'      => 'required|integer',
            'tinh_trang'   => 'required|integer',
            'id_danh_muc'  => 'required|integer|exists:danh_mucs,id',
            'hinh_anh'     => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'required'       => ':attribute không được để trống.',
            'integer'        => ':attribute phải là số nguyên.',
            'numeric'        => ':attribute phải là số.',
            'email'          => ':attribute không đúng định dạng email.',
            'date'           => ':attribute phải là ngày hợp lệ.',
            'string'         => ':attribute phải là chuỗi.',
            'exists'         => ':attribute không tồn tại.',
            'max'            => ':attribute không được vượt quá :max ký tự.',
            'unique'         => ':attribute đã tồn tại.',
            'regex'          => ':attribute không đúng định dạng.',
            'min'            => ':attribute phải tối thiểu :min.',
            'after_or_equal' => ':attribute phải sau hoặc bằng ngày bắt đầu.',
        ];
    }

    public function attributes(): array
    {
        return [
            'ten_san_pham' => 'Tên sản phẩm',
            'gia_ban'      => 'Giá bán',
            'tinh_trang'   => 'Tình trạng',
            'id_danh_muc'  => 'Mã danh mục',
            'hinh_anh'     => 'Hình ảnh',
        ];
    }
}
```

### 6.2 — Request cập nhật: `Update{TênThựcThể}Request`

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSanPhamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'           => 'required|integer|exists:san_phams,id', // Bắt buộc có id
            'ten_san_pham' => 'required|string|max:255',
            'gia_ban'      => 'required|integer',
            'tinh_trang'   => 'required|integer',
            'id_danh_muc'  => 'required|integer|exists:danh_mucs,id',
            // unique phải bỏ qua chính nó: unique:ten_bang,cot,$this->id
            'email'        => 'required|email|unique:nhan_viens,email,' . $this->id,
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'ID không được để trống.',
            'id.integer'  => 'ID phải là số nguyên.',
            'id.exists'   => 'ID không tồn tại.',
            'required'    => ':attribute không được để trống.',
            'integer'     => ':attribute phải là số nguyên.',
            'exists'      => ':attribute không tồn tại.',
            'max'         => ':attribute không được vượt quá :max ký tự.',
        ];
    }
}
```

### 6.3 — Quy tắc Validation

- `authorize()` luôn `return true;`
- `messages()` phải có: dùng `:attribute` placeholder (không hardcode tên field)
- `attributes()` đặt tên tiếng Việt cho từng field (chỉ cần trong ThemMoi)
- `exists:ten_bang,id` — validate khóa ngoại tồn tại
- `unique:ten_bang,cot` — cho ThemMoi
- `unique:ten_bang,cot,$this->id` — cho Update (bỏ qua chính nó)
- Số điện thoại: `regex:/^(0)[0-9]{9}$/`
- Password: `min:6`

---

## 🛡️ 7. MIDDLEWARE

### 7.1 — checkLoginMiddleWare

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ChiTietPhanQuyen;

class checkLoginMiddleWare
{
    public function handle(Request $request, Closure $next, $id_chuc_nang = null): Response
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            $id_quyen    = $user->id_chuc_vu;
            $check_quyen = ChiTietPhanQuyen::where('id_quyen', $id_quyen)
                                           ->where('id_chuc_nang', $id_chuc_nang)
                                           ->first();

            if (!$check_quyen && $user->is_master != 1) {
                return response()->json([
                    'message' => 'Bạn không có quyền thực hiện chức năng này',
                    'status'  => 0,
                ]);
            }
            return $next($request);
        } else {
            return response()->json([
                'status'   => 0,
                'messages' => 'Bạn chưa đăng nhập',
            ], 200);
        }
    }
}
```

**Logic phân quyền:**
- Lấy `id_chuc_vu` của user đang đăng nhập
- Kiểm tra `chi_tiet_phan_quyens` xem chức vụ đó có quyền `id_chuc_nang` không
- `is_master == 1` → bypass mọi phân quyền (admin tối cao)
- Trả về HTTP 200 dù là lỗi (không dùng 401, 403)

---

## 🔄 8. JOBS (Queue)

### 8.1 — sendMailJob

```php
<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class sendMailJob implements ShouldQueue
{
    use Queueable;

    public $mail_to;
    public $mail_subject;
    public $mail_view;
    public $mail_data;

    public function __construct($mail_to, $mail_subject, $mail_view, $mail_data)
    {
        $this->mail_to      = $mail_to;
        $this->mail_subject = $mail_subject;
        $this->mail_view    = $mail_view;
        $this->mail_data    = $mail_data;
    }

    public function handle(): void
    {
        Mail::send($this->mail_view, ['data' => $this->mail_data], function ($message) {
            $message->to($this->mail_to);
            $message->subject($this->mail_subject);
        });
    }
}
```

**Cách dispatch:**
```php
// Cách 1: Static helper
sendMailJob::dispatch($email, $subject, 'view_name', $data);

// Cách 2: dispatch()
dispatch(new sendMailJob($email, $subject, 'view_name', $data));
```

---

## 🗃️ 9. MIGRATION

### 9.1 — Cấu trúc migration chuẩn

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ten_bangs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_truong');
            $table->text('mo_ta');
            $table->integer('gia_ban');
            $table->integer('tinh_trang')->default(1); // 1: active, 0: inactive
            $table->integer('id_bang_khac');           // Khóa ngoại (không dùng foreignId)
            $table->string('truong_nullable')->nullable();
            $table->softDeletes();                     // Bắt buộc cho bảng nghiệp vụ
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ten_bangs');
    }
};
```

### 9.2 — Quy tắc Migration

- **Tên bảng:** snake_case tiếng Việt, số nhiều (vd: `nhan_viens`, `san_phams`)
- **Không dùng** `$table->foreignId()` hay `$table->foreign()` — chỉ dùng `$table->integer('id_xxx')`
- **Luôn có** `$table->softDeletes()` với bảng nghiệp vụ chính
- **Luôn có** `$table->timestamps()`
- **Cột trạng thái:** `$table->integer('tinh_trang')->default(1)`
- **Thứ tự cột:** id → cột nghiệp vụ → tinh_trang → id ngoại → softDeletes → timestamps
- **Timestamp migration:** đánh số thứ tự X để kiểm soát thứ tự chạy

---

## 🌱 10. SEEDER

### 10.1 — DatabaseSeeder (điều phối)

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\NhanVien;
// Import tất cả Models cần truncate...

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Bước 1: Tắt FK check để truncate an toàn
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate theo thứ tự phụ thuộc (bảng con trước, bảng cha sau)
        ChiTietHoaDon::truncate();
        HoaDon::truncate();
        SanPham::truncate();
        NhanVien::truncate();
        // ...

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Bước 2: Gọi các Seeder riêng theo thứ tự phụ thuộc FK (cha trước, con sau)
        $this->call([
            ChucVuSeeder::class,
            NhanVienSeeder::class,
            DanhMucSeeder::class,
            SanPhamSeeder::class,
            // ...
        ]);
    }
}
```

### 10.2 — Seeder riêng từng bảng

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NhanVienSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nhan_viens')->insert([
            [
                'id'            => 1,
                'ho_va_ten'     => 'Nguyễn Văn A',
                'email'         => 'admin@gmail.com',
                'password'      => Hash::make('123456'),
                'so_dien_thoai' => '0901234567',
                'tinh_trang'    => 1,
                'id_chuc_vu'    => 1, // Admin
                'is_master'     => 1,
            ],
            [
                'id'            => 2,
                'ho_va_ten'     => 'Trần Thị B',
                'email'         => 'nhanvien@gmail.com',
                'password'      => Hash::make('123456'),
                'so_dien_thoai' => '0912345678',
                'tinh_trang'    => 1,
                'id_chuc_vu'    => 2, // Nhân viên thường
                'is_master'     => 0,
            ],
        ]);
    }
}
```

**Quy tắc Seeder:**
- Dùng `DB::table('ten_bang')->insert([...])` — không dùng `Model::create()`
- Luôn khai báo `'id'` tường minh
- Mật khẩu dùng `Hash::make('123456')`
- Comment inline `// Vai trò` sau mỗi field quan trọng
- Mỗi bảng một file Seeder riêng biệt

---

## 📐 11. QUY TẮC FORMATTING CODE

### 11.1 — Indent & Array

- Dùng **4 spaces** (không dùng tab)
- Array multi-line: mỗi phần tử một dòng, có dấu phẩy cuối

```php
// Align key => value (ưu tiên)
return response()->json([
    'status'  => 1,
    'message' => 'Thành công!',
    'data'    => $data,
]);
```

### 11.2 — Chuỗi (String)

- Ưu tiên **single quote** `'...'` cho string tĩnh
- Dùng **double quote** `"..."` khi cần hoặc khi có biến nội suy

### 11.3 — Query Builder

```php
$data = NhanVien::join('chuc_vus', 'nhan_viens.id_chuc_vu', '=', 'chuc_vus.id')
    ->where('nhan_viens.id', $user->id)
    ->select('nhan_viens.ho_va_ten', 'chuc_vus.ten_chuc_vu')
    ->first();
```

- Mỗi method chain trên một dòng, **indent 4 spaces** so với biến gán

---

## 🧱 12. PATTERN CHUNG CHO MODULE MỚI

Khi thêm một module mới (ví dụ: `NguyenLieu`), làm **đúng thứ tự** sau:

| Thứ tự | File cần tạo | Vị trí |
|---|---|---|
| 1 | Migration | `database/migrations/2026_XX_XX_XXXXXX_create_nguyen_lieus_table.php` |
| 2 | Model | `app/Models/NguyenLieu.php` |
| 3 | Form Request (ThemMoi) | `app/Http/Requests/ThemMoiNguyenLieuRequest.php` |
| 4 | Form Request (Update) | `app/Http/Requests/UpdateNguyenLieuRequest.php` |
| 5 | Controller | `app/Http/Controllers/NguyenLieuController.php` |
| 6 | Route trong api.php | Thêm prefix group `/nguyen-lieu` |
| 7 | Seeder | `database/seeders/NguyenLieuSeeder.php` + đăng ký trong DatabaseSeeder |

**Route mẫu:**
```php
Route::prefix('nguyen-lieu')->group(function () {
    Route::get('/get-data',       [NguyenLieuController::class, 'getData'])->middleware('checkLogin:X');
    Route::post('/store',         [NguyenLieuController::class, 'store'])->middleware('checkLogin:X');
    Route::post('/delete',        [NguyenLieuController::class, 'destroy'])->middleware('checkLogin:X');
    Route::post('/update',        [NguyenLieuController::class, 'update'])->middleware('checkLogin:X');
    Route::post('/change-status', [NguyenLieuController::class, 'changeStatus'])->middleware('checkLogin:X');
});
```

---

## 📊 13. THỐNG KÊ (ThongKeController)

Pattern chuẩn cho API thống kê có filter ngày:

```php
public function tenHamThongKe(Request $request)
{
    $tuNgay  = $request->input('tu_ngay');
    $denNgay = $request->input('den_ngay');

    $query = Model::join(...)->select(...)->where(...);

    // Filter ngày: nếu không có thì lấy ngày mới nhất
    if (!$request->filled('tu_ngay') && !$request->filled('den_ngay')) {
        $latestDate = HoaDon::where('tinh_trang', 1)->max(DB::raw('DATE(created_at)'));
        if ($latestDate) {
            $tuNgay = $latestDate;
            $denNgay = $latestDate;
            $query->whereDate('hoa_dons.created_at', $latestDate);
        }
    } else {
        if ($request->filled('tu_ngay')) {
            $query->whereDate('hoa_dons.created_at', '>=', $tuNgay);
        }
        if ($request->filled('den_ngay')) {
            $query->whereDate('hoa_dons.created_at', '<=', $denNgay);
        }
    }

    $data = $query->groupBy(...)->get();

    // Format chuẩn cho Chart.js
    return response()->json([
        'status'   => 1,
        'tu_ngay'  => $tuNgay,
        'den_ngay' => $denNgay,
        'data'     => [
            'labels'   => $data->pluck('ten_truong'),
            'datasets' => [
                [
                    'label'           => 'Nhãn biểu đồ',
                    'data'            => $data->pluck('so_lieu'),
                    'backgroundColor' => ['#3498DB', '#1FFF2E', '#FFD700', '#F54927'],
                    'borderRadius'    => 8,
                ]
            ]
        ],
        'list' => $data,
    ]);
}
```

---

## 🔑 14. AUTH & SECURITY

```php
// Đăng nhập (guard 'nv' cho NhanVien)
$check = Auth::guard('nv')->attempt(['email' => $email, 'password' => $password]);
$token = Auth::guard('nv')->user()->createToken('token')->plainTextToken;

// Lấy user hiện tại
$user = Auth::guard('sanctum')->user();

// Quên mật khẩu: lưu UUID vào cột hash_reset
$nhanVien->hash_reset = Str::uuid();
$nhanVien->save();

// Đặt lại mật khẩu: xoá hash_reset sau khi đổi
$nhanVien->password   = bcrypt($request->password);
$nhanVien->hash_reset = null;
$nhanVien->save();

// is_master: tài khoản siêu admin
// - bypass mọi phân quyền trong middleware
// - không thể bị xoá hoặc sửa thông tin
if ($item->is_master == 1) { /* từ chối thao tác */ }
```

---

## ⚠️ 15. NHỮNG ĐIỀU TUYỆT ĐỐI KHÔNG LÀM

| ❌ Sai | ✅ Đúng |
|---|---|
| `Route::delete()` hoặc `Route::put()` | `Route::post('/delete', ...)` và `Route::post('/update', ...)` |
| `$table->foreignId('id_xxx')` trong migration | `$table->integer('id_xxx')` |
| Viết `hasMany()`, `belongsTo()` trong Model | Join trực tiếp bằng query trong Controller |
| Dùng Service class / Repository pattern | Xử lý logic thẳng trong Controller |
| Trả về HTTP 401/403/404 | Luôn trả HTTP 200, phân biệt bằng `status: 0/1` |
| Dùng `$guarded = []` | Khai báo đầy đủ `$fillable` |
| Dùng API Resource class | Trả JSON thẳng từ `response()->json()` |
| Tên class tiếng Anh (`ProductController`) | Tên tiếng Việt (`SanPhamController`) |
| Tên bảng tiếng Anh (`products`) | Tên bảng tiếng Việt (`san_phams`) |
| `$model->fill($request->all())` | Map từng field rõ ràng trong `create([...])` / `update([...])` |
| Thiếu middleware trên route bảo vệ | Mọi route cần auth đều có `->middleware('checkLogin:{id}')` |

---

## 📋 16. CHECKLIST TRƯỚC KHI SUBMIT CODE

- [ ] Tên class, file theo đúng convention tiếng Việt
- [ ] Tên bảng, cột database dùng snake_case tiếng Việt
- [ ] `$table` được khai báo trong Model
- [ ] `$fillable` khai báo đầy đủ
- [ ] `SoftDeletes` được import và dùng trong Model nghiệp vụ
- [ ] Route dùng `POST` cho delete và update
- [ ] Middleware `checkLogin:{id}` gắn cho mọi route cần bảo vệ
- [ ] `authorize()` return `true` trong mọi FormRequest
- [ ] `messages()` có đủ các rule messages
- [ ] Response luôn có `'status' => 1/0`
- [ ] Response HTTP luôn là 200
- [ ] Migration không dùng `foreignId()`
- [ ] Migration có `softDeletes()` và `timestamps()`
- [ ] Seeder dùng `DB::table()->insert([...])`
- [ ] Seeder khai báo `'id'` tường minh

---

*Tài liệu này được tạo dựa trên phân tích toàn bộ source code dự án `k26/BE`.*

---

---

# 🖥️ PHẦN II — PHONG CÁCH VIẾT CODE FRONTEND (Vue 3 + Vite)

> Phân tích từ source code `k26/FE`. Mọi agent/developer làm FE phải tuân thủ phần này.

---

## 🧰 FE.1 — STACK CÔNG NGHỆ

| Công nghệ | Phiên bản | Mục đích |
|---|---|---|
| **Vue 3** | `^3.3.4` | Framework chính (Options API) |
| **Vite** | `^4.4.5` | Build tool / Dev server |
| **Vue Router** | `^4.0.13` | Điều hướng trang |
| **Axios** | `^1.16.1` | Gọi HTTP API |
| **@meforma/vue-toaster** | `^1.3.0` | Thông báo toast (top-right) |
| **Bootstrap 5** | `^5.3.8` | CSS framework (import thủ công) |
| **Chart.js + vue-chartjs** | `^4 / ^5` | Biểu đồ thống kê |
| **jQuery** | `^4.0.0` | Hỗ trợ plugin Bootstrap |

> ⚠️ Dùng **Options API** (`data()`, `methods`, `computed`, `mounted`) — **KHÔNG dùng Composition API** (`setup()`, `ref`, `reactive`).

---

## 📁 FE.2 — CẤU TRÚC THƯ MỤC

```
src/
├── main.js                        # Entry point, đăng ký app, router, toaster, layout
├── App.vue                        # Root component, switch layout động
├── router/
│   ├── index.js                   # Định nghĩa toàn bộ routes
│   └── checkLogin.js              # Navigation guard kiểm tra token
├── layout/
│   ├── wrapper/
│   │   ├── index.vue              # Default layout (có sidebar, top, bottom)
│   │   └── blank.vue              # Blank layout (chỉ router-view, dùng cho login/in)
│   └── components/
│       ├── TopRocker.vue          # Thanh header/top bar
│       ├── MenuRocker.vue         # Sidebar navigation
│       └── BotRocker.vue         # Footer
├── components/
│   ├── Admin/                     # Các trang quản trị
│   │   ├── {TênModule}/
│   │   │   └── index.vue          # Mỗi module 1 thư mục, file duy nhất index.vue
│   │   ├── DashBoard/
│   │   │   └── Default/
│   │   │       └── index.vue
│   │   └── ...
│   └── ThongKe/                   # Các trang thống kê
│       ├── {TênThongKe}/
│       │   └── index.vue
│       └── ...
└── assets/
    ├── css/                       # Bootstrap + theme CSS (import trong layout)
    ├── js/                        # Bootstrap JS, jQuery, app.js
    ├── plugins/                   # Plugin bên thứ ba (chartjs, select2, ...)
    ├── fonts/                     # Icon fonts (boxicons, LineIcons)
    └── images/                    # Logo, favicon
```

---

## 🏷️ FE.3 — QUY TẮC ĐẶT TÊN

### 3.1 — File & Thư mục component

```
src/components/Admin/{TênModule}/index.vue
src/components/Admin/{TênModule}/{TênModule}/index.vue  (nếu có sub)
src/components/ThongKe/{TênThongKe}/index.vue
```

**Quy tắc:**
- Thư mục module: **PascalCase tiếng Việt** (`NhanVien`, `SanPham`, `HoaDon`)
- File trong thư mục: luôn là **`index.vue`** (không đặt tên khác)
- Thư mục có sub-module: thêm cấp (vd: `DashBoard/Default/index.vue`)

### 3.2 — Tên biến trong `data()`

```js
// snake_case tiếng Việt cho mảng dữ liệu
list_nhan_vien: []
list_chuc_vu: []
list_san_pham: []

// snake_case tiếng Việt cho object form
add_nhan_vien: { ho_va_ten: '', email: '', ... }
edit_nhan_vien: {}
delete_nhan_vien: {}

// Tên rõ nghĩa cho state/flag
key_search: ''
is_load: false
```

### 3.3 — Tên method

```js
// Tải dữ liệu: loadData{TênThực thể}()
loadDataNhanVien()
loadDataSanPham()
loadChucVu()

// CRUD tiếng Việt camelCase
themNhanVien()
updateNhanVien()
deleteNhanVien()
changeStatus(value)

// Utility / helper
formatVND(value)
toSlug(str)
getInitial(name)
getTenDanhMuc(id)
```

### 3.4 — Route URL (kebab-case tiếng Việt)

```
/admin/nhan-vien
/admin/san-pham
/admin/hoa-don
/admin/thong-ke/doanh-thu-theo-ban
/admin/in-hoa-don/:id         ← tham số động
/admin/login                  ← blank layout
```

---

## 📝 FE.4 — CẤU TRÚC COMPONENT (index.vue)

Mỗi file `index.vue` có đúng 3 block theo thứ tự:

```vue
<template>
  <!-- HTML -->
</template>

<script>
import axios from 'axios';
export default {
  name: 'TenModuleComponent',   // Tùy chọn nhưng nên có
  data() { ... },
  computed: { ... },            // Nếu cần
  watch: { ... },               // Nếu cần
  mounted() { ... },
  methods: { ... },
}
</script>

<style></style>                 <!-- Luôn có, thường để trống -->
```

> **Thứ tự bắt buộc trong `<script>`:** `name` → `data()` → `computed` → `watch` → `mounted()` → `methods`

---

## 📦 FE.5 — DATA() — Cấu trúc chuẩn

```js
data() {
    return {
        // 1. Mảng danh sách dữ liệu
        list_nhan_vien: [],
        list_chuc_vu: [],
        list_chuc_vu_active: [],

        // 2. Object form thêm mới — khai báo đầy đủ các field với giá trị mặc định
        add_nhan_vien: {
            ho_va_ten: '',
            email: '',
            password: '',
            so_dien_thoai: '',
            id_chuc_vu: '',
            tinh_trang: 1          // Mặc định active
        },

        // 3. Object edit/delete — để trống {}
        edit_nhan_vien: {},
        delete_nhan_vien: {},

        // 4. Các state khác
        key_search: '',
        is_load: false,
    }
},
```

**Quy tắc:**
- `add_xxx`: khai báo đầy đủ tất cả field, set giá trị mặc định rõ ràng
- `edit_xxx` và `delete_xxx`: khai báo `{}` ban đầu (sẽ được gán khi user chọn)
- `tinh_trang` mặc định = `1` (active)
- Sau khi thêm/xóa/sửa thành công: **reset `add_xxx` về giá trị mặc định ban đầu**

---

## 🔁 FE.6 — MOUNTED() — Gọi API khi load trang

```js
mounted() {
    this.loadDataNhanVien();    // Load danh sách chính
    this.loadChucVu();          // Load danh sách phụ (dropdown, select)
},
```

**Quy tắc:**
- `mounted()` chỉ gọi các hàm `loadData...()`, không viết logic trực tiếp
- Gọi tất cả dữ liệu cần thiết cho trang ngay khi mounted

---

## 🌐 FE.7 — GỌI API VỚI AXIOS

### 7.1 — Lấy token

```js
// Cách 1: Gán vào biến (khi dùng nhiều lần trong 1 method)
const token = localStorage.getItem('xs');

// Cách 2: Inline (khi dùng 1 lần)
'Authorization': `Bearer ${localStorage.getItem('xs')}`
```

> Token lưu trong `localStorage` với key **`'xs'`** (không phải `token` hay `auth_token`).

### 7.2 — Pattern GET (load dữ liệu)

```js
loadDataNhanVien() {
    const token = localStorage.getItem('xs');
    axios
        .get('https://be.ilovecoffee.click/api/admin/nhan-vien/get-data', {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
        .then((res) => {
            this.list_nhan_vien = res.data.data;
        })
},
```

**Quy tắc GET:**
- Không cần `.catch()` cho load thông thường (trừ khi cần xử lý lỗi đặc biệt)
- Gán thẳng: `this.list_xxx = res.data.data`
- Không hiển thị toast khi load thành công (chỉ hiển thị khi thất bại nếu cần)

### 7.3 — Pattern POST (thêm/sửa/xóa)

```js
themNhanVien() {
    const token = localStorage.getItem('xs');
    axios
        .post('https://be.ilovecoffee.click/api/admin/nhan-vien/store', this.add_nhan_vien, {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
        .then((res) => {
            if (res.data.status) {                              // status == 1 → thành công
                this.$toast.success(res.data.message || "Thêm thành công");
                this.loadDataNhanVien();                        // Reload lại data
                this.add_nhan_vien = {                          // Reset form
                    ho_va_ten: '', email: '', password: '',
                    so_dien_thoai: '', id_chuc_vu: '', tinh_trang: 1
                };
            } else {                                            // status == 0 → thất bại
                this.$toast.error(res.data.message || "Thêm thất bại");
            }
        })
        .catch((error) => {
            console.error(error);
            if (error.response && error.response.data) {
                this.$toast.error(error.response.data.message || "Có lỗi xảy ra!");
            } else {
                this.$toast.error("Không thể kết nối đến máy chủ!");
            }
        });
},
```

### 7.4 — Pattern DELETE

```js
deleteNhanVien() {
    const token = localStorage.getItem('xs');
    axios
        .post('https://be.ilovecoffee.click/api/admin/nhan-vien/delete', this.delete_nhan_vien, {
            headers: { 'Authorization': `Bearer ${token}` }
        })
        .then((res) => {
            if (res.data.status == 1) {
                this.$toast.success(res.data.message);
                this.loadDataNhanVien();
            } else {
                this.$toast.error(res.data.message);
            }
        })
        .catch((error) => {
            console.error(error);
            if (error.response && error.response.data) {
                this.$toast.error(error.response.data.message || "Có lỗi xảy ra!");
            } else {
                this.$toast.error("Không thể kết nối đến máy chủ!");
            }
        });
},
```

### 7.5 — Pattern changeStatus

```js
changeStatus(value) {
    axios
        .post('https://be.ilovecoffee.click/api/admin/nhan-vien/change-status', value, {
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('xs')}`
            }
        })
        .then((res) => {
            if (res.data.status == 1) {
                this.$toast.success(res.data.message);
                this.loadDataNhanVien();
            } else {
                this.$toast.error(res.data.message);
            }
        })
},
```

> `changeStatus(value)` nhận tham số `value` là object `{ id: ... }` — **không cần `.catch()`**.

### 7.6 — Kiểm tra status từ response

```js
// Cách 1: Kiểm tra truthy (res.data.status == 1 hoặc true)
if (res.data.status) { ... }

// Cách 2: So sánh tường minh (ưu tiên hơn)
if (res.data.status == 1) { ... }

// KHÔNG dùng: if (res.data.status === 1) (strict không cần thiết)
```

---

## 🔄 FE.8 — COMPUTED & WATCH

### 8.1 — Computed (tìm kiếm / lọc)

```js
computed: {
    list_nhan_vien_loc() {
        if (!this.key_search) {
            return this.list_nhan_vien;
        }
        return this.list_nhan_vien.filter((item) =>
            item.ho_va_ten && item.ho_va_ten.toLowerCase().includes(this.key_search.toLowerCase().trim())
        );
    }
},
```

**Quy tắc computed:**
- Tên: `{list_xxx}_loc` cho computed filter/search
- Tên: tên mô tả ngắn gọn cho computed tính toán

### 8.2 — Watch (auto-generate slug)

```js
watch: {
    'add_san_pham.ten_san_pham'(newVal) {
        this.add_san_pham.slug_san_pham = this.toSlug(newVal);
    },
    'edit_san_pham.ten_san_pham'(newVal) {
        this.edit_san_pham.slug_san_pham = this.toSlug(newVal);
    }
},
```

---

## 🗺️ FE.9 — ROUTER (index.js)

### 9.1 — Cấu trúc route chuẩn

```js
import { createRouter, createWebHistory } from "vue-router";
import checkLogin from "./checkLogin.js";

const routes = [
    // Route cần đăng nhập → dùng beforeEnter: checkLogin
    {
        path: "/admin/nhan-vien",
        component: () => import("../components/Admin/NhanVien/index.vue"),
        beforeEnter: checkLogin
    },

    // Route không cần đăng nhập → dùng meta: { layout: 'blank' }
    {
        path: "/admin/login",
        component: () => import("../components/Admin/DangNhap/index.vue"),
        meta: { layout: 'blank' }
    },

    // Route tham số động + blank layout
    {
        path: "/admin/in-hoa-don/:id",
        component: () => import("../components/Admin/InHoaDon/index.vue"),
        meta: { layout: 'blank' },
        props: true
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
```

**Quy tắc Router:**
- Dùng **Lazy loading** cho tất cả component: `() => import("...")`
- Route cần auth: `beforeEnter: checkLogin`
- Route không có layout (login, in hóa đơn, quên mật khẩu): `meta: { layout: 'blank' }`
- Route trang chủ (`/`) trỏ vào trang mặc định (thường là BanHang/Dashboard)

### 9.2 — checkLogin.js (Navigation Guard)

```js
import axios from "axios"
import { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster({ position: "top-right" });

export default function checkLogin(to, from, next) {
    const token = localStorage.getItem('xs');
    axios.get(`https://be.ilovecoffee.click/api/check-login`, {
        headers: { 'Authorization': `Bearer ${token}` }
    })
    .then((res) => {
        if (res.data.status == 1) {
            next();                              // Cho phép vào route
        } else {
            toaster.error("Bạn chưa đăng nhập!");
            next('/admin/login');               // Redirect về login
        }
    })
    .catch(() => {
        toaster.error("Phiên đăng nhập đã hết hạn!");
        next('/admin/login');
    })
}
```

---

## 🏗️ FE.10 — LAYOUT SYSTEM

### 10.1 — App.vue (switch layout động)

```vue
<template>
  <component :is="layout">
      <router-view></router-view>
  </component>
</template>

<script>
const default_layout = "default";
export default {
  computed: {
    layout() {
      return (this.$route.meta.layout || default_layout) + "-layout";
    },
  },
};
</script>
```

### 10.2 — Hai loại Layout

| Layout | File | Khi nào dùng |
|---|---|---|
| `default-layout` | `layout/wrapper/index.vue` | Tất cả trang có sidebar/navbar |
| `blank-layout` | `layout/wrapper/blank.vue` | Login, quên MK, đặt lại MK, in hóa đơn |

**Khai báo trong main.js:**
```js
import Default from './layout/wrapper/index.vue'
app.component("default-layout", Default);
// blank-layout được import trực tiếp trong blank.vue
```

### 10.3 — Blank Layout (đặc biệt)

`blank.vue` import tất cả JS/CSS cần thiết trong `<script>` và `<style>`:

```vue
<script>
import "../../assets/js/bootstrap.bundle.min.js";
import "../../assets/js/jquery.min.js";
// ...
export default { name: 'BlankLayout' }
</script>

<style>
@import "../../assets/css/bootstrap.min.css";
@import "../../assets/css/app.css";
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");
@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css");
</style>
```

---

## 🔑 FE.11 — AUTH FLOW

### Đăng nhập

```js
// 1. POST login → nhận token → lưu vào localStorage với key 'xs'
localStorage.setItem('xs', res.data.token);

// 2. Redirect về trang chính
this.$router.push("/admin/ban-hang");
```

### Kiểm tra token khi vào trang login (tránh vào lại nếu đã đăng nhập)

```js
mounted() {
    this.checkToken();
},
methods: {
    checkToken() {
        const token = localStorage.getItem('xs');
        if (token) {
            axios.get(`https://be.ilovecoffee.click/api/check-login`, {
                headers: { 'Authorization': `Bearer ${token}` }
            })
            .then((res) => {
                if (res.data.status == 1) {
                    this.$router.push('/admin/ban-hang'); // Đã đăng nhập → vào trang chính
                } else {
                    localStorage.removeItem('xs');
                }
            })
            .catch(() => { localStorage.removeItem('xs'); });
        }
    }
}
```

### Đăng xuất

```js
// Xóa token khỏi localStorage và redirect về login
localStorage.removeItem('xs');
this.$router.push('/admin/login');
```

---

## 🔔 FE.12 — TOAST NOTIFICATION

Dùng `@meforma/vue-toaster`, position mặc định `top-right`:

```js
// Thành công
this.$toast.success(res.data.message || "Thao tác thành công!");

// Thất bại
this.$toast.error(res.data.message || "Có lỗi xảy ra!");

// Trong Navigation Guard (ngoài component)
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
toaster.error("Bạn chưa đăng nhập!");
```

**Quy tắc toast:**
- Luôn có **fallback message** bằng tiếng Việt: `|| "Mô tả lỗi mặc định"`
- Thành công: `.success()` 
- Thất bại / lỗi: `.error()`
- Không dùng `alert()` hoặc `confirm()` của browser

---

## 🛠️ FE.13 — UTILITY FUNCTIONS (viết trong methods)

### Format tiền VND

```js
formatVND(value) {
    if (!value) return '0 đ';
    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
},
```

### Chuyển chuỗi thành Slug

```js
toSlug(str) {
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/[^a-z0-9 -]/g, "");
    str = str.replace(/\s+/g, "-");
    str = str.replace(/-+/g, "-");
    return str.trim();
},
```

### Lấy chữ cái đầu từ tên

```js
getInitial(name) {
    if (!name) return 'N';
    const parts = name.trim().split(' ');
    return parts[parts.length - 1].charAt(0).toUpperCase();
},
```

### Tìm tên từ ID trong danh sách

```js
getTenDanhMuc(id) {
    const dm = this.list_danh_muc.find(x => x.id === id);
    return dm ? dm.ten_danh_muc : id;
},
```

---

## 🎨 FE.14 — TEMPLATE (HTML TRONG `<template>`)

### 14.1 — Form binding với v-model

```html
<!-- Input text -->
<input v-model="add_nhan_vien.ho_va_ten" type="text" class="form-control">

<!-- Select -->
<select v-model="add_nhan_vien.id_chuc_vu" class="form-select">
    <option value="">-- Chọn chức vụ --</option>
    <option v-for="cv in list_chuc_vu" :key="cv.id" :value="cv.id">
        {{ cv.ten_chuc_vu }}
    </option>
</select>
```

### 14.2 — Submit form với @submit.prevent

```html
<form @submit.prevent="themNhanVien()">
    <!-- ... fields ... -->
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
```

### 14.3 — Modal thêm mới / sửa / xóa (Bootstrap Modal)

```html
<!-- Nút mở modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalThemNhanVien">
    Thêm mới
</button>

<!-- Modal -->
<div class="modal fade" id="modalThemNhanVien" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm nhân viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Form fields -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button @click="themNhanVien()" type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    Xác nhận
                </button>
            </div>
        </div>
    </div>
</div>
```

### 14.4 — Gán dữ liệu vào edit/delete object khi click

```html
<!-- Nút sửa: gán toàn bộ item vào edit_xxx -->
<button @click="edit_nhan_vien = {...item}" data-bs-toggle="modal" data-bs-target="#modalSuaNhanVien">
    Sửa
</button>

<!-- Nút xóa: chỉ cần gán id -->
<button @click="delete_nhan_vien = { id: item.id }" data-bs-toggle="modal" data-bs-target="#modalXoaNhanVien">
    Xóa
</button>

<!-- Nút changeStatus: truyền thẳng object -->
<button @click="changeStatus({ id: item.id })">Đổi trạng thái</button>
```

### 14.5 — Hiển thị trạng thái

```html
<!-- Badge status -->
<span :class="item.tinh_trang == 1 ? 'badge bg-success' : 'badge bg-danger'">
    {{ item.tinh_trang == 1 ? 'Hoạt động' : 'Tạm tắt' }}
</span>
```

### 14.6 — Điều hướng bằng router-link

```html
<!-- Link menu sidebar -->
<router-link class="nav-link" to="/admin/nhan-vien">
    <div class="parent-icon"><i class="fa-solid fa-arrow-right"></i></div>
    <div class="menu-title text-nowrap">Nhân Viên</div>
</router-link>

<!-- Link có tham số động -->
<router-link :to="`/admin/in-hoa-don/${item.id}`" target="_blank">In hóa đơn</router-link>
```

---

## 🧱 FE.15 — PATTERN ĐỂ THÊM MODULE MỚI

Khi thêm module FE mới (ví dụ: `NguyenLieu`), làm **đúng thứ tự**:

### Bước 1: Tạo thư mục và file component

```
src/components/Admin/NguyenLieu/index.vue
```

### Bước 2: Cấu trúc `index.vue` khởi đầu

```vue
<template>
    <div>
        <!-- Bảng danh sách -->
        <!-- Modal thêm mới -->
        <!-- Modal sửa -->
        <!-- Modal xóa -->
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'NguyenLieuComponent',
    data() {
        return {
            list_nguyen_lieu: [],
            add_nguyen_lieu: {
                ten_nguyen_lieu: '',
                don_vi_tinh: '',
                so_luong_ton: 0,
                tinh_trang: 1
            },
            edit_nguyen_lieu: {},
            delete_nguyen_lieu: {},
            key_search: ''
        }
    },
    computed: {
        list_nguyen_lieu_loc() {
            if (!this.key_search) return this.list_nguyen_lieu;
            return this.list_nguyen_lieu.filter(item =>
                item.ten_nguyen_lieu && item.ten_nguyen_lieu.toLowerCase().includes(this.key_search.toLowerCase().trim())
            );
        }
    },
    mounted() {
        this.loadDataNguyenLieu();
    },
    methods: {
        loadDataNguyenLieu() {
            axios.get('https://be.ilovecoffee.click/api/admin/nguyen-lieu/get-data', {
                headers: { 'Authorization': `Bearer ${localStorage.getItem('xs')}` }
            }).then((res) => {
                this.list_nguyen_lieu = res.data.data;
            });
        },
        themNguyenLieu() { /* ... */ },
        updateNguyenLieu() { /* ... */ },
        deleteNguyenLieu() { /* ... */ },
        changeStatus(value) { /* ... */ }
    }
}
</script>
<style></style>
```

### Bước 3: Thêm route vào `router/index.js`

```js
{
    path: "/admin/nguyen-lieu",
    component: () => import("../components/Admin/NguyenLieu/index.vue"),
    beforeEnter: checkLogin
},
```

### Bước 4: Thêm menu vào `MenuRocker.vue`

```html
<li class="nav-item">
    <router-link class="nav-link" to="/admin/nguyen-lieu">
        <div class="parent-icon"><i class="fa-solid fa-arrow-right"></i></div>
        <div class="menu-title text-nowrap">Nguyên Liệu</div>
    </router-link>
</li>
```

---

## ⚠️ FE.16 — NHỮNG ĐIỀU TUYỆT ĐỐI KHÔNG LÀM (FE)

| ❌ Sai | ✅ Đúng |
|---|---|
| Dùng Composition API (`setup()`, `ref`, `reactive`) | Dùng Options API (`data()`, `methods`, `mounted()`) |
| Đặt tên file khác `index.vue` | Luôn đặt tên file là `index.vue` |
| Lưu token với key khác `'xs'` | Luôn dùng `localStorage.getItem('xs')` |
| Dùng `alert()` / `confirm()` browser | Dùng `this.$toast.success/error()` |
| Gọi API trực tiếp trong `mounted()` | Wrap trong method `loadData...()` rồi gọi từ `mounted()` |
| Không reset form sau thêm thành công | Reset `add_xxx` về giá trị mặc định sau khi thêm OK |
| Hardcode URL API | Dùng base URL cố định `https://be.ilovecoffee.click/api/admin/...` |
| Thiếu `.catch()` trong POST | Mọi POST đều cần `.catch()` để bắt lỗi kết nối |
| Dùng `v-if` và `v-for` cùng một element | Tách ra element riêng hoặc dùng `<template>` wrapper |

---

## 📋 FE.17 — CHECKLIST KHI TẠO COMPONENT MỚI

- [ ] File đặt tên `index.vue`, trong thư mục `Admin/{TênModule}/`
- [ ] Có `name: 'TênModuleComponent'` trong export default
- [ ] `data()` khai báo đủ `list_xxx`, `add_xxx`, `edit_xxx`, `delete_xxx`, `key_search`
- [ ] `add_xxx` có giá trị mặc định đầy đủ (string: `''`, number: `0`, tinh_trang: `1`)
- [ ] `mounted()` gọi tất cả `loadData...()` cần thiết
- [ ] Mọi axios POST đều có `.catch()` bắt lỗi
- [ ] Toast message luôn có fallback: `|| "Mô tả mặc định"`
- [ ] Reset form `add_xxx` sau khi thêm thành công
- [ ] `loadData...()` được gọi lại sau mỗi thao tác thành công
- [ ] Route mới đã thêm vào `router/index.js`
- [ ] Menu mới đã thêm vào `MenuRocker.vue` (nếu cần)
- [ ] `<style></style>` luôn có (dù trống)

---

*Phần FE được tạo dựa trên phân tích toàn bộ source code dự án `k26/FE`.*
*Cập nhật lần cuối: 2026-10-03*
