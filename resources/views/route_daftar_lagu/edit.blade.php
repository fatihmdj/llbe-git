<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title> Edit Lagu - {{ $daftarLagu->judul }}</title>
    <style>
        body {
            font-family: 'Trebuchet MS', sans-serif;
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
            margin: 0;
            padding: 40px;
        }
        h1 {
            text-align: center;
            color: #fff;
            text-shadow: 2px 2px #444;
        }
        form {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin: 8px 0 15px 0;
            border: 1px solid #bbb;
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
        .btn-update { background: #00acc1; color: white; }
        .btn-cancel { background: #ff7043; color: white; }
    </style>
</head>
<body>
    <h1> Edit Lagu: {{ $daftarLagu->judul }}</h1>

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

    <form action="{{ route('route_daftar_lagu.update', $daftarLagu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label> Judul Lagu</label>
        <input type="text" name="judul" value="{{ old('judul', $daftarLagu->judul) }}" required>

        <label> Artist</label>
        <input type="text" name="artist" value="{{ old('artist', $daftarLagu->artist) }}" required>

        <label> Album</label>
        <input type="text" name="album" value="{{ old('album', $daftarLagu->album) }}" required>

        <label> Durasi (menit)</label>
        <select name="durasi_menit" required>
            @for($i = 1; $i <= 60; $i++)
                <option value="{{ $i }}" {{ old('durasi_menit', $daftarLagu->durasi_menit) == $i ? 'selected' : '' }}>
                    {{ $i }} Menit
                </option>
            @endfor
        </select>

        <label> Tahun Rilis</label>
        <input type="text" name="tahun_rilis" value="{{ old('tahun_rilis', $daftarLagu->tahun_rilis) }}" required>

        <button type="submit" class="btn btn-update"> Update Lagu</button>
        <a href="{{ route('route_daftar_lagu.index') }}" class="btn btn-cancel"> Kembali</a>
    </form>
</body>
</html>