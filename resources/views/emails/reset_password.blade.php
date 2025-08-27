<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Reset Your Password</title>
</head>
<body style="margin:0; padding:0; background-color:#ffffff;">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color:#ffffff;">
    <tr>
      <td align="center" style="padding:20px;">
        <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="border:1px solid #e0e0e0; width:100%; max-width:600px;">
          <!-- Header -->
          <tr>
            <td align="center" bgcolor="#3d63dd" style="padding:20px;">
                <img src="{{url('images/logo.png')}}" alt="Smart Recruit" width="150" style="display:block;">
            </td>
          </tr>

          <!-- Body Content -->
          <tr>
            <td style="padding:20px; font-family:Arial, sans-serif; font-size:16px; color:#333333;">
              <h2 style="color:#3d63dd; font-size:20px; margin-bottom:20px;">Reset Your Password</h2>
              <p>Hi {{$customerName}},</p>
              <p>We received a request to reset your password for your SMART-Recruit account.</p>
              <p>If you requested this, click the button below to reset your password:</p>

              <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin:20px auto;">
                <tr>
                  <td bgcolor="#3d63dd" style="border-radius:5px;">
                    <a href="{{$reset_link}}" target="_blank" style="display:inline-block; padding:12px 24px; color:#ffffff; font-weight:bold; font-size:16px; font-family:Arial, sans-serif; text-decoration:none; border-radius:5px;">Reset Password</a>
                  </td>
                </tr>
              </table>

              <p>This link will expire in 30 minutes.</p>
              <p>If you didn’t request a password reset, you can safely ignore this email.</p>
              <p>Thanks,<br>SMART-Recruit Team</p>
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
