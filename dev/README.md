# dev/

Build tools for the DemoData module. None of these files are shipped with the module.

## Contents

| Path | Description |
|------|-------------|
| `build-identifiers.php` | Looks up Wikidata entity URIs and injects them as `dcterms:identifier` values |
| `build-labels.php` | Fetches native-script Wikidata labels and injects them as language-tagged `dcterms:title` values |
| `build-media.php` | Fetches and downloads media files for a dataset from Wikidata/Wikimedia Commons |
| `config.php` | Local config — Wikimedia API credentials (**gitignored**) |
| `config.php.dist` | Template for `config.php` |
| `strategies/` | Per-dataset overrides for `build-identifiers.php` and `build-media.php` |

---

## Setup

Copy the config template and fill in your Wikimedia OAuth credentials:

```
cp dev/config.php.dist dev/config.php
```

Register an owner-only OAuth 2.0 consumer at
`https://meta.wikimedia.org/wiki/Special:OAuthConsumerRegistration/propose`
to get an access token. The user agent string should identify your app,
e.g. `YourName/DemoData-build (your@email.example)`.

`config.php` is gitignored. Do not commit it.

---

## build-identifiers.php

Looks up a Wikidata entity URI for each item that does not already have a
`dcterms:identifier` value, and injects it into the dataset PHP file.

```
php dev/build-identifiers.php <dataset>           # look up and inject
php dev/build-identifiers.php <dataset> --dry-run # report only, no writes
```

Re-running is safe — only items without an existing `dcterms:identifier` are processed.

---

## build-labels.php

Fetches native-language `rdfs:label` values from Wikidata for items that have a
Wikidata QID in `dcterms:identifier`, and injects them as additional
`dcterms:title` values with `@language` tags.

```
php dev/build-labels.php <dataset>           # fetch and inject
php dev/build-labels.php <dataset> --dry-run # report only, no writes
```

Re-running is safe — items whose `dcterms:title` already contains a language-tagged value are skipped.

---

## build-media.php

Finds a Wikimedia Commons image for each item that does not already have one,
downloads it to `datasets/<dataset>/media/`, and injects the `'media'` key into
the dataset PHP file.

```
php dev/build-media.php <dataset>           # fetch + download
php dev/build-media.php <dataset> --dry-run # report URLs only, no writes
```

Re-running is safe — only items with no `media` key or a missing file are processed.

---

## Strategies

Each dataset can have a strategy file at `dev/strategies/<dataset>.php` that
customizes search behavior for `build-identifiers.php` and `build-media.php`.
Available pass types and their options are documented in `dev/strategies/artworks.php`.

---

## Building a dataset

### 1. Create the directory

```
datasets/<name>/
datasets/<name>/<name>.php   # data file
datasets/<name>/media/       # created automatically by build-media.php
```

### 2. Write the data file

`datasets/<name>/<name>.php` returns an associative array with three keys:
`item_sets`, `resource_template`, and `items`.

```php
<?php
return [

    'item_sets' => [
        // Keys are slugs used in item 'sets' arrays. 'main' must always be present.
        'main' => [
            'dcterms:title'       => 'My Dataset',
            'dcterms:description' => 'A short description.',
        ],
        'subcategory-one' => ['dcterms:title' => 'Subcategory One'],
    ],

    'resource_template' => [
        // Label should use the "Demo Data: " prefix to avoid conflicts.
        'label' => 'Demo Data: My Item',
        'properties' => [
            ['term' => 'dcterms:title'],
            ['term' => 'dcterms:created', 'data_type' => ['numeric:timestamp']],
            ['term' => 'dcterms:relation', 'data_type' => ['resource'], 'alternate_label' => 'Related Items'],
            ['term' => 'demo-data:knownFor'],
        ],
    ],

    'items' => [
        [
            'id'      => 'my-item',          // kebab-case slug, unique within dataset
            'class'   => 'demo-data:Person', // see Vocabulary section
            'sets'    => ['main', 'subcategory-one'],
            'relations' => ['other-item-id'], // dcterms:relation links, resolved in a second pass

            // Requires Mapping module; skipped when inactive. See Map coordinates below.
            'map_coordinates' => [-0.1276, 51.5072],
            'map_bounds'      => '-1.5,51.0,0.5,52.0', // 'west,south,east,north'

            // Any installed vocabulary term works as a key.
            'dcterms:title'   => 'My Item',
            'dcterms:created' => ['@value' => '1850', '@type' => 'numeric:timestamp'],
            'dcterms:subject' => ['Tag One', 'Tag Two'],

            'media' => 'my-item.jpg', // see Media property values below
        ],
    ],
];
```

#### Language-tagged values

```php
'dcterms:title' => [
    'Confucius',
    ['@value' => '孔子', '@language' => 'zh'],
],
```

`@language` and `@type` are mutually exclusive — do not set both on the same value.
Populated automatically by `build-labels.php` for items with a Wikidata QID.

#### Value annotations

Attach metadata to a value itself rather than to the item:

```php
'demo-data:birthDate' => [
    '@value'      => '-0551',
    '@type'       => 'numeric:timestamp',
    '@annotation' => ['demo-data:qualifier' => 'approximate'],
],
```

#### Numeric data types

Set `@type` on a value to store it as a structured type when NumericDataTypes is
active; falls back to plain text when inactive.

```php
'dcterms:created'  => ['@value' => '1850',      '@type' => 'numeric:timestamp'],
'dcterms:extent'   => ['@value' => 'P250Y',     '@type' => 'numeric:duration'],
'dcterms:temporal' => ['@value' => '-500/-323', '@type' => 'numeric:interval'],
'demo-data:area'   => ['@value' => '150000',    '@type' => 'numeric:integer'],
```

Formats: timestamp (`'1850'`, `'-500'`, `'1850-06-15'`), duration (`'P250Y'`),
interval (`'-500/-323'`), integer (`'150000'`). The resource template's
`data_type` entries constrain the admin form UI only — they do not drive import
typing.

#### Map coordinates

The geometry type is inferred from the coordinate structure:

```php
'map_coordinates' => [-0.1276, 51.5072],                              // point: [lng, lat]
'map_coordinates' => [[-0.1276, 51.5072], [2.3522, 48.8566]],        // linestring
'map_coordinates' => [[[-0.1276, 51.5072], [2.3522, 48.8566], ...]],  // polygon (first ring exterior, additional rings holes)
```

`map_bounds` (`'west,south,east,north'`) sets the initial map viewport and is
optional. Requires the Mapping module; both keys are skipped silently when
inactive.

#### Media property values

Three forms are valid for the `media` key:

```php
// 1. Bare string — single file, no properties (what build-media.php injects)
'media' => 'my-item.jpg',

// 2. Single file with properties
'media' => ['file' => 'my-item.jpg', 'dcterms:title' => 'My Item', 'dcterms:creator' => 'Artist'],

// 3. Multiple files with properties
'media' => [
    ['file' => 'page1.jpg', 'dcterms:title' => 'Page 1'],
    ['file' => 'page2.jpg', 'dcterms:title' => 'Page 2'],
],
```

Property values use the same shorthands as item-level properties — plain strings,
typed values, language-tagged values, and annotations are all supported.

### 3. Register in module.config.php

Add an entry to the `demo_data.datasets` array in `config/module.config.php`:

```php
'my-dataset' => [
    'label'       => 'My Dataset',
    'description' => 'One or two sentences describing what the dataset contains.',
    'item_count'  => 50,
    'set_count'   => 2,
],
```

### 4. Inject identifiers

```
php dev/build-identifiers.php my-dataset --dry-run
php dev/build-identifiers.php my-dataset
```

### 5. Fetch media

```
php dev/build-media.php my-dataset --dry-run
php dev/build-media.php my-dataset
```

Create `dev/strategies/my-dataset.php` for any items either script cannot match correctly.

---

## Vocabulary

The `demo-data` vocabulary (`https://omeka.org/s/vocabs/demo-data#`) is
installed by the module. Use its terms as `class` values and property terms in
dataset files.

### Classes

| Term | Label |
|------|-------|
| `demo-data:Empire` | Empire |
| `demo-data:Kingdom` | Kingdom |
| `demo-data:Dynasty` | Dynasty |
| `demo-data:City-state` | City-state |
| `demo-data:Confederation` | Confederation |
| `demo-data:CulturalPeriod` | Cultural Period |
| `demo-data:Republic` | Republic |
| `demo-data:Painting` | Painting |
| `demo-data:Sculpture` | Sculpture |
| `demo-data:WorkOnPaper` | Work on Paper |
| `demo-data:Manuscript` | Manuscript |
| `demo-data:Letter` | Letter |
| `demo-data:Diary` | Diary |
| `demo-data:Memorandum` | Memorandum |
| `demo-data:Report` | Report |
| `demo-data:Newspaper` | Newspaper |
| `demo-data:Person` | Person |

### Properties

| Term | Label | Used in |
|------|-------|---------|
| `demo-data:movement` | Movement | Artworks |
| `demo-data:peakDate` | Peak Date | Civilizations |
| `demo-data:area` | Area | Civilizations |
| `demo-data:birthDate` | Birth Date | People |
| `demo-data:deathDate` | Death Date | People |
| `demo-data:birthPlace` | Birth Place | People |
| `demo-data:deathPlace` | Death Place | People |
| `demo-data:nationality` | Nationality | People |
| `demo-data:knownFor` | Known For | People |
| `demo-data:qualifier` | Qualifier | People (value annotations) |
