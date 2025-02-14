<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>Invoice</title>
<style type="text/css">

table {
  border-collapse: collapse;
}
h2 h3{
  margin:0;
  padding:0;
}
.table {
  width: 100%;
  margin-bottom: 1rem;
  background-color: transparent;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
  border-top: 2px solid #dee2e6;
}

.table .table {
  background-color: #fff;
}

.table-bordered {
  border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #dee2e6;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}

.text-center{
  text-align: center;
}
.text-right{
  text-align: right;
}
table tr td{
  padding: 5px;
}

.table-bordered thead th, .table-bordered td, .table-bordered th{
   border: 1px solid black !important;
}

.table-bordered thead th{
  background-color:  #cacaca; 
}
@page {
  odd-header-name: odd-header;
  even-header-name: even-header;
  odd-footer-name: odd-footer;
  even-footer-name: even-footer;
}


</style>
<body>
  <div class="container">
    <div class="row" style="margin-bottom:5px;">
      <table style="width: 100%">
        <tbody>
          <tr>
            <td style="width: 25%" class="text-center"></td>
            <td class="text-center" style="width: 50%">
              <h4 style="font-weight: bold"><strong>{{$contact->name}}</strong></h4>
              <h5><strong>{{$contact->address}}</strong></h5>
              <h5><strong>Mobile: {{$contact->mobile_no}}</strong></h5>
            </td>
            <td class="text-center" style="width: 25%"></td>
          </tr>
        </tbody>
      </table>
      <div class="col col-sm-12">
        <hr style="margin-bottom: 0px;">
      </div>
    </div>

    <div class="row" style="margin-bottom:5px;">
      <div class="col col-sm-12 text-center">
        <table style="width: 100%">
          <tbody>
          <tr>
            <td style="width:42%"></td>
            <td style="width:16%;font-weight: bold;padding: 8px 15px;background-color: grey;color: #fff;border-radius: 15px;text-align: center;">
              <h5 >
                  INVOICE
              </h5>
            </td>
            <td style="width:42%"></td>
          </tr>
        </table>
      </div>
    </div>

    <div class="row" style="margin-bottom:5px;">
      <div class="col-md-12">
         <table style="border:1px solid black;width: 100%;">
           <tbody>
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Order No:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order->order_no}}</td>
              </tr>
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Shopping Type:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order['shipping']['shopping_type']['name']}}</td>
              </tr>
              @if(@$order['shipping']['sale_type_id']=="1")
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Collection Date:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{date('d-m-Y',strtotime(@$order['shipping']['date']))}}</td>
              </tr>
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Collection Time:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order['shipping']['collection_time']['name']}}}</td>
              </tr>
              @elseif(@$order['shipping']['sale_type_id']=="2")
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Delivery Date:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order['shipping']['dalivery_date']}}</td>
              </tr>
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Delivery Time:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order['shipping']['dalivery_time']}}</td>
              </tr>
              @endif
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Customer Name:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order['customer']['first_name']}} {{@$order['customer']['last_name']}}</td>
              </tr>
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Country:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order['customer']['country']}}</td>
              </tr>
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Post Code:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order['customer']['post_code']}}</td>
              </tr>
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">House No:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order['customer']['house_no']}}</td>
              </tr>
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Address:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order['customer']['address']}}</td>
              </tr>
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Mobile:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order['customer']['mobile']}}</td>
              </tr>
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Landline:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order['customer']['landline']}}</td>
              </tr>
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Email:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{@$order['customer']['email']}}</td>
              </tr>
              <tr>
                <td width="25%" style="font-weight:bold;font-size:11px;">Payment By:</td>
                <td width="75%" style="font-weight:bold;font-size:11px;text-align: left;">{{$order['payment']['payment_method']}}</td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <table class="table table-sm table-bordered">
            <tr class="text-center">
              <th style="background:grey;color:#fff;text-align: center;">SL.</th>
              <th style="background:grey;color:#fff;text-align: center;">Image</th>
              <th style="background:grey;color:#fff;text-align: center;">Product</th>
              <th style="background:grey;color:#fff;text-align: center;">Price</th>
              <th style="background:grey;color:#fff;text-align: center;">VAT</th>
              <th style="background:grey;color:#fff;text-align: center;">Qty</th>
              <th style="background:grey;color:#fff;text-align: center;">T VAT</th>
              <th style="background:grey;color:#fff;text-align: center;">Total</th>
            </tr>
            @php
                $grand_sub_total = 0;
            @endphp
            @foreach($order['order_details'] as $key => $details)
            @php
                $subtotal = $details->quantity*$details->price;
                $total_vat = $details->vat/100*$subtotal;
            @endphp
            <tr class="text-center">
              <td style="font-weight:bold;text-align: center;">{{$key+1}}</td>
              <td style="font-weight:bold;text-align: center;"><img src="{{url('public/upload/product_images/'.$details['product']['image'])}}" style="width: 50px;"></td>
              <td style="font-weight:bold;text-align: center;">{{$details['product']['name']}}</td>
              <td style="font-weight:bold;text-align: center;">£ {{$details->price}}</td>
              <td style="font-weight:bold;text-align: center;">{{$details->vat}}%</td>
              <td style="font-weight:bold;text-align: center;">{{$details->quantity}}</td>
              <td style="font-weight:bold;text-align: center;">£ {{$total_vat}}</td>
              <td style="font-weight:bold;text-align: center;">£ {{$subtotal}}</td>
            </tr>
	        @php
	           $grand_sub_total += $subtotal;
	        @endphp
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table style="border:1px solid #fff;width: 100%;">
           <tbody>
              <tr>
                <td width="75%" style="font-weight:bold;text-align: right;">Sub Total:</td>
                <td width="25%" style="font-weight:bold;text-align: center;">£ {{$grand_sub_total}}</td>
              </tr>
              <tr>
                <td width="75%" style="font-weight:bold;text-align: right;">VAT:</td>
                <td width="25%" style="font-weight:bold;text-align: center;">£ {{$order->order_vat}}</td>
              </tr>
              <tr>
                <td width="75%" style="font-weight:bold;text-align: right;">SHIPPING CHARGE:</td>
                <td width="25%" style="font-weight:bold;text-align: center;">FREE</td>
              </tr>
              <tr>
                <td width="75%" style="font-weight:bold;text-align: right;">Total:</td>
                <td width="25%" style="font-weight:bold;text-align: center;">£  {{$order->order_total}}</td>
              </tr>
            </tbody>
          </table>
      </div>
        @php
          $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        @endphp
      </div>
      <div class="col-md-12">
        <htmlpagefooter name="odd-footer">
          <hr style="margin-bottom: 0px;">
          <div style="float:right; width: 1%;">
            Authorized By <br>
            <i style="font-size: 12px;">Printing Time: {{$dt->format('F j, Y, g:i a')}} </i> <br>
            <i style="font-size: 11px;">Developed By #Popularsoft IT, www.popularsoftbd.com,01928511049</i>
          </div>
          <div style="float:left; width: 3%; text-align: right;">Received By</div>
        </htmlpagefooter>
      </div>
    </div>
  </div>
</body>
</html>
