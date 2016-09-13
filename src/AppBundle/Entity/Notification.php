<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notification", indexes={@ORM\Index(name="FK_notification_task", columns={"id_task"}), @ORM\Index(name="FK_notification_type_of_notification", columns={"id_type_of_notification"}), @ORM\Index(name="FK_notification_user", columns={"assign_to_user"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\Notification")
 * 
 */
class Notification
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

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
     * @var \Task
     *
     * @ORM\ManyToOne(targetEntity="Task")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_task", referencedColumnName="id")
     * })
     */
    private $idTask;

    /**
     * @var \TypeOfNotification
     *
     * @ORM\ManyToOne(targetEntity="TypeOfNotification")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_of_notification", referencedColumnName="id")
     * })
     */
    private $idTypeOfNotification;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="assign_to_user", referencedColumnName="id_user")
     * })
     */
    private $assignToUser;





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
     * Set title
     *
     * @param string $title
     *
     * @return Notification
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Notification
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
     * @return Notification
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
     * Set idTask
     *
     * @param \AppBundle\Entity\Task $idTask
     *
     * @return Notification
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
     * Set idTypeOfNotification
     *
     * @param \AppBundle\Entity\TypeOfNotification $idTypeOfNotification
     *
     * @return Notification
     */
    public function setIdTypeOfNotification(\AppBundle\Entity\TypeOfNotification $idTypeOfNotification = null)
    {
        $this->idTypeOfNotification = $idTypeOfNotification;

        return $this;
    }

    /**
     * Get idTypeOfNotification
     *
     * @return \AppBundle\Entity\TypeOfNotification
     */
    public function getIdTypeOfNotification()
    {
        return $this->idTypeOfNotification;
    }

    /**
     * Set assignToUser
     *
     * @param \AppBundle\Entity\Team $assignToUser
     *
     * @return Notification
     */
    public function setAssignToUser(\AppBundle\Entity\Team $assignToUser = null)
    {
        $this->assignToUser = $assignToUser;

        return $this;
    }

    /**
     * Get assignToUser
     *
     * @return \AppBundle\Entity\Team
     */
    public function getAssignToUser()
    {
        return $this->assignToUser;
    }
}
