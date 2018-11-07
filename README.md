# Fisheye_Modal

## Overview
A Magento 2 module that adds a reusable modal component that can be configured using layout XML arguments.

> Note: this module was created as an example to support the talk ['Level up your layout'](http://uk.magetitans.com/speakers/john-hughes/) presented at Mage Titans MCR 2018, but is based on a real world implementation.

## Features

* Utilises Magento's [Modal jQuery widget](https://devdocs.magento.com/guides/v2.2/javascript-dev-guide/widgets/widget_modal.html)
* Facilitates creation of modal components via layout XML which can be configured by passing arguments
* Configuration options include: link text, modal title, modal type and more.  [Click here](arguments.csv) a full list of arguments.
* Content for modals is passed in as a child block in layout

## Compatibility

* Magento Community Edition / Enterprise Edition 2.2.x
* Supports Magento 2 Full Page Cache (including Varnish)

## Installation

```
composer require fisheye/module-modal
php bin/magento module:enable Fisheye_Modal
php bin/magento setup:upgrade
```

## Contributing
Issues, forks and pull requests welcomed :)
