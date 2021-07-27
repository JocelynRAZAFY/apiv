<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $users = [
            ['userName' => 'test', 'email' => 'test@gmail.com', 'password' => '123'],
            ['userName' => 'test1', 'email' => 'test1@yahoo.fr', 'password' => '123']
        ];

        foreach ($users as $item){
            $user = new User();
            $user->setRoles([User::ROLE_USER]);
            $user->setUsername($item['userName']);
            $user->setEmail($item['email']);
            $user->setEmailInitial($item['email']);
            $user->setRoles([User::ROLE_USER]);
            $user->setPassword($this->passwordEncoder->encodePassword($user,$item['password']));
            $user->setStatusValidationEmail(true );
            $user->setAvatar(false);
            $user->setLogo(false);
            $user->setRegistrationDate(new \DateTime());
            $user->setIsSocial(false);
            $manager->persist($user);
            $manager->flush();
        }

        // $product = new Product();
        // $manager->persist($product);
    }
}
