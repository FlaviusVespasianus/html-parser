# html-parser
A very simple php parser of html documents which returns the amount of tags used in the document.   

Currently there are two return data types: 
* array
* xml

An example of parsing a string data
```php
$parser = new Parser();
$parser->parse($html);  //$html may be a string, an url or a html document 
$parser->returnArray(); //to get found tags
$parser->returnXml(); //to get found tags as XML document

```