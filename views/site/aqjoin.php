<?php
/**
 * Created by PhpStorm.
 * User: Kiz
 * Date: 4.7.2015.
 * Time: 11:21
 *
 *
 */

    use yii\db\Query;
    require_once('C:\xampp\htdocs\phpStorm\yii2test1\kiz\YiiHelpers.php');
?>

    <p>
        Simple JQuerry clock: <span id="clk"></span>
    </p>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#clk').text((new Date()).toLocaleTimeString());
            setInterval(
                function(){$('#clk').text((new Date()).toLocaleTimeString())},
                1000);
            });
    </script>

<pre>

<?php
    $res = (new Query)
        ->select(['country.code','country.name','country.population', 'continent'=>'continent.name'])
        ->from(['country'])
        ->leftJoin('continent', 'country.continent_id=continent.continent_id')
        ->all();

    foreach ($res as $r)
        printf("%30s %6s %16s %20s\n", $r['name'], $r['code'], $r['population'], $r['continent']);
?>

</pre>

    <p>
        Code above uses simple query class to build SQL JOIN statement in order to create rlational link between two tables
        without using any Model classes, it's a quick way to fill nested string array containing only text fields.
    </p>


    <h3>Code:</h3>
    <pre>
    $res = (new Query)
        ->select(['country.code','country.name','country.population', 'continent'=>'continent.name'])
        ->from(['country'])
        ->leftJoin('continent', 'country.continent_id=continent.continent_id')
        ->all();
    <strong>
    //this foreach loop creates above displayed table on screen </strong>
    foreach ($res as $r)
        printf("%30s %6s %16s %20s\n", $r['name'], $r['code'], $r['population'], $r['continent']);
    </pre>


    <p>
        Returned $res array has very JSON-like notation, containing main indexed array each nesting
        asociative array where coulumn names are keys...
    </p>


    <h3>Contents of returned $res array:</h3>

    <pre>
        <?= indent_print_r($res) ?>
    </pre>




