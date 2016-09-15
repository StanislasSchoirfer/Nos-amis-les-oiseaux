<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Observation
 *
 * @ORM\Table(name="observation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ObservationRepository")
 */
class Observation
{


	const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'rejected';
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     *
     * @Assert\Type(
     *     type="stringr",
     *     message="La date {{ value }} n'est pas de type : {{ type }}."
     * )
     */
     
    private $date;
    
    

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     *
     * @Assert\Type(
     *     type="string",
     *     message="La date {{ value }} n'est pas de type : {{ type }}."
     * )
     */
    private $comment;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="bird", type="string", length=255)
     *
     * @Assert\Type("string")
     */
    private $bird;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\Image(mimeTypes={ "image/*" })
     */
    private $image;

    /**
     * @ORM\Column(type="string")
     * @Assert\Type("string")
     */
    private $latlng;
    
    
    /**
    * @ORM\Column(name="statut", type="string", nullable=false, columnDefinition="ENUM('pending', 'accepted', 'rejected')", options={"default":"pending"})
    *
    * @Assert\Type("string")
    */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", cascade={"persist"})
     */
    private $user;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Observation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Observation
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Observation
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set latlng
     *
     * @param string $latlng
     *
     * @return Observation
     */
    public function setLatlng($latlng)
    {
        $this->latlng = $latlng;

        return $this;
    }

    /**
     * Get latlng
     *
     * @return string
     */
    public function getLatlng()
    {
        return $this->latlng;
    }


    /**
     * Set bird
     *
     * @param string $bird
     *
     * @return Observation
     */
    public function setBird($bird)
    {
        $this->bird = $bird;

        return $this;
    }

    /**
     * Get bird
     *
     * @return string
     */
    public function getBird()
    {
        return $this->bird;
    }


	/**
	*
	* get status
	*	@return string
	*
	*/
	public function getStatut()
	{
		return $this->statut;
	}

	/**
	* Set status
	*
	* @return Observation
	*/
	public function setStatut($statut)
	{
		 if (!in_array($statut, array(self::STATUS_PENDING, self::STATUS_ACCEPTED, self::STATUS_REJECTED))) {
            throw new \InvalidArgumentException("Invalid status");
        }
		$this->statut = $statut;
	}
	
	
	

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Observation
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    
   
    
}
