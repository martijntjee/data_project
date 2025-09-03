# VacatureWebsite (Laravel Backend Project)

## 📌 Projectomschrijving

Dit project is een vacatureplatform gebouwd met **Laravel** als backend. Het doel is om vacatures vanuit een CSV-bestand in te laden en deze te koppelen aan profielen met **harde** en **zachte skills**. Door middel van een flexibele profieltabel en koppeltabellen kunnen werkgevers eenvoudig vacatures aanmaken en kandidaten koppelen aan een profiel dat aansluit bij de gevraagde vaardigheden.

De applicatie dient als **portfolio-project** en toont vaardigheden in:

* Relationale databases ontwerpen en gebruiken
* CSV-data importeren en normaliseren
* Backend logica ontwikkelen met Laravel
* CRUD-functionaliteiten implementeren
* Documentatie en planning (agile/scrum)

---

## 🚀 Features

* Vacatures inladen via CSV-bestand
* CRUD-functionaliteit voor vacatures
* CRUD-functionaliteit voor profielen
* CRUD-functionaliteit voor harde en zachte skills
* Mogelijkheid voor vacaturemakers om **nieuwe skills** toe te voegen
* Profieltabel die meerdere skills kan bevatten (veel-op-veel-relatie)
* Zoeken en filteren van vacatures op basis van profiel
* Relaties via koppeltabellen (`profiel_soft` en `profiel_hard`)

---

## 🗄️ Database ontwerp

### Tabellen

1. **vacatures**

   * id (PK)
   * titel
   * beschrijving
   * profiel\_id (FK → profielen.id)

2. **profielen**

   * id (PK)
   * naam (optioneel, voor herkenbaarheid)

3. **softskills**

   * id (PK)
   * naam (UNIQUE)

4. **hardskills**

   * id (PK)
   * naam (UNIQUE)

5. **profiel\_soft** (koppeltabel)

   * id (PK)
   * profiel\_id (FK → profielen.id)
   * softskill\_id (FK → softskills.id)

6. **profiel\_hard** (koppeltabel)

   * id (PK)
   * profiel\_id (FK → profielen.id)
   * hardskill\_id (FK → hardskills.id)

### Relaties

* **Vacature ↔ Profiel**: veel-op-1 (een vacature hoort bij 1 profiel, maar een profiel kan bij meerdere vacatures horen)
* **Profiel ↔ Hardskills**: veel-op-veel via `profiel_hard`
* **Profiel ↔ Softskills**: veel-op-veel via `profiel_soft`

---

## 👥 User Stories

### Vacaturemakers

* Als vacaturemaker wil ik vacatures kunnen aanmaken zodat ik deze zichtbaar kan maken voor kandidaten.
* Als vacaturemaker wil ik bestaande vacatures kunnen bewerken zodat ik fouten kan corrigeren of de inhoud kan aanpassen.
* Als vacaturemaker wil ik vacatures kunnen verwijderen zodat ik oude of irrelevante vacatures kan verwijderen.
* Als vacaturemaker wil ik nieuwe softskills en hardskills kunnen toevoegen zodat ik altijd actuele vaardigheden kan meenemen.

### Beheerders

* Als beheerder wil ik alle profielen kunnen bekijken zodat ik overzicht heb van welke profielen gekoppeld zijn aan vacatures.
* Als beheerder wil ik profielen kunnen bewerken zodat ik skills kan updaten of corrigeren.
* Als beheerder wil ik skills kunnen beheren (CRUD) zodat de database schoon en up-to-date blijft.

### Kandidaten (optioneel, uitbreidbare functionaliteit)

* Als kandidaat wil ik vacatures kunnen zoeken op basis van mijn vaardigheden zodat ik relevante vacatures vind.
* Als kandidaat wil ik profielen kunnen vergelijken zodat ik kan zien welke vaardigheden in trek zijn.

---

## 📋 Backlog

### Must-haves (MVP)

* CSV-import voor vacatures
* Database met profielen, vacatures, hardskills, softskills
* CRUD voor vacatures
* CRUD voor skills
* CRUD voor profielen

### Should-haves

* Zoeken/filteren van vacatures op basis van profiel
* Beheerpagina voor skills
* Validatie om dubbele skills te voorkomen

### Could-haves

* Kandidatenregistratie met eigen profiel
* Matchingsalgoritme om kandidaten automatisch te koppelen aan vacatures
* Dashboard met statistieken

### Won’t-have (voor nu)

* Frontend framework (focus ligt op Laravel backend)
* Geavanceerde AI/algoritmische matching

---

## 📅 Planning (Scrum Sprints)

### Sprint 1: Database & Setup

* Laravel project opzetten
* Migrations maken voor alle tabellen
* Seeder maken voor standaard skillslijst
* CSV-import functionaliteit opzetten

### Sprint 2: Vacaturebeheer

* CRUD-functionaliteit voor vacatures
* Relaties koppelen aan profielen
* Validatie en error handling

### Sprint 3: Profiel- en Skillsbeheer

* CRUD-functionaliteit voor skills
* CRUD-functionaliteit voor profielen
* Koppeltabellen implementeren (profiel\_soft, profiel\_hard)

### Sprint 4: Extra Functionaliteiten

* Zoeken/filteren op basis van profielen
* Admin panel voor skills en profielen
* Documentatie en testen

---

## 📊 Voortgangsbewaking

Voortgang wordt bijgehouden via GitHub Projects en Issues:

* **To Do**: nieuwe features en bugs
* **In Progress**: taken waar momenteel aan gewerkt wordt
* **Done**: afgeronde taken

Daarnaast wordt per sprint een korte retrospective toegevoegd in de wiki van het project om te reflecteren op wat goed ging en wat beter kan.

---

## ⚙️ Installatie en Gebruik

1. Clone de repository

```bash
git clone https://github.com/martijntjee/data_project.git
```

2. Installeer dependencies

```bash
composer install
npm install && npm run dev
```

3. Configureer `.env` bestand

```env
DB_DATABASE=vacaturedb
DB_USERNAME=root
DB_PASSWORD=
```

4. Run migrations en seeders

```bash
php artisan migrate --seed
```

5. Start de server

```bash
php artisan serve
```

---

## 📚 Documentatie

Alle documentatie (backlog, ERD, sprints, user stories) is beschikbaar in deze README en in de Prjects sectie van de GitHub-repo.
