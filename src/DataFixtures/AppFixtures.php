<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Class AppFixtures
 * @package App\DataFixtures
 */

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordHasherInterface
     */
    private UserPasswordHasherInterface $userPasswordHasher;

    /**
     * AppFixtures constructor.
     * @param UserPasswordHasherInterface $userPasswordHasher
     */
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }


    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $users = [];
        for($i=1; $i<= 10 ; $i++){
            $user = new User();
            $user->setPassword($this->userPasswordHasher->hashPassword($user, "password"));
            $user->setEmail(sprintf("email-%d@email.fg", $i));
            $user->setName(sprintf("nameFg-%d", $i));
            $manager->persist($user);

            $users[] = $user;
        }
        foreach ($users as $user){
            for($j=1; $j<=5 ; $j++){
                $post = Post::create("Content ".$j, $user);

                shuffle($users);
                foreach (array_slice($users, 0,5) as $userCanLike){
                    $post->likeBy($userCanLike);
                }
                $manager->persist($post);
            }
        }


        $manager->flush();
    }
}
