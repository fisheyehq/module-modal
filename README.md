# Fisheye_Modal

## Overview
A Magento 2 module that adds a reusable modal component that can be configured using layout XML arguments.

> Note: this module was created as an example to support the talk ['Level up your layout'](http://uk.magetitans.com/speakers/john-hughes/) presented at Mage Titans MCR 2018, but is based on a real world implementation.

## Features
* Utilises Magento's [Modal jQuery widget](https://devdocs.magento.com/guides/v2.2/javascript-dev-guide/widgets/widget_modal.html)
* Facilitates creation of modal components via layout XML which can be configured by passing arguments
* Configuration options include: link text, modal title, modal type and more.  [Click here](arguments.csv) a full list of arguments
* Content for modals must be passed in as one or more child blocks using layout XML

## Usage
To create a modal component you need to create a block using `Fisheye\Modal\Block\Modal` as the class and `Fisheye_Modal::modal.phtml` as the template.  Pass in the required and optional arguments from [arguments.csv](arguments.csv) and a child block that contains your content.

An example below shows adding a a block to the product page (note: this would need to be in a layout file with the handle `catalog_product_view.xml`) under the add to wishlist and compare links etc.

The required `linkText` value as well as a `title` for the modal to display once opened are passed in via arguments and a CMS block is added as a child block for the modal's content.

```
<referenceContainer name="product.info.main">
    <block class="Fisheye\Modal\Block\Modal"
           name="my.modal"
           template="Fisheye_Modal::modal.phtml"
           after="product.info.extrahint">
        <arguments>
            <argument name="linkText" translate="true" xsi:type="string">My link text to trigger modal</argument>
            <argument name="title" translate="true" xsi:type="string">My modal title</argument>
        </arguments>
        <block class="Magento\Cms\Block\Block"
               name="my.modal.content">
            <arguments>
                <argument name="block_id" xsi:type="string">my_cms_block_id</argument>
            </arguments>
        </block>
    </block>
</referenceContainer>
```

## Compatibility
* Magento Open Source / Commerce Edition 2.2.x
* Supports Magento 2 Full Page Cache (including Varnish)

## Installation

```
composer require fisheye/module-modal
php bin/magento module:enable Fisheye_Modal
php bin/magento setup:upgrade
```

## Contributing
Issues, forks and pull requests welcomed :)
