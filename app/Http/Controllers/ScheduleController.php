<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\Grade;

class ScheduleController extends Controller
{
    /**
     * 受講生の時間割画面を表示する
     */
    public function index(Request $request)
    {
        // 全ての学年（クラス）データを取得
        $grades = Grade::all();

        // リクエストから選択された grade_id を取得
        $gradeId = $request->input('grade_id');

        // ★ もし学年が選ばれていない場合、最初の学年のIDをデフォルトで選ぶ
        if (!$gradeId && $grades->isNotEmpty()) {
            $gradeId = $grades->first()->id;
        }

        // 選択された学年でカリキュラムを絞り込む
        $query = Curriculum::with('deliveryTimes');
        
        if ($gradeId) {
            $query->where('grade_id', $gradeId);
        }

        $schedules = $query->get();

        return view('schedule.index', compact('schedules', 'grades', 'gradeId'));
    }
}