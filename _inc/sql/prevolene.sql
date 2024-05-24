INSERT INTO `surovina`
    (`nazov`, `kcal`, `jednotka`, `cena`)
VALUES
    ('Pitná voda', 0, 'ml', 0.00),
    ('Pšeničná múka hladká T 650', 4, 'g', 0.89),
    ('Kuchynská soľ', 0, 'čl', 0.69);

INSERT INTO `recept`
    (`id`, `nazov`, `pridany`, `postup`, `popis`)
VALUES
    ('Domáce slíže', CURRENT_TIMESTAMP(), 'Všetky ingrediencie zmiešame a vypracujeme tuhé cesto. Cesto necháme odpočinúť 30 minút.\r\n\r\nCesto rozvaľkáme na hrúbku 2 mm a nakrájame na prúžky 1 cm široké.\r\n\r\nPrúžky cesta zrolujeme a nakrájame na 1 cm dlhé kúsky. Kúsky rozvaľkáme na hrúbku 1 mm.\r\n\r\nSlíže uvaríme vo vriacej osolenej vode. Keď vyplávajú na povrch, vyberieme ich.', 'Domáce slíže, vhodné aj do polievky.'),
    ('Bryndzové halušky', CURRENT_TIMESTAMP(), 'Múku preosejeme do misky, pridáme soľ a vodu. Vypracujeme hladké cesto, ktoré necháme odpočinúť 30 minút.\r\n\r\nCesto si rozdelíme na 4 časti, z každej vyvaľkáme valček, ktorý nakrájame na 1 cm dlhé kúsky. Kúsky cesta vytvarujeme do tvaru halušiek.\r\n\r\nV hrnci si pripravíme osolenú vodu, do ktorej vložíme halušky. Keď vyplávajú na povrch, necháme ich variť ešte 5 minút. Uvarené halušky scedíme a prelejeme studenou vodou.\r\n\r\nNa panvici si opražíme slaninku, ktorú pridáme k haluškám. Halušky podávame s bryndzou.', 'Tradičné slovenské jedlo.');

INSERT INTO `pouzivatel`
    (`id`, `pouzivatelske_meno`, `heslo`, `opravnenia`)
VALUES
    -- heslo: admin
    (1, 'admin', '$2a$12$tjeQy9PkSMX/8mwYQi7sN.DeBdBLb0xfDJ2X/0LFN3kMCE/jfIHoi', 2),

    -- heslo: redaktor
    (2, 'redaktor', '$2a$12$yT0jP6RkJFAKf1QmfmSxVOSqTyh5KaZfH1K8Mb2V.BLAG6GvZ2eS6', 1);

INSERT INTO `qna`
    (`otazka`, `odpoved`)
VALUES
    ('Odkiaľ sa berú obrázky pre recepty?', 'Sú stiahnuté z bezplatných zdrojov, alebo vygenerované pomocou umelej inteligencie.'),
    ('Sú recepty na tejto stránke skutočné?', 'Samozrejme!'),
    ('Viem prispieť vlastným receptom?', 'Kontaktujte nás.');
