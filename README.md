# Tower

[![Build Status](https://travis-ci.org/swaroopsm/tower.svg?branch=master)](https://travis-ci.org/swaroopsm/tower)
[![Code Climate](https://codeclimate.com/github/swaroopsm/tower.png)](https://codeclimate.com/github/swaroopsm/tower)
[ ![Codeship Status for swaroopsm/tower](https://www.codeship.io/projects/92ed1b80-e9ba-0131-b887-2eefd7a2b3d5/status)](https://www.codeship.io/projects/26230)
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
  "swaroopsm/tower": "0.3"
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

#### Template Layouting

Tower also lets you add a layout for your templates. This can be useful if for your webpages.
Example on using layout in your templates;

~~~
$tower->setLayout('layout.php');
~~~

You use the `$yield` to render the template contents in your helper. A more detailed example on using layout is availabe at: [Layout Example](https://github.com/swaroopsm/tower/wiki/Layout-Example)

#### Using Partials

Partials allows you to include templates in other templates thus allowing you to re-use the templates. Refer to the following code in order to set partials for your templates.

~~~
$tower->partial->set('header', 'header.php');
$tower->partial->set('footer', 'footer.php');
~~~

And to render these partials in your templates use:

~~~
<?= $partial['header'] ?>

Some stuffs here...

<?= $partial['footer'] ?>
~~~

If you decide to use a different variable for the partial instead of `$partial` use the following:

~~~
$tower->partial->setPrefix('towerPartial');
~~~

Now you can do the following:

~~~
<?= $towerPartial['header'] ?>

Some stuffs here...

<?= $towerPartial['footer'] ?>
~~~

Refer here for a [Detailed Example](https://github.com/swaroopsm/tower/wiki/Including-Partials)
### Some Goodies

Few other extra methods included in Tower.

#### Save to file

This is useful if you would like to dynamically save contents to a file.

~~~
$tower->save('filename.txt');
~~~

#### Examples
- [Render Template](https://github.com/swaroopsm/tower/wiki/Render-Template)
- [Layout Example](https://github.com/swaroopsm/tower/wiki/Layout-Example)
- [Partials Example](https://github.com/swaroopsm/tower/wiki/Including-Partials)
