<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>🎶 Library Lagu</title>
    <style>
        body {
            font-family: 'Trebuchet MS', sans-serif;
            background: linear-gradient(135deg, #ff77aa, #ffd86b);
            color: #222;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #fff;
            text-shadow: 2px 2px #000;
        }
        .container {
            background: #fffafc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 2px solid #ff9ed3;
        }
        th {
            background: #ff7eb9;
            color: white;
            padding: 12px;
            text-align: center;
            border-right: 2px solid #ffbde0;
        }
        td {
            padding: 10px;
            text-align: center;
            border-right: 2px solid #ffe0f2;
            border-bottom: 2px solid #ffd4eb;
        }
        tr:nth-child(even) {
            background-color: #fff0f5;
        }
        tr:hover {
            background-color: #ffe5f1;
        }
        .btn {
            padding: 6px 10px;
            margin: 2px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-add { background: #00bcd4; color: white; }
        .btn-edit { background: #ffc107; color: black; }
        .btn-delete { background: #f44336; color: white; }
        .alert {
            background: #d6ffd6;
            color: #0a650a;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            border: 1px solid #80ff80;
        }
    </style>
</head>
<form action="{{ route('route_daftar_lagu.index') }}" method="GET" class="mb-3">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari lagu..." class="form-control" style="width: 250px; display:inline-block;">
    <button type="submit" class="btn btn-primary">Cari</button>
</form>
<body>
    <h1> Library Lagu</h1>

    <div class="container">
        @if(session('success'))
            <div class="alert"> {{ session('success') }}</div>
        @endif

        <a href="{{ route('route_daftar_lagu.create') }}" class="btn btn-add"> Tambah Lagu Baru</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Artist</th>
                    <th>Album</th>
                    <th>Durasi (menit)</th>
                    <th>Tahun Rilis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($daftarLagu as $dl)
                    <tr>
                        <td>{{ $dl->id }}</td>
                        <td>{{ $dl->judul }}</td>
                        <td>{{ $dl->artist }}</td>
                        <td>{{ $dl->album }}</td>
                        <td>{{ $dl->durasi_menit }}</td>
                        <td>{{ $dl->tahun_rilis }}</td>
                        <td>
                            <a href="{{ route('route_daftar_lagu.edit', $dl->id) }}" class="btn btn-edit"> Edit</a>
                            <form action="{{ route('route_daftar_lagu.destroy', $dl->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus {{ $dl->judul }}?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($daftarLagu->count() == 0)
                    <tr>
                        <td colspan="7" style="text-align:center; padding:30px;">Belum ada lagu 😢</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <p style="margin-top: 20px; color: #555; font-weight:bold;">
            Total: {{ $daftarLagu->count() }} lagu
        </p>
    </div>
</body>
</html>