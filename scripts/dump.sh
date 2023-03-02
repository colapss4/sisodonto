#!/bin/bash
# $1 = USER | $2 = PASSWORD | $3 = DATABASE
mkdir -p /dumps/$1
mysqldump -u $1 -p$2 --no-tablespaces $3 > /dumps/$3/dump-$(date +'%Y-%m-%d_%H-%M').sql