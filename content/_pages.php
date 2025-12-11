<?php
declare(strict_types=1);

return [
    // Homepage
    'start' => [
        'title' => 'Fenster & Türen-Welt – Ihr Partner für Fenster, Türen, Planung & Montage',
        'description' => 'Fenster & Türen-Welt in Berlin: Ihr Partner für moderne Fenster, Türen sowie Planung und fachgerechte Montage – individuell und energieeffizient.',
        'keywords' => 'Fenster, Türen, Planung, Montage, Berlin, Fenster & Türen-Welt',
        'cms' => true,
        'nav' => true,
        'nav_label' => 'Start',
        'nav_order' => 10,
        'dropdown' => false,
        'canonical' => '/',
        'robots' => 'index,follow',
        'og_image' => '/og/start.jpg',
        'og_title' => 'Fenster & Türen-Welt',
        'og_subtitle' => 'Ihr Partner für Fenster, Türen, Planung & Montage in Berlin',
    ],

    // Windows
    'fenster' => [
        'title' => 'Fenster – Kunststoff, Aluminium & Holz',
        'description' => 'Fenster & Türen-Welt: Kunststoff-, Aluminium- und Holzfenster von DRUTEX – energieeffizient, modern und fachgerecht montiert.',
        'keywords' => 'Fenster, Kunststofffenster, Alufenster, Holzfenster, DRUTEX, Berlin',
        'cms' => true,
        'nav' => true,
        'nav_label' => 'Fenster',
        'nav_order' => 20,
        'dropdown' => false,
        'canonical' => '/fenster',
        'robots' => 'index,follow',
        'og_image' => '/og/fenster.jpg',
        'og_title' => 'Fenster für Ihr Zuhause',
        'og_subtitle' => 'Kunststoff-, Aluminium- und Holzfenster vom Fachbetrieb',
    ],

    // Doors
    'tueren' => [
        'title' => 'Türen – Haustüren & Innentüren',
        'description' => 'Hochwertige Haustüren und Innentüren aus Kunststoff, Aluminium, Holz und feuerfesten Ausführungen – Planung, Lieferung und Montage.',
        'keywords' => 'Türen, Haustüren, Innentüren, Aluminiumtüren, Holztüren, Berlin',
        'cms' => true,
        'nav' => true,
        'nav_label' => 'Türen',
        'nav_order' => 30,
        'dropdown' => false,
        'canonical' => '/tueren',
        'robots' => 'index,follow',
        'og_image' => '/og/tueren.jpg',
        'og_title' => 'Türen nach Maß',
        'og_subtitle' => 'Haustüren und Innentüren für jeden Anspruch',
    ],

    // Planning & Installation
    'planung-montage' => [
        'title' => 'Planung & Montage – Alles aus einer Hand',
        'description' => 'Komplette Planung und fachgerechte Montage von Fenstern und Türen – von der Beratung über Aufmaß bis zur schlüsselfertigen Übergabe.',
        'keywords' => 'Planung, Montage, Fenster, Türen, Aufmaß, Einbau',
        'cms' => true,
        'nav' => true,
        'nav_label' => 'Planung & Montage',
        'nav_order' => 40,
        'dropdown' => false,
        'canonical' => '/planung-montage',
        'robots' => 'index,follow',
        'og_image' => '/og/planung-montage.jpg',
        'og_title' => 'Planung & Montage',
        'og_subtitle' => 'Wir planen und montieren Ihre Fenster und Türen',
    ],

    // Contact
    'kontakt' => [
        'title' => 'Kontakt – Fenster & Türen-Welt',
        'description' => 'Nehmen Sie Kontakt mit Fenster & Türen-Welt auf: Telefon, E-Mail oder unser Kontaktformular für Ihr individuelles Angebot.',
        'keywords' => 'Kontakt, Anfrage, Angebot, Fenster, Türen, Berlin',
        'cms' => true,
        'nav' => true,
        'nav_label' => 'Kontakt',
        'nav_order' => 50,
        'dropdown' => true,
        'canonical' => '/kontakt',
        'robots' => 'index,follow',
        'og_image' => '/og/kontakt.jpg',
        'og_title' => 'Kontakt',
        'og_subtitle' => 'Wir freuen uns auf Ihre Anfrage',
    ],

    // Terms and Conditions (AGB)
    'agb' => [
        'title' => 'Allgemeine Geschäftsbedingungen (AGB)',
        'description' => 'Allgemeine Geschäftsbedingungen von Fenster & Türen-Welt – rechtliche Grundlagen für unsere Leistungen.',
        'keywords' => 'AGB, Allgemeine Geschäftsbedingungen, Rechtliches',
        'cms' => true,
        'nav' => false,
        'nav_label' => 'AGB',
        'nav_order' => 80,
        'dropdown' => false,
        'canonical' => '/agb',
        'robots' => 'noindex,follow',
        'og_image' => '/og/agb.jpg',
        'og_title' => 'Allgemeine Geschäftsbedingungen',
        'og_subtitle' => 'Rechtliche Grundlagen unserer Leistungen',
    ],

    // Imprint (Impressum)
    'impressum' => [
        'title' => 'Impressum – Fenster & Türen-Welt',
        'description' => 'Impressum von Fenster & Türen-Welt mit allen gesetzlich erforderlichen Angaben gemäß § 5 TMG.',
        'keywords' => 'Impressum, Anbieterkennzeichnung, Rechtliche Angaben',
        'cms' => true,
        'nav' => true,
        'nav_label' => 'Impressum',
        'nav_order' => 90,
        'dropdown' => true,
        'canonical' => '/impressum',
        'robots' => 'index,follow',
        'og_image' => '/og/impressum.jpg',
        'og_title' => 'Impressum',
        'og_subtitle' => 'Angaben gemäß § 5 TMG',
    ],

    // Privacy Policy
    'datenschutz' => [
        'title' => 'Datenschutzerklärung – Fenster & Türen-Welt',
        'description' => 'Datenschutzerklärung von Fenster & Türen-Welt: Informationen zur Verarbeitung personenbezogener Daten gemäß DSGVO.',
        'keywords' => 'Datenschutzerklärung, DSGVO, Datenschutz, personenbezogene Daten',
        'cms' => true,
        'nav' => true,
        'nav_label' => 'Datenschutz',
        'nav_order' => 100,
        'dropdown' => true,
        'canonical' => '/datenschutz',
        'robots' => 'index,follow',
        'og_image' => '/og/datenschutz.jpg',
        'og_title' => 'Datenschutzerklärung',
        'og_subtitle' => 'Ihr Datenschutz bei Fenster & Türen-Welt',
    ],
];
