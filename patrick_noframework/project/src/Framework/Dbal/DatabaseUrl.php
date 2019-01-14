<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-14
 * Time: 22:32
 */

namespace SocialNews\Framework\Dbal;


class DatabaseUrl
{
    /**
     * @var string
     */
    private $url;

    public function __construct(string $url)
    {

        $this->url = $url;
    }

    public function toString(): string
    {
        return $this->url;
    }
}