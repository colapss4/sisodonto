#!/bin/bash
# $1 = USER | $2 = PASSWORD | $3 = DATABASE | $4 = FILENAME
mysql -u $1 -p$2 $3 < /dumps/$3/$4