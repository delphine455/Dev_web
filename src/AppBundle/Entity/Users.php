<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser ;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsersRepository")
 */
class Users extends BaseUser
{
    /**
     * @var \stdClass
     *
     * @ORM\OneToMany(targetEntity="Taches", mappedBy="user")
     */
    protected $taches;

    public function __construct()
    {
        parent :: __construct ();
        $this->taches = new ArrayCollection();
        $this->projets = new ArrayCollection();
    }

    public function getTaches()
    {
        return $this->taches;
    }

    public function addTache(Taches $tache)
    {
        $this->taches[] = $tache;
    }

    /**
     * @var \stdClass
     *
     * @ORM\OneToMany(targetEntity="Projets", mappedBy="users")
     */
    protected $projets;

    public function getProjets()
    {
        return $this->projets;
    }

    public function addProjet(Projets $pro)
    {
        $this->projets[] = $pro;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30)
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30)
     */
    protected $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    protected $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="competences", type="text")
     */
    protected $competences;


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Users
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Users
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Users
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }


    /**
     * Set competences
     *
     * @param string $competences
     *
     * @return Users
     */
    public function setCompetences($competences)
    {
        $this->competences = $competences;

        return $this;
    }

    /**
     * Get competences
     *
     * @return string
     */
    public function getCompetences()
    {
        return $this->competences;
    }
    public function __toString()
    {
        return (string) $this->id;
    }
}
