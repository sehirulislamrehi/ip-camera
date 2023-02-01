ffmpeg -threads 1 -v verbose  -i rtsp://admin:prg@123456@172.17.107.24/ch01.264 -vf scale=600:400  -vcodec libx264 -r 25 -b:v 10 -crf 31 -acodec aac  -sc_threshold 0 -f hls   -hls_flags delete_segments -hls_time 10 -segment_time 10 -hls_list_size 10 G:\PRAN-RFL\ip_camera\public\videos\172.17.107.24\stream.m3u8

