<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
    /* Mobile-first styling */
    @media screen and (max-width: 600px) {
      .container {
        width: 100% !important;
      }
      .button {
        width: 80% !important;
        display: block;
        text-align: center;
      }
    }
  </style>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #ffffff; color: #333333;">

  <!-- Table Layout for better compatibility -->
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td style="background-color: #3d63dd; text-align: center; padding: 20px 0;">
        <!-- Header (Logo) -->
        <img src="https://via.placeholder.com/150x50?text=SMART-Recruit" alt="SMART-Recruit Logo" style="max-width: 150px; height: auto;">
      </td>
    </tr>
    <tr>
      <td style="padding: 0 20px 20px;">
        <!-- Content Section -->
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 600px; margin: 0 auto; border: 1px solid #e0e0e0; background-color: #ffffff;">
          <tr>
            <td style="padding: 20px; text-align: center; color: #3d63dd; font-size: 20px; font-weight: bold;">
              Keep Your Profile Active & Visible!
            </td>
          </tr>
          <tr>
            <td style="padding: 20px; font-size: 16px; line-height: 1.6; color: #333333;">
              <p>Hi [Candidate First Name],</p>
              <p>To ensure your profile stays active and visible to recruiters on <strong>SMART-Recruit</strong>, we recommend updating it at least once every 7 days.</p>
              <p>This small step keeps your chances high for getting noticed by top employers.</p>
              <p>Take a minute to review and refresh your profile now:</p>

              <div style="text-align: center;">
                <a href="[PROFILE_UPDATE_LINK]" style="display: inline-block; background-color: #3d63dd; color: #ffffff; padding: 12px 24px; text-align: center; text-decoration: none; border-radius: 5px; font-weight: bold; margin: 20px auto;">
                  Update My Profile
                </a>
              </div>

              <p>If your profile is not updated regularly, it may become inactive and hidden from recruiter searches.</p>
              <p>Let’s keep your job search moving forward!</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td style="background-color: #3d63dd; color: #ffffff; text-align: center; padding: 20px;">
        <!-- Footer Section -->
        SMART-Recruit Team<br />
        <a href="{{url('/')}}" style="color: #ffffff; text-decoration: underline;">{{url('/')}}</a> | {{ config('custom.support_email') }}
      </td>
    </tr>
  </table>

</body>
</html>
