<?php

$enPath = __DIR__ . '/../lang/en.json';
$frPath = __DIR__ . '/../lang/fr.json';

$enData = json_decode(file_get_contents($enPath), true) ?: [];
$frData = json_decode(file_get_contents($frPath), true) ?: [];

$teamTranslations = [
    'Our Executive Team & Experts' => 'Notre Équipe Dirigeante & Experts',
    'Guided by global leaders in climate finance, carbon markets, environmental policy, and LDC resilience.' => 'Dirigé par des leaders mondiaux de la finance climatique, des marchés du carbone, des politiques environnementales et de la résilience des PMA.',
    'Executive Director & Co-Founder' => 'Directrice Exécutive & Co-fondatrice',
    '20+ years of experience leading international climate finance, UN climate negotiations, and resilience programs in Africa and Asia-Pacific.' => 'Plus de 20 ans d\'expérience dans le leadership de la finance climatique internationale, des négociations climat de l\'ONU et des programmes de résilience en Afrique et Asie-Pacifique.',
    'Head of Climate Finance & Carbon Markets' => 'Directeur de la Finance Climatique & des Marchés du Carbone',
    'Expert in Article 6 bilateral agreements, voluntary carbon markets, and structuring blended finance packages for LDC initiatives.' => 'Expert en accords bilatéraux au titre de l\'Article 6, marchés volontaires du carbone et structuration de financements mixtes pour les PMA.',
    'Director of Technical Assistance & MRV' => 'Directrice de l\'Assistance Technique & du MRV',
    'Specialist in climate-smart agriculture, baseline methodology setup, environmental monitoring, and project feasibility design.' => 'Spécialiste en agriculture intelligente face au climat, méthodologies de référence, suivi environnemental et faisabilité des projets.',
    'Regional Director - LDC Partnerships' => 'Directeur Régional - Partenariats PMA',
    'Over 15 years driving community-based climate adaptation, municipal resilience planning, and partnerships across 30+ LDCs.' => 'Plus de 15 ans d\'expérience dans l\'adaptation climatique communautaire, la planification de la résilience municipale et les partenariats dans plus de 30 PMA.'
];

foreach ($teamTranslations as $k => $v) {
    $enData[$k] = $k;
    $frData[$k] = $v;
}

file_put_contents($enPath, json_encode($enData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
file_put_contents($frPath, json_encode($frData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
echo "Team translations updated successfully.\n";
