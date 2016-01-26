<?php

namespace GitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Git
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GitBundle\Entity\GitRepository")
 */
class Git
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="galerie", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="repositoryOwner", type="string", length=255)
     */
    private $repositoryOwner;
    
    /**
     * @var string
     *
     * @ORM\Column(name="repository", type="string", length=255)
     */
    private $repository;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;


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
     * Set author
     *
     * @param integer $author
     * @return Git
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return integer 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Git
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
     * Set repositoryOwner
     *
     * @param string $repositoryOwner
     * @return Git
     */
    public function setRepositoryOwner($repositoryOwner)
    {
        $this->repositoryOwner = $repositoryOwner;

        return $this;
    }

    /**
     * Get repositoryOwner
     *
     * @return string 
     */
    public function getRepositoryOwner()
    {
        return $this->repositoryOwner;
    }
    
    /**
     * Set repository
     *
     * @param string $repository
     * @return Git
     */
    public function setRepository($repository)
    {
    	$this->repository = $repository;
    
    	return $this;
    }
    
    /**
     * Get repository
     *
     * @return string
     */
    public function getRepository()
    {
    	return $this->repository;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Git
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
}
