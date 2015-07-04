<?php

    function indent_print_r($collection, $prefix="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;") {

        $n=0;

        foreach ($collection as $k => $v) {

            echo '</br>';

            $n++;
            $ty = gettype($v);
            echo $prefix, '<strong>', $k, '</strong>: <em>', $ty, '</em> ';

            if( $ty=='array' ){
                if(count($v)) {
                    indent_print_r($v, $prefix . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
                }
                else {
                    echo '[empty]';
                }
            }
            elseif ( $ty=='object' ){
                if(!indent_print_r($v, $prefix . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;")) {
                    echo '[empty]';
                }
            }
            elseif ( $ty=='string' ){
                echo '"',$v,'"';
            }
            else {
                echo $v;
            }
        }

        return $n;
    }


