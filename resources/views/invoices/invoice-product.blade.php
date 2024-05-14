<!DOCTYPE HTML>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice Product</title>
    <style type="text/css">
      body {
        font-family: arial !important;
      }
      table {
        font-size: 13px;
      }
    </style>

</head>

  <body>

    <table style="width:100%; margin-top:10px;">
        <tr>
            <td>
                <img src="{{'data:image/png;base64,' . base64_encode(file_get_contents($main_logo))}}" style="width: 110px;">
            </td>
            <td>
                {{-- <img src="{{'data:image/png;base64,' . base64_encode(file_get_contents(public_path() . '/assets/images/ttd-invoice.png'))}}" style="width: 70px; float:right;"> --}}
            </td>
        </tr>
    </table>

    <br>

    

    <div style="padding: 0 50px;">
        <div style="width:120px; text-align:center; background-color: #ffb300; padding: 10px; margin-bottom:10px; border-radius: 10px 0 10px 0;">
            <h2 style="margin:0;">INVOICE</h2>
        </div>
    </div>

    <table style="width:100%; margin-top:10px;">
        <tr>
            <td style="background-color: #dbdbdb !important; font-size:15px; padding:10px 55px;">
                <b>BUKTI PEMBELIAN</b> / <i> Receipt</i>
            </td>
        </tr>
    </table>

    <div style="padding: 0 50px;">
        <table style="width:100%;" cellpadding="4">
            <tr>
                <td style="width: 150px;"> <b>Nomor</b> / <i> Number</i> </td>
                <td style="width: 10px;"> : </td>
                <td> {{$invoice->external_id}} </td>
            </tr>
            <tr>
                <td style="width: 150px;"> <b>Tanggal</b> / <i> Date</i> </td>
                <td style="width: 10px;"> : </td>
                <td> {{ \Carbon\Carbon::parse($invoice->paid_at)->timezone('Asia/Jakarta')->format('d-M-Y H:i') }} </td>
            </tr>
        </table>
    </div>

    <table style="width:100%; margin-top:10px;">
        <tr>
            <td style="background-color: #dbdbdb !important; font-size:15px; padding:10px 55px;">
                <b>IDENTITAS PERSONAL</b> / <i> Personal Identity</i>
            </td>
        </tr>
    </table>
    <div style="padding: 0 50px;">
        <table style="width:100%;" cellpadding="4">
            <tr>
                <td style="width: 150px;"> <b>Nama</b> / <i> Name</i> </td>
                <td style="width: 10px;"> : </td>
                <td> {{$invoice->transaction->payer_name}} </td>
            </tr>
            <tr>
                <td style="width: 150px;"> <b>Surel</b> / <i> Email</i> </td>
                <td style="width: 10px;"> : </td>
                <td> {{$invoice->transaction->payer_email}} </td>
            </tr>
            <tr>
                <td style="width: 150px;"> <b>Kontak</b> / <i> Contact</i> </td>
                <td style="width: 10px;"> : </td>
                <td> {{$invoice->transaction->payer_phone}} </td>
            </tr>
        </table>
    </div>

    <table style="width:100%; margin-top:10px;">
        <tr>
            <td style="background-color: #dbdbdb !important; font-size:15px; padding:10px 55px;">
                <b>DETAIL TRANSAKSI</b> / <i> Personal</i> Identity
            </td>
        </tr>
    </table>
    <div style="padding: 0 50px;">
        <table style="width:100%;" cellpadding="4">
            <thead style="border-bottom:2px solid black;">
                <tr>
                    <td style="width: 300px;"> 
                        <b>Produk</b> 
                        <br>
                        <i>Product</i> 
                    </td>
                    <td style="text-align:right;"> 
                        <b>Jumlah</b> 
                        <br>
                        <i>Amount</i> 
                    </td>
                    <td style="text-align:right;"> 
                        <b>Harga Unit</b> 
                        <br>
                        <i>Unit Price</i> 
                    </td>
                    <td style="text-align:right;"> 
                        <b>Harga Total</b> 
                        <br>
                        <i>Total Price</i> 
                    </td>
                </tr>
            </thead>
            {{-- <tr>
                <td colspan="4" style="padding: 0;">
                    <hr>
                </td>
            </tr> --}}
            <tbody style="border-top: 2px solid black;">
                {{-- {{$invoice->transaction->cart->product->addons}} --}}
                <tr>
                    <td>{{$invoice->transaction->cart->product->productPrimary->name_id}}</td>
                    <td style="text-align:right;">1</td>
                    <td style="text-align:right;">IDR {{number_format($invoice->transaction->cart->product->productPrimary->price_idr, 0, ',', '.')}}</td>
                    <td style="text-align:right;">IDR {{number_format($invoice->transaction->cart->product->productPrimary->price_idr, 0, ',', '.')}}</td>
                </tr>
                @foreach ($invoice->transaction->cart->product->addons as $addon)
                <tr>
                    <td>{{$addon->productAddon->name_id}}</td>
                    <td style="text-align:right;">1</td>

                    @php
                        if($addon->productAddon->price_type == 'percentage') {
                            $calculate_addon_price = (int)number_format($invoice->transaction->cart->product->productPrimary->price_idr, 0, '', '') * (int)number_format($addon->productAddon->price_idr, 0, '', '') / 100;
                            $addon_price = number_format($calculate_addon_price, 0, ',','.');
                            $unit_addon_price = number_format($addon->productAddon->price_idr, 0, '', '') . '%';
                        } else {
                            $addon_price = number_format($addon->productAddon->price_idr, 0, ',', '.');
                            $unit_addon_price = number_format($addon->productAddon->price_idr, 0, ',', '.');
                        }
                    @endphp

                    <td style="text-align:right;">+ IDR {{$unit_addon_price}}</td>
                    <td style="text-align:right;">IDR {{$addon_price}}</td>
                </tr>
                @endforeach
            </tbody>
            {{-- <tr>
                <td colspan="4" style="padding: 0;"> 
                    <hr>
                </td>
            </tr> --}}
            <tfoot style="border-top:2px solid black;">
                @if(!empty($invoice->transaction->admin))
                <tr>
                    <td></td>
                    <td style="text-align:right;"></td>
                    <td style="text-align:right;"><b> Biaya Admin </b></td>
                    <td style="text-align:right;"><b> {{$invoice->transaction->currency}} {{ number_format($invoice->transaction->admin, 0, ',', '.')}} </b></td>
                </tr>
                @endif
                <tr>
                    <td></td>
                    <td style="text-align:right;"></td>
                    <td style="text-align:right;"><b> Total Pembayaran </b></td>
                    <td style="text-align:right;"><b> {{$invoice->transaction->currency}} {{ number_format($invoice->transaction->grand_total, 0, ',', '.')}} </b></td>
                </tr>
            </tfoot>
        </table>

        <table style="width:100%; margin-top:25px" cellpadding="4">
            <tbody>
                <tbody>
                    <tr>
                        <td>
                            <b>Metode Pembayaran</b>
                            <br>
                            <i>Payment Method</i>
                            <br><br>
                            {{$invoice->payment_method}} {{$invoice->payment_channel}}
                            <br>
                            Status: <b> LUNAS </b> / <i>PAID</i>
                            <br>
                            <br>
                            <img style="width:80px;" src="{{'data:image/png;base64,' . base64_encode(file_get_contents(public_path() . '/assets/images/check-invoice.png'))}}" alt="">
                        </td>
                        <td></td>
                        <td></td>
                        <td style="width:180px;">
                            {{$signature['label_1']}}
                            <br>
                            {{$signature['label_2']}}
                            <br>
                            <img style="width:140px;" src="{{'data:image/png;base64,' . base64_encode(file_get_contents($signature['ttd_image']))}}" alt="">
                            <br>
                            <b>{{$signature['signed_name']}}</b>
                            <br>
                            {{$signature['number']}}
                        </td>
                    </tr>
                </tbody>
            </tbody>
        </table>
    </div>

    <div style="padding: 0 50px; margin-top:30px;">
        <div style="width:100%; font-size:10px;">
            Invoice pembayaran ini diterbitkan oleh MEDMaestro - Medical Training Management System sebagai bukti pembayaran yang sah.
            <br>
            This Payment Invoice is issued by MEDMaestro - Medical Training Management System as a valid proof of payment
            <br>
            www.fictro.com
        </div>
    </div>

</body>

</html>
