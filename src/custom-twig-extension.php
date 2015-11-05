<?php
class custom_twig_extension extends Twig_Extension{

    public function getName(){
        return 'custom_twig_extension';
    }

    public function getFunctions(){
        $funcHolder = array(
            'md5' => new Twig_Function_Method($this, 'md5'),
            'password_hash' => new Twig_Function_Method($this, 'password_hash'),
            'phpinfo' => new Twig_Function_Method($this, 'phpinfo', array(
                'is_safe' => array('html')
            )),
            'print_r' => new Twig_Function_Method($this, 'print_r', array(
                'is_safe' => array('html')
            )),
            'pseudoBytes' => new Twig_Function_Method($this, 'pseudoBytes'),
            'randomHex' => new Twig_Function_Method($this, 'randomHex'),
            'randomInt' => new Twig_Function_Method($this, 'randomInt'),
            'randomString' => new Twig_Function_Method($this, 'randomString'),
            'wordwrap' => new Twig_Function_Method($this, 'wordwrap', array(
                'is_safe' => array('html')
            )),
        );
        return $funcHolder;
    }

    public function md5($str) {
        return md5($str);
    }

    public function password_hash($password) {
        return password_hash(base64_encode(hash('sha256', $password, true)), PASSWORD_DEFAULT);
    }

    public function phpinfo() {
        return phpinfo();
    }

    public function print_r($str) {
        return "<pre>".print_r($str)."</pre>";
    }

    public function pseudoBytes ($length = 32) {
        $bytes = openssl_random_pseudo_bytes($length, $strong);
        if ($strong === TRUE) {
            return $bytes;
        } else {
            throw new \Exception ('Insecure server! (OpenSSL Random byte generation insecure.)');
        }
    }

    public function randomHex ($length = 32) {
        $bytes = \ceil($length/2);
        $hex = \bin2hex($this->pseudoBytes($bytes));
        return $hex;
    }

    public function randomInt ($min = 0, $max = 2147483647) {
        if ($max <= $min) {
            throw new \Exception('Minimum equal or greater than maximum!');
        }
        if ($max < 0 || $min < 0) {
            throw new \Exception('Only positive integers supported for now!');
        }
        $difference = $max - $min;
        for ($power = 8; \pow(2, $power) < $difference; $power = $power*2);
        $powerExp = $power/8;

        do {
            $randDiff = \hexdec(\bin2hex($this->pseudoBytes($powerExp)));
        } while
        ($randDiff > $difference);
        return $min + $randDiff;
    }

    public function randomString ($length = 32) {

        $charactersArr = \array_merge(\range('a', 'z'), \range('A', 'Z'), \range('0', '9'));

        $charactersCount = \count($charactersArr);

        $stringArr = array();

        for ($character = 0; $character !== $length; $character++) {
            $stringArr[$character] = $charactersArr[$this->randomInt(0, $charactersCount-1)];
        }

        return \implode($stringArr);
    }

    public function wordwrap($str, $len, $limiter = "\n", $cut = false) {
        return wordwrap($str, $len, $limiter, $cut);
    }

    public function getFilters() {
        return array(
            'json_decode' => new Twig_Filter_Method($this, 'jsonDecode'),

        );
    }

    public function jsonDecode($str) {
        return json_decode($str, true);
    }


}
