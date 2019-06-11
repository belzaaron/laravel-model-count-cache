# Laravel Model Count Cache

Adds support for having updated cached counts for your Laravel models.

## Installing

On a Laravel application 5.8+:

```bash
composer require belzaaron/laravel-model-count-cache
```

If that says something about incompatable versions and you're sure you're on Laravel (full) 5.8+ then run this instead:

```bash
composer require belzaaron/laravel-model-count-cache --prefer-lowest
```

## Usage

On any Eloquent model import this trait:

```php
use BelzAaron\ModelCountCache\Traits\HasCachedCount;
```

then add it to the "use"s for the class:

```php
class Page extends Model
{
    use HasCachedCount;

    ...
```

next getting the count that is cached is as easy as:

```php
$pages = Page::getCachedCount();
```

Perfect for dashboards, like so:

```php
<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:dashboard_browse');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('dashboard.index', [
            'users' => User::getCachedCount(),
            'pages' => Page::getCachedCount(),
        ]);
    }
}
```

See!? Nice and clean. Now get on with your life and make something awesome.

## Contributing

Yeah, if you wanna you can open issues/pull requests. I see a need for better documentation and maybe support for different cache connections as of 06/11/2019. But, I more than likely won't add this soon. So you need something like that feel free to help out the open source community. Thanks.

## Closing

![Merry Christmas](https://i.imgur.com/RGRx0hu.gif)
