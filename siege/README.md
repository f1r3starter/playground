###INSTALLATION

apt-get install siege

or 

https://github.com/JoeDog/siege

###USAGE

siege -f siege.txt -i -d1 -r100 -c255

-f - file, where needed urls are specified in next format

http://example.com
http://example.com POST col1=666&col2=333&col3=777

-i -is simulating internet, means that links from file are being hit randomly

-d{num} - user delay between requests

-r - number of reps to run the test

-c - number of concurrent connections
