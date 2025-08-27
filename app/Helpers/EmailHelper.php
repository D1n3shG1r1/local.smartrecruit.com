<?php

namespace App\Helpers;

use App\Models\SuperAdmin_model;
use App\Traits\SmtpConfigTrait;
use Exception;

class EmailHelper
{
    use SmtpConfigTrait;  // Include the trait to access the email configuration

    public static function sendEmail($param)
    {
        // Get SMTP configuration using the trait
        $smtpDetails = self::getSmtpConfig();  // Assuming you have a method in the trait to retrieve SMTP settings

        $firstName = $param["firstName"];
        $lastName = $param["lastName"];
        $email = $param["email"];
        $purpose = $param["purpose"];

        $toName = ucwords($firstName . " " . $lastName);
        $toEmail = $email;
        $recipient = ['name' => $toName, 'email' => $toEmail];

        $bladeData = [
            'customerName' => $toName,
            'customerEmail' => $toEmail,
        ];

        // Choose email template and subject based on purpose
        switch ($purpose) {
            case 'resetpassword':
                $subject = "Reset Your Password";
                $templateBlade = "emails.reset_password";
                $bladeData['reset_link'] = $param["resetLink"];
                break;

            case 'recruiterwelcome':
                // Handle recruiter welcome email
                $subject = "Welcome to SMART-Recruit – Let’s Find Top Talent Together!";
                $templateBlade = "emails.welcome_recruiter";
                break;

            case 'candidatewelcome':
                //zubbycom@gmail.com
                // Handle candidate welcome email
                $subject = "Welcome to SMART-Recruit – Your Job Search Just Got Smarter!";
                $templateBlade = "emails.welcom_candidate";
                break;

            case 'recruiterplan':
                // Handle recruiter plan email
                $subject = "Your Recruiter Plan is Now Active!";
                $templateBlade = "emails.planactivate_recruiter";
                $bladeData['PlanName'] = $param["PlanName"];
                $bladeData['PlanPrice'] = $param["PlanPrice"];
                $bladeData['ValidityPeriod'] = $param["ValidityPeriod"];
                $bladeData['TransactionID'] = $param["TransactionID"];
                $bladeData['PaymentMethod'] = $param["PaymentMethod"];
                $bladeData['TransactionDate'] = $param["TransactionDate"];
                break;

            case 'candidateplan':
                // Handle candidate plan email
                $subject = "Your Plan is Now Active!";
                $templateBlade = "emails.planactivate_candidate";
                $bladeData['PlanName'] = $param["PlanName"];
                $bladeData['PlanPrice'] = $param["PlanPrice"];
                $bladeData['ValidityPeriod'] = $param["ValidityPeriod"];
                $bladeData['TransactionID'] = $param["TransactionID"];
                $bladeData['PaymentMethod'] = $param["PaymentMethod"];
                $bladeData['TransactionDate'] = $param["TransactionDate"];
                break;

            case 'candidatecvsubmitthankyou':
                // Handle candidate resume-submission email
                $subject = "Resume Submission Received";
                $templateBlade = "emails.candidate_cvsubmitthankyou";
                break;
            
            case 'candidatevideolink':
                //$customerName $link $referalCode
                $bladeData['link'] = $param["link"];
                $bladeData['referalCode'] = $param["referalCode"];
                $subject = "Complete Your Interview to Go Live!";
                $templateBlade = "emails.candidate_videolink";
                break;

            case 'testemail':
                $bladeData['adminName'] = $param["adminName"];
                $subject = "SmartRecruit SMTP Test Email!";
                $templateBlade = "emails.test_email";
                break;
            // If the $purpose doesn't match any valid cases, throw an exception or return an error
            default:
            throw new Exception("Invalid email purpose provided: " . $purpose);
        }

        // Now use the MYSMTP function to send the email (assuming it’s still part of your trait)
        return self::MYSMTP($smtpDetails, $recipient, $subject, $templateBlade, $bladeData);
    }
}
