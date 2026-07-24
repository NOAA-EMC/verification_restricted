#!/bin/sh

set -x

#EVSDIR=/home/people/emc/www/htdocs/users/verification/emc.vpppg/dev_tar_files/subseasonal

#VDATE=$(date -d "-2 days" +"%Y%m%d")

#scp $EVSDIR/atmos.$VDATE/evs.plots.subseasonal.atmos.*tar /home/people/emc/www/htdocs/users/verification/global/subseasonal/dev/atmos/tar_files/
#sleep 15m

python3 /home/people/emc/www/htdocs/users/verification_restricted/global/nwp_index/expr/scripts/expr_untar_images_atmos.py

exit
