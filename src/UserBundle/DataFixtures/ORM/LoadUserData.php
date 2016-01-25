<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
	
	/**
	 * 
	 * @var Container
	 */
	private $container;
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Symfony\Component\DependencyInjection\ContainerAwareInterface::setContainer()
	 */
	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
		
		return $this;
	}

	
	
	public function load(ObjectManager $manager)
	{
		$userManager = $this->container->get('fos_user.user_manager');
		
        $user = $userManager->createUser();
        
        $user->setUsername('user')
        	->setEmail('user@user.com')
        	->setPlainPassword('user')
        	->setLastname('user')
        	->setFirstname('user')
        	->setEnabled(true)
        	->setRoles(array('ROLE_USER'));

        $userManager->updateUser($user, true);
        
        $admin = $userManager->createUser();
        
        $admin->setUsername('admin')
        ->setEmail('admin@admin.com')
        ->setPlainPassword('admin')
        ->setLastname('admin')
        ->setFirstname('admin')
        ->setEnabled(true)
        ->setRoles(array('ROLE_ADMIN'));
        
        $userManager->updateUser($user, true);
	}
}