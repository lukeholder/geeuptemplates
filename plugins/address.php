    craft()->on('commerce_addresses.onBeforeSaveAddress', function($event){
      $address = $event->params['address'];
      if ($address->businessTaxId == '')
      {
        $address->addError('businessTaxId','Please supply an ID');
      }
      
      $event->performAction = false;
    });