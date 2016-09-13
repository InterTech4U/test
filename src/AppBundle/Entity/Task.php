<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="task", indexes={@ORM\Index(name="FK_task_task", columns={"id_task"}), @ORM\Index(name="FK_task_project", columns={"id_project"}), @ORM\Index(name="FK_task_status_of_task", columns={"id_status_of_task"}), @ORM\Index(name="FK_task_team", columns={"assign_to_user"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\Task")
 * 
 */
class Task
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp_add", type="datetime", nullable=false)
     */
    private $timestampAdd = 'CURRENT_TIMESTAMP';

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
     * @var \StatusOfTask
     *
     * @ORM\ManyToOne(targetEntity="StatusOfTask")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_status_of_task", referencedColumnName="id")
     * })
     */
    private $idStatusOfTask;

    /**
     * @var \Task
     *
     * @ORM\ManyToOne(targetEntity="Task")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_task", referencedColumnName="id")
     * })
     */
    private $idTask;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="assign_to_user", referencedColumnName="id")
     * })
     */
    private $assignToUser;
	
	
	/**
     * @var integer
     *
     * @ORM\Column(name="priorytet", type="integer", nullable=false)
     */
	private $priorytet;



	public function __construct()
    {
        $this->timestampAdd = new \DateTime();
		$this->priorytet = 3;
		$this->idStatusOfTask = 1;
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
     * Set name
     *
     * @param string $name
     *
     * @return Task
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Task
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
     * Set timestampAdd
     *
     * @param \DateTime $timestampAdd
     *
     * @return Task
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
     * Set idProject
     *
     * @param \AppBundle\Entity\Project $idProject
     *
     * @return Task
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
     * Set idStatusOfTask
     *
     * @param \AppBundle\Entity\StatusOfTask $idStatusOfTask
     *
     * @return Task
     */
    public function setIdStatusOfTask(\AppBundle\Entity\StatusOfTask $idStatusOfTask = null)
    {
        $this->idStatusOfTask = $idStatusOfTask;

        return $this;
    }

    /**
     * Get idStatusOfTask
     *
     * @return \AppBundle\Entity\StatusOfTask
     */
    public function getIdStatusOfTask()
    {
        return $this->idStatusOfTask;
    }

    /**
     * Set idTask
     *
     * @param \AppBundle\Entity\Task $idTask
     *
     * @return Task
     */
    public function setIdTask(\AppBundle\Entity\Task $idTask = null)
    {
        $this->idTask = $idTask;

        return $this;
    }

    /**
     * Get idTask
     *
     * @return \AppBundle\Entity\Task
     */
    public function getIdTask()
    {
        return $this->idTask;
    }

    /**
     * Set assignToUser
     *
     * @param \AppBundle\Entity\User $assignToUser
     *
     * @return Task
     */
    public function setAssignToUser(\AppBundle\Entity\User $assignToUser = null)
    {
        $this->assignToUser = $assignToUser;

        return $this;
    }

    /**
     * Get assignToUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getAssignToUser()
    {
        return $this->assignToUser;
    }

    /**
     * Set priorytet
     *
     * @param integer $priorytet
     *
     * @return Task
     */
    public function setPriorytet($priorytet = 3)
    {
        $this->priorytet = $priorytet;

        return $this;
    }

    /**
     * Get priorytet
     *
     * @return integer
     */
    public function getPriorytet()
    {
        return $this->priorytet;
    }
	
	
	
	/**
	 *
	 * @return type
	 */
	public function __toString()
	{
		return $this->name;
	}
}
