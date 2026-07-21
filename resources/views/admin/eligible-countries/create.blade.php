@extends('layouts.admin')

@section('title', __('Ajouter des Pays Éligibles'))

@section('content')

<div style="max-width: 1080px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
        <a href="{{ route('admin.eligible-countries.index') }}" class="btn btn-outline-navy btn-sm" style="display: inline-flex; align-items: center; gap: 0.4rem;">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            {{ __('Retour à la liste') }}
        </a>

        <div style="display: flex; gap: 0.5rem; background: #EEF1F5; padding: 4px; border-radius: 8px;">
            <button type="button" id="tab-quick-btn" onclick="switchMode('quick')" class="mode-tab-btn active">
                ⚡ Sélection Rapide (Multi-pays)
            </button>
            <button type="button" id="tab-custom-btn" onclick="switchMode('custom')" class="mode-tab-btn">
                ✍️ Formulaire Personnalisé
            </button>
        </div>
    </div>

    {{-- MODE 1: SELECTION RAPIDE MULTI-PAYS --}}
    <div id="mode-quick-container" style="background: #FFFFFF; border: 1px solid #E0E6ED; border-radius: 12px; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 4px 12px rgba(8, 28, 58, 0.03);">
        <div style="margin-bottom: 1.5rem;">
            <h2 style="font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; color: #081C3A; margin: 0 0 0.5rem 0;">
                Sélectionnez les pays dans le répertoire mondial
            </h2>
            <p style="font-family: 'Inter', sans-serif; font-size: 0.88rem; color: #5E7590; margin: 0;">
                Cochez simplement un ou plusieurs pays ci-dessous pour les rendre éligibles instantanément. Les pays déjà éligibles sont identifiés par un badge.
            </p>
        </div>

        {{-- Barre de recherche et filtres par région --}}
        <div style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; background: #F8FAFC; padding: 1rem; border-radius: 10px; border: 1px solid #E2E8F0;">
            <div style="position: relative; flex: 1; min-width: 260px;">
                <svg width="18" height="18" fill="none" stroke="#8FA0B4" viewBox="0 0 24 24" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%);">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" id="countrySearch" onkeyup="filterCountries()" placeholder="Rechercher un pays, code ISO (ex: SEN, Sénégal)..." class="form-input" style="padding-left: 2.4rem; height: 42px; font-size: 0.9rem;">
            </div>

            <div style="display: flex; flex-wrap: wrap; gap: 0.4rem;" id="regionFilters">
                <button type="button" onclick="setRegionFilter('all')" class="region-filter-btn active" data-region="all">Tous</button>
                <button type="button" onclick="setRegionFilter('ldc')" class="region-filter-btn" data-region="ldc">PMA (LDC)</button>
                <button type="button" onclick="setRegionFilter('Afrique')" class="region-filter-btn" data-region="Afrique">Afrique</button>
                <button type="button" onclick="setRegionFilter('Asie & Pacifique')" class="region-filter-btn" data-region="Asie & Pacifique">Asie & Pacifique</button>
                <button type="button" onclick="setRegionFilter('Amériques')" class="region-filter-btn" data-region="Amériques">Amériques</button>
                <button type="button" onclick="setRegionFilter('Europe')" class="region-filter-btn" data-region="Europe">Europe</button>
            </div>
        </div>

        {{-- Formulaire de soumission groupée --}}
        <form method="POST" action="{{ route('admin.eligible-countries.store') }}" id="bulk-form">
            @csrf

            {{-- Floating selection counter & action bar --}}
            <div style="display: flex; align-items: center; justify-content: space-between; background: #081C3A; color: #FFFFFF; padding: 0.85rem 1.25rem; border-radius: 8px; margin-bottom: 1.25rem;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-family: 'Inter', sans-serif; font-size: 0.9rem; font-weight: 600;">
                        <span id="selected-count" style="color: #C8A04D; font-size: 1.1rem; font-weight: 800;">0</span> pays sélectionné(s)
                    </span>
                    <button type="button" onclick="toggleSelectAll()" style="background: rgba(255,255,255,0.15); border: none; color: #FFF; padding: 0.3rem 0.75rem; border-radius: 4px; font-size: 0.78rem; cursor: pointer; transition: 0.2s;">
                        Tout sélectionner / Dessélectionner
                    </button>
                </div>

                <button type="submit" id="btn-submit-bulk" disabled class="btn btn-gold" style="padding: 0.5rem 1.25rem; font-size: 0.88rem; opacity: 0.5; cursor: not-allowed;">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Ajouter les pays sélectionnés
                </button>
            </div>

            {{-- Grille moderne des pays --}}
            <div id="countries-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 0.85rem; max-height: 520px; overflow-y: auto; padding-right: 0.4rem;">
                {{-- Dynamic list rendered via JavaScript --}}
            </div>
        </form>
    </div>

    {{-- MODE 2: FORMULAIRE DE PERSONNALISATION SIMPLE --}}
    <div id="mode-custom-container" style="background: #FFFFFF; border: 1px solid #E0E6ED; border-radius: 12px; padding: 2.5rem; display: none;">
        <h2 style="font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; color: #081C3A; margin: 0 0 0.5rem 0;">
            Ajouter un pays sur-mesure
        </h2>
        <p style="font-family: 'Inter', sans-serif; font-size: 0.85rem; color: #5E7590; margin-bottom: 2rem;">
            Remplissez ou ajustez les détails ci-dessous pour configurer un pays éligible individuel.
        </p>

        <form method="POST" action="{{ route('admin.eligible-countries.store') }}" id="single-form">
            @csrf

            <div class="form-grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" for="name">{{ __('Nom du pays') }} <span style="color:#C8A04D;">*</span></label>
                    <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" placeholder="ex: Sénégal" required>
                    @error('name')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" for="iso_code">{{ __('Code ISO (3 lettres)') }} <span style="color:#C8A04D;">*</span></label>
                    <input type="text" id="iso_code" name="iso_code" class="form-input" value="{{ old('iso_code') }}" maxlength="3" pattern="[A-Za-z]{3}" placeholder="ex: SEN" required style="text-transform: uppercase;">
                    @error('iso_code')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-grid-3" style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" for="region">{{ __('Région / Continent') }}</label>
                    <input type="text" id="region" name="region" class="form-input" value="{{ old('region') }}" placeholder="ex: Afrique">
                    @error('region')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" for="display_color">{{ __('Couleur de carte') }}</label>
                    <input type="color" id="display_color" name="display_color" class="form-input" value="{{ old('display_color', '#087F5B') }}" style="height: 42px; padding: 2px;">
                    @error('display_color')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" for="sort_order">{{ __('Ordre d\'affichage') }}</label>
                    <input type="number" id="sort_order" name="sort_order" class="form-input" value="{{ old('sort_order', 0) }}">
                    @error('sort_order')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="is_active">{{ __('Statut d\'éligibilité') }}</label>
                <select id="is_active" name="is_active" class="form-select">
                    <option value="1" {{ old('is_active', true) ? 'selected' : '' }}>{{ __('Actif (Éligible)') }}</option>
                    <option value="0" {{ old('is_active', true) ? '' : 'selected' }}>{{ __('Inactif') }}</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="description">{{ __('Description / Contexte d\'éligibilité') }}</label>
                <textarea id="description" name="description" class="form-textarea" rows="3" placeholder="Informations complémentaires sur l'éligibilité de ce pays...">{{ old('description') }}</textarea>
                @error('description')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="tooltip_text">{{ __('Texte d\'infobulle (sur la carte interactif)') }}</label>
                <textarea id="tooltip_text" name="tooltip_text" class="form-textarea" rows="2" placeholder="Texte affiché au survol sur la carte interactive...">{{ old('tooltip_text') }}</textarea>
                @error('tooltip_text')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                <button type="submit" class="btn btn-gold">{{ __('Enregistrer ce pays') }}</button>
                <a href="{{ route('admin.eligible-countries.index') }}" class="btn btn-outline-navy">{{ __('Annuler') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection

@push('head')
<style>
.mode-tab-btn {
    padding: 0.5rem 1rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.85rem;
    font-weight: 600;
    border: none;
    background: transparent;
    color: #5E7590;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
}
.mode-tab-btn.active {
    background: #081C3A;
    color: #FFFFFF;
    box-shadow: 0 2px 4px rgba(0,0,0,0.08);
}
.region-filter-btn {
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
.region-filter-btn.active, .region-filter-btn:hover {
    background: #C8A04D;
    color: #081C3A;
    border-color: #C8A04D;
    font-weight: 700;
}
.country-card {
    background: #FFFFFF;
    border: 1px solid #E2E8F0;
    border-radius: 8px;
    padding: 0.75rem 0.9rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    transition: all 0.2s ease;
    user-select: none;
}
.country-card:hover {
    border-color: #C8A04D;
    box-shadow: 0 2px 8px rgba(200, 160, 77, 0.15);
}
.country-card.selected {
    border-color: #087F5B;
    background: #F0FDF4;
}
.country-card.disabled {
    opacity: 0.65;
    background: #F8FAFC;
    cursor: not-allowed;
    border-color: #E2E8F0 !important;
}
.flag-icon {
    font-size: 1.35rem;
    line-height: 1;
    margin-right: 0.5rem;
}
</style>
@endpush

@push('scripts')
<script>
// Existing ISO codes registered in DB
const EXISTING_ISO_CODES = new Set(@json($existingIsoCodes));

// Database of standard World Countries focusing on LDCs and continents
const WORLD_COUNTRIES = [
    // LDC & African Countries
    { name: "Sénégal", iso: "SEN", iso2: "SN", region: "Afrique", ldc: true },
    { name: "Côte d'Ivoire", iso: "CIV", iso2: "CI", region: "Afrique", ldc: false },
    { name: "Bénin", iso: "BEN", iso2: "BJ", region: "Afrique", ldc: true },
    { name: "Burkina Faso", iso: "BFA", iso2: "BF", region: "Afrique", ldc: true },
    { name: "Burundi", iso: "BDI", iso2: "BI", region: "Afrique", ldc: true },
    { name: "Cameroun", iso: "CMR", iso2: "CM", region: "Afrique", ldc: false },
    { name: "Cap-Vert", iso: "CPV", iso2: "CV", region: "Afrique", ldc: false },
    { name: "République Centrafricaine", iso: "CAF", iso2: "CF", region: "Afrique", ldc: true },
    { name: "Tchad", iso: "TCD", iso2: "TD", region: "Afrique", ldc: true },
    { name: "Comores", iso: "COM", iso2: "KM", region: "Afrique", ldc: true },
    { name: "Rép. Démocratique du Congo", iso: "COD", iso2: "CD", region: "Afrique", ldc: true },
    { name: "République du Congo", iso: "COG", iso2: "CG", region: "Afrique", ldc: false },
    { name: "Djibouti", iso: "DJI", iso2: "DJ", region: "Afrique", ldc: true },
    { name: "Égypte", iso: "EGY", iso2: "EG", region: "Afrique", ldc: false },
    { name: "Guinée Équatoriale", iso: "GNQ", iso2: "GQ", region: "Afrique", ldc: false },
    { name: "Érythrée", iso: "ERI", iso2: "ER", region: "Afrique", ldc: true },
    { name: "Éthiopie", iso: "ETH", iso2: "ET", region: "Afrique", ldc: true },
    { name: "Gabon", iso: "GAB", iso2: "GA", region: "Afrique", ldc: false },
    { name: "Gambie", iso: "GMB", iso2: "GM", region: "Afrique", ldc: true },
    { name: "Ghana", iso: "GHA", iso2: "GH", region: "Afrique", ldc: false },
    { name: "Guinée", iso: "GIN", iso2: "GN", region: "Afrique", ldc: true },
    { name: "Guinée-Bissau", iso: "GNB", iso2: "GW", region: "Afrique", ldc: true },
    { name: "Kenya", iso: "KEN", iso2: "KE", region: "Afrique", ldc: false },
    { name: "Lesotho", iso: "LSO", iso2: "LS", region: "Afrique", ldc: true },
    { name: "Libéria", iso: "LBR", iso2: "LR", region: "Afrique", ldc: true },
    { name: "Madagascar", iso: "MDG", iso2: "MG", region: "Afrique", ldc: true },
    { name: "Malawi", iso: "MWI", iso2: "MW", region: "Afrique", ldc: true },
    { name: "Mali", iso: "MLI", iso2: "ML", region: "Afrique", ldc: true },
    { name: "Mauritanie", iso: "MRT", iso2: "MR", region: "Afrique", ldc: true },
    { name: "Maurice", iso: "MUS", iso2: "MU", region: "Afrique", ldc: false },
    { name: "Maroc", iso: "MAR", iso2: "MA", region: "Afrique", ldc: false },
    { name: "Mozambique", iso: "MOZ", iso2: "MZ", region: "Afrique", ldc: true },
    { name: "Namibie", iso: "NAM", iso2: "NA", region: "Afrique", ldc: false },
    { name: "Niger", iso: "NER", iso2: "NE", region: "Afrique", ldc: true },
    { name: "Nigéria", iso: "NGA", iso2: "NG", region: "Afrique", ldc: false },
    { name: "Rwanda", iso: "RWA", iso2: "RW", region: "Afrique", ldc: true },
    { name: "Sao Tomé-et-Principe", iso: "STP", iso2: "ST", region: "Afrique", ldc: true },
    { name: "Seychelles", iso: "SYC", iso2: "SC", region: "Afrique", ldc: false },
    { name: "Sierra Leone", iso: "SLE", iso2: "SL", region: "Afrique", ldc: true },
    { name: "Somalie", iso: "SOM", iso2: "SO", region: "Afrique", ldc: true },
    { name: "Afrique du Sud", iso: "ZAF", iso2: "ZA", region: "Afrique", ldc: false },
    { name: "Soudan du Sud", iso: "SSD", iso2: "SS", region: "Afrique", ldc: true },
    { name: "Soudan", iso: "SDN", iso2: "SD", region: "Afrique", ldc: true },
    { name: "Tanzanie", iso: "TZA", iso2: "TZ", region: "Afrique", ldc: true },
    { name: "Togo", iso: "TGO", iso2: "TG", region: "Afrique", ldc: true },
    { name: "Tunisie", iso: "TUN", iso2: "TN", region: "Afrique", ldc: false },
    { name: "Ouganda", iso: "UGA", iso2: "UG", region: "Afrique", ldc: true },
    { name: "Zambie", iso: "ZMB", iso2: "ZM", region: "Afrique", ldc: true },
    { name: "Zimbabwe", iso: "ZWE", iso2: "ZW", region: "Afrique", ldc: false },
    
    // Asia & Pacific LDC & Global
    { name: "Afghanistan", iso: "AFG", iso2: "AF", region: "Asie & Pacifique", ldc: true },
    { name: "Bangladesh", iso: "BGD", iso2: "BD", region: "Asie & Pacifique", ldc: true },
    { name: "Bhoutan", iso: "BTN", iso2: "BT", region: "Asie & Pacifique", ldc: true },
    { name: "Cambodge", iso: "KHM", iso2: "KH", region: "Asie & Pacifique", ldc: true },
    { name: "Inde", iso: "IND", iso2: "IN", region: "Asie & Pacifique", ldc: false },
    { name: "Indonésie", iso: "IDN", iso2: "ID", region: "Asie & Pacifique", ldc: false },
    { name: "Japon", iso: "JPN", iso2: "JP", region: "Asie & Pacifique", ldc: false },
    { name: "Kiribati", iso: "KIR", iso2: "KI", region: "Asie & Pacifique", ldc: true },
    { name: "Laos", iso: "LAO", iso2: "LA", region: "Asie & Pacifique", ldc: true },
    { name: "Malaisie", iso: "MYS", iso2: "MY", region: "Asie & Pacifique", ldc: false },
    { name: "Népal", iso: "NPL", iso2: "NP", region: "Asie & Pacifique", ldc: true },
    { name: "Pakistan", iso: "PAK", iso2: "PK", region: "Asie & Pacifique", ldc: false },
    { name: "Philippines", iso: "PHL", iso2: "PH", region: "Asie & Pacifique", ldc: false },
    { name: "Îles Salomon", iso: "SLB", iso2: "SB", region: "Asie & Pacifique", ldc: true },
    { name: "Timor-Leste", iso: "TLS", iso2: "TL", region: "Asie & Pacifique", ldc: true },
    { name: "Tuvalu", iso: "TUV", iso2: "TV", region: "Asie & Pacifique", ldc: true },
    { name: "Vanuatu", iso: "VUT", iso2: "VU", region: "Asie & Pacifique", ldc: true },
    { name: "Viêt Nam", iso: "VNM", iso2: "VN", region: "Asie & Pacifique", ldc: false },
    
    // Americas
    { name: "Haïti", iso: "HTI", iso2: "HT", region: "Amériques", ldc: true },
    { name: "Brésil", iso: "BRA", iso2: "BR", region: "Amériques", ldc: false },
    { name: "Canada", iso: "CAN", iso2: "CA", region: "Amériques", ldc: false },
    { name: "Colombie", iso: "COL", iso2: "CO", region: "Amériques", ldc: false },
    { name: "Mexique", iso: "MEX", iso2: "MX", region: "Amériques", ldc: false },
    { name: "États-Unis", iso: "USA", iso2: "US", region: "Amériques", ldc: false },
    
    // Europe & Middle East
    { name: "France", iso: "FRA", iso2: "FR", region: "Europe", ldc: false },
    { name: "Allemagne", iso: "DEU", iso2: "DE", region: "Europe", ldc: false },
    { name: "Royaume-Uni", iso: "GBR", iso2: "GB", region: "Europe", ldc: false },
    { name: "Yémen", iso: "YEM", iso2: "YE", region: "Moyen-Orient", ldc: true }
];

let activeRegionFilter = 'all';

function getFlagEmoji(iso2) {
    if (!iso2 || iso2.length !== 2) return '🌐';
    const codePoints = iso2.toUpperCase().split('').map(char => 127397 + char.charCodeAt(0));
    return String.fromCodePoint(...codePoints);
}

function renderCountries() {
    const grid = document.getElementById('countries-grid');
    const search = document.getElementById('countrySearch').value.toLowerCase().trim();
    grid.innerHTML = '';

    const filtered = WORLD_COUNTRIES.filter(c => {
        const matchesSearch = c.name.toLowerCase().includes(search) || c.iso.toLowerCase().includes(search);
        let matchesRegion = true;
        if (activeRegionFilter === 'ldc') {
            matchesRegion = c.ldc === true;
        } else if (activeRegionFilter !== 'all') {
            matchesRegion = c.region === activeRegionFilter;
        }
        return matchesSearch && matchesRegion;
    });

    if (filtered.length === 0) {
        grid.innerHTML = `<div style="grid-column: 1/-1; text-align: center; padding: 2.5rem; color: #8FA0B4; font-family: 'Inter', sans-serif;">Aucun pays ne correspond à votre recherche.</div>`;
        return;
    }

    filtered.forEach((c, index) => {
        const isAlreadyAdded = EXISTING_ISO_CODES.has(c.iso);
        const card = document.createElement('div');
        card.className = `country-card ${isAlreadyAdded ? 'disabled' : ''}`;
        card.id = `card-${c.iso}`;

        const flag = getFlagEmoji(c.iso2);

        card.innerHTML = `
            <div style="display: flex; align-items: center; overflow: hidden; margin-right: 0.5rem;">
                ${!isAlreadyAdded ? `
                    <input type="checkbox" name="bulk_countries[${index}][iso_code]" value="${c.iso}" id="chk-${c.iso}" onchange="updateSelectedState('${c.iso}', this.checked)" style="margin-right: 0.6rem; width: 16px; height: 16px; accent-color: #087F5B; cursor: pointer;">
                    <input type="hidden" name="bulk_countries[${index}][name]" value="${c.name}" id="name-${c.iso}" ${!isAlreadyAdded ? 'disabled' : ''}>
                    <input type="hidden" name="bulk_countries[${index}][region]" value="${c.region}" id="reg-${c.iso}" ${!isAlreadyAdded ? 'disabled' : ''}>
                ` : ''}
                <span class="flag-icon">${flag}</span>
                <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    <div style="font-weight: 600; font-size: 0.85rem; color: #081C3A; text-overflow: ellipsis; overflow: hidden;">${c.name}</div>
                    <div style="font-size: 0.72rem; color: #5E7590;">
                        <span style="font-weight: 700; color: #081C3A;">${c.iso}</span> • ${c.region} ${c.ldc ? '<span style="color:#C8A04D; font-weight:700;">(PMA)</span>' : ''}
                    </div>
                </div>
            </div>
            <div>
                ${isAlreadyAdded ? `
                    <span style="font-size: 0.7rem; font-weight: 700; background: #ECFDF5; color: #059669; padding: 0.2rem 0.5rem; border-radius: 4px;">Déjà éligible</span>
                ` : `
                    <button type="button" onclick="customizeCountry('${c.name}', '${c.iso}', '${c.region}', event)" title="Personnaliser ce pays" style="background: none; border: 1px solid #CBD5E1; padding: 0.2rem 0.4rem; border-radius: 4px; font-size: 0.7rem; color: #5E7590; cursor: pointer;">
                        ✍️
                    </button>
                `}
            </div>
        `;

        if (!isAlreadyAdded) {
            card.addEventListener('click', function(e) {
                if (e.target.tagName !== 'INPUT' && e.target.tagName !== 'BUTTON') {
                    const chk = document.getElementById(`chk-${c.iso}`);
                    chk.checked = !chk.checked;
                    updateSelectedState(c.iso, chk.checked);
                }
            });
        }

        grid.appendChild(card);
    });

    updateSelectedCounter();
}

function updateSelectedState(iso, isChecked) {
    const card = document.getElementById(`card-${iso}`);
    const nameInput = document.getElementById(`name-${iso}`);
    const regInput = document.getElementById(`reg-${iso}`);

    if (card) {
        if (isChecked) {
            card.classList.add('selected');
        } else {
            card.classList.remove('selected');
        }
    }

    if (nameInput) nameInput.disabled = !isChecked;
    if (regInput) regInput.disabled = !isChecked;

    updateSelectedCounter();
}

function updateSelectedCounter() {
    const checked = document.querySelectorAll('#countries-grid input[type="checkbox"]:checked');
    const counter = document.getElementById('selected-count');
    const btn = document.getElementById('btn-submit-bulk');

    if (counter) counter.innerText = checked.length;
    if (btn) {
        if (checked.length > 0) {
            btn.disabled = false;
            btn.style.opacity = '1';
            btn.style.cursor = 'pointer';
        } else {
            btn.disabled = true;
            btn.style.opacity = '0.5';
            btn.style.cursor = 'not-allowed';
        }
    }
}

function toggleSelectAll() {
    const checkboxes = document.querySelectorAll('#countries-grid input[type="checkbox"]');
    const allChecked = Array.from(checkboxes).every(c => c.checked);

    checkboxes.forEach(chk => {
        chk.checked = !allChecked;
        const iso = chk.value;
        updateSelectedState(iso, !allChecked);
    });
}

function filterCountries() {
    renderCountries();
}

function setRegionFilter(region) {
    activeRegionFilter = region;
    document.querySelectorAll('.region-filter-btn').forEach(btn => {
        if (btn.dataset.region === region) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });
    renderCountries();
}

function switchMode(mode) {
    const quickContainer = document.getElementById('mode-quick-container');
    const customContainer = document.getElementById('mode-custom-container');
    const quickBtn = document.getElementById('tab-quick-btn');
    const customBtn = document.getElementById('tab-custom-btn');

    if (mode === 'quick') {
        quickContainer.style.display = 'block';
        customContainer.style.display = 'none';
        quickBtn.classList.add('active');
        customBtn.classList.remove('active');
    } else {
        quickContainer.style.display = 'none';
        customContainer.style.display = 'block';
        customBtn.classList.add('active');
        quickBtn.classList.remove('active');
    }
}

function customizeCountry(name, iso, region, e) {
    if (e) e.stopPropagation();
    switchMode('custom');
    document.getElementById('name').value = name;
    document.getElementById('iso_code').value = iso;
    document.getElementById('region').value = region;
    document.getElementById('name').focus();
}

// Initial render on DOM load
document.addEventListener('DOMContentLoaded', function() {
    renderCountries();
});
</script>
@endpush
