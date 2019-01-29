<?php

namespace App\DataFixtures;

use App\Entity\USERS;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        $user = new USERS();
        $user->setNOM('toto');
        $user->setPRENOM('toto');
        $user->setADRESS('toto');
        $user->setPOSTALCODE('12345');
        $user->setCITY('toto');
        $user->setBIRTHDAY('01012001');
        $user->setEmail('to@to.com');
        $user->setUsername('admin');
        $user->setADMIN('true');
        $user->setPassword($this->encoder->encodePassword($user,'Adobe@2018'));
        $manager->persist($user);

        $manager->flush();
    }
}
