-- 
-- Script de Gestion des droits d'accès des utilisateurs à une BD 
--

--
-- RQ.1
--

-- CREATE USER 'webLRT-David'@'%' IDENTIFIED BY 'LRT-Leo@2025';
CREATE USER 'tpsecu_lire'@'localhost' IDENTIFIED BY 'lire';
CREATE USER 'tpsecu_admin'@'localhost' IDENTIFIED BY 'admin';
	-- l'hôte : permet de spécifier depuis quel hôte / réseau cet utilisateur pourra effectivement se connecter :
		-- 'localhost' ou '127.0.0.1' : connexion directe depuis le même hôte ;
		-- 'ad_IP' : connexion permisse uniquement depuis l'hôte identifié par l'adresse IP ;
		-- 'ad_Réseau.%' (ex:  '192.168.1.%') : connexion permisse depuis n'importe quel hôte du réseau spécifié;
		-- '%' : connexion permisse depuis n'importe quel hôte de n'importe quel réseau ;

--
-- RQ.2
--
-- GRANT  CREATE, SELECT, UPDATE, INSERT, DELETE ON LRT_David.% TO 'webLRT-David'@'%';
GRANT SELECT ON ld_websecu1.* TO 'tpsecu_lire'@'localhost';
GRANT CREATE, SELECT, UPDATE, INSERT, DELETE ON ld_websecu1.* TO 'tpsecu_admin'@'localhost';

	-- type_Permission : 
		-- SELECT : permet d'utiliser la commande SQL SELECT pour lire des BD ;
		-- UPDATE : permet de mettre à jour des données d'une table ;
		-- INSERT : permet d'insérer de nouveaux enregistrements dans une table ;
		-- DELETE : permet de supprimer des enregistrements d'une table.
		
	-- nomTable : si on souhaite donner accès à toutes les tables d'une même base de données,
		-- on peut remplacer le nom de la table par un astérisque *
