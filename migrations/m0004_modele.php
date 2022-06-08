<?php

/**
 * User: Abdessamad
 * Date: 7/10/2020
 * Time: 8:07 AM
 */

class m0004_modele
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "CREATE TABLE modele (
                modele_id INT AUTO_INCREMENT PRIMARY KEY,
                modele VARCHAR(255) NOT NULL,
                fk_specialite INT ,
                FOREIGN KEY (fk_specialite) 
                REFERENCES specialite(specialite_id) 
                ON DELETE CASCADE
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE modele;";
        $db->pdo->exec($SQL);
    }
}