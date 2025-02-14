<?php

namespace Werkbot\SpamProtection;

use Werkbot\SpamProtection\HoneypotField;
use SilverStripe\Forms\FormField;
use SilverStripe\Forms\TextField;
use SilverStripe\UserForms\Model\EditableFormField;
use SilverStripe\ORM\UnsavedRelationList;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Core\Injector\Injector;

class EditableHoneypotField extends EditableFormField
{
  /**/
    private static $singular_name = 'Honeypot Spam Protection Field';
    private static $plural_name = 'Honeypot Spam Protection Fields';
    private static $table_name = 'EditableHoneypotField';
  /**
   * @var FormField
   */
    protected $formField = null;
   /**/
    public function getFormField()
    {
      // Clear Any existing errors
      $Request = Injector::inst()->get(HTTPRequest::class);
      $Session = $Request->getSession();
      $Session->clear('spam-protection-error-exists');
     //
      $field = HoneypotField::create($this->Name, "", null)->setFieldHolderTemplate('Form\\SpamFieldHolder');
      $this->doUpdateFormField($field);
     //
      return $field;
    }
  /**
   * @param FormField $field
   * @return self
   */
    public function setFormField(FormField $field)
    {
        $this->formField = $field;
        return $this;
    }
  /**
   * Used in userforms 3.x and above
   *
   * {@inheritDoc}
   */
    public function getCMSFields()
    {
      //
        $fields = parent::getCMSFields();
      //
        if ($this->Parent()->Fields() instanceof UnsavedRelationList) {
            return $fields;
        }
      //
        return $fields;
    }
  /**/
    public function getRequired()
    {
        return false;
    }
  /**/
    public function showInReports()
    {
        return false;
    }
  /**
   * Updates a formfield with the additional metadata specified by this field
   *
   * @param FormField $field
   */
    protected function updateFormField($field)
    {
      // Add custom error
      if ($this->CustomErrorMessage <> ""){
        $field->setAttribute('data-custommsg', (string) $this->CustomErrorMessage);
      }
      //
      parent::updateFormField($field);
    }

    // 1.4.0 change
    public function testFeatureForGitFlow()
    {
    }

}
