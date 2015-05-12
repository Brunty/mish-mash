Mish mash of various components together for a sort-of-framework-type-thing.

Thrown together quickly over lunchbreaks really.

Klein as a router
Pimple as a DI Container
Twig for templating
phpdotenv for loading a .env file into getenv()
Evenement as an event system
Predis as a REDIS library


Update your hosts file:

`192.168.56.103 local.redis www.local.redis`


The system:

* PHP 5.6
* Mysql 5.6
* nginx 1.8
* Redis 2.8.4


Paths are kinda hard coded. Deal with it.

Classes aren't adapted or abstracted from concrete implementations. Deal with it.