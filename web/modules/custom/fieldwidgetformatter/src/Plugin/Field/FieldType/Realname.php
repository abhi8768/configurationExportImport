<?php

namespace Drupal\fieldwidgetformatter\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'real name' field type.
 *
 * @FieldType(
 *   id = "real_name",
 *   label = @Translation("Real name"),
 *   description = @Translation("This field stores first name and last name in the database."),
 *   default_widget = "realname_default",
 *   default_formatter = "realname_default"
 * )
 */

class Realname extends FieldItemBase {

  /**
   * This define the type of data that exists in the field values.
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['firstname'] = DataDefinition::create('string')
      ->setLabel(t('First Name'));

    $properties['lastname'] = DataDefinition::create('string')
      ->setLabel(t('Last Name'));

    return $properties;
  }

  /**
   * Create the field schema.
   */
  public static function schema(FieldStorageDefinitionInterface $field) {
    $columns = [];
    $columns['firstname'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['lastname'] = [
      'type' => 'char',
      'length' => 255,
    ];

    return [
      'columns' => $columns,
      'indexes' => [],
    ];
  }
  /**
   * Empty check function.
   */
  public function isEmpty() {
    $value = empty($this->get('firstname')->getValue()) && empty($this->get('lastname')->getValue());
    return $value;
  }
}
