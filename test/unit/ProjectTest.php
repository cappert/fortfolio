<?php

require_once dirname(__FILE__).'/../bootstrap/unit.php';

$configuration = ProjectConfiguration::getApplicationConfiguration( 'frontend', 'test', true);
new sfDatabaseManager($configuration);
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/test');

$t = new lime_test(3);

$project = Doctrine_Core::getTable('Project')->createQuery()->fetchOne();

$t->ok($project->getId(), 'getId returns true');
$t->ok($project->getTitle(), 'getTitle returns true');
$t->ok($project->getDescription(), 'getDescription returns true');
?>
