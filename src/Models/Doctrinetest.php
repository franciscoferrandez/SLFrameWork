<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Doctrinetest
 *
 * @ORM\Table(name="doctrinetest")
 * @ORM\Entity
 */
class Doctrinetest
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
     * @ORM\Column(name="nombre", type="string", length=140, nullable=true)
     */
    private $nombre;


}
