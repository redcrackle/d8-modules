<?php

namespace Drupal\simple_page\Controller;

use \Drupal\Core\Controller\ControllerBase;


class SimplePageController extends ControllerBase {

    public function basicPage() {

        $build = array();

        $build['markup'] = array(
            '#markup'   => $this->t('Hello World...'),
        );

        return $build;
    }
}

