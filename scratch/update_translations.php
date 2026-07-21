<?php

$enPath = __DIR__ . '/../lang/en.json';
$frPath = __DIR__ . '/../lang/fr.json';

$enData = json_decode(file_get_contents($enPath), true) ?: [];
$frData = json_decode(file_get_contents($frPath), true) ?: [];

$newTranslations = [
    'Services for a Just Transition' => 'Services pour une transition juste',
    'What is the Climate Catalyst Prize?' => 'Qu\'est-ce que le Climate Catalyst Prize ?',
    'CCP is an international NGO dedicated to supporting Least Developed Countries to build climate resilience, transition to low-carbon economies, and access climate finance and carbon markets.' => 'CCP est une ONG internationale dédiée au soutien des Pays les Moins Avancés pour renforcer la résilience climatique, réussir la transition vers des économies à faible émission de carbone et accéder à la finance climatique ainsi qu\'aux marchés du carbone.',
    'Who do you work with?' => 'Avec qui travaillez-vous ?',
    'We partner with LDC national governments, municipalities, NGOs, community organizations, and development partners to design and deliver climate projects.' => 'Nous travaillons en partenariat avec les gouvernements nationaux des PMA, les municipalités, les ONG, les organisations communautaires et les partenaires de développement pour concevoir et réaliser des projets climatiques.',
    'What services does CCP provide?' => 'Quels services CCP fournit-il ?',
    'We provide 6 core areas:' => 'Nous couvrons 6 domaines clés :',
    'Climate Resilience & Adaptation planning' => 'Planification de la résilience et de l\'adaptation climatique',
    'Sustainable Agriculture & Water Security' => 'Agriculture durable et sécurité de l\'eau',
    'Low Carbon Economy development' => 'Développement d\'une économie à faible émission de carbone',
    'Carbon Credits development and trade' => 'Développement et commerce de crédits carbone',
    'Technical Assistance for project design and MRV' => 'Assistance technique pour la conception de projets et le MRV',
    'Fundraising and access to climate finance' => 'Recherche de fonds et accès à la finance climatique',
    'Do you only work in LDCs?' => 'Travaillez-vous uniquement dans les PMA ?',
    'Yes. Our mandate is focused exclusively on Least Developed Countries as defined by the United Nations. This is where support is needed most.' => 'Oui. Notre mandat se concentre exclusivement sur les Pays les Moins Avancés tels que définis par les Nations Unies. C\'est là que le soutien est le plus nécessaire.',
    'How does CCP help with carbon credits?' => 'Comment CCP aide-t-il pour les crédits carbone ?',
    'We support the full lifecycle: project identification, methodology selection, validation, MRV setup, and market access. Our goal is to help LDCs generate revenue from their climate action.' => 'Nous accompagnons l\'ensemble du cycle de vie : identification des projets, choix des méthodologies, validation, mise en place du système MRV et accès au marché. Notre objectif est d\'aider les PMA à générer des revenus grâce à leur action climatique.',
    'How can my organization partner with CCP?' => 'Comment mon organisation peut-elle devenir partenaire de CCP ?',
    'If you are an NGO, government, or community group in an LDC working on climate, adaptation, or sustainability, reach out to us. We offer technical assistance and help connect you to funding.' => 'Si vous êtes une ONG, un gouvernement ou un groupe communautaire dans un PMA travaillant sur le climat, l\'adaptation ou la durabilité, contactez-nous. Nous offrons une assistance technique et vous aidons à vous connecter aux financements.',
    'How is CCP funded?' => 'Comment CCP est-il financé ?',
    'CCP is funded through grants, philanthropic donations, project fees, and partnerships with development agencies and the private sector.' => 'CCP est financé par des subventions, des dons philanthropiques, des frais de projet et des partenariats avec des agences de développement et le secteur privé.',
    'Where are you based?' => 'Où êtes-vous basés ?',
    'CCP is registered in the USA and operates globally with a focus on projects in LDCs across Africa, Asia, Latin America, Caribbean and the Pacific.' => 'CCP est enregistré aux États-Unis et opère à l\'échelle mondiale avec un accent particulier sur les projets dans les PMA en Afrique, en Asie, en Amérique latine, dans les Caraïbes et le Pacifique.',
    'The Story of Climate Catalyst Prize' => 'L\'Histoire du Climate Catalyst Prize',
    'The Climate Catalyst Prize was founded on a simple belief: the countries facing the greatest climate risks should have the greatest access to solutions, finance, and technical support.' => 'Le Climate Catalyst Prize a été fondé sur une conviction simple : les pays confrontés aux risques climatiques les plus élevés devraient avoir le plus grand accès aux solutions, aux financements et au soutien technique.',
    'We focus on Least Developed Countries — where climate change hits first and hardest, but where innovation and resilience also run deepest. CCP works as a bridge between LDC governments, local NGOs, municipalities, and global climate finance.' => 'Nous nous concentrons sur les Pays les Moins Avancés — là où le changement climatique frappe en premier et le plus durement, mais où l\'innovation et la résilience sont aussi les plus profondes. CCP sert de pont entre les gouvernements des PMA, les ONG locales, les municipalités et la finance climatique mondiale.',
    'We don’t just write reports. We catalyze. That means turning plans into funded projects. Turning farms into climate-smart systems. Turning carbon potential into real revenue. Turning adaptation ideas into infrastructure that protects lives.' => 'Nous ne nous contentons pas de rédiger des rapports. Nous catalysons. Cela signifie transformer des plans en projets financés. Transformer des exploitations agricoles en systèmes intelligents face au climat. Transformer le potentiel carbone en revenus réels. Transformer des idées d\'adaptation en infrastructures qui protègent des vies.',
    'From water security and sustainable agriculture to carbon markets and low-carbon energy, we provide the technical assistance, partnerships, and funding pathways needed to transform climate ambition into measurable impact.' => 'De la sécurité de l\'eau et de l\'agriculture durable aux marchés du carbone et à l\'énergie à faible émission de carbone, nous fournissons l\'assistance technique, les partenariats et les voies de financement nécessaires pour transformer l\'ambition climatique en impact mesurable.',
    'Practical support, delivered with and for LDCs.' => 'Un soutien pratique, dispensé avec et pour les PMA.',
    'Catalyze' => 'Catalyser',
    'Identify high-impact opportunities in vulnerable communities and sectors.' => 'Identifier des opportunités à fort impact dans les communautés et secteurs vulnérables.',
    'Support' => 'Soutenir',
    'Provide technical assistance, feasibility studies, MRV, and capacity building.' => 'Fournir une assistance technique, des études de faisabilité, des systèmes MRV et un renforcement des capacités.',
    'Finance' => 'Financer',
    'Unlock international climate funds (GCF, GEF), grants, and carbon revenue.' => 'Débloquer les fonds climatiques internationaux (FCD, FEM), subventions et revenus du carbone.',
    'Scale' => 'Déployer',
    'Replicate successful models across countries and regions for maximum resilience.' => 'Dupliquer les modèles réussis à travers les pays et régions pour une résilience maximale.',
    'Who We Work With' => 'Avec qui nous travaillons',
    'NGOs & Community Groups' => 'ONG & Groupes Communautaires',
    'Municipalities & City Networks' => 'Municipalités & Réseaux de Villes',
    'National Governments in LDCs' => 'Gouvernements Nationaux dans les PMA',
    'Development Partners & Private Sector' => 'Partenaires de Développement & Secteur Privé',
    'Registered in the USA' => 'Enregistré aux États-Unis',
    'Working Globally in LDCs' => 'Intervention Globale dans les PMA',
    'Location & Reach' => 'Localisation & Portée',
    'Registered & Working Globally' => 'Enregistré & Présence Globale',
    'The Climate Catalyst Prize is registered in the USA and operates globally with a focus on projects in Least Developed Countries across Africa, Asia, Latin America, the Caribbean, and the Pacific.' => 'Le Climate Catalyst Prize est enregistré aux États-Unis et opère à l\'échelle mondiale avec un accent sur les projets dans les Pays les Moins Avancés en Afrique, Asie, Amérique latine, Caraïbes et Pacifique.',
    'Clear answers to help you understand our mandate, services, eligibility, and partnership approach.' => 'Des réponses claires pour vous aider à comprendre notre mandat, nos services, notre éligibilité et notre approche de partenariat.',
    'Low Carbon Economy Development' => 'Développement d\'une Économie à Faible Émission de Carbone',
    'Carbon Credits & Carbon Trade' => 'Crédits Carbone & Commerce du Carbone',
    'Technical Assistance' => 'Assistance Technique',
    'Funding & Resource Mobilization' => 'Financement & Mobilisation des Ressources',
    'Planning and projects for cities, farms, and communities facing climate shocks' => 'Planification et projets pour les villes, exploitations agricoles et communautés face aux chocs climatiques',
    'Planning and projects for cities, farms, and communities facing climate shocks.' => 'Planification et projets pour les villes, exploitations agricoles et communautés face aux chocs climatiques.',
    'Early warning systems and hazard risk reduction' => 'Systèmes d\'alerte précoce et réduction des risques de catastrophe',
    'Climate-resilient infrastructure design and community protection' => 'Conception d\'infrastructures résilientes au climat et protection des communautés',
    'From climate-smart farming to water security, we support LDC agriculture to become more productive, resilient, and low-emission.' => 'De l\'agriculture intelligente face au climat à la sécurité de l\'eau, nous soutenons l\'agriculture des PMA pour devenir plus productive, résiliente et à faibles émissions.',
    'Climate-smart farming techniques and resilient crops' => 'Techniques agricoles intelligentes face au climat et cultures résilientes',
    'Water security and sustainable irrigation solutions' => 'Sécurité de l\'eau et solutions d\'irrigation durables',
    'Food systems transformation and supply chain resilience' => 'Transformation des systèmes alimentaires et résilience de la chaîne d\'approvisionnement',
    'We assist governments and NGOs to build roadmaps for renewable energy, energy efficiency, and green jobs that drive inclusive growth.' => 'Nous aidons les gouvernements et les ONG à élaborer des feuilles de route pour les énergies renouvelables, l\'efficacité énergétique et les emplois verts.',
    'Renewable energy transition roadmaps for clean power' => 'Feuilles de route de transition vers les énergies renouvelables pour une électricité propre',
    'Green jobs creation and industrial decarbonization pathways' => 'Création d\'emplois verts et voies de décarbonation industrielle',
    'Energy efficiency policies and low-carbon infrastructure' => 'Politiques d\'efficacité énergétique et infrastructures à faible émission de carbone',
    'End-to-end support: project identification, methodology, validation, MRV, and access to voluntary and compliance carbon markets.' => 'Accompagnement de bout en bout : identification de projet, méthodologie, validation, MRV et accès aux marchés du carbone.',
    'Carbon credit project identification and methodology development' => 'Identification des projets de crédits carbone et élaboration de méthodologies',
    'Validation, verification, and MRV framework setup' => 'Validation, vérification et mise en place de cadres MRV',
    'Access to voluntary and compliance carbon trading markets' => 'Accès aux marchés d\'échange de carbone volontaires et de conformité',
    'Project design, feasibility studies, policy alignment, monitoring and reporting. We build local capacity to deliver and scale.' => 'Conception de projets, études de faisabilité, alignement des politiques, suivi et rapports. Nous renforçons les capacités locales.',
    'Feasibility studies and bankable project design' => 'Études de faisabilité et conception de projets bancables',
    'Policy alignment and regulatory compliance support' => 'Alignement des politiques et soutien à la conformité réglementaire',
    'Local institutional capacity building and skill transfer' => 'Renforcement des capacités institutionnelles locales et transfert de compétences',
    'We connect organizations in LDCs to GCF, GEF, Adaptation Fund, bilateral donors, and private investors. From concept note to full proposal.' => 'Nous connectons les organisations des PMA aux FCD, FEM, Fonds d\'adaptation, bailleurs de fonds bilatéraux et investisseurs privés.',
    'Concept note and full proposal development for climate funds' => 'Élaboration de notes conceptuelles et de propositions complètes pour les fonds climatiques',
    'Direct connections to GCF, GEF, Adaptation Fund, and bilateral donors' => 'Connexions directes au FCD, FEM, Fonds d\'adaptation et bailleurs bilatéraux',
    'Private impact investor matching and blended finance structuring' => 'Mise en relation avec des investisseurs d\'impact privés et structuration de financement mixte',
    'Let’s build projects that deliver adaptation, mitigation, and sustainable development.' => 'Construisons des projets qui apportent adaptation, atténuation et développement durable.',
    'If you are an organization in an LDC working on climate, resilience, agriculture, or carbon markets — we can help.' => 'Si vous êtes une organisation dans un PMA travaillant sur le climat, la résilience, l\'agriculture ou les marchés du carbone — nous pouvons vous aider.'
];

foreach ($newTranslations as $k => $v) {
    $enData[$k] = $k;
    $frData[$k] = $v;
}

file_put_contents($enPath, json_encode($enData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
file_put_contents($frPath, json_encode($frData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
echo "Translations updated successfully.\n";
