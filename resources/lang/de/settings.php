<?php

return [
    'account'   => [
        'actions'           => [
            'social'            => 'Zu Kanka Login wechseln',
            'update_email'      => 'Email aktualisieren',
            'update_password'   => 'Passwort aktualisieren',
        ],
        'description'       => 'Deinen Account aktualisieren',
        'email'             => 'Email ändern',
        'email_success'     => 'Email aktualisiert.',
        'password'          => 'Passwort ändern',
        'password_success'  => 'Passwort aktualisiert.',
        'social'            => [
            'error'     => 'Du benutzt bereits das Kanka Login für dieses Konto.',
            'helper'    => 'Dein Konto ist momentan von :provider. Du kannst aufhören dieses zu benutzen und auf ein Standard Kanka Login wechseln, indem du ein Kennwort setzt.',
            'success'   => 'Dein Konto benutzt jetzt das Kanka Login.',
            'title'     => 'Social Konto',
        ],
        'title'             => 'Account',
    ],
    'api'       => [
        'description'           => 'Aktualisiere deine API Einstellungen',
        'experimental'          => 'Willkommen zur API von Kanka! Diese Features sind noch experimentell, aber sollten stabil genug sein, um mit API zu kommunizieren. Erstelle ein persönliches Access Token, welches in deinem API Request genutzt wird, oder nutze das Client Token wenn du möchtest, dass deine App Zugriff auf Nutzerdaten hat.',
        'help'                  => 'Kanka wird bald eine RESTful API zur Verfügung stellen, so dass Drittanbieter-Apps mit Kanka kommunizieren können. Details, wie du deine API Keys verwaltest, wirst du bald hier finden.',
        'link'                  => 'Lies die API Dokumentation',
        'request_permission'    => 'Wir bauen zurzeit eine mächtige RESTful API, so das Drittanbieter-Apps sich zu Kanka verbinden können. Allerdings limitieren wir aktuell noch die Anzahl der Nutzer, die die API nutzen können, solange wir noch daran arbeiten. Wenn du Zugriff auf die API haben möchtest und coole Apps bauen möchtest, die mit Kanka kommunizieren, bitte kontaktiere uns und wir senden dir die Informationen, die du brauchst.',
        'title'                 => 'API',
    ],
    'layout'    => [
        'description'   => 'Aktualisiere deine Layout Optionen',
        'success'       => 'Layout Optionen aktualisiert.',
        'title'         => 'Layout',
    ],
    'menu'      => [
        'account'           => 'Account',
        'api'               => 'API',
        'layout'            => 'Layout',
        'patreon'           => 'Patreon',
        'personal_settings' => 'Persönliche Einstellungen',
        'profile'           => 'Profil',
    ],
    'patreon'   => [
        'actions'       => [
            'link'  => 'Account verlinken',
            'view'  => 'Besuche Kanka auf Patreon',
        ],
        'benefits'      => 'Eure Unterstützung auf Patreon erlaubt es euch größere Bilder hochzuladen, hilft uns die Serverkosten zu begleichen und mehr Arbeitszeit in Kanka zu stecken.',
        'description'   => 'Synchronisierung mit Patreon',
        'errors'        => [
            'invalid_token' => 'Ungültiger Token! Patreon konnte die Anfrage nicht validieren.',
            'missing_code'  => 'Fehlender Code! Patreon hat keinen Code zurück geschickt, um deinen Account zu verifizieren.',
            'no_pledge'     => 'Kein Pledge! Patreon hat deinen Account verifiziert, aber konnte keinen aktiven Pledge feststellen.',
        ],
        'link'          => 'Benutze diesen Button, wenn du aktuell Kanka auf Patreon unterstützt. Das gibt dir Zugriff auf einige tolle Extras.',
        'linked'        => 'Danke, dass du Kanka auf Patreon unterstützt! Dein Account wurde verlinkt.',
        'pledge'        => 'Pledge :name',
        'success'       => 'Danke, dass du Kanka auf Patreon unterstützt.',
        'title'         => 'Patreon',
        'wrong_pledge'  => 'Euer Patreon Tier wird manuell von uns gesetzt. Daher kann es sein, dass es bis zu ein paar Tagen dauert bis es korrekt hinterlegt wird. Wenn es länger falsch ist, kontaktiert uns bitte.',
    ],
    'profile'   => [
        'actions'       => [
            'update_profile'    => 'Aktualisiere dein Profil',
        ],
        'avatar'        => 'Profilbild',
        'description'   => 'Aktualisiere dein Profil',
        'success'       => 'Profil aktualisiert.',
        'title'         => 'Persönliches Profil',
    ],
];
