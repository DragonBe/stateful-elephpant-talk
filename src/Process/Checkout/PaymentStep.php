<?php

namespace Application\Process\Checkout;

use Application\Process\Context;

class PaymentStep extends AbstractStep
{
    /**
     * {@inheritdoc}
     */
    public function display(Context $context)
    {
        return $this->render($context);
    }

    /**
     * {@inheritdoc}
     */
    public function forward(Context $context)
    {
        $request = $context->getRequest();

        if ($method = $request->get('method')) {
            $this->getOrder()->setPaymentMethod($method);
            return true;
        }

        return $this->render($context);
    }

    /**
     * @param Context $context
     * @return string
     */
    protected function render(Context $context)
    {
        return $this->twig->render('checkout/payment.html.twig', [
            'context' => $context,
        ]);
    }
}
