# sort-associative-array
 A Laravel package to generate pagination.
 
## Installation

To get started, install `require` in your project.

- Via Composer

``` bash
 composer require theopeneyes/generate-pagination
```

- Via composer.json file

Enter the following in the `require` section of your project `composer.json` file.
``` php
"theopeneyes/generate-pagination": "dev-main",
```

Run the `composer update` to download the package.

``` bash
 composer update
```

## Basic Usage

```php
use TheOpenEyes\GeneratePagination\GeneratePagination;

GeneratePagination::generate($responseArr = array(), $limit, $page, $searchCondition, $sortOrder, $searchColumn = array());
```