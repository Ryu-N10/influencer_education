@extends('layouts.app')

@section('content')
<div class="container">
    {{-- ←戻るリンク --}}
    <div class="mb-3">
        <a href="{{ url('/admin') }}" class="text-decoration-none text-dark">
            &larr; 戻る
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>バナー管理</h2>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" id="banner-form">
        @csrf

        <input type="hidden" name="deleted_banner_ids" id="deleted_banner_ids" value="">

        <div id="banner-container">
            @foreach ($banners as $index => $banner)
                <div class="banner-row d-flex align-items-center mb-3" data-id="{{ $banner->id }}">
                    <input type="hidden" name="banners[{{ $index }}][id]" value="{{ $banner->id }}">

                    <div class="me-3" style="width: 150px; height: 80px; background: #eee; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        @if ($banner->image_path)
                            <img src="{{ asset('storage/' . $banner->image_path) }}" alt="バナー" class="preview-img" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                        @else
                            <span class="text-muted small">No Image</span>
                        @endif
                    </div>

                    <div class="me-3">
                        <input type="file" name="banners[{{ $index }}][image_file]" class="form-control file-input" accept="image/png, image/jpeg, image/webp">
                    </div>

                    <div>
                        <button type="button" class="btn btn-danger btn-sm rounded-circle delete-row-btn" style="width: 30px; height: 30px;">
                            －
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mb-4">
            <button type="button" id="add-row-btn" class="btn btn-success rounded-circle" style="width: 40px; height: 40px; font-size: 20px; line-height: 1;">
                ＋
            </button>
        </div>

        <div class="text-center mt-5">
            <button type="submit" class="btn btn-dark px-5 py-2">登録</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let rowIndex = {{ count($banners) }};
    const deletedIds = [];

    document.addEventListener('change', function (e) {
        if (e.target.classList.contains('file-input')) {
            const fileInput = e.target;
            const row = fileInput.closest('.banner-row');
            const previewContainer = row.querySelector('.me-3');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewContainer.innerHTML = `<img src="${e.target.result}" alt="プレビュー" class="preview-img" style="max-width: 100%; max-height: 100%; object-fit: cover;">`;
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    });

    document.getElementById('add-row-btn').addEventListener('click', function () {
        const container = document.getElementById('banner-container');
        
        const newRow = document.createElement('div');
        newRow.className = 'banner-row d-flex align-items-center mb-3';
        newRow.innerHTML = `
            <div class="me-3" style="width: 150px; height: 80px; background: #eee; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                <span class="text-muted small">No Image</span>
            </div>
            <div class="me-3">
                <input type="file" name="banners[${rowIndex}][image_file]" class="form-control file-input" accept="image/png, image/jpeg, image/webp" required>
            </div>
            <div>
                <button type="button" class="btn btn-danger btn-sm rounded-circle delete-row-btn" style="width: 30px; height: 30px;">
                    －
                </button>
            </div>
        `;
        container.appendChild(newRow);
        rowIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('delete-row-btn')) {
            const row = e.target.closest('.banner-row');
            const bannerId = row.getAttribute('data-id');

            if (bannerId) {
                deletedIds.push(bannerId);
                document.getElementById('deleted_banner_ids').value = deletedIds.join(',');
            }

            row.remove();
        }
    });
});
</script>
@endsection