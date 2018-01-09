<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Billing</title>
  </head>
<style type="text/css">
    @font-face { font-family: SourceSansPro; src: url(SourceSansPro-Regular.ttf); }
    .clearfix:after { content: ""; display: table; clear: both; }
    a { color: #0087C3; text-decoration: none; }
    body { position: relative; width: 19cm; height: 29.7cm; margin: 0 auto;  color: #555555; background: #FFFFFF;  font-family: Arial, sans-serif;  font-size: 14px;  font-family: SourceSansPro; }
    header { padding: 10px 0; margin-bottom: 20px; border-bottom: 1px solid #AAAAAA; }
    #logo { float: left; margin-top: 8px; }
    #logo img { height: 70px; }
    #company {margin-left:300px; text-align: right; }
    #details { margin-bottom: 50px; }
    #client { padding-left: 6px; border-left: 6px solid #0087C3; float: left;width: 250px }
    #client .to { color: #777777; }
    h2.name { font-size: 1.4em; font-weight: normal; margin: 0; }
    #invoice { margin-left: 250px; text-align: right; }
    #invoice h1 { color: #0087C3; font-size: 2.4em; line-height: 1em; font-weight: normal; margin: 0  0 10px 0; }
    #invoice .date { font-size: 1.1em; color: #777777; }
    table { width: 100%; border-collapse: collapse; border-spacing: 0; margin-bottom: 20px; }
    table th, table td { padding: 20px; background: #EEEEEE; text-align: center; border-bottom: 1px solid #FFFFFF; }
    table th { white-space: nowrap; font-weight: normal; }
    table td { text-align: right; }
    table td h3{ color: #57B223; font-size: 1.2em; font-weight: normal; margin: 0 0 0.2em 0; }
    table .no { color: #FFFFFF; font-size: 1.6em; background: #57B223; }
    table .desc { text-align: left; }
    table .unit { background: #DDDDDD; }
    table .qty { }
    table .total { background: #57B223; color: #FFFFFF; }
    table td.unit,
    table td.qty,
    table td.total { font-size: 1.2em; }
    table tbody tr:last-child td { border: none; }
    table tfoot td { padding: 10px 20px; background: #FFFFFF; border-bottom: none; font-size: 1.2em;
      white-space: nowrap;  border-top: 1px solid #AAAAAA;  }
    table tfoot tr:first-child td { border-top: none;  }
   /* table tfoot tr:last-child td { color: #57B223; font-size: 1.4em; border-top: 1px solid #57B223; }*/
    table tfoot tr td:first-child { border: none; }
    #thanks{ font-size: 2em; margin-bottom: 50px; }
    #notices{ padding-left: 6px; border-left: 6px solid #0087C3; }
    #notices .notice { font-size: 1.2em; }
    footer { color: #777777; width: 100%; height: 30px; position: absolute; bottom: 0; border-top: 1px solid #AAAAAA; padding: 8px 0; text-align: center; }
</style>
<body>
    <header class="clearfix">
      <div id="logo" style="120px">
        <img alt="" style="width: 125px;" src="http://localhost/tms/public/img/home_logo.png"/>
      </div>
      <div id="company">
        <h2 class="name">Company Name</h2>
        <div>455 Foggy Heights, AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{ $arrCustomerDelt['full_name'] }}</h2>
          <div class="address">{{ $arrCustomerDelt['contact_address']['address1'] }} <br />
            {{  $arrCustomerDelt['contact_address']['city'] .', '. $arrCustomerDelt['contact_address']['state']   }} <br />
            {{ $arrCustomerDelt['contact_address']['zip'] }}
          </div>
          <div class="email"><a href="mailto:{{ $arrCustomerDelt['contact_address']['email'] }}">{{ $arrCustomerDelt['contact_address']['email'] }}</a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE {{ request()->id }}</h1>
          <div class="date">Date of Invoice: {{ date('d-m-Y', strtotime($arrBilling['created_at']))  }}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @php $totAmount = 0; @endphp
          @forelse ($arrOrderCharge as $orderCharge)            
          @php
            $totAmount += $orderCharge['amounts'];
          @endphp
              <tr>
                <td class="no">{{ $loop->iteration }}</td>
                <td class="desc">{{ $orderCharge['charge_type'] }}</td>
                <td class="unit">{{ $orderCharge['rates'] }}</td>
                <td class="qty">{{ $orderCharge['units'] }}</td>
                <td class="total">{{ $orderCharge['amounts'] }}</td>
              </tr>
              @empty
              <tr>
                  <td colspan="5" style="text-align: center">
                      <strong style="font-size: 18px;">No Records Found!</strong>
                  </td>     
              </tr>
          @endforelse

          
        </tbody>
        <tfoot>
         {{--  <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>$5,200.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX 25%</td>
            <td>$1,300.00</td>
          </tr> --}}
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>{{ $totAmount }}</td>
          </tr>
        </tfoot>
      </table>
      {{-- <div id="thanks">Thank you!</div> --}}
     {{--  <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> --}}
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>