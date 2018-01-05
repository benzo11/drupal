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
    private $service;

    public function __construct(array $configuration, $plugin_id, $plugin_definition)
    {
        $this->service = \Drupal::service('event_timer.get_date');
        parent::__construct($configuration, $plugin_id, $plugin_definition);
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $node = \Drupal::routeMatch()->getParameter('node');
        $eventStatus = $this->service->getDate($node->field_event_date->value);

        if ($eventStatus['result'] === 1) {
            $eventString = "The event is in progress.";
        }
        if ($eventStatus['result'] === 2) {
            $eventString = "The event has ended.";
        }
        if ($eventStatus['result'] === 3) {
            $eventString = "Days left to event start: " . $eventStatus['interval'];
        }

        return array(
            '#markup' => $this->t('<h1>@string</h1>', array(
                '@string' => $eventString,
            )),
            '#title'  => $this->t("Event status"),
            '#cache'  => [
                'max-age' => 0,
            ],
        );
    }

}