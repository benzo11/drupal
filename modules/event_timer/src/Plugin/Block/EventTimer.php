<?php

namespace Drupal\event_timer\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 *
 * @Block(
 *   id = "Event timer block",
 *   admin_label = @Translation("Event timer block"),
 *   category = @Translation("Event"),
 * )
 */
class EventTimer extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $config = $this->getConfiguration();
        print_r($config);

        $service = \Drupal::service('event_timer.get_date');
        return array(
            '#markup' => $this->t('Days @name!', array(
                '@name' => $service->getDate(1),
            )),
            '#title'  => $this->t('Time left')
        );

    }

}