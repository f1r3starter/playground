brew install minikube

curl -Lo minikube https://storage.googleapis.com/minikube/releases/latest/minikube-darwin-amd64 \
  && chmod +x minikube
  
sudo mv minikube /usr/local/bin

minikube start --driver=virtualbox


kubectl create deployment hello-minikube --image=k8s.gcr.io/echoserver:1.10