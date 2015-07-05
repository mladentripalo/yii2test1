<?php


    function indent_print_r($collection, $prefix="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;") {

        $n=0;

        foreach ($collection as $k => $v) {

            echo '</br>';

            $n++;
            $ty = gettype($v);
            echo $prefix, '<strong>', $k, '</strong>: <em>', $ty, '</em> ', is_object($v) ? '('.get_class($v).')' : '';

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
                echo '"',htmlspecialchars($v),'"';
            }
            elseif ( $ty=='boolean' ){
                echo $v ? 'TRUE' : 'FALSE';
            }
            elseif(is_scalar($v) || $v===null) {
                echo htmlspecialchars(''.$v);
            }
            else {
                echo 'Unknown unprintable variable type!';
            }
        }

        return $n;
        //svaki dan
    }


    // do not change function name!
    function kiz_yii_var_inspect($label, $val = '__undefin_e_d__')
    {
        if(!defined('YII_DEBUG') || !YII_DEBUG || !function_exists('debug_backtrace'))
            return;

        if($val == '__undefin_e_d__') {

            /* The first argument is not the label but the
               variable to kiz_yii_var_inspect itself, so we need a label.
               Let's try to find out it's name by peeking at
               the source code.
            */

            /* The reason for using an exotic string like
               "__undefin_e_d__" instead of NULL here is that
               inspect variables can also be NULL and I want
               to inspect them anyway.
            */

            $val = $label;
            $bt = debug_backtrace();

            assert('$bt');
            assert('isset($bt[0]["file"])');
            assert('!empty($bt[0]["file"])');
            assert('isset($bt[0]["line"])');
            assert('is_int($bt[0]["line"])');

            $src = file($bt[0]["file"]);
            $line = $src[ $bt[0]['line'] - 1 ];

            // let's match the function call and the last closing bracket
            $match = [];
            preg_match( "#kiz_yii_var_inspect\((.+)\)#", $line, $match );
            assert('count($match)>1');

            /* let's count brackets to see how many of them actually belongs
               to the var name
               Eg:   die(kiz_yii_var_inspect($this->getUser()->hasCredential("delete")));
                      We want:   $this->getUser()->hasCredential("delete")
            */
            $max = strlen($match[1]);
            $varname = '';
            $c = 0;
            for($i = 0; $i < $max; $i++){
                if(     $match[1]{$i} == '(' ) $c++;
                elseif( $match[1]{$i} == ')' ) $c--;
                if($c < 0) break;
                $varname .=  $match[1]{$i};
            }
            $label = $varname;

            $fil = substr($bt[0]["file"],strlen(\Yii::$app->basePath)+1);

            echo '<pre><span style="color: #00209f">';
            echo '*** kiz_yii_var_inspect() *** <span style="color: #f30008;font-weight: bolder">', $label, '</span> ';
            echo '<em>',($typ=gettype($val)),'</em> ';
            echo $typ=='object' ? '('.get_class($val).') ' : '' ;
            echo 'in <strong>',$fil,'</strong>:',$bt[0]['line'],"\n";

            switch($typ) {
                case 'array':
                    echo "listing contents of array (recursive)...";
                    indent_print_r($val);
                    break;
                case 'object':
                    echo 'listing properties of object ',get_class($val)," (recursive)...";
                    indent_print_r($val);
                    break;
                case 'string':
                    echo $label.' = "'.htmlspecialchars($val).'"';
                    break;
                default:
                    echo $label.' = '.htmlspecialchars(''.$val)."\n";
                    break;
            }

            echo '</span></pre>';
        }
    }



