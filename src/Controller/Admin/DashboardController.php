<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use App\Entity\CarCategory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class DashboardController extends AbstractDashboardController
{

    public function __construct
    (
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
        
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //On genere une Url puis on redirige vers cette meme Url
        $url = $this->adminUrlGenerator->setController(CarCrudController::class)
                    ->generateUrl();
        return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Skills4All - CarDealer');
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Cars');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
                MenuItem::linkToCrud('Show Cars', 'fas fa-eye', Car::class),
                MenuItem::linkToCrud('Add Car', 'fas fa-plus', Car::class)->setAction(Crud::PAGE_NEW)
            ]);
        yield MenuItem::section('Cars-Categories');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
                MenuItem::linkToCrud('Show Categories', 'fas fa-eye', CarCategory::class),
                MenuItem::linkToCrud('Add Category', 'fas fa-plus', CarCategory::class)->setAction(Crud::PAGE_NEW)
        ]);
        yield MenuItem::linkToUrl('Retour au site', 'fa-solid fa-hand-point-right', '/');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
