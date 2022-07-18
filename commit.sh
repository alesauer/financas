#!/bin/bash
#Passa como parametro
mysqldump -u financeiro -pGxgLTr201@ --databases financas  > sql/financas.sql
git add -A
git commit -m "$1"
git push https://alesauer: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@github.com/alesauer/financas.git master
