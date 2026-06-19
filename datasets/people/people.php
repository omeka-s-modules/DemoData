<?php
return [
    'item_sets' => [
        'main' => [
            'dcterms:title' => 'People',
            'dcterms:description' => 'A curated selection of historical figures spanning science, mathematics, literature, philosophy, exploration, and political leadership across cultures and centuries.',
        ],
        'science-mathematics' => [
            'dcterms:title' => 'Scientists & Mathematicians',
            'dcterms:description' => 'Figures who advanced human understanding of the natural world through observation, experiment, and mathematical reasoning.',
        ],
        'arts-literature' => [
            'dcterms:title' => 'Writers & Artists',
            'dcterms:description' => 'Poets, novelists, playwrights, and thinkers who shaped literary and philosophical traditions.',
        ],
        'politics-leadership' => [
            'dcterms:title' => 'Rulers & Leaders',
            'dcterms:description' => 'Monarchs, statespeople, and activists who shaped the political history of their times.',
        ],
        'exploration-geography' => [
            'dcterms:title' => 'Explorers & Travelers',
            'dcterms:description' => 'Figures who extended geographic knowledge and connected distant cultures through travel and exploration.',
        ],
    ],
    'resource_template' => [
        'label' => 'Demo Data: Person',
        'properties' => [
            [
                'term' => 'dcterms:title',
                'alternate_label' => 'Name',
            ],
            [
                'term' => 'dcterms:alternative',
                'alternate_label' => 'Also Known As',
            ],
            [
                'term' => 'demo-data:knownFor',
            ],
            [
                'term' => 'dcterms:description',
            ],
            [
                'term' => 'dcterms:subject',
            ],
            [
                'term' => 'demo-data:nationality',
            ],
            [
                'term' => 'dcterms:language',
            ],
            [
                'term' => 'dcterms:temporal',
                'alternate_label' => 'Era',
            ],
            [
                'term' => 'demo-data:birthDate',
                'data_type' => [
                    'numeric:timestamp',
                ],
            ],
            [
                'term' => 'demo-data:deathDate',
                'data_type' => [
                    'numeric:timestamp',
                ],
            ],
            [
                'term' => 'demo-data:birthPlace',
            ],
            [
                'term' => 'demo-data:deathPlace',
            ],
            [
                'term' => 'dcterms:relation',
                'data_type' => [
                    'resource',
                ],
                'alternate_label' => 'Related People',
            ],
            [
                'term' => 'dcterms:identifier',
                'data_type' => [
                    'uri',
                ],
                'alternate_label' => 'Wikidata',
            ],
        ],
    ],
    'items' => [
        [
            'id' => 'hatshepsut',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'cleopatra-vii',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q129234',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Hatshepsut',
            'dcterms:alternative' => 'Maatkare',
            'demo-data:knownFor' => 'One of ancient Egypt\'s most successful pharaohs; launched major trading expeditions and building programs including the mortuary temple at Deir el-Bahari',
            'dcterms:description' => 'Fifth pharaoh of the Eighteenth Dynasty, she ruled as pharaoh rather than regent for over twenty years, presenting herself in male regalia. Her reign saw extensive trade, architectural achievement, and prosperity.',
            'dcterms:subject' => [
                'Rulership',
                'Ancient Egypt',
                'Architecture',
            ],
            'demo-data:nationality' => 'Ancient Egyptian',
            'dcterms:language' => 'Ancient Egyptian',
            'dcterms:temporal' => 'New Kingdom Egypt',
            'demo-data:birthDate' => [
                '@value' => '-1507',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '-1458',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Thebes, Ancient Egypt',
            'demo-data:deathPlace' => 'Thebes, Ancient Egypt',
            'map_coordinates' => [
                32.6396,
                25.6872,
            ],
            'media' => [
                [
                    'file' => 'hatshepsut.png',
                    'dcterms:title' => 'Hatshepsut',
                ],
            ],
        ],
        [
            'id' => 'cleopatra-vii',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'hatshepsut',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q635',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Cleopatra VII',
                [
                    '@value' => 'Κλεοπάτρα Ζ΄ της Αιγύπτου',
                    '@language' => 'el',
                ],
            ],
            'dcterms:alternative' => [
                'Cleopatra Philopator',
                'Cleopatra of Egypt',
            ],
            'demo-data:knownFor' => 'Last active ruler of the Ptolemaic Kingdom; shrewd diplomat who forged alliances with Julius Caesar and Mark Antony to preserve Egyptian sovereignty',
            'dcterms:description' => 'The final ruler of the Macedonian-Greek Ptolemaic dynasty, she was the first of her line to speak Egyptian and cultivated the loyalty of her subjects. A skilled politician who nearly succeeded in preserving Egypt\'s independence against Rome.',
            'dcterms:subject' => [
                'Rulership',
                'Diplomacy',
                'Ancient Egypt',
            ],
            'demo-data:nationality' => 'Macedonian-Greek Egyptian',
            'dcterms:language' => [
                'Ancient Egyptian',
                'Greek',
                'Latin',
            ],
            'dcterms:temporal' => 'Hellenistic Period',
            'demo-data:birthDate' => [
                '@value' => '-0069',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '-0030',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Alexandria, Ptolemaic Egypt',
            'demo-data:deathPlace' => 'Alexandria, Ptolemaic Egypt',
            'map_coordinates' => [
                29.9187,
                31.2001,
            ],
            'media' => [
                [
                    'file' => 'cleopatra-vii.jpg',
                    'dcterms:title' => 'Cleopatra VII',
                ],
            ],
        ],
        [
            'id' => 'hypatia',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'al-khwarizmi',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q11903',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Hypatia',
                [
                    '@value' => 'Υπατία',
                    '@language' => 'el',
                ],
            ],
            'dcterms:alternative' => 'Hypatia of Alexandria',
            'demo-data:knownFor' => 'First recorded female mathematician; head of the Platonist school at Alexandria; commentaries on Diophantus and Apollonius of Perga',
            'dcterms:description' => 'Greek Neoplatonist philosopher and mathematician who led the Platonic school in Alexandria, teaching students from across the Mediterranean world. Murdered by a Christian mob amid political upheaval, she became a symbol of intellectual freedom.',
            'dcterms:subject' => [
                'Mathematics',
                'Astronomy',
                'Philosophy',
            ],
            'demo-data:nationality' => 'Greco-Egyptian',
            'dcterms:language' => 'Greek',
            'dcterms:temporal' => 'Late Antiquity',
            'demo-data:birthDate' => [
                '@value' => '0360',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '0415',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Alexandria, Roman Egypt',
            'demo-data:deathPlace' => 'Alexandria, Roman Egypt',
            'map_coordinates' => [
                29.9187,
                31.2001,
            ],
            'media' => [
                [
                    'file' => 'hypatia.jpg',
                    'dcterms:title' => 'Hypatia',
                ],
            ],
        ],
        [
            'id' => 'wu-zetian',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'hatshepsut',
                'cleopatra-vii',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q9738',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Wu Zetian',
                [
                    '@value' => '武則天',
                    '@language' => 'zh',
                ],
            ],
            'dcterms:alternative' => [
                'Empress Wu',
                'Wu Chao',
                'Wu Zhao',
            ],
            'demo-data:knownFor' => 'Only woman to assume the title of Empress Regnant of China; ruled for 45 years and expanded the imperial examination system to merit over birth',
            'dcterms:description' => 'Rising from a concubine of Emperor Taizong to the sole ruler of the Tang Dynasty, she founded her own Zhou dynasty and presided over a period of military expansion, administrative reform, and agricultural development. She actively promoted Buddhism and women in court positions.',
            'dcterms:subject' => [
                'Rulership',
                'Politics',
                'Governance',
            ],
            'demo-data:nationality' => 'Chinese',
            'dcterms:language' => 'Chinese',
            'dcterms:temporal' => 'Tang Dynasty',
            'demo-data:birthDate' => [
                '@value' => '0624',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '0705',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Wenshui, Shanxi, Tang China',
            'demo-data:deathPlace' => 'Luoyang, Tang China',
            'map_coordinates' => [
                112.0272,
                37.4295,
            ],
            'media' => [
                [
                    'file' => 'wu-zetian.png',
                    'dcterms:title' => 'Wu Zetian',
                ],
            ],
        ],
        [
            'id' => 'murasaki-shikibu',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'christine-de-pizan',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q81731',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Murasaki Shikibu',
                [
                    '@value' => '紫式部',
                    '@language' => 'ja',
                ],
            ],
            'dcterms:alternative' => 'Lady Murasaki',
            'demo-data:knownFor' => 'Author of The Tale of Genji, considered the world\'s first novel',
            'dcterms:description' => 'Lady-in-waiting at the Heian imperial court and author of the world\'s first full novel, The Tale of Genji describes the life of the son of a Japanese emperor through psychological depth unmatched in literature for centuries. She also kept a celebrated diary of court life.',
            'dcterms:subject' => [
                'Literature',
                'Poetry',
                'Fiction',
            ],
            'demo-data:nationality' => 'Japanese',
            'dcterms:language' => 'Japanese',
            'dcterms:temporal' => 'Heian Period',
            'demo-data:birthDate' => [
                '@value' => '0973',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1025',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Heian-kyō (Kyoto), Japan',
            'demo-data:deathPlace' => 'Heian-kyō (Kyoto), Japan',
            'map_coordinates' => [
                135.7681,
                35.0116,
            ],
            'media' => [
                [
                    'file' => 'murasaki-shikibu.png',
                    'dcterms:title' => 'Murasaki Shikibu',
                ],
            ],
        ],
        [
            'id' => 'al-khwarizmi',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'hypatia',
                'ibn-al-haytham',
                'nasir-al-din-al-tusi',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q1031798',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Al-Khwarizmi',
            'dcterms:alternative' => [
                'Muhammad ibn Musa al-Khwarizmi',
                'Algorithmi',
            ],
            'demo-data:knownFor' => 'Founding of algebra; introduction of Hindu-Arabic numerals to the Western world; the word "algorithm" derives from his name',
            'dcterms:description' => 'Persian scholar at the House of Wisdom in Baghdad whose treatise Al-Kitāb al-mukhtaṣar fī ḥisāb al-jabr wal-muqābala established algebra as a discipline. His work on Hindu-Arabic numerals transformed mathematics across Europe and the Islamic world.',
            'dcterms:subject' => [
                'Mathematics',
                'Astronomy',
                'Geography',
            ],
            'demo-data:nationality' => 'Persian',
            'dcterms:language' => 'Arabic',
            'dcterms:temporal' => 'Islamic Golden Age',
            'demo-data:birthDate' => [
                '@value' => '0780',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '0850',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Khwarazm (modern Uzbekistan)',
            'demo-data:deathPlace' => 'Baghdad, Abbasid Caliphate',
            'map_coordinates' => [
                60.3587,
                41.38,
            ],
            'media' => [
                [
                    'file' => 'al-khwarizmi.jpg',
                    'dcterms:title' => 'Al-Khwarizmi',
                ],
            ],
        ],
        [
            'id' => 'ibn-al-haytham',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'al-khwarizmi',
                'nasir-al-din-al-tusi',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q11104',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Ibn al-Haytham',
                [
                    '@value' => 'ابن الهيثم',
                    '@language' => 'ar',
                ],
            ],
            'dcterms:alternative' => [
                'Alhazen',
                'Abu Ali al-Hasan ibn al-Haytham',
            ],
            'demo-data:knownFor' => 'Book of Optics — foundational work explaining vision through light rays entering the eye; pioneer of the scientific method',
            'dcterms:description' => 'Arab mathematician and physicist whose seven-volume Book of Optics overturned the Greek emission theory of vision and established the modern understanding of how we see. He also made major contributions to astronomy, mathematics, and the experimental method.',
            'dcterms:subject' => [
                'Physics',
                'Mathematics',
                'Optics',
                'Astronomy',
            ],
            'demo-data:nationality' => 'Arab',
            'dcterms:language' => 'Arabic',
            'dcterms:temporal' => 'Islamic Golden Age',
            'demo-data:birthDate' => [
                '@value' => '0965',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1040',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Basra, Buyid Emirate (modern Iraq)',
            'demo-data:deathPlace' => 'Cairo, Fatimid Caliphate',
            'map_coordinates' => [
                47.7804,
                30.5085,
            ],
            'media' => [
                [
                    'file' => 'ibn-al-haytham.jpg',
                    'dcterms:title' => 'Ibn al-Haytham',
                ],
            ],
        ],
        [
            'id' => 'ibn-sina',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'al-khwarizmi',
                'ibn-al-haytham',
                'nasir-al-din-al-tusi',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q110929048',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Ibn Sina',
                [
                    '@value' => 'ابن سينا',
                    '@language' => 'ar',
                ],
            ],
            'dcterms:alternative' => [
                'Avicenna',
                'Abu Ali Sina',
                'The Prince of Physicians',
            ],
            'demo-data:knownFor' => 'Canon of Medicine — encyclopedic medical text used in European and Islamic universities for six centuries',
            'dcterms:description' => 'Persian polymath who mastered medicine, philosophy, astronomy, and mathematics. His Canon of Medicine systematized Greek and Islamic medical knowledge and remained the standard medical textbook across Europe and the Islamic world into the seventeenth century.',
            'dcterms:subject' => [
                'Medicine',
                'Philosophy',
                'Astronomy',
                'Mathematics',
            ],
            'demo-data:nationality' => 'Persian',
            'dcterms:language' => [
                'Arabic',
                'Persian',
            ],
            'dcterms:temporal' => 'Islamic Golden Age',
            'demo-data:birthDate' => [
                '@value' => '0980',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1037',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Afshana, near Bukhara, Samanid Empire',
            'demo-data:deathPlace' => 'Hamadan, Buyid Emirate',
            'map_coordinates' => [
                64.4214,
                39.7747,
            ],
            'media' => [
                [
                    'file' => 'ibn-sina.jpg',
                    'dcterms:title' => 'Ibn Sina',
                ],
            ],
        ],
        [
            'id' => 'hildegard-of-bingen',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
                'arts-literature',
            ],
            'relations' => [
                'christine-de-pizan',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q70991',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Hildegard of Bingen',
                [
                    '@value' => 'Hildegard von Bingen',
                    '@language' => 'de',
                ],
            ],
            'dcterms:alternative' => [
                'Saint Hildegard',
                'Sibyl of the Rhine',
            ],
            'demo-data:knownFor' => 'Visionary theologian, composer, and naturalist; her music is among the earliest surviving compositions attributed to a named author',
            'dcterms:description' => 'Benedictine abbess, composer, and polymath who produced major works in theology, medicine, natural history, and music. Her Physica and Causae et Curae are among the earliest scientific works by a woman. Pope Benedict XVI declared her a Doctor of the Church in 2012.',
            'dcterms:subject' => [
                'Theology',
                'Medicine',
                'Music',
                'Natural History',
            ],
            'demo-data:nationality' => 'German',
            'dcterms:language' => [
                'Latin',
                'Middle High German',
            ],
            'dcterms:temporal' => 'High Middle Ages',
            'demo-data:birthDate' => [
                '@value' => '1098',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1179',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Bermersheim vor der Höhe, Holy Roman Empire',
            'demo-data:deathPlace' => 'Rupertsberg, Holy Roman Empire',
            'map_coordinates' => [
                8.1667,
                49.8,
            ],
            'media' => [
                [
                    'file' => 'hildegard-of-bingen.jpg',
                    'dcterms:title' => 'Hildegard of Bingen',
                ],
            ],
        ],
        [
            'id' => 'nasir-al-din-al-tusi',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'al-khwarizmi',
                'ibn-al-haytham',
                'ibn-sina',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q302835',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Nasir al-Din al-Tusi',
                [
                    '@value' => 'نصیرالدین محمد طوسی',
                    '@language' => 'fa',
                ],
            ],
            'dcterms:alternative' => [
                'Al-Tusi',
                'Khawaja Nasir',
            ],
            'demo-data:knownFor' => 'Tusi couple — geometric model resolving a central problem in Ptolemaic astronomy; established trigonometry as an independent mathematical discipline',
            'dcterms:description' => 'Persian polymath who worked at the Maragha observatory under Mongol patronage, producing the most accurate astronomical tables of the medieval period. His mathematical innovations in trigonometry and planetary models influenced Copernicus two centuries later.',
            'dcterms:subject' => [
                'Mathematics',
                'Astronomy',
                'Philosophy',
            ],
            'demo-data:nationality' => 'Persian',
            'dcterms:language' => [
                'Arabic',
                'Persian',
            ],
            'dcterms:temporal' => 'Islamic Golden Age',
            'demo-data:birthDate' => [
                '@value' => '1201',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1274',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Tus, Khorasan (modern Iran)',
            'demo-data:deathPlace' => 'Baghdad, Ilkhanate',
            'map_coordinates' => [
                59.55,
                36.4,
            ],
            'media' => [
                [
                    'file' => 'nasir-al-din-al-tusi.jpg',
                    'dcterms:title' => 'Nasir al-Din al-Tusi',
                ],
            ],
        ],
        [
            'id' => 'rumi',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'ibn-sina',
                'ibn-battuta',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q43347',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Rumi',
                [
                    '@value' => 'مولوی',
                    '@language' => 'fa',
                ],
            ],
            'dcterms:alternative' => [
                'Jalal ad-Din Muhammad Rumi',
                'Mawlana',
                'Mevlana',
            ],
            'demo-data:knownFor' => 'Masnavi — six-volume spiritual poem of 25,000 verses; founder of the Mevlevi Sufi order, whose practitioners became known as whirling dervishes',
            'dcterms:description' => 'Persian Sufi mystic and poet whose Masnavi is considered one of the greatest works in Persian literature. Born in Khorasan and settling in Konya after the Mongol invasions, his poetry explores love, loss, longing, and spiritual transformation and remains widely read across the world today.',
            'dcterms:subject' => [
                'Poetry',
                'Sufism',
                'Theology',
                'Philosophy',
            ],
            'demo-data:nationality' => 'Persian',
            'dcterms:language' => [
                'Persian',
                'Arabic',
            ],
            'dcterms:temporal' => 'High Middle Ages',
            'demo-data:birthDate' => [
                '@value' => '1207',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1273',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Vakhsh, Khwarazmian Empire (modern Tajikistan)',
            'demo-data:deathPlace' => 'Konya, Sultanate of Rum',
            'map_coordinates' => [
                69.2667,
                37.7,
            ],
            'media' => [
                [
                    'file' => 'rumi.jpg',
                    'dcterms:title' => 'Rumi',
                ],
            ],
        ],
        [
            'id' => 'sundiata-keita',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'mansa-musa',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q175772',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Sundiata Keita',
            'dcterms:alternative' => [
                'Mari Djata',
                'Lion King of Mali',
            ],
            'demo-data:knownFor' => 'Founder of the Mali Empire; defeated the Sosso Kingdom at the Battle of Kirina (c. 1235); subject of the Sundiata Epic',
            'dcterms:description' => 'Mandinka prince who overcame childhood disability to unite the Mandinka clans and defeat the Sosso ruler Sumanguru Kante, founding the Mali Empire. His story, preserved by griots for centuries, is one of the great epics of West African oral tradition.',
            'dcterms:subject' => [
                'Rulership',
                'Warfare',
                'State Formation',
            ],
            'demo-data:nationality' => 'Mandinka',
            'dcterms:language' => 'Mandinka',
            'dcterms:temporal' => 'High Middle Ages',
            'demo-data:birthDate' => [
                '@value' => '1217',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1255',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Niani, Mali Empire (modern Guinea-Mali border)',
            'demo-data:deathPlace' => 'Niani, Mali Empire',
            'map_coordinates' => [
                -9.5,
                11.8,
            ],
            'media' => [
                [
                    'file' => 'sundiata-keita.jpg',
                    'dcterms:title' => 'Sundiata Keita',
                ],
            ],
        ],
        [
            'id' => 'christine-de-pizan',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'hildegard-of-bingen',
                'murasaki-shikibu',
                'sor-juana',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q234816',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Christine de Pizan',
            'dcterms:alternative' => 'Christine de Pisan',
            'demo-data:knownFor' => 'The Book of the City of Ladies — allegorical defense of women\'s virtue and capability; first professional woman writer in European literature',
            'dcterms:description' => 'Italian-born poet and author who became the first professional woman of letters in medieval Europe after her husband\'s death left her sole support of three children. Her Book of the City of Ladies directly refuted misogynist literary traditions by cataloguing women\'s achievements through history.',
            'dcterms:subject' => [
                'Literature',
                'Philosophy',
                'History',
            ],
            'demo-data:nationality' => 'Italian-French',
            'dcterms:language' => 'French',
            'dcterms:temporal' => 'Late Middle Ages',
            'demo-data:birthDate' => [
                '@value' => '1364',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1430',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Venice, Republic of Venice',
            'demo-data:deathPlace' => 'Poissy, Kingdom of France',
            'map_coordinates' => [
                12.3155,
                45.4408,
            ],
            'media' => [
                [
                    'file' => 'christine-de-pizan.jpg',
                    'dcterms:title' => 'Christine de Pizan',
                ],
            ],
        ],
        [
            'id' => 'ibn-battuta',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'exploration-geography',
            ],
            'relations' => [
                'zheng-he',
                'rumi',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q7331',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Ibn Battuta',
                [
                    '@value' => 'ابن بطوطة',
                    '@language' => 'ar',
                ],
            ],
            'dcterms:alternative' => [
                'Abu Abdallah Muhammad ibn Battuta',
                'Shams ad-Din',
            ],
            'demo-data:knownFor' => 'Rihla — account of a 29-year journey covering approximately 120,000 kilometres across Africa, Asia, and Europe; the longest known overland journey of the medieval world',
            'dcterms:description' => 'Moroccan scholar and explorer who set out on pilgrimage to Mecca and kept travelling for nearly three decades, visiting the courts of Mali, the cities of India and China, and the steppes of the Golden Horde. His Rihla, dictated on his return, is an unrivalled ethnographic record of the fourteenth-century world.',
            'dcterms:subject' => [
                'Exploration',
                'Geography',
                'Islamic Studies',
            ],
            'demo-data:nationality' => 'Moroccan Berber',
            'dcterms:language' => 'Arabic',
            'dcterms:temporal' => 'Late Middle Ages',
            'demo-data:birthDate' => [
                '@value' => '1304',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1368',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Tangier, Marinid Sultanate',
            'demo-data:deathPlace' => 'Morocco',
            'map_coordinates' => [
                -5.7998,
                35.7595,
            ],
            'media' => [
                [
                    'file' => 'ibn-battuta.jpg',
                    'dcterms:title' => 'Ibn Battuta',
                ],
            ],
        ],
        [
            'id' => 'mansa-musa',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'sundiata-keita',
                'ibn-battuta',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q309333',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Mansa Musa',
                [
                    '@value' => 'منسا موسى',
                    '@language' => 'ar',
                ],
            ],
            'dcterms:alternative' => [
                'Musa I of Mali',
                'Kanku Musa',
            ],
            'demo-data:knownFor' => 'Wealthiest individual in recorded history; 1324 pilgrimage to Mecca — his distribution of gold destabilized the economies of North Africa and the Middle East for decades',
            'dcterms:description' => 'Emperor of the Mali Empire at its height, his legendary pilgrimage to Mecca with a retinue of 60,000 people and vast quantities of gold introduced sub-Saharan Africa to the wider Muslim world. Under his reign, Timbuktu became a major center of Islamic learning and trade.',
            'dcterms:subject' => [
                'Rulership',
                'Diplomacy',
                'Trade',
            ],
            'demo-data:nationality' => 'Mandinka',
            'dcterms:language' => 'Mandinka',
            'dcterms:temporal' => 'Late Middle Ages',
            'demo-data:birthDate' => [
                '@value' => '1280',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1337',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Mali Empire (West Africa)',
            'demo-data:deathPlace' => 'Mali Empire',
            'map_coordinates' => [
                -8,
                12.65,
            ],
            'media' => [
                [
                    'file' => 'mansa-musa.jpg',
                    'dcterms:title' => 'Mansa Musa',
                ],
            ],
        ],
        [
            'id' => 'zheng-he',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'exploration-geography',
            ],
            'relations' => [
                'ibn-battuta',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q7333',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Zheng He',
                [
                    '@value' => '鄭和',
                    '@language' => 'zh',
                ],
            ],
            'dcterms:alternative' => [
                'Ma He',
                'Cheng Ho',
                'San Bao',
            ],
            'demo-data:knownFor' => 'Led seven massive naval expeditions to Southeast Asia, South Asia, the Persian Gulf, and East Africa commanding the largest fleet of the pre-modern world',
            'dcterms:description' => 'Hui Muslim admiral and diplomat who commanded China\'s great treasure fleet voyages under the Yongle Emperor. His seven expeditions between 1405 and 1433 reached as far as East Africa and established Chinese diplomatic presence across the Indian Ocean world.',
            'dcterms:subject' => [
                'Exploration',
                'Diplomacy',
                'Navigation',
            ],
            'demo-data:nationality' => 'Chinese (Hui Muslim)',
            'dcterms:language' => [
                'Chinese',
                'Arabic',
            ],
            'dcterms:temporal' => 'Ming Dynasty',
            'demo-data:birthDate' => [
                '@value' => '1371',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1433',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Kunyang, Yunnan, Ming China',
            'demo-data:deathPlace' => 'Calicut (modern Kozhikode), India',
            'map_coordinates' => [
                102.7667,
                24.9,
            ],
            'media' => [
                [
                    'file' => 'zheng-he.jpg',
                    'dcterms:title' => 'Zheng He',
                ],
            ],
        ],
        [
            'id' => 'pachacuti',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'sundiata-keita',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q51722101',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Pachacuti',
            'dcterms:alternative' => [
                'Pachacutec',
                'Pachacuti Inca Yupanqui',
                'Sapa Inca Pachacuti',
            ],
            'demo-data:knownFor' => 'Transformed the Kingdom of Cusco into the Inca Empire; builder of Machu Picchu; architect of the Tawantinsuyu administrative system',
            'dcterms:description' => 'Ninth Sapa Inca who, after repelling a Chanka invasion single-handedly in legend, expanded Cusco from a regional state into the largest empire in pre-Columbian America. He reorganized Andean society under the mit\'a system and commissioned the construction of Machu Picchu.',
            'dcterms:subject' => [
                'Rulership',
                'Architecture',
                'State Formation',
            ],
            'demo-data:nationality' => 'Inca (Quechua)',
            'dcterms:language' => 'Quechua',
            'dcterms:temporal' => 'Late Pre-Columbian',
            'demo-data:birthDate' => [
                '@value' => '1418',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1471',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Cusco, Inca Empire',
            'demo-data:deathPlace' => 'Cusco, Inca Empire',
            'map_coordinates' => [
                -71.9675,
                -13.5319,
            ],
            'media' => [
                [
                    'file' => 'pachacuti.jpg',
                    'dcterms:title' => 'Pachacuti',
                ],
            ],
        ],
        [
            'id' => 'queen-nzinga',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'hatshepsut',
                'wu-zetian',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q467650',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Queen Nzinga',
            'dcterms:alternative' => [
                'Ana de Sousa Nzinga Mbande',
                'Njinga Mbande',
                'Nzinga of Ndongo and Matamba',
            ],
            'demo-data:knownFor' => 'Brilliant military strategist who led resistance against Portuguese colonization of central Africa for four decades',
            'dcterms:description' => 'Queen of Ndongo and Matamba who commanded armies in the field, negotiated on equal terms with the Portuguese, formed alliances with the Dutch, and led a decades-long resistance that preserved her kingdoms\' independence. She is celebrated as a national hero of Angola.',
            'dcterms:subject' => [
                'Rulership',
                'Warfare',
                'Diplomacy',
            ],
            'demo-data:nationality' => 'Mbundu',
            'dcterms:language' => [
                'Kimbundu',
                'Portuguese',
            ],
            'dcterms:temporal' => 'Early Modern',
            'demo-data:birthDate' => [
                '@value' => '1583',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1663',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Kabasa, Kingdom of Ndongo (modern Angola)',
            'demo-data:deathPlace' => 'Matamba, Kingdom of Matamba (modern Angola)',
            'map_coordinates' => [
                15,
                -9,
            ],
            'media' => [
                [
                    'file' => 'queen-nzinga.png',
                    'dcterms:title' => 'Queen Nzinga',
                ],
            ],
        ],
        [
            'id' => 'copernicus',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'nasir-al-din-al-tusi',
                'galileo',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q619',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Nicolaus Copernicus',
                [
                    '@value' => 'Mikołaj Kopernik',
                    '@language' => 'pl',
                ],
            ],
            'dcterms:alternative' => [
                'Mikołaj Kopernik',
                'Nicolas Copernic',
            ],
            'demo-data:knownFor' => 'Heliocentric model of the solar system — De revolutionibus orbium coelestium (1543)',
            'dcterms:description' => 'Polish mathematician and astronomer who proposed that the Sun, not the Earth, stands at the center of the universe. Published in the year of his death, his De revolutionibus launched the Copernican Revolution and initiated the broader Scientific Revolution.',
            'dcterms:subject' => [
                'Astronomy',
                'Mathematics',
            ],
            'demo-data:nationality' => 'Polish',
            'dcterms:language' => [
                'Latin',
                'Polish',
                'German',
            ],
            'dcterms:temporal' => 'Renaissance',
            'demo-data:birthDate' => [
                '@value' => '1473',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1543',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Toruń, Royal Prussia (modern Poland)',
            'demo-data:deathPlace' => 'Frombork, Royal Prussia',
            'map_coordinates' => [
                18.5982,
                53.0137,
            ],
            'media' => [
                [
                    'file' => 'copernicus.jpg',
                    'dcterms:title' => 'Nicolaus Copernicus',
                ],
            ],
        ],
        [
            'id' => 'sor-juana',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'christine-de-pizan',
                'mary-wollstonecraft',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q183074',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Sor Juana Inés de la Cruz',
            'dcterms:alternative' => [
                'Juana Ramírez de Asbaje',
                'Juana de la Cruz',
                'The Tenth Muse',
            ],
            'demo-data:knownFor' => 'First major poet of colonial Latin America; author of Respuesta a Sor Filotea — an early feminist defense of women\'s right to education',
            'dcterms:description' => 'Self-taught scholar and nun in New Spain who became the leading literary figure of the Spanish Baroque. Her poetry, plays, and philosophical essays demonstrated profound learning in theology, science, and music. Her Respuesta is one of the earliest feminist documents in the Americas.',
            'dcterms:subject' => [
                'Poetry',
                'Philosophy',
                'Theology',
                'Literature',
            ],
            'demo-data:nationality' => 'Mexican Creole',
            'dcterms:language' => [
                'Spanish',
                'Latin',
            ],
            'dcterms:temporal' => 'Baroque',
            'demo-data:birthDate' => [
                '@value' => '1648',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1695',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'San Miguel Nepantla, New Spain (modern Mexico)',
            'demo-data:deathPlace' => 'Mexico City, New Spain',
            'map_coordinates' => [
                -98.8667,
                19.1167,
            ],
            'media' => [
                [
                    'file' => 'sor-juana.jpg',
                    'dcterms:title' => 'Sor Juana Inés de la Cruz',
                ],
            ],
        ],
        [
            'id' => 'galileo',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'copernicus',
                'isaac-newton',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q307',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Galileo Galilei',
            'dcterms:alternative' => [
                'Galileo',
                'Father of Modern Science',
                'Father of Observational Astronomy',
            ],
            'demo-data:knownFor' => 'Championed heliocentrism against the Inquisition; improved the telescope for astronomical observation; established foundational laws of motion and falling bodies',
            'dcterms:description' => 'Italian physicist, mathematician, and astronomer whose use of the telescope revealed the moons of Jupiter, the phases of Venus, and the mountains of the Moon. His conflict with the Catholic Church over heliocentrism culminated in his house arrest, but his work laid the foundations of classical mechanics.',
            'dcterms:subject' => [
                'Physics',
                'Astronomy',
                'Mathematics',
                'Engineering',
            ],
            'demo-data:nationality' => 'Italian',
            'dcterms:language' => [
                'Italian',
                'Latin',
            ],
            'dcterms:temporal' => 'Scientific Revolution',
            'demo-data:birthDate' => [
                '@value' => '1564',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1642',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Pisa, Duchy of Florence',
            'demo-data:deathPlace' => 'Arcetri, Grand Duchy of Tuscany',
            'map_coordinates' => [
                10.4036,
                43.7228,
            ],
            'media' => [
                [
                    'file' => 'galileo.jpg',
                    'dcterms:title' => 'Galileo Galilei',
                ],
            ],
        ],
        [
            'id' => 'isaac-newton',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'galileo',
                'ada-lovelace',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q935',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Isaac Newton',
            'dcterms:alternative' => [
                'Sir Isaac Newton',
            ],
            'demo-data:knownFor' => 'Laws of motion and universal gravitation — Principia Mathematica (1687); co-inventor of calculus',
            'dcterms:description' => 'English mathematician and physicist who formulated the laws of motion and universal gravitation, co-invented calculus, and discovered that white light is composed of the spectrum of colours. The Principia Mathematica is widely regarded as the most influential work in the history of science.',
            'dcterms:subject' => [
                'Physics',
                'Mathematics',
                'Astronomy',
                'Optics',
            ],
            'demo-data:nationality' => 'English',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Scientific Revolution',
            'demo-data:birthDate' => [
                '@value' => '1643',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1727',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Woolsthorpe-by-Colsterworth, Lincolnshire, England',
            'demo-data:deathPlace' => 'Kensington, Middlesex, England',
            'map_coordinates' => [
                -0.65,
                52.8,
            ],
            'media' => [
                [
                    'file' => 'isaac-newton.jpg',
                    'dcterms:title' => 'Isaac Newton',
                ],
            ],
        ],
        [
            'id' => 'mary-wollstonecraft',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'sor-juana',
                'christine-de-pizan',
                'ada-lovelace',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q101638',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Mary Wollstonecraft',
            'dcterms:alternative' => 'Mary Godwin',
            'demo-data:knownFor' => 'A Vindication of the Rights of Woman (1792) — foundational text of feminist political philosophy',
            'dcterms:description' => 'English writer and philosopher whose A Vindication of the Rights of Woman argued that women are not naturally inferior to men but appear so only from lack of education. The mother of Mary Shelley, she is considered one of the founding figures of feminist thought.',
            'dcterms:subject' => [
                'Philosophy',
                'Political Theory',
                'Literature',
            ],
            'demo-data:nationality' => 'English',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Enlightenment',
            'demo-data:birthDate' => [
                '@value' => '1759',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1797',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Spitalfields, London, England',
            'demo-data:deathPlace' => 'Somers Town, London, England',
            'map_coordinates' => [
                -0.06,
                51.52,
            ],
            'media' => [
                [
                    'file' => 'mary-wollstonecraft.jpg',
                    'dcterms:title' => 'Mary Wollstonecraft',
                ],
            ],
        ],
        [
            'id' => 'ada-lovelace',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'isaac-newton',
                'mary-wollstonecraft',
                'charles-darwin',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q7259',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Ada Lovelace',
            'dcterms:alternative' => [
                'Augusta Ada King, Countess of Lovelace',
                'Ada Byron',
            ],
            'demo-data:knownFor' => 'First published algorithm designed to be processed by a machine; recognized the potential of computing beyond mere calculation',
            'dcterms:description' => 'English mathematician and daughter of Lord Byron who collaborated with Charles Babbage on his Analytical Engine. Her 1843 translation of an Italian paper included extensive notes — one of which contained the first algorithm — and her vision of computing as a general-purpose tool anticipated the digital age by a century.',
            'dcterms:subject' => [
                'Mathematics',
                'Computing',
            ],
            'demo-data:nationality' => 'English',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Victorian Era',
            'demo-data:birthDate' => [
                '@value' => '1815',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1852',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'London, England',
            'demo-data:deathPlace' => 'Marylebone, London, England',
            'map_coordinates' => [
                -0.1276,
                51.5074,
            ],
            'media' => [
                [
                    'file' => 'ada-lovelace.png',
                    'dcterms:title' => 'Ada Lovelace',
                ],
            ],
        ],
        [
            'id' => 'charles-darwin',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'ada-lovelace',
                'frederick-douglass',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q1035',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Charles Darwin',
            'dcterms:alternative' => [
                'Charles Robert Darwin',
            ],
            'demo-data:knownFor' => 'Theory of evolution by natural selection — On the Origin of Species (1859)',
            'dcterms:description' => 'English naturalist whose five-year voyage on HMS Beagle and subsequent decades of research produced the theory of evolution by natural selection. On the Origin of Species transformed biology and challenged prevailing views of human origins, producing controversy that continues to this day.',
            'dcterms:subject' => [
                'Biology',
                'Natural History',
                'Geology',
            ],
            'demo-data:nationality' => 'English',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Victorian Era',
            'demo-data:birthDate' => [
                '@value' => '1809',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1882',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Shrewsbury, Shropshire, England',
            'demo-data:deathPlace' => 'Downe, Kent, England',
            'map_coordinates' => [
                -2.7519,
                52.708,
            ],
            'media' => [
                [
                    'file' => 'charles-darwin.jpg',
                    'dcterms:title' => 'Charles Darwin',
                ],
            ],
        ],
        [
            'id' => 'frederick-douglass',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
                'arts-literature',
            ],
            'relations' => [
                'harriet-tubman',
                'charles-darwin',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q215562',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Frederick Douglass',
            'dcterms:alternative' => [
                'Frederick Augustus Washington Bailey',
            ],
            'demo-data:knownFor' => 'Narrative of the Life of Frederick Douglass (1845) — powerful firsthand account of slavery; pre-eminent orator and leader of the American abolitionist movement',
            'dcterms:description' => 'Escaped enslaved man who became the most prominent African American intellectual and activist of the nineteenth century. His autobiography, speeches, and journalism shaped the moral argument against slavery, and he campaigned for women\'s suffrage as well as racial equality throughout his life.',
            'dcterms:subject' => [
                'Activism',
                'Literature',
                'Politics',
                'Journalism',
            ],
            'demo-data:nationality' => 'American',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Victorian Era',
            'demo-data:birthDate' => [
                '@value' => '1818',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1895',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Cordova, Maryland, United States',
            'demo-data:deathPlace' => 'Washington, D.C., United States',
            'map_coordinates' => [
                -75.8096,
                38.8121,
            ],
            'media' => [
                [
                    'file' => 'frederick-douglass.jpg',
                    'dcterms:title' => 'Frederick Douglass',
                ],
            ],
        ],
        [
            'id' => 'harriet-tubman',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'frederick-douglass',
                'sojourner-truth',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q102870',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Harriet Tubman',
            'dcterms:alternative' => [
                'Araminta Ross',
                'Moses',
            ],
            'demo-data:knownFor' => 'Led approximately 70 enslaved people to freedom via the Underground Railroad; served as Union spy and scout during the American Civil War',
            'dcterms:description' => 'Born into slavery in Maryland, she escaped in 1849 and made some thirteen missions back into slave territory to guide others to freedom, never losing a passenger. During the Civil War she served the Union Army as a spy, scout, and the first woman to lead an armed raid. She later campaigned for women\'s suffrage.',
            'dcterms:subject' => [
                'Activism',
                'Military Service',
                'Abolitionism',
            ],
            'demo-data:nationality' => 'American',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Victorian Era',
            'demo-data:birthDate' => [
                '@value' => '1822',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1913',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Dorchester County, Maryland, United States',
            'demo-data:deathPlace' => 'Auburn, New York, United States',
            'map_coordinates' => [
                -76.0744,
                38.5762,
            ],
            'media' => [
                [
                    'file' => 'harriet-tubman.jpg',
                    'dcterms:title' => 'Harriet Tubman',
                ],
            ],
        ],
        [
            'id' => 'enheduanna',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'sappho',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q232505',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Enheduanna',
            'dcterms:alternative' => 'En-hedu-ana',
            'demo-data:knownFor' => 'First named author in recorded history; composer of hymns to the moon god Nanna and the goddess Inanna',
            'dcterms:description' => 'High priestess of the moon god Nanna at Ur, appointed by her father Sargon of Akkad. Her hymns — including the Exaltation of Inanna — are the earliest literary works attributed to a named individual in world history, predating Homer by fifteen centuries.',
            'dcterms:subject' => [
                'Poetry',
                'Religion',
                'Literature',
            ],
            'demo-data:nationality' => 'Akkadian',
            'dcterms:language' => 'Sumerian',
            'dcterms:temporal' => 'Akkadian Empire',
            'demo-data:birthDate' => [
                '@value' => '-2285',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '-2250',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Akkad (Mesopotamia, modern Iraq)',
            'demo-data:deathPlace' => 'Ur, Sumer (modern Iraq)',
            'map_coordinates' => [
                46.1036,
                30.9626,
            ],
            'media' => [
                [
                    'file' => 'enheduanna.jpg',
                    'dcterms:title' => 'Enheduanna',
                ],
            ],
        ],
        [
            'id' => 'sappho',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'enheduanna',
                'christine-de-pizan',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q17892',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Sappho',
                [
                    '@value' => 'Σαπφώ',
                    '@language' => 'el',
                ],
            ],
            'dcterms:alternative' => [
                'Psappha',
                'The Poetess',
                'The Tenth Muse',
            ],
            'demo-data:knownFor' => 'Lyric poetry of personal passion and longing; her name gave the words "sapphic" and "lesbian" to the world',
            'dcterms:description' => 'Ancient Greek lyric poet from the island of Lesbos, celebrated in antiquity as equal to Homer. Only fragments of her work survive, yet they are considered among the finest poetry in any language for their directness, emotional intensity, and metrical invention. Plato called her the tenth Muse.',
            'dcterms:subject' => [
                'Poetry',
                'Literature',
            ],
            'demo-data:nationality' => 'Ancient Greek',
            'dcterms:language' => 'Ancient Greek',
            'dcterms:temporal' => 'Archaic Greece',
            'demo-data:birthDate' => [
                '@value' => '-0630',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '-0570',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Eressos, Lesbos, Ancient Greece',
            'demo-data:deathPlace' => 'Lesbos, Ancient Greece',
            'map_coordinates' => [
                26.1667,
                39.1667,
            ],
            'media' => [
                [
                    'file' => 'sappho.jpg',
                    'dcterms:title' => 'Sappho',
                ],
            ],
        ],
        [
            'id' => 'confucius',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'ashoka',
                'zhang-heng',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q4604',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Confucius',
                [
                    '@value' => '孔子',
                    '@language' => 'zh',
                ],
            ],
            'dcterms:alternative' => [
                'Kong Qiu',
                'Kong Fuzi',
                'Master Kong',
            ],
            'demo-data:knownFor' => 'Analects — collected sayings that founded Confucianism, the ethical and political philosophy that shaped East Asian civilization for two millennia',
            'dcterms:description' => 'Chinese philosopher, teacher, and politician whose ideas on ethics, family, social harmony, and governance were compiled by his disciples in the Analects. Confucianism became the state philosophy of successive Chinese dynasties and profoundly shaped Korean, Japanese, and Vietnamese societies.',
            'dcterms:subject' => [
                'Philosophy',
                'Ethics',
                'Political Theory',
                'Education',
            ],
            'demo-data:nationality' => 'Chinese',
            'dcterms:language' => 'Classical Chinese',
            'dcterms:temporal' => 'Spring and Autumn Period',
            'demo-data:birthDate' => [
                '@value' => '-0551',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '-0479',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Zou, State of Lu (modern Shandong, China)',
            'demo-data:deathPlace' => 'State of Lu (modern Shandong, China)',
            'map_coordinates' => [
                117,
                35.6,
            ],
            'media' => [
                [
                    'file' => 'confucius.jpg',
                    'dcterms:title' => 'Confucius',
                ],
            ],
        ],
        [
            'id' => 'archimedes',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'zhang-heng',
                'al-khwarizmi',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q8739',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Archimedes',
                [
                    '@value' => 'Αρχιμήδης',
                    '@language' => 'el',
                ],
            ],
            'dcterms:alternative' => 'Archimedes of Syracuse',
            'demo-data:knownFor' => 'Principle of buoyancy; methods anticipating integral calculus; design of war machines defending Syracuse against Rome',
            'dcterms:description' => 'Greek mathematician, physicist, and engineer from Syracuse who made foundational contributions to geometry, hydrostatics, and mechanics. His method of exhaustion anticipated integral calculus by nearly two thousand years, and his practical inventions — from the Archimedes screw to war machines — were equally celebrated in antiquity.',
            'dcterms:subject' => [
                'Mathematics',
                'Physics',
                'Engineering',
            ],
            'demo-data:nationality' => 'Ancient Greek',
            'dcterms:language' => 'Ancient Greek',
            'dcterms:temporal' => 'Hellenistic Period',
            'demo-data:birthDate' => [
                '@value' => '-0287',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '-0212',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Syracuse, Magna Graecia (modern Sicily)',
            'demo-data:deathPlace' => 'Syracuse, Magna Graecia',
            'map_coordinates' => [
                15.2866,
                37.0755,
            ],
            'media' => [
                [
                    'file' => 'archimedes.jpg',
                    'dcterms:title' => 'Archimedes',
                ],
            ],
        ],
        [
            'id' => 'ashoka',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'confucius',
                'sundiata-keita',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q8589',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Ashoka',
                [
                    '@value' => 'अशोकः',
                    '@language' => 'sa',
                ],
            ],
            'dcterms:alternative' => [
                'Ashoka the Great',
                'Priyadarshi',
                'Devanampiya',
            ],
            'demo-data:knownFor' => 'Third Maurya emperor; converted to Buddhism after the Kalinga War and promoted nonviolence, religious tolerance, and welfare across the largest empire in Indian history',
            'dcterms:description' => 'Maurya emperor who, horrified by the carnage of his conquest of Kalinga, renounced warfare, converted to Buddhism, and devoted the rest of his reign to welfare, religious tolerance, and justice. His Edicts — carved on rocks and pillars across the subcontinent — are the earliest surviving royal proclamations in South Asia.',
            'dcterms:subject' => [
                'Rulership',
                'Buddhism',
                'Philosophy',
                'Governance',
            ],
            'demo-data:nationality' => 'Indian (Mauryan)',
            'dcterms:language' => [
                'Pali',
                'Sanskrit',
                'Prakrit',
            ],
            'dcterms:temporal' => 'Maurya Empire',
            'demo-data:birthDate' => [
                '@value' => '-0304',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '-0232',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Pataliputra, Maurya Empire (modern Patna, India)',
            'demo-data:deathPlace' => 'Pataliputra, Maurya Empire',
            'map_coordinates' => [
                85.1376,
                25.5941,
            ],
            'media' => [
                [
                    'file' => 'ashoka.jpg',
                    'dcterms:title' => 'Ashoka',
                ],
            ],
        ],
        [
            'id' => 'zhang-heng',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'archimedes',
                'confucius',
                'ibn-al-haytham',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q197206',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Zhang Heng',
                [
                    '@value' => '张衡',
                    '@language' => 'zh',
                ],
            ],
            'dcterms:alternative' => [
                'Chang Heng',
                'Pingzi',
            ],
            'demo-data:knownFor' => 'Invented the world\'s first seismoscope; produced the first mathematical value for pi in China; mapped over 2,500 stars',
            'dcterms:description' => 'Han Dynasty polymath, astronomer, mathematician, inventor, engineer, and poet who served as Chief Astronomer to the imperial court. His rotating celestial globe, water-powered armillary sphere, and seismoscope were centuries ahead of comparable instruments elsewhere in the world.',
            'dcterms:subject' => [
                'Astronomy',
                'Mathematics',
                'Engineering',
                'Poetry',
            ],
            'demo-data:nationality' => 'Chinese',
            'dcterms:language' => 'Classical Chinese',
            'dcterms:temporal' => 'Han Dynasty',
            'demo-data:birthDate' => [
                '@value' => '0078',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '0139',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Nanyang, Han China (modern Henan, China)',
            'demo-data:deathPlace' => 'Luoyang, Han China',
            'map_coordinates' => [
                112.5292,
                33,
            ],
            'media' => [
                [
                    'file' => 'zhang-heng.jpg',
                    'dcterms:title' => 'Zhang Heng',
                ],
            ],
        ],
        [
            'id' => 'zenobia',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'cleopatra-vii',
                'queen-nzinga',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q189687',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Zenobia',
            'dcterms:alternative' => [
                'Septimia Zenobia',
                'Queen of the East',
                'Bath Zabbai',
            ],
            'demo-data:knownFor' => 'Queen of the Palmyrene Empire who conquered Roman Egypt and much of the Roman East before being defeated by Emperor Aurelian',
            'dcterms:description' => 'Queen of Palmyra who, ruling as regent for her son, launched a military expansion that seized Roman Egypt, Syria, and much of Anatolia, proclaiming a rival empire. Defeated and captured by Aurelian in 273 CE, she was taken to Rome but spared death and lived out her life in dignity.',
            'dcterms:subject' => [
                'Rulership',
                'Warfare',
                'Diplomacy',
            ],
            'demo-data:nationality' => 'Palmyrene (Syrian)',
            'dcterms:language' => [
                'Aramaic',
                'Greek',
                'Latin',
                'Egyptian',
            ],
            'dcterms:temporal' => 'Crisis of the Third Century',
            'demo-data:birthDate' => [
                '@value' => '0240',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '0274',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Palmyra, Roman Syria (modern Syria)',
            'demo-data:deathPlace' => 'Tibur (Tivoli), Roman Empire',
            'map_coordinates' => [
                38.2669,
                34.5503,
            ],
            'media' => [
                [
                    'file' => 'zenobia.jpg',
                    'dcterms:title' => 'Zenobia',
                ],
            ],
        ],
        [
            'id' => 'theodora',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'wu-zetian',
                'zenobia',
                'queen-nzinga',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q44978',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Theodora',
                [
                    '@value' => 'Θεοδώρα',
                    '@language' => 'el',
                ],
            ],
            'dcterms:alternative' => 'Empress Theodora',
            'demo-data:knownFor' => 'Byzantine empress who co-ruled with Justinian I; her intervention during the Nika riots saved the Empire; champion of women\'s legal rights',
            'dcterms:description' => 'Rising from humble origins as an actress, she became empress of the Byzantine Empire and its most influential ruler alongside Justinian I. During the Nika riots of 532 her refusal to flee — "the purple is a fine shroud" — saved the regime. She expanded women\'s rights, reformed laws on trafficking, and shaped doctrinal policy.',
            'dcterms:subject' => [
                'Rulership',
                'Politics',
                'Law',
                'Diplomacy',
            ],
            'demo-data:nationality' => 'Byzantine Greek',
            'dcterms:language' => 'Greek',
            'dcterms:temporal' => 'Byzantine Empire',
            'demo-data:birthDate' => [
                '@value' => '0497',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '0548',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Constantinople (modern Istanbul), Byzantine Empire',
            'demo-data:deathPlace' => 'Constantinople, Byzantine Empire',
            'map_coordinates' => [
                28.9784,
                41.0082,
            ],
            'media' => [
                [
                    'file' => 'theodora.jpg',
                    'dcterms:title' => 'Theodora',
                ],
            ],
        ],
        [
            'id' => 'fatima-al-fihri',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'al-khwarizmi',
                'hildegard-of-bingen',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q182363',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Fatima al-Fihri',
                [
                    '@value' => 'فاطمة بنت محمد الفهري',
                    '@language' => 'ar',
                ],
            ],
            'dcterms:alternative' => [
                'Fatima bint Muhammad al-Fihri',
                'Umm al-Banin',
            ],
            'demo-data:knownFor' => 'Founded the University of al-Qarawiyyin in Fez in 859 CE — the oldest continuously operating university in the world',
            'dcterms:description' => 'Moroccan Muslim woman who used her inheritance to fund the construction of a mosque and madrasa in Fez that grew into al-Qarawiyyin, recognised by UNESCO and the Guinness World Records as the world\'s oldest continuously operating university. She oversaw the construction herself and fasted throughout the building period.',
            'dcterms:subject' => [
                'Education',
                'Religion',
                'Philanthropy',
            ],
            'demo-data:nationality' => 'Moroccan (Ifriqiyan)',
            'dcterms:language' => 'Arabic',
            'dcterms:temporal' => 'Islamic Golden Age',
            'demo-data:birthDate' => [
                '@value' => '0800',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '0880',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Kairouan, Aghlabid Emirate (modern Tunisia)',
            'demo-data:deathPlace' => 'Fez, Idrisid dynasty (modern Morocco)',
            'map_coordinates' => [
                10.1,
                35.6781,
            ],
            'media' => [
                [
                    'file' => 'fatima-al-fihri.jpg',
                    'dcterms:title' => 'Fatima al-Fihri',
                ],
            ],
        ],
        [
            'id' => 'razia-sultana',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'wu-zetian',
                'theodora',
                'queen-nzinga',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q465076',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Razia Sultana',
                [
                    '@value' => 'رضیہ سلطانہ',
                    '@language' => 'ur',
                ],
            ],
            'dcterms:alternative' => [
                'Razia al-Din',
                'Raziyya',
                'Sultan Razia',
            ],
            'demo-data:knownFor' => 'First female Sultan of the Delhi Sultanate and the first female Muslim ruler in South Asia; administered justice from an open court without a veil',
            'dcterms:description' => 'Appointed by her father Iltutmish over her brothers, she ruled the Delhi Sultanate for four years, riding elephants into battle and holding open court unveiled. Her reign was cut short by a noble revolt, but she is remembered as a capable ruler who challenged gender conventions at every turn.',
            'dcterms:subject' => [
                'Rulership',
                'Military',
                'Governance',
            ],
            'demo-data:nationality' => 'Turkic Indian',
            'dcterms:language' => [
                'Persian',
                'Turkish',
            ],
            'dcterms:temporal' => 'Delhi Sultanate',
            'demo-data:birthDate' => [
                '@value' => '1205',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1240',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Delhi, Delhi Sultanate (modern India)',
            'demo-data:deathPlace' => 'Kaithal, Delhi Sultanate (modern Haryana, India)',
            'map_coordinates' => [
                77.209,
                28.6139,
            ],
            'media' => [
                [
                    'file' => 'razia-sultana.jpg',
                    'dcterms:title' => 'Razia Sultana',
                ],
            ],
        ],
        [
            'id' => 'mirabai',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'rumi',
                'sor-juana',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q113809924',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Mirabai',
            'dcterms:alternative' => [
                'Meera',
                'Mira Bai',
                'Sant Mirabai',
            ],
            'demo-data:knownFor' => 'Devotional bhakti poetry dedicated to Krishna; defied caste and gender constraints to become one of India\'s most beloved poet-saints',
            'dcterms:description' => 'Rajput princess and poet-saint who abandoned royal life to wander as a devotee of Krishna. Her bhajans — devotional songs — transcend region and era and are still sung across South Asia. Her life of spiritual independence in defiance of social and family expectations made her a symbol of individual devotion over convention.',
            'dcterms:subject' => [
                'Poetry',
                'Religion',
                'Music',
                'Bhakti Movement',
            ],
            'demo-data:nationality' => 'Rajput Indian',
            'dcterms:language' => [
                'Rajasthani',
                'Braj Bhasha',
                'Hindi',
            ],
            'dcterms:temporal' => 'Mughal Era',
            'demo-data:birthDate' => [
                '@value' => '1498',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1547',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Kudki, Rajputana (modern Rajasthan, India)',
            'demo-data:deathPlace' => 'Dwarka, Gujarat, India',
            'map_coordinates' => [
                72.8397,
                26,
            ],
            'media' => [
                [
                    'file' => 'mirabai.jpg',
                    'dcterms:title' => 'Mirabai',
                ],
            ],
        ],
        [
            'id' => 'suleiman-the-magnificent',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'akbar',
                'mansa-musa',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q8474',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Suleiman the Magnificent',
            'dcterms:alternative' => [
                'Suleiman I',
                'Kanuni Sultan Süleyman',
                'Suleiman the Lawgiver',
            ],
            'demo-data:knownFor' => 'Longest-reigning Ottoman sultan; oversaw the empire\'s territorial and cultural zenith; reformed the legal system earning the title "the Lawgiver"',
            'dcterms:description' => 'Tenth and longest-reigning sultan of the Ottoman Empire, under whom the empire reached its greatest geographical extent, stretching from Hungary to the Persian Gulf. Known in the Islamic world as "the Lawgiver" for his sweeping legal reforms, he was also a poet and patron of the arts who transformed Istanbul.',
            'dcterms:subject' => [
                'Rulership',
                'Law',
                'Military',
                'Architecture',
            ],
            'demo-data:nationality' => 'Ottoman Turkish',
            'dcterms:language' => [
                'Ottoman Turkish',
                'Arabic',
                'Persian',
            ],
            'dcterms:temporal' => 'Ottoman Empire',
            'demo-data:birthDate' => [
                '@value' => '1494',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1566',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Trabzon, Ottoman Empire (modern Turkey)',
            'demo-data:deathPlace' => 'Szigetvár, Kingdom of Hungary',
            'map_coordinates' => [
                39.7258,
                41.0027,
            ],
            'media' => [
                [
                    'file' => 'suleiman-the-magnificent.jpg',
                    'dcterms:title' => 'Suleiman the Magnificent',
                ],
            ],
        ],
        [
            'id' => 'akbar',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'suleiman-the-magnificent',
                'mirabai',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q8597',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Akbar',
                [
                    '@value' => 'اکبر کبیر',
                    '@language' => 'fa',
                ],
            ],
            'dcterms:alternative' => [
                'Akbar the Great',
                'Jalaluddin Muhammad Akbar',
                'Shahanshah Akbar',
            ],
            'demo-data:knownFor' => 'Greatest Mughal emperor; expanded and consolidated the empire; established Din-i-Ilahi — a syncretic religious philosophy promoting tolerance among Hindus, Muslims, and others',
            'dcterms:description' => 'Third Mughal emperor who consolidated and expanded the empire across most of the Indian subcontinent. Himself illiterate, he patronized scholarship in multiple languages and religions, held interfaith dialogues at his court, abolished the jizya tax on non-Muslims, and married a Rajput princess as part of a deliberate policy of religious inclusion.',
            'dcterms:subject' => [
                'Rulership',
                'Religious Tolerance',
                'Governance',
                'Military',
            ],
            'demo-data:nationality' => 'Mughal (Turco-Mongol)',
            'dcterms:language' => [
                'Persian',
                'Hindustani',
                'Turkish',
            ],
            'dcterms:temporal' => 'Mughal Empire',
            'demo-data:birthDate' => [
                '@value' => '1542',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1605',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Umerkot, Sindh (modern Pakistan)',
            'demo-data:deathPlace' => 'Fatehpur Sikri, Mughal Empire (modern India)',
            'map_coordinates' => [
                69.736,
                25.3619,
            ],
            'media' => [
                [
                    'file' => 'akbar.jpg',
                    'dcterms:title' => 'Akbar',
                ],
            ],
        ],
        [
            'id' => 'yi-sun-sin',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'zheng-he',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q50184',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Yi Sun-sin',
                [
                    '@value' => '이순신',
                    '@language' => 'ko',
                ],
            ],
            'dcterms:alternative' => [
                'Admiral Yi',
                'Yi Sunsin',
            ],
            'demo-data:knownFor' => 'Undefeated Korean admiral who repelled two Japanese invasions using the world\'s first iron-clad warships (turtle ships)',
            'dcterms:description' => 'Joseon Dynasty admiral who commanded Korea\'s naval defense against Toyotomi Hideyoshi\'s invasions, winning every engagement he fought despite being outnumbered. His invention of the geobukseon (turtle ship) and his tactical brilliance at battles like Hansan Island and Noryang made him one of history\'s greatest naval commanders.',
            'dcterms:subject' => [
                'Military',
                'Naval Warfare',
                'Engineering',
            ],
            'demo-data:nationality' => 'Korean',
            'dcterms:language' => 'Korean',
            'dcterms:temporal' => 'Joseon Dynasty',
            'demo-data:birthDate' => [
                '@value' => '1545',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1598',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Hanseong (modern Seoul), Joseon Korea',
            'demo-data:deathPlace' => 'Noryang, Joseon Korea',
            'map_coordinates' => [
                126.978,
                37.5665,
            ],
            'media' => [
                [
                    'file' => 'yi-sun-sin.jpg',
                    'dcterms:title' => 'Yi Sun-sin',
                ],
            ],
        ],
        [
            'id' => 'toussaint-louverture',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'frederick-douglass',
                'harriet-tubman',
                'tecumseh',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q205783',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Toussaint Louverture',
            'dcterms:alternative' => [
                'François-Dominique Toussaint Louverture',
                'The Black Napoleon',
            ],
            'demo-data:knownFor' => 'Led the Haitian Revolution — the only successful slave revolt in history, resulting in Haiti becoming the first Black republic',
            'dcterms:description' => 'Born enslaved on Saint-Domingue, he became the dominant military and political leader of the Haitian Revolution, defeating French, Spanish, and British forces in turn. Though captured by Napoleon\'s forces through treachery and dying in prison, the revolution he launched produced the first free Black republic in the Americas in 1804.',
            'dcterms:subject' => [
                'Activism',
                'Military',
                'Politics',
                'Abolitionism',
            ],
            'demo-data:nationality' => 'Haitian',
            'dcterms:language' => [
                'French',
                'Haitian Creole',
            ],
            'dcterms:temporal' => 'Age of Revolution',
            'demo-data:birthDate' => [
                '@value' => '1743',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1803',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Bréda plantation, Saint-Domingue (modern Haiti)',
            'demo-data:deathPlace' => 'Fort de Joux, France',
            'map_coordinates' => [
                -72.3388,
                19.45,
            ],
            'media' => [
                [
                    'file' => 'toussaint-louverture.jpg',
                    'dcterms:title' => 'Toussaint Louverture',
                ],
            ],
        ],
        [
            'id' => 'tecumseh',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'toussaint-louverture',
                'pachacuti',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q257808',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Tecumseh',
            'dcterms:alternative' => [
                'Tecumtha',
                'Shooting Star',
            ],
            'demo-data:knownFor' => 'Shawnee leader who built the largest pan-tribal confederacy in North American history to resist U.S. expansion',
            'dcterms:description' => 'Shawnee war leader and statesman who traveled thousands of miles to unite tribes from the Great Lakes to the Gulf of Mexico into a confederacy against American expansion. He allied with the British in the War of 1812 and was killed at the Battle of the Thames. Even his enemies praised his humanity — he forbade the torture and killing of prisoners.',
            'dcterms:subject' => [
                'Military',
                'Diplomacy',
                'Politics',
            ],
            'demo-data:nationality' => 'Shawnee',
            'dcterms:language' => [
                'Shawnee',
                'English',
            ],
            'dcterms:temporal' => 'Age of Revolution',
            'demo-data:birthDate' => [
                '@value' => '1768',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1813',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Old Piqua, Ohio (modern United States)',
            'demo-data:deathPlace' => 'Moraviantown, Upper Canada (modern Ontario, Canada)',
            'map_coordinates' => [
                -84,
                39.9612,
            ],
            'media' => [
                [
                    'file' => 'tecumseh.jpg',
                    'dcterms:title' => 'Tecumseh',
                ],
            ],
        ],
        [
            'id' => 'sojourner-truth',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'harriet-tubman',
                'frederick-douglass',
                'mary-wollstonecraft',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q105180',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Sojourner Truth',
            'dcterms:alternative' => [
                'Isabella Baumfree',
                'Isabella Van Wagener',
            ],
            'demo-data:knownFor' => '"Ain\'t I a Woman?" speech (1851) — landmark address at the intersection of abolitionism and women\'s rights',
            'dcterms:description' => 'Born into slavery in New York, she escaped in 1826 and became one of the most electrifying orators of the abolitionist movement. Her Ain\'t I a Woman? speech challenged white suffragists who excluded Black women from their movement. She met Abraham Lincoln at the White House and worked to resettle freed slaves during Reconstruction.',
            'dcterms:subject' => [
                'Activism',
                'Abolitionism',
                'Suffrage',
            ],
            'demo-data:nationality' => 'American',
            'dcterms:language' => [
                'English',
                'Dutch',
            ],
            'dcterms:temporal' => 'Antebellum and Civil War Era',
            'demo-data:birthDate' => [
                '@value' => '1797',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1883',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Swartekill, New York, United States',
            'demo-data:deathPlace' => 'Battle Creek, Michigan, United States',
            'map_coordinates' => [
                -73.9726,
                41.739,
            ],
            'media' => [
                [
                    'file' => 'sojourner-truth.jpg',
                    'dcterms:title' => 'Sojourner Truth',
                ],
            ],
        ],
        [
            'id' => 'yaa-asantewaa',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'queen-nzinga',
                'harriet-tubman',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q467803',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Yaa Asantewaa',
            'dcterms:alternative' => [
                'Yaa Asantewaah',
                'Mother of the War of the Golden Stool',
            ],
            'demo-data:knownFor' => 'Led the War of the Golden Stool (1900) against British colonial rule — the last major war on the Gold Coast to be led by a woman',
            'dcterms:description' => 'Queen Mother of Ejisu in the Ashanti Empire who, when male chiefs hesitated to resist British demands for the sacred Golden Stool, shamed them into action with a famous speech and took command of the resistance herself. She led the Ashanti forces for months before her capture and exile to the Seychelles.',
            'dcterms:subject' => [
                'Activism',
                'Military',
                'Rulership',
            ],
            'demo-data:nationality' => 'Ashanti (Ghanaian)',
            'dcterms:language' => 'Twi',
            'dcterms:temporal' => 'Colonial Era',
            'demo-data:birthDate' => [
                '@value' => '1840',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1921',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Besease, Ashanti Empire (modern Ghana)',
            'demo-data:deathPlace' => 'Seychelles (in exile)',
            'map_coordinates' => [
                -1.6083,
                6.6885,
            ],
            'media' => [
                [
                    'file' => 'yaa-asantewaa.jpg',
                    'dcterms:title' => 'Yaa Asantewaa',
                ],
            ],
        ],
        [
            'id' => 'nikola-tesla',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'ada-lovelace',
                'marie-curie',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q9036',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Nikola Tesla',
                [
                    '@value' => 'Никола Тесла',
                    '@language' => 'sr',
                ],
            ],
            'dcterms:alternative' => [
                'Никола Тесла',
            ],
            'demo-data:knownFor' => 'Alternating current (AC) electrical system; induction motor; Tesla coil; foundational patents that electrified the modern world',
            'dcterms:description' => 'Serbian-American inventor and electrical engineer whose development of alternating current power transmission, the induction motor, and the Tesla coil underpins the modern electrical grid. His conflict with Edison over AC versus DC power became one of the most famous rivalries in the history of technology.',
            'dcterms:subject' => [
                'Engineering',
                'Physics',
                'Electricity',
            ],
            'demo-data:nationality' => 'Serbian American',
            'dcterms:language' => [
                'Serbian',
                'English',
                'French',
                'German',
            ],
            'dcterms:temporal' => 'Gilded Age',
            'demo-data:birthDate' => [
                '@value' => '1856',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1943',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Smiljan, Austrian Empire (modern Croatia)',
            'demo-data:deathPlace' => 'New York City, United States',
            'map_coordinates' => [
                15.3167,
                44.5667,
            ],
            'media' => [
                [
                    'file' => 'nikola-tesla.jpeg',
                    'dcterms:title' => 'Nikola Tesla',
                ],
            ],
        ],
        [
            'id' => 'ida-b-wells',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
                'arts-literature',
            ],
            'relations' => [
                'frederick-douglass',
                'sojourner-truth',
                'web-du-bois',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q289428',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Ida B. Wells',
            'dcterms:alternative' => [
                'Ida Bell Wells-Barnett',
                'Princess of the Press',
            ],
            'demo-data:knownFor' => 'Pioneering investigative journalism exposing the reality of lynching in the American South; co-founder of the NAACP',
            'dcterms:description' => 'African American journalist, suffragist, and civil rights activist who launched the first serious statistical investigation of lynching in the United States, publishing Southern Horrors (1892) and The Red Record (1895) at personal risk. She was a co-founder of the NAACP and a tireless campaigner for racial and gender equality.',
            'dcterms:subject' => [
                'Journalism',
                'Activism',
                'Civil Rights',
            ],
            'demo-data:nationality' => 'American',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Gilded Age',
            'demo-data:birthDate' => [
                '@value' => '1862',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1931',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Holly Springs, Mississippi, United States',
            'demo-data:deathPlace' => 'Chicago, Illinois, United States',
            'map_coordinates' => [
                -89.4673,
                34.7726,
            ],
            'media' => [
                [
                    'file' => 'ida-b-wells.jpg',
                    'dcterms:title' => 'Ida B. Wells',
                ],
            ],
        ],
        [
            'id' => 'marie-curie',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'ada-lovelace',
                'nikola-tesla',
                'srinivasa-ramanujan',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q6762812',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Marie Curie',
            'dcterms:alternative' => [
                'Maria Skłodowska-Curie',
                'Madame Curie',
                'Maria Skłodowska',
            ],
            'demo-data:knownFor' => 'First woman to win a Nobel Prize; only person to win in two different sciences (Physics 1903, Chemistry 1911); discovered polonium and radium',
            'dcterms:description' => 'Polish-French physicist and chemist who pioneered research into radioactivity — a term she coined — and discovered the elements polonium and radium. The first woman to win a Nobel Prize and still the only person to win in two scientific fields, she also established mobile X-ray units during the First World War.',
            'dcterms:subject' => [
                'Physics',
                'Chemistry',
                'Radioactivity',
            ],
            'demo-data:nationality' => 'Polish French',
            'dcterms:language' => [
                'Polish',
                'French',
                'Russian',
            ],
            'dcterms:temporal' => 'Gilded Age',
            'demo-data:birthDate' => [
                '@value' => '1867',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1934',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Warsaw, Congress Poland (modern Poland)',
            'demo-data:deathPlace' => 'Passy, France',
            'map_coordinates' => [
                21.0122,
                52.2297,
            ],
            'media' => [
                [
                    'file' => 'marie-curie.jpg',
                    'dcterms:title' => 'Marie Curie',
                ],
            ],
        ],
        [
            'id' => 'web-du-bois',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
                'arts-literature',
            ],
            'relations' => [
                'frederick-douglass',
                'ida-b-wells',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q158060',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'W. E. B. Du Bois',
            'dcterms:alternative' => [
                'William Edward Burghardt Du Bois',
            ],
            'demo-data:knownFor' => 'The Souls of Black Folk (1903); first African American to earn a Harvard PhD; co-founder of the NAACP; theorist of the "double consciousness" and the "color line"',
            'dcterms:description' => 'American sociologist, historian, and activist who was the leading intellectual voice for African American civil rights for over half a century. His concept of "double consciousness" — the sense of always seeing oneself through the eyes of others — remains one of the most penetrating analyses of the Black American experience.',
            'dcterms:subject' => [
                'Sociology',
                'History',
                'Activism',
                'Literature',
            ],
            'demo-data:nationality' => 'American',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Gilded Age',
            'demo-data:birthDate' => [
                '@value' => '1868',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1963',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Great Barrington, Massachusetts, United States',
            'demo-data:deathPlace' => 'Accra, Ghana',
            'map_coordinates' => [
                -73.3604,
                42.1959,
            ],
            'media' => [
                [
                    'file' => 'web-du-bois.jpg',
                    'dcterms:title' => 'W. E. B. Du Bois',
                ],
            ],
        ],
        [
            'id' => 'srinivasa-ramanujan',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'isaac-newton',
                'marie-curie',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q83163',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Srinivasa Ramanujan',
                [
                    '@value' => 'இராமானுசன்',
                    '@language' => 'ta',
                ],
            ],
            'dcterms:alternative' => [
                'Srinivasa Ramanujan Aiyangar',
            ],
            'demo-data:knownFor' => 'Self-taught mathematical genius who produced thousands of original theorems in number theory, infinite series, and continued fractions, many still unproven at his death',
            'dcterms:description' => 'Tamil mathematician who, with almost no formal training, made extraordinary contributions to mathematical analysis, number theory, and infinite series. Discovered by the Cambridge mathematician G. H. Hardy, he produced roughly 3,900 results during his short life, many of profound originality that mathematicians are still working through today.',
            'dcterms:subject' => [
                'Mathematics',
                'Number Theory',
            ],
            'demo-data:nationality' => 'Indian',
            'dcterms:language' => [
                'Tamil',
                'English',
            ],
            'dcterms:temporal' => 'Edwardian Era',
            'demo-data:birthDate' => [
                '@value' => '1887',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1920',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Erode, Madras Presidency, British India (modern Tamil Nadu, India)',
            'demo-data:deathPlace' => 'Kumbakonam, Madras Presidency, British India',
            'map_coordinates' => [
                77.7172,
                11.341,
            ],
            'media' => [
                [
                    'file' => 'srinivasa-ramanujan.jpg',
                    'dcterms:title' => 'Srinivasa Ramanujan',
                ],
            ],
        ],
        [
            'id' => 'aspasia',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'sappho',
                'hypatia',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q228564',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Aspasia',
                [
                    '@value' => 'Ασπασία',
                    '@language' => 'el',
                ],
            ],
            'dcterms:alternative' => 'Aspasia of Miletus',
            'demo-data:knownFor' => 'Influential philosopher and rhetorician in Classical Athens; companion of Pericles; her salon attracted Socrates, Plato, and the leading minds of the age',
            'dcterms:description' => 'Milesian woman who became the most prominent female intellectual in Classical Athens, where women were legally excluded from public life. As companion to the statesman Pericles she hosted a celebrated philosophical salon and was credited by Plato and Socrates as a teacher of rhetoric. Her influence on Athenian political life was substantial enough to make her a target of comic playwrights.',
            'dcterms:subject' => [
                'Philosophy',
                'Rhetoric',
                'Politics',
            ],
            'demo-data:nationality' => 'Ancient Greek (Milesian)',
            'dcterms:language' => 'Ancient Greek',
            'dcterms:temporal' => 'Classical Greece',
            'demo-data:birthDate' => [
                '@value' => '-0470',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '-0400',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Miletus, Ancient Greece (modern Turkey)',
            'demo-data:deathPlace' => 'Athens, Ancient Greece',
            'map_coordinates' => [
                27.2784,
                37.5304,
            ],
            'media' => [
                [
                    'file' => 'aspasia.jpg',
                    'dcterms:title' => 'Aspasia',
                ],
            ],
        ],
        [
            'id' => 'nagarjuna',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'ashoka',
                'ibn-sina',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q3347300',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Nāgārjuna',
                [
                    '@value' => 'नागार्जुन',
                    '@language' => 'sa',
                ],
            ],
            'dcterms:alternative' => [
                'Nagarjuna',
                'Nāgārjuna Bodhisattva',
            ],
            'demo-data:knownFor' => 'Founded the Madhyamaka school of Buddhist philosophy; doctrine of śūnyatā (emptiness) — among the most influential philosophical works in Asian history',
            'dcterms:description' => 'Indian Buddhist philosopher and founder of the Madhyamaka (Middle Way) school, whose Mūlamadhyamakakārikā argued that all phenomena lack inherent existence — a radical position that reshaped Buddhist thought across South, East, and Southeast Asia. He is regarded as a second Buddha in Tibetan, Chinese, and Japanese traditions.',
            'dcterms:subject' => [
                'Philosophy',
                'Buddhism',
                'Logic',
            ],
            'demo-data:nationality' => 'Indian',
            'dcterms:language' => 'Sanskrit',
            'dcterms:temporal' => 'Kushan Empire',
            'demo-data:birthDate' => [
                '@value' => '0150',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '0250',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Vidarbha, India (modern Maharashtra)',
            'demo-data:deathPlace' => 'Nagarjunakonda, India (modern Andhra Pradesh)',
            'map_coordinates' => [
                78,
                20,
            ],
            'media' => [
                [
                    'file' => 'nagarjuna.jpg',
                    'dcterms:title' => 'Nāgārjuna',
                ],
            ],
        ],
        [
            'id' => 'hannibal',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'archimedes',
                'ashoka',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q36456',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Hannibal Barca',
            'dcterms:alternative' => [
                'Hannibal',
                'Hannibal of Carthage',
            ],
            'demo-data:knownFor' => 'Led the Carthaginian army across the Alps with war elephants; annihilated a Roman army at the Battle of Cannae — studied by military commanders ever since',
            'dcterms:description' => 'Carthaginian general and statesman considered one of the greatest military commanders in history. His Second Punic War campaign — crossing the Alps and winning a series of stunning victories culminating in Cannae, where he encircled and destroyed a Roman army twice his size — remains a masterclass in tactical encirclement studied in military academies today.',
            'dcterms:subject' => [
                'Military',
                'Strategy',
                'Politics',
            ],
            'demo-data:nationality' => 'Carthaginian',
            'dcterms:language' => [
                'Punic',
                'Greek',
            ],
            'dcterms:temporal' => 'Hellenistic Period',
            'demo-data:birthDate' => [
                '@value' => '-0247',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '-0183',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Carthage (modern Tunisia)',
            'demo-data:deathPlace' => 'Libyssa, Bithynia (modern Turkey)',
            'map_coordinates' => [
                10.3233,
                36.8565,
            ],
            'media' => [
                [
                    'file' => 'hannibal.jpg',
                    'dcterms:title' => 'Hannibal Barca',
                ],
            ],
        ],
        [
            'id' => 'boudicca',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'zenobia',
                'trung-trac',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q71352061',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Boudicca',
            'dcterms:alternative' => [
                'Boudica',
                'Boadicea',
            ],
            'demo-data:knownFor' => 'Led the most serious uprising against Roman rule in Britain, sacking Camulodunum (Colchester), Londinium (London), and Verulamium (St Albans)',
            'dcterms:description' => 'Queen of the Iceni tribe in Roman Britain who led a revolt after Roman authorities flogged her and assaulted her daughters following her husband\'s death. Her coalition of tribes destroyed three Roman cities and killed tens of thousands before her final defeat by governor Paulinus. She remains a national symbol in Britain.',
            'dcterms:subject' => [
                'Military',
                'Rulership',
                'Resistance',
            ],
            'demo-data:nationality' => 'Celtic British (Iceni)',
            'dcterms:language' => 'Brythonic Celtic',
            'dcterms:temporal' => 'Roman Britain',
            'demo-data:birthDate' => [
                '@value' => '0025',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '0061',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'East Anglia, Roman Britain (modern England)',
            'demo-data:deathPlace' => 'Midlands, Roman Britain (modern England)',
            'map_coordinates' => [
                0.9,
                52.6,
            ],
            'media' => [
                [
                    'file' => 'boudicca.jpg',
                    'dcterms:title' => 'Boudicca',
                ],
            ],
        ],
        [
            'id' => 'trung-trac',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'boudicca',
                'yi-sun-sin',
                'queen-nzinga',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q10828670',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Trưng Trắc',
            'dcterms:alternative' => [
                'Trung Trac',
                'Lady Trưng',
                'Trưng Nữ Vương',
            ],
            'demo-data:knownFor' => 'Led the first Vietnamese independence movement against Han Chinese occupation, ruling as queen for three years',
            'dcterms:description' => 'Vietnamese noblewoman who, with her sister Trưng Nhị, raised an army after the execution of her husband by the Han governor and expelled the Chinese occupiers from over 65 fortresses, ruling as queen of an independent Vietnam from 40 to 43 CE. Defeated ultimately by the Han general Ma Yuan, the sisters are venerated as national heroes of Vietnam.',
            'dcterms:subject' => [
                'Military',
                'Rulership',
                'Resistance',
            ],
            'demo-data:nationality' => 'Vietnamese (Lạc)',
            'dcterms:language' => 'Vietnamese',
            'dcterms:temporal' => 'Han Dynasty occupation of Vietnam',
            'demo-data:birthDate' => [
                '@value' => '0012',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '0043',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Mê Linh, Han-controlled Vietnam (modern Vĩnh Phúc Province, Vietnam)',
            'demo-data:deathPlace' => 'Hát Giang River, Vietnam',
            'map_coordinates' => [
                105.7167,
                21.2,
            ],
            'media' => [
                [
                    'file' => 'trung-trac.jpg',
                    'dcterms:title' => 'Trưng Trắc',
                ],
            ],
        ],
        [
            'id' => 'omar-khayyam',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
                'arts-literature',
            ],
            'relations' => [
                'ibn-sina',
                'nasir-al-din-al-tusi',
                'rumi',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q1815018',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Omar Khayyam',
                [
                    '@value' => 'عمر خیام',
                    '@language' => 'fa',
                ],
            ],
            'dcterms:alternative' => [
                'Ghiyāth ad-Dīn Abū al-Fatḥ ʿUmar ibn Ibrāhīm Khayyām Nīshāpūrī',
            ],
            'demo-data:knownFor' => 'Rubaiyat — quatrains on fate, wine, and the good life; algebraic solution of cubic equations; reformed the Persian solar calendar to greater accuracy than the Gregorian',
            'dcterms:description' => 'Persian mathematician, astronomer, and poet whose algebraic work on cubic equations was the most advanced of the medieval world. His Jalali calendar, commissioned by the Seljuk sultan, was more accurate than the Gregorian calendar introduced five centuries later. His Rubaiyat quatrains became a sensation in Victorian England through Edward FitzGerald\'s translation.',
            'dcterms:subject' => [
                'Mathematics',
                'Astronomy',
                'Poetry',
            ],
            'demo-data:nationality' => 'Persian',
            'dcterms:language' => [
                'Persian',
                'Arabic',
            ],
            'dcterms:temporal' => 'Islamic Golden Age',
            'demo-data:birthDate' => [
                '@value' => '1048',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1131',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Nishapur, Khorasan (modern Iran)',
            'demo-data:deathPlace' => 'Nishapur, Khorasan (modern Iran)',
            'map_coordinates' => [
                58.7962,
                36.2136,
            ],
            'media' => [
                [
                    'file' => 'omar-khayyam.jpg',
                    'dcterms:title' => 'Omar Khayyam',
                ],
            ],
        ],
        [
            'id' => 'al-idrisi',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
                'exploration-geography',
            ],
            'relations' => [
                'ibn-battuta',
                'nasir-al-din-al-tusi',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q101914845',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Al-Idrisi',
            'dcterms:alternative' => [
                'Muhammad al-Idrisi',
                'Abu Abd Allah Muhammad al-Idrisi',
                'Dreses',
            ],
            'demo-data:knownFor' => 'Tabula Rogeriana (1154) — the most accurate world map of the medieval period, used by navigators for three centuries',
            'dcterms:description' => 'Arab geographer and cartographer who spent eighteen years at the Norman court of Roger II of Sicily compiling geographical knowledge from across the known world. His Tabula Rogeriana depicted the globe with south at the top, covered Eurasia and North Africa in unprecedented detail, and remained the standard world map for over two hundred years.',
            'dcterms:subject' => [
                'Geography',
                'Cartography',
                'Natural Science',
            ],
            'demo-data:nationality' => 'Moroccan Arab',
            'dcterms:language' => 'Arabic',
            'dcterms:temporal' => 'Islamic Golden Age',
            'demo-data:birthDate' => [
                '@value' => '1100',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1165',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Ceuta, Almoravid dynasty (modern Morocco)',
            'demo-data:deathPlace' => 'Ceuta (modern Morocco)',
            'map_coordinates' => [
                -5.3093,
                35.8897,
            ],
            'media' => [
                [
                    'file' => 'al-idrisi.jpg',
                    'dcterms:title' => 'Al-Idrisi',
                ],
            ],
        ],
        [
            'id' => 'ibn-khaldun',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'ibn-battuta',
                'al-idrisi',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q9294',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Ibn Khaldun',
                [
                    '@value' => 'ابن خلدون',
                    '@language' => 'ar',
                ],
            ],
            'dcterms:alternative' => [
                'Abd ar-Rahman ibn Khaldun',
                'Wali al-Din',
            ],
            'demo-data:knownFor' => 'Muqaddimah — first systematic philosophy of history and sociology; originator of the concept of asabiyyah (social cohesion) as the driver of historical change',
            'dcterms:description' => 'North African polymath and historian whose Muqaddimah (Introduction to History) established a new science of human civilization. Analyzing the rise and fall of empires through social, economic, and environmental forces rather than divine will, he is considered a founding figure of sociology, historiography, and economics — six centuries before their European development.',
            'dcterms:subject' => [
                'History',
                'Sociology',
                'Economics',
                'Philosophy',
            ],
            'demo-data:nationality' => 'Tunisian Arab',
            'dcterms:language' => 'Arabic',
            'dcterms:temporal' => 'Late Middle Ages',
            'demo-data:birthDate' => [
                '@value' => '1332',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1406',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Tunis, Hafsid Sultanate (modern Tunisia)',
            'demo-data:deathPlace' => 'Cairo, Mamluk Sultanate',
            'map_coordinates' => [
                10.1815,
                36.819,
            ],
            'media' => [
                [
                    'file' => 'ibn-khaldun.jpg',
                    'dcterms:title' => 'Ibn Khaldun',
                ],
            ],
        ],
        [
            'id' => 'afonso-i-kongo',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'sundiata-keita',
                'mansa-musa',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q383455',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Afonso I of Kongo',
            'dcterms:alternative' => [
                'Nzinga a Ntinu Wene',
                'Mvemba a Nzinga',
                'Dom Afonso',
            ],
            'demo-data:knownFor' => 'First Christian king of central Africa; established a literate court culture and wrote some of the earliest known letters from sub-Saharan Africa to a European head of state',
            'dcterms:description' => 'King of Kongo who converted to Christianity following Portuguese contact and built a sophisticated literate kingdom that corresponded directly with the Vatican and the Portuguese crown. His letters to King João III of Portugal protesting the slave trade are among the earliest documented African royal protests against European exploitation.',
            'dcterms:subject' => [
                'Rulership',
                'Diplomacy',
                'Religion',
            ],
            'demo-data:nationality' => 'Kongolese',
            'dcterms:language' => [
                'Kikongo',
                'Portuguese',
            ],
            'dcterms:temporal' => 'Early Modern',
            'demo-data:birthDate' => [
                '@value' => '1456',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1542',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Mbanza Kongo, Kingdom of Kongo (modern Angola)',
            'demo-data:deathPlace' => 'Mbanza Kongo, Kingdom of Kongo',
            'map_coordinates' => [
                14.25,
                -6.2667,
            ],
            'media' => [
                [
                    'file' => 'afonso-i-kongo.png',
                    'dcterms:title' => 'Afonso I of Kongo',
                ],
            ],
        ],
        [
            'id' => 'las-casas',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
                'arts-literature',
            ],
            'relations' => [
                'afonso-i-kongo',
                'sor-juana',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q5651653',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Bartolomé de las Casas',
            'dcterms:alternative' => [
                'Fray Bartolomé de las Casas',
                'Apostle of the Indies',
            ],
            'demo-data:knownFor' => 'A Short Account of the Destruction of the Indies (1542) — the first systematic denunciation of colonial atrocities and advocacy for the rights of indigenous peoples',
            'dcterms:description' => 'Spanish friar who arrived in the Caribbean as a colonist and slave owner, witnessed the brutal suppression of indigenous peoples, and underwent a moral transformation that led him to spend the rest of his life campaigning for indigenous rights. His detailed eyewitness accounts of colonial violence were the first systematic human rights documentation in the Americas.',
            'dcterms:subject' => [
                'Theology',
                'Activism',
                'History',
                'Human Rights',
            ],
            'demo-data:nationality' => 'Spanish',
            'dcterms:language' => 'Spanish',
            'dcterms:temporal' => 'Early Modern',
            'demo-data:birthDate' => [
                '@value' => '1484',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1566',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Seville, Crown of Castile (modern Spain)',
            'demo-data:deathPlace' => 'Madrid, Crown of Castile',
            'map_coordinates' => [
                -5.9845,
                37.3891,
            ],
            'media' => [
                [
                    'file' => 'las-casas.jpg',
                    'dcterms:title' => 'Bartolomé de las Casas',
                ],
            ],
        ],
        [
            'id' => 'elizabeth-i',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'suleiman-the-magnificent',
                'sor-juana',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q365749',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Elizabeth I',
            'dcterms:alternative' => [
                'Good Queen Bess',
                'The Virgin Queen',
                'Gloriana',
            ],
            'demo-data:knownFor' => 'Presided over the Elizabethan Era — England\'s golden age of literature, exploration, and music; defeated the Spanish Armada (1588)',
            'dcterms:description' => 'Queen of England and Ireland for 44 years, she navigated a fractured religious landscape, repelled the Spanish Armada, patronized Shakespeare and Marlowe, and oversaw England\'s emergence as a major maritime and commercial power. Highly educated and politically astute, she never married, deploying her status as a potential bride as a diplomatic instrument throughout her reign.',
            'dcterms:subject' => [
                'Rulership',
                'Diplomacy',
                'Politics',
            ],
            'demo-data:nationality' => 'English',
            'dcterms:language' => [
                'English',
                'Latin',
                'French',
                'Italian',
            ],
            'dcterms:temporal' => 'Elizabethan Era',
            'demo-data:birthDate' => [
                '@value' => '1533',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1603',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Greenwich Palace, Kingdom of England',
            'demo-data:deathPlace' => 'Richmond Palace, Kingdom of England',
            'map_coordinates' => [
                -0.0098,
                51.4822,
            ],
            'media' => [
                [
                    'file' => 'elizabeth-i.jpg',
                    'dcterms:title' => 'Elizabeth I',
                ],
            ],
        ],
        [
            'id' => 'kepler',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'copernicus',
                'galileo',
                'isaac-newton',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q8963',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Johannes Kepler',
            'dcterms:alternative' => [
                'Johann Kepler',
            ],
            'demo-data:knownFor' => 'Three laws of planetary motion — established that planets move in ellipses and laid the mathematical foundation for Newton\'s law of gravitation',
            'dcterms:description' => 'German astronomer and mathematician who used Tycho Brahe\'s precise observational data to derive the three laws of planetary motion, overturning two millennia of circular-orbit astronomy. His work bridged Copernicus\'s heliocentric hypothesis and Newton\'s gravitational theory, making him a pivotal figure in the Scientific Revolution.',
            'dcterms:subject' => [
                'Astronomy',
                'Mathematics',
                'Physics',
            ],
            'demo-data:nationality' => 'German',
            'dcterms:language' => [
                'Latin',
                'German',
            ],
            'dcterms:temporal' => 'Scientific Revolution',
            'demo-data:birthDate' => [
                '@value' => '1571',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1630',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Weil der Stadt, Duchy of Württemberg (modern Germany)',
            'demo-data:deathPlace' => 'Regensburg, Holy Roman Empire',
            'map_coordinates' => [
                8.8717,
                48.75,
            ],
            'media' => [
                [
                    'file' => 'kepler.jpg',
                    'dcterms:title' => 'Johannes Kepler',
                ],
            ],
        ],
        [
            'id' => 'ching-shih',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'zheng-he',
                'queen-nzinga',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q266715',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Ching Shih',
                [
                    '@value' => '鄭一嫂',
                    '@language' => 'zh',
                ],
            ],
            'dcterms:alternative' => [
                'Zheng Yi Sao',
                'Cheng I Sao',
                'Shi Yang',
            ],
            'demo-data:knownFor' => 'Commanded the Red Flag Fleet of over 1,800 vessels and 80,000 sailors — the most powerful pirate fleet in history; negotiated a favorable retirement with the Chinese government',
            'dcterms:description' => 'Former sex worker who married the pirate Zheng Yi and, on his death, seized command of his fleet outright. Through military brilliance and strict codes of conduct she expanded the Red Flag Fleet into a maritime empire that defeated both Chinese imperial forces and the combined fleets of Portugal and Britain. She retired undefeated under a negotiated amnesty and died wealthy.',
            'dcterms:subject' => [
                'Military',
                'Maritime',
                'Governance',
            ],
            'demo-data:nationality' => 'Chinese',
            'dcterms:language' => 'Cantonese',
            'dcterms:temporal' => 'Qing Dynasty',
            'demo-data:birthDate' => [
                '@value' => '1775',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1844',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Guangdong, Qing China',
            'demo-data:deathPlace' => 'Canton (Guangzhou), Qing China',
            'map_coordinates' => [
                113.2644,
                23.1291,
            ],
            'media' => [
                [
                    'file' => 'ching-shih.jpg',
                    'dcterms:title' => 'Ching Shih',
                ],
            ],
        ],
        [
            'id' => 'olaudah-equiano',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
                'arts-literature',
            ],
            'relations' => [
                'frederick-douglass',
                'toussaint-louverture',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q379887',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Olaudah Equiano',
            'dcterms:alternative' => [
                'Gustavus Vassa',
                'The African',
            ],
            'demo-data:knownFor' => 'The Interesting Narrative of the Life of Olaudah Equiano (1789) — the first widely read slave narrative; instrumental in the British abolition movement',
            'dcterms:description' => 'Born in the Igbo-speaking region of West Africa (modern Nigeria) and enslaved as a child, he was transported to the Caribbean and Virginia, eventually purchased his own freedom and settled in Britain. His autobiography became a bestseller across Britain and America, putting the human reality of the slave trade before a mass audience and galvanizing abolitionists.',
            'dcterms:subject' => [
                'Literature',
                'Activism',
                'Abolitionism',
                'Autobiography',
            ],
            'demo-data:nationality' => 'Igbo Nigerian British',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Enlightenment',
            'demo-data:birthDate' => [
                '@value' => '1745',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1797',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Essaka, Kingdom of Benin (modern Nigeria)',
            'demo-data:deathPlace' => 'London, England',
            'map_coordinates' => [
                6.5,
                6,
            ],
            'media' => [
                [
                    'file' => 'olaudah-equiano.png',
                    'dcterms:title' => 'Olaudah Equiano',
                ],
            ],
        ],
        [
            'id' => 'simon-bolivar',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'toussaint-louverture',
                'tecumseh',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q8605',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Simón Bolívar',
            'dcterms:alternative' => [
                'El Libertador',
                'Simón José Antonio de la Santísima Trinidad Bolívar Palacios',
            ],
            'demo-data:knownFor' => 'Liberated six South American nations from Spanish colonial rule; conceived of a united Gran Colombia spanning the continent',
            'dcterms:description' => 'Venezuelan-born military and political leader who liberated present-day Venezuela, Colombia, Ecuador, Peru, Bolivia, and Panama from Spanish rule through a series of campaigns of extraordinary endurance and strategic daring. His vision of a united South America was never fully realized, but he remains the central figure of Latin American independence.',
            'dcterms:subject' => [
                'Military',
                'Politics',
                'Independence',
            ],
            'demo-data:nationality' => 'Venezuelan',
            'dcterms:language' => 'Spanish',
            'dcterms:temporal' => 'Age of Revolution',
            'demo-data:birthDate' => [
                '@value' => '1783',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1830',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Caracas, Captaincy General of Venezuela (modern Venezuela)',
            'demo-data:deathPlace' => 'Santa Marta, Gran Colombia (modern Colombia)',
            'map_coordinates' => [
                -66.9036,
                10.4806,
            ],
            'media' => [
                [
                    'file' => 'simon-bolivar.jpg',
                    'dcterms:title' => 'Simón Bolívar',
                ],
            ],
        ],
        [
            'id' => 'sacagawea',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'exploration-geography',
            ],
            'relations' => [
                'tecumseh',
                'ibn-battuta',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q238960',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Sacagawea',
            'dcterms:alternative' => [
                'Sakakawea',
                'Bird Woman',
            ],
            'demo-data:knownFor' => 'Shoshone interpreter and guide for the Lewis and Clark Expedition (1804–1806) — the first overland crossing of North America to the Pacific',
            'dcterms:description' => 'Shoshone woman who joined the Lewis and Clark Expedition while pregnant, served as interpreter, diplomat, and navigator across thousands of miles of unmapped territory to the Pacific and back. Her presence with an infant signaled peaceful intent to tribes the expedition encountered, making her indispensable to its survival and success.',
            'dcterms:subject' => [
                'Exploration',
                'Diplomacy',
                'Navigation',
            ],
            'demo-data:nationality' => 'Shoshone',
            'dcterms:language' => [
                'Shoshone',
                'Hidatsa',
                'French',
            ],
            'dcterms:temporal' => 'Age of Revolution',
            'demo-data:birthDate' => [
                '@value' => '1788',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1812',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Lemhi River valley, Shoshone territory (modern Idaho, United States)',
            'demo-data:deathPlace' => 'Fort Manuel, Missouri Territory (modern South Dakota, United States)',
            'map_coordinates' => [
                -113.8958,
                45.1699,
            ],
            'media' => [
                [
                    'file' => 'sacagawea.jpg',
                    'dcterms:title' => 'Sacagawea',
                ],
            ],
        ],
        [
            'id' => 'cixi',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'wu-zetian',
                'ching-shih',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q47842',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Empress Dowager Cixi',
                [
                    '@value' => '慈禧太后',
                    '@language' => 'zh',
                ],
            ],
            'dcterms:alternative' => [
                'Tzu Hsi',
                'Empress Dowager Tzu-hsi',
                'Holy Mother Empress Dowager',
            ],
            'demo-data:knownFor' => 'Effectively ruled China for 47 years as regent; modernized the Qing military and institutions while resisting wholesale Westernization',
            'dcterms:description' => 'Concubine of the Xianfeng Emperor who rose through court politics to become the dominant figure in Chinese government for nearly half a century, ruling as regent for two successive boy emperors. She oversaw the Hundred Days\' Reform, the Boxer Rebellion, and a programme of constitutional modernization in her final years, navigating China through a period of intense foreign pressure.',
            'dcterms:subject' => [
                'Rulership',
                'Politics',
                'Governance',
            ],
            'demo-data:nationality' => 'Chinese (Manchu)',
            'dcterms:language' => [
                'Manchu',
                'Chinese',
            ],
            'dcterms:temporal' => 'Late Qing Dynasty',
            'demo-data:birthDate' => [
                '@value' => '1835',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1908',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Beijing, Qing China',
            'demo-data:deathPlace' => 'Beijing, Qing China',
            'map_coordinates' => [
                116.3912,
                39.9042,
            ],
            'media' => [
                [
                    'file' => 'cixi.png',
                    'dcterms:title' => 'Empress Dowager Cixi',
                ],
            ],
        ],
        [
            'id' => 'mary-seacole',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'harriet-tubman',
                'yaa-asantewaa',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q963703',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Mary Seacole',
            'dcterms:alternative' => [
                'Mary Jane Seacole',
                'Mother Seacole',
            ],
            'demo-data:knownFor' => 'Established the British Hotel near Balaclava during the Crimean War to nurse sick and wounded soldiers; pioneering figure in nursing history',
            'dcterms:description' => 'Jamaican-British businesswoman, nurse, and traveler who funded her own passage to the Crimean War after the British War Office rejected her offer of service. She set up a "hotel" behind the front lines where she nursed the wounded of both sides, often under fire. Celebrated in her lifetime but largely forgotten until a late twentieth-century reassessment.',
            'dcterms:subject' => [
                'Medicine',
                'Nursing',
                'Entrepreneurship',
            ],
            'demo-data:nationality' => 'Jamaican British',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Victorian Era',
            'demo-data:birthDate' => [
                '@value' => '1805',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1881',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Kingston, Jamaica',
            'demo-data:deathPlace' => 'London, England',
            'map_coordinates' => [
                -76.7936,
                17.997,
            ],
            'media' => [
                [
                    'file' => 'mary-seacole.jpg',
                    'dcterms:title' => 'Mary Seacole',
                ],
            ],
        ],
        [
            'id' => 'lakshmibai',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'queen-nzinga',
                'yaa-asantewaa',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q130234684',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Lakshmibai',
            'dcterms:alternative' => [
                'Rani of Jhansi',
                'Manikarnika',
                'The Goddess of War',
            ],
            'demo-data:knownFor' => 'Led the defence of Jhansi during the Indian Rebellion of 1857; became the most celebrated figure of the uprising against British rule',
            'dcterms:description' => 'Queen of the princely state of Jhansi who refused British annexation after her husband\'s death and led the defense of the city during the 1857 Indian Rebellion. She fought on horseback, reportedly with her infant son tied to her back, and died in battle. She is one of India\'s most revered national heroes.',
            'dcterms:subject' => [
                'Military',
                'Rulership',
                'Resistance',
            ],
            'demo-data:nationality' => 'Indian (Maratha)',
            'dcterms:language' => [
                'Marathi',
                'Hindi',
            ],
            'dcterms:temporal' => 'Victorian Era',
            'demo-data:birthDate' => [
                '@value' => '1828',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1858',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Varanasi, Maratha Confederacy, British India',
            'demo-data:deathPlace' => 'Gwalior, Central India',
            'map_coordinates' => [
                82.9739,
                25.3176,
            ],
            'media' => [
                [
                    'file' => 'lakshmibai.jpg',
                    'dcterms:title' => 'Lakshmibai',
                ],
            ],
        ],
        [
            'id' => 'rabindranath-tagore',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'mahatma-gandhi',
                'srinivasa-ramanujan',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q7241',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Rabindranath Tagore',
                [
                    '@value' => 'রবীন্দ্রনাথ ঠাকুর',
                    '@language' => 'bn',
                ],
            ],
            'dcterms:alternative' => [
                'Gurudev',
                'Rabindranath Thakur',
            ],
            'demo-data:knownFor' => 'First non-European Nobel Laureate in Literature (1913); wrote the national anthems of both India and Bangladesh',
            'dcterms:description' => 'Bengali poet, novelist, playwright, composer, and philosopher who reshaped Bengali literature and music in the late nineteenth and early twentieth centuries. His Gitanjali (Song Offerings) brought him the Nobel Prize. He wrote over 2,000 songs, founded the Visva-Bharati University, and engaged directly in the political debates of Indian independence.',
            'dcterms:subject' => [
                'Poetry',
                'Literature',
                'Music',
                'Philosophy',
            ],
            'demo-data:nationality' => 'Indian (Bengali)',
            'dcterms:language' => [
                'Bengali',
                'English',
            ],
            'dcterms:temporal' => 'Colonial Era',
            'demo-data:birthDate' => [
                '@value' => '1861',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1941',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Jorasanko, Calcutta, British India (modern Kolkata, India)',
            'demo-data:deathPlace' => 'Jorasanko, Calcutta, British India',
            'map_coordinates' => [
                88.3639,
                22.5726,
            ],
            'media' => [
                [
                    'file' => 'rabindranath-tagore.jpg',
                    'dcterms:title' => 'Rabindranath Tagore',
                ],
            ],
        ],
        [
            'id' => 'lise-meitner',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'marie-curie',
                'emmy-noether',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q56189',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Lise Meitner',
            'dcterms:alternative' => [
                'Elise Meitner',
            ],
            'demo-data:knownFor' => 'Co-discoverer of nuclear fission; provided the theoretical explanation that element 109, meitnerium, is named in her honour',
            'dcterms:description' => 'Austrian-Swedish physicist who collaborated with Otto Hahn for thirty years on radioactivity research, co-discovering protactinium and nuclear fission. Forced to flee Nazi Germany in 1938, she worked out the theoretical explanation of fission while in exile in Sweden. Hahn received the Nobel Prize for the work; she was repeatedly overlooked, in one of the most discussed omissions in Nobel history.',
            'dcterms:subject' => [
                'Physics',
                'Nuclear Science',
            ],
            'demo-data:nationality' => 'Austrian Swedish',
            'dcterms:language' => [
                'German',
                'Swedish',
                'English',
            ],
            'dcterms:temporal' => 'Early 20th Century',
            'demo-data:birthDate' => [
                '@value' => '1878',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1968',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Vienna, Austria-Hungary',
            'demo-data:deathPlace' => 'Cambridge, England',
            'map_coordinates' => [
                16.3738,
                48.2082,
            ],
            'media' => [
                [
                    'file' => 'lise-meitner.jpg',
                    'dcterms:title' => 'Lise Meitner',
                ],
            ],
        ],
        [
            'id' => 'emmy-noether',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'marie-curie',
                'lise-meitner',
                'ada-lovelace',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q7099',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Emmy Noether',
            'dcterms:alternative' => [
                'Amalie Emmy Noether',
                'Mother of Abstract Algebra',
            ],
            'demo-data:knownFor' => 'Noether\'s theorem — fundamental to modern physics; transformed abstract algebra; Einstein called her the most significant creative mathematical genius yet produced',
            'dcterms:description' => 'German mathematician whose Noether\'s theorem, proving that every symmetry in nature corresponds to a conservation law, is one of the most important results in theoretical physics. Barred from university positions for being a woman, then expelled for being Jewish, she rebuilt her career twice — first in Göttingen and then at Bryn Mawr — and transformed the landscape of abstract algebra.',
            'dcterms:subject' => [
                'Mathematics',
                'Abstract Algebra',
                'Theoretical Physics',
            ],
            'demo-data:nationality' => 'German Jewish',
            'dcterms:language' => [
                'German',
                'English',
            ],
            'dcterms:temporal' => 'Early 20th Century',
            'demo-data:birthDate' => [
                '@value' => '1882',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1935',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Erlangen, Kingdom of Bavaria (modern Germany)',
            'demo-data:deathPlace' => 'Bryn Mawr, Pennsylvania, United States',
            'map_coordinates' => [
                11.0061,
                49.5897,
            ],
            'media' => [
                [
                    'file' => 'emmy-noether.jpg',
                    'dcterms:title' => 'Emmy Noether',
                ],
            ],
        ],
        [
            'id' => 'mahatma-gandhi',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'rabindranath-tagore',
                'toussaint-louverture',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q1001',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Mahatma Gandhi',
                [
                    '@value' => 'મહાત્મા ગાંધી',
                    '@language' => 'gu',
                ],
            ],
            'dcterms:alternative' => [
                'Mohandas Karamchand Gandhi',
                'Bapu',
                'Father of the Nation',
            ],
            'demo-data:knownFor' => 'Developed satyagraha (nonviolent resistance) as a political tool; led India to independence from British rule in 1947',
            'dcterms:description' => 'Indian lawyer and activist who pioneered nonviolent civil disobedience as a mass political force, first in South Africa and then throughout India\'s independence movement. The Salt March of 1930 and campaigns of non-cooperation embarrassed the British Empire before a global audience. His methods directly influenced Martin Luther King Jr. and Nelson Mandela.',
            'dcterms:subject' => [
                'Activism',
                'Politics',
                'Philosophy',
                'Civil Rights',
            ],
            'demo-data:nationality' => 'Indian',
            'dcterms:language' => [
                'Gujarati',
                'Hindi',
                'English',
            ],
            'dcterms:temporal' => 'Colonial Era',
            'demo-data:birthDate' => [
                '@value' => '1869',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1948',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Porbandar, Kathiawar Agency, British India (modern Gujarat, India)',
            'demo-data:deathPlace' => 'New Delhi, Dominion of India',
            'map_coordinates' => [
                69.6093,
                21.6417,
            ],
            'media' => [
                [
                    'file' => 'mahatma-gandhi.jpg',
                    'dcterms:title' => 'Mahatma Gandhi',
                ],
            ],
        ],
        [
            'id' => 'alan-turing',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'ada-lovelace',
                'emmy-noether',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q7251',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Alan Turing',
            'dcterms:alternative' => [
                'Alan Mathison Turing',
                'Father of Computer Science',
                'Father of Artificial Intelligence',
            ],
            'demo-data:knownFor' => 'Turing machine — foundational model of computation; broke the Enigma cipher during World War II; Turing test for machine intelligence',
            'dcterms:description' => 'English mathematician and logician whose concept of the Turing machine established the theoretical foundations of computer science. During the Second World War he led the codebreaking effort at Bletchley Park that cracked the Enigma cipher, shortening the war by an estimated two years. He was prosecuted for homosexuality in 1952, subjected to chemical castration, and died of cyanide poisoning.',
            'dcterms:subject' => [
                'Mathematics',
                'Computing',
                'Logic',
                'Cryptography',
            ],
            'demo-data:nationality' => 'English',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Early 20th Century',
            'demo-data:birthDate' => [
                '@value' => '1912',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1954',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Maida Vale, London, England',
            'demo-data:deathPlace' => 'Wilmslow, Cheshire, England',
            'map_coordinates' => [
                -0.1838,
                51.5225,
            ],
            'media' => [
                [
                    'file' => 'alan-turing.jpg',
                    'dcterms:title' => 'Alan Turing',
                ],
            ],
        ],
        [
            'id' => 'imhotep',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
                'arts-literature',
            ],
            'relations' => [
                'enheduanna',
                'archimedes',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q131171',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Imhotep',
            'dcterms:alternative' => [
                'Ii-em-Hotep',
                'The One Who Comes in Peace',
            ],
            'demo-data:knownFor' => 'Designed the Step Pyramid of Djoser — the first monumental stone structure in history; later deified as a god of medicine and wisdom',
            'dcterms:description' => 'Egyptian polymath who served as chancellor to Pharaoh Djoser and designed the Step Pyramid at Saqqara, the earliest large-scale cut stone construction on earth. He was also a physician, high priest, and administrator. Two thousand years after his death he was deified, one of very few non-royal Egyptians to receive this honour, and worshipped as the god of medicine well into the Greek and Roman periods.',
            'dcterms:subject' => [
                'Architecture',
                'Medicine',
                'Religion',
            ],
            'demo-data:nationality' => 'Ancient Egyptian',
            'dcterms:language' => 'Ancient Egyptian',
            'dcterms:temporal' => 'Old Kingdom Egypt',
            'demo-data:birthDate' => [
                '@value' => '-2650',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '-2600',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Ankhtawy, near Memphis, Ancient Egypt',
            'demo-data:deathPlace' => 'Memphis, Ancient Egypt',
            'map_coordinates' => [
                31.2517,
                29.8474,
            ],
            'media' => [
                [
                    'file' => 'imhotep.jpg',
                    'dcterms:title' => 'Imhotep',
                ],
            ],
        ],
        [
            'id' => 'sargon-of-akkad',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'enheduanna',
                'hatshepsut',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q199461',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Sargon of Akkad',
            'dcterms:alternative' => [
                'Sargon I',
                'Sharrukin',
                'Šarru-kīnu',
            ],
            'demo-data:knownFor' => 'Founded the Akkadian Empire — the world\'s first multinational empire; his daughter Enheduanna was history\'s first named author',
            'dcterms:description' => 'Ruler of Akkad who conquered the city-states of Sumer and created the first known empire in world history, stretching from the Persian Gulf to the Mediterranean. He established a centralized administration, standardized weights and measures, and appointed his daughter Enheduanna as high priestess at Ur — making her the first named author in recorded history.',
            'dcterms:subject' => [
                'Military',
                'Governance',
                'Empire-building',
            ],
            'demo-data:nationality' => 'Akkadian',
            'dcterms:language' => [
                'Akkadian',
                'Sumerian',
            ],
            'dcterms:temporal' => 'Akkadian Empire',
            'demo-data:birthDate' => [
                '@value' => '-2334',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '-2279',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Azupiranu (location uncertain), Mesopotamia',
            'demo-data:deathPlace' => 'Agade, Akkadian Empire (modern Iraq)',
            'map_coordinates' => [
                44.3661,
                33.3152,
            ],
            'media' => [
                [
                    'file' => 'sargon-of-akkad.jpg',
                    'dcterms:title' => 'Sargon of Akkad',
                ],
            ],
        ],
        [
            'id' => 'himiko',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'wu-zetian',
                'murasaki-shikibu',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q234451',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Himiko',
                [
                    '@value' => '卑弥呼',
                    '@language' => 'ja',
                ],
            ],
            'dcterms:alternative' => [
                'Pimiko',
                'Shaman Queen of Yamatai',
            ],
            'demo-data:knownFor' => 'Shaman queen who unified the warring states of ancient Japan and sent envoys to the Chinese Wei kingdom — the earliest historical record of a Japanese ruler',
            'dcterms:description' => 'Shaman queen of the Yamatai polity in ancient Japan, documented in the Chinese Wei Zhi chronicle of the third century. Ruling through ritual authority as a diviner and spirit medium, she unified many warring states and sent tribute missions to the Wei kingdom of China. Her political and spiritual leadership makes her the earliest historically attested ruler of Japan.',
            'dcterms:subject' => [
                'Rulership',
                'Religion',
                'Diplomacy',
            ],
            'demo-data:nationality' => 'Ancient Japanese (Wa)',
            'dcterms:language' => 'Ancient Japanese',
            'dcterms:temporal' => 'Yayoi Period',
            'demo-data:birthDate' => [
                '@value' => '0170',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '0248',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Yamatai, Wa (ancient Japan)',
            'demo-data:deathPlace' => 'Yamatai, Wa (ancient Japan)',
            'map_coordinates' => [
                130.5,
                33.5,
            ],
            'media' => [
                [
                    'file' => 'himiko.jpg',
                    'dcterms:title' => 'Himiko',
                ],
            ],
        ],
        [
            'id' => 'li-bai',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'murasaki-shikibu',
                'rumi',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q7071',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Li Bai',
                [
                    '@value' => '李白',
                    '@language' => 'zh',
                ],
            ],
            'dcterms:alternative' => [
                'Li Po',
                'Li Bo',
                'Poet Immortal',
                'Taibai',
            ],
            'demo-data:knownFor' => 'Greatest lyric poet of the Tang dynasty; over 1,000 surviving poems celebrated for romantic verse on wine, the moon, friendship, and solitude',
            'dcterms:description' => 'Tang dynasty poet revered across East Asia as the Poet Immortal. His roughly 1,100 surviving poems span the personal, cosmic, and political, combining Daoist imagery, folk balladry, and technical mastery with an ease that made them memorably quotable. He roamed the empire as a wandering poet, repeatedly sought official position, and was exiled for political association with a rebel prince.',
            'dcterms:subject' => [
                'Poetry',
                'Literature',
            ],
            'demo-data:nationality' => 'Chinese (Tang)',
            'dcterms:language' => 'Classical Chinese',
            'dcterms:temporal' => 'Tang Dynasty',
            'demo-data:birthDate' => [
                '@value' => '0701',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '0762',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Suyab, Tang Empire (modern Kyrgyzstan)',
            'demo-data:deathPlace' => 'Dangtu, Tang Empire (modern Anhui, China)',
            'map_coordinates' => [
                76.5,
                42.8,
            ],
            'media' => [
                [
                    'file' => 'li-bai.png',
                    'dcterms:title' => 'Li Bai',
                ],
            ],
        ],
        [
            'id' => 'averroes',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
                'science-mathematics',
            ],
            'relations' => [
                'ibn-sina',
                'maimonides',
                'nagarjuna',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q39837',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Averroes',
                [
                    '@value' => 'ابن رشد',
                    '@language' => 'ar',
                ],
            ],
            'dcterms:alternative' => [
                'Ibn Rushd',
                'Abū l-Walīd Muḥammad ibn Aḥmad ibn Rushd',
                'The Commentator',
            ],
            'demo-data:knownFor' => 'Detailed commentaries on Aristotle that reintroduced Greek philosophy to medieval Europe; defended reason as compatible with and necessary to faith',
            'dcterms:description' => 'Andalusian philosopher, physician, and jurist whose exhaustive commentaries on Aristotle earned him the title "The Commentator" from Thomas Aquinas and Dante. His defense of reason as compatible with — and necessary to — faith generated fierce controversy in both Islamic and Christian worlds. He also wrote influential works on medicine, jurisprudence, and astronomy.',
            'dcterms:subject' => [
                'Philosophy',
                'Medicine',
                'Theology',
                'Logic',
            ],
            'demo-data:nationality' => 'Andalusian Arab',
            'dcterms:language' => 'Arabic',
            'dcterms:temporal' => 'Islamic Golden Age',
            'demo-data:birthDate' => [
                '@value' => '1126',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1198',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Córdoba, Almohad Caliphate (modern Spain)',
            'demo-data:deathPlace' => 'Marrakesh, Almohad Caliphate (modern Morocco)',
            'map_coordinates' => [
                -4.7794,
                37.8882,
            ],
            'media' => [
                [
                    'file' => 'averroes.jpg',
                    'dcterms:title' => 'Averroes',
                ],
            ],
        ],
        [
            'id' => 'maimonides',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
                'science-mathematics',
            ],
            'relations' => [
                'averroes',
                'ibn-sina',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q3303399',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Maimonides',
            'dcterms:alternative' => [
                'Moses Maimonides',
                'Rambam',
                'Mosheh ben Maimon',
            ],
            'demo-data:knownFor' => 'Guide for the Perplexed — reconciling Jewish theology with Aristotelian philosophy; Mishneh Torah — systematic codification of Jewish law still studied today',
            'dcterms:description' => 'Medieval Sephardic philosopher, physician, and legal codifier who is the most influential Jewish thinker of the post-Talmudic period. Born in Córdoba, he fled the Almohad persecutions and eventually settled in Egypt as court physician to Saladin\'s vizier. His two monumental works — the Mishneh Torah and the Guide for the Perplexed — shaped Jewish thought and influenced Aquinas and later scholasticism.',
            'dcterms:subject' => [
                'Philosophy',
                'Theology',
                'Medicine',
                'Law',
            ],
            'demo-data:nationality' => 'Sephardic Jewish',
            'dcterms:language' => [
                'Arabic',
                'Hebrew',
                'Judeo-Arabic',
            ],
            'dcterms:temporal' => 'Medieval',
            'demo-data:birthDate' => [
                '@value' => '1138',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1204',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Córdoba, Almoravid dynasty (modern Spain)',
            'demo-data:deathPlace' => 'Fustat, Ayyubid Sultanate (modern Cairo, Egypt)',
            'map_coordinates' => [
                -4.7794,
                37.8882,
            ],
            'media' => [
                [
                    'file' => 'maimonides.jpg',
                    'dcterms:title' => 'Maimonides',
                ],
            ],
        ],
        [
            'id' => 'tamar-of-georgia',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'zenobia',
                'elizabeth-i',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q244007',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Tamar of Georgia',
                [
                    '@value' => 'თამარ მეფე',
                    '@language' => 'ka',
                ],
            ],
            'dcterms:alternative' => [
                'Queen Tamar',
                'Tamar the Great',
            ],
            'demo-data:knownFor' => 'Under her reign (1184–1213) Georgia reached its greatest territorial extent and cultural flourishing — the Georgian Golden Age',
            'dcterms:description' => 'Queen of the Kingdom of Georgia who presided over a period of imperial expansion and cultural brilliance unmatched in Georgian history. She expanded Georgian territory to include large parts of modern Armenia, Azerbaijan, and northeastern Turkey, promoted Orthodox Christianity and Georgian literature, and was venerated as a saint after her death.',
            'dcterms:subject' => [
                'Rulership',
                'Military',
                'Diplomacy',
            ],
            'demo-data:nationality' => 'Georgian',
            'dcterms:language' => [
                'Georgian',
                'Greek',
            ],
            'dcterms:temporal' => 'Georgian Golden Age',
            'demo-data:birthDate' => [
                '@value' => '1160',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1213',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Kutaisi, Kingdom of Georgia (modern Georgia)',
            'demo-data:deathPlace' => 'Agara, Kingdom of Georgia',
            'map_coordinates' => [
                44.794,
                41.6938,
            ],
            'media' => [
                [
                    'file' => 'tamar-of-georgia.jpg',
                    'dcterms:title' => 'Tamar of Georgia',
                ],
            ],
        ],
        [
            'id' => 'khutulun',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'wu-zetian',
                'ching-shih',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q6403237',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Khutulun',
            'dcterms:alternative' => [
                'Aiyurug',
                'Aigiarne',
                'Moonlight',
            ],
            'demo-data:knownFor' => 'Undefeated Mongol wrestler who commanded her own troops and demanded horses as the price of defeat from suitors; later the model for Puccini\'s Turandot',
            'dcterms:description' => 'Mongol princess and military commander, niece of Kublai Khan, who served alongside her father Kaidu in battle and reportedly captured enemies herself. She vowed to marry only the man who could defeat her in wrestling, amassed thousands of horses from failed challengers, and remained undefeated. Her story, recorded by Marco Polo, inspired centuries of legend in Europe and Asia.',
            'dcterms:subject' => [
                'Military',
                'Athletics',
                'Rulership',
            ],
            'demo-data:nationality' => 'Mongolian',
            'dcterms:language' => 'Mongolian',
            'dcterms:temporal' => 'Mongol Empire',
            'demo-data:birthDate' => [
                '@value' => '1260',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1306',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Central Asia, Mongol Empire',
            'demo-data:deathPlace' => 'Central Asia, Mongol Empire',
            'map_coordinates' => [
                103.8467,
                46.8625,
            ],
            'media' => [
                [
                    'file' => 'khutulun.jpeg',
                    'dcterms:title' => 'Khutulun',
                ],
            ],
        ],
        [
            'id' => 'amina-of-zaria',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'yaa-asantewaa',
                'queen-nzinga',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q2843390',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Amina of Zaria',
                [
                    '@value' => 'Sarauniya Amina',
                    '@language' => 'ha',
                ],
            ],
            'dcterms:alternative' => [
                'Queen Amina',
                'Amina Sarauniya Zazzau',
            ],
            'demo-data:knownFor' => 'Expanded the Zazzau (Zaria) kingdom to its greatest extent through thirty years of military campaigning; built earthen fortifications still visible today as Amina\'s walls',
            'dcterms:description' => 'Queen of Zazzau (modern Zaria, Nigeria) who began military campaigning at age sixteen alongside her father and became queen on her brother\'s death. Over three decades she conducted near-annual campaigns that expanded Hausa territory to the Niger River and beyond, and built the earthen walls that enclosed her military encampments, many still visible today.',
            'dcterms:subject' => [
                'Military',
                'Rulership',
                'Trade',
            ],
            'demo-data:nationality' => 'Hausa',
            'dcterms:language' => 'Hausa',
            'dcterms:temporal' => 'Pre-colonial Africa',
            'demo-data:birthDate' => [
                '@value' => '1533',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1610',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Zaria, Hausa Kingdoms (modern Nigeria)',
            'demo-data:deathPlace' => 'Atagara (modern Bida, Nigeria)',
            'map_coordinates' => [
                7.7164,
                11.0688,
            ],
            'media' => [
                [
                    'file' => 'amina-of-zaria.jpg',
                    'dcterms:title' => 'Amina of Zaria',
                ],
            ],
        ],
        [
            'id' => 'tokugawa-ieyasu',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'yi-sun-sin',
                'akbar',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q171977',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Tokugawa Ieyasu',
                [
                    '@value' => '徳川家康',
                    '@language' => 'ja',
                ],
            ],
            'dcterms:alternative' => [
                'Matsudaira Motoyasu',
                'Founder of the Edo Shogunate',
            ],
            'demo-data:knownFor' => 'Unified Japan after a century of civil war; founded the Tokugawa shogunate that maintained peace for 265 years',
            'dcterms:description' => 'Japanese daimyo and statesman who survived the Sengoku civil war period, outlasted his more brilliant rivals Oda Nobunaga and Toyotomi Hideyoshi, and after the Battle of Sekigahara (1600) became the undisputed ruler of Japan. His shogunate, founded in Edo (modern Tokyo), endured for two and a half centuries — the longest sustained peace in Japanese history.',
            'dcterms:subject' => [
                'Military',
                'Politics',
                'Governance',
            ],
            'demo-data:nationality' => 'Japanese',
            'dcterms:language' => 'Japanese',
            'dcterms:temporal' => 'Sengoku / Early Edo Period',
            'demo-data:birthDate' => [
                '@value' => '1543',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1616',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Okazaki Castle, Mikawa Province (modern Aichi, Japan)',
            'demo-data:deathPlace' => 'Sunpu Castle, Suruga Province (modern Shizuoka, Japan)',
            'map_coordinates' => [
                137.1641,
                34.9555,
            ],
            'media' => [
                [
                    'file' => 'tokugawa-ieyasu.jpg',
                    'dcterms:title' => 'Tokugawa Ieyasu',
                ],
            ],
        ],
        [
            'id' => 'john-locke',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'mary-wollstonecraft',
                'voltaire',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q9353',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'John Locke',
            'dcterms:alternative' => [
                'Father of Liberalism',
            ],
            'demo-data:knownFor' => 'Two Treatises of Government — natural rights to life, liberty, and property; influenced the American Declaration of Independence and the French Revolution',
            'dcterms:description' => 'English philosopher whose political writings laid the foundations of classical liberalism and constitutional government. His argument that legitimate government derives from the consent of the governed and that individuals possess inalienable natural rights fed directly into the American Declaration of Independence, the French Declaration of the Rights of Man, and liberal constitutionalism worldwide.',
            'dcterms:subject' => [
                'Philosophy',
                'Politics',
                'Epistemology',
            ],
            'demo-data:nationality' => 'English',
            'dcterms:language' => [
                'English',
                'Latin',
            ],
            'dcterms:temporal' => 'Glorious Revolution',
            'demo-data:birthDate' => [
                '@value' => '1632',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1704',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Wrington, Somerset, England',
            'demo-data:deathPlace' => 'Oates, Essex, England',
            'map_coordinates' => [
                -2.767,
                51.35,
            ],
            'media' => [
                [
                    'file' => 'john-locke.png',
                    'dcterms:title' => 'John Locke',
                ],
            ],
        ],
        [
            'id' => 'leibniz',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'isaac-newton',
                'emmy-noether',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q9047',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Gottfried Wilhelm Leibniz',
            'dcterms:alternative' => [
                'Leibniz',
                'Gottfried Leibniz',
            ],
            'demo-data:knownFor' => 'Invented calculus independently of Newton; developed the binary number system — foundation of all digital computing; monadic metaphysics',
            'dcterms:description' => 'German polymath who independently invented calculus (his notation dy/dx is still in use today), developed the binary number system that underlies all digital computing, and made foundational contributions to logic, physics, and linguistics — while also working as a diplomat, librarian, and historian. Perhaps the last person to attempt mastery of all existing human knowledge.',
            'dcterms:subject' => [
                'Mathematics',
                'Philosophy',
                'Logic',
                'Physics',
            ],
            'demo-data:nationality' => 'German',
            'dcterms:language' => [
                'German',
                'Latin',
                'French',
            ],
            'dcterms:temporal' => 'Scientific Revolution',
            'demo-data:birthDate' => [
                '@value' => '1646',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1716',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Leipzig, Electorate of Saxony (modern Germany)',
            'demo-data:deathPlace' => 'Hanover, Electorate of Hanover (modern Germany)',
            'map_coordinates' => [
                12.3731,
                51.3397,
            ],
            'media' => [
                [
                    'file' => 'leibniz.jpg',
                    'dcterms:title' => 'Gottfried Wilhelm Leibniz',
                ],
            ],
        ],
        [
            'id' => 'nanny-of-the-maroons',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'harriet-tubman',
                'toussaint-louverture',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q274041',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Nanny of the Maroons',
            'dcterms:alternative' => [
                'Queen Nanny',
                'Granny Nanny',
                'National Hero of Jamaica',
            ],
            'demo-data:knownFor' => 'Led the Windward Maroons in guerrilla warfare against the British for decades; freed over 800 enslaved people; national hero of Jamaica',
            'dcterms:description' => 'Maroon leader of the Windward Maroons in the Blue Mountains of Jamaica who organized and led effective guerrilla resistance against British colonial forces throughout the early eighteenth century. Born in West Africa (likely Asante), she was captured, enslaved, and escaped to lead a free community. Her military tactics kept the Maroons free and forced the British to a peace treaty.',
            'dcterms:subject' => [
                'Military',
                'Resistance',
                'Leadership',
            ],
            'demo-data:nationality' => 'Jamaican (Asante African)',
            'dcterms:language' => [
                'Twi',
                'Jamaican Creole',
            ],
            'dcterms:temporal' => 'Colonial Era',
            'demo-data:birthDate' => [
                '@value' => '1686',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1755',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Gold Coast (modern Ghana)',
            'demo-data:deathPlace' => 'Blue Mountains, Jamaica',
            'map_coordinates' => [
                -76.601,
                18.0679,
            ],
            'media' => [
                [
                    'file' => 'nanny-of-the-maroons.jpg',
                    'dcterms:title' => 'Nanny of the Maroons',
                ],
            ],
        ],
        [
            'id' => 'voltaire',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'john-locke',
                'mary-wollstonecraft',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q9068',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Voltaire',
            'dcterms:alternative' => [
                'François-Marie Arouet',
            ],
            'demo-data:knownFor' => 'Candide (1759) — satirical masterpiece against religious fanaticism and injustice; champion of freedom of speech, religious tolerance, and separation of church and state',
            'dcterms:description' => 'French Enlightenment writer and philosopher who was the most prolific and celebrated literary figure of his age. Through thousands of plays, poems, histories, novels, and pamphlets he campaigned for freedom of religion and expression and against clerical abuse and judicial torture. His advocacy in the Calas affair — rehabilitating a Protestant wrongly executed — was among the first public uses of investigative journalism in service of justice.',
            'dcterms:subject' => [
                'Philosophy',
                'Literature',
                'Satire',
                'Activism',
            ],
            'demo-data:nationality' => 'French',
            'dcterms:language' => 'French',
            'dcterms:temporal' => 'Enlightenment',
            'demo-data:birthDate' => [
                '@value' => '1694',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1778',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Paris, Kingdom of France',
            'demo-data:deathPlace' => 'Paris, Kingdom of France',
            'map_coordinates' => [
                2.3522,
                48.8566,
            ],
            'media' => [
                [
                    'file' => 'voltaire.jpg',
                    'dcterms:title' => 'Voltaire',
                ],
            ],
        ],
        [
            'id' => 'cao-xueqin',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'murasaki-shikibu',
                'sor-juana',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q182874',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Cao Xueqin',
                [
                    '@value' => '曹雪芹',
                    '@language' => 'zh',
                ],
            ],
            'dcterms:alternative' => [
                'Ts\'ao Hsueh-ch\'in',
                'Zhanruo',
            ],
            'demo-data:knownFor' => 'Dream of the Red Chamber (c. 1754) — considered the greatest novel in Chinese literature; pioneering psychological realism and social critique',
            'dcterms:description' => 'Chinese author who wrote Dream of the Red Chamber (Hóng Lóu Mèng), the longest and most revered novel in the Chinese literary tradition. Drawing on his family\'s fall from aristocratic wealth, the novel follows the decline of a noble household across hundreds of characters with extraordinary psychological depth. It inspired an entire academic field — "Redology" — devoted to its study.',
            'dcterms:subject' => [
                'Literature',
                'Novel',
                'Poetry',
            ],
            'demo-data:nationality' => 'Chinese (Manchu-Chinese)',
            'dcterms:language' => 'Classical Chinese',
            'dcterms:temporal' => 'Qing Dynasty',
            'demo-data:birthDate' => [
                '@value' => '1715',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1763',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:birthPlace' => 'Nanjing, Qing China',
            'demo-data:deathPlace' => 'Beijing, Qing China',
            'map_coordinates' => [
                118.7969,
                32.0603,
            ],
            'media' => [
                [
                    'file' => 'cao-xueqin.jpg',
                    'dcterms:title' => 'Cao Xueqin',
                ],
            ],
        ],
        [
            'id' => 'kamehameha-i',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
                'exploration-geography',
            ],
            'relations' => [
                'zheng-he',
                'sacagawea',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q214910',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Kamehameha I',
            'dcterms:alternative' => [
                'Kamehameha the Great',
                'Napoleon of the Pacific',
            ],
            'demo-data:knownFor' => 'Unified the Hawaiian Islands under a single ruler for the first time; established the Kingdom of Hawaii and preserved Hawaiian sovereignty against foreign powers',
            'dcterms:description' => 'Warrior chief of the Big Island of Hawaii who used strategic alliances, European weapons, and formidable military judgment to unite all the Hawaiian Islands into a single kingdom by 1810. He established the Mamalahoe Kanawai (Law of the Splintered Paddle), the first recorded Hawaiian law protecting the rights of civilians — a code still invoked in the Hawaii State Constitution.',
            'dcterms:subject' => [
                'Military',
                'Rulership',
                'Diplomacy',
            ],
            'demo-data:nationality' => 'Hawaiian',
            'dcterms:language' => 'Hawaiian',
            'dcterms:temporal' => 'Age of Revolution',
            'demo-data:birthDate' => [
                '@value' => '1758',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1819',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Kohala District, Island of Hawaii',
            'demo-data:deathPlace' => 'Kailua, Island of Hawaii',
            'map_coordinates' => [
                -155.4656,
                19.5429,
            ],
            'media' => [
                [
                    'file' => 'kamehameha-i.jpg',
                    'dcterms:title' => 'Kamehameha I',
                ],
            ],
        ],
        [
            'id' => 'sequoyah',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'tecumseh',
                'sacagawea',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q313595',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Sequoyah',
            'dcterms:alternative' => [
                'George Gist',
                'George Guess',
                'Ssiquoya',
            ],
            'demo-data:knownFor' => 'Single-handedly invented the Cherokee syllabary — the only writing system known to have been created independently by a single non-literate person',
            'dcterms:description' => 'Cherokee silversmith who, never having learned to read in any language, spent over a decade developing a syllabary of 86 characters for the Cherokee language. Within a few years of its introduction in 1821, literacy spread rapidly through the Cherokee nation, enabling a newspaper, legal codes, and correspondence. The giant sequoia tree was named in his honour.',
            'dcterms:subject' => [
                'Linguistics',
                'Literature',
                'Activism',
            ],
            'demo-data:nationality' => 'Cherokee',
            'dcterms:language' => [
                'Cherokee',
                'English',
            ],
            'dcterms:temporal' => 'Early 19th Century',
            'demo-data:birthDate' => [
                '@value' => '1770',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1843',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Tuskegee, Cherokee territory (modern Tennessee, United States)',
            'demo-data:deathPlace' => 'San Fernando de Rosas, Mexico (modern Tamaulipas, Mexico)',
            'map_coordinates' => [
                -84.2533,
                35.5175,
            ],
            'media' => [
                [
                    'file' => 'sequoyah.jpg',
                    'dcterms:title' => 'Sequoyah',
                ],
            ],
        ],
        [
            'id' => 'shaka',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'yaa-asantewaa',
                'queen-nzinga',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q451624',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Shaka',
                [
                    '@value' => 'uShaka kaSenzangakhona',
                    '@language' => 'zu',
                ],
            ],
            'dcterms:alternative' => [
                'Shaka Zulu',
                'Shaka kaSenzangakhona',
            ],
            'demo-data:knownFor' => 'Transformed the Zulu from a small clan into a major power through military innovation — the bull horn formation and the short stabbing assegai (iklwa)',
            'dcterms:description' => 'Zulu king whose military reforms — a new close-combat spear, large war shields, and the encircling "bull horn" battle formation — transformed the Zulu into the dominant power of southern Africa. His campaigns of conquest and forced migration (the Mfecane) reshaped the region\'s political map. He was assassinated by his half-brothers after a period of increasingly erratic rule.',
            'dcterms:subject' => [
                'Military',
                'Rulership',
                'Military Innovation',
            ],
            'demo-data:nationality' => 'Zulu',
            'dcterms:language' => 'Zulu',
            'dcterms:temporal' => 'Age of Revolution',
            'demo-data:birthDate' => [
                '@value' => '1787',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1828',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Near present-day Melmoth, KwaZulu-Natal, South Africa',
            'demo-data:deathPlace' => 'KwaDukuza, KwaZulu-Natal, South Africa',
            'map_coordinates' => [
                31.3951,
                -28.5978,
            ],
            'media' => [
                [
                    'file' => 'shaka.jpg',
                    'dcterms:title' => 'Shaka',
                ],
            ],
        ],
        [
            'id' => 'mary-shelley',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'mary-wollstonecraft',
                'ada-lovelace',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q47152',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Mary Shelley',
            'dcterms:alternative' => [
                'Mary Wollstonecraft Shelley',
                'Mary Godwin',
            ],
            'demo-data:knownFor' => 'Frankenstein; or, The Modern Prometheus (1818) — the first science fiction novel; written at eighteen, it explores creation, responsibility, and unchecked scientific ambition',
            'dcterms:description' => 'British novelist who wrote Frankenstein at eighteen during a ghost-story competition at the Villa Diodati near Lake Geneva. The novel — exploring creation, responsibility, and the consequences of unchecked scientific ambition — established the science fiction genre and remains urgently relevant in debates over biotechnology and artificial intelligence. She was the daughter of the feminist philosopher Mary Wollstonecraft.',
            'dcterms:subject' => [
                'Literature',
                'Science Fiction',
                'Philosophy',
            ],
            'demo-data:nationality' => 'British',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Romantic Era',
            'demo-data:birthDate' => [
                '@value' => '1797',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1851',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Somers Town, London, England',
            'demo-data:deathPlace' => 'Chester Square, London, England',
            'map_coordinates' => [
                -0.1276,
                51.5074,
            ],
            'media' => [
                [
                    'file' => 'mary-shelley.jpg',
                    'dcterms:title' => 'Mary Shelley',
                ],
            ],
        ],
        [
            'id' => 'mary-anning',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'charles-darwin',
                'galileo',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q230491',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Mary Anning',
            'dcterms:alternative' => [
                'The Greatest Fossilist the World Ever Knew',
            ],
            'demo-data:knownFor' => 'Discovered the first complete ichthyosaur, the first plesiosaur, and the first British pterodactyl; her finds transformed scientific understanding of prehistoric life',
            'dcterms:description' => 'English fossil hunter from Lyme Regis whose discoveries along the Jurassic Coast fundamentally changed scientific understanding of prehistoric life and contributed to the development of evolutionary theory. Working-class and self-taught, she was frequently uncredited by the male scientists who purchased and published her finds. The tongue twister "she sells seashells by the seashore" is attributed to her.',
            'dcterms:subject' => [
                'Paleontology',
                'Natural History',
                'Geology',
            ],
            'demo-data:nationality' => 'English',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Romantic Era',
            'demo-data:birthDate' => [
                '@value' => '1799',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1847',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Lyme Regis, Dorset, England',
            'demo-data:deathPlace' => 'Lyme Regis, Dorset, England',
            'map_coordinates' => [
                -2.9361,
                50.7235,
            ],
            'media' => [
                [
                    'file' => 'mary-anning.jpg',
                    'dcterms:title' => 'Mary Anning',
                ],
            ],
        ],
        [
            'id' => 'george-eliot',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'arts-literature',
            ],
            'relations' => [
                'mary-wollstonecraft',
                'ida-b-wells',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q131333',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'George Eliot',
            'dcterms:alternative' => [
                'Mary Ann Evans',
                'Marian Evans',
            ],
            'demo-data:knownFor' => 'Middlemarch (1871–72) — widely regarded as the greatest novel in the English language; pioneered psychological realism and moral seriousness in Victorian fiction',
            'dcterms:description' => 'Victorian novelist who published under a male pen name to ensure her work was taken seriously in an era when women\'s writing was dismissed as sentimental. Middlemarch, with its interwoven plots set in a provincial English town, offers a panoramic moral vision of individual ambition against social constraint. She also translated Spinoza and Feuerbach and lived with philosopher George Henry Lewes outside of marriage.',
            'dcterms:subject' => [
                'Literature',
                'Novel',
                'Philosophy',
            ],
            'demo-data:nationality' => 'English',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Victorian Era',
            'demo-data:birthDate' => [
                '@value' => '1819',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1880',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Nuneaton, Warwickshire, England',
            'demo-data:deathPlace' => 'Chelsea, London, England',
            'map_coordinates' => [
                -1.4648,
                52.5228,
            ],
            'media' => [
                [
                    'file' => 'george-eliot.jpg',
                    'dcterms:title' => 'George Eliot',
                ],
            ],
        ],
        [
            'id' => 'florence-nightingale',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'mary-seacole',
                'marie-curie',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q37103',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Florence Nightingale',
            'dcterms:alternative' => [
                'The Lady with the Lamp',
            ],
            'demo-data:knownFor' => 'Founded modern evidence-based nursing; used statistical polar area diagrams to force the British government to reform military hospital sanitation',
            'dcterms:description' => 'English social reformer and statistician who transformed nursing from a menial occupation into a respected profession during and after the Crimean War. She pioneered the use of data visualization — her famous "coxcomb" polar area diagrams showed that most military deaths were preventable through improved sanitation, and she used them to force policy change. She established the first secular nursing school in the world.',
            'dcterms:subject' => [
                'Medicine',
                'Statistics',
                'Social Reform',
            ],
            'demo-data:nationality' => 'British',
            'dcterms:language' => [
                'English',
                'French',
                'German',
                'Italian',
            ],
            'dcterms:temporal' => 'Victorian Era',
            'demo-data:birthDate' => [
                '@value' => '1820',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1910',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Florence, Grand Duchy of Tuscany (modern Italy)',
            'demo-data:deathPlace' => 'Mayfair, London, England',
            'map_coordinates' => [
                11.2558,
                43.7696,
            ],
            'media' => [
                [
                    'file' => 'florence-nightingale.jpg',
                    'dcterms:title' => 'Florence Nightingale',
                ],
            ],
        ],
        [
            'id' => 'sitting-bull',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'politics-leadership',
            ],
            'relations' => [
                'tecumseh',
                'sacagawea',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q43527',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Sitting Bull',
            'dcterms:alternative' => [
                'Tȟatȟáŋka Íyotȟake',
                'Hunkesni',
            ],
            'demo-data:knownFor' => 'Led the alliance that defeated the US 7th Cavalry under Custer at the Battle of Little Bighorn (1876); spiritual leader of Lakota resistance',
            'dcterms:description' => 'Hunkpapa Lakota holy man and war chief who became the foremost political and military leader of the Sioux resistance against US government encroachment on treaty lands. His vision before Little Bighorn — soldiers falling like grasshoppers from the sky — inspired the allied force that annihilated Custer\'s column. He later toured with Buffalo Bill\'s Wild West Show before returning home to lead the Ghost Dance resistance.',
            'dcterms:subject' => [
                'Military',
                'Resistance',
                'Spirituality',
                'Leadership',
            ],
            'demo-data:nationality' => 'Hunkpapa Lakota',
            'dcterms:language' => 'Lakota',
            'dcterms:temporal' => 'Gilded Age',
            'demo-data:birthDate' => [
                '@value' => '1831',
                '@type' => 'numeric:timestamp',
                '@annotation' => [
                    'demo-data:qualifier' => 'approximate',
                ],
            ],
            'demo-data:deathDate' => [
                '@value' => '1890',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Grand River, Dakota Territory (modern South Dakota, United States)',
            'demo-data:deathPlace' => 'Standing Rock Reservation, Dakota Territory',
            'map_coordinates' => [
                -100.17,
                45.48,
            ],
            'media' => [
                [
                    'file' => 'sitting-bull.jpg',
                    'dcterms:title' => 'Sitting Bull',
                ],
            ],
        ],
        [
            'id' => 'james-clerk-maxwell',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'nikola-tesla',
                'emmy-noether',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q9095',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'James Clerk Maxwell',
            'dcterms:alternative' => [
                'Maxwell',
                'J. C. Maxwell',
            ],
            'demo-data:knownFor' => 'Maxwell\'s equations unified electricity, magnetism, and light into a single theory of electromagnetism; predicted radio waves; produced the first colour photograph',
            'dcterms:description' => 'Scottish physicist whose four equations describing electric and magnetic fields are considered one of the greatest achievements in theoretical physics. By unifying electricity, magnetism, and optics into a single framework he predicted the existence of radio waves — confirmed by Hertz twenty years later — and provided the scaffolding for both relativity and quantum mechanics. Einstein kept a portrait of Maxwell alongside Newton and Faraday on his study wall.',
            'dcterms:subject' => [
                'Physics',
                'Mathematics',
                'Electromagnetism',
            ],
            'demo-data:nationality' => 'Scottish',
            'dcterms:language' => 'English',
            'dcterms:temporal' => 'Victorian Era',
            'demo-data:birthDate' => [
                '@value' => '1831',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1879',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Edinburgh, Scotland',
            'demo-data:deathPlace' => 'Cambridge, England',
            'map_coordinates' => [
                -3.1883,
                55.9533,
            ],
            'media' => [
                [
                    'file' => 'james-clerk-maxwell.jpg',
                    'dcterms:title' => 'James Clerk Maxwell',
                ],
            ],
        ],
        [
            'id' => 'wang-zhenyi',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'nasir-al-din-al-tusi',
                'emmy-noether',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q3138460',
                '@type' => 'uri',
            ],
            'dcterms:title' => [
                'Wang Zhenyi',
                [
                    '@value' => '王贞仪',
                    '@language' => 'zh',
                ],
            ],
            'dcterms:alternative' => [
                'Wang Chen-i',
                'Zhenyi',
            ],
            'demo-data:knownFor' => 'Wrote treatises on eclipses, equinoxes, and planetary motion in accessible Chinese prose; conducted physical experiments to demonstrate the causes of lunar eclipses',
            'dcterms:description' => 'Qing dynasty astronomer, mathematician, and poet who wrote extensively on astronomy and mathematics in a period when science was largely written in technical language accessible only to scholars. She conducted physical demonstrations of eclipse mechanics using a lamp, mirror, and table. Dying at twenty-nine, she left twelve volumes of work including accessible popular science and accomplished verse.',
            'dcterms:subject' => [
                'Astronomy',
                'Mathematics',
                'Poetry',
            ],
            'demo-data:nationality' => 'Chinese (Qing)',
            'dcterms:language' => 'Classical Chinese',
            'dcterms:temporal' => 'Qing Dynasty',
            'demo-data:birthDate' => [
                '@value' => '1768',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1797',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Jiangning, Qing China (modern Nanjing, China)',
            'demo-data:deathPlace' => 'Tongcheng, Anhui Province, Qing China',
            'map_coordinates' => [
                118.7969,
                32.0603,
            ],
            'media' => [
                [
                    'file' => 'wang-zhenyi.jpg',
                    'dcterms:title' => 'Wang Zhenyi',
                ],
            ],
        ],
        [
            'id' => 'rosalind-franklin',
            'class' => 'demo-data:Person',
            'sets' => [
                'main',
                'science-mathematics',
            ],
            'relations' => [
                'lise-meitner',
                'marie-curie',
            ],
            'dcterms:identifier' => [
                '@value' => 'https://www.wikidata.org/entity/Q7474',
                '@type' => 'uri',
            ],
            'dcterms:title' => 'Rosalind Franklin',
            'dcterms:alternative' => [
                'Rosalind Elsie Franklin',
            ],
            'demo-data:knownFor' => 'X-ray crystallography of DNA — Photo 51 provided crucial evidence for the double helix; her data was shared with Watson and Crick without her knowledge',
            'dcterms:description' => 'British X-ray crystallographer whose precision work produced Photo 51, the clearest X-ray image of DNA at the time. Watson and Crick used her data — shared without her consent by a colleague — as key evidence for their double helix model, for which they received the Nobel Prize in 1962. Franklin was not credited; she had died of ovarian cancer in 1958, and the Nobel Prize is not awarded posthumously.',
            'dcterms:subject' => [
                'Crystallography',
                'Biology',
                'Chemistry',
            ],
            'demo-data:nationality' => 'British',
            'dcterms:language' => [
                'English',
                'French',
            ],
            'dcterms:temporal' => 'Early 20th Century',
            'demo-data:birthDate' => [
                '@value' => '1920',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:deathDate' => [
                '@value' => '1958',
                '@type' => 'numeric:timestamp',
            ],
            'demo-data:birthPlace' => 'Notting Hill, London, England',
            'demo-data:deathPlace' => 'Chelsea, London, England',
            'map_coordinates' => [
                -0.1938,
                51.5122,
            ],
            'media' => [
                [
                    'file' => 'rosalind-franklin.jpg',
                    'dcterms:title' => 'Rosalind Franklin',
                ],
            ],
        ],
    ],
];
