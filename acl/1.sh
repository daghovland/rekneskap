#!/bin/bash
CAKE=/var/www/cake_2_0/lib/Cake/Console/cake
$CAKE schema create DbAcl
$CAKE acl create aro "brukere"
$CAKE acl create aro "lager"
