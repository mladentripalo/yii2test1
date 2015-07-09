<?php
    /**
     * TODO: in entire file: replace all regular ASCII
     * string functions with utf8 counterpart because of possible UTF-8 strings
    */

    function indent_print_r($collection, $prefix="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;")
    {
        $n=0;
        foreach ($collection as $k => $v) {
            echo '</br>';
            $n++;
            $ty = gettype($v);
            echo $prefix, '<strong>', $k, '</strong>: <em>', $ty, '</em> ', is_object($v) ? '('.get_class($v).')' : '';
            if( $ty=='array' ){
                if(count($v))
                    indent_print_r($v, $prefix . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
                else
                    echo '[empty]';
            }
            elseif ( $ty=='object' ){
                if(!indent_print_r($v, $prefix . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"))
                    echo '[empty]';
            }
            elseif ( $ty=='string' )
                echo '"',htmlspecialchars($v),'"';
            elseif ( $ty=='boolean' )
                echo $v ? 'TRUE' : 'FALSE';
            elseif(is_scalar($v) || $v===null)
                echo htmlspecialchars(''.$v);
            else
                echo 'Unknown unprintable variable type!';
        }
        return $n;
    }

    /**
     * @param $var
     * @return string
     */
    function kiz_yii_varDump($var){
        ob_start();
        \yii\helpers\VarDumper::dump($var,10,true);
        $out = ob_get_contents();
        ob_end_clean();
        return '<pre>'.$out .'</pre>' ;
    }

    /**
     * use this when kiz_yii_varDump() is not enough or doesnt exsist.
     *
     * @param $label
     * @param string $val RESERVED, do not use!
     * @return string $string to be output on screen in html format
     */
    function kiz_yii_var_inspect($label, $val = '__undefin_e_d__')
    {
        $out = '';
        if(!defined('YII_DEBUG') || !YII_DEBUG || !function_exists('debug_backtrace'))
            return '';

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
            preg_match( "#".__FUNCTION__."\((.+)\)#", $line, $match );
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

            ob_start();
            echo '<pre><span style="color: #00209f">';
            echo '*** kiz_yii_var_inspect() *** <span style="color: #f30008;font-weight: bolder">', $label, '</span> ';
            echo '<em>',($typ=gettype($val)),'</em> ';
            echo $typ=='object' ? '('.get_class($val).') ' : '' ;
            echo 'in <strong>',$fil,'</strong>:',$bt[0]['line'],'</br>';

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

        $out = ob_get_contents();
        ob_end_clean();
        return $out;
    }

    $___pre_code_start_marker = '';
    function ___pre_code_start() {global $___pre_code_start_marker ; $___pre_code_start_marker=__FUNCTION__;}
    function ___pre_code_end() {
        global $___pre_code_start_marker;
        $out = '';

        if(!empty($___pre_code_start_marker) && !defined('YII_DEBUG') || !YII_DEBUG || !function_exists('debug_backtrace'))
            return '';

        $bt = debug_backtrace();

        assert('$bt');
        assert('isset($bt[0]["file"])');
        assert('!empty($bt[0]["file"])');
        assert('isset($bt[0]["line"])');
        assert('is_int($bt[0]["line"])');

        $line = $bt[0]["line"]-2;
        $file = file($bt[0]["file"],FILE_IGNORE_NEW_LINES);
        assert('$file');

        $out = '';

        while($line>=0 && !strstr($file[$line],$___pre_code_start_marker))
            $out = $file[$line--] . "\n" . $out;

        $out = substr($out,0,strrpos($out,"\n"));

        $___pre_code_start_marker = '';
        return kiz_php_code2thml($out);
    }

    /**
     * returns syntax highlighted HTML UTF-8 multi-line string
     * colored with in-place spans with style. It doesnt depend on any stylesheet and can be used in any
     * HTML page.
     * @param $code string PHP code
     * @return string
     */
    function kiz_php_code2thml($code) {
        if(function_exists('highlight_string')){

            preg_match_all('#(*UTF8)(\/\/.*?)(?=[\n\r])#',$code,$asin);
            preg_match_all('#(*UTF8)(\/\*.*?\*\/)#s',$code,$amul);

            $slc = '//_SLC_G2454kII905dhTsE_';
            $mlc = '/*_MLC_255RrT79712w0R_*/';
            $code = preg_replace('#(*UTF8)(\/\/.*?)(?=[\n\r])#',$slc,$code);
            $code = preg_replace('#(*UTF8)(\/\*.*?\*\/)#s',$mlc,$code);

            ini_set('highlight.string','#028102');
            ini_set('highlight.comment','#818181');
            ini_set('highlight.keyword','#0265D7');
            ini_set('highlight.bg','#B1B1B1');
            ini_set('highlight.default','#000000');
            ini_set('highlight.html','#670202');

            $code = highlight_string('<?php '.$code.' ?>' ,true);

            ini_restore('highlight.string');
            ini_restore('highlight.comment');
            ini_restore('highlight.keyword');
            ini_restore('highlight.bg');
            ini_restore('highlight.default');
            ini_restore('highlight.html');

            $newcodestyle = '<code style="display: block; padding: 9px; margin: 0 0 10px; font-size: 13px; line-height: 1.42857143; color: #333; word-break: break-all; word-wrap: break-word; background-color: #f5f5f5; border: 1px solid #ccc; border-radius: 4px;">';

            mb_regex_encoding('UTF-8');
            $code = mb_eregi_replace('\&lt\;\?php\&nbsp\;', '', $code);
            $code = mb_eregi_replace('<code>', $newcodestyle, $code);
            $code = mb_substr($code,0,mb_strrpos($code,'<span')) . '</span></code>';

            // additionally color variables
            $code = mb_ereg_replace('(\$+\w+)','<span style="color: #670202;">\1</span>',$code);

            // restore comments
            foreach ($asin[0] as $sl) {
                $sl = preg_replace('# #','&nbsp;',$sl);
                $code = preg_replace("#$slc#", $sl, $code, 1);
            }
            $mlc2=preg_replace('#\*#','\*',$mlc);
            foreach ($amul[0] as $ml) {
                $ml = preg_replace('# #','&nbsp;',$ml);
                $code = preg_replace("#$mlc2#", nl2br($ml), $code, 1);
            }
            return $code;
        }
        else
            return '<pre><code>'.htmlspecialchars($code).'</code></pre>';
    }

    /**
     * @param string $str binary string
     * @return string containing HTML formatted hexdump
     */
    function hexdump($str) {

        if(!is_string($str) || empty($str))
            return '';

        $l = strlen($str);
        $i = 0;
        $c = '';
        $out = '';

        $out .= '<pre>';
        while($i<$l) {
            $out .= $i%16 ? ' ' : '  '.$c."\n".($c='');
            $out .= sprintf("%02X", $cp=ord($str{$i++}));
            $c .= $cp>31 && $cp<127 ? "&#$cp" : '·';
        }
        if(!empty($c))
            $out .= str_repeat('   ',15-(($i-1)%16)).'  '.$c;
        $out .= '</pre>';

        return $out;
    }

