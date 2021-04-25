<?php
class CountryService extends DoctrineBaseService {
    
    function __construct () {
        parent::__construct();
    }

    function truncate() {
        try {
            $sql = 'TRUNCATE TABLE country';
            $stmt = $this->em->getConnection()->prepare($sql);
            $stmt->execute();            
        } catch (exception $e) {
            echo $e->getcode().'<hr>';
            echo $e->getmessage();
            return false;
        }
        return true;
    }
    
    function saveCountryCache() {
        $this->api = new RestCountryService();
        
        $result = $this->api->all();
        $result = $this->mapper->mapMultiple($result, Models\Country::class);

        if (count($result) > 0):
            $this->truncate();
        else:
            return false;
        endif;
        
        foreach ($result as $key => $country) {
            $this->em->persist($country);
            $this->em->flush();
        }
        
        return true;
    }
    
    
    function searchCountryName($name) {
        $qb = $this->em->getRepository('Models\Country')->createQueryBuilder('u');
        $qb->andWhere('u.name like :name')->setParameter('name', '%'.$name.'%');
        $data = $qb->getQuery()->getResult( ); // in objects

        return $data;

    }

    function searchCountryNameFromRemote($name) {
        $this->api = new RestCountryService();
        $result = $this->api->getByName($name);

        // al venir de una api viene en DTO, mapeamos
        if ($result) $this->mapper->mapMultiple($result, Models\Country::class);


        return $result;  
    }


    function removeByName($name) {
        try {
            $country = $this->em->getRepository('Models\\Country')->findBy(array('name'=> $name));

            if (!empty($country)) {
                $country = $country[0];
                // Remove it and flush
                $this->em->remove($country);
                $this->em->flush();
            }
        } catch (Exception $e) {
            return false;
        }
        return true;

    }

    function removeById($id) {
        try {
            $country = $this->em->getReference('Models\\Country', $id);

            // OR you can get the entity itself ( will generate a query )
            // $user = $em->getRepository('ProjectBundle:User')->find($id);

            // Remove it and flush
            $this->em->remove($country);
            $this->em->flush();
        } catch (Exception $e) {
            return false;
        }
        return true;

    }
    
}


