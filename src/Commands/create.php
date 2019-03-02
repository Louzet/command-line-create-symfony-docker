<?php

namespace DockerSymfony\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class create extends Command
{
    /**
     * name of the command
     * @example  : php creator create:symfony ...
     */
    protected $commandName = 'create:symfony';
    protected $commandDescription = 'crée un nouveau projet';
    protected $commandHelp = 'Cette commande permet de créer un nouveau projet Symfony';

    /**
     * type de projet symfony (skeleton ou website)
     * @example : php creator create:symfony skeleton
     */
    protected $commandFirstArgument;
    protected $commandFirstArgumentDescription = 'Entrez le type de projet \n [ EXEMPLE ] : skeleton ou website';

    /**
     * nom de votre projet
     * @example : php create create:symfony skeleton Demo
     */
    protected $commandSecondArgument;
    protected $commandSecondArgumentDescription = 'Entrez le nom de votre projet';

    protected $commandOptionName = 'docker';
    protected $commandOptionDescription = 'add a docker configuration in your project';


    public function __construct($commandFirstArgument, $commandSecondArgument = null, $commandOptionName = null)
    {
        $this->commandFirstArgument = $commandFirstArgument;
        $this->commandSecondArgument = $commandSecondArgument;
        $this->commandOptionName = $commandOptionName;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName($this->commandName);

        $this->setDescription($this->commandDescription);
        $this->setHelp($this->commandHelp);

        $this->addArgument(
            $this->commandFirstArgument,
            InputArgument::REQUIRED,
            $this->commandFirstArgumentDescription
        );

        $this->addArgument(
            $this->commandSecondArgument,
            InputArgument::OPTIONAL,
            $this->commandSecondArgumentDescription,
            'Demo'

        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $argumentFirst = strtolower($input->getArgument($this->commandFirstArgument));

        $argumentSecond = $input->getArgument($this->commandSecondArgument);

        if (null === $argumentFirst)
        {
            $argumentFirst = 'skeleton';
        }
        if (null === $argumentSecond)
        {
            $argumentSecond = 'Demo';
        }

        $output->writeln('projet ' . $argumentSecond . ' crée' . PHP_EOL . '[ Type ] ' . $argumentFirst );
    }
}
