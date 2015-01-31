<?php

namespace Application\Process\Checkout;

use Application\Process\Context;

class DetailsStep extends AbstractStep
{
    public function display(Context $context)
    {
        return $this->render($context);
    }

    public function forward(Context $context)
    {
        $request = $context->getRequest();
        if ($request->get('email')) {
            return true;
        }

        return $this->render($context);
    }

    protected function render($context)
    {
        return $this->twig->render('checkout/details.html.twig', [
            'context' => $context
        ]);
    }
}
