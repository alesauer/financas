#!/bin/bash
#Passa como parametro
mysqldump -u financeiro -pGxgLTr201@ --databases financas  > sql/financas.sql
git add -A
git commit -m "$1"
git push https://alesauer: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@github.com/alesauer/financas.git master
