# custom-twig-extension

## Content
1. Introduction
2. Features
3. Requirements
4. Installation
5. Usage

## Introduction
Here I'll be adding my custom twig extensions

## Features

#### Functions
1. Print_r with \<pre> tags

#### Filters
1. Json_decode filter

## Requirements
- Twig ^1.22

## Installation
#### Composer
```composer require crecket/custom-twig-extension```

#### Manual
1. Download the source
2. Require the file
3. Add the extension to the twig view

## Usage


- Print_r

```
{{ print_r(array) }}
``` 

- json_decode() > Returns array
```
{{ some_variable|json_decode(true) }}
```
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

