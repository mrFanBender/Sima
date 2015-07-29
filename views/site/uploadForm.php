<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['action' => 'site/upload',
									'options' => ['enctype' => 'multipart/form-data'],
									]) ?>
<?= $form->field($model, 'file')->fileInput()->label('Загрузите свою фотографию прямо сейчас!') ?>

<button>Загрузить</button>

<?php ActiveForm::end() ?>