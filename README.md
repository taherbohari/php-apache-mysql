# php-apache-mysql
Simple php-apache application to read contents from mysql database

## Pre-requisites
- minikube running : v1.15.1
- kubectl version : v1.19.4
- docker version : 19.03.6
- helm 3 -> https://helm.sh/docs/intro/install/

## Defaults
- k8s namespace used : default
- mysql db name used : assignment

**NOTE :** I have deployed this setup on AWS instance and running minikube with --vm-driver as None

## Steps
#### Clone this repository
```
git clone https://github.com/taherbohari/php-apache-mysql.git
```
#### cd into directory
```
cd ./php-apache-mysql
```
#### Build webserver docker image
```
docker build -t my-webserver:assignment ./docker/webserver/.
```
#### Build mysql docker image
```
docker build -t my-mysql:assignment ./docker/mysql/.
```
#### Install mysql helm chart
```
helm install mysql ./mysql/
```
#### Install webserver helm chart
```
helm install webserver ./webserver/
```
#### Check webserver url using minikube
```
minikube service list
```
eg.
```
minikube service list
|-------------|---------------|--------------|---------------------------|
|  NAMESPACE  |     NAME      | TARGET PORT  |            URL            |
|-------------|---------------|--------------|---------------------------|
| default     | kubernetes    | No node port |
| default     | mysql-service | No node port |
| default     | webserver     |           80 | http://<IP>:31603         |
| kube-system | kube-dns      | No node port |
|-------------|---------------|--------------|---------------------------|
```
#### curl the webserver url to get the data from mysql database
```
curl http://<IP>:31603
```
eg.
```
curl http://100.71.3.113:31456
Accessing MySQL inside K8S <br>Hello World!!!<br>
```

**NOTE :** You can exec into mysql pod and insert new data into assignment database
