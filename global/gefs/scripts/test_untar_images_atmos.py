import os
import glob
import datetime as dt

pdym2=(dt.datetime.now()-dt.timedelta(days=3)).strftime('%Y%m%d')

os.chdir('/home/people/cpc/lchen/evs_test_tar/global_ens/atmos.'+pdym2+'/')

tar_file_g2g_list = glob.glob('evs.plots.global_ens.atmos.gefs.grid2grid.*.tar')+glob.glob('evs.plots.global_ens.atmos.gefs.precip.*.tar')+glob.glob('evs.plots.global_ens.atmos.gefs.precip_spatial.*.tar')+glob.glob('evs.plots.global_ens.atmos.naefs.precip_spatial.*.tar')+glob.glob('evs.plots.global_ens.atmos.gefs.sea_ice.*.tar')+glob.glob('evs.plots.global_ens.atmos.gefs.snowfall.*.tar')+glob.glob('evs.plots.global_ens.atmos.gefs.sst.*.tar')
#print(tar_file_g2g_list)

for tar_file in tar_file_g2g_list:
    print(f"Copying {tar_file} to global_ens g2g atmos test")

    os.system("cp -v "+tar_file+" /home/people/emc/www/htdocs/users/verification/global/gefs/test/atmos/tar_files")

os.chdir('/home/people/emc/www/htdocs/users/verification/global/gefs/test/atmos/tar_files')

for tar_file in tar_file_g2g_list:
    print(f"Untarring {tar_file}")
    image_dir = '../grid2grid/images/'
    if not os.path.exists(image_dir):
        os.makedirs(image_dir)
    os.system('tar -xvf '+tar_file+' -C '+image_dir)
    os.remove(tar_file)

os.chdir('/home/people/cpc/lchen/evs_test_tar/global_ens/atmos.'+pdym2+'/')
tar_file_g2o_list = glob.glob('evs.plots.global_ens.atmos.gefs.grid2obs.*.tar')+glob.glob('evs.plots.global_ens.atmos.gefs.grid2obs_separate.*.tar')+glob.glob('evs.plots.global_ens.atmos.gefs.profile1.*.tar')+glob.glob('evs.plots.global_ens.atmos.gefs.profile2.*.tar')+glob.glob('evs.plots.global_ens.atmos.gefs.profile3.*.tar')+glob.glob('evs.plots.global_ens.atmos.gefs.cape.*.tar')
#print(tar_file_g2o_list)


for tar_file in tar_file_g2o_list:
    print(f"Copying {tar_file} to global_ens g2o atmos test")
    os.system("cp -v "+tar_file+" /home/people/emc/www/htdocs/users/verification/global/gefs/test/atmos/tar_files")

os.chdir('/home/people/emc/www/htdocs/users/verification/global/gefs/test/atmos/tar_files')


for tar_file in tar_file_g2o_list:
    print(f"Untarring {tar_file}")
    image_dir = '../grid2obs/images/'
    if not os.path.exists(image_dir):
        os.makedirs(image_dir)
    os.system('tar -xvf '+tar_file+' -C '+image_dir)
    os.remove(tar_file)

