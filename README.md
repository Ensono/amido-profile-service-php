# Amido\ProfileService

This package is used in conjunction with the Amido profile service to persist and retrieve profiles.

## Installation

### Composer

Add this to your application's composer.json:

```php
{
    "require": {
        "nategood/httpful": "*"
    }
}
```

And then execute:

```php
    composer install
```


## Usage

Create a new instance
```php
use Amido\ProfileService;

$service = new ProfileService('subscription_key_here');
```

Then call the API via the following methods

```php
$service->create_profile('realm_here', 'user_id_here', 'delegate_access_token_here', array('profile' => 'here));
```
