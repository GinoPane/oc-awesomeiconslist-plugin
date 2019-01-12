# Blog Time to Read

A simple time to read extension for [RainLab Blog](https://octobercms.com/plugin/rainlab-blog) plugin.

[![Maintainability](https://api.codeclimate.com/v1/badges/589a234df30aad280f9b/maintainability)](https://codeclimate.com/github/GinoPane/oc-blogtimetoread-plugin/maintainability)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GinoPane/oc-blogtimetoread-plugin/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GinoPane/oc-blogtimetoread-plugin/?branch=master)

[_Blog Time to Read_](https://octobercms.com/plugin/ginopane-blogtimetoread) adds a basic time to read calculation for your awesome posts.

## Requirements

The _Blog Time to Read_ plugin requires RainLab Blog and [RainLab Translate](https://octobercms.com/plugin/rainlab-translate).

## Settings

Plugin defaults are controlled via backend settings panel, just look for _Blog Time to Read_ in your _Settings_ dashboard.
Currently you can set **default reading speed** (words per minute, the initial value is 300 wpm) and result **rounding** to
the closest higher integer (it is enabled by default).

## Implementing Frontend Pages

The _Blog Time to Read_ plugin provides several ways to get time to read for your blog post:
1. The default `Post` model is extended with `timeToRead` property which gives you a number in minutes to read the post. The default
settings are being used for calculation.

    ```{{ post.timeToRead }} ```

2. Templates can use a new Twig `timeToRead` filter which uses the initial settings by default but also allows to override them
explicitly (the example shows how you can set 100 wpm speed without rounding for a filter).

    ```{{ post.content | timeToRead(100, false) }} ```

3. TimeToRead **component** is available for use.

    Component properties:
    
    * **Post slug** - get time to read for the post specified by the slug value from URL parameter;
    * **Default reading speed** - words per minute by default;
    * **Rounding up** - round fractional values to the next highest integer value.

    
> Please note that default component partial contains the call to translation filter.
```
<div>
    <p>{{ ":count min to read" |_({ count: __SELF__.minutes }) }}</p>
</div>
```
> It allows you to edit the message using the Translate plugin and specify messages for different languages too.