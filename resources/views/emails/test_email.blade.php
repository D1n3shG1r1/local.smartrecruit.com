<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Mobile-first styling, fallback for clients that support external styles */
    @media screen and (max-width: 600px) {
      .container {
        width: 100% !important;
      }
      .header img {
        max-width: 100% !important;
        height: auto !important;
      }
    }
  </style>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #ffffff; color: #333333;">

  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td style="text-align: center; background-color: #3d63dd; padding: 20px 0;">
        <!-- Logo -->
        <img src="{{url('images/logo.png')}}" alt="Smart Recruit" style="max-width: 150px; height: auto;">
      </td>
    </tr>
    <tr>
      <td style="padding: 0 20px 20px;">
        <!-- Main Content -->
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #e0e0e0;">
          <tr>
            <td style="padding: 20px; text-align: center; color: #3d63dd; font-size: 22px; font-weight: bold;">
              SmartRecruit SMTP Test Email!
            </td>
          </tr>
          <tr>
            <td style="padding: 20px; font-size: 16px; line-height: 1.6; color: #333333;">
              <p>Hi {{$adminName}},</p>

              <p>I hope this email finds you well. This is just a test email to ensure everything is functioning properly.</p>
              
              <p>Please disregard this message, but kindly confirm if you've received it.</p>
              
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td style="text-align: center; background-color: #3d63dd; color: #ffffff; padding: 20px;">
        <!-- Footer -->
        SMART-Recruit Team<br>
        <a href="{{url('/')}}" style="color: #ffffff; text-decoration: underline;">{{url('/')}}</a> | {{ config('custom.support_email') }}
      </td>
    </tr>
  </table>

</body>
</html>
