<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Static Pages -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>{{ url('/about') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    
    <url>
        <loc>{{ url('/products') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    
    <url>
        <loc>{{ url('/portfolio') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    
    <url>
        <loc>{{ url('/services') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    
    <url>
        <loc>{{ url('/team') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    
    <url>
        <loc>{{ url('/certificates') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    
    <url>
        <loc>{{ url('/contact') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    
    <url>
        <loc>{{ url('/career-opportunities') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    
    <!-- Dynamic Products -->
    @foreach($products as $product)
    <url>
        <loc>{{ url('/products/' . $product->slug) }}</loc>
        <lastmod>{{ $product->updated_at->toISOString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
    
    <!-- Dynamic Portfolios -->
    @foreach($portfolios as $portfolio)
    <url>
        <loc>{{ url('/portfolio/' . $portfolio->slug) }}</loc>
        <lastmod>{{ $portfolio->updated_at->toISOString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
    
    <!-- Dynamic Services -->
    @foreach($services as $service)
    <url>
        <loc>{{ url('/services/' . $service->slug) }}</loc>
        <lastmod>{{ $service->updated_at->toISOString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
    
    <!-- Dynamic Career Opportunities -->
    @foreach($careerOpportunities as $career)
    <url>
        <loc>{{ url('/career-opportunities/' . $career->id) }}</loc>
        <lastmod>{{ $career->updated_at->toISOString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
    
    <!-- Dynamic News (if exists) -->
    @foreach($news as $article)
    <url>
        <loc>{{ url('/news/' . $article->slug) }}</loc>
        <lastmod>{{ $article->updated_at->toISOString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
</urlset>
