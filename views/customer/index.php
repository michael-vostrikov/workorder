<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => false],
        'columns' => [
            'id',
            'name',
            'contact',
            'city',
            'address',
            'prov_state',
            'telephone',
            // 'account_number',
            // 'postal_zip',
            // 'fax',
            // 'email:email',
            // 'website',
            // 'billing_instructions',
            // 'shipping_instructions',
            // 'contract_expires',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}<br/>{update}<br/>{delete}'],
        ],
    ]); ?>

</div>