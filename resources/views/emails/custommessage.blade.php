<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{{ucwords($subject)}}</title>
</head>
<body style="margin:0; padding:0; background-color:#ffffff;">
  <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" style="font-family: Arial, sans-serif;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" border="0" style="width:100%; max-width:600px; border:1px solid #e0e0e0;">

          <!-- Header -->
          <tr>
            <td align="center" bgcolor="#3d63dd" style="padding:20px;">
              <img src="https://via.placeholder.com/150x50?text=SMART-Recruit" width="150" height="50" alt="SMART-Recruit Logo" style="display:block;">
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td bgcolor="#ffffff" style="padding:20px;">
              <h2 style="color:#3d63dd; font-size:20px; margin:0 0 20px 0;">{{ucwords($subject)}}</h2>
              <p style="font-size:16px; color:#333333; margin:0 0 10px 0;">Hi {{$customerName}},</p>
              <p style="font-size:16px; color:#333333; margin:0 0 20px 0;">
              {{ $message }}
              </p>
              
              <p style="font-size:16px; color:#333333; margin:20px 0 0 0;">
                If you have any questions, feel free to contact us anytime. Enjoy your journey with SMART-Recruit!
              </p>
              <p style="font-size:16px; color:#333333;">Best regards,<br><strong>SMART-Recruit Team</strong></p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td bgcolor="#3d63dd" align="center" style="padding:20px;">
              <p style="font-size:14px; color:#ffffff; margin:0;">&copy; {{ date('Y') }} SMART-Recruit</p>
              <p style="font-size:14px; color:#ffffff; margin:5px 0;">
              <a href="{{url('/')}}" style="color: #ffffff; text-decoration: underline;">{{url('/')}}</a> | {{ config('custom.support_email') }}
              </p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
