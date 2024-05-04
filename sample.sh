#!/bin/bash

cat - | sed "1ithis is sample.sh<br><br>Params:<br>$@<br>STDIN:<br>"
