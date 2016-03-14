<?php

$this->widget->init('topbar', array(
    "actions" => array(
        N2Html::tag('a', array(
            'href'  => '#',
            'id'    => 'n2-animation-editor-cancel',
            'class' => 'n2-button n2-button-red n2-button-big n2-h4 n2-b n2-uc'
        ), n2_('Cancel')),
        N2Html::tag('a', array(
            'href'  => '#',
            'id'    => 'n2-animation-editor-save',
            'class' => 'n2-button n2-button-green n2-button-big n2-h4 n2-b n2-uc',
        ), n2_('Apply'))
    ),
    'fixTo'   => false
));
