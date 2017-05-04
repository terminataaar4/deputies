<?php

namespace Deputies\CoreDomainBundle\Repository;

use Deputies\CoreDomain\Deputy\Deputy;
use Deputies\CoreDomain\Deputy\DeputyId;
use Deputies\CoreDomain\DeputyVote\DeputyVote;
use Deputies\CoreDomain\DeputyVote\DeputyVoteId;
use Deputies\CoreDomain\DeputyVote\DeputyVoteRepository;
use Deputies\CoreDomain\RollCallVoting\RollCallVoting;
use Deputies\CoreDomain\RollCallVoting\RollCallVotingId;
use Deputies\CoreDomain\Session\Session;

class PdfDeputyVoteRepository implements DeputyVoteRepository
{
    const SRC_DIR = __DIR__ . "/../Resources/pdf";

    private $deputies;
    private $deputyVotes;

    public function __construct()
    {
        $pdfDir = dir(self::SRC_DIR);

        $parser = new \Smalot\PdfParser\Parser();

        $pages = [];
        while (false !== ($entry = $pdfDir->read())) {
            if (strpos($entry, ".pdf") === false) {
                continue;
            }

            $pdf = $parser->parseFile(self::SRC_DIR . "/" . $entry);
            foreach ($pdf->getPages() as $page) {
                $pages[] = $page->getTextArray();
            }
        }

        $pdfDir->close();

        foreach ($pages as $pageNum => $pageText) {
            foreach ($pageText as $lineNum => $lineText) {
                $lineText = trim($lineText);

                if ($lineText) {
                    $pageText[$lineNum] = $lineText;
                } else {
                    unset($pageText[$lineNum]);
                }
            }
            $pages[$pageNum] = $pageText;
        }

        foreach ($pages as $page) {
            preg_match('/\d\d\.\d\d\.\d\d/', $page[2], $date);
            preg_match('/^\d+/', $page[2], $number);

            $council = $page[1];
            $date = reset($date);
            $number = reset($number);
            $name = $page[2];

            $session = new Session($council, $date, $number, $name);

            $number = "";
            $phase = ""; 
            $subject = "";

            foreach ($page as $line) {
                if ($line === "Результат поіменного голосування:") {
                    $subject = [];
                } elseif (strpos($line, "№:") === 0) {
                    preg_match('/№: ([^ ]+)[ ]+(\W+)/', $line, $matches);
                    $number = $matches[1]; 
                    $phase = $matches[2]; 
                    $subject = implode(" ", $subject);
                    break;
                } elseif ($subject !== "") {
                    $subject[] = $line;
                }
            }

            $rollCallVotingId = uniqid("", true);
            $rollCallVoting = new RollCallVoting(
                new RollCallVotingId("RollCallVoting-" . $rollCallVotingId), 
                $session,
                $number,
                $phase, 
                $subject
            );

            foreach ($page as $pos => $line) {
                if (preg_match("/^\d+$/", $line)) {
                    $deputyNumber = $line;
                    $deputyFullname = $page[$pos + 1];
                    $deputyId = md5($council . "-" . $deputyNumber . "-" . $deputyFullname);
                    $voteResult = $page[$pos + 2];

                    if (!isset($this->deputies[$deputyId])) {
                        $this->deputies[$deputyId] = new Deputy(
                            new DeputyId("Deputy-" . $deputyId),
                            $deputyFullname 
                        );
                    }

                    $this->deputyVotes[] = new DeputyVote(
                        new DeputyVoteId("DeputyVote-" . $rollCallVotingId . "-" . $deputyId),
                        $rollCallVoting,
                        $this->deputies[$deputyId],
                        $voteResult 
                    );
                }
            }
        }
    }

    public function find(DeputyVoteId $deputyVoteId)
    {
    }

    public function findAll()
    {
        return $this->deputyVotes;
    }

    public function add(DeputyVote $deputyVote)
    {
    }

    public function remove(DeputyVote $deputyVote)
    {
    }
}
