# Magentom Admin Order Note

This is simple magento 2 module allow admin can add special comment into order.

## Getting Started

### Installing

Clone this repo

```
cd app/code
git clone https://github.com/KasNGCloud/demo-next .
```

Enable this module

```
php bin/magento module:enable KasNG_OrderNote
```

Upgrade the database of the module by using follows command line:

```
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
php bin/magento setup:di:compile
php bin/magento cache:flush
```

Finish install.

### Configurations

Custom note will be configured in admin system.

| Section | Group | Field | Description | 
| ------ | ----- | ----- | ----------- |
| ordernote | general | enable | Enable/Disable custom note |
| ordernote | general| custom_note | Custom note string |



## Versioning

Current Version 1.0.1

## Authors

* **Kas NG** - *Initial work* - [KasNGCloud](https://github.com/KasNGCloud)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
