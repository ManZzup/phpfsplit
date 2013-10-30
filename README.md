phpfsplit : File Splitter function for php
==========================================

A php function to split a given file to parts based on the specified buffer size.

How to use?
-----------

1.  Include phpfsplit.php
2.  Use fsplit($filename,$buffer)

```php
fsplit($filename, $buffer)
```

$filename : path to the file that should be splitted (ex: files/myfile.jpg)

$buffer  : size of a part of a file. Defined in BYTES. Default is 1kb(== 1024) (ex: 4096 for 4kb)

return : array of string ; the paths to the splits

Splits are named as filename.part0 filename.part1 ...
