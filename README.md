# lucky
一个简单的抽奖内库

# install
## composer require jahem/lucky

# demo
```php
<?php
	require 'vendor/autoload.php';
	use lucky\lucky;
	$prize_arr = [
        '0' => [ 
            'id' => 1,
            'chance' => 90
            ],
        '1' => [
            'id' => 2,
            'chance' => 1
            ],
        '2' => [
            'id' => 3,
            'chance' => 0
            ],
        '3' => [
            'id' => 4,
            'chance' => 0
            ],
        '4' => [
            'id' => 5,
            'chance' => 0
            ],
    ];
	$lucky = new lucky($prize_arr);
	var_dump($lucky->start());
?>
```
