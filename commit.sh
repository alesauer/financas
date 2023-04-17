#!/bin/bash
#Passa como parametro
mysqldump -u financeiro -pGxgLTr201@ --databases financas  > sql/financas.sql
git add -A
git commit -m "$1"
git push https://alesauer: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@github.com/alesauer/financas.git master