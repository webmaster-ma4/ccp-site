@extends('layouts.app')

@section('content')
    @include('components.site.breadcrumb')

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __('Where We Work') }}</span>
                <h1>{{ __('Eligible Countries') }}</h1>
                <p>{{ __('Climate Catalyst Prize works exclusively with Least Developed Countries as defined by the United Nations. Explore the regions where we provide support.') }}</p>
            </div>
        </section>

        <section class="section">
            <div class="section-heading">
                <div>
                    <h2>{{ __('Interactive Map') }}</h2>
                    <p>{{ __('Click on a highlighted country to learn more about our work in that region.') }}</p>
                </div>
            </div>

            <div class="card map-card">
                <div id="map-container" style="width: 100%; height: 600px; position: relative;">
                    <svg id="world-map" viewBox="0 0 1000 500" style="width: 100%; height: 100%;">
                        <!-- Simplified world map paths will be rendered here -->
                    </svg>
                    <div id="map-tooltip" style="display: none; position: absolute; background: #1C2B24; color: #fff; padding: 0.75rem 1rem; border-radius: 12px; font-size: 0.85rem; pointer-events: none; z-index: 100; max-width: 250px; box-shadow: 0 8px 24px rgba(0,0,0,0.15);"></div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-heading">
                <div>
                    <h2>{{ __('About LDC Eligibility') }}</h2>
                    <p>{{ __('Understanding our geographic focus and mandate') }}</p>
                </div>
            </div>
            <div class="card-grid">
                <article class="card">
                    <h3>{{ __('UN Definition') }}</h3>
                    <p>{{ __('Least Developed Countries are identified by the United Nations based on low income, human resource weakness, and economic vulnerability. Our mandate aligns with this official classification.') }}</p>
                </article>
                <article class="card">
                    <h3>{{ __('Regional Coverage') }}</h3>
                    <p>{{ __('We support LDCs across Africa, Asia, Latin America and the Caribbean, and the Pacific. Our portfolio spans diverse contexts from small island states to landlocked nations.') }}</p>
                </article>
                <article class="card">
                    <h3>{{ __('Country Selection') }}</h3>
                    <p>{{ __('Our engagement is demand-driven. We work where governments, NGOs, and communities request support and demonstrate commitment to climate action.') }}</p>
                </article>
            </div>
        </section>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const tooltip = document.getElementById('map-tooltip');
        const mapContainer = document.getElementById('map-container');
        
        fetch('{{ route("api.eligible-countries") }}')
            .then(response => response.json())
            .then(countries => {
                const svg = document.getElementById('world-map');
                
                // Simplified world map background
                const worldPaths = {
                    'Africa': 'M 280 120 Q 320 100 380 110 T 420 180 T 380 260 T 300 280 T 260 220 T 280 120 Z',
                    'Asia': 'M 420 80 Q 520 60 680 90 T 720 180 T 600 220 T 480 200 T 420 140 T 420 80 Z',
                    'Europe': 'M 380 60 Q 440 50 480 70 T 460 120 T 400 130 T 360 100 T 380 60 Z',
                    'N America': 'M 120 60 Q 200 40 260 70 T 240 160 T 160 180 T 100 140 T 120 60 Z',
                    'S America': 'M 220 200 Q 280 180 320 220 T 300 320 T 240 340 T 200 280 T 220 200 Z',
                    'Oceania': 'M 720 280 Q 780 260 840 290 T 820 360 T 740 380 T 700 320 T 720 280 Z'
                };

                // Draw continents
                for (const [continent, path] of Object.entries(worldPaths)) {
                    const pathEl = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                    pathEl.setAttribute('d', path);
                    pathEl.setAttribute('fill', '#E8F5EF');
                    pathEl.setAttribute('stroke', '#E2E8E2');
                    pathEl.setAttribute('stroke-width', '1');
                    svg.appendChild(pathEl);
                }

                // Country positions (simplified coordinates on the SVG)
                const countryPositions = {
                    'AFG': { x: 580, y: 140, name: 'Afghanistan' },
                    'AGO': { x: 420, y: 240, name: 'Angola' },
                    'BGD': { x: 620, y: 160, name: 'Bangladesh' },
                    'BEN': { x: 380, y: 200, name: 'Benin' },
                    'BTN': { x: 640, y: 150, name: 'Bhutan' },
                    'BFA': { x: 370, y: 190, name: 'Burkina Faso' },
                    'BDI': { x: 460, y: 230, name: 'Burundi' },
                    'CPV': { x: 300, y: 210, name: 'Cabo Verde' },
                    'KHM': { x: 660, y: 180, name: 'Cambodia' },
                    'CMR': { x: 400, y: 210, name: 'Cameroon' },
                    'CAF': { x: 430, y: 210, name: 'Central African Republic' },
                    'TCD': { x: 420, y: 200, name: 'Chad' },
                    'COM': { x: 500, y: 240, name: 'Comoros' },
                    'COD': { x: 440, y: 240, name: 'DR Congo' },
                    'COG': { x: 410, y: 230, name: 'Congo' },
                    'CIV': { x: 360, y: 210, name: "Côte d'Ivoire" },
                    'DJI': { x: 510, y: 210, name: 'Djibouti' },
                    'GNQ': { x: 390, y: 230, name: 'Equatorial Guinea' },
                    'ERI': { x: 500, y: 195, name: 'Eritrea' },
                    'SWZ': { x: 480, y: 270, name: 'Eswatini' },
                    'ETH': { x: 490, y: 205, name: 'Ethiopia' },
                    'GMB': { x: 320, y: 195, name: 'Gambia' },
                    'GHA': { x: 370, y: 205, name: 'Ghana' },
                    'GIN': { x: 340, y: 205, name: 'Guinea' },
                    'GNB': { x: 330, y: 200, name: 'Guinea-Bissau' },
                    'GUY': { x: 260, y: 230, name: 'Guyana' },
                    'HTI': { x: 220, y: 190, name: 'Haiti' },
                    'HND': { x: 200, y: 180, name: 'Honduras' },
                    'IND': { x: 600, y: 150, name: 'India' },
                    'IDN': { x: 680, y: 220, name: 'Indonesia' },
                    'KEN': { x: 480, y: 215, name: 'Kenya' },
                    'KIR': { x: 880, y: 280, name: 'Kiribati' },
                    'PRK': { x: 700, y: 130, name: 'North Korea' },
                    'KGZ': { x: 560, y: 120, name: 'Kyrgyzstan' },
                    'LAO': { x: 660, y: 170, name: 'Laos' },
                    'LSO': { x: 480, y: 280, name: 'Lesotho' },
                    'LBR': { x: 350, y: 215, name: 'Liberia' },
                    'MDG': { x: 510, y: 250, name: 'Madagascar' },
                    'MWI': { x: 480, y: 245, name: 'Malawi' },
                    'MDV': { x: 580, y: 200, name: 'Maldives' },
                    'MLI': { x: 360, y: 195, name: 'Mali' },
                    'MRT': { x: 320, y: 200, name: 'Mauritania' },
                    'MUS': { x: 540, y: 260, name: 'Mauritius' },
                    'FSM': { x: 860, y: 200, name: 'Micronesia' },
                    'MNG': { x: 640, y: 120, name: 'Mongolia' },
                    'MAR': { x: 350, y: 170, name: 'Morocco' },
                    'MOZ': { x: 480, y: 250, name: 'Mozambique' },
                    'MMR': { x: 650, y: 165, name: 'Myanmar' },
                    'NAM': { x: 440, y: 260, name: 'Namibia' },
                    'NPL': { x: 630, y: 150, name: 'Nepal' },
                    'NER': { x: 390, y: 200, name: 'Niger' },
                    'NGA': { x: 400, y: 215, name: 'Nigeria' },
                    'MKD': { x: 440, y: 130, name: 'North Macedonia' },
                    'PNG': { x: 800, y: 230, name: 'Papua New Guinea' },
                    'PAK': { x: 590, y: 145, name: 'Pakistan' },
                    'PLW': { x: 840, y: 210, name: 'Palau' },
                    'PAN': { x: 210, y: 190, name: 'Panama' },
                    'PNG': { x: 800, y: 230, name: 'Papua New Guinea' },
                    'RWA': { x: 460, y: 225, name: 'Rwanda' },
                    'WSM': { x: 900, y: 290, name: 'Samoa' },
                    'STP': { x: 380, y: 220, name: 'São Tomé and Príncipe' },
                    'SEN': { x: 330, y: 195, name: 'Senegal' },
                    'SYC': { x: 520, y: 250, name: 'Seychelles' },
                    'SLE': { x: 340, y: 210, name: 'Sierra Leone' },
                    'SLB': { x: 850, y: 240, name: 'Solomon Islands' },
                    'SOM': { x: 510, y: 215, name: 'Somalia' },
                    'SSD': { x: 470, y: 215, name: 'South Sudan' },
                    'LKA': { x: 610, y: 175, name: 'Sri Lanka' },
                    'SDN': { x: 460, y: 195, name: 'Sudan' },
                    'SUR': { x: 270, y: 235, name: 'Suriname' },
                    'SYR': { x: 500, y: 145, name: 'Syria' },
                    'TJK': { x: 570, y: 130, name: 'Tajikistan' },
                    'TZA': { x: 480, y: 230, name: 'Tanzania' },
                    'TLS': { x: 720, y: 210, name: 'Timor-Leste' },
                    'TGO': { x: 370, y: 205, name: 'Togo' },
                    'TON': { x: 910, y: 285, name: 'Tonga' },
                    'TUN': { x: 400, y: 160, name: 'Tunisia' },
                    'TUV': { x: 920, y: 270, name: 'Tuvalu' },
                    'UGA': { x: 470, y: 220, name: 'Uganda' },
                    'VUT': { x: 870, y: 260, name: 'Vanuatu' },
                    'VNM': { x: 670, y: 175, name: 'Vietnam' },
                    'YEM': { x: 510, y: 175, name: 'Yemen' },
                    'ZMB': { x: 460, y: 245, name: 'Zambia' },
                    'ZWE': { x: 470, y: 255, name: 'Zimbabwe' }
                };

                // Draw countries
                countries.forEach(country => {
                    const pos = countryPositions[country.iso_code];
                    if (!pos) return;

                    const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
                    circle.setAttribute('cx', pos.x);
                    circle.setAttribute('cy', pos.y);
                    circle.setAttribute('r', '8');
                    circle.setAttribute('fill', country.display_color);
                    circle.setAttribute('stroke', '#fff');
                    circle.setAttribute('stroke-width', '2');
                    circle.setAttribute('cursor', 'pointer');
                    circle.setAttribute('data-country', country.name);
                    circle.setAttribute('data-tooltip', country.tooltip_text || country.name);
                    circle.classList.add('country-dot');

                    circle.addEventListener('mouseenter', function(e) {
                        const tooltipText = this.getAttribute('data-tooltip');
                        tooltip.innerHTML = `<strong>${pos.name}</strong>${tooltipText !== pos.name ? '<br><small>' + tooltipText + '</small>' : ''}`;
                        tooltip.style.display = 'block';
                    });

                    circle.addEventListener('mousemove', function(e) {
                        const rect = mapContainer.getBoundingClientRect();
                        const x = e.clientX - rect.left + 10;
                        const y = e.clientY - rect.top + 10;
                        tooltip.style.left = x + 'px';
                        tooltip.style.top = y + 'px';
                    });

                    circle.addEventListener('mouseleave', function() {
                        tooltip.style.display = 'none';
                    });

                    svg.appendChild(circle);
                });
            })
            .catch(error => {
                console.error('Error loading countries:', error);
                document.getElementById('map-container').innerHTML = '<p style="text-align: center; padding: 2rem;">Unable to load map data. Please try again later.</p>';
            });
    });
    </script>