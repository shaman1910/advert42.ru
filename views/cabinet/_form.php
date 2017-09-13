<?php

use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->textInput(['placeholder'=>'Заголовок обьявления'])?>

    <?= $form->field($model, 'description')->textarea(['rows' => 2])->textInput(['placeholder'=>'Краткое описание']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 7]) ->textInput(['placeholder'=>'Полное описание'])?>

    <?= $form->field($model, 'price')->textInput() ->textInput(['placeholder'=>'Цена'])?>



    <?=$form->field($model,'phone')->widget(MaskedInput::className(),['mask'=>'+7 (999) 999-99-99'])->textInput(['placeholder'=>'+7 (999) 999-99-99']);?>





    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
