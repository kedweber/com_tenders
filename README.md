# Tender Manager \(com_tenders\)

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

### Composer

Installation is done through composer. In your `composer.json` file, you should add the following lines to the repositories
section:

from the local repository;

```json
{
    "name": "moyo/com_tenders",
    "type": "vcs",
    "url": "https://github.com/kedweber/com_tenders.git"
}
```

and from the official repository;

```json
{
    "name": "moyo/com_tenders",
    "type": "vcs",
    "url": "https://github.com/moyoweb/com_tenders.git"
}
```

The require section should contain the following line:

```json
    "moyo/com_tenders": "1.0.*",
```

Afterwards, one just needs to run the command `composer update` from the root of your Joomla project. This will 
effectively create a `composer.lock` file which will contain the collected dependencies and the hash codes for 
each latest release \(depending on the require section's format\) for each particular repo. Should installations 
problems occur due to a bad ordering of the dependencies, one may need to go into the lock file and manualy change 
the order of the components. Running `composer update` again will again cause a reordering of the lock file, beware of 
this factor when running an update. Thereafter, you can run the command `composer install`. 

If you have not setup an alias to use the command composer, then you will need to replace the word composer in the previous commands with the 
commands with `php composer.phar` followed by the desired action \(eg. update or install\).

### jsymlinker

Another option is to run the [jsymlink script](https://github.com/derjoachim/moyo-git-tools) in the root folder, available via the original Moyo developer, Joachim van de Haterd's repository, under 
the [Moyo Git Tools](https://github.com/derjoachim/moyo-git-tools).

#### License jsymlinker

The joomlatools/installer plugin is free and open-source software licensed under the [GPLv3 license](https://github.com/derjoachim/joomla-composer/blob/develop/gplv3-license).

## Usage

### Fieldset

The tenders are saved in a CCK fieldset. All that needs to be done, is that the content editor fills in the blanks. Since the layout is shared among all our CCK-based components, this should be self-explanatory.

# @TODO

  * Frontend. Possibly this is to be done in the template for each site.
  * Connection to the SCR.
