# Tower

[![Build Status](https://travis-ci.org/swaroopsm/tower.svg?branch=master)](https://travis-ci.org/swaroopsm/tower)
[![Latest Stable Version](https://poser.pugx.org/swaroopsm/tower/v/stable.svg)](https://packagist.org/packages/swaroopsm/tower) 
[![Total Downloads](https://poser.pugx.org/swaroopsm/tower/downloads.svg)](https://packagist.org/packages/swaroopsm/tower) 
[![Latest Unstable Version](https://poser.pugx.org/swaroopsm/tower/v/unstable.svg)](https://packagist.org/packages/swaroopsm/tower) 
[![License](https://poser.pugx.org/swaroopsm/tower/license.svg)](https://packagist.org/packages/swaroopsm/tower)

A light weight helper for simple php templating.

### Why use Tower?
If you want to keep your view logic separated from the core code, Tower is for you. Tower is obviously not a full-fledged template engine. Although if you are using a PHP framework like Codeigniter, Laravel etc., Tower is again a bad solution.

Tower is best suited if for small scale web applications, where you may not need a full-fledged framework. If you decide to write a web application using plain PHP, then do check Tower.

### Installing Tower

Tower is available via composer. Add the following line to your `composer.json` so that Tower is autoloaded into your application.

~~~
"require": {
  "swaroopsm/tower": "0.1"
}
~~~

### Using Tower

Tower has a very simple and easy API consisting of a few methods.

#### Instantiate Tower

~~~
$tower = new Tower();
~~~

#### Set a template file

Tell Tower which file should be used as the template.

```html
// filename: template.php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <h2><?= $name ?></h2>
  <p><?= $description ?></p>
</body>
</html>
```

~~~
$tower->setTemplate('template.php');
~~~

#### Set variables

Tower lets you setup variables that can be used in your template.

~~~
$tower->set('name', 'Tower');
$tower->set('description', 'A simple template helper');
~~~

#### Render your template

Render on your browser.

~~~
$tower->render();
~~~

### Some Goodies

Few other extra methods included in Tower.

#### Save to file

This is useful if you would like to dynamically save contents to a file.

~~~
$tower->save('filename.txt');
~~~

[Example Code](https://github.com/swaroopsm/tower/wiki/Example)
