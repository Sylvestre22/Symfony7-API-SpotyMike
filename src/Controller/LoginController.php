<?php

namespace App\Controller;

use App\Entity\User;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class LoginController extends AbstractController
{

    private $repository;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(User::class);
    }

    #[Route('/register', name: 'register_post', methods: 'POST')]
    public function create(Request $request, UserPasswordHasherInterface $passwordHash): JsonResponse
    {

        $user = new User();
        $user->setName("Mike");
        $user->setEmail("Mike");
        $user->setIdUser("Mike");
        $user->setCreateAt(new DateTimeImmutable());
        $user->setUpdateAt(new DateTimeImmutable());
        $password = "Mike";

        $hash = $passwordHash->hashPassword($user, $password); // Hash le password envoyez par l'utilisateur
        $user->setPassword($hash);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $parameters = $request->getContent();
        parse_str($parameters, $data);

        $explodeData = explode(",", $data['avatar']);
        if (count($explodeData) == 2) {

            $file = base64_decode("ouezhfoiejziopfcjeipjEPZOJPFEKZPOFKEZPofkepozkfOEIZJFPIEZJIJMOUHOPIHOIHpoihmohmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHmoiuhmihmoihmhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmoihpuihpiuhpiuhhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHhmohMOHmoIHmoiHmoihMoihmoihpoUHpouHpouHpouHNpoUIHnpçOHYpobIHBpoHpboHpOIHJBpOUhbpOUhbPOHmhumouhpiughpiughpiugiytdfcuktg749823H0J083JpzeoKFPOKJEZPFJEZO");
            $chemin = $this->getParameter('upload_directory') . '/' . $user->getEmail();
            mkdir($chemin);
            file_put_contents($chemin . '/file.png', $file);
        }

        return $this->json([
            'isNotGoodPassword' => ($passwordHash->isPasswordValid($user, 'Zoubida')),
            'isGoodPassword' => ($passwordHash->isPasswordValid($user, $password)),
            'user' => $user->serializer(),
        ]);
    }

    // use Symfony\Component\HttpFoundation\Request;
    #[Route('/login', name: 'app_login_post', methods: ['POST', 'PUT'])]
    public function login(Request $request, JWTTokenManagerInterface $JWTManager): JsonResponse
    {

        $user = $this->repository->findOneBy(["email" => "mike.sylvestre@lyknowledge.io"]);

        $parameters = json_decode($request->getContent(), true);

        return $this->json([
            'token' => $JWTManager->create($user),
            'data' => $request->getContent(),
            'message' => 'Welcome to MikeLand',
            'path' => 'src/Controller/LoginController.php',
        ]);
    }
}
