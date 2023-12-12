<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Policy Summary</title>
    <style account="text/css">
        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }

        header {
            margin: 0px !important;
            padding: 0px;
        }

        main {
            margin: 0px;
            padding: 0px;
        }

        footer {
            margin: 0px;
            padding: 0px;
        }

        .logoSalvus {
            float: left;
            height: 100px;
            width: 750px;
        }

        .footerRingpol {
            margin-top: 120px;
            width: 100%;
        }

        .titlePolicy {
            margin-top: 100px;
        }

        .textTitle {
            align-content: center;
            height: 35px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <header>
        <img src='{{ public_path() . '/images/Header Ringpol.png' }}' class="logoSalvus">
    </header>
    <main>
        <div class="titlePolicy">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 550px">
                            <h2 style="color: #2156A5; margin :0px !important; padding: 0px !important">Ringkasan
                                Polis</h2>
                        </td>
                        <td>
                            <p style="margin :0px !important; padding: 0px !important"><i>Policy Summary</i></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr style="color: black">
        <div class="textTitle">
            <table style="background-color: #2156A5; font-size: 12px">
                <tbody>
                    <tr>
                        <td>
                            <p style="color: white; padding: 1px;  margin: 1px;">INFORMASI PEMEGANG RINGKASAN POLIS
                            </p>
                        </td>
                        <td style="width: 200px"></td>
                        <td>
                            <p style="color: white; padding: 1px;  margin: 1px;"><i>POLICY SUMMARY HOLDER
                                    INFORMATION</i></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <center>
            <p style="color: #2156A5; font-size: 14px; margin :0px !important; padding: 0px !important"><b>Cargo
                    Insurance {{ @$data->order->product->display_name }}</b></p>
        </center>
        <div class="detailPolicy">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 300px">
                            <p style="color: #2156A5; float: right; font-size: 14px;">Nomor Ringkasan Polis <br>
                                <i style="font-size: 12px !important">Policy Summary
                                    Number</i>
                            </p>
                        </td>
                        <td style="margin-top: 25px; margin-left: 20px; width: 20px"> : </td>
                        <td style="width: 300px">
                            <p style="margin-top: 18px; font-size: 14px;">{{ @$data->policy_number }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 300px">
                            <p
                                style="color: #2156A5; float: right; font-size: 14px; margin :0px !important; padding: 0px !important">
                                Nama Tertanggung<br> <i style="font-size: 12px !important">Insured Name
                                </i></p>
                        </td>
                        <td
                            style="margin-top: 25px; margin-left: 20px; width: 20px; margin :0px !important; padding: 0px !important">
                            :
                        </td>
                        <td style="width: 300px">
                            <p
                                style="margin-top: 18px; font-size: 14px; margin :0px !important; padding: 0px !important">
                                {{ @$data->order->company_name }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 300px; margin:10px">
                            <p style="color: #2156A5; float: right; font-size: 14px; padding: 0px !important">
                                Alamat Tertanggung <br>
                                <i style="font-size: 12px !important">Address of Insured
                                </i>
                            </p>
                        </td>
                        <td
                            style="margin-top: 25px; margin-left: 20px; width: 20px; margin :0px !important; padding: 0px !important">
                            :
                        </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 14px; padding: 0px !important">
                                {{ @$data->order->insured_address }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 300px; margin:30px">
                            <p style="color: #2156A5; float: right; font-size: 14px;">Periode Polis <br> <i
                                    style="font-size: 12px !important">Policy
                                    Period </i><br>
                                (DD/MM/YYYY)</p>
                        </td>
                        <td style="margin-top: 25px; margin-left: 20px; width: 20px"> : </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 14px;">
                                {{ date('d-m-Y', strtotime(@$data->start_policy_date)) }} -
                                {{ date('d-m-Y', strtotime(@$data->end_policy_date)) }}
                            </p>
                        </td>
                    </tr>

                    <tr c>
                        <td style="width: 300px; margin:30px">
                            <p style="color: #2156A5; float: right; font-size: 14px;">Periode
                                Diterbitkan<br><i style="font-size: 12px !important">Policy Period
                                </i><br>
                                (DD/MM/YYYY)</p>
                        </td>
                        <td style="margin-top: 25px; margin-left: 20px; width: 20px"> : </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 14px;">
                                {{ date('d/m/Y', strtotime(@$data->start_policy_date)) }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 300px">
                            <p style="color: #2156A5; float: right; font-size: 14px;">Jaminan
                                Asuransi<br><i style="font-size: 12px !important">Coverage Insurance
                                </i></p>
                        </td>
                        <td style="margin-top: 25px; margin-left: 20px; width: 20px"> : </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 14px;">Institute Cargo Clause
                                {{ @$data->order->coverage }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 300px">
                            <p
                                style="color: #2156A5; float: right; font-size: 14px; margin :0px !important; padding: 0px !important">
                                Perjalanan<br><i style="font-size: 12px !important">Voyage
                                </i></p>
                        </td>
                        <td style="margin-top: 25px; margin-left: 20px; width: 20px; padding: 0px !important">
                            :
                        </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 14px; padding: 0px !important">
                                From {{ @$data->order->point_of_origin }} to
                                {{ @$data->order->point_of_destination }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 300px">
                            <p
                                style="color: #2156A5; float: right; font-size: 14px; margin :0px !important; padding: 0px !important">
                                Barang yang
                                Diasuransikan<br><i style="font-size: 12px !important">Interest Insured
                                </i></p>
                        </td>
                        <td
                            style="margin-top: 25px; margin-left: 20px; width: 20px; margin :0px !important; padding: 0px !important">
                            : </td>
                        <td>
                            <p
                                style="margin-top: 18px; font-size: 14px; margin :0px !important; padding: 0px !important">
                                -</p>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td style="width: 300px">
                            <p
                                style="color: #2156A5; float: right; font-size: 14px; margin :0px !important; padding: 0px !important">
                                Total Sum Insured<br></p>
                        </td>
                        <td
                            style="margin-top: 25px; margin-left: 20px; width: 20px; margin :0px !important; padding: 0px !important">
                            : </td>
                        <td>
                            <p
                                style="margin-top: 18px; font-size: 14px; margin :0px !important; padding: 0px !important">
                                IDR {{ number_format(@$data->order->total_sum_insured ?? 0, 0, ',', '.') }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 300px">
                            <p style="color: #2156A5; float: right; font-size: 14px; ">Gross Premium<br><i
                                    style="font-size: 12px !important">Gross Premium
                                </i></p>
                        </td>
                        <td style="margin-top: 25px; margin-left: 20px; width: 20px"> : </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 14px;">IDR
                                {{ number_format(@$data->order->premium_amount ?? 0, 0, ',', '.') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 300px">
                            <p
                                style="color: #2156A5; float: right; font-size: 14px; margin :0px !important; padding: 0px !important">
                                Additional Cost<br></p>
                        </td>
                        <td
                            style="margin-top: 25px; margin-left: 20px; width: 20px; margin :0px !important; padding: 0px !important">
                            : </td>
                        <td>
                            <p
                                style="margin-top: 18px; font-size: 14px; margin :0px !important; padding: 0px !important">
                                IDR
                                {{ number_format(@$data->order->product->additional_cost['value'] ?? 0, 0, ',', '.') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 300px">
                            <p
                                style="color: #2156A5; float: right; font-size: 14px; margin :0px !important; padding: 0px !important">
                                Discount<br></p>
                        </td>
                        <td
                            style="margin-top: 25px; margin-left: 20px; width: 20px; margin :0px !important; padding: 0px !important">
                            : </td>
                        <td>
                            <p
                                style="margin-top: 18px; font-size: 14px; margin :0px !important; padding: 0px !important">
                                {{ @$data->order->product->discount ?? 0 }} %
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 300px">
                            <p style="color: #2156A5; float: right; font-size: 14px;">Kendaraan<br><i
                                    style="font-size: 12px !important">Conveyance
                                </i></p>
                        </td>
                        <td style="margin-top: 25px; margin-left: 20px; width: 20px"> : </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 14px;">By {{ @$data->order->conveyance }}
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 300px">
                            <p style="color: #2156A5; float: right; font-size: 14px;">Total Premium
                                <br><i style="font-size: 12px !important">
                                </i>
                            </p>
                        </td>
                        <td style="margin-top: 25px; margin-left: 20px; width: 20px"> : </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 14px;">IDR
                                {{ number_format(@$data->order->premium_amount ?? 0, 0, ',', '.') }}
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <footer class="footerRingpol">
        <img src='{{ public_path() . '/images/Footer Ringpol.png' }}' style="width: 690px;">
    </footer>
</body>

</html>
