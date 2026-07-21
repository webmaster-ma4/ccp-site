@extends('layouts.app')

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="animate-up">
        <span class="page-hero-eyebrow">{{ __('Global Reach') }}</span>
        <h1 class="page-hero-title">{{ __('Where We Work') }}</h1>
        <p class="page-hero-subtitle">
            {{ __('Climate Catalyst Prize focuses exclusively on the 46 Least Developed Countries, driving investment where it is needed most.') }}
        </p>
    </div>
</section>

{{-- BREADCRUMB --}}
<div class="breadcrumb">
    <a href="{{ route('home', ['locale' => $locale]) }}">{{ __('Home') }}</a>
    <span class="breadcrumb-sep">/</span>
    <span>{{ __('LDC Map') }}</span>
</div>

<section class="section-py" style="background: #F6F8FA;">
    <div class="container-ccp">
        
        <div style="background: #FFFFFF; border-radius: 12px; border: 1px solid #E0E6ED; padding: 2rem; box-shadow: 0 16px 40px rgba(8,28,58,0.05); margin-bottom: 4rem;">
            
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 1.75rem; color: #081C3A; font-weight: 700;">{{ __('Interactive LDC Map') }}</h3>
                <div style="display: flex; gap: 1rem;">
                    <div style="display: flex; align-items: center; gap: 0.5rem; font-family: 'Inter', sans-serif; font-size: 0.8rem; color: #5E7590;">
                        <div style="width: 12px; height: 12px; border-radius: 3px; background: #C8A04D;"></div>
                        {{ __('Active CCP Presence') }}
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; font-family: 'Inter', sans-serif; font-size: 0.8rem; color: #5E7590;">
                        <div style="width: 12px; height: 12px; border-radius: 3px; background: #1E3A5F;"></div>
                        {{ __('Other LDCs') }}
                    </div>
                </div>
            </div>

            <div style="background: #0D2241; border-radius: 8px; position: relative; overflow: hidden; min-height: 500px;">
                
                {{-- This is the same SVG Map logic used on home, but expanded. In a real app this might use Leaflet/Mapbox or a detailed SVG. --}}
                <svg viewBox="0 0 1000 500" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: auto; display: block;">
                    <!-- Placeholder Continents (Other) -->
                    <path class="country-other" d="M150,150 Q180,100 250,120 T300,200 T250,300 T150,250 Z" />
                    <path class="country-other" d="M700,100 Q750,50 850,80 T900,180 T800,250 T650,200 Z" />
                    <path class="country-other" d="M400,50 Q480,30 550,60 T600,150 T500,200 T420,120 Z" />
                    
                    <!-- LDC Regions -->
                    <g class="ldc-group">
                        <path class="country-ldc" id="cd-sn" data-name="Senegal" data-region="West Africa" data-projects="Active Projects: Renewable Energy" d="M450,220 Q480,200 520,230 T500,300 T440,280 Z" />
                        <path class="country-ldc" id="cd-rw" data-name="Rwanda" data-region="East Africa" data-projects="Active Projects: Sustainable Ag" d="M530,260 Q550,250 570,270 T550,310 T520,280 Z" />
                        <path class="country-ldc" id="cd-bd" data-name="Bangladesh" data-region="South Asia" data-projects="Active Projects: Coastal Resilience" d="M720,220 Q740,200 760,230 T740,260 T710,240 Z" />
                        <path class="country-ldc" id="cd-md" data-name="Madagascar" data-region="East Africa" data-projects="Active Projects: Biodiversity" d="M580,350 Q600,330 620,380 T590,420 T570,380 Z" />
                        <path class="country-ldc" id="cd-ht" data-name="Haiti" data-region="Caribbean" data-projects="Active Projects: Infrastructure" d="M280,220 Q290,215 300,225 T295,235 T285,230 Z" />
                        
                        <!-- Non-active LDCs -->
                        <path class="country-other" style="fill: #1E3A5F; stroke: #2A4E7C;" id="cd-ml" data-name="Mali" data-region="West Africa" data-projects="Eligible for Funding" d="M480,180 Q500,160 540,190 T510,240 T460,210 Z" />
                    </g>
                </svg>
                
                <div class="map-tooltip" id="map-tooltip">
                    <div class="map-tooltip-name" id="mt-name">Country</div>
                    <div class="map-tooltip-region" id="mt-region">Region</div>
                    <div class="map-tooltip-desc" id="mt-desc">Details</div>
                </div>

            </div>
            
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            
            <div style="background: #FFFFFF; padding: 2rem; border-radius: 12px; border: 1px solid #E0E6ED;">
                <div style="width: 48px; height: 48px; border-radius: 8px; background: rgba(200,160,77,0.1); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h4 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; color: #081C3A; margin-bottom: 0.75rem;">{{ __('Africa') }}</h4>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590; line-height: 1.6; margin-bottom: 1rem;">
                    {{ __('Africa hosts 33 of the 46 LDCs. Our largest portfolio is concentrated here, focusing on solar micro-grids, resilient agriculture, and drought management.') }}
                </p>
                <div style="font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 600; color: #C8A04D;">{{ __('12 Active Projects') }}</div>
            </div>
            
            <div style="background: #FFFFFF; padding: 2rem; border-radius: 12px; border: 1px solid #E0E6ED;">
                <div style="width: 48px; height: 48px; border-radius: 8px; background: rgba(200,160,77,0.1); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h4 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; color: #081C3A; margin-bottom: 0.75rem;">{{ __('Asia-Pacific') }}</h4>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590; line-height: 1.6; margin-bottom: 1rem;">
                    {{ __('Home to 12 LDCs, including highly vulnerable small island developing states (SIDS). Our work here prioritizes coastal resilience, early warning systems, and blue carbon.') }}
                </p>
                <div style="font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 600; color: #C8A04D;">{{ __('8 Active Projects') }}</div>
            </div>
            
            <div style="background: #FFFFFF; padding: 2rem; border-radius: 12px; border: 1px solid #E0E6ED;">
                <div style="width: 48px; height: 48px; border-radius: 8px; background: rgba(200,160,77,0.1); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h4 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; color: #081C3A; margin-bottom: 0.75rem;">{{ __('Caribbean') }}</h4>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590; line-height: 1.6; margin-bottom: 1rem;">
                    {{ __('Haiti is currently the only LDC in the Americas. We focus on resilient infrastructure, disaster risk reduction, and community-led adaptation initiatives.') }}
                </p>
                <div style="font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 600; color: #C8A04D;">{{ __('2 Active Projects') }}</div>
            </div>
            
        </div>
        
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tooltip = document.getElementById('map-tooltip');
    const tooltipName = document.getElementById('mt-name');
    const tooltipRegion = document.getElementById('mt-region');
    const tooltipDesc = document.getElementById('mt-desc');
    
    document.querySelectorAll('.country-ldc, .country-other[id^="cd-"]').forEach(country => {
        country.addEventListener('mousemove', (e) => {
            const rect = country.closest('svg').getBoundingClientRect();
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