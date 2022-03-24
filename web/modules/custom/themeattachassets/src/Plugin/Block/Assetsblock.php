<?php

namespace Drupal\themeattachassets\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block.
 *
 * @Block(
 *   id = "Assets_block",
 *   admin_label = @Translation("Assets block"),
 * )
 */
class Assetsblock extends BlockBase {

  /**
   * {@inheritDoc}
   */
  public function build() {
    return [
      '#type' => 'inline_template',
      '#template' => "{% trans %} Simple Table {% endtrans %} <table><thead><tr><th>{{name}}</th><th>{{city}}</th><tr></thead><tbody><tr><td>Abhishek</td><td>Kolkata</td></tr></tbody></table>",
      '#context' => [
        'name' => 'Name',
        'city' => 'City',
      ],
      '#cache'  => [
        'max-age' => 0,
      ],
    ];
  }
}
