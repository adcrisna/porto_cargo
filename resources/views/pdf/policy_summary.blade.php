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

        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            margin: 0px !important;
            padding: 0px;
        }

        .content {
            flex: 1;
        }

        .logoSalvus {
            float: left;
            height: 90px;
            width: 700px;
        }

        .footerRingpol {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
        }

        .footerRingpol img {
            max-width: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .titlePolicy {
            margin-top: 90px;
        }

        .textTitle {
            align-content: center;
            height: 35px;
            font-size: 11px;
        }
    </style>
</head>

<body>
    <header>
        <img src='{{ public_path() . '/images/Header Ringpol.png' }}' class="logoSalvus">
    </header>
    <main class="content">
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
            <p style="color: #2156A5; font-size: 12px; margin :0px !important; padding: 0px !important"><b>Cargo
                    Insurance {{ @$data->order->product->display_name }}</b></p>
        </center>
        <div class="detailPolicy">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-left: 100px; margin-bottom: 0px !important;">
                                Nomor Ringkasan Polis <br>
                                <i style="font-size: 12px !important">Policy Summary
                                    Number</i>
                            </p>
                        </td>
                        <td style="width: 20px"> : </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 12px;">{{ @$data->policy_number }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-left: 100px; margin-bottom: 0px !important; padding: 0px !important">
                                Nama Tertanggung<br> <i style="font-size: 12px !important">Insured Name
                                </i></p>
                        </td>
                        <td style="width: 20px; margin :0px !important; padding: 0px !important">
                            :
                        </td>
                        <td>
                            <p
                                style="margin-top: 18px; font-size: 12px; margin :0px !important; padding: 0px !important">
                                {{ @$data->order->company_name }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-top: 20px; margin-left: 100px; margin-bottom: 0px !important; padding: 0px !important">
                                Alamat Tertanggung <br>
                                <i style="font-size: 12px !important">Address of Insured
                                </i>
                            </p>
                        </td>
                        <td style="width: 20px; margin :0px !important; padding: 0px !important">
                            :
                        </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 12px; padding: 0px !important">
                                {{ @$data->order->insured_address }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-left: 100px; margin-bottom: 0px !important;">
                                Periode Polis <br> <i style="font-size: 12px !important">Policy
                                    Period </i><br>
                                (DD/MM/YYYY)</p>
                        </td>
                        <td style="margin-top: 0px; width: 20px"> : </td>
                        <td>
                            <p style="font-size: 12px;">
                                {{ date('d-m-Y', strtotime(@$data->start_policy_date)) }} -
                                {{ date('d-m-Y', strtotime(@$data->end_policy_date)) }}
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 240px; margin:35px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-left: 100px; margin-bottom: 0px !important;">
                                Periode
                                Diterbitkan<br><i style="font-size: 12px !important">Policy Period
                                </i><br>
                                (DD/MM/YYYY)</p>
                        </td>
                        <td style="width: 20px"> : </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 12px;">
                                {{ date('d/m/Y', strtotime(@$data->start_policy_date)) }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-left: 100px; margin-bottom: 0px !important;">
                                Jaminan
                                Asuransi<br><i style="font-size: 12px !important">Coverage Insurance
                                </i></p>
                        </td>
                        <td style="width: 20px"> : </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 12px;">Institute Cargo Clause
                                {{ @$data->order->coverage }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-left: 100px; margin-bottom: 0px !important; padding: 0px !important">
                                Perjalanan<br><i style="font-size: 12px !important">Voyage
                                </i></p>
                        </td>
                        <td style="width: 20px; padding: 0px !important">
                            :
                        </td>
                        <td>
                            <p style="font-size: 12px; padding: 0px !important">
                                From {{ @$data->order->point_of_origin }} to
                                {{ @$data->order->point_of_destination }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-top: 18px; margin-left: 100px; margin-bottom: 0px !important; padding: 0px !important">
                                Barang yang
                                Diasuransikan<br><i style="font-size: 12px !important">Interest Insured
                                </i></p>
                        </td>
                        <td style="width: 20px; margin :0px !important; padding: 0px !important">
                            : </td>
                        <td>
                            <p
                                style="margin-top: 18px; font-size: 12px; margin :0px !important; padding: 0px !important">
                                {{ @$data->order->item_description }}
                            </p>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-top: 3px; margin-left: 100px; margin-bottom: 0px !important; padding: 0px !important">
                                Total Sum Insured<br></p>
                        </td>
                        <td style="margin-top: 20px; width: 20px; margin :0px !important; padding: 0px !important">
                            : </td>
                        <td>
                            <p
                                style="margin-top: 18px; font-size: 12px; margin :0px !important; padding: 0px !important">
                                {{@$data->order->currency}} {{ number_format(@$data->order->total_sum_insured ?? 0, 0, ',', '.') }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-left: 100px; margin-bottom: 0px !important;">
                                Gross Premium<br><i style="font-size: 12px !important">Gross Premium
                                </i></p>
                        </td>
                        <td style="width: 20px"> : </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 12px;">{{@$data->order->currency}}
                                {{-- {{ number_format(@$data->order->premium_amount ?? 0, 0, ',', '.') }} --}}
                                @if (@$data->order->currency === "IDR")
                                    {{ number_format(@$data->order->premium_amount ?? 0, 0, ',', '.') }}
                                @elseif (@$data->order->currency === "USD")
                                    {{ number_format(@$data->order->premium_amount ?? 0, 2, ',', '.') }}
                                @else
                                    {{ number_format(@$data->order->premium_amount ?? 0, 2, ',', '.') }}
                                @endif
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-left: 100px; margin-bottom: 0px !important; padding: 0px !important">
                                Additional Cost<br></p>
                        </td>
                        <td style="width: 20px; margin :0px !important; padding: 0px !important">
                            : </td>
                        <td>
                            <p
                                style="margin-top: 18px; font-size: 12px; margin :0px !important; padding: 0px !important">
                                {{@$data->order->currency}}
                                {{ number_format(@$data->order->product->additional_cost['value'] ?? 0, 0, ',', '.') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-left: 100px; margin-bottom: 0px !important; padding: 0px !important">
                                Discount<br></p>
                        </td>
                        <td style="width: 20px; margin :0px !important; padding: 0px !important">
                            : </td>
                        <td>
                            <p
                                style="margin-top: 18px; font-size: 12px; margin :0px !important; padding: 0px !important">
                                {{ @$data->order->product->discount ?? 0 }} %
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-left: 100px; margin-bottom: 0px !important;">
                                Kendaraan<br><i style="font-size: 12px !important">Conveyance
                                </i></p>
                        </td>
                        <td style="width: 20px"> : </td>
                        <td>
                            <p style="margin-top: 18px; font-size: 12px;">By {{ @$data->order->conveyance }}
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 240px">
                            <p
                                style="color: #2156A5; font-size: 12px; margin-top: 12px; margin-left: 100px; margin-bottom: 0px !important;">
                                Total
                                Premium
                                <br><i style="font-size: 12px !important">
                                </i>
                            </p>
                        </td>
                        <td style="margin-top: 5px; width: 20px"> : </td>
                        <td>
                            <p style="font-size: 12px;">{{@$data->order->currency}}
                                {{ number_format(@$data->order->premium_amount ?? 0, 0, ',', '.') }}
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <footer class="footerRingpol">
        <img src='{{ public_path() . '/images/Footer Ringpol.png' }}'>
    </footer>
</body>

</html>
