<?php
namespace AppBundle\ACEEntities\Core\User;

use AppBundle\Entity\Organisation\Handbook\Handbook;
use AppBundle\ACEEntities\Core\Core\UserGroupACE;
use AppBundle\Services\Core\Framework\BaseVoterSupportInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * @ORM\Entity
 * @ORM\Table(name="core__user__user_group_user_group_ace")
 *
 * @Serializer\XmlRoot("user_group_user_group_ACE")
 *
 * @Hateoas\Relation(
 *  "self",
 *  href= @Hateoas\Route(
 *         "get_organisation_usergroup_usergroupacl",
 *         parameters = { "organisation" = "expr(object.getUserGroup().getOrganisation().getId())","userGroup" = "expr(object.getUserGroup().getId())","userGroupUserGroupACE" = "expr(object.getId())"},
 *         absolute = true
 *     ),
 *  attributes = { "method" = {"put","delete"} },
 * )
 *
 */
class UserGroupUserGroupACE extends UserGroupACE implements BaseVoterSupportInterface
{
    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Core\User\UserGroup")
     * @ORM\JoinTable(name="core__user__user_group_ace_selections",
     *      joinColumns={@ORM\JoinColumn(name="id_ace", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_user_group", referencedColumnName="id")}
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
