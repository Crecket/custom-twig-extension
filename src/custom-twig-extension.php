<?php
class Crecket_twig_extension extends Twig_Extension
{
    public function getName(){
        return 'crecket_twig_extension';
    }

    public function getFunctions(){
        return array(
            'print_r' => new Twig_Function_Method($this, 'print_r'),

        );
    }
    public function getFilters() {
        return array(
            'json_decode' => new Twig_Filter_Method($this, 'jsonDecode'),
        );
    }

    public function jsonDecode($str) {
        return json_decode($str);
    }

    public function print_r($str, $len) {
        echo "<pre>";
        echo wordwrap(print_r($str), $len, "<br />\n");
        echo "</pre>";
    }

}