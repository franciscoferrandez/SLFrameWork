<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConutryName
 *
 * @ORM\Table(name="country_name")
 * @ORM\Entity
 */
class CountryName
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=140, nullable=true)
     */
    private $name;


}