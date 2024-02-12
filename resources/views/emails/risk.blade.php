<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Akun Salvus Cargo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-size: 13px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            /* border-radius: 5px; */
            margin-top: 20px;
        }

        h1 {
            color: #0062CC;
        }

        p {
            margin-bottom: 20px;
        }

        .footer {
            /* background-color: #0062CC; */
            /* color: #ffffff; */
            /* padding: 10px; */
            text-align: left;
        }

        .contact-info {
            margin-top: 20px;
            color: #555555;
        }
    </style>
</head>

<body>
    <div class="container">
        <p>Dear team salvus,</p>
        <p>
            Berikut terlampir penawaran untuk asuransi Salvus Cargo.<br>
        </p>
        <p>
            Silahkan membaca informasi ini dengan hati-hati untuk memastikan bahwa semua kebutuhan client cukup untuk
            dibuatkan asuransinya. Jika tidak, silahkan menghubungi client sesuai informasi yang tertera di bawah ini :
        </p>
        <hr>
        <p style="background-color: #e4e4e4;padding-left:10px; margin:10px;">
            Company Name : {{ @$data->company_name ?? '-' }} <br>
            Phone Number : {{ @$data->phone_number ?? '-' }} <br>
            Company Email : {{ @$data->company_email ?? '-' }} <br>
            Insured Address : {{ @$data->insured_address ?? '-' }} <br>
            Conveyance : {{ @$data->conveyance ?? '-' }} <br>
            Goods Type : {{ @$data->goods_type ?? '-' }} <br>
            Item Description : {{ @$data->item_description ?? '-' }} <br>
            Specify : {{ @$data->specify ?? '-' }} <br>
            Estimated Time of Departure : {{ @$data->estimated_time_of_departure ?? '-' }} <br>
            Estimated Time of Arrival : {{ @$data->estimated_time_of_arrival ?? '-' }} <br>
            Point Of Origin : {{ @$data->point_of_origin ?? '-' }} <br>
            Point Of Destination : {{ @$data->point_of_destination ?? '-' }} <br>
            Sum Insured : {{ @$data->sum_insured ?? '-' }} <br>
            Invoice Number : {{ @$data->invoice_number ?? '-' }} <br>
            Packing List Number : {{ @$data->packing_list_number ?? '-' }} <br>
            Bill of Lading Number : {{ @$data->bill_of_lading_number ?? '-' }} <br>

            License Plate : {{ @$data->license_plate ?? '-' }} <br>
            Inter Island : {{ @$data->inter_island ?? '-' }} <br>
            License Plate Inter : {{ @$data->license_plateinter ?? '-' }} <br>

            Ship Name : {{ @$data->ship_name ?? '-' }} <br>
            Vessel Group : {{ @$data->vessel_group ?? '-' }} <br>
            Container Load : {{ @$data->container_load ?? '-' }} <br>
            Vessel Material : {{ @$data->vessel_material ?? '-' }} <br>
            Vessel Type : {{ @$data->vessel_type ?? '-' }} <br>
            Classified : {{ @$data->classified ?? '-' }} <br>
            Built Year : {{ @$data->built_year ?? '-' }} <br>
            Transhipment : {{ @$data->transhipment ?? '-' }} <br>

        </p>

        <hr>
        <p>
            Mohon hubungi client tersebut untuk konfirmasi terkait kebutuhan asuransi.
        </p>
        <div class="footer">
            <p>
                Perusahaan Pialang: <br>
                PT Salvus Inti <br>
                Jl. Tomang Raya No. 47F, Jakarta 11440, Indonesia <br>
            </p>

            <p>
                Informasi Kontak <br>
                Email kami : cs@salvus.co.id <br>
                Layanan pelanggan : +62 21 569 53 505 <br>
            </p>
            <p>
                <i>
                    <small>
                        PT Salvus Inti merupakan pialang asuransi berlisensi yang terdaftar dan diawasi oleh Otoritas
                        Jasa Keuangan Indonesia. PT Zurich Asuransi Indonesia Tbk merupakan asuransi umum yang berizin
                        dan diawasi oleh Otoritas Jasa Keuangan Indonesia
                    </small>
                </i>
            </p>
        </div>
    </div>

</body>

</html>
