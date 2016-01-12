<?php


class custom_twig_extension extends Twig_Extension
{

    function dumpPre()
    {
        $backtrace = debug_backtrace();
        $vars = func_get_args();
        echo "<br>Line: " . $backtrace[0]['line'];
        echo "<br>File: " . $backtrace[0]['file'];
        echo "<br>===========================================";
        foreach ($vars as $key => $var) {
            echo "<br>Argument: " . ($key + 1);
            echo "<pre>";
            echo print_r($var);
            echo "</pre>";
            echo "<br>===========================================";
        }
        return;
    }


    public function getName()
    {
        return 'custom_twig_extension';
    }

    // Functions

    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('dumpPre', "dumpPre"),
            new Twig_SimpleFunction('md5', "md5"),
            new Twig_SimpleFunction('phpinfo', "phpinfo", array(
                'is_safe' => array('html')
            )),
            new Twig_SimpleFunction('print_r', "print_r", array(
                'is_safe' => array('html')
            )),
            new Twig_SimpleFunction('pseudoBytes', "pseudoBytes"),
            new Twig_SimpleFunction('randomHex', "randomHex"),
            new Twig_SimpleFunction('randomInt', "randomInt"),
            new Twig_SimpleFunction('randomString', "randomString"),
            new Twig_SimpleFunction('unsetSession', "unsetSession"),
            new Twig_SimpleFunction('wordwrap', "wordwrap", array(
                'is_safe' => array('html')
            )),
        );
    }


    public function md5($str)
    {
        return md5($str);
    }

    public function password_hash($password)
    {
        return password_hash(base64_encode(hash('sha256', $password, true)), PASSWORD_DEFAULT);
    }

    public function phpinfo()
    {
        return phpinfo();
    }

    public function print_r($str)
    {
        return "<pre>" . print_r($str, true) . "</pre>";
    }

    public function pseudoBytes($length = 32)
    {
        $bytes = openssl_random_pseudo_bytes($length, $strong);
        if ($strong === TRUE) {
            return $bytes;
        } else {
            throw new \Exception ('Insecure server! (OpenSSL Random byte generation insecure.)');
        }
    }

    public function randomHex($length = 32)
    {
        $bytes = \ceil($length / 2);
        $hex = \bin2hex($this->pseudoBytes($bytes));
        return $hex;
    }

    public function randomInt($min = 0, $max = 2147483647)
    {
        if ($max <= $min) {
            throw new \Exception('Minimum equal or greater than maximum!');
        }
        if ($max < 0 || $min < 0) {
            throw new \Exception('Only positive integers supported for now!');
        }
        $difference = $max - $min;
        for ($power = 8; \pow(2, $power) < $difference; $power = $power * 2) ;
        $powerExp = $power / 8;

        do {
            $randDiff = \hexdec(\bin2hex($this->pseudoBytes($powerExp)));
        } while
        ($randDiff > $difference);
        return $min + $randDiff;
    }

    public function randomString($length = 32)
    {

        $charactersArr = \array_merge(\range('a', 'z'), \range('A', 'Z'), \range('0', '9'));

        $charactersCount = \count($charactersArr);

        $stringArr = array();

        for ($character = 0; $character !== $length; $character++) {
            $stringArr[$character] = $charactersArr[$this->randomInt(0, $charactersCount - 1)];
        }

        return \implode($stringArr);
    }

    public function unsetSession($key)
    {
        unset($_SESSION[$key]);
    }

    public function wordwrap($str, $len, $limiter = "\n", $cut = false)
    {
        return wordwrap($str, $len, $limiter, $cut);
    }

    // Filters
    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('jsonDecode', "jsonDecode"),
            new Twig_SimpleFilter('urlDecode', "urlDecode"),
        );
    }

    public function jsonDecode($str)
    {
        return json_decode($str, true);
    }

    public function urlDecode($url)
    {
        return urldecode($url);
    }

    // Globals
    public function getGlobals()
    {
        return array(
            'sessionVars' => $_SESSION,
        );
    }
}
