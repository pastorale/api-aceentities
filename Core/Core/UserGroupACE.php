<?php
namespace AppBundle\ACEEntities\Core\Core;

use AppBundle\Entity\Core\User\UserGroup;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repositories\Core\Core\UserGroupACERepository")
 * @ORM\Table(name="core__security__user_group_ace")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"handbook" = "AppBundle\ACEEntities\Organisation\Handbook\HandbookUserGroupACE","user" = "AppBundle\ACEEntities\Core\User\UserUserGroupACE","user_group" = "AppBundle\ACEEntities\Core\User\UserGroupUserGroupACE"})
 */
abstract class UserGroupACE extends ACE
{
    /**
     * @var UserGroup
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Core\User\UserGroup" ,inversedBy="ace")
     * @ORM\JoinColumn(name="id_group", referencedColumnName="id", nullable=false)
     * @Serializer\Exclude
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