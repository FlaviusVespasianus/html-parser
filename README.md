# html-parser
A very simple php parser of html documents which returns the amount of tags used in the document.   

Currently there are two return data types: 
* array
* xml

An example of parsing a given source
```php
$parser = new Parser();
$parser->parse($source);  //$html may be a string, an url or a html document 
$parser->returnArray(); //to get found tags
$parser->returnXml(); //to get found tags as XML document
```

This source may be one of the following types:
```php
$source = '<div><strong>this is a string</strong></div>';  //string format
$source = '../file.html';                                  //file
$source = 'https://thepiratebay-proxylist.org/';           //link
```
