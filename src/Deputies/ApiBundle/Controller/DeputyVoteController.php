<?php

namespace Deputies\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeputyVoteController extends Controller
{
    /**
     * @Rest\View
     */
    public function allAction()
    {
        $deputy_votes = $this->get('deputy_vote_repository')->findAll();

        return array('deputy_votes' => $deputy_votes);
    }
}
