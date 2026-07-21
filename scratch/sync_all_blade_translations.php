<?php

$viewsDir = __DIR__ . '/../resources/views';
$enPath = __DIR__ . '/../lang/en.json';
$frPath = __DIR__ . '/../lang/fr.json';

$enData = json_decode(file_get_contents($enPath), true) ?: [];
$frData = json_decode(file_get_contents($frPath), true) ?: [];

// Find all blade files recursively
$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($viewsDir));
$extractedStrings = [];

foreach ($rii as $file) {
    if ($file->isDir()) continue;
    if (pathinfo($file->getPathname(), PATHINFO_EXTENSION) !== 'php') continue;

    $content = file_get_contents($file->getPathname());

    // Match __('string') or __("string") or @lang('string')
    preg_match_all('/(?:__|@lang)\(\s*([\'"])(.*?)\1\s*[\),]/s', $content, $matches);

    if (!empty($matches[2])) {
        foreach ($matches[2] as $str) {
            // Unescape quotes if needed
            $cleanStr = stripcslashes($str);
            $cleanStr = str_replace(["\\'", '\\"'], ["'", '"'], $cleanStr);
            if (!empty(trim($cleanStr))) {
                $extractedStrings[$cleanStr] = true;
            }
        }
    }
}

echo "Found " . count($extractedStrings) . " unique translation strings across all views.\n";

// Fallback dictionary for common or newly found strings
$dictionary = [
    "The Climate Catalyst Prize exists because LDCs need more than pledges — they need partners, tools, and capital." => "Le Climate Catalyst Prize existe parce que les PMA ont besoin de plus que de promesses — ils ont besoin de partenaires, d'outils et de capital.",
    "Identify high-impact opportunities in vulnerable communities and sectors." => "Identifier des opportunités à fort impact dans les communautés et secteurs vulnérables.",
    "Provide technical assistance, feasibility studies, MRV, and capacity building." => "Fournir une assistance technique, des études de faisabilité, des systèmes MRV et le renforcement des capacités.",
    "Unlock international climate funds (GCF, GEF), grants, and carbon revenue." => "Débloquer les fonds climatiques internationaux (FCD, FEM), subventions et revenus du carbone.",
    "Replicate successful models across countries and regions for maximum resilience." => "Dupliquer les modèles réussis à travers les pays et régions pour une résilience maximale.",
    "NGOs & Community Groups" => "ONG & Groupes Communautaires",
    "Local non-governmental & community organizations" => "Organisations locales non gouvernementales & communautaires",
    "Municipalities & City Networks" => "Municipalités & Réseaux de Villes",
    "Urban centers & local governments building resilience" => "Centres urbains & gouvernements locaux renforçant la résilience",
    "National Governments in LDCs" => "Gouvernements Nationaux dans les PMA",
    "National ministries & environmental agencies" => "Ministères nationaux & agences environnementales",
    "Development Partners & Private Sector" => "Partenaires de Développement & Secteur Privé",
    "Multilateral agencies & impact investors" => "Agences multilatérales & investisseurs d'impact",
    "Our Executive Team & Experts" => "Notre Équipe Dirigeante & Experts",
    "Guided by global leaders in climate finance, carbon markets, environmental policy, and LDC resilience." => "Dirigé par des leaders mondiaux de la finance climatique, des marchés du carbone, des politiques environnementales et de la résilience des PMA.",
    "Executive Director & Co-Founder" => "Directrice Exécutive & Co-fondatrice",
    "20+ years of experience leading international climate finance, UN climate negotiations, and resilience programs in Africa and Asia-Pacific." => "Plus de 20 ans d'expérience dans le leadership de la finance climatique internationale, des négociations climat de l'ONU et des programmes de résilience en Afrique et Asie-Pacifique.",
    "Head of Climate Finance & Carbon Markets" => "Directeur de la Finance Climatique & des Marchés du Carbone",
    "Expert in Article 6 bilateral agreements, voluntary carbon markets, and structuring blended finance packages for LDC initiatives." => "Expert en accords bilatéraux au titre de l'Article 6, marchés volontaires du carbone et structuration de financements mixtes pour les PMA.",
    "Director of Technical Assistance & MRV" => "Directrice de l'Assistance Technique & du MRV",
    "Specialist in climate-smart agriculture, baseline methodology setup, environmental monitoring, and project feasibility design." => "Spécialiste en agriculture intelligente face au climat, méthodologies de référence, suivi environnemental et faisabilité des projets.",
    "Regional Director - LDC Partnerships" => "Directeur Régional - Partenariats PMA",
    "Over 15 years driving community-based climate adaptation, municipal resilience planning, and partnerships across 30+ LDCs." => "Plus de 15 ans d'expérience dans l'adaptation climatique communautaire, la planification de la résilience municipale et les partenariats dans plus de 30 PMA.",
    "Our Genesis" => "Notre Genèse",
    "The Story of Climate Catalyst Prize" => "L'Histoire du Climate Catalyst Prize",
    "The Climate Catalyst Prize was founded on a simple belief: the countries facing the greatest climate risks should have the greatest access to solutions, finance, and technical support." => "Le Climate Catalyst Prize a été fondé sur une conviction simple : les pays confrontés aux risques climatiques les plus élevés devraient avoir le plus grand accès aux solutions, aux financements et au soutien technique.",
    "We focus on Least Developed Countries — where climate change hits first and hardest, but where innovation and resilience also run deepest. CCP works as a bridge between LDC governments, local NGOs, municipalities, and global climate finance." => "Nous nous concentrons sur les Pays les Moins Avancés — là où le changement climatique frappe en premier et le plus durement, mais où l'innovation et la résilience sont aussi les plus profondes. CCP sert de pont entre les gouvernements des PMA, les ONG locales, les municipalités et la finance climatique mondiale.",
    "We don’t just write reports. We catalyze. That means turning plans into funded projects. Turning farms into climate-smart systems. Turning carbon potential into real revenue. Turning adaptation ideas into infrastructure that protects lives." => "Nous ne nous contentons pas de rédiger des rapports. Nous catalysons. Cela signifie transformer des plans en projets financés. Transformer des exploitations agricoles en systèmes intelligents face au climat. Transformer le potentiel carbone en revenus réels. Transformer des idées d'adaptation en infrastructures qui protègent des vies.",
    "From water security and sustainable agriculture to carbon markets and low-carbon energy, we provide the technical assistance, partnerships, and funding pathways needed to transform climate ambition into measurable impact." => "De la sécurité de l'eau et de l'agriculture durable aux marchés du carbone et à l'énergie à faible émission de carbone, nous fournissons l'assistance technique, les partenariats et les voies de financement nécessaires pour transformer l'ambition climatique en impact mesurable.",
    "Our Promise" => "Notre Promesse",
    "Practical support, delivered with and for LDCs." => "Un soutien pratique, dispensé avec et pour les PMA.",
    "Catalyzing Climate Solutions. Transforming Futures." => "Catalyser les Solutions Climatiques. Transformer l'Avenir.",
    "To catalyze climate solutions in LDCs by providing the tools, finance, and partnerships needed to transform futures." => "Catalyser les solutions climatiques dans les PMA en fournissant les outils, financements et partenariats nécessaires pour transformer l'avenir.",
    "Methodology" => "Méthodologie",
    "Our Approach" => "Notre Démarche",
    "Partnership" => "Partenariat",
    "Who We Work With" => "Avec qui nous travaillons",
    "We work directly with key stakeholders across Least Developed Countries to turn climate plans into funded, measurable projects." => "Nous travaillons directement avec les parties prenantes clés dans les Pays les Moins Avancés pour transformer les plans climatiques en projets financés et mesurables.",
    "Partner With Us" => "Devenez Partenaire",
    "Let’s build projects that deliver adaptation, mitigation, and sustainable development." => "Construisons des projets qui apportent adaptation, atténuation et développement durable.",
    "If you are an organization in an LDC working on climate, resilience, agriculture, or carbon markets — we can help." => "Si vous êtes une organisation dans un PMA travaillant sur le climat, la résilience, l'agriculture ou les marchés du carbone — nous pouvons vous aider.",
    "Apply for Support" => "Demander un soutien",
    "Services for a Just Transition" => "Services pour une transition juste",
    "What We Do" => "Ce que nous faisons",
    "We support NGOs, municipalities, and governments in Least Developed Countries to build climate resilience, grow low-carbon economies, and access climate finance." => "Nous soutenons les ONG, les municipalités et les gouvernements des Pays les Moins Avancés pour renforcer la résilience climatique, développer des économies à faible émission de carbone et accéder à la finance climatique.",
    "Our Expertise" => "Notre Expertise",
    "From adaptation planning to carbon market access and climate finance, we provide 6 core areas of catalytic support for LDCs." => "De la planification de l'adaptation à l'accès au marché du carbone et à la finance climatique, nous offrons 6 domaines clés de soutien catalytique pour les PMA.",
    "Climate Resilience & Adaptation" => "Résilience & Adaptation Climatique",
    "We help municipalities and communities design adaptation plans, early warning systems, and infrastructure that stands up to climate change." => "Nous aidons les municipalités et les communautés à concevoir des plans d'adaptation, des systèmes d'alerte précoce et des infrastructures résistantes au changement climatique.",
    "Planning and projects for cities, farms, and communities facing climate shocks" => "Planification et projets pour les villes, exploitations agricoles et communautés face aux chocs climatiques",
    "Early warning systems and hazard risk reduction" => "Systèmes d'alerte précoce et réduction des risques de catastrophe",
    "Climate-resilient infrastructure design and community protection" => "Conception d'infrastructures résilientes au climat et protection des communautés",
    "Agriculture & Food Systems" => "Agriculture & Systèmes Alimentaires",
    "From climate-smart farming to water security, we support LDC agriculture to become more productive, resilient, and low-emission." => "De l'agriculture intelligente face au climat à la sécurité de l'eau, nous soutenons l'agriculture des PMA pour devenir plus productive, résiliente et à faibles émissions.",
    "Climate-smart farming techniques and resilient crops" => "Techniques agricoles intelligentes face au climat et cultures résilientes",
    "Water security and sustainable irrigation solutions" => "Sécurité de l'eau et solutions d'irrigation durables",
    "Food systems transformation and supply chain resilience" => "Transformation des systèmes alimentaires et résilience de la chaîne d'approvisionnement",
    "Low Carbon Economy Development" => "Développement d'une Économie à Faible Émission de Carbone",
    "We assist governments and NGOs to build roadmaps for renewable energy, energy efficiency, and green jobs that drive inclusive growth." => "Nous aidons les gouvernements et les ONG à élaborer des feuilles de route pour les énergies renouvelables, l'efficacité énergétique et les emplois verts.",
    "Renewable energy transition roadmaps for clean power" => "Feuilles de route de transition vers les énergies renouvelables pour une électricité propre",
    "Green jobs creation and industrial decarbonization pathways" => "Création d'emplois verts et voies de décarbonation industrielle",
    "Energy efficiency policies and low-carbon infrastructure" => "Politiques d'efficacité énergétique et infrastructures à faible émission de carbone",
    "Carbon Credits & Carbon Trade" => "Crédits Carbone & Commerce du Carbone",
    "End-to-end support: project identification, methodology, validation, MRV, and access to voluntary and compliance carbon markets." => "Accompagnement de bout en bout : identification de projet, méthodologie, validation, MRV et accès aux marchés du carbone.",
    "Carbon credit project identification and methodology development" => "Identification des projets de crédits carbone et élaboration de méthodologies",
    "Validation, verification, and MRV framework setup" => "Validation, vérification et mise en place de cadres MRV",
    "Access to voluntary and compliance carbon trading markets" => "Accès aux marchés d'échange de carbone volontaires et de conformité",
    "Technical Assistance" => "Assistance Technique",
    "Project design, feasibility studies, policy alignment, monitoring and reporting. We build local capacity to deliver and scale." => "Conception de projets, études de faisabilité, alignement des politiques, suivi et rapports. Nous renforçons les capacités locales.",
    "Feasibility studies and bankable project design" => "Études de faisabilité et conception de projets bancables",
    "Policy alignment and regulatory compliance support" => "Alignement des politiques et soutien à la conformité réglementaire",
    "Local institutional capacity building and skill transfer" => "Renforcement des capacités institutionnelles locales et transfert de compétences",
    "Funding & Resource Mobilization" => "Financement & Mobilisation des Ressources",
    "We connect organizations in LDCs to GCF, GEF, Adaptation Fund, bilateral donors, and private investors. From concept note to full proposal." => "Nous connectons les organisations des PMA aux FCD, FEM, Fonds d'adaptation, bailleurs de fonds bilatéraux et investisseurs privés.",
    "Concept note and full proposal development for climate funds" => "Élaboration de notes conceptuelles et de propositions complètes pour les fonds climatiques",
    "Direct connections to GCF, GEF, Adaptation Fund, and bilateral donors" => "Connexions directes au FCD, FEM, Fonds d'adaptation et bailleurs bilatéraux",
    "Private impact investor matching and blended finance structuring" => "Mise en relation avec des investisseurs d'impact privés et structuration de financement mixte",
    "What is the Climate Catalyst Prize?" => "Qu'est-ce que le Climate Catalyst Prize ?",
    "CCP is an international NGO dedicated to supporting Least Developed Countries to build climate resilience, transition to low-carbon economies, and access climate finance and carbon markets." => "CCP est une ONG internationale dédiée au soutien des Pays les Moins Avancés pour renforcer la résilience climatique, réussir la transition vers des économies à faible émission de carbone et accéder à la finance climatique ainsi qu'aux marchés du carbone.",
    "Who do you work with?" => "Avec qui travaillez-vous ?",
    "We partner with LDC national governments, municipalities, NGOs, community organizations, and development partners to design and deliver climate projects." => "Nous travaillons en partenariat avec les gouvernements nationaux des PMA, les municipalités, les ONG, les organisations communautaires et les partenaires de développement pour concevoir et réaliser des projets climatiques.",
    "What services does CCP provide?" => "Quels services CCP fournit-il ?",
    "We provide 6 core areas:" => "Nous couvrons 6 domaines clés :",
    "Climate Resilience & Adaptation planning" => "Planification de la résilience et de l'adaptation climatique",
    "Sustainable Agriculture & Water Security" => "Agriculture durable et sécurité de l'eau",
    "Low Carbon Economy development" => "Développement d'une économie à faible émission de carbone",
    "Carbon Credits development and trade" => "Développement et commerce de crédits carbone",
    "Technical Assistance for project design and MRV" => "Assistance technique pour la conception de projets et le MRV",
    "Fundraising and access to climate finance" => "Recherche de fonds et accès à la finance climatique",
    "Do you only work in LDCs?" => "Travaillez-vous uniquement dans les PMA ?",
    "Yes. Our mandate is focused exclusively on Least Developed Countries as defined by the United Nations. This is where support is needed most." => "Oui. Notre mandat se concentre exclusivement sur les Pays les Moins Avancés tels que définis par les Nations Unies. C'est là que le soutien est le plus nécessaire.",
    "How does CCP help with carbon credits?" => "Comment CCP aide-t-il pour les crédits carbone ?",
    "We support the full lifecycle: project identification, methodology selection, validation, MRV setup, and market access. Our goal is to help LDCs generate revenue from their climate action." => "Nous accompagnons l'ensemble du cycle de vie : identification des projets, choix des méthodologies, validation, mise en place du système MRV et accès au marché. Notre objectif est d'aider les PMA à générer des revenus grâce à leur action climatique.",
    "How can my organization partner with CCP?" => "Comment mon organisation peut-elle devenir partenaire de CCP ?",
    "If you are an NGO, government, or community group in an LDC working on climate, adaptation, or sustainability, reach out to us. We offer technical assistance and help connect you to funding." => "Si vous êtes une ONG, un gouvernement ou un groupe communautaire dans un PMA travaillant sur le climat, l'adaptation ou la durabilité, contactez-nous. Nous offrons une assistance technique et vous aidons à vous connecter aux financements.",
    "How is CCP funded?" => "Comment CCP est-il financé ?",
    "CCP is funded through grants, philanthropic donations, project fees, and partnerships with development agencies and the private sector." => "CCP est financé par des subventions, des dons philanthropiques, des frais de projet et des partenariats avec des agences de développement et le secteur privé.",
    "Where are you based?" => "Où êtes-vous basés ?",
    "CCP is registered in the USA and operates globally with a focus on projects in LDCs across Africa, Asia, Latin America, Caribbean and the Pacific." => "CCP est enregistré aux États-Unis et opère à l'échelle mondiale avec un accent particulier sur les projets dans les PMA en Afrique, en Asie, en Amérique latine, dans les Caraïbes et le Pacifique.",
    "Global Presence" => "Présence Globale",
    "Registered & Working Globally" => "Enregistré & Présence Globale",
    "The Climate Catalyst Prize is registered in the USA and operates globally with a focus on projects in Least Developed Countries across Africa, Asia, Latin America, the Caribbean, and the Pacific." => "Le Climate Catalyst Prize est enregistré aux États-Unis et opère à l'échelle mondiale avec un accent sur les projets dans les Pays les Moins Avancés en Afrique, Asie, Amérique latine, Caraïbes et Pacifique.",
    "Location & Reach" => "Localisation & Portée",
    "Registered in the USA" => "Enregistré aux États-Unis",
    "Working Globally in LDCs" => "Intervention Globale dans les PMA",
    "Catalyzing Climate Solutions in LDCs" => "Catalyser les Solutions Climatiques dans les PMA"
];

$addedCount = 0;
foreach ($extractedStrings as $key => $_) {
    // Make sure en.json has the key
    if (!isset($enData[$key])) {
        $enData[$key] = $key;
    }

    // Make sure fr.json has a valid translation
    if (!isset($frData[$key]) || empty($frData[$key])) {
        if (isset($dictionary[$key])) {
            $frData[$key] = $dictionary[$key];
        } else {
            // Keep existing key or dictionary match
            $frData[$key] = $key;
        }
        $addedCount++;
    }
}

// Write back sorted by key for clean organization
ksort($enData);
ksort($frData);

file_put_contents($enPath, json_encode($enData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
file_put_contents($frPath, json_encode($frData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

echo "Successfully synchronized translations! Total keys: " . count($enData) . ". New/updated keys: {$addedCount}.\n";
