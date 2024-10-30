# SevengroupSecurityBundle
[![Latest Stable Version](http://poser.pugx.org/sevengroupfrance/hubscore-bundle/v)](https://packagist.org/packages/sevengroupfrance/hubscore-bundle) [![Total Downloads](http://poser.pugx.org/sevengroupfrance/hubscore-bundle/downloads)](https://packagist.org/packages/sevengroupfrance/hubscore-bundle) [![Latest Unstable Version](http://poser.pugx.org/sevengroupfrance/hubscore-bundle/v/unstable)](https://packagist.org/packages/sevengroupfrance/hubscore-bundle) [![License](http://poser.pugx.org/sevengroupfrance/hubscore-bundle/license)](https://packagist.org/packages/sevengroupfrance/hubscore-bundle) [![PHP Version Require](http://poser.pugx.org/sevengroupfrance/hubscore-bundle/require/php)](https://packagist.org/packages/sevengroupfrance/hubscore-bundle)

## Installation

Copier le fichier config/packages/sevengroup_security.yaml dans le dossier config/packages du projet.


```shell
composer require sevengroupfrance/security-bundle
```

[Packagist](https://packagist.org/packages/sevengroupfrance/security-bundle)

## Utilisation

Include 
> Sevengroup\SecurityBundle\Services\CheckAccess

La fonction **checkAccess()** attend 2 arguments obligatoires et un facultatif. Elle renverra true ou false en fonction de si l'utilisateur connecté à l'authorisation de faire l'action demandée.

- resourceType **[obligatoire]** : la ressource sur laquelle on souhaite intervenir
- access **[obligatoire]** : le type d'accès demandé, en fonction des ressources il peut être, CREATE / READ / EDIT / DELETE / PERMISSION
- resourceId **[facultatif]** : l'identifiant de la ressource sur laquel on souhaite intervenir

La fonction **getSecurity()** attend 1 seul argument listé ci-dessus : resourceType. Cette fonction reverra des conditions pour récupérer la liste des ressources en fonction des propriétaires, des groupes et des droits associés