#!/bin/bash
#Passa como parametro
mysqldump -u financeiro -pGxgLTr201@ --databases financas  > sql/financas.sql
git add -A
git commit -m "$1"
git push https://alesauer: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@github.com/alesauer/financas.git master