# Product Crud

# Task description:
The expected outcome is 2 separate pages for:
1) product list
2) product add
1. Product list should list all existing product and details, like:
   * SKU (unique for each product)
   * Name
   * Price
     - Also each product type has special attribute, which we expect you would be able to
   display as well (one of based on type):
   * Size (in MB) for DVD-disc
   * Weight (in Kg) for Book
   * Dimensions (HxWxL) for Furniture
     - An advantage would be implementation of the optional feature: mass delete action,
     implemented as checkboxes next to each product.

2. Product add page should display a form, with following fields
      * SKU
      * Name
      * Price
        * Type switcher (buttons for each type)
        * Special attribute [please note: the form should be dynamically changed when
        type is switched]
 
      - Additional note: Special attribute should have a description with helpful information,
      related to its type ex.: “Please provide dimensions in HxWxL format”, when type: Furniture is
      selected. 
      - Additional requirement: all fields are mandatory for submission.
      An advantage would be fields value (or format whether suitable) validation

## Getting Started

First, we need to run the PHP server in the public folder

```
php -S localhost:8000
```

## Usage

We only have two pages

```
   * Products Page
       - /products/list
       - /products
       - /
    
    * CreaTe New Project
        - /products/new
```
### Branches

* Main:
* Feature:
* Bugfix:
