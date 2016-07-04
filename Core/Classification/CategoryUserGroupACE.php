<?php
/**
 * Created by PhpStorm.
 * User: idlab
 * Date: 6/28/16
 * Time: 10:43 AM
 */

namespace AppBundle\ACEEntities\Core\Classification;


use AppBundle\ACEEntities\Core\Core\UserGroupACE;
use AppBundle\Entity\Core\Classification\Category;
use AppBundle\Services\Core\Framework\BaseVoterSupportInterface;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;
use Doctrine\ORM\Mapping as ORM;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * Class CategoryUserGroupACE
 *
 * @package AppBundle\ACEEntities\Core\Classification
 * @Serializer\XmlRoot("category_user_group_ACE")
 *
 * @ORM\Entity
 * @ORM\Table(name="core__classification__category_user_group_ace")
 *
 * @Hateoas\Relation(
 *  "self",
 *  href= @Hateoas\Route(
 *         "get_organisation_usergroup_categoryacl",
 *         parameters = { "organisation" = "expr(object.getUserGroup().getOrganisation().getId())","userGroup" = "expr(object.getUserGroup().getId())","categoryUserGroupACE" = "expr(object.getId())"},
 *         absolute = true
 *     ),
 *  attributes = { "method" = {"put","delete"} },
 * )
 *
 */
class CategoryUserGroupACE extends UserGroupACE implements BaseVoterSupportInterface
{
    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Core\Classification\Category")
     * @ORM\JoinTable(name="core__classification__category_ace_selections",
     *      joinColumns={@ORM\JoinColumn(name="id_ace", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_category", referencedColumnName="id")}
     * )
     * @Serializer\Exclude
     */
    protected $selectedObjects;

    /**
     * @param Category $category
     * @return CategoryUserGroupACE
     */
    public function addSelectedObject($category)
    {
        $this->selectedObjects->add($category);
        return $this;
    }

    /**
     * @param Category $category
     * @return CategoryUserGroupACE
     */
    public function removeSelectedObject($category)
    {
        $this->selectedObjects->removeElement($category);
        return $this;
    }

}