<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>Laporan Penjualan - Sweet Cake Bakery</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            color: #333;
        }

        /* =========================
           HEADER
        ========================== */

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin-bottom: 5px;
        }

        .header h2 {
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .header p {
            margin: 3px 0;
        }

        /* =========================
           RINGKASAN
        ========================== */

        .ringkasan {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .box {
            flex: 1;
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
        }

        .box h4 {
            margin: 0 0 10px;
        }

        .box p {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
        }

        /* =========================
           TABEL
        ========================== */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        th {
            background-color: #f5f5f5;
        }

        .text-center {
            text-align: center;
        }

        /* =========================
           TOMBOL BAWAH
        ========================== */

        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .back-button,
        .print-button {
            padding: 10px 20px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .back-button {
            background: #999;
        }

        .print-button {
            background: #e99ab5;
        }

        .back-button:hover {
            background: #888;
        }

        .print-button:hover {
            background: #dc87a4;
        }

        /* =========================
           FOOTER
        ========================== */

        .footer {
            margin-top: 40px;
            text-align: right;
        }

        /* =========================
           SAAT PRINT
        ========================== */

        @media print {

            .button-group {
                display: none;
            }

            body {
                padding: 0;
            }
        }
    </style>

</head>

<body>

    <!-- =========================
         HEADER LAPORAN
    ========================== -->

    <div class="header">

        <h1>🎂 Sweet Cake Bakery</h1>

        <h2>Laporan Penjualan</h2>

        <p>
            Tanggal:
            {{ $tanggalHariIni->translatedFormat('l, d F Y') }}
        </p>

    </div>


    <!-- =========================
         RINGKASAN PENJUALAN
    ========================== -->

    <div class="ringkasan">

        <div class="box">

            <h4>
                Total Transaksi
            </h4>

            <p>
                {{ number_format($ringkasan['total_transaksi']) }}
            </p>

        </div>


        <div class="box">

            <h4>
                Total Penjualan
            </h4>

            <p>
                Rp {{ number_format($ringkasan['total_penjualan']) }}
            </p>

        </div>


        <div class="box">

            <h4>
                Pembayaran Cash
            </h4>

            <p>
                Rp {{ number_format($ringkasan['total_cash']) }}
            </p>

        </div>


        <div class="box">

            <h4>
                Pembayaran Non Tunai
            </h4>

            <p>
                Rp {{ number_format($ringkasan['total_non_tunai']) }}
            </p>

        </div>

    </div>


    <!-- =========================
         PRODUK TERLARIS
    ========================== -->

    <h3>
        Produk Terlaris Hari Ini
    </h3>


    <table>

        <thead>

            <tr>

                <th>
                    No
                </th>

                <th>
                    Nama Produk
                </th>

                <th>
                    Jumlah Terjual
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($produkTerlaris as $index => $produk)

                <tr>

                    <td class="text-center">
                        {{ $index + 1 }}
                    </td>

                    <td>
                        🍰 {{ $produk->nama }}
                    </td>

                    <td class="text-center">
                        {{ $produk->total_terjual }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3" class="text-center">
                        Belum ada penjualan hari ini.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    <!-- =========================
         FOOTER
    ========================== -->

    <div class="footer">

        <p>
            Sweet Cake Bakery
        </p>

    </div>


    <!-- =========================
         TOMBOL
         ADA DI BAWAH LAPORAN
    ========================== -->

    <div class="button-group">

        <a href="{{ route('beranda') }}" class="back-button">
            ↩ Kembali
        </a>

        <button class="print-button" onclick="window.print()">
            🖨️ Print Laporan
        </button>

    </div>


</body>

</html>