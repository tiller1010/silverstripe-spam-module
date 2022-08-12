<?php

namespace Werkbot\SpamProtection;

use SilverStripe\Forms\FieldGroup;
use SilverStripe\SpamProtection\SpamProtector;

class HoneypotProtector implements SpamProtector
{
  /**
   * Return the Field(S) that we will use in this protector
   * @return FieldGroup of Honeypot and Timer fields
   */
    public function getFormField($name = "_email", $title = "This field should be left empty", $value = null)
    {
      // Send both Honeypot and Timer Fields
        return FieldGroup::create(
            HoneypotField::create($name, $title, $value)->addExtraClass('wb-spam-hidden')->removeExtraClass('honeypot')->setFieldHolderTemplate('Form\\SpamFieldHolder'),
            TimerField::create("time", $title, time())->addExtraClass('wb-spam-hidden')->removeExtraClass('timer')->setFieldHolderTemplate('Form\\SpamFieldHolder')
        );
    }
  /**
   * Not used by Honeypot
   */
    public function setFieldMapping($fieldMapping)
    {
    }

    // Release notes .....
    public function testFeatureForGitFlow()
    {
      // bugfix
      // bugfix release notes
      // bugfix release notes

      // Feature for 1.1.8
      // 1.1.8 notes edited

      // Something outside of 1.1.11, not yet released
    }
}
