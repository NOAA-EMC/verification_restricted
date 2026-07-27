import os
import glob

os.chdir('/home/people/emc/www/htdocs/users/verification_restricted/global/subseasonal/dev/atmos/tar_files')


all_tar_file_list = glob.glob('evs.plots.subseasonal.atmos.grid2*tar')

for all_tar_file in all_tar_file_list:
    print(f"Untarring big tar file {all_tar_file}")
    os.system('tar -xvf '+all_tar_file)
    tar_files = glob.glob('*.tar')
    if 'evs.plots.subseasonal.atmos.grid2grid' in all_tar_file:
        image_dir = '../grid2grid/images'
    elif 'evs.plots.subseasonal.atmos.grid2obs_prepbufr.' in all_tar_file:
        image_dir = '../grid2obs/images'
    if not os.path.exists(image_dir):
        os.makedirs(image_dir)
    for tar_file in tar_files:
        if 'evs.' not in tar_file:
            print(f"Untarring {tar_file} to {image_dir}")
            os.system('tar -xvf '+tar_file+' -C '+image_dir)
            os.remove(tar_file)
    os.remove(all_tar_file)
