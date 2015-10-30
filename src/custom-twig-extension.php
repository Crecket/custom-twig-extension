<?php
class custom_twig_extension extends Twig_Extension
{
    public function getName(){
        return 'crecket_twig_extension';
    }

    public function getFunctions(){
        return array(
            'print_r' => new Twig_Function_Method($this, 'print_r', array(
                'is_safe' => array('html')
            )),
            'wordwrap' => new Twig_Function_Method($this, 'wordwrap', array(
                'is_safe' => array('html')
            ))
        );
    }
    public function getFilters() {
        return array(
            'json_decode' => new Twig_Filter_Method($this, 'jsonDecode'),
        );
    }

    public function jsonDecode($str) {
        return json_decode($str, true);
    }

    public function print_r($str, $len) {
        return "<pre>".print_r($str)."</pre>";
    }

    public function wordwrap($str, $len, $limiter = "\n", $cut = false) {
        return wordwrap($str, $len, $limiter, $cut);
    }

}