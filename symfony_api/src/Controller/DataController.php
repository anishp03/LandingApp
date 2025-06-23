<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;



class DataController extends AbstractController
{
    #[Route('/CO2_Data', name: 'CO2_data')]
    public function index(): Response
    {
        $host = '127.0.0.1';
        $user = 'anish';
        $password = ''; // No password
        $database = 'LandingPage';

        $conn = new \mysqli($host, $user, $password, $database);

        if ($conn->connect_error) {
            return new Response('Connection failed: ' . $conn->connect_error);
        }

        $result = $conn->query("SELECT * FROM `CO2_Data` ORDER BY `CO2 Emmisions/Km(Grams)` desc");

        $rows = [];
        while ($row = $result->fetch_assoc()) 
        {
            $rows[] = $row;
        }
    
        $conn->close();
    
        return new JsonResponse($rows);
    }
}
