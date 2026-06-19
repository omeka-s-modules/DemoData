# Sample Data

An Omeka S module that imports sample datasets for development, testing, and evaluation. The datasets use realistic cultural heritage content to demonstrate the breadth of Omeka S's data model — vocabularies, resource classes, value types, media, and modules working together across four distinct domains.

The [NumericDataTypes](https://omeka.org/s/modules/NumericDataTypes/) module is optional; when active, date, duration, interval, and integer fields are stored as structured numeric values rather than plain text. The [Mapping](https://omeka.org/s/modules/Mapping/) module is optional; when active, geographic coordinates are displayed as map markers.

## Datasets

Each dataset creates its own item set(s) and resource template on import. Re-importing a dataset fully replaces the previous data.

| Dataset | Items | Media |
|---|---|---|
| Artworks | 200 | 200 |
| Civilizations | 450 | 450 |
| Documents | 50 | 62 |
| People | 100 | 100 |

### Artworks

Paintings, sculptures, drawings, and manuscripts spanning antiquity to the 20th century, organized by movement and period. Exercises resource templates with alternate property labels, URI identifiers, numeric date values, map markers, and inter-item links.

### Civilizations

Historical polities — kingdoms, empires, dynasties, and cultural periods — from across the ancient, medieval, and early modern world. The largest dataset at 450 items. Exercises all four NumericDataTypes (timestamp, duration, interval, integer), map markers with bounding boxes, and inter-item links.

### Documents

Historical handwritten and typed documents including letters, diaries, newspapers, and official records from the 15th through 20th centuries. Several items have multiple media files representing individual pages of a multi-page document. Includes large TIFF and PDF files.

### People

Historical figures spanning science, literature, philosophy, exploration, and political leadership across cultures and centuries. Exercises value annotations (approximate birth and death dates flagged with a qualifier value), URI identifiers, numeric date values, and map markers.

## Copyright

SampleData is Copyright © 2021-present Corporation for Digital Scholarship, Vienna,
Virginia, USA http://digitalscholar.org

The Corporation for Digital Scholarship distributes the Sample Data source code under
the GNU General Public License, version 3 (GPLv3). The full text of this license
is given in the license file.

The Omeka name is a registered trademark of the Corporation for Digital Scholarship.

Third-party copyright in this distribution is noted where applicable.

All rights not expressly granted are reserved.
