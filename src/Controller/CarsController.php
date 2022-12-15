<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Service\CallApi;
use App\Form\SearchFormType;
use App\Repository\CarRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CarsController extends AbstractController
{
    

    #[Route('/', name: 'app_cars')]
    
    public function index(CarRepository $carRepository, Request $request,PaginatorInterface $paginator,CallApi $callApi): Response
    {


        
        
        $data = new SearchData();
        $form = $this->createForm(SearchFormType::class, $data);        
        $form->handleRequest($request);
        $carList = $carRepository->findSearch($data);
        // On utilise paginate pour limiter l'affichage a 20 voitures 
        $cars = $paginator->paginate(
            $carList,
            $request->query->getInt('page', 1),20);

        

        return $this->render('cars/index.html.twig', [
            'list_cars' => $cars,
            'form' => $form->createView(),
            'api' => $callApi->getWeather(),
            'icon' =>$callApi->getIcon()
            
            
        ]);
    }

    
}
