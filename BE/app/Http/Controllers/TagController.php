<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\ThemMoiTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function getData()
    {
        $tags = Tag::select(
            'tags.ma_tag',
            'tags.ma_tag as id',
            'tags.ten_tag',
            'tags.mo_ta',
            'tags.created_at',
            DB::raw('(SELECT COUNT(*) FROM so_thichs WHERE so_thichs.ma_tag = tags.ma_tag) as usage_count')
        )->orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => true,
            'data'   => $tags,
        ]);
    }

    public function store(ThemMoiTagRequest $request)
    {
        $ma_tag = $request->ma_tag ?? $request->id;
        if (!$ma_tag) {
            $num = Tag::withTrashed()->count() + 1;
            do {
                $ma_tag = 'TAG' . str_pad($num, 3, '0', STR_PAD_LEFT);
                $num++;
            } while (Tag::withTrashed()->where('ma_tag', $ma_tag)->exists());
        }

        Tag::create([
            'ma_tag'  => $ma_tag,
            'ten_tag' => $request->ten_tag,
            'mo_ta'   => $request->mo_ta,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Thêm mới tag thành công!',
        ]);
    }

    public function create(ThemMoiTagRequest $request)
    {
        return $this->store($request);
    }

    public function update(UpdateTagRequest $request)
    {
        $id = $request->ma_tag ?? $request->id;
        $tag = Tag::where('ma_tag', $id)->first();

        if (!$tag) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy tag cần cập nhật!',
            ]);
        }

        $tag->update([
            'ten_tag' => $request->ten_tag,
            'mo_ta'   => $request->mo_ta,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Cập nhật tag thành công!',
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->ma_tag ?? $request->id;
        $tag = Tag::where('ma_tag', $id)->first();

        if ($tag) {
            $tag->delete();
            return response()->json([
                'status'  => true,
                'message' => 'Xóa tag thành công!',
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Không tìm thấy tag để xóa!',
        ]);
    }

    public function delete(Request $request)
    {
        return $this->destroy($request);
    }
}
