<?php

namespace Deputies\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RollCallVotingController extends Controller
{
    /**
     * @Rest\View
     */
    public function allAction()
    {
        $results = $this->get('roll_call_voting_repository')->findAll();

        return array('roll_call_voting_results' => $results);
    }
}
