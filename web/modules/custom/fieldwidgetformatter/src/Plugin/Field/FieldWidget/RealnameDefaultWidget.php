<?php

namespace Drupal\fieldwidgetformatter\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'realname_default' widget.
 *
 * @FieldWidget(
 *   id = "realname_default",
 *   label = @Translation("Realname default"),
 *   field_types = {
 *     "real_name"
 *   }
 * )
 */
class RealnameDefaultWidget extends WidgetBase {

  /**
   * Create a form field widget.
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['firstname'] = [
      '#title' => $this->t('First Name'),
      '#type' => 'textfield',
      '#default_value' => empty($items[$delta]->firstname) ? NULL : $items[$delta]->firstname,
      '#required' => TRUE,
    ];
    $element['lastname'] = [
      '#title' => $this->t('Last Name'),
      '#type' => 'textfield',
      '#default_value' => empty($items[$delta]->lastname) ? NULL : $items[$delta]->lastname,
      '#required' => TRUE,
    ];
    return $element;
  }
}
