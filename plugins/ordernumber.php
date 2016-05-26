    craft()->on('commerce_orders.onBeforeOrderComplete', function($event){
      $order = $event->params['order'];

      $number = rand(1000,9999)."D";

      $order->setContentFromPost(array(
        'merchOrderNumber' => $number
      ));
    });