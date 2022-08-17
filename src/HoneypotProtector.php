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

    // Something done on the develop branch, outside of 1.1.14 release
    public function testFeatureForGitFlow()
    {
      // 1.1.14 notes
    }

    public function testFeatureForGitFlowAgain() // Later 1.2.1 change
    {
      // 1.2.0 release notess
    }

    public function testFeatureForGitFlowAgainAgain()
    {
      // Some 1.3.9 thought out patch release
      // 1.3.9 notes
      // Squashed commit
      // Squashed commit
      // Squashed commit
      // Squashed commit
      // 1.4.2
    }
}
