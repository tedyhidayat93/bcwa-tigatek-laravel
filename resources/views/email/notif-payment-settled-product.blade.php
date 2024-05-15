<!-- Free to use, HTML email template designed & built by FullSphere. Learn more about us at www.fullsphere.co.uk -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>

  <!--[if gte mso 9]>
  <xml>
    <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
  </xml>
  <![endif]-->

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="x-apple-disable-message-reformatting">
  <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->

    <!-- Your title goes here -->
    <title>Fictro Notification</title>
    <!-- End title -->

    <!-- Start stylesheet -->
    <style type="text/css">
      a,a[href],a:hover, a:link, a:visited {
        /* This is the link colour */
        text-decoration: none!important;
        color: #0000EE;
      }
      .link {
        text-decoration: underline!important;
      }
      p, p:visited {
        /* Fallback paragraph style */
        font-size:15px;
        line-height:24px;
        font-family:'Helvetica', Arial, sans-serif;
        font-weight:300;
        text-decoration:none;
        color: #000000;
      }
      h1 {
        /* Fallback heading style */
        font-size:22px;
        line-height:24px;
        font-family:'Helvetica', Arial, sans-serif;
        font-weight:normal;
        text-decoration:none;
        color: #000000;
      }
      .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%;}
      .ExternalClass {width: 100%;}
    </style>
    <!-- End stylesheet -->

</head>

  <!-- You can change background colour here -->
  <body style="text-align: center; margin: 0; padding-top: 10px; padding-bottom: 10px; padding-left: 0; padding-right: 0; -webkit-text-size-adjust: 100%;background-color: #f2f4f6; color: #000000" align="center">

  <!-- Fallback force center content -->
  <div style="text-align: center;">


    <!-- Start container for logo -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600">
      <tbody>
        <tr>
          <td style="width: 596px; vertical-align: top; padding-left: 0; padding-right: 0; padding-top: 15px; padding-bottom: 15px;" width="596">

            <!-- Your logo is here -->
            <img style="height: 85px; max-height: 85px; text-align: center; color: #ffffff;" alt="Logo" src="{{$path_logo ?? asset('assets/fe-page2/images/logo.png')}}" align="center"  height="85">

          </td>
        </tr>
      </tbody>
    </table>
    <!-- End container for logo -->

    <!-- Hero image -->
    <img style="width: 600px; max-width: 600px; height: 250px; max-height: 250px; text-align: center;" alt="Hero image" src="https://images.unsplash.com/photo-1613243555988-441166d4d6fd?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" align="center" width="600" height="250">
    <!-- Hero image -->

    <!-- Start single column section -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600">
        <tbody>
          <tr>
            <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 40px;" width="596">

              <h1 style="font-size: 20px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 600; text-decoration: none; color: #000000;">Informasi Pembelian Program</h1>

              <p style="font-size: 15px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">Segera lakukan pembayaran pembelian program sebelum <br>
                {{-- {{ (new DateTime($invoice_data['result']['expiry_date']))->format('d-m-Y H:i') }} --}}
                {{ \Carbon\Carbon::parse($invoice_data['result']['expiry_date'])->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}

              </p>

              <p style="font-size: 15px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">Untuk lanjut ke pembayaran silakan klik tombol dibawah ini</a></p>

              <!-- Start button (You can change the background colour by the hex code below) -->
              <a href="{{$invoice_data['result']['invoice_url']}}" target="_blank" style="background-color: #000000; font-size: 15px; line-height: 22px; font-family: 'Helvetica', Arial, sans-serif; font-weight: normal; text-decoration: none; padding: 12px 15px; color: #ffffff; border-radius: 5px; display: inline-block; mso-padding-alt: 0;">
                  <!--[if mso]>
                  <i style="letter-spacing: 25px; mso-font-width: -100%; mso-text-raise: 30pt;">&nbsp;</i>
                <![endif]-->

                  <span style="mso-text-raise: 15pt; color: #ffffff;">Lanjut Ke Pembayaran</span>
                  <!--[if mso]>
                  <i style="letter-spacing: 25px; mso-font-width: -100%;">&nbsp;</i>
                <![endif]-->
              </a>
              <!-- End button here -->

            </td>
          </tr>
          <tr>
            <td><hr></td>
          </tr>
        </tbody>
      </table>
      <!-- End single column section -->


      <!-- Start double column section -->
      <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600">
        <tbody>
            <tr>
              <td style="width: 252px; vertical-align: top; padding-left: 30px; padding-right: 15px; padding-top: 0; padding-bottom: 30px; text-align: center;" width="252">

                <p style="font-size: 15px; line-height: 14px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">No. Invoice: <b> {{$invoice_data['result']['external_id']}}</b></p>
                <p style="font-size: 15px; line-height: 14px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">Program: <b> {{$product->name_id}}</b></p>
                <p style="font-size: 15px; line-height: 14px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">Total: <b> {{number_format($invoice_data['result']['amount'], 0, ',', '.')}} ({{$invoice_data['result']['currency']}})</b></p>

              </td>

              <td style="width: 252px; vertical-align: top; padding-left: 15px; padding-right: 30px; padding-top: 0; padding-bottom: 30px; text-align: center;" width="252">

                <p style="font-size: 15px; line-height: 14px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">Nama : <b>{{$request['buyer_firstname']}}</b></p>
                <p style="font-size: 15px; line-height: 14px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">No.Telepon : <b>{{$request['buyer_phone']}}</b></p>
                <p style="font-size: 15px; line-height: 14px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">Email : <b>{{$request['buyer_email']}}</b></p>
                <p style="font-size: 15px; line-height: 14px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">Alamat : <b>{{$request['buyer_address']}}</b></p>


            </td>
          </tr>
        </tbody>
      </table>
      <!-- End double column section -->

      <!-- Start footer -->
      <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #000000;" width="600">
        <tbody>
          <tr>
            <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 30px;" width="596">

              <!-- Your inverted logo is here -->
              <img style="height: 45px; max-height: 45px; text-align: center; color: #ffffff;" alt="Logo" src="{{$path_logo ?? asset('assets/fe-page2/images/logo.png')}}" align="center" height="45">

              <p style="font-size: 13px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #ffffff;">
                Jl. Tengku Moh. Hasan No.97,
                Lueng Bata, Kec. Lueng Bata,
                Kota Banda Aceh,
                Aceh - 23127
              </p>

              <p style="margin-bottom: 0; font-size: 13px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #ffffff;">
                <a target="_blank" style="text-decoration: underline; color: #ffffff;" href="https://fictro.com">
                  www.fictro.com
                </a>
              </p>

            </td>
          </tr>
        </tbody>
      </table>
      <!-- End footer -->

  </div>

  </body>

</html>
