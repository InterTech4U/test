<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team", indexes={@ORM\Index(name="FK_team_project", columns={"id_project"}), @ORM\Index(name="FK_team_user", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\Team")
 * 
 */
class Team
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp_add", type="datetime", nullable=false)
     */
    private $timestampAdd = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '0';

    /**
     * @var \Project
     *
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_project", referencedColumnName="id")
     * })
     */
    private $idProject;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;



	public function __construct()
    {
        $this->timestampAdd = new \DateTime();
    }

	
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set timestampAdd
     *
     * @param \DateTime $timestampAdd
     *
     * @return Team
     */
    public function setTimestampAdd($timestampAdd)
    {
        $this->timestampAdd = $timestampAdd;

        return $this;
    }

    /**
     * Get timestampAdd
     *
     * @return \DateTime
     */
    public function getTimestampAdd()
    {
        return $this->timestampAdd;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Team
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set idProject
     *
     * @param \AppBundle\Entity\Project $idProject
     *
     * @return Team
     */
    public function setIdProject(\AppBundle\Entity\Project $idProject = null)
    {
        $this->idProject = $idProject;

        return $this;
    }

    /**
     * Get idProject
     *
     * @return \AppBundle\Entity\Project
     */
    public function getIdProject()
    {
        return $this->idProject;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Team
     */
    public function setIdUser(\AppBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

	
	/**
	 *
	 * @return type
	 */
	public function __toString()
	{
		return $this->idUser->getFirstName() . ' ' . $this->idUser->getLastName() . ' - ' . $this->idUser->getEmail();
	}
}
