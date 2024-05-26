# Null

This package provides a way to handle nullable values in your application.

## Getting started
### Installation
```
$ composer require atournayre/null
```

### Usage

Title is from the Fixture namespace in Tests.

#### Nominal case
Before you used to have return type `string` and now you can use `Title` object.

```php
$title = Title::create('My title');

$title->title; // 'My title'
$title->isNull(); // false
$title->isNotNull(); // true
$title->mayBeNull(); // false
```

#### Nullable case

Before you used to have return type `null` and now you can use `Title` object.

```php
$title = Title::asNull();

$title->title; // 'Empty title'
$title->isNull(); // true
$title->isNotNull(); // false
$title->mayBeNull(); // false
```

#### Maybe nullable case

Before you used to have return type `?string` and now you can use `Title` object.

If you are not sure if the value is null or not, you can use `getOrNull()` method, it's a replacement of `?->` operator.

```php
$title = Title::create('My title')
    ->getOrNull()
    ->title; // 'My title'
```


```php
$title = Title::asNull()
    ->getOrNull()
    ->title; // 'Empty title'
```


## Contributing
Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

After writing your fix/feature, you can run following commands to make sure that everything is still ok.

```bash
# Install dev dependencies
$ composer install

# Running tests and quality tools locally
$ make all
```

## Authors
- [Aurélien Tournayre](https://github.com/atournayre) - <aurelien.tournayre@gmail.com>
