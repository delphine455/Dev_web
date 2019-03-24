<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Users;
use AppBundle\Entity\Projets;
use AppBundle\Entity\Taches;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use \Datetime;



class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $users = [];

        for ($i = 0; $i < 5; $i++) {
            $user = new Users();
            $user->setNom('nom' . $i);
            $user->setPrenom('prenom' . $i);
            $user->setDateNaissance(new \DateTime());
            $user->setEmail('email' . $i . '@gmail.com');
            $user->setUsername('user' . $i);
            $user->setEnabled( 1);
            $user->setPlainPassword( 'password');
            $user->setSalt( '');
            if($i < 2){
                $user->setRoles(array('ROLE_CHEF'));
            }else{
                $user->setRoles(array('ROLE_DEV'));
            }

            $user->setCompetences('GRH,informatique,gestion');
            $manager->persist($user);
            $manager->flush();
            $users[] = $user;
        }
        $user = new Users();
        $user->setNom('nom' . $i);
        $user->setPrenom('prenom' . $i);
        $user->setDateNaissance(new \DateTime());
        $user->setEmail('email' . $i . '@gmail.com');
        $user->setUsername('user' . $i);
        $user->setEnabled( 1);
        $user->setPlainPassword( 'password');
        $user->setSalt( '');
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setCompetences('GRH,informatique,gestion');
        $manager->persist($user);
        $manager->flush();

        $projets = [];
        for ($i = 0; $i < mt_rand(2, 5); $i++) {
            $projet = new Projets();
            $projet->setNom('nom' . $i);
            $projet->setDescription('description' . $i);
            $projet->setDateDebut(new \DateTime('2019-01-01'));
            $projet->setDateFin(new \DateTime('2019-03-01'));
            $projet->setClient('client' . $i);
            $projet->setUser($users[mt_rand(0, 4)]);
            $manager->persist($projet);
            $projets[] = $projet;
            $manager->flush();
        }

        foreach ($projets as $p) {
            for ($i = 0; $i < mt_rand(3, 6); $i++) {
                $tache = new Taches();
                $tache->setNom('nom' . $i);
                $tache->setDescription('description' . $i);
                $tache->setDateDebut(new \DateTime('2019-01-01'));
                $tache->setDateFin(new \DateTime('2019-03-01'));
                $tache->setDateRealisation(new \DateTime('2019-03-01'));
                $tache->setEtat('etat' . $i);
                $tache->setProjet($p);
                $tache->setUser($users[4]);
                $manager->persist($tache);
                $manager->flush();
            }

        }


    }
}
