# sqliscanner - [ Alat za automatizaciju eksploatacije SQL ranjivosti  ]

<p align="center">
  <img src="https://user-images.githubusercontent.com/58860019/150654821-8782daf9-fdf9-43ec-849d-b62a661f7d3b.png" />
</p>


<p align="center">

<img alt="GitHub release (latest by date)" src="https://img.shields.io/github/v/release/azecdev90/sqliscanner">
 <img alt="GitHub issues" src="https://img.shields.io/github/issues/azecdev90/sqliscanner">
 <img alt="GitHub Discussions" src="https://img.shields.io/github/discussions/azecdev90/sqliscanner?color=27ae60">
 <img alt="GitHub code size in bytes" src="https://img.shields.io/github/languages/code-size/azecdev90/sqliscanner?color=e74c3c">
 <img alt="GitHub contributors" src="https://img.shields.io/github/contributors/azecdev90/sqliscanner">
  <img alt="GitHub" src="https://img.shields.io/github/license/azecdev90/sqliscanner">
</p>

## Sadržaj
- [Uvod](#uvod)
- [Mogućnosti](#mogućnosti)
- [Neophodne stvari](#neophodne-stvari)
- [Kako koristiti alat](#kako-koristiti-alat)
- [Doprinesi razvoju projekta](#doprinesi-razvoju-projekta)
  - [Utisak](#utisak)
  - [Napravi PR zahtjev](#napravi-pr-zahtjev)
  - [Prevodi](#prevodi)
- [Saradnici](#saradnici)
- [Podrži projekat](#podrži-projekat)
- [Licenca](#licenca)   


## Uvod
Testiranje SQL ranjivosti i eksploatacija na ručni način, može biti preteška za početnike u oblasti računarske sigurnosti. Ovaj alat automatizuje oktirvanje i eksploataciju te ranjivosti. Cilj ovog alata je da taj proces učini lakšim, i da pokaže posljedice eksploatacije nezaštićenih webstranica. Strogo je zabranjeno korištenje ovog alata u ilegalne svrhe.   

## Mogućnosti
Osnovne mogućnosti koje ovaj alat nudi su
- Otkrivanje da li je URL ranjiv
- Računanje broja kolona u tabeli
- Otkrivanje ranjive kolone u SQL upitu
- Prikazivanje svih baza podataka 
- Prikazivanje svih tabela u specifičnoj bazi podataka
- Prikazivanje podataka iz specifične baze podataka

## Neophodne stvari
### Priprema okruženja
Da bi pokrenuli ovaj alat morate imati instaliran [PHP](www.php.net) interpreter i [cURL](https://curl.se/) biblioteku. cURL je PHP ekstenzija i dio je PHP jezgra. Za početnike, predlažemo instaliranje [Xampp](https://www.apachefriends.org/index.html).

Ukoliko već imate instaliran PHP interpreter, možete lako provjeriti da li je cURL instaliran na vašem računaru sa komandom
`get_loaded_extensions()`


### Skidanje i pokretanje projekta
```
Kloniranje sqliscanner-a sa  Github
$ git clone https://github.com/azecdev90/sqliscanner.git

Ulazak u direktorijum
$ cd sqliscanner
```
## Kako koristiti alat
Skeniranje URL i provjera da li je URL ranjiv    
```
// php sqliscanner.php --url [urlZaSkeniranje]    [ranjiviParam]  
   php sqliscanner.php --url http://targeturl/page.php?id=1  
```  

Prikazivanje svih tabela iz baze podataka
```
// php sqliscanner.php --url [urlZaSkeniranje]    [ranjivParam]        [imeBazePodataka]  
   php sqliscanner.php --url http://targeturl/page.php?id=1 --database projectName
```
Prikazivanje podataka iz specifične baze i tabele
```
// php sqliscanner.php --url [urlZaSkeniranje]    [ranjivParam]        [imeBazePodataka]  [imeTabele]
   php sqliscanner.php --url http://targeturl/page.php?id=1 --database projectName --table users
```
Prikaži sve komande
```
// php sqliscanner.php --help [--help | -h] 
   php sqliscanner.php --help 
   ```
## Doprinesi razvoju projekta
U ovom poglavlju su predstavljeni načini na koji možete da pomogne razvoju ovog alata. Tri su osnovna načina na koji možete pomoći razvoju ovog projekta. Ako tvoja ideja ne spada ni u jednu od sljedeće tri kategorije, ovo vas ne ograničava da da se uključite u razvojni proces. Ako je ovo vaš slučaj, nemojte se ustručavati da otvorite issue, i podilijeti sa nama vaše ideje, i na taj način učinimo ovaj alat boljim.
 
### Utisak
Na osnovu vašeg iskustva korištenja ovog softwara, koje će vam dati bolji uvid kako ne samo kako alat funkcioniše, nego prednosti i nedostake ovog alata. Nakon korištenja ovog alatak, sa nama možete podijeliti vaše iskustvo i vaš utisak. Vaše ideje i kritike mogu nam pomoći koje stvari bi trebali popraviti u sljedećoj verziji. Također, ukoliko primjetite bilo kakav bug prilikom korištenja, očekujemo da ga prijavite.

### Napravi PR zahtjev
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](https://makeapullrequest.com)  
Zbog naših čvrstih uvjerenja u principe otvorenog koda, i privilegije koje ti principi donose prilikom razvoja softwara, pridruživanje u naš razvojni tim je uvijek dobrodošlo. Prema tome, mi vas ohrabrujemo i podržavamo ukoliko napravite određenu izmjenu, i predložite nam promjene.
- Povuci ovaj projekat na svoj računar
- Implementiraj svoje ideje
- Uploaduj kod u svoj Github repozitoriji
- Napravi PR u ovaj repozitoriji
- Vaš kod će biti pregledan, i ukoliko zadovoljava kriterije prihvatićemo vaše sugestije
- Vaše ime će biti dodano u [listu saradnika](#lista-saradnika)



### Prevodi
Ovaj Readme file je napravljen na Engleskom zbog njegove rasprostranjenosti u svijetu. Možete doprinjeti razvoju projekta na način da prevedete dokumentaciju u vaš maternji jezik. Izuzetno je važno da dokumentacija ovog projekta bude dostupna na različitim jezicima, i da na taj način omogućimo ovaj alat dostupnim ljudima koji ne govore engleski jezik.

#### Kako napraviti vlastiti prevod
- Povuci ovaj projekat na svoj računar
- U folderu translations napravi datotetku sa strukturom [translation][languagename] [ translationEN, translationDE ]
- Prevedi dokumentaciju u svoj maternji jezik
- Uploaduj svoj kod na Github
- Pošalji nam PR zahtjev za izmjene


#### Dostupni prevodi
- [ Engleski ](../README.md)

## Saradnici
Ovdje će se nalaziti spisak svih osoba koji su doprinjeli razvoju ovog alata.

## Podrži projekat
Ukoliko ste zadovoljni upotrebom ovog alata, ili vam je pomogao u otkrivanju ranjivosti u vašim web aplikacijama, možete nam donirati novac, i na taj način podržati razvoj ovog alata.

## Licenca
> Čitav tekst licence možete pogledati [ovdje](https://opensource.org/licenses/MIT)  

Ovaj projekat je licenciran po pravilima MIT licence.






