<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    // 1. 一覧・編集画面の表示
    public function index()
    {
        // 登録されているバナーを並び順（sort_order）の昇順で取得
        $banners = Banner::orderBy('sort_order', 'asc')->get();
        return view('admin.banners.index', compact('banners'));
    }

    // 2. 一括保存・更新・削除処理
    public function store(Request $request)
    {
        // バリデーション（各項目の形式チェック）
        $request->validate([
            'banners.*.image_file' => 'nullable|image|mimes:png,jpg,webp|max:2048',
            'deleted_banner_ids' => 'nullable|string', // 削除対象のID（カンマ区切りなど）
        ]);

        // ① 削除対象のバナーがある場合は削除処理を実行
        if ($request->filled('deleted_banner_ids')) {
            $deletedIds = explode(',', $request->input('deleted_banner_ids'));
            foreach ($deletedIds as $id) {
                $banner = Banner::find($id);
                if ($banner) {
                    // ストレージ上の画像を削除
                    if ($banner->image_path && Storage::disk('public')->exists($banner->image_path)) {
                        Storage::disk('public')->delete($banner->image_path);
                    }
                    $banner->delete();
                }
            }
        }

        // ② 画面から送信されたバナーデータの登録・更新処理
        $bannersData = $request->input('banners', []);
        
        foreach ($bannersData as $index => $data) {
            $bannerId = $data['id'] ?? null;
            
            // 既存バナーの取得、または新規インスタンスの作成
            $banner = $bannerId ? Banner::find($bannerId) : new Banner();

            if (!$banner) {
                continue;
            }

            // 新しく画像ファイルがアップロードされた場合
            if ($request->hasFile("banners.{$index}.image_file")) {
                // 古い画像があれば削除
                if ($banner->image_path && Storage::disk('public')->exists($banner->image_path)) {
                    Storage::disk('public')->delete($banner->image_path);
                }
                // 新しい画像を保存
                $path = $request->file("banners.{$index}.image_file")->store('banners', 'public');
                $banner->image_path = $path;
            }

            // 表示順の設定（ループのインデックス順などを反映）
            $banner->sort_order = $index;
            $banner->position = 'top'; // 必要に応じて変更
            $banner->save();
        }

        return redirect()->route('admin.banners.index')->with('success', 'バナー情報を更新しました。');
    }
}
