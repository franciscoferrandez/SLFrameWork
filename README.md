# SLFrameWork
SalesLayer Framework is a demo on how to build a simple and reusable MVC framework from scratch.

Using following components:
https://www.doctrine-project.org/projects/doctrine-orm/en/2.8/index.html
https://www.doctrine-project.org/projects/doctrine-migrations/en/3.0/index.html

https://github.com/mark-gerarts/automapper-plus

https://github.com/tcdent/php-restclient
https://github.com/vlucas/phpdotenv
https://github.com/bramus/router
https://twig.symfony.com/doc/3.x/intro.html#installation


https://getbootstrap.com/docs/4.5/examples/
https://bootstrap-autocomplete.readthedocs.io/en/latest/
https://raw.githack.com/xcash/bootstrap-autocomplete/master/dist/latest/index.html


## Installation

#### Clone repository
git clone https://github.com/franciscoferrandez/SLFrameWork

#### Install dependencies
`X:\dev\appfolder>composer install`

#### Adjust .env file
```
HOME_URL="http://www.saleslayer.local"
APPLICATION_NAME="SalesLayer"
APPLICATION_LOGO="https://saleslayer.com/assets/images/logo.svg"
APPLICATION_FULLNAME="SalesLayer Rest Client"
APPLICATION_VERSION="0.1"

APPLICATION_THEME="_saleslayer"

DATABASE_HOST=________________
DATABASE_NAME=________________
DATABASE_USER=________________
DATABASE_PASS=________________
```

#### Create database schema
`X:\dev\appfolder>vendor\bin\doctrine.bat orm:schema-tool:create --force`

alternative:

```sql
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alpha2code` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alpha3code` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capital` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subregion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borders` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nativeName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latlng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `country_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```


