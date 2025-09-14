<?php

namespace App\Helpers;

use App\Models\SuperAdmin_model;
use App\Models\Message_model;
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
        $receiver = $param["receiver"];
        $sender = $param["sender"];
        
        $toName = ucwords($firstName . " " . $lastName);
        $toEmail = $email;
        $recipient = ['name' => $toName, 'email' => $toEmail];

        $bladeData = [
            'customerName' => $toName,
            'customerEmail' => $toEmail,
        ];
        
        $subject = '';
        
        // Choose email template and subject based on purpose
        switch ($purpose) {
            case 'resetpassword':
                $subject = "Reset Your Password";
                $templateBlade = "emails.reset_password";
                $bladeData['reset_link'] = $param["resetLink"];
                break;

            case 'recruiterwelcome':
                // Handle recruiter welcome email
                $bladeData["verifyLink"] = $param["verifyLink"];
                $subject = "Welcome to SMART-Recruit – Let’s Find Top Talent Together!";
                $templateBlade = "emails.welcome_recruiter";
                break;

            case 'candidatewelcome':
                // Handle candidate welcome email
                $bladeData["verifyLink"] = $param["verifyLink"];
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
                //change from-email for send video-interview link
                $smtpDetails['from_email'] = $smtpDetails['videoInterviewFrom_email'];
                
                $bladeData['link'] = $param["link"];
                $bladeData['referalCode'] = $param["referalCode"];
                $subject = "Complete Your Interview to Go Live!";
                $templateBlade = "emails.candidate_videolink";
                break;

            case 'recruitercustomplan':
                //$customerName $link $referalCode
                $bladeData['adminName'] = $param["adminName"];
                $bladeData['customerName'] = $param["customerName"];
                $bladeData['customerEmail'] = $param["customerEmail"];
                $bladeData["adminName"] = $param["adminName"];
                $bladeData["customerName"] = $param["customerName"];
                $bladeData["customerEmail"] = $param["customerEmail"];
                $bladeData["packageName"] = $param["packageName"];
                $bladeData["additionalMessage"] = $param["additionalMessage"];
                $bladeData['referalCode'] = $param["referalCode"];
                $subject = "Complete Your Interview to Go Live!";
                $templateBlade = "emails.custom_packagerequest";
                break;
                
            case 'contactadmin':
                $bladeData['adminName'] = $param["adminName"];
                $bladeData['customerName'] = $param["customerName"];
                $bladeData['customerEmail'] = $param["customerEmail"];
                $bladeData['referalCode'] = $param["referalCode"];
                $bladeData['candidateId'] = $sender;
                $bladeData['additionalMessage'] = $param["additionalMessage"];
                $bladeData['role'] = $param["role"];
                if($param["role"] == 1){
                    $subject = "New Message from Candidate!";
                }else if($param["role"] == 2){
                    $subject = "New Message from Recruiter!";
                }else{
                    $subject = "New Message!";
                }
                
                
                $templateBlade = "emails.contact_admin";
                break;
                
            case 'candidatecvsubmitadmin':
                $bladeData['adminName'] = $param["adminName"];
                $bladeData['candidateName'] = $param["candidateName"];
                $bladeData['candidateEmail'] = $param["candidateEmail"];
                $bladeData['resume_url'] = $param["resume_url"];
                
                $subject = "New Resume Submission";
                $templateBlade = "emails.candidate_cvsubmitadmin";
                break;

            case 'videoInterviewThankyou':
                $bladeData['referalCode'] = $param["referalCode"];
                $subject = "Thank you for taking the time to complete your pre-recorded interview.";
                $templateBlade = "emails.videoInterviewThankyou";
                break;
            
            case 'resumeReminder':
                $bladeData['referalCode'] = $param["referalCode"];
                $subject = "Thank you for creating your profile on SmartRecruit!";
                $templateBlade = "emails.resumeReminder";
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

        $messageHtml = view($templateBlade, $bladeData)->render();
        $messageParam = array(
            "subject" => $subject,
            "message" => $messageHtml,
            "receiver" => $receiver,
            "sender" => $sender,
        );
        
        self::saveMessage($messageParam);
        
        // Now use the MYSMTP function to send the email (assuming it’s still part of your trait)
        return self::MYSMTP($smtpDetails, $recipient, $subject, $templateBlade, $bladeData);

    }

    public static function saveMessage($messageParam){
        //id subject message receiver sender isRead dateTime
        $messageObj = new Message_model();
        
        $messageObj->id = db_randnumber();
        $messageObj->subject = $messageParam["subject"];
        $messageObj->message = $messageParam["message"];
        $messageObj->receiver = $messageParam["receiver"];
        $messageObj->sender = $messageParam["sender"];
        $messageObj->isRead = 0;
        $messageObj->dateTime = date("Y-m-d H:i:s");
        $messageObj->save();
    }
}
