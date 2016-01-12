# custom-twig-extension

[![GitHub release](https://img.shields.io/github/release/crecket/custom-twig-extension.svg)](https://github.com/Crecket/custom-twig-extension)
[![Packagist](https://img.shields.io/packagist/l/crecket/custom-twig-extension.svg)](https://packagist.org/packages/crecket/custom-twig-extension)

## Content
1. Introduction
2. Requirements
3. Installation
4. Usage
5. License

## Introduction
This repo contains my custom twig extension. In here you'll find a few native php functions added to twig as a twig extension.
Things like creating a random number or using json_decode can now be done directly in Twig.

## Requirements
- Twig ^1.25

## Installation
#### Composer
1. Require the repo with composer
```composer require crecket/custom-twig-extension```
2. Add the extension to the twig view 

#### Manual
1. Download the source
2. Require the file
3. Add the extension to the twig view

## Usage
Using these functions and filters is the same as the native functions and filters.

Quick example:
- print_r()
```
{{ print_r(array) }}
``` 
- json_decode
```
{{ some_variable|json_decode }}
```

## List

#### Functions
1. dumpPre(var1, var2, var3 ...)
1. md5(password)
2. password_hash(password)
3. phpinfo()
4. print_r(array)
5. pseudoBytes(length)
6. randomHex(length)
7. randomInt(length)
8. randomString(length)
9. unsetSession(key)
10. wordwrap(string, length, limiter = "\n", cut)

#### Filters
1. json_decode  
2. urlDecode  

### Globals
1. sessionVars   //Returns all php SESSION variables in array form

