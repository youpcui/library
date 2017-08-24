<?php

namespace	AppBundle\DataFixtures\ORM;

use	\Doctrine\Common\DataFixtures\AbstractFixture;
use	\Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use	\Doctrine\Common\Persistence\ObjectManager;
use	AppBundle\Entity\BookPublisher as BookPublisher;

class LoadPublisherData extends AbstractFixture implements OrderedFixtureInterface{

	/**
	 *
	 * {@inheritDoc}
	 */

	public function load(ObjectManager $manager){
		// create a common publisher
		$pub1 = new BookPublisher();
		$pub1 -> setName('Common');
		$this -> addReference('commonPub',$pub1);

		// create a special publisher
		$pub2 = new BookPublisher();
		$pub2 -> setName('Special');
		$this -> addReference('specialPub',$pub2);

		$manager -> persist($pub1);
		$manager -> persist($pub2);

		$manager -> flush();
	}

	/**
	 *
	 *{@inheritDoc}
	 */
	public function getOrder(){
		return 1;
	}


}