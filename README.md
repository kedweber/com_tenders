# com-tenders Tender Manager

## Introduction

Integrated into several CTA websites, it should be possible to facitilate the workflow of call for tender to awarding and evaluation by the EU.

In order to accomodate these demands, com_tenders was developed as an extension to our CCK. This enables CTA to manage its Tender documentation in a consistent way. As a bonus, tenders can be saved multilingually.

The CCK was developed by [Moyo Web Architects](http://moyoweb.nl).

## Requirements

   * Joomla 3.X .
   * Koowa 0.9 or 1.0 (as yet, Koowa 2 is not supported)
   * PHP 5.3.10 or better
   * Moyo Components
       * com_moyo
       * com_taxonomy
	   * com_regions

## Installation

Installation is done through composer. In your `composer.json` file, you should add the following lines to the repositories
section:

```json
{
    "name": "cta/tenders",
    "type": "vcs",
    "url": "https://github.com/cta-int/com_tenders.git"
}
```

The require section should contain the following lines:

```json
    "moyo/tenders": "1.0.*",
```

Afterward, just run `composer update` from the root of your Joomla project.

### jsymlinker

Another option, currently only available for Moyo developers, is by using the jsymlink script from the [Moyo Git
Tools](https://github.com/derjoachim/moyo-git-tools).

## Usage

### Fieldset

The tenders are saved in a CCK fieldset. All that needs to be done, is that the content editor fills in the blanks. Since the layout is shared among all our CCK-based components, this should be self-explanatory.

# @TODO

  * Frontend. Possibly this is to be done in the template for each site.
  * Connection to the SCR.
