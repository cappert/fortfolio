<?php

/**
 * project actions.
 *
 * @package    fortfolio
 * @subpackage tag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tagActions extends sfActions
{
  public function searchUnique(string $searchme)
  {
  $table = Doctrine::getTable('Tag');
  $table->findByName($searchme)->execute();
  }


  public function executeIndex(sfWebRequest $request)
  {
    $this->tags = Doctrine::getTable('Tag')
      ->createQuery('a')
      ->execute();
  }

    public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TagForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

    public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($project = Doctrine::getTable('Project')->find(array($request->getParameter('id'))), sprintf('Object project does not exist (%s).', $request->getParameter('id')));
    $project->delete();

    $this->redirect('project/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $project = $form->save();

      $this->redirect('project/edit?id='.$project->getId());
    }
  }
}
