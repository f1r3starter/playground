<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-14
 * Time: 23:06
 */

namespace Migrations;


interface Migratable
{
    public function migrate();
}