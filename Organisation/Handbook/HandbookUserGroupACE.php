<?php
namespace AppBundle\ACEEntities\Organisation\Handbook;

use AppBundle\Entity\Organisation\Handbook\Handbook;
use AppBundle\ACEEntities\Core\Core\UserGroupACE;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * @ORM\Entity
 * @ORM\Table(name="organisation__handbook__handbook_user_group_ace")
 */
class HandbookUserGroupACE extends UserGroupACE
{
    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Organisation\Handbook\Handbook")
     * @ORM\JoinTable(name="organisation__handbook__handbook_ace_selections",
     *      joinColumns={@ORM\JoinColumn(name="id_ace", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_handbook", referencedColumnName="id")}
     * )
     */
    protected $selectedObjects;

    /**
     * @param Handbook $handbook
     * @return HandbookUserGroupACE
     */
    public function addSelectedObject($handbook)
    {
        $this->selectedObjects->add($handbook);
        return $this;
    }

    /**
     * @param Handbook $handbook
     * @return HandbookUserGroupACE
     */
    public function removeSelectedObject($handbook)
    {
        $this->selectedObjects->removeElement($handbook);
        return $this;
    }
}
