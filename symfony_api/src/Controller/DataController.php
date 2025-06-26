<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use PDO;



class DataController extends AbstractController
{
    #[Route('/CO2_Data', name: 'CO2_data')]
    public function index(): Response
    {
        $host = $this->getParameter('db.host');
        $user = $this->getParameter('db.user');
        $password = $this->getParameter('db.password');
        $database = $this->getParameter('db.database');



        $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);

        $sql = "SELECT * FROM `CO2_Data` ORDER BY `CO2 Emmisions/Km(Grams)` desc LIMIT ? ";

      
        $result = $conn->prepare($sql);
        $result->bindValue(1, 100, PDO::PARAM_INT);
        $result->execute();

        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

        return new JsonResponse($rows);
    }
}
