<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectStatus
 *
 * @ORM\Table(name="project_status", indexes={@ORM\Index(name="FK__project", columns={"id_project"}), @ORM\Index(name="FK__status_of_project", columns={"id_status_of_project"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\ProjectStatus")
 * 
 */
class ProjectStatus
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
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

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
     * @var \StatusOfProject
     *
     * @ORM\ManyToOne(targetEntity="StatusOfProject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_status_of_project", referencedColumnName="id")
     * })
     */
    private $idStatusOfProject;



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
     * @return ProjectStatus
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
     * Set description
     *
     * @param string $description
     *
     * @return ProjectStatus
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set idProject
     *
     * @param \AppBundle\Entity\Project $idProject
     *
     * @return ProjectStatus
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
     * Set idStatusOfProject
     *
     * @param \AppBundle\Entity\StatusOfProject $idStatusOfProject
     *
     * @return ProjectStatus
     */
    public function setIdStatusOfProject(\AppBundle\Entity\StatusOfProject $idStatusOfProject = null)
    {
        $this->idStatusOfProject = $idStatusOfProject;

        return $this;
    }

    /**
     * Get idStatusOfProject
     *
     * @return \AppBundle\Entity\StatusOfProject
     */
    public function getIdStatusOfProject()
    {
        return $this->idStatusOfProject;
    }
}
