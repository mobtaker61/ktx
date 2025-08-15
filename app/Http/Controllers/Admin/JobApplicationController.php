<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\CareerOpportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::with('careerOpportunity')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('admin.job-applications.index', compact('applications'));
    }

    public function show(JobApplication $jobApplication)
    {
        $jobApplication->load('careerOpportunity');
        return view('admin.job-applications.show', compact('jobApplication'));
    }

    public function destroy(JobApplication $jobApplication)
    {
        // Delete resume file if exists
        if ($jobApplication->resume_path && Storage::exists($jobApplication->resume_path)) {
            Storage::delete($jobApplication->resume_path);
        }

        $jobApplication->delete();

        return redirect()->route('admin.job-applications.index')
            ->with('success', 'Job application deleted successfully.');
    }

    public function markAsReviewed(JobApplication $jobApplication)
    {
        $jobApplication->update(['is_reviewed' => true]);

        return redirect()->route('admin.job-applications.index')
            ->with('success', 'Job application marked as reviewed.');
    }

    public function markAsShortlisted(JobApplication $jobApplication)
    {
        $jobApplication->update(['is_shortlisted' => true]);

        return redirect()->route('admin.job-applications.index')
            ->with('success', 'Job application marked as shortlisted.');
    }

    public function markAsRejected(JobApplication $jobApplication)
    {
        $jobApplication->update(['is_rejected' => true]);

        return redirect()->route('admin.job-applications.index')
            ->with('success', 'Job application marked as rejected.');
    }

    public function downloadResume(JobApplication $jobApplication)
    {
        if (!$jobApplication->resume_path) {
            abort(404, 'Resume file path not found.');
        }

        // Check if file exists in public storage
        $filePath = storage_path('app/public/' . $jobApplication->resume_path);

        if (!file_exists($filePath)) {
            abort(404, 'Resume file not found on disk.');
        }

        // Get file info
        $fileName = basename($jobApplication->resume_path);
        $originalName = 'Resume_' . $jobApplication->first_name . '_' . $jobApplication->last_name . '.pdf';

        return response()->download($filePath, $originalName);
    }

    public function export(Request $request)
    {
        $applications = JobApplication::with('careerOpportunity')
            ->when($request->filled('status'), function ($query) use ($request) {
                switch ($request->status) {
                    case 'reviewed':
                        $query->where('is_reviewed', true);
                        break;
                    case 'shortlisted':
                        $query->where('is_shortlisted', true);
                        break;
                    case 'rejected':
                        $query->where('is_rejected', true);
                        break;
                    case 'pending':
                        $query->where('is_reviewed', false)
                              ->where('is_shortlisted', false)
                              ->where('is_rejected', false);
                        break;
                }
            })
            ->when($request->filled('career_opportunity_id'), function ($query) use ($request) {
                $query->where('career_opportunity_id', $request->career_opportunity_id);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Return CSV data
        $filename = 'job_applications_' . date('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($applications) {
            $file = fopen('php://output', 'w');

            // CSV headers
            fputcsv($file, [
                'ID', 'Name', 'Email', 'Phone', 'Position', 'Department',
                'Experience', 'Nationality', 'Location', 'Status',
                'Applied Date', 'Reviewed', 'Shortlisted', 'Rejected'
            ]);

            foreach ($applications as $app) {
                $status = 'Pending';
                if ($app->is_rejected) $status = 'Rejected';
                elseif ($app->is_shortlisted) $status = 'Shortlisted';
                elseif ($app->is_reviewed) $status = 'Reviewed';

                fputcsv($file, [
                    $app->id,
                    $app->first_name . ' ' . $app->last_name,
                    $app->email,
                    $app->phone_code . ' ' . $app->phone,
                    $app->careerOpportunity->title ?? 'N/A',
                    $app->careerOpportunity->department ?? 'N/A',
                    $app->experience_years,
                    $app->nationality,
                    $app->current_location,
                    $status,
                    $app->created_at->format('Y-m-d H:i:s'),
                    $app->is_reviewed ? 'Yes' : 'No',
                    $app->is_shortlisted ? 'Yes' : 'No',
                    $app->is_rejected ? 'Yes' : 'No'
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
