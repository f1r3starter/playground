<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2018-12-13
 * Time: 23:12
 */
namespace Application;

class SimpleClass
{
    /**
     * @var DumbClass
     */
    private $summarizer;

    public function __construct(DumbClass $summarizer)
    {
        $this->summarizer = $summarizer;
    }

    public function add($a, $b)
    {
        return $this->summarizer->add($a, $b);
    }
}