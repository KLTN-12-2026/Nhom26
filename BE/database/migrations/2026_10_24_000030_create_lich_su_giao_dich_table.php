<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lich_su_giao_dich', function (Blueprint $table) {
            $table->bigIncrements('ma_giao_dich_noi_bo');
            $table->unsignedBigInteger('ma_hoa_don')->index();
            $table->unsignedBigInteger('ma_giao_dich_goc')->nullable()->comment('Tham chieu giao dich thanh toan goc khi hoan tien');
            $table->string('ma_giao_dich_cong', 100)->nullable()->unique()->comment('Mã giao dịch tại cổng thanh toán');
            $table->string('ma_yeu_cau', 100)->unique()->comment('Khóa idempotency để tránh xử lý trùng callback');
            $table->string('loai_giao_dich', 20)->comment('thanh_toan, hoan_tien');
            $table->string('phuong_thuc', 50)->comment('vnpay, momo, chuyen_khoan, tien_mat');
            $table->decimal('so_tien', 12, 2);
            $table->unsignedBigInteger('nguoi_xac_nhan_id')->nullable()->comment('Nguoi doi soat thanh toan thu cong');
            $table->string('trang_thai', 20)->comment('khoi_tao, dang_xu_ly, thanh_cong, that_bai');
            $table->text('phan_hoi_cong')->nullable()->comment('Không lưu thông tin thẻ hay dữ liệu nhạy cảm');
            $table->timestamp('ngay_tao')->useCurrent();
            $table->timestamp('ngay_hoan_tat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_su_giao_dich');
    }
};
