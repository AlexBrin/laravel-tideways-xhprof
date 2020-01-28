# Laravel Tideways (XHProf)

Library for profiling queries in Laravel with Tideways

## Install:
```bash
composer require alexbrin/laravel-tideways-xhprof
```

## Settings
Create file `tiedways.php` in `config` path with content:
```php
<?php

return [
    'enabled' => true, 
    'global_middleware' => true,
];
```

### Params description
Name | Default | Description
-----|---------|------------
enabled | `true` | Enabling or disabling the profiler
global_middleware | `true` | The inclusion the global middleware for profiling at any route