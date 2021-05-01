<?php


namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class MessageCommand extends Command
{

    protected function greetUser(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output -> writeln([
            '========== Future Billionaire Greetings Console App ==========',
            '==============================================================',
            '',
        ]);

        // outputs a message without adding a "\n" at the end of the line
        $output -> write($this -> getGreeting() .', '. $input -> getArgument('msg'));
    }


    protected function configure()
    {
        $this->setName('msg')
            ->setDescription('The command asks for the first currency')
            ->setHelp('This command allows you to enter the first currency of the currency pair')
            ->addArgument('msg',  InputArgument::REQUIRED, 'Enter the first currency: ');
    }

    protected function getGreeting(): string
    {
        $time = date("H");
        if ($time < "12") {
            return "Good morning";
        } else
            if ($time >= "12" && $time < "17") {
                return "Good afternoon";
            } else
                if ($time >= "17" && $time < "19") {
                    return "Good evening";
                } else
                    if ($time >= "19") {
                        return "Good night";
                    }
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this -> greetUser($input, $output);
        return Command::SUCCESS;

    }}