Lost Pets Architecture
Use cases


Userul introduce datele in formularul de login, este redirectionat pe pagina principala, de unde selecteaza un animal pe care l-a vazut. Face un update la pagina animalului.

Adminul site-ului acceseaza pagina de login administrativ, ii apare pagina de monitorizare a aplicatiei web de unde genereaza statistici in format pdf a numarului de animale pierdute si recuperate in Nicolina.

Userul acceseaza pagina de profil pentru a modifica detalii precum poza de profil, adresa de email si pentru a vizualiza animalele pe care le-a gasit sau pe care le-a pierdut.

Userul acceseaza sectiunea de notificari, apasa pe “[Pet name] has been found thanks to your contribution!”. De aici user-ul este redirectionat catre pagina animalului pe care l-a gasit pentru a-si lua recompensa in cazul in care exista.

Userul acceseaza pagina de introducere a unui animal pe care l-a pierdut. Dupa ce introduce toate informatiile necesare este redirectionat pe o pagina noua creata pentru animalul introdus. Cativa alti useri updateaza locatia animalului, iar un altul il gaseste.

Userul acceseaza site-ul pentru prima oara. Doreste sa isi creeze cont, apasa pe "Sign up" si este redirectionat pe pagina cu formularul de inregistrare. Userul completeaza toate datele necesare, iar la apasarea butonului "Register" un mail de confirmare al contului este trimis pe adresa utilizatorului. Acesta este rugat sa confirme contul inainte de a putea accesa continutul site-ului.

API-uri
Firebase API
Facebook API
Twitter API
OpenStreetMaps API


Autentificare persistenta
Se va realiza prin folosirea tool-ului Firebase Authentification.

Inregistrarea se va face prin intermediul metodei .createUserWithEmailAndPassword(email,password)
Dupa inregistrare utilizatorul este logat automat.
Salvarea sesiunii si modificarilor din cadrul sesiunii se va face folosind metoda .onAuthStateChanged(firebaseUser => {})
Logarea in cazul delogarii se va face folosind metoda .signInWithEmailAndPassword(email,password)

Bilbiografie
https://www.youtube.com/watch?v=v_hR4K4auoQ&list=PLl-K7zZEsYLluG5MCVEzXAQ7ACZBCuZgZ
https://www.youtube.com/watch?v=-OKrloDzGpU
https://firebase.google.com/docs/reference/js/
