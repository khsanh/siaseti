<!DOCTYPE html>
<html>
<head>
    <title>Template Label Aset</title>
    <style>
        @page {
        size: A4;
        margin: 0;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        font-size: 12px;
    }
    .label-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .label {
        display: flex;
        border: 1px solid #000;
        border-radius: 10px;
        overflow: hidden;
        width: 45%; /* Atur lebar kotak label di sini */
        margin: 5px; /* Atur margin kotak label di sini */
    }
        .container{
            margin:0px;
        }
        .row {
            margin: -1px;
        }

        .column {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .column-1 {
            width: 1.7cm;
            border-right: 3px solid #000;
            font-size: 9px;
        }

        .column-2 {
            width: 3.5cm;
            font-size: 10px;
        }

        .column-3 {
            width: 4.5cm;
            font-size: 10px;
        }

        .logo {
            text-align: center;
            margin-bottom: 5px;
            transform: rotate(270deg);
        }

        .logo img {
            width: 100%;
        }

        .bold {
            font-weight: bold;
        }

        .qr-code {
            margin-top: 5px;
        }

        .qr-code img {
            width: 17mm;
            height: 17mm;
        }
        .separator {
            height: 80%;
            margin: 0 8px;
        }
    </style>
</head>
<body>
    <div class="label-container">
        @foreach ($da as $da)
            <div class="label">
                <div class="column column-1">
                    <div class="logo">
                        <div class="pro">PROPERTY OF:</div>
                        <img src="{{ asset('assets/logo_perusahaan.png') }}" alt="Logo Perusahaan">
                    </div>
                </div>
                <div class="separator"></div>
                <div class="column column-2">
                    <div>Sites Location</div>
                    <div class="bold">PT Rekaindo Global Jasa</div>
                    <div>Helpdesk Contact</div>
                    <div class="bold">WA : 0811 3484 701</div>
                </div>
                <div class="column column-3">
                    <div>Asset Tag</div>
                    <div class="qr-code">
                        <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->generate($da->id)) }}" alt="QR Code">
                    </div>
                    <div class="bold">{{ $da->kode_aset }}</div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
