<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;

// Frontend Routes (No Authentication Required)
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::post('/products/ajax', [ProductController::class, 'ajaxFilter'])->name('products.ajax');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.detail');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.detail');
Route::get('/api/portfolio/{id}/gallery', [PortfolioController::class, 'getGallery'])->name('portfolio.gallery');
Route::get('/api/portfolio/{id}/details', [PortfolioController::class, 'getDetails'])->name('portfolio.details');

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('service.detail');

Route::get('/team', [TeamController::class, 'index'])->name('team');
Route::get('/certificates', [App\Http\Controllers\Frontend\CertificateController::class, 'index'])->name('certificates');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Career Opportunities Routes
Route::get('/career-opportunities', [JobController::class, 'index'])->name('career-opportunities');
Route::get('/career-opportunities/{id}', [JobController::class, 'show'])->name('career-opportunities.show');
Route::post('/job-applications', [JobApplicationController::class, 'store'])->name('job-applications.store');

// Company Gallery Routes
Route::get('/company-gallery/{company}', [App\Http\Controllers\CompanyGalleryController::class, 'getCompanyImages']);
Route::get('/company-gallery', [App\Http\Controllers\CompanyGalleryController::class, 'getAllCompaniesImages']);

// Admin Routes - Protected by auth middleware only
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::patch('/products/{product}/remove-gallery-image', [App\Http\Controllers\Admin\ProductController::class, 'removeGalleryImage'])->name('products.removeGalleryImage');
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('portfolios', App\Http\Controllers\Admin\PortfolioController::class);
    Route::patch('/portfolios/{portfolio}/toggle-featured', [App\Http\Controllers\Admin\PortfolioController::class, 'toggleFeatured'])->name('portfolios.toggleFeatured');
    Route::post('/portfolios/reorder', [App\Http\Controllers\Admin\PortfolioController::class, 'updateOrder'])->name('portfolios.reorder');

    Route::resource('portfolio-categories', App\Http\Controllers\Admin\PortfolioCategoryController::class);
    Route::patch('/portfolio-categories/{portfolioCategory}/toggle-status', [App\Http\Controllers\Admin\PortfolioCategoryController::class, 'toggleStatus'])->name('portfolio-categories.toggleStatus');
    Route::post('/portfolio-categories/reorder', [App\Http\Controllers\Admin\PortfolioCategoryController::class, 'updateOrder'])->name('portfolio-categories.reorder');
    Route::resource('team', App\Http\Controllers\Admin\TeamController::class);
    Route::resource('contacts', App\Http\Controllers\Admin\ContactController::class);
    Route::resource('settings', App\Http\Controllers\Admin\SettingController::class);
            Route::resource('career-opportunities', App\Http\Controllers\Admin\CareerOpportunityController::class);
        Route::resource('job-applications', App\Http\Controllers\Admin\JobApplicationController::class);
        Route::resource('certificates', App\Http\Controllers\Admin\CertificateController::class);

    // Career Opportunities additional routes
    Route::patch('/career-opportunities/{careerOpportunity}/toggle-status', [App\Http\Controllers\Admin\CareerOpportunityController::class, 'toggleStatus'])->name('career-opportunities.toggleStatus');

    // Job Applications additional routes
    Route::patch('/job-applications/{jobApplication}/mark-reviewed', [App\Http\Controllers\Admin\JobApplicationController::class, 'markAsReviewed'])->name('job-applications.markReviewed');
    Route::patch('/job-applications/{jobApplication}/mark-shortlisted', [App\Http\Controllers\Admin\JobApplicationController::class, 'markAsShortlisted'])->name('job-applications.markShortlisted');
    Route::patch('/job-applications/{jobApplication}/mark-rejected', [App\Http\Controllers\Admin\JobApplicationController::class, 'markAsRejected'])->name('job-applications.markRejected');
    Route::get('/job-applications/{jobApplication}/download-resume', [App\Http\Controllers\Admin\JobApplicationController::class, 'downloadResume'])->name('job-applications.downloadResume');
    Route::get('/job-applications/export', [App\Http\Controllers\Admin\JobApplicationController::class, 'export'])->name('job-applications.export');

    // Contact additional routes
    Route::patch('/contacts/{contact}/mark-as-read', [App\Http\Controllers\Admin\ContactController::class, 'markAsRead'])->name('contacts.markAsRead');
    Route::patch('/contacts/{contact}/mark-as-replied', [App\Http\Controllers\Admin\ContactController::class, 'markAsReplied'])->name('contacts.markAsReplied');

    // Certificates additional routes
    Route::patch('/certificates/{certificate}/toggle-status', [App\Http\Controllers\Admin\CertificateController::class, 'toggleStatus'])->name('certificates.toggleStatus');
    Route::post('/certificates/reorder', [App\Http\Controllers\Admin\CertificateController::class, 'reorder'])->name('certificates.reorder');

    // Settings additional routes
    Route::put('/settings/update-all', [App\Http\Controllers\Admin\SettingController::class, 'updateAll'])->name('settings.updateAll');

    // Image management routes
    Route::post('/images/upload', [App\Http\Controllers\Admin\ImageController::class, 'upload'])->name('images.upload');
    Route::delete('/images/{image}', [App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('images.destroy');
    Route::patch('/images/{image}/set-primary', [App\Http\Controllers\Admin\ImageController::class, 'setPrimary'])->name('images.setPrimary');
    Route::post('/images/reorder', [App\Http\Controllers\Admin\ImageController::class, 'reorder'])->name('images.reorder');
    Route::get('/images/get', [App\Http\Controllers\Admin\ImageController::class, 'getImages'])->name('images.get');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});

// Include Breeze routes (only for admin authentication)
require __DIR__.'/auth.php';
