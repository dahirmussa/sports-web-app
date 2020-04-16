<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        //  $user1 = new User();
        //  $user1->setEmail('matt.smith@smith.com');
        //  $passwordPlain = 'smith';
        //  $encodedPassword = $this->passwordEncoder->encodePassword($user1,  $passwordPlain);
        // $user1->setPassword($encodedPassword);
        // $user1->setRoles(['ROLE_USER', 'ROLE_ADMIN']);

        //$manager->persist($user1);

        // create objects
        $userUser = $this->createUser('user@user.com', 'user');
        $userAdmin = $this->createUser('admin@admin.com', 'admin', ['ROLE_ADMIN']);


        // add to DB queue
        $manager->persist($userUser);
        $manager->persist($userAdmin);

        // send query to DB
        $manager->flush();
    }

    private function createUser($username, $plainPassword, $roles = ['ROLE_USER']):User
    {
        $user = new User();
        $user->setEmail($username);
        $user->setRoles($roles);

        // password - and encoding
        $encodedPassword = $this->passwordEncoder->encodePassword($user, $plainPassword);
        $user->setPassword($encodedPassword);

        return $user;
    }
}