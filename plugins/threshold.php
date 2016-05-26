    $this->threshold = 3;

    craft()->on('commerce_orders.onBeforeOrderComplete', function ($event)
    {
      $order = $event->params['order'];

      foreach ($order->lineItems as $lineItem)
      {
        $variant = $lineItem->getPurchasable;

        if ($variant instanceof Commerce_VariantModel && !$variant->unlimitedStock && $variant->stock > $this->threshold)
        {
          $this->originalStocks[$variant->id] = $variant->stock;
        }
      }
    });

    craft()->on('commerce_variants.onOrderVariant', function ($event)
    {
      $variant = $event->params['variant'];
      if (!$variant->unlimitedStock)
      {
        if (isset($this->originalStocks[$variant->id]))
        {
          if ($variant->stock <= $this->threshold)
          {
            // Send email
          }
        }
      }
    });