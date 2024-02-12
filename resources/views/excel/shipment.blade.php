<table>
    <thead>
        <tr>
            <th>ID Premium / Premium Number</th>
            <th>Contract ID</th>
            <th>Product ID</th>
            <th>Company Name</th>
            <th>Phone Number</th>
            <th>Company Email</th>
            <th>Insured Address</th>
            <th>Conveyence</th>
            <th>Good Type</th>
            <th>Specify</th>
            <th>Estimated time of Departure</th>
            <th>Estimated time of Arrival</th>
            <th>Point of Origin</th>
            <th>point of destination</th>
            <th>Sum Insured</th>
            <th>Invoice number</th>
            <th>Packing list number</th>
            <th>Bill of landing Number</th>
            <th>Ship Name</th>
            <th>Vessel Group</th>
            <th>Container Load</th>
            <th>Vessel Material</th>
            <th>Vessel Type</th>
            <th>Classified</th>
            <th>Built year</th>
            <th>Transhipment</th>
            <th>Travel Permission</th>
            <th>License Plate</th>
            <th>License Plate Inter</th>
            <th>Inter Island</th>
            <th>Airway Bill</th>
            <th>Coverage</th>
            <th>Deductibles</th>
            <th>Total Sum Insured</th>
            <th>Rate</th>
            <th>Premium Amount</th>
            <th>Premium Payment Warranty</th>
            <th>Security</th>
            <th>Policy Periode</th>
            <th>Link Premium Note</th>
            <th>Link Policy Summary</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shipment as $key => $value)
            <tr>
                <td>{{ @$value->transaction->pn_number }}</td>
                <td>{{ @$value->product->contract_id }}</td>
                <td>{{ @$value->product_id }}</td>
                <td>{{ $value->company_name }}</td>
                <td>{{ $value->phone_number }}</td>
                <td>{{ $value->company_email }}</td>
                <td>{{ $value->insured_address }}</td>
                <td>{{ $value->conveyance }}</td>
                <td>{{ $value->goods_type }}</td>
                <td>{{ $value->specify }}</td>
                <td>{{ $value->estimated_time_of_departure }}</td>
                <td>{{ $value->estimated_time_of_arrival }}</td>
                <td>{{ $value->point_of_origin }}</td>
                <td>{{ $value->point_of_destination }}</td>
                <td>{{ $value->sum_insured }}</td>
                <td>{{ $value->invoice_number }}</td>
                <td>{{ $value->packing_list_number }}</td>
                <td>{{ $value->bill_of_lading_number }}</td>
                <td>{{ $value->ship_name }}</td>
                <td>{{ $value->vessel_group }}</td>
                <td>{{ $value->container_load }}</td>
                <td>{{ $value->vessel_material }}</td>
                <td>{{ $value->vessel_type }}</td>
                <td>{{ $value->classified }}</td>
                <td>{{ $value->built_year }}</td>
                <td>{{ $value->transhipment }}</td>
                <td>{{ $value->travel_permission }}</td>
                <td>{{ $value->license_plate }}</td>
                <td>{{ $value->license_plateinter }}</td>
                <td>{{ $value->inter_island }}</td>
                <td>{{ $value->airway_bill }}</td>
                <td>{{ $value->coverage }}</td>
                <td>{{ @$value->product->deductibles }}</td>
                <td>{{ $value->total_sum_insured }}</td>
                <td>{{ $value->rate }}</td>
                <td>{{ $value->premium_amount }}</td>
                <td>{{ $value->premium_payment_warranty }}</td>
                <td>{{ @$value->product->security }}</td>
                <td>{{ @$value->transaction->start_policy_date }} - {{ @$value->transaction->end_policy_date }}</td>
                <td>{{ @$value->transaction->doc_premium }}</td>
                <td>{{ @$value->transaction->doc_policy }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
