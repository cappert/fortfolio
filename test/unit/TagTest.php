<?php

require_once dirname(__FILE__).'/../bootstrap/unit.php';

$configuration = ProjectConfiguration::getApplicationConfiguration( 'frontend', 'test', true);
new sfDatabaseManager($configuration);
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');

$t = new lime_test(2);

$tag = Doctrine_Core::getTable('Tag')->createQuery()->fetchOne();

$t->ok($tag->getId(), 'getId returns true');
$t->ok($tag->getName(), 'getName returns true');
?>
