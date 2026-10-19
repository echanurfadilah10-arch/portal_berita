<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Berita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .header h2 {
            margin: 0;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0 0;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
            padding: 8px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 8px;
        }
        .text-center {
            text-align: center;
        }
        .badge {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 10px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Laporan Data Berita Portal Berita SI</h2>
        <p>Tanggal Cetak: {{ date('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th width="45%">Judul Berita</th>
                <th width="20%">Kategori</th>
                <th width="30%">Tanggal Diterbitkan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $index => $post)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td><strong>{{ $post->title }}</strong></td>
                    <td><span class="badge">{{ $post->category->name ?? 'Tanpa Kategori' }}</span></td>
                    <td>{{ $post->created_at->format('d M Y, H:i') }} WIB</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data berita.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>