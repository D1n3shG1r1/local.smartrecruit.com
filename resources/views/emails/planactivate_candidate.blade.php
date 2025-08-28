<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Plan Activated</title>
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
              <h2 style="color:#3d63dd; font-size:20px; margin:0 0 20px 0;">Your Plan is Now Active!</h2>
              <p style="font-size:16px; color:#333333; margin:0 0 10px 0;">Hi {{$customerName}},</p>
              <p style="font-size:16px; color:#333333; margin:0 0 20px 0;">
                Thank you for subscribing to <strong>SMART-Recruit</strong>. Your candidate plan has been successfully activated.
                Here are the details of your subscription:
              </p>

              <!-- Transaction Table -->
              <table width="100%" cellpadding="8" cellspacing="0" border="0" style="border-collapse:collapse; font-size:15px;">
                <tr style="background-color:#f5f5f5;">
                  <td style="border:1px solid #ddd;"><strong>Plan Name</strong></td>
                  <td style="border:1px solid #ddd;">{{$PlanName}}</td>
                </tr>
                <tr>
                  <td style="border:1px solid #ddd;"><strong>Price</strong></td>
                  <td style="border:1px solid #ddd;">{{$PlanPrice}}</td>
                </tr>
                <tr style="background-color:#f5f5f5;">
                  <td style="border:1px solid #ddd;"><strong>Expires on</strong></td>
                  <td style="border:1px solid #ddd;">{{$ValidityPeriod}}</td>
                </tr>
                <tr>
                  <td style="border:1px solid #ddd;"><strong>Transaction ID</strong></td>
                  <td style="border:1px solid #ddd;">{{$TransactionID}}</td>
                </tr>
                <!--
                <tr style="background-color:#f5f5f5;">
                  <td style="border:1px solid #ddd;"><strong>Payment Method</strong></td>
                  <td style="border:1px solid #ddd;">[Payment Method]</td>
                </tr>
                -->
                <tr>
                  <td style="border:1px solid #ddd;"><strong>Transaction Date</strong></td>
                  <td style="border:1px solid #ddd;">{{$TransactionDate}}</td>
                </tr>
              </table>

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
                <a href="https://www.smart-recruit.com" style="color:#ffffff; text-decoration:underline;">www.smart-recruit.com</a> |
                support@smart-recruit.com
              </p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
