<?php

abstract class Cliente {
    protected int $id;
    protected string $nomeSocial;
    protected string $email;

    public abstract function getNome();
    public abstract function getNumDoc();
    public abstract function getTipo();

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNomeSocial(): string
    {
        return $this->nomeSocial;
    }

    public function setNomeSocial(string $nome): self
    {
        $this->nomeSocial = $nome;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}