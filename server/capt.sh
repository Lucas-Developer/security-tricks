#!/bin/bash
#find /etc -name "issue*"
for i in $(find /etc -perm 777); do
	echo "777 ${i}"
done
echo " "
for i in $(find /etc -perm 755); do
	echo "755 ${i}"
done
echo " "
echo "USERS"
for i in $(cat /etc/passwd | cut -d ":" -f1); do 
	for k in $(find /etc -user $i); do
		echo "user: ${i} dir: ${k}"
	done
	for k in $(find /var -user $i); do
		echo "user: ${i} dir: ${k}"
	done
	for k in $(find /usr -user $i); do
		echo "user: ${i} dir: ${k}"
	done
	for k in $(find /sbin -user $i); do
		echo "user: ${i} dir: ${k}"
	done
	for k in $(find /bin -user $i); do
		echo "user: ${i} dir: ${k}"
	done
done
