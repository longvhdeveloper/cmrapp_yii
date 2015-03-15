<?php
echo \yii\widgets\DetailView::widget(
    array(
        'model' => $model,
        'attributes' => array(
            array('attribute' => 'name'),
            array(
                'attribute' => 'birth_date',
                'value' => $model->birth_date
            ),
            'notes:text',
            array(
                'label' => 'Phone number', // phone of customer
                'attribute' => 'phones.0.number'
            ),
        )
    )
);