recipe-finder
=============

## Requirements
- PHP 5.3+
- PHPUnit 4.1+

## Usage
```
php index.php <fridge csv file> <recipes json file>
```

Example would be
```
php index.php fridge.csv recipes.json
```

Output would be
```
salad sandwich
```

## Unit Test
PHPUnit can be installed via Composer by
```
php composer.phar install
```

If you have running PHPUnit, you can run the following command to test
```
phpunit -c phpunit.xml.dist
```

There are 3 errors to show the validation of input which is expected after unit test run.