@extends('layouts.app')

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="animate-up">
        <span class="page-hero-eyebrow">{{ __('Présence Mondiale') }}</span>
        <h1 class="page-hero-title">{{ __('Carte des Pays Éligibles (PMA)') }}</h1>
        <p class="page-hero-subtitle">
            {{ __('Climate Catalyst Prize concentre ses financements et son assistance technique sur les Pays les Moins Avancés (PMA) et les zones les plus vulnérables au changement climatique.') }}
        </p>
    </div>
</section>

{{-- BREADCRUMB --}}
<div class="breadcrumb">
    <a href="{{ route('home', ['locale' => $locale]) }}">{{ __('Accueil') }}</a>
    <span class="breadcrumb-sep">/</span>
    <span>{{ __('Carte des PMA') }}</span>
</div>

<section class="section-py" style="background: #F6F8FA;">
    <div class="container-ccp">
        
        <div style="background: #FFFFFF; border-radius: 16px; border: 1px solid #E0E6ED; padding: 2rem; box-shadow: 0 16px 40px rgba(8,28,58,0.06); margin-bottom: 4rem;">
            
            {{-- Map Header & Legend --}}
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <h2 style="font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: #081C3A; font-weight: 700; margin: 0 0 0.25rem 0;">
                        {{ __('Carte Interactive des Pays Éligibles') }}
                    </h2>
                    <p style="font-family: 'Inter', sans-serif; font-size: 0.88rem; color: #5E7590; margin: 0;">
                        Cliquez sur un pays pour consulter son statut d'éligibilité et ses projets.
                    </p>
                </div>

                <div style="display: flex; align-items: center; gap: 1.25rem; flex-wrap: wrap;">
                    <div style="display: flex; align-items: center; gap: 0.5rem; font-family: 'Inter', sans-serif; font-size: 0.82rem; font-weight: 600; color: #081C3A;">
                        <span style="width: 12px; height: 12px; border-radius: 50%; background: #C8A04D; display: inline-block; box-shadow: 0 0 0 3px rgba(200, 160, 77, 0.25);"></span>
                        {{ __('Présence Active CCP') }}
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; font-family: 'Inter', sans-serif; font-size: 0.82rem; font-weight: 600; color: #5E7590;">
                        <span style="width: 12px; height: 12px; border-radius: 50%; background: #1E3A5F; display: inline-block;"></span>
                        {{ __('Autres PMA Éligibles') }}
                    </div>
                </div>
            </div>

            {{-- Controls & Search Bar --}}
            <div style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center; justify-content: space-between; margin-bottom: 1.25rem; background: #F8FAFC; padding: 0.85rem 1rem; border-radius: 10px; border: 1px solid #E2E8F0;">
                <div style="position: relative; flex: 1; min-width: 260px;">
                    <svg width="18" height="18" fill="none" stroke="#8FA0B4" viewBox="0 0 24 24" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" id="mapSearchInput" placeholder="Rechercher un pays (ex: Sénégal, Bénin, Haïti)..." class="form-input" style="padding-left: 2.4rem; height: 42px; font-size: 0.9rem;">
                </div>

                <div style="display: flex; flex-wrap: wrap; gap: 0.4rem;" id="mapRegionFilters">
                    <button type="button" class="map-filter-btn active" onclick="filterMapRegion('all')">Tous</button>
                    <button type="button" class="map-filter-btn" onclick="filterMapRegion('Afrique')">Afrique</button>
                    <button type="button" class="map-filter-btn" onclick="filterMapRegion('Asie & Pacifique')">Asie & Pacifique</button>
                    <button type="button" class="map-filter-btn" onclick="filterMapRegion('Amériques')">Amériques</button>
                    <button type="button" class="map-filter-btn" onclick="filterMapRegion('Moyen-Orient')">Moyen-Orient</button>
                </div>
            </div>

            {{-- MAP CANVAS & DIRECTORY SIDEBAR --}}
            <div style="display: grid; grid-template-columns: 2.5fr 1fr; gap: 1.5rem; align-items: stretch;" class="map-layout-wrapper">
                {{-- Leaflet Canvas --}}
                <div style="position: relative; border-radius: 12px; overflow: hidden; border: 1px solid #CBD5E1; box-shadow: 0 4px 16px rgba(8,28,58,0.08);">
                    <div id="leaflet-map" style="width: 100%; height: 580px; background: #0A192F;"></div>
                </div>

                {{-- Country Quick List --}}
                <div style="background: #FAFBFC; border: 1px solid #E2E8F0; border-radius: 12px; padding: 1.25rem; display: flex; flex-direction: column;">
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 0.9rem; font-weight: 700; color: #081C3A; margin: 0 0 0.85rem 0; display: flex; align-items: center; justify-content: space-between;">
                        <span>Répertoire des Pays</span>
                        <span id="country-counter-badge" style="background: #C8A04D; color: #081C3A; padding: 0.15rem 0.5rem; border-radius: 99px; font-size: 0.75rem; font-weight: 800;">0</span>
                    </h4>

                    <div id="map-countries-list" style="overflow-y: auto; max-height: 500px; padding-right: 0.25rem; display: flex; flex-direction: column; gap: 0.5rem;">
                        {{-- JS Rendered --}}
                    </div>
                </div>
            </div>

        </div>

        {{-- REGIONAL BREAKDOWN CARDS --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            
            <div style="background: #FFFFFF; padding: 2rem; border-radius: 12px; border: 1px solid #E0E6ED; box-shadow: 0 4px 12px rgba(8,28,58,0.03);">
                <div style="width: 48px; height: 48px; border-radius: 8px; background: rgba(200,160,77,0.1); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h4 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; color: #081C3A; margin-bottom: 0.75rem;">{{ __('Afrique Sub-saharienne') }}</h4>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590; line-height: 1.6; margin-bottom: 1rem;">
                    {{ __('L\'Afrique abrite 33 des 46 PMA du monde. Notre portefeuille y concentre la majorité de nos projets en micro-réseaux solaires et agriculture résiliente.') }}
                </p>
                <div style="font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 600; color: #C8A04D;">{{ __('33 Pays Éligibles') }}</div>
            </div>
            
            <div style="background: #FFFFFF; padding: 2rem; border-radius: 12px; border: 1px solid #E0E6ED; box-shadow: 0 4px 12px rgba(8,28,58,0.03);">
                <div style="width: 48px; height: 48px; border-radius: 8px; background: rgba(200,160,77,0.1); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h4 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; color: #081C3A; margin-bottom: 0.75rem;">{{ __('Asie & Pacifique') }}</h4>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590; line-height: 1.6; margin-bottom: 1rem;">
                    {{ __('Comprend 12 PMA incluant des petits États insulaires vulnérables. Nos interventions ciblent la résilience côtière et l\'alerte précoce.') }}
                </p>
                <div style="font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 600; color: #C8A04D;">{{ __('12 Pays Éligibles') }}</div>
            </div>
            
            <div style="background: #FFFFFF; padding: 2rem; border-radius: 12px; border: 1px solid #E0E6ED; box-shadow: 0 4px 12px rgba(8,28,58,0.03);">
                <div style="width: 48px; height: 48px; border-radius: 8px; background: rgba(200,160,77,0.1); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h4 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; color: #081C3A; margin-bottom: 0.75rem;">{{ __('Amériques & Caraïbes') }}</h4>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590; line-height: 1.6; margin-bottom: 1rem;">
                    {{ __('Haïti est actuellement le seul PMA de la région des Amériques. Nous y soutenons les infrastructures résilientes et la réduction des risques.') }}
                </p>
                <div style="font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 600; color: #C8A04D;">{{ __('1 Pays Éligible') }}</div>
            </div>
            
        </div>
        
    </div>
</section>

@endsection

@push('head')
{{-- Leaflet CSS --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
.map-filter-btn {
    padding: 0.35rem 0.75rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.78rem;
    font-weight: 500;
    border: 1px solid #CBD5E1;
    background: #FFFFFF;
    color: #475569;
    border-radius: 20px;
    cursor: pointer;
    transition: all 0.2s ease;
}
.map-filter-btn.active, .map-filter-btn:hover {
    background: #081C3A;
    color: #FFFFFF;
    border-color: #081C3A;
    font-weight: 700;
}
.map-country-item {
    background: #FFFFFF;
    border: 1px solid #E2E8F0;
    border-radius: 8px;
    padding: 0.65rem 0.85rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    transition: all 0.2s ease;
}
.map-country-item:hover {
    border-color: #C8A04D;
    background: #FFFDF8;
    transform: translateX(2px);
}
.map-country-item.active-pulse {
    border-left: 3px solid #C8A04D;
}
.leaflet-popup-content-wrapper {
    background: #081C3A;
    color: #FFFFFF;
    border-radius: 10px;
    padding: 4px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}
.leaflet-popup-tip {
    background: #081C3A;
}
.custom-map-popup {
    font-family: 'Inter', sans-serif;
    padding: 0.5rem;
}
.custom-map-popup h4 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.35rem;
    color: #FFFFFF;
    margin: 0 0 0.2rem 0;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}
.custom-map-popup .popup-badge {
    display: inline-block;
    padding: 0.15rem 0.5rem;
    border-radius: 4px;
    font-size: 0.7rem;
    font-weight: 700;
    background: #C8A04D;
    color: #081C3A;
}
@media (max-width: 900px) {
    .map-layout-wrapper {
        grid-template-columns: 1fr !important;
    }
    #leaflet-map {
        height: 420px !important;
    }
}
</style>
@endpush

@push('scripts')
{{-- Leaflet JS --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
// Active countries passed from backend database
const DB_COUNTRIES = @json($countries ?? []);

// Database of Geographic Coordinates & Details for LDC & Global countries
const COUNTRY_COORDS = {
    "SEN": { lat: 14.4974, lng: -14.4524, iso2: "SN", name: "Sénégal", region: "Afrique", ldc: true },
    "CIV": { lat: 7.54, lng: -5.5471, iso2: "CI", name: "Côte d'Ivoire", region: "Afrique", ldc: false },
    "BEN": { lat: 9.3077, lng: 2.3158, iso2: "BJ", name: "Bénin", region: "Afrique", ldc: true },
    "BFA": { lat: 12.2383, lng: -1.5616, iso2: "BF", name: "Burkina Faso", region: "Afrique", ldc: true },
    "BDI": { lat: -3.3731, lng: 29.9189, iso2: "BI", name: "Burundi", region: "Afrique", ldc: true },
    "CMR": { lat: 7.3697, lng: 12.3547, iso2: "CM", name: "Cameroun", region: "Afrique", ldc: false },
    "CPV": { lat: 16.002, lng: -24.0131, iso2: "CV", name: "Cap-Vert", region: "Afrique", ldc: false },
    "CAF": { lat: 6.6111, lng: 20.9394, iso2: "CF", name: "Rép. Centrafricaine", region: "Afrique", ldc: true },
    "TCD": { lat: 15.4542, lng: 18.7322, iso2: "TD", name: "Tchad", region: "Afrique", ldc: true },
    "COM": { lat: -11.875, lng: 43.8722, iso2: "KM", name: "Comores", region: "Afrique", ldc: true },
    "COD": { lat: -4.0383, lng: 21.7587, iso2: "CD", name: "Rép. Dém. du Congo", region: "Afrique", ldc: true },
    "COG": { lat: -0.228, lng: 15.8277, iso2: "CG", name: "République du Congo", region: "Afrique", ldc: false },
    "DJI": { lat: 11.8251, lng: 42.5903, iso2: "DJ", name: "Djibouti", region: "Afrique", ldc: true },
    "EGY": { lat: 26.8206, lng: 30.8025, iso2: "EG", name: "Égypte", region: "Afrique", ldc: false },
    "ERI": { lat: 15.1794, lng: 39.7823, iso2: "ER", name: "Érythrée", region: "Afrique", ldc: true },
    "ETH": { lat: 9.145, lng: 40.4897, iso2: "ET", name: "Éthiopie", region: "Afrique", ldc: true },
    "GAB": { lat: -0.8037, lng: 11.6094, iso2: "GA", name: "Gabon", region: "Afrique", ldc: false },
    "GMB": { lat: 13.4432, lng: -15.3101, iso2: "GM", name: "Gambie", region: "Afrique", ldc: true },
    "GHA": { lat: 7.9465, lng: -1.0232, iso2: "GH", name: "Ghana", region: "Afrique", ldc: false },
    "GIN": { lat: 9.9456, lng: -9.6966, iso2: "GN", name: "Guinée", region: "Afrique", ldc: true },
    "GNB": { lat: 11.8037, lng: -15.1804, iso2: "GW", name: "Guinée-Bissau", region: "Afrique", ldc: true },
    "KEN": { lat: -0.0236, lng: 37.9062, iso2: "KE", name: "Kenya", region: "Afrique", ldc: false },
    "LSO": { lat: -29.6099, lng: 28.2336, iso2: "LS", name: "Lesotho", region: "Afrique", ldc: true },
    "LBR": { lat: 6.4281, lng: -9.4295, iso2: "LR", name: "Libéria", region: "Afrique", ldc: true },
    "MDG": { lat: -18.7669, lng: 46.8691, iso2: "MG", name: "Madagascar", region: "Afrique", ldc: true },
    "MWI": { lat: -13.2543, lng: 34.3015, iso2: "MW", name: "Malawi", region: "Afrique", ldc: true },
    "MLI": { lat: 17.5707, lng: -3.9962, iso2: "ML", name: "Mali", region: "Afrique", ldc: true },
    "MRT": { lat: 21.0079, lng: -10.9408, iso2: "MR", name: "Mauritanie", region: "Afrique", ldc: true },
    "MUS": { lat: -20.3484, lng: 57.5522, iso2: "MU", name: "Maurice", region: "Afrique", ldc: false },
    "MAR": { lat: 31.7917, lng: -7.0926, iso2: "MA", name: "Maroc", region: "Afrique", ldc: false },
    "MOZ": { lat: -18.6657, lng: 35.5296, iso2: "MZ", name: "Mozambique", region: "Afrique", ldc: true },
    "NER": { lat: 17.6078, lng: 8.0817, iso2: "NE", name: "Niger", region: "Afrique", ldc: true },
    "NGA": { lat: 9.082, lng: 8.6753, iso2: "NG", name: "Nigéria", region: "Afrique", ldc: false },
    "RWA": { lat: -1.9403, lng: 29.8739, iso2: "RW", name: "Rwanda", region: "Afrique", ldc: true },
    "STP": { lat: 0.1864, lng: 6.6131, iso2: "ST", name: "Sao Tomé-et-Principe", region: "Afrique", ldc: true },
    "SLE": { lat: 8.4606, lng: -11.7799, iso2: "SL", name: "Sierra Leone", region: "Afrique", ldc: true },
    "SOM": { lat: 5.1521, lng: 46.1996, iso2: "SO", name: "Somalie", region: "Afrique", ldc: true },
    "ZAF": { lat: -30.5595, lng: 22.9375, iso2: "ZA", name: "Afrique du Sud", region: "Afrique", ldc: false },
    "SSD": { lat: 6.877, lng: 31.307, iso2: "SS", name: "Soudan du Sud", region: "Afrique", ldc: true },
    "SDN": { lat: 12.8628, lng: 30.2176, iso2: "SD", name: "Soudan", region: "Afrique", ldc: true },
    "TZA": { lat: -6.369, lng: 34.8888, iso2: "TZ", name: "Tanzanie", region: "Afrique", ldc: true },
    "TGO": { lat: 8.6195, lng: 0.8248, iso2: "TG", name: "Togo", region: "Afrique", ldc: true },
    "TUN": { lat: 33.8869, lng: 9.5375, iso2: "TN", name: "Tunisie", region: "Afrique", ldc: false },
    "UGA": { lat: 1.3733, lng: 32.2903, iso2: "UG", name: "Ouganda", region: "Afrique", ldc: true },
    "ZMB": { lat: -13.1339, lng: 27.8493, iso2: "ZM", name: "Zambie", region: "Afrique", ldc: true },
    "ZWE": { lat: -19.0154, lng: 29.1549, iso2: "ZW", name: "Zimbabwe", region: "Afrique", ldc: false },
    "AFG": { lat: 33.9391, lng: 67.71, iso2: "AF", name: "Afghanistan", region: "Asie & Pacifique", ldc: true },
    "BGD": { lat: 23.685, lng: 90.3563, iso2: "BD", name: "Bangladesh", region: "Asie & Pacifique", ldc: true },
    "BTN": { lat: 27.5142, lng: 90.4336, iso2: "BT", name: "Bhoutan", region: "Asie & Pacifique", ldc: true },
    "KHM": { lat: 12.5657, lng: 104.991, iso2: "KH", name: "Cambodge", region: "Asie & Pacifique", ldc: true },
    "IND": { lat: 20.5937, lng: 78.9629, iso2: "IN", name: "Inde", region: "Asie & Pacifique", ldc: false },
    "IDN": { lat: -0.7893, lng: 113.9213, iso2: "ID", name: "Indonésie", region: "Asie & Pacifique", ldc: false },
    "LAO": { lat: 19.8563, lng: 102.4955, iso2: "LA", name: "Laos", region: "Asie & Pacifique", ldc: true },
    "NPL": { lat: 28.3949, lng: 84.124, iso2: "NP", name: "Népal", region: "Asie & Pacifique", ldc: true },
    "SLB": { lat: -9.6457, lng: 160.1562, iso2: "SB", name: "Îles Salomon", region: "Asie & Pacifique", ldc: true },
    "TLS": { lat: -8.8742, lng: 125.7275, iso2: "TL", name: "Timor-Leste", region: "Asie & Pacifique", ldc: true },
    "HTI": { lat: 18.9712, lng: -72.2852, iso2: "HT", name: "Haïti", region: "Amériques", ldc: true },
    "YEM": { lat: 15.5527, lng: 48.5164, iso2: "YE", name: "Yémen", region: "Moyen-Orient", ldc: true }
};

function getFlag(iso2) {
    if (!iso2 || iso2.length !== 2) return '🌐';
    const points = iso2.toUpperCase().split('').map(c => 127397 + c.charCodeAt(0));
    return String.fromCodePoint(...points);
}

let map, markersGroup = [];
let activeMapRegion = 'all';

document.addEventListener('DOMContentLoaded', function() {
    // Initialize Leaflet Map centered on Africa/Atlantic view
    map = L.map('leaflet-map', {
        center: [9.0, 18.0],
        zoom: 3,
        minZoom: 2,
        maxZoom: 10,
        zoomControl: true
    });

    // Dark Map Tiles
    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 19
    }).addTo(map);

    renderMapData();

    document.getElementById('mapSearchInput').addEventListener('input', function() {
        renderMapData();
    });
});

function renderMapData() {
    // Clear existing markers
    markersGroup.forEach(m => map.removeLayer(m));
    markersGroup = [];

    const searchQuery = document.getElementById('mapSearchInput').value.toLowerCase().trim();
    const listContainer = document.getElementById('map-countries-list');
    listContainer.innerHTML = '';

    // Build consolidated list merging DB active countries and standard coordinates
    const countryMap = new Map();

    // 1. Add DB active countries
    DB_COUNTRIES.forEach(c => {
        const iso = (c.iso_code || '').toUpperCase();
        const coordInfo = COUNTRY_COORDS[iso] || { lat: 0, lng: 0, iso2: 'UN' };
        countryMap.set(iso, {
            iso: iso,
            name: c.name,
            region: c.region || coordInfo.region || 'Global',
            display_color: c.display_color || '#C8A04D',
            tooltip_text: c.tooltip_text || c.description || 'Pays éligible au financement climat CCP.',
            description: c.description,
            active: true,
            lat: coordInfo.lat,
            lng: coordInfo.lng,
            iso2: coordInfo.iso2
        });
    });

    // 2. Add other default LDC countries if not already in DB
    Object.keys(COUNTRY_COORDS).forEach(iso => {
        if (!countryMap.has(iso)) {
            const coordInfo = COUNTRY_COORDS[iso];
            countryMap.set(iso, {
                iso: iso,
                name: coordInfo.name,
                region: coordInfo.region,
                display_color: '#1E3A5F',
                tooltip_text: 'Pays PMA éligible.',
                active: false,
                lat: coordInfo.lat,
                lng: coordInfo.lng,
                iso2: coordInfo.iso2
            });
        }
    });

    const allItems = Array.from(countryMap.values());
    
    // Filter
    const filteredItems = allItems.filter(item => {
        const matchesSearch = item.name.toLowerCase().includes(searchQuery) || item.iso.toLowerCase().includes(searchQuery);
        const matchesRegion = (activeMapRegion === 'all') || (item.region === activeMapRegion);
        return matchesSearch && matchesRegion;
    });

    document.getElementById('country-counter-badge').innerText = filteredItems.length;

    filteredItems.forEach(item => {
        const flag = getFlag(item.iso2);

        // Add Marker to Leaflet if valid coordinates
        if (item.lat !== 0 || item.lng !== 0) {
            const markerColor = item.active ? (item.display_color || '#C8A04D') : '#1E3A5F';
            const markerRadius = item.active ? 9 : 6;

            const circleMarker = L.circleMarker([item.lat, item.lng], {
                radius: markerRadius,
                fillColor: markerColor,
                color: item.active ? '#FFFFFF' : '#2A4E7C',
                weight: item.active ? 2 : 1,
                opacity: 0.9,
                fillOpacity: 0.85
            }).addTo(map);

            const popupHtml = `
                <div class="custom-map-popup">
                    <h4><span>${flag}</span> ${item.name}</h4>
                    <div style="margin-bottom: 0.4rem;">
                        <span class="popup-badge" style="background: ${item.active ? '#C8A04D' : '#1E3A5F'}; color: #FFFFFF;">
                            ${item.active ? 'Éligible / Présence Active' : 'PMA Éligible'}
                        </span>
                        <span style="font-size: 0.72rem; color: #CBD5E1; margin-left: 0.3rem;">${item.iso} • ${item.region}</span>
                    </div>
                    <p style="font-size: 0.82rem; color: #E2E8F0; margin: 0; line-height: 1.4;">
                        ${item.tooltip_text}
                    </p>
                </div>
            `;

            circleMarker.bindPopup(popupHtml);
            markersGroup.push(circleMarker);

            item._marker = circleMarker;
        }

        // Render Item in List Panel
        const div = document.createElement('div');
        div.className = `map-country-item ${item.active ? 'active-pulse' : ''}`;
        div.innerHTML = `
            <div style="display: flex; align-items: center; gap: 0.55rem; overflow: hidden;">
                <span style="font-size: 1.2rem;">${flag}</span>
                <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    <div style="font-weight: 600; font-size: 0.82rem; color: #081C3A; text-overflow: ellipsis; overflow: hidden;">${item.name}</div>
                    <div style="font-size: 0.72rem; color: #5E7590;">${item.iso} • ${item.region}</div>
                </div>
            </div>
            <div>
                <span style="font-size: 0.68rem; font-weight: 700; padding: 0.15rem 0.4rem; border-radius: 4px; background: ${item.active ? '#ECFDF5' : '#EEF1F5'}; color: ${item.active ? '#059669' : '#5E7590'};">
                    ${item.active ? 'Actif' : 'PMA'}
                </span>
            </div>
        `;

        div.addEventListener('click', function() {
            if (item._marker) {
                map.flyTo([item.lat, item.lng], 5, { duration: 1.2 });
                item._marker.openPopup();
            }
        });

        listContainer.appendChild(div);
    });
}

function filterMapRegion(region) {
    activeMapRegion = region;
    document.querySelectorAll('.map-filter-btn').forEach(btn => {
        if (btn.innerText.includes(region) || (region === 'all' && btn.innerText === 'Tous')) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });
    renderMapData();
}
</script>
@endpush