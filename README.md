# yuncms-tag

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