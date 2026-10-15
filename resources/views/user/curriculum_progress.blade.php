@extends('user.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <!-- 戻るボタン -->
    <div class="mb-4">
        <a href="{{ route('user.show.top') }}" class="text-gray-800 hover:underline">←戻る</a>
    </div>

    <!-- ユーザー情報と現在の学年 -->
    <div class="flex items-center mb-10">
        <div class="w-24 h-24 bg-gray-200 overflow-hidden mr-4 border border-gray-300">
            @if($user->profile_image)
                <img src="{{ asset('storage/images/profile/' . $user->profile_image) }}" alt="プロフィール画像" class="w-full h-full object-cover">
            @else
                <div class="flex items-center justify-center h-full w-full text-gray-500 text-sm">画像なし</div>
            @endif
        </div>
        <div>
            <h1 class="text-2xl font-normal mb-2">{{ $user->name }}さんの授業進捗</h1>
            <div class="flex items-center">
                <span class="text-xl mr-2">現在の学年：</span>
                <span class="bg-cyan-200 text-white px-5 py-1 rounded-full text-sm shadow-sm">
                    {{ $currentGrade ? $currentGrade->name : '未設定' }}
                </span>
            </div>
        </div>
    </div>

    <!-- 学年ごとの授業進捗一覧 -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-y-12 gap-x-8">
        @foreach($grades as $grade)
            <div>
                <!-- 学年名バッジ -->
                <div class="mb-4 text-center md:text-left ml-0 md:ml-12">
                    <span class="bg-cyan-200 text-white px-5 py-1 rounded-full text-xs shadow-sm">
                        {{ $grade->name }}
                    </span>
                </div>
                
                <!-- その学年のカリキュラム一覧 -->
                <ul>
                    @forelse($grade->curriculums as $curriculum)
                        @php
                            // 進捗データがあるか、クリアフラグが1かを確認
                            $progress = $curriculum->progresses->first();
                            $isCleared = $progress && $progress->clear_flg == 1;
                        @endphp
                        
                        <li class="flex items-center mb-2 text-sm">
                            <!-- 受講済みマークのスペース（受講済みなら赤文字表示） -->
                            <div class="w-12 text-right mr-2">
                                @if($isCleared)
                                    <span class="text-red-500 font-bold text-xs">受講済</span>
                                @endif
                            </div>
                            <span class="text-gray-800">{{ $curriculum->title }}</span>
                        </li>
                    @empty
                        <li class="text-gray-400 text-sm ml-14">授業がありません</li>
                    @endforelse
                </ul>
            </div>
        @endforeach
    </div>
</div>
@endsection