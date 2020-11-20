**Installation de XDebug : debugging en PHP**
=============================================

**1.**  Vérifiez si vous avez déjà le fichier du module XDebug dans votre
    disque : allez dans **xampp/php/ext** et cherchez le fichier
    **php_xdebug.dll**

Si c'est le cas, vous avez déjà le module et il reste qu'à l'activer.
Passez alors directement au point **3** de ce tutoriel

Sinon, vous allez devoir télechager php_xdebug.dll de https://xdebug.org/download. Pour connaitre la version, passez au point **2**

<br>

**2.** Créez un fichier **info.php** dans htdocs. Créez une page web de
    base et rajoutez la ce code dans le body:

````php
<?php
    phpinfo();
?>
````
Lancez le fichier dans le navigateur. Faites CTRL-A puis CTRL-C pour copier le contenu complet de la page

Allez sur le site https://xdebug.org/wizard et collez le contenu dans le champ de texte. Cliquez sur **Analyse my phpinfo() output**

Cliquez sur le lien généré et enregistrez le fichier dans c:\xampp\php\ext sous le nom **php_xdebug.dll**

<br>



**3. Editez le fichier php.ini (xampp/php)**

Créez la section **[XDebug]** contenant les lignes suivantes (à la
 fin du fichier php.ini, par exemple):

 **[XDebug]**

````php
    zend_extension = "C:\xampp\php\ext\php_xdebug.dll"
    xdebug.remote_host = "127.0.0.1"
    xdebug.remote_enable = 1
    xdebug.remote_handler = "dbgp"
````

 Note : cette section peut exister déjà. Si c'est le cas, mettez-la à
 jour. Rajustez les chemins selon vos besoins


Redémarrez **apache.** Vérifiez que l'installation a été réalisée:
relancez la page info.php et cherchez la section **xdebug**. Le module
doit être marqué comme **enabled**.

Vous pouvez aussi faire un bête var\_dump d'un array et observer que le
format d'affichage a changé...

<br>

**5.** Vous pouvez debugger PHP dans VS Code. Installez l\'extension [PHP
    Debug](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug)
    dans Visual Studio. Puis rajoutez cette ligne à la section
    **[XDebug]** dans **php.ini** (dossier xampp\php) :

> **xdebug.remote_autostart = 1**

Cette ligne lancera le debugger quand on rechargera la page.

Pour tester le bon fonctionnement :

1.  Redemarrez VS Code et Apache

2.  Lancez le debugger et choisissez PHP. Il y a une configuration par
    défaut dans le debugger qui doit fonctionner (cliquez sur l\'icône
    de debugging en bas à gauche de la fenêtre et puis sur \"Add
    ConfigurationPHP\")

3.  Créez de breakpoints

4.  Ouvrez le script dans le navigateur


**6.** Si vous utilisez NetBeans, toutes les options de Debug devraient
    être activées. Vous pouvez utiliser **Debug File** si vous voulez
    lancer un fichier PHP en particulier. Pour le reste, ça fonctionne
    comme n'importe quel autre Debugger (breakpoints, watches etc...).

Raccourcis utiles :

-   **Activer/desactiver un breakpoint** dans une ligne:

-   **Step Into: F7** -- Lancer la ligne suivante. S\'il s\'agit d\'un
    appel à une fonction, lancer ligne par ligne le code de la
    fonction/méthode

-   **Step Over: F8** -- Même chose mais on ne visualisera pas
    l\'exécution de chaque ligne de la fonction/méthode, celle-ci sera
    lancé comme un bloc unitaires

-   **Step Out: CTRL + F7** -- Si on se trouve dans une fonction, lancer
    le reste de lignes de la fonction et continuer l\'exécution depuis
    l\'appel. Si on se trouve dans le code principal, continuer
    l\'exécution jusqu\'au prochain breakpoint

Conseil : N'oubliez pas de modifier l'URL de votre projet dans **Project
properties (Clic droit sur le projet) Run Configuration** pour pouvoir
lancer directement votre projet depuis NetBeans

Si vous voulez lancer le debugger pour un ensemble de pages d\'un
    projet (ex: une page PHP qui contient un formulaire qui appelle une
    autre page PHP) vous devez établir l\'URL de la première page que
    vous voulez ouvrir dans index file. Puis vous devez cliquer sur
    CTRL-F5 (Debug Project)


