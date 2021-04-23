<?php

// Fetch data by Native SQL
$sql = "SELECT * FROM doctrinetest ";
// $em = $this->getDoctrine()->getManager();
$stmt = $em->getConnection()->prepare($sql);
$stmt->execute();
  \Doctrine\Common\Util\Debug::dump( $stmt->fetchAll() );

//fetching data in by DQL
$qb = $em->getRepository('Models\Doctrinetest')->createQueryBuilder('u');
//$qb->andWhere('u.id = :id')->setParameter('id', $id);
$data = $qb->getQuery()->getResult( ); // in objects

// $data = $qb->getQuery()->getResult(Query::HYDRATE_ARRAY); // in array

 echo '<pre>'; \Doctrine\Common\Util\Debug::dump($data);echo '</pre>';
// Fetching data by common way
$data = $em->getRepository('Models\Doctrinetest');
$datax = $data->findAll();

foreach($datax as $d) {
  echo '<pre>'; \Doctrine\Common\Util\Debug::dump($d); echo '</pre>';
}




?>
<pre>
https://www.doctrine-project.org/projects/doctrine-orm/en/2.8/tutorials/getting-started.html#guide-assumptions
https://www.doctrine-project.org/projects/doctrine-migrations/en/3.0/reference/introduction.html#introduction

https://github.com/mark-gerarts/automapper-plus#installation

https://github.com/tcdent/php-restclient
https://github.com/vlucas/phpdotenv
https://github.com/bramus/router
https://twig.symfony.com/doc/3.x/intro.html#installation


https://getbootstrap.com/docs/4.5/examples/
https://bootstrap-autocomplete.readthedocs.io/en/latest/
https://raw.githack.com/xcash/bootstrap-autocomplete/master/dist/latest/index.html

    
vendor\bin\doctrine.bat
. orm:schema-tool:drop --force
. orm:schema-tool:create
. orm:validate-schema
. orm:convert-mapping --namespace=Models\ --from-database --force annotation ./
. orm:generate:entities --generate-annotations=true ./Models
</pre>