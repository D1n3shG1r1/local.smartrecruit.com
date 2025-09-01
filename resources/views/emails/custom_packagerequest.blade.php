<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Custom Package - Quotation Request</title>
</head>
<body style="margin:0; padding:0; background-color:#ffffff;">
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff;">
    <tr>
      <td align="center">
        <!-- Outer container -->
        <table width="600" cellpadding="0" cellspacing="0" border="0" style="width:100%; max-width:600px; border:1px solid #e0e0e0; background-color:#ffffff;">
          
          <!-- Header -->
          <tr>
            <td align="center" bgcolor="#3d63dd" style="padding:20px;">
              <img src="{{url('images/logo.png')}}" alt="Smart Recruit" width="150" style="display:block;">
            </td>
          </tr>
          
          <!-- Content -->
          <tr>
            <td style="padding:20px; font-family:Arial, sans-serif; font-size:16px; line-height:1.6; color:#333333;">
              <h2 style="font-size:20px; color:#3d63dd; margin-top:0;">Custom Package - Quotation Request</h2>
                <p>Hi {{$adminName}},</p>
                <p>
                The recruiter {{$customerName}} (<a rel="noopener" href="mailto:{{$customerEmail}}" target="_blank"><strong>{{$customerEmail}}</strong></a>) has sent you a quotation for the <strong>{{$packageName}}</strong>.
                </p>
                <p>{{$additionalMessage}}</p>
                <p style="margin-bottom:0;">Best regards,<br><strong>The SMART-Recruit Team</strong></p>
            </td>
          </tr> 
          
          <!-- Footer -->
          <tr>
            <td bgcolor="#3d63dd" align="center" style="padding:20px; font-family:Arial, sans-serif; font-size:14px; color:#ffffff;">
              <p style="margin:0;">&copy; {{ date('Y') }} SMART-Recruit</p>
              <p style="margin:5px 0;"><a href="{{url('/')}}" style="color:#ffffff; text-decoration:underline;">{{url('/')}}</a> | {{ config('custom.support_email') }}</p>
            </td>
          </tr>
        
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
