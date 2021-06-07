<?php

namespace App\Controller;

use App\Entity\UserSearch;
use App\Form\UserSearchType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/users")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $userSearch = (new UserSearch())
            ->setItemsPerPage(5);
        $userSearchForm = $this->createForm(UserSearchType::class, $userSearch, [
            'items_per_page' => $userSearch->getItemsPerPage(),
        ]);
        $userSearchForm->handleRequest($request);

        $users = $this->userRepository->findUsers($userSearch);

        return $this->render('users.html.twig', [
            'users' => $users,
            'userSearch' => $userSearchForm->createView(),
        ]);
    }
}
