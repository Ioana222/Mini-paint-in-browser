# Mini-paint-in-browser
Mini-paint-ul prezinta o structură ușor de utilizat, dat fiind faptul ca este destinat copiilor.
În primul plan va exista o pagină de logare, unde utilizatorul va trebui sa își introduca numele și parola. Aceste date 
personale sunt stocate într-un fișier JSON (de forma ussername = pasward), astfel, doar persoanele inregistrate se vor putea
conecta la aceasta aplicație. Pentru a usura introducerea datelor personale (a ussername-ului), utilizatorul beneficiaza de 
sugestii referitoare la posibilele nume de persoane inregistrate, date de  litera cu care începe tastarea numelui sau de 
utilizator. Sugestiile fiind și mai precise pe parcurs ce tasteaza mai multe litere. În acest caz, se realizeaza un apel
către un fisier .php care conține numele de utilizatori stocat într-un vector.

După realizarea cu succes a logarii, utilizatorul beneficiază de deschiderea zonei de lucru. Acest spațiu are următoarea
arhitectura: ➢ Mini-meniu Opțiuni: 
*File →New (pagina nouă de lucru, stergere desen);  
*File → Browse (Încarca imaginea dorita  pe pagina de desenat);  
*File → Download (Descarcare pagina de lucru sub forma unei imagini);         
*Logout  (Delogare și intoarcerea pe pagina de conectare);

➢ Butoane pentru selectarea desenării cu un creion sau cu un patrat; 
➢ Butoane pentru selectarea culorii cu care se dorește realizarea desenului; 
➢ Mini stampile sub forma unor animale, plante, forme geometrice, nori sau soare pe care utilizatorul le poate
muta oriunde în pagina. Acestea nu vor fi imprimate în cazul în care sunt puse pe pagina de lucru, dar sunt o modalitate 
de a te juca, de a le pune oriunde se dorește.

Aplicația realizata este valida și pe partea de mobile, datorită unor funcții specifice utilizate în cadrul functiei 
de desenare pe canvas (touch events). Aceasta nu respecta în totalitate formatul utilizat pe desktop, dar sunt apropiate,
functionalitatea fiind aceeași.

Tehnologii utilizate: 
• HTML, HTML5 
• CSS, CSS3 
• JavaScript  - funcționalitatea butoanelor, a meniului, a canvas-ului etc;
• AJAX, transmiterea datelor în format JSON  - folosit în cadrul paginii de logare, în momentul oferirii sugestiilor 
de nume de utilizator. Sugestiile sunt trimise sub forma unui fisier JSON și parsate apoi la afisare.
• PHP – logarea și delogarea utilizatorului


