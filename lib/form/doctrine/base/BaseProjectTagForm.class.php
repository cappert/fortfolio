<?php

/**
 * ProjectTag form base class.
 *
 * @method ProjectTag getObject() Returns the current form's model object
 *
 * @package    fortfolio
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProjectTagForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'project_id' => new sfWidgetFormInputHidden(),
      'tag_id'     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'project_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('project_id')), 'empty_value' => $this->getObject()->get('project_id'), 'required' => false)),
      'tag_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('tag_id')), 'empty_value' => $this->getObject()->get('tag_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('project_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProjectTag';
  }

}
