
@extends('layouts.app')

@section('title', 'Create New Note')

@section('content')

<section class="create-note-header">
    <span class="section-eyebrow">YOUR PERSONAL LEARNING SPACE</span>

    <h1>Create New Note</h1>

    <p>
        Abadikan ide, materi, dan hal-hal penting
        dalam perjalanan belajarmu.
    </p>
</section>

<section class="create-note-card">

    <div class="form-heading">
        <div class="form-icon">✎</div>

        <div>
            <h2>Buat Catatan Baru</h2>
            <p>Lengkapi informasi catatan di bawah ini.</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="form-error">
            <strong>Periksa kembali formulir kamu:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="title">Judul Catatan</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                required
                placeholder="Contoh: Dasar Pemrograman Web"
            >

            @error('title')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

 
<div class="form-group">
    <label>Gambar Catatan <span>(Opsional)</span></label>

    <label for="image" class="upload-area" id="upload-area">
        <input
            type="file"
            id="image"
            name="image"
            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
            style="position:absolute; width:1px; height:1px; opacity:0;"
        >

        <div class="upload-content">
            <svg class="upload-icon" viewBox="0 0 64 64" fill="none">
                <path
                    d="M16 43H12C7.6 43 4 39.4 4 35C4 30.9 7.1 27.5 11.1 27.1C12.7 17.9 20.7 11 30.2 11C39.1 11 46.6 17.1 48.5 25.5C54.5 25.8 59 30.6 59 36.5C59 42.3 54.3 47 48.5 47H44"
                    stroke="currentColor"
                    stroke-width="4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M32 57V29M21 40L32 29L43 40"
                    stroke="currentColor"
                    stroke-width="4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>

            <strong>Click or drag to upload</strong>
            <span>Support formats: png, jpeg, jpg, webp</span>
        </div>
    </label>

    <small class="field-hint">
        Pilih gambar dari komputer atau HP.
        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
    </small>

    @error('image')
        <small class="field-error">{{ $message }}</small>
    @enderror
</div>

<div id="image-preview-container" style="display: none; margin-top: 15px;">
    <p style="font-size: 13px; font-weight: 600; margin-bottom: 8px;">
        Pratinjau Gambar:
    </p>

    <img
        id="image-preview"
        src=""
        alt="Pratinjau gambar"
        class="edit-image-preview"
    >
</div>


            @error('image')
                <small class="field-error">{{ $message }}</small>
            @enderror
        

        <div class="form-group">
            <label for="body">Isi Catatan</label>

            <textarea
                id="body"
                name="body"
                rows="8"
                required
                placeholder="Tuliskan materi, ide, atau catatan pembelajaranmu di sini..."
            >{{ old('body') }}</textarea>

            <small class="field-hint">
                Tuliskan informasi pembelajaran dengan jelas agar
                mudah dibaca kembali.
            </small>

            @error('body')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('articles.index') }}" class="btn-cancel">
                Batal
            </a>

            <button type="submit" class="btn-save">
                Simpan Catatan
            </button>
        </div>

    </form>
</section>

<script>
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const previewContainer = document.getElementById('image-preview-container');
    const uploadArea = document.getElementById('upload-area');

    function showImage(file) {
        if (!file) return;

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowedTypes.includes(file.type)) {
            alert('Pilih gambar JPG, JPEG, PNG, atau WEBP.');
            imageInput.value = '';
            previewContainer.style.display = 'none';
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran gambar maksimal 2 MB.');
            imageInput.value = '';
            previewContainer.style.display = 'none';
            return;
        }

        imagePreview.src = URL.createObjectURL(file);
        previewContainer.style.display = 'block';
    }

    imageInput.addEventListener('change', function () {
        showImage(this.files[0]);
    });

    uploadArea.addEventListener('dragover', function (event) {
        event.preventDefault();
        uploadArea.classList.add('drag-over');
    });

    uploadArea.addEventListener('dragleave', function () {
        uploadArea.classList.remove('drag-over');
    });

    uploadArea.addEventListener('drop', function (event) {
        event.preventDefault();
        uploadArea.classList.remove('drag-over');

        const file = event.dataTransfer.files[0];

        if (file) {
            const transfer = new DataTransfer();
            transfer.items.add(file);
            imageInput.files = transfer.files;

            showImage(file);
        }
    });

</script>

@endsection
