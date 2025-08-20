<?php

namespace App\Http\Controllers;

use App\Models\CareerOpportunity;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\News;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Product;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $content = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Static Pages -->
    <url>
        <loc>'.url('/').'</loc>
        <lastmod>'.now()->toISOString().'</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>'.url('/about').'</loc>
        <lastmod>'.now()->toISOString().'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>'.url('/products').'</loc>
        <lastmod>'.now()->toISOString().'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>

    <url>
        <loc>'.url('/portfolio').'</loc>
        <lastmod>'.now()->toISOString().'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>

    <url>
        <loc>'.url('/services').'</loc>
        <lastmod>'.now()->toISOString().'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>'.url('/team').'</loc>
        <lastmod>'.now()->toISOString().'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>

    <url>
        <loc>'.url('/certificates').'</loc>
        <lastmod>'.now()->toISOString().'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>

    <url>
        <loc>'.url('/careers').'</loc>
        <lastmod>'.now()->toISOString().'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>'.url('/news').'</loc>
        <lastmod>'.now()->toISOString().'</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>'.url('/contact').'</loc>
        <lastmod>'.now()->toISOString().'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>';

        // Products (status = 'active')
        try {
            $products = Product::where('status', 'active')->get();
            foreach ($products as $product) {
                $content .= '
    <url>
        <loc>'.url('/products/'.$product->slug).'</loc>
        <lastmod>'.$product->updated_at->toISOString().'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>';
            }
        } catch (\Exception $e) {
            // Log error but continue
        }

        // Product Categories (status = 'active')
        try {
            $categories = Category::where('status', 'active')->get();
            foreach ($categories as $category) {
                $content .= '
    <url>
        <loc>'.url('/products/category/'.$category->slug).'</loc>
        <lastmod>'.$category->updated_at->toISOString().'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>';
            }
        } catch (\Exception $e) {
            // Log error but continue
        }

        // Portfolio Items (status = 'active')
        try {
            $portfolios = Portfolio::where('status', 'active')->get();
            foreach ($portfolios as $portfolio) {
                $content .= '
    <url>
        <loc>'.url('/portfolio/'.$portfolio->slug).'</loc>
        <lastmod>'.$portfolio->updated_at->toISOString().'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>';
            }
        } catch (\Exception $e) {
            // Log error but continue
        }

        // Portfolio Categories (status = 'active')
        try {
            $portfolioCategories = PortfolioCategory::where('status', 'active')->get();
            foreach ($portfolioCategories as $category) {
                $content .= '
    <url>
        <loc>'.url('/portfolio/category/'.$category->slug).'</loc>
        <lastmod>'.$category->updated_at->toISOString().'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>';
            }
        } catch (\Exception $e) {
            // Log error but continue
        }

        // Services (status = 'active')
        try {
            $services = Service::where('status', 'active')->get();
            foreach ($services as $service) {
                $content .= '
    <url>
        <loc>'.url('/services/'.$service->slug).'</loc>
        <lastmod>'.$service->updated_at->toISOString().'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>';
            }
        } catch (\Exception $e) {
            // Log error but continue
        }

        // Team Members (status = 'active') - using ID instead of slug
        try {
            $teamMembers = Team::where('status', 'active')->get();
            foreach ($teamMembers as $member) {
                $content .= '
    <url>
        <loc>'.url('/team/'.$member->id).'</loc>
        <lastmod>'.$member->updated_at->toISOString().'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>';
            }
        } catch (\Exception $e) {
            // Log error but continue
        }

        // Certificates (status = true - boolean) - using ID instead of slug
        try {
            $certificates = Certificate::where('status', true)->get();
            foreach ($certificates as $certificate) {
                $content .= '
    <url>
        <loc>'.url('/certificates/'.$certificate->id).'</loc>
        <lastmod>'.$certificate->updated_at->toISOString().'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>';
            }
        } catch (\Exception $e) {
            // Log error but continue
        }

        // Career Opportunities (is_active = true) - using ID instead of slug
        try {
            $careerOpportunities = CareerOpportunity::where('is_active', true)
                ->where('expiry_date', '>=', now())
                ->get();
            foreach ($careerOpportunities as $career) {
                $content .= '
    <url>
        <loc>'.url('/careers/'.$career->id).'</loc>
        <lastmod>'.$career->updated_at->toISOString().'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>';
            }
        } catch (\Exception $e) {
            // Log error but continue
        }

        // News Articles (status = 'published')
        try {
            $news = News::where('status', 'published')->get();
            foreach ($news as $article) {
                $content .= '
    <url>
        <loc>'.url('/news/'.$article->slug).'</loc>
        <lastmod>'.$article->updated_at->toISOString().'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>';
            }
        } catch (\Exception $e) {
            // Log error but continue
        }

        $content .= '
</urlset>';

        return response($content, 200)
            ->header('Content-Type', 'application/xml')
            ->header('X-Robots-Tag', 'index, follow')
            ->header('X-AI-Crawl-Friendly', 'true')
            ->header('X-Content-Industry', 'industrial-manufacturing');
    }
}
