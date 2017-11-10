# yuncms-tag

[![Latest Stable Version](https://poser.pugx.org/yuncms/yuncms-tag/v/stable.png)](https://packagist.org/packages/yuncms/yuncms-tag)
[![Total Downloads](https://poser.pugx.org/yuncms/yuncms-tag/downloads.png)](https://packagist.org/packages/yuncms/yuncms-tag)
[![Build Status](https://img.shields.io/travis/yuncms/yuncms-tag.svg)](http://travis-ci.org/yuncms/yuncms-tag)
[![License](https://poser.pugx.org/yuncms/yuncms-tag/license.svg)](https://packagist.org/packages/yuncms/yuncms-tag)


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require yuncms/yuncms-tag
```

or add

```
"yuncms/yuncms-tag": "~2.0.0"
```

to the `require` section of your `composer.json` file.

Url Rule
````
'topics' => 'tag/tag/index',
'topics/<name:(.*)>' => 'tag/tag/view',
````

## License

this is released under the MIT License. See the bundled [LICENSE.md](LICENSE.md)
for details.