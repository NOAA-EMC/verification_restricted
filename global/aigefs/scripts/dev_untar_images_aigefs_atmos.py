import os
import glob
import datetime as dt

pdym2=(dt.datetime.now()-dt.timedelta(days=3)).strftime('%Y%m%d')

os.chdir('/home/people/emc/www/htdocs/users/verification/emc.vpppg/dev_tar_files/aigefs/atmos.'+pdym2+'/')

os.system("cp -v *.tar /home/people/emc/www/htdocs/users/verification_restricted/global/aigefs/dev/atmos/tar_files")

os.chdir('/home/people/emc/www/htdocs/users/verification_restricted/global/aigefs/dev/atmos/tar_files')

g2g_tar_file_list = glob.glob('evs.plots.aigefs.atmos.aigefs.grid2grid*tar')

for g2g_tar_file in g2g_tar_file_list:
    print(f"Untarring {g2g_tar_file}")
    image_dir = '../grid2grid/images/'
    if not os.path.exists(image_dir):
        os.makedirs(image_dir)
    os.system('tar -xvf '+g2g_tar_file+' -C '+image_dir)
    os.remove(g2g_tar_file)
    
g2o_tar_file_list = glob.glob('evs.plots.aigefs.atmos.aigefs.grid2obs*tar')

for g2o_tar_file in g2o_tar_file_list:
    print(f"Untarring {g2o_tar_file}")
    image_dir = '../grid2obs/images/'
    if not os.path.exists(image_dir):
        os.makedirs(image_dir)
    os.system('tar -xvf '+g2o_tar_file+' -C '+image_dir)
    os.remove(g2o_tar_file)

precip_tar_file_list = glob.glob('evs.plots.aigefs.atmos.aigefs.precip*tar')

for precip_tar_file in precip_tar_file_list:
    print(f"Untarring {precip_tar_file}")
    image_dir = '../grid2grid/images/'
    if not os.path.exists(image_dir):
        os.makedirs(image_dir)
    os.system('tar -xvf '+precip_tar_file+' -C '+image_dir)
    os.remove(precip_tar_file)

profile_tar_file_list = glob.glob('evs.plots.aigefs.atmos.aigefs.profile*tar')

for profile_tar_file in profile_tar_file_list:
    print(f"Untarring {profile_tar_file}")
    image_dir = '../grid2obs/images/'
    if not os.path.exists(image_dir):
        os.makedirs(image_dir)
    os.system('tar -xvf '+profile_tar_file+' -C '+image_dir)
    os.remove(profile_tar_file)

