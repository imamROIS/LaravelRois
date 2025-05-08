<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Dokumen Resmi LP UMKM</title>
    <style>
        /* Style dokument pendukung */
        .document-item-single {
            margin-top: 2cm;
            text-align: center;
            page-break-inside: avoid;
        }

        .document-image-single {
            max-width: 100%;
            max-height: 15cm;
            display: block;
            margin: 0 auto;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .pdf-preview-single {
            width: 100%;
            height: 600px;
            border: 1px solid #ddd;
            margin: 0 auto;
        }

        .file-info-single {
            margin-top: 1cm;
            font-size: 12pt;
            text-align: center;
        }

        .missing-document-single {
            padding: 2cm;
            text-align: center;
            font-style: italic;
            color: #666;
        }

        .unsupported-format {
            padding: 2cm;
            text-align: center;
            color: #666;
            border: 1px dashed #ccc;
        }

        /* Memastikan setiap dokumen dimulai di halaman baru */
        .page {
            page-break-after: always;
        }

        .last-page {
            page-break-after: auto;
        }

        /* Reset Margin dan Padding */
        body {
            margin: 0;
            padding: 0;
            font-family: "Times New Roman", serif;
        }

        /* Container Utama */
        .page {
            page-break-after: auto;
        }

        .last-page {
            page-break-after: auto;
        }

        /* Kop Surat */
        .letterhead {
            display: block;
            width: 100%;
            margin-bottom: 1cm;
            padding-bottom: 15px;
            border-bottom: 3px solid #000;
        }

        .logo-column {
            width: 100px;

        }

        .header-column {
            flex: 1;
            padding-left: 10px;
            border-left: 1px solid #ddd;
            align-items: center;
        }

        .header-title {
            text-align: left;
            font-size: 14pt;
            font-weight: bold;
            margin: 0 0 5px 0;
            text-transform: uppercase;
        }

        .header-subtitle {
            text-align: left;
            font-size: 12pt;
            margin: 0 0 3px 0;
            font-weight: bold;
        }

        .header-info {
            text-align: left;
            font-size: 10pt;
            margin: 0;
            line-height: 1.4;
        }

        /* Konten Dokumen */
        .content {
            margin-top: 1cm;
            margin-bottom: 2cm;
        }

        /* Footer */
        .footer {
            position: absolute;
            bottom: 1cm;
            left: 1.5cm;
            right: 1.5cm;
            font-size: 9pt;
            border-top: 1px solid #000;
            padding-top: 5px;
        }

        .footer-left {
            float: left;
            width: 45%;
        }

        .footer-center {
            float: center;
            text-align: center;
            width: 100%;

        }

        .footer-right {
            float: right;
            text-align: right;
            width: 45%;
        }

        .page-number:after {
            content: counter(page);
        }

        .notes {
            font-style: italic;
            margin-top: 5px;
        }

        /* Tabel Data */
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 10pt;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .data-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Tanda Tangan */
        .signature-area {
            margin-top: 50px;
        }

        .signature-line {
            width: 200px;
            border-top: 1px solid #000;
            margin: 5px 0;
            display: inline-block;
        }

        /* Dokumen Pendukung */
        .document-page {
            margin-top: 1cm;
        }

        .document-title {
            font-size: 12pt;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
            text-decoration: underline;
        }

        .document-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .document-item {
            page-break-inside: avoid;
            margin-bottom: 40px;
        }

        .document-label {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 14px;
            color: #333;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .document-preview {
            width: 100%;

            border: 1px solid #eee;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #f9f9f9;
            margin-bottom: 10px;
        }

        .document-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .pdf-preview {
            width: 100%;
            height: 300px;
            border: 1px solid #ddd;
            background: white;
        }

        .pdf-preview iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .btn-download {
            display: inline-block;
            padding: 6px 12px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 12px;
            margin-top: 8px;
        }

        .btn-download:hover {
            background: #2980b9;
        }

        .unsupported-format {
            padding: 20px;
            background: #f8f9fa;
            border: 1px dashed #ccc;
            color: #666;
            text-align: center;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .file-info {
            font-size: 11px;
            color: #666;
            margin-top: 5px;
        }

        /* Untuk nomor halaman */
        @page {
            margin: 1.5cm;

            @bottom-center {
                content: "Halaman "counter(page) " dari "counter(pages);
                font-size: 9pt;
                font-family: "Times New Roman";
            }
        }

    </style>
</head>
<body>
    <!-- Halaman 1: Data Utama -->
    <div class="page">
        <!-- Kop Surat -->

        <div class="letterhead">
            <table width="100%">
                <tr>
                    <th width="20%"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/Logo.png'))) }}" width="100"></th>
                    <td>
                        <div class="header-column">
                            <h1 class="header-title">dokumen resmi</h1>
                            <h2 class="header-subtitle">LP UMKM Muhammadiyah Jakarta</h2>
                            <p class="header-info">
                                Jl. Kramat Raya No. 49, Senen, Jakarta Pusat, 10430 <br>
                                Telp. 0838-9606-5344 | Email: lpumkmpwmjakarta@gmail.com<br>
                                Jakarta Pusat 10430
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>



        <!-- Konten Dokumen -->
        <div class="content">
            <h3 style="text-align:center;margin-bottom:20px;">DATA ANGGOTA</h3>

            <table class="data-table">
                <tr>
                    <th width="25%">ID Anggota</th>
                    <td>{{ $anggota->ID_Anggota }}</td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $anggota->Nama_Anggota }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $anggota->Jenis_Kelamin }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>{{ $anggota->No_KTP_NIK }}</td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td>{{ $anggota->No_Handphone }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $anggota->Email }}</td>
                </tr>
                <tr>
                    <th>Sosial Media</th>
                    <td>{{ $anggota->Sosmed }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $anggota->Alamat_Tinggal }}</td>
                </tr>
                <tr>
                    <th>Kelurahan</th>
                    <td>{{ $anggota->Kelurahan_Tinggal }}</td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td>{{ $anggota->Kecamatan_Tinggal }}</td>
                </tr>
                <tr>
                    <th>Kota</th>
                    <td>{{ $anggota->Kota_Tinggal }}</td>
                </tr>

            </table>


        </div>

        {{-- <!-- Tanda Tangan -->
        <div class="signature-area">
            <p>Jakarta, {{ now()->format('d F Y') }}</p>
        <div class="signature-line"></div>
        <p>Direktur Utama<br>LP UMKM DKI Jakarta</p>
    </div> --}}

    <!-- Footer -->
    <div class="footer">
        <div class="footer-left">
            <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
        </div>

        <div class="footer-center">
            <span class="page-number"></span>
        </div>
        <div class="footer-right">
            <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
        </div>
    </div>
    </div>

    <!-- Halaman 2: Dokumen Pendukung -->
    <div class="page last-page">
        <!-- Kop Surat -->
        <div class="letterhead">
            <table width="100%">
                <tr>
                    <th width="20%"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/Logo.png'))) }}" width="100"></th>
                    <td>
                        <div class="header-column">
                            <h1 class="header-title">dokumen resmi</h1>
                            <h2 class="header-subtitle">LP UMKM Muhammadiyah Jakarta</h2>
                            <p class="header-info">
                                Jl. Kramat Raya No. 49, Senen, Jakarta Pusat, 10430 <br>
                                Telp. 0838-9606-5344 | Email: lpumkmpwmjakarta@gmail.com<br>
                                Jakarta Pusat 10430
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Konten Dokumen -->
        <div class="document-page">
            <div class="document-title">DATA USAHA</div>

            <table class="data-table">
                <tr>
                    <th width="25%">Nama Usaha</th>
                    <td>{{ $anggota->Nama_Usaha }}</td>
                </tr>
                <tr>
                    <th>Alamat Usaha</th>
                    <td>{{ $anggota->Alamat_Usaha }}</td>
                </tr>
                <tr>
                    <th>Kelurahan Usaha</th>
                    <td>{{ $anggota->Kelurahan_Usaha }}</td>
                </tr>
                <tr>
                    <th>Kecamatan Usaha</th>
                    <td>{{ $anggota->Kecamatan_Usaha }}</td>
                </tr>
                <tr>
                    <th>Kota Usaha</th>
                    <td>{{ $anggota->Kota_Usaha }}</td>
                </tr>
                <tr>
                    <th>Bidang Usaha</th>
                    <td>{{ $anggota->Bidang_Usaha }}</td>
                </tr>
                <tr>
                    <th>Jenis Produk</th>
                    <td>{{ $anggota->Jenis_Produk }}</td>
                </tr>
                <tr>
                    <th>Lama Berusaha</th>
                    <td>{{ $anggota->Lama_Berusaha }}</td>
                </tr>
                <tr>
                    <th>Pemasaran Produk</th>
                    <td>{{ $anggota->Pemasaran_Produk }}</td>
                </tr>
                <tr>
                    <th>Omzet Harian</th>
                    <td>{{ number_format($anggota->Omzet_Harian, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Omzet Mingguan</th>
                    <td>{{ number_format($anggota->Omzet_Mingguan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Omzet Bulanan</th>
                    <td>{{ number_format($anggota->Omzet_Bulanan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah Cabang</th>
                    <td>{{ $anggota->Jumlah_Cabang }}</td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-left">
                <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
            </div>
            <div class="footer-center">
                <span class="page-number"></span>
            </div>
            <div class="footer-right">
                <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
            </div>
        </div>
    </div>


    <!-- Halaman 3: Dokumen Pendukung -->
    <div class="page">
        <div class="letterhead">
            <table width="100%">
                <tr>
                    <th width="20%"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/Logo.png'))) }}" width="100"></th>
                    <td>
                        <div class="header-column">
                            <h1 class="header-title">dokumen resmi</h1>
                            <h2 class="header-subtitle">LP UMKM Muhammadiyah Jakarta</h2>
                            <p class="header-info">
                                Jl. Kramat Raya No. 49, Senen, Jakarta Pusat, 10430 <br>
                                Telp. 0838-9606-5344 | Email: lpumkmpwmjakarta@gmail.com<br>
                                Jakarta Pusat 10430
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="document-page">
            <div class="document-title">DOKUMEN KTP</div>

            @php
            $document = collect($documents)->firstWhere('label', 'KTP');
            @endphp

            <div class="document-item-single">
                @if($document)
                @if($document['is_image'])
                <img src="data:{{ $document['type'] }};base64,{{ base64_encode(file_get_contents($document['path'])) }}" class="document-image-single" alt="{{ $document['original_name'] }}">
                @elseif($document['is_pdf'])
                <div class="pdf-preview-single">
                    <iframe src="data:application/pdf;base64,{{ base64_encode(file_get_contents($document['path'])) }}#toolbar=0" style="width:100%;height:600px;"></iframe>
                </div>
                @else
                <div class="unsupported-format">
                    Format tidak didukung: {{ $document['type'] }}
                </div>
                @endif

                <div class="file-info-single">
                    Nama File: {{ $document['original_name'] }}
                </div>
                @else
                <div class="missing-document-single">
                    Dokumen KTP tidak tersedia
                </div>
                @endif
            </div>
        </div>

        <div class="footer">
            <div class="footer-left">
                <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
            </div>
            <div class="footer-center">
                <span class="page-number"></span>
            </div>
            <div class="footer-right">
                <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
            </div>
        </div>
    </div>

    <!-- Halaman 4: Dokumen NIB -->
    <div class="page">
        <div class="letterhead">
            <table width="100%">
                <tr>
                    <th width="20%"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/Logo.png'))) }}" width="100"></th>
                    <td>
                        <div class="header-column">
                            <h1 class="header-title">dokumen resmi</h1>
                            <h2 class="header-subtitle">LP UMKM Muhammadiyah Jakarta</h2>
                            <p class="header-info">
                                Jl. Kramat Raya No. 49, Senen, Jakarta Pusat, 10430 <br>
                                Telp. 0838-9606-5344 | Email: lpumkmpwmjakarta@gmail.com<br>
                                Jakarta Pusat 10430
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="document-page">
            <div class="document-title">DOKUMEN NIB</div>

            @php
            $document = collect($documents)->firstWhere('label', 'NIB');
            @endphp

            <div class="document-item-single">
                @if($document)
                @if($document['is_image'])
                <img src="data:{{ $document['type'] }};base64,{{ base64_encode(file_get_contents($document['path'])) }}" class="document-image-single" alt="{{ $document['original_name'] }}">
                @elseif($document['is_pdf'])
                <div class="pdf-preview-single">
                    <iframe src="data:application/pdf;base64,{{ base64_encode(file_get_contents($document['path'])) }}#toolbar=0" style="width:100%;height:600px;"></iframe>
                </div>
                @else
                <div class="unsupported-format">
                    Format tidak didukung: {{ $document['type'] }}
                </div>
                @endif

                <div class="file-info-single">
                    Nama File: {{ $document['original_name'] }}
                </div>
                @else
                <div class="missing-document-single">
                    Dokumen NIB tidak tersedia
                </div>
                @endif
            </div>
        </div>

        <div class="footer">
            <div class="footer-left">
                <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
            </div>
            <div class="footer-center">
                <span class="page-number"></span>
            </div>
            <div class="footer-right">
                <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
            </div>
        </div>
    </div>

    <!-- Halaman 5: Dokumen Tempat Usaha -->
    <div class="page">
        <div class="letterhead">
            <table width="100%">
                <tr>
                    <th width="20%"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/Logo.png'))) }}" width="100"></th>
                    <td>
                        <div class="header-column">
                            <h1 class="header-title">dokumen resmi</h1>
                            <h2 class="header-subtitle">LP UMKM Muhammadiyah Jakarta</h2>
                            <p class="header-info">
                                Jl. Kramat Raya No. 49, Senen, Jakarta Pusat, 10430 <br>
                                Telp. 0838-9606-5344 | Email: lpumkmpwmjakarta@gmail.com<br>
                                Jakarta Pusat 10430
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="document-page">
            <div class="document-title">DOKUMEN TEMPAT USAHA</div>

            @php
            $document = collect($documents)->firstWhere('label', 'Tempat Usaha');
            @endphp

            <div class="document-item-single">
                @if($document)
                @if($document['is_image'])
                <img src="data:{{ $document['type'] }};base64,{{ base64_encode(file_get_contents($document['path'])) }}" class="document-image-single" alt="{{ $document['original_name'] }}">
                @elseif($document['is_pdf'])
                <div class="pdf-preview-single">
                    <iframe src="data:application/pdf;base64,{{ base64_encode(file_get_contents($document['path'])) }}#toolbar=0" style="width:100%;height:600px;"></iframe>
                </div>
                @else
                <div class="unsupported-format">
                    Format tidak didukung: {{ $document['type'] }}
                </div>
                @endif

                <div class="file-info-single">
                    Nama File: {{ $document['original_name'] }}
                </div>
                @else
                <div class="missing-document-single">
                    Dokumen Tempat Usaha tidak tersedia
                </div>
                @endif
            </div>
        </div>

        <div class="footer">
            <div class="footer-left">
                <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
            </div>
            <div class="footer-center">
                <span class="page-number"></span>
            </div>
            <div class="footer-right">
                <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
            </div>
        </div>
    </div>

    <!-- Halaman 6: Dokumen Produk -->
    <div class="page">
        <div class="letterhead">
            <table width="100%">
                <tr>
                    <th width="20%"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/Logo.png'))) }}" width="100"></th>
                    <td>
                        <div class="header-column">
                            <h1 class="header-title">dokumen resmi</h1>
                            <h2 class="header-subtitle">LP UMKM Muhammadiyah Jakarta</h2>
                            <p class="header-info">
                                Jl. Kramat Raya No. 49, Senen, Jakarta Pusat, 10430 <br>
                                Telp. 0838-9606-5344 | Email: lpumkmpwmjakarta@gmail.com<br>
                                Jakarta Pusat 10430
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="document-page">
            <div class="document-title">DOKUMEN PRODUK</div>

            @php
            $document = collect($documents)->firstWhere('label', 'Produk');
            @endphp

            <div class="document-item-single">
                @if($document)
                @if($document['is_image'])
                <img src="data:{{ $document['type'] }};base64,{{ base64_encode(file_get_contents($document['path'])) }}" class="document-image-single" alt="{{ $document['original_name'] }}">
                @elseif($document['is_pdf'])
                <div class="pdf-preview-single">
                    <iframe src="data:application/pdf;base64,{{ base64_encode(file_get_contents($document['path'])) }}#toolbar=0" style="width:100%;height:600px;"></iframe>
                </div>
                @else
                <div class="unsupported-format">
                    Format tidak didukung: {{ $document['type'] }}
                </div>
                @endif

                <div class="file-info-single">
                    Nama File: {{ $document['original_name'] }}
                </div>
                @else
                <div class="missing-document-single">
                    Dokumen Produk tidak tersedia
                </div>
                @endif
            </div>
        </div>

        <div class="footer">
            <div class="footer-left">
                <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
            </div>
            <div class="footer-center">
                <span class="page-number"></span>
            </div>
            <div class="footer-right">
                <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
            </div>
        </div>
    </div>

    <!-- Halaman 7: Dokumen Sertifikat Halal -->
    <div class="page last-page">
        <div class="letterhead">
            <table width="100%">
                <tr>
                    <th width="20%"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/Logo.png'))) }}" width="100"></th>
                    <td>
                        <div class="header-column">
                            <h1 class="header-title">dokumen resmi</h1>
                            <h2 class="header-subtitle">LP UMKM Muhammadiyah Jakarta</h2>
                            <p class="header-info">
                                Jl. Kramat Raya No. 49, Senen, Jakarta Pusat, 10430 <br>
                                Telp. 0838-9606-5344 | Email: lpumkmpwmjakarta@gmail.com<br>
                                Jakarta Pusat 10430
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="document-page">
            <div class="document-title">DOKUMEN SERTIFIKAT HALAL</div>

            @php
            $document = collect($documents)->firstWhere('label', 'Sertifikat Halal');
            @endphp

            <div class="document-item-single">
                @if($document)
                @if($document['is_image'])
                <img src="data:{{ $document['type'] }};base64,{{ base64_encode(file_get_contents($document['path'])) }}" class="document-image-single" alt="{{ $document['original_name'] }}">
                @elseif($document['is_pdf'])
                <div class="pdf-preview-single">
                    <iframe src="data:application/pdf;base64,{{ base64_encode(file_get_contents($document['path'])) }}#toolbar=0" style="width:100%;height:600px;"></iframe>
                </div>
                @else
                <div class="unsupported-format">
                    Format tidak didukung: {{ $document['type'] }}
                </div>
                @endif

                <div class="file-info-single">
                    Nama File: {{ $document['original_name'] }}
                </div>
                @else
                <div class="missing-document-single">
                    Dokumen Sertifikat Halal tidak tersedia
                </div>
                @endif
            </div>
        </div>

        <div class="footer">
            <div class="footer-left">
                <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
            </div>
            <div class="footer-center">
                <span class="page-number"></span>
            </div>
            <div class="footer-right">
                <div class="notes">LPUMKM Muhammadiyah Jakarta</div>
            </div>
        </div>
    </div>
</body>
</html>
