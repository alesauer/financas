#!/bin/bash
#Passa como parametro
mysqldump -u financeiro -pGxgLTr201@ --databases financas  > sql/financas.sql
git add -A
git commit -m "$1"
git push https://alesauer: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@github.com/alesauer/financeiro.git master
