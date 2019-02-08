<?php

$routes = new Router;

// routes Abonnes
$routes->get('abonnes',                 'AbonnesController@index');     // Liste des abonnés
$routes->get('abonnes/(\d+)',           'AbonnesController@show');      // afficher et editer un abonné
$routes->get('abonnes/add',             'AbonnesController@add');       // ajouter un abonné
$routes->post('abonnes/save',           'AbonnesController@save');      // faire un insert ou un update
$routes->post('abonnes/delete/(\d+)',   'AbonnesController@delete');    // supprimer un abonné

// routes Ouvrages
$routes->get('ouvrages',                'OuvragesController@index');     
$routes->get('ouvrages/(\d+)',          'OuvragesController@show');     
$routes->get('ouvrages/add',            'OuvragesController@add');       
$routes->post('ouvrages/save',          'OuvragesController@save');     
$routes->post('ouvrages/delete/(\d+)',  'OuvragesController@delete');


// routes association_abonne_ouvrage 
$routes->get('prets',                   'AssociationAbonneOuvrage@index');
$routes->get('prets/(\d+)',             'AssociationAbonneOuvrage@show');
$routes->get('prets/add',               'AssociationAbonneOuvrage@add');
$routes->post('prets/save',             'AssociationAbonneOuvrage@save');
$routes->get('prets/delete/(\d+)',      'AssociationAbonneOuvrage@delete');


$routes->run();