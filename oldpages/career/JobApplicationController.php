<?php

namespace App\Http\Controllers;

use App\Models\CareerOpportunity;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JobApplicationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'career_opportunity_id' => 'required|exists:career_opportunities,id',
            'gender' => 'required|in:male,female',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'nationality' => 'required|string|max:255',
            'current_location' => 'required|string|max:255',
            'experience_years' => 'required|string|max:50',
            'cover_letter' => 'nullable|string|max:2000',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB max
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Handle file upload
            $resumePath = $request->file('resume')->store('resumes', 'public');

            // Create application
            $application = JobApplication::create([
                'career_opportunity_id' => $request->career_opportunity_id,
                'full_name' => $request->first_name . ' ' . $request->last_name,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone' => $request->phone_code . ' ' . $request->phone,
                'nationality' => $request->nationality,
                'current_location' => $request->current_location,
                'experience_years' => $request->experience_years,
                'cover_letter' => $request->cover_letter,
                'resume_path' => $resumePath,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Get job details
            $job = CareerOpportunity::find($request->career_opportunity_id);

            // Send confirmation email to applicant
            $this->sendConfirmationEmail($application, $job);

            // Send notification email to HR
            $this->sendNotificationEmail($application, $job);

            Log::info('Job application submitted successfully', ['application_id' => $application->id]);

            return response()->json([
                'success' => true,
                'message' => 'Your application has been submitted successfully! We will contact you soon.'
            ]);

        } catch (\Exception $e) {
            Log::error('Job application error: ' . $e->getMessage());
            Log::error('Job application error trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Sorry, an error occurred while submitting your application. Please try again.'
            ], 500);
        }
    }

    private function sendConfirmationEmail($application, $job)
    {
        $htmlContent = $this->buildConfirmationEmail($application, $job);
        $textContent = $this->buildConfirmationTextEmail($application, $job);

        Mail::html($htmlContent, function ($message) use ($application, $textContent) {
            $message->to($application->email)
                    ->subject('Job Application Confirmation - TCI Petrochemical Group')
                    ->text($textContent);
        });
    }

    private function sendNotificationEmail($application, $job)
    {
        $htmlContent = $this->buildNotificationEmail($application, $job);
        $textContent = $this->buildNotificationTextEmail($application, $job);

        Mail::html($htmlContent, function ($message) use ($application, $job, $textContent) {
            $message->to('Job@tcipetrochem.com')
                    ->subject('New Job Application: ' . $job->title)
                    ->text($textContent)
                    ->attach(storage_path('app/public/' . $application->resume_path), [
                        'as' => 'Resume_' . $application->full_name . '.pdf',
                        'mime' => 'application/pdf',
                    ]);
        });
    }

    private function buildConfirmationEmail($application, $job)
    {
        return '
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Confirmation</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; }
        .email-container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .header { background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); color: white; padding: 30px 20px; text-align: center; }
        .header h1 { font-size: 24px; font-weight: 600; margin-bottom: 5px; }
        .content { padding: 30px 20px; }
        .message { background-color: #e7f1ff; border-left: 4px solid #0d6efd; padding: 20px; margin-bottom: 25px; border-radius: 0 8px 8px 0; }
        .details { background-color: #f8f9fa; border-radius: 8px; padding: 20px; margin-bottom: 25px; }
        .detail-row { display: flex; margin-bottom: 15px; align-items: flex-start; }
        .detail-label { font-weight: 600; color: #0d6efd; min-width: 120px; margin-right: 15px; }
        .detail-value { flex: 1; color: #333; }
        .footer { background-color: #343a40; color: white; padding: 20px; text-align: center; font-size: 12px; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>✅ Job Application Confirmation</h1>
            <p>TCI Petrochemical Group</p>
        </div>

        <div class="content">
            <div class="message">
                <h3>Dear ' . htmlspecialchars($application->full_name) . ',</h3>
                <p>Your job application has been successfully received. Our HR team will review your application and contact you if needed.</p>
            </div>

            <div class="details">
                <h3>📋 Application Details:</h3>
                <div class="detail-row">
                    <div class="detail-label">Position:</div>
                    <div class="detail-value">' . htmlspecialchars($job->title) . '</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Department:</div>
                    <div class="detail-value">' . htmlspecialchars($job->department) . '</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Location:</div>
                    <div class="detail-value">' . htmlspecialchars($job->location) . '</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Application Date:</div>
                    <div class="detail-value">' . $application->created_at->format('M d, Y H:i') . '</div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p><strong>TCI Petrochemical Group</strong></p>
            <p>Clock Tower, Business Village B, No 624, Deira, Dubai, UAE</p>
            <p>📧 Job@tcipetrochem.com | 📞 +971 4 220 7531</p>
        </div>
    </div>
</body>
</html>';
    }

    private function buildConfirmationTextEmail($application, $job)
    {
        return "
Job Application Confirmation
============================

Dear {$application->full_name},

Your job application has been successfully received. Our HR team will review your application and contact you if needed.

Application Details:
- Position: {$job->title}
- Department: {$job->department}
- Location: {$job->location}
- Application Date: {$application->created_at->format('M d, Y H:i')}

---
TCI Petrochemical Group
Clock Tower, Business Village B, No 624, Deira, Dubai, UAE
Email: Job@tcipetrochem.com | Phone: +971 4 220 7531
        ";
    }

    private function buildNotificationEmail($application, $job)
    {
        return '
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Job Application</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; }
        .email-container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .header { background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white; padding: 30px 20px; text-align: center; }
        .header h1 { font-size: 24px; font-weight: 600; margin-bottom: 5px; }
        .content { padding: 30px 20px; }
        .applicant-details { background-color: #f8f9fa; border-radius: 8px; padding: 20px; margin-bottom: 25px; }
        .detail-row { display: flex; margin-bottom: 15px; align-items: flex-start; }
        .detail-label { font-weight: 600; color: #28a745; min-width: 120px; margin-right: 15px; }
        .detail-value { flex: 1; color: #333; }
        .job-details { background-color: #e7f1ff; border-left: 4px solid #0d6efd; padding: 20px; margin-bottom: 25px; border-radius: 0 8px 8px 0; }
        .cover-letter { background-color: #fff3cd; border: 1px solid #ffeaa7; border-radius: 8px; padding: 20px; margin-bottom: 25px; }
        .footer { background-color: #343a40; color: white; padding: 20px; text-align: center; font-size: 12px; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>📝 New Job Application</h1>
            <p>TCI Petrochemical Group</p>
        </div>

        <div class="content">
            <div class="applicant-details">
                <h3>👤 Applicant Information:</h3>
                <div class="detail-row">
                    <div class="detail-label">Full Name:</div>
                    <div class="detail-value">' . htmlspecialchars($application->full_name) . '</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Gender:</div>
                    <div class="detail-value">' . $application->gender_text . '</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Email:</div>
                    <div class="detail-value">' . htmlspecialchars($application->email) . '</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Phone:</div>
                    <div class="detail-value">' . htmlspecialchars($application->phone) . '</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Nationality:</div>
                    <div class="detail-value">' . htmlspecialchars($application->nationality) . '</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Current Location:</div>
                    <div class="detail-value">' . htmlspecialchars($application->current_location) . '</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Experience:</div>
                    <div class="detail-value">' . htmlspecialchars($application->experience_years) . '</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Application Date:</div>
                    <div class="detail-value">' . $application->created_at->format('M d, Y H:i') . '</div>
                </div>
            </div>

            <div class="job-details">
                <h3>💼 Job Position:</h3>
                <div class="detail-row">
                    <div class="detail-label">Title:</div>
                    <div class="detail-value">' . htmlspecialchars($job->title) . '</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Department:</div>
                    <div class="detail-value">' . htmlspecialchars($job->department) . '</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Location:</div>
                    <div class="detail-value">' . htmlspecialchars($job->location) . '</div>
                </div>
            </div>

            <div class="cover-letter">
                <h3>📄 Cover Letter:</h3>
                <div style="white-space: pre-wrap; line-height: 1.5;">' . nl2br(htmlspecialchars($application->cover_letter)) . '</div>
            </div>
        </div>

        <div class="footer">
            <p><strong>TCI Petrochemical Group</strong></p>
            <p>Clock Tower, Business Village B, No 624, Deira, Dubai, UAE</p>
            <p>📧 Job@tcipetrochem.com | 📞 +971 4 220 7531</p>
        </div>
    </div>
</body>
</html>';
    }

    private function buildNotificationTextEmail($application, $job)
    {
        return "
New Job Application
===================

Applicant Information:
- Full Name: {$application->full_name}
- Gender: {$application->gender_text}
- Email: {$application->email}
- Phone: {$application->phone}
- Nationality: {$application->nationality}
- Current Location: {$application->current_location}
- Experience: {$application->experience_years}
- Application Date: {$application->created_at->format('M d, Y H:i')}

Job Position:
- Title: {$job->title}
- Department: {$job->department}
- Location: {$job->location}

Cover Letter:
{$application->cover_letter}

---
TCI Petrochemical Group
Clock Tower, Business Village B, No 624, Deira, Dubai, UAE
Email: Job@tcipetrochem.com | Phone: +971 4 220 7531
        ";
    }
}
