## Description
Yet another useful plugin, allowing you to detect player's real IP's rather than using WaterDog's IP address.


## What can this plugin do?

This plugin allows the server to imput player's actual IP's by using API functions. The difference between the pocketmine's method (getAddress()) and getClientIP(), is Pocketmine doesn't worry about retreiving IP's that might not be 100% correct if you're using Waterdog server software.

If you use our method functions, then you can retreive the player's actual IP address when using WaterDog.


## Any planned updates?

Not at the moment. The only updates that will most likely be made, is bug fixes and improvements within this plugin, so if you have any issues regarding this waterdog plugin when using WaterDog proxy, please open an issue. We'd like to get it discussed and fixed ASAP.


## For developers // API
First, you want to import the class:
```php
<?php
use WaterDog\Zeao\API;
```
You can use methods into two ways.

One of the ways, you can use:
```php
<?php
use WaterDog\Zeao\Loader;

Loader::getInstance()->getAPI();
```
Which returns as the API class. This is used to obtain a player's Client IP later on.

And the other way, you can use:
```php

API::getClientIP($player);
```

This is used to obtain a $player class using pocketmine's Player::class subjective.

The $player variable is the variable for the Player::class, which can be used to detect the player's Client IP. You'd more than likely to use this on plugins like ip banning a player, IP Logging a player, detecting a player's IP on join (If need to be stored anywhere else).


## Examples
You can check out some examples here: [here](https://github.com/iZeaoGamer/WaterDogIP/tree/master/examples)