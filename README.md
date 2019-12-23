# Awesome Icons List

The latest Font Awesome icons ([5.12.0](https://fontawesome.com/changelog/latest)) list as a backend form widget.

[![GitHub tag](https://img.shields.io/github/tag/ginopane/oc-awesomeiconslist-plugin.svg)](https://github.com/GinoPane/oc-awesomeiconslist-plugin)
[![Maintainability](https://api.codeclimate.com/v1/badges/95b49d826902f738c4a3/maintainability)](https://codeclimate.com/github/GinoPane/oc-awesomeiconslist-plugin/maintainability)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GinoPane/oc-awesomeiconslist-plugin/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GinoPane/oc-awesomeiconslist-plugin/?branch=master)

## Description

You may ask "Why do I need this plugin if October CMS itself has icon list in the Builder Plugin?". Here's why:
* a backend widget for your forms;
* 1556 icons vs 590 icons;
* the latest Font Awesome version.

## Backend Form Widget

Awesome Icons List registers a new backend form widget named `awesomeiconslist` with all available links. Usage example via `yaml` config:

    awesome_icon:
        label: Icon
        type: awesomeiconslist
        unicodeValue: false
        emptyOption: false
        iconTypes: brands
        placeholder: Select Icon
        span: left

And in the code:

    $form->addFields([
        'awesome_icon' => [
            'label'         => 'Icon',
            'type'          => 'awesomeiconslist',
            'unicodeValue'  => false,
            'emptyOption'   => false,
            'iconTypes'     => 'solid, regular',
            'placeholder'   => "Select Icon",
            'span'          => 'left'
        ]
    ]);
    
### Form Widget Properties

* **unicodeValue** - by default, the selected icon will be returned as a valid ready-to-use Font Awesome class, like `far fa-thumbs-up`. Unicode value option tells the widget to return the value as unicode value like `&#xf164` ready-to-use with Font Awesome font family;
* **emptyOption** - whether to add or not an empty option to the icons list, so you can basically select nothing;
* **placeholder** - placeholder value which will be shown when nothing is selected;
* **iconTypes** - allows you to specify font awesome icon types to be used in the list, separated by comma for multiple values; available options are "regular", "solid", "brands"; all icons are returned if nothing set or in case of incorrect values.

> Please note that at the moment of this writing October CMS has a bug related to the placeholder initialization and basically the placeholder won't work without an empty option, so when you set placeholder and empty option will be created automatically.

## Frontend Component

Awesome Icons List registers a new frontend component named `FontAwesomeCssLink` and all it does is adds a link to the latest Font Awesome CSS file, so you don't need to worry about it.

> Please note that at the moment of this writing the Font Awesome does not have a permanent CDN link to the latest version, so the plugin will contain the latest link for the date of its release. Also you can update the link by yourself via `System -> Awesome Icons Links` if the plugin update delays.  