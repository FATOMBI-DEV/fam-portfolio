<?php
$DATA = [];

$DATA['profile'] = [
    [
        'id' => 1,
        'full_name' => 'FATOMBI Marius Akomedi',
        'title' => 'Développeur Web & Mobile',
        'birth_date' => '2003-03-25',
        'birth_place' => 'Lougba',
        'nationality' => 'Béninoise',
        'phone' => '+229 01 51 96 79 13',
        'email' => 'akomedi533@gmail.com',
        'city' => 'Parakou, Bénin',
        'availability' => 'Disponibilité immédiate',
        'short_bio' => "Jeune développeur web et mobile, titulaire d'une Licence professionnelle en Sciences Informatiques (mention Excellente), passionné par la création de solutions digitales modernes.",
        'long_bio' => "Formé sur le terrain à travers deux stages en entreprise, je maîtrise un socle technique large (front-end, back-end, mobile) et je suis capable de contribuer rapidement au développement et à la maintenance de plateformes numériques.",
        'photo' => 'profile.jpg',
        'logo' => 'logo.png',
        'github_url' => null,
        'linkedin_url' => null,
        'facebook_url' => null,
        'whatsapp' => null,
    ]
];

$DATA['projects'] = [
    [
        'id' => 1,
        'title' => "EcoParakou",
        'description' => "Une application web d'annuaire pour les entreprise ",
        'image' => null,
        'technologies' => 'HTML, CSS, JAVASCRIPT, PHP, MySql(SQL)',
        'github_url' => 'https://github.com/FATOMBI-DEV/ecoparakou',
        'demo_url' => '',
        'category' => 'web',
        'featured' => 0,
        'sort_order' => 0,
        'created_at' => '2026-09-14 18:31:45'
    ]
];

$DATA['skills'] = [
    ['id'=>1,'name'=>'HTML5','level'=>90,'category'=>'Front-end','icon'=>null,'sort_order'=>1],
    ['id'=>2,'name'=>'CSS3','level'=>88,'category'=>'Front-end','icon'=>null,'sort_order'=>2],
    ['id'=>3,'name'=>'JavaScript','level'=>82,'category'=>'Front-end','icon'=>null,'sort_order'=>3],
    ['id'=>4,'name'=>'Angular','level'=>75,'category'=>'Front-end','icon'=>null,'sort_order'=>4],
    ['id'=>5,'name'=>'Bootstrap','level'=>85,'category'=>'Front-end','icon'=>null,'sort_order'=>5],
    ['id'=>6,'name'=>'TailwindCSS','level'=>88,'category'=>'Front-end','icon'=>null,'sort_order'=>6],
    ['id'=>7,'name'=>'PHP','level'=>85,'category'=>'Back-end','icon'=>null,'sort_order'=>7],
    ['id'=>8,'name'=>'Laravel','level'=>78,'category'=>'Back-end','icon'=>null,'sort_order'=>8],
    ['id'=>9,'name'=>'SQL / MySQL','level'=>82,'category'=>'Back-end','icon'=>null,'sort_order'=>9],
    ['id'=>10,'name'=>'Flutter / Dart','level'=>75,'category'=>'Mobile','icon'=>null,'sort_order'=>10],
    ['id'=>11,'name'=>'Java','level'=>70,'category'=>'Mobile','icon'=>null,'sort_order'=>11],
    ['id'=>12,'name'=>'Adobe Photoshop','level'=>70,'category'=>'Design','icon'=>null,'sort_order'=>12],
    ['id'=>13,'name'=>'Figma','level'=>80,'category'=>'Design','icon'=>null,'sort_order'=>13],
    ['id'=>14,'name'=>'IA & Dev (Claude, ChatGPT, Copilot)','level'=>90,'category'=>'Intelligence Artificielle','icon'=>null,'sort_order'=>14]
];

$DATA['experiences'] = [
    ['id'=>1,'title'=>"Stagiaire — Projet de fin de cycle de Licence",'company'=>'Bethel Labs','city'=>'Parakou','description'=>"Conception et développement d'une application web et mobile, du recueil des besoins à la mise en production. Mise en pratique des cycles complets (analyse, développement, tests) sous encadrement.",'start_date'=>'2026-01-01','end_date'=>'2026-06-03','type'=>'experience','sort_order'=>0],
    ['id'=>2,'title'=>'Stagiaire en développement web','company'=>'LIGHT Innovation','city'=>'Parakou','description'=>'Développement et maintenance de fonctionnalités web sous supervision. Première expérience concrète des standards et bonnes pratiques en entreprise.','start_date'=>'2025-06-30','end_date'=>'2025-08-30','type'=>'experience','sort_order'=>0],
    ['id'=>3,'title'=>'Licence professionnelle en Sciences Informatiques — SIL','company'=>'Institut Universitaire Les Cours Sonou de Parakou (IUCSP)','city'=>'Parakou','description'=>"Mémoire soutenu le 03/06/2026, mention Excellente. Sujet : conception et réalisation d'une application web et mobile.",'start_date'=>'2023-10-01','end_date'=>'2026-06-03','type'=>'education','sort_order'=>0],
    ['id'=>4,'title'=>'Baccalauréat série D','company'=>'CEG Pira et CEG Banikanni','city'=>'Pira','description'=>null,'start_date'=>'2020-09-01','end_date'=>'2023-07-01','type'=>'education','sort_order'=>0],
    ['id'=>5,'title'=>'BEPC','company'=>'CEG Lougba et CEG Adjigo/Pira','city'=>'Lougba','description'=>null,'start_date'=>'2015-09-01','end_date'=>'2020-07-01','type'=>'education','sort_order'=>0],
    ['id'=>6,'title'=>'Formation Marketing Digital et Intelligence Artificielle','company'=>'Conférence Internationale des Jeunes Élites','city'=>'Parakou','description'=>null,'start_date'=>'2024-01-01','end_date'=>'2024-12-31','type'=>'other','sort_order'=>0]
];

return $DATA;
