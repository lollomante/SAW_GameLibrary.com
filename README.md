# Testo del progetto a.a. 2023/2024
Questo progetto vale per gli appelli di gennaio/febbraio/giugno/luglio/settembre 2024  e può essere svolto singolarmente oppure in gruppo (composto da 2 , max 3 studenti).

Ripetendo l'esperienza degli anni precendenti, anche quest'anno il progetto di SAW prevede la realizzazione del sito web a supporto di una nuova startup che in questo testo chiamerò genericamente startSAW. Ogni gruppo sceglierà il dominio applicativo di startSAW, sulla base delle preferenze dei membri del gruppo.

startSAW può pubblicizzare un prodotto (o un servizio) già esistente oppure un prodotto (o un servizio) nuovo, anche irrealistico (per es. un ristorante su un'isola esotica, un sistema per il teletrasporto, un villaggio turistico in un pianeta lontano, un'organizzazione che risolve il problema delle vaccinazioni, ecc.). Può essere la copia di un'applicazione web già esistente, purché implementi le funzionalità obbligatorie.

Le funzionalità obbligatorie sono le stesse per tutti e sono indicate con uno * e il titolo è colorato di rosso nel testo. Poi ogni studente dovrà scegliere e realizzare una funzionalità aggiuntiva.

## 1) Funzionalità obbligatorie per tutti

### Presentazione di startSAW *

Ogni sito web ha una parte pubblica di presentazione/comunicazione. Anche startSAW deve avere la sua "vetrina" per raccontarsi agli utenti (cosa facciamo, chi siamo, dove siamo, contatti, ecc.). La prima funzionalità obbligatoria per tutti richiede la realizzazione della "vetrina" di startSAW.

**Attenzione**. Non devi realizzare tutte le pagine pubbliche, puoi anche creare link verso pagine nelle quali compare il testo "under construction" .

### Registrazione di un utente *
Gli utenti devono registrarsi mediante un apposito modulo di registrazione (base) all'interno del quale devono inserire come campi obbligatori un indirizzo email (che li identifica in modo univoco), nome e cognome, una password ripetuta due volte. Lo scheletro HTML del modulo di registrazione (base) viene fornito per permettere il test automatico. Non modificare i nomi dei campi del form e il nome dello script PHP nell'attributo action perché altrimenti il test automatico fallisce.

Se hai fatto le esercitazioni dovresti aver già usato questa struttura, lo script deve chiamarsi registration.php. In realtà il file può anche avere un altro nome, purché ci sia sempre un file registration.php che include il file che si occupa della registrazione. Il test automatico cercherà sempre lo script registration.php e andrà ad eseguire l'include.

Agli utenti può essere associato un profilo utente che include per esempio la città di residenza, una breve auto-descrizione ("About me") e link alla pagina web personale e/o a pagine personali sui social media. Tutte le informazioni del profilo sono opzionali e possono essere richieste in un secondo momento, a registrazione avvenuta. Se è utile per il dominio applicativo scelto per startSAW, puoi anche chiedere all'utente di caricare una foto (attenzione, potresti avere problemi con i permessi della directory dove salvi i file delle immagini, che deve essere scrivibile dal web server). 

### Login al sistema *

Per l'accesso è necessario autenticarsi. Una volta autenticato, l'utente accede all'area riservata del sito all'interno della quale vedrà delle informazioni/link che dipendono dal suo profilo e da quanto realizzato per il progetto (si veda dopo). Lo scheletro  HTML del modulo di login viene fornito per permettere il test automatico. Non modificare i nomi dei campi del form e il nome dello script PHP nell'attributo action perché altrimenti il test automatico fallisce.

Se hai fatto le esercitazioni dovresti aver già usato questa struttura, lo script deve chiamarsi login.php. Come nel caso della registrazione, può avere un nome diverso ed essere incluso nel file login.php.

Visualizzazione del profilo utente *
Ogni utente deve poter visualizzare il proprio profilo per vedere quali sono le sue informazioni salvate nel database del sito. Il nome dello script che visualizza i dati del profilo deve chiamarsi show_profile.php.

### Modifica del profilo utente *

Ogni utente deve poter modificare il proprio profilo. Nel modulo di modifica del profilo i campi dovranno essere precompilati rispetto a quanto già presente nel database.
**ATTENZIONE**. L'impronta hash della password non deve essere  mai visualizzata nel form di modifica! Consiglio di tenere separata la modifica della password dalla modifica del profilo.

Nella modifica del profilo il test automatico controlla solo i campi obbligatori del modulo base (email, nome, cognome) ma non verifica i campi aggiunti per il profilo. Per i campi email, nome, cognome devi usare la stessa struttura del modulo fornito per la registrazione. Il nome dello script che modifica i dati nel database deve chiamarsi update_profile.php.


### Motore di ricerca interno *

Realizza un modulo di ricerca per trovare informazioni utili all'interno del sito di startSAW. Il tipo di ricerca è naturalmente correlato al dominio scelto per il progetto e puoi anche prevedere una ricerca "advanced" per trovare, per esempio, i post su un certo argomento, o i prodotti in vendita sotto una certa soglia di prezzo, o i messaggi scambiati tra gli utenti in piattaforma (ovviamente solo per gli utenti coinvolti nello scambio dei messaggi stessi).

**ATTENZIONE**. Per la ricerca è buona pratica usare l'operatore SQL LIKE


### Logout *

Gli utenti autenticati devono poter fare logout. Al logout si devono chiudere le sessioni ed è buona norma cancellare il cookie di sessione. Se implementi il cookie di "Remember Me", al logout devi cancellare anche questo.


## 2) Funzionalità a scelta
**ATTENZIONE**. Ogni studente deve scegliere e realizzare una funzionalità a scelta.


### Blog del sito

Per mantenere vivo il sito è possibile costruire un blog sul quale scrivere post che invogliano i visitatori a tornare sull'homepage di startSAW. Per scrivere il testo dei post puoi usare librerie JS che offrono editor di testo, per esempio  TinyMCE.

Spesso i post possono essere scritti solo da utenti con un ruolo particolare (per esempio admin oppure editor) mentre i commenti sono aperti a tutti gli utenti, magari passando prima da una fase di moderazione.


### Carrello per acquisti

Se startSAW vende dei prodotti, si può prevedere l'implementazione di un carrello per gli acquisti. Puoi prendere spunto da sistemi già esistenti, per esempio il carrello di Amazon. L'utente potrà aggiungere nuovi prodotti nel carrello e rimuoverne degli altri ma non è richiesta l'implementazione di un meccanismo di pagamento. Quando si procede all'acquisto, si svuota il carrello senza pagare. Sarebbe opportuno mantenere traccia della storia degli acquisti. Per l'implementazione del carrello puoi appoggiarti a tabelle sul database oppure alla Local Storage nel browser.


### Valutazione prodotti

Se startSAW vende dei prodotti, si può prevedere un meccanismo di feedback simile a quello che realizzano i sistemi di e-commerce, per esempio presentando delle stelline e chiedendo all'utente autenticato di valutare i suoi acquisti. Nella presentazione dei prodotti nel sito ad ogni prodotto potrà essere associata la sua valutazione media, calcolata a partire dalle valutazioni dei singoli utenti. 
Attenzione, la valutazione dovrebbe essere fatta solo dagli utenti autenticati che hanno già acquistato il prodotto che stanno valutando.

### Newsletter

Per fidelizzare gli iscritti al sito di startSAW è possibile realizzare una newsletter attraverso la quale si possono inviare messaggi a tutti gli utenti registrati. Per inviare messaggi si può realizzare una interfaccia per scrivere il testo e poi usare PHPMailer (occhio a non spammare...).

Anche in questo caso, di solito l'invio delle email tramite newsletter è riservato a utenti con un ruolo speciale.

Attenzione, PHPMailer è una libreria per l'invio della posta elettronica che abbiamo visto in classe, trovi maggiori informazioni online, per esempio in questo blog post.


### Sistema di crowdfunding

Se startSAW è una startup nelle sue fasi iniziali, potrebbe aver bisogno di finanziamenti da parte di soggetti esterni. Per questo motivo puoi provare ad inserire nel sito web un sistema simil-crowdfunding nel quale gli utenti possono fare delle donazioni per la realizzazione del progetto proposto da startSAW. Se le donazioni raggiungono/superano la soglia impostata, ok, altrimenti si rinuncia al progetto.


### Chat interna

Gli utenti registrati possono comunicare tra loro attraverso un sistema di messaggistica interna che permette di scrivere brevi messaggi in appositi campi testuali.

I messaggi devono essere salvati all'interno del database e non è richiesto l'invio di messaggi email di notifica. Pensa piuttosto ad una funzionalità per visualizzare tutti i messaggi ricevuti, quelli già letti e quelli ancora da leggere. Per la visualizzazione nel browser puoi scegliere di usare un layout con delle conversazioni tipo WhatsApp/Telegram, uno stile tipo thread in un forum, oppure altre visualizzazioni a tua scelta.


### Area amministrativa

Tutte le applicazioni web hanno un'area amministrativa cui possono accedere solo gli utenti con determinati privilegi (admin per esempio). Nell'area amministrativa si può gestire (quasi) tutto. Nel caso di startSAW se vuoi realizzare questa parte puoi prevedere funzioni di visualizzazione di tutti gli utenti del sistema, di tutti i prodotti (se ne esistono nel tuo sistema), di tutti i post se nel progetto è previsto un blog. Nel caso degli utenti, si potrebbero prevedere operazioni di cancellazione o ban (utenti il cui accesso viene bloccato senza però cancellarli dal database). Non è richiesta l'implementazione di un'area amministrativa completa, sarebbe troppo complesso. Sicuramente devono essere gestiti i ruoli degli utenti di startSAW. Un utente può essere un visitatore oppure un utente autenticato e tra gli utenti autenticati ci possono essere ruoli diversi.

## 3) Requisiti tecnici
Nel progetto devi cercare di utilizzare tutte le tecnologie viste a lezione:
+ HTML5, fogli di stile CSS (si può usare Bootstrap o altri framework per CSS)
+ JavaScript, librerie varie
+ PHP, sessioni, accesso al database per la parte lato server

La fase di debug per la correzione degli errori potrebbe essere complicata. 

Per **JavaScript** puoi usare la Console degli errori disponibile nel browser. 

Anche per **PHP** gli errori sintattici vengono segnalati nel browser. Se gli script non funzionano e vedi solo delle pagine bianche, controlla le impostazioni nel file di configurazione php.ini: la direttiva display_errors potrebbe essere messa a Off. Vedi per esempio https://www.hostingadvice.com/how-to/php-show-errors/ per maggiori informazioni.

Se le query **SQL** falliscono, prova a stamparle (echo $query;) e a eseguirle all'interno dell'applicazione che usi per creare e/o modificare il database (per esempio phpmyadmin).

Se usi il **redirect** (header("Location: ....");) ci potrebbero essere degli errori e/o dei warning che non vengono intercettati, semplicemente perché si cambia pagina. Prova a vedere cosa succede se commenti i redirect verso altre pagine.

Guarda sempre il **sorgente HTML** che restituisci al browser, che deve essere valido in accordo con le specifiche del W3C. Valida il codice HTML prodotto!

Ricorda di **separare le parti comuni** delle pagine in altrettanti file (o funzioni) per evitare di riscrivere più volte le stesse porzioni di codice/markup. Metti le credenziali di accesso al database in un file a parte per non dover ripetere username e password più volte. 

Puoi anche usare esempi, fogli di stile e funzioni presi dalla rete a patto di saperli spiegare. Il consiglio è di leggere la documentazione prima di copiare pezzi di codice a caso. Inoltre, copia da siti fidati. Occhio alla sicurezza di startSAW, cerca  di seguire le indicazioni fornite a lezione. 


## 4) Testing automatico

Alcune funzionalità saranno testate in modo automatico. Il superamento dei test è requisito necessario per discutere il progetto.

I test sono di tipo "end-to-end": lo script di test usa la libreria cURL di PHP e interagisce con il sito tramite "endpoint", simulando le operazioni richieste dal progetto. Ad esempio, per simulare il login, lo script di test fa una richiesta POST alla pagina  login.php con parametri "email" e "pass".

Passi di test:

1. Registrazione (con credenziali casuali)
2. Login (con credenziali di registrazione)
3. Visualizzazione profilo (controllo dati di registrazione mostrati sulla pagina)
4. Modifica profilo (con informazioni casuali)
5. Visualizzazione profilo (controllo dati appena modificati)
6. Logout
7. Visualizzazione profilo (dopo il logout la visualizzazione del profilo deve fallire perché si tratta di un'operazione  riservata agli utenti autenticati)

*[+] Testing Registration - Login - Show Profile*

*...*

*[ ] Success*

*[+] Testing Update - Show Profile*

*...*

*[ ] Success* 

*[+] Testing Logout - Show Profile*

*...*

*[ ] Failed*



Esiste uno script di test per ognuna delle funzioni precedenti. Gli script sono richiamati in sequenza lanciando test_all.php che genera nome, cognome, email e password casuali, e poi invoca gli script per registrazione, login, visualizzazione profilo, ecc.

Puoi lanciare lo script da linea di comando (php test_all.php) oppure dalla barra degli indirizzi del browser (passando da localhost). 

Nel file test_all.php devi modificare la variabile $baseurl inizializzandola con la directory che contiene gli script del tuo progetto. All'interno di ciascuno file per il test puoi vedere quale script del progetto viene invocato nella sessione cURL e quali sono i parametri inviati in POST.

Per esempio, nel caso della modifica del profilo, viene invocato lo script update_profile.php

$url = "$baseurl/update_profile.php"

cui vengono mandati i parametri:

curl_setopt($ch, CURLOPT_POSTFIELDS, "email=$email&firstname=$first_name&lastname=$last_name&submit=submit");

Puoi aggiungere delle stampe negli script di test ma non modificare la struttura perché gli stessi script saranno usati all'esame per la discussione del progetto.

NOTA: i test non vanno copiati sul server ma devi lanciarli dalla tua macchina, prima sui file in locale e poi su quelli sul server, modificando opportunamente la variabile $baseurl.

## 5)Istruzioni per la consegna

**Il progetto deve essere consegnato sul server del corso e si è ammessi all'orale solo se passa i test automatici**.

Oltre a consegnare il codice sorgente, ogni gruppo deve preparare una breve presentazione (3/5 slide) che descrive il dominio applicativo scelto per startSAW, la struttura del database e le funzionalità aggiuntive implementate. Anche la presentazione deve essere consegnata sul server del corso.

Se lavorate in gruppo la discussione del progetto va fatta insieme, nello stesso giorno (a meno di casi eccezionali da discutere di volta in volta).

Buon lavoro!








