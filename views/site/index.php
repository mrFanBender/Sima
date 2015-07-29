<?php
    use yii\widgets\ActiveForm;
?>
<?php
/* @var $this yii\web\View */
$this->title = 'Тестовое задание для Сима-лэнд';
?>
<div class="site-index">
<?php if(!\Yii::$app->user->isGuest){ ?>
    <?php $form = ActiveForm::begin(['action'=>Yii::$app->homeUrl.'site/upload', 
                                                                    'options' => ['enctype' => 'multipart/form-data']
                                                                ]) ?>

    <?= $form->field($model, 'file')->fileInput()->label('Загрузите свою фотографию прямо сейчас!') ?>

    <button>Загрузить</button>

    <?php ActiveForm::end() ?>
<?php } ?>
    <div class="image-list-box">
        <?php foreach($images as $image){ ?>
            <div class="image-box">
                <img class="img img-responsive pull-left" src="<?= Yii::$app->homeUrl.$image['src'] ?>">
                <?php if(!Yii::$app->user->isGuest){ ?>
                     <a href="<?= !$image['ilike'] ? Yii::$app->homeUrl.'site/like?image_id='.$image['id'] : ''; ?>"><span class="glyphicon glyphicon-heart pull-left <?= $image['ilike'] ? 'red' : ''?>" imageid="<?= $image['id'] ?>"></span></a>
                <?php } ?>
                    <ul class="userslikes-list">
                        <?php foreach($image['likes'] as $like){ ?>
                            <?php if(Yii::$app->user->getId()==$like['user_id']){ ?>
                                <li>Вы, </li>
                            <?php }else{ ?>
                                <li><?= $like['username'].', ' ?></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
            </div>
        <?php } ?>
    </div>
</div>
