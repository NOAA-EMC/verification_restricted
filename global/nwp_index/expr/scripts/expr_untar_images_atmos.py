import os
import glob

os.chdir('/home/people/emc/www/htdocs/users/verification_restricted/global/nwp_index/expr/atmos/tar_files')


all_tar_file_list = glob.glob('evs.plots.global_det.atmos.grid2*tar')

for all_tar_file in all_tar_file_list:
    if 'evs.plots.global_det.atmos.grid2grid' in all_tar_file:
        image_dir = '../grid2grid/images'
    if not os.path.exists(image_dir):
        os.makedirs(image_dir)
    print(f"Untarring tar file {all_tar_file} to {image_dir}")
    os.system('tar -xvf '+all_tar_file+' -C '+image_dir)
    os.remove(all_tar_file)
