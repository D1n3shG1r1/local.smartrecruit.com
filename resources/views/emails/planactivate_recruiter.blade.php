<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Your Plan is Active</title>
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
              <h2 style="font-size:20px; color:#3d63dd; margin-top:0;">Your Recruiter Plan is Now Active!</h2>
              <p>Hi {{$customerName}},</p>
              <p>Thank you for subscribing to <strong>SMART-Recruit</strong>. Your recruiter plan has been successfully activated. Here are your plan details:</p>

              <!-- Transaction Table -->
              <table width="100%" cellpadding="8" cellspacing="0" border="0" style="border-collapse:collapse; font-size:15px;">
                <tr style="background-color:#f5f5f5;">
                  <td style="border:1px solid #ddd;"><strong>Plan Name</strong></td>
                  <td style="border:1px solid #ddd;">{{$PlanName}}</td>
                </tr>
                <tr style="background-color:#f5f5f5;">
                  <td style="border:1px solid #ddd;"><strong>Candidate View</strong></td>
                  <td style="border:1px solid #ddd;">{{$CandidateView}}</td>
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
                  <td style="border:1px solid #ddd;">{{$PaymentMethod}}</td>
                </tr>
                -->
                <tr>
                  <td style="border:1px solid #ddd;"><strong>Transaction Date</strong></td>
                  <td style="border:1px solid #ddd;">{{$TransactionDate}}</td>
                </tr>
              </table>

              <p>If you have any questions or need help maximizing your plan, our support team is here to help.</p>
              <p>Thanks again for choosing SMART-Recruit!</p>
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
