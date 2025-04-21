<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Detail</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; padding: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Detail Booking</h2>
        <table>
            <tr>
                <th>Nama</th>
                <td>{{ $service->user->name }}
                </td>
            </tr>
            <tr>
                <th>Kamar</th>
                <td>{{ $service->categoryService->name }}</td>
            </tr>
            <tr>
                <th>Check-in</th>
                <td>{{ $service->check_in_date }}</td>
            </tr>
            <tr>
                <th>Check-out</th>
                <td>{{ $service->check_out_date }}</td>
            </tr>
            <tr>
                <th>Jumlah Orang</th>
                <td>{{ $service->guest_count }}</td>
            </tr>
            <tr>
                <th>Metode Pembayaran</th>
                <td>{{ $service->payment_method }}</td>
            </tr>
            <tr>
                <th>Metode Pembayaran</th>
                <td>Rp {{ number_format($service->categoryService->price, 0, ',', '.') }}</td>
            </tr>
        </table>
        <p style="margin-top: 20px;">Terima kasih telah melakukan booking. Selamat menginap!</p>
    </div>
</body>
</html>
