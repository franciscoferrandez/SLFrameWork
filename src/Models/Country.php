<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConutryName
 *
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
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
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="alpha2code", type="string", length=2, nullable=true)
     */
    public $alpha2Code;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="alpha3code", type="string", length=3, nullable=true)
     */
    public $alpha3Code;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="capital", type="string", length=255, nullable=true)
     */
    public $capital;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="region", type="string", length=255, nullable=true)
     */
    public $region;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="subregion", type="string", length=255, nullable=true)
     */
    public $subregion;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="borders", type="string", length=255, nullable=true)
     */
    public $borders;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="nativeName", type="string", length=255, nullable=true)
     */
    public $nativeName;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="latlng", type="string", length=255, nullable=true)
     */
    public $latlng;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="flag", type="string", length=255, nullable=true)
     */
    public $flag;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="timezones", type="string", length=255, nullable=true)
     */
    public $timezones;


}