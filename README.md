# 📡 Klantdienst Uptime Rapportage (via LibreNMS)

Een PHP/CodeIgniter-applicatie die real-time inzicht biedt in de beschikbaarheid van klantdiensten op basis van netwerkdata uit LibreNMS. De tool corrigeert voor de beperkingen van klassiek device-based monitoring door netwerkpad-complexiteit en -afhankelijkheden te analyseren.

---

## 🔍 Doel

Het doel is om per klant inzichtelijk te maken:
- Welke diensten geleverd worden
- Wat de daadwerkelijke uptime is geweest
- Welke netwerkcomponenten daarin een rol spelen
- Wanneer een storing impact had op de dienst van de klant, ook als het klantapparaat zelf ‘up’ bleef

---

## 🚀 Features

- 🔌 Koppeling met LibreNMS via API (token-based)
- 🧠 Interpretatielaag voor netwerkpaden en klantdienstbeschikbaarheid
- 📊 Live dashboard met:
  - KPI-widgets (uptime, downtime, aantal incidents)
  - Trendgrafieken (line/bar)
  - Tabel met exportfunctie (CSV)
- 🧑‍🤝‍🧑 Gebruikersrollen:
  - **Beheer:** volledig beheer
  - **Accountmanager:** alleen klantdata
  - **Klant:** eigen dienstdata
- 🛠️ Logging & statuspagina voor debugging
- 📉 Prestatievriendelijke, continue polling van LibreNMS API met throttling
- 📦 Klaar voor uitbreiding met meldingen of alternatieve NMS’en

---

## 🧰 Stack

| Component     | Inzet                                                   |
|---------------|----------------------------------------------------------|
| PHP           | Backend-logica                                          |
| CodeIgniter   | MVC-structuur en routing                                |
| MySQL         | Opslag klant-, pad- en eventdata                        |
| Bootstrap     | Front-end layout en grafische componenten               |
| LibreNMS API  | Databron voor netwerkstatus                             |

---

## 🔐 Authenticatie

Gebruik een API-token uit LibreNMS met voldoende rechten. Plaats deze in de `.env`-file:

```env
LIBRENMS_API_TOKEN=xxxxxxxxxxxxxxxxxxxxxxxx
LIBRENMS_API_URL=https://librenms.jouwdomein.nl/api/v0
```


## 📋 Functionaliteiten en Taken

Hieronder staan 10 mogelijke functionaliteiten voor de CodeIgniter-applicatie, elk met 10 subfunctionaliteiten. Daarna volgen 10 taken met elk 10 subtaken om deze functionaliteiten stapsgewijs te realiseren.

---

## 1. Gebruikersauthenticatie en -beheer
1. Gebruikerregistratie met rollen (Beheer, Accountmanager, Klant)
2. Inloggen/uitloggen
3. Wachtwoord reset via e-mail
   - Formulier voor vergeten wachtwoord op `/forgot-password`
   - Resetlink per e-mail met tijdelijk token
4. Tweestapsverificatie
5. Rolgebaseerde toegangscontrole (per controller/methode)
6. Gebruikersprofielen met bewerk-/bekijkrechten
7. Logboek van inlogpogingen
8. Deactivatie/ban-functionaliteit
9. Bulkimport van gebruikers
10. API-endpoints voor gebruikersbeheer

## 2. Dashboards per rol
1. Overzicht van klantdiensten (Accountmanager/Klant)
2. KPI-widgets: uptime, downtime, incidenten
3. Trendgrafieken (dag/week/maand)
4. Aanpasbare widgets per gebruiker
5. Automatische verversing (AJAX/polling)
6. Exporteerfunctie (CSV/PDF)
7. Foutmeldingen/statusbalk
8. Toegankelijke weergave voor mobiel
9. Favorieten of snelkoppelingen per rol
10. Koppeling naar detailpagina’s per dienst

## 3. Service- en padmanagement
1. CRUD-schermen voor klantdiensten
2. Koppeling tussen diensten en netwerkpaden
3. Automatische paddetectie via LibreNMS API
4. Handmatig paden toevoegen/bewerken
5. Validatie van padconsistentie
6. Visuele weergave van paden (diagram)
7. Impactanalyse bij wijzigingen
8. Historische weergave van wijzigingen
9. Rollenbeheer voor wijzigingen (bevestigen/goedkeuren)
10. Rapportage over padwijzigingen

## 4. Incidentregistratie en -analyse
1. Registreren van storingen (manueel of automatisch)
2. Link met bijbehorende service- en padinformatie
3. Prioriteitsniveaus toekennen
4. Statussen: open, in onderzoek, opgelost
5. Notificatiemail bij nieuwe incidenten
6. Tijdlijn of log van incident-updates
7. Dashboard met open incidenten per klant
8. Metrics: MTTR, incidentfrequentie
9. Export van incidentgeschiedenis
10. Integratie met externe ticketingsystemen

## 5. API-integratie met LibreNMS
1. Beveiligde tokenopslag in `.env`
2. Automatisch ophalen van device- en padinformatie
3. Polling met rate limiting
4. Foutafhandeling en retry-mechanisme
5. Caching van resultaten
6. Endpoint om netwerkpaden op te vragen
7. Endpoint om services te synchroniseren
8. Periodieke synchronisatie (cronjob)
9. Logging van API-verzoeken
10. Documentatie van API-endpoints

## 6. Rapportage- en exportfuncties
1. Periodieke uitdraai van uptime per dienst
2. Grafische weergave van trends
3. Filters per klant, periode, type dienst
4. Export naar CSV en PDF
5. Mogelijkheid tot e-mailrapportage
6. Archivering van oude rapporten
7. Automatische rapportplanning
8. Templates voor verschillende rapporttypen
9. Toegang via gebruikersrollen
10. Integratie met externe BI-tooling

## 7. Notificatiesysteem
1. Alert via e-mail/SMS bij downtime
2. Webhooks voor externe systemen
3. Instelbare drempelwaardes (bijv. uptime < 99%)
4. Samengestelde meldingen per klant
5. Opt-in/opt-out opties per gebruiker
6. Log van verzonden notificaties
7. UI om meldingen aan/uit te zetten
8. Integratie met messaging-apps (bijv. Slack)
9. Prioritering van notificaties
10. Herinneringsmeldingen bij openstaande incidenten

## 8. Logging en monitoring
1. Inzichtelijke logbestanden (CodeIgniter logging)
2. Dashboard voor recente logs
3. Foutmeldingen met stack trace
4. Performance monitoring (runtime, SQL-queries)
5. Alerts bij verhoogde foutpercentages
6. Integratie met externe logdiensten (bijv. Logstash)
7. Handmatige debugmodus
8. Rotatie en compressie van logbestanden
9. Filtering op logniveau (info, warning, error)
10. Widget voor ‘systeemstatus’ in dashboard

## 9. Beheer van klantcontracten
1. CRUD van contracten (looptijd, SLA)
2. Koppeling met services en klanten
3. Automatische waarschuwing bij afloop
4. Dashboard met contractstatus
5. Documentmanagement (contractuploads)
6. Contractgeschiedenis en versies
7. Berichtgeving aan accountmanagers
8. Facturatie-interface (export)
9. Rolgebaseerde toegang (alleen Beheer)
10. Audittrail van contractwijzigingen

## 10. Multi-NMS ondersteuning
1. Abstractielaag voor diverse NMS’en
2. Configuratie per klant of dienst
3. Interface om NMS-accounts toe te voegen
4. Mapping van paden en services per NMS
5. Fallback bij onbeschikbare primaire NMS
6. Uniforme datastructuur voor monitoringresultaten
7. Rapportage met NMS-scheiding
8. UI voor beheer van NMS-verbindingen
9. Metriek per NMS (responstijd, uitval)
10. Mogelijkheid tot uitbreiding met nieuwe NMS’en

---

### Taken en Subtaken

Hierbij 10 overkoepelende taken met per taak 10 subtaken om bovenstaande functionaliteiten te implementeren. De taken volgen grotendeels de MVC-structuur van CodeIgniter en houden rekening met beveiliging, performantie en documentatie.

#### Taak 1: Gebruikersauthenticatie inrichten
1. Tabellen voor gebruikers en rollen opzetten (migration)
2. Model `UserModel` schrijven met CRUD-methoden
3. Registratieformulier (View) en validatie
4. Logincontroller implementeren
5. Sessionbeheer en CSRF-bescherming toevoegen
6. Wachtwoord reset via mail (token-opslag)
7. Rolgebaseerde middleware toevoegen
8. Tweestapsverificatie (Time-based OTP)
9. Logboekmodel voor inlogpogingen
10. Unit tests voor login/registratie (indien testframework aanwezig)

#### Taak 2: Dashboard ontwikkelen
1. Basislayout met Bootstrap opzetten
2. Rolgebaseerde weergave van widgets
3. KPI-widgetcomponent maken
4. Trendgrafiekcontroller + Chart.js integreren
5. Tabelweergave met exportknop
6. AJAX-endpoints voor live updates
7. Permissies per widget configureren
8. Mobielvriendelijke layout testen
9. Instellingenpagina voor widgets
10. Documentatie van dashboardfunctionaliteit

#### Taak 3: Service- en padbeheer
1. Migrations voor services en paden
2. `ServiceModel` en `PathModel` aanmaken
3. CRUD-controllers voor services
4. Formulieren met validatie voor paden
5. API-koppeling om paden automatisch op te halen
6. Visuele padweergave met diagram-library
7. Historie van wijzigingen loggen
8. Rolgebaseerde goedkeuring van wijzigingen
9. Beveiligde verwijderfunctionaliteit
10. Tests voor modelrelaties

#### Taak 4: Incidentregistratie
1. Incidenttabellen aanmaken (migration)
2. `IncidentModel` met statuslog
3. Formulieren voor incidentmelding
4. Link incidenten aan services en paden
5. Prioriteitenveld toevoegen
6. E-mailmelding bij nieuw incident
7. Rapportagepagina voor open incidenten
8. Kennismaking met integratie ticketingsysteem
9. Metrics dashboard: MTTR, incidentaantallen
10. Export/archivering van incidentdata

#### Taak 5: LibreNMS API-integratie
1. Configuratie voor API-token in `.env`
2. Service voor HTTP-verzoeken met Guzzle
3. Pollingscript via cronjob
4. Caching (bijv. Redis) van responses
5. Errorhandling en retry-logic
6. Endpoints om paden/services te synchroniseren
7. Throttling instellen (rate limiting)
8. Logging van alle API-calls
9. Tests voor de API-service
10. Handleiding voor API-gebruik

#### Taak 6: Rapportagesysteem
1. Opzet van rapportagetabellen
2. `ReportModel` en controllers
3. View templates voor rapporten
4. CSV- en PDF-export (bijv. via dompdf)
5. Periodieke generatiescripts
6. Instelbare filters (datum, klant)
7. E-mailmodule voor automatische rapporten
8. Archiveringsmechanisme voor oude rapporten
9. Toestemmingscontroles
10. Documentatie + voorbeeldrapport

#### Taak 7: Notificatiesysteem implementeren
1. Keuze van notificatiemechanismen (mail, SMS, webhook)
2. Configuratie van berichtenkanalen
3. Triggerlogica koppelen aan incidenten
4. Drempelwaardes instelbaar maken
5. Opt-in/opt-out opslaan per gebruiker
6. Dashboard voor notificatie-instellingen
7. Log van verzonden notificaties
8. Verzendqueue implementeren (bijv. via Redis)
9. Integratie Slack/webhook
10. Unit tests voor triggers

#### Taak 8: Logging en monitoring
1. Configuratie van CodeIgniter-logging
2. Logviewcontroller voor systeembeheer
3. Foutmeldingen naar logbestanden sturen
4. Queryprofiling voor prestatieanalyse
5. Externe logopslag (optioneel)
6. Rotatie/retentie instellen
7. Debugmodus met uitgebreide details
8. Alert bij uitzonderingen (bijv. email)
9. Dashboardwidget voor recente fouten
10. Documentatie van logformat

#### Taak 9: Klantcontractbeheer
1. Contracttabellen aanmaken
2. Formulieren voor nieuwe contracten
3. Koppeling naar services en klanten
4. Notificatie bij naderende afloop
5. Overzichtspagina per contract
6. Uploadmogelijkheid voor contractdocumenten
7. Historisch log van wijzigingen
8. Rapportage van contractstatus
9. Autorisatie alleen voor Beheer
10. Validatie van contractvelden

#### Taak 10: Multi-NMS ondersteuning
1. Architectuur voor abstractielaag definiëren
2. Model voor NMS-accounts
3. CRUD-schermen voor NMS-configuraties
4. Mapping tussen NMS-data en interne modellen
5. Errorhandling wanneer primaire NMS faalt
6. Testen van meerdere NMS gelijktijdig
7. Aanpassen API-service voor verschillend base-URL
8. Distincte datasets per NMS rapporteren
9. UI voor selectie van NMS per klant
10. Documenteren hoe nieuwe NMS-integratie toe te voegen
