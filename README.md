# html-parser
A very simple php parser of html documents which returns the amount of tags used in the document.   
The return data can be given as an array, a html-table or in a xml data format.

To parse an html document all you need to do is to call a static method as following:  
```php
$html = '<div><strong>this is a string</strong></div>';  //string format
$html = '../file.html';                                  //file
$html = 'https://thepiratebay-proxylist.org/';           //link

$src = new HtmlSource($html);                            //html source object

$resultAr = Parcer::parse($src, 'xml');         //the second argument may be 'array', 'xml' or 'html'

```
