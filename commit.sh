#!/bin/bash
#Passa como parametro
mysqldump -u financeiro -pGxgLTr201@ --databases financas  > sql/financas.sql
git add -A
git commit -m "$1"
git push https://alesauer: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@github.com/alesauer/financas.git master