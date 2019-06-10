<?php

namespace Drupal\Tests\pacifica_consumer\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests behavior for saving the pacifica consumer field elements.
 *
 * @group pacifica_consumer
 */
class PacificaConsumerTest extends BrowserTestBase {
  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = ['pacifica_consumer', 'node'];

  /**
    * Basic test setup.
    */
  public function testPacificaConsumerSave() {
    $storage = \Drupal::entityTypeManager()->getStorage('node');
    // Save a node programatically.
    $node = $storage->create([
      'type' => 'article',
      'title' => 'Test node',
      'uid' => '1',
      'status' => 1,
    ]);
    $node->save();
    // Load the node.
    $node = $storage->load(1);
    $this->assert($node->getOwnerId() == 1, 'Node id should be 1.');
  }
}
