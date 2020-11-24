<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('Margaux');
        $user->setLastname('Russeil');
        $user->setUsername('admin');
        $user->setBirthday(new \DateTime('1999-09-19'));
        $user->setGender('Madame');
        $user->setRoles(['ROLE_ADMIN']);

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'azerty'
        ));

        $manager->persist($user);
        $manager->flush();
    }
}
