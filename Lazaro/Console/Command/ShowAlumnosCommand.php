<?php

namespace Hiberus\Lazaro\Console\Command;

use Hiberus\Lazaro\Api\Data\AlumnoInterface;
use Hiberus\Lazaro\Api\AlumnoRepositoryInterface;
use Hiberus\Lazaro\Console\Command\Input\ShowBooks\ListInputValidator;
use Hiberus\Lazaro\Console\Command\Options\ShowBooks\ListOptions;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Console\Cli;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

/**
 * Class ShowAlumnosCommand
 * @package Hiberus\Lazaro\Console\Command
 */
class ShowAlumnosCommand extends Command
{
    const   DETAIL_TAG  =   'detail';

   
    protected $listOptions;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var AlumnoRepositoryInterface
     */
    private $AlumnoRepository;

    /**
     * ShowAlumnosCommand constructor.
     
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param AlumnoRepositoryInterface $alumnoRepository
     * @param string|null $name
     */
    public function __construct(
        
        SearchCriteriaBuilder $searchCriteriaBuilder,
        AlumnoRepositoryInterface $alumnoRepository,
        string $name = null
    ) {
        
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->alumnoRepository = $alumnoRepository;

        parent::__construct($name);
    }

    /**
     * Configure
     */
    protected function configure()
    {
        $this->setName('hiberus:lazaro')
            ->setDescription('Show Alumn List')
            ->setDefinition([]);

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws LocalizedException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $time = microtime(true);

        $this->initFormatter($output);

        $this->process($input, $output);

        $output->writeln('Execution time: ' . (microtime(true) - $time));

        return Cli::RETURN_SUCCESS;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    private function process(InputInterface $input, OutputInterface $output)
    {
        

        /** @var AlumnoInterface $alumno */
        foreach ($this->getAlumnoList() as $alumno) {
            $output->writeln(
                sprintf(
                    "<%s> >> First Name: %s - Last name: %s - Mark: %s  <%s>",
                    self::DETAIL_TAG,
                    $alumno->getFirstName(),
                    $alumno->getLastName(),
                    $alumno->getMark(),
                    self::DETAIL_TAG
                )
            );
        }

    }

    /**
     * @return AlumnoInterface[]
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    private function getAlumnoList()
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();

        $alumnoResults = $this->alumnoRepository->getList($searchCriteria)->getItems();

        if (empty($alumnoResults)) {
            throw new NoSuchEntityException(
                __('No alumno found.')
            );
        }

        return $alumnoResults;
    }

    /**
     * @param OutputInterface $output
     */
    private function initFormatter(OutputInterface $output)
    {
        /** @var OutputFormatterInterface $outputFormatter */
        $outputFormatter = $output->getFormatter();
        $outputFormatter->setStyle(self::DETAIL_TAG, new OutputFormatterStyle('yellow'));
    }
}
