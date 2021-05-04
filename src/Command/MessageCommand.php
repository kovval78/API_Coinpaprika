<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class MessageCommand extends Command
{

    protected function configure(): void
    {
        $this->setName('msg')
            ->setDescription('The command asks for the first and second currency')
            ->setHelp('This command allows you to enter the currency pair')
            ->addArgument('firstcoin',  InputArgument::REQUIRED, 'Enter the first currency: ')
            ->addArgument('secondcoin', InputArgument::REQUIRED, 'Enter the second currency: ');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fcoin = 'Hi ' . $input->getArgument('firstcoin');

        $scoin = $input->getArgument('secondcoin');
        if ($scoin) {
            $fcoin .= ' ' . $scoin;
        }

        $output->writeln($fcoin.'!');

        return Command::SUCCESS;
    }}