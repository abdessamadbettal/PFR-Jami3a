<?php

/**
 * User: Abdessamad
 * Date: 7/10/2020
 * Time: 8:09 AM
 */

namespace app\core\db;


use app\core\Application;

/**
 * Class Database
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\core
 */
class Database
{
    public \PDO $pdo;

    public function __construct($dbConfig = [])
    {
        $dbDsn = $dbConfig['dsn'] ?? ''; // pour le moment, on ne prend que le dsn
        $username = $dbConfig['user'] ?? '';// soit on prend le user, soit on prend le rien
        $password = $dbConfig['password'] ?? ''; // soit on prend le password, soit on prend le rien
// echo "yes db connecte" ;
        $this->pdo = new \PDO($dbDsn, $username, $password); // on crée une instance de PDO
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // on définit le mode d'erreur
    }

    public function applyMigrations() // on applique les migrations
    {
        $this->createMigrationsTable(); // on crée la table des migrations
        $appliedMigrations = $this->getAppliedMigrations(); // on récupère les migrations appliquées

        $newMigrations = []; // on crée un tableau vide pour les migrations à appliquer
        $files = scandir(Application::$ROOT_DIR . '/migrations'); // on récupère les fichiers dans le dossier migrations
        $toApplyMigrations = array_diff($files, $appliedMigrations); // on récupère les migrations qui n'ont pas été appliquées
        foreach ($toApplyMigrations as $migration) { // on applique les migrations qui n'ont pas été appliquées

            if ($migration === '.' || $migration === '..') { // si c'est un fichier . ou .., on continue
                continue; // on continue
            }  

            require_once Application::$ROOT_DIR . '/migrations/' . $migration; // on inclut le fichier de migration
            $className = pathinfo($migration, PATHINFO_FILENAME); // on récupère le nom de la classe
            $instance = new $className(); // on crée une instance de la classe
            $this->log("Applying migration $migration"); // on log la migration
            $instance->up(); // on applique la migration
            $this->log("Applied migration $migration"); // on log la migration
            $newMigrations[] = $migration; // on ajoute la migration à la liste des migrations à appliquer
        }

        if (!empty($newMigrations)) { // si on a des migrations à appliquer
            $this->saveMigrations($newMigrations); // on sauvegarde les migrations
        } else { // sinon
            $this->log("There are no migrations to apply"); // on log qu'il n'y a pas de migrations à appliquer
        }
    }

    protected function createMigrationsTable() // on crée la table des migrations
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;");
    }

    protected function getAppliedMigrations() // on récupère les migrations appliquées
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations"); // on prepare la requête
        $statement->execute(); // on execute la requête

        return $statement->fetchAll(\PDO::FETCH_COLUMN); // on récupère les migrations appliquées
    }

    protected function saveMigrations(array $newMigrations)     // on sauvegarde les migrations
    {
        $str = implode(',', array_map(fn ($m) => "('$m')", $newMigrations)); // on crée la chaine des migrations à sauvegarder
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES  
            $str
        ");  // pour chaque migration, on insère dans la table des migrations

        $statement->execute();
    }

    public function prepare($sql): \PDOStatement
    {
        return $this->pdo->prepare($sql);
    }

    private function log($message) 
    {
        echo "[" . date("Y-m-d H:i:s") . "] - " . $message . PHP_EOL; // on log le message avec la date
    }
}
