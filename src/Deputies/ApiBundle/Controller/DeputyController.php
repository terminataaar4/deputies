<?php

namespace Deputies\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeputyController extends Controller
{
    /**
     * @Rest\View
     */
    public function allAction()
    {
        $deputies = $this->get('deputy_repository')->findAll();

        return array('deputies' => $deputies);
    }
}
