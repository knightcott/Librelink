# librelink
> Bare bones of a simple connector for linking to a LibreNMS API endpoint.

## Index
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)

## Installation
```
composer require knightcott/librelink
```

## Configuration
* Publish config file:

`php artisan vendor:publish` -> and select **Knightcott\Librelink\LibrelinkServiceProvider**

or

`php artisan vendor:publish --provider="Knightcott\Librelink\LibrelinkServiceProvider"`


Add the server name and API token to the following variables in the environment file
```
LIBRENMS_SERVER="protocol://hostname/ip"
LIBRENMS_API_TOKEN="LibreNMS api token"
```

## Usage

`use Knightcott\Librelink\Librelink;`

$link = New Librelink;

// Get all devices
$devices = $link->get_devices();

// Get a device
$device = $link->get_device(1);
$device = $link->get_device('myserver.example.com');

// Delete a device
$device = $link->del_device(1);

```
