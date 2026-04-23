CREATE DATABASE IF NOT EXISTS auth_system
USE auth_system

CREATE TABLE IF NOT EXISTS 'quizzes'(
    id INT NOT NULL,
    title VARCHAR(20) NOT NULL;
)

CREATE TABLE IF NOT EXISTS 'questions'(
    quiz_id INT NOT NULL,
    question VARCHAR(255) NOT NULL,
    a VARCHAR(255) NOT NULL,
    b VARCHAR(255) NOT NULL,
    c VARCHAR(255) NOT NULL,
    d VARCHAR(255) NOT NULL,
    answer VARCHAR(255) NOT NULL;
)


INSERT INTO quizzes (id, title) VALUES
(1, 'SPORT'),
(2, 'MUSIC'),
(3, 'FOOD'),
(4, 'MATH'),
(5, 'CARS');

INSERT INTO questions (quiz_id, question, a, b, c, d, answer) VALUES

-- SPORT
(1, 'Kāds ir Kanādas nacionālais ziemas sporta veids?', 'Basketbols', 'Hokejs', 'Beisbols', 'Regbijs', 'b'),
(1, 'Cik spēlētāju vienlaikus ir futbola komandā laukumā?', '9', '10', '11', '12', 'c'),
(1, 'Kurā valstī radās basketbols?', 'Kanāda', 'ASV', 'Austrālija', 'Vācija', 'b'),
(1, 'Kā sauc olimpiskās spēles aukstajos apstākļos?', 'Vasaras spēles', 'Ziemas spēles', 'Eiropas spēles', 'Pasaules spēles', 'b'),
(1, 'Cik kilometrus gara ir maratona distance?', '40 km', '41 km', '42.195 km', '45 km', 'c'),
(1, 'Kurš ir viens no visu laiku ātrākajiem sprinteriem?', 'Useins Bolts', 'Krištianu Ronaldu', 'Maikls Felpss', 'Lebrons Džeimss', 'a'),
(1, 'Kā sauc tenisa turnīru Londonā?', 'US Open', 'Roland Garros', 'Wimbledon', 'Australian Open', 'c'),
(1, 'Cik riņķu ir olimpiskajā simbolā?', '4', '5', '6', '7', 'b'),
(1, 'Kā sauc sportu uz ledus ar ripu?', 'Florbols', 'Hokejs', 'Lakross', 'Polo', 'b'),
(1, 'Kur notika 2016. gada olimpiskās spēles?', 'Tokija', 'Londona', 'Riodežaneiro', 'Parīze', 'c'),
(1, 'Sporta veids ar 7 spēlētājiem un met bumbu vārtos?', 'Volejbols', 'Handbols', 'Ūdenspolo', 'Regbijs', 'b'),
(1, 'Cik punktus dod metiens aiz trīspunktu līnijas?', '2', '3', '4', '1', 'b'),
(1, 'Slavens velobrauciens Francijā?', 'Giro', 'Tour de France', 'Vuelta', 'Paris–Roubaix', 'b'),
(1, 'Kur lieto terminu hole-in-one?', 'Teniss', 'Golfs', 'Beisbols', 'Krikets', 'b'),
(1, 'Japāņu smagsvaru cīņas sports?', 'Karatē', 'Džudo', 'Sumo', 'Kendo', 'c'),

-- MUSIC
(2, 'Cik pamata notis ir gammā?', '5', '6', '7', '8', 'c'),
(2, 'Kurš ir taustiņinstruments?', 'Bungas', 'Klavieres', 'Vijole', 'Flauta', 'b'),
(2, 'Kas vada orķestri?', 'Solists', 'Diriģents', 'Komponists', 'DJ', 'b'),
(2, 'Kur radās regejs?', 'Brazīlija', 'Jamaika', 'ASV', 'Kuba', 'b'),
(2, 'Lielākais stīgu instruments?', 'Vijole', 'Čells', 'Kontrabass', 'Arfa', 'c'),
(2, 'Ļoti ātrs reps?', 'Trap', 'Drill', 'Speed rap', 'Pop rap', 'c'),
(2, 'Ko izmanto DJ?', 'Klavieres', 'Mikseri', 'Bungas', 'Flautas', 'b'),
(2, 'Kā sauc dziesmas vārdus?', 'Ritms', 'Teksts', 'Akords', 'Tons', 'b'),
(2, 'Kur radās flamenko?', 'Itālija', 'Spānija', 'Grieķija', 'Portugāle', 'b'),
(2, 'Mocarta vārds?', 'Ludvigs', 'Johans', 'Volfgangs', 'Frīdrihs', 'c'),
(2, 'Ko nozīmē allegro?', 'Lēni', 'Skaļi', 'Ātri', 'Klusi', 'c'),
(2, 'Ģitāra bez elektrības?', 'Basģitāra', 'Elektriskā', 'Akustiskā', 'Sintizators', 'c'),
(2, 'Kas ir albums?', 'Viena dziesma', 'Dziesmu kolekcija', 'Instruments', 'Koncerts', 'b'),
(2, 'Balss starp soprānu un basu?', 'Tenors', 'Alts', 'Baritons', 'Mezzo', 'c'),
(2, 'Latviešu dziesmu svētki?', 'Mūzikas diena', 'Dziesmu un deju svētki', 'Kultūras svētki', 'Tautas diena', 'b'),

-- FOOD
(3, 'No kā gatavo suši?', 'Maize', 'Rīsi', 'Kartupelis', 'Siers', 'b'),
(3, 'Kur radās pica?', 'Francija', 'Itālija', 'Spānija', 'Grieķija', 'b'),
(3, 'Deserts no olu baltumiem?', 'Krēms', 'Bezē', 'Pudiņš', 'Kūka', 'b'),
(3, 'Guakamoles sastāvdaļa?', 'Tomāts', 'Avokado', 'Gurķis', 'Pipars', 'b'),
(3, 'Japāņu nūdeļu zupa?', 'Suši', 'Ramen', 'Tempura', 'Miso', 'b'),
(3, 'No kā gatavo sieru?', 'Ūdens', 'Piens', 'Olas', 'Milti', 'b'),
(3, 'Makaroni ar gaļu un tomātiem?', 'Carbonara', 'Bolognese', 'Alfredo', 'Lasagna', 'b'),
(3, 'Kas ir tofu?', 'Gaļa', 'Soja', 'Siers', 'Graudi', 'b'),
(3, 'No kā gatavo kafiju?', 'Lapas', 'Pupas', 'Saknes', 'Ziedi', 'b'),
(3, 'Banāns ir?', 'Dārzenis', 'Oga', 'Rieksts', 'Grauds', 'b'),
(3, 'Asa čili mērce?', 'Kečups', 'Salsa', 'Čili mērce', 'Majonēze', 'c'),
(3, 'Omletes sastāvdaļa?', 'Piens', 'Olas', 'Milti', 'Cukurs', 'b'),
(3, 'Saldējuma deserts?', 'Sundae', 'Pica', 'Zupa', 'Pasta', 'a'),
(3, 'Kur radās tacos?', 'Spānija', 'Meksika', 'Brazīlija', 'Peru', 'b'),
(3, 'Indiešu maize?', 'Tortilla', 'Naan', 'Pita', 'Lavašs', 'b'),

-- MATH
(4, 'Cik ir 7x8?', '54', '56', '58', '64', 'b'),
(4, 'Kvadrātsakne no 64?', '6', '7', '8', '9', 'c'),
(4, 'Taisns leņķis?', '45', '90', '180', '360', 'b'),
(4, 'Vienādu malu trijstūris?', 'Vienādsānu', 'Vienādmalu', 'Taisnleņķa', 'Dažādmalu', 'b'),
(4, '100/4?', '20', '25', '30', '40', 'b'),
(4, 'Pi vērtība?', '2.14', '3.14', '4.13', '3.41', 'b'),
(4, 'Sekundes stundā?', '600', '3600', '1000', '60', 'b'),
(4, 'Skaitļi kas dalās ar 1 un sevi?', 'Pāra', 'Nepāra', 'Pirmskaitļi', 'Daļskaitļi', 'c'),
(4, '9^2?', '18', '27', '81', '72', 'c'),
(4, 'Kas lielāks?', '1/3', '1/2', 'Vienādi', 'Neviens', 'b'),
(4, 'Sešstūrim malas?', '5', '6', '7', '8', 'b'),
(4, '15% no 100?', '10', '15', '20', '25', 'b'),
(4, 'Taisnstūra laukums?', 'a+b', 'a*b', 'a/b', '2a', 'b'),
(4, '0/5?', '5', '0', '1', 'Nav', 'b'),
(4, 'Diagramma ar stabiņiem?', 'Līniju', 'Stabiņu', 'Riņķa', 'Tabula', 'b'),

-- CARS
(5, 'Kas ražo Corolla?', 'Ford', 'Toyota', 'BMW', 'Audi', 'b'),
(5, 'BMW nozīme?', 'British Motor Works', 'Bavarian Motor Works', 'Berlin Motor World', 'Best Motor Wheels', 'b'),
(5, 'Ferrari valsts?', 'Vācija', 'Itālija', 'Francija', 'Spānija', 'b'),
(5, 'Dīzeļauto degviela?', 'Benzīns', 'Dīzelis', 'Gāze', 'Elektrība', 'b'),
(5, 'Auto tikai ar elektrību?', 'Hibrīds', 'Dīzelis', 'Elektroauto', 'Benzīns', 'c'),
(5, 'Ātruma rādītājs?', 'Tahometrs', 'Spidometrs', 'Termometrs', 'Barometrs', 'b'),
(5, 'Kur radās Volkswagen?', 'Itālija', 'Japāna', 'Vācija', 'ASV', 'c'),
(5, 'SUV nozīme?', 'Small Urban', 'Sport Utility Vehicle', 'Super Unique', 'Speed Van', 'b'),
(5, 'Ziemas riepas?', 'Vasaras', 'Universālās', 'Ziemas', 'Sporta', 'c'),
(5, 'Kas ražo Mustang?', 'Chevrolet', 'Ford', 'Dodge', 'Tesla', 'b'),
(5, 'Priekšējā gaisma?', 'Miglas', 'Priekšējais lukturis', 'Bremžu', 'Salona', 'b'),
(5, 'Ko dara bremzes?', 'Paātrina', 'Palēnina', 'Stūrē', 'Dzesē', 'b'),
(5, 'Benzīna motors?', 'Elektriskais', 'Dīzeļ', 'Benzīna', 'Hibrīds', 'c'),
(5, 'Elektroauto uzņēmums?', 'Toyota', 'Tesla', 'Honda', 'Kia', 'b'),
(5, 'Auto vadīšanas dokuments?', 'Pase', 'Licence', 'Vadītāja apliecība', 'Apdrošināšana', 'c');