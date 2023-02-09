<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table (name: 'Books')]
class book
{
    #[Id]
    #[GeneratedValue]
    #[Column (name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[Column(name: 'title',type:'string' )]
    private string $title ;

    #[Column(name: 'page',type:'smallint')]
    private int $page;


    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }


}