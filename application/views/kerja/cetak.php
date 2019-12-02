<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12pt;
        }

        td {
            vertical-align: middle;
            text-align: center;
        }

        p {
            text-align: center;
        }
    </style>
</head>

<body>
    <!--mpdf
        <htmlpagefooter name="myfooter">
            <table width="100%" cellpadding="1" style="margin-top:0; margin-button:0;">
        <tbody>
            <tr>
                <td style=" border: 0.2mm ridge #888888; height:80px" width="7%">0</td>
                <td style="border: 0.2mm ridge #888888;" width="30%">Untuk Diimplementasikan</td>
                <td style="border: 0.2mm ridge #888888;" width="15%">07-08-2020</td>
                <td style="border: 0.2mm ridge #888888; vertical-align:bottom;" width="11%">RSK</td>
                <td style="border: 0.2mm ridge #888888; vertical-align:bottom;" width="11%">FND</td>
                <td style="border: 0.2mm ridge #888888; vertical-align:bottom;" width="11%">JVS</td>
                <td style="border: 0.2mm ridge #888888; vertical-align:bottom;" width="12%">EKP/MDY</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <td style="border: 0.2mm ridge #888888;" width="7%" rowspan="2">Rev</td>
                <td style="border: 0.2mm ridge #888888;" width="30%" rowspan="2">Deskripsi</td>
                <td style="border: 0.2mm ridge #888888;" width="15%" rowspan="2">Tanggal</td>
                <td style="border: 0.2mm ridge #888888;" width="11%">Dibuat</td>
                <td style="border: 0.2mm ridge #888888;" width="11%">Diperiksa</td>
                <td style="border: 0.2mm ridge #888888;" width="11%">Disetujui</td>
                <td style="border: 0.2mm ridge #888888;" width="12%">Disetujui</td>
            </tr>
            <tr>
                <td style="border: 0.2mm ridge #888888;" colspan="3">PT PGAS SOLUTION</td>
                <td style="border: 0.2mm ridge #888888;">PT PGN</td>
            </tr>
        </thead>
    </table>
        </htmlpagefooter>
        <sethtmlpagefooter name="myfooter" value="on" />
    mpdf-->

    <table width="100%" cellpadding="1" style="margin-top:0; margin-button:0;">
        <tr>
            <td width="12%" height="90" style="border: 0.2mm ridge #888888; border-right-style: none;"><img src="./assets/img/pgn.png" width="62px" height="88px" /></td>
            <td width="38%" style="border: 0.2mm ridge #888888; border-left-style: none; text-align: left">
                <div style="text-align: right">PT. Perusahaan Gas Negara Tbk.<br>Business Unit Infrastucture<br>Gas Transmission Management</div>
            </td>
            <td colspan="2" width="50%" style="border: 0.2mm ridge #888888; "><img src="./assets/img/pgasol.png" alt="" width="180px" height="40px" /></td>
        </tr>
        <tr>
            <td colspan="4" style="border: 0.2mm ridge #888888;">Kontrak Kerja Manajemen Aset Reliabilitas Infrastruktur Operasi (MARIO) nomor <br> 047600.PK/HK.02/BUI/2018 tanggal 31 Desember 2018</td>
        </tr>
        <tr>
            <td colspan="4" height="30px" style="border: 0.2mm ridge #888888;"><b>KERANGKA ACUAN KERJA</b></td>
        </tr>
    </table>
    <table width="100%" cellpadding="1" style="margin-top:0; margin-button:0;">
        <tr>
            <td width="40%" style="border: 0.2mm ridge #888888;">Nomor Dokumen</td>
            <td width="10%" style="border: 0.2mm ridge #888888;">Rev.</td>
            <td width="37%" style="border: 0.2mm ridge #888888;">Nomor Surat Perintah Kerja</td>
            <td width="13%" style="border: 0.2mm ridge #888888;" rowspan="2">Hal 1 Of &nbsp;&nbsp;</td>
        </tr>
        <tr>
            <td style="border: 0.2mm ridge #888888;"><?= $kerja['no_doc']; ?></td>
            <td style="border: 0.2mm ridge #888888;"><?= $kerja['nm_rev']; ?></td>
            <td style="border: 0.2mm ridge #888888;">-</td>
        </tr>
    </table>

    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <p><b><?= $kerja['nm_kerja']; ?></b></p>
    <pagebreak odd-header-value="off" odd-footer-value="off" />
</body>

</html>