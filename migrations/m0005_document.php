<?php

/**
 * User: Abdessamad
 * Date: 7/10/2020
 * Time: 8:07 AM
 */

class m0005_document
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "CREATE TABLE document (
                document_id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                prof VARCHAR(255) NOT NULL,
                ville VARCHAR(255) NOT NULL,
                etablissement VARCHAR(255) NOT NULL,
                semestre VARCHAR(255) NOT NULL,
                page VARCHAR(255) NOT NULL,
                type VARCHAR(255) NOT NULL,
                annees VARCHAR(255) NOT NULL,
                taille VARCHAR(255) NOT NULL,
                fk_modele INT,
                size INT,
                name VARCHAR(255) NOT NULL,
                tmp_name VARCHAR(255) NOT NULL,
                category VARCHAR(255) NOT NULL,
                fk_specialite INT,
                extension VARCHAR(255) NOT NULL,
                FOREIGN KEY (fk_modele) 
                    REFERENCES modele(modele_id) 
                    ON DELETE CASCADE,
                FOREIGN KEY (fk_specialite) 
                    REFERENCES specialite(specialite_id) 
                    ON DELETE CASCADE ,
                status TINYINT DEFAULT 0,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE document;";
        $db->pdo->exec($SQL);
    }
}
