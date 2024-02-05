<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Premium Note</title>
    <style account="text/css">
        .logoSalvus {
            float: left;
            height: 30px;
        }

        .companyAddress {
            margin-top: 80px;

        }

        .box1 {
            height: 180px;
            border: 1px solid black;
            padding: 10px;
        }

        .box2 {
            height: 400px;
            border: 1px solid black;
            width: 320px;
            float: left;
            padding: 10px;
        }

        .box3 {
            height: 400px;
            border: 1px solid black;
            width: 340px;
            float: right;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <img src='{{ public_path() . '/images/salvus-logo.png' }}' class="logoSalvus">
            <div class="companyAddress">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <p class="name"><b>PREMIUM NOTE</b></p>
                                {{-- <p style="font-size: 12px">No : 568383 / SURYA ANDRITAMA, PT</p> --}}
                                {{-- <p style="font-size: 12px">REF : 568383</p> --}}
                            </td>
                            {{-- <td style="width: 280px"></td>
                            <td style="width: 200px; justify-content:">
                                <p style="font-size: 12px;">Issue Date : <b style="font-size: 14px !important">14
                                        September
                                        2023</b></p>
                            </td> --}}
                        </tr>
                    </tbody>
                </table>
            </div>
        </header>
        <main>
            <hr>
            <center>
                <p><b style="font-size: 14px;">THIS PREMIUM NOTE IS NOT A RECEIPT NOR PROOF OF PAYMENT</b></p>
            </center>
            <div class="box1">
                <table>
                    <tbody>
                        <tr>
                            <td style="width: 140px; font-size: 12px">Policy Number </td>
                            <td>: </td>
                            <td style="font-size: 12px">{{ @$data->policy_number }}</td>
                        </tr>
                        <tr>
                            <td style="width: 140px; font-size: 12px">The Insured</td>
                            <td>: </td>
                            <td style="font-size: 12px">{{ @$data->order->company_name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 140px; font-size: 12px">Address</td>
                            <td>: </td>
                            <td style="font-size: 12px">{{ @$data->order->insured_address }}</td>
                        </tr>
                        <tr>
                            <td style="width: 140px; font-size: 12px">Class of Business</td>
                            <td>: </td>
                            <td style="font-size: 12px">{{ @$data->order->coverage }}</td>
                        </tr>
                        <tr>
                            <td style="width: 140px; font-size: 12px">Description</td>
                            <td>: </td>
                            <td style="font-size: 12px">{{ @$data->order->product->product_name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 140px; font-size: 12px">Insurer</td>
                            <td>: </td>
                            <td style="font-size: 12px">{{ @$data->order->product->security }}</td>
                        </tr>
                        <tr>
                            <td style="width: 140px; font-size: 12px">Policy Periode</td>
                            <td>: </td>
                            <td style="width: 350px; font-size: 12px">
                                {{ date('d-m-Y', strtotime(@$data->start_policy_date)) }} to
                                {{ date('d-m-Y', strtotime(@$data->end_policy_date)) }}</td>
                            <td style="font-size: 12px">Due Date</td>
                            <td style="font-size: 12px"> <b
                                    style="font-size: 14px !important">{{ date('d-m-Y', strtotime(@$data->end_policy_date)) }}</b>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="box2">
                <p style="font-size: 11px">Mohon segera melakukan pembayaran sejumlah yang tercantum dalam Premium Note
                    Pembayaran dilakukan ke Nomor Virtual Account dibawah ini :</p>
                <table>
                    <tbody>
                        <tr>
                            <td style="font-size: 12px; font-weight: bold;">Nama Bank</td>
                            <td style="font-size: 12px; font-weight: bold;">: </td>
                            <td style="font-size: 12px; font-weight: bold;">BANK CENTRAL ASIA</td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; font-weight: bold;">Nomor Virtual Account(IDR)</td>
                            <td style="font-size: 12px; font-weight: bold;">: </td>
                            <td style="font-size: 12px; font-weight: bold;">1425000000000035</td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; font-weight: bold;">Nama Rekening</td>
                            <td style="font-size: 12px; font-weight: bold;">: </td>
                            <td style="font-size: 12px; font-weight: bold;">PT. SALVUS INTI</td>
                        </tr>
                    </tbody>
                </table>
                <p style="font-size: 11px">Masukan nominal premi yang harus dibayarkan sesuai yang tertera pada Premium
                    Note. dan mencantumkan Nomor Polis atau Nomor Premium Note pada kolom pesan.</p>
                <p style="font-size: 11px">Jika nominal premi tertera dalam mata uang asing. harap menghubungi
                    Departemen Keuangan Salvus Inti sebelum melakukan pembayaran untuk mengkonfirmasi nilai tukar (kurs)
                    yang berlaku untuk pembayaran. Silahkan menghubungi kami salah satu titik kontak dibawah ini:</p>
                <table>
                    <tbody>
                        <tr>
                            <td style="font-size: 11px">Whatsapp</td>
                            <td style="font-size: 11px">: </td>
                            <td style="font-size: 11px">082152224431</td>
                        </tr>
                        <tr>
                            <td style="font-size: 11px">Email</td>
                            <td style="font-size: 11px">: </td>
                            <td style="font-size: 11px">finance@salvus.co.id</td>
                        </tr>
                        <tr>
                            <td style="font-size: 11px">Telepon</td>
                            <td style="font-size: 11px">: </td>
                            <td style="font-size: 11px">021-5666909</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <b style="font-size: 11px">Disclaimer:</b>
                <p style="font-size: 11px"><i>jika pembayaran dilakukan melebihi jatuh tempo pada premium note yang kami
                        kirimkan ini. perusahaan asuransi berhak membatalkan pertanggungan dan menolak klaim.</i></p>
            </div>
            <div class="box3">
                <table>
                    <tbody>
                        <tr>
                            <td style="font-size: 12px; width: 200px;">PREMIUM AMOUNT</td>
                            <td style="font-size: 12px">: </td>
                            <td style="font-size: 12px">IDR
                                {{ number_format(@$data->order->premium_amount ?? 0, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; width: 200px;">POLICY COST</td>
                            <td style="font-size: 12px">: </td>
                            <td style="font-size: 12px">IDR -</td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; width: 200px;">DISCOUNT</td>
                            <td style="font-size: 12px">: </td>
                            <td style="font-size: 12px">IDR -</td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; width: 200px;">ADITIONAL DISCOUNT</td>
                            <td style="font-size: 12px">: </td>
                            <td style="font-size: 12px; border-bottom: 1px black solid">IDR -</td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; width: 200px;">TOTAL</td>
                            <td style="font-size: 12px">: </td>
                            <td style="font-size: 12px">IDR
                                {{ number_format(@$data->order->premium_amount ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
            </div>
        </main>
    </div>
</body>

</html>
