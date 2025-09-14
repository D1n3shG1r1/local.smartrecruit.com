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
            Thank You for Completing Your Pre-Recorded Interview
            </td>
          </tr>
          <tr>
            <td style="padding: 20px; font-size: 16px; line-height: 1.6; color: #333333;">
              <p>Hi {{$customerName}},</p>
              <p>Thank you for taking the time to complete your pre-recorded interview.</p>
              <p></p>
              <p>We are pleased to inform you that we have received your video interview. It will automatically go live within 24 hours after verification for recruiters to view.</p>

              <p></p>
              <p>There is nothing to worry about — if we require any additional information, we will reach out to you directly.</p>

              <p></p>
              <p>We wish you the very best of luck in your job search.</p>

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
