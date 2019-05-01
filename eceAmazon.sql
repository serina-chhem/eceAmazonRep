
CREATE TABLE Acheteur(
Login varchar(255) primary key not null,
Nom varchar(255) not null,
Password varchar(255) not null,
numeroCarte int(7) not null,
nomCarte varchar(255) not null,
dateExpiration date not null,
codeCarte int(4) not null,
Adresse varchar(255) not null 
);

insert into Acheteur(Login, Nom, Password, numeroCarte, nomCarte, dateExpiration, codeCarte, Adresse) values ("nicolas.dumas-delage@edu.ece.fr", "Nicolas", "Nicolas1234", "111 2222", "Dumas-Delage", "2023-04-12", "9999", "12 allée des perdrix" );
insert into Acheteur(Login, Nom, Password, numeroCarte, nomCarte, dateExpiration, codeCarte, Adresse) values ("julien.rauber@edu.ece.fr", "Julien", "Julien1234", "222 2222", "Rauber", "2025-01-08", "8888", "20 rue des lilas" );
insert into Acheteur(Login, Nom, Password, numeroCarte, nomCarte, dateExpiration, codeCarte, Adresse) values ("paul.laplaige@edu.ece.fr", "Paul", "Paul1234", "333 2222", "Laplaige", "2022-11-12", "7777", "19 avenue des champs élysées");

CREATE TABLE Vendeur(
Login varchar(255) primary key not null,
Nom varchar(255) not null,
Password varchar(255) not null,
Photo varchar(255) not null,
imageFond varchar(255) not null
)

insert into Vendeur values ("julien.delgay@edu.ece.fr", "Julien", "JulienD1234", "photoJulienD.jpg", "photoImageFondJulienD.jpg");
insert into Vendeur values ("raphael.daici@edu.ece.fr", "Raphael", "Raph1234", "photoRaph.jpg", "photoImageFondRaph.jpg");
insert into Vendeur values ("sawsane.aloui@edu.ece.fr", "Sawsane", "Saw1234", "photoSaw.jpg", "photoImageFondSaw.jpg");