# custom-twig-extension

[![Latest Stable Version](https://poser.pugx.org/crecket/custom-twig-extension/v/stable)](https://packagist.org/packages/crecket/custom-twig-extension)
[![License](https://poser.pugx.org/crecket/custom-twig-extension/license)](https://packagist.org/packages/crecket/custom-twig-extension)

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
- Twig ^1.22

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

### Globals
1. sessionVars   //Returns all php SESSION variables in array form

## License
            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
                    Version 2, December 2004

 Copyright (C) 2004 Sam Hocevar <sam@hocevar.net>

 Everyone is permitted to copy and distribute verbatim or modified
 copies of this license document, and changing it is allowed as long
 as the name is changed.

            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
   TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION

  0. You just DO WHAT THE FUCK YOU WANT TO.

