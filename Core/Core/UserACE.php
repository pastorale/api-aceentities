<?php
namespace AppBundle\ACEEntities\Core\Core;

use AppBundle\Entity\Core\User\UserGroup;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repositories\Core\Core\UserACERepository")
 * @ORM\Table(name="core__security__user_ace")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"handbook" = "AppBundle\ACEEntities\Organisation\Handbook\HandbookUserACE"})
 */
abstract class UserACE extends ACE
{
    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Core\User\User")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id", nullable=false)
     */
    protected $user;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}