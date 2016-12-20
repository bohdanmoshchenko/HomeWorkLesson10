<?php

namespace BohdanMoshchenko\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="BohdanMoshchenko\BlogBundle\Repository\PostRepository")
 * @UniqueEntity("title")
 */
class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *@var string
     *
     *@ORM\Column(name="title", type="string", length=255, unique=true)
     *
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(min=5, max=100)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string")
     * @Assert\Type("string")
     */
    private  $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var Comment[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="BohdanMoshchenko\BlogBundle\Entity\Comment", mappedBy="post")
     */
    private $comments;

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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $value
     *
     * @return $this
     */
    public function setCreatedAt($value)
    {
        $this->createdAt = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return ArrayCollection|Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param ArrayCollection|Comment[] $comments
     *
     * @return $this
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }
}
