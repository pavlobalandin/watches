Yet another Framework
====

The original task

```text
We have e-shop with watches.
E-shop has a backend for storage.
Watches have basic information (see JSON below) and information about fountain.
Fountain can be base64 encoded image or set of two parameters like color and size.

Watches sample with image.

{
    "title": "Prim",
    "price": "250000", // int
    "description": "A watch with a water fountain picture",
    "fountain": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=" // base64 picture
}


Watches sample with parameterized fountain.

{
    "title": "Prim",
    "price": "250000", // int
    "description": "A watch with a water fountain picture",
    "fountain": {
        "color": "blue",
        "height": "20cm"
    }
}

Application should:

1. Have class for incoming payload mapping. This class should be reused in other project parts.
2. Have validation layer to work with incoming data. One validation type (price === int) should be predefined.
3. Have easy changeable input data format. Fro example e-shop communication can be XML based later.
4. Tests

No need to solve frawework layer (DIC, HTTP) as whole part. Prepare a base.
```

## Installation

```bash
composer install
```
## Launch application

```bash
php public/index.php
```

## Launch tests

```bash
cd tests
../vendor/bin/phpunit
```