INSERT INTO `pouzivatel`
    (`id`, `pouzivatelske_meno`, `heslo`, `opravnenia`)
VALUES
    -- heslo: admin
    (1, 'admin', '$2a$12$tjeQy9PkSMX/8mwYQi7sN.DeBdBLb0xfDJ2X/0LFN3kMCE/jfIHoi', 2),

    -- heslo: redaktor
    (2, 'redaktor', '$2a$12$yT0jP6RkJFAKf1QmfmSxVOSqTyh5KaZfH1K8Mb2V.BLAG6GvZ2eS6', 1);