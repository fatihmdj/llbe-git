<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>🎵 Tambah Lagu Baru</title>
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            font-family: 'Trebuchet MS', sans-serif;
            margin: 0;
            padding: 40px;
        }
        h1 {
            color: #fff;
            text-align: center;
            text-shadow: 2px 2px #444;
        }
        form {
            background: #fff9f9;
            padding: 25px;
            border-radius: 10px;
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        label {
            font-weight: bold;
            color: #444;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-save { background: #00c853; color: white; }
        .btn-cancel { background: #ff5252; color: white; }
        .alert {
            background: #ffe6e6;
            color: #b71c1c;
            border-left: 5px solid #e53935;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>🎶 Tambah Lagu Baru</h1>

    @if($errors->any())
        <div class="alert">
            <strong>Terjadi Kesalahan:</strong>
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('route_daftar_lagu.store') }}">
        @csrf
        <label>🎵 Judul Lagu</label>
        <input type="text" name="judul" value="{{ old('judul') }}" required>

        <label>🎤 Artist</label>
        <input type="text" name="artist" value="{{ old('artist') }}" required>

        <label>💿 Album</label>
        <input type="text" name="album" value="{{ old('album') }}" required>

        <label>⏱️ Durasi (menit)</label>
        <select name="durasi_menit" required>
            <option value="">-- Pilih Durasi --</option>
            @for($i = 1; $i <= 60; $i++)
                <option value="{{ $i }}" {{ old('durasi_menit') == $i ? 'selected' : '' }}>
                    {{ $i }} Menit
                </option>
            @endfor
        </select>

        <label>📅 Tahun Rilis</label>
        <input type="text" name="tahun_rilis" value="{{ old('tahun_rilis') }}" required>

        <button type="submit" class="btn btn-save">💾 Simpan Lagu</button>
        <a href="{{ route('route_daftar_lagu.index') }}" class="btn btn-cancel">↩️ Batal</a>
    </form>
</body>
</html>