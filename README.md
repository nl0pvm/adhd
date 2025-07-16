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
