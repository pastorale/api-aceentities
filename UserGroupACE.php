<?php
namespace AppBundle\ACEEntities;

use AppBundle\Entity\Core\User\UserGroup;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="core__security__user_group_ace")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"handbook" = "AppBundle\ACEEntities\Organisation\Handbook\HandbookUserGroupACE"})
 */
abstract class UserGroupACE extends ACE
{
    /**
     * @var UserGroup
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Core\User\UserGroup")
     * @ORM\JoinColumn(name="id_group", referencedColumnName="id", nullable=false)
     */
    protected $userGroup;

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
}