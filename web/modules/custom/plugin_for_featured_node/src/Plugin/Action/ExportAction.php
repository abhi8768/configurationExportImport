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
   * {@inheritdoc}
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
   * {@inheritdoc}
   */
  public function access($object, AccountInterface $account = NULL, $return_as_object = FALSE) {
    /** @var \Drupal\node\NodeInterface $object */
    // TODO: write here your permissions
    $result = $object->access('create', $account, TRUE);
    return $return_as_object ? $result : $result->isAllowed();
  }

}
