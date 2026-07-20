@extends('layouts.app')

@section('content')
    @include('components.site.navbar', ['locale' => $locale])
    @include('components.site.hero', ['locale' => $locale])

    <main>
        <!-- ===== 2. IMPACT STATISTICS ===== -->
        <section style="padding: 4rem 1.5rem; background: #FFFFFF; border-bottom: 1px solid #E2E8E2;">
            <div style="max-width: 1200px; margin: 0 auto;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                    <div class="stat-card animate-up">
                        <div class="stat-number">$5M+</div>
                        <div class="stat-divider"></div>
                        <div class="stat-label">Total Prize Fund</div>
                    </div>
                    <div class="stat-card animate-up delay-2">
                        <div class="stat-number">120+</div>
                        <div class="stat-divider"></div>
                        <div class="stat-label">Countries Represented</div>
                    </div>
                    <div class="stat-card animate-up delay-4">
                        <div class="stat-number">2,400+</div>
                        <div class="stat-divider"></div>
                        <div class="stat-label">Applications Received</div>
                    </div>
                    <div class="stat-card animate-up delay-6">
                        <div class="stat-number">85%</div>
                        <div class="stat-divider"></div>
                        <div class="stat-label">Projects Scaled</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== 3. WHY CLIMATE CATALYST ===== -->
        <section id="about" class="section-padding">
            <div class="section-container">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
                    <div class="animate-left">
                        <span class="section-label">Why Climate Catalyst</span>
                        <h2 class="section-title">An international prize for the planet's most promising solutions</h2>
                        <p class="section-subtitle" style="margin-bottom: 2rem;">
                            We identify, fund and accelerate breakthrough climate technologies across the globe. 
                            Our mission is to bridge the gap between innovative research and real-world impact.
                        </p>
                        <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                            <div class="feature-item">
                                <div class="feature-icon">🎯</div>
                                <div>
                                    <div class="feature-title">Targeted Funding</div>
                                    <p class="feature-text">Direct capital to the innovations ready to scale globally</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">🌍</div>
                                <div>
                                    <div class="feature-title">Global Network</div>
                                    <p class="feature-text">Connect with partners, mentors and investors across 120+ countries</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">⚡</div>
                                <div>
                                    <div class="feature-title">Accelerated Impact</div>
                                    <p class="feature-text">From laboratory breakthrough to global deployment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="animate-right">
                        <div style="position: relative;">
                            <div style="border-radius: 20px; overflow: hidden; box-shadow: 0 8px 32px rgba(28,43,36,0.08);">
                                <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=800&q=80" alt="Scientists in laboratory" style="width: 100%; height: 480px; object-fit: cover; display: block;">
                            </div>
                            <div class="card" style="position: absolute; bottom: -1.5rem; left: -1.5rem; padding: 1.25rem 1.5rem; max-width: 210px; box-shadow: 0 8px 24px rgba(28,43,36,0.1);">
                                <div style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.8rem; font-weight: 700; color: #087F5B;">24</div>
                                <div style="font-size: 0.8rem; color: #5B6F66;">Active projects in portfolio</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== 4. AWARD CATEGORIES ===== -->
        <section id="categories" class="section-padding" style="background: #FFFFFF;">
            <div class="section-container">
                <div class="animate-up" style="text-align: center; margin-bottom: 3.5rem;">
                    <span class="section-label">Award Categories</span>
                    <h2 class="section-title" style="max-width: 600px; margin: 0 auto 1rem;">Four pillars of climate innovation</h2>
                    <p class="section-subtitle" style="margin: 0 auto; text-align: center;">Each category awards up to $1M in funding and support</p>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
                    <div class="award-card animate-up">
                        <div class="award-card-icon">🌱</div>
                        <h3>Carbon Removal</h3>
                        <p>Scaling direct air capture, mineralization, and ocean-based carbon removal technologies.</p>
                        <span class="award-prize">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            $1M prize
                        </span>
                    </div>
                    <div class="award-card animate-up delay-2">
                        <div class="award-card-icon">☀️</div>
                        <h3>Renewable Energy</h3>
                        <p>Next-generation solar, advanced wind, green hydrogen, and energy storage breakthroughs.</p>
                        <span class="award-prize">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            $1M prize
                        </span>
                    </div>
                    <div class="award-card animate-up delay-4">
                        <div class="award-card-icon">🏙️</div>
                        <h3>Sustainable Cities</h3>
                        <p>Smart grids, green buildings, circular economy, and urban climate adaptation solutions.</p>
                        <span class="award-prize">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            $1M prize
                        </span>
                    </div>
                    <div class="award-card animate-up delay-6">
                        <div class="award-card-icon">🔬</div>
                        <h3>Climate Intelligence</h3>
                        <p>AI-driven climate modeling, biodiversity monitoring, and adaptation technologies.</p>
                        <span class="award-prize">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            $1M prize
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== 5. WINNERS & FINALISTS ===== -->
        <section id="winners" class="section-padding">
            <div class="section-container">
                <div class="animate-up" style="text-align: center; margin-bottom: 3.5rem;">
                    <span class="section-label">Winners & Finalists</span>
                    <h2 class="section-title" style="max-width: 600px; margin: 0 auto 1rem;">Meet the innovators transforming our future</h2>
                    <p class="section-subtitle" style="margin: 0 auto; text-align: center;">The inaugural cohort represents breakthrough solutions from six continents</p>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                    <div class="winner-card animate-up">
                        <div class="winner-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=600&q=80" alt="Carbon Capture">
                            <div class="winner-badge">🏆 Grand Prize</div>
                        </div>
                        <div class="winner-info">
                            <h3>Carbonix Systems</h3>
                            <p>Direct air capture technology removing CO₂ at $50/ton — 10x cheaper than existing solutions.</p>
                            <div class="winner-meta">
                                <span class="winner-category">Carbon Removal</span>
                                <span class="winner-country">United States</span>
                            </div>
                        </div>
                    </div>
                    <div class="winner-card animate-up delay-2">
                        <div class="winner-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=600&q=80" alt="Solar Innovation">
                            <div class="winner-badge">🥇 First Place</div>
                        </div>
                        <div class="winner-info">
                            <h3>Helios Energy</h3>
                            <p>Perovskite solar cells achieving 36% efficiency — a new world record for renewable energy.</p>
                            <div class="winner-meta">
                                <span class="winner-category">Renewable Energy</span>
                                <span class="winner-country">Germany</span>
                            </div>
                        </div>
                    </div>
                    <div class="winner-card animate-up delay-4">
                        <div class="winner-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1532601224476-15c79f2f7a51?auto=format&fit=crop&w=600&q=80" alt="Smart City">
                            <div class="winner-badge">🥇 First Place</div>
                        </div>
                        <div class="winner-info">
                            <h3>UrbanFlow</h3>
                            <p>AI-powered urban grid optimization reducing energy consumption by 40% in pilot cities.</p>
                            <div class="winner-meta">
                                <span class="winner-category">Sustainable Cities</span>
                                <span class="winner-country">Singapore</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="animate-up" style="text-align: center; margin-top: 3rem;">
                    <a href="{{ route('blog', ['locale' => $locale]) }}" class="btn btn-secondary" style="text-decoration: none;">
                        View all winners
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ===== 6. PARTNERS ===== -->
        <section id="partners" class="section-padding" style="background: #FFFFFF;">
            <div class="section-container">
                <div class="animate-up" style="text-align: center; margin-bottom: 3.5rem;">
                    <span class="section-label">Our Partners</span>
                    <h2 class="section-title" style="margin: 0 auto;">Trusted by global leaders</h2>
                </div>

                <div class="animate-up" style="display: flex; align-items: center; justify-content: center; gap: 3rem; flex-wrap: wrap;">
                    <span class="partner-logo">UNEP</span>
                    <span class="partner-logo">WORLD BANK</span>
                    <span class="partner-logo">MIT</span>
                    <span class="partner-logo">STANFORD</span>
                    <span class="partner-logo">IRENA</span>
                    <span class="partner-logo">GATES FOUNDATION</span>
                </div>

                <div class="animate-up" style="text-align: center; margin-top: 3rem;">
                    <a href="{{ route('contact', ['locale' => $locale]) }}" class="btn btn-secondary" style="text-decoration: none;">
                        Become a partner
                    </a>
                </div>
            </div>
        </section>

        <!-- ===== 7. NEWSLETTER CTA ===== -->
        <section id="apply" class="section-padding" style="background: #E8F5EF;">
            <div class="section-container">
                <div class="animate-scale" style="text-align: center; max-width: 600px; margin: 0 auto;">
                    <span class="section-label" style="background: #FFFFFF;">Get Involved</span>
                    <h2 class="section-title" style="margin: 1rem auto;">Ready to transform climate innovation?</h2>
                    <p style="color: #5B6F66; font-size: 1rem; line-height: 1.7; margin: 0 auto 2rem;">
                        Join the world's most ambitious climate prize. Subscribe for updates on applications, events and impact stories.
                    </p>
                    <form style="display: flex; gap: 0.75rem; max-width: 480px; margin: 0 auto;">
                        <input type="email" placeholder="Enter your email" class="newsletter-input" required>
                        <button type="submit" class="btn btn-primary" style="flex-shrink: 0; cursor: pointer;">
                            Subscribe
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </button>
                    </form>
                    <p style="margin-top: 0.75rem; font-size: 0.75rem; color: #A3B3AB;">No spam. Unsubscribe anytime.</p>
                </div>
            </div>
        </section>
    </main>

    @include('components.site.footer')
@endsection