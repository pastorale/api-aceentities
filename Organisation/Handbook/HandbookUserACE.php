<?php
namespace AppBundle\ACEEntities\Organisation\Handbook;

use AppBundle\ACEEntities\Core\Core\UserACE;
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
 * @ORM\Table(name="organisation__handbook__handbook_user_ace")
 *
 * @Serializer\XmlRoot("handbook_user_group_ACE")
 * @Hateoas\Relation(
 *  "self",
 *  href= @Hateoas\Route(
 *         "get_organisation_user_cloudbookacl",
 *         parameters = { "organisation" = "expr(object.getUserGroup().getOrganisation().getId())","userGroup" = "expr(object.getUserGroup().getId())","handbookUserGroupACE" = "expr(object.getId())"},
 *         absolute = true
 *     ),
 *  attributes = { "method" = {"put","delete"} },
 * )
 * 
 *
 */
class HandbookUserACE extends UserACE implements BaseVoterSupportInterface
{
    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Organisation\Handbook\Handbook",inversedBy="userACEs")
     * @ORM\JoinTable(name="organisation__handbook__user_ace_selections",
     *      joinColumns={@ORM\JoinColumn(name="id_ace", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_handbook", referencedColumnName="id")}
     * )
     * @Serializer\Exclude
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
