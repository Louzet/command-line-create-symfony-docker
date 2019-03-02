<?php

namespace DockerSymfony;


abstract class Factory
{
    protected $response;

    protected static function create(string $response = null)
    {
        echo 'Choose your symfony version ? (Y/n)' . PHP_EOL;

        /**
         * Attend le choix de tri de l'utilisateur
         * return string
         */
        $input = trim(fgets(STDIN));

    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }
}
