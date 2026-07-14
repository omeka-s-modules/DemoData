<?php
return [
    ['type' => 'field_order', 'fields' => [
        'id', 'class', 'sets', 'relations', 'dcterms:identifier',
        'dcterms:title', 'dcterms:alternative', 'demo-data:knownFor', 'dcterms:description',
        'dcterms:subject', 'demo-data:nationality', 'dcterms:language', 'dcterms:temporal',
        'demo-data:birthDate', 'demo-data:deathDate', 'demo-data:birthPlace',
        'demo-data:deathPlace', 'map_coordinates', 'media',
    ]],
    ['type' => 'override', 'skip' => [
        'wang-zhenyi', // historical figure (1768–1797); no authentic portrait exists
    ]],
    ['type' => 'override', 'qid_overrides' => [
        'queen-nzinga'  => 'Q467650',  // Wikidata label: "Nzingha Mbande"
        'amina-of-zaria' => 'Q2843390', // Wikidata label: "Queen Amina"
    ]],
];
