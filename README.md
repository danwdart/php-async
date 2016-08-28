# PHP-Async

Works like Javascript's setTimeout/setInterval.

`Async::async()` also runs the next piece of code independently (much like requestAnimationFrame or setImmediate/nextTick).

## Installation

`composer require jolharg/async`

## Usage

```php
<?php
namespace Whatever;

use Jolharg/Async;

class Whatever
{
    public function whatever()
    {
        Async::async(function() { echo 'hi'; })
    }

    public function somethingElse()
    {
        Async::setTimeout(function() { echo 'hi'}, 1000);
        Async::setInterval(function() { echo 'hi'}, 2000);
    }
}
```
