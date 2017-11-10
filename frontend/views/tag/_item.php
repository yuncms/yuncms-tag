<?php
use yii\helpers\Url;
use yii\helpers\Html;
/** @var yuncms\tag\models\Tag $model */
?>

<section class="topic-list-item col-md-3">
    <div class="widget-topic">
        <h2>
            <a href="<?= Url::to(['/tag/tag/view', 'name' => $model->name]); ?>"><?= Html::encode($model->name) ?></a>
        </h2>
        <p>
            <?= empty($model->description) ? Yii::t('tag', 'No introduction') : Html::encode($model->description); ?>
        </p>
        <div class="widget-topic-action">
            <?php
            if (!Yii::$app->user->isGuest && Yii::$app->user->identity->hasTagValues($model->id)) {
                ?>
                <button type="button" data-target="follow-tag" class="btn btn-default btn-xs active"
                        data-source_id="<?= $model->id ?>" data-show_num="false" data-toggle="tooltip"
                        data-placement="right" title="" data-original-title="关注后将获得更新提醒">已关注
                </button>
                <?php
            } else {
                ?>
                <button type="button" data-target="follow-tag" class="btn btn-default btn-xs"
                        data-source_id="<?= $model->id ?>" data-show_num="false" data-toggle="tooltip"
                        data-placement="right" title="" data-original-title="关注后将获得更新提醒">关注
                </button>
                <?php
            }
            ?>
            <strong class="follows">
                <?= $model->frequency; ?>
            </strong>
            <span class="text-muted">
                <?= Yii::t('tag', 'follows') ?>
            </span>
        </div>
    </div>
</section>
