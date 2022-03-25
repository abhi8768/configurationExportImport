<?php

namespace Drupal\fieldwidgetformatter\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'realname_default' formatter.
 *
 * @FieldFormatter(
 *   id = "realname_default",
 *   label = @Translation("Realname default"),
 *   field_types = {
 *     "real_name"
 *   }
 * )
 */
class RealnameDefaultFormatter extends FormatterBase {

  /**
   * View for form field element.
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    foreach ($items as $delta => $item) {
      // Render output using realname_default theme.
      /*$source = [
      '#theme' => 'realname_default',
      '#firstname' => $item->firstname,
      '#lastname' => $item->lastname,
      ];
      $elements[$delta] = ['#markup' => \Drupal::service('renderer')->render($source)];*/

      $elements[$delta] = [
        '#type' => 'markup',
        '#markup' => $item->firstname . ' ' . $item->lastname,
      ];
    }
    return $elements;
  }
}
