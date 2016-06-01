<?php
namespace AppBundle\ACEEntities\Core\Core;

use AppBundle\Entity\Core\User\UserGroup;
use AppBundle\Services\Core\Framework\Security\ACEInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class ACE implements ACEInterface
{
    function __construct()
    {
        $this->allowed = true;
        $this->unlimited = true;
        $this->selectedObjects = new ArrayCollection();
        $this->attributes = array();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer",options={"unsigned":true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var array
     * @ORM\Column(type="attribute_array",name="attributes")
     */
    protected $attributes;

    /**
     * @var ArrayCollection
     */
    protected $selectedObjects;

    /**
     * @var bool
     * @ORM\Column(type="boolean", options={"default":true})
     */
    protected $allowed;

    /**
     * @var bool
     * @ORM\Column(type="boolean", options={"default":true})
     */
    protected $unlimited;

    /**
     * @return boolean
     */
    public function isAllowed()
    {
        return $this->allowed;
    }

    /**
     * @param boolean $allowed
     */
    public function setAllowed($allowed)
    {
        $this->allowed = $allowed;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }


    /**
     * @return ArrayCollection
     */
    public function getSelectedObjects()
    {
        return $this->selectedObjects;
    }

    /**
     * @return UserGroup
     */
    public function getUserGroup()
    {
        return $this->userGroup;
    }

    /**
     * @param UserGroup $userGroup
     */
    public function setUserGroup($userGroup)
    {
        $this->userGroup = $userGroup;
    }

    /**
     * @return boolean
     */
    public function isUnlimited()
    {
        return $this->unlimited;
    }

    /**
     * @param boolean $unlimited
     */
    public function setUnlimited($unlimited)
    {
        $this->unlimited = $unlimited;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}