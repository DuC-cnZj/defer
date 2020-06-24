<h1 align="center"> php defer </h1>

> 在php中实现go/defer，略微有点不一样

## Installing

```shell
composer require duc_cnzj/defer
```

## Usage

```php
$t = time();
defer(function () use($t) {
    echo time()-$t."\n";
}, $_);
```


## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/duccnzj/defer/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/duccnzj/defer/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
