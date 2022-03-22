<?php

namespace Drupal\plugin_for_featured_node\Plugin\Action;

use Drupal\Core\Action\ActionBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\node\Entity\Node;

/**
 * Create custom action.
 *
 * @Action(
 *   id = "node_export_action",
 *   label = @Translation("Featured Node"),
 *   type = "node"
 * )
 */
class ExportAction extends ActionBase {

  /**
   * Make nodes as featured node.
   *
   * @param object $node
   *   This veriable is node id.
   */
  public function execute($node = NULL) {
    if ($node) {
      $nid = $node->id();
      $node = Node::load($nid);
      $node->field_featured = 1;
      $node->save();
      \Drupal::messenger()->addStatus('The node is featured.');
    }
  }

  /**
   * Access the nodes.
   *
   * @param object $object
   *   Object type.
   * @param \Drupal\Core\Form\AccountInterface $account
   *   It will retrive the value.
   * @param bool $return_as_object
   *   Object type.
   *
   * @return object
   *   Return as object type.
   */
  public function access($object, AccountInterface $account = NULL, $return_as_object = FALSE) {
    $result = $object->access('create', $account, TRUE);
    return $return_as_object ? $result : $result->isAllowed();
  }
}
