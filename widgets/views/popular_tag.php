<?php
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * @var \yuncms\tag\models\Tag $tags
 * @var string $path
 */
?>

<div class="widget-box">
    <h2 class="h4 widget-box-title right-live-title"><i class="fa fa-tag"></i> <?= Yii::t('tag', 'Hot Topic') ?> <a
            href="<?= Url::to(['/tag/index']) ?>" title="<?= Yii::t('tag', 'More') ?>">»</a></h2>
    <ul class="taglist-inline multi">
        <?php foreach ($models as $model): ?>
            <li class="tagPopup">
                <a class="tag" rel="tag"
                   href="<?= Url::to([$path, 'tag' => $model->name]) ?>"><?= Html::encode($model->name) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>