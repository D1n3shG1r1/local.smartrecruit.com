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
            Complete Your CV to Get Discovered by Recruiters
            </td>
          </tr>
          <tr>
            <td style="padding: 20px; font-size: 16px; line-height: 1.6; color: #333333;">
              <p>Hi {{$customerName}},</p>
              <p>Thank you for creating your profile on SmartRecruit! </p>
              <p>You’re one step closer to landing your dream job — but your CV is still incomplete.</p>

              <p>Recruiters can only find and consider you when your CV is created.</p>
              <p></p>
              <p>Completing your CV also gives you access to:</p>
              <ul>
                <li>Visibility to top recruiters searching daily</li>
                <li>Pre-recorded interview feature to showcase your skills</li>
                <li>Opportunities for live interviews with employers</li>
              </ul>

              <p>Don’t miss out. Log back in today and complete your CV:
              Login to SmartRecruit</p>
              <p></p>
              <p>We look forward to seeing you succeed!</p>

            </td>
          </tr>
          <tr>
            <td style="padding: 20px; font-size: 16px; line-height: 1.6; color: #333333;">
                <p style="font-size:16px; color:#333333;">Best regards, <br><strong>SMART-Recruit Team</strong></p>
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
