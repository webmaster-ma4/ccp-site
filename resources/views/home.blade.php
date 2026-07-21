@extends('layouts.app')

@section('content')

{{-- 1. HERO SECTION --}}
@include('components.site.hero')

{{-- 2. MISSION STRIP --}}
<section class="mission-strip">
    <div class="mission-grid">
        <div class="mission-pillar animate-up delay-1">
            <div class="mission-pillar-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div>
                <h4 class="mission-pillar-title">{{ __('Climate Resilience') }}</h4>
                <p class="mission-pillar-text">{{ __('Empowering LDCs to adapt to climate impacts.') }}</p>
            </div>
        </div>
        <div class="mission-pillar animate-up delay-2">
            <div class="mission-pillar-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <div>
                <h4 class="mission-pillar-title">{{ __('Low-Carbon Growth') }}</h4>
                <p class="mission-pillar-text">{{ __('Accelerating sustainable energy transitions.') }}</p>
            </div>
        </div>
        <div class="mission-pillar animate-up delay-3">
            <div class="mission-pillar-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <h4 class="mission-pillar-title">{{ __('Climate Finance') }}</h4>
                <p class="mission-pillar-text">{{ __('Mobilizing capital for transformative projects.') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- 3. ABOUT INTRODUCTION --}}
<section class="about-section" id="about">
    <div class="about-grid">
        <div class="about-image-wrap animate-left">
            <div class="about-image">
                <img src="{{ asset('images/about-img.jpg') }}" alt="CCP work in action">
            </div>
            <div class="about-badge">
                <span class="about-badge-value">46</span>
                <span class="about-badge-label">{{ __('Least Developed Countries') }}</span>
            </div>
        </div>
        
        <div class="about-content animate-right">
            <span class="eyebrow">{{ __('Who We Are') }}</span>
            <h2 class="section-title">{{ __('Bridging the Gap Between Climate Ambition and Action') }}</h2>
            <p class="section-lead" style="margin-bottom: 2rem;">
                {{ __('Climate Catalyst Prize is a pioneering global initiative dedicated to supporting Least Developed Countries (LDCs). We believe that the most vulnerable nations hold immense potential to lead the global transition toward a sustainable, climate-resilient future.') }}
            </p>
            
            <div class="about-features">
                <div class="about-feature">
                    <div class="about-feature-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="about-feature-title">{{ __('Global Reach, Local Impact') }}</h4>
                        <p class="about-feature-text">{{ __('We operate across 46 LDCs, tailoring solutions to specific regional vulnerabilities and opportunities.') }}</p>
                    </div>
                </div>
                <div class="about-feature">
                    <div class="about-feature-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="about-feature-title">{{ __('Strategic Partnerships') }}</h4>
                        <p class="about-feature-text">{{ __('We unite governments, private investors, and international institutions to scale climate action.') }}</p>
                    </div>
                </div>
            </div>
            
            <div style="margin-top: 2.5rem;">
                <a href="{{ route('about', ['locale' => $locale]) }}" class="btn btn-outline-navy">
                    {{ __('Learn More About Us') }}
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- 4. SERVICES / EXPERTISE --}}
<section class="services-section" id="services">
    <div class="container-ccp text-center">
        <span class="eyebrow">{{ __('Our Expertise') }}</span>
        <h2 class="section-title">{{ __('Comprehensive Climate Solutions') }}</h2>
        <p class="section-lead">
            {{ __('We provide end-to-end support to unlock climate finance and implement sustainable initiatives across key sectors in the developing world.') }}
        </p>
    </div>
    
    <div class="services-grid">
        <a href="{{ route('services', ['locale' => $locale]) }}#carbon-markets" class="service-card animate-up delay-1">
            <span class="service-num">01</span>
            <div class="service-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
            <h3 class="service-title">{{ __('Carbon Market Access') }}</h3>
            <p class="service-text">{{ __('Assisting LDCs in navigating international compliance and voluntary carbon markets to generate sustainable revenue.') }}</p>
            <span class="service-link">{{ __('Explore') }} <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></span>
        </a>
        
        <a href="{{ route('services', ['locale' => $locale]) }}#adaptation" class="service-card animate-up delay-2">
            <span class="service-num">02</span>
            <div class="service-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="service-title">{{ __('Adaptation & Resilience') }}</h3>
            <p class="service-text">{{ __('Designing robust infrastructure, water management, and early warning systems to protect vulnerable communities.') }}</p>
            <span class="service-link">{{ __('Explore') }} <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></span>
        </a>
        
        <a href="{{ route('services', ['locale' => $locale]) }}#agriculture" class="service-card animate-up delay-3">
            <span class="service-num">03</span>
            <div class="service-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
            </div>
            <h3 class="service-title">{{ __('Sustainable Agriculture') }}</h3>
            <p class="service-text">{{ __('Promoting regenerative farming practices that enhance food security while sequestering soil carbon.') }}</p>
            <span class="service-link">{{ __('Explore') }} <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></span>
        </a>
    </div>
</section>

{{-- 5. CLIMATE FINANCE ECOSYSTEM --}}
<section class="finance-section">
    <div class="finance-intro">
        <div class="animate-left">
            <h2 class="section-title light">{{ __('Unlocking Climate Capital') }}</h2>
            <p class="section-lead light">{{ __('Accessing international climate finance remains a critical barrier for LDCs. CCP bridges this gap by structuring bankable projects and connecting them with global capital providers.') }}</p>
        </div>
        <div class="animate-right text-right">
            <a href="{{ route('apply', ['locale' => $locale]) }}" class="btn btn-gold btn-lg">
                {{ __('Submit a Project for Funding') }}
            </a>
        </div>
    </div>
    
    <div class="finance-cards animate-up">
        <div class="finance-card">
            <div class="finance-card-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h4 class="finance-card-title">{{ __('Project Structuring') }}</h4>
            <p class="finance-card-text">{{ __('Translating conceptual ideas into rigorous, bankable climate proposals.') }}</p>
        </div>
        <div class="finance-card">
            <div class="finance-card-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <h4 class="finance-card-title">{{ __('Fund Matching') }}</h4>
            <p class="finance-card-text">{{ __('Connecting projects with GCF, bilateral donors, and private impact investors.') }}</p>
        </div>
        <div class="finance-card">
            <div class="finance-card-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <h4 class="finance-card-title">{{ __('Risk Mitigation') }}</h4>
            <p class="finance-card-text">{{ __('Developing financial instruments to de-risk investments in emerging markets.') }}</p>
        </div>
        <div class="finance-card">
            <div class="finance-card-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
            <h4 class="finance-card-title">{{ __('MRV Systems') }}</h4>
            <p class="finance-card-text">{{ __('Implementing robust Measurement, Reporting, and Verification frameworks.') }}</p>
        </div>
    </div>
</section>

{{-- 6. GLOBAL IMPACT (STAT COUNTERS) --}}
<section class="impact-section">
    <div class="impact-section-header animate-up">
        <div>
            <span class="eyebrow">{{ __('Our Track Record') }}</span>
            <h2 class="section-title light">{{ __('Measurable Global Impact') }}</h2>
        </div>
        <div>
            <a href="{{ route('about', ['locale' => $locale]) }}" class="btn btn-outline-white">
                {{ __('View Impact Report') }}
            </a>
        </div>
    </div>
    
    <div class="impact-grid">
        <div class="impact-stat">
            <div class="impact-number" data-target="250" data-prefix="$" data-suffix="M+">0</div>
            <div class="impact-label">{{ __('Climate Finance Mobilized') }}</div>
        </div>
        <div class="impact-stat">
            <div class="impact-number" data-target="4.2" data-suffix="M" data-decimal="1">0</div>
            <div class="impact-label">{{ __('Tons CO2e Reduced/Avoided') }}</div>
        </div>
        <div class="impact-stat">
            <div class="impact-number" data-target="150" data-suffix="+">0</div>
            <div class="impact-label">{{ __('Projects Supported') }}</div>
        </div>
        <div class="impact-stat">
            <div class="impact-number" data-target="1.8" data-suffix="M" data-decimal="1">0</div>
            <div class="impact-label">{{ __('People Benefiting Directly') }}</div>
        </div>
    </div>
</section>

{{-- 7. HOW WE WORK (TIMELINE) --}}
<section class="timeline-section">
    <div class="container-ccp text-center">
        <span class="eyebrow">{{ __('Methodology') }}</span>
        <h2 class="section-title">{{ __('The CCP Approach') }}</h2>
        <p class="section-lead">
            {{ __('A rigorous, phased methodology designed to ensure long-term viability, transparency, and maximum climate impact.') }}
        </p>
    </div>
    
    <div class="timeline-wrap">
        <div class="timeline-step animate-up delay-1">
            <div class="timeline-empty"></div>
            <div class="timeline-node"><div class="timeline-dot">1</div></div>
            <div class="timeline-content">
                <span class="timeline-content-label">{{ __('Phase 1') }}</span>
                <h4 class="timeline-content-title">{{ __('Origination & Screening') }}</h4>
                <p class="timeline-content-text">{{ __('We identify high-potential climate initiatives in LDCs through our network of local partners and government agencies. Projects undergo rigorous initial screening for additionality and feasibility.') }}</p>
            </div>
        </div>
        
        <div class="timeline-step animate-up delay-2">
            <div class="timeline-empty"></div>
            <div class="timeline-node"><div class="timeline-dot">2</div></div>
            <div class="timeline-content">
                <span class="timeline-content-label">{{ __('Phase 2') }}</span>
                <h4 class="timeline-content-title">{{ __('Project Preparation & Structuring') }}</h4>
                <p class="timeline-content-text">{{ __('Our technical experts work with project proponents to develop comprehensive feasibility studies, ESG frameworks, and financial models required by international capital providers.') }}</p>
            </div>
        </div>
        
        <div class="timeline-step animate-up delay-3">
            <div class="timeline-empty"></div>
            <div class="timeline-node"><div class="timeline-dot">3</div></div>
            <div class="timeline-content">
                <span class="timeline-content-label">{{ __('Phase 3') }}</span>
                <h4 class="timeline-content-title">{{ __('Capital Matching') }}</h4>
                <p class="timeline-content-text">{{ __('We deploy our blended finance expertise to construct funding packages, combining grants, concessional debt, and private equity from our network of international investors.') }}</p>
            </div>
        </div>
        
        <div class="timeline-step animate-up delay-4">
            <div class="timeline-empty"></div>
            <div class="timeline-node"><div class="timeline-dot">4</div></div>
            <div class="timeline-content">
                <span class="timeline-content-label">{{ __('Phase 4') }}</span>
                <h4 class="timeline-content-title">{{ __('Implementation & MRV') }}</h4>
                <p class="timeline-content-text">{{ __('We oversee deployment and establish strict Measurement, Reporting, and Verification (MRV) systems to ensure climate outcomes are achieved and accurately quantified.') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- 8. LDC MAP INTERACTIVE --}}
<section class="map-section">
    <div class="container-ccp text-center">
        <span class="eyebrow">{{ __('Where We Work') }}</span>
        <h2 class="section-title">{{ __('Empowering 46 Least Developed Countries') }}</h2>
        <p class="section-lead">
            {{ __('Hover over the map to see countries where CCP is currently deploying climate finance and technical assistance.') }}
        </p>
    </div>
    
    <div class="map-container animate-up">
        <div class="map-viewport">
            {{-- Interactive SVG Map Component (Using a simplified illustrative map for the demo) --}}
            <svg viewBox="0 0 1000 500" preserveAspectRatio="xMidYMid meet">
                <!-- Placeholder Continents (Other) -->
                <path class="country-other" d="M150,150 Q180,100 250,120 T300,200 T250,300 T150,250 Z" />
                <path class="country-other" d="M700,100 Q750,50 850,80 T900,180 T800,250 T650,200 Z" />
                <path class="country-other" d="M400,50 Q480,30 550,60 T600,150 T500,200 T420,120 Z" />
                
                <!-- Africa / LDC Regions -->
                <g class="ldc-group">
                    <path class="country-ldc" id="cd-sn" data-name="Senegal" data-region="West Africa" data-projects="4 Projects" d="M450,220 Q480,200 520,230 T500,300 T440,280 Z" />
                    <path class="country-ldc" id="cd-rw" data-name="Rwanda" data-region="East Africa" data-projects="6 Projects" d="M530,260 Q550,250 570,270 T550,310 T520,280 Z" />
                    <path class="country-ldc" id="cd-bd" data-name="Bangladesh" data-region="South Asia" data-projects="12 Projects" d="M720,220 Q740,200 760,230 T740,260 T710,240 Z" />
                    <path class="country-ldc" id="cd-md" data-name="Madagascar" data-region="East Africa" data-projects="3 Projects" d="M580,350 Q600,330 620,380 T590,420 T570,380 Z" />
                    <path class="country-ldc" id="cd-ht" data-name="Haiti" data-region="Caribbean" data-projects="2 Projects" d="M280,220 Q290,215 300,225 T295,235 T285,230 Z" />
                </g>
            </svg>
            
            <div class="map-tooltip" id="map-tooltip">
                <div class="map-tooltip-name" id="mt-name">Country</div>
                <div class="map-tooltip-region" id="mt-region">Region</div>
                <div class="map-tooltip-desc" id="mt-desc">Details</div>
            </div>
        </div>
        <div class="map-footer">
            <div class="map-legend">
                <div class="map-legend-item">
                    <div class="map-legend-dot" style="background: #C8A04D;"></div>
                    <span>{{ __('LDC with Active CCP Projects') }}</span>
                </div>
                <div class="map-legend-item">
                    <div class="map-legend-dot" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(8,28,58,0.2);"></div>
                    <span>{{ __('Other Regions') }}</span>
                </div>
            </div>
            <a href="{{ route('map', ['locale' => $locale]) }}" class="btn btn-outline-navy btn-sm">
                {{ __('View Detailed Map') }}
            </a>
        </div>
    </div>
</section>

{{-- 9. FEATURED PROJECTS --}}
<section class="projects-section">
    <div class="container-ccp text-center">
        <span class="eyebrow">{{ __('Portfolio') }}</span>
        <h2 class="section-title">{{ __('Featured Climate Initiatives') }}</h2>
    </div>
    
    <div class="projects-grid">
        <!-- Project 1 -->
        <a href="#" class="project-card animate-up delay-1">
            <div class="project-img">
                <img src="{{ asset('images/project-1.jpg') }}" alt="Solar array in Senegal">
                <span class="project-region">West Africa</span>
                <span class="project-status active">{{ __('Active') }}</span>
            </div>
            <div class="project-body">
                <span class="project-country">Senegal</span>
                <h4 class="project-title">{{ __('Sahel Solar Mini-Grid Electrification Program') }}</h4>
                <div class="project-meta">
                    <span class="project-budget">$12.5M</span>
                    <span class="project-sector">{{ __('Renewable Energy') }}</span>
                </div>
            </div>
        </a>
        
        <!-- Project 2 -->
        <a href="#" class="project-card animate-up delay-2">
            <div class="project-img">
                <img src="{{ asset('images/project-2.jpg') }}" alt="Mangrove restoration">
                <span class="project-region">South Asia</span>
                <span class="project-status active">{{ __('Active') }}</span>
            </div>
            <div class="project-body">
                <span class="project-country">Bangladesh</span>
                <h4 class="project-title">{{ __('Coastal Mangrove Restoration & Blue Carbon') }}</h4>
                <div class="project-meta">
                    <span class="project-budget">$8.2M</span>
                    <span class="project-sector">{{ __('Nature-Based Solutions') }}</span>
                </div>
            </div>
        </a>
        
        <!-- Project 3 -->
        <a href="#" class="project-card animate-up delay-3">
            <div class="project-img">
                <img src="{{ asset('images/project-3.jpg') }}" alt="Agriculture in Rwanda">
                <span class="project-region">East Africa</span>
                <span class="project-status completed">{{ __('Completed') }}</span>
            </div>
            <div class="project-body">
                <span class="project-country">Rwanda</span>
                <h4 class="project-title">{{ __('Climate-Smart Agriculture & Soil Carbon Sequestration') }}</h4>
                <div class="project-meta">
                    <span class="project-budget">$4.1M</span>
                    <span class="project-sector">{{ __('Sustainable Ag.') }}</span>
                </div>
            </div>
        </a>
    </div>
</section>

{{-- 10. PARTNERS LOGOS --}}
<section class="partners-section">
    <div class="container-ccp text-center">
        <span class="eyebrow">{{ __('Trusted By') }}</span>
        <h2 class="section-title" style="font-size: 1.75rem;">{{ __('Our Institutional Partners') }}</h2>
    </div>
    
    <div class="partners-logos animate-up">
        <!-- Using placeholders for demo, replace with actual partner logos -->
        <div class="partner-item"><img src="{{ asset('images/partners/gcf-logo.png') }}" alt="GCF"></div>
        <div class="partner-item"><img src="{{ asset('images/partners/undp-logo.png') }}" alt="UNDP"></div>
        <div class="partner-item"><img src="{{ asset('images/partners/worldbank-logo.png') }}" alt="World Bank"></div>
        <div class="partner-item"><img src="{{ asset('images/partners/giz-logo.png') }}" alt="GIZ"></div>
        <div class="partner-item"><img src="{{ asset('images/partners/unep-logo.png') }}" alt="UNEP"></div>
    </div>
</section>

{{-- 11. INSIGHTS / BLOG --}}
<section class="insights-section">
    <div class="container-ccp flex items-end justify-between" style="display: flex; align-items: flex-end; justify-content: space-between; flex-wrap: wrap; gap: 2rem;">
        <div>
            <span class="eyebrow">{{ __('Knowledge Hub') }}</span>
            <h2 class="section-title mb-0">{{ __('Latest Insights & News') }}</h2>
        </div>
        <a href="{{ route('blog', ['locale' => $locale]) }}" class="btn btn-outline-navy">
            {{ __('View All Publications') }}
        </a>
    </div>
    
    <div class="insights-grid">
        @if(isset($recentPosts) && $recentPosts->count() > 0)
            @foreach($recentPosts as $index => $post)
                <a href="{{ route('post', ['locale' => $locale, 'slug' => $post->slug]) }}" class="insight-card animate-up delay-{{ $index + 1 }}">
                    <div class="insight-img">
                        <img src="{{ asset('images/blog-' . ($index % 3 + 1) . '.jpg') }}" alt="{{ $post->title }}">
                    </div>
                    <div class="insight-body">
                        <span class="insight-category">{{ $post->category->name ?? 'Policy' }}</span>
                        <h4 class="insight-title">{{ $post->title }}</h4>
                        <p class="insight-excerpt">{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 100) }}</p>
                        <div class="insight-footer">
                            <span class="insight-date">{{ $post->published_at->format('M d, Y') }}</span>
                            <span class="insight-read-more">{{ __('Read Article') }} <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></span>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <!-- Fallbacks if no posts -->
            @for($i=1; $i<=3; $i++)
            <a href="#" class="insight-card animate-up delay-{{ $i }}">
                <div class="insight-img">
                    <img src="{{ asset('images/blog-'.$i.'.jpg') }}" alt="Insight">
                </div>
                <div class="insight-body">
                    <span class="insight-category">{{ __('Research') }}</span>
                    <h4 class="insight-title">{{ __('Navigating Article 6: Opportunities for Least Developed Countries in 2024') }}</h4>
                    <p class="insight-excerpt">{{ __('A comprehensive analysis of how the new carbon market mechanisms can benefit emerging economies...') }}</p>
                    <div class="insight-footer">
                        <span class="insight-date">{{ __('Oct 12, 2023') }}</span>
                        <span class="insight-read-more">{{ __('Read Article') }} <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></span>
                    </div>
                </div>
            </a>
            @endfor
        @endif
    </div>
</section>

{{-- 12. FINAL CTA --}}
<section class="cta-section">
    <div class="cta-inner animate-up">
        <span class="page-hero-eyebrow">{{ __('Partner With Us') }}</span>
        <h2 class="page-hero-title" style="font-size: 2.5rem; margin-bottom: 1.5rem;">{{ __('Ready to Accelerate Climate Action?') }}</h2>
        <p class="page-hero-subtitle" style="margin-bottom: 2.5rem;">
            {{ __('Whether you are a government agency seeking funding, a project developer needing technical assistance, or an investor looking for high-impact opportunities.') }}
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('apply', ['locale' => $locale]) }}" class="btn btn-gold btn-lg">
                {{ __('Submit a Project') }}
            </a>
            <a href="{{ route('contact', ['locale' => $locale]) }}" class="btn btn-outline-white btn-lg">
                {{ __('Contact Our Team') }}
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Basic JS for Interactive Map Hover Tooltips
    const tooltip = document.getElementById('map-tooltip');
    const tooltipName = document.getElementById('mt-name');
    const tooltipRegion = document.getElementById('mt-region');
    const tooltipDesc = document.getElementById('mt-desc');
    
    document.querySelectorAll('.country-ldc').forEach(country => {
        country.addEventListener('mousemove', (e) => {
            const rect = document.querySelector('.map-viewport').getBoundingClientRect();
            let x = e.clientX - rect.left + 15;
            let y = e.clientY - rect.top + 15;
            
            tooltip.style.left = x + 'px';
            tooltip.style.top = y + 'px';
            
            tooltipName.textContent = country.dataset.name;
            tooltipRegion.textContent = country.dataset.region;
            tooltipDesc.textContent = country.dataset.projects;
            
            tooltip.classList.add('visible');
        });
        
        country.addEventListener('mouseleave', () => {
            tooltip.classList.remove('visible');
        });
    });
});
</script>
@endpush
