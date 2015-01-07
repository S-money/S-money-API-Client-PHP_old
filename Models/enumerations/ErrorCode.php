<?php

class ErrorCode{

	protected static $payment_errors = array(
		1 => 'Le commerçant doit contacter la banque du porteur',
		2 => 'Paiement refusé',
		3 => 'Paiement annulé par le client',
		4 => 'Porteur non enrôlé 3D-Secure',
		5 => 'Erreur authentification 3D-Secure',
		6 => 'Erreur technique SystemPay'
	);

	protected static $bank_auth_messages = array(
		0  => "Transaction approuvée ou traitée avec succès",
		2  => "Contacter l'émetteur de carte",
		3  => "Accepteur invalide",
		4  => "Conserver la carte",
		5  => "Ne pas honorer",
		7  => "Conserver la carte, conditions spéciales",
		8  => "Approuver après identification",
		12 => "Transaction invalide",
		13 => "Montant invalide",
		14 => "Numéro de porteur invalide",
		15 => "Emetteur de carte inconnu",
		17 => "Annulation client",
		19 => "Répéter la transaction ultérieurement",
		20 => "Réponse erronée (erreur dans le domaine serveur)",
		24 => "Mise à jour de fichier non supportée",
		25 => "Impossible de localiser l'enregistrement dans le fichier",
		26 => "Enregistrement dupliqué, ancien enregistrement remplacé",
		27 => "Erreur en «edit» sur champ de lise à jour fichier",
		28 => "Accès interdit au fichier",
		29 => "Mise à jour impossible",
		30 => "Erreur de format",
		31 => "Identifiant de l'organisme acquéreur inconnu",
		33 => "Date de validité de la carte dépassée",
		34 => "Suspicion de fraude",
		38 => "Date de validité de la carte dépassée",
		41 => "Carte perdue",
		43 => "Carte volée",
		51 => "Provision insuffisante ou crédit dépassé",
		54 => "Date de validité de la carte dépassée",
		55 => "Code confidentiel erroné",
		56 => "Carte absente du fichier",
		57 => "Transaction non permise à ce porteur",
		58 => "Transaction interdite au terminal",
		59 => "Suspicion de fraude",
		60 => "L'accepteur de carte doit contacter l'acquéreur",
		61 => "Montant de retrait hors limite",
		63 => "Règles de sécurité non respectées",
		68 => "Réponse non parvenue ou reçue trop tard",
		75 => "Nombre d'essais code confidentiel dépassé",
		76 => "Porteur déjà en opposition, ancien enregistrement conservé",
		90 => "Arrêt momentané du système",
		91 => "Émetteur de cartes inaccessible",
		94 => "Transaction dupliquée",
		96 => "Mauvais fonctionnement du système",
		97 => "Échéance de la temporisation de surveillance globale",
		98 => "Serveur indisponible routage réseau demandé à nouveau",
		99 => "Incident domaine initiateur"
	);


	public static function getBankErrorMessage($errorCode)
	{
		if(isset(self::$bank_auth_messages[$errorCode])) {
			return self::$bank_auth_messages[$errorCode];
		}
		return false;
	}

	public static function getPaymentErrorMessage($errorCode)
	{
		if(isset(self::$payment_errors[$errorCode])) {
			return self::$payment_errors[$errorCode];
		}
		return false;
	}


}