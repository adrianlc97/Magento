<?php

namespace Hiberus\Lazaro\Setup\Patch\Data;

use Hiberus\Lazaro\Api\Data\AlumnoInterface;
use Hiberus\Lazaro\Api\Data\AlumnoInterfaceFactory;
use Hiberus\Lazaro\Api\AlumnoRepositoryInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\HTTP\Client\CurlFactory;
use Magento\Framework\File\Csv;


/**
 * Class PopulateDataModel
 * @package Hiberus\Lazaro\Setup\Patch\Data
 */
class PopulateDataModel implements DataPatchInterface
{
    const   RANDOM_PERSON_DATA_API_ENDPOINT =   'https://api.namefake.com/{{locale}}/{{gender}}/';
    const   NUMBER_OF_ALUMNOS  =   10;
    const FILE='app/code/Hiberus/Lazaro/Setup/Patch/Data/PopulateDataModel.php';

    /**
     * @var AlumnoRepositoryInterface
     */
    private $alumnoRepository;

    /**
     * @var AlumnpInterfaceFactory
     */
    private $alumnoFactory;

    /**
     * @var CurlFactory
     */
    private $curlFactory;
    /**
     * @var Csv
     */
    private $csv;

    /**
     * PopulateDataModel constructor.
     * @param AlumnoRepositoryInterface $alumnoRepository
     * @param AlumnoInterfaceFactory $alumnoFactory
     * @param CurlFactory $curlFactory
     * @param Csv $csv
     */
    public function __construct(
        AlumnoRepositoryInterface $alumnoRepository,
        AlumnoInterfaceFactory $alumnoFactory,
        CurlFactory $curlFactory,
        Csv $csv
    ) {
        $this->alumnoRepository = $alumnoRepository;
        $this->alumnoFactory = $alumnoFactory;
        $this->curlFactory = $curlFactory;
        $this->csv = $csv;

    }

    /**
     * @return DataPatchInterface|void
     */
    public function apply()
    {
        $this->populateData();
    }

    /**
     * Populate Data Model
     */
    private function populateData()
    {
        $this->populateAlumnos();
    }

    

    /**
     * Populate Alumnos Data
     */
    private function populateAlumnos()
    {
        $datos=$this->csv->getData(self::FILE);
        foreach ($datos as $myalumno) {
           

            /** @var AlumnoInterface $alumno */
            $alumno = $this->alumnoFactory->create();

            $alumno->setFirstName($myalumno[0])
                ->setLastName($myalumno[1])
                ->setMark(rand(0,1000)/100)
            ;

            $this->alumnoRepository->save(
                $alumno
            );
        }
    }

    /**
     * @param string $locale
     * @param string $gender
     * @return array
     */
    private function getRandomPersonData($locale = 'spanish-spain', $gender = 'random')
    {
        /** @var Curl $curl */
        $curl = $this->curlFactory->create();
        $curl->setTimeout(5);

        $apiEndpoint = self::RANDOM_PERSON_DATA_API_ENDPOINT;
        $uri = str_replace('{{locale}}', $locale, $apiEndpoint);
        $uri = str_replace('{{gender}}', $gender, $uri);

        $curl->get($uri);

        return json_decode($curl->getBody(), true);
    }

    /**
     * @return string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return string[]
     */
    public function getAliases()
    {
        return [];
    }
}
