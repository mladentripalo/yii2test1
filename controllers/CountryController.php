<?php

namespace app\controllers;

use app\models\Country;
use yii\data\Pagination;

class CountryController extends \yii\web\Controller
{

    public function actionIndexSimple()
    {
        $query = Country::find();

        $pagination = new Pagination([
                'defaultPageSize' => 5,
                'totalCount' => $query->count()
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        return $this->render('indexSimple', [
                'countries' => $countries,
                'pagination' => $pagination,
                'query' => $query
        ]);
    }

    // simople show passed view
    public function actionShow($view = 'emptyView'){
        return $this->render($view);
    }

    public function actionIndexGridView()
    {
        return $this->render('indexGridView', [
            'query' => Country::find()
        ]);
    }


    public function actionIndexListView()
    {
        return $this->render('indexListView', [
            'query' => Country::find()
        ]);
    }

}
