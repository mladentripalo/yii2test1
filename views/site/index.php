<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>


    <hr/>
    <h2>Kiz examples</h2>

    <a href="<?=Yii::$app->getHomeUrl()?>?r=gii">Gii</a>
    <br/>


    <!--
    "http://localhost/phpStorm/yii2test1/requirements.php"
    -->
    <a href="http://localhost/phpStorm/yii2test1/requirements.php">check Yii2 app requirements</a>
    <br/>


    <!--
    hello world...
    calling "say" action defined in SiteController class (index.php?r=site/say)
    and passing message (index.php?r=site/say&message=Hello+World+I+am+fat!)
    after which action function will call say.php VIEW in views/site/ by
    executing $this->render('say',['message'=>$message]);
    -->
    <a href="<?=Yii::$app->getHomeUrl()?>?r=site/say&message=Hello+World+I+am+fat!">Hello world</a>
    <br/>

    <!--
    form ...
    create action
    create two views
    create model...
    -->
    <a href="<?=Yii::$app->getHomeUrl()?>?r=site/entry">Entry form</a>
    <br/>




    <!--
    da access to countries table trough:
        models/Country.php
        controllers/CountryController.php / actionIndexSimple
        views/country/indexSimple.php



        TODO:
        navicat za relacije u bazi super
        prvo search klase u jednostavnom grudu koji imam (filter)
        vez u tablici sa relacijom između dva modela (npr County i Continent) da pokaže ime kontinenta i onda search sa kontinentom (tu bi mogo popizdit

        search klase u dvije related tablice





    -->
    <a href="<?=Yii::$app->getHomeUrl()?>?r=country/index-simple">Countries DB table display Simple (html unordered list)</a>
    <br/>

    <!--
    da access to countries table trough:
        models/Country.php
        controllers/CountryController.php / actionIndexGridView
        views/country/indexGridView.php
    -->
    <a href="<?=Yii::$app->getHomeUrl()?>?r=country/index-grid-view">Countries DB table display using GridView</a>
    <br/>

    <!--
    da access to countries table trough:
        models/Country.php
        controllers/CountryController.php / actionIndexListView
        views/country/indexListView.php
    -->
    <a href="<?=Yii::$app->getHomeUrl()?>?r=country/index-list-view">Countries DB table display using ListView</a>
    <br/>



    <pre>
    </pre>

    <br/>
    <hr/>


    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
